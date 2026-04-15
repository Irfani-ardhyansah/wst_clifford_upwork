@extends('layouts.app')

@section('title', 'ESG & GRESB Water Compliance Strategy for CRE Portfolios | WST')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/gresb_compliance.css') }}">
@endpush

@section('content')
<!-- HERO -->
<div class="inner-hero">
  <div class="ihero-bg"></div>
  <div class="ihero-content">
    <div class="ihero-bc">
      <a href="/services">Services</a>
      <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 1l4 4-4 4"/></svg>
      <span>ESG &amp; GRESB Strategy</span>
    </div>
    <div class="ihero-eye">Service — ESG &amp; GRESB Compliance Strategy</div>
    <h1 class="ihero-h1">Your GRESB Water Score Doesn't Reflect<br><em>What You've Already Achieved.</em></h1>
    <p class="ihero-sub">Hotel REIT portfolios routinely carry verified water savings in the field that never reach their GRESB water score. The performance exists. The documentation gap is the problem — and it is fixable within one reporting cycle.</p>
    <div class="ihero-ctas">
      <a href="{{route('contact')}}" class="btn-dark-primary">Request a GRESB Assessment</a>
      <a href="#the-gap" class="btn-dark-ghost">See the Gap ↓</a>
    </div>
  </div>
  <div class="stat-strip">
    <div class="stat-strip-cell"><div class="ssc-num accent">67.7</div><div class="ssc-lbl">DiamondRock water indicator score, GRESB 2025</div></div>
    <div class="stat-strip-cell"><div class="ssc-num">86/100</div><div class="ssc-lbl">DiamondRock overall GRESB score — 4-star</div></div>
    <div class="stat-strip-cell"><div class="ssc-num accent">25.3%</div><div class="ssc-lbl">Verified water reduction — WST documented</div></div>
    <div class="stat-strip-cell"><div class="ssc-num">13</div><div class="ssc-lbl">Performance points remaining in scoring model</div></div>
  </div>
