@extends('layouts.app')

@section('title', 'Cooling Tower Intelligence — Water Solutions Technology')

@push('styles')
<style>
/* ═══════════════════════════════════════
   COOLING TOWER PAGE — Style matching Water Treatment page
   ═══════════════════════════════════════ */

/* ─── HERO ─── */
.ct-hero {
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #000;
  overflow: hidden;
}
.ct-hero-img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  opacity: .55;
  filter: grayscale(15%);
}
.ct-hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(0,0,0,.75) 40%, rgba(0,0,0,.45) 100%);
}
.ct-hero-content {
  position: relative;
  z-index: 10;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  text-align: left;
  padding: 0 24px;
  max-width: 780px;
}
.ct-hero-h1 {
  font-size: clamp(2.4rem, 6vw, 4.5rem);
  font-weight: 300;
  color: #fff;
  line-height: 1.12;
  letter-spacing: -0.02em;
  margin: 16px 0 20px;
}
.ct-hero-h1 em { font-style: italic; color: rgba(255,255,255,.65); }
.ct-hero-sub {
  color: rgba(255,255,255,.55);
  font-size: 1.1rem;
  font-weight: 300;
  letter-spacing: .04em;
  margin-bottom: 32px;
  max-width: 480px;
}
.ct-hero-sub strong { color: #fff; font-weight: 500; }
.ct-hero-actions { display: flex; gap: 12px; flex-wrap: wrap; }

.ct-hero-stats {
  position: absolute;
  bottom: 40px;
  right: 40px;
  background: rgba(0,0,0,.9);
  padding: 24px;
  border-radius: 12px;
  display: flex;
  gap: 24px;
  align-items: center;
}
.ct-stat { text-align: center; }
.ct-stat-val {
  font-size: 1.1rem;
  font-weight: 500;
  color: #fff;
  margin-bottom: 4px;
}
.ct-stat-lbl {
  font-size: .75rem;
  color: rgba(255,255,255,.6);
  text-transform: uppercase;
  letter-spacing: .08em;
}
.ct-stat-sep {
  width: 1px;
  height: 40px;
  background: rgba(255,255,255,.2);
}
@media(max-width:768px){
  .ct-hero-stats {
    position: relative;
    bottom: 0; right: 0;
    margin: 40px auto 0;
    max-width: 320px;
  }
}

/* ─── PROBLEM SECTION ─── */
.ct-problem-section {
  background: #080808;
  padding: 96px 24px;
  border-bottom: 1px solid rgba(255,255,255,.06);
}
.ct-problem-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: center;
}
@media(max-width:768px){ .ct-problem-inner{ grid-template-columns:1fr; gap:40px; } }

.ct-rule-wrap {
  display: flex;
  gap: 24px;
  align-items: flex-start;
  margin: 28px 0 32px;
}
.ct-rule {
  flex-shrink: 0;
  width: 3px;
  height: 120px;
  background: linear-gradient(to bottom, rgba(255,255,255,.5), rgba(255,255,255,.05));
  border-radius: 2px;
  opacity: 0;
  transform: translateY(1rem);
  transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}
.ct-rule.visible { opacity: 1; transform: translateY(0); }

.ct-check-list {
  list-style: none;
  padding: 0;
  margin: 20px 0 24px;
  display: flex;
  flex-direction: column;
  gap: 18px;
}
.ct-check-list li {
  display: flex;
  align-items: flex-start;
  gap: 14px;
  color: rgba(255,255,255,.65);
  font-size: .95rem;
  font-weight: 300;
  line-height: 1.6;
}
.ct-check-list li svg {
  flex-shrink: 0;
  width: 16px;
  height: 16px;
  margin-top: 3px;
  color: rgba(255,255,255,.5);
}
.ct-check-list li strong { color: #fff; font-weight: 500; }

.ct-problem-video {
  width: 100%;
  height: auto;
  display: block;
  border-radius: 12px;
  background: #000;
}

/* ─── OPEX CAPEX SECTION ─── */
.ct-opex-section {
  background: #000;
  padding: 96px 24px;
  border-top: 1px solid rgba(255,255,255,.06);
}
.ct-opex-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .ct-opex-inner{ grid-template-columns:1fr; gap:40px; } }

.ct-opex-body {
  color: rgba(255,255,255,.65);
  font-size: .95rem;
  font-weight: 300;
  line-height: 1.7;
  margin: 16px 0 24px;
}

