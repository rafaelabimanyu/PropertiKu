{{-- Placeholder Page Component --}}
@props([
    'title' => 'Coming Soon',
    'description' => 'This feature is currently under development.',
    'icon' => '<svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>',
    'accentColor' => 'indigo',
])

<x-app-layout>
    <div class="min-h-screen bg-slate-50 dark:bg-gray-950 flex items-center justify-center p-6">
        <div class="max-w-lg w-full text-center">
            {{-- Animated Background --}}
            <div class="relative mb-8">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-40 h-40 bg-{{ $accentColor }}-500/10 rounded-full blur-3xl animate-pulse"></div>
                </div>
                <div class="relative w-28 h-28 mx-auto bg-white dark:bg-gray-900 rounded-3xl border border-slate-200 dark:border-gray-800 flex items-center justify-center text-{{ $accentColor }}-500 shadow-xl shadow-{{ $accentColor }}-500/10">
                    {!! $icon !!}
                </div>
            </div>

            <h1 class="text-3xl font-black dark:text-white mb-3 tracking-tight">{{ $title }}</h1>
            <p class="text-slate-500 dark:text-slate-400 font-medium mb-8 max-w-md mx-auto leading-relaxed">{{ $description }}</p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-{{ $accentColor }}-600 text-white rounded-2xl font-bold text-xs uppercase tracking-widest hover:bg-{{ $accentColor }}-700 transition shadow-lg shadow-{{ $accentColor }}-500/20">
                    ← Back to Dashboard
                </a>
                <a href="{{ route('home') }}" class="px-6 py-3 bg-white dark:bg-gray-900 text-slate-600 dark:text-slate-400 rounded-2xl font-bold text-xs uppercase tracking-widest border border-slate-200 dark:border-gray-800 hover:border-{{ $accentColor }}-300 transition">
                    Go Home
                </a>
            </div>

            {{-- Status indicator --}}
            <div class="mt-12 inline-flex items-center px-4 py-2 bg-amber-50 dark:bg-amber-900/20 rounded-full">
                <span class="w-2 h-2 bg-amber-500 rounded-full mr-2 animate-pulse"></span>
                <span class="text-[10px] font-black uppercase tracking-widest text-amber-600">Under Development</span>
            </div>
        </div>
    </div>
</x-app-layout>
