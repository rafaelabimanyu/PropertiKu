<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $property->title }}
            </h2>
            <div class="flex gap-2">
                @can('update', $property)
                    <a href="{{ route('properties.edit', $property) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition">
                        {{ __('Edit') }}
                    </a>
                @endcan
                @can('delete', $property)
                    <form action="{{ route('properties.destroy', $property) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 transition">
                            {{ __('Delete') }}
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    <!-- Image Section -->
                    <div class="bg-gray-100 dark:bg-gray-900 aspect-video lg:aspect-auto">
                        @if($property->image)
                            <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="flex items-center justify-center h-full text-gray-400">
                                <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            </div>
                        @endif
                    </div>

                    <!-- Details Section -->
                    <div class="p-8">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $property->status === 'sale' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                For {{ ucfirst($property->status) }}
                            </span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">ID: #{{ str_pad($property->id, 5, '0', STR_PAD_LEFT) }}</span>
                        </div>

                        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-2">{{ $property->title }}</h1>
                        <p class="text-indigo-600 dark:text-indigo-400 text-2xl font-bold mb-6">${{ number_format($property->price, 0) }}</p>

                        <div class="grid grid-cols-3 gap-4 mb-8 border-y dark:border-gray-700 py-6">
                            <div class="text-center">
                                <p class="text-xs text-gray-500 uppercase mb-1">{{ __('Bedrooms') }}</p>
                                <p class="text-lg font-bold">{{ $property->bedrooms }}</p>
                            </div>
                            <div class="text-center border-x dark:border-gray-700">
                                <p class="text-xs text-gray-500 uppercase mb-1">{{ __('Bathrooms') }}</p>
                                <p class="text-lg font-bold">{{ $property->bathrooms }}</p>
                            </div>
                            <div class="text-center">
                                <p class="text-xs text-gray-500 uppercase mb-1">{{ __('Area') }}</p>
                                <p class="text-lg font-bold">{{ $property->area }} <span class="text-sm font-normal">sqft</span></p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h4 class="font-bold text-gray-900 dark:text-white">{{ __('Location') }}</h4>
                            <p class="text-gray-600 dark:text-gray-400 flex items-start">
                                <svg class="w-5 h-5 mr-2 mt-0.5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $property->address }}, {{ $property->city }}
                            </p>

                            <h4 class="font-bold text-gray-900 dark:text-white pt-4">{{ __('Description') }}</h4>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed whitespace-pre-line">
                                {{ $property->description }}
                            </p>
                        </div>

                        <div class="mt-10 pt-6 border-t dark:border-gray-700 flex items-center">
                            <div class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center text-indigo-700 dark:text-indigo-300 font-bold mr-3">
                                {{ substr($property->user->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $property->user->name }}</p>
                                <p class="text-xs text-gray-500">{{ __('Property Agent') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
