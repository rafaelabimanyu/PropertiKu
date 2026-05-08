<x-app-layout>
    <div class="py-24 bg-slate-50 dark:bg-gray-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="text-5xl font-black text-slate-900 dark:text-white mb-6 tracking-tighter">Site <span class="text-gradient">Map</span></h1>
                <p class="text-slate-500 dark:text-slate-400 font-medium text-lg max-w-2xl mx-auto italic">A structured overview of the PropertiKu ecosystem.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                {{-- Main Pages --}}
                <div class="glass dark:glass-dark rounded-[2.5rem] p-10 border border-white/10">
                    <h3 class="text-xl font-black text-slate-900 dark:text-white mb-8 flex items-center">
                        <span class="w-2 h-2 bg-indigo-600 rounded-full mr-3"></span>
                        Marketplace
                    </h3>
                    <ul class="space-y-4">
                        <li><a href="{{ route('home') }}" class="text-slate-500 hover:text-indigo-600 font-bold transition">Home</a></li>
                        <li><a href="{{ route('properties.index') }}" class="text-slate-500 hover:text-indigo-600 font-bold transition">All Properties</a></li>
                        <li><a href="{{ route('featured') }}" class="text-slate-500 hover:text-indigo-600 font-bold transition">Featured Listings</a></li>
                    </ul>
                </div>

                {{-- User Resources --}}
                <div class="glass dark:glass-dark rounded-[2.5rem] p-10 border border-white/10">
                    <h3 class="text-xl font-black text-slate-900 dark:text-white mb-8 flex items-center">
                        <span class="w-2 h-2 bg-emerald-600 rounded-full mr-3"></span>
                        Member Center
                    </h3>
                    <ul class="space-y-4">
                        <li><a href="{{ route('dashboard') }}" class="text-slate-500 hover:text-emerald-600 font-bold transition">Dashboard</a></li>
                        <li><a href="{{ route('profile.edit') }}" class="text-slate-500 hover:text-emerald-600 font-bold transition">Profile Settings</a></li>
                        <li><a href="{{ route('notifications.index') }}" class="text-slate-500 hover:text-emerald-600 font-bold transition">Notifications</a></li>
                    </ul>
                </div>

                {{-- Legal & Support --}}
                <div class="glass dark:glass-dark rounded-[2.5rem] p-10 border border-white/10">
                    <h3 class="text-xl font-black text-slate-900 dark:text-white mb-8 flex items-center">
                        <span class="w-2 h-2 bg-amber-600 rounded-full mr-3"></span>
                        Help & Legal
                    </h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-slate-500 hover:text-amber-600 font-bold transition">Terms of Service</a></li>
                        <li><a href="#" class="text-slate-500 hover:text-amber-600 font-bold transition">Privacy Policy</a></li>
                        <li><a href="{{ route('guide') }}" class="text-slate-500 hover:text-amber-600 font-bold transition">User Guide</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
