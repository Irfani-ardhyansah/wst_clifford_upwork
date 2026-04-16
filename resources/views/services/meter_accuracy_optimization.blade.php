@extends('layouts.app')

@section('title', 'Water Meter Accuracy — Water Solutions Technology')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/meter_accuracy_optimization.css') }}">
@endpush

@section('content')
<!-- ─── HERO ─── -->
<div class="inner-hero">
  <!-- Water meter technical illustration -->
  <div class="inner-hero-meter">
    <svg viewBox="0 0 700 380" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="white" stroke-linecap="round" stroke-linejoin="round">
      <!-- Main body -->
      <rect x="190" y="130" width="320" height="140" rx="8" stroke-width="2.5"/>
      <!-- Left pipe -->
      <rect x="40" y="168" width="150" height="44" rx="4" stroke-width="2"/>
      <!-- Right pipe -->
      <rect x="510" y="168" width="150" height="44" rx="4" stroke-width="2"/>
      <!-- Left flange -->
      <rect x="180" y="155" width="20" height="90" rx="3" stroke-width="2"/>
      <!-- Right flange -->
      <rect x="500" y="155" width="20" height="90" rx="3" stroke-width="2"/>
      <!-- Top register box -->
      <rect x="270" y="72" width="160" height="80" rx="6" stroke-width="2"/>
      <!-- Register face -->
      <rect x="285" y="84" width="130" height="55" rx="3" stroke-width="1.5" stroke-dasharray="0"/>
      <!-- Register display lines (simulated digits) -->
      <line x1="305" y1="100" x2="305" y2="125" stroke-width="1"/>
      <line x1="325" y1="100" x2="325" y2="125" stroke-width="1"/>
      <line x1="345" y1="100" x2="345" y2="125" stroke-width="1"/>
      <line x1="365" y1="100" x2="365" y2="125" stroke-width="1"/>
      <line x1="385" y1="100" x2="385" y2="125" stroke-width="1"/>
      <line x1="295" y1="112" x2="400" y2="112" stroke-width="0.75"/>
      <!-- Connector neck from register to body -->
      <rect x="330" y="150" width="40" height="18" rx="2" stroke-width="1.5"/>
      <!-- Transmitter/antenna nub -->
      <rect x="285" y="58" width="30" height="16" rx="3" stroke-width="1.5"/>
      <line x1="295" y1="50" x2="295" y2="58" stroke-width="1.5"/>
      <line x1="308" y1="46" x2="300" y2="56" stroke-width="1.5"/>
      <line x1="283" y1="46" x2="290" y2="56" stroke-width="1.5"/>
      <!-- Flow arrow inside body -->
      <line x1="280" y1="200" x2="420" y2="200" stroke-width="2"/>
      <polyline points="405,191 420,200 405,209" stroke-width="2"/>
      <!-- Internal turbine circle -->
      <circle cx="350" cy="200" r="28" stroke-width="1.5" stroke-dasharray="4 3"/>
      <!-- Turbine blades -->
      <line x1="350" y1="172" x2="350" y2="228" stroke-width="1" stroke-dasharray="2 2"/>
      <line x1="322" y1="200" x2="378" y2="200" stroke-width="1" stroke-dasharray="2 2"/>
      <line x1="330" y1="180" x2="370" y2="220" stroke-width="1" stroke-dasharray="2 2"/>
      <line x1="370" y1="180" x2="330" y2="220" stroke-width="1" stroke-dasharray="2 2"/>
      <!-- Dimension lines -->
      <!-- Length dimension at bottom -->
      <line x1="190" y1="300" x2="510" y2="300" stroke-width="1" stroke-dasharray="0"/>
      <line x1="190" y1="294" x2="190" y2="306" stroke-width="1"/>
      <line x1="510" y1="294" x2="510" y2="306" stroke-width="1"/>
      <text x="345" y="318" font-size="13" fill="white" text-anchor="middle" font-family="monospace" stroke="none">L</text>
      <!-- Height dimension at right -->
      <line x1="655" y1="72" x2="655" y2="270" stroke-width="1"/>
      <line x1="649" y1="72" x2="661" y2="72" stroke-width="1"/>
      <line x1="649" y1="270" x2="661" y2="270" stroke-width="1"/>
      <text x="668" y="176" font-size="13" fill="white" text-anchor="start" font-family="monospace" stroke="none">H</text>
      <!-- Pipe diameter dimension -->
      <line x1="30" y1="168" x2="30" y2="212" stroke-width="1"/>
      <line x1="24" y1="168" x2="36" y2="168" stroke-width="1"/>
      <line x1="24" y1="212" x2="36" y2="212" stroke-width="1"/>
      <text x="16" y="196" font-size="13" fill="white" text-anchor="middle" font-family="monospace" stroke="none">D</text>
      <!-- Bolt details on flanges -->
      <circle cx="185" cy="165" r="3" stroke-width="1.5"/>
      <circle cx="185" cy="235" r="3" stroke-width="1.5"/>
      <circle cx="515" cy="165" r="3" stroke-width="1.5"/>
      <circle cx="515" cy="235" r="3" stroke-width="1.5"/>
    </svg>
  </div>
  <div class="inner-hero-bc">
    <a href="/services">Services</a>
    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 1l4 4-4 4"/></svg>
    <span>Water Meter Accuracy &amp; Predictable Billing</span>
  </div>
  <div class="inner-hero-eye">Service — Water Meter Accuracy &amp; Predictable Billing</div>
  <h1>You may be paying for water<br><em>you never used.</em></h1>
  <p class="inner-hero-sub">Correcting a water meter saves 10–35% of annual utility fees. Flow management optimization aligns your building's pressure and consumption with the municipal register — eliminating billing surprises and delivering month-over-month predictability.</p>

  <div class="hero-badges">
    <div class="hero-badge"><span>10–35%</span> avg. annual savings</div>
    <div class="hero-badge"><span>Predictable</span> monthly billing</div>
    <div class="hero-badge"><span>Retroactive</span> overcharge recovery</div>
    <div class="hero-badge"><span>&lt;12 mo</span> payback typical</div>
  </div>

  <div class="stat-row">
    <div class="stat-cell">
      <div class="stat-val">10–35%</div>
      <div class="stat-lbl">Savings from meter correction</div>
    </div>
    <div class="stat-cell">
      <div class="stat-val">30%<em>+</em></div>
      <div class="stat-lbl">Global water lost to metering error</div>
    </div>
    <div class="stat-cell">
      <div class="stat-val">$0</div>
      <div class="stat-lbl">Cost if meter reads accurately</div>
    </div>
    <div class="stat-cell">
      <div class="stat-val">&lt;2 yr</div>
      <div class="stat-lbl">Payback on modern metering</div>
    </div>
  </div>
