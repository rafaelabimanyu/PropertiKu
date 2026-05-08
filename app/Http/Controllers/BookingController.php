<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use App\Models\AppNotification;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'survey_date' => 'required|date|after_or_equal:today',
            'survey_time' => 'required|string',
            'notes' => 'nullable|string|max:500',
        ]);

        $property = Property::findOrFail($validated['property_id']);

        $booking = Booking::create([
            'property_id' => $property->id,
            'buyer_id' => auth()->id(),
            'agent_id' => $property->user_id,
            'survey_date' => $validated['survey_date'],
            'survey_time' => $validated['survey_time'],
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending',
        ]);

        AppNotification::send(
            $property->user_id,
            'booking_new',
            'New Booking Request',
            auth()->user()->name . ' wants to visit "' . $property->title . '" on ' . $booking->survey_date->format('M d, Y'),
            route('bookings.agent')
        );

        return back()->with('success', 'Booking submitted successfully! The agent will review your request.');
    }

    public function buyerIndex()
    {
        $bookings = Booking::where('buyer_id', auth()->id())
            ->with(['property', 'agent'])
            ->latest()
            ->paginate(10);

        return view('bookings.buyer-index', compact('bookings'));
    }

    public function agentIndex()
    {
        $bookings = Booking::where('agent_id', auth()->id())
            ->with(['property', 'buyer'])
            ->latest()
            ->paginate(10);

        return view('bookings.agent-index', compact('bookings'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        if ($booking->agent_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'status' => 'required|in:approved,rejected,completed',
        ]);

        $booking->update(['status' => $validated['status']]);

        $statusLabel = ucfirst($validated['status']);
        AppNotification::send(
            $booking->buyer_id,
            'booking_' . $validated['status'],
            'Booking ' . $statusLabel,
            'Your booking for "' . $booking->property->title . '" has been ' . strtolower($statusLabel) . '.',
            route('bookings.buyer')
        );

        return back()->with('success', 'Booking status updated to ' . $statusLabel . '.');
    }
}
