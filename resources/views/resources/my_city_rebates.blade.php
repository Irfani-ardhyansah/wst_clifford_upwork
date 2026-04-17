@extends('layouts.app')

@section('title', 'Water Solutions Technology')

  @push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="{{ asset('assets/css/my_city_rebates.css') }}">
  @endpush

@section('main-class', 'bg-zinc-950')

@push('styles')
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

@section('content')

<!-- HERO -->
<div class="hero-wrap">
  <div class="hero-inner">
    <div class="hero-bc">
      <a href="/resources">Resources</a>
      <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 1l4 4-4 4"/></svg>
      <span>Water Target Tools &amp; Cost Reduction</span>
    </div>
    <div class="hero-eye">Resources &mdash; Interactive Tools</div>
    <h1 class="hero-h1">Four tools.<br><em>One decision:</em><br>how much is water costing you?</h1>
    <p class="hero-deck">Calculate your water savings opportunity, set GRESB-compliant reduction targets, model cap rate asset value impact, and estimate billing error exposure — using WST&rsquo;s verified portfolio data as the benchmark baseline.</p>
    <div class="tool-anchors">
      <a href="#tool-caprate"   class="ta-pill"><span class="ta-pill-num">1</span>Cap Rate Value Calculator</a>
      <a href="#tool-savings"   class="ta-pill"><span class="ta-pill-num">2</span>Savings Opportunity Estimator</a>
      <a href="#tool-gresb"     class="ta-pill"><span class="ta-pill-num">3</span>GRESB Score Estimator</a>
      <a href="#tool-benchmark" class="ta-pill"><span class="ta-pill-num">4</span>Water Use Benchmarking</a>
    </div>
  </div>
  <div class="hero-strip">
    <div class="hs"><div class="hs-n">$1.6M</div><div class="hs-l">Asset value per $90K annual saving at 5.5% cap</div></div>
    <div class="hs"><div class="hs-n">8–12%</div><div class="hs-l">Average billing overcharge rate — commercial properties</div></div>
    <div class="hs"><div class="hs-n">25.3%</div><div class="hs-l">Average water reduction — WST hospitality REIT programme</div></div>
    <div class="hs"><div class="hs-n">GRESB</div><div class="hs-l">All outputs formatted for GRESB WT1, MR3, RA4 documentation</div></div>
  </div>
</div>


<!-- ═══════════════════════════════════════════
     TOOL 1 — CAP RATE VALUE CALCULATOR
     ═══════════════════════════════════════════ -->
<div class="tool-section ts-odd" id="tool-caprate">
  <div class="tool-label">
    <div class="tool-num">1</div>
    <div class="tool-eye">Cap Rate Value Calculator</div>
  </div>
  <h2 class="tool-h">Translate water savings<br><em>into asset value.</em></h2>
  <p class="tool-sub">Enter your annual water cost reduction and cap rate. The calculator returns the direct asset value contribution, the IC presentation format, and the portfolio-level aggregate impact.</p>

  <div class="calc-wrap">
    <div class="calc-inputs">
      <div class="inp-group">
        <label class="inp-label">Annual water bill ($)</label>
        <input class="inp-field" type="number" id="cr-bill" value="480000" min="10000" max="5000000">
        <p class="inp-hint">Total annual water + sewer spend across the asset</p>
      </div>
      <div class="inp-group">
        <label class="inp-label">Expected savings rate (%)</label>
        <div class="range-wrap">
          <input type="range" id="cr-rate" min="5" max="45" value="20" oninput="document.getElementById('cr-rate-val').textContent=this.value+'%';calcCapRate()">
          <div class="range-labels"><span>5%</span><span id="cr-rate-val">20%</span><span>45%</span></div>
        </div>
        <p class="inp-hint">WST portfolio average: 25.3% for hospitality, 18–22% for office</p>
      </div>
      <div class="inp-row">
        <div class="inp-group">
          <label class="inp-label">Cap rate (%)</label>
          <select class="inp-field" id="cr-cap" onchange="calcCapRate()">
            <option value="4.5">4.5%</option>
            <option value="5.0">5.0%</option>
            <option value="5.5" selected>5.5%</option>
            <option value="6.0">6.0%</option>
            <option value="6.5">6.5%</option>
            <option value="7.0">7.0%</option>
          </select>
        </div>
        <div class="inp-group">
          <label class="inp-label">Number of assets</label>
          <input class="inp-field" type="number" id="cr-assets" value="1" min="1" max="500" oninput="calcCapRate()">
        </div>
      </div>
      <button class="calc-btn" onclick="calcCapRate()">Calculate Asset Value Impact</button>
    </div>
    <div class="calc-output">
      <div class="calc-out-label">Annual NOI Improvement</div>
      <div class="calc-out-num" id="cr-noi">$96,000</div>
      <div class="calc-out-unit">per asset per year — verified, not projected</div>

      <div class="calc-out-divider"></div>

      <div class="calc-out-row">
        <span class="calc-out-key">Asset value impact (1 asset)</span>
        <span class="calc-out-val green" id="cr-value">$1,745,455</span>
      </div>
      <div class="calc-out-row">
        <span class="calc-out-key">Portfolio value impact</span>
        <span class="calc-out-val green" id="cr-portfolio">$1,745,455</span>
      </div>
      <div class="calc-out-row">
        <span class="calc-out-key">Programme investment (WST)</span>
        <span class="calc-out-val green">Zero upfront</span>
      </div>
      <div class="calc-out-row">
        <span class="calc-out-key">First cash return</span>
        <span class="calc-out-val">&lt;90 days</span>
      </div>
      <div class="calc-out-row">
        <span class="calc-out-key">Estimated payback</span>
        <span class="calc-out-val" id="cr-payback">8–14 months</span>
      </div>

      <div class="calc-note">
        <strong>IC Format:</strong> Annual NOI contribution: <span id="cr-ic-noi">$96,000</span> · Asset value at <span id="cr-ic-cap">5.5%</span> cap: <span id="cr-ic-val">$1.75M</span> · Investment: Zero · Payback: &lt;12 months · Documentation: verified, GRESB-reportable, LP-disclosable.
      </div>
    </div>
  </div>
  <div class="tool-gate-band">
    <div class="tgb-text">
      <p>Download the IC Presentation Template</p>
      <p>Pre-formatted investment committee narrative with cap rate value table, payback analysis, and GRESB documentation framework. Ready to present.</p>
    </div>
    <button class="tgb-btn" onclick="openGate('IC Presentation Template — Water as a Cap Rate Lever','/resources/tools/ic-presentation-template','water-target-tools','water-target-tools')">
      <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M6.5 2v7M3 6.5l3.5 3.5 3.5-3.5"/><path d="M2 11h9"/></svg>
      Download Template
    </button>
  </div>
</div>


<!-- ═══════════════════════════════════════════
     TOOL 2 — SAVINGS OPPORTUNITY ESTIMATOR
     ═══════════════════════════════════════════ -->
<div class="tool-section ts-even" id="tool-savings">
  <div class="tool-label">
    <div class="tool-num">2</div>
    <div class="tool-eye">Savings Opportunity Estimator</div>
  </div>
  <h2 class="tool-h">Three categories of exposure.<br><em>One estimate in 30 seconds.</em></h2>
  <p class="tool-sub">Input your property type, annual water bill, and what systems are present. The estimator models the three cost categories WST consistently finds — billing errors, cooling tower waste, and sewer overcharges — using WST&rsquo;s verified portfolio averages as the baseline.</p>

  <div class="calc-wrap">
    <div class="calc-inputs">
      <div class="inp-group">
        <label class="inp-label">Property type</label>
        <select class="inp-field" id="so-type" onchange="calcSavings()">
          <option value="hotel">Full-Service Hotel</option>
          <option value="office" selected>Class A Office</option>
          <option value="mixed">Mixed-Use</option>
          <option value="reit">Hospitality REIT Portfolio</option>
          <option value="residential">Multifamily Residential</option>
          <option value="retail">Retail / Shopping Centre</option>
        </select>
      </div>
      <div class="inp-group">
        <label class="inp-label">Annual water bill ($)</label>
        <input class="inp-field" type="number" id="so-bill" value="350000" min="5000" max="10000000" oninput="calcSavings()">
      </div>
      <div class="inp-group">
        <label class="inp-label">Cooling tower present?</label>
        <select class="inp-field" id="so-ct" onchange="calcSavings()">
          <option value="yes" selected>Yes — central cooling tower</option>
          <option value="no">No cooling tower</option>
          <option value="multi">Multiple cooling towers</option>
        </select>
      </div>
      <div class="inp-group">
        <label class="inp-label">Last water audit</label>
        <select class="inp-field" id="so-audit" onchange="calcSavings()">
          <option value="never" selected>Never audited</option>
          <option value="3plus">3+ years ago</option>
          <option value="1to3">1–3 years ago</option>
          <option value="recent">Within 12 months</option>
        </select>
      </div>
      <div class="inp-group">
        <label class="inp-label">IoT sub-metering installed?</label>
        <select class="inp-field" id="so-iot" onchange="calcSavings()">
          <option value="no" selected>No sub-metering</option>
          <option value="partial">Partial sub-metering</option>
          <option value="full">Full IoT monitoring</option>
        </select>
      </div>
      <button class="calc-btn" onclick="calcSavings()">Estimate Savings Opportunity</button>
    </div>
    <div class="calc-output">
      <div class="calc-out-label">Total Estimated Annual Opportunity</div>
      <div class="calc-out-num" id="so-total">$52,500</div>
      <div class="calc-out-unit">combined low estimate — see breakdown below</div>

      <div class="calc-out-divider"></div>

      <div class="calc-out-row">
        <span class="calc-out-key">Billing error recovery</span>
        <span class="calc-out-val green" id="so-billing">$28,000–$42,000</span>
      </div>
      <div class="calc-out-row">
        <span class="calc-out-key">Cooling tower optimisation</span>
        <span class="calc-out-val green" id="so-ct-saving">$15,000–$32,000</span>
      </div>
      <div class="calc-out-row">
        <span class="calc-out-key">Sewer exemption (annual forward)</span>
        <span class="calc-out-val green" id="so-sewer">$18,000–$45,000</span>
      </div>
      <div class="calc-out-row">
        <span class="calc-out-key">Retroactive recovery (est.)</span>
        <span class="calc-out-val amber" id="so-retro">$56,000–$126,000</span>
      </div>
      <div class="calc-out-row">
        <span class="calc-out-key">Confidence level</span>
        <span class="calc-out-val" id="so-confidence">Preliminary</span>
      </div>

      <div class="calc-note">
        <strong>Note:</strong> These are preliminary estimates using WST portfolio averages for this property type. Actual figures depend on local utility rates, current billing classifications, and physical inspection findings. A WST feasibility assessment from utility bills alone typically delivers findings within 5 business days at zero cost.
      </div>
    </div>
  </div>
  <div class="tool-gate-band">
    <div class="tgb-text">
      <p>Request a Scoped Savings Estimate</p>
      <p>Send WST 12 months of utility bills for one property. Findings in 5 business days. Zero cost, zero commitment.</p>
    </div>
    <button class="tgb-btn" onclick="openGate('Water Savings Feasibility Assessment','/contact','feasibility','feasibility')">
      <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M2 3h9v7H2z"/><path d="M2 3.5l4.5 3.5 4.5-3.5"/></svg>
      Request Feasibility Assessment
    </button>
  </div>
