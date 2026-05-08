<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\AppNotification;
use App\Models\Lead;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function inbox()
    {
        $userId = auth()->id();

        // Get unique conversations
        $messages = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->with(['sender', 'receiver', 'property'])
            ->latest()
            ->get();

        $conversations = $messages->groupBy(function ($msg) use ($userId) {
                return $msg->sender_id === $userId ? $msg->receiver_id : $msg->sender_id;
            })
            ->map(function ($msgs) use ($userId) {
                $lastMsg = $msgs->first();
                $otherUser = $lastMsg->sender_id === $userId ? $lastMsg->receiver : $lastMsg->sender;
                return [
                    'user' => $otherUser,
                    'last_message' => $lastMsg,
                    'unread' => $msgs->where('receiver_id', $userId)->where('is_read', false)->count(),
                    'property' => $lastMsg->property,
                ];
            })
            ->filter(fn($item) => $item['user'] !== null)
            ->values();

        return view('chat.inbox', compact('conversations'));
    }

    public function show(User $user)
    {
        $userId = auth()->id();

        // Mark messages as read
        Message::where('sender_id', $user->id)
            ->where('receiver_id', $userId)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        $messages = Message::where(function ($q) use ($userId, $user) {
                $q->where('sender_id', $userId)->where('receiver_id', $user->id);
            })
            ->orWhere(function ($q) use ($userId, $user) {
                $q->where('sender_id', $user->id)->where('receiver_id', $userId);
            })
            ->with('property')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('chat.show', compact('messages', 'user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:2000',
            'property_id' => 'nullable|exists:properties,id',
        ]);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $validated['receiver_id'],
            'property_id' => $validated['property_id'] ?? null,
            'message' => $validated['message'],
        ]);

        AppNotification::send(
            $validated['receiver_id'],
            'message_new',
            'New Message',
            auth()->user()->name . ': ' . \Str::limit($validated['message'], 50),
            route('chat.show', $validated['receiver_id'])
        );

        // Create Lead
        Lead::firstOrCreate(
            [
                'agent_id' => $validated['receiver_id'],
                'user_id' => auth()->id(),
                'property_id' => $validated['property_id'] ?? null,
            ],
            [
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->phone,
                'source' => 'chat',
                'status' => 'new',
            ]
        );

        return back()->with('success', 'Message sent!');
    }
}
