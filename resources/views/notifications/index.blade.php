<x-app-layout>
<div class="bg-slate-50 dark:bg-gray-950 min-h-screen pt-28 pb-20">
    <div class="max-w-4xl mx-auto px-6">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-black dark:text-white tracking-tight">Notifications</h1>
                <p class="text-sm text-slate-500">Stay updated with your activity</p>
            </div>
            <div class="flex gap-2">
                <form method="POST" action="{{ route('notifications.markAllRead') }}">
                    @csrf
                    <button class="px-4 py-2 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 rounded-xl text-xs font-bold hover:bg-indigo-100 transition">Mark All Read</button>
                </form>
                <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-white dark:bg-gray-900 border border-slate-200 dark:border-gray-800 rounded-xl text-xs font-bold text-slate-600 hover:text-indigo-600 transition">← Dashboard</a>
            </div>
        </div>

        @if($notifications->isEmpty())
            <div class="text-center py-20 bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800">
                <div class="w-16 h-16 bg-slate-100 dark:bg-gray-800 rounded-2xl flex items-center justify-center mx-auto mb-4 text-slate-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                </div>
                <h3 class="text-lg font-bold dark:text-white mb-2">All caught up!</h3>
                <p class="text-sm text-slate-500">You have no notifications.</p>
            </div>
        @else
            <div class="space-y-2">
                @foreach($notifications as $n)
                    <a href="{{ route('notifications.markRead', $n) }}" class="flex items-start p-5 rounded-2xl transition-all duration-200 group
                        {{ $n->is_read 
                            ? 'bg-white dark:bg-gray-900 border border-slate-100 dark:border-gray-800' 
                            : 'bg-indigo-50/50 dark:bg-indigo-900/20 border border-indigo-100 dark:border-indigo-800/30' }}">
                        @php
                            $iconMap = [
                                'booking_new' => ['bg-blue-100 text-blue-600', '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>'],
                                'booking_approved' => ['bg-emerald-100 text-emerald-600', '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>'],
                                'booking_rejected' => ['bg-red-100 text-red-600', '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>'],
                                'booking_completed' => ['bg-blue-100 text-blue-600', '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'],
                                'message_new' => ['bg-indigo-100 text-indigo-600', '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>'],
                            ];
                            $icon = $iconMap[$n->type] ?? ['bg-slate-100 text-slate-600', '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>'];
                        @endphp
                        <div class="w-10 h-10 rounded-xl {{ $icon[0] }} flex items-center justify-center mr-4 flex-shrink-0">
                            {!! $icon[1] !!}
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-bold dark:text-white {{ !$n->is_read ? 'text-slate-900' : 'text-slate-600' }}">{{ $n->title }}</h4>
                            @if($n->body)
                                <p class="text-xs text-slate-500 mt-0.5 truncate">{{ $n->body }}</p>
                            @endif
                            <p class="text-[10px] text-slate-400 mt-1">{{ $n->created_at->diffForHumans() }}</p>
                        </div>
                        @if(!$n->is_read)
                            <div class="w-2 h-2 bg-indigo-600 rounded-full mt-2 flex-shrink-0 ml-2"></div>
                        @endif
                    </a>
                @endforeach
            </div>
            <div class="mt-6">{{ $notifications->links() }}</div>
        @endif
    </div>
</div>
</x-app-layout>
