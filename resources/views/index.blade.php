@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@push('styles')
<style>
.logo-cell {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px 12px;
    border-right: 0.5px solid rgba(0,0,0,0.1);
    border-bottom: 0.5px solid rgba(0,0,0,0.1);
    cursor: default;
    min-height: 80px;
    overflow: hidden;          /* ganti dari visible ke hidden */
    perspective: 600px;        /* tambah ini */
}

.logo-text {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 3px;
    transition: opacity 0.22s ease, transform 0.22s ease;
    transform-style: preserve-3d;
}

/* hapus .logo-img-wrap yang lama, ganti dengan ini */
.logo-img-wrap {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transform: rotateX(-25deg) scale(0.88);
    transform-origin: center center;
    transform-style: preserve-3d;
    transition: opacity 0.22s ease, transform 0.22s ease;
    pointer-events: none;
    padding: 10px;
    box-sizing: border-box;
}

.logo-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    max-height: 52px;
}

.logo-cell:hover .logo-img-wrap {
    opacity: 1;
    transform: rotateX(0deg) scale(1);
}

.logo-cell:hover .logo-text {
    opacity: 0;
    transform: rotateX(15deg) scale(0.9);
}
</style>
@endpush

@section('content')

<!-- ─── HERO ─── -->
<div class="hero">
  <div class="hero-main">
    <div class="hero-left">
      <div class="hero-eyebrow">Portfolio Water Advisory</div>
      <h1 class="hero-h1">
        Total Water Visibility.<br>
        <em>Measurable Property</em><br>
        Value.
      </h1>
      <p class="hero-body">
        We are a <strong>commercial real estate water advisory firm.</strong> We work with real estate portfolios to reduce infrastructure cost exposure — identifying billing errors, eliminating water waste, and converting every improvement into <strong>verified NOI gains and ESG performance data.</strong>
      </p>
      <p class="hero-body" style="margin-top:12px">
        For the first time, portfolios of any size have access to AI-driven utility intelligence, real-time monitoring, and institutional-grade ESG reporting — without millions in capital outlay.
      </p>
      <p class="hero-tagline">Simplifying the Business of Water</p>
      <div class="hero-actions">
        <a href="/contact" class="btn-hero-primary">Schedule Portfolio Assessment</a>
        <a href="#services-section" class="btn-hero-ghost">Our Services</a>
      </div>
      <div class="hero-trust">
        <div class="trust-item">
          <div class="trust-val">$2.3M</div>
          <div class="trust-lbl">Verified savings</div>
        </div>
        <div class="trust-sep"></div>
        <div class="trust-item">
          <div class="trust-val">500+</div>
          <div class="trust-lbl">Properties served</div>
        </div>
        <div class="trust-sep"></div>
        <div class="trust-item">
          <div class="trust-val">25.3%</div>
          <div class="trust-lbl">Avg. reduction</div>
        </div>
        <div class="trust-sep"></div>
        <div class="trust-item">
          <div class="trust-val">GRESB</div>
          <div class="trust-lbl">Partner</div>
        </div>
      </div>
    </div>

    <div class="hero-right">
      <div class="hero-stat-grid">
        <div class="hero-stat">
          <div class="hero-stat-val">31</div>
          <div class="hero-stat-lbl">Assets — REITs</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-val">100%</div>
          <div class="hero-stat-lbl">GRESB data coverage</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-val">$2.3M</div>
          <div class="hero-stat-lbl">Verified savings</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-val">90 days</div>
          <div class="hero-stat-lbl">To full visibility</div>
        </div>
      </div>
      <div class="hero-proof">
        <div class="hero-proof-tag">Verified — The Westin Fort Lauderdale · REITs</div>
        <div class="hero-proof-q">"25.3% water reduction. $2.3M documented savings. 31 assets. Reported to ESG."</div>
      </div>
    </div>
  </div>

  <!-- 3 CTA strips (updated per your notes) -->
  <div class="hero-strip">
    <a href="/resources/tools" class="hero-strip-item">
      <span class="hero-strip-label">Water Consumption Calculator + Tools</span>
      <span class="hero-strip-arrow">→</span>
    </a>
    <a href="/resources/tools" class="hero-strip-item">
      <span class="hero-strip-label">My ESG | GRESB Peer Comparison</span>
      <span class="hero-strip-arrow">→</span>
    </a>
    <a href="/resources/webinars" class="hero-strip-item">
      <span class="hero-strip-label">Take a Glance — Overview Video</span>
      <span class="hero-strip-arrow">▷</span>
    </a>
  </div>
