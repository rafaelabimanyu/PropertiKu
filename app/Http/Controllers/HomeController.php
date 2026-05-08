<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Property;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProperties = Property::with('user')
            ->orderBy('is_featured', 'desc')
            ->latest()
            ->take(6)
            ->get();
        return view('welcome', compact('featuredProperties'));
    }
}
