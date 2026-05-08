@php
    $menuItems = [
        [
            'label' => 'Dashboard',
            'url' => route('dashboard.agent'),
            'route' => 'dashboard.agent',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>',
        ],
        [
            'label' => 'My Listings',
            'url' => route('properties.index'),
            'route' => 'properties.index',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>',
        ],
        [
            'label' => 'Add Property',
            'url' => route('properties.create'),
            'route' => 'properties.create',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>',
        ],
        [
            'label' => 'Bookings',
            'url' => route('bookings'),
            'route' => 'bookings',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>',
        ],
        [
            'label' => 'Messages',
            'url' => route('chat.inbox'),
            'route' => 'chat.*',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>',
        ],
        [
            'label' => 'Profile',
            'url' => route('profile.edit'),
            'route' => 'profile.edit',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>',
        ],
    ];
@endphp

<x-dashboard-layout :role="'agent'" :menuItems="$menuItems" :title="'Sales Dashboard'" :subtitle="'Manage your pipeline, leads, and listings efficiently.'">

    {{-- Action Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
        <div>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Welcome back to your workspace, <span class="font-bold text-emerald-600">{{ Auth::user()->name }}</span></p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('bookings') }}" class="px-5 py-3 bg-white dark:bg-gray-900 border border-slate-200 dark:border-gray-800 text-slate-600 dark:text-slate-300 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:border-emerald-500 hover:text-emerald-600 transition shadow-sm inline-flex items-center">
                Review Bookings @if(($pendingBookings ?? 0) > 0) <span class="ml-2 w-5 h-5 bg-emerald-500 text-white rounded-full flex items-center justify-center text-[9px]">{{ $pendingBookings }}</span> @endif
            </a>
            <a href="{{ route('properties.create') }}" class="px-6 py-3 bg-emerald-600 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-700 transition shadow-xl shadow-emerald-500/20 hover:-translate-y-0.5 inline-flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                New Listing
            </a>
        </div>
    </div>

    {{-- KPI Pipeline Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-10">
        {{-- Active Listings --}}
        <div class="bg-white dark:bg-gray-900 p-6 rounded-[2rem] border-l-4 border-l-slate-400 border-y border-r border-slate-100 dark:border-y-gray-800 dark:border-r-gray-800 shadow-sm flex items-center justify-between group hover:border-l-emerald-500 transition-colors">
            <div>
                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Active Listings</p>
                <h4 class="text-3xl font-black dark:text-white">{{ $totalProperties ?? 0 }}</h4>
            </div>
            <div class="w-12 h-12 bg-slate-50 dark:bg-gray-800 rounded-xl flex items-center justify-center text-slate-400 group-hover:bg-emerald-50 group-hover:text-emerald-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
        </div>
        {{-- Lead Inquiries --}}
        <div class="bg-white dark:bg-gray-900 p-6 rounded-[2rem] border-l-4 border-l-blue-400 border-y border-r border-slate-100 dark:border-y-gray-800 dark:border-r-gray-800 shadow-sm flex items-center justify-between group hover:border-l-blue-500 transition-colors">
            <div>
                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">New Inquiries</p>
                <h4 class="text-3xl font-black dark:text-white">{{ $unreadMessages ?? 0 }}</h4>
            </div>
            <div class="w-12 h-12 bg-slate-50 dark:bg-gray-800 rounded-xl flex items-center justify-center text-slate-400 group-hover:bg-blue-50 group-hover:text-blue-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
            </div>
        </div>
        {{-- Pending Surveys --}}
        <div class="bg-white dark:bg-gray-900 p-6 rounded-[2rem] border-l-4 border-l-amber-400 border-y border-r border-slate-100 dark:border-y-gray-800 dark:border-r-gray-800 shadow-sm flex items-center justify-between group hover:border-l-amber-500 transition-colors">
            <div>
                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Pending Surveys</p>
                <h4 class="text-3xl font-black dark:text-white">{{ $pendingBookings ?? 0 }}</h4>
            </div>
            <div class="w-12 h-12 bg-slate-50 dark:bg-gray-800 rounded-xl flex items-center justify-center text-slate-400 group-hover:bg-amber-50 group-hover:text-amber-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
        {{-- Total Bookings / Completed --}}
        <div class="bg-white dark:bg-gray-900 p-6 rounded-[2rem] border-l-4 border-l-indigo-400 border-y border-r border-slate-100 dark:border-y-gray-800 dark:border-r-gray-800 shadow-sm flex items-center justify-between group hover:border-l-indigo-500 transition-colors">
            <div>
                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Total Bookings</p>
                <h4 class="text-3xl font-black dark:text-white">{{ $totalBookings ?? 0 }}</h4>
            </div>
            <div class="w-12 h-12 bg-slate-50 dark:bg-gray-800 rounded-xl flex items-center justify-center text-slate-400 group-hover:bg-indigo-50 group-hover:text-indigo-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Main Pipeline Content --}}
        <div class="lg:col-span-2 space-y-8">
            
            {{-- Upcoming Survey Schedule --}}
            <div class="bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 dark:border-gray-800 flex justify-between items-center bg-slate-50/50 dark:bg-gray-800/30">
                    <h5 class="font-black dark:text-white flex items-center">
                        <svg class="w-5 h-5 mr-2 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Upcoming Survey Schedule
                    </h5>
                    <a href="{{ route('bookings') }}" class="text-[10px] font-black uppercase text-emerald-600 hover:text-emerald-700 transition">View Full Calendar</a>
                </div>
                <div class="p-6">
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-slate-50 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-sm font-medium text-slate-500">No surveys scheduled for today.</p>
                        <p class="text-xs text-slate-400 mt-1">Check your pending bookings to approve requests.</p>
                    </div>
                </div>
            </div>

            {{-- Recent Listings Table --}}
            <div class="bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 dark:border-gray-800 flex justify-between items-center">
                    <h5 class="font-black dark:text-white">Active Properties</h5>
                    <a href="{{ route('properties.index') }}" class="text-[10px] font-black uppercase text-emerald-600 hover:text-emerald-700 transition">Manage All</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-[10px] font-black uppercase tracking-widest text-slate-400 bg-slate-50/50 dark:bg-gray-800/50 border-y border-slate-100 dark:border-gray-800">
                                <th class="px-6 py-4">Property</th>
                                <th class="px-6 py-4">Price</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50 dark:divide-gray-800">
                            @forelse($recentProperties ?? [] as $property)
                                <tr class="group hover:bg-slate-50 dark:hover:bg-gray-800 transition">
                                    <td class="px-6 py-5">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-gray-800 overflow-hidden mr-3 flex-shrink-0 relative">
                                                @if($property->image)
                                                    <img src="{{ asset('storage/' . $property->image) }}" class="w-full h-full object-cover">
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center text-slate-400">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <span class="text-sm font-bold dark:text-white truncate">{{ $property->title }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 text-sm font-bold text-slate-600 dark:text-slate-400">${{ number_format($property->price) }}</td>
                                    <td class="px-6 py-5">
                                        <span class="px-3 py-1 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 rounded-full text-[8px] font-black uppercase">{{ $property->status }}</span>
                                    </td>
                                    <td class="px-6 py-5">
                                        <a href="{{ route('properties.edit', $property) }}" class="p-2 text-slate-400 hover:text-emerald-600 transition inline-block bg-white dark:bg-gray-900 rounded-lg shadow-sm border border-slate-100 dark:border-gray-800 group-hover:border-emerald-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-slate-400 text-sm font-medium">No properties listed yet. <a href="{{ route('properties.create') }}" class="text-emerald-600 font-bold hover:underline">Create your first listing!</a></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Performance Sidebar --}}
        <div class="lg:col-span-1 space-y-6">
            
            {{-- AI Lead Score Placeholder --}}
            <div class="p-6 bg-gradient-to-br from-slate-900 to-emerald-950 rounded-3xl text-white relative overflow-hidden group shadow-lg">
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-emerald-500/20 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative z-10">
                    <div class="flex justify-between items-center mb-6">
                        <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <span class="px-3 py-1 bg-white/10 rounded-full text-[9px] font-black uppercase tracking-widest text-emerald-300">Beta</span>
                    </div>
                    <h6 class="font-black text-2xl mb-1">High Conversion</h6>
                    <p class="text-xs text-emerald-100/70 leading-relaxed mb-6">Your listings are performing 24% better than the market average this week.</p>
                    
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-[9px] font-black uppercase tracking-widest text-emerald-200 mb-2">
                                <span>Lead Response Rate</span>
                                <span>92%</span>
                            </div>
                            <div class="w-full h-1.5 bg-white/10 rounded-full overflow-hidden">
                                <div class="h-full bg-emerald-400 rounded-full w-[92%]"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-[9px] font-black uppercase tracking-widest text-emerald-200 mb-2">
                                <span>Booking Approval</span>
                                <span>85%</span>
                            </div>
                            <div class="w-full h-1.5 bg-white/10 rounded-full overflow-hidden">
                                <div class="h-full bg-emerald-400 rounded-full w-[85%]"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Performance Overview Placeholder --}}
            <div class="p-6 bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800 shadow-sm">
                <h6 class="font-black mb-6 dark:text-white flex items-center">
                    <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                    Market Reach
                </h6>
                <div class="h-40 flex items-end justify-between space-x-2 pb-4 border-b border-slate-100 dark:border-gray-800 mb-4">
                    {{-- Fake Chart Bars --}}
                    @foreach([40, 60, 45, 80, 50, 90, 75] as $height)
                        <div class="w-full bg-slate-100 dark:bg-gray-800 rounded-t-lg relative group">
                            <div class="absolute bottom-0 w-full bg-gradient-to-t from-emerald-500 to-emerald-400 rounded-t-lg transition-all duration-500 group-hover:from-emerald-400 group-hover:to-emerald-300" style="height: {{ $height }}%"></div>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-between text-[9px] font-bold text-slate-400 uppercase tracking-widest">
                    <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
                </div>
            </div>
        </div>
    </div>

</x-dashboard-layout>
