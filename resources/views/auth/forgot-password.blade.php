<x-guest-layout>
    <div class="mb-10">
        <h2 class="text-3xl font-black tracking-tight text-slate-900 mb-2">Reset Password</h2>
        <p class="text-sm font-medium text-slate-500 leading-relaxed">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">Email Address</label>
            <input id="email" class="block w-full bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-2xl focus:ring-indigo-500 focus:border-indigo-500 p-4 transition-colors" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="name@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl text-[10px] uppercase tracking-[0.2em] transition shadow-xl shadow-indigo-500/30 flex items-center justify-center group">
                Email Password Reset Link
                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </div>

        <p class="text-center text-sm font-medium text-slate-500 mt-8">
            Remembered your password? 
            <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:text-indigo-700 transition">Back to login</a>
        </p>
    </form>
</x-guest-layout>