.ct-cards-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 2px;
  background: rgba(255,255,255,.06);
  border-radius: 12px;
  overflow: hidden;
}
.ct-card {
  background: #111;
  padding: 32px 28px;
}
.ct-card-title {
  font-size: 1.1rem;
  font-weight: 300;
  color: #fff;
  letter-spacing: -.01em;
  margin-bottom: 20px;
}
.ct-card-list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: 12px;
}
.ct-card-list li {
  color: rgba(255,255,255,.55);
  font-size: .875rem;
  font-weight: 300;
  line-height: 1.5;
  padding-left: 12px;
  border-left: 1px solid rgba(255,255,255,.12);
}

/* ─── PROCESS SECTION ─── */
.ct-process-section {
  background: #080808;
  padding: 96px 24px;
  border-top: 1px solid rgba(255,255,255,.06);
}
.ct-process-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .ct-process-inner{ grid-template-columns:1fr; gap:40px; } }

.ct-process-steps {
  display: flex;
  flex-direction: column;
  gap: 0;
  margin: 32px 0 0;
}
.ct-process-step {
  display: flex;
  gap: 20px;
  align-items: flex-start;
  padding: 24px 0;
  border-bottom: 1px solid rgba(255,255,255,.06);
}
.ct-process-step:last-child { border-bottom: none; }
.ct-step-icon {
  flex-shrink: 0;
  width: 36px;
  height: 36px;
  border: 1px solid rgba(255,255,255,.15);
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.ct-step-icon svg {
  width: 16px;
  height: 16px;
  color: rgba(255,255,255,.6);
}
.ct-step-body {}
.ct-step-title {
  font-size: .95rem;
  font-weight: 500;
  color: #fff;
  margin-bottom: 6px;
  letter-spacing: -.01em;
}
.ct-step-desc {
  font-size: .875rem;
  color: rgba(255,255,255,.5);
  font-weight: 300;
  line-height: 1.6;
}
.ct-step-sub {
  margin: 6px 0 0;
  padding: 0;
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: 4px;
}
.ct-step-sub li {
  font-size: .8rem;
  color: rgba(255,255,255,.35);
  font-weight: 300;
  padding-left: 12px;
  border-left: 1px solid rgba(255,255,255,.1);
}

.ct-chart-wrap {
  background: #111;
  border-radius: 12px;
  padding: 28px;
  position: sticky;
  top: 24px;
}
.ct-chart-label {
  font-size: .875rem;
  font-weight: 500;
  color: rgba(255,255,255,.7);
  letter-spacing: -.01em;
  margin-bottom: 20px;
}
.ct-coc-formula {
  margin-top: 20px;
  padding-top: 20px;
  border-top: 1px solid rgba(255,255,255,.06);
}
.ct-coc-formula-text {
  font-size: .875rem;
  color: rgba(255,255,255,.45);
  font-weight: 300;
  line-height: 1.6;
  margin-bottom: 16px;
}
.ct-coc-steps {
  list-style: none;
  padding: 0;
  margin: 0;
  counter-reset: coc-counter;
  display: flex;
  flex-direction: column;
  gap: 10px;
}
.ct-coc-steps li {
  counter-increment: coc-counter;
  display: flex;
  align-items: flex-start;
  gap: 10px;
  font-size: .8rem;
  color: rgba(255,255,255,.45);
  font-weight: 300;
  line-height: 1.5;
}
.ct-coc-steps li::before {
  content: counter(coc-counter);
  flex-shrink: 0;
  width: 18px;
  height: 18px;
  background: rgba(255,255,255,.08);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: .7rem;
  color: rgba(255,255,255,.4);
  margin-top: 1px;
}
.ct-coc-steps li strong { color: rgba(255,255,255,.7); font-weight: 500; }

/* ─── PERFORMANCE SECTION ─── */
.ct-perf-section {
  background: #fff;
  padding: 96px 24px;
}
.ct-perf-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .ct-perf-inner{ grid-template-columns:1fr; gap:40px; } }

.ct-blockquote {
  border-left: 3px solid #111;
  padding-left: 24px;
  margin: 28px 0 32px;
}
.ct-blockquote p {
  font-size: 1.05rem;
  color: #374151;
  font-weight: 300;
  line-height: 1.7;
  font-style: italic;
}
.ct-blockquote strong { color: #111; font-weight: 600; }
.ct-blockquote footer {
  font-size: .85rem;
  color: #6b7280;
  font-weight: 500;
  margin-top: 12px;
  font-style: normal;
}

.ct-savings-chart-wrap {
  background: #fff;
  border-radius: 12px;
  border: 1px solid #e5e7eb;
  padding: 28px;
  height: 400px;
}

/* ─── FINAL FORM SECTION ─── */
.ct-form-section {
  background: #000;
  padding: 96px 24px;
}
.ct-form-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .ct-form-inner{ grid-template-columns:1fr; gap:40px; } }

