<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user->isAgent()) {
            abort(403);
        }

        $leads = Lead::where('agent_id', $user->id)
            ->with(['user', 'property'])
            ->latest()
            ->paginate(15);

        return view('leads.index', compact('leads'));
    }

    public function updateStatus(Request $request, Lead $lead)
    {
        if ($lead->agent_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'status' => 'required|in:new,contacted,qualified,closed,lost',
            'notes' => 'nullable|string|max:1000',
        ]);

        $lead->update($validated);

        return redirect()->back()->with('success', 'Lead status updated successfully.');
    }
}