</div>

<!-- ─── HOW IT WORKS ─── -->
<section class="sec sec-o" id="how-it-works">
  <div class="two">
    <div>
      <div class="eye">How It Works</div>
      <h2 class="sh">Precision audit.<br><em>Documented savings.</em></h2>
      <p class="sub">Every engagement begins with the right diagnosis and ends with verified, documented outcomes — including retroactive billing recovery where applicable.</p>

      <div class="ai">
        <div class="ai-ic"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><path d="M8 2v12M2 8h12"/></svg></div>
        <div>
          <div class="ai-t">Meter Accuracy Testing</div>
          <div class="ai-b">WST tests meter accuracy using precision flow measurement equipment — identifying register drift, turbine wear, and bypass conditions that cause your meter to over-report consumption.</div>
        </div>
      </div>
      <div class="ai">
        <div class="ai-ic"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><circle cx="8" cy="8" r="6"/><path d="M8 5v4l3 2"/></svg></div>
        <div>
          <div class="ai-t">Flow &amp; Pressure Optimization</div>
          <div class="ai-b">Installation of inline flow meters and pressure regulators (60–75 PSI optimal) to stabilize consumption, reduce fixture wear, and align your usage signal with the municipal meter register.</div>
        </div>
      </div>
      <div class="ai">
        <div class="ai-ic"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><path d="M3 13L8 3l5 10H3z"/></svg></div>
        <div>
          <div class="ai-t">Retroactive Billing Correction Claims</div>
          <div class="ai-b">When meter error is confirmed, WST prepares and submits retroactive billing correction claims on your behalf — recovering past overcharges from the utility, often spanning months or years.</div>
        </div>
      </div>
      <div class="ai">
        <div class="ai-ic"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><path d="M2 14l4-4 4 4 4-8"/></svg></div>
        <div>
          <div class="ai-t">Sub-Metering &amp; Ongoing Verification</div>
          <div class="ai-b">Installing sub-meters on individual systems or tenants enables granular tracking, GRESB sub-metering credit, and continuous billing accuracy — month after month.</div>
        </div>
      </div>
    </div>

    <div>
      <div class="bm">
        <div class="bm-title">Meter Accuracy Optimization Outcomes</div>
        <div class="brow"><span class="bl">Savings from meter correction</span><span class="bv">10–35%</span></div>
        <div class="brow"><span class="bl">Meters with measurable error</span><span class="bv">~30%</span></div>
        <div class="brow"><span class="bl">Retroactive claims</span><span class="bv">Filed for you</span></div>
        <div class="brow"><span class="bl">Sub-metering capability</span><span class="bv">Full</span></div>
        <div class="brow"><span class="bl">GRESB sub-metering credit</span><span class="bv">Yes</span></div>
        <div class="brow"><span class="bl">Assessment turnaround</span><span class="bv">1–2 weeks</span></div>
        <div class="brow"><span class="bl">Billing predictability</span><span class="bv">Month-over-month</span></div>
        <a href="{{ route('contact') }}" class="bm-cta">Request Flow Assessment</a>
      </div>
    </div>
  </div>
