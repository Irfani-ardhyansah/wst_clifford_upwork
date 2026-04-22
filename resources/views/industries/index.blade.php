@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/industries.css') }}">
@endpush

@section('content')
<div class="page-hero">
  <div class="page-hero-inner">
    <div class="page-eye">Industries We Serve</div>
    <h1 class="page-h1">Commercial real estate<br><em>water management — across every sector.</em></h1>
    <p class="page-sub">Water cost exposure exists in every commercial property type — but the specific systems, billing structures, and regulatory frameworks differ significantly by sector. WST's advisory programmes are built around the water characteristics of each industry, not a generic audit template.</p>
  </div>
</div>

<!-- SECTOR OVERVIEW STRIP -->
<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1px;background:var(--border-l);">
  <div style="background:var(--off-white);padding:28px;">
    <div style="font-family:'Cormorant Garamond',serif;font-size:38px;font-weight:300;color:var(--green-lt);line-height:1;margin-bottom:6px;">16</div>
    <div style="font-size:11px;color:var(--gray-1);line-height:1.55;">Commercial real estate sectors served by WST</div>
  </div>
  <div style="background:var(--off-white);padding:28px;">
    <div style="font-family:'Cormorant Garamond',serif;font-size:38px;font-weight:300;color:var(--green-lt);line-height:1;margin-bottom:6px;">500+</div>
    <div style="font-size:11px;color:var(--gray-1);line-height:1.55;">Properties audited and monitored across sectors</div>
  </div>
  <div style="background:var(--off-white);padding:28px;">
    <div style="font-family:'Cormorant Garamond',serif;font-size:38px;font-weight:300;color:var(--green-lt);line-height:1;margin-bottom:6px;">$2.3M</div>
    <div style="font-size:11px;color:var(--gray-1);line-height:1.55;">Verified savings documented — all sectors combined</div>
  </div>
  <div style="background:var(--off-white);padding:28px;">
    <div style="font-family:'Cormorant Garamond',serif;font-size:38px;font-weight:300;color:var(--green-lt);line-height:1;margin-bottom:6px;">GRESB</div>
    <div style="font-size:11px;color:var(--gray-1);line-height:1.55;">Solution Provider Partner — institutional ESG reporting</div>
  </div>
</div>

<!-- INDUSTRIES GRID -->
<section class="sec sec-w" style="padding-top:48px;">
  <div style="margin-bottom:32px;">
    <p class="eye">All Industries</p>
    <h2 class="sh">Select your sector to see<br><em>WST's industry-specific approach.</em></h2>
  </div>
  <div style="display:flex; justify-content:flex-end; align-items:center; gap:12px;">

    <div id="filterDropdown" style="display:none;">
      <select id="sectorSelect" onchange="filterTiles()"
        style="
          background:#ffffff;
          color:#333;
          border:1px solid #dcdcdc;
          padding:10px 16px;
          font-size:14px;
          border-radius:6px;
          min-width:220px;
        ">
        
        <option value="all">All Industries</option>
        <option value="golf">Golf Courses</option>
        <option value="healthcare">Health Care Facilities</option>
        <option value="office">Office Buildings</option>
        <option value="restaurants">Restaurants</option>
        <option value="education">Schools, Universities & Stadiums</option>
        <option value="senior">Senior Living Homes</option>
        <option value="laundries">Commercial Laundries</option>
        <option value="supermarkets">Supermarkets</option>
        <option value="carwash">Service Stations & Car Washes</option>
        <option value="condos">Condominiums</option>
        <option value="clubs">Clubs & Marinas</option>
        <option value="parks">Water Parks</option>
        <option value="others">Others We Serve</option>
      </select>
    </div>

    <button onclick="toggleFilter()" 
      style="
        cursor:pointer;
        background:#ffffff;
        color:#333;
        border:1px solid #dcdcdc;
        padding:8px 16px;
        font-size:14px;
        border-radius:6px;
      ">
      Filter by Sector
    </button>

  </div>
  <div class="ind-index-grid">
    @foreach($industries as $item)
    <div class="tile {{ $item->slug }}" style="display:block;">
      <a href="{{ route('case-studies.index') }}" class="ind-index-card">
              @if($item->image_path)
          <img src="{{ asset('storage/' . $item->image_path) }}"
                alt="{{ $item->title }}"
                style="width:100%; height:192px; object-fit:cover;">
        @else
          <img src="https://via.placeholder.com/400x300?text=No+Image"
                alt="Placeholder"
                style="width:100%; height:192px; object-fit:cover;">
        @endif
        <div class="iic-tag">Available</div>
        <div class="iic-name">{{$item->title}}</div>
        <div class="iic-desc">
          {{ \Illuminate\Support\Str::limit($item->description, 60) }}
        </div>
        <div class="iic-arrow">Learn more &rarr;</div>
      </a>
    </div>
    @endforeach
  </div>
