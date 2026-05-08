<x-app-layout>
<div class="bg-slate-50 dark:bg-gray-950 min-h-screen pt-28 pb-20">
    <div class="max-w-4xl mx-auto px-6">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-black dark:text-white tracking-tight">Messages</h1>
                <p class="text-sm text-slate-500">Your conversations</p>
            </div>
            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-white dark:bg-gray-900 border border-slate-200 dark:border-gray-800 rounded-xl text-xs font-bold text-slate-600 hover:text-indigo-600 transition">← Dashboard</a>
        </div>

        @if($conversations->isEmpty())
            <div class="text-center py-20 bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800">
                <div class="w-16 h-16 bg-indigo-50 dark:bg-indigo-900/20 rounded-2xl flex items-center justify-center mx-auto mb-4 text-indigo-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                </div>
                <h3 class="text-lg font-bold dark:text-white mb-2">No conversations yet</h3>
                <p class="text-sm text-slate-500">Start a chat from any property detail page.</p>
            </div>
        @else
            <div class="space-y-3">
                @foreach($conversations as $conv)
                    <a href="{{ route('chat.show', $conv['user']->id) }}" class="flex items-center p-5 bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 group {{ $conv['unread'] > 0 ? 'border-l-4 border-l-indigo-500' : '' }}">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-indigo-500 to-emerald-500 flex items-center justify-center text-white font-bold text-sm mr-4 flex-shrink-0">
                            {{ strtoupper(substr($conv['user']->name, 0, 1)) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between mb-1">
                                <h4 class="font-bold dark:text-white text-sm truncate">{{ $conv['user']->name }}</h4>
                                <span class="text-[10px] text-slate-400 flex-shrink-0 ml-2">{{ $conv['last_message']->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-xs text-slate-500 truncate">{{ $conv['last_message']->message }}</p>
                        </div>
                        @if($conv['unread'] > 0)
                            <span class="ml-3 w-6 h-6 bg-indigo-600 text-white rounded-full text-[10px] font-black flex items-center justify-center flex-shrink-0">{{ $conv['unread'] }}</span>
                        @endif
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</div>
</x-app-layout>