</section>

<!-- ─── PREDICTABLE BILLING SECTION ─── -->
<section class="sec sec-w" id="predictable-billing">
  <div class="eye">The Core Problem</div>
  <h2 class="sh">Why water billing is<br><em>so unpredictable.</em></h2>
  <p class="sub">Most buildings measure water after it's been used — and after the meter has already recorded inaccurate data. Flow management precision changes this, giving you a stable, forecastable cost line.</p>

  <div class="two-60">
    <div>
      <!-- Billing visual - LINE/AREA chart style -->
      <div class="billing-visual-wrap fade-up">
        <div class="bv-label">Unoptimized Building — Monthly Water Billing Variance</div>

        <!-- Before chart: SVG area/line -->
        <svg class="bv-svg-chart" viewBox="0 0 560 160" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
          <defs>
            <linearGradient id="grad-bad" x1="0" y1="0" x2="0" y2="1">
              <stop offset="0%" stop-color="#b94040" stop-opacity="0.55"/>
              <stop offset="100%" stop-color="#b94040" stop-opacity="0.05"/>
            </linearGradient>
          </defs>
          <!-- Grid lines -->
          <line x1="0" y1="40" x2="560" y2="40" stroke="rgba(255,255,255,0.06)" stroke-width="1"/>
          <line x1="0" y1="80" x2="560" y2="80" stroke="rgba(255,255,255,0.06)" stroke-width="1"/>
          <line x1="0" y1="120" x2="560" y2="120" stroke="rgba(255,255,255,0.06)" stroke-width="1"/>
          <!-- Area fill -->
          <path d="M0,110 L46,92 L92,58 L138,104 L184,34 L230,90 L276,50 L322,100 L368,44 L414,88 L460,52 L506,96 L560,100 L560,155 L0,155 Z"
                fill="url(#grad-bad)"/>
          <!-- Line -->
          <path d="M0,110 L46,92 L92,58 L138,104 L184,34 L230,90 L276,50 L322,100 L368,44 L414,88 L460,52 L506,96 L560,100"
                fill="none" stroke="#c95050" stroke-width="2" stroke-linejoin="round"/>
          <!-- Data points -->
          <circle cx="0"   cy="110" r="3.5" fill="#c95050"/>
          <circle cx="46"  cy="92"  r="3.5" fill="#c95050"/>
          <circle cx="92"  cy="58"  r="3.5" fill="#c95050"/>
          <circle cx="138" cy="104" r="3.5" fill="#c95050"/>
          <circle cx="184" cy="34"  r="5"   fill="#c95050" stroke="rgba(255,255,255,0.3)" stroke-width="1.5"/>
          <circle cx="230" cy="90"  r="3.5" fill="#c95050"/>
          <circle cx="276" cy="50"  r="4.5" fill="#c95050" stroke="rgba(255,255,255,0.2)" stroke-width="1.5"/>
          <circle cx="322" cy="100" r="3.5" fill="#c95050"/>
          <circle cx="368" cy="44"  r="5"   fill="#c95050" stroke="rgba(255,255,255,0.3)" stroke-width="1.5"/>
          <circle cx="414" cy="88"  r="3.5" fill="#c95050"/>
          <circle cx="460" cy="52"  r="4.5" fill="#c95050" stroke="rgba(255,255,255,0.2)" stroke-width="1.5"/>
          <circle cx="506" cy="96"  r="3.5" fill="#c95050"/>
        </svg>
        <div class="bv-axis">
          <div class="bv-month">JAN</div><div class="bv-month">FEB</div><div class="bv-month">MAR</div>
          <div class="bv-month">APR</div><div class="bv-month">MAY</div><div class="bv-month">JUN</div>
          <div class="bv-month">JUL</div><div class="bv-month">AUG</div><div class="bv-month">SEP</div>
          <div class="bv-month">OCT</div><div class="bv-month">NOV</div><div class="bv-month">DEC</div>
        </div>
        <div class="bv-legend">
          <div class="bv-leg-item"><div class="bv-leg-swatch" style="background:#c95050;border-radius:50%;"></div> Billing spikes (over-register)</div>
          <div class="bv-leg-item"><div class="bv-leg-swatch" style="background:rgba(255,255,255,0.2);border-radius:50%;"></div> Normal consumption</div>
        </div>

        <div class="bv-section-title">After WST Flow Optimization</div>
        <div class="bv-label" style="color:rgba(77,184,122,0.8);">Optimized Building — Steady, Predictable Billing</div>

        <!-- After chart: SVG flat area/line -->
        <svg class="bv-svg-chart" viewBox="0 0 560 160" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
          <defs>
            <linearGradient id="grad-good" x1="0" y1="0" x2="0" y2="1">
              <stop offset="0%" stop-color="#2d5c42" stop-opacity="0.7"/>
              <stop offset="100%" stop-color="#2d5c42" stop-opacity="0.1"/>
            </linearGradient>
          </defs>
          <!-- Grid lines -->
          <line x1="0" y1="40"  x2="560" y2="40"  stroke="rgba(255,255,255,0.06)" stroke-width="1"/>
          <line x1="0" y1="80"  x2="560" y2="80"  stroke="rgba(255,255,255,0.06)" stroke-width="1"/>
          <line x1="0" y1="120" x2="560" y2="120" stroke="rgba(255,255,255,0.06)" stroke-width="1"/>
          <!-- Area fill -->
          <path d="M0,90 L46,88 L92,92 L138,87 L184,90 L230,89 L276,91 L322,88 L368,90 L414,89 L460,91 L506,88 L560,90 L560,155 L0,155 Z"
                fill="url(#grad-good)"/>
          <!-- Line (very flat) -->
          <path d="M0,90 L46,88 L92,92 L138,87 L184,90 L230,89 L276,91 L322,88 L368,90 L414,89 L460,91 L506,88 L560,90"
                fill="none" stroke="#4db87a" stroke-width="2.5" stroke-linejoin="round"/>
          <!-- Data points -->
          <circle cx="0"   cy="90" r="3.5" fill="#4db87a"/>
          <circle cx="46"  cy="88" r="3.5" fill="#4db87a"/>
          <circle cx="92"  cy="92" r="3.5" fill="#4db87a"/>
          <circle cx="138" cy="87" r="3.5" fill="#4db87a"/>
          <circle cx="184" cy="90" r="3.5" fill="#4db87a"/>
          <circle cx="230" cy="89" r="3.5" fill="#4db87a"/>
          <circle cx="276" cy="91" r="3.5" fill="#4db87a"/>
          <circle cx="322" cy="88" r="3.5" fill="#4db87a"/>
          <circle cx="368" cy="90" r="3.5" fill="#4db87a"/>
          <circle cx="414" cy="89" r="3.5" fill="#4db87a"/>
          <circle cx="460" cy="91" r="3.5" fill="#4db87a"/>
          <circle cx="506" cy="88" r="3.5" fill="#4db87a"/>
        </svg>
        <div class="bv-axis">
          <div class="bv-month">JAN</div><div class="bv-month">FEB</div><div class="bv-month">MAR</div>
          <div class="bv-month">APR</div><div class="bv-month">MAY</div><div class="bv-month">JUN</div>
          <div class="bv-month">JUL</div><div class="bv-month">AUG</div><div class="bv-month">SEP</div>
          <div class="bv-month">OCT</div><div class="bv-month">NOV</div><div class="bv-month">DEC</div>
        </div>
      </div>
    </div>

    <div>
      <!-- Step-by-step billing logic -->
      <div class="billing-explainer fade-up">
        <div class="billing-explainer-title">How flow precision creates predictable billing</div>
        <div class="billing-steps">
          <div class="billing-step">
            <div class="bs-num">01</div>
            <div class="bs-body">
              <div class="bs-title">Pressure spikes distort meter readings</div>
              <div class="bs-text">Unregulated pressure (often 100–120 PSI) causes turbines to over-spin, registering more volume than actually flows through the pipe. Your bill reflects the meter — not reality.</div>
              <span class="bs-result">Root cause identified</span>
            </div>
          </div>
          <div class="billing-step">
            <div class="bs-num">02</div>
            <div class="bs-body">
              <div class="bs-title">WST regulates to 60–75 PSI</div>
              <div class="bs-text">Precision PRV installation brings pressure into the optimal operating range — reducing turbine overshoot, extending fixture life, and eliminating silent waste from micro-leaks.</div>
              <span class="bs-result">Register accuracy restored</span>
            </div>
          </div>
          <div class="billing-step">
            <div class="bs-num">03</div>
            <div class="bs-body">
              <div class="bs-title">Your meter now mirrors actual consumption</div>
              <div class="bs-text">With stable pressure, your meter registers true usage — no spikes, no drift. The municipal meter and your building's flow data align, meaning invoices reflect what you actually consumed.</div>
              <span class="bs-result">Billing accuracy achieved</span>
            </div>
          </div>
          <div class="billing-step">
            <div class="bs-num">04</div>
            <div class="bs-body">
              <div class="bs-title">Month-over-month stability for budgeting</div>
              <div class="bs-text">Stable pressure = stable flow = stable bills. Asset managers and CFOs can forecast water costs accurately, eliminating the "surprise" line item from utility budgets.</div>
              <span class="bs-result">Predictable OpEx</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── COMPARISON TABLE ─── -->
