<x-app-layout>
    <div class="flex min-h-screen bg-slate-50 dark:bg-gray-950">
        <!-- Dashboard Sidebar -->
        <aside class="hidden lg:flex flex-col w-72 bg-white dark:bg-gray-900 border-r border-slate-200 dark:border-gray-800 pt-10">
            <div class="px-8 mb-10">
                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-indigo-600 mb-2">Member Area</p>
                <h2 class="text-xl font-black dark:text-white tracking-tighter">Buyer Panel</h2>
            </div>
            
            <nav class="flex-1 space-y-2 px-4">
                <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-4 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 rounded-2xl font-bold text-sm transition">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Overview
                </a>
                <a href="{{ route('properties.index') }}" class="flex items-center px-6 py-4 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-gray-800 rounded-2xl font-bold text-sm transition">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    Saved Properties
                </a>
                <a href="#" class="flex items-center px-6 py-4 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-gray-800 rounded-2xl font-bold text-sm transition">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Recent Views
                </a>
                <a href="{{ route('profile.edit') }}" class="flex items-center px-6 py-4 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-gray-800 rounded-2xl font-bold text-sm transition">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Profile Settings
                </a>
            </nav>

            <div class="p-8 border-t border-slate-100 dark:border-gray-800">
                <div class="p-6 bg-gradient-to-br from-indigo-600 to-emerald-600 rounded-3xl text-white">
                    <p class="text-[10px] font-black uppercase tracking-widest mb-2">Upgrade Account</p>
                    <p class="text-xs font-medium mb-4 opacity-80">Become an agent to start listing properties.</p>
                    <button class="w-full py-2 bg-white text-indigo-600 rounded-xl text-[10px] font-black uppercase tracking-widest">Learn More</button>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 lg:p-12 overflow-y-auto">
            <header class="flex justify-between items-center mb-12">
                <div>
                    <h3 class="text-2xl font-black dark:text-white tracking-tight">Welcome back, {{ Auth::user()->name }}!</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Here's what's happening with your property search today.</p>
                </div>
                <div class="flex space-x-4">
                    <button class="p-3 bg-white dark:bg-gray-900 rounded-2xl border border-slate-200 dark:border-gray-800 text-slate-500 hover:text-indigo-600 transition shadow-sm">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </button>
                </div>
            </header>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div class="glass dark:glass-dark p-8 rounded-[2.5rem] shadow-sm border border-white/10 group hover:shadow-xl hover:-translate-y-2 transition-all duration-500">
                    <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-2xl flex items-center justify-center text-indigo-600 mb-6 group-hover:rotate-12 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Saved</p>
                    <h4 class="text-3xl font-black dark:text-white">12</h4>
                </div>
                <div class="glass dark:glass-dark p-8 rounded-[2.5rem] shadow-sm border border-white/10 group hover:shadow-xl hover:-translate-y-2 transition-all duration-500">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-2xl flex items-center justify-center text-emerald-600 mb-6 group-hover:rotate-12 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Views</p>
                    <h4 class="text-3xl font-black dark:text-white">458</h4>
                </div>
                <div class="glass dark:glass-dark p-8 rounded-[2.5rem] shadow-sm border border-white/10 group hover:shadow-xl hover:-translate-y-2 transition-all duration-500">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-2xl flex items-center justify-center text-blue-600 mb-6 group-hover:rotate-12 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path></svg>
                    </div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Inquiries</p>
                    <h4 class="text-3xl font-black dark:text-white">3</h4>
                </div>
                <div class="glass dark:glass-dark p-8 rounded-[2.5rem] shadow-sm border border-white/10 group hover:shadow-xl hover:-translate-y-2 transition-all duration-500">
                    <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-2xl flex items-center justify-center text-purple-600 mb-6 group-hover:rotate-12 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Trends</p>
                    <h4 class="text-3xl font-black text-emerald-500">+12%</h4>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Recent Properties -->
                <div class="lg:col-span-2">
                    <div class="flex justify-between items-center mb-8">
                        <h5 class="text-lg font-black dark:text-white tracking-tight">Recommended for You</h5>
                        <a href="{{ route('properties.index') }}" class="text-[10px] font-black uppercase tracking-widest text-indigo-600">See All</a>
                    </div>
                    
                    <div class="space-y-6">
                        @foreach([1,2] as $i)
                            <div class="flex items-center p-6 bg-white dark:bg-gray-900 rounded-[2rem] border border-slate-100 dark:border-gray-800 shadow-sm group hover:shadow-md transition duration-300">
                                <div class="w-24 h-24 rounded-2xl bg-slate-100 dark:bg-gray-800 overflow-hidden mr-6">
                                    <div class="w-full h-full bg-indigo-50 flex items-center justify-center text-indigo-300">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h6 class="font-bold dark:text-white mb-1 group-hover:text-indigo-600 transition">Sample Luxury Villa #{{ $i }}</h6>
                                    <p class="text-xs text-slate-500 mb-4 flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                        Bali, Indonesia
                                    </p>
                                    <div class="flex items-center space-x-4">
                                        <span class="text-xs font-black text-indigo-600">$1,250,000</span>
                                        <span class="px-3 py-1 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 rounded-full text-[8px] font-black uppercase">Featured</span>
                                    </div>
                                </div>
                                <button class="p-3 bg-slate-50 dark:bg-gray-800 rounded-xl hover:bg-indigo-600 hover:text-white transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Activity Feed / Sidebar -->
                <div class="lg:col-span-1">
                    <h5 class="text-lg font-black dark:text-white tracking-tight mb-8">Recent Activity</h5>
                    <div class="relative pl-8 space-y-10 before:absolute before:left-0 before:top-2 before:bottom-2 before:w-0.5 before:bg-slate-100 dark:before:bg-gray-800">
                        <div class="relative">
                            <div class="absolute -left-10 top-0 w-4 h-4 rounded-full bg-indigo-600 border-4 border-white dark:border-gray-950"></div>
                            <p class="text-[10px] font-black uppercase text-slate-400 mb-1">Today, 10:45 AM</p>
                            <p class="text-sm font-bold dark:text-white">Saved "Modern Villa" to favorites</p>
                        </div>
                        <div class="relative">
                            <div class="absolute -left-10 top-0 w-4 h-4 rounded-full bg-slate-300 border-4 border-white dark:border-gray-950"></div>
                            <p class="text-[10px] font-black uppercase text-slate-400 mb-1">Yesterday</p>
                            <p class="text-sm font-bold dark:text-white">Searched for "Apartments in Jakarta"</p>
                        </div>
                    </div>

                    <div class="mt-12 p-8 glass dark:glass-dark rounded-[2.5rem] border border-white/10">
                        <h6 class="font-black mb-4">Market Health</h6>
                        <div class="w-full h-24 bg-indigo-50 dark:bg-indigo-900/20 rounded-2xl flex items-end p-2 space-x-1">
                            @foreach([40,70,50,90,60,80,95] as $h)
                                <div class="flex-1 bg-indigo-600 rounded-t-lg transition-all duration-500" style="height: {{ $h }}%"></div>
                            @endforeach
                        </div>
                        <p class="text-[10px] text-slate-500 mt-4 text-center font-medium">Prices are rising in your area.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
