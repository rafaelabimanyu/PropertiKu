<x-guest-layout>
    <div class="mb-10">
        <h2 class="text-3xl font-black tracking-tight text-slate-900 mb-2">Create Account</h2>
        <p class="text-sm font-medium text-slate-500">Join PropertiKu and start your premium journey.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">Full Name</label>
            <input id="name" class="block w-full bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 p-4 transition-colors" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="John Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">Email Address</label>
            <input id="email" class="block w-full bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 p-4 transition-colors" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="name@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">Password</label>
            <div class="relative" x-data="{ show: false }">
                <input id="password" :type="show ? 'text' : 'password'" class="block w-full bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 p-4 transition-colors" name="password" required autocomplete="new-password" placeholder="••••••••" />
                <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 px-4 flex items-center text-slate-400 hover:text-indigo-600 focus:outline-none">
                    <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    <svg x-show="show" class="w-5 h-5" style="display:none;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">Confirm Password</label>
            <div class="relative" x-data="{ show: false }">
                <input id="password_confirmation" :type="show ? 'text' : 'password'" class="block w-full bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 p-4 transition-colors" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 px-4 flex items-center text-slate-400 hover:text-indigo-600 focus:outline-none">
                    <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    <svg x-show="show" class="w-5 h-5" style="display:none;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl text-[10px] uppercase tracking-[0.2em] transition shadow-xl shadow-indigo-500/30 flex items-center justify-center group">
                Create Account
                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </div>

        <p class="text-center text-sm font-medium text-slate-500 mt-8">
            Already registered? 
            <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:text-indigo-700 transition">Log in instead</a>
        </p>
    </form>
</x-guest-layout>
