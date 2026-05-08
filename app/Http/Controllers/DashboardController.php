<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Property;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            return view('dashboard.admin');
        }

        if ($user->isAgent()) {
            $totalProperties = Property::where('user_id', $user->id)->count();
            $recentProperties = Property::where('user_id', $user->id)->latest()->take(5)->get();
            return view('dashboard.agent', compact('totalProperties', 'recentProperties'));
        }

        return view('dashboard.buyer');
    }
}