</div>
<!-- SCORE GAP -->
<section class="sec sec-o" id="the-gap">
  <div class="two" style="margin-bottom:40px;">
    <div>
      <p class="eye">Performance Indicator Analysis</p>
      <h2 class="sh">Water is the weakest indicator<br><em>in most hotel REIT portfolios.</em></h2>
      <p class="sub">Across the DiamondRock portfolio, every management indicator scores at or near 100%. The gap is entirely in Performance — and within Performance, Water and Waste are the floor.</p>
      <!-- Indicator bars -->
      <div style="margin-top:8px;">
        <div style="display:flex;align-items:center;gap:10px;padding:9px 0;border-bottom:1px solid var(--border-l);">
          <span style="font-size:11px;font-weight:600;color:var(--black);width:160px;flex-shrink:0;">Data Monitoring</span>
          <div style="flex:1;height:5px;background:rgba(0,0,0,.07);border-radius:2px;"><div style="width:100%;height:100%;background:var(--green-lt);border-radius:2px;"></div></div>
          <span style="font-size:11px;font-weight:700;color:var(--green-lt);width:40px;text-align:right;">100%</span>
        </div>
        <div style="display:flex;align-items:center;gap:10px;padding:9px 0;border-bottom:1px solid var(--border-l);">
          <span style="font-size:11px;font-weight:600;color:var(--black);width:160px;flex-shrink:0;">Building Certs</span>
          <div style="flex:1;height:5px;background:rgba(0,0,0,.07);border-radius:2px;"><div style="width:90%;height:100%;background:var(--green-lt);border-radius:2px;"></div></div>
          <span style="font-size:11px;font-weight:700;color:var(--green-lt);width:40px;text-align:right;">90.1%</span>
        </div>
        <div style="display:flex;align-items:center;gap:10px;padding:9px 0;border-bottom:1px solid var(--border-l);">
          <span style="font-size:11px;font-weight:600;color:var(--black);width:160px;flex-shrink:0;">GHG</span>
          <div style="flex:1;height:5px;background:rgba(0,0,0,.07);border-radius:2px;"><div style="width:79%;height:100%;background:#b8860b;border-radius:2px;"></div></div>
          <span style="font-size:11px;font-weight:700;color:#b8860b;width:40px;text-align:right;">79.0%</span>
        </div>
        <div style="display:flex;align-items:center;gap:10px;padding:9px 0;border-bottom:1px solid var(--border-l);">
          <span style="font-size:11px;font-weight:600;color:var(--black);width:160px;flex-shrink:0;">Energy</span>
          <div style="flex:1;height:5px;background:rgba(0,0,0,.07);border-radius:2px;"><div style="width:70.6%;height:100%;background:#b8860b;border-radius:2px;"></div></div>
          <span style="font-size:11px;font-weight:700;color:#b8860b;width:40px;text-align:right;">70.6%</span>
        </div>
        <div style="display:flex;align-items:center;gap:10px;padding:9px 0;border-bottom:1px solid var(--border-l);background:rgba(184,134,11,.04);">
          <span style="font-size:11px;font-weight:700;color:#b8860b;width:160px;flex-shrink:0;">Water ◀</span>
          <div style="flex:1;height:5px;background:rgba(0,0,0,.07);border-radius:2px;"><div style="width:67.7%;height:100%;background:#c0392b;border-radius:2px;"></div></div>
          <span style="font-size:11px;font-weight:700;color:#c0392b;width:40px;text-align:right;">67.7%</span>
        </div>
        <div style="display:flex;align-items:center;gap:10px;padding:9px 0;background:rgba(184,134,11,.04);">
          <span style="font-size:11px;font-weight:700;color:#b8860b;width:160px;flex-shrink:0;">Waste ◀</span>
          <div style="flex:1;height:5px;background:rgba(0,0,0,.07);border-radius:2px;"><div style="width:67.1%;height:100%;background:#c0392b;border-radius:2px;"></div></div>
          <span style="font-size:11px;font-weight:700;color:#c0392b;width:40px;text-align:right;">67.1%</span>
        </div>
      </div>
      <p style="font-size:10px;color:var(--gray-1);border-top:1px solid var(--border-l);padding-top:10px;margin-top:12px;line-height:1.55;">Source: DiamondRock Hospitality Company · GRESB 2025 Benchmark Report</p>
    </div>
    <div>
      <p class="eye">Score Trajectory</p>
      <div style="background:var(--white);border:1px solid var(--border-l);padding:28px;margin-bottom:2px;">
        <div style="display:flex;align-items:flex-end;gap:8px;height:80px;margin-bottom:12px;">
          <div style="display:flex;flex-direction:column;align-items:center;gap:4px;flex:1;">
            <div style="width:100%;background:rgba(45,92,66,.12);border-radius:2px 2px 0 0;height:55%;display:flex;align-items:flex-start;justify-content:center;padding-top:4px;"><span style="font-size:11px;font-weight:700;color:var(--green-lt);">82</span></div>
            <span style="font-size:9px;color:var(--gray-1);font-weight:600;">2022</span>
          </div>
          <div style="display:flex;flex-direction:column;align-items:center;gap:4px;flex:1;">
            <div style="width:100%;background:rgba(45,92,66,.12);border-radius:2px 2px 0 0;height:72%;display:flex;align-items:flex-start;justify-content:center;padding-top:4px;"><span style="font-size:11px;font-weight:700;color:var(--green-lt);">85</span></div>
            <span style="font-size:9px;color:var(--gray-1);font-weight:600;">2023</span>
          </div>
          <div style="display:flex;flex-direction:column;align-items:center;gap:4px;flex:1;">
            <div style="width:100%;background:rgba(45,92,66,.15);border-radius:2px 2px 0 0;height:88%;display:flex;align-items:flex-start;justify-content:center;padding-top:4px;"><span style="font-size:11px;font-weight:700;color:var(--green-lt);">86</span></div>
            <span style="font-size:9px;color:var(--gray-1);font-weight:600;">2024</span>
          </div>
          <div style="display:flex;flex-direction:column;align-items:center;gap:4px;flex:1;">
            <div style="width:100%;background:var(--green-lt);border-radius:2px 2px 0 0;height:88%;display:flex;align-items:flex-start;justify-content:center;padding-top:4px;"><span style="font-size:11px;font-weight:700;color:#fff;">86</span></div>
            <span style="font-size:9px;color:var(--gray-1);font-weight:600;">2025</span>
          </div>
        </div>
        <div style="font-size:11px;color:#b8860b;background:rgba(184,134,11,.08);border-left:2px solid #b8860b;padding:8px 12px;line-height:1.55;">Score flat for two consecutive years. Management is effectively maxed at 29/30. Every remaining point is in Performance.</div>
      </div>
      <div style="background:var(--white);border:1px solid var(--border-l);padding:20px;">
        <p style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--gray-1);margin-bottom:12px;">Peer Ranking — Hotel / Americas</p>
        <div style="display:flex;justify-content:space-between;align-items:baseline;padding:8px 0;border-bottom:1px solid var(--border-l);">
          <span style="font-size:12px;color:var(--gray-1);">Hotel / Americas</span>
          <span style="font-size:14px;font-weight:700;color:var(--black);">3rd of 9</span>
          <span style="font-size:9px;font-weight:700;padding:2px 7px;background:rgba(184,134,11,.1);color:#b8860b;border-radius:3px;">FLAT</span>
        </div>
        <div style="display:flex;justify-content:space-between;align-items:baseline;padding:8px 0;border-bottom:1px solid var(--border-l);">
          <span style="font-size:12px;color:var(--gray-1);">Hotel / Listed</span>
          <span style="font-size:14px;font-weight:700;color:var(--black);">5th of 18</span>
          <span style="font-size:9px;font-weight:700;padding:2px 7px;background:rgba(184,134,11,.1);color:#b8860b;border-radius:3px;">FLAT</span>
        </div>
        <div style="display:flex;justify-content:space-between;align-items:baseline;padding:8px 0;">
          <span style="font-size:12px;color:var(--gray-1);">Water → 85–95%</span>
          <span style="font-size:14px;font-weight:700;color:var(--green-lt);">Est. +3–6 pts</span>
          <span style="font-size:9px;font-weight:700;padding:2px 7px;background:rgba(45,92,66,.1);color:var(--green-lt);border-radius:3px;">ADDRESSABLE</span>
        </div>
      </div>
    </div>
  </div>

  <div class="hl-box">
    <p>Water is specifically addressable in a way that Waste (behavioural) and Energy (capital expenditure) are not. IoT monitoring + bill validation + GRESB-formatted documentation can move water from <strong>67.7% toward 90%+</strong> — without major capital spend and within a single reporting cycle.</p>
  </div>
