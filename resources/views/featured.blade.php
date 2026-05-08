<x-app-layout>
    <div class="bg-slate-50 dark:bg-gray-950 min-h-screen">
        <!-- Header -->
        <div class="pt-32 pb-12 bg-white dark:bg-gray-900 border-b border-slate-200 dark:border-gray-800">
            <div class="max-w-7xl mx-auto px-6 sm:px-8">
                <div class="text-center">
                    <span class="inline-block px-4 py-1.5 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 text-[10px] font-black uppercase tracking-[0.2em] rounded-full mb-6">
                        Exclusivity Guaranteed
                    </span>
                    <h1 class="text-4xl lg:text-6xl font-black text-slate-900 dark:text-white mb-6 tracking-tight">Featured <span class="text-gradient">Properties</span></h1>
                    <p class="text-slate-500 dark:text-slate-400 font-medium max-w-2xl mx-auto">Discover our handpicked selection of premium estates, futuristic villas, and luxury apartments designed for the extraordinary.</p>
                </div>
            </div>
        </div>

        <div class="py-24">
            <div class="max-w-7xl mx-auto px-6 sm:px-8">
                @if($featuredProperties->isEmpty())
                    <div class="py-20 text-center glass dark:glass-dark rounded-[3rem]">
                        <div class="w-20 h-20 bg-slate-100 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2">No featured properties yet</h3>
                        <p class="text-slate-500 dark:text-slate-400">Check back later for our exclusive updates.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                        @foreach($featuredProperties as $property)
                            <x-property-card :property="$property" />
                        @endforeach
                    </div>
                @endif

                <!-- CTA -->
                <div class="mt-32 relative bg-indigo-600 rounded-[3rem] p-12 lg:p-20 overflow-hidden text-center">
                    <div class="relative z-10 max-w-2xl mx-auto">
                        <h2 class="text-3xl lg:text-5xl font-black text-white mb-8">Looking for Something More Specific?</h2>
                        <a href="{{ route('properties.index') }}" class="inline-flex items-center px-10 py-4 bg-white text-indigo-600 font-black rounded-2xl hover:bg-slate-50 transition shadow-2xl uppercase tracking-widest text-xs">Explore All Listings</a>
                    </div>
                    <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