</div>


<!-- ═══════════════════════════════════════════
     TOOL 3 — GRESB SCORE ESTIMATOR
     ═══════════════════════════════════════════ -->
<div class="tool-section ts-odd" id="tool-gresb">
  <div class="tool-label">
    <div class="tool-num">3</div>
    <div class="tool-eye">GRESB Water Score Estimator</div>
  </div>
  <h2 class="tool-h">Where is your water score?<br><em>Where could it be?</em></h2>
  <p class="tool-sub">Toggle which GRESB water indicators your portfolio currently satisfies and see your current score. Then toggle the WST programme deliverables to see the achievable score improvement within one reporting cycle.</p>

  <div class="gresb-wrap">
    <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:1px;background:rgba(45,92,66,.1);">

      <!-- Column 1: current state -->
      <div style="background:var(--black);padding:28px;">
        <div style="font-size:9px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:rgba(255,255,255,.3);margin-bottom:18px;">Your Current Position</div>
        <p style="font-size:12px;color:rgba(255,255,255,.3);line-height:1.65;margin-bottom:18px;">Toggle the indicators your portfolio currently satisfies:</p>
        <div class="ind-list" id="gresb-current">

          <div class="ind-item">
            <button class="ind-toggle js-gresb" data-col="cur" data-pts="4" onclick="toggleGRESB(this)" aria-pressed="false"></button>
            <div class="ind-info">
              <div class="ind-name">WT1 — Full data coverage (&gt;80% GFA)</div>
              <div class="ind-pts">Up to 4.0 pts &nbsp;&middot;&nbsp; Verified utility bill data portfolio-wide</div>
            </div>
          </div>
          <div class="ind-item">
            <button class="ind-toggle js-gresb" data-col="cur" data-pts="2" onclick="toggleGRESB(this)" aria-pressed="false"></button>
            <div class="ind-info">
              <div class="ind-name">MR3 — Monitoring systems &amp; targets</div>
              <div class="ind-pts">~2.0 pts &nbsp;&middot;&nbsp; Documented monitoring + consumption targets</div>
            </div>
          </div>
          <div class="ind-item">
            <button class="ind-toggle js-gresb" data-col="cur" data-pts="1" onclick="toggleGRESB(this)" aria-pressed="false"></button>
            <div class="ind-info">
              <div class="ind-name">RA4 — Water risk, financially quantified</div>
              <div class="ind-pts">~1.0 pt &nbsp;&middot;&nbsp; Cost-per-year exposure at asset level</div>
            </div>
          </div>
          <div class="ind-item">
            <button class="ind-toggle js-gresb" data-col="cur" data-pts="0.67" onclick="toggleGRESB(this)" aria-pressed="false"></button>
            <div class="ind-info">
              <div class="ind-name">MR2 — Asset-level metering</div>
              <div class="ind-pts">~0.67 pts &nbsp;&middot;&nbsp; Sub-meters per water system</div>
            </div>
          </div>
        </div>

        <div style="margin-top:20px;padding:16px;background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.06);">
          <div style="font-size:9px;color:rgba(255,255,255,.28);letter-spacing:.10em;text-transform:uppercase;margin-bottom:6px;">Current Water Indicator</div>
          <div class="score-val" id="cur-score">0%</div>
          <div class="score-bar-track"><div class="score-bar-fill red" id="cur-bar" style="width:0%"></div></div>
          <div class="score-label" id="cur-label">Below 68% sector average</div>
        </div>
      </div>

      <!-- Column 2: WST programme -->
      <div style="background:#0b0f0b;padding:28px;">
        <div style="font-size:9px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--green-lt);margin-bottom:18px;">WST Programme Delivers</div>
        <p style="font-size:12px;color:rgba(255,255,255,.3);line-height:1.65;margin-bottom:18px;">Toggle the WST deliverables you plan to deploy:</p>
        <div class="ind-list" id="gresb-wst">

          <div class="ind-item">
            <button class="ind-toggle js-gresb on" data-col="wst" data-pts="4" onclick="toggleGRESB(this)" aria-pressed="true"></button>
            <div class="ind-info">
              <div class="ind-name" style="color:#fff;">Ara AI — automated WT1 coverage</div>
              <div class="ind-pts" style="color:rgba(255,255,255,.4);">Closes all data gaps portfolio-wide within one billing cycle</div>
            </div>
          </div>
          <div class="ind-item">
            <button class="ind-toggle js-gresb on" data-col="wst" data-pts="2" onclick="toggleGRESB(this)" aria-pressed="true"></button>
            <div class="ind-info">
              <div class="ind-name" style="color:#fff;">IoT monitoring — MR3 targets &amp; evidence</div>
              <div class="ind-pts" style="color:rgba(255,255,255,.4);">Continuous baseline + formalised targets satisfy MR3</div>
            </div>
          </div>
          <div class="ind-item">
            <button class="ind-toggle js-gresb on" data-col="wst" data-pts="1" onclick="toggleGRESB(this)" aria-pressed="true"></button>
            <div class="ind-info">
              <div class="ind-name" style="color:#fff;">Cost-tagged alerts — RA4 risk records</div>
              <div class="ind-pts" style="color:rgba(255,255,255,.4);">Every anomaly financially quantified at asset level</div>
            </div>
          </div>
          <div class="ind-item">
            <button class="ind-toggle js-gresb on" data-col="wst" data-pts="0.67" onclick="toggleGRESB(this)" aria-pressed="true"></button>
            <div class="ind-info">
              <div class="ind-name" style="color:#fff;">Make-up sub-meters — MR2 evidence</div>
              <div class="ind-pts" style="color:rgba(255,255,255,.4);">Cooling tower + pool sub-metering closes MR2 gap</div>
            </div>
          </div>
        </div>

        <div style="margin-top:20px;padding:16px;background:rgba(45,92,66,.08);border:1px solid rgba(45,92,66,.2);">
          <div style="font-size:9px;color:rgba(255,255,255,.28);letter-spacing:.10em;text-transform:uppercase;margin-bottom:6px;">Achievable Water Indicator</div>
          <div class="score-val" id="wst-score">100%</div>
          <div class="score-bar-track"><div class="score-bar-fill" id="wst-bar" style="width:100%"></div></div>
          <div class="score-label" style="color:var(--green-lt);" id="wst-label">Full indicator points — within one cycle</div>
        </div>
      </div>

      <!-- Column 3: benchmark context -->
      <div style="background:var(--black);padding:28px;">
        <div style="font-size:9px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:rgba(255,255,255,.3);margin-bottom:18px;">GRESB 2025 Benchmark Context</div>
        <div style="display:flex;flex-direction:column;gap:14px;">
          <div>
            <div style="font-size:11px;color:rgba(255,255,255,.45);margin-bottom:5px;">Hotel/Americas peer group (n=9)</div>
            <div style="display:flex;align-items:baseline;gap:8px;margin-bottom:4px;">
              <div style="font-family:'Cormorant Garamond',serif;font-size:28px;font-weight:300;color:#c0392b;">67.7%</div>
              <div style="font-size:11px;color:rgba(255,255,255,.3);">sector average water score</div>
            </div>
            <div class="score-bar-track"><div class="score-bar-fill red" style="width:67.7%"></div></div>
          </div>
          <div>
            <div style="font-size:11px;color:rgba(255,255,255,.45);margin-bottom:5px;">WST anchor case (31 assets)</div>
            <div style="display:flex;align-items:baseline;gap:8px;margin-bottom:4px;">
              <div style="font-family:'Cormorant Garamond',serif;font-size:28px;font-weight:300;color:#d4a017;">67.7%</div>
              <div style="font-size:11px;color:rgba(255,255,255,.3);">despite 25.3% field reduction</div>
            </div>
            <div class="score-bar-track"><div class="score-bar-fill amber" style="width:67.7%"></div></div>
          </div>
          <div>
            <div style="font-size:11px;color:rgba(255,255,255,.45);margin-bottom:5px;">WST target — full programme</div>
            <div style="display:flex;align-items:baseline;gap:8px;margin-bottom:4px;">
              <div style="font-family:'Cormorant Garamond',serif;font-size:28px;font-weight:300;color:var(--green-lt);">100%</div>
              <div style="font-size:11px;color:rgba(255,255,255,.3);">achievable within one cycle</div>
            </div>
            <div class="score-bar-track"><div class="score-bar-fill" style="width:100%"></div></div>
          </div>

          <div style="padding:14px;background:rgba(45,92,66,.06);border:1px solid rgba(45,92,66,.15);margin-top:4px;">
            <p style="font-size:12px;color:rgba(255,255,255,.38);line-height:1.65;">The gap between 67.7% and 100% is almost never a performance problem. It is a documentation problem. The field savings exist. The submission evidence does not.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tool-gate-band">
    <div class="tgb-text">
      <p>Download the GRESB Water Gap White Paper</p>
      <p>Why hotel REITs average 67.7% on the water indicator and the three-step programme to close the gap. 12 pages.</p>
    </div>
    <button class="tgb-btn" onclick="openGate('The GRESB Water Gap White Paper','/resources/white-papers/gresb-water-gap-hotel-reits','water-target-tools','water-target-tools')">
      <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M6.5 2v7M3 6.5l3.5 3.5 3.5-3.5"/><path d="M2 11h9"/></svg>
      Download White Paper
    </button>
  </div>
