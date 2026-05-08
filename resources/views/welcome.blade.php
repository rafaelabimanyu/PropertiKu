<x-app-layout>
    <x-slot name="title">Premium AI-Powered Real Estate</x-slot>

    <!-- Animated Background Mesh -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-indigo-500/10 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-[10%] right-[-5%] w-[30%] h-[30%] bg-emerald-500/10 rounded-full blur-[100px] animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <!-- Hero Section -->
    <header class="relative pt-32 pb-32 lg:pt-48 lg:pb-48 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <span class="inline-block px-4 py-1.5 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 text-[10px] font-black uppercase tracking-[0.2em] rounded-full mb-8 animate-bounce">
                    Premium Real Estate 2024
                </span>
                <h1 class="text-5xl lg:text-8xl font-black text-slate-900 dark:text-white leading-[1.1] mb-8 tracking-tight">
                    Redefining <span class="text-gradient">Modern</span> <br> Luxury Living
                </h1>
                <p class="text-lg lg:text-xl text-slate-500 dark:text-slate-400 mb-12 lg:mb-16 max-w-2xl mx-auto font-medium leading-relaxed">
                    Access exclusive properties powered by AI. From futuristic smart homes to elegant estates, find your legacy with PropertiKu.
                </p>
                
                <!-- Search Box -->
                <div class="relative">
                    <x-search-floating />
                    
                    <!-- Floating Badges -->
                    <div class="absolute -top-12 -left-8 hidden xl:flex items-center bg-white dark:bg-gray-900 p-3 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 rotate-[-5deg] animate-pulse">
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
    <section class="py-20 lg:py-32 bg-white dark:bg-gray-900/50 rounded-[3rem] lg:rounded-[10rem]">
        <div class="max-w-7xl mx-auto px-6 sm:px-8">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end mb-16 lg:mb-20 gap-8">
                <div class="max-w-xl">
                    <h2 class="text-3xl lg:text-5xl font-black text-slate-900 dark:text-white mb-6 tracking-tight leading-tight">
                        Latest Curated <span class="text-indigo-600">Masterpieces</span>
                    </h2>
                    <p class="text-slate-500 dark:text-slate-400 font-medium">Explore our newly added properties handpicked by our expert agents for their unique design and premium value.</p>
                </div>
                <a href="{{ route('properties.index') }}" class="group flex items-center text-[10px] font-black uppercase tracking-widest text-indigo-600 hover:text-indigo-700 transition">
                    View All Collections 
                    <span class="ml-3 p-3 bg-indigo-50 dark:bg-indigo-900/30 rounded-full group-hover:translate-x-2 transition-transform duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                @forelse($featuredProperties as $property)
                    <x-property-card :property="$property" />
                @empty
                    <div class="col-span-full py-20">
                        <x-empty-state 
                            title="No properties listed" 
                            subtitle="We are currently curating new premium properties for you." 
                        />
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-20 lg:py-32">
        <div class="max-w-7xl mx-auto px-6 sm:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
                <div class="p-10 glass dark:glass-dark rounded-[3rem] hover:bg-white dark:hover:bg-gray-900 transition-all duration-500 group border border-white/10">
                    <div class="w-16 h-16 bg-indigo-600 rounded-2xl flex items-center justify-center mb-8 shadow-xl shadow-indigo-500/20 group-hover:rotate-[10deg] transition">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h4 class="text-xl font-black mb-4 dark:text-white">Fast Processing</h4>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed font-medium">Our automated AI verification system reduces approval time from weeks to just minutes.</p>
                </div>
                <div class="p-10 glass dark:glass-dark rounded-[3rem] hover:bg-white dark:hover:bg-gray-900 transition-all duration-500 group border border-white/10">
                    <div class="w-16 h-16 bg-emerald-500 rounded-2xl flex items-center justify-center mb-8 shadow-xl shadow-emerald-500/20 group-hover:rotate-[10deg] transition">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h4 class="text-xl font-black mb-4 dark:text-white">Secure Assets</h4>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed font-medium">Every property undergoes a rigorous 50-point security check for your complete peace of mind.</p>
                </div>
                <div class="p-10 glass dark:glass-dark rounded-[3rem] hover:bg-white dark:hover:bg-gray-900 transition-all duration-500 group border border-white/10">
                    <div class="w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center mb-8 shadow-xl shadow-blue-500/20 group-hover:rotate-[10deg] transition">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                    </div>
                    <h4 class="text-xl font-black mb-4 dark:text-white">Global Reach</h4>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed font-medium">Connect with premium buyers and sellers from over 50 countries in our global network.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Cities -->
    <section class="py-20 lg:py-32 bg-slate-900 text-white rounded-[3rem] lg:rounded-[10rem] my-10 overflow-hidden relative">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/10 to-transparent"></div>
        <div class="max-w-7xl mx-auto px-6 sm:px-8 text-center relative z-10">
            <h2 class="text-3xl lg:text-5xl font-black mb-6 tracking-tight">Explore Top <span class="text-emerald-400">Locations</span></h2>
            <p class="text-slate-400 font-medium mb-16 max-w-2xl mx-auto">Find exclusive properties in Indonesia's most sought-after cities, from bustling metropolises to serene escapes.</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach(['Jakarta' => 'bg-indigo-500', 'Bali' => 'bg-emerald-500', 'Bandung' => 'bg-blue-500', 'Surabaya' => 'bg-purple-500'] as $city => $color)
                    <a href="{{ route('properties.index', ['city' => $city]) }}" class="group relative overflow-hidden rounded-[2.5rem] aspect-square flex items-center justify-center p-6 bg-slate-800/50 border border-slate-700 hover:border-slate-500 transition duration-500 shadow-2xl">
                        <div class="absolute inset-0 {{ $color }}/10 group-hover:{{ $color }}/20 transition duration-500"></div>
                        <div class="relative z-10 text-center">
                            <h4 class="text-2xl font-black mb-2 tracking-tighter">{{ $city }}</h4>
                            <span class="text-[9px] font-black uppercase tracking-[0.2em] text-slate-500 group-hover:text-white transition duration-300">Browse Properties</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Market Stats -->
    <section class="py-20 lg:py-32">
        <div class="max-w-7xl mx-auto px-6 sm:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
                <div>
                    <h4 class="text-4xl lg:text-5xl font-black text-indigo-600 mb-2">1,200+</h4>
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Active Listings</p>
                </div>
                <div>
                    <h4 class="text-4xl lg:text-5xl font-black text-emerald-600 mb-2">$850M</h4>
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Transaction Volume</p>
                </div>
                <div>
                    <h4 class="text-4xl lg:text-5xl font-black text-blue-600 mb-2">450+</h4>
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Certified Agents</p>
                </div>
                <div>
                    <h4 class="text-4xl lg:text-5xl font-black text-purple-600 mb-2">15k</h4>
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Happy Families</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial -->
    <section class="py-20 lg:py-32 bg-indigo-50 dark:bg-gray-900/50 rounded-[3rem] lg:rounded-[5rem] my-10 border border-white/10 mx-6 lg:mx-10">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <svg class="w-12 h-12 text-indigo-300 dark:text-indigo-900/50 mx-auto mb-8" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
            <p class="text-2xl md:text-3xl font-black text-slate-900 dark:text-white leading-relaxed mb-10 tracking-tight">"PropertiKu made finding our dream home incredibly easy. The AI recommendations were spot on, and the transaction was seamless from start to finish."</p>
            <div>
                <div class="w-20 h-20 bg-slate-300 rounded-[1.5rem] mx-auto mb-4 border-4 border-white dark:border-gray-800 shadow-2xl overflow-hidden rotate-3">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200" alt="Sarah J." class="w-full h-full object-cover">
                </div>
                <h5 class="font-black text-lg dark:text-white">Sarah Jenkins</h5>
                <p class="text-[10px] text-indigo-600 uppercase tracking-[0.2em] font-black">Luxury Home Buyer</p>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 lg:py-32">
        <div class="max-w-7xl mx-auto px-6 sm:px-8">
            <div class="relative bg-slate-900 dark:bg-gray-900 rounded-[3rem] lg:rounded-[5rem] p-12 lg:p-24 overflow-hidden text-center lg:text-left flex flex-col lg:flex-row items-center justify-between shadow-2xl">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-600/20 to-transparent"></div>
                <div class="relative z-10 max-w-2xl">
                    <h2 class="text-4xl lg:text-6xl font-black text-white mb-8 lg:mb-12 leading-tight tracking-tighter">Ready to Find Your <br> <span class="text-indigo-400">Dream Estate?</span></h2>
                    <a href="{{ route('register') }}" class="inline-flex items-center px-10 py-5 bg-white text-slate-900 font-black rounded-2xl text-[10px] uppercase tracking-[0.2em] hover:bg-indigo-500 hover:text-white transition duration-500 shadow-2xl">Get Started Now</a>
                </div>
                <div class="mt-16 lg:mt-0 relative z-10">
                    <div class="flex -space-x-4 mb-6">
                        @foreach([1,2,3] as $i)
                            <div class="w-14 h-14 rounded-2xl border-4 border-slate-900 bg-slate-700 flex items-center justify-center overflow-hidden">
                                <img src="https://i.pravatar.cc/100?u={{ $i }}" class="w-full h-full object-cover">
                            </div>
                        @endforeach
                        <div class="w-14 h-14 rounded-2xl border-4 border-slate-900 bg-indigo-600 flex items-center justify-center text-white font-black text-xs">+5k</div>
                    </div>
                    <p class="text-indigo-200 font-black uppercase tracking-widest text-[9px]">Trusted by 5,000+ Investors</p>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
