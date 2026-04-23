@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/events.css') }}">
@endpush

@section('content')

<!-- HERO -->
<div class="events-hero">
  <div class="events-hero-inner">
    <div class="events-eye">Resources &mdash; Events</div>
    <h1 class="events-h1">Events &mdash; Past<br><em>&amp; Upcoming.</em></h1>
    <p class="events-sub">WST attends, presents at, and participates in conferences, industry briefings, and GRESB partner events relevant to institutional commercial real estate water management. All events open-access — no registration required to view.</p>
  </div>
</div>

<!-- FILTER TABS -->
<div class="event-filters">
  <span class="ef-label">Show:</span>
  <button class="ef-pill is-active js-ef" data-filter="all">All Events</button>
  <button class="ef-pill js-ef" data-filter="upcoming">Upcoming</button>
  <button class="ef-pill js-ef" data-filter="past">Past Events</button>
</div>

<!-- EVENTS GRID -->
<section class="sec sec-w" style="padding-top:36px;">
  <div class="events-grid" id="events-grid">
@php use Carbon\Carbon; @endphp
@forelse ($events as $item)
    @php
        $interests = [
            'gresb' => 'Improve GRESB Score',
            'audit' => 'Comprehensive Portfolio Audit',
            'monitoring' => 'Smart Monitoring Implementation',
            'savings' => 'Cost Reduction & Efficiency',
            'compliance' => 'Regulatory Compliance'
        ];
        $date = Carbon::parse($item->event_date);
        $isPast = $date->isPast();

        $month = $date->format('M');
        $day = $date->format('d');
        $year = $date->format('Y');

    @endphp
    <div class="event-card {{ $isPast ? 'event-card--past' : '' }}" 
         data-filter="{{ $isPast ? 'past' : 'upcoming' }}" 
         style="display:flex;flex-direction:column;">

        <div class="ec-date-strip">
            <div>
                <div class="ec-month">{{ $month }}</div>
                <div class="ec-day">{{ $day }}</div>
            </div>
            <div class="ec-year">{{ $year }}</div>
        </div>

        <div class="ec-body">
            <div class="ec-type ec-type--conference">{{ ucwords(str_replace('_', ' ', $item->event_type)) }}</div>

            <div class="ec-title">
                {{ $interests[$item->interest] ?? 'General Inquiry' }} 
                — {{ $item->last_name }}, {{ $item->first_name }} Conference
            </div>

            <div class="ec-location">
                <!-- ini masih hardcode, kalau ada field location tinggal ganti -->
                {{$item->location}}
            </div>

            <div class="ec-desc">
                {{ $item->description }}
            </div>
        </div>

        <div class="ec-footer">
            @if($isPast)
                <span class="ec-wst-badge">Participated</span>
                <span class="ec-past-tag">Past Event</span>
            @else
                <span class="ec-wst-badge">{{$item->attendance_status}}</span>
                <button class="ec-register-btn open-modal-btn"
                    data-id="{{ $item->id }}"
                    data-title="{{ $item->title }}">
                    Register Interest
                </button>
            @endif
        </div>
    </div>

@empty
<p style="color:rgba(255,255,255,0.55); font-size:14px; text-align:center; grid-column:1/-1;">
    No events available at the moment.
</p>
@endforelse
  </div>
</section>

<!-- NOTIFY STRIP -->
<section class="sec sec-o" style="padding:40px 48px;">
  <div class="notify-strip">
    <div class="notify-text">
      <strong>Stay informed.</strong> WST publishes event announcements, conference reports, and GRESB season briefings to registered members. Register once for access to all updates.
    </div>
    <form id="subscribeForm">
        @csrf
      <input class="notify-input" type="email" name="email" placeholder="your@company.com"  id="emailInput">
      <button class="notify-btn"  type="submit" id="btnSubscribe" >Notify Me</button>
    </form>
  </div>
</section>

