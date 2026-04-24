@extends('admin.portal')

@section('title', 'My Events')
@section('header_title', 'My Events')


@section('content')
<div class="flex-1 flex flex-col min-h-full">
    <div class="content">
        <div class="page-hdr">
            <div class="page-hdr-left">
                <h2>{{ auth()->user()->role === 'admin' ? 'All Event Registrations' : 'My Registered Events' }}</h2>
                <p>{{ auth()->user()->role === 'admin' ? 'All user event registrations' : 'Events you have registered for' }}</p>
                <p class="text-sm text-gray-500 mt-1">{{ $events->total() }} {{ auth()->user()->role === 'admin' ? 'registrations' : 'events registered' }}</p>
            </div>
            <div class="page-hdr-right" style="flex-wrap:wrap;gap:8px;">
                <form method="GET" class="filter-bar" style="margin-bottom:0;border-radius:9px;overflow:hidden;">
                    <div class="filter-item">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search…" style="min-width:130px;" onkeyup="if(event.key === 'Enter') this.form.submit()">
                    </div>
                    <button type="submit" style="display:none;"></button>
                </form>
            </div>
        </div>

        <div class="resource-grid">
            @forelse($events as $event)
                @php 
                    // Get the attendance record for this event
                    $attendance = auth()->user()->role === 'admin' 
                        ? $event->attendances()->first() 
                        : $event->attendances->first();
                @endphp
                <div class="resource-card">
                    <div class="rc-type">
                        <i class="fa-solid fa-calendar"></i>
                        @if($event->is_virtual)
                            <span class="ml-2 text-xs font-semibold">Virtual</span>
                        @else
                            <span class="ml-2 text-xs font-semibold">In-Person</span>
                        @endif
                    </div>
                    <h3 class="rc-title">{{ $event->title }}</h3>
                    <div class="rc-meta">
                        @if(auth()->user()->role === 'admin' && $attendance)
                            <div class="flex items-center gap-2 mb-2">
                                <i class="fa-solid fa-user text-gray-400 text-sm"></i>
                                <span>{{ $attendance->user->name ?? 'Unknown User' }}</span>
                            </div>
                        @endif
                        <div class="flex items-center gap-2 mb-2">
                            <i class="fa-solid fa-calendar-days text-gray-400 text-sm"></i>
                            <span>{{ $event->event_date?->format('M d, Y') }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-clock text-gray-400 text-sm"></i>
                            <span>{{ $event->event_time ?? 'TBA' }}</span>
                        </div>
                    </div>
                    <div class="rc-footer">
                        <span class="rc-views">
                            @if($attendance)
                                @if($attendance->status == 0)
                                    <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded">Pending</span>
                                @elseif($attendance->status == 1)
                                    <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">Approved</span>
                                @elseif($attendance->status == 2)
                                    <span class="text-xs bg-red-100 text-red-800 px-2 py-1 rounded">Rejected</span>
                                @elseif($attendance->status == 3)
                                    <span class="text-xs bg-gray-100 text-gray-800 px-2 py-1 rounded">Cancelled</span>
                                @endif
                            @endif
                        </span>
                        <a 
                            href="{{ $event->external_url ?? '#' }}" 
                            target="_blank"
                            class="text-xs font-bold text-teal-600 hover:text-teal-800 flex items-center gap-1 group-hover:gap-2 transition-all uppercase tracking-wide focus:outline-none">
                            View Event 
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-16 text-center border-2 border-dashed border-gray-100 rounded-xl">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                        <i class="fa-regular fa-calendar text-3xl text-gray-300"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">{{ auth()->user()->role === 'admin' ? 'No event registrations' : 'No events registered' }}</h3>
                    <p class="text-gray-500 text-sm mt-1 max-w-sm mx-auto">
                        {{ auth()->user()->role === 'admin' ? 'No one has registered for any events yet.' : 'You haven\'t registered for any events yet. Browse our upcoming events to register.' }}
                    </p>
                </div>
            @endforelse
        </div>

        @if($events->hasPages())
            <div class="flex items-center justify-center border-t border-gray-100 pt-8 pb-4">
                {{ $events->links('pagination.custom') }} 
            </div>
        @endif
    </div>
    
    <footer class="px-10 py-6 border-t border-gray-100 text-center text-xs text-gray-400 mt-auto">
        &copy; {{ date('Y') }} Water Solutions Tech. All rights reserved.
    </footer>
</div>
@endsection