<section class="sec sec-o" id="comparison">
  <div class="eye">Side-by-Side Comparison</div>
  <h2 class="sh">Without flow management<br><em>vs. with.</em></h2>
  <p class="sub">The difference between an unoptimized and optimized building isn't just water — it's financial predictability, asset value, and ESG standing.</p>

  <div class="two-60" style="align-items:start;">
    <div>
      <table class="compare-table" style="width:100%;">
        <thead>
          <tr>
            <th>Factor</th>
            <th>Without Flow Management</th>
            <th class="th-good">With WST Flow Management</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Meter accuracy</td>
            <td class="bad">Inaccurate — over-registers</td>
            <td class="good">Register accurate</td>
          </tr>
          <tr>
            <td>Supply pressure</td>
            <td class="bad">120 PSI, unregulated</td>
            <td class="good">60–75 PSI, optimized</td>
          </tr>
          <tr>
            <td>Fixture wear</td>
            <td class="bad">Accelerated — high pressure</td>
            <td class="good">Extended asset life</td>
          </tr>
          <tr>
            <td>Monthly billing</td>
            <td class="bad">Volatile — daily spikes</td>
            <td class="good">Steady &amp; predictable</td>
          </tr>
          <tr>
            <td>ESG / GRESB reporting</td>
            <td class="bad">Estimated / unreliable data</td>
            <td class="good">Verified sub-metered data</td>
          </tr>
          <tr>
            <td>Water cost as OpEx</td>
            <td class="bad">Unpredictable line item</td>
            <td class="good">Forecastable &amp; managed</td>
          </tr>
          <tr>
            <td>Leak detection</td>
            <td class="bad">Silent — masked by spikes</td>
            <td class="good">Early detection enabled</td>
          </tr>
          <tr>
            <td>Retroactive recovery</td>
            <td class="bad">Overcharges unrecovered</td>
            <td class="good">Claims filed on your behalf</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div>
      <div class="industry-stats">
        <div class="industry-stats-title">Water Metering Industry Insights</div>
        <div class="istat">
          <div class="istat-val">30%+</div>
          <div class="istat-label">of global water is lost as "non-revenue water" — mainly due to inaccurate or outdated metering.</div>
          <div class="istat-source">World Bank, 2022</div>
        </div>
        <div class="istat">
          <div class="istat-val">10–20%</div>
          <div class="istat-label">typical water savings after installing advanced (smart) meters in commercial buildings.</div>
          <div class="istat-source">EPA, 2023</div>
        </div>
        <div class="istat">
          <div class="istat-val">15–25%</div>
          <div class="istat-label">billing inaccuracies attributable to manual readings and aging meters.</div>
          <div class="istat-source">AWWA, 2022</div>
        </div>
        <div class="istat">
          <div class="istat-val">&lt;2 yr</div>
          <div class="istat-label">payback on modern water metering solutions for commercial properties.</div>
          <div class="istat-source">McKinsey, 2023</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── WHAT YOU GAIN ─── -->
