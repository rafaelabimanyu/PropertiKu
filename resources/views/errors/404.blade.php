<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - Page Not Found | PropertiKu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 dark:bg-gray-950 flex items-center justify-center min-h-screen p-6">
    <div class="max-w-xl w-full text-center">
        <div class="relative mb-12">
            <h1 class="text-[12rem] font-black leading-none text-slate-100 dark:text-gray-900 select-none">404</h1>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-32 h-32 bg-indigo-600 rounded-3xl rotate-12 flex items-center justify-center shadow-2xl shadow-indigo-500/40">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>
        </div>
        
        <h2 class="text-4xl font-black text-slate-900 dark:text-white mb-6 tracking-tight">Oops! Listing <span class="text-indigo-600">Not Found</span></h2>
        <p class="text-slate-500 dark:text-slate-400 font-medium text-lg leading-relaxed mb-10">The page you're looking for has moved to a better neighborhood or doesn't exist anymore.</p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ url('/') }}" class="w-full sm:w-auto px-8 py-4 bg-indigo-600 text-white font-black rounded-2xl text-[10px] uppercase tracking-[0.2em] hover:bg-indigo-700 transition shadow-xl shadow-indigo-500/30">
                Back to Home
            </a>
            <a href="{{ route('properties.index') }}" class="w-full sm:w-auto px-8 py-4 bg-white dark:bg-gray-800 text-slate-900 dark:text-white font-black rounded-2xl text-[10px] uppercase tracking-[0.2em] border border-slate-200 dark:border-gray-700 hover:bg-slate-50 transition">
                Search Properties
            </a>
        </div>
    </div>
</body>
</html>
