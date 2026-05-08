<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user->isAgent()) {
            abort(403);
        }
        return view('verification.index', compact('user'));
    }

    public function submit(Request $request)
    {
        $user = Auth::user();
        if (!$user->isAgent()) {
            abort(403);
        }

        $request->validate([
            'company_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'license_number' => 'nullable|string|max:255',
        ]);

        $user->update([
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'license_number' => $request->license_number,
            'verification_status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Verification profile submitted successfully. Please wait for admin approval.');
    }

    public function adminIndex()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        $pendingAgents = User::where('verification_status', 'pending')->get();
        $allAgents = User::where('role', User::ROLE_AGENT)->get();

        return view('admin.verifications', compact('pendingAgents', 'allAgents'));
    }

    public function approve(User $user)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        $user->update([
            'is_verified' => true,
            'verification_status' => 'approved',
            'verification_notes' => 'Your profile has been verified by the administrator.',
        ]);

        return redirect()->back()->with('success', "Agent {$user->name} has been verified.");
    }

    public function reject(Request $request, User $user)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'notes' => 'required|string|max:500',
        ]);

        $user->update([
            'is_verified' => false,
            'verification_status' => 'rejected',
            'verification_notes' => $request->notes,
        ]);

        return redirect()->back()->with('success', "Agent {$user->name} verification rejected.");
    }
}
