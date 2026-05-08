<x-dashboard-layout :role="'admin'" :title="'Agent Verification Queue'" :subtitle="'Review and manage agent verification requests to maintain platform trust.'">
    <div class="space-y-8">
        {{-- Pending Requests --}}
        <div class="bg-white dark:bg-gray-900 rounded-[2.5rem] border border-slate-100 dark:border-gray-800 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-slate-100 dark:border-gray-800 flex justify-between items-center bg-slate-50/50 dark:bg-gray-800/30">
                <h5 class="font-black dark:text-white flex items-center uppercase tracking-widest text-xs">
                    <div class="w-2 h-2 bg-amber-500 rounded-full mr-3 animate-pulse"></div>
                    Pending Requests ({{ $pendingAgents->count() }})
                </h5>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-[10px] font-black uppercase tracking-widest text-slate-400 bg-slate-50/50 dark:bg-gray-800/50 border-b border-slate-100 dark:border-gray-800">
                            <th class="px-8 py-4">Agent Name</th>
                            <th class="px-8 py-4">Company</th>
                            <th class="px-8 py-4">Phone</th>
                            <th class="px-8 py-4">License</th>
                            <th class="px-8 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 dark:divide-gray-800">
                        @forelse($pendingAgents as $agent)
                            <tr class="group hover:bg-slate-50 dark:hover:bg-gray-800 transition">
                                <td class="px-8 py-5">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-black text-xs mr-3">
                                            {{ strtoupper(substr($agent->name, 0, 1)) }}
                                        </div>
                                        <span class="text-sm font-bold dark:text-white">{{ $agent->name }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-sm font-medium text-slate-600 dark:text-slate-400">{{ $agent->company_name }}</td>
                                <td class="px-8 py-5 text-sm font-medium text-slate-600 dark:text-slate-400">{{ $agent->phone }}</td>
                                <td class="px-8 py-5 text-sm font-medium text-slate-600 dark:text-slate-400">{{ $agent->license_number ?? '-' }}</td>
                                <td class="px-8 py-5 text-right space-x-2">
                                    <form action="{{ route('admin.verifications.approve', $agent) }}" method="POST" class="inline-block">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="px-4 py-2 bg-emerald-100 text-emerald-700 hover:bg-emerald-500 hover:text-white rounded-xl text-[10px] font-black uppercase tracking-widest transition">Approve</button>
                                    </form>
                                    
                                    <button onclick="openRejectModal({{ $agent->id }}, '{{ $agent->name }}')" class="px-4 py-2 bg-red-100 text-red-700 hover:bg-red-500 hover:text-white rounded-xl text-[10px] font-black uppercase tracking-widest transition">Reject</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-12 text-center text-slate-400 text-sm font-medium italic">No pending verification requests.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- All Agents List (Quick Audit) --}}
        <div class="bg-white dark:bg-gray-900 rounded-[2.5rem] border border-slate-100 dark:border-gray-800 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-slate-100 dark:border-gray-800 flex justify-between items-center">
                <h5 class="font-black dark:text-white uppercase tracking-widest text-xs">All Agents Status</h5>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-[10px] font-black uppercase tracking-widest text-slate-400 bg-slate-50/50 dark:bg-gray-800/50 border-b border-slate-100 dark:border-gray-800">
                            <th class="px-8 py-4">Agent Name</th>
                            <th class="px-8 py-4">Status</th>
                            <th class="px-8 py-4">Verified</th>
                            <th class="px-8 py-4">Joined At</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 dark:divide-gray-800">
                        @foreach($allAgents as $agent)
                            <tr class="hover:bg-slate-50 dark:hover:bg-gray-800 transition">
                                <td class="px-8 py-5 text-sm font-bold dark:text-white">{{ $agent->name }}</td>
                                <td class="px-8 py-5">
                                    <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-wider 
                                        {{ $agent->verification_status === 'approved' ? 'bg-emerald-100 text-emerald-600' : ($agent->verification_status === 'pending' ? 'bg-amber-100 text-amber-600' : ($agent->verification_status === 'rejected' ? 'bg-red-100 text-red-600' : 'bg-slate-100 text-slate-500')) }}">
                                        {{ $agent->verification_status }}
                                    </span>
                                </td>
                                <td class="px-8 py-5">
                                    @if($agent->is_verified)
                                        <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path></svg>
                                    @else
                                        <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m0 0v2m0-2h2m-2 0H10m1-11a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                                    @endif
                                </td>
                                <td class="px-8 py-5 text-sm text-slate-500">{{ $agent->created_at->format('M d, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Reject Modal Placeholder (Simplified for logic) --}}
    <div id="rejectModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-slate-900/50 backdrop-blur-sm">
        <div class="bg-white dark:bg-gray-900 p-10 rounded-[2.5rem] max-w-lg w-full shadow-2xl">
            <h6 class="text-xl font-black mb-4 dark:text-white" id="rejectAgentName">Reject Verification</h6>
            <form id="rejectForm" method="POST" action="">
                @csrf @method('PATCH')
                <div class="mb-6">
                    <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">Rejection Reason / Notes</label>
                    <textarea name="notes" required rows="4" class="w-full bg-slate-50 dark:bg-gray-800 border-0 rounded-2xl p-4 text-sm font-medium focus:ring-4 focus:ring-red-500/20 transition" placeholder="e.g. License number is invalid or expired."></textarea>
                </div>
                <div class="flex space-x-4">
                    <button type="button" onclick="closeRejectModal()" class="flex-1 py-4 bg-slate-100 dark:bg-gray-800 text-slate-600 dark:text-slate-300 font-black rounded-2xl text-[10px] uppercase tracking-widest hover:bg-slate-200 transition">Cancel</button>
                    <button type="submit" class="flex-1 py-4 bg-red-600 text-white font-black rounded-2xl text-[10px] uppercase tracking-widest hover:bg-red-700 transition shadow-xl shadow-red-500/30">Confirm Reject</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openRejectModal(agentId, agentName) {
            document.getElementById('rejectAgentName').innerText = 'Reject Verification: ' + agentName;
            document.getElementById('rejectForm').action = '/dashboard/admin/verifications/' + agentId + '/reject';
            document.getElementById('rejectModal').classList.remove('hidden');
        }
        function closeRejectModal() {
            document.getElementById('rejectModal').classList.add('hidden');
        }
    </script>
</x-dashboard-layout>
