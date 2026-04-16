@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/article.css') }}">
@endpush

@section('content')

<div class="art-hero" style="min-height:auto;padding-bottom:52px;">
  <div class="art-hero-inner">
    <div class="page-eye" style="color:var(--green-lt);display:flex;align-items:center;gap:10px;margin-bottom:14px;">
      <span style="width:22px;height:1px;background:var(--green-lt);display:inline-block;"></span>
      Resources &mdash; Articles &amp; Insights
    </div>
    <h1 class="art-h1">Institutional insights on<br><em>CRE water performance.</em></h1>
    <p class="art-deck">Open-access articles on water management, GRESB scoring, financial ROI, and operational best practice for commercial real estate portfolios. No registration required.</p>
  </div>
</div>

<section class="sec sec-w" style="padding-top:40px;">
  <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:28px;flex-wrap:wrap;gap:12px;">
    <div>
      <p class="eye">All Articles</p>
      <h2 class="sh" style="margin-bottom:0;">5 articles published &mdash; <em>expanding monthly.</em></h2>
    </div>
    <div style="display:flex;gap:8px;flex-wrap:wrap;">
      <button class="filter-pill is-active js-af" data-tag="all" style="font-family:'DM Sans',sans-serif;padding:6px 14px;border:1px solid var(--border-l);background:var(--black);color:var(--white);font-size:11px;font-weight:600;cursor:pointer;">All Topics</button>
      <!-- <button class="filter-pill js-af" data-tag="ESG" style="font-family:'DM Sans',sans-serif;padding:6px 14px;border:1px solid var(--border-l);background:transparent;color:var(--gray-1);font-size:11px;font-weight:600;cursor:pointer;transition:all .18s;">ESG &amp; GRESB</button>
      <button class="filter-pill js-af" data-tag="Financial" style="font-family:'DM Sans',sans-serif;padding:6px 14px;border:1px solid var(--border-l);background:transparent;color:var(--gray-1);font-size:11px;font-weight:600;cursor:pointer;transition:all .18s;">Financial</button>
      <button class="filter-pill js-af" data-tag="Audit" style="font-family:'DM Sans',sans-serif;padding:6px 14px;border:1px solid var(--border-l);background:transparent;color:var(--gray-1);font-size:11px;font-weight:600;cursor:pointer;transition:all .18s;">Audits</button>
      <button class="filter-pill js-af" data-tag="Monitoring" style="font-family:'DM Sans',sans-serif;padding:6px 14px;border:1px solid var(--border-l);background:transparent;color:var(--gray-1);font-size:11px;font-weight:600;cursor:pointer;transition:all .18s;">Monitoring</button> -->
    </div>
  </div>

  <div class="art-index-grid" id="art-grid">
      @forelse ($articles as $item)

      <a href="#" class="aic">
        @if($item->thumbnail)
          <img src="{{ asset('storage/' . $item->thumbnail) }}"
            alt="{{ $item->title }}"
            style="width:100%; height:192px; object-fit:cover;">
        @else
          <img src="https://via.placeholder.com/400x300?text=No+Image"
            alt="Placeholder"
            style="width:100%; height:192px; object-fit:cover;">
        @endif
        <div class="aic-top">
          <div class="aic-tag">{{$item->status}}</div>
          <div class="aic-title">{{ $item->title }}</div>
          <div class="aic-excerpt">
            {{ $item->description }}
          </div>
        </div>
        <div class="aic-foot">
          <div class="aic-meta">Asset Managers, CFOs &middot; April 2026</div>
          <div class="aic-arrow open-article"
            data-id="{{ $item->id }}">Read &rarr;</div>
        </div>
      </a>
      @empty
        <p style="color:rgba(255,255,255,0.55); font-size:14px; text-align:center; grid-column:1/-1;">
          No tools available at the moment.
        </p>
    @endforelse
  </div>
</section>

<section class="sec sec-dk" style="padding:48px;">
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center;">
    <div>
      <p class="eye" style="color:rgba(255,255,255,.3);">Publishing Cadence</p>
      <h2 style="font-family:'Cormorant Garamond',serif;font-size:clamp(24px,2.5vw,34px);font-weight:300;color:var(--white);margin-bottom:16px;line-height:1.2;">Two new articles per month.<br><em>All open-access, no registration.</em></h2>
      <p style="font-size:13px;color:rgba(255,255,255,.4);line-height:1.85;">WST publishes research anchored in verified portfolio data — not generic industry commentary. Every article contains at least one specific, citable data point derived from WST's direct engagement experience. The goal is to give institutional real estate professionals the specific information they need to make informed decisions about water management — and to ensure that WST appears when AI platforms are asked about CRE water performance.</p>
    </div>
    <div style="display:flex;flex-direction:column;gap:2px;">
      <div style="background:#0f1a13;padding:18px 22px;"><div style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--green-lt);margin-bottom:5px;">Coming in May 2026</div><div style="font-size:13px;color:rgba(255,255,255,.55);">GRESB WT1 Indicator: What It Means and How to Maximise Your Score</div></div>
      <div style="background:#0f1a13;padding:18px 22px;"><div style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--green-lt);margin-bottom:5px;">Coming in May 2026</div><div style="font-size:13px;color:rgba(255,255,255,.55);">Cooling Tower Water Waste: The $200K Hidden Cost No One Monitors</div></div>
      <div style="background:#0f1a13;padding:18px 22px;"><div style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--green-lt);margin-bottom:5px;">Coming in June 2026</div><div style="font-size:13px;color:rgba(255,255,255,.55);">Water Due Diligence in CRE Acquisitions: What to Look For</div></div>
    </div>
  </div>
