@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/white_papers.css') }}">
@endpush

@section('content')

@php
function adjustBrightness($hex, $steps) {
    $steps = max(-255, min(255, $steps));

    $hex = str_replace('#', '', $hex);

    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));

    $r = max(0, min(255, $r + $steps));
    $g = max(0, min(255, $g + $steps));
    $b = max(0, min(255, $b + $steps));

    return '#' . str_pad(dechex($r), 2, '0', STR_PAD_LEFT)
              . str_pad(dechex($g), 2, '0', STR_PAD_LEFT)
              . str_pad(dechex($b), 2, '0', STR_PAD_LEFT);
}
@endphp

<div class="res-hero">
  <div class="res-hero-inner">
    <div class="res-hero-bc">
      <a href="/resources">Resources</a>
      <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 1l4 4-4 4"/></svg>
      <span>White Papers</span>
    </div>
    <div class="res-hero-eye">Resources &mdash; White Papers</div>
    <h1 class="res-hero-h1">Institutional research<br><em>for CRE water performance.</em></h1>
    <p class="res-hero-sub">WST white papers combine proprietary portfolio data with GRESB benchmark analysis and financial modelling &mdash; written for asset managers, sustainability directors, and engineering teams making capital decisions.</p>
    <div class="res-hero-gate-note">
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="6" width="8" height="6" rx="1"/><path d="M5 6V4.5a2.5 2.5 0 015 0V6"/></svg>
      Free download &mdash; register once for full library access.
    </div>
  </div>
</div>

<div class="value-strip">
  <div class="vs-cell"><div class="vs-num">3</div><div class="vs-lbl">White papers available at launch &mdash; expanding quarterly</div></div>
  <div class="vs-cell"><div class="vs-num">8&ndash;12</div><div class="vs-lbl">Pages per paper &mdash; research quality, institutional language</div></div>
  <div class="vs-cell"><div class="vs-num">PDF</div><div class="vs-lbl">Downloadable &mdash; sharable with investment committees and LPs</div></div>
  <div class="vs-cell"><div class="vs-num">Free</div><div class="vs-lbl">No charge &mdash; register once, access all current and future papers</div></div>
</div>

<section class="sec sec-o" style="padding-top:48px;">
  <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:2px;">

      @forelse ($whitePapers as $item)
          @php
            $base = '#1a2a2a';
            $randomStep = rand(-15, 15); // variasi kecil biar tetap 1 palette
            $bgColor = adjustBrightness($base, $randomStep);
          @endphp

        <div class="wp-card">

          @if($item->image_path)
            <img src="{{ asset('storage/' . $item->image_path) }}"
              alt="{{ $item->title }}"
              style="width:100%; height:192px; object-fit:cover;">
          @else
            <img src="https://via.placeholder.com/400x300?text=No+Image"
              alt="Placeholder"
              style="width:100%; height:192px; object-fit:cover;">
          @endif

          <div class="wp-card-top"     
                style="
                  @if($item->category == 'Technical Reference')
                      background:#1a1a2a;
                  @elseif($item->category == 'Financial Analysis')
                      background:#1a2a1a;
                  @endif
                  ">
            <div><div class="wp-tag">{{ $item->category }}</div>
            <div class="wp-title">{{ $item->title }}</div></div>
            <div class="wp-pages">{{$item->page_count}} pages &middot; PDF &middot; {{ \Carbon\Carbon::parse($item->published_at)->format('F Y') }}</div>
          </div>
          <div class="wp-card-body">
            <p class="wp-abstract">
              {{ $item->excerpt }}
            </p>
            <div class="wp-audience"><strong>Audience:</strong> 
                  {{ collect($item->target_audience)->join(', ') }}
                </div>
          </div>
          <button class="wp-dl-btn open-modal-btn"
              data-id="{{ $item->id }}"
              data-title="{{ $item->title }}"
              data-image="{{ asset('storage/' . $item->image_path) }}">
            <span>View White Paper →</span>
          </button>
        </div>
      @empty
        <p style="color:rgba(255,255,255,0.55); font-size:14px; text-align:center; grid-column:1/-1;">
          No white papers available at the moment.
        </p>
      @endforelse
  </div>
