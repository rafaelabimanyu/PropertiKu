{{-- Dashboard Layout Component --}}
{{-- Usage: <x-dashboard-layout :role="'admin'" :menuItems="[...]" :title="'...'" :subtitle="'...'"> --}}
@props([
    'role' => 'buyer',
    'menuItems' => [],
    'title' => 'Dashboard',
    'subtitle' => '',
    'accentColor' => 'indigo',
])

@php
    $colorMap = [
        'buyer' => ['accent' => 'indigo', 'label' => 'Member Area', 'heading' => 'Buyer Panel'],
        'agent' => ['accent' => 'emerald', 'label' => 'Agent Center', 'heading' => 'Property Manager'],
        'admin' => ['accent' => 'violet', 'label' => 'System Admin', 'heading' => 'Command Center'],
    ];
    $config = $colorMap[$role] ?? $colorMap['buyer'];
    $accent = $config['accent'];
@endphp

<x-app-layout>
    <div class="flex min-h-screen bg-slate-50 dark:bg-gray-950" x-data="{ sidebarOpen: false }">
        
        {{-- Mobile Sidebar Overlay --}}
        <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-40 bg-gray-900/50 backdrop-blur-sm lg:hidden"
             @click="sidebarOpen = false">
        </div>

        {{-- Sidebar --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
               class="fixed lg:static inset-y-0 left-0 z-50 flex flex-col w-72 bg-white dark:bg-gray-900 border-r border-slate-200 dark:border-gray-800 pt-24 lg:pt-10 transform lg:translate-x-0 transition-transform duration-300 ease-in-out">
            
            {{-- Close button mobile --}}
            <button @click="sidebarOpen = false" class="lg:hidden absolute top-6 right-4 p-2 text-slate-400 hover:text-slate-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            {{-- Header --}}
            <div class="px-8 mb-10">
                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-{{ $accent }}-600 mb-2">{{ $config['label'] }}</p>
                <h2 class="text-xl font-black dark:text-white tracking-tighter">{{ $config['heading'] }}</h2>
            </div>

            {{-- User Info --}}
            <div class="px-6 mb-6">
                <div class="flex items-center p-4 bg-slate-50 dark:bg-gray-800/50 rounded-2xl">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-{{ $accent }}-500 to-{{ $accent }}-700 flex items-center justify-center text-white font-bold text-sm">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="ml-3 flex-1 min-w-0">
                        <p class="text-sm font-bold dark:text-white truncate">{{ Auth::user()->name }}</p>
                        <span class="inline-block px-2 py-0.5 bg-{{ $accent }}-100 dark:bg-{{ $accent }}-900/30 text-{{ $accent }}-600 dark:text-{{ $accent }}-400 text-[9px] font-black rounded uppercase tracking-wider">{{ ucfirst(Auth::user()->role) }}</span>
                    </div>
                </div>
            </div>
            
            {{-- Navigation --}}
            <nav class="flex-1 space-y-1.5 px-4 overflow-y-auto">
                @foreach($menuItems as $item)
                    @php
                        $isActive = request()->routeIs($item['route'] ?? '') || request()->url() === ($item['url'] ?? '');
                    @endphp
                    <a href="{{ $item['url'] ?? '#' }}" 
                       class="flex items-center px-5 py-3.5 rounded-2xl font-bold text-sm transition-all duration-200
                              {{ $isActive 
                                 ? 'bg-'.$accent.'-50 dark:'.'bg-'.$accent.'-900/30 text-'.$accent.'-600 shadow-sm' 
                                 : 'text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-gray-800' }}">
                        <div class="w-9 h-9 rounded-xl flex items-center justify-center mr-3
                                    {{ $isActive 
                                       ? 'bg-'.$accent.'-100 dark:'.'bg-'.$accent.'-900/50 text-'.$accent.'-600' 
                                       : 'bg-slate-100 dark:bg-gray-800 text-slate-400' }}">
                            {!! $item['icon'] !!}
                        </div>
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            {{-- Sidebar Footer --}}
            <div class="p-6 border-t border-slate-100 dark:border-gray-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center px-5 py-3 bg-red-50 dark:bg-red-900/20 text-red-600 rounded-2xl font-bold text-sm hover:bg-red-100 dark:hover:bg-red-900/30 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 overflow-y-auto">
            {{-- Top Bar --}}
            <div class="sticky top-0 z-30 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-slate-200 dark:border-gray-800 px-6 lg:px-10 py-4 flex items-center justify-between">
                {{-- Mobile menu toggle --}}
                <button @click="sidebarOpen = true" class="lg:hidden p-2 -ml-2 text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-white transition rounded-xl hover:bg-slate-100 dark:hover:bg-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>

                <div class="flex-1 ml-4 lg:ml-0">
                    <h3 class="text-lg font-black dark:text-white tracking-tight">{{ $title }}</h3>
                    @if($subtitle)
                        <p class="text-slate-500 dark:text-slate-400 text-xs font-medium hidden sm:block">{{ $subtitle }}</p>
                    @endif
                </div>

                <div class="flex items-center space-x-3">
                    {{-- Notification bell --}}
                    <button class="relative p-2.5 bg-slate-100 dark:bg-gray-800 rounded-xl text-slate-500 hover:text-{{ $accent }}-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    
                    {{-- Profile link --}}
                    <a href="{{ route('profile.edit') }}" class="hidden sm:flex items-center px-3 py-2 bg-slate-100 dark:bg-gray-800 rounded-xl text-slate-500 hover:text-{{ $accent }}-600 transition text-xs font-bold">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Profile
                    </a>
                </div>
            </div>

            {{-- Page Content --}}
            <div class="p-6 lg:p-10">
                {{ $slot }}
            </div>
        </main>
    </div>
</x-app-layout>
