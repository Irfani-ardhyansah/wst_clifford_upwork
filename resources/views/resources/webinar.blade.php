@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/webinar.css') }}">
@endpush

@section('content')

@php 
  $webinar = $webinars[0] ?? null;
@endphp

<div class="web-hero">
  <div class="web-hero-inner">
    <div class="web-bc">
      <a href="/resources">Resources</a>
      <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 1l4 4-4 4"/></svg>
      <span>Webinars On Demand</span>
    </div>
    <div class="web-eye">Resources &mdash; Webinars On Demand</div>
    <h1 class="web-h1">Institutional water intelligence.<br><em>On your schedule.</em></h1>
    <p class="web-deck">Data-driven sessions on GRESB scoring, cap rate mathematics, cooling tower optimisation, IoT monitoring ROI, and billing forensics &mdash; presented for portfolio managers, asset managers, and directors of engineering.</p>
    <div class="web-gate-note">
      <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.3"><rect x="2" y="5" width="9" height="7" rx=".75"/><path d="M4 5V3.5a2.5 2.5 0 015 0V5"/></svg>
      Free for registered institutional real estate professionals &mdash; register once for all sessions.
    </div>
  </div>
  <div class="web-strip">
    <div class="ws-cell"><div class="ws-n">9</div><div class="ws-l">Sessions available on demand</div></div>
    <div class="ws-cell"><div class="ws-n">3</div><div class="ws-l">New sessions added this quarter</div></div>
    <div class="ws-cell"><div class="ws-n">6</div><div class="ws-l">Hours of institutional content</div></div>
    <div class="ws-cell"><div class="ws-n">Free</div><div class="ws-l">All sessions free to register and watch</div></div>
  </div>
</div>

<!-- FEATURED -->
<div class="web-featured">
  <div class="wf-inner">
    <div>
      <div class="wf-meta">
        <span class="wf-badge-new">Featured</span>
        <span class="wf-badge-cat">{{$webinar->tags}}</span>
        <!-- <span class="wf-duration">48 min &middot; Recorded April 2026</span> -->
      </div>
      <h2 class="wf-h">{{$webinar->title}}</h2>
      <p class="wf-desc">
        {{$webinar->description}}
      </p>
      <div class="wf-speaker">
        <div class="wf-av">C</div>
        <div>
          <div class="wf-av-name">Clifford Campbell</div>
          <div class="wf-av-role">Partner, Water Solutions Technology &middot; GRESB Solution Provider Partner</div>
        </div>
      </div>
      <div style="display:flex;gap:10px;flex-wrap:wrap;">
        <button class="wf-watch-btn open-modal-btn"
            data-id="{{ $webinar->id }}"
            data-title="{{ $webinar->title }}"
            data-image="{{ asset('storage/' . $webinar->image_path) }}">
          <svg width="14" height="14" viewBox="0 0 14 14" fill="#fff"><path d="M5 3l8 4-8 4V3z"/></svg>
          Watch Now
        </button>
        <button class="wf-watch-btn-ghost">
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M7 2v8M3 7l4 4 4-4"/><path d="M2 12h10"/></svg>
          Download Slides
        </button>
      </div>
    </div>
    <div class="wf-thumb" onclick="openGate('How a Leading Hospitality REIT Recovered $2.3M in Water Savings — GRESB Verified','/webinars/hospitality-reit-2-3m-water-savings','webinars','webinars')">
    @if($webinar->image_path)
      <img src="{{ asset('storage/' . $webinar->image_path) }}"
            alt="{{ $webinar->title }}"
            style="width:100%; height:192px; object-fit:cover;">
    @else
      <img src="https://via.placeholder.com/400x300?text=No+Image"
            alt="Placeholder"
            style="width:100%; height:192px; object-fit:cover;">
    @endif
  <div class="wf-play-overlay">
    <div class="wf-play-btn">
      <svg width="22" height="22" viewBox="0 0 22 22" fill="#fff"><path d="M8 5l12 6-12 6V5z"/></svg>
    </div>
  </div>
  <!-- <span class="wf-duration-overlay">48:32</span> -->
</div>
  </div>
</div>

<!-- FILTER BAR -->
<div class="web-filters" id="web-filters">
  <span class="web-filter-lbl">Filter:</span>
  <button class="wf on  js-wf" data-f="all"                     role="tab" aria-selected="true">All Sessions</button>
  <!-- <button class="wf     js-wf" data-f="ESG"                     role="tab" aria-selected="false">ESG &amp; GRESB</button>
  <button class="wf     js-wf" data-f="Financial"               role="tab" aria-selected="false">Financial Analysis</button>
  <button class="wf     js-wf" data-f="Cooling"                 role="tab" aria-selected="false">Cooling Tower</button>
  <button class="wf     js-wf" data-f="Monitoring"              role="tab" aria-selected="false">Smart Monitoring</button>
  <button class="wf     js-wf" data-f="Billing"                 role="tab" aria-selected="false">Billing &amp; Recovery</button>
  <button class="wf     js-wf" data-f="Risk"                    role="tab" aria-selected="false">Risk Management</button>
  <button class="wf     js-wf" data-f="Platform"                role="tab" aria-selected="false">Platform Demo</button>
  <span class="web-count" id="web-count">9 sessions</span> -->
