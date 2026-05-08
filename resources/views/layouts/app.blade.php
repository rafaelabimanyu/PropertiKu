<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="PropertiKu - Premium AI-Powered Real Estate Marketplace. Find your dream property with ease and trust.">
        <meta name="keywords" content="real estate, property, luxury house, apartment, villa, buy house, rent house, PropertiKu">
        <meta name="author" content="PropertiKu Team">
        
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ $title ?? config('app.name', 'PropertiKu') }}">
        <meta property="og:description" content="Premium AI-Powered Real Estate Marketplace. Find your dream property with ease and trust.">
        <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">

        <title>{{ isset($title) ? $title . ' | ' . config('app.name', 'PropertiKu') : config('app.name', 'PropertiKu') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-slate-50 dark:bg-gray-950 pt-20">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Premium Footer -->
            <footer class="bg-white dark:bg-gray-900 border-t border-slate-200 dark:border-gray-800 pt-20 pb-10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-12 mb-16">
                        <div class="col-span-2 lg:col-span-2">
                            <a href="{{ route('home') }}" class="text-2xl font-black tracking-tighter text-indigo-600 mb-6 block">
                                PROPERTI<span class="text-slate-900 dark:text-white">KU</span>
                            </a>
                            <p class="text-slate-500 dark:text-slate-400 font-medium text-sm leading-relaxed max-w-xs mb-8">
                                Premium AI-Powered Real Estate Marketplace. Elevating your property search experience with intelligence and trust.
                            </p>
                            <div class="flex space-x-4">
                                <a href="#" class="w-10 h-10 bg-slate-100 dark:bg-gray-800 rounded-xl flex items-center justify-center text-slate-400 hover:text-indigo-600 transition shadow-sm">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                                </a>
                                <a href="#" class="w-10 h-10 bg-slate-100 dark:bg-gray-800 rounded-xl flex items-center justify-center text-slate-400 hover:text-indigo-600 transition shadow-sm">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </a>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-sm font-black dark:text-white uppercase tracking-widest mb-6">Marketplace</h4>
                            <ul class="space-y-4">
                                <li><a href="{{ route('properties.index') }}" class="text-sm font-medium text-slate-500 hover:text-indigo-600 transition">All Properties</a></li>
                                <li><a href="{{ route('featured') }}" class="text-sm font-medium text-slate-500 hover:text-indigo-600 transition">Featured Listings</a></li>
                                <li><a href="{{ route('home') }}" class="text-sm font-medium text-slate-500 hover:text-indigo-600 transition">Latest Deals</a></li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="text-sm font-black dark:text-white uppercase tracking-widest mb-6">Resources</h4>
                            <ul class="space-y-4">
                                <li><a href="{{ route('guide') }}" class="text-sm font-medium text-slate-500 hover:text-indigo-600 transition">User Guide</a></li>
                                <li><a href="{{ route('contact') }}" class="text-sm font-medium text-slate-500 hover:text-indigo-600 transition">Contact Support</a></li>
                                <li><a href="{{ route('sitemap') }}" class="text-sm font-medium text-slate-500 hover:text-indigo-600 transition">Site Map</a></li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="text-sm font-black dark:text-white uppercase tracking-widest mb-6">Company</h4>
                            <ul class="space-y-4">
                                <li><a href="#" class="text-sm font-medium text-slate-500 hover:text-indigo-600 transition">About Us</a></li>
                                <li><a href="#" class="text-sm font-medium text-slate-500 hover:text-indigo-600 transition">Privacy Policy</a></li>
                                <li><a href="#" class="text-sm font-medium text-slate-500 hover:text-indigo-600 transition">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="pt-10 border-t border-slate-100 dark:border-gray-800 flex flex-col md:flex-row justify-between items-center gap-4">
                        <p class="text-xs font-bold text-slate-400">© {{ date('Y') }} PropertiKu AI. All rights reserved.</p>
                        <div class="flex items-center space-x-6">
                            <span class="flex items-center text-[10px] font-black uppercase tracking-widest text-slate-300">
                                <span class="w-2 h-2 bg-emerald-500 rounded-full mr-2"></span> System Online
                            </span>
                            <span class="text-[10px] font-black uppercase tracking-widest text-slate-300 italic">Built for Excellence</span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <x-toast />
    </body>
</html>