<section class="sec sec-w" id="outcomes">
  <div class="eye">Controlled Flow. Trusted Data.</div>
  <h2 class="sh">Everything that changes when<br><em>your flow is precise.</em></h2>
  <p class="sub">Eliminate guesswork and overuse with precision-calibrated water metering that powers intelligent flow management — and delivers real outcomes you can document.</p>

  <div class="feature-grid">
    <div class="feature-card">
      <div class="feature-card-icon">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><path d="M10 2v16M2 10h16"/><circle cx="10" cy="10" r="8"/></svg>
      </div>
      <div class="feature-card-title">Accurate Flow Control Logic</div>
      <div class="feature-card-text">Inline metering provides real-time flow data that drives control decisions, eliminating the guesswork that leads to overbilling and over-pressurization.</div>
      <div class="feature-card-metric">Real-time<small>Flow intelligence</small></div>
    </div>
    <div class="feature-card">
      <div class="feature-card-icon">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><path d="M10 2l2.4 7.4H20l-6.2 4.5 2.4 7.4L10 17l-6.2 4.3 2.4-7.4L0 9.4h7.6z"/></svg>
      </div>
      <div class="feature-card-title">Early Leak Detection</div>
      <div class="feature-card-text">Stable baseline flow makes anomalies visible immediately — catching pipe leaks, toilet running, and fixture failures before they compound into large charges.</div>
      <div class="feature-card-metric">Days<small>Typical detection vs. months undetected</small></div>
    </div>
    <div class="feature-card">
      <div class="feature-card-icon">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><path d="M4 14l4-4 4 4 4-8"/></svg>
      </div>
      <div class="feature-card-title">ESG-Grade Usage Reporting</div>
      <div class="feature-card-text">Sub-metered, verified data satisfies GRESB sub-metering requirements and provides the documentation layer needed for institutional ESG reporting.</div>
      <div class="feature-card-metric">GRESB<small>Sub-metering credit eligible</small></div>
    </div>
    <div class="feature-card">
      <div class="feature-card-icon">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><circle cx="10" cy="10" r="8"/><path d="M10 6v4l3 3"/></svg>
      </div>
      <div class="feature-card-title">Verified Savings Validation</div>
      <div class="feature-card-text">WST documents every billing period before and after optimization — giving you a defensible record of savings for stakeholders, lenders, and reporting.</div>
      <div class="feature-card-metric">10–35%<small>Documented annual savings</small></div>
    </div>
    <div class="feature-card">
      <div class="feature-card-icon">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><rect x="3" y="3" width="14" height="14" rx="1"/><path d="M7 10h6M7 7h6M7 13h4"/></svg>
      </div>
      <div class="feature-card-title">Predictable Budget Forecasting</div>
      <div class="feature-card-text">When water costs stabilize, they become a manageable OpEx line — not a volatile unknown. Asset managers report material improvement in budget accuracy post-optimization.</div>
      <div class="feature-card-metric">±3–5%<small>Typical billing variance after optimization</small></div>
    </div>
    <div class="feature-card">
      <div class="feature-card-icon">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><path d="M10 2c0 0-7 4-7 10a7 7 0 0014 0c0-6-7-10-7-10z"/></svg>
      </div>
      <div class="feature-card-title">Extended Pipe &amp; Fixture Life</div>
      <div class="feature-card-text">Regulated pressure reduces hydraulic stress on pipes, valves, and fixtures — deferring capital expenditures and protecting asset value across the portfolio.</div>
      <div class="feature-card-metric">+5–10 yr<small>Typical fixture life extension</small></div>
    </div>
  </div>
