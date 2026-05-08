<x-app-layout>
    <div class="py-24 bg-slate-50 dark:bg-gray-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h1 class="text-6xl font-black text-slate-900 dark:text-white mb-8 tracking-tighter leading-none">Get in <span class="text-gradient">Touch</span></h1>
                    <p class="text-slate-500 dark:text-slate-400 font-medium text-xl leading-relaxed mb-12">Have questions about a property or want to join as an agent? Our team is here to help you navigate the premium real estate market.</p>
                    
                    <div class="space-y-8">
                        <div class="flex items-center group">
                            <div class="w-14 h-14 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center text-indigo-600 shadow-sm border border-slate-100 dark:border-gray-800 group-hover:scale-110 transition duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div class="ml-6">
                                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Email Us</p>
                                <p class="text-lg font-bold dark:text-white">support@propertiku.ai</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center group">
                            <div class="w-14 h-14 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center text-emerald-600 shadow-sm border border-slate-100 dark:border-gray-800 group-hover:scale-110 transition duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div class="ml-6">
                                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Call Us</p>
                                <p class="text-lg font-bold dark:text-white">+62 (21) 500-1234</p>
                            </div>
                        </div>

                        <div class="flex items-center group">
                            <div class="w-14 h-14 bg-white dark:bg-gray-900 rounded-2xl flex items-center justify-center text-amber-600 shadow-sm border border-slate-100 dark:border-gray-800 group-hover:scale-110 transition duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div class="ml-6">
                                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Office</p>
                                <p class="text-lg font-bold dark:text-white">Equity Tower, 18th Floor, Jakarta SCBD</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="glass dark:glass-dark rounded-[3rem] p-12 shadow-2xl border border-white/10">
                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-indigo-600 mb-2">Full Name</label>
                                <input type="text" class="w-full bg-slate-50 dark:bg-gray-800 border-0 rounded-2xl p-4 text-sm font-bold focus:ring-4 focus:ring-indigo-500/20 transition" placeholder="John Doe">
                            </div>
                            <div>
                                <label class="block text-[10px] font-black uppercase tracking-widest text-indigo-600 mb-2">Email Address</label>
                                <input type="email" class="w-full bg-slate-50 dark:bg-gray-800 border-0 rounded-2xl p-4 text-sm font-bold focus:ring-4 focus:ring-indigo-500/20 transition" placeholder="john@example.com">
                            </div>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-indigo-600 mb-2">Subject</label>
                            <select class="w-full bg-slate-50 dark:bg-gray-800 border-0 rounded-2xl p-4 text-sm font-bold focus:ring-4 focus:ring-indigo-500/20 transition">
                                <option>Property Inquiry</option>
                                <option>Join as Agent</option>
                                <option>Tech Support</option>
                                <option>Business Partnership</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-indigo-600 mb-2">Message</label>
                            <textarea rows="5" class="w-full bg-slate-50 dark:bg-gray-800 border-0 rounded-2xl p-4 text-sm font-medium focus:ring-4 focus:ring-indigo-500/20 transition" placeholder="How can we help you?"></textarea>
                        </div>
                        <button type="button" class="w-full py-5 bg-indigo-600 text-white font-black rounded-2xl text-[10px] uppercase tracking-[0.2em] hover:bg-indigo-700 transition shadow-xl shadow-indigo-500/30">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