</div>

<!-- WEBINAR GRID -->
<div class="web-grid-section">
  <div class="web-grid" id="web-grid">
    @forelse ($webinars as $item)

    <div class="wc" data-cat="ESG &amp; GRESB Strategy" onclick="openGate('GRESB Water Score Benchmarks: Hotel REITs in 2025','/webinars/gresb-water-score-hotel-reit-2025','webinars','webinars')" style="cursor:pointer;">
      <div class="wc-thumb">

        @if($item->image_path)
          <img src="{{ asset('storage/' . $item->image_path) }}"
                alt="{{ $item->title }}"
                style="width:100%; height:192px; object-fit:cover;">
        @else
          <img src="https://via.placeholder.com/400x300?text=No+Image"
                alt="Placeholder"
                style="width:100%; height:192px; object-fit:cover;">
        @endif
        <div class="wc-play-ov">
          <div class="wc-play-sm">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="#fff"><path d="M5 3l7 4-7 4V3z"/></svg>
          </div>
        </div>
        <span class="wc-dur">32 min</span>
        <!-- <span class="wc-new">New</span> -->
      </div>
      <div class="wc-body">
        <div class="wc-cat">{{$item->tags}}</div>
        <div class="wc-title">{{$item->title}}</div>
        <div class="wc-desc">
          {{$item->description}}
        </div>
      </div>
      <div class="wc-foot">
        <div class="wc-speaker">
          <div class="wc-av">C</div>
          <span class="wc-spk-name">Clifford Campbell &middot; Partner, WST</span>
        </div>
        <div class="wc-watch open-modal-btn"
            data-id="{{ $item->id }}"
            data-title="{{ $item->title }}"
            data-image="{{ asset('storage/' . $item->image_path) }}">
          Watch
          <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 5h6M5 2l3 3-3 3"/></svg>
        </div>
      </div>
    </div>
    @empty
      <p style="color:rgba(255,255,255,0.55); font-size:14px; text-align:center; grid-column:1/-1;">
        No tools available at the moment.
      </p>
    @endforelse
  </div>
</div>

<!-- COMING SOON -->
<div class="coming-soon">
  <div class="cs-inner">
    <div class="cs-label">Coming Soon &mdash; Register to be Notified</div>
    <div class="cs-row"><div class="cs-card">
  <div class="cs-cat">ESG &amp; GRESB Strategy</div>
  <div class="cs-title">GRESB Real Estate Assessment 2026: What Changed for Water</div>
  <div class="cs-when">Coming &nbsp;&middot;&nbsp; June 2026</div>
</div><div class="cs-card">
  <div class="cs-cat">Cooling Tower Optimization</div>
  <div class="cs-title">Advanced Oxidation Processes: Achieving CoC 9.54 Without Chemicals</div>
  <div class="cs-when">Coming &nbsp;&middot;&nbsp; July 2026</div>
</div><div class="cs-card">
  <div class="cs-cat">Financial Analysis</div>
  <div class="cs-title">Section 179 &amp; Bonus Depreciation for Water Equipment: 2025 Update</div>
  <div class="cs-when">Coming &nbsp;&middot;&nbsp; August 2026</div>
</div></div>
  </div>
</div>

<!-- NOTIFY BAND -->
<div class="notify-band">
  <div class="notify-text">
    <h3>New sessions added every month.<br><em>Never miss one.</em></h3>
    <p>Register once to receive access to all existing sessions and automatic notification of new releases.</p>
  </div>
  <form class="notify-form" id="subscribeForm">
    @csrf
    <input class="notify-inp" type="email" name="email" id="emailInput" placeholder="work@company.com" aria-label="Work email"/>
    <button  class="notify-btn"  type="submit" id="btnSubscribe" >Notify Me</button>
  </form>
</div>

<!-- CTA -->
<div class="web-cta">
  <div>
    <div class="web-cta-h">Want WST to present<br><em>at your next LP meeting?</em></div>
    <div class="web-cta-sub">WST delivers bespoke portfolio water intelligence presentations for LP meetings, investor days, and GRESB submission reviews. Formatted for institutional audiences. No sales content.</div>
  </div>
  <a href="{{route('contact')}}" class="web-cta-btn">Request a Presentation</a>
</div>

    @include('layouts.partials.modal-form-user')
@endsection
  
@push('scripts')
<script>
$(document).ready(function() {
    // Buka Modal
    $(document).on('click', '.open-modal-btn', function(e) {
        e.preventDefault();

        const caseId = $(this).data('id');
        const caseTitle = $(this).data('title');
        const image     = $(this).data('image');
        $('#modal-case-id').val(caseId);
        $('#modal-asset-title').text(caseTitle);

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