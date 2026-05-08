@props(['property'])

<div {{ $attributes->merge(['class' => 'card-premium group overflow-hidden']) }}>
    <div class="relative aspect-[4/3] overflow-hidden">
        @if($property->image)
            <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
        @else
            <div class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            </div>
        @endif
        
        <!-- Badges -->
        <div class="absolute top-6 left-6 flex flex-col gap-2">
            @if($property->is_featured)
                <span class="px-4 py-1.5 bg-indigo-600 text-white rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg flex items-center">
                    <svg class="w-3 h-3 mr-1.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14l-5-4.87 6.91-1.01L12 2z"></path></svg>
                    Featured
                </span>
            @endif
            <span class="px-4 py-1.5 bg-white/90 dark:bg-gray-900/90 backdrop-blur-md rounded-full text-[10px] font-bold uppercase tracking-widest {{ $property->status === 'sale' ? 'text-emerald-600' : 'text-blue-600' }}">
                For {{ ucfirst($property->status) }}
            </span>
            <span class="px-3 py-1 bg-slate-900/80 backdrop-blur text-white rounded-full text-[9px] font-bold uppercase tracking-widest self-start">
                {{ ucfirst($property->type) }}
            </span>
            @if($property->user->is_verified)
                <span class="px-3 py-1 bg-emerald-500/90 backdrop-blur text-white rounded-full text-[8px] font-bold uppercase tracking-widest self-start flex items-center">
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path></svg>
                    Verified
                </span>
            @endif
        </div>

        <!-- Price Overlay -->
        <div class="absolute bottom-6 left-6 right-6">
            <div class="glass dark:glass-dark rounded-2xl p-4 flex justify-between items-center transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                <p class="text-xl font-black text-indigo-600 dark:text-indigo-400">
                    ${{ number_format($property->price, 0) }}
                </p>
                <a href="{{ route('properties.show', $property) }}" class="p-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
    </div>

    <div class="p-8">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h3 class="text-xl font-extrabold text-gray-900 dark:text-white mb-1 line-clamp-1 group-hover:text-indigo-600 transition duration-300">
                    {{ $property->title }}
                </h3>
                <p class="text-gray-500 dark:text-gray-400 flex items-center text-sm">
                    <svg class="w-4 h-4 mr-1.5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                    {{ $property->city }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4 pt-6 border-t border-gray-100 dark:border-gray-700">
            <div class="flex flex-col items-center">
                <span class="text-[10px] text-gray-400 uppercase font-bold tracking-tighter mb-1">Beds</span>
                <span class="text-sm font-bold text-gray-700 dark:text-gray-300">{{ $property->bedrooms }}</span>
            </div>
            <div class="flex flex-col items-center border-x border-gray-100 dark:border-gray-700 px-2">
                <span class="text-[10px] text-gray-400 uppercase font-bold tracking-tighter mb-1">Baths</span>
                <span class="text-sm font-bold text-gray-700 dark:text-gray-300">{{ $property->bathrooms }}</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="text-[10px] text-gray-400 uppercase font-bold tracking-tighter mb-1">Area</span>
                <span class="text-sm font-bold text-gray-700 dark:text-gray-300">{{ number_format($property->area, 0) }} <span class="text-[8px]">ft²</span></span>
            </div>
        </div>
    </div>
</div>