.ct-form-h {
  font-size: clamp(2rem, 4vw, 3rem);
  font-weight: 300;
  color: #fff;
  line-height: 1.2;
  margin: 16px 0 20px;
}
.ct-form-sub {
  color: rgba(255,255,255,.55);
  font-size: 1rem;
  font-weight: 300;
  margin-bottom: 32px;
  max-width: 400px;
}
.ct-form-ghost-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  border: 1px solid rgba(255,255,255,.25);
  color: rgba(255,255,255,.7);
  font-size: .875rem;
  font-weight: 400;
  padding: 12px 24px;
  border-radius: 100px;
  text-decoration: none;
  transition: border-color .2s, color .2s;
}
.ct-form-ghost-btn:hover { border-color: rgba(255,255,255,.5); color: #fff; }

.ct-form-card {
  background: #fff;
  border-radius: 16px;
  padding: 36px;
}
.ct-form-card-header {
  font-size: 1rem;
  font-weight: 600;
  color: #111;
  margin-bottom: 24px;
  padding-bottom: 20px;
  border-bottom: 1px solid #e5e7eb;
  letter-spacing: -.01em;
}
.ct-form-fields { display: flex; flex-direction: column; gap: 16px; }
.ct-form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
@media(max-width:480px){ .ct-form-row{ grid-template-columns:1fr; } }
.ct-input-group { display: flex; flex-direction: column; gap: 6px; }
.ct-input-group label {
  font-size: .8rem;
  font-weight: 500;
  color: #6b7280;
  text-transform: uppercase;
  letter-spacing: .05em;
}
.ct-input {
  width: 100%;
  border: 1px solid #e5e7eb;
  border-radius: 8px;
  padding: 12px 14px;
  font-size: .9rem;
  color: #111;
  background: #fafafa;
  outline: none;
  transition: border-color .2s, background .2s;
  box-sizing: border-box;
}
.ct-input:focus { border-color: #111; background: #fff; }
.ct-textarea { resize: vertical; }
.ct-submit-btn {
  width: 100%;
  background: #111;
  color: #fff;
  font-size: .9rem;
  font-weight: 500;
  padding: 14px 24px;
  border: none;
  border-radius: 100px;
  cursor: pointer;
  transition: background .2s, transform .2s;
}
.ct-submit-btn:hover { background: #222; transform: translateY(-1px); }

/* ─── CHART HEIGHT FIX ─── */
#instantCocChart {
  width: 100% !important;
  height: 260px !important;
}
</style>
@endpush

@section('content')

{{-- ─── HERO ─── --}}
<div class="ct-hero">
  <img
    src="/assets/img/services/cooling_tower_1.png"
    alt="Cooling Tower Intelligence"
    class="ct-hero-img" />
  <div class="ct-hero-overlay"></div>
  <div class="ct-hero-content">
    <div class="section-eyebrow" style="color:rgba(255,255,255,0.4);">Cooling Tower</div>
    <h1 class="ct-hero-h1">
      Cooling Tower Intelligence:<br>
      <em>Balancing OpEx &amp; CapEx</em>
    </h1>
    <p class="ct-hero-sub">
      <strong>Leverage real-time flow metering and smart CoC control to unlock 20–45% water savings.</strong>
      A trusted, science-driven process for quantifiable savings, compliance, and true operational resilience.
    </p>
    <div class="ct-hero-actions">
      <a href="#ct-form" class="btn-hero-primary">Request a Tower Audit</a>
      <a href="#ct-process" class="btn-hero-ghost">Explore the Process</a>
    </div>
  </div>
  <div class="ct-hero-stats">
    <div class="ct-stat">
      <div class="ct-stat-val">180,000 gal/month</div>
      <div class="ct-stat-lbl">Audit uncovered savings</div>
    </div>
    <div class="ct-stat-sep"></div>
    <div class="ct-stat">
      <div class="ct-stat-val">6.3 months</div>
      <div class="ct-stat-lbl">Payback period</div>
    </div>
  </div>
</div>

{{-- ─── PROBLEM ─── --}}
<section class="ct-problem-section" id="ct-problem">
  <div class="ct-problem-inner">
    <div>
      <div class="section-eyebrow">The Challenge</div>
      <h2 class="section-h2">
        Why Cooling Towers<br><em>Fail to Deliver</em>
      </h2>
      <div class="ct-rule-wrap">
        <div class="ct-rule" id="ctIntroRule"></div>
        <p class="section-sub" style="max-width:480px;">
          When your cooling tower underperforms, you face higher OPEX and CAPEX. Inefficiencies hide in scale buildup, corrosion, biogrowth, and manual blowdown — driving up energy costs and maintenance burdens across your portfolio.
        </p>
      </div>
      <ul class="ct-check-list">
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
          </svg>
          <span><strong>Scale &amp; Fouling</strong> — Impedes heat transfer; up to 25% energy penalty.</span>
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
          </svg>
          <span><strong>Corrosion &amp; Biogrowth</strong> — Equipment damage and elevated Legionella risk.</span>
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
          </svg>
          <span><strong>Manual Blowdown</strong> — Time-based or probe-based: wasted water and missed CoC targets.</span>
        </li>
      </ul>
      <a href="#ct-form" class="btn-hero-primary" style="display:inline-flex;">Download the Problem Brief</a>
    </div>
    <div>
      <video
        src="/assets/img/services/cooling_tower_video_1.mp4"
        controls
        class="ct-problem-video">
        Your browser does not support the video tag.
      </video>
    </div>
  </div>
</section>

{{-- ─── OPEX / CAPEX ─── --}}
<section class="ct-opex-section" id="ct-opex">
  <div class="ct-opex-inner">
    <div>
      <div class="section-eyebrow">Financial Impact</div>
      <h2 class="section-h2" style="color:#fff;">
        Cooling Tower Success<br><em>Reduces OpEx &amp; CapEx</em>
      </h2>
      <p class="ct-opex-body">
        The success relies on advanced water treatment and optimized in-time monitoring — delivering significant operational savings while deferring capital expenditures. Significant water conservation, energy savings, and zero chemicals required.
      </p>
      <a href="#ct-form" class="btn-hero-primary" style="display:inline-flex;">Download the Problem Brief</a>
    </div>
    <div class="ct-cards-grid">
      <div class="ct-card">
        <div class="ct-card-title">OpEx Savings</div>
        <ul class="ct-card-list">
          <li>Lower water &amp; chemical costs</li>
          <li>Reduced maintenance burden</li>
          <li>Predictable operational budgets</li>
        </ul>
      </div>
      <div class="ct-card">
        <div class="ct-card-title">CapEx Deferral</div>
        <ul class="ct-card-list">
          <li>Delay infrastructure upgrades</li>
          <li>Extend equipment lifecycles</li>
          <li>Defer costly tower rebuilds</li>
        </ul>
      </div>
    </div>
  </div>
</section>

{{-- ─── PROCESS ─── --}}
<section class="ct-process-section" id="ct-process">
  <div class="ct-process-inner">
    <div>
      <div class="section-eyebrow">Technology</div>
      <h2 class="section-h2" style="color:#fff;">
        How Cooling Tower<br><em>Success Happens</em>
      </h2>
      <p class="section-sub" style="max-width:480px;">
        Simultaneous smart treatment of make-up water and optimizing Cycles of Concentration (CoCs) — the WST patented process.
      </p>
      <div class="ct-process-steps">
        <div class="ct-process-step">
          <div class="ct-step-icon">
            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m6.364 1.636l-.707.707M21 12h-1M17.657 17.657l-.707-.707M12 21v-1m-5.657-2.343l-.707.707M3 12H4M6.343 6.343l.707.707"/>
            </svg>
          </div>
          <div class="ct-step-body">
            <div class="ct-step-title">Make-up Water Treatment</div>
            <div class="ct-step-desc">Through a patented process, our electro-water reactors remove unstable minerals in the make-up water to allow for high cycle rates, managing three key drivers of operating and capital expenses:</div>
            <ul class="ct-step-sub">
              <li>Scale formation</li>
              <li>Corrosion</li>
              <li>Bio-contamination</li>
            </ul>
          </div>
        </div>
        <div class="ct-process-step">
          <div class="ct-step-icon">
            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0H3"/>
            </svg>
          </div>
          <div class="ct-step-body">
            <div class="ct-step-title">Smart Monitoring with AI</div>
            <ul class="ct-step-sub" style="margin-top:6px;">
              <li>Make-up water metering</li>
              <li>Blowdown water metering</li>
            </ul>
          </div>
        </div>
        <div class="ct-process-step">
          <div class="ct-step-icon">
            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
            </svg>
          </div>
          <div class="ct-step-body">
            <div class="ct-step-title">Enhance &amp; Optimize</div>
            <div class="ct-step-desc">Implement continuous improvements based on real-time CoC data and AI-driven recommendations.</div>
          </div>
        </div>
      </div>
      <a href="#ct-form" class="btn-hero-primary" style="display:inline-flex; margin-top:32px;">Get Started</a>
    </div>
    <div>
      <div class="ct-chart-wrap">
        <div class="ct-chart-label">CoC Ratio &amp; Water Saved — Before vs. After</div>
        <canvas id="instantCocChart"></canvas>
        <div class="ct-coc-formula">
          <div class="ct-coc-formula-text">
            <strong style="color:rgba(255,255,255,.7);">Instant CoC</strong> = Make-Up Flow ÷ Blow-Down Flow
          </div>
          <ol class="ct-coc-steps">
            <li><strong>Make-Up Meter</strong> measures incoming water flow.</li>
            <li><strong>Blow-Down Meter</strong> measures discharged water flow.</li>
            <li>Instant CoC = MU ÷ BD.</li>
            <li><strong>Treatment Module</strong> adjusts chemistry dosage based on CoC.</li>
            <li>Comparator checks CoC &amp; treatment set-points.</li>
            <li><strong>Auto-actuate Valve</strong> or <strong>Trigger Alert</strong> if out of range.</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ─── PERFORMANCE ─── --}}
