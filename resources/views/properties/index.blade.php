<x-app-layout>
    <div class="bg-slate-50 dark:bg-gray-950 min-h-screen">
        <!-- Search & Filter Header -->
        <div class="pt-32 pb-12 bg-white dark:bg-gray-900 border-b border-slate-200 dark:border-gray-800">
            <div class="max-w-7xl mx-auto px-6 sm:px-8">
                <div class="mb-12 text-center lg:text-left">
                    <h1 class="text-4xl lg:text-5xl font-black text-slate-900 dark:text-white mb-4 tracking-tight">Explore <span class="text-gradient">Collections</span></h1>
                    <p class="text-slate-500 dark:text-slate-400 font-medium">Discover 1,200+ premium properties across Indonesia's most exclusive locations.</p>
                </div>
                
                <x-search-floating />
            </div>
        </div>

        <div class="py-20">
            <div class="max-w-7xl mx-auto px-6 sm:px-8">
                <div class="flex flex-col lg:flex-row gap-12">
                    
                    <!-- Sidebar Filters -->
                    <aside class="lg:w-80 flex-shrink-0">
                        <div class="glass dark:glass-dark rounded-[2.5rem] p-8 sticky top-32">
                            <h3 class="text-lg font-black mb-8 uppercase tracking-widest text-indigo-600">Filters</h3>
                            
                            <form action="{{ route('properties.index') }}" method="GET" class="space-y-8">
                                <!-- Maintain Search if exists -->
                                <input type="hidden" name="search" value="{{ request('search') }}">

                                <!-- Price Range -->
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-4">Price Range ($)</label>
                                    <div class="grid grid-cols-2 gap-3">
                                        <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" class="w-full bg-slate-100 dark:bg-gray-800 border-none rounded-2xl text-xs p-3 focus:ring-1 focus:ring-indigo-500">
                                        <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max" class="w-full bg-slate-100 dark:bg-gray-800 border-none rounded-2xl text-xs p-3 focus:ring-1 focus:ring-indigo-500">
                                    </div>
                                </div>

                                <!-- Property Type -->
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-4">Property Type</label>
                                    <select name="type" class="w-full bg-slate-100 dark:bg-gray-800 border-none rounded-2xl text-xs p-3 focus:ring-1 focus:ring-indigo-500">
                                        <option value="">All Types</option>
                                        @foreach(['house' => 'House', 'villa' => 'Villa', 'apartment' => 'Apartment', 'townhouse' => 'Townhouse', 'land' => 'Land', 'office' => 'Office'] as $val => $label)
                                            <option value="{{ $val }}" {{ request('type') == $val ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Bedrooms -->
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-4">Min Bedrooms</label>
                                    <select name="bedrooms" class="w-full bg-slate-100 dark:bg-gray-800 border-none rounded-2xl text-xs p-3 focus:ring-1 focus:ring-indigo-500">
                                        <option value="">Any</option>
                                        @foreach([1,2,3,4,5] as $num)
                                            <option value="{{ $num }}" {{ request('bedrooms') == $num ? 'selected' : '' }}>{{ $num }}+ Beds</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Sorting -->
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-4">Sort By</label>
                                    <select name="sort" class="w-full bg-slate-100 dark:bg-gray-800 border-none rounded-2xl text-xs p-3 focus:ring-1 focus:ring-indigo-500">
                                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest Listed</option>
                                        <option value="cheapest" {{ request('sort') == 'cheapest' ? 'selected' : '' }}>Lowest Price</option>
                                        <option value="expensive" {{ request('sort') == 'expensive' ? 'selected' : '' }}>Highest Price</option>
                                    </select>
                                </div>

                                <!-- Min Area -->
                                <div>
                                    <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-4">Min Area (ft²)</label>
                                    <input type="number" name="min_area" value="{{ request('min_area') }}" placeholder="e.g. 1000" class="w-full bg-slate-100 dark:bg-gray-800 border-none rounded-2xl text-xs p-3 focus:ring-1 focus:ring-indigo-500">
                                </div>

                                <button type="submit" class="w-full py-4 bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-black rounded-2xl text-[10px] uppercase tracking-[0.2em] hover:bg-indigo-600 hover:text-white transition shadow-xl">Apply Filters</button>
                                
                                <a href="{{ route('properties.index') }}" class="block text-center text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-indigo-600 transition">Reset All</a>
                            </form>
                        </div>
                    </aside>

                    <!-- Property Grid -->
                    <main class="flex-1">
                        @if($properties->isEmpty())
                            <div class="py-20 text-center glass dark:glass-dark rounded-[3rem]">
                                <div class="w-20 h-20 bg-slate-100 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h3 class="text-xl font-bold mb-2">No matching properties</h3>
                                <p class="text-slate-500 dark:text-slate-400">Try adjusting your filters or search terms.</p>
                            </div>
                        @else
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                @foreach($properties as $property)
                                    <x-property-card :property="$property" />
                                @endforeach
                            </div>

                            <div class="mt-16">
                                {{ $properties->links() }}
                            </div>
                        @endif
                    </main>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