</div>

<!-- ─── TRENDING INSIGHTS ─── -->
<section class="insights-section">
  <div class="insights-grid">
    <div class="insights-intro">
      <div class="section-eyebrow">Trending Insights</div>
      <div class="insights-intro-title">For Your Portfolio</div>
      <p class="insights-intro-body">The latest on water costs, utility overcharging, and sustainability compliance — critical intelligence for your portfolio.</p>
    </div>
    @foreach($webinars as $item)
      <div class="insight-card">
        <div class="insight-tag">Webinar On Demand</div>
        <div class="insight-title">{{ $item->title }}</div>
        <div class="insight-desc">{{ Str::limit($item->description, 100) }}</div>
        <span class="insight-btn open-modal-btn"
        data-id="{{ $item->id }}" data-title="{{ $item->title }}" data-image="{{ asset('storage/' . $item->image_path) }}">Watch Now</span>
      </div>
    @endforeach
  </div>
  <div class="insights-footer">
    <a href="{{ route('member-dashboard.index', ['category' => 'webinar']) }}" class="insights-more">View More Insights →</a>
  </div>
</section>

<!-- ─── PROPERTY VALUE (Before/After) ─── -->
<section class="value-section">
  <div class="value-header">
    <div class="section-eyebrow">Primary Control Asset</div>
    <h2 class="section-h2" style="color:#fff">We Focus on Your Property's<br>Value <em>and</em> Efficiency</h2>
    <p class="section-sub">Evident Reduction. Evident Savings. Enhanced Property Value.</p>
  </div>

  <div class="ba-layout">
    <div class="ba-col before">
      <div class="ba-label">Before</div>
      <div class="ba-row">Portfolio Annual Water Cost: $250,000 per property</div>
      <div class="ba-row">20% Water Data Coverage costing $1,300/day</div>
      <div class="ba-row">Higher Cooling Tower Operating Cost</div>
      <div class="ba-row">Undefined ESG Goals</div>
      <div class="ba-row">Investor Funding Barriers</div>
      <div class="ba-consumption">
        <div class="ba-consumption-label">Annual Consumption</div>
        <div class="ba-consumption-value">10,200,000</div>
        <div class="ba-consumption-unit">gallons per year</div>
      </div>
    </div>

    <div class="ba-center">
      <div class="ba-meter-label">Water Meter</div>
      <div class="ba-meter-icon">
        <div class="ba-meter-dot"></div>
        <div class="ba-meter-dot active"></div>
        <div class="ba-meter-dot"></div>
        <div class="ba-meter-dot active"></div>
      </div>
      <div class="ba-arrow">→</div>
    </div>

    <div class="ba-col after">
      <div class="ba-label">After WST</div>
      <div class="ba-row">30% Cost Reduction → $175,000 per property</div>
      <div class="ba-row">100% Water Data Coverage — GRESB compliant</div>
      <div class="ba-row">20% Cooling Tower Cost Reduction</div>
      <div class="ba-row">Established ESG Framework</div>
      <div class="ba-row">Institutional Funding Ready</div>
      <div class="ba-consumption" style="background:rgba(45,92,66,0.25);border-color:rgba(45,92,66,0.5)">
        <div class="ba-consumption-label" style="color:rgba(255,255,255,0.5)">Annual Consumption</div>
        <div class="ba-consumption-value">7,200,000</div>
        <div class="ba-consumption-unit" style="color:rgba(255,255,255,0.4)">gallons per year</div>
      </div>
    </div>
  </div><!-- /ba-layout -->


  <div class="ba-process">
    <div class="ba-process-label">Primary Control Asset — WST Methodology</div>
    <div class="ba-process-steps">
      <span class="ba-step">Audit</span>
      <span class="ba-step-arrow">→</span>
      <span class="ba-step">Engineer</span>
      <span class="ba-step-arrow">→</span>
      <span class="ba-step">Verify</span>
      <span class="ba-step-arrow">→</span>
      <span class="ba-step">Report</span>
    </div>
  </div>
