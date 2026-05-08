<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Booking;
use App\Models\Favorite;
use App\Models\Message;
use App\Models\AppNotification;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->isAdmin()) return redirect()->route('dashboard.admin');
        if ($user->isAgent()) return redirect()->route('dashboard.agent');
        return redirect()->route('dashboard.buyer');
    }

    public function admin()
    {
        $this->authorizeRole('admin');
        $totalProperties = Property::count();
        $totalUsers = User::count();
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        return view('dashboard.admin', compact('totalProperties', 'totalUsers', 'totalBookings', 'pendingBookings'));
    }

    public function agent()
    {
        $this->authorizeRole('agent');
        $user = auth()->user();
        $totalProperties = Property::where('user_id', $user->id)->count();
        $recentProperties = Property::where('user_id', $user->id)->latest()->take(5)->get();
        $pendingBookings = Booking::where('agent_id', $user->id)->where('status', 'pending')->count();
        $totalBookings = Booking::where('agent_id', $user->id)->count();
        $unreadMessages = $user->unreadMessagesCount();
        return view('dashboard.agent', compact('totalProperties', 'recentProperties', 'pendingBookings', 'totalBookings', 'unreadMessages'));
    }

    public function buyer()
    {
        $this->authorizeRole('buyer');
        $user = auth()->user();
        $favCount = Favorite::where('user_id', $user->id)->count();
        $bookingCount = Booking::where('buyer_id', $user->id)->count();
        $unreadMessages = $user->unreadMessagesCount();
        $recentProperties = Property::with('user')->latest()->take(4)->get();
        return view('dashboard.buyer', compact('favCount', 'bookingCount', 'unreadMessages', 'recentProperties'));
    }

    protected function authorizeRole($role)
    {
        if (auth()->user()->role !== $role) {
            abort(403, 'Unauthorized action.');
        }
    }
}