<!-- SPEAKING / SPONSORSHIP CTA -->
<section class="sec sec-dk" style="padding:56px 48px;">
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center;">
    <div>
      <p class="eye" style="color:rgba(255,255,255,.3);">Speaking &amp; Collaboration</p>
      <h2 style="font-family:'Cormorant Garamond',serif;font-size:clamp(24px,2.8vw,36px);font-weight:300;color:var(--white);margin-bottom:16px;line-height:1.2;">Hosting a conference or event on CRE water management, ESG, or GRESB?</h2>
      <p style="font-size:13px;color:rgba(255,255,255,.4);line-height:1.85;margin-bottom:20px;">WST offers speaking sessions on commercial water billing forensics, GRESB water indicator optimisation, and the financial case for institutional water management. Clifford Campbell (Partner, WST) has presented at BOMA, NAREIT-adjacent, and GRESB partner events across the Southeast US.</p>
      <a href="/contact" style="display:inline-block;padding:13px 24px;background:var(--white);color:var(--black);font-size:11px;font-weight:700;letter-spacing:.10em;text-transform:uppercase;text-decoration:none;transition:background .2s;" onmouseover="this.style.background='var(--off-white)'" onmouseout="this.style.background='var(--white)'">Discuss a Speaking Engagement</a>
    </div>
    <div style="display:flex;flex-direction:column;gap:2px;">
      <div style="background:#0f1a13;padding:20px 22px;">
        <div style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--green-lt);margin-bottom:5px;">Topic 1</div>
        <div style="font-size:13px;color:rgba(255,255,255,.55);">Commercial Water Billing Forensics: The 12 Most Expensive Errors in CRE Water Bills</div>
      </div>
      <div style="background:#0f1a13;padding:20px 22px;">
        <div style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--green-lt);margin-bottom:5px;">Topic 2</div>
        <div style="font-size:13px;color:rgba(255,255,255,.55);">Closing the GRESB Water Gap: How Hotel REITs Convert Field Performance into Benchmark Score</div>
      </div>
      <div style="background:#0f1a13;padding:20px 22px;">
        <div style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--green-lt);margin-bottom:5px;">Topic 3</div>
        <div style="font-size:13px;color:rgba(255,255,255,.55);">Water as a Cap Rate Lever: The Financial Case for Institutional Water Management</div>
      </div>
    </div>
  </div>
</section>

<div class="cs">
  <div>
    <div class="cs-t">Will we see you at<br><em>an upcoming event?</em></div>
    <p class="cs-s">If you're attending any of the conferences listed above and would like to connect with a WST advisor, let us know in advance and we'll arrange a meeting on-site.</p>
  </div>
  <a href="{{route('contact')}}" class="cs-btn">Arrange a Meeting</a>
</div>

@endsection


@push('scripts')
<script>
$(document).ready(function() {
    $('.js-ef').on('click', function () {
        const filter = $(this).data('filter');

        // toggle active button
        $('.js-ef').removeClass('is-active');
        $(this).addClass('is-active');

        $('.event-card').each(function () {
            const cardType = $(this).data('filter');

            if (filter === 'all' || filter === cardType) {
                $(this).css('display', 'flex');
            } else {
                $(this).hide();
            }
        });
    });

    // Buka Modal
    $(document).on('click', '.open-modal-btn', function(e) {
        e.preventDefault();

        const caseId = $(this).data('id');
        const caseTitle = $(this).data('title');
        const image     = $(this).data('image');
        $('#modal-case-id').val(caseId);
        $('#co-title-modal').text(caseTitle);

        $('#modal-image').addClass('hidden').attr('src', '');
        $('#modal-icon').removeClass('hidden');

        if (image) {
            $('#modal-image')
                .attr('src', image)
                .removeClass('hidden');

            $('#modal-icon').addClass('hidden');
        }

        $('#pending-asset-preview').removeClass('hidden').addClass('flex');

        $('#auth-modal').removeClass('hidden opacity-0').addClass('open');

        setTimeout(function() {
             $('#modal-content').removeClass('scale-95').addClass('scale-100');
        }, 10);
    });

    $(document).on('click', '.close-modal', function() {
        $('#modal-content').removeClass('scale-100').addClass('scale-95');

        setTimeout(function() {
            $('#auth-modal').addClass('hidden opacity-0').removeClass('open');
        }, 300);
    });

    $('#leads-form').on('submit', function(e) {
        const submitBtn = $(this).find('button[type="submit"]');
        submitBtn.prop('disabled', true).html('<i class="fa-solid fa-spinner fa-spin mr-2"></i> Processing...');
    });

    $('#subscribeForm').on('submit', function(e) {
        e.preventDefault();

        let form = $(this);
        let btn = $('#btnSubscribe');
        let originalBtnText = btn.html();
        let emailInput = $('#emailInput');
        let errorMsg = $('#subscribeError');

        btn.prop('disabled', true).html('<i class="fa-solid fa-circle-notch fa-spin"></i> Processing...');
        errorMsg.addClass('hidden').text('');
        emailInput.removeClass('border-red-500 ring-red-500');

        $.ajax({
            url: "{{ route('subscribe.store') }}",
            type: "POST",
            data: form.serialize(),
            success: function(response) {
                if(response.status === 'success') {
                    form[0].reset();
                    $('#successEmail').text(emailInput.val());
                    $('#successModal').removeClass('hidden').addClass('flex');
                }
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMessage = 'Something went wrong. Please try again.';

                if(errors && errors.email) {
                    errorMessage = errors.email[0];
                } else if (xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                errorMsg.text(errorMessage).removeClass('hidden');
                emailInput.addClass('border-red-500 ring-red-500 focus:border-red-500 focus:ring-red-500');
            },
            complete: function() {
                btn.prop('disabled', false).html(originalBtnText);
            }
        });
    });

    $('#closeModalBtn').on('click', function() {
        $('#successModal').addClass('hidden').removeClass('flex');
    });

    $('#successModal').on('click', function(e) {
        if (e.target === this) {
            $(this).addClass('hidden').removeClass('flex');
        }
    });
});
</script>
@endpush