</div>


<!-- ═══════════════════════════════════════════
     TOOL 4 — WATER USE BENCHMARKING TABLE
     ═══════════════════════════════════════════ -->
<div class="tool-section ts-even" id="tool-benchmark">
  <div class="tool-label">
    <div class="tool-num">4</div>
    <div class="tool-eye">Water Use Benchmarking</div>
  </div>
  <h2 class="tool-h">Where does your property<br><em>sit in the distribution?</em></h2>
  <p class="tool-sub">WST&rsquo;s portfolio benchmarking data across 500+ commercial properties, by asset class. Enter your water use intensity and see where you rank against median and best-in-class performance — and what the gap costs annually.</p>

  <div style="margin-bottom:24px;display:grid;grid-template-columns:200px 200px 1fr;gap:12px;align-items:end;">
    <div class="inp-group" style="margin-bottom:0;">
      <label class="inp-label">Asset type</label>
      <select class="inp-field" id="bm-type" onchange="calcBenchmark()">
        <option value="hotel">Full-Service Hotel</option>
        <option value="office" selected>Class A Office</option>
        <option value="mixed">Mixed-Use</option>
        <option value="resi">Multifamily</option>
        <option value="retail">Retail</option>
      </select>
    </div>
    <div class="inp-group" style="margin-bottom:0;">
      <label class="inp-label">Your water use (gal/sqft/yr)</label>
      <input class="inp-field" type="number" id="bm-wui" value="28" min="1" max="500" oninput="calcBenchmark()">
    </div>
    <div>
      <div id="bm-position" style="padding:12px 18px;background:rgba(45,92,66,.08);border:1px solid rgba(45,92,66,.15);font-size:13px;color:rgba(255,255,255,.5);">
        Enter values above to see your position
      </div>
    </div>
  </div>

  <table class="bench-table" id="bm-table">
    <thead>
      <tr>
        <th>Asset Type</th>
        <th>Least Efficient</th>
        <th>Sector Median</th>
        <th>WST Portfolio Avg</th>
        <th>Best-in-Class</th>
        <th>GRESB Target</th>
      </tr>
    </thead>
    <tbody>
      <tr id="bm-row-hotel">
        <td>Full-Service Hotel</td>
        <td class="vr">220+ gal/room/day</td>
        <td class="vw">155 gal/room/day</td>
        <td class="v">115 gal/room/day</td>
        <td class="v">88 gal/room/day</td>
        <td>–25% vs baseline</td>
      </tr>
      <tr id="bm-row-office" class="highlight-row">
        <td>Class A Office ★</td>
        <td class="vr">52 gal/sqft/yr</td>
        <td class="vw">32 gal/sqft/yr</td>
        <td class="v">22 gal/sqft/yr</td>
        <td class="v">14 gal/sqft/yr</td>
        <td>–20% vs baseline</td>
      </tr>
      <tr id="bm-row-mixed">
        <td>Mixed-Use</td>
        <td class="vr">44 gal/sqft/yr</td>
        <td class="vw">28 gal/sqft/yr</td>
        <td class="v">20 gal/sqft/yr</td>
        <td class="v">13 gal/sqft/yr</td>
        <td>–20% vs baseline</td>
      </tr>
      <tr id="bm-row-resi">
        <td>Multifamily Residential</td>
        <td class="vr">120 gal/unit/day</td>
        <td class="vw">80 gal/unit/day</td>
        <td class="v">62 gal/unit/day</td>
        <td class="v">48 gal/unit/day</td>
        <td>–15% vs baseline</td>
      </tr>
      <tr id="bm-row-retail">
        <td>Retail / Shopping Centre</td>
        <td class="vr">18 gal/sqft/yr</td>
        <td class="vw">11 gal/sqft/yr</td>
        <td class="v">7.5 gal/sqft/yr</td>
        <td class="v">4.5 gal/sqft/yr</td>
        <td>–15% vs baseline</td>
      </tr>
    </tbody>
  </table>
  <p style="font-size:10px;color:rgba(255,255,255,.2);margin-top:8px;line-height:1.55;">★ Selected asset type. WST portfolio averages based on verified utility bill data from 500+ commercial properties. GRESB targets represent a 15–25% reduction from the current portfolio baseline, which is the minimum required for a meaningful score improvement.</p>

  <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:2px;background:rgba(45,92,66,.1);margin-top:24px;">
    <div style="background:var(--black);padding:22px;">
      <div style="font-size:9px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.28);margin-bottom:8px;">Annual Cost of Inefficiency</div>
      <div id="bm-cost" style="font-family:'Cormorant Garamond',serif;font-size:32px;font-weight:300;color:#c0392b;line-height:1;margin-bottom:4px;">—</div>
      <div style="font-size:11px;color:rgba(255,255,255,.25);">excess annual spend vs WST portfolio average</div>
    </div>
    <div style="background:var(--black);padding:22px;">
      <div style="font-size:9px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.28);margin-bottom:8px;">Gap to Best-in-Class</div>
      <div id="bm-gap" style="font-family:'Cormorant Garamond',serif;font-size:32px;font-weight:300;color:#d4a017;line-height:1;margin-bottom:4px;">—</div>
      <div style="font-size:11px;color:rgba(255,255,255,.25);">additional improvement available beyond WST avg</div>
    </div>
    <div style="background:rgba(45,92,66,.06);padding:22px;border:1px solid rgba(45,92,66,.15);">
      <div style="font-size:9px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--green-lt);margin-bottom:8px;">GRESB Reduction Target</div>
      <div id="bm-target" style="font-family:'Cormorant Garamond',serif;font-size:32px;font-weight:300;color:var(--green-lt);line-height:1;margin-bottom:4px;">—</div>
      <div style="font-size:11px;color:rgba(255,255,255,.25);">minimum reduction for meaningful score improvement</div>
    </div>
  </div>

  <div class="tool-gate-band" style="margin-top:2px;">
    <div class="tgb-text">
      <p>Download the Full Benchmarking Dataset</p>
      <p>Complete water use intensity benchmarks across 12 commercial asset classes, with GRESB target ranges and WST portfolio averages. Updated Q1 2026.</p>
    </div>
    <button class="tgb-btn" onclick="openGate('WST Water Use Benchmarking Dataset','/resources/tools/benchmarking-dataset','water-target-tools','water-target-tools')">
      <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M6.5 2v7M3 6.5l3.5 3.5 3.5-3.5"/><path d="M2 11h9"/></svg>
      Download Dataset
    </button>
  </div>
</div>


<!-- RELATED RESOURCES -->
<div style="background:#0b0f0b;padding:56px 64px;">
  <p style="font-size:9px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--green-lt);margin-bottom:12px;display:flex;align-items:center;gap:10px;">
    <span style="width:20px;height:2px;background:var(--green-lt);display:inline-block;"></span>
    Related Resources
  </p>
  <h3 style="font-family:'Cormorant Garamond',serif;font-size:28px;font-weight:300;color:#fff;margin-bottom:28px;line-height:1.15;">Tools used alongside<br><em>these calculators.</em></h3>
  <div class="related-grid">
    <a href="/resources/white-papers/water-cap-rate-lever-financial-case" class="rel-card">
      <div class="rel-tag">White Paper</div>
      <div class="rel-name">Water as a Cap Rate Lever</div>
      <div class="rel-desc">Complete financial framework behind Tool 1. Cap rate table, IC presentation templates, Section 179 guidance. 10 pages.</div>
      <div class="rel-arr">Download &rarr;</div>
    </a>
    <a href="/resources/white-papers/gresb-water-gap-hotel-reits" class="rel-card">
      <div class="rel-tag">White Paper</div>
      <div class="rel-name">The GRESB Water Gap</div>
      <div class="rel-desc">Why hotel REITs average 67.7% on the water indicator and the three-step programme to close the gap. Used alongside Tool 3.</div>
      <div class="rel-arr">Download &rarr;</div>
    </a>
    <a href="/services/feasibility-assessment" class="rel-card">
      <div class="rel-tag">Service</div>
      <div class="rel-name">Feasibility Assessment</div>
      <div class="rel-desc">Send WST 12 months of utility bills. Verified savings estimate in 5 days. The next step after Tool 2.</div>
      <div class="rel-arr">Request &rarr;</div>
    </a>
    <a href="/resources/articles/water-efficiency-cap-rate-noi-asset-managers" class="rel-card">
      <div class="rel-tag">Article &mdash; 4 min</div>
      <div class="rel-name">Water Efficiency as a Cap Rate Lever</div>
      <div class="rel-desc">The mechanics behind Tool 1. How water savings flow to NOI and asset value in gross-lease CRE.</div>
      <div class="rel-arr">Read &rarr;</div>
    </a>
    <a href="/resources/articles/gresb-water-score-hotel-reit-benchmarks-2025" class="rel-card">
      <div class="rel-tag">Article &mdash; 4 min</div>
      <div class="rel-name">GRESB Water Score Benchmarks 2025</div>
      <div class="rel-desc">The data behind Tool 3. Hotel REIT water indicator analysis and the documentation gap that suppresses scores.</div>
      <div class="rel-arr">Read &rarr;</div>
    </a>
    <a href="/resources/webinars" class="rel-card">
      <div class="rel-tag">Webinars On Demand</div>
      <div class="rel-name">Water Target Tools — Walkthrough</div>
      <div class="rel-desc">45-minute live walkthrough of all four tools applied to a 10-asset Class A office portfolio. Free to register.</div>
      <div class="rel-arr">Watch &rarr;</div>
    </a>
  </div>