</section>

<!-- APPROACH NOTE -->
<section class="sec sec-dk" style="padding:56px 48px;">
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center;">
    <div>
      <p class="eye" style="color:rgba(255,255,255,.3);">Our Approach</p>
      <h2 style="font-family:'Cormorant Garamond',serif;font-size:clamp(26px,2.8vw,38px);font-weight:300;color:var(--white);margin-bottom:18px;line-height:1.2;">Every industry has different water systems.<br><em>Our programmes reflect that.</em></h2>
      <p style="font-size:13px;color:rgba(255,255,255,.4);line-height:1.85;margin-bottom:20px;">A hotel's dominant water cost is cooling towers and laundry. An office building's is HVAC make-up and tenant sub-metering. A golf course's is irrigation. WST doesn't apply a generic audit template — we design each engagement around the specific systems, tariff structures, and regulatory context of the property type.</p>
      <p style="font-size:13px;color:rgba(255,255,255,.4);line-height:1.85;">If your sector isn't listed with a dedicated page yet, it doesn't mean we haven't worked in it. Speak with an advisor to discuss your specific portfolio.</p>
    </div>
    <div style="display:flex;flex-direction:column;gap:2px;">
      <div style="background:#0f1a13;padding:20px 24px;">
        <div style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--green-lt);margin-bottom:6px;">Hospitality</div>
        <div style="font-size:12px;color:rgba(255,255,255,.4);line-height:1.65;">Primary focus: cooling towers, sewer exemptions, GRESB water score, IoT leak detection</div>
      </div>
      <div style="background:#0f1a13;padding:20px 24px;">
        <div style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--green-lt);margin-bottom:6px;">REITs & Office</div>
        <div style="font-size:12px;color:rgba(255,255,255,.4);line-height:1.65;">Primary focus: billing validation, WT1 data coverage, IC documentation, cap rate analysis</div>
      </div>
      <div style="background:#0f1a13;padding:20px 24px;">
        <div style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--green-lt);margin-bottom:6px;">Industrial & Golf</div>
        <div style="font-size:12px;color:rgba(255,255,255,.4);line-height:1.65;">Primary focus: process water audits, irrigation systems, cooling loop efficiency</div>
      </div>
      <div style="background:#0f1a13;padding:20px 24px;">
        <div style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--green-lt);margin-bottom:6px;">Healthcare & Education</div>
        <div style="font-size:12px;color:rgba(255,255,255,.4);line-height:1.65;">Primary focus: compliance documentation, risk assessment, regulatory billing validation</div>
      </div>
    </div>
  </div>
</section>

<div class="cs">
  <div>
    <div class="cs-t">Don't see your industry?<br><em>Speak with an advisor.</em></div>
    <p class="cs-s">WST works with any commercial real estate operator with water cost exposure. If your sector isn't listed, we've likely worked in it — tell us about your portfolio.</p>
  </div>
  <a href="{{route('contact')}}" class="cs-btn">Speak With an Advisor</a>
</div>

@endsection

@push('scripts')
<script>
  function toggleFilter() {
    $("#filterDropdown").toggle();
  }

  function filterTiles() {
    const value = $("#sectorSelect").val();
    console.log(value);
    $(".tile").each(function() {
      if (value === "all" || $(this).hasClass(value)) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  }
</script>
@endpush