</section>

<!-- ─── TESTIMONIAL ─── -->
<section class="sec sec-d" id="results">
  <div class="two">
    <div>
      <div class="eye" style="color:rgba(45,92,66,0.8);">Client Result</div>
      <h2 class="sh" style="color:var(--white);">$2,400/month saved.<br><em>System pressure stabilized.</em></h2>
      <p class="sub sub-lt">The financial result was significant — but the operational improvement was what changed how the team managed the facility day-to-day.</p>

      <div class="checklist" style="border-color:rgba(255,255,255,0.08);">
        <div class="cl-item" style="border-color:rgba(255,255,255,0.07);color:rgba(255,255,255,0.7);">
          <div class="cl-check"><svg viewBox="0 0 9 9" fill="none" stroke="white" stroke-width="2"><path d="M1.5 4.5L3.5 7 7.5 2"/></svg></div>
          Meter accuracy confirmed within 2-week assessment
        </div>
        <div class="cl-item" style="border-color:rgba(255,255,255,0.07);color:rgba(255,255,255,0.7);">
          <div class="cl-check"><svg viewBox="0 0 9 9" fill="none" stroke="white" stroke-width="2"><path d="M1.5 4.5L3.5 7 7.5 2"/></svg></div>
          Pressure regulated from 112 PSI to 68 PSI
        </div>
        <div class="cl-item" style="border-color:rgba(255,255,255,0.07);color:rgba(255,255,255,0.7);">
          <div class="cl-check"><svg viewBox="0 0 9 9" fill="none" stroke="white" stroke-width="2"><path d="M1.5 4.5L3.5 7 7.5 2"/></svg></div>
          Retroactive billing claim filed — 14 months recovered
        </div>
        <div class="cl-item" style="border-color:rgba(255,255,255,0.07);color:rgba(255,255,255,0.7);">
          <div class="cl-check"><svg viewBox="0 0 9 9" fill="none" stroke="white" stroke-width="2"><path d="M1.5 4.5L3.5 7 7.5 2"/></svg></div>
          Sub-meters installed — GRESB data now GRESB-reportable
        </div>
        <div class="cl-item" style="border-color:rgba(255,255,255,0.07);color:rgba(255,255,255,0.7);">
          <div class="cl-check"><svg viewBox="0 0 9 9" fill="none" stroke="white" stroke-width="2"><path d="M1.5 4.5L3.5 7 7.5 2"/></svg></div>
          Monthly bill variance reduced from ±32% to ±4%
        </div>
      </div>
    </div>

    <div>
      <div class="quote-block">
        <div class="quote-text">"Water metering accuracy through flow control saved us $2,400/month — but more importantly, it stabilized our system pressure."</div>
        <div class="quote-attr">— President, Panna to Go Manufacturing</div>
      </div>

      <div class="quote-block" style="margin-top:16px;border-left-color:rgba(45,92,66,0.4);">
        <div class="quote-text" style="font-size:18px;">"Accurate, real-time water metering is not just a compliance or billing issue — it's a strategic advantage for cost control, sustainability, and asset value."</div>
        <div class="quote-attr">— Director of Engineering, Classic Properties</div>
      </div>
    </div>
  </div>
