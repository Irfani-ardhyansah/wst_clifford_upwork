@extends('layouts.app')

@section('title', 'Water Solutions Technology')


@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/industry.css') }}">
@endpush
@section('content')

@php 
  $title = NULL;
@endphp

@if (request()->is('industries/commercial-laundries'))
    @php $title = 'Commercial Laundry Operations'; @endphp
    @include('components.industry.commercial-laundries')
@elseif (request()->is('industries/clubs-marinas'))
    @php $title = 'Clubs &amp; Marinas'; @endphp
    @include('components.industry.clubs-marinas')
@elseif (request()->is('industries/condominiums'))
    @php $title = 'Condominiums'; @endphp
    @include('components.industry.condominiums')
@elseif (request()->is('industries/golf-courses'))
    @php $title = 'Golf Courses &amp; Club Operators'; @endphp
    @include('components.industry.golf')
@elseif (request()->is('industries/supermarkets'))
    @php $title = 'Supermarkets & Grocery Retailers'; @endphp
    @include('components.industry.supermarkets')
@elseif (request()->is('industries/hospitality'))
    @php $title = 'Hospitality &amp; Hotel Portfolios'; @endphp
    @include('components.industry.hospitality')
@elseif (request()->is('industries/manufacturing-industrial'))
    @php $title = 'Manufacturing &amp; Industrial'; @endphp
    @include('components.industry.manufacturing')
@elseif (request()->is('industries/health-care-facilities'))
    @php $title = 'Health Care Facilities'; @endphp
    @include('components.industry.healthcare')
@elseif (request()->is('industries/office-buildings'))
    @php $title = 'Office Buildings'; @endphp
    @include('components.industry.office')
@elseif (request()->is('industries/restaurants'))
    @php $title = 'Restaurants'; @endphp
    @include('components.industry.restaurant')
@elseif (request()->is('industries/schools-universities-stadiums'))
    @php $title = 'Schools, Universities & Stadiums'; @endphp
    @include('components.industry.school')
@elseif (request()->is('industries/service-stations-car-washes'))
    @php $title = 'Service Stations & Car Washes'; @endphp
    @include('components.industry.service-stations')
@endif


<section class="sec sec-o">
  <div style="margin-bottom:32px;">
    <p class="eye">Verified Results</p>
    <h2 class="sh">Case studies from<br><em>{{$title}}</em></h2>
    <p class="sub">Register free to access the full reports. Every outcome is verified &mdash; no projections.</p>
  </div>
  <div class="cs-strip">
      @forelse ($case_studies as $item)

        <div class="cs-strip-card">
          @if($item->image_path)
            <img src="{{ asset('storage/' . $item->image_path) }}"
                 alt="{{ $item->title }}"
                 style="width:100%; height:192px; object-fit:cover;">
          @else
            <img src="https://via.placeholder.com/400x300?text=No+Image"
                 alt="Placeholder"
                 style="width:100%; height:192px; object-fit:cover;">
          @endif
          <div class="csc-header">
            <div class="csc-tag">Case Study</div>
            <div class="csc-client">{{$item->sub_title}}</div>
            <h3 class="csc-title">{{$item->title}}</h3>
            <div class="csc-outcome">{{$item->tags}}</div>
          </div>
          <p class="csc-excerpt">
              {{ $item->description }}
          </p>
          <div class="csc-footer">
            <span class="csc-meta">{{ $item->mini_description }}</span>
            <button class="csc-btn open-modal-btn"
            data-id="{{ $item->id }}" data-title="{{ $item->title }}" data-image="{{ asset('storage/' . $item->image_path) }}">
              <svg width="11" height="11" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="5" width="8" height="5.5" rx=".75"/><path d="M4 5V3.5a2 2 0 014 0V5"/></svg>
              Read Case Study
            </button>
          </div>
        </div>
        
      @empty
        <p style="color:rgba(255,255,255,0.6); text-align:center; grid-column:1/-1;">
          No case studies available at the moment.
        </p>
      @endforelse
  </div>
</section>

