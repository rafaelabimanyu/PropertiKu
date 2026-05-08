<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Property;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = auth()->user()->favorites()->latest('favorites.created_at')->paginate(12);
        return view('favorites.index', compact('favorites'));
    }

    public function toggle(Request $request)
    {
        $request->validate(['property_id' => 'required|exists:properties,id']);

        $user = auth()->user();
        $propertyId = $request->property_id;

        $exists = Favorite::where('user_id', $user->id)->where('property_id', $propertyId)->first();

        if ($exists) {
            $exists->delete();
            return back()->with('success', 'Removed from favorites.');
        }

        Favorite::create(['user_id' => $user->id, 'property_id' => $propertyId]);
        return back()->with('success', 'Added to favorites!');
    }

    public function destroy(Property $property)
    {
        Favorite::where('user_id', auth()->id())->where('property_id', $property->id)->delete();
        return back()->with('success', 'Removed from favorites.');
    }
}
