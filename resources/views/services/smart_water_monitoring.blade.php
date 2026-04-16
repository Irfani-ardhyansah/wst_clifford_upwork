@extends('layouts.app')
@section('title', 'Smart Water Monitoring — Water Solutions Technology')

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Syne:wght@400;500;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/smart_water_monitoring.css') }}">
@endpush

@section('content')


<!-- HERO -->
<section class="hero-swm">
  <div class="hero-left">
    <div class="hero-eyebrow">Portfolio Advisory · Water Infrastructure</div>
    <h1 class="hero-headline">
      Water visibility<br>
      at the <em>portfolio</em><br>
      level.
    </h1>
    <p class="hero-tagline">
      We work with real estate portfolios to reduce infrastructure cost exposure—specifically water—and convert those improvements into measurable NOI and asset value.
    </p>
    <div class="hero-actions">
      <a href="#swm-form" class="btn-primary" onclick="window.openConsult && window.openConsult('assess')">Request Portfolio Assessment</a>
      <a href="#how" class="btn-ghost">How It Works</a>
    </div>
  </div>

  <div class="hero-right">
    <div class="hero-stat-grid">
      <div class="hero-stat">
        <div class="hero-stat-value">25.3%</div>
        <div class="hero-stat-label">Water reduction verified</div>
      </div>
      <div class="hero-stat">
        <div class="hero-stat-value">$2.3M</div>
        <div class="hero-stat-label">Savings documented</div>
      </div>
      <div class="hero-stat">
        <div class="hero-stat-value">31</div>
        <div class="hero-stat-label">Assets monitored</div>
      </div>
      <div class="hero-stat">
        <div class="hero-stat-value">500+</div>
        <div class="hero-stat-label">Properties served</div>
      </div>
    </div>
    <div class="hero-proof">
      <div class="hero-proof-label">DiamondRock Hospitality · Westin Fort Lauderdale</div>
      <div class="hero-proof-text">
        "Verified savings across 31 assets. Reported at the GRESB level."
      </div>
    </div>
  </div>
</section>

<!-- PROBLEM -->
<section class="problem-section">
  <div class="section-header">
    <div class="section-number">01 — The Problem</div>
    <h2 class="section-title">Most portfolios are flying <em>blind</em> on water.</h2>
    <p class="section-description">
      Without asset-level visibility, water is managed as an operating expense — not as a capital markets input. That's a structural disadvantage.
    </p>
  </div>

  <div class="problem-grid">
    <div class="problem-card">
      <div class="problem-card-number">— 01</div>
      <h3 class="problem-card-title">No line of sight to consumption</h3>
      <p class="problem-card-body">
        Portfolio managers receive aggregate utility bills — not actionable data. Anomalies, leaks, and inefficiencies compound for months before anyone notices. By then, the cost is already in the books.
      </p>
    </div>
    <div class="problem-card">
      <div class="problem-card-number">— 02</div>
      <h3 class="problem-card-title">GRESB water data is incomplete or estimated</h3>
      <p class="problem-card-body">
        Missing or low-coverage water data directly suppresses GRESB scores. With 150+ institutional investors referencing GRESB benchmarks, a weak water indicator affects fund positioning and capital access — not just compliance.
      </p>
    </div>
    <div class="problem-card">
      <div class="problem-card-number">— 03</div>
      <h3 class="problem-card-title">Savings are invisible without verification</h3>
      <p class="problem-card-body">
        Efficiency upgrades without verified measurement cannot be reported to investment committees or reflected in NOI projections. Unverified claims carry no weight in underwriting or ESG disclosure.
      </p>
    </div>
  </div>
</section>

