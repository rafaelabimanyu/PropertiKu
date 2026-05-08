<x-app-layout>
<div class="bg-slate-50 dark:bg-gray-950 min-h-screen pt-28 pb-20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-black dark:text-white tracking-tight">My Favorites</h1>
                <p class="text-sm text-slate-500">{{ $favorites->total() }} saved properties</p>
            </div>
            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-white dark:bg-gray-900 border border-slate-200 dark:border-gray-800 rounded-xl text-xs font-bold text-slate-600 hover:text-indigo-600 transition">← Dashboard</a>
        </div>

        @if($favorites->isEmpty())
            <x-empty-state 
                title="Your wishlist is empty" 
                subtitle="Save your dream properties to track them easily and get notified of price updates."
                actionText="Explore Properties"
                :actionUrl="route('properties.index')"
            />
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($favorites as $property)
                    <div class="bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                        <div class="relative h-48 bg-slate-200 dark:bg-gray-800 overflow-hidden">
                            @if($property->image)
                                <img src="{{ asset('storage/' . $property->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('favorites.destroy', $property) }}" class="absolute top-3 right-3">
                                @csrf @method('DELETE')
                                <button class="w-9 h-9 bg-white/90 dark:bg-gray-900/90 backdrop-blur rounded-full flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition shadow-lg">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                                </button>
                            </form>
                        </div>
                        <div class="p-5">
                            <a href="{{ route('properties.show', $property) }}" class="block">
                                <h3 class="font-bold dark:text-white mb-1 truncate group-hover:text-indigo-600 transition">{{ $property->title }}</h3>
                                <p class="text-xs text-slate-500 mb-2 flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                    {{ $property->city }}
                                </p>
                                <p class="text-lg font-black text-indigo-600">${{ number_format($property->price) }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">{{ $favorites->links() }}</div>
        @endif
    </div>
</div>
</x-app-layout>
