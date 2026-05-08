<x-dashboard-layout :role="'agent'" :title="'Leads Management'" :subtitle="'Track and manage potential buyers and inquiries in your pipeline.'">
    <div class="space-y-8">
        {{-- Pipeline Summary Cards --}}
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            @php
                $statuses = [
                    'new' => ['label' => 'New', 'color' => 'indigo'],
                    'contacted' => ['label' => 'Contacted', 'color' => 'blue'],
                    'qualified' => ['label' => 'Qualified', 'color' => 'emerald'],
                    'closed' => ['label' => 'Closed', 'color' => 'purple'],
                    'lost' => ['label' => 'Lost', 'color' => 'slate'],
                ];
            @endphp
            @foreach($statuses as $key => $info)
                <div class="bg-white dark:bg-gray-900 p-6 rounded-3xl border border-slate-100 dark:border-gray-800 shadow-sm text-center">
                    <p class="text-[9px] font-black uppercase tracking-widest text-slate-400 mb-2">{{ $info['label'] }}</p>
                    <h4 class="text-2xl font-black dark:text-white">{{ $leads->where('status', $key)->count() }}</h4>
                </div>
            @endforeach
        </div>

        {{-- Leads Table --}}
        <div class="bg-white dark:bg-gray-900 rounded-[2.5rem] border border-slate-100 dark:border-gray-800 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-slate-100 dark:border-gray-800 flex justify-between items-center">
                <h5 class="font-black dark:text-white uppercase tracking-widest text-xs">Active Pipeline</h5>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-[10px] font-black uppercase tracking-widest text-slate-400 bg-slate-50/50 dark:bg-gray-800/50 border-b border-slate-100 dark:border-gray-800">
                            <th class="px-8 py-4">Lead Name</th>
                            <th class="px-8 py-4">Contact</th>
                            <th class="px-8 py-4">Property</th>
                            <th class="px-8 py-4">Source</th>
                            <th class="px-8 py-4">Status</th>
                            <th class="px-8 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 dark:divide-gray-800">
                        @forelse($leads as $lead)
                            <tr class="group hover:bg-slate-50 dark:hover:bg-gray-800 transition">
                                <td class="px-8 py-5">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full bg-slate-100 dark:bg-gray-800 flex items-center justify-center font-black text-xs mr-3">
                                            {{ strtoupper(substr($lead->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold dark:text-white">{{ $lead->name }}</p>
                                            <p class="text-[10px] text-slate-400 font-medium italic">{{ $lead->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5">
                                    <p class="text-xs font-bold dark:text-white">{{ $lead->email }}</p>
                                    <p class="text-[10px] text-slate-500">{{ $lead->phone ?? 'No phone' }}</p>
                                </td>
                                <td class="px-8 py-5">
                                    <span class="text-xs font-medium dark:text-slate-400 truncate max-w-[150px] block">{{ $lead->property->title ?? 'General Inquiry' }}</span>
                                </td>
                                <td class="px-8 py-5">
                                    <span class="px-2 py-1 rounded-lg text-[8px] font-black uppercase tracking-wider bg-slate-100 text-slate-600 dark:bg-gray-800 dark:text-slate-400">
                                        {{ $lead->source }}
                                    </span>
                                </td>
                                <td class="px-8 py-5">
                                    <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-wider 
                                        @if($lead->status === 'new') bg-indigo-100 text-indigo-600 @elseif($lead->status === 'contacted') bg-blue-100 text-blue-600 @elseif($lead->status === 'qualified') bg-emerald-100 text-emerald-600 @elseif($lead->status === 'closed') bg-purple-100 text-purple-600 @else bg-slate-100 text-slate-500 @endif">
                                        {{ $lead->status }}
                                    </span>
                                </td>
                                <td class="px-8 py-5 text-right">
                                    <button onclick="openLeadModal({{ $lead->id }}, '{{ $lead->status }}', '{{ addslashes($lead->notes) }}')" class="p-2 text-slate-400 hover:text-indigo-600 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-8 py-12 text-center text-slate-400 text-sm font-medium italic">No leads in your pipeline yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-8 py-6 bg-slate-50 dark:bg-gray-800/30">
                {{ $leads->links() }}
            </div>
        </div>
    </div>

    {{-- Lead Status Modal --}}
    <div id="leadModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-slate-900/50 backdrop-blur-sm">
        <div class="bg-white dark:bg-gray-900 p-10 rounded-[2.5rem] max-w-lg w-full shadow-2xl">
            <h6 class="text-xl font-black mb-6 dark:text-white">Update Lead Status</h6>
            <form id="leadForm" method="POST" action="">
                @csrf @method('PATCH')
                <div class="mb-6">
                    <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">Current Status</label>
                    <select name="status" id="leadStatusInput" class="w-full bg-slate-50 dark:bg-gray-800 border-0 rounded-2xl p-4 text-sm font-bold focus:ring-4 focus:ring-indigo-500/20 transition">
                        @foreach($statuses as $key => $info)
                            <option value="{{ $key }}">{{ $info['label'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-8">
                    <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">Follow-up Notes</label>
                    <textarea name="notes" id="leadNotesInput" rows="4" class="w-full bg-slate-50 dark:bg-gray-800 border-0 rounded-2xl p-4 text-sm font-medium focus:ring-4 focus:ring-indigo-500/20 transition" placeholder="e.g. Called buyer, interested in viewing next week."></textarea>
                </div>
                <div class="flex space-x-4">
                    <button type="button" onclick="closeLeadModal()" class="flex-1 py-4 bg-slate-100 dark:bg-gray-800 text-slate-600 dark:text-slate-300 font-black rounded-2xl text-[10px] uppercase tracking-widest hover:bg-slate-200 transition">Cancel</button>
                    <button type="submit" class="flex-1 py-4 bg-indigo-600 text-white font-black rounded-2xl text-[10px] uppercase tracking-widest hover:bg-indigo-700 transition shadow-xl shadow-indigo-500/30">Update Lead</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openLeadModal(leadId, currentStatus, notes) {
            document.getElementById('leadForm').action = '/leads/' + leadId + '/status';
            document.getElementById('leadStatusInput').value = currentStatus;
            document.getElementById('leadNotesInput').value = notes;
            document.getElementById('leadModal').classList.remove('hidden');
        }
        function closeLeadModal() {
            document.getElementById('leadModal').classList.add('hidden');
        }
    </script>
</x-dashboard-layout>
