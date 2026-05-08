<x-app-layout>
<div class="bg-slate-50 dark:bg-gray-950 min-h-screen pt-28 pb-20">
    <div class="max-w-5xl mx-auto px-6">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-black dark:text-white tracking-tight">My Bookings</h1>
                <p class="text-sm text-slate-500">Track your property visit schedules</p>
            </div>
            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-white dark:bg-gray-900 border border-slate-200 dark:border-gray-800 rounded-xl text-xs font-bold text-slate-600 hover:text-indigo-600 transition">← Dashboard</a>
        </div>

        @if($bookings->isEmpty())
            <div class="text-center py-20 bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800">
                <div class="w-16 h-16 bg-blue-50 dark:bg-blue-900/20 rounded-2xl flex items-center justify-center mx-auto mb-4 text-blue-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-lg font-bold dark:text-white mb-2">No bookings yet</h3>
                <p class="text-sm text-slate-500 mb-6">Browse properties and book a visit to get started.</p>
                <a href="{{ route('properties.index') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-indigo-700 transition">Browse Properties</a>
            </div>
        @else
            <div class="space-y-4">
                @foreach($bookings as $booking)
                    <div class="p-6 bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800 shadow-sm hover:shadow-md transition">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div class="flex items-center flex-1 min-w-0">
                                <div class="w-12 h-12 rounded-xl bg-indigo-50 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 mr-4 flex-shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>
                                </div>
                                <div class="min-w-0">
                                    <h4 class="font-bold dark:text-white truncate">{{ $booking->property->title }}</h4>
                                    <p class="text-xs text-slate-500">Agent: {{ $booking->agent->name }} · {{ $booking->survey_date->format('M d, Y') }} at {{ $booking->survey_time }}</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider flex-shrink-0
                                @if($booking->status === 'approved') bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600
                                @elseif($booking->status === 'rejected') bg-red-50 dark:bg-red-900/30 text-red-600
                                @elseif($booking->status === 'completed') bg-blue-50 dark:bg-blue-900/30 text-blue-600
                                @else bg-amber-50 dark:bg-amber-900/30 text-amber-600 @endif">
                                {{ $booking->status }}
                            </span>
                        </div>
                        @if($booking->notes)
                            <p class="mt-3 text-xs text-slate-500 pl-16">📝 {{ $booking->notes }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="mt-6">{{ $bookings->links() }}</div>
        @endif
    </div>
</div>
</x-app-layout>
