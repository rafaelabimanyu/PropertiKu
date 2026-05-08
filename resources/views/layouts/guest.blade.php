<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'PropertiKu') }} | Premium Auth</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-50 text-slate-900 overflow-x-hidden selection:bg-indigo-500 selection:text-white">
    <div class="flex min-h-screen">
        <!-- Left Side: Form -->
        <div class="w-full lg:w-1/2 flex flex-col items-center justify-center p-8 sm:p-12 lg:p-24 bg-white relative z-10 shadow-[20px_0_40px_rgba(0,0,0,0.05)]">
            <a href="/" class="absolute top-8 left-8 sm:top-12 sm:left-12 text-2xl font-black tracking-tighter text-indigo-600 flex items-center group">
                <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                PROPERTI<span class="text-slate-900">KU</span>
            </a>

            <div class="w-full max-w-md w-full animate-fade-in-up">
                {{ $slot }}
            </div>
        </div>

        <!-- Right Side: Image/Hero -->
        <div class="hidden lg:flex w-1/2 bg-slate-900 relative overflow-hidden items-end justify-center pb-24 px-12 group">
            @php
                $imageUrl = 'https://images.unsplash.com/photo-1600607686527-6fb886090705?w=1600&q=80'; 
                $quoteTitle = 'Find your dream property with confidence.';
                $quoteText = 'Join thousands of users who have successfully found their perfect home through our premium AI-powered marketplace.';
                
                if(request()->routeIs('register')) {
                    $imageUrl = 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=1600&q=80';
                    $quoteTitle = 'Premium real estate experience starts here.';
                    $quoteText = 'Register today to unlock exclusive access to high-end listings, AI recommendations, and dedicated agents.';
                }
            @endphp
            <img src="{{ $imageUrl }}" class="absolute inset-0 w-full h-full object-cover opacity-60 mix-blend-overlay group-hover:scale-105 transition duration-1000">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/50 to-transparent"></div>
            
            <div class="relative z-10 text-center max-w-lg">
                <div class="w-16 h-16 bg-white/10 backdrop-blur rounded-2xl flex items-center justify-center mx-auto mb-8 border border-white/20 shadow-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h2 class="text-4xl font-black text-white mb-4 leading-tight">{{ $quoteTitle }}</h2>
                <p class="text-slate-300 text-sm font-medium leading-relaxed">{{ $quoteText }}</p>
                
                <div class="mt-12 flex justify-center space-x-2">
                    <div class="w-2 h-2 rounded-full {{ request()->routeIs('login') ? 'bg-white' : 'bg-white/30' }}"></div>
                    <div class="w-2 h-2 rounded-full {{ request()->routeIs('register') ? 'bg-white' : 'bg-white/30' }}"></div>
                    <div class="w-2 h-2 rounded-full {{ request()->routeIs('password.*') ? 'bg-white' : 'bg-white/30' }}"></div>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</body>
</html>
