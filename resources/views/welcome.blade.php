<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AI Property Marketplace | Find Your Dream Home</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-white dark:bg-gray-900 font-figtree">
        <!-- Navbar -->
        <nav class="fixed w-full z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-100 dark:border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex items-center">
                        <a href="/" class="text-2xl font-extrabold text-indigo-600 dark:text-indigo-400">
                            Properti<span class="text-gray-900 dark:text-white">Ku</span>
                        </a>
                    </div>
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="/" class="text-sm font-medium text-indigo-600">Home</a>
                        <a href="{{ route('properties.index') }}" class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-indigo-600 transition">Properties</a>
                        <a href="#" class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-indigo-600 transition">Agents</a>
                        @auth
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-5 py-2.5 bg-indigo-600 text-white text-sm font-semibold rounded-full hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 dark:shadow-none">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-indigo-600 transition">Log in</a>
                            <a href="{{ route('register') }}" class="inline-flex items-center px-5 py-2.5 bg-indigo-600 text-white text-sm font-semibold rounded-full hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 dark:shadow-none">Get Started</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <header class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center">
                    <h1 class="text-5xl lg:text-7xl font-extrabold text-gray-900 dark:text-white leading-tight mb-6">
                        Discover Your <span class="text-indigo-600">Perfect</span> <br> Living Space
                    </h1>
                    <p class="max-w-2xl mx-auto text-xl text-gray-600 dark:text-gray-400 mb-10 leading-relaxed">
                        The ultimate destination for premium real estate. Whether you're buying, renting, or investing, we bring the best properties directly to you.
                    </p>
                    
                    <!-- Hero Search -->
                    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-2 rounded-2xl shadow-2xl border border-gray-100 dark:border-gray-700 flex flex-col md:flex-row gap-2">
                        <div class="flex-1 px-4 py-3 flex items-center border-r dark:border-gray-700">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            <input type="text" placeholder="Search by city or area..." class="w-full bg-transparent border-none focus:ring-0 text-gray-900 dark:text-white placeholder-gray-400">
                        </div>
                        <div class="flex-1 px-4 py-3 flex items-center border-r dark:border-gray-700">
                            <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            <select class="w-full bg-transparent border-none focus:ring-0 text-gray-900 dark:text-white">
                                <option value="">Property Type</option>
                                <option value="sale">For Sale</option>
                                <option value="rent">For Rent</option>
                            </select>
                        </div>
                        <button class="md:px-10 py-4 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 transition shadow-lg shadow-indigo-200 dark:shadow-none">
                            Search Now
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Abstract Background Decorations -->
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-indigo-50 dark:bg-indigo-900/20 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 bg-blue-50 dark:bg-blue-900/20 rounded-full blur-3xl opacity-50"></div>
        </header>

        <!-- Featured Properties -->
        <section class="py-24 bg-gray-50 dark:bg-gray-800/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-end mb-12">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Featured Properties</h2>
                        <p class="text-gray-600 dark:text-gray-400">Handpicked premium properties for you.</p>
                    </div>
                    <a href="{{ route('properties.index') }}" class="text-indigo-600 font-bold hover:underline">View All &rarr;</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($featuredProperties as $property)
                        <div class="bg-white dark:bg-gray-800 rounded-3xl overflow-hidden shadow-sm border border-gray-100 dark:border-gray-700 group hover:shadow-xl transition-all duration-500">
                            <div class="relative aspect-[4/3] overflow-hidden">
                                @if($property->image)
                                    <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                @else
                                    <div class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                    </div>
                                @endif
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 bg-white/90 dark:bg-gray-900/90 backdrop-blur rounded-full text-xs font-bold uppercase {{ $property->status === 'sale' ? 'text-green-600' : 'text-blue-600' }}">
                                        For {{ ucfirst($property->status) }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-8">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 line-clamp-1">{{ $property->title }}</h3>
                                <p class="text-gray-500 dark:text-gray-400 mb-6 flex items-center text-sm">
                                    <svg class="w-4 h-4 mr-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                    {{ $property->city }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <p class="text-2xl font-extrabold text-indigo-600 dark:text-indigo-400">
                                        ${{ number_format($property->price, 0) }}
                                    </p>
                                    <a href="{{ route('properties.show', $property) }}" class="p-3 bg-gray-50 dark:bg-gray-700 rounded-2xl text-gray-900 dark:text-white hover:bg-indigo-600 hover:text-white transition-all duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-indigo-600 rounded-[3rem] p-12 lg:p-20 relative overflow-hidden text-center lg:text-left flex flex-col lg:flex-row items-center justify-between">
                    <div class="relative z-10 max-w-xl">
                        <h2 class="text-4xl lg:text-5xl font-extrabold text-white mb-6">Become a Real Estate Agent Today</h2>
                        <p class="text-indigo-100 text-lg mb-10">
                            Join our community of professional agents and reach thousands of potential buyers every day.
                        </p>
                        <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-4 bg-white text-indigo-600 font-bold rounded-2xl hover:bg-indigo-50 transition shadow-xl">
                            Join as Agent
                        </a>
                    </div>
                    <div class="mt-12 lg:mt-0 relative z-10 flex -space-x-4">
                        <div class="w-16 h-16 rounded-full border-4 border-indigo-600 bg-gray-200"></div>
                        <div class="w-16 h-16 rounded-full border-4 border-indigo-600 bg-gray-300"></div>
                        <div class="w-16 h-16 rounded-full border-4 border-indigo-600 bg-gray-400"></div>
                        <div class="w-16 h-16 rounded-full border-4 border-indigo-600 bg-indigo-200 flex items-center justify-center text-indigo-800 font-bold">+5k</div>
                    </div>
                    
                    <!-- Decorative element -->
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-20 -mt-20"></div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800 py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                    <div class="md:col-span-1">
                        <a href="/" class="text-2xl font-extrabold text-indigo-600 dark:text-indigo-400 mb-6 block">
                            Properti<span class="text-gray-900 dark:text-white">Ku</span>
                        </a>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            The most trusted platform for real estate deals in Indonesia.
                        </p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white mb-6">Company</h4>
                        <ul class="space-y-4 text-gray-600 dark:text-gray-400">
                            <li><a href="#" class="hover:text-indigo-600 transition">About Us</a></li>
                            <li><a href="#" class="hover:text-indigo-600 transition">Contact</a></li>
                            <li><a href="#" class="hover:text-indigo-600 transition">Careers</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white mb-6">Support</h4>
                        <ul class="space-y-4 text-gray-600 dark:text-gray-400">
                            <li><a href="#" class="hover:text-indigo-600 transition">Help Center</a></li>
                            <li><a href="#" class="hover:text-indigo-600 transition">Privacy Policy</a></li>
                            <li><a href="#" class="hover:text-indigo-600 transition">Terms of Service</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-white mb-6">Newsletter</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Subscribe to our newsletter for latest updates.</p>
                        <div class="flex">
                            <input type="email" placeholder="Your email" class="flex-1 bg-gray-50 dark:bg-gray-800 border-none rounded-l-xl focus:ring-1 focus:ring-indigo-600">
                            <button class="bg-indigo-600 text-white px-4 rounded-r-xl">Go</button>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-100 dark:border-gray-800 pt-8 text-center text-sm text-gray-500">
                    &copy; {{ date('Y') }} PropertiKu. All rights reserved.
                </div>
            </div>
        </footer>
    </body>
</html>
