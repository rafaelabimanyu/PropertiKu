<x-app-layout>
    <head>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
        <style>#map { height: 400px; width: 100%; border-radius: 2.5rem; z-index: 10; }</style>
    </head>

    <div class="bg-slate-50 dark:bg-gray-950 pt-32 pb-20 min-h-screen" x-data="{ showBooking: false }">
        <div class="max-w-7xl mx-auto px-6 sm:px-8">
            
            <!-- Breadcrumb / Back Link -->
            <div class="mb-12 flex justify-between items-center">
                <a href="{{ route('properties.index') }}" class="group flex items-center text-xs font-black uppercase tracking-widest text-slate-400 hover:text-indigo-600 transition">
                    <span class="mr-3 p-2 bg-white dark:bg-gray-800 rounded-full group-hover:-translate-x-1 transition shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    </span>
                    Back to Listings
                </a>
                
                <div class="flex gap-3">
                    @auth
                        {{-- Favorite Toggle --}}
                        <form method="POST" action="{{ route('favorites.toggle') }}">
                            @csrf
                            <input type="hidden" name="property_id" value="{{ $property->id }}">
                            @php $isFav = auth()->user()->favorites->contains($property->id); @endphp
                            <button class="flex items-center px-5 py-2.5 rounded-full text-[10px] font-black uppercase tracking-widest transition shadow-sm
                                {{ $isFav ? 'bg-red-500 text-white hover:bg-red-600' : 'bg-white dark:bg-gray-800 text-slate-500 hover:text-red-500 border border-slate-200 dark:border-gray-700' }}">
                                <svg class="w-4 h-4 mr-2" fill="{{ $isFav ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                {{ $isFav ? 'Saved' : 'Save' }}
                            </button>
                        </form>
                    @endauth
                    @can('update', $property)
                        <a href="{{ route('properties.edit', $property) }}" class="px-6 py-2.5 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 text-[10px] font-black uppercase tracking-widest rounded-full hover:bg-indigo-600 hover:text-white transition">Edit</a>
                    @endcan
                </div>
            </div>

            <!-- Hero Detail Section -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-20">
                <!-- Gallery -->
                <div class="lg:col-span-8">
                    <div class="relative rounded-[3rem] overflow-hidden group shadow-2xl">
                        @if($property->image)
                            <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}" class="w-full h-[600px] object-cover">
                        @else
                            <div class="w-full h-[600px] bg-slate-200 dark:bg-gray-800 flex items-center justify-center text-slate-400">
                                <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        <div class="absolute top-8 left-8">
                            <span class="px-6 py-2 bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl rounded-full text-[10px] font-black uppercase tracking-[0.2em] {{ $property->status === 'sale' ? 'text-emerald-600' : 'text-blue-600' }}">
                                {{ ucfirst($property->status) }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Info Sidebar -->
                <div class="lg:col-span-4 space-y-10">
                    <div class="glass dark:glass-dark rounded-[3rem] p-10 shadow-xl border border-white/10">
                        <h1 class="text-3xl font-black text-slate-900 dark:text-white mb-4 leading-tight">{{ $property->title }}</h1>
                        <p class="text-indigo-600 dark:text-indigo-400 text-4xl font-black mb-8">${{ number_format($property->price, 0) }}</p>
                        
                        <div class="flex items-center text-slate-500 dark:text-slate-400 mb-10 pb-8 border-b border-slate-100 dark:border-gray-800">
                            <svg class="w-5 h-5 mr-3 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span class="text-sm font-bold">{{ $property->address }}, {{ $property->city }}</span>
                        </div>

                        <div class="grid grid-cols-3 gap-6 mb-12">
                            <div class="text-center">
                                <p class="text-[10px] font-black uppercase text-slate-400 mb-2">Beds</p>
                                <p class="text-xl font-black">{{ $property->bedrooms }}</p>
                            </div>
                            <div class="text-center border-x border-slate-100 dark:border-gray-800">
                                <p class="text-[10px] font-black uppercase text-slate-400 mb-2">Baths</p>
                                <p class="text-xl font-black">{{ $property->bathrooms }}</p>
                            </div>
                            <div class="text-center">
                                <p class="text-[10px] font-black uppercase text-slate-400 mb-2">Area</p>
                                <p class="text-xl font-black">{{ number_format($property->area) }}<span class="text-xs">ft²</span></p>
                            </div>
                        </div>

                        @auth
                            <button @click="showBooking = true" class="w-full py-5 bg-indigo-600 text-white font-black rounded-2xl text-[10px] uppercase tracking-[0.2em] hover:bg-indigo-700 transition shadow-xl shadow-indigo-500/30 mb-4">
                                Book a Survey
                            </button>
                            <a href="{{ route('chat.show', $property->user_id) }}" class="block text-center w-full py-5 bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-black rounded-2xl text-[10px] uppercase tracking-[0.2em] hover:opacity-90 transition">
                                Chat Agent
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="block text-center w-full py-5 bg-indigo-600 text-white font-black rounded-2xl text-[10px] uppercase tracking-[0.2em] hover:bg-indigo-700 transition shadow-xl shadow-indigo-500/30 mb-4">Login to Book</a>
                            <a href="{{ route('login') }}" class="block text-center w-full py-5 bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-black rounded-2xl text-[10px] uppercase tracking-[0.2em] hover:opacity-90 transition">Login to Chat</a>
                        @endauth
                    </div>

                    <!-- Agent Card -->
                    <div class="flex items-center p-8 glass dark:glass-dark rounded-[3rem]">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-500 to-emerald-500 flex items-center justify-center text-white font-black text-xl mr-6">
                            {{ substr($property->user->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-xs font-black uppercase tracking-widest text-indigo-600 mb-1">Listed By</p>
                            <p class="text-lg font-black">{{ $property->user->name }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description & Map -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <div class="lg:col-span-8 space-y-16">
                    <!-- Facilities -->
                    <div>
                        <h3 class="text-2xl font-black mb-10 tracking-tight">Property <span class="text-gradient">Highlights</span></h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                            @if(is_array($property->facilities) && count($property->facilities) > 0)
                                @foreach($property->facilities as $feat)
                                    <div class="flex items-center p-4 bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800">
                                        <div class="w-8 h-8 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg flex items-center justify-center mr-4">
                                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        </div>
                                        <span class="text-xs font-bold">{{ $feat }}</span>
                                    </div>
                                @endforeach
                            @else
                                @foreach(['Smart Home', 'Pool', 'Security', 'Parking'] as $feat)
                                    <div class="flex items-center p-4 bg-white dark:bg-gray-900 rounded-2xl border border-slate-100 dark:border-gray-800 opacity-50">
                                        <div class="w-8 h-8 bg-slate-100 dark:bg-slate-800 rounded-lg flex items-center justify-center mr-4">
                                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        </div>
                                        <span class="text-xs font-bold">{{ $feat }}</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <h3 class="text-2xl font-black mb-6 tracking-tight">Description</h3>
                        <p class="text-slate-500 dark:text-slate-400 font-medium leading-loose text-justify">{{ $property->description }}</p>
                    </div>

                    <!-- Map -->
                    <div>
                        <h3 class="text-2xl font-black mb-10 tracking-tight">Location <span class="text-gradient">Map</span></h3>
                        <div id="map" class="shadow-2xl"></div>
                    </div>

                    <!-- Related -->
                    <div class="pt-20">
                        <div class="flex items-center justify-between mb-12">
                            <h3 class="text-2xl font-black tracking-tight">Similar <span class="text-gradient">Properties</span></h3>
                            <span class="px-4 py-1.5 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-full text-[9px] font-black uppercase tracking-widest shadow-lg flex items-center">
                                <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                AI Recommended
                            </span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            @foreach($relatedProperties as $related)
                                <x-property-card :property="$related" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Booking Modal --}}
        @auth
        <div x-show="showBooking" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[60] flex items-center justify-center p-4" style="display:none;">
            <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" @click="showBooking = false"></div>
            <div class="relative bg-white dark:bg-gray-900 rounded-3xl p-8 max-w-md w-full shadow-2xl z-10" @click.away="showBooking = false">
                <button @click="showBooking = false" class="absolute top-4 right-4 p-2 text-slate-400 hover:text-slate-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
                <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-2xl flex items-center justify-center text-indigo-600 mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-xl font-black dark:text-white mb-1">Book a Survey</h3>
                <p class="text-xs text-slate-500 mb-6">Schedule a visit to <strong>{{ $property->title }}</strong></p>

                <form method="POST" action="{{ route('bookings.store') }}" class="space-y-4">
                    @csrf
                    <input type="hidden" name="property_id" value="{{ $property->id }}">
                    <div>
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 block mb-2">Survey Date</label>
                        <input type="date" name="survey_date" min="{{ date('Y-m-d') }}" required
                            class="w-full px-4 py-3 bg-slate-50 dark:bg-gray-800 border-0 rounded-xl text-sm font-bold focus:ring-2 focus:ring-indigo-500 dark:text-white">
                    </div>
                    <div>
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 block mb-2">Preferred Time</label>
                        <select name="survey_time" required class="w-full px-4 py-3 bg-slate-50 dark:bg-gray-800 border-0 rounded-xl text-sm font-bold focus:ring-2 focus:ring-indigo-500 dark:text-white">
                            <option value="09:00">09:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="13:00">01:00 PM</option>
                            <option value="14:00">02:00 PM</option>
                            <option value="15:00">03:00 PM</option>
                            <option value="16:00">04:00 PM</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 block mb-2">Notes (Optional)</label>
                        <textarea name="notes" rows="3" placeholder="Any special requests..."
                            class="w-full px-4 py-3 bg-slate-50 dark:bg-gray-800 border-0 rounded-xl text-sm font-medium focus:ring-2 focus:ring-indigo-500 dark:text-white placeholder-slate-400 resize-none"></textarea>
                    </div>
                    <button type="submit" class="w-full py-4 bg-indigo-600 text-white font-black rounded-2xl text-[10px] uppercase tracking-[0.2em] hover:bg-indigo-700 transition shadow-xl shadow-indigo-500/30">
                        Confirm Booking
                    </button>
                </form>
            </div>
        </div>
        @endauth
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var lat = {{ $property->latitude ?? '-8.4095' }};
            var lng = {{ $property->longitude ?? '115.1889' }};
            var map = L.map('map').setView([lat, lng], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            L.marker([lat, lng]).addTo(map).bindPopup('{{ $property->title }}').openPopup();
        });
    </script>
</x-app-layout>
