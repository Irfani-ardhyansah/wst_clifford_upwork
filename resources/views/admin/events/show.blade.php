@extends('admin.portal')

@section('title', $event->title)
@section('header_title', $event->title)

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-3xl font-bold text-[var(--text-1)]">{{ $event->title }}</h1>
            <p class="text-[var(--text-3)] mt-1">{{ $event->event_date->format('l, F j, Y') }}
                @if($event->event_time)
                    at {{ $event->event_time }}
                @endif
            </p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.events.edit', $event) }}" 
                class="inline-flex items-center gap-2 bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-lg transition">
                <i class="fa-solid fa-pen"></i> Edit
            </a>
            <a href="{{ route('admin.events.index') }}" 
                class="inline-flex items-center gap-2 bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Event Details -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Info Card -->
            <div class="bg-[var(--surface)] rounded-xl shadow border border-[var(--border)] p-6">
                <h2 class="text-lg font-bold text-[var(--text-1)] mb-4">Event Details</h2>
                
                <div class="space-y-4">
                    @if($event->image_path)
                        <div>
                            <img src="{{ asset('storage/' . $event->image_path) }}" 
                                 class="w-full h-auto rounded-lg border border-[var(--border)]"
                                 alt="{{ $event->title }}">
                        </div>
                    @endif

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-[var(--text-3)] font-medium uppercase">Type</p>
                            <p class="text-sm font-semibold text-[var(--text-1)] mt-1">{{ ucfirst(str_replace('_', ' ', $event->event_type)) }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-[var(--text-3)] font-medium uppercase">Location</p>
                            <p class="text-sm font-semibold text-[var(--text-1)] mt-1">
                                @if($event->is_virtual)
                                    <span class="text-blue-600">Virtual Event</span>
                                @else
                                    {{ $event->location ?? '-' }}
                                @endif
                            </p>
                        </div>
                    </div>

                    @if($event->attendance_status)
                        <div>
                            <p class="text-xs text-[var(--text-3)] font-medium uppercase">Attendance Status</p>
                            <p class="text-sm font-semibold text-[var(--text-1)] mt-1">{{ ucfirst($event->attendance_status) }}</p>
                        </div>
                    @endif

                    @if($event->attendance_label)
                        <div>
                            <p class="text-xs text-[var(--text-3)] font-medium uppercase">Attendance Label</p>
                            <p class="text-sm font-semibold text-[var(--text-1)] mt-1">{{ $event->attendance_label }}</p>
                        </div>
                    @endif

                    @if($event->description)
                        <div>
                            <p class="text-xs text-[var(--text-3)] font-medium uppercase">Description</p>
                            <div class="text-sm text-[var(--text-2)] mt-2 whitespace-pre-wrap">{{ $event->description }}</div>
                        </div>
                    @endif

                    @if($event->external_url)
                        <div>
                            <p class="text-xs text-[var(--text-3)] font-medium uppercase">External Link</p>
                            <a href="{{ $event->external_url }}" target="_blank" 
                                class="text-sm text-[var(--primary)] hover:underline mt-1">
                                {{ $event->external_url }} <i class="fa-solid fa-external-link text-xs"></i>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar Stats -->
        <div class="space-y-4">
            <div class="bg-[var(--surface)] rounded-xl shadow border border-[var(--border)] p-6">
                <div class="text-center">
                    <div class="text-4xl font-bold text-[var(--primary)]">{{ $attendances->total() }}</div>
                    <p class="text-[var(--text-3)] text-sm mt-2">Total Registrations</p>
                </div>
            </div>

            <div class="bg-[var(--surface)] rounded-xl shadow border border-[var(--border)] p-6 space-y-3">
                <h3 class="text-sm font-bold text-[var(--text-1)]">Status Summary</h3>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between items-center">
                        <span class="text-[var(--text-3)]">Pending</span>
                        <span class="font-semibold text-[var(--text-1)]">{{ $attendances->where('status', 0)->count() }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[var(--text-3)]">Approved</span>
                        <span class="font-semibold text-green-600">{{ $attendances->where('status', 1)->count() }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[var(--text-3)]">Rejected</span>
                        <span class="font-semibold text-red-600">{{ $attendances->where('status', 2)->count() }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-[var(--text-3)]">Cancelled</span>
                        <span class="font-semibold text-gray-600">{{ $attendances->where('status', 3)->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Attendees Table -->
    <div class="mt-8 bg-[var(--surface)] rounded-2xl shadow-xl overflow-hidden border border-[var(--border)]">
        <div class="p-6 border-b border-[var(--border)]">
            <h2 class="text-lg font-bold text-[var(--text-1)]">Registrations</h2>
        </div>

        @if(session('success'))
            <div class="px-6 pt-4">
                <div class="p-4 rounded-xl bg-teal-50 border border-teal-100 text-teal-800 flex items-center gap-3">
                    <i class="fa-solid fa-circle-check text-teal-600"></i>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="relative z-10 overflow-x-auto">
            <table class="wst-table">
                <thead>
                    <tr>
                        <th>User Info</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Registered</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $attendance)
                        <tr>
                            <td class="primary">
                                <div>
                                    <div style="font-weight:600;color:var(--text-1);">{{ $attendance->user->name }}</div>
                                    <div style="font-size:12px;color:var(--text-3);margin-top:2px;">{{ $attendance->user->email }}</div>
                                </div>
                            </td>
                            <td>
                                <span class="pill pill-blue">
                                    {{ ucfirst(str_replace('_', ' ', $attendance->registration_type)) }}
                                </span>
                            </td>
                            <td>
                                @if($attendance->status == 0)
                                    <span class="pill pill-amber">Pending</span>
                                @elseif($attendance->status == 1)
                                    <span class="pill pill-green">Approved</span>
                                @elseif($attendance->status == 2)
                                    <span class="pill pill-red">Rejected</span>
                                @elseif($attendance->status == 3)
                                    <span class="pill pill-gray">Cancelled</span>
                                @endif
                            </td>
                            <td style="font-size:12px;color:var(--text-3);">
                                {{ $attendance->created_at->format('M d, Y H:i') }}
                            </td>
                            <td>
                                <div class="flex gap-1 items-center">
                                    @if($attendance->status != 1)
                                        <form action="{{ route('admin.events.attendance.approve', $attendance) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded hover:bg-green-200 transition" title="Approve">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                        </form>
                                    @endif

                                    @if($attendance->status != 2 && $attendance->status != 3)
                                        <form action="{{ route('admin.events.attendance.reject', $attendance) }}" method="POST" class="inline" onsubmit="return confirm('Reject this registration?');">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-xs bg-red-100 text-red-700 px-2 py-1 rounded hover:bg-red-200 transition" title="Reject">
                                                <i class="fa-solid fa-times"></i>
                                            </button>
                                        </form>
                                    @endif

                                    @if($attendance->status != 3)
                                        <form action="{{ route('admin.events.attendance.cancel', $attendance) }}" method="POST" class="inline" onsubmit="return confirm('Cancel this registration?');">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded hover:bg-gray-200 transition" title="Cancel">
                                                <i class="fa-solid fa-ban"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align:center;padding:40px 20px;color:var(--text-3);">
                                <i class="fa-regular fa-users" style="font-size:32px;opacity:.3;display:block;margin-bottom:8px;"></i>
                                No registrations yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($attendances->hasPages())
            <div class="bg-white px-6 py-4 border-t border-gray-100">
                {{ $attendances->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