</section>

<!-- ─── PORTFOLIO WATER VISIBILITY MAP ─── -->
<section class="pvm-section">
  <div class="pvm-wrap">

    <div class="pvm-map-col" id="pvm-map-col">
      <svg id="pvm-svg" viewBox="0 0 700 420" xmlns="http://www.w3.org/2000/svg">
        <rect width="700" height="420" fill="#0d0d0d"/>
        <g id="pvm-states"></g>
        <g id="pvm-lines"></g>
        <g id="pvm-dots"></g>
      </svg>
      <div class="pvm-tt" id="pvm-tt">
        <div class="pvm-tt-name"  id="pvm-tt-n"></div>
        <div class="pvm-tt-type"  id="pvm-tt-t"></div>
        <div class="pvm-tt-saved" id="pvm-tt-s"></div>
      </div>
    </div>

    <div class="pvm-dash-col">
      <div class="pvm-dl">Your Portfolio</div>
      <div class="pvm-dm">
        <div class="pvm-dv pvm-dv-green" id="pvm-sav">$0</div>
        <div class="pvm-ds">Verified savings delivered</div>
      </div>
      <div class="pvm-dm">
        <div style="display:flex;justify-content:space-between;align-items:baseline;">
          <div class="pvm-dv" id="pvm-cov">0%</div>
          <div class="pvm-esg">ESG</div>
        </div>
        <div class="pvm-bar-bg"><div class="pvm-bar-fill" id="pvm-bar"></div></div>
        <div class="pvm-ds">Portfolio data coverage</div>
      </div>
      <div class="pvm-dm">
        <div class="pvm-dv" id="pvm-cnt">0</div>
        <div class="pvm-ds">Properties monitored</div>
      </div>
      <div class="pvm-insights">
        <div class="pvm-dl">Insights</div>
        <div class="pvm-ins">
          <div class="pvm-dot" style="background:#e8a020;"></div>
          <div class="pvm-ins-t"><strong>More to save.</strong> 6 assets below efficiency benchmark.</div>
        </div>
        <div class="pvm-ins">
          <div class="pvm-dot" style="background:var(--green-lt);"></div>
          <div class="pvm-ins-t"><strong>Proven at scale.</strong> 25.3% avg reduction — hospitality.</div>
        </div>
        <div class="pvm-ins">
          <div class="pvm-dot" style="background:rgba(255,255,255,0.18);"></div>
          <div class="pvm-ins-t"><strong>ESG ready.</strong> Submission window opens Apr 2026.</div>
        </div>
      </div>
    </div>

  </div>

  <div class="pvm-foot">
    <div><h2 class="pvm-hl"><em>Portfolio Water Visibility</em></h2></div>
    <div class="pvm-aum-wrap">
      <div class="pvm-aum" id="pvm-aum">My Assets Under Management</div>
      <div class="pvm-aum-sub">32 properties &bull; 14 states</div>
    </div>
  </div>
</section>

<!-- ─── WHO WE SERVE (Industries) ─── -->
<section class="industries-section">
  <div class="industries-header">
    <div>
      <h2 class="section-h2">Who We<br>Provide<br>Guidance To</h2>
      <p class="section-sub">Trusted by forward-thinking owners and operators of hotels, multifamily properties, manufacturers, and commercial real estate portfolios.</p>
    </div>
    <div>
      <div class="industries-scroll">
        @foreach($industries as $item)
        <a href="#" class="industry-card">
          <div class="industry-img">
            @if($item->image_path)  
              <img src="{{ asset('storage/' . $item->image_path) }}" 
                alt="{{ $item->title }}" 
                loading="lazy">
            @else
              <img src="https://via.placeholder.com/400x300?text=No+Image" 
                  alt="Placeholder">
            @endif
          </div>
          <div class="industry-name">{{ $item->title }}</div>
        </a>
        @endforeach
      </div>
      <div class="industries-more">
        <a href="/industries">View Similar Operators →</a>
      </div>
    </div>
  </div>
</section>

