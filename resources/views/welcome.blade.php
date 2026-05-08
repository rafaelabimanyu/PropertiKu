<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Futuristic Real Estate | PropertiKu Luxury</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
        </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-slate-50 dark:bg-gray-950 text-slate-900 dark:text-slate-100 overflow-x-hidden">
        
        <!-- Animated Background Mesh -->
        <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
            <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-indigo-500/10 rounded-full blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-[10%] right-[-5%] w-[30%] h-[30%] bg-emerald-500/10 rounded-full blur-[100px] animate-pulse" style="animation-delay: 2s;"></div>
        </div>

        <!-- Navbar -->
        <nav class="fixed w-full z-50 transition-all duration-500 py-6" x-data="{ scrolled: false }" @scroll.window="scrolled = window.pageYOffset > 20">
            <div class="max-w-7xl mx-auto px-6 sm:px-8">
                <div class="glass dark:glass-dark rounded-[2rem] px-8 py-4 flex justify-between items-center transition-all duration-500" :class="scrolled ? 'shadow-2xl' : ''">
                    <div class="flex items-center">
                        <a href="/" class="text-2xl font-black tracking-tighter text-indigo-600 dark:text-indigo-400">
                            PROPERTI<span class="text-slate-900 dark:text-white">KU</span>
                        </a>
                    </div>
                    <div class="hidden lg:flex items-center space-x-10">
                        <a href="/" class="text-xs font-bold uppercase tracking-widest hover:text-indigo-600 transition">Home</a>
                        <a href="{{ route('properties.index') }}" class="text-xs font-bold uppercase tracking-widest hover:text-indigo-600 transition text-slate-500 dark:text-slate-400">Properties</a>
                        <a href="{{ route('featured') }}" class="text-xs font-bold uppercase tracking-widest hover:text-indigo-600 transition {{ request()->routeIs('featured') ? 'text-indigo-600' : 'text-slate-500 dark:text-slate-400' }}">Featured</a>
                        @auth
                            <a href="{{ route('dashboard') }}" class="px-6 py-2.5 bg-indigo-600 text-white text-[10px] font-black uppercase tracking-widest rounded-full hover:bg-indigo-700 transition shadow-lg shadow-indigo-500/20">Dashboard</a>
                        @else
                            <div class="flex items-center space-x-6">
                                <a href="{{ route('login') }}" class="text-xs font-bold uppercase tracking-widest hover:text-indigo-600 transition">Log in</a>
                                <a href="{{ route('register') }}" class="px-6 py-2.5 bg-slate-900 dark:bg-white text-white dark:text-slate-900 text-[10px] font-black uppercase tracking-widest rounded-full hover:bg-indigo-600 dark:hover:bg-indigo-400 hover:text-white transition shadow-xl">Join Now</a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <header class="relative pt-48 pb-32 lg:pt-64 lg:pb-48">
            <div class="max-w-7xl mx-auto px-6 sm:px-8 relative z-10">
                <div class="text-center max-w-4xl mx-auto">
                    <span class="inline-block px-4 py-1.5 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 text-[10px] font-black uppercase tracking-[0.2em] rounded-full mb-8 animate-bounce">
                        Premium Real Estate 2024
                    </span>
                    <h1 class="text-6xl lg:text-8xl font-black text-slate-900 dark:text-white leading-[1.1] mb-8 tracking-tight">
                        Redefining <span class="text-gradient">Modern</span> <br> Luxury Living
                    </h1>
                    <p class="text-xl text-slate-500 dark:text-slate-400 mb-16 max-w-2xl mx-auto font-medium leading-relaxed">
                        Access exclusive properties powered by AI. From futuristic smart homes to elegant estates, find your legacy with PropertiKu.
                    </p>
                    
                    <!-- Search Box -->
                    <div class="relative">
                        <x-search-floating />
                        
                        <!-- Floating Badges -->
                        <div class="absolute -top-12 -left-8 hidden xl:flex items-center bg-white dark:bg-gray-800 p-3 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 rotate-[-5deg] animate-pulse">
                            <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="text-left">
                                <p class="text-[10px] font-bold uppercase text-gray-400">Verified</p>
                                <p class="text-xs font-black">AI Scanned</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Featured Listings -->
        <section class="py-32 bg-white dark:bg-gray-900/50 rounded-[4rem] lg:rounded-[10rem]">
            <div class="max-w-7xl mx-auto px-6 sm:px-8">
                <div class="flex flex-col lg:flex-row justify-between items-end mb-20 gap-8">
                    <div class="max-w-xl">
                        <h2 class="text-4xl lg:text-5xl font-black text-slate-900 dark:text-white mb-6 tracking-tight">
                            Latest Curated <span class="text-indigo-600">Masterpieces</span>
                        </h2>
                        <p class="text-slate-500 dark:text-slate-400 font-medium">Explore our newly added properties handpicked by our expert agents for their unique design and premium value.</p>
                    </div>
                    <a href="{{ route('properties.index') }}" class="group flex items-center text-xs font-black uppercase tracking-widest text-indigo-600 hover:text-indigo-700 transition">
                        View All Collections 
                        <span class="ml-3 p-3 bg-indigo-50 dark:bg-indigo-900/30 rounded-full group-hover:translate-x-2 transition-transform duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </span>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @forelse($featuredProperties as $property)
                        <x-property-card :property="$property" />
                    @empty
                        <div class="col-span-3 py-20 text-center glass-dark rounded-[3rem]">
                            <p class="text-gray-500">No properties available yet. Start your journey by checking back later.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Why Choose Us / Features -->
        <section class="py-32">
            <div class="max-w-7xl mx-auto px-6 sm:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <div class="p-10 glass dark:glass-dark rounded-[3rem] hover:bg-white transition-all duration-500 group">
                        <div class="w-16 h-16 bg-indigo-600 rounded-2xl flex items-center justify-center mb-8 shadow-xl shadow-indigo-500/20 group-hover:rotate-[10deg] transition">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold mb-4">Fast Processing</h4>
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Our automated AI verification system reduces approval time from weeks to just minutes.</p>
                    </div>
                    <div class="p-10 glass dark:glass-dark rounded-[3rem] hover:bg-white transition-all duration-500 group">
                        <div class="w-16 h-16 bg-emerald-500 rounded-2xl flex items-center justify-center mb-8 shadow-xl shadow-emerald-500/20 group-hover:rotate-[10deg] transition">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold mb-4">Secure Assets</h4>
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Every property undergoes a rigorous 50-point security check for your complete peace of mind.</p>
                    </div>
                    <div class="p-10 glass dark:glass-dark rounded-[3rem] hover:bg-white transition-all duration-500 group">
                        <div class="w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center mb-8 shadow-xl shadow-blue-500/20 group-hover:rotate-[10deg] transition">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold mb-4">Global Reach</h4>
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Connect with premium buyers and sellers from over 50 countries in our global network.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="py-32">
            <div class="max-w-7xl mx-auto px-6 sm:px-8">
                <div class="relative bg-gradient-to-r from-indigo-900 to-indigo-700 rounded-[3rem] lg:rounded-[5rem] p-16 lg:p-32 overflow-hidden text-center lg:text-left flex flex-col lg:flex-row items-center justify-between">
                    <div class="relative z-10 max-w-2xl">
                        <h2 class="text-4xl lg:text-6xl font-black text-white mb-10 leading-tight">Ready to Find Your <br> Dream Estate?</h2>
                        <a href="{{ route('register') }}" class="btn-premium">Get Started Now</a>
                    </div>
                    <div class="mt-20 lg:mt-0 relative z-10">
                        <div class="flex -space-x-6">
                            <div class="w-20 h-20 rounded-full border-8 border-indigo-900/50 bg-gray-200"></div>
                            <div class="w-20 h-20 rounded-full border-8 border-indigo-900/50 bg-gray-300"></div>
                            <div class="w-20 h-20 rounded-full border-8 border-indigo-900/50 bg-gray-400"></div>
                            <div class="w-20 h-20 rounded-full border-8 border-indigo-900/50 bg-indigo-500 flex items-center justify-center text-white font-black text-lg">+5k</div>
                        </div>
                        <p class="text-indigo-200 mt-6 font-bold uppercase tracking-widest text-[10px]">Trusted by 5,000+ Investors</p>
                    </div>
                    
                    <!-- Decorative Circle -->
                    <div class="absolute -top-24 -right-24 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl"></div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-32 border-t border-slate-200 dark:border-gray-800">
            <div class="max-w-7xl mx-auto px-6 sm:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-20 mb-20">
                    <div class="col-span-1 md:col-span-1">
                        <a href="/" class="text-2xl font-black tracking-tighter text-indigo-600 dark:text-indigo-400 mb-10 block">PROPERTIKU</a>
                        <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">The next generation of luxury real estate management. Powered by AI, designed for excellence.</p>
                    </div>
                    <div>
                        <h5 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-900 dark:text-white mb-8">Platform</h5>
                        <ul class="space-y-4 text-sm text-slate-500 dark:text-slate-400">
                            <li><a href="#" class="hover:text-indigo-600 transition">Browse Properties</a></li>
                            <li><a href="#" class="hover:text-indigo-600 transition">How it Works</a></li>
                            <li><a href="#" class="hover:text-indigo-600 transition">Smart Filters</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-900 dark:text-white mb-8">Company</h5>
                        <ul class="space-y-4 text-sm text-slate-500 dark:text-slate-400">
                            <li><a href="#" class="hover:text-indigo-600 transition">About Us</a></li>
                            <li><a href="#" class="hover:text-indigo-600 transition">Our Vision</a></li>
                            <li><a href="#" class="hover:text-indigo-600 transition">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-900 dark:text-white mb-8">Legal</h5>
                        <ul class="space-y-4 text-sm text-slate-500 dark:text-slate-400">
                            <li><a href="#" class="hover:text-indigo-600 transition">Privacy Policy</a></li>
                            <li><a href="#" class="hover:text-indigo-600 transition">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="pt-10 border-t border-slate-100 dark:border-gray-800 flex flex-col md:flex-row justify-between items-center gap-6">
                    <p class="text-xs text-gray-400 font-medium">&copy; {{ date('Y') }} PropertiKu Global. All rights reserved.</p>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-indigo-600 transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                        <a href="#" class="text-gray-400 hover:text-indigo-600 transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </body>
</html>