<!-- PORTFOLIO VISIBILITY -->
<section class="visibility-section" id="visibility">
  <div class="section-header">
    <div class="section-number">02 — Portfolio Visibility</div>
    <h2 class="section-title">What <em>portfolio-level</em> water visibility actually means.</h2>
    <p class="section-description">
      Visibility isn't sensors. It's the intelligence layer that turns consumption data into investment decisions.
    </p>
  </div>

  <div class="visibility-grid">
    <div class="visibility-left">
      <p class="pull-quote">
        "Water data should tell you which assets are performing, which are at risk, and what the NOI impact is — in real time."
      </p>
      <p class="pull-quote-source">— WST Advisory Framework</p>
    </div>

    <div class="visibility-right">
      <div class="visibility-item">
        <div class="visibility-item-tag">Asset Intelligence</div>
        <h3 class="visibility-item-title">Consumption benchmarked by asset class</h3>
        <p class="visibility-item-body">Every asset measured against its own peer group. Hospitality vs. office vs. industrial — each with its own intensity baseline and anomaly threshold.</p>
      </div>
      <div class="visibility-item">
        <div class="visibility-item-tag">Operational Risk</div>
        <h3 class="visibility-item-title">Leak detection with financial quantification</h3>
        <p class="visibility-item-body">Real-time monitoring flags abnormal consumption. Every alert is translated into an estimated cost exposure before it becomes a capital event.</p>
      </div>
      <div class="visibility-item">
        <div class="visibility-item-tag">Capital Markets</div>
        <h3 class="visibility-item-title">GRESB-formatted data coverage, automatically</h3>
        <p class="visibility-item-body">The Ara AI platform automates utility bill collection portfolio-wide, ensuring data coverage that satisfies WT1 indicator requirements — the highest-weight water component in GRESB scoring.</p>
      </div>
      <div class="visibility-item">
        <div class="visibility-item-tag">NOI Translation</div>
        <h3 class="visibility-item-title">Savings presented in investment committee language</h3>
        <p class="visibility-item-body">Every efficiency improvement is converted to annualized savings, payback period, and NOI impact — with verified documentation suitable for lender, investor, and ESG disclosure.</p>
      </div>
    </div>
  </div>
</section>

<!-- ════════════════════════════════════════════
     SECTION A — ASSET MANAGER
     Audience: Portfolio / Fund Manager
     Need: NOI impact, capital markets proof,
           investment committee language
════════════════════════════════════════════ -->
<section class="aud-section aud-am">
  <div class="aud-inner">

    <div class="aud-header">
      <div class="aud-role-tag">For Asset Managers &amp; Portfolio Directors</div>
      <h2 class="aud-heading">From Water Cost<br>to <em>Portfolio Intelligence</em></h2>
      <p class="aud-sub">Water is the last unmanaged utility in most institutional portfolios. WST converts asset-level consumption data into the financial metrics your investment committee, lenders, and LPs expect — NOI impact, payback period, and verified savings documentation.</p>
    </div>

    <div class="aud-content-grid">

      <div class="aud-metrics-panel">
        <div class="aud-metric-row">
          <div class="aud-metric">
            <div class="aud-metric-num">15–30%</div>
            <div class="aud-metric-lbl">Water cost reduction<br>per asset, post-audit</div>
          </div>
          <div class="aud-metric-divider"></div>
          <div class="aud-metric">
            <div class="aud-metric-num">$2.3M</div>
            <div class="aud-metric-lbl">Verified savings<br>across 31 assets</div>
          </div>
          <div class="aud-metric-divider"></div>
          <div class="aud-metric">
            <div class="aud-metric-num">&lt;12mo</div>
            <div class="aud-metric-lbl">Typical payback<br>on monitoring investment</div>
          </div>
        </div>
        <div class="aud-quote-block">
          <p>"Verified savings across 31 assets. Reported at the GRESB level. WST gave us the data to have a different conversation with our investors."</p>
          <cite>Portfolio Manager · DiamondRock Hospitality</cite>
        </div>
      </div>

      <div class="aud-capability-list">
        <div class="aud-cap-item">
          <div class="aud-cap-num">01</div>
          <div>
            <div class="aud-cap-title">Portfolio-level NOI dashboard</div>
            <div class="aud-cap-body">Every asset's water consumption benchmarked against its class peers. Underperforming assets flagged by cost exposure — not just consumption volume — so you prioritise capital allocation correctly.</div>
          </div>
        </div>
        <div class="aud-cap-item">
          <div class="aud-cap-num">02</div>
          <div>
            <div class="aud-cap-title">Investment committee–ready documentation</div>
            <div class="aud-cap-body">Every efficiency improvement expressed as annualised savings, IRR contribution, and payback period. Formatted for IC presentations, lender submissions, and ESG disclosure — not operational reports.</div>
          </div>
        </div>
        <div class="aud-cap-item">
          <div class="aud-cap-num">03</div>
          <div>
            <div class="aud-cap-title">Acquisition due diligence &amp; baseline</div>
            <div class="aud-cap-body">Establish verified water cost baselines on acquisition targets. Uncover billing errors and infrastructure risk before closing. Water liabilities that compound for years are now identifiable within 48 hours of bill access.</div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════════
     SECTION B — SUSTAINABILITY MANAGER
     Audience: Head of ESG / Sustainability Director
     Need: GRESB coverage, verified data,
           WT1/MR3/RA4 indicators, CDP compliance
