<x-app-layout>
    <div class="flex min-h-screen bg-slate-50 dark:bg-gray-950">
        <!-- Dashboard Sidebar -->
        <aside class="hidden lg:flex flex-col w-72 bg-white dark:bg-gray-900 border-r border-slate-200 dark:border-gray-800 pt-10">
            <div class="px-8 mb-10">
                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-indigo-600 mb-2">System Admin</p>
                <h2 class="text-xl font-black dark:text-white tracking-tighter">Command Center</h2>
            </div>
            
            <nav class="flex-1 space-y-2 px-4">
                <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-4 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 rounded-2xl font-bold text-sm transition">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    Analytics
                </a>
                <a href="#" class="flex items-center px-6 py-4 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-gray-800 rounded-2xl font-bold text-sm transition">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    User Management
                </a>
                <a href="{{ route('properties.index') }}" class="flex items-center px-6 py-4 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-gray-800 rounded-2xl font-bold text-sm transition">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    Property Audits
                </a>
                <a href="#" class="flex items-center px-6 py-4 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-gray-800 rounded-2xl font-bold text-sm transition">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Settings
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 lg:p-12 overflow-y-auto">
            <header class="flex justify-between items-center mb-12">
                <div>
                    <h3 class="text-2xl font-black dark:text-white tracking-tight">Administrator Panel</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Monitoring the heart of the AI Property Marketplace.</p>
                </div>
            </header>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div class="glass dark:glass-dark p-8 rounded-[2.5rem] shadow-sm border border-white/10 group hover:shadow-xl transition-all duration-500">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Total Users</p>
                    <h4 class="text-3xl font-black dark:text-white">{{ $totalUsers ?? 0 }}</h4>
                    <div class="mt-4 text-[10px] font-bold text-emerald-500 flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                        +12.5% vs last month
                    </div>
                </div>
                <div class="glass dark:glass-dark p-8 rounded-[2.5rem] shadow-sm border border-white/10 group hover:shadow-xl transition-all duration-500">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Total Properties</p>
                    <h4 class="text-3xl font-black dark:text-white">{{ $totalProperties ?? 0 }}</h4>
                    <div class="mt-4 text-[10px] font-bold text-emerald-500 flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                        +8.2% vs last month
                    </div>
                </div>
                <div class="glass dark:glass-dark p-8 rounded-[2.5rem] shadow-sm border border-white/10 group hover:shadow-xl transition-all duration-500">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Approvals Pending</p>
                    <h4 class="text-3xl font-black text-amber-500">14</h4>
                    <div class="mt-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Action Required</div>
                </div>
                <div class="glass dark:glass-dark p-8 rounded-[2.5rem] shadow-sm border border-white/10 group hover:shadow-xl transition-all duration-500">
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Server Status</p>
                    <h4 class="text-3xl font-black text-emerald-500 italic">Online</h4>
                    <div class="mt-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Uptime 99.99%</div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- System Health Chart Placeholder -->
                <div class="p-10 glass dark:glass-dark rounded-[3rem] border border-white/10 shadow-sm">
                    <h5 class="font-black dark:text-white mb-8">Traffic Analytics</h5>
                    <div class="w-full h-64 bg-slate-100 dark:bg-gray-800 rounded-[2rem] flex items-center justify-center border-2 border-dashed border-slate-200 dark:border-gray-700">
                        <div class="text-center">
                            <svg class="w-12 h-12 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Chart Engine Ready</p>
                        </div>
                    </div>
                </div>

                <!-- Admin Quick Links -->
                <div class="space-y-8">
                    <h5 class="font-black dark:text-white">Quick Management</h5>
                    <div class="grid grid-cols-2 gap-6">
                        <a href="#" class="p-8 bg-white dark:bg-gray-900 rounded-[2rem] border border-slate-100 dark:border-gray-800 hover:shadow-lg transition">
                            <h6 class="font-bold text-sm mb-2">Verify Agents</h6>
                            <p class="text-[10px] text-slate-400 font-medium">8 new agent applications waiting for review.</p>
                        </a>
                        <a href="#" class="p-8 bg-white dark:bg-gray-900 rounded-[2rem] border border-slate-100 dark:border-gray-800 hover:shadow-lg transition">
                            <h6 class="font-bold text-sm mb-2">System Logs</h6>
                            <p class="text-[10px] text-slate-400 font-medium">View critical errors and performance logs.</p>
                        </a>
                        <a href="#" class="p-8 bg-white dark:bg-gray-900 rounded-[2rem] border border-slate-100 dark:border-gray-800 hover:shadow-lg transition">
                            <h6 class="font-bold text-sm mb-2">DB Backup</h6>
                            <p class="text-[10px] text-slate-400 font-medium">Last backup: 2 hours ago (Auto-sync active).</p>
                        </a>
                        <a href="#" class="p-8 bg-white dark:bg-gray-900 rounded-[2rem] border border-slate-100 dark:border-gray-800 hover:shadow-lg transition">
                            <h6 class="font-bold text-sm mb-2">Global Settings</h6>
                            <p class="text-[10px] text-slate-400 font-medium">Modify marketplace fees and API keys.</p>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
