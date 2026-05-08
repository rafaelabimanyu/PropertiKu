<nav x-data="{ open: false }" class="fixed w-full z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-slate-200 dark:border-gray-800">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-xl font-black tracking-tighter text-indigo-600">
                        PROPERTI<span class="text-slate-900 dark:text-white">KU</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">
                    <a href="{{ route('home') }}" class="text-xs font-bold uppercase tracking-widest hover:text-indigo-600 transition {{ request()->routeIs('home') ? 'text-indigo-600' : 'text-slate-500 dark:text-slate-400' }}">Home</a>
                    <a href="{{ route('properties.index') }}" class="text-xs font-bold uppercase tracking-widest hover:text-indigo-600 transition {{ request()->routeIs('properties.*') ? 'text-indigo-600' : 'text-slate-500 dark:text-slate-400' }}">Properties</a>
                    <a href="{{ route('featured') }}" class="text-xs font-bold uppercase tracking-widest hover:text-indigo-600 transition {{ request()->routeIs('featured') ? 'text-indigo-600' : 'text-slate-500 dark:text-slate-400' }}">Featured</a>
                    <a href="{{ route('guide') }}" class="text-xs font-bold uppercase tracking-widest hover:text-indigo-600 transition {{ request()->routeIs('guide') ? 'text-indigo-600' : 'text-slate-500 dark:text-slate-400' }}">Guide</a>
                    <a href="{{ route('contact') }}" class="text-xs font-bold uppercase tracking-widest hover:text-indigo-600 transition {{ request()->routeIs('contact') ? 'text-indigo-600' : 'text-slate-500 dark:text-slate-400' }}">Contact</a>
                </div>
            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="px-5 py-2 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-indigo-100 dark:hover:bg-indigo-900/50 transition">
                        Dashboard
                    </a>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 border border-slate-100 dark:border-gray-800 text-xs leading-4 font-black uppercase tracking-widest rounded-xl text-slate-500 dark:text-slate-400 bg-slate-50/50 dark:bg-gray-800/50 hover:text-indigo-600 transition ease-in-out duration-150">
                                <div class="flex items-center">
                                    <span>{{ Auth::user()->name }}</span>
                                    <span class="ml-2 px-2 py-0.5 bg-indigo-100 dark:bg-indigo-900 text-indigo-600 dark:text-indigo-400 text-xs font-bold rounded">{{ ucfirst(Auth::user()->role) }}</span>
                                </div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="text-xs font-bold uppercase tracking-widest hover:text-indigo-600 transition text-slate-500 dark:text-slate-400">Log in</a>
                    <a href="{{ route('register') }}" class="px-6 py-2.5 bg-slate-900 dark:bg-white text-white dark:text-slate-900 text-[10px] font-black uppercase tracking-widest rounded-full hover:bg-indigo-600 dark:hover:bg-indigo-400 hover:text-white transition shadow-xl">Join Now</a>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white dark:bg-gray-900 border-t border-slate-200 dark:border-gray-800">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl text-sm font-bold {{ request()->routeIs('home') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-gray-800' }} transition">Home</a>
            <a href="{{ route('properties.index') }}" class="block px-4 py-3 rounded-xl text-sm font-bold {{ request()->routeIs('properties.*') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-gray-800' }} transition">Properties</a>
            <a href="{{ route('featured') }}" class="block px-4 py-3 rounded-xl text-sm font-bold {{ request()->routeIs('featured') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-gray-800' }} transition">Featured</a>
            <a href="{{ route('guide') }}" class="block px-4 py-3 rounded-xl text-sm font-bold {{ request()->routeIs('guide') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-gray-800' }} transition">Guide</a>
            <a href="{{ route('contact') }}" class="block px-4 py-3 rounded-xl text-sm font-bold {{ request()->routeIs('contact') ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-gray-800' }} transition">Contact</a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-3 border-t border-gray-200 dark:border-gray-800 px-4">
            @auth
                <div class="px-4 mb-3">
                    <div class="font-bold text-base text-gray-800 dark:text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    <span class="inline-block mt-1 px-2 py-0.5 bg-indigo-100 dark:bg-indigo-900 text-indigo-600 dark:text-indigo-400 text-[10px] font-bold rounded uppercase">{{ Auth::user()->role }}</span>
                </div>

                <div class="space-y-1">
                    <a href="{{ route('dashboard') }}" class="block px-4 py-3 rounded-xl text-sm font-bold text-indigo-600 bg-indigo-50 dark:bg-indigo-900/30 transition">Dashboard</a>
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-3 rounded-xl text-sm font-bold text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-gray-800 transition">Profile</a>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-3 rounded-xl text-sm font-bold text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition">
                            Log Out
                        </button>
                    </form>
                </div>
            @else
                <div class="space-y-2">
                    <a href="{{ route('login') }}" class="block px-4 py-3 rounded-xl text-sm font-bold text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-gray-800 transition">Log In</a>
                    <a href="{{ route('register') }}" class="block px-4 py-3 rounded-xl text-sm font-bold text-white bg-indigo-600 text-center hover:bg-indigo-700 transition">Register</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
