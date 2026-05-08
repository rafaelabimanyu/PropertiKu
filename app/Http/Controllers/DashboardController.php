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
            return redirect()->route('dashboard.admin');
        }

        if ($user->isAgent()) {
            return redirect()->route('dashboard.agent');
        }

        return redirect()->route('dashboard.buyer');
    }

    public function admin()
    {
        $this->authorizeRole('admin');
        $totalProperties = Property::count();
        $totalUsers = \App\Models\User::count();
        return view('dashboard.admin', compact('totalProperties', 'totalUsers'));
    }

    public function agent()
    {
        $this->authorizeRole('agent');
        $user = auth()->user();
        $totalProperties = Property::where('user_id', $user->id)->count();
        $recentProperties = Property::where('user_id', $user->id)->latest()->take(5)->get();
        return view('dashboard.agent', compact('totalProperties', 'recentProperties'));
    }

    public function buyer()
    {
        $this->authorizeRole('buyer');
        $totalProperties = Property::count();
        return view('dashboard.buyer', compact('totalProperties'));
    }

    protected function authorizeRole($role)
    {
        if (auth()->user()->role !== $role) {
            abort(403, 'Unauthorized action.');
        }
    }
}
