<div class="max-w-5xl mx-auto glass-dark p-3 rounded-[2.5rem] shadow-2xl border border-white/10 flex flex-col lg:flex-row gap-3">
    <form action="{{ route('properties.index') }}" method="GET" class="flex flex-col lg:flex-row w-full gap-3">
        <!-- Keyword Search -->
        <div class="flex-1 px-6 py-4 flex items-center bg-white/5 rounded-3xl hover:bg-white/10 transition group">
            <svg class="w-5 h-5 text-indigo-400 mr-4 group-hover:scale-110 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, city, or area..." class="w-full bg-transparent border-none focus:ring-0 text-white placeholder-gray-400 text-sm">
        </div>

        <!-- Property Type -->
        <div class="lg:w-48 px-6 py-4 flex items-center bg-white/5 rounded-3xl hover:bg-white/10 transition">
            <select name="status" class="w-full bg-transparent border-none focus:ring-0 text-white text-sm appearance-none cursor-pointer">
                <option value="" class="bg-gray-900">Any Type</option>
                <option value="sale" {{ request('status') == 'sale' ? 'selected' : '' }} class="bg-gray-900">For Sale</option>
                <option value="rent" {{ request('status') == 'rent' ? 'selected' : '' }} class="bg-gray-900">For Rent</option>
            </select>
        </div>

        <!-- Price Range -->
        <div class="lg:w-64 px-6 py-4 flex items-center bg-white/5 rounded-3xl hover:bg-white/10 transition">
            <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max Price ($)" class="w-full bg-transparent border-none focus:ring-0 text-white placeholder-gray-400 text-sm">
        </div>

        <button type="submit" class="lg:px-12 py-4 bg-gradient-to-r from-indigo-500 to-emerald-500 text-white font-black rounded-3xl hover:shadow-xl hover:shadow-indigo-500/20 transition-all active:scale-95 uppercase tracking-widest text-xs">
            Search
        </button>
    </form>
</div>
