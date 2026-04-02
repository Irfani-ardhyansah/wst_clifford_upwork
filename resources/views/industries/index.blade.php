@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')

<!-- ─── INDUSTRIES HEADER ─── -->
<section class="industries-page-hero" style="background:#0d0d0d; padding: 80px 40px 60px; text-align:center;">
  <div class="section-eyebrow">Who We Serve</div>
  <div class="text-center">
    <h1 class="hero-h1">Industries We Serve</h1>
    <p class="hero-body" style="text-align:center;">Tailored water efficiency strategies for every sector.</p>
  </div>
</section>

<!-- ─── FILTER + GRID ─── -->
<section style="background:#111; padding: 40px;">
  <div style="max-width:1280px; margin:0 auto;">

    <!-- Filter bar -->
    <div style="display:flex; justify-content:flex-end; margin-bottom:24px;">
      <button onclick="toggleFilter()" class="cc-btn-ghost" style="cursor:pointer;">
        Filter by Sector
      </button>
    </div>

    <div id="filterDropdown" style="margin-bottom:24px; display:none;">
      <select id="sectorSelect" onchange="filterTiles()"
        style="background:#1a1a1a; color:#fff; border:1px solid rgba(255,255,255,0.15);
               padding:8px 16px; font-size:14px; outline:none;">
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

    <!-- Industry Cards Grid -->
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(260px,1fr)); gap:24px;">
      @foreach($industries as $item)
        <div class="tile {{ $item->slug }}"
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

          <a href="{{ route('industries.case_study', ['slug' => $item->slug]) }}"
             style="display:block; text-align:center; padding:14px;
                    border-top:1px solid rgba(255,255,255,0.07);
                    color:rgba(255,255,255,0.6); font-size:13px; font-weight:300;
                    letter-spacing:0.05em; text-decoration:none; transition:background 0.2s, color 0.2s;"
             onmouseover="this.style.background='rgba(255,255,255,0.06)';this.style.color='#fff'"
             onmouseout="this.style.background='transparent';this.style.color='rgba(255,255,255,0.6)'">
            View Solutions →
          </a>
        </div>
      @endforeach
    </div>

  </div>
</section>

<!-- ─── PROTECT YOUR ASSET PERFORMANCE ─── -->
<section class="contact-section" style="padding:0;">
  <div class="cc">
    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Start Here</div>
      <h2 class="contact-h">Protect Your<br>Asset Performance</h2>
      <p class="contact-sub">
        Request a confidential water audit to optimize your property's health and profitability.
      </p>
      <div class="cc-btns">
        <a href="#contact-form" class="cc-btn-primary">Speak with an Auditor</a>
      </div>
    </div>

    <!-- Contact Form -->
    <div>
      <form id="contact-form" style="display:flex; flex-direction:column; gap:16px; max-width:480px; width:100%;">
        <div style="display:flex; gap:12px;">
          <input type="text" name="first-name" required placeholder="First Name"
            style="flex:1; background:#1a1a1a; border:1px solid rgba(255,255,255,0.12);
                   color:#fff; padding:10px 14px; font-size:14px; font-weight:300; outline:none;"
            onfocus="this.style.borderColor='rgba(255,255,255,0.4)'"
            onblur="this.style.borderColor='rgba(255,255,255,0.12)'"/>
          <input type="text" name="last-name" required placeholder="Last Name"
            style="flex:1; background:#1a1a1a; border:1px solid rgba(255,255,255,0.12);
                   color:#fff; padding:10px 14px; font-size:14px; font-weight:300; outline:none;"
            onfocus="this.style.borderColor='rgba(255,255,255,0.4)'"
            onblur="this.style.borderColor='rgba(255,255,255,0.12)'"/>
        </div>
        <div style="display:flex; gap:12px;">
          <input type="text" name="company-name" placeholder="Company Name"
            style="flex:1; background:#1a1a1a; border:1px solid rgba(255,255,255,0.12);
                   color:#fff; padding:10px 14px; font-size:14px; font-weight:300; outline:none;"
            onfocus="this.style.borderColor='rgba(255,255,255,0.4)'"
            onblur="this.style.borderColor='rgba(255,255,255,0.12)'"/>
          <input type="text" name="company-role" placeholder="Company Role"
            style="flex:1; background:#1a1a1a; border:1px solid rgba(255,255,255,0.12);
                   color:#fff; padding:10px 14px; font-size:14px; font-weight:300; outline:none;"
            onfocus="this.style.borderColor='rgba(255,255,255,0.4)'"
            onblur="this.style.borderColor='rgba(255,255,255,0.12)'"/>
        </div>
        <div style="display:flex; gap:12px;">
          <input type="tel" name="contact-number" placeholder="Contact Number"
            style="flex:1; background:#1a1a1a; border:1px solid rgba(255,255,255,0.12);
                   color:#fff; padding:10px 14px; font-size:14px; font-weight:300; outline:none;"
            onfocus="this.style.borderColor='rgba(255,255,255,0.4)'"
            onblur="this.style.borderColor='rgba(255,255,255,0.12)'"/>
          <input type="email" name="email" required placeholder="Email"
            style="flex:1; background:#1a1a1a; border:1px solid rgba(255,255,255,0.12);
                   color:#fff; padding:10px 14px; font-size:14px; font-weight:300; outline:none;"
            onfocus="this.style.borderColor='rgba(255,255,255,0.4)'"
            onblur="this.style.borderColor='rgba(255,255,255,0.12)'"/>
        </div>
        <select name="reason"
          style="background:#1a1a1a; border:1px solid rgba(255,255,255,0.12);
                 color:rgba(255,255,255,0.6); padding:10px 14px; font-size:14px; font-weight:300; outline:none;">
          <option value="">Reason for Contact</option>
          <option>Request a Water Audit</option>
          <option>Billing or Invoice Question</option>
          <option>Consultation on Smart Water Solutions</option>
          <option>Technical Support</option>
          <option>General Inquiry</option>
        </select>
        <textarea name="message" rows="3" required placeholder="Message"
          style="background:#1a1a1a; border:1px solid rgba(255,255,255,0.12);
                 color:#fff; padding:10px 14px; font-size:14px; font-weight:300;
                 outline:none; resize:none;"
          onfocus="this.style.borderColor='rgba(255,255,255,0.4)'"
          onblur="this.style.borderColor='rgba(255,255,255,0.12)'"></textarea>
        <button type="submit" class="cc-btn-primary" style="cursor:pointer;">
          Submit Request
        </button>
      </form>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
  function toggleFilter() {
    $("#filterDropdown").toggle();
  }

  function filterTiles() {
    const value = $("#sectorSelect").val();
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