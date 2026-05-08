<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Property;

class FeaturedController extends Controller
{
    public function index()
    {
        // For now, featured = latest 12 properties
        $featuredProperties = Property::with('user')->latest()->take(12)->get();
        return view('featured', compact('featuredProperties'));
    }
}
