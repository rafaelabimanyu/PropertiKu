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
            'label' => 'Leads',
            'url' => route('leads'),
            'route' => 'leads',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>',
        ],
        [
            'label' => 'Profile',
            'url' => route('profile.edit'),
            'route' => 'profile.edit',
            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>',
        ],
    ];
@endphp

<x-dashboard-layout :role="'agent'" :menuItems="$menuItems" :title="'Agent Dashboard'" :subtitle="'Manage your listings and track your performance effortlessly.'">

    {{-- Action Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
        <div>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Welcome back, <span class="font-bold text-emerald-600">{{ Auth::user()->name }}</span></p>
        </div>
        <a href="{{ route('properties.create') }}" class="px-6 py-3 bg-emerald-600 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-700 transition shadow-xl shadow-emerald-500/20 hover:-translate-y-0.5 inline-flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            New Property
        </a>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="relative overflow-hidden bg-white dark:bg-gray-900 p-7 rounded-3xl shadow-sm border border-slate-100 dark:border-gray-800 group hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-24 h-24 bg-emerald-500/5 rounded-full -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-2xl flex items-center justify-center text-emerald-600 mb-5 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Active Listings</p>
            <h4 class="text-3xl font-black dark:text-white">{{ $totalProperties ?? 0 }}</h4>
        </div>
        <div class="relative overflow-hidden bg-white dark:bg-gray-900 p-7 rounded-3xl shadow-sm border border-slate-100 dark:border-gray-800 group hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-24 h-24 bg-blue-500/5 rounded-full -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-2xl flex items-center justify-center text-blue-600 mb-5 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">New Leads</p>
            <h4 class="text-3xl font-black dark:text-white">24</h4>
        </div>
        <div class="relative overflow-hidden bg-white dark:bg-gray-900 p-7 rounded-3xl shadow-sm border border-slate-100 dark:border-gray-800 group hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-24 h-24 bg-indigo-500/5 rounded-full -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-2xl flex items-center justify-center text-indigo-600 mb-5 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Total Views</p>
            <h4 class="text-3xl font-black dark:text-white">8.2k</h4>
        </div>
        <div class="relative overflow-hidden bg-white dark:bg-gray-900 p-7 rounded-3xl shadow-sm border border-slate-100 dark:border-gray-800 group hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
            <div class="absolute top-0 right-0 w-24 h-24 bg-amber-500/5 rounded-full -mr-8 -mt-8 group-hover:scale-150 transition-transform duration-700"></div>
            <div class="w-12 h-12 bg-amber-100 dark:bg-amber-900/30 rounded-2xl flex items-center justify-center text-amber-600 mb-5 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Revenue Est.</p>
            <h4 class="text-3xl font-black dark:text-white">$4.5k</h4>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Recent Listings Table --}}
        <div class="lg:col-span-2 overflow-hidden bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800 shadow-sm">
            <div class="p-6 border-b border-slate-100 dark:border-gray-800 flex justify-between items-center">
                <h5 class="font-black dark:text-white">Recent Listings</h5>
                <a href="{{ route('properties.index') }}" class="text-[10px] font-black uppercase text-emerald-600 hover:text-emerald-700 transition">View All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-[10px] font-black uppercase tracking-widest text-slate-400 bg-slate-50/50 dark:bg-gray-800/50">
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
                                        <div class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-900/30 overflow-hidden mr-3 flex-shrink-0">
                                            @if($property->image)
                                                <img src="{{ asset('storage/' . $property->image) }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-emerald-400">
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
                                    <a href="{{ route('properties.edit', $property) }}" class="p-2 text-slate-400 hover:text-emerald-600 transition inline-block">
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

        {{-- Performance Sidebar --}}
        <div class="lg:col-span-1 space-y-6">
            <div class="p-6 bg-white dark:bg-gray-900 rounded-3xl border border-slate-100 dark:border-gray-800 shadow-sm">
                <h6 class="font-black mb-6 dark:text-white">Performance Overview</h6>
                <div class="space-y-5">
                    @foreach([['Views', 75, 'bg-emerald-500'], ['Inquiries', 45, 'bg-blue-500'], ['Conversion', 30, 'bg-indigo-500']] as $perf)
                        <div>
                            <div class="flex justify-between text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">
                                <span>{{ $perf[0] }}</span>
                                <span>{{ $perf[1] }}%</span>
                            </div>
                            <div class="w-full h-2 bg-slate-100 dark:bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full {{ $perf[2] }} rounded-full transition-all duration-1000" style="width: {{ $perf[1] }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="p-6 bg-gradient-to-br from-slate-900 to-emerald-950 rounded-3xl text-white">
                <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h6 class="font-black mb-2">Pro Tip</h6>
                <p class="text-xs opacity-70 leading-relaxed mb-5">Properties with 5+ high-quality images receive 3x more engagement from premium buyers.</p>
                <a href="{{ route('properties.create') }}" class="block text-center py-3 bg-white/10 hover:bg-white/20 rounded-xl text-[10px] font-black uppercase tracking-widest transition">Add Images Now</a>
            </div>
        </div>
    </div>

</x-dashboard-layout>