</section>

<!-- THE CONTRADICTION -->
<section class="sec sec-dk">
  <div style="margin-bottom:40px;">
    <p class="eye" style="color:rgba(255,255,255,.35);">The Core Problem</p>
    <h2 class="sh sh--white">The savings are real.<br><em>The score doesn't know that yet.</em></h2>
    <p class="sub sub--white">Verified field performance and GRESB score are disconnected because the loop between operational savings and documentation has never been closed across the full portfolio.</p>
  </div>
  <div class="contra-grid" style="margin-bottom:24px;">
    <div class="contra-half cl">
      <div class="contra-lbl">What the field shows</div>
      <div class="contra-big">25.3%</div>
      <div class="contra-note">Verified water consumption reduction · The Westin Fort Lauderdale Beach Resort · DiamondRock Hospitality · Documented by WST</div>
    </div>
    <div class="contra-half cr">
      <div class="contra-lbl">What GRESB reflects</div>
      <div class="contra-big">67.7%</div>
      <div class="contra-note">Portfolio-level water indicator score · DiamondRock 2025 GRESB Benchmark Report · Second-lowest performance indicator</div>
    </div>
  </div>
  <div class="contra-gap">
    <div class="contra-gap-txt">
      <strong>This gap is not a performance problem. It is a coverage and documentation problem.</strong><br>
      Verified savings at one property don't improve the portfolio-level GRESB score. Every asset needs the same instrumentation, documentation, and GRESB-formatted data — before the score moves.
    </div>
  </div>
