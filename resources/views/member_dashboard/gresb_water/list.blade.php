@extends('admin.portal')

@section('title', 'Upcoming Audits & Advisory Calls')
@section('header_title', 'Upcoming Audits & Advisory Calls')

@section('content')
<div class="page-hdr">
    <div class="page-hdr-left">
        <h2>Upcoming Audits &amp; Advisory Calls</h2>
        <p>Scheduled sessions with WST advisors</p>
    </div>
    <div class="page-hdr-right">
        <a href="{{ route('member-dashboard.gresb-water.form') }}" class="btn btn-primary"
            <i class="fa-solid fa-plus"></i> Schedule New
        </a>
    </div>
</div>

<div class="schedule-grid">
    @forelse($schedules as $s)
        <div class="appt-card">
            
            <div class="appt-date-badge">
                <div class="appt-month">{{ $s->time_preference->format('M') }}</div>
                <div class="appt-day">{{ $s->time_preference->format('d') }}</div>
            </div>

            <div style="margin-bottom:12px;">
                <div style="font-size:14px;font-weight:600;color:var(--text-1);margin-bottom:4px;">
                    {{ $s->company }}
                </div>
                <div style="font-size:11px;color:var(--text-3);">
                    {{ $s->first_name }}
                </div>
            </div>

            <div style="display:flex;flex-direction:column;gap:7px;margin-bottom:14px;">
                <div style="display:flex;justify-content:space-between;">
                    <span style="font-size:11px;color:var(--text-3);">Session</span>
                    <span style="font-size:11px;font-weight:600;color:var(--text-1);">
                            @php
                            $interests = [
                                'gresb' => 'Improve GRESB Score',
                                'audit' => 'Comprehensive Portfolio Audit',
                                'monitoring' => 'Smart Monitoring Implementation',
                                'savings' => 'Cost Reduction & Efficiency',
                                'compliance' => 'Regulatory Compliance'
                            ];
                        @endphp
                        {{ $interests[$s->interest] ?? 'General Inquiry' }}
                    </span>
                </div>

                <div style="display:flex;justify-content:space-between;">
                    <span style="font-size:11px;color:var(--text-3);">Time</span>
                    <span style="font-family:var(--font-mono);font-size:11px;color:var(--text-2);">
                        @if($s->time_preference)
                            {{ $s->time_preference->format('M d, Y') }}
                            •
                            {{ $s->time_preference->format('H:i') }}
                        @else
                            Not Scheduled
                        @endif
                    </span>
                </div>

                <div style="display:flex;justify-content:space-between;">
                    <span style="font-size:11px;color:var(--text-3);">Properties</span>
                    <span style="font-family:var(--font-mono);font-size:11px;color:var(--text-2);">
                        {{ $s->portfolio_size }}
                    </span>
                </div>
            </div>

            <div style="display:flex;justify-content:space-between;align-items:center;">
                @php 
                    if($s->status == 1) {
                        $status = 'Approved';
                        $color = 'pill-green';
                    } elseif($s->status == 2) {
                        $status = 'Rejected';
                        $color = 'pill-red';
                    } else {
                        $status = 'Pending';
                        $color = 'pill-amber';
                    }
                @endphp
                <span class="pill {{ $color }}">
                    {{ $status }}
                </span>

                @if($s->status == 1 && $s->meeting_link)
                    <a href="{{ $s->meeting_link }}" target="_blank" class="text-xs text-blue-600 hover:underline">Join Meeting</a>
                @elseif($s->status == 1)
                    <span class="text-xs text-[var(--text-3)]">Link in progress</span>
                @elseif($s->status == 2)
                    <span class="text-xs text-red-500">Rejected</span>
                @else
                    <span class="text-xs text-[var(--text-3)]">Pending approval</span>
                @endif
            </div>

        </div>
    @empty
        <p style="color:var(--text-3);">No schedules found.</p>
    @endforelse
</div>
@endsection