<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

use App\Http\Requests\PropertyRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PropertyController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Property::class, 'property');
    }

    public function index(Request $request)
    {
        $query = Property::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filters
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('bedrooms')) {
            $query->where('bedrooms', '>=', $request->bedrooms);
        }
        if ($request->filled('bathrooms')) {
            $query->where('bathrooms', '>=', $request->bathrooms);
        }
        if ($request->filled('city')) {
            $query->where('city', 'like', "%{$request->city}%");
        }
        if ($request->filled('min_area')) {
            $query->where('area', '>=', $request->min_area);
        }

        $properties = $query->latest()->paginate(12)->withQueryString();
        
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(PropertyRequest $request)
    {
        $validated = $request->validated();
        
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('properties', 'public');
        }

        if ($request->filled('facilities_raw')) {
            $validated['facilities'] = array_map('trim', explode(',', $request->facilities_raw));
        }

        $validated['user_id'] = auth()->id();
        $validated['slug'] = str()->slug($validated['title']) . '-' . rand(100, 999);

        Property::create($validated);

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }

    public function show(Property $property)
    {
        $relatedProperties = Property::where('id', '!=', $property->id)
            ->where('city', $property->city)
            ->take(3)
            ->get();

        return view('properties.show', compact('property', 'relatedProperties'));
    }

    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    public function update(PropertyRequest $request, Property $property)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($property->image) {
                Storage::disk('public')->delete($property->image);
            }
            $validated['image'] = $request->file('image')->store('properties', 'public');
        }

        if ($request->filled('facilities_raw')) {
            $validated['facilities'] = array_map('trim', explode(',', $request->facilities_raw));
        }

        $property->update($validated);

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        if ($property->image) {
            Storage::disk('public')->delete($property->image);
        }
        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
