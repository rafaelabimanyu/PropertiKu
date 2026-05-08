<x-app-layout>
    <div class="flex min-h-screen bg-slate-50 dark:bg-gray-950">
        <!-- Dashboard Sidebar -->
        <aside class="hidden lg:flex flex-col w-72 bg-white dark:bg-gray-900 border-r border-slate-200 dark:border-gray-800 pt-10">
            <div class="px-8 mb-10">
                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-emerald-600 mb-2">Agent Center</p>
                <h2 class="text-xl font-black dark:text-white tracking-tighter">Property Manager</h2>
            </div>
            
            <nav class="flex-1 space-y-2 px-4">
                <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-4 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 rounded-2xl font-bold text-sm transition">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('properties.index') }}" class="flex items-center px-6 py-4 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-gray-800 rounded-2xl font-bold text-sm transition">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    My Listings
                </a>
                <a href="{{ route('properties.create') }}" class="flex items-center px-6 py-4 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-gray-800 rounded-2xl font-bold text-sm transition">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Add Property
                </a>
                <a href="#" class="flex items-center px-6 py-4 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-gray-800 rounded-2xl font-bold text-sm transition">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Potential Leads
                </a>
            </nav>

            <div class="p-8 border-t border-slate-100 dark:border-gray-800">
                <div class="p-6 bg-slate-900 rounded-3xl text-white">
                    <p class="text-[10px] font-black uppercase tracking-widest mb-2">Pro Subscription</p>
                    <p class="text-xs font-medium mb-4 opacity-80">You have 5 premium listing slots remaining.</p>
                    <div class="w-full h-1 bg-white/20 rounded-full mb-4">
                        <div class="w-1/2 h-full bg-emerald-500 rounded-full"></div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 lg:p-12 overflow-y-auto">
            <header class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-12 gap-6">
                <div>
                    <h3 class="text-2xl font-black dark:text-white tracking-tight">Agent Dashboard</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Manage your listings and track your performance effortlessly.</p>
                </div>
                <a href="{{ route('properties.create') }}" class="px-8 py-4 bg-emerald-600 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-700 transition shadow-xl shadow-emerald-500/20">
                    + New Property
                </a>
            </header>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div class="glass dark:glass-dark p-8 rounded-[2.5rem] shadow-sm border border-white/10 group hover:shadow-xl transition-all duration-500">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-2xl flex items-center justify-center text-emerald-600 mb-6 group-hover:scale-110 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Active Listings</p>
                    <h4 class="text-3xl font-black dark:text-white">{{ $totalProperties ?? 0 }}</h4>
                </div>
                <div class="glass dark:glass-dark p-8 rounded-[2.5rem] shadow-sm border border-white/10 group hover:shadow-xl transition-all duration-500">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-2xl flex items-center justify-center text-blue-600 mb-6 group-hover:scale-110 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">New Leads</p>
                    <h4 class="text-3xl font-black dark:text-white">24</h4>
                </div>
                <div class="glass dark:glass-dark p-8 rounded-[2.5rem] shadow-sm border border-white/10 group hover:shadow-xl transition-all duration-500">
                    <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-2xl flex items-center justify-center text-indigo-600 mb-6 group-hover:scale-110 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Total Views</p>
                    <h4 class="text-3xl font-black dark:text-white">8.2k</h4>
                </div>
                <div class="glass dark:glass-dark p-8 rounded-[2.5rem] shadow-sm border border-white/10 group hover:shadow-xl transition-all duration-500">
                    <div class="w-12 h-12 bg-amber-100 dark:bg-amber-900/30 rounded-2xl flex items-center justify-center text-amber-600 mb-6 group-hover:scale-110 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Revenue Est.</p>
                    <h4 class="text-3xl font-black dark:text-white">$4.5k</h4>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Recent Listings Table -->
                <div class="lg:col-span-2 overflow-hidden bg-white dark:bg-gray-900 rounded-[2.5rem] border border-slate-200 dark:border-gray-800 shadow-sm">
                    <div class="p-8 border-b border-slate-100 dark:border-gray-800 flex justify-between items-center">
                        <h5 class="font-black dark:text-white">Recent Listings</h5>
                        <a href="{{ route('properties.index') }}" class="text-[10px] font-black uppercase text-indigo-600">View All</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="text-[10px] font-black uppercase tracking-widest text-slate-400 bg-slate-50/50 dark:bg-gray-800/50">
                                    <th class="px-8 py-4">Property</th>
                                    <th class="px-8 py-4">Price</th>
                                    <th class="px-8 py-4">Status</th>
                                    <th class="px-8 py-4">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50 dark:divide-gray-800">
                                @forelse($recentProperties ?? [] as $property)
                                    <tr class="group hover:bg-slate-50 dark:hover:bg-gray-800 transition">
                                        <td class="px-8 py-6">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 rounded-lg bg-indigo-50 dark:bg-indigo-900/30 overflow-hidden mr-4">
                                                    @if($property->image)
                                                        <img src="{{ asset('storage/' . $property->image) }}" class="w-full h-full object-cover">
                                                    @endif
                                                </div>
                                                <span class="text-sm font-bold dark:text-white">{{ $property->title }}</span>
                                            </div>
                                        </td>
                                        <td class="px-8 py-6 text-sm font-bold text-slate-600 dark:text-slate-400">${{ number_format($property->price) }}</td>
                                        <td class="px-8 py-6">
                                            <span class="px-3 py-1 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 rounded-full text-[8px] font-black uppercase">{{ $property->status }}</span>
                                        </td>
                                        <td class="px-8 py-6">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('properties.edit', $property) }}" class="p-2 text-slate-400 hover:text-indigo-600 transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-8 py-12 text-center text-slate-400 text-sm font-medium">No properties listed yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Leads / Performance Sidebar -->
                <div class="lg:col-span-1 space-y-12">
                    <div class="p-8 glass dark:glass-dark rounded-[2.5rem] border border-white/10 shadow-sm">
                        <h6 class="font-black mb-8 dark:text-white">Performance Overview</h6>
                        <div class="space-y-6">
                            @foreach([['Views', 75, 'emerald'], ['Inquiries', 45, 'blue'], ['Conversion', 30, 'indigo']] as $perf)
                                <div>
                                    <div class="flex justify-between text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">
                                        <span>{{ $perf[0] }}</span>
                                        <span>{{ $perf[1] }}%</span>
                                    </div>
                                    <div class="w-full h-1.5 bg-slate-100 dark:bg-gray-800 rounded-full">
                                        <div class="h-full bg-{{ $perf[2] }}-500 rounded-full" style="width: {{ $perf[1] }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="p-8 bg-gradient-to-br from-slate-900 to-indigo-950 rounded-[2.5rem] text-white">
                        <h6 class="font-black mb-4">Quick Tip</h6>
                        <p class="text-xs opacity-70 leading-relaxed mb-6">Properties with more than 5 high-quality images receive 3x more engagement from premium buyers.</p>
                        <a href="{{ route('properties.create') }}" class="block text-center py-3 bg-white/10 hover:bg-white/20 rounded-xl text-[10px] font-black uppercase tracking-widest transition">Add Images Now</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