════════════════════════════════════════════ -->
<section class="aud-section aud-sm">
  <div class="aud-inner">

    <div class="aud-header">
      <div class="aud-role-tag aud-role-tag--green">For Sustainability &amp; ESG Managers</div>
      <h2 class="aud-heading">GRESB Water Coverage,<br><em>Automated</em></h2>
      <p class="aud-sub">Water data gaps are the single most common reason portfolios lose GRESB points on the water component. WST's Ara AI platform automates utility bill collection portfolio-wide, closing WT1 coverage gaps before submission — and producing verified documentation for CDP and LP disclosure.</p>
    </div>

    <div class="aud-gresb-grid">

      <div class="aud-indicator-panel">
        <div class="aud-indicator-title">GRESB Water Indicators Addressed</div>
        <div class="aud-indicator-row">
          <div class="aud-indicator-code">WT1</div>
          <div>
            <div class="aud-indicator-name">Water Data Coverage</div>
            <div class="aud-indicator-desc">The highest-weighted water indicator (4 of ~7.67 points). Ara AI automates bill acquisition to maximise coverage percentage across your portfolio — eliminating the manual collection that most teams fail to complete before the submission deadline.</div>
          </div>
          <div class="aud-indicator-weight">4 pts</div>
        </div>
        <div class="aud-indicator-row">
          <div class="aud-indicator-code">MR3</div>
          <div>
            <div class="aud-indicator-name">Monitoring &amp; Targets</div>
            <div class="aud-indicator-desc">Real-time IoT monitoring with documented asset-level targets satisfies MR3 requirements. Every alert is logged with cost impact — creating the audit trail GRESB validators expect.</div>
          </div>
          <div class="aud-indicator-weight">2 pts</div>
        </div>
        <div class="aud-indicator-row">
          <div class="aud-indicator-code">RA4</div>
          <div>
            <div class="aud-indicator-name">Risk Assessment</div>
            <div class="aud-indicator-desc">Infrastructure risk quantified at the asset level. Physical water risk — leak exposure, aging meter accuracy, cooling tower bleed rates — documented in the format GRESB's RA4 assessment requires.</div>
          </div>
          <div class="aud-indicator-weight">1 pt</div>
        </div>
      </div>

      <div class="aud-esg-proof">
        <div class="aud-esg-stat">
          <div class="aud-esg-stat-num">150+</div>
          <div class="aud-esg-stat-lbl">Institutional investors use<br>GRESB benchmarks for capital decisions</div>
        </div>
        <div class="aud-esg-divider"></div>
        <div class="aud-esg-checklist">
          <div class="aud-esg-check-item">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 7l3.5 3.5L12 3"/></svg>
            Automated WT1 data collection — no manual entry
          </div>
          <div class="aud-esg-check-item">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 7l3.5 3.5L12 3"/></svg>
            Verification-ready documentation for CDP and investor disclosure
          </div>
          <div class="aud-esg-check-item">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 7l3.5 3.5L12 3"/></svg>
            Like-for-like performance tracking across asset classes
          </div>
          <div class="aud-esg-check-item">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 7l3.5 3.5L12 3"/></svg>
            Sub-meter data supporting GRESB's enhanced scoring pathway
          </div>
          <div class="aud-esg-check-item">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 7l3.5 3.5L12 3"/></svg>
            27% average water use reduction documented post-audit
          </div>
        </div>
        <div class="aud-esg-note">
          WST is a GRESB Solution Provider Partner. Our datasets are structured to satisfy GRESB submission requirements — not adapted from them after the fact.
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ════════════════════════════════════════════
     SECTION C — ENGINEERING DIRECTOR
     Audience: Director of Engineering / Facilities
     Need: Technical credibility, no-rip-replace,
           integration with existing meters,
           real-time alerts, field-level detail
