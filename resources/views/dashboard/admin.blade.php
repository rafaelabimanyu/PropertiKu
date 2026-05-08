<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium">{{ __('System Overview') }}</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        {{ __("Manage users, properties, and system settings from here.") }}
                    </p>
                    
                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="border dark:border-gray-700 p-4 rounded-lg bg-gray-50 dark:bg-gray-900">
                            <p class="text-xs text-gray-500 uppercase">{{ __('Total Users') }}</p>
                            <p class="text-2xl font-bold">--</p>
                        </div>
                        <div class="border dark:border-gray-700 p-4 rounded-lg bg-gray-50 dark:bg-gray-900">
                            <p class="text-xs text-gray-500 uppercase">{{ __('Pending Approvals') }}</p>
                            <p class="text-2xl font-bold">--</p>
                        </div>
                        <div class="border dark:border-gray-700 p-4 rounded-lg bg-gray-50 dark:bg-gray-900">
                            <p class="text-xs text-gray-500 uppercase">{{ __('System Health') }}</p>
                            <p class="text-2xl font-bold text-green-500">{{ __('Good') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