<section class="ct-perf-section" id="ct-performance">
  <div class="ct-perf-inner">
    <div>
      <div class="section-eyebrow">Featured Performance</div>
      <h2 class="section-h2" style="color:#111;">The EnviroTower<br><em>Savings Profile</em></h2>
      <div class="ct-blockquote">
        <p>
          "Since installing Water Solutions' technology package, we boosted our CoC from <strong>2.4×</strong> to <strong>3.5×</strong> in just 6 months — cutting water spend by <strong>22%</strong> and slashing annual chemical costs by over <strong>$40K</strong>."
        </p>
        <footer>— Alexandra Wu, Director of Engineering, GreenOak Asset Management</footer>
      </div>
      <a href="#ct-form" class="btn-hero-primary" style="display:inline-flex;">Estimate My Savings</a>
    </div>
    <div class="ct-savings-chart-wrap">
      <canvas id="savingsProfileChart"></canvas>
    </div>
  </div>
</section>

{{-- ─── FINAL FORM ─── --}}
<section class="ct-form-section" id="ct-form">
  <div class="ct-form-inner">
    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Get Started</div>
      <h2 class="ct-form-h">Transform Hidden Water<br><em>Challenges to Opportunities</em></h2>
      <p class="ct-form-sub">
        Request a confidential flow management audit to optimize your property's profitability.
      </p>
      <a href="#ct-form" class="ct-form-ghost-btn">Schedule a Confidential Consultation</a>
    </div>

    <div class="ct-form-card" id="schedule-demo">
      <div class="ct-form-card-header">Confidential Demo Request</div>
      <form class="ct-form-fields">
        <div class="ct-form-row">
          <input type="text" placeholder="First Name" required class="ct-input" />
          <input type="text" placeholder="Last Name" required class="ct-input" />
        </div>
        <div class="ct-form-row">
          <input type="text" placeholder="Company Name" required class="ct-input" />
          <input type="text" placeholder="Company Role" required class="ct-input" />
        </div>
        <div class="ct-form-row">
          <input type="tel" placeholder="Contact Number" required class="ct-input" />
          <input type="email" placeholder="Email" required class="ct-input" />
        </div>
        <div class="ct-form-row">
          <div class="ct-input-group">
            <label>Preferred Date</label>
            <input type="date" required class="ct-input" />
          </div>
          <div class="ct-input-group">
            <label>Preferred Time</label>
            <input type="time" required class="ct-input" />
          </div>
        </div>
        <textarea placeholder="Additional Message (optional)" rows="4" class="ct-input ct-textarea"></textarea>
        <button type="submit" class="ct-submit-btn">Submit Request</button>
      </form>
    </div>
  </div>
</section>

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