════════════════════════════════════════════ -->
<section class="aud-section aud-ed">
  <div class="aud-inner">

    <div class="aud-header">
      <div class="aud-role-tag aud-role-tag--mono">For Directors of Engineering &amp; Facilities</div>
      <h2 class="aud-heading">The Technical Layer<br><em>Your Team Can Trust</em></h2>
      <p class="aud-sub">WST doesn't replace your infrastructure — it instruments it. Our IoT monitoring layer integrates with existing main and sub-meters, cooling towers, boilers, and irrigation systems to produce real-time consumption data at the device level. No rip-and-replace. No extended installation windows.</p>
    </div>

    <div class="aud-tech-grid">

      <div class="aud-tech-specs">

        <div class="aud-tech-item">
          <div class="aud-tech-icon">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="2" y="4" width="14" height="10" rx="1.5"/><path d="M6 4V3a1 1 0 011-1h4a1 1 0 011 1v1"/><path d="M9 9v.01"/></svg>
          </div>
          <div>
            <div class="aud-tech-title">Meter Integration — No New Hardware Required</div>
            <div class="aud-tech-body">Connects to your existing main meters, pulse-output sub-meters, and BMS data feeds. Supports Modbus, BACnet, M-Bus, and direct pulse-count wiring. No proprietary hardware lock-in. If a meter already exists, we read it.</div>
          </div>
        </div>

        <div class="aud-tech-item">
          <div class="aud-tech-icon">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="9" cy="9" r="6.5"/><path d="M9 5.5v4l2.5 1.5"/></svg>
          </div>
          <div>
            <div class="aud-tech-title">Real-Time Anomaly Detection — Before the Next Bill</div>
            <div class="aud-tech-body">Baseline deviation triggers alerts in minutes — not billing cycles. Leak signatures, abnormal night-flow, cooling tower bleed rates outside tolerance, and irrigation system faults all surface before they compound into capital events. Every alert includes estimated cost impact.</div>
          </div>
        </div>

        <div class="aud-tech-item">
          <div class="aud-tech-icon">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M4 13V8l5-4 5 4v5"/><path d="M7 13v-3h4v3"/></svg>
          </div>
          <div>
            <div class="aud-tech-title">Per-Asset, Per-System Drill-Down</div>
            <div class="aud-tech-body">Flow, pressure, and temperature at individual boilers, chillers, cooling towers, and tenant zones. Visualise make-up vs. discharge at any valve. Historical playback lets your team replay last month's flow map to pinpoint abnormal cycles without waiting for a site visit.</div>
          </div>
        </div>

        <div class="aud-tech-item">
          <div class="aud-tech-icon">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M3 9h12M9 3v12"/><circle cx="9" cy="9" r="3"/></svg>
          </div>
          <div>
            <div class="aud-tech-title">Condition-Based Routing to Your Team</div>
            <div class="aud-tech-body">Critical alarms route to your engineering team's preferred channel — email, SMS, or BMS integration — with full context: asset, system, magnitude, and estimated daily cost. Threshold parameters are configured per system, per site, by your team.</div>
          </div>
        </div>

      </div>

      <div class="aud-tech-panel">
        <div class="aud-tech-panel-title">Supported Systems</div>
        <div class="aud-tech-compat">
          <div class="aud-compat-category">
            <div class="aud-compat-label">Mechanical</div>
            <div class="aud-compat-items">Cooling Towers · Boilers · Chillers · Heat Exchangers · HVAC Make-Up</div>
          </div>
          <div class="aud-compat-category">
            <div class="aud-compat-label">Fixtures &amp; Zones</div>
            <div class="aud-compat-items">Tenant Sub-Meters · Common Areas · Irrigation · Laundry · Kitchen</div>
          </div>
          <div class="aud-compat-category">
            <div class="aud-compat-label">Protocols</div>
            <div class="aud-compat-items">Modbus RTU/TCP · BACnet IP · M-Bus · Pulse Output · 4–20mA · API</div>
          </div>
          <div class="aud-compat-category">
            <div class="aud-compat-label">Reporting</div>
            <div class="aud-compat-items">GRESB Export · IC Documentation · Maintenance Logs · PDF / CSV</div>
          </div>
        </div>
        <div class="aud-tech-quote">
          <p>"WST's audit found issues our engineers missed — it paid for itself in 90 days."</p>
          <cite>Director of Engineering · Hilton South Tower</cite>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="how-section" id="how">
  <div class="section-header">
    <div class="section-number">03 — Delivery Model</div>
    <h2 class="section-title">Two systems. <em>One</em> integrated view.</h2>
    <p class="section-description">
      Ara AI handles data coverage. Real-time monitoring validates it. Together they produce the audit-grade visibility institutional portfolios require.
    </p>
  </div>

  <div class="how-steps">
    <div class="how-step">
      <div class="how-step-num">1</div>
      <div class="how-step-tag">Ara AI Platform</div>
      <h3 class="how-step-title">Automated utility bill collection</h3>
      <p class="how-step-body">Ara aggregates utility data across the portfolio automatically — eliminating manual entry, closing coverage gaps, and generating GRESB-ready datasets at scale.</p>
      <div class="how-step-detail">WT1 Coverage · Historical Data · Automated Collection</div>
    </div>
    <div class="how-step">
      <div class="how-step-num">2</div>
      <div class="how-step-tag">IoT Monitoring Layer</div>
      <h3 class="how-step-title">Real-time validation & anomaly detection</h3>
      <p class="how-step-body">Smart sensors monitor live consumption at the asset level. Deviations from baseline trigger immediate alerts with estimated cost impact — before the next billing cycle.</p>
      <div class="how-step-detail">Leak Detection · Baseline Deviation · Real-Time Alerts</div>
    </div>
    <div class="how-step">
      <div class="how-step-num">3</div>
      <div class="how-step-tag">Advisory Synthesis</div>
      <h3 class="how-step-title">Verified data → investment insight</h3>
      <p class="how-step-body">WST translates both data streams into portfolio-level reporting: GRESB submissions, NOI impact analyses, efficiency roadmaps, and investment committee documentation.</p>
      <div class="how-step-detail">GRESB Submission · NOI Analysis · IC Reporting</div>
    </div>
  </div>