<section class="sec sec-w">
  <div style="margin-bottom:28px;">
    <p class="eye">Related Services</p>
    <h2 class="sh">WST services most relevant<br><em>to {{$title}}.</em></h2>
  </div>
  <div class="svc-links">
    <a href="{{ route('services.audit') }}" class="svc-link-card">
      <div class="svc-link-icon"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="2" y="3" width="14" height="12" rx="1.5"/><path d="M6 9h6M6 12h4"/></svg></div>
      <div>
        <div class="svc-link-title">Water Efficiency Audits</div>
        <div class="svc-link-desc">Full billing review and on-site irrigation audit including well/municipal cost analysis.</div>
        <div class="svc-link-arrow">Learn more &rarr;</div>
      </div>
    </a>
    <a href="{{ route('services.smart_water_monitoring') }}" class="svc-link-card">
      <div class="svc-link-icon"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M4 14V9l5-5 5 5v5M7 14v-4h4v4"/></svg></div>
      <div>
        <div class="svc-link-title">Smart Water Monitoring</div>
        <div class="svc-link-desc">IoT sensors on irrigation mains, pump stations, and zone sub-meters — with night-time leak detection.</div>
        <div class="svc-link-arrow">Learn more &rarr;</div>
      </div>
    </a>
    <a href="{{ route('services.cooling_towers') }}" class="svc-link-card">
      <div class="svc-link-icon"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M9 1v16M1 9h16M3.5 3.5l11 11M14.5 3.5l-11 11"/></svg></div>
      <div>
        <div class="svc-link-title">Cooling Tower Optimization</div>
        <div class="svc-link-desc">For clubs with full-service amenities — cooling tower and pool system water management.</div>
        <div class="svc-link-arrow">Learn more &rarr;</div>
      </div>
    </a>
    <a href="{{ route('services.scope_studies') }}" class="svc-link-card">
      <div class="svc-link-icon"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M3 4h12M3 8h8M3 12h6"/></svg></div>
      <div>
        <div class="svc-link-title">Feasibility Assessment</div>
        <div class="svc-link-desc">5-day remote review of irrigation billing to estimate savings opportunity before full programme.</div>
        <div class="svc-link-arrow">Learn more &rarr;</div>
      </div>
    </a>
    <a href="{{ route('services.smart_water_recovery') }}" class="svc-link-card">
      <div class="svc-link-icon"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M3 9a6 6 0 1012 0A6 6 0 003 9z"/><path d="M9 6v3l2 2M3 3l3 3"/></svg></div>
      <div>
        <div class="svc-link-title">Smart Water Recovery</div>
        <div class="svc-link-desc">Sewer exemption filing on irrigation supply and billing error recovery for golf properties.</div>
        <div class="svc-link-arrow">Learn more &rarr;</div>
      </div>
    </a>
    <a href="{{ route('services.cooling_towers') }}" class="svc-link-card">
      <div class="svc-link-icon"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="9" cy="9" r="6"/><path d="M9 9l3-3M9 5v1M9 13v1M5 9H4M14 9h-1"/></svg></div>
      <div>
        <div class="svc-link-title">Meter Accuracy Optimization</div>
        <div class="svc-link-desc">Irrigation meter calibration and pump station flow measurement accuracy review.</div>
        <div class="svc-link-arrow">Learn more &rarr;</div>
      </div>
    </a></div>
</section>

<div class="cs">
  <div>
    <div class="cs-t">Ready to optimise your course's<br><em>irrigation water budget?</em></div>
    <p class="cs-s">A WST {{$title}} assessment maps your current irrigation schedule against ET requirements, identifies the savings opportunity, and scopes the programme — delivered within 5 business days from billing records.</p>
  </div>
  <a href="/contact" class="cs-btn">Schedule Assessment</a>
</div>

