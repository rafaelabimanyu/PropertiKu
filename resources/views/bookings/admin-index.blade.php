<x-app-layout>
<div class="bg-slate-50 dark:bg-gray-950 min-h-screen pt-28 pb-20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-black dark:text-white tracking-tight">System Bookings</h1>
                <p class="text-sm text-slate-500">Monitor all property visit schedules across the platform</p>
            </div>
            <a href="{{ route('dashboard.admin') }}" class="px-4 py-2 bg-white dark:bg-gray-900 border border-slate-200 dark:border-gray-800 rounded-xl text-xs font-bold text-slate-600 hover:text-indigo-600 transition">← Dashboard</a>
        </div>

        @if($bookings->isEmpty())
            <div class="text-center py-20 bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800">
                <div class="w-16 h-16 bg-slate-100 dark:bg-gray-800 rounded-2xl flex items-center justify-center mx-auto mb-4 text-slate-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-lg font-bold dark:text-white mb-2">No bookings recorded</h3>
                <p class="text-sm text-slate-500">Bookings will appear here once users start scheduling visits.</p>
            </div>
        @else
            <div class="bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-[10px] font-black uppercase tracking-widest text-slate-400 bg-slate-50/50 dark:bg-gray-800/50">
                                <th class="px-6 py-4">Property & Date</th>
                                <th class="px-6 py-4">Buyer</th>
                                <th class="px-6 py-4">Agent</th>
                                <th class="px-6 py-4">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50 dark:divide-gray-800">
                            @foreach($bookings as $booking)
                                <tr class="hover:bg-slate-50 dark:hover:bg-gray-800 transition">
                                    <td class="px-6 py-4">
                                        <p class="font-bold dark:text-white text-sm">{{ $booking->property->title }}</p>
                                        <p class="text-xs text-slate-500 mt-1">{{ $booking->survey_date->format('M d, Y') }} at {{ $booking->survey_time }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-xs mr-3">
                                                {{ substr($booking->buyer->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold dark:text-white">{{ $booking->buyer->name }}</p>
                                                <p class="text-[10px] text-slate-500">{{ $booking->buyer->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs mr-3">
                                                {{ substr($booking->agent->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold dark:text-white">{{ $booking->agent->name }}</p>
                                                <p class="text-[10px] text-slate-500">{{ $booking->agent->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider
                                            @if($booking->status === 'approved') bg-emerald-50 text-emerald-600
                                            @elseif($booking->status === 'rejected') bg-red-50 text-red-600
                                            @elseif($booking->status === 'completed') bg-blue-50 text-blue-600
                                            @else bg-amber-50 text-amber-600 @endif">
                                            {{ $booking->status }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-6">{{ $bookings->links() }}</div>
        @endif
    </div>
</div>
</x-app-layout>
