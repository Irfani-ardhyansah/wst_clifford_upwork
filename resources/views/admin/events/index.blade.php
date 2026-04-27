@extends('admin.portal')

@section('title', 'Manage Events')
@section('header_title', 'Events')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="page-hdr">
        <div class="page-hdr-left">
            <h2>Events</h2>
            <p>Manage events and track registrations</p>
        </div>
        <div class="page-hdr-right">
            <a href="{{ route('admin.events.create') }}" 
                class="inline-flex items-center justify-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl font-medium transition-all duration-200 shadow-md shadow-teal-600/20 hover:shadow-lg hover:shadow-teal-600/30 hover:-translate-y-0.5">
                <i class="fa-solid fa-plus text-sm"></i> <span>Add Event</span>
            </a>
        </div>
    </div>
    
    <div class="bg-[var(--surface)] rounded-2xl shadow-xl overflow-hidden border border-[var(--border)]">

        <!-- Search & Filter -->
        <div class="p-6 border-b border-[var(--border)] bg-[var(--surface)] space-y-4">
            <div class="bg-[var(--surface-2)] rounded-xl p-1.5 border border-[var(--border)]">
                <form action="{{ route('admin.events.index') }}" method="GET" class="relative group">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fa-solid fa-magnifying-glass text-[var(--text-3)] text-xs"></i>
                    </div>
                    <input type="text" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="Search event name, location..." 
                            class="block w-full pl-10 pr-3 py-2 bg-transparent border-0 text-sm text-[var(--text-1)] placeholder-[var(--text-3)] focus:ring-0 focus:bg-white/50 rounded-lg transition">
                    @if(request('search'))
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2">
                            <a href="{{ route('admin.events.index') }}" class="text-[var(--text-3)] hover:text-[var(--text-1)]">
                                <i class="fa-solid fa-xmark text-sm"></i>
                            </a>
                        </div>
                    @endif
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <form action="{{ route('admin.events.index') }}" method="GET" class="flex gap-2">
                    <select name="event_type" class="px-3 py-2 rounded-lg text-sm bg-[var(--surface)] text-[var(--text-1)] border border-[var(--border)] focus:outline-none focus:ring-2 focus:ring-[var(--primary)]">
                        <option value="">All Types</option>
                        @foreach($eventTypes as $type)
                            <option value="{{ $type['value'] }}" {{ request('event_type') === $type['value'] ? 'selected' : '' }}>
                                {{ $type['text'] }}
                            </option>
                        @endforeach
                    </select>
                    <select name="status" class="px-3 py-2 rounded-lg text-sm bg-[var(--surface)] text-[var(--text-1)] border border-[var(--border)] focus:outline-none focus:ring-2 focus:ring-[var(--primary)]">
                        <option value="">All Status</option>
                        <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    <button type="submit" class="px-4 py-2 bg-[var(--primary)] text-white rounded-lg text-sm font-medium hover:opacity-90">
                        Filter
                    </button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="px-6 pt-4">
                <div class="p-4 rounded-xl bg-teal-50 border border-teal-100 text-teal-800 flex items-center gap-3">
                    <i class="fa-solid fa-circle-check text-teal-600"></i>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Table -->
        <div class="relative z-10 overflow-x-auto">
            <table class="wst-table">
                <thead>
                    <tr>
                        <th>Event Info</th>
                        <th>Date & Time</th>
                        <th>Type</th>
                        <th>Registrations</th>
                        <th>Links</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                        <tr>
                            <td class="primary">
                                <div style="display:flex;align-items:center;gap:10px;">
                                    @if($event->image_path)
                                        <img src="{{ asset('storage/' . $event->image_path) }}"
                                            style="width:48px;height:48px;object-fit:cover;border-radius:6px;border:1px solid var(--border);"
                                            alt="{{ $event->title }}">
                                    @else
                                        <div style="width:48px;height:48px;border-radius:6px;border:1px solid var(--border);background:var(--surface-2);display:flex;align-items:center;justify-content:center;">
                                            <i class="fa-regular fa-calendar" style="font-size:16px;color:var(--text-3);"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div style="font-weight:600;color:var(--text-1);">{{ $event->title }}</div>
                                        <div style="font-size:12px;color:var(--text-3);margin-top:2px;">{{ $event->location ?? ($event->is_virtual ? 'Virtual Event' : '-') }}</div>
                                    </div>
                                </div>
                            </td>
                            <td style="font-size:13px;">
                                <div>{{ $event->event_date->format('M d, Y') }}</div>
                                @if($event->event_time)
                                    <div style="color:var(--text-3);font-size:12px;">{{ $event->event_time }}</div>
                                @endif
                            </td>
                            <td>
                                <span class="pill pill-blue">{{ ucfirst(str_replace('_', ' ', $event->event_type)) }}</span>
                            </td>
                            <td style="font-weight:600;color:var(--accent);">
                                <a href="{{ route('admin.events.show', $event) }}" class="hover:underline">
                                    {{ $event->attendances_count ?? 0 }}
                                </a>
                            </td>
                            <td>
                                <span class="pill {{ $event->status === 1 ? 'pill-green' : 'pill-red' }}">
                                    {{ $event->status === 1 ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                @if($event->external_url)
                                    <a href="{{ $event->external_url }}" 
                                    target="_blank" 
                                    rel="noopener noreferrer"
                                    class="pill pill-blue inline-flex items-center gap-1 hover:opacity-80 transition"
                                    >
                                        Link
                                    </a>
                                @else
                                    <span class="pill pill-red">
                                        #
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="flex gap-2 items-center">
                                    <a href="{{ route('admin.events.show', $event) }}" 
                                        class="btn btn-ghost"
                                        style="font-size:10px;padding:4px 8px;"
                                        onclick="event.stopPropagation()">
                                        <i class="fa-solid fa-eye" style="font-size:9px;"></i> View
                                    </a>
                                    <a href="{{ route('admin.events.edit', $event) }}" 
                                        class="btn btn-ghost"
                                        style="font-size:10px;padding:4px 8px;"
                                        onclick="event.stopPropagation()">
                                        <i class="fa-solid fa-pencil" style="font-size:9px;"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline" onsubmit="return confirm('Delete this event?');" onclick="event.stopPropagation()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-ghost"
                                                style="font-size:10px;padding:4px 8px;color:var(--red, #ef4444);">
                                            <i class="fa-solid fa-trash-can" style="font-size:9px;"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center;padding:40px 20px;color:var(--text-3);">
                                <i class="fa-regular fa-calendar" style="font-size:32px;opacity:.3;display:block;margin-bottom:8px;"></i>
                                No events found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($events->hasPages())
            <div class="bg-white px-6 py-4 border-t border-gray-100">
                {{ $events->links() }}
            </div>
        @endif

    </div>
</div>
@endsection