<div class="gate-overlay" id="gate-overlay" role="dialog" aria-modal="true" aria-labelledby="gate-title">
  <div class="gate-box">
    <div class="gate-header">
      <button class="gate-close" id="gate-close" aria-label="Close">&times;</button>
      <div class="gate-header-eye">Access Required</div>
      <h2 class="gate-header-title" id="gate-title">Register for free access to<br>WST research &amp; resources.</h2>
      <p class="gate-header-sub">WST resources are available to institutional real estate professionals. Register once for full library access — no charge.</p>
    </div>
    <div class="gate-body" id="gate-form-wrap">
      <input type="text" name="website" style="display:none;" tabindex="-1" autocomplete="off">
      <div class="gate-row">
        <div class="gate-field">
          <label class="gate-label" for="gate-first">First Name</label>
          <input class="gate-input" id="gate-first" type="text" placeholder="Jane" autocomplete="given-name">
          <span class="gate-err" id="err-first">Required</span>
        </div>
        <div class="gate-field">
          <label class="gate-label" for="gate-last">Last Name</label>
          <input class="gate-input" id="gate-last" type="text" placeholder="Smith" autocomplete="family-name">
          <span class="gate-err" id="err-last">Required</span>
        </div>
      </div>
      <div class="gate-row gate-row--full">
        <div class="gate-field">
          <label class="gate-label" for="gate-email">Work Email</label>
          <input class="gate-input" id="gate-email" type="email" placeholder="jane@company.com" autocomplete="email">
          <span class="gate-err" id="err-email">Please enter a valid work email. Personal domains (Gmail, Yahoo etc.) are not accepted.</span>
        </div>
      </div>
      <div class="gate-row gate-row--full">
        <div class="gate-field">
          <label class="gate-label" for="gate-company">Company / Organisation</label>
          <input class="gate-input" id="gate-company" type="text" placeholder="Acme Real Estate Fund" autocomplete="organization">
          <span class="gate-err" id="err-company">Required</span>
        </div>
      </div>
      <div class="gate-row">
        <div class="gate-field">
          <label class="gate-label" for="gate-portfolio">Portfolio Size</label>
          <select class="gate-select" id="gate-portfolio">
            <option value="">Select...</option>
            <option value="1-5">1–5 properties</option>
            <option value="6-25">6–25 properties</option>
            <option value="26-100">26–100 properties</option>
            <option value="100+">100+ properties</option>
          </select>
          <span class="gate-err" id="err-portfolio">Required</span>
        </div>
        <div class="gate-field">
          <label class="gate-label" for="gate-interest">Primary Interest</label>
          <select class="gate-select" id="gate-interest">
            <option value="">Select...</option>
            <option value="case-studies">Case Studies</option>
            <option value="white-papers">White Papers</option>
            <option value="webinars">Webinars</option>
            <option value="gresb-tools">GRESB Tools</option>
            <option value="water-audit">Efficiency Audits</option>
            <option value="monitoring">Smart Monitoring</option>
            <option value="general">General Advisory</option>
          </select>
          <span class="gate-err" id="err-interest">Required</span>
        </div>
      </div>
      <button class="gate-submit" id="gate-submit" type="button">Access Resource</button>
      <p class="gate-legal">By registering you agree to WST's <a href="/privacy-policy">Privacy Policy</a>. We do not sell your data. You will receive a confirmation email and member portal access link.</p>
    </div>
    <div class="gate-success" id="gate-success">
      <div class="gate-success-icon">
        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" stroke="#fff" stroke-width="2.2"><path d="M4 11l5 5 9-9"/></svg>
      </div>
      <div class="gate-success-title">Access granted.</div>
      <p class="gate-success-body">Check your email for your member portal link. Your requested resource is now unlocked — click below to access it directly.</p>
      <a href="#" class="gate-success-cta" id="gate-resource-link">Access Resource &rarr;</a>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).on('click', '.open-modal-btn', function(e) {
        e.preventDefault();
        console.log('Modal button clicked');

        const caseId = $(this).data('id');
        const caseTitle = $(this).data('title');
        console.log('Case ID:', caseId, 'Title:', caseTitle);

        $('#modal-case-id').val(caseId);
        $('#modal-asset-title').text(caseTitle);

        $('#modal-image').addClass('hidden').attr('src', '');
        $('#modal-icon').removeClass('hidden');

        $('#pending-asset-preview').removeClass('hidden').addClass('flex');

        $('#auth-modal').removeClass('hidden opacity-0').addClass('open');
        console.log('Modal classes after:', $('#auth-modal').attr('class'));
        
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
</script>
@endpush