</div>


<!-- CTA -->
<div class="cta-band">
  <div>
    <div class="cta-h">Ready to move from<br><em>estimate to verified?</em></div>
    <div class="cta-sub">The calculators use portfolio averages. A WST feasibility assessment uses your actual billing records — and delivers verified findings in 5 business days at zero cost. No commitment required to proceed.</div>
  </div>
  <a href="/contact" class="cta-btn">Request Feasibility Assessment</a>
</div>

<!-- GATE -->
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
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
(function(){
  var BLOCKED=['gmail.com','yahoo.com','hotmail.com','outlook.com','icloud.com','aol.com',
    'protonmail.com','mail.com','live.com','msn.com','me.com','googlemail.com','ymail.com','yahoo.co.uk','hotmail.co.uk'];
  var overlay=document.getElementById('gate-overlay');
  var closeBtn=document.getElementById('gate-close');
  var submitBtn=document.getElementById('gate-submit');
  var formWrap=document.getElementById('gate-form-wrap');
  var successDiv=document.getElementById('gate-success');
  var resourceLink=document.getElementById('gate-resource-link');
  var currentRes={title:'',href:'#'};

  window.openGate=function(title,href,type,interest){
    currentRes={title:title,href:href};
    document.getElementById('gate-title').innerHTML='Access <em>'+title+'</em>';
    if(interest){var sel=document.getElementById('gate-interest');for(var i=0;i<sel.options.length;i++){if(sel.options[i].value===interest){sel.selectedIndex=i;break;}}}
    overlay.classList.add('is-open');
    document.body.style.overflow='hidden';
    setTimeout(function(){document.getElementById('gate-first').focus();},100);
  };

  function closeGate(){overlay.classList.remove('is-open');document.body.style.overflow='';}
  if(closeBtn)closeBtn.addEventListener('click',closeGate);
  overlay.addEventListener('click',function(e){if(e.target===overlay)closeGate();});
  document.addEventListener('keydown',function(e){if(e.key==='Escape')closeGate();});

  function validateEmail(email){
    if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email))return false;
    var domain=email.split('@')[1].toLowerCase();
    return BLOCKED.indexOf(domain)===-1;
  }
  function showErr(id,msg){
    var el=document.getElementById('err-'+id);
    var inp=document.getElementById('gate-'+id);
    if(el){if(msg)el.textContent=msg;el.classList.add('is-visible');}
    if(inp)inp.classList.add('is-error');
  }
  function clearErr(id){
    var el=document.getElementById('err-'+id);
    var inp=document.getElementById('gate-'+id);
    if(el)el.classList.remove('is-visible');
    if(inp)inp.classList.remove('is-error');
  }

  if(submitBtn)submitBtn.addEventListener('click',function(){
    var first=document.getElementById('gate-first').value.trim();
    var last=document.getElementById('gate-last').value.trim();
    var email=document.getElementById('gate-email').value.trim();
    var company=document.getElementById('gate-company').value.trim();
    var portfolio=document.getElementById('gate-portfolio').value;
    var interest=document.getElementById('gate-interest').value;
    var honeypot=document.querySelector('input[name="website"]').value;

    ['first','last','email','company','portfolio','interest'].forEach(clearErr);
    var valid=true;
    if(honeypot)return;
    if(!first){showErr('first','Required');valid=false;}
    if(!last){showErr('last','Required');valid=false;}
    if(!validateEmail(email)){showErr('email','Please enter a valid work email. Personal domains are not accepted.');valid=false;}
    if(!company){showErr('company','Required');valid=false;}
    if(!portfolio){showErr('portfolio','Please select a portfolio size');valid=false;}
    if(!interest){showErr('interest','Please select your primary interest');valid=false;}
    if(!valid)return;

    submitBtn.disabled=true;
    submitBtn.textContent='Processing...';

    var data=new FormData();
    data.append('first_name',first);data.append('last_name',last);
    data.append('email',email);data.append('company',company);
    data.append('portfolio_size',portfolio);data.append('primary_interest',interest);
    data.append('resource_accessed',currentRes.title);
    data.append('source_url',window.location.href);

    fetch('/api/gate-register.php',{method:'POST',body:data})
      .catch(function(){})
      .finally(function(){
        formWrap.style.display='none';
        successDiv.classList.add('is-visible');
        if(resourceLink)resourceLink.href=currentRes.href;
        sessionStorage.setItem('wst_gate_passed','1');
      });
  });
})();

/* ══ Tool 1 — Cap Rate Calculator ══ */
function fmt(n) {
  if (n >= 1e6) return '$' + (n/1e6).toFixed(2).replace(/\.?0+$/,'') + 'M';
  return '$' + Math.round(n).toLocaleString();
}

function calcCapRate() {
  var bill   = parseFloat(document.getElementById('cr-bill').value) || 0;
  var rate   = parseFloat(document.getElementById('cr-rate').value) / 100;
  var cap    = parseFloat(document.getElementById('cr-cap').value) / 100;
  var assets = parseInt(document.getElementById('cr-assets').value) || 1;

  var saving  = bill * rate;
  var value   = saving / cap;
  var portVal = value * assets;

  document.getElementById('cr-noi').textContent       = fmt(saving);
  document.getElementById('cr-value').textContent     = fmt(value);
  document.getElementById('cr-portfolio').textContent = fmt(portVal);
  document.getElementById('cr-ic-noi').textContent    = fmt(saving);
  document.getElementById('cr-ic-cap').textContent    = (cap*100).toFixed(1) + '%';
  document.getElementById('cr-ic-val').textContent    = fmt(value);

  // payback hint
  var months = saving > 200000 ? '6–10 months' : saving > 80000 ? '8–14 months' : '10–18 months';
  document.getElementById('cr-payback').textContent = months;
  document.getElementById('cr-rate-val').textContent = (rate*100).toFixed(0) + '%';
}

/* ══ Tool 2 — Savings Estimator ══ */
var SAVINGS_DATA = {
  hotel:     {billing:[0.10,0.14], ct:[0.06,0.12], sewer:[18000,55000], retro:4},
  office:    {billing:[0.08,0.12], ct:[0.05,0.09], sewer:[15000,45000], retro:3.5},
  mixed:     {billing:[0.08,0.12], ct:[0.04,0.08], sewer:[14000,42000], retro:3.5},
  reit:      {billing:[0.09,0.13], ct:[0.06,0.11], sewer:[20000,65000], retro:4},
  residential:{billing:[0.06,0.10], ct:[0,0],       sewer:[8000,22000],  retro:2.5},
  retail:    {billing:[0.07,0.11], ct:[0.03,0.07], sewer:[10000,28000], retro:3}
};

function calcSavings() {
  var type    = document.getElementById('so-type').value;
  var bill    = parseFloat(document.getElementById('so-bill').value) || 0;
  var hasCT   = document.getElementById('so-ct').value !== 'no';
  var audit   = document.getElementById('so-audit').value;
  var iot     = document.getElementById('so-iot').value;
  var d = SAVINGS_DATA[type];

  // billing multiplier based on audit history
  var auditMult = {never:1.0, '3plus':0.9, '1to3':0.6, recent:0.25}[audit] || 1.0;
  // iot multiplier (less to find if already monitored)
  var iotMult   = {no:1.0, partial:0.7, full:0.3}[iot] || 1.0;

  var bLo = Math.round(bill * d.billing[0] * auditMult);
  var bHi = Math.round(bill * d.billing[1] * auditMult);

  var ctLo = hasCT ? Math.round(bill * d.ct[0] * iotMult) : 0;
  var ctHi = hasCT ? Math.round(bill * d.ct[1] * iotMult) : 0;

  var sLo  = Math.round(d.sewer[0] * auditMult);
  var sHi  = Math.round(d.sewer[1] * auditMult);

  var rLo  = Math.round((bLo + ctLo) * d.retro * auditMult);
  var rHi  = Math.round((bHi + ctHi) * d.retro * auditMult);

  var totalLo = bLo + ctLo + sLo;

  var conf = audit === 'never' ? 'Preliminary estimate' : audit === '3plus' ? 'Moderate confidence' : 'Lower probability — recent audit';

  document.getElementById('so-total').textContent        = '$' + totalLo.toLocaleString() + '+';
  document.getElementById('so-billing').textContent      = '$' + bLo.toLocaleString() + '–$' + bHi.toLocaleString();
  document.getElementById('so-ct-saving').textContent    = hasCT ? '$' + ctLo.toLocaleString() + '–$' + ctHi.toLocaleString() : 'N/A — no cooling tower';
  document.getElementById('so-sewer').textContent        = '$' + sLo.toLocaleString() + '–$' + sHi.toLocaleString();
  document.getElementById('so-retro').textContent        = '$' + rLo.toLocaleString() + '–$' + rHi.toLocaleString();
  document.getElementById('so-confidence').textContent   = conf;
}

