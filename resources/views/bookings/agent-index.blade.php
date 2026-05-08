<x-app-layout>
<div class="bg-slate-50 dark:bg-gray-950 min-h-screen pt-28 pb-20">
    <div class="max-w-5xl mx-auto px-6">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-black dark:text-white tracking-tight">Incoming Bookings</h1>
                <p class="text-sm text-slate-500">Manage property visit requests from buyers</p>
            </div>
            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-white dark:bg-gray-900 border border-slate-200 dark:border-gray-800 rounded-xl text-xs font-bold text-slate-600 hover:text-emerald-600 transition">← Dashboard</a>
        </div>

        @if($bookings->isEmpty())
            <div class="text-center py-20 bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800">
                <div class="w-16 h-16 bg-emerald-50 dark:bg-emerald-900/20 rounded-2xl flex items-center justify-center mx-auto mb-4 text-emerald-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-lg font-bold dark:text-white mb-2">No booking requests yet</h3>
                <p class="text-sm text-slate-500">When buyers request visits, they'll appear here.</p>
            </div>
        @else
            <div class="space-y-4">
                @foreach($bookings as $booking)
                    <div class="p-6 bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800 shadow-sm">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-4">
                            <div class="flex items-center flex-1 min-w-0">
                                <div class="w-12 h-12 rounded-xl bg-emerald-50 dark:bg-emerald-900/30 flex items-center justify-center text-emerald-600 mr-4 flex-shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <div class="min-w-0">
                                    <h4 class="font-bold dark:text-white">{{ $booking->buyer->name }}</h4>
                                    <p class="text-xs text-slate-500 truncate">{{ $booking->property->title }} · {{ $booking->survey_date->format('M d, Y') }} at {{ $booking->survey_time }}</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider flex-shrink-0
                                @if($booking->status === 'approved') bg-emerald-50 text-emerald-600
                                @elseif($booking->status === 'rejected') bg-red-50 text-red-600
                                @elseif($booking->status === 'completed') bg-blue-50 text-blue-600
                                @else bg-amber-50 text-amber-600 @endif">
                                {{ $booking->status }}
                            </span>
                        </div>
                        @if($booking->notes)
                            <p class="text-xs text-slate-500 mb-4 pl-16">📝 {{ $booking->notes }}</p>
                        @endif
                        @if($booking->status === 'pending' || $booking->status === 'approved')
                            <div class="flex gap-2 pl-16">
                                @if($booking->status === 'pending')
                                    <form method="POST" action="{{ route('bookings.updateStatus', $booking) }}">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="approved">
                                        <button class="px-4 py-2 bg-emerald-600 text-white rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-emerald-700 transition">Approve</button>
                                    </form>
                                    <form method="POST" action="{{ route('bookings.updateStatus', $booking) }}">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="rejected">
                                        <button class="px-4 py-2 bg-red-100 text-red-600 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-red-200 transition">Reject</button>
                                    </form>
                                @endif
                                @if($booking->status === 'approved')
                                    <form method="POST" action="{{ route('bookings.updateStatus', $booking) }}">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="completed">
                                        <button class="px-4 py-2 bg-blue-600 text-white rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-700 transition">Mark Complete</button>
                                    </form>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="mt-6">{{ $bookings->links() }}</div>
        @endif
    </div>
</div>
</x-app-layout>