</section>

<!-- THREE INDICATORS -->
<section class="sec sec-w">
  <div class="two">
    <div>
      <p class="eye">GRESB Water Indicators</p>
      <h2 class="sh">WST addresses three indicators<br><em>simultaneously.</em></h2>
      <p class="sub">Most water programmes address one indicator at a time. WST's methodology closes WT1, MR3, and RA4 through a single coordinated engagement — covering data, monitoring, and risk documentation in one programme.</p>
      <div class="ind-row">
        <div class="ind-code">WT1</div>
        <div>
          <div class="ind-name">Water Data Coverage</div>
          <div class="ind-desc">The highest-weighted water indicator (up to 4 points). Ara AI closes coverage gaps automatically — ensuring every asset submits verified consumption data, not estimates.</div>
        </div>
        <div class="ind-pts">4 pts</div>
      </div>
      <div class="ind-row">
        <div class="ind-code">MR3</div>
        <div>
          <div class="ind-name">Monitoring &amp; Targets</div>
          <div class="ind-desc">Real-time IoT monitoring with documented targets satisfies MR3. Every alert is logged with cost impact — creating the audit trail GRESB validators expect.</div>
        </div>
        <div class="ind-pts">2 pts</div>
      </div>
      <div class="ind-row" style="border-bottom:none;">
        <div class="ind-code">RA4</div>
        <div>
          <div class="ind-name">Risk Assessment</div>
          <div class="ind-desc">Water risk quantified at the asset level. Infrastructure risk — leaks, meter accuracy, cooling tower bleed — documented in the format RA4 requires. Currently scores 75.3% on the DiamondRock portfolio.</div>
        </div>
        <div class="ind-pts">1 pt</div>
      </div>
    </div>
    <div>
      <div style="background:var(--off-white);border:1px solid var(--border-l);padding:32px;margin-bottom:2px;">
        <p class="eye">WST's GRESB Methodology</p>
        <div class="check-list">
          <div class="check-item"><span class="check-icon">✓</span>Automated WT1 data collection across the full portfolio via Ara AI</div>
          <div class="check-item"><span class="check-icon">✓</span>IoT monitoring layer generating verified consumption baselines (MR3)</div>
          <div class="check-item"><span class="check-icon">✓</span>Cost-quantified anomaly alerts providing RA4 risk documentation</div>
          <div class="check-item"><span class="check-icon">✓</span>GRESB-formatted submission package — not adapted, built for it</div>
          <div class="check-item"><span class="check-icon">✓</span>Like-for-like performance tracking for CDP and LP disclosure</div>
          <div class="check-item"><span class="check-icon">✓</span>27% average water use reduction documented post-programme</div>
        </div>
      </div>
      <div style="background:var(--black);padding:24px;">
        <p style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--green-lt);margin-bottom:8px;">GRESB Solution Provider Partner</p>
        <p style="font-size:12px;color:rgba(255,255,255,.38);line-height:1.75;">WST is a GRESB Solution Provider Partner. Our datasets are structured to satisfy GRESB submission requirements — not adapted from operational reports after the fact. 150+ institutional investors use GRESB benchmarks in capital decisions.</p>
      </div>
    </div>
  </div>
