{{-- Toast notification component - include in app layout --}}
@if(session('success') || session('error'))
<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
     x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4"
     x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4"
     class="fixed bottom-6 right-6 z-[100] max-w-sm">
    <div class="flex items-center p-4 rounded-2xl shadow-2xl border backdrop-blur-xl
                {{ session('success') ? 'bg-emerald-50/90 dark:bg-emerald-900/90 border-emerald-200 dark:border-emerald-800' : 'bg-red-50/90 dark:bg-red-900/90 border-red-200 dark:border-red-800' }}">
        <div class="w-8 h-8 rounded-full flex items-center justify-center mr-3 flex-shrink-0
                    {{ session('success') ? 'bg-emerald-500 text-white' : 'bg-red-500 text-white' }}">
            @if(session('success'))
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            @else
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            @endif
        </div>
        <p class="text-sm font-bold {{ session('success') ? 'text-emerald-800 dark:text-emerald-200' : 'text-red-800 dark:text-red-200' }}">
            {{ session('success') ?? session('error') }}
        </p>
        <button @click="show = false" class="ml-3 p-1 rounded-lg hover:bg-black/5 transition flex-shrink-0">
            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
</div>
@endif