</section>

<section class="sec sec-w" style="padding:48px;">
  <div style="display:flex;justify-content:space-between;align-items:start;gap:48px;flex-wrap:wrap;">
    <div>
      <p class="eye">Coming Soon</p>
      <h2 class="sh">Forthcoming White Papers</h2>
      <p class="sub" style="margin-bottom:0;">Registered members are notified when new papers are published &mdash; no separate sign-up required.</p>
    </div>
    <div style="display:flex;flex-direction:column;gap:1px;min-width:360px;flex:1;max-width:520px;">
      <div style="background:var(--off-white);border:1px solid var(--border-l);padding:16px 18px;display:flex;justify-content:space-between;align-items:center;gap:12px;">
        <span style="font-size:13px;color:var(--black);">IoT Water Monitoring ROI: A Framework for Real Estate Portfolios</span>
        <span style="font-size:10px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--gray-1);white-space:nowrap;">Q2 2026</span>
      </div>
      <div style="background:var(--off-white);border:1px solid var(--border-l);padding:16px 18px;display:flex;justify-content:space-between;align-items:center;gap:12px;">
        <span style="font-size:13px;color:var(--black);">Water Due Diligence in CRE Acquisitions: Standards and Best Practices</span>
        <span style="font-size:10px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--gray-1);white-space:nowrap;">Q3 2026</span>
      </div>
      <div style="background:var(--off-white);border:1px solid var(--border-l);padding:16px 18px;display:flex;justify-content:space-between;align-items:center;gap:12px;">
        <span style="font-size:13px;color:var(--black);">GRESB 2026 Water Benchmarks: Hotel REIT Sector Analysis</span>
        <span style="font-size:10px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--gray-1);white-space:nowrap;">Q4 2026</span>
      </div>
    </div>
  </div>
</section>

<section class="sec sec-dk" style="padding:48px;">
  <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:2px;background:rgba(255,255,255,.04);">
    <div style="padding:28px;background:var(--dark);"><div style="font-family:'Cormorant Garamond',serif;font-size:36px;font-weight:300;color:var(--green-lt);margin-bottom:8px;">01</div><div style="font-size:13px;font-weight:700;color:var(--white);margin-bottom:6px;">Register once</div><div style="font-size:12px;color:rgba(255,255,255,.38);line-height:1.7;">Enter your work email, company, and portfolio size. Under 60 seconds.</div></div>
    <div style="padding:28px;background:var(--dark);"><div style="font-family:'Cormorant Garamond',serif;font-size:36px;font-weight:300;color:var(--green-lt);margin-bottom:8px;">02</div><div style="font-size:13px;font-weight:700;color:var(--white);margin-bottom:6px;">Instant access</div><div style="font-size:12px;color:rgba(255,255,255,.38);line-height:1.7;">Download begins immediately. Confirmation email sent with your member portal link.</div></div>
    <div style="padding:28px;background:var(--dark);"><div style="font-family:'Cormorant Garamond',serif;font-size:36px;font-weight:300;color:var(--green-lt);margin-bottom:8px;">03</div><div style="font-size:13px;font-weight:700;color:var(--white);margin-bottom:6px;">Full library</div><div style="font-size:12px;color:rgba(255,255,255,.38);line-height:1.7;">One registration unlocks all current and future white papers, case studies, and webinars.</div></div>
    <div style="padding:28px;background:var(--dark);"><div style="font-family:'Cormorant Garamond',serif;font-size:36px;font-weight:300;color:var(--green-lt);margin-bottom:8px;">04</div><div style="font-size:13px;font-weight:700;color:var(--white);margin-bottom:6px;">New alerts</div><div style="font-size:12px;color:rgba(255,255,255,.38);line-height:1.7;">Automatic notification when new research is published &mdash; no separate sign-up required.</div></div>
  </div>
