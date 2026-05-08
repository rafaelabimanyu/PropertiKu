<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Property;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProperties = Property::latest()->take(6)->get();
        return view('welcome', compact('featuredProperties'));
    }
}
