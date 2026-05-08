<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PremiumController extends Controller
{
    public function upgrade(Request $request, Property $property)
    {
        $user = Auth::user();

        // Check ownership or admin
        if ($property->user_id !== $user->id && !$user->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'plan' => 'required|in:free,featured,premium',
        ]);

        $isFeatured = $request->plan !== 'free';

        $property->update([
            'listing_plan' => $request->plan,
            'is_featured' => $isFeatured,
        ]);

        $planName = ucfirst($request->plan);
        return redirect()->back()->with('success', "Property successfully upgraded to {$planName} plan.");
    }
}
