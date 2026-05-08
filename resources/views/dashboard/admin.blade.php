@php
    $menuItems = [
        [
            'label' => 'Analytics Overview',
            'url' => route('dashboard.admin'),
            'route' => 'dashboard.admin',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>',
        ],
        [
            'label' => 'User Management',
            'url' => route('users'),
            'route' => 'users',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>',
        ],
        [
            'label' => 'Properties',
            'url' => route('properties.index'),
            'route' => 'properties.*',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>',
        ],
        [
            'label' => 'Bookings',
            'url' => route('bookings'),
            'route' => 'bookings',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>',
        ],
        [
            'label' => 'System Reports',
            'url' => route('reports'),
            'route' => 'reports',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>',
        ],
        [
            'label' => 'Settings',
            'url' => route('settings'),
            'route' => 'settings',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>',
        ],
        [
            'label' => 'Profile',
            'url' => route('profile.edit'),
            'route' => 'profile.edit',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>',
        ],
    ];
@endphp

<x-dashboard-layout :role="'admin'" :menuItems="$menuItems" :title="'Executive Overview'" :subtitle="'System-wide analytics and platform administration.'">

    {{-- Stats Grid - Enterprise Dark Style --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        {{-- Total Users --}}
        <div class="relative overflow-hidden bg-slate-900 text-white p-7 rounded-[2rem] shadow-xl shadow-slate-900/10 border border-slate-800 group hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-indigo-500/20 to-purple-500/0 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-indigo-400 mb-5 border border-white/5 group-hover:bg-indigo-500 group-hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Platform Users</p>
            <div class="flex items-end space-x-3">
                <h4 class="text-3xl font-black">{{ $totalUsers ?? 0 }}</h4>
                <span class="text-xs font-bold text-emerald-400 pb-1 flex items-center">
                    <svg class="w-3 h-3 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                    +12.5%
                </span>
            </div>
        </div>

        {{-- Total Properties --}}
        <div class="relative overflow-hidden bg-slate-900 text-white p-7 rounded-[2rem] shadow-xl shadow-slate-900/10 border border-slate-800 group hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-500/20 to-cyan-500/0 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-blue-400 mb-5 border border-white/5 group-hover:bg-blue-500 group-hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Active Listings</p>
            <div class="flex items-end space-x-3">
                <h4 class="text-3xl font-black">{{ $totalProperties ?? 0 }}</h4>
                <span class="text-xs font-bold text-emerald-400 pb-1 flex items-center">
                    <svg class="w-3 h-3 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                    +8.2%
                </span>
            </div>
        </div>

        {{-- Pending Bookings --}}
        <div class="relative overflow-hidden bg-slate-900 text-white p-7 rounded-[2rem] shadow-xl shadow-slate-900/10 border border-slate-800 group hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-amber-500/20 to-orange-500/0 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-amber-400 mb-5 border border-white/5 group-hover:bg-amber-500 group-hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Booking Pipeline</p>
            <div class="flex items-end space-x-3">
                <h4 class="text-3xl font-black text-amber-400">{{ $pendingBookings ?? 0 }}</h4>
                <span class="text-xs font-bold text-slate-400 pb-1">/ {{ $totalBookings ?? 0 }} Total</span>
            </div>
        </div>

        {{-- System Health --}}
        <div class="relative overflow-hidden bg-gradient-to-br from-indigo-600 to-indigo-900 text-white p-7 rounded-[2rem] shadow-xl border border-indigo-500 group hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-indigo-200 mb-5 border border-white/10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-indigo-300 mb-1">System Health</p>
            <div class="flex items-end space-x-3">
                <h4 class="text-3xl font-black text-white">99.9%</h4>
                <span class="text-xs font-bold text-emerald-300 pb-1">Optimal</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Platform Analytics Placeholder --}}
        <div class="lg:col-span-2">
            <div class="p-8 bg-white dark:bg-gray-900 rounded-[2.5rem] border border-slate-100 dark:border-gray-800 shadow-sm">
                <div class="flex justify-between items-center mb-8">
                    <h5 class="font-black dark:text-white text-lg">Growth Analytics</h5>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 bg-slate-100 dark:bg-gray-800 text-slate-600 dark:text-slate-300 rounded-lg text-[10px] font-bold uppercase tracking-wider hover:bg-slate-200 dark:hover:bg-gray-700 transition">Week</button>
                        <button class="px-3 py-1 bg-indigo-600 text-white rounded-lg text-[10px] font-bold uppercase tracking-wider shadow-sm">Month</button>
                        <button class="px-3 py-1 bg-slate-100 dark:bg-gray-800 text-slate-600 dark:text-slate-300 rounded-lg text-[10px] font-bold uppercase tracking-wider hover:bg-slate-200 dark:hover:bg-gray-700 transition">Year</button>
                    </div>
                </div>
                
                {{-- Chart Placeholder --}}
                <div class="w-full h-64 bg-slate-50 dark:bg-gray-800/50 rounded-2xl flex items-end p-6 space-x-3 relative overflow-hidden">
                    {{-- Grid lines --}}
                    <div class="absolute inset-0 flex flex-col justify-between py-6 px-6 z-0 opacity-20 dark:opacity-10 pointer-events-none">
                        <div class="w-full border-t border-slate-400"></div>
                        <div class="w-full border-t border-slate-400"></div>
                        <div class="w-full border-t border-slate-400"></div>
                        <div class="w-full border-t border-slate-400"></div>
                    </div>
                    
                    {{-- Bars --}}
                    @foreach([35, 55, 42, 70, 60, 85, 75, 90, 65, 78, 88, 95] as $i => $h)
                        <div class="flex-1 flex justify-center z-10 group relative">
                            <div class="w-full max-w-[2rem] bg-gradient-to-t from-indigo-600 to-indigo-400 rounded-t-xl transition-all duration-700 group-hover:from-indigo-500 group-hover:to-indigo-300 group-hover:opacity-100 opacity-80" style="height: {{ $h }}%; animation: slideUp 0.5s ease {{ $i * 0.05 }}s both;"></div>
                            <div class="absolute -top-8 bg-slate-900 text-white text-[10px] font-bold px-2 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition shadow-lg">{{ $h }}k</div>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-between mt-4 px-2 text-[9px] font-bold text-slate-400 uppercase tracking-widest">
                    <span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span><span>May</span><span>Jun</span><span>Jul</span><span>Aug</span><span>Sep</span><span>Oct</span><span>Nov</span><span>Dec</span>
                </div>
            </div>
        </div>

        {{-- Management Panels --}}
        <div class="lg:col-span-1 space-y-6">
            
            {{-- Approval Queue Placeholder --}}
            <div class="p-6 bg-white dark:bg-gray-900 rounded-[2.5rem] border border-slate-100 dark:border-gray-800 shadow-sm">
                <div class="flex justify-between items-center mb-6">
                    <h6 class="font-black dark:text-white flex items-center">
                        <div class="w-2 h-2 bg-amber-500 rounded-full mr-2 animate-pulse"></div>
                        Action Required
                    </h6>
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-slate-50 dark:bg-gray-800 rounded-2xl group border border-transparent hover:border-slate-200 dark:hover:border-gray-700 transition">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 rounded-xl flex items-center justify-center mr-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold dark:text-white">Agent Verifications</p>
                                <p class="text-[10px] text-slate-500 font-medium">8 Pending Reviews</p>
                            </div>
                        </div>
                        <a href="{{ route('users') }}" class="w-8 h-8 rounded-full bg-white dark:bg-gray-900 shadow flex items-center justify-center text-slate-400 group-hover:text-indigo-600 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-slate-50 dark:bg-gray-800 rounded-2xl group border border-transparent hover:border-slate-200 dark:hover:border-gray-700 transition">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 text-blue-600 rounded-xl flex items-center justify-center mr-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold dark:text-white">Flagged Listings</p>
                                <p class="text-[10px] text-slate-500 font-medium">2 Properties Reported</p>
                            </div>
                        </div>
                        <a href="{{ route('properties.index') }}" class="w-8 h-8 rounded-full bg-white dark:bg-gray-900 shadow flex items-center justify-center text-slate-400 group-hover:text-blue-600 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- System Shortcuts --}}
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('settings') }}" class="p-5 bg-white dark:bg-gray-900 rounded-[2rem] border border-slate-100 dark:border-gray-800 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group text-center flex flex-col items-center">
                    <div class="w-12 h-12 bg-slate-50 dark:bg-gray-800 rounded-2xl flex items-center justify-center text-slate-500 group-hover:text-indigo-600 group-hover:bg-indigo-50 transition mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-600 dark:text-slate-300">Settings</span>
                </a>
                <a href="{{ route('reports') }}" class="p-5 bg-white dark:bg-gray-900 rounded-[2rem] border border-slate-100 dark:border-gray-800 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group text-center flex flex-col items-center">
                    <div class="w-12 h-12 bg-slate-50 dark:bg-gray-800 rounded-2xl flex items-center justify-center text-slate-500 group-hover:text-indigo-600 group-hover:bg-indigo-50 transition mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-600 dark:text-slate-300">DB Backup</span>
                </a>
            </div>
            
        </div>
    </div>

    <style>
        @keyframes slideUp {
            from { height: 0; opacity: 0; }
            to { opacity: 1; }
        }
    </style>

</x-dashboard-layout>
