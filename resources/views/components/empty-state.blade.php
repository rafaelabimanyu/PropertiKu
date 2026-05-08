@props([
    'title' => 'No data found',
    'subtitle' => 'Try adjusting your filters or checking back later.',
    'icon' => null,
    'actionText' => null,
    'actionUrl' => null,
])

<div class="text-center py-20 px-6 bg-slate-50 dark:bg-gray-900/50 rounded-[3rem] border-2 border-dashed border-slate-200 dark:border-gray-800">
    <div class="w-20 h-20 bg-white dark:bg-gray-800 rounded-[2rem] flex items-center justify-center mx-auto mb-6 text-slate-300 shadow-sm">
        @if($icon)
            {!! $icon !!}
        @else
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
        @endif
    </div>
    <h3 class="text-xl font-black text-slate-900 dark:text-white mb-2 tracking-tight">{{ $title }}</h3>
    <p class="text-slate-500 dark:text-slate-400 font-medium text-sm max-w-sm mx-auto mb-8">{{ $subtitle }}</p>
    
    @if($actionText && $actionUrl)
        <a href="{{ $actionUrl }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white font-black rounded-2xl text-[10px] uppercase tracking-widest hover:bg-indigo-700 transition shadow-xl shadow-indigo-500/20">
            {{ $actionText }}
        </a>
    @endif
</div>
