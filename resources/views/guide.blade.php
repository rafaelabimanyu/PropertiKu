<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Guide | PropertiKu</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-50 dark:bg-gray-950 text-slate-900 dark:text-slate-100">

{{-- Navbar --}}
<nav class="fixed w-full z-50 py-4" x-data="{ scrolled: false, open: false }" @scroll.window="scrolled = window.pageYOffset > 20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="glass dark:glass-dark rounded-2xl px-6 py-3 flex justify-between items-center" :class="scrolled ? 'shadow-2xl' : ''">
            <a href="/" class="text-xl font-black tracking-tighter text-indigo-600">PROPERTI<span class="text-slate-900 dark:text-white">KU</span></a>
            <div class="hidden lg:flex items-center space-x-8">
                <a href="/" class="text-xs font-bold uppercase tracking-widest hover:text-indigo-600 transition text-slate-500">Home</a>
                <a href="{{ route('properties.index') }}" class="text-xs font-bold uppercase tracking-widest hover:text-indigo-600 transition text-slate-500">Properties</a>
                <a href="{{ route('featured') }}" class="text-xs font-bold uppercase tracking-widest hover:text-indigo-600 transition text-slate-500">Featured</a>
                <a href="{{ route('guide') }}" class="text-xs font-bold uppercase tracking-widest text-indigo-600">Guide</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="px-5 py-2 bg-indigo-600 text-white text-[10px] font-black uppercase tracking-widest rounded-full hover:bg-indigo-700 transition shadow-lg shadow-indigo-500/20">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-xs font-bold uppercase tracking-widest hover:text-indigo-600 transition">Log in</a>
                    <a href="{{ route('register') }}" class="px-5 py-2 bg-slate-900 dark:bg-white text-white dark:text-slate-900 text-[10px] font-black uppercase tracking-widest rounded-full hover:bg-indigo-600 hover:text-white transition shadow-xl">Join Now</a>
                @endauth
            </div>
            <button @click="open = !open" class="lg:hidden p-2 text-slate-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg></button>
        </div>
        <div x-show="open" x-transition class="lg:hidden mt-2 glass dark:glass-dark rounded-2xl p-4 space-y-2">
            <a href="/" class="block px-4 py-2 rounded-xl text-sm font-bold text-slate-600 hover:bg-slate-100 transition">Home</a>
            <a href="{{ route('properties.index') }}" class="block px-4 py-2 rounded-xl text-sm font-bold text-slate-600 hover:bg-slate-100 transition">Properties</a>
            <a href="{{ route('guide') }}" class="block px-4 py-2 rounded-xl text-sm font-bold text-indigo-600 bg-indigo-50 transition">Guide</a>
            @auth
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded-xl text-sm font-bold text-white bg-indigo-600 text-center transition">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="block px-4 py-2 rounded-xl text-sm font-bold text-slate-600 hover:bg-slate-100 transition">Log In</a>
                <a href="{{ route('register') }}" class="block px-4 py-2 rounded-xl text-sm font-bold text-white bg-indigo-600 text-center transition">Register</a>
            @endauth
        </div>
    </div>
</nav>

{{-- Hero --}}
<header class="pt-40 pb-20 text-center relative overflow-hidden">
    <div class="absolute inset-0 -z-10"><div class="absolute top-[-10%] left-[20%] w-[30%] h-[30%] bg-indigo-500/10 rounded-full blur-[100px] animate-pulse"></div><div class="absolute bottom-[10%] right-[10%] w-[25%] h-[25%] bg-emerald-500/10 rounded-full blur-[80px] animate-pulse" style="animation-delay:2s"></div></div>
    <div class="max-w-4xl mx-auto px-6">
        <span class="inline-block px-4 py-1.5 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 text-[10px] font-black uppercase tracking-[0.2em] rounded-full mb-6">📖 Buku Panduan</span>
        <h1 class="text-5xl lg:text-7xl font-black mb-6 tracking-tight">User <span class="text-gradient">Guide</span></h1>
        <p class="text-xl text-slate-500 font-medium max-w-2xl mx-auto">Panduan lengkap penggunaan PropertiKu untuk semua pengguna. Temukan cara memaksimalkan pengalaman Anda.</p>
    </div>
</header>

{{-- Table of Contents --}}
<section class="pb-16">
    <div class="max-w-5xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach([
                ['A', 'Pengunjung', 'indigo', '#section-guest'],
                ['B', 'Buyer', 'emerald', '#section-buyer'],
                ['C', 'Agent', 'amber', '#section-agent'],
                ['D', 'Admin', 'violet', '#section-admin'],
            ] as $toc)
                <a href="{{ $toc[3] }}" class="p-5 bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 text-center group">
                    <div class="w-10 h-10 bg-{{ $toc[2] }}-100 dark:bg-{{ $toc[2] }}-900/30 rounded-xl flex items-center justify-center text-{{ $toc[2] }}-600 font-black mx-auto mb-3 group-hover:scale-110 transition">{{ $toc[0] }}</div>
                    <p class="text-sm font-bold dark:text-white">{{ $toc[1] }}</p>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Section A: Guest --}}
<section id="section-guest" class="py-16">
    <div class="max-w-5xl mx-auto px-6">
        <div class="flex items-center mb-10">
            <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-2xl flex items-center justify-center text-indigo-600 font-black text-lg mr-4">A</div>
            <div><h2 class="text-2xl font-black dark:text-white">Untuk Pengunjung (Guest)</h2><p class="text-sm text-slate-500">Panduan dasar untuk pengguna yang belum terdaftar</p></div>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="p-6 bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800 hover:shadow-lg transition-all duration-300">
                <div class="w-10 h-10 bg-indigo-50 dark:bg-indigo-900/20 rounded-xl flex items-center justify-center text-indigo-500 mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <h3 class="font-bold mb-2 dark:text-white">Cari Properti</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Gunakan search bar di halaman <a href="{{ route('properties.index') }}" class="text-indigo-600 font-bold hover:underline">Properties</a> atau gunakan filter untuk menemukan properti impian Anda.</p>
            </div>
            <div class="p-6 bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800 hover:shadow-lg transition-all duration-300">
                <div class="w-10 h-10 bg-emerald-50 dark:bg-emerald-900/20 rounded-xl flex items-center justify-center text-emerald-500 mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                </div>
                <h3 class="font-bold mb-2 dark:text-white">Cara Register</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Klik <a href="{{ route('register') }}" class="text-indigo-600 font-bold hover:underline">Register</a> pada navbar, isi formulir (nama, email, password), dan akun Anda langsung aktif sebagai Buyer.</p>
            </div>
            <div class="p-6 bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800 hover:shadow-lg transition-all duration-300">
                <div class="w-10 h-10 bg-blue-50 dark:bg-blue-900/20 rounded-xl flex items-center justify-center text-blue-500 mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="font-bold mb-2 dark:text-white">Lihat Detail</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Klik pada kartu properti mana saja untuk membuka halaman detail lengkap dengan foto, spesifikasi, lokasi, dan informasi kontak agent.</p>
            </div>
        </div>
    </div>
</section>



{{-- Footer --}}
<footer class="py-16 text-center">
    <p class="text-xs text-slate-400 font-medium">&copy; {{ date('Y') }} PropertiKu. All rights reserved.</p>
</footer>

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