</section>

<!-- DIAMONDROCK PROOF -->
<div class="proof-strip">
  <div class="proof-inner">
    <div class="proof-left">
      <div class="proof-num">25.3%</div>
      <div class="proof-lbl">Water consumption reduction — verified by WST</div>
      <div class="proof-num">$2.3M</div>
      <div class="proof-lbl">Savings documented — 31 assets — GRESB reported</div>
    </div>
    <div class="proof-right">
      <div class="quote-bl quote-bl--dark" style="margin-bottom:20px;">
        <p>"Verified savings across 31 assets. Reported at the GRESB level. WST gave us the data to have a different conversation with our investors."</p>
        <cite>Portfolio Manager · DiamondRock Hospitality Company</cite>
      </div>
      <p style="font-size:12px;color:rgba(255,255,255,.28);line-height:1.7;">DiamondRock holds a 4-star GRESB rating and an A Public Disclosure rating — first in its US Hotel peer group. Their water score remains at 67.7%. This is the gap WST exists to close: verified performance that hasn't scaled across all 31 assets in the documentation.</p>
    </div>
  </div>
</div>

<!-- ENGAGEMENT MODEL -->
<section class="sec sec-w">
  <div style="max-width:720px;margin-bottom:48px;">
    <p class="eye">Engagement Model</p>
    <h2 class="sh">Two ways to engage WST.<br><em>Both start with a 90-minute session.</em></h2>
    <p class="sub">WST structures around your investment cycle — not a product catalog. The starting point is always a working session to map your current water data coverage, identify the GRESB gaps, and quantify the NOI impact of closing them.</p>
  </div>
  <div class="tiers">
    <div class="tier">
      <div class="tier-lbl">Project-Based</div>
      <div class="tier-name">GRESB Water Gap Assessment</div>
      <div class="tier-desc">A scoped engagement producing audit-grade findings, GRESB-formatted water data, and a prioritised roadmap to close your indicator gaps. Designed for GRESB preparation or acquiring a verified water baseline.</div>
      <ul class="tier-list">
        <li><span class="tier-tick">✓</span>Current WT1/MR3/RA4 indicator gap analysis</li>
        <li><span class="tier-tick">✓</span>Asset-level consumption data formatted for GRESB submission</li>
        <li><span class="tier-tick">✓</span>Water intensity benchmarking vs. Hotel peer group</li>
        <li><span class="tier-tick">✓</span>Prioritised improvement roadmap with score impact estimates</li>
        <li><span class="tier-tick">✓</span>Investment committee–ready findings documentation</li>
      </ul>
      <a href="{{route('contact')}}" class="tier-cta">Request Scope &amp; Proposal</a>
    </div>
    <div class="tier tier--featured">
      <div class="tier-lbl">Retained Advisory</div>
      <div class="tier-name">Ongoing GRESB Water Programme</div>
      <div class="tier-desc">A continuous advisory relationship providing automated GRESB data collection via Ara AI, real-time monitoring, and annual submission support. WST functions as your embedded water intelligence layer.</div>
      <ul class="tier-list">
        <li><span class="tier-tick">✓</span>Ara AI automated utility bill collection — portfolio-wide</li>
        <li><span class="tier-tick">✓</span>Real-time IoT monitoring with anomaly alerts and cost translation</li>
        <li><span class="tier-tick">✓</span>Annual GRESB water data preparation and submission support</li>
        <li><span class="tier-tick">✓</span>Quarterly portfolio water performance reporting</li>
        <li><span class="tier-tick">✓</span>Verified savings documentation for IC and ESG disclosure</li>
        <li><span class="tier-tick">✓</span>Investment committee briefings and LP disclosure support</li>
      </ul>
      <a href="{{route('contact')}}" class="tier-cta">Discuss Retained Engagement</a>
    </div>
  </div>
</section>

