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

<x-dashboard-layout :role="'buyer'" :menuItems="$menuItems" :title="'Welcome back, ' . Auth::user()->name . '!'" :subtitle="'Here\'s what\'s happening with your property search today.'">

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="relative overflow-hidden bg-white dark:bg-gray-900 p-7 rounded-3xl shadow-sm border border-slate-100 dark:border-gray-800 group hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-24 h-24 bg-indigo-500/5 rounded-full -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-2xl flex items-center justify-center text-indigo-600 mb-5 group-hover:scale-110 group-hover:rotate-6 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Saved</p>
            <h4 class="text-3xl font-black dark:text-white">12</h4>
        </div>
        <div class="relative overflow-hidden bg-white dark:bg-gray-900 p-7 rounded-3xl shadow-sm border border-slate-100 dark:border-gray-800 group hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-24 h-24 bg-emerald-500/5 rounded-full -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-2xl flex items-center justify-center text-emerald-600 mb-5 group-hover:scale-110 group-hover:rotate-6 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Views</p>
            <h4 class="text-3xl font-black dark:text-white">458</h4>
        </div>
        <div class="relative overflow-hidden bg-white dark:bg-gray-900 p-7 rounded-3xl shadow-sm border border-slate-100 dark:border-gray-800 group hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-24 h-24 bg-blue-500/5 rounded-full -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-2xl flex items-center justify-center text-blue-600 mb-5 group-hover:scale-110 group-hover:rotate-6 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Bookings</p>
            <h4 class="text-3xl font-black dark:text-white">3</h4>
        </div>
        <div class="relative overflow-hidden bg-white dark:bg-gray-900 p-7 rounded-3xl shadow-sm border border-slate-100 dark:border-gray-800 group hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-24 h-24 bg-purple-500/5 rounded-full -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-2xl flex items-center justify-center text-purple-600 mb-5 group-hover:scale-110 group-hover:rotate-6 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Market Trend</p>
            <h4 class="text-3xl font-black text-emerald-500">+12%</h4>
        </div>
    </div>

    {{-- Content Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Recommended Properties --}}
        <div class="lg:col-span-2">
            <div class="flex justify-between items-center mb-6">
                <h5 class="text-lg font-black dark:text-white tracking-tight">Recommended for You</h5>
                <a href="{{ route('properties.index') }}" class="text-[10px] font-black uppercase tracking-widest text-indigo-600 hover:text-indigo-700 transition">See All</a>
            </div>

            <div class="space-y-4">
                @foreach([
                    ['Modern Minimalist Villa', 'Bali, Indonesia', '$1,250,000', 'Sale'],
                    ['Luxury Apartment CBD', 'Jakarta, Indonesia', '$5,500/mo', 'Rent'],
                ] as $i => $prop)
                    <div class="flex items-center p-5 bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800 shadow-sm group hover:shadow-md hover:-translate-y-0.5 transition-all duration-300">
                        <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-indigo-100 to-indigo-50 dark:from-indigo-900/30 dark:to-indigo-800/20 overflow-hidden mr-5 flex-shrink-0 flex items-center justify-center">
                            <svg class="w-8 h-8 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h6 class="font-bold dark:text-white mb-1 group-hover:text-indigo-600 transition truncate">{{ $prop[0] }}</h6>
                            <p class="text-xs text-slate-500 mb-3 flex items-center">
                                <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                {{ $prop[1] }}
                            </p>
                            <div class="flex items-center space-x-3">
                                <span class="text-xs font-black text-indigo-600">{{ $prop[2] }}</span>
                                <span class="px-2 py-0.5 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 rounded-full text-[8px] font-black uppercase">{{ $prop[3] }}</span>
                            </div>
                        </div>
                        <a href="{{ route('properties.index') }}" class="p-3 bg-slate-50 dark:bg-gray-800 rounded-xl hover:bg-indigo-600 hover:text-white text-slate-400 transition ml-3 flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Upgrade CTA --}}
            <div class="mt-6 p-6 bg-gradient-to-br from-indigo-600 to-emerald-600 rounded-3xl text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest mb-1 opacity-80">Upgrade Account</p>
                        <p class="text-sm font-bold">Become an agent to start listing properties.</p>
                    </div>
                    <a href="{{ route('guide') }}" class="px-5 py-2.5 bg-white text-indigo-600 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-slate-50 transition flex-shrink-0">Learn More</a>
                </div>
            </div>
        </div>

        {{-- Activity & Market Sidebar --}}
        <div class="lg:col-span-1 space-y-6">
            {{-- Recent Activity Timeline --}}
            <div class="p-6 bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800 shadow-sm">
                <h5 class="font-black dark:text-white mb-6">Recent Activity</h5>
                <div class="relative pl-6 space-y-6 before:absolute before:left-0 before:top-2 before:bottom-2 before:w-0.5 before:bg-slate-100 dark:before:bg-gray-800">
                    <div class="relative">
                        <div class="absolute -left-8 top-0.5 w-3 h-3 rounded-full bg-indigo-600 border-4 border-white dark:border-gray-900"></div>
                        <p class="text-[10px] font-black uppercase text-slate-400 mb-0.5">Today, 10:45 AM</p>
                        <p class="text-sm font-bold dark:text-white">Saved "Modern Villa" to favorites</p>
                    </div>
                    <div class="relative">
                        <div class="absolute -left-8 top-0.5 w-3 h-3 rounded-full bg-slate-300 border-4 border-white dark:border-gray-900"></div>
                        <p class="text-[10px] font-black uppercase text-slate-400 mb-0.5">Yesterday</p>
                        <p class="text-sm font-bold dark:text-white">Searched "Apartments in Jakarta"</p>
                    </div>
                    <div class="relative">
                        <div class="absolute -left-8 top-0.5 w-3 h-3 rounded-full bg-slate-200 border-4 border-white dark:border-gray-900"></div>
                        <p class="text-[10px] font-black uppercase text-slate-400 mb-0.5">3 days ago</p>
                        <p class="text-sm font-bold dark:text-white">Booked visit to "Ocean View"</p>
                    </div>
                </div>
            </div>

            {{-- Market Health --}}
            <div class="p-6 bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800 shadow-sm">
                <h6 class="font-black mb-4 dark:text-white">Market Health</h6>
                <div class="w-full h-24 bg-indigo-50 dark:bg-indigo-900/20 rounded-2xl flex items-end p-2 space-x-1">
                    @foreach([40,70,50,90,60,80,95] as $h)
                        <div class="flex-1 bg-indigo-600 rounded-t-lg transition-all duration-500 hover:bg-indigo-500" style="height: {{ $h }}%"></div>
                    @endforeach
                </div>
                <p class="text-[10px] text-slate-500 mt-3 text-center font-medium">📈 Prices are rising in your area.</p>
            </div>
        </div>
    </div>

</x-dashboard-layout>
