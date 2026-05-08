<x-app-layout>
<div class="bg-slate-50 dark:bg-gray-950 min-h-screen pt-28 pb-20">
    <div class="max-w-3xl mx-auto px-6">
        {{-- Header --}}
        <div class="flex items-center mb-6 gap-4">
            <a href="{{ route('chat.inbox') }}" class="p-2 bg-white dark:bg-gray-900 border border-slate-200 dark:border-gray-800 rounded-xl hover:bg-slate-50 transition">
                <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-emerald-500 flex items-center justify-center text-white font-bold text-sm mr-3">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div>
                    <h2 class="font-bold dark:text-white">{{ $user->name }}</h2>
                    <span class="text-[10px] font-bold text-slate-400 uppercase">{{ $user->role }}</span>
                </div>
            </div>
        </div>

        {{-- Messages --}}
        <div class="bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800 shadow-sm overflow-hidden">
            <div class="h-[500px] overflow-y-auto p-6 space-y-4" id="chat-messages">
                @forelse($messages as $msg)
                    <div class="flex {{ $msg->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-[75%] px-5 py-3 rounded-2xl text-sm
                            {{ $msg->sender_id === auth()->id() 
                                ? 'bg-indigo-600 text-white rounded-br-md' 
                                : 'bg-slate-100 dark:bg-gray-800 text-slate-800 dark:text-slate-200 rounded-bl-md' }}">
                            <p>{{ $msg->message }}</p>
                            <p class="text-[9px] mt-1 {{ $msg->sender_id === auth()->id() ? 'text-indigo-200' : 'text-slate-400' }}">
                                {{ $msg->created_at->format('H:i') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-16 text-slate-400">
                        <p class="text-sm font-medium">No messages yet. Start the conversation!</p>
                    </div>
                @endforelse
            </div>

            {{-- Send Message --}}
            <form method="POST" action="{{ route('chat.store') }}" class="border-t border-slate-100 dark:border-gray-800 p-4 flex gap-3">
                @csrf
                <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                <input type="text" name="message" placeholder="Type a message..." required
                    class="flex-1 px-5 py-3 bg-slate-50 dark:bg-gray-800 border-0 rounded-xl text-sm font-medium focus:ring-2 focus:ring-indigo-500 dark:text-white placeholder-slate-400">
                <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-indigo-700 transition flex-shrink-0">
                    Send
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const el = document.getElementById('chat-messages');
        if (el) el.scrollTop = el.scrollHeight;
    });
</script>
</x-app-layout>
