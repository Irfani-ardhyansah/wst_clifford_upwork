@extends('admin.portal')

@section('title', 'GRESB Water Consultations')
@section('header_title', 'GRESB Water Performance Tool')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/40 overflow-hidden border border-gray-100">
        
        <div class="p-6 border-b border-gray-100 bg-white relative z-20">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Manage Consultation Requests</h3>
                    <p class="text-sm text-gray-500">Review and update status of inbound GRESB requests.</p>
                </div>
            </div>

            <div class="bg-gray-50 rounded-xl p-1.5 border border-gray-100">
                <form action="{{ route('admin.gresb-water.index') }}" method="GET" class="flex items-center w-full">
                    <div class="relative flex-1 group">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search by name or company..." 
                            class="block w-full pl-10 pr-3 py-2 bg-transparent border-0 text-sm text-gray-900 focus:ring-0 rounded-lg">
                    </div>
                    @if(request('search'))
                        <a href="{{ route('admin.gresb-water.index') }}" class="ml-2 p-2 text-gray-400 hover:text-red-500"><i class="fa-solid fa-xmark"></i></a>
                    @endif
                </form>
            </div>
        </div>

        <div class="relative z-10 overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/80 border-b border-gray-100 text-xs uppercase tracking-wider text-gray-500 font-semibold">
                        <th class="px-6 py-4 first:pl-8">Client Info</th>
                        <th class="px-6 py-4">Interest</th>
                        <th class="px-6 py-4">Timeline</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right last:pr-8">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($consultations as $item)
                        <tr class="group hover:bg-gray-50/50 transition-all">
                            <td class="px-6 py-5 first:pl-8">
                                <div class="flex items-center gap-4">
                                    <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center font-bold text-gray-600">
                                        {{ substr($item->first_name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-900">{{ $item->first_name }} {{ $item->last_name }}</div>
                                        <div class="text-xs text-gray-500">{{ $item->company }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex flex-col gap-1.5">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg text-xs font-semibold bg-gray-100 text-gray-700 border border-gray-200 w-fit">
                                        @php
                                            $interests = [
                                                'gresb' => 'Improve GRESB Score',
                                                'audit' => 'Comprehensive Portfolio Audit',
                                                'monitoring' => 'Smart Monitoring Implementation',
                                                'savings' => 'Cost Reduction & Efficiency',
                                                'compliance' => 'Regulatory Compliance'
                                            ];
                                        @endphp
                                        {{ $interests[$item->interest] ?? 'General Inquiry' }}
                                    </span>
                                    <span class="text-xs text-gray-500">
                                        <i class="fa-solid fa-building text-[10px] mr-1"></i> {{ $item->portfolio_size ?? 0 }} Properties
                                    </span>
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex flex-col items-start gap-1">
                                    <span class="inline-flex items-center gap-1.5 pl-2 pr-3 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wide bg-blue-50 text-blue-700 border border-blue-200/60">
                                        <i class="fa-regular fa-clock"></i>
                                        @php
                                            $times = [
                                                'morning' => 'Morning (8am - 12pm EST)',
                                                'afternoon' => 'Afternoon (12pm - 5pm EST)',
                                                'flexible' => 'Flexible'
                                            ];
                                        @endphp
                                        {{ $times[$item->time_preference] ?? 'Flexible' }}
                                    </span>
                                    <span class="text-[10px] text-gray-400 italic">
                                        Received: {{ $item->created_at->format('M d, Y') }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                @if($item->status == 1)
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-green-100 text-green-700 uppercase">Approved</span>
                                @elseif($item->status == 2)
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-red-100 text-red-700 uppercase">Rejected</span>
                                @else
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-gray-100 text-gray-500 uppercase">Pending</span>
                                @endif
                            </td>
                            <td class="px-6 py-5 text-right last:pr-8">
                                <div class="flex items-center justify-end gap-2">
                                    <button onclick="openStatusModal({{ $item->id }}, {{ $item->status }})" class="p-2 text-gray-400 hover:text-blue-600 transition">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>

                                    <form action="{{ route('admin.gresb-water.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this record?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-gray-400 hover:text-red-600 transition">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-10 text-center text-gray-400">No records found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="statusModal" class="fixed inset-0 z-[99] hidden flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-2xl p-6 w-full max-w-sm shadow-2xl">
        <h3 class="text-lg font-bold mb-4">Update Status</h3>
        <form id="statusForm" method="POST">
            @csrf @method('PUT')
            <input type="hidden" name="status" id="statusInput">
            <div class="grid grid-cols-2 gap-3">
                <button type="button" onclick="setStatus(1)" class="p-4 border-2 border-gray-100 rounded-xl hover:border-green-500 hover:bg-green-50 transition text-center group">
                    <i class="fa-solid fa-check-circle text-2xl text-gray-300 group-hover:text-green-500 mb-2"></i>
                    <div class="text-xs font-bold uppercase">Approve</div>
                </button>
                <button type="button" onclick="setStatus(2)" class="p-4 border-2 border-gray-100 rounded-xl hover:border-red-500 hover:bg-red-50 transition text-center group">
                    <i class="fa-solid fa-times-circle text-2xl text-gray-300 group-hover:text-red-500 mb-2"></i>
                    <div class="text-xs font-bold uppercase">Reject</div>
                </button>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="closeStatusModal()" class="text-sm text-gray-500">Cancel</button>
                <button type="submit" class="bg-gray-900 text-white px-6 py-2 rounded-lg text-sm font-bold">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openStatusModal(id, currentStatus) {
        const modal = document.getElementById('statusModal');
        const form = document.getElementById('statusForm');
        form.action = `/admin/gresb-water/status/${id}`; // Sesuaikan URL route Anda
        modal.classList.remove('hidden');
    }

    function closeStatusModal() {
        document.getElementById('statusModal').classList.add('hidden');
    }

    function setStatus(val) {
        document.getElementById('statusInput').value = val;
        // Memberi highlight visual pada tombol yang dipilih bisa ditambahkan di sini
        document.querySelectorAll('#statusForm button').forEach(btn => btn.classList.remove('border-blue-500'));
        event.currentTarget.classList.add('border-blue-500');
    }
</script>
@endpush