</section>

<!-- CASE STUDY -->
<section class="case-section">
  <div class="case-inner">
    <div>
      <div class="case-label">Verified Case Study — DiamondRock Hospitality</div>
      <h2 class="case-headline">$2.3M in verified savings. 31 assets. Reported.</h2>
      <p class="case-body">
        DiamondRock engaged WST to establish portfolio-wide water visibility across its hospitality assets, beginning with The Westin Fort Lauderdale Beach Resort. Real-time monitoring and bill validation delivered verified consumption reductions that were documented for both internal reporting and GRESB submission.
      </p>
      <a href="#" class="case-link">Read Full Case Study</a>
    </div>
    <div>
      <div class="case-metrics">
        <div class="case-metric">
          <div class="case-metric-value">25.3%</div>
          <div class="case-metric-label">Water reduction</div>
        </div>
        <div class="case-metric">
          <div class="case-metric-value">$2.3M</div>
          <div class="case-metric-label">Verified savings</div>
        </div>
        <div class="case-metric">
          <div class="case-metric-value">31</div>
          <div class="case-metric-label">Assets in scope</div>
        </div>
        <div class="case-metric">
          <div class="case-metric-value">GRESB</div>
          <div class="case-metric-label">Reported & verified</div>
        </div>
        <div class="case-client">The Westin Fort Lauderdale Beach Resort · DiamondRock Hospitality</div>
      </div>
    </div>
  </div>
</section>

<!-- ENGAGEMENT TIERS -->
<section class="tiers-section" id="engage">
  <div class="section-header">
    <div class="section-number">04 — Engagement Model</div>
    <h2 class="section-title">Two ways to <em>engage</em> WST.</h2>
    <p class="section-description">
      Whether you need a defined-scope assessment or ongoing portfolio advisory, WST structures around your investment cycle — not a product catalog.
    </p>
  </div>

  <div class="tiers-grid">
    <!-- Project -->
    <div class="tier-card">
      <div class="tier-badge">Project-Based</div>
      <h3 class="tier-name">Portfolio Water Assessment</h3>
      <p class="tier-description">
        A scoped engagement producing audit-grade findings, GRESB-formatted data, and a prioritized efficiency roadmap. Designed for acquisition due diligence, GRESB preparation, or establishing a water baseline across a new portfolio segment.
      </p>
      <div class="tier-includes-label">Engagement Includes</div>
      <ul class="tier-includes">
        <li>On-site and bill validation water audit across defined assets</li>
        <li>Asset-level consumption data formatted for GRESB submission</li>
        <li>Water intensity benchmarking vs. peer asset class</li>
        <li>Prioritized efficiency opportunities with ROI and payback</li>
        <li>Investment committee–ready findings documentation</li>
      </ul>
      <a href="/cdn-cgi/l/email-protection#b6d7d5d5f6c1d7c2d3c4c5d9dac3c2d3d5de98d5d9db" class="tier-cta">Request Scope & Proposal</a>
    </div>

    <!-- Retained -->
    <div class="tier-card featured">
      <div class="tier-badge">Retained Advisory</div>
      <h3 class="tier-name">Ongoing Portfolio Visibility</h3>
      <p class="tier-description">
        A continuous advisory relationship providing real-time monitoring, automated GRESB data collection via Ara AI, and ongoing NOI impact reporting across the portfolio. WST functions as an embedded water intelligence layer.
      </p>
      <div class="tier-includes-label">Engagement Includes</div>
      <ul class="tier-includes">
        <li>Ara AI automated utility bill collection — portfolio-wide</li>
        <li>Real-time IoT monitoring with anomaly alerts and cost translation</li>
        <li>Annual GRESB water data preparation and submission support</li>
        <li>Quarterly portfolio water performance reporting</li>
        <li>Efficiency project implementation and verified savings documentation</li>
        <li>Investment committee briefings and ESG disclosure support</li>
      </ul>
      <a href="/cdn-cgi/l/email-protection#0b6a68684b7c6a7f6e797864677e7f6e686325686466" class="tier-cta">Discuss Retained Engagement</a>
    </div>
  </div>
