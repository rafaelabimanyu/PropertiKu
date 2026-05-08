<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Property Listings') }}
            </h2>
            @can('create', App\Models\Property::class)
                <a href="{{ route('properties.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition">
                    {{ __('Add Property') }}
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($properties as $property)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg border border-gray-100 dark:border-gray-700 group hover:shadow-md transition">
                        <div class="aspect-video bg-gray-200 dark:bg-gray-700 overflow-hidden">
                            @if($property->image)
                                <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="flex items-center justify-center h-full text-gray-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white truncate pr-4">{{ $property->title }}</h3>
                                <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300 uppercase">
                                    {{ $property->status }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $property->city }}
                            </p>
                            <div class="flex items-center justify-between mt-auto border-t border-gray-100 dark:border-gray-700 pt-4">
                                <p class="text-xl font-bold text-indigo-600 dark:text-indigo-400">
                                    ${{ number_format($property->price, 0) }}
                                </p>
                                <a href="{{ route('properties.show', $property) }}" class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-indigo-600 transition">
                                    {{ __('Details') }} &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $properties->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