/* ══ Tool 3 — GRESB Estimator ══ */
function toggleGRESB(btn) {
  btn.classList.toggle('on');
  var pressed = btn.classList.contains('on');
  btn.setAttribute('aria-pressed', pressed.toString());
  updateGRESBScores();
}

function updateGRESBScores() {
  // max possible (WT1 4 + MR3 2 + RA4 1 + MR2 0.67 = 7.67 → 100%)
  var maxPts = 7.67;

  function getScore(col) {
    var pts = 0;
    document.querySelectorAll('.js-gresb[data-col="' + col + '"]').forEach(function(btn) {
      if (btn.classList.contains('on')) pts += parseFloat(btn.dataset.pts);
    });
    return pts;
  }

  var curPts = getScore('cur');
  var wstPts = getScore('wst');

  var curPct = Math.round((curPts / maxPts) * 100);
  var wstPct = Math.min(100, Math.round((wstPts / maxPts) * 100));

  document.getElementById('cur-score').textContent = curPct + '%';
  document.getElementById('wst-score').textContent = wstPct + '%';
  document.getElementById('cur-bar').style.width   = curPct + '%';
  document.getElementById('wst-bar').style.width   = wstPct + '%';

  // colour
  var curBar = document.getElementById('cur-bar');
  curBar.className = 'score-bar-fill ' + (curPct < 60 ? 'red' : curPct < 80 ? 'amber' : '');

  document.getElementById('cur-label').textContent = curPct < 68 ? 'Below 68% sector average' : curPct < 85 ? 'Near sector average' : 'Above average';
  document.getElementById('wst-label').textContent = wstPct === 100 ? 'Full indicator points — within one cycle' : wstPct > 80 ? 'Strong improvement from current' : 'Partial programme';
}

/* ══ Tool 4 — Benchmarking ══ */
var BM_DATA = {
  hotel:  {unit:'gal/room/day',   worst:220, median:155, wst:115, best:88,  gresb:0.25, rate:1.20},
  office: {unit:'gal/sqft/yr',    worst:52,  median:32,  wst:22,  best:14,  gresb:0.20, rate:0.85},
  mixed:  {unit:'gal/sqft/yr',    worst:44,  median:28,  wst:20,  best:13,  gresb:0.20, rate:0.80},
  resi:   {unit:'gal/unit/day',   worst:120, median:80,  wst:62,  best:48,  gresb:0.15, rate:0.95},
  retail: {unit:'gal/sqft/yr',    worst:18,  median:11,  wst:7.5, best:4.5, gresb:0.15, rate:0.70}
};

function calcBenchmark() {
  var type = document.getElementById('bm-type').value;
  var wui  = parseFloat(document.getElementById('bm-wui').value) || 0;
  var d    = BM_DATA[type];

  // unhighlight all, highlight selected
  ['hotel','office','mixed','resi','retail'].forEach(function(t) {
    var row = document.getElementById('bm-row-' + t);
    if (row) row.classList.toggle('highlight-row', t === type);
  });

  if (!wui) { document.getElementById('bm-position').innerHTML = 'Enter a water use value above'; return; }

  var pos, posColor;
  if      (wui > d.worst)  { pos = 'Worse than least efficient'; posColor = '#c0392b'; }
  else if (wui > d.median) { pos = 'Between median and least efficient'; posColor = '#c0392b'; }
  else if (wui > d.wst)    { pos = 'Between median and WST portfolio average'; posColor = '#d4a017'; }
  else if (wui > d.best)   { pos = 'Between WST average and best-in-class'; posColor = 'var(--green-lt)'; }
  else                      { pos = 'At or better than best-in-class'; posColor = 'var(--green-lt)'; }

  document.getElementById('bm-position').innerHTML =
    'Your position: <strong style="color:' + posColor + '">' + pos + '</strong>';

  // cost of gap vs WST avg (simplified — uses rate per unit * gap)
  var gapToWST   = Math.max(0, wui - d.wst);
  var gapToBest  = Math.max(0, wui - d.best);
  var costPerUnit = d.rate;

  var annualGapCost = Math.round(gapToWST * costPerUnit * 10000);
  var addlGapCost   = Math.round(gapToBest * costPerUnit * 10000);
  var targetRedn    = (d.gresb * 100).toFixed(0) + '%';

  document.getElementById('bm-cost').textContent   = annualGapCost > 0 ? '$' + annualGapCost.toLocaleString() + '+' : '—';
  document.getElementById('bm-gap').textContent    = addlGapCost > 0  ? '$' + addlGapCost.toLocaleString() + '+' : 'At target';
  document.getElementById('bm-target').textContent = '–' + targetRedn + ' from baseline';
}

// init all tools on load
calcCapRate();
calcSavings();
updateGRESBScores();
calcBenchmark();