<!-- ─── SERVICES (advisory list) ─── -->
<section class="services-section" id="services-section">
  <div class="section-eyebrow">Advisory Services</div>
  <h2 class="section-h2">Services that Transform Water Challenges<br><em>into Opportunities</em></h2>

  <div class="services-layout">
    <div class="services-list">
      <button class="service-list-item active" onclick="showService('audits',this)">Strategic Water Audits</button>
      <button class="service-list-item" onclick="showService('portfolio',this)">Portfolio Optimization</button>
      <button class="service-list-item" onclick="showService('gresb',this)">GRESB &amp; ESG Compliance</button>
      <button class="service-list-item" onclick="showService('analytics',this)">Benchmarking &amp; Analytics</button>
      <button class="service-list-item" onclick="showService('capital',this)">Capital Planning</button>
      <button class="service-list-item" onclick="showService('tech',this)">Technology Implementation</button>
    </div>
    <div style="position:relative;">
      <div class="service-panel active" id="svc-audits">
        <div class="service-panel-tag">Water Audits</div>
        <h3 class="service-panel-title">Identify hidden inefficiencies and drive <em>measurable ROI</em> with a portfolio-wide review.</h3>
        <p class="service-panel-body">A comprehensive water audit establishes asset-level baselines, identifies billing errors, unmetered losses, and mechanical inefficiencies — and delivers a prioritized roadmap with quantified ROI and payback periods. Detailed reporting structured for asset owners and investment committees.</p>
        <a href="/services/efficiency-audits" class="service-panel-link">More about our approach →</a>
        <div class="service-panel-features">
          <div class="service-panel-feat">Bill validation and on-site physical audit</div>
          <div class="service-panel-feat">Mechanical system assessment: cooling towers, irrigation, boilers</div>
          <div class="service-panel-feat">Billing error identification and recovery documentation</div>
          <div class="service-panel-feat">Prioritized efficiency roadmap with NOI impact projections</div>
        </div>
      </div>
      <div class="service-panel" id="svc-portfolio">
        <div class="service-panel-tag">Portfolio Optimization</div>
        <h3 class="service-panel-title">Portfolio-wide water visibility — from <em>asset level to investment committee.</em></h3>
        <p class="service-panel-body">Ara AI automates utility bill collection across every asset, closing data coverage gaps while IoT monitoring validates consumption in real time. The combined model produces the verified, audit-grade data that institutional portfolios require — without adding headcount.</p>
        <a href="/services/utility-intelligence" class="service-panel-link">Explore Ara AI platform →</a>
        <div class="service-panel-features">
          <div class="service-panel-feat">Ara AI automated bill collection — 95%+ portfolio coverage</div>
          <div class="service-panel-feat">Real-time IoT monitoring with anomaly alerts and cost quantification</div>
          <div class="service-panel-feat">Asset-level dashboards at monitor.watersolutech.com</div>
          <div class="service-panel-feat">Quarterly portfolio performance reporting to asset management</div>
        </div>
      </div>
      <div class="service-panel" id="svc-gresb">
        <div class="service-panel-tag">GRESB &amp; ESG Compliance</div>
        <h3 class="service-panel-title">GRESB is peer-relative. <em>Your competitors are already moving.</em></h3>
        <p class="service-panel-body">Star ratings are assigned by quintile position — not against absolute standards. WST manages both the WT1 coverage gap (Ara AI) and the performance gap (verified monitoring data) that determine where your fund ranks. We prepare your GRESB water submission from end to end.</p>
        <a href="/gresb" class="service-panel-link">Explore GRESB advisory →</a>
        <div class="service-panel-features">
          <div class="service-panel-feat">WT1 data coverage closure — highest-weight water indicator</div>
          <div class="service-panel-feat">GRESB portal–ready data package across all water indicators</div>
          <div class="service-panel-feat">Peer quintile analysis and competitive positioning</div>
          <div class="service-panel-feat">Annual submission support and IC documentation</div>
        </div>
      </div>
      <div class="service-panel" id="svc-analytics">
        <div class="service-panel-tag">Benchmarking &amp; Analytics</div>
        <h3 class="service-panel-title">Water intensity benchmarked against <em>the right peer group.</em></h3>
        <p class="service-panel-body">Consumption normalized by asset class, gross floor area, and occupancy type — benchmarked against verified peer data. Hospitality benchmarks differently than industrial. WST calibrates the comparison correctly so your investment committee is seeing an accurate picture.</p>
        <a href="/resources/tools" class="service-panel-link">Open benchmarking tools →</a>
        <div class="service-panel-features">
          <div class="service-panel-feat">Water intensity calculations per asset class (m³/m²/year)</div>
          <div class="service-panel-feat">3-year trend normalization for weather and occupancy</div>
          <div class="service-panel-feat">Peer group benchmarking across GRESB-relevant asset classes</div>
          <div class="service-panel-feat">Portfolio risk scoring and exposure mapping</div>
        </div>
      </div>
      <div class="service-panel" id="svc-capital">
        <div class="service-panel-tag">Capital Planning</div>
        <h3 class="service-panel-title">Section 179, PACE, and shared savings — <em>structuring the investment correctly.</em></h3>
        <p class="service-panel-body">Self-funded equipment ownership delivers substantially more long-term value than partner-funded models because Section 179 deductions apply only when clients own equipment directly. WST models every financing scenario — tax savings, payback, and NOI impact — before any capital is deployed.</p>
        <a href="/resources/tax-strategy" class="service-panel-link">Explore tax strategy →</a>
        <div class="service-panel-features">
          <div class="service-panel-feat">Section 179 / OBBBA deduction modeling by entity type</div>
          <div class="service-panel-feat">PACE financing, equipment leasing, and shared savings options</div>
          <div class="service-panel-feat">Year 1 combined cash flow analysis (tax + water savings)</div>
          <div class="service-panel-feat">Investment committee–ready financial documentation</div>
        </div>
      </div>
      <div class="service-panel" id="svc-tech">
        <div class="service-panel-tag">Technology Implementation</div>
        <h3 class="service-panel-title">High-efficiency equipment installed, commissioned, <em>and verified.</em></h3>
        <p class="service-panel-body">WST coordinates directly with licensed mechanical and plumbing contractors for equipment installation — high-efficiency fixtures, flow management devices, cooling tower upgrades, and IoT sensor networks. Every installation is followed by a verification audit to document actual consumption reductions.</p>
        <a href="/services/smart-monitoring" class="service-panel-link">Explore smart monitoring →</a>
        <div class="service-panel-features">
          <div class="service-panel-feat">High-efficiency fixture and flow management installation</div>
          <div class="service-panel-feat">IoT sensor network deployment and commissioning</div>
          <div class="service-panel-feat">Cooling tower optimization and chemical program review</div>
          <div class="service-panel-feat">Post-installation verification audit with documented savings</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── ADVISORY MANDATE ─── -->