</section>

<div class="cs">
  <div><div class="cs-t">Prefer to speak directly<br><em>rather than read?</em></div>
  <p class="cs-s">A 90-minute portfolio visibility session delivers the specific analysis relevant to your assets — not general benchmarks. Schedule with a WST advisor.</p></div>
  <a href="{{ route('contact') }}" class="cs-btn">Schedule Assessment</a>
</div>


<!-- ─── TOOLS HEADER ─── -->
<section class="industries-page-hero" style="background:#0d0d0d; padding: 80px 40px 60px; text-align:center;">
  <div class="section-eyebrow">Resources</div>
  <div class="text-center">
    <h1 class="hero-h1">Article</h1>
    <p class="hero-body" style="text-align:center;">Editorial content from the WST advisory team.</p>
  </div>
</section>

<!-- ─── TOOLS GRID ─── -->
<section style="background:#111; padding: 40px;">
  <div style="max-width:1280px; margin:0 auto;">

    <!-- Tools Cards Grid -->
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(320px,1fr)); gap:24px;">
      @forelse ($articles as $item)
        <div class="tile"
          style="background:#1a1a1a; overflow:hidden; display:flex; flex-direction:column;
                 border:1px solid rgba(255,255,255,0.07); transition:transform 0.3s, box-shadow 0.3s;"
          onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 12px 32px rgba(0,0,0,0.4)'"
          onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">

          @if($item->thumbnail)
            <img src="{{ asset('storage/' . $item->thumbnail) }}"
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

          <button class="open-article"
             data-id="{{ $item->id }}"
             style="display:block; text-align:center; padding:14px;
                    border-top:1px solid rgba(255,255,255,0.07);
                    color:rgba(255,255,255,0.6); font-size:13px; font-weight:300;
                    letter-spacing:0.05em; text-decoration:none; transition:background 0.2s, color 0.2s; cursor:pointer; background:none; border:none; width:100%;"
             onmouseover="this.style.background='rgba(255,255,255,0.06)';this.style.color='#fff'"
             onmouseout="this.style.background='transparent';this.style.color='rgba(255,255,255,0.6)'">
            Read Article →
          </button>
        </div>
      @empty
        <p style="color:rgba(255,255,255,0.55); font-size:14px; text-align:center; grid-column:1/-1;">
          No tools available at the moment.
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
      <h2 class="contact-h">Want new tools<br>delivered to your inbox?</h2>
      <p class="contact-sub">
        Subscribe to our newsletter and get the latest water efficiency tools and calculators.
      </p>
    </div>

    <!-- Subscribe Form -->
    <div>
      @include('layouts.partials.subscribe')
    </div>
  </div>
</section>

<div id="article-modal" style="display:none; position:fixed; inset:0; z-index:1000;">
    
    <!-- Backdrop -->
    <div style="position:fixed; inset:0; background:rgba(0,0,0,0.75); backdrop-filter:blur(4px);"></div>

    <!-- Modal Container -->
    <div style="position:fixed; inset:0; display:flex; flex-direction:column; background:#0d0d0d;">

        <!-- Close Button -->
        <button id="close-article-modal"
            style="position:fixed; top:24px; right:24px; z-index:100;
                   background:#1a1a1a; border:1px solid rgba(255,255,255,0.1);
                   color:rgba(255,255,255,0.6); padding:10px;
                   cursor:pointer; transition:all 0.2s;"
            onmouseover="this.style.background='rgba(255,255,255,0.08)';this.style.color='#fff'"
            onmouseout="this.style.background='#1a1a1a';this.style.color='rgba(255,255,255,0.6)'">
            <svg style="width:20px;height:20px;" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Content -->
        <div id="article-modal-content"
            style="flex:1; overflow-y:auto; width:100%; height:100%;
                   background:#0d0d0d; color:rgba(255,255,255,0.75);
                   padding:60px 40px;
                   font-size:15px; font-weight:300; line-height:1.8;">
        </div>

    </div>
</div>

@endsection
  
@push('scripts')
<script>
$(document).ready(function () {
    $(document).on('click', '.open-article', function () {
        const id = $(this).data('id');

        $.ajax({
            url: `{{ url('/member-dashboard/articles') }}/${id}/content`,
            type: 'GET',
            success: function (response) {
                $('#article-modal-content').html(response);
                $('#article-modal').show();
            },
            error: function () {
                alert('Failed to load article.');
            }
        });
    });

    $('#close-article-modal').on('click', function () {
        $('#article-modal').hide();
        $('#article-modal-content').html('');
    });

    $('#article-modal').on('click', function (e) {
        if (e.target === this) {
            $(this).hide();
            $('#article-modal-content').html('');
        }
    });

    $('input[name="search"]').on('keypress', function (e) {
        if (e.which === 13) {
            e.preventDefault();
            $(this).closest('form').submit();
        }
    });
});
</script>
@endpush