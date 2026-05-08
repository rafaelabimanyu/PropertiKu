<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Property') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div class="col-span-2">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>

                            <!-- Price -->
                            <div>
                                <x-input-label for="price" :value="__('Price ($)')" />
                                <x-text-input id="price" name="price" type="number" step="0.01" class="mt-1 block w-full" :value="old('price')" required />
                                <x-input-error class="mt-2" :messages="$errors->get('price')" />
                            </div>

                            <!-- Status -->
                            <div>
                                <x-input-label for="status" :value="__('Status')" />
                                <select id="status" name="status" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="sale" {{ old('status') === 'sale' ? 'selected' : '' }}>{{ __('For Sale') }}</option>
                                    <option value="rent" {{ old('status') === 'rent' ? 'selected' : '' }}>{{ __('For Rent') }}</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('status')" />
                            </div>

                            <!-- City -->
                            <div>
                                <x-input-label for="city" :value="__('City')" />
                                <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city')" required />
                                <x-input-error class="mt-2" :messages="$errors->get('city')" />
                            </div>

                            <!-- Area -->
                            <div>
                                <x-input-label for="area" :value="__('Area (sqft)')" />
                                <x-text-input id="area" name="area" type="number" step="0.01" class="mt-1 block w-full" :value="old('area')" required />
                                <x-input-error class="mt-2" :messages="$errors->get('area')" />
                            </div>

                            <!-- Bedrooms -->
                            <div>
                                <x-input-label for="bedrooms" :value="__('Bedrooms')" />
                                <x-text-input id="bedrooms" name="bedrooms" type="number" class="mt-1 block w-full" :value="old('bedrooms')" required />
                                <x-input-error class="mt-2" :messages="$errors->get('bedrooms')" />
                            </div>

                            <!-- Bathrooms -->
                            <div>
                                <x-input-label for="bathrooms" :value="__('Bathrooms')" />
                                <x-text-input id="bathrooms" name="bathrooms" type="number" class="mt-1 block w-full" :value="old('bathrooms')" required />
                                <x-input-error class="mt-2" :messages="$errors->get('bathrooms')" />
                            </div>

                            <!-- Address -->
                            <div class="col-span-2">
                                <x-input-label for="address" :value="__('Full Address')" />
                                <textarea id="address" name="address" rows="2" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('address') }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                            </div>

                            <!-- Description -->
                            <div class="col-span-2">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('description') }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>

                            <!-- Image -->
                            <div class="col-span-2">
                                <x-input-label for="image" :value="__('Property Image')" />
                                <input id="image" name="image" type="file" class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition" />
                                <x-input-error class="mt-2" :messages="$errors->get('image')" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-4 border-t dark:border-gray-700 pt-6">
                            <a href="{{ route('properties.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 transition">{{ __('Cancel') }}</a>
                            <x-primary-button>{{ __('Save Property') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