<div class="mandate-strip">
  <div class="mandate-label">Our mandate</div>
  <div class="mandate-items">
    <div class="mandate-item">Reduce infrastructure cost exposure<span>Across commercial real estate portfolios</span></div>
    <div class="mandate-item">Convert water data into verified NOI<span>Every saving documented and reported</span></div>
    <div class="mandate-item">Deliver ESG water compliance<span>GRESB WT1, MR3 and RA4 satisfied</span></div>
    <div class="mandate-item">Institutional advisor, not a vendor<span>Outcome-based. No capital outlay required.</span></div>
  </div>
</div>

<!-- ─── PROOF / CASE STUDY ─── -->
<section class="proof-section">
  <div class="proof-inner">
    <div class="proof-left">
      <div class="proof-left-tag">Verified Case Study &mdash; REITs</div>
      <div class="proof-quote">
        &ldquo;The outcome was not<br><em>estimated.</em> It was measured,<br>verified, and reported.&rdquo;
      </div>
      <div class="proof-attribution">
        The Westin Fort Lauderdale Beach Resort<br>
        REITs Company<br>
        31 assets &middot; GRESB submitted
      </div>
    </div>
    <div class="proof-right">
      <div class="proof-metric">
        <div class="proof-metric-val">25.3%</div>
        <div class="proof-metric-lbl">Water reduction verified</div>
      </div>
      <div class="proof-metric">
        <div class="proof-metric-val">$2.3M</div>
        <div class="proof-metric-lbl">Documented savings</div>
      </div>
      <div class="proof-metric">
        <div class="proof-metric-val">31</div>
        <div class="proof-metric-lbl">Assets in portfolio</div>
      </div>
      <div class="proof-metric">
        <div class="proof-metric-val">$69K</div>
        <div class="proof-metric-lbl">Equipment investment</div>
      </div>
      <div class="proof-metric-client">The Westin Fort Lauderdale Beach Resort &middot; REITs Hospitality</div>
      <div class="proof-who">
        <div class="proof-who-item">
          <div class="proof-who-title">Asset Managers</div>
          <div class="proof-who-body">Improve NOI and portfolio water performance. GRESB-verified data for investment committees and LPs.</div>
        </div>
        <div class="proof-who-item">
          <div class="proof-who-title">Property Managers</div>
          <div class="proof-who-body">Detect costly leaks early &mdash; before they appear on the next utility bill or escalate to a capital event.</div>
        </div>
        <div class="proof-who-item">
          <div class="proof-who-title">Directors of Engineering</div>
          <div class="proof-who-body">Asset-level dashboards, real-time alerts, and verified performance documentation.</div>
        </div>
        <div class="proof-who-item">
          <div class="proof-who-title">Sustainability Teams</div>
          <div class="proof-who-body">Verified water data that satisfies GRESB and institutional ESG disclosure standards.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── CLIENT LOGOS ─── -->