</section>

<!-- CTA -->
<div class="cta-banner">
  <div>
    <h2 class="cta-headline">
      Start with a portfolio<br>
      <em>visibility assessment.</em>
    </h2>
    <p class="cta-sub">
      A 90-minute working session with WST to map your current water data coverage, identify GRESB gaps, and outline the NOI impact of closing them. No obligation.
    </p>
  </div>
  <div class="cta-right">
    <a href="#swm-form" class="btn-primary" onclick="window.openConsult && window.openConsult('assess')">Schedule Assessment</a>
    <a href="#" class="btn-ghost">Download Capability Brief</a>
  </div>
</div>


@endsection

@push('scripts')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

  // ─── Scroll animations for rules ───
  const rules = document.querySelectorAll('.swm-rule');
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.2 }
  );
  rules.forEach(r => observer.observe(r));

  // ─── Map ───
  if (document.getElementById('usWaterMap')) {
    const map = L.map('usWaterMap', {
      center: [37.8, -96.0],
      zoom: 4,
      zoomControl: false,
      attributionControl: false
    });

    L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
      maxZoom: 19
    }).addTo(map);

    function randInt(min, max) { return Math.floor(Math.random() * (max - min + 1)) + min; }

    for (let i = 0; i < 40; i++) {
      const lat = 25 + Math.random() * 24;
      const lng = -125 + Math.random() * 58;
      const data = {
        alerts: randInt(150, 400),
        leaks:  randInt(50, 120),
        saved:  (randInt(8, 15) / 10).toFixed(1) + 'M',
        pay:    randInt(6, 12) + ' mo',
        last30: randInt(20, 50)
      };
      const tooltipHtml = `
        <strong>Site #${i + 1}</strong><br>
        Alerts: ${data.alerts}<br>
        Leaks Caught: ${data.leaks}<br>
        Saved: ${data.saved} gal/yr<br>
        Avg Payback: ${data.pay}<br>
        Alerts (30d): ${data.last30}
      `;
      const icon = L.divIcon({
        className: 'pulse-marker',
        iconSize: [6, 6],
        iconAnchor: [3, 3]
      });
      const marker = L.marker([lat, lng], { icon }).addTo(map);
      marker.bindTooltip(tooltipHtml, {
        direction: 'top',
        offset: [0, -8],
        className: 'water-tooltip'
      });
      marker.on('mouseover', () => marker.openTooltip());
      marker.on('mouseout',  () => marker.closeTooltip());
    }

    // Named sites
    const sites = [
      { name: 'Los Angeles', coords: [34.05, -118.24], alerts: 256, saved: '1.2M', pay: '8 mo', last30: 30, leaks: 78 },
      { name: 'New York',    coords: [40.71, -74.00],  alerts: 300, saved: '1.5M', pay: '7 mo', last30: 42, leaks: 95 },
      { name: 'Miami',       coords: [25.77, -80.19],  alerts: 284, saved: '1.1M', pay: '9 mo', last30: 36, leaks: 82 }
    ];
    sites.forEach(site => {
      const marker = L.circleMarker(site.coords, {
        radius: 8,
        fillColor: '#fff',
        color: 'rgba(255,255,255,0.3)',
        weight: 6,
        fillOpacity: 1
      }).addTo(map);
      marker.bindTooltip(`
        <strong>${site.name}</strong><br>
        Alerts: ${site.alerts}<br>
        Leaks Caught: ${site.leaks}<br>
        Saved: ${site.saved} gal/yr<br>
        Avg Payback: ${site.pay}<br>
        Alerts (30d): ${site.last30}
      `, {
        direction: 'top',
        offset: [0, -10],
        className: 'water-tooltip'
      });
      marker.on('mouseover', () => marker.openTooltip());
      marker.on('mouseout',  () => marker.closeTooltip());
    });
  }

});
</script>
@endpush