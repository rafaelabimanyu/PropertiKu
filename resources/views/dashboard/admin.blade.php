@php
    $menuItems = [
        [
            'label' => 'Analytics',
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
            'label' => 'Reports',
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

<x-dashboard-layout :role="'admin'" :menuItems="$menuItems" :title="'Administrator Panel'" :subtitle="'Monitoring the heart of the AI Property Marketplace.'">

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="relative overflow-hidden bg-white dark:bg-gray-900 p-7 rounded-3xl shadow-sm border border-slate-100 dark:border-gray-800 group hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-24 h-24 bg-violet-500/5 rounded-full -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-violet-100 dark:bg-violet-900/30 rounded-2xl flex items-center justify-center text-violet-600 mb-5 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Total Users</p>
            <h4 class="text-3xl font-black dark:text-white">{{ $totalUsers ?? 0 }}</h4>
            <div class="mt-3 text-[10px] font-bold text-emerald-500 flex items-center">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                +12.5% vs last month
            </div>
        </div>
        <div class="relative overflow-hidden bg-white dark:bg-gray-900 p-7 rounded-3xl shadow-sm border border-slate-100 dark:border-gray-800 group hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-24 h-24 bg-indigo-500/5 rounded-full -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-2xl flex items-center justify-center text-indigo-600 mb-5 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Total Properties</p>
            <h4 class="text-3xl font-black dark:text-white">{{ $totalProperties ?? 0 }}</h4>
            <div class="mt-3 text-[10px] font-bold text-emerald-500 flex items-center">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                +8.2% vs last month
            </div>
        </div>
        <div class="relative overflow-hidden bg-white dark:bg-gray-900 p-7 rounded-3xl shadow-sm border border-slate-100 dark:border-gray-800 group hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-24 h-24 bg-amber-500/5 rounded-full -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-amber-100 dark:bg-amber-900/30 rounded-2xl flex items-center justify-center text-amber-600 mb-5 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Pending Approvals</p>
            <h4 class="text-3xl font-black text-amber-500">14</h4>
            <div class="mt-3 text-[10px] font-bold text-amber-500 uppercase tracking-widest">Action Required</div>
        </div>
        <div class="relative overflow-hidden bg-white dark:bg-gray-900 p-7 rounded-3xl shadow-sm border border-slate-100 dark:border-gray-800 group hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-24 h-24 bg-emerald-500/5 rounded-full -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-2xl flex items-center justify-center text-emerald-600 mb-5 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Server Status</p>
            <h4 class="text-3xl font-black text-emerald-500 italic">Online</h4>
            <div class="mt-3 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Uptime 99.99%</div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        {{-- Traffic Analytics --}}
        <div class="p-8 bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800 shadow-sm">
            <h5 class="font-black dark:text-white mb-6">Traffic Analytics</h5>
            <div class="w-full h-52 bg-slate-50 dark:bg-gray-800 rounded-2xl flex items-end p-4 space-x-2">
                @foreach([35, 55, 42, 70, 60, 85, 75, 90, 65, 78, 88, 95] as $i => $h)
                    <div class="flex-1 bg-gradient-to-t from-violet-600 to-violet-400 rounded-t-lg transition-all duration-700 hover:from-indigo-600 hover:to-indigo-400" style="height: {{ $h }}%; animation: slideUp 0.5s ease {{ $i * 0.08 }}s both;">
                    </div>
                @endforeach
            </div>
            <div class="flex justify-between mt-4 text-[9px] font-bold text-slate-400 uppercase tracking-widest">
                <span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span><span>May</span><span>Jun</span><span>Jul</span><span>Aug</span><span>Sep</span><span>Oct</span><span>Nov</span><span>Dec</span>
            </div>
        </div>

        {{-- Quick Management --}}
        <div class="space-y-6">
            <h5 class="font-black dark:text-white">Quick Management</h5>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('users') }}" class="p-6 bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-10 h-10 bg-violet-100 dark:bg-violet-900/30 rounded-xl flex items-center justify-center text-violet-600 mb-4 group-hover:scale-110 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h6 class="font-bold text-sm mb-1 dark:text-white">Verify Agents</h6>
                    <p class="text-[10px] text-slate-400 font-medium">8 new agent applications waiting for review.</p>
                </a>
                <a href="{{ route('reports') }}" class="p-6 bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center text-blue-600 mb-4 group-hover:scale-110 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h6 class="font-bold text-sm mb-1 dark:text-white">System Logs</h6>
                    <p class="text-[10px] text-slate-400 font-medium">View critical errors and performance logs.</p>
                </a>
                <a href="{{ route('settings') }}" class="p-6 bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-10 h-10 bg-emerald-100 dark:bg-emerald-900/30 rounded-xl flex items-center justify-center text-emerald-600 mb-4 group-hover:scale-110 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
                    </div>
                    <h6 class="font-bold text-sm mb-1 dark:text-white">DB Backup</h6>
                    <p class="text-[10px] text-slate-400 font-medium">Last backup: 2 hours ago. Auto-sync active.</p>
                </a>
                <a href="{{ route('settings') }}" class="p-6 bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-10 h-10 bg-amber-100 dark:bg-amber-900/30 rounded-xl flex items-center justify-center text-amber-600 mb-4 group-hover:scale-110 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <h6 class="font-bold text-sm mb-1 dark:text-white">Global Settings</h6>
                    <p class="text-[10px] text-slate-400 font-medium">Modify marketplace fees and API keys.</p>
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