<section class="logos-section">
  <div class="logos-label">Trusted by leading institutional owners and operators</div>
  <div class="logos-grid">
    <div class="logo-cell" data-client="diamondrock" title="DiamondRock Hospitality">
      <div class="logo-img-wrap">
          <img src="{{ asset('assets/img/clients/diamondrock.jpg') }}" alt="DiamondRock Hospitality" loading="lazy">
      </div>
      <div class="logo-text">
        <span class="logo-name">DiamondRock Hospitality</span>
        <span class="logo-sector">Hospitality REIT</span>
      </div>
    </div>
    <div class="logo-cell" data-client="westin" title="Westin Hotels & Resorts">
      <div class="logo-img-wrap">
          <img src="{{ asset('assets/img/clients/westin.png') }}" alt="DiamondRock Hospitality" loading="lazy">
      </div>
      <div class="logo-text">
        <span class="logo-name">Westin Hotels & Resorts</span>
        <span class="logo-sector">Marriott Portfolio</span>
      </div>
    </div>
    <div class="logo-cell" data-client="kimpton" title="Kimpton Hotels">
      <div class="logo-img-wrap">
          <img src="{{ asset('assets/img/clients/kimpton.png') }}" alt="DiamondRock Hospitality" loading="lazy">
      </div>
      <div class="logo-text">
        <span class="logo-name">Kimpton Hotels</span>
        <span class="logo-sector">IHG Portfolio</span>
      </div>
    </div>
    <div class="logo-cell" data-client="even" title="Even Hotels">
      <div class="logo-img-wrap">
          <img src="{{ asset('assets/img/clients/even-hotels.jpg') }}" alt="DiamondRock Hospitality" loading="lazy">
      </div>
      <div class="logo-text">
        <span class="logo-name">Even Hotels</span>
        <span class="logo-sector">IHG Portfolio</span>
      </div>
    </div>
    <div class="logo-cell" data-client="slgreen" title="SL Green Realty Corp">
      <div class="logo-img-wrap">
          <img src="{{ asset('assets/img/clients/slgreen.png') }}" alt="DiamondRock Hospitality" loading="lazy">
      </div>
      <div class="logo-text">
        <span class="logo-name">SL Green Realty Corp</span>
        <span class="logo-sector">Office REIT</span>
      </div>
    </div>
    <div class="logo-cell" data-client="kroger" title="Kroger">
      <div class="logo-img-wrap">
          <img src="{{ asset('assets/img/clients/kroger.png') }}" alt="DiamondRock Hospitality" loading="lazy">
      </div>
      <div class="logo-text">
        <span class="logo-name">Kroger</span>
        <span class="logo-sector">Retail</span>
      </div>
    </div>
    <div class="logo-cell" data-client="sandals" title="Sandals Resorts">
      <div class="logo-img-wrap">
          <img src="{{ asset('assets/img/clients/sandals.png') }}" alt="DiamondRock Hospitality" loading="lazy">
      </div>
      <div class="logo-text">
        <span class="logo-name">Sandals Resorts</span>
        <span class="logo-sector">Hospitality</span>
      </div>
    </div>
    <div class="logo-cell" data-client="hilton" title="Hilton">
      <div class="logo-img-wrap">
          <img src="{{ asset('assets/img/clients/hilton.png') }}" alt="DiamondRock Hospitality" loading="lazy">
      </div>
      <div class="logo-text">
        <span class="logo-name">Hilton</span>
        <span class="logo-sector">Hospitality</span>
      </div>
    </div>
    <div class="logo-cell" data-client="concours" title="The Concours Club">
      <div class="logo-img-wrap">
          <img src="{{ asset('assets/img/clients/concours.png') }}" alt="DiamondRock Hospitality" loading="lazy">
      </div>
      <div class="logo-text">
        <span class="logo-name">The Concours Club</span>
        <span class="logo-sector">Golf & Recreation</span>
      </div>
    </div>
    <div class="logo-cell" data-client="hillel" title="Hillel Community School">
      <div class="logo-img-wrap">
          <img src="{{ asset('assets/img/clients/hill.jpeg') }}" alt="DiamondRock Hospitality" loading="lazy">
      </div>
      <div class="logo-text">
        <span class="logo-name">Hillel Community School</span>
        <span class="logo-sector">Education</span>
      </div>
    </div>
    <div class="logo-cell" data-client="panna" title="Panna Manufacturing">
      <div class="logo-img-wrap">
          <img src="{{ asset('assets/img/clients/panna.png') }}" alt="DiamondRock Hospitality" loading="lazy">
      </div>
      <div class="logo-text">
        <span class="logo-name">Panna Manufacturing</span>
        <span class="logo-sector">Industrial</span>
      </div>
    </div>
    <div class="logo-cell" data-client="lyc" title="Lauderdale Yacht Club">
      <div class="logo-img-wrap">
          <img src="{{ asset('assets/img/clients/lyc.webp') }}" alt="DiamondRock Hospitality" loading="lazy">
      </div>
      <div class="logo-text">
        <span class="logo-name">Lauderdale Yacht Club</span>
        <span class="logo-sector">Marina & Club</span>
      </div>
    </div>
  </div>