<!-- CTA -->
<div class="cs">
  <div>
    <div class="cs-t">What does your GRESB water score<br><em>say about your portfolio?</em></div>
    <p class="cs-s">A 90-minute portfolio visibility session maps your current water data coverage, identifies the GRESB gaps, and outlines the NOI impact of closing them. No obligation.</p>
  </div>
  <a href="{{route('contact')}}" class="cs-btn">Schedule Assessment</a>
</div>


@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Intro rule scroll animation
  document.addEventListener('DOMContentLoaded', () => {
    const rule = document.getElementById('ctIntroRule');
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

  // CoC Chart
  document.addEventListener('DOMContentLoaded', () => {
    new Chart(
      document.getElementById('instantCocChart').getContext('2d'),
      {
        type: 'line',
        data: {
          labels: ['M1','M2','M3','M4','M5','M6'],
          datasets: [
            {
              label: 'CoC Before',
              data: [2.5,2.6,2.6,2.7,2.8,2.9],
              borderColor: '#FBBF24',
              backgroundColor: 'transparent',
              pointRadius: 3,
              borderWidth: 2,
              tension: 0.3
            },
            {
              label: 'CoC After',
              data: [2.8,3.0,3.1,3.2,3.4,3.5],
              borderColor: '#10B981',
              backgroundColor: 'transparent',
              pointRadius: 3,
              borderWidth: 2,
              tension: 0.3
            },
            {
              label: 'Water Saved Before',
              data: [20000,25000,30000,35000,38000,40000],
              borderColor: '#3B82F6',
              backgroundColor: 'transparent',
              pointStyle: 'rect',
              pointRadius: 3,
              borderWidth: 2,
              tension: 0.3,
              yAxisID: 'y1'
            },
            {
              label: 'Water Saved After',
              data: [40000,50000,60000,80000,120000,160000],
              borderColor: '#60A5FA',
              backgroundColor: 'transparent',
              pointStyle: 'rectRot',
              pointRadius: 3,
              borderWidth: 2,
              tension: 0.3,
              yAxisID: 'y1'
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              labels: { color: '#ddd' },
              position: 'bottom'
            }
          },
          scales: {
            x: {
              grid: { display: false },
              ticks: { color: '#ccc' }
            },
            y: {
              position: 'left',
              grid: { color: 'rgba(255,255,255,0.1)' },
              ticks: { color: '#FBBF24' },
              title: { display: true, text: 'CoC Ratio', color: '#FBBF24' }
            },
            y1: {
              position: 'right',
              grid: { display: false },
              ticks: { color: '#60A5FA', callback: v => (v/1000)+'k' },
              title: { display: true, text: 'Gallons Saved', color: '#60A5FA' }
            }
          }
        }
      }
    );
  });

  // Savings Profile Chart
  document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('savingsProfileChart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [
          'Chemicals or Minerals',
          'Annual Cleaning/Service',
          'Maintenance/Labour',
          'Water Discharge Cost',
          'Water',
          'Total OpEx',
          'Energy (Chiller & Pumps)'
        ],
        datasets: [{
          label: 'Savings (%)',
          data: [91, 88, 83, 23, 20, 15, 9],
          backgroundColor: '#1F2937',
          barThickness: 20
        }]
      },
      options: {
        indexAxis: 'y',
        maintainAspectRatio: false,
        plugins: {
          title: {
            display: true,
            text: 'Percentage Savings From Featured Client – Example',
            color: '#6B7280',
            font: { size: 14, weight: 'normal' }
          },
          legend: { display: false }
        },
        scales: {
          x: {
            max: 100,
            ticks: {
              callback: v => v + '%',
              color: '#374151',
              font: { size: 12 }
            },
            grid: { color: 'rgba(55,65,81,0.1)' }
          },
          y: {
            ticks: {
              color: '#374151',
              font: { size: 13 }
            },
            grid: { display: false }
          }
        }
      }
    });
  });
</script>
@endpush