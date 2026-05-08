<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Review;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Property $property)
    {
        $user = Auth::user();

        // Check if user has a completed booking for this property
        $hasCompletedBooking = Booking::where('property_id', $property->id)
            ->where('buyer_id', $user->id)
            ->where('status', 'completed')
            ->exists();

        if (!$hasCompletedBooking) {
            return redirect()->back()->with('error', 'You can only review properties after a completed survey booking.');
        }

        // Check if already reviewed
        $alreadyReviewed = Review::where('property_id', $property->id)
            ->where('user_id', $user->id)
            ->exists();

        if ($alreadyReviewed) {
            return redirect()->back()->with('error', 'You have already reviewed this property.');
        }

        $request->validate([
            'property_rating' => 'required|integer|min:1|max:5',
            'agent_professionalism' => 'required|integer|min:1|max:5',
            'agent_responsiveness' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        Review::create([
            'user_id' => $user->id,
            'property_id' => $property->id,
            'agent_id' => $property->user_id,
            'property_rating' => $request->property_rating,
            'agent_professionalism' => $request->agent_professionalism,
            'agent_responsiveness' => $request->agent_responsiveness,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Thank you for your review! It helps build trust in our community.');
    }
}