(function() {

  /* ── Auto year ── */
  var yrEl = document.getElementById('footer-yr');
  if (yrEl) yrEl.textContent = new Date().getFullYear();

  /* ── Services tab ── */
  window.showService = function(id, btn) {
    document.querySelectorAll('.service-panel').forEach(function(p){ p.classList.remove('active'); });
    document.querySelectorAll('.service-list-item').forEach(function(b){ b.classList.remove('active'); });
    var panel = document.getElementById('svc-' + id);
    if (panel) panel.classList.add('active');
    if (btn) btn.classList.add('active');
  };

  /* ── Active nav link ── */
  var curPath = window.location.pathname;
  document.querySelectorAll('.nav-links a').forEach(function(a) {
    if (a.getAttribute('href') === curPath) a.classList.add('active-link');
  });

  /* ── Nav scroll shadow ── */
  var navEl = document.querySelector('nav');
  window.addEventListener('scroll', function() {
    if (navEl) {
      navEl.style.boxShadow = window.scrollY > 20
        ? '0 4px 24px rgba(0,0,0,0.09)'
        : '0 1px 4px rgba(0,0,0,0.04)';
    }
    /* Sticky CTA */
    var sc = document.getElementById('sticky-cta');
    if (sc && !sc._dismissed) {
      sc.classList.toggle('visible', window.scrollY > window.innerHeight * 0.7);
    }
    /* Scroll-to-top */
    var st = document.getElementById('scroll-top');
    if (st) st.classList.toggle('visible', window.scrollY > 400);
  }, { passive: true });

  /* ── Sticky CTA dismiss ── */
  var sdBtn = document.getElementById('sticky-dismiss');
  if (sdBtn) {
    sdBtn.addEventListener('click', function() {
      var sc = document.getElementById('sticky-cta');
      if (sc) { sc.classList.remove('visible'); sc._dismissed = true; }
    });
  }

  /* ── Scroll to top ── */
  var stBtn = document.getElementById('scroll-top');
  if (stBtn) {
    stBtn.addEventListener('click', function() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* ══════════════════════════════════════════
     CONSULTATION POPUP
  ══════════════════════════════════════════ */
  var PERSONAL = ['gmail','yahoo','hotmail','outlook','aol','icloud','proton',
                  'live','msn','mail','ymail','googlemail','zoho','gmx',
                  'tutanota','fastmail'];

  function isWorkEmail(email) {
    var p = email.toLowerCase().split('@');
    if (p.length !== 2 || !p[1]) return false;
    var base = p[1].split('.')[0];
    return !PERSONAL.includes(base);
  }

  function coSetState(id, errId, msg) {
    var f = document.getElementById(id);
    var e = document.getElementById(errId);
    if (!f) return !msg;
    if (msg) {
      f.classList.add('err'); f.classList.remove('ok');
      if (e) e.textContent = msg;
    } else {
      f.classList.remove('err'); f.classList.add('ok');
      if (e) e.textContent = '';
    }
    return !msg;
  }

  window.openConsult = function(mode) {
    var overlay = document.getElementById('co');
    if (!overlay) return;
    var title = document.getElementById('co-title');
    if (title) {
      title.textContent = (mode === 'speak')
        ? 'Speak with an Advisor'
        : 'Schedule Your ESG Water Consultation';
    }
    /* Reset form state if re-opening */
    var fw = document.getElementById('co-form-wrap');
    var ok = document.getElementById('co-ok');
    if (fw) fw.style.display = '';
    if (ok) ok.classList.remove('show');
    var sub = document.getElementById('co-submit');
    if (sub) { sub.disabled = false; sub.textContent = 'Submit Request'; }
    overlay.classList.add('open');
    document.body.style.overflow = 'hidden';
    setTimeout(function() {
      var f = document.getElementById('co-fn');
      if (f) f.focus();
    }, 80);
  };

  window.closeConsult = function() {
    var overlay = document.getElementById('co');
    if (overlay) overlay.classList.remove('open');
    document.body.style.overflow = '';
  };

  /* Wire close button */
  var coX = document.getElementById('co-x');
  if (coX) coX.addEventListener('click', window.closeConsult);

  /* Click outside to close */
  var coOverlay = document.getElementById('co');
  if (coOverlay) {
    coOverlay.addEventListener('click', function(e) {
      if (e.target === coOverlay) window.closeConsult();
    });
  }

  /* Wire all CTA triggers — using data attribute to avoid double-wiring */
  function wireConsultTriggers() {
    var triggers = [
      { sel: '#sticky-schedule-btn', mode: 'assess' },
      { sel: '.btn-hero-primary',    mode: 'assess' },
      { sel: '.btn-speak',           mode: 'speak'  },
    ];
    triggers.forEach(function(t) {
      document.querySelectorAll(t.sel).forEach(function(el) {
        if (!el._coWired) {
          el._coWired = true;
          el.addEventListener('click', function(e) {
            e.preventDefault();
            window.openConsult(t.mode);
          });
        }
      });
    });
  }
  wireConsultTriggers();

  /* Wire contact section buttons */
  var ccSpeak  = document.getElementById('cc-speak-btn');
  var ccAssess = document.getElementById('cc-assess-btn');
  if (ccSpeak  && !ccSpeak._coWired)  { ccSpeak._coWired  = true; ccSpeak.addEventListener('click',  function(){ window.openConsult('speak');  }); }
  if (ccAssess && !ccAssess._coWired) { ccAssess._coWired = true; ccAssess.addEventListener('click', function(){ window.openConsult('assess'); }); }

  /* Wire nav CTA */
  var navCta = document.getElementById('nav-cta-btn');
  if (navCta && !navCta._coWired) { navCta._coWired = true; navCta.addEventListener('click', function(e){ e.preventDefault(); window.openConsult('speak'); }); }

  /* Wire hamburger */
  var hamBtn = document.getElementById('ham-btn');
  if (hamBtn && !hamBtn._dmWired) { hamBtn._dmWired = true; hamBtn.addEventListener('click', function(){ if(window.openDailyModal) window.openDailyModal(); }); }

  /* Form submit */
  var coSubmit = document.getElementById('co-submit');
  var coAttempts = 0;
  if (coSubmit) {
    coSubmit.addEventListener('click', function() {
      /* Honeypot check */
      var hp = document.getElementById('co-hp');
      if (hp && hp.value.trim()) return;

      if (coAttempts >= 5) return;
      coAttempts++;

      var ok = true;
      var fn = document.getElementById('co-fn');
      var ln = document.getElementById('co-ln');
      var em = document.getElementById('co-em');
      var co = document.getElementById('co-co');
      var ph = document.getElementById('co-ph');

      if (!fn || !fn.value.trim()) ok = coSetState('co-fn','co-fn-e','First name is required.') && ok;
      else coSetState('co-fn','co-fn-e','');

      if (!ln || !ln.value.trim()) ok = coSetState('co-ln','co-ln-e','Last name is required.') && ok;
      else coSetState('co-ln','co-ln-e','');

      if (!em || !em.value.trim()) {
        ok = coSetState('co-em','co-em-e','Work email is required.') && ok;
      } else if (!/[^@]+@[^.]+\..+/.test(em.value)) {
        ok = coSetState('co-em','co-em-e','Please enter a valid email address.') && ok;
      } else if (!isWorkEmail(em.value)) {
        ok = coSetState('co-em','co-em-e','Please use a work email address.') && ok;
      } else coSetState('co-em','co-em-e','');

      if (!co || !co.value.trim()) ok = coSetState('co-co','co-co-e','Company name is required.') && ok;
      else coSetState('co-co','co-co-e','');

      if (ph && ph.value.trim()) {
        var digits = ph.value.replace(/\D/g,'');
        if (digits.length < 7 || digits.length > 15) {
          ok = coSetState('co-ph','co-ph-e','Please enter a valid phone number.') && ok;
        } else coSetState('co-ph','co-ph-e','');
      }

      /* Strip any HTML/JS injection attempts */
      document.querySelectorAll('#co-form-wrap .co-inp').forEach(function(f) {
        if (f.value && /<[^>]+>|javascript:/i.test(f.value)) f.value = '';
      });

      if (!ok) return;

      coSubmit.disabled = true;
      coSubmit.textContent = 'Sending\u2026';

      /* Production: replace with fetch('/api/consult', { method:'POST', body:... }) */
      setTimeout(function() {
        var fw = document.getElementById('co-form-wrap');
        var okDiv = document.getElementById('co-ok');
        if (fw) fw.style.display = 'none';
        if (okDiv) okDiv.classList.add('show');
      }, 900);
    });
  }

  /* ══════════════════════════════════════════
     SEARCH OVERLAY
  ══════════════════════════════════════════ */
  var SEARCH_INDEX = [
    {title:'Efficiency Audits — Water Bill Validation',path:'/services/efficiency-audits',cat:'Services',kw:'audit bill validation water cost savings overcharge'},
    {title:'Utility Intelligence — Ara AI',path:'/services/utility-intelligence',cat:'Services',kw:'ara ai utility intelligence automated bill collection esg data coverage'},
    {title:'Smart Water Monitoring — IoT',path:'/services/smart-monitoring',cat:'Services',kw:'iot smart monitoring real time sensor leak detection dashboard'},
    {title:'Cooling Tower Optimization',path:'/services/cooling-tower',cat:'Services',kw:'cooling tower coc optimization water savings chemical treatment'},
    {title:'Meter Accuracy Optimization',path:'/services/meter-accuracy',cat:'Services',kw:'meter accuracy flow management billing error correction'},
    {title:'Smart Water Recovery',path:'/services/water-recovery',cat:'Services',kw:'water recovery treatment chemical free scale'},
    {title:'Case Studies — Verified Results',path:'/resources/case-studies',cat:'Resources',kw:'case study diamondrock westin kimpton results proof savings'},
    {title:'White Papers — Advisory Research',path:'/resources/white-papers',cat:'Resources',kw:'white paper research institutional reit esg gresb water'},
    {title:'Webinars On Demand',path:'/resources/webinars',cat:'Resources',kw:'webinar video training water efficiency esg rates'},
    {title:'Water Target Tools & Calculators',path:'/resources/tools',cat:'Resources',kw:'calculator tools water consumption savings roi esg score'},
    {title:'City Water Rebates Database',path:'/resources/city-rebates',cat:'Resources',kw:'rebate city municipal incentive programme funding'},
    {title:'Tax Strategy — Section 179 & OBBBA',path:'/resources/tax-strategy',cat:'Resources',kw:'tax section 179 obbba bonus depreciation financing water equipment'},
    {title:'Articles & Insights',path:'/resources/articles',cat:'Resources',kw:'articles insights blog noi esg water advisory commercial real estate'},
    {title:'Events & Conferences',path:'/resources/events',cat:'Resources',kw:'events conferences gresb nareit uli reit sustainability'},
    {title:'Hospitality — Hotels & Resorts',path:'/industries/hospitality',cat:'Industries',kw:'hospitality hotel resort reit diamond rock westin savings reduction'},
    {title:'Office Buildings — ESG Portfolio',path:'/industries/office',cat:'Industries',kw:'office building commercial real estate esg noi'},
    {title:'Manufacturing & Industrial',path:'/industries/manufacturing',cat:'Industries',kw:'manufacturing industrial process cooling water reuse'},
    {title:'Golf Courses — Irrigation',path:'/industries/golf',cat:'Industries',kw:'golf course irrigation reclaimed water pump smart'},
    {title:'Condominiums & Multifamily',path:'/industries/condominiums',cat:'Industries',kw:'condominium multifamily hoa sub meter billing fair'},
    {title:'All Industries',path:'/industries',cat:'Industries',kw:'industries sectors commercial real estate retail schools senior'},
    {title:'About Water Solutions Technology',path:'/about',cat:'Company',kw:'about wst water solutions technology founded fort lauderdale advisors'},
    {title:'ESG Water Advisory Programme',path:'/gresb',cat:'Company',kw:'gresb esg water advisory wt1 mr3 ra4 institutional solution provider'},
    {title:'Investors',path:'/investors',cat:'Company',kw:'investors investment opportunity sba funding capital water advisory'},
    {title:'Contact — Schedule Assessment',path:'/contact',cat:'Company',kw:'contact schedule assessment audit portfolio water advisor'},
    {title:'Asset Managers & REITs',path:'/opportunities/asset-managers',cat:'Opportunities',kw:'asset manager reit portfolio esg noi water savings institutional'},
    {title:'MEP Servicers & Installers',path:'/opportunities/mep',cat:'Opportunities',kw:'mep mechanical electrical plumbing installer partner revenue'},
    {title:'ESG & Sustainability Teams',path:'/opportunities/esg',cat:'Opportunities',kw:'esg sustainability gresb cdp scope 2 water performance reporting'},
    {title:'Referral Agents',path:'/opportunities/agents',cat:'Opportunities',kw:'agent referral commission real estate broker consultant'},
    {title:'Careers at WST',path:'/opportunities/careers',cat:'Opportunities',kw:'careers jobs water engineer sales sustainability analyst'},
  ];

  function doSearch(q) {
    var res = document.getElementById('search-results');
    if (!res) return;
    if (!q || q.length < 2) { res.innerHTML = ''; return; }
    var words = q.toLowerCase().split(/\s+/).filter(Boolean);
    var scored = SEARCH_INDEX.map(function(item) {
      var hay = (item.title + ' ' + item.kw + ' ' + item.cat).toLowerCase();
      var score = 0;
      words.forEach(function(w) {
        if (hay.indexOf(w) > -1) score += item.title.toLowerCase().indexOf(w) > -1 ? 3 : 1;
      });
      return { item: item, score: score };
    }).filter(function(x){ return x.score > 0; })
      .sort(function(a,b){ return b.score - a.score; })
      .slice(0, 10);

    if (!scored.length) {
      res.innerHTML = '<div class="search-no-results">No results for &ldquo;' +
        q.replace(/[<>&"]/g,'') + '&rdquo; &mdash; try different keywords.</div>';
      return;
    }
    var seen = {};
    var html = '';
    scored.forEach(function(x) {
      var r = x.item;
      if (!seen[r.cat]) {
        seen[r.cat] = true;
        html += '<div class="search-category">' + r.cat + '</div>';
      }
      var hi = r.title;
      words.forEach(function(w) {
        hi = hi.replace(new RegExp('(' + w.replace(/[.*+?^${}()|[\]\\]/g,'\\$&') + ')', 'gi'), '<em>$1</em>');
      });
      html += '<a class="search-result" href="' + r.path + '">' +
        '<div class="sr-title">' + hi + '</div>' +
        '<div class="sr-path">' + r.path + '</div></a>';
    });
    res.innerHTML = html;
  }

  window.openSearch = function() {
    var o = document.getElementById('search-overlay');
    var inp = document.getElementById('search-input');
    if (!o) return;
    o.classList.add('open');
    document.body.style.overflow = 'hidden';
    if (inp) setTimeout(function(){ inp.focus(); }, 50);
  };

  window.closeSearch = function() {
    var o = document.getElementById('search-overlay');
    var inp = document.getElementById('search-input');
    var res = document.getElementById('search-results');
    if (o) o.classList.remove('open');
    document.body.style.overflow = '';
    if (inp) inp.value = '';
    if (res) res.innerHTML = '';
  };

  var srchBtn = document.getElementById('nav-search-btn');
  if (!srchBtn) srchBtn = document.querySelector('.nav-icon-btn[aria-label="Search"]');
  if (srchBtn && !srchBtn._srchWired) {
    srchBtn._srchWired = true;
    srchBtn.addEventListener('click', window.openSearch);
  }

  var srchClose = document.getElementById('search-close');
  if (srchClose) srchClose.addEventListener('click', window.closeSearch);

  var srchOverlay = document.getElementById('search-overlay');
  if (srchOverlay) {
    srchOverlay.addEventListener('click', function(e) {
      if (e.target === srchOverlay) window.closeSearch();
    });
  }

  var srchInput = document.getElementById('search-input');
  if (srchInput) {
    srchInput.addEventListener('input', function() { doSearch(this.value.trim()); });
  }

  /* ══════════════════════════════════════════
     VIDEO POPUP
  ══════════════════════════════════════════ */
  /* Replace this URL with your actual YouTube embed URL */
  var VIDEO_URL = 'https://www.youtube.com/embed/YOUR_VIDEO_ID?autoplay=1&rel=0';

  window.openVideo = function() {
    var o = document.getElementById('video-overlay');
    var iframe = document.getElementById('video-iframe');
    if (!o || !iframe) return;
    iframe.src = VIDEO_URL;
    o.classList.add('open');
    document.body.style.overflow = 'hidden';
  };

  window.closeVideo = function() {
    var o = document.getElementById('video-overlay');
    var iframe = document.getElementById('video-iframe');
    if (o) o.classList.remove('open');
    if (iframe) iframe.src = '';
    document.body.style.overflow = '';
  };

  document.querySelectorAll('.hero-strip-item').forEach(function(link) {
    if (link.textContent.indexOf('Take a Glance') > -1 ||
        link.textContent.indexOf('Overview Video') > -1) {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        window.openVideo();
      });
    }
  });

  var vcBtn = document.getElementById('video-close');
  if (vcBtn) vcBtn.addEventListener('click', window.closeVideo);

  var vo = document.getElementById('video-overlay');
  if (vo) {
    vo.addEventListener('click', function(e) {
      if (e.target === vo) window.closeVideo();
    });
  }

  /* ══════════════════════════════════════════
     DAILY MODAL (hamburger)
  ══════════════════════════════════════════ */
  var SCRIPTURES = [
    {t:'\u201cFor I know the plans I have for you, declares the Lord, plans to prosper you and not to harm you, plans to give you hope and a future.\u201d', r:'Jeremiah 29:11'},
    {t:'\u201cTrust in the Lord with all your heart and lean not on your own understanding; in all your ways submit to him, and he will make your paths straight.\u201d', r:'Proverbs 3:5\u20136'},
    {t:'\u201cI can do all this through him who gives me strength.\u201d', r:'Philippians 4:13'},
    {t:'\u201cThe Lord is my shepherd, I lack nothing.\u201d', r:'Psalm 23:1'},
    {t:'\u201cBe strong and courageous. Do not be afraid; do not be discouraged, for the Lord your God will be with you wherever you go.\u201d', r:'Joshua 1:9'},
    {t:'\u201cAnd we know that in all things God works for the good of those who love him, who have been called according to his purpose.\u201d', r:'Romans 8:28'},
    {t:'\u201cGive thanks to the Lord, for he is good; his love endures forever.\u201d', r:'Psalm 107:1'},
    {t:'\u201cBut seek first his kingdom and his righteousness, and all these things will be given to you as well.\u201d', r:'Matthew 6:33'},
    {t:'\u201cCast all your anxiety on him because he cares for you.\u201d', r:'1 Peter 5:7'},
    {t:'\u201cThe Lord bless you and keep you; the Lord make his face shine on you and be gracious to you.\u201d', r:'Numbers 6:24\u201325'},
  ];
  var JOKES = [
    'Why do water auditors make great comedians? They always find the best leaks in the performance.',
    'Why did the building manager install smart meters? He wanted to finally get his flow together.',
    'What did the cooling tower say to the water bill? Stop making such a big splash.',
    'My water efficiency report came back excellent. Turns out the only thing overflowing was the savings.',
    'Why do ESG consultants love water projects? Because the ROI really flows.',
    'What is a water auditor\'s favourite movie? Gone with the Flow.',
    'I told my CFO water savings add directly to NOI. He said that\'s the first time a utility bill made him smile.',
    'Why are smart water meters so popular? They finally give buildings a chance to come clean.',
  ];

  function dailyIdx(len) {
    var d = new Date();
    return (d.getFullYear() * 365 + d.getMonth() * 31 + d.getDate()) % len;
  }

  var _dmTick = null;

  window.openDailyModal = function() {
    var o = document.getElementById('dm-overlay');
    if (!o) return;

    var now = new Date();
    var dateEl = document.getElementById('dm-date');
    var timeEl = document.getElementById('dm-time');
    if (dateEl) dateEl.textContent = now.toLocaleDateString('en-US', {weekday:'long',year:'numeric',month:'long',day:'numeric'});
    if (timeEl) timeEl.textContent = now.toLocaleTimeString('en-US', {hour:'2-digit',minute:'2-digit',second:'2-digit',hour12:true});

    var sc = SCRIPTURES[dailyIdx(SCRIPTURES.length)];
    var verseEl = document.getElementById('dm-verse');
    var refEl   = document.getElementById('dm-ref');
    if (verseEl) verseEl.textContent = sc.t;
    if (refEl)   refEl.textContent   = '\u2014 ' + sc.r;

    var jokeEl = document.getElementById('dm-joke');
    if (jokeEl) jokeEl.textContent = JOKES[dailyIdx(JOKES.length)];

    o.classList.add('open');
    document.body.style.overflow = 'hidden';

    clearInterval(_dmTick);
    _dmTick = setInterval(function() {
      if (timeEl) {
        timeEl.textContent = new Date().toLocaleTimeString('en-US', {hour:'2-digit',minute:'2-digit',second:'2-digit',hour12:true});
      }
    }, 1000);
  };

  window.closeDailyModal = function() {
    var o = document.getElementById('dm-overlay');
    if (o) o.classList.remove('open');
    document.body.style.overflow = '';
    clearInterval(_dmTick);
  };

  var dmX = document.getElementById('dm-x');
  if (dmX) dmX.addEventListener('click', function(){ if(window.closeDailyModal) window.closeDailyModal(); });

  var dmOverlay = document.getElementById('dm-overlay');
  if (dmOverlay) {
    dmOverlay.addEventListener('click', function(e) {
      if (e.target === dmOverlay) window.closeDailyModal();
    });
  }

  /* ══════════════════════════════════════════
     SINGLE ESCAPE KEY HANDLER
     Checks which overlay is open in priority order
  ══════════════════════════════════════════ */
  document.addEventListener('keydown', function(e) {
    if (e.key !== 'Escape') return;
    var co = document.getElementById('co');
    var so = document.getElementById('search-overlay');
    var vo = document.getElementById('video-overlay');
    var dm = document.getElementById('dm-overlay');
    if (co && co.classList.contains('open'))         { window.closeConsult();    return; }
    if (so && so.classList.contains('open'))         { window.closeSearch();     return; }
    if (vo && vo.classList.contains('open'))         { window.closeVideo();      return; }
    if (dm && dm.classList.contains('open'))         { window.closeDailyModal(); return; }
  });

  /* Ctrl+K → search */
  document.addEventListener('keydown', function(e) {
    if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
      e.preventDefault();
      window.openSearch();
    }
  });

})();

(function() {
  var currentDoc = null;
  var currentResults = null;

  // Override openGate for tool downloads
  window.openGate = function(title, slug, type, category) {
    // Detect tool download calls
    if (type === 'water-target-tools') {
      // Map slug to doc type
      if (slug.includes('ic-presentation'))    currentDoc = 'ic-template';
      else if (slug.includes('gresb-water'))   currentDoc = 'gresb-white-paper';
      else if (slug.includes('benchmarking'))  currentDoc = 'benchmarking-data';
      else                                      currentDoc = 'savings-report';

      // Snapshot current calculator results
      currentResults = gatherResults(currentDoc);
    } else {
      currentDoc = null;
      currentResults = null;
    }
    // openGate from gate modal will handle standard flow
  };

  // Gather calculator values at time of download click
  function gatherResults(doc) {
    var r = {};
    try {
      if (doc === 'ic-template' || doc === 'savings-report') {
        r.bill    = document.getElementById('cr-bill')   ? document.getElementById('cr-bill').value   : '480000';
        r.rate    = document.getElementById('cr-rate')   ? document.getElementById('cr-rate').value   : '20';
        r.cap     = document.getElementById('cr-cap')    ? document.getElementById('cr-cap').value    : '5.5';
        r.assets  = document.getElementById('cr-assets') ? document.getElementById('cr-assets').value : '1';
        // Compute
        var bill = parseFloat(r.bill)||0, rate = parseFloat(r.rate)/100, cap = parseFloat(r.cap)/100, assets = parseInt(r.assets)||1;
        r.noi     = Math.round(bill * rate);
        r.value   = Math.round(r.noi / cap);
        r.portVal = r.value * assets;
        r.payback = r.noi > 200000 ? '6–10 months' : r.noi > 80000 ? '8–14 months' : '10–18 months';
      }
      if (doc === 'savings-report') {
        r.type        = document.getElementById('so-type')  ? document.getElementById('so-type').value  : 'office';
        r.billingLo   = (document.getElementById('so-billing')   || {}).textContent ? parseLo(document.getElementById('so-billing').textContent)   : 28000;
        r.billingHi   = (document.getElementById('so-billing')   || {}).textContent ? parseHi(document.getElementById('so-billing').textContent)   : 42000;
        r.ctLo        = (document.getElementById('so-ct-saving') || {}).textContent ? parseLo(document.getElementById('so-ct-saving').textContent) : 15000;
        r.ctHi        = (document.getElementById('so-ct-saving') || {}).textContent ? parseHi(document.getElementById('so-ct-saving').textContent) : 32000;
        r.sewerLo     = (document.getElementById('so-sewer')     || {}).textContent ? parseLo(document.getElementById('so-sewer').textContent)     : 15000;
        r.sewerHi     = (document.getElementById('so-sewer')     || {}).textContent ? parseHi(document.getElementById('so-sewer').textContent)     : 42000;
        r.retroLo     = (document.getElementById('so-retro')     || {}).textContent ? parseLo(document.getElementById('so-retro').textContent)     : 43000;
        r.retroHi     = (document.getElementById('so-retro')     || {}).textContent ? parseHi(document.getElementById('so-retro').textContent)     : 74000;
        r.total       = (document.getElementById('so-total')     || {}).textContent ? parseLo(document.getElementById('so-total').textContent)     : 58000;
        r.confidence  = (document.getElementById('so-confidence')|| {}).textContent || 'Preliminary';
      }
    } catch(e) { console.warn('WST result capture:', e); }
    return r;
  }

  function parseLo(str) { var m = str.replace(/[^0-9,]/g,'').split(','); return parseInt((m[0]||'0').replace(/,/g,''))||0; }
  function parseHi(str) { var p = str.split('–'); return parseInt((p[1]||p[0]||'0').replace(/[^0-9]/g,''))||0; }

  // Hook into gate form submission
  document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('gate-form');
    if (!form) return;

    form.addEventListener('submit', function(e) {
      if (!currentDoc) return; // normal gate — don't intercept

      e.preventDefault();

      var first   = (document.getElementById('gate-first')   || {}).value || '';
      var last    = (document.getElementById('gate-last')    || {}).value || '';
      var email   = (document.getElementById('gate-email')   || {}).value || '';
      var company = (document.getElementById('gate-company') || {}).value || '';

      if (!email) return;

      // Show loading state
      var btn = document.getElementById('gate-submit');
      if (btn) { btn.disabled = true; btn.textContent = 'Generating your report…'; }

      fetch('/api/tool-download.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          first: first, last: last, email: email, company: company,
          doc: currentDoc, results: currentResults
        })
      })
      .then(function(res) {
        if (!res.ok) throw new Error('PDF generation failed');
        return res.blob();
      })
      .then(function(blob) {
        // Trigger browser download
        var url = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = 'WST-' + currentDoc + '-report.pdf';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        // Show success state in modal
        var formWrap = document.getElementById('gate-form-wrap');
        var okEl     = document.getElementById('gate-ok');
        if (formWrap) formWrap.style.display = 'none';
        if (okEl)     okEl.classList.add('show');

        currentDoc = null; currentResults = null;
      })
      .catch(function(err) {
        console.error('WST PDF download error:', err);
        // Fall through to normal gate submit on error
        if (btn) { btn.disabled = false; btn.textContent = 'Download Report'; }
        form.submit();
      });
    });
  });
})();

