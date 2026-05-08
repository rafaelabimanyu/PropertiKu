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

{{-- Section B: Buyer --}}
<section id="section-buyer" class="py-16 bg-white dark:bg-gray-900/50 rounded-[3rem]">
    <div class="max-w-5xl mx-auto px-6">
        <div class="flex items-center mb-10">
            <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-2xl flex items-center justify-center text-emerald-600 font-black text-lg mr-4">B</div>
            <div><h2 class="text-2xl font-black dark:text-white">Untuk Buyer</h2><p class="text-sm text-slate-500">Fitur khusus untuk pembeli properti</p></div>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="p-6 bg-slate-50 dark:bg-gray-800 rounded-2xl hover:shadow-lg transition-all duration-300">
                <div class="w-10 h-10 bg-red-50 dark:bg-red-900/20 rounded-xl flex items-center justify-center text-red-500 mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </div>
                <h3 class="font-bold mb-2 dark:text-white">Simpan Favorit</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Klik tombol <span class="font-bold text-red-500">♥ Favorite</span> pada halaman detail properti. Lihat semua favorit Anda di menu <strong>Favorites</strong> pada dashboard.</p>
            </div>
            <div class="p-6 bg-slate-50 dark:bg-gray-800 rounded-2xl hover:shadow-lg transition-all duration-300">
                <div class="w-10 h-10 bg-blue-50 dark:bg-blue-900/20 rounded-xl flex items-center justify-center text-blue-500 mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="font-bold mb-2 dark:text-white">Booking Kunjungan</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Pilih tanggal kunjungan pada halaman detail properti dan klik <span class="font-bold text-blue-500">Book Visit</span>. Kelola booking di menu <strong>Bookings</strong>.</p>
            </div>
            <div class="p-6 bg-slate-50 dark:bg-gray-800 rounded-2xl hover:shadow-lg transition-all duration-300">
                <div class="w-10 h-10 bg-indigo-50 dark:bg-indigo-900/20 rounded-xl flex items-center justify-center text-indigo-500 mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
                <h3 class="font-bold mb-2 dark:text-white">Kelola Profile</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Pergi ke <strong>Profile</strong> melalui sidebar dashboard untuk mengubah nama, email, dan password akun Anda.</p>
            </div>
        </div>
    </div>
</section>

{{-- Section C: Agent --}}
<section id="section-agent" class="py-16">
    <div class="max-w-5xl mx-auto px-6">
        <div class="flex items-center mb-10">
            <div class="w-12 h-12 bg-amber-100 dark:bg-amber-900/30 rounded-2xl flex items-center justify-center text-amber-600 font-black text-lg mr-4">C</div>
            <div><h2 class="text-2xl font-black dark:text-white">Untuk Agent</h2><p class="text-sm text-slate-500">Panduan untuk agen properti</p></div>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="p-6 bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800 hover:shadow-lg transition-all duration-300">
                <div class="w-10 h-10 bg-emerald-50 dark:bg-emerald-900/20 rounded-xl flex items-center justify-center text-emerald-500 mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                </div>
                <h3 class="font-bold mb-2 dark:text-white">Tambah Listing</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Pilih menu <strong>Add Property</strong> pada dashboard Agent. Isi judul, harga, lokasi, deskripsi, fasilitas, dan upload foto properti.</p>
            </div>
            <div class="p-6 bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800 hover:shadow-lg transition-all duration-300">
                <div class="w-10 h-10 bg-amber-50 dark:bg-amber-900/20 rounded-xl flex items-center justify-center text-amber-500 mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </div>
                <h3 class="font-bold mb-2 dark:text-white">Kelola Properti</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Gunakan menu <strong>My Listings</strong> untuk melihat, mengedit, atau menghapus listing properti Anda.</p>
            </div>
            <div class="p-6 bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800 hover:shadow-lg transition-all duration-300">
                <div class="w-10 h-10 bg-blue-50 dark:bg-blue-900/20 rounded-xl flex items-center justify-center text-blue-500 mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="font-bold mb-2 dark:text-white">Lihat Leads</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Menu <strong>Leads</strong> menampilkan calon pembeli yang tertarik dengan properti Anda. Hubungi mereka untuk follow up.</p>
            </div>
        </div>
    </div>
</section>

{{-- Section D: Admin --}}
<section id="section-admin" class="py-16 bg-white dark:bg-gray-900/50 rounded-[3rem]">
    <div class="max-w-5xl mx-auto px-6">
        <div class="flex items-center mb-10">
            <div class="w-12 h-12 bg-violet-100 dark:bg-violet-900/30 rounded-2xl flex items-center justify-center text-violet-600 font-black text-lg mr-4">D</div>
            <div><h2 class="text-2xl font-black dark:text-white">Untuk Admin</h2><p class="text-sm text-slate-500">Panduan pengelolaan platform</p></div>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="p-6 bg-slate-50 dark:bg-gray-800 rounded-2xl hover:shadow-lg transition-all duration-300">
                <div class="w-10 h-10 bg-violet-50 dark:bg-violet-900/20 rounded-xl flex items-center justify-center text-violet-500 mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
                <h3 class="font-bold mb-2 dark:text-white">Kelola User</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Menu <strong>User Management</strong> menampilkan daftar semua akun. Verifikasi agent baru dan kelola permissions.</p>
            </div>
            <div class="p-6 bg-slate-50 dark:bg-gray-800 rounded-2xl hover:shadow-lg transition-all duration-300">
                <div class="w-10 h-10 bg-indigo-50 dark:bg-indigo-900/20 rounded-xl flex items-center justify-center text-indigo-500 mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h3 class="font-bold mb-2 dark:text-white">Kelola Properti</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Menu <strong>Properties</strong> memungkinkan audit dan pengelolaan semua listing yang ada di platform.</p>
            </div>
            <div class="p-6 bg-slate-50 dark:bg-gray-800 rounded-2xl hover:shadow-lg transition-all duration-300">
                <div class="w-10 h-10 bg-blue-50 dark:bg-blue-900/20 rounded-xl flex items-center justify-center text-blue-500 mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <h3 class="font-bold mb-2 dark:text-white">Lihat Laporan</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Menu <strong>Reports</strong> menampilkan statistik platform: jumlah user, properti, traffic, dan revenue analytics.</p>
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