</section>

<!-- ─── CONTACT ─── -->
<section class="contact-section" style="padding:0;">
  <div class="cc">
    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Start Here</div>
      <h2 class="contact-h">Protect Your<br>Asset Performance</h2>
      <p class="contact-sub">Request a confidential water assessment to identify cost exposure, ESG data gaps, and the risk mitigation and financial impact of a structured water programme across your portfolio.</p>
      <div class="cc-btns">
        <button class="cc-btn-primary" id="cc-speak-btn">Speak with an Advisor</button>
        <button class="cc-btn-ghost" id="cc-assess-btn">Schedule Assessment</button>
      </div>
    </div>
    <div class="cc-grid">
      <div class="cc-card">
        <div class="cc-card-lbl">Risk Mitigation</div>
        <div class="cc-card-title">Identify exposure before it compounds</div>
        <div class="cc-card-body">Billing errors, undetected leaks, and ESG data gaps cost institutional portfolios an average of $250K per asset annually.</div>
      </div>
      <div class="cc-card">
        <div class="cc-card-lbl">Financial Impact</div>
        <div class="cc-card-title">Verified NOI improvement</div>
        <div class="cc-card-body">Every WST engagement produces verified savings formatted for investment committee reporting and LP disclosure.</div>
      </div>
      <div class="cc-card">
        <div class="cc-card-lbl">ESG Performance</div>
        <div class="cc-card-title">97% data coverage. WT1 satisfied.</div>
        <div class="cc-card-body">Automated bill acquisition through Ara AI delivers 100% ESG water data coverage within 30 days of deployment.</div>
      </div>
      <div class="cc-card">
        <div class="cc-card-lbl">Our Commitment</div>
        <div class="cc-card-title">No obligation. 90 minutes.</div>
        <div class="cc-card-body">Every advisor is a practitioner. Every submission is reviewed personally. No automated sequences.</div>
      </div>
    </div>
  </div>
</section>
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