(function() {
  var currentDoc = null;
  var currentResults = null;

  // Override openGate for tool downloads
  var _origOpenGate = window.openGate;
  window.openGate = function(title, slug, type, category) {
    // Detect tool download calls
    if (type === 'water-target-tools') {
      // Map slug to doc type
      if (slug.includes('ic-presentation'))    currentDoc = 'ic-template';
      else if (slug.includes('gresb-water'))   currentDoc = 'gresb-white-paper';
      else if (slug.includes('benchmarking'))  currentDoc = 'benchmarking-data';
      else                                      currentDoc = 'savings-report';

      // Snapshot current calculator results
      currentResults = gatherResults(currentDoc);
    } else {
      currentDoc = null;
      currentResults = null;
    }
  };

  // Gather calculator values at time of download click
  function gatherResults(doc) {
    var r = {};
    try {
      if (doc === 'ic-template' || doc === 'savings-report') {
        r.bill    = document.getElementById('cr-bill')   ? document.getElementById('cr-bill').value   : '480000';
        r.rate    = document.getElementById('cr-rate')   ? document.getElementById('cr-rate').value   : '20';
        r.cap     = document.getElementById('cr-cap')    ? document.getElementById('cr-cap').value    : '5.5';
        r.assets  = document.getElementById('cr-assets') ? document.getElementById('cr-assets').value : '1';
        // Compute
        var bill = parseFloat(r.bill)||0, rate = parseFloat(r.rate)/100, cap = parseFloat(r.cap)/100, assets = parseInt(r.assets)||1;
        r.noi     = Math.round(bill * rate);
        r.value   = Math.round(r.noi / cap);
        r.portVal = r.value * assets;
        r.payback = r.noi > 200000 ? '6–10 months' : r.noi > 80000 ? '8–14 months' : '10–18 months';
      }
      if (doc === 'savings-report') {
        r.type        = document.getElementById('so-type')  ? document.getElementById('so-type').value  : 'office';
        r.billingLo   = (document.getElementById('so-billing')   || {}).textContent ? parseLo(document.getElementById('so-billing').textContent)   : 28000;
        r.billingHi   = (document.getElementById('so-billing')   || {}).textContent ? parseHi(document.getElementById('so-billing').textContent)   : 42000;
        r.ctLo        = (document.getElementById('so-ct-saving') || {}).textContent ? parseLo(document.getElementById('so-ct-saving').textContent) : 15000;
        r.ctHi        = (document.getElementById('so-ct-saving') || {}).textContent ? parseHi(document.getElementById('so-ct-saving').textContent) : 32000;
        r.sewerLo     = (document.getElementById('so-sewer')     || {}).textContent ? parseLo(document.getElementById('so-sewer').textContent)     : 15000;
        r.sewerHi     = (document.getElementById('so-sewer')     || {}).textContent ? parseHi(document.getElementById('so-sewer').textContent)     : 42000;
        r.retroLo     = (document.getElementById('so-retro')     || {}).textContent ? parseLo(document.getElementById('so-retro').textContent)     : 43000;
        r.retroHi     = (document.getElementById('so-retro')     || {}).textContent ? parseHi(document.getElementById('so-retro').textContent)     : 74000;
        r.total       = (document.getElementById('so-total')     || {}).textContent ? parseLo(document.getElementById('so-total').textContent)     : 58000;
        r.confidence  = (document.getElementById('so-confidence')|| {}).textContent || 'Preliminary';
      }
    } catch(e) { console.warn('WST result capture:', e); }
    return r;
  }

  function parseLo(str) { var m = str.replace(/[^0-9,]/g,'').split(','); return parseInt((m[0]||'0').replace(/,/g,''))||0; }
  function parseHi(str) { var p = str.split('–'); return parseInt((p[1]||p[0]||'0').replace(/[^0-9]/g,''))||0; }

  // Hook into gate form submission
  document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('gate-form');
    if (!form) return;

    form.addEventListener('submit', function(e) {
      if (!currentDoc) return; // normal gate — don't intercept

      e.preventDefault();

      var first   = (document.getElementById('gate-first')   || {}).value || '';
      var last    = (document.getElementById('gate-last')    || {}).value || '';
      var email   = (document.getElementById('gate-email')   || {}).value || '';
      var company = (document.getElementById('gate-company') || {}).value || '';

      if (!email) return;

      // Show loading state
      var btn = document.getElementById('gate-submit');
      if (btn) { btn.disabled = true; btn.textContent = 'Generating your report…'; }

      fetch('/api/tool-download.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          first: first, last: last, email: email, company: company,
          doc: currentDoc, results: currentResults
        })
      })
      .then(function(res) {
        if (!res.ok) throw new Error('PDF generation failed');
        return res.blob();
      })
      .then(function(blob) {
        // Trigger browser download
        var url = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = 'WST-' + currentDoc + '-report.pdf';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        // Show success state in modal
        var formWrap = document.getElementById('gate-form-wrap');
        var okEl     = document.getElementById('gate-ok');
        if (formWrap) formWrap.style.display = 'none';
        if (okEl)     okEl.classList.add('show');

        currentDoc = null; currentResults = null;
      })
      .catch(function(err) {
        console.error('WST PDF download error:', err);
        // Fall through to normal gate submit on error
        if (btn) { btn.disabled = false; btn.textContent = 'Download Report'; }
        form.submit();
      });
    });
  });
})();
</script>
@endpush