<x-dashboard-layout :role="'agent'" :title="'Agent Verification'" :subtitle="'Complete your profile to earn the Verified Agent badge and gain buyer trust.'">
    <div class="max-w-4xl">
        {{-- Status Card --}}
        <div class="mb-8 p-8 rounded-3xl border {{ $user->is_verified ? 'bg-emerald-50 border-emerald-100 text-emerald-800' : ($user->verification_status === 'pending' ? 'bg-amber-50 border-amber-100 text-amber-800' : ($user->verification_status === 'rejected' ? 'bg-red-50 border-red-100 text-red-800' : 'bg-white dark:bg-gray-900 border-slate-100 dark:border-gray-800')) }} shadow-sm">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center mr-6 {{ $user->is_verified ? 'bg-emerald-500 text-white' : ($user->verification_status === 'pending' ? 'bg-amber-500 text-white' : ($user->verification_status === 'rejected' ? 'bg-red-500 text-white' : 'bg-slate-100 dark:bg-gray-800 text-slate-400')) }}">
                        @if($user->is_verified)
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"></path></svg>
                        @elseif($user->verification_status === 'pending')
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        @else
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path></svg>
                        @endif
                    </div>
                    <div>
                        <h4 class="text-xl font-black tracking-tight mb-1">
                            Status: {{ $user->is_verified ? 'Verified Agent' : ($user->verification_status === 'pending' ? 'Verification Pending' : ($user->verification_status === 'rejected' ? 'Verification Rejected' : 'Not Verified')) }}
                        </h4>
                        <p class="text-sm font-medium opacity-80">
                            {{ $user->is_verified ? 'Congratulations! Your profile is verified and trust badges are now active.' : ($user->verification_status === 'pending' ? 'Your verification is being reviewed by our team. This usually takes 1-2 business days.' : ($user->verification_status === 'rejected' ? 'Unfortunately, your verification was rejected. Please review the notes below.' : 'Submit your business details below to start the verification process.')) }}
                        </p>
                    </div>
                </div>
            </div>

            @if($user->verification_notes)
                <div class="mt-6 pt-6 border-t {{ $user->is_verified ? 'border-emerald-200' : ($user->verification_status === 'pending' ? 'border-amber-200' : 'border-red-200') }}">
                    <p class="text-[10px] font-black uppercase tracking-widest mb-2">Admin Notes:</p>
                    <p class="text-sm font-medium leading-relaxed italic opacity-90">"{{ $user->verification_notes }}"</p>
                </div>
            @endif
        </div>

        {{-- Verification Form --}}
        <div class="p-10 bg-white dark:bg-gray-900 rounded-[2.5rem] border border-slate-100 dark:border-gray-800 shadow-sm relative overflow-hidden">
            <div class="absolute top-0 right-0 p-8 opacity-5">
                <svg class="w-32 h-32 text-indigo-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L3 7v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-9-5z"></path></svg>
            </div>

            <h5 class="text-lg font-black dark:text-white mb-8 relative z-10">Verification Profile</h5>

            <form action="{{ route('verification.submit') }}" method="POST" class="space-y-6 relative z-10">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">Company / Agency Name</label>
                        <input type="text" name="company_name" value="{{ old('company_name', $user->company_name) }}" required class="w-full bg-slate-50 dark:bg-gray-800 border-0 rounded-2xl p-4 text-sm font-medium focus:ring-4 focus:ring-indigo-500/20 transition" placeholder="e.g. Royal Real Estate">
                        <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                    </div>
                    <div>
                        <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">Business Phone Number</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" required class="w-full bg-slate-50 dark:bg-gray-800 border-0 rounded-2xl p-4 text-sm font-medium focus:ring-4 focus:ring-indigo-500/20 transition" placeholder="e.g. +62 812 3456 7890">
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">Real Estate License Number (Optional)</label>
                    <input type="text" name="license_number" value="{{ old('license_number', $user->license_number) }}" class="w-full bg-slate-50 dark:bg-gray-800 border-0 rounded-2xl p-4 text-sm font-medium focus:ring-4 focus:ring-indigo-500/20 transition" placeholder="e.g. RE-2024-8899">
                    <x-input-error :messages="$errors->get('license_number')" class="mt-2" />
                </div>

                <div class="pt-4">
                    <button type="submit" class="px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl text-[10px] uppercase tracking-[0.2em] transition shadow-xl shadow-indigo-500/30 flex items-center group disabled:opacity-50" {{ $user->verification_status === 'pending' ? 'disabled' : '' }}>
                        {{ $user->verification_status === 'unsubmitted' ? 'Submit for Verification' : 'Update & Resubmit' }}
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>
