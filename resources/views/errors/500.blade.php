<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>500 - Internal Server Error | PropertiKu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 dark:bg-gray-950 flex items-center justify-center min-h-screen p-6">
    <div class="max-w-xl w-full text-center">
        <div class="relative mb-12">
            <h1 class="text-[12rem] font-black leading-none text-slate-100 dark:text-gray-900 select-none">500</h1>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-32 h-32 bg-red-600 rounded-3xl -rotate-6 flex items-center justify-center shadow-2xl shadow-red-500/40">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
            </div>
        </div>
        
        <h2 class="text-4xl font-black text-slate-900 dark:text-white mb-6 tracking-tight">System <span class="text-red-600">Maintenance</span></h2>
        <p class="text-slate-500 dark:text-slate-400 font-medium text-lg leading-relaxed mb-10">We're experiencing a technical glitch in the system. Our team is already working to restore your premium experience.</p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ url('/') }}" class="w-full sm:w-auto px-8 py-4 bg-red-600 text-white font-black rounded-2xl text-[10px] uppercase tracking-[0.2em] hover:bg-red-700 transition shadow-xl shadow-red-500/30">
                Back to Home
            </a>
            <button onclick="window.location.reload()" class="w-full sm:w-auto px-8 py-4 bg-white dark:bg-gray-800 text-slate-900 dark:text-white font-black rounded-2xl text-[10px] uppercase tracking-[0.2em] border border-slate-200 dark:border-gray-700 hover:bg-slate-50 transition">
                Retry Connection
            </button>
        </div>
    </div>
</body>
</html>
