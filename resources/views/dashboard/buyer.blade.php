@php
    $menuItems = [
        [
            'label' => 'Overview',
            'url' => route('dashboard.buyer'),
            'route' => 'dashboard.buyer',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>',
        ],
        [
            'label' => 'Favorites',
            'url' => route('favorites'),
            'route' => 'favorites',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>',
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
            'label' => 'Browse Properties',
            'url' => route('properties.index'),
            'route' => 'properties.index',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>',
        ],
        [
            'label' => 'Profile',
            'url' => route('profile.edit'),
            'route' => 'profile.edit',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>',
        ],
    ];
@endphp

<x-dashboard-layout :role="'buyer'" :menuItems="$menuItems" :title="'Good '. (date('H') < 12 ? 'Morning' : (date('H') < 18 ? 'Afternoon' : 'Evening')) .', ' . Auth::user()->name" :subtitle="'Welcome to your luxury property portal.'">

    {{-- Quick Search --}}
    <div class="mb-10">
        <form action="{{ route('properties.index') }}" method="GET" class="relative group">
            <input type="text" name="search" placeholder="Search for your dream home by city, title, or address..." class="w-full pl-14 pr-6 py-5 bg-white dark:bg-gray-900 border-0 rounded-3xl shadow-sm group-hover:shadow-lg transition-all duration-300 font-medium text-slate-700 dark:text-slate-200 focus:ring-4 focus:ring-blue-500/20">
            <svg class="w-6 h-6 absolute left-5 top-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <button type="submit" class="absolute right-3 top-3 bottom-3 px-6 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-bold text-xs uppercase tracking-widest transition">Find</button>
        </form>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="relative overflow-hidden bg-gradient-to-br from-blue-500 to-blue-700 p-7 rounded-3xl shadow-lg border border-blue-400/20 group hover:shadow-blue-500/30 hover:-translate-y-1 transition-all duration-500 text-white">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 group-hover:rotate-6 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest opacity-80 mb-1">Saved Properties</p>
            <h4 class="text-3xl font-black">{{ $favCount ?? 0 }}</h4>
        </div>
        <div class="relative overflow-hidden bg-white dark:bg-gray-900 p-7 rounded-3xl shadow-sm border border-slate-100 dark:border-gray-800 group hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-24 h-24 bg-indigo-500/5 rounded-full -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-indigo-50 dark:bg-indigo-900/30 rounded-2xl flex items-center justify-center text-indigo-600 mb-5 group-hover:scale-110 group-hover:-rotate-6 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Unread Messages</p>
            <h4 class="text-3xl font-black dark:text-white">{{ $unreadMessages ?? 0 }}</h4>
        </div>
        <div class="relative overflow-hidden bg-white dark:bg-gray-900 p-7 rounded-3xl shadow-sm border border-slate-100 dark:border-gray-800 group hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-24 h-24 bg-emerald-500/5 rounded-full -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-emerald-50 dark:bg-emerald-900/30 rounded-2xl flex items-center justify-center text-emerald-600 mb-5 group-hover:scale-110 group-hover:rotate-6 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">My Bookings</p>
            <h4 class="text-3xl font-black dark:text-white">{{ $bookingCount ?? 0 }}</h4>
        </div>
        
        {{-- AI Recommendation Placeholder --}}
        <div class="relative overflow-hidden bg-gradient-to-br from-slate-900 to-slate-800 p-7 rounded-3xl shadow-lg border border-slate-700 group text-white">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center mb-5">
                <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-purple-300 mb-1">AI Match Score</p>
            <div class="flex items-end">
                <h4 class="text-3xl font-black">94</h4><span class="text-xs text-slate-400 ml-1 mb-1">%</span>
            </div>
            <p class="text-[9px] text-slate-400 mt-2">Based on your recent views</p>
        </div>
    </div>

    {{-- Content Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- AI Recommended Properties --}}
        <div class="lg:col-span-2">
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                    <h5 class="text-lg font-black dark:text-white tracking-tight">AI Recommended for You</h5>
                </div>
                <a href="{{ route('properties.index') }}" class="text-[10px] font-black uppercase tracking-widest text-blue-600 hover:text-blue-700 transition">Browse All</a>
            </div>

            <div class="space-y-4">
                @forelse($recentProperties ?? [] as $prop)
                    <div class="flex items-center p-4 bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800 shadow-sm group hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="w-24 h-24 rounded-2xl bg-slate-100 dark:bg-gray-800 overflow-hidden mr-5 flex-shrink-0 flex items-center justify-center relative">
                            @if($prop->image)
                                <img src="{{ asset('storage/' . $prop->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                        </div>
                        <div class="flex-1 min-w-0 pr-4">
                            <h6 class="font-bold dark:text-white mb-1 text-base group-hover:text-blue-600 transition truncate">{{ $prop->title }}</h6>
                            <p class="text-xs text-slate-500 mb-3 flex items-center">
                                <svg class="w-3.5 h-3.5 mr-1 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                {{ $prop->city }}
                            </p>
                            <div class="flex items-center space-x-3">
                                <span class="text-sm font-black text-blue-600">${{ number_format($prop->price) }}</span>
                                <span class="px-2 py-0.5 bg-blue-50 dark:bg-blue-900/30 text-blue-600 rounded-full text-[9px] font-black uppercase tracking-wider">{{ $prop->status }}</span>
                            </div>
                        </div>
                        <a href="{{ route('properties.show', $prop) }}" class="p-4 bg-slate-50 dark:bg-gray-800 rounded-2xl hover:bg-blue-600 hover:text-white text-slate-400 transition ml-3 flex-shrink-0 shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                @empty
                    <div class="text-center py-16 bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800">
                        <div class="w-16 h-16 bg-slate-50 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <p class="text-slate-500 font-medium text-sm">No properties available.</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Side Widgets --}}
        <div class="lg:col-span-1 space-y-6">
            {{-- Upcoming Surveys --}}
            <div class="bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800 p-6 shadow-sm">
                <h5 class="font-black dark:text-white mb-6 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Upcoming Surveys
                </h5>
                <div class="text-center py-10">
                    <p class="text-xs text-slate-500 font-medium mb-4">You have no upcoming surveys scheduled.</p>
                    <a href="{{ route('properties.index') }}" class="inline-block px-5 py-2.5 bg-slate-50 dark:bg-gray-800 text-slate-600 dark:text-slate-300 font-bold text-[10px] uppercase tracking-widest rounded-xl hover:bg-emerald-50 hover:text-emerald-600 transition">Find a Property</a>
                </div>
            </div>

            {{-- Support CTA --}}
            <div class="p-8 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-3xl text-white relative overflow-hidden group">
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur rounded-xl flex items-center justify-center mb-6 border border-white/20">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h6 class="font-black text-xl mb-2">Need Expert Help?</h6>
                    <p class="text-xs text-blue-100 leading-relaxed mb-6">Our premium concierge service can help you find exactly what you're looking for.</p>
                    <button class="w-full py-3.5 bg-white text-blue-700 font-black rounded-xl text-[10px] uppercase tracking-widest hover:bg-blue-50 transition shadow-lg">Contact Concierge</button>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