</section>

<!-- ─── FAQ ─── -->
<section class="sec sec-w" id="faq">
  <div class="two">
    <div>
      <div class="eye">Common Questions</div>
      <h2 class="sh">Answers about meter accuracy<br><em>&amp; predictable billing.</em></h2>
      <p class="sub">These questions are asked by property managers, asset managers, and CFOs evaluating whether a water meter accuracy audit makes sense for their portfolio.</p>
    </div>
    <div>
      <div class="faq-list">

        <div class="faq-item open">
          <div class="faq-q" onclick="toggleFaq(this)">How much can water meter accuracy correction save a commercial building?</div>
          <div class="faq-a">Correcting an inaccurate water meter typically saves 10–35% of annual water utility fees. For large commercial properties, this commonly translates to $1,800–$2,400 per month or more — depending on building size, current pressure, and meter age.</div>
        </div>

        <div class="faq-item">
          <div class="faq-q" onclick="toggleFaq(this)">How does flow optimization create predictable monthly water bills?</div>
          <div class="faq-a">By regulating pressure to 60–75 PSI and installing precision inline meters, consumption becomes steady and predictable rather than spiking. This mirrors the municipal register accurately, eliminating billing surprises caused by pressure variance, turbine overshoot, or meter drift. After optimization, buildings typically see billing variance drop from ±25–35% to ±3–5% month over month.</div>
        </div>

        <div class="faq-item">
          <div class="faq-q" onclick="toggleFaq(this)">Can I recover past water overcharges from the utility?</div>
          <div class="faq-a">Yes. When meter error is documented and confirmed, WST prepares and submits retroactive billing correction claims to the utility on your behalf. Recoveries often span 12–18 months of prior overcharges, representing a meaningful one-time recovery alongside ongoing savings.</div>
        </div>

        <div class="faq-item">
          <div class="faq-q" onclick="toggleFaq(this)">What is the payback period for a water meter accuracy audit?</div>
          <div class="faq-a">Most audits pay for themselves within 12 months. Industry data from McKinsey (2023) puts payback on modern water metering solutions at under 2 years for commercial properties. With retroactive recovery included, many properties see full payback before the first year is complete.</div>
        </div>

        <div class="faq-item">
          <div class="faq-q" onclick="toggleFaq(this)">What kinds of properties benefit most from flow management?</div>
          <div class="faq-a">Multi-family residential, office buildings, hotels, manufacturing facilities, and healthcare campuses all benefit significantly — especially where meters are 5+ years old, pressure is unregulated, or utility bills have been rising without explanation. The audit itself provides a clear answer: if there's error, correction pays. If not, there's no cost.</div>
        </div>

        <div class="faq-item">
          <div class="faq-q" onclick="toggleFaq(this)">Does water meter accuracy qualify for GRESB credit?</div>
          <div class="faq-a">Yes. Sub-metering installation satisfies GRESB sub-metering requirements and produces the verified consumption data required for institutional ESG reporting. WST's documentation is structured to support GRESB submission directly.</div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- ─── FINAL CTA ─── -->
<div class="cs">
  <div>
    <h2 class="cs-t">Is your meter<br><em>costing you money?</em></h2>
    <p class="cs-s">A meter accuracy assessment takes one site visit and pays for itself many times over when errors are found. Most audits uncover savings within the first 90 days.</p>
  </div>
  <a href="{{ route('contact') }}" class="cs-btn">Request Flow Optimization Assessment</a>
</div>
@endsection

@push('scripts')
<script>
  // Intro rule scroll animation
  document.addEventListener('DOMContentLoaded', () => {
    const rule = document.getElementById('introRule');
    if (!rule) return;
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          rule.classList.add('visible');
          observer.unobserve(rule);
        }
      },
      { threshold: 0.2 }
    );
    observer.observe(rule);
  });
</script>
@endpush