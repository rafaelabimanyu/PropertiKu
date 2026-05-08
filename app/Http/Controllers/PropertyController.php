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

    public function index()
    {
        $properties = Property::latest()->paginate(12);
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(PropertyRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug($data['title']) . '-' . rand(1000, 9999);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('properties', 'public');
        }

        Property::create($data);

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }

    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    public function update(PropertyRequest $request, Property $property)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            if ($property->image) {
                Storage::disk('public')->delete($property->image);
            }
            $data['image'] = $request->file('image')->store('properties', 'public');
        }

        $property->update($data);

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