</section>

<div class="cs">
  <div><div class="cs-t">Looking for research specific<br><em>to your portfolio type?</em></div>
  <p class="cs-s">WST publishes research anchored in verified portfolio data. If you have a specific research need &mdash; GRESB benchmarking, industry analysis, or financial modelling &mdash; speak with an advisor.</p></div>
  <a href="/contact" class="cs-btn">Speak With an Advisor</a>
</div>

<!-- ─── WHITE PAPERS HEADER ─── -->
<section class="industries-page-hero" style="background:#0d0d0d; padding: 80px 40px 60px; text-align:center;">
  <div class="section-eyebrow">Resources</div>
  <div class="text-center">
    <h1 class="hero-h1">White Papers & Insight Briefs</h1>
    <p class="hero-body" style="text-align:center;">Explore in-depth research, savings strategies, and smart water management insights by Water Solutions Technology.</p>
  </div>
</section>

<!-- ─── WHITE PAPERS GRID ─── -->
<section style="background:#111; padding: 40px;">
  <div style="max-width:1280px; margin:0 auto;">

    <!-- White Papers Cards Grid -->
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(320px,1fr)); gap:24px;">
      @forelse ($whitePapers as $item)
        <div class="tile"
          style="background:#1a1a1a; overflow:hidden; display:flex; flex-direction:column;
                 border:1px solid rgba(255,255,255,0.07); transition:transform 0.3s, box-shadow 0.3s;"
          onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 12px 32px rgba(0,0,0,0.4)'"
          onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">

          @if($item->image_path)
            <img src="{{ asset('storage/' . $item->image_path) }}"
                 alt="{{ $item->title }}"
                 style="width:100%; height:192px; object-fit:cover;">
          @else
            <img src="https://via.placeholder.com/400x300?text=No+Image"
                 alt="Placeholder"
                 style="width:100%; height:192px; object-fit:cover;">
          @endif

          <div style="padding:20px; flex:1;">
            <div class="service-panel-tag" style="margin-bottom:8px;">{{ $item->title }}</div>
            <p style="color:rgba(255,255,255,0.55); font-size:14px; font-weight:300; line-height:1.6; margin:0;">
              {{ $item->description }}
            </p>
          </div>

          <button class="open-modal-btn"
             data-id="{{ $item->id }}"
             data-title="{{ $item->title }}"
             data-image="{{ asset('storage/' . $item->image_path) }}"
             style="display:block; text-align:center; padding:14px;
                    border-top:1px solid rgba(255,255,255,0.07);
                    color:rgba(255,255,255,0.6); font-size:13px; font-weight:300;
                    letter-spacing:0.05em; text-decoration:none; transition:background 0.2s, color 0.2s; cursor:pointer; background:none; border:none; width:100%;"
             onmouseover="this.style.background='rgba(255,255,255,0.06)';this.style.color='#fff'"
             onmouseout="this.style.background='transparent';this.style.color='rgba(255,255,255,0.6)'">
            View White Paper →
          </button>
        </div>
      @empty
        <p style="color:rgba(255,255,255,0.55); font-size:14px; text-align:center; grid-column:1/-1;">
          No white papers available at the moment.
        </p>
      @endforelse
    </div>

  </div>
</section>

<!-- ─── SUBSCRIBE SECTION ─── -->
<section class="contact-section" style="padding:0;">
  <div class="cc">
    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Stay Updated</div>
      <h2 class="contact-h">Want new white papers<br>delivered to your inbox?</h2>
      <p class="contact-sub">
        Subscribe to our newsletter and get the latest insights on water efficiency and smart water management.
      </p>
    </div>

    <!-- Subscribe Form -->
    <div>
      @include('layouts.partials.subscribe')
    </div>
  </div>
</section>

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