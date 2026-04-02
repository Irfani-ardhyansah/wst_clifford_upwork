@extends('layouts.app')

@section('title', 'Water Meter Accuracy — Water Solutions Technology')

@push('styles')
<style>
/* ═══════════════════════════════════════
   WATER METER ACCURACY PAGE
   Style system matching Elara AI page
   ═══════════════════════════════════════ */

/* ─── HERO ─── */
.meter-hero {
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #000;
  overflow: hidden;
}
.meter-hero-img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  opacity: .55;
  filter: grayscale(15%);
}
.meter-hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(0,0,0,.75) 40%, rgba(0,0,0,.45) 100%);
}
.meter-hero-content {
  position: relative;
  z-index: 10;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  text-align: left;
  padding: 0 24px;
  max-width: 780px;
}
.meter-hero-h1 {
  font-size: clamp(2.4rem, 6vw, 4.5rem);
  font-weight: 300;
  color: #fff;
  line-height: 1.12;
  letter-spacing: -0.02em;
  margin: 16px 0 20px;
}
.meter-hero-h1 em { font-style: italic; color: rgba(255,255,255,.65); }
.meter-hero-sub {
  color: rgba(255,255,255,.55);
  font-size: 1.1rem;
  font-weight: 300;
  letter-spacing: .04em;
  margin-bottom: 32px;
  max-width: 480px;
}
.meter-hero-sub strong { color: #fff; font-weight: 500; }
.meter-hero-actions { display: flex; gap: 12px; flex-wrap: wrap; }

.meter-hero-stats {
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
.meter-stat { text-align: center; }
.meter-stat-val {
  font-size: 1.1rem;
  font-weight: 500;
  color: #fff;
  margin-bottom: 4px;
}
.meter-stat-lbl {
  font-size: .75rem;
  color: rgba(255,255,255,.6);
  text-transform: uppercase;
  letter-spacing: .08em;
}
.meter-stat-sep {
  width: 1px;
  height: 40px;
  background: rgba(255,255,255,.2);
}
@media(max-width:768px){
  .meter-hero-stats {
    position: relative;
    bottom: 0; right: 0;
    margin: 40px auto 0;
    max-width: 320px;
  }
}

/* ─── INTRO SECTION ─── */
.meter-intro-section {
  background: #080808;
  padding: 96px 24px;
  border-bottom: 1px solid rgba(255,255,255,.06);
}
.meter-intro-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .meter-intro-inner{ grid-template-columns:1fr; gap:40px; } }

.meter-rule-wrap {
  display: flex;
  gap: 24px;
  align-items: flex-start;
  margin: 28px 0 32px;
}
.meter-rule {
  flex-shrink: 0;
  width: 3px;
  height: 120px;
  background: linear-gradient(to bottom, rgba(255,255,255,.5), rgba(255,255,255,.05));
  border-radius: 2px;
  opacity: 0;
  transform: translateY(1rem);
  transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}
.meter-rule.visible { opacity: 1; transform: translateY(0); }

/* ─── STATS CARD (dark) ─── */
.meter-stats-card {
  background: #111;
  border: 1px solid rgba(255,255,255,.08);
  border-radius: 16px;
  padding: 40px;
}
.meter-stats-card-header {
  font-size: 1rem;
  font-weight: 500;
  color: #fff;
  letter-spacing: -.01em;
  margin-bottom: 32px;
  padding-bottom: 20px;
  border-bottom: 1px solid rgba(255,255,255,.08);
}
.meter-stats-row {
  padding: 20px 0;
  border-bottom: 1px solid rgba(255,255,255,.06);
}
.meter-stats-row:last-child { border-bottom: none; }
.meter-stats-num {
  font-size: 2rem;
  font-weight: 600;
  color: #fff;
  line-height: 1;
  margin-bottom: 8px;
}
.meter-stats-desc {
  font-size: .9rem;
  color: rgba(255,255,255,.55);
  font-weight: 300;
  line-height: 1.6;
}
.meter-stats-source {
  font-size: .78rem;
  color: rgba(255,255,255,.3);
  font-style: italic;
  margin-top: 4px;
}
.meter-stats-quote {
  font-size: .9rem;
  color: rgba(255,255,255,.5);
  font-style: italic;
  line-height: 1.7;
  padding-top: 20px;
}

/* ─── GAINS LIST ─── */
.meter-gains-list {
  list-style: none;
  padding: 0;
  margin: 24px 0 32px;
  display: flex;
  flex-direction: column;
  gap: 12px;
}
.meter-gains-list li {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  color: rgba(255,255,255,.7);
  font-size: .95rem;
  font-weight: 300;
  line-height: 1.5;
}
.meter-gains-list li svg {
  flex-shrink: 0;
  width: 16px;
  height: 16px;
  margin-top: 3px;
  opacity: .8;
}

/* ─── FEATURES / CAPABILITIES SECTION ─── */
.meter-features-section {
  background: #080808;
  padding: 96px 24px;
  border-top: 1px solid rgba(255,255,255,.06);
}
.meter-features-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 2fr 3fr;
  gap: 64px;
  align-items: stretch;
}
@media(max-width:768px){ .meter-features-inner{ grid-template-columns:1fr; gap:40px; } }

.meter-features-list {
  list-style: none;
  padding: 0;
  margin: 32px 0 0;
  display: flex;
  flex-direction: column;
  gap: 0;
}
.meter-features-list button {
  width: 100%;
  text-align: left;
  background: none;
  border: none;
  border-bottom: 1px solid rgba(255,255,255,.06);
  padding: 16px 0;
  font-size: .95rem;
  font-weight: 300;
  color: rgba(255,255,255,.4);
  cursor: pointer;
  transition: color .2s;
  letter-spacing: -.01em;
}
.meter-features-list button:hover { color: rgba(255,255,255,.7); }
.meter-features-list button.active { color: #fff; font-weight: 500; }

.meter-feature-display {
  position: relative;
  min-height: 420px;
  border-radius: 16px;
  overflow: hidden;
  background: #111;
}
.meter-feature-bg {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  opacity: .5;
  filter: grayscale(20%);
}
.meter-feature-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,.65);
}
.meter-feature-content {
  position: relative;
  z-index: 10;
  padding: 40px;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
}
.meter-feature-title {
  font-size: 1.6rem;
  font-weight: 300;
  color: #fff;
  letter-spacing: -.02em;
  margin-bottom: 12px;
}
.meter-feature-desc {
  font-size: .95rem;
  color: rgba(255,255,255,.65);
  font-weight: 300;
  line-height: 1.7;
  margin-bottom: 24px;
  max-width: 480px;
}
.meter-feature-link {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  color: rgba(255,255,255,.5);
  font-size: .85rem;
  font-weight: 400;
  text-decoration: none;
  transition: color .2s;
  letter-spacing: .04em;
}
.meter-feature-link:hover { color: #fff; }
.meter-feature-link svg { width: 14px; height: 14px; }

/* ─── COMPARISON SECTION ─── */
.meter-comparison-section {
  background: #fff;
  padding: 96px 24px;
}
.meter-comparison-inner {
  max-width: 1100px;
  margin: 0 auto;
}
.meter-comparison-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 48px;
}
.meter-comparison-table thead tr {
  background: #f5f5f5;
}
.meter-comparison-table th {
  padding: 20px 28px;
  font-size: .85rem;
  font-weight: 600;
  color: #111;
  text-transform: uppercase;
  letter-spacing: .06em;
  text-align: left;
  border-bottom: 2px solid #e5e7eb;
}
.meter-comparison-table td {
  padding: 20px 28px;
  font-size: .95rem;
  color: #374151;
  font-weight: 300;
  border-bottom: 1px solid #e5e7eb;
}
.meter-comparison-table tr:last-child td { border-bottom: none; }
.meter-comparison-table td:first-child { color: #9ca3af; }
.meter-comparison-table td:last-child { color: #111; font-weight: 400; }

.meter-blockquote {
  font-size: 1.5rem;
  font-style: italic;
  font-weight: 300;
  color: #111;
  line-height: 1.5;
  max-width: 800px;
  margin: 64px auto 0;
  text-align: center;
  letter-spacing: -.01em;
}
.meter-blockquote cite {
  display: block;
  font-size: .85rem;
  font-style: normal;
  font-weight: 500;
  color: #6b7280;
  margin-top: 16px;
  letter-spacing: .02em;
}

/* ─── CAPABILITIES CHECKLIST ─── */
.meter-checklist-section {
  background: #080808;
  padding: 96px 24px;
  border-top: 1px solid rgba(255,255,255,.06);
}
.meter-checklist-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: center;
}
@media(max-width:768px){ .meter-checklist-inner{ grid-template-columns:1fr; gap:40px; } }

.meter-checklist {
  list-style: none;
  padding: 0;
  margin: 28px 0 32px;
  display: flex;
  flex-direction: column;
  gap: 14px;
}
.meter-checklist li {
  display: flex;
  align-items: flex-start;
  gap: 14px;
  color: rgba(255,255,255,.7);
  font-size: .95rem;
  font-weight: 300;
}
.meter-checklist li svg {
  flex-shrink: 0;
  width: 18px;
  height: 18px;
  margin-top: 2px;
  color: rgba(255,255,255,.5);
}
.meter-checklist-img {
  width: 100%;
  height: 480px;
  object-fit: cover;
  border-radius: 16px;
  filter: grayscale(10%);
}
.meter-testimonial {
  margin-top: 36px;
  padding-top: 28px;
  border-top: 1px solid rgba(255,255,255,.08);
}
.meter-testimonial-text {
  font-size: .95rem;
  font-style: italic;
  color: rgba(255,255,255,.5);
  font-weight: 300;
  line-height: 1.7;
  margin-bottom: 12px;
}
.meter-testimonial-author {
  font-size: .82rem;
  font-weight: 500;
  color: rgba(255,255,255,.35);
  text-transform: uppercase;
  letter-spacing: .06em;
}

/* ─── FINAL FORM SECTION ─── */
.meter-form-section {
  background: #000;
  padding: 96px 24px;
}
.meter-form-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .meter-form-inner{ grid-template-columns:1fr; gap:40px; } }

.meter-form-h {
  font-size: clamp(2rem, 4vw, 3rem);
  font-weight: 300;
  color: #fff;
  line-height: 1.2;
  margin: 16px 0 20px;
}
.meter-form-sub {
  color: rgba(255,255,255,.55);
  font-size: 1rem;
  font-weight: 300;
  margin-bottom: 32px;
  max-width: 400px;
}
.meter-form-ghost-btn {
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
.meter-form-ghost-btn:hover { border-color: rgba(255,255,255,.5); color: #fff; }

.meter-form-card {
  background: #fff;
  border-radius: 16px;
  padding: 36px;
}
.meter-form-card-header {
  font-size: 1rem;
  font-weight: 600;
  color: #111;
  margin-bottom: 24px;
  padding-bottom: 20px;
  border-bottom: 1px solid #e5e7eb;
  letter-spacing: -.01em;
}
.meter-form-fields { display: flex; flex-direction: column; gap: 16px; }
.meter-form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
@media(max-width:480px){ .meter-form-row{ grid-template-columns:1fr; } }
.meter-input-group { display: flex; flex-direction: column; gap: 6px; }
.meter-input-group label {
  font-size: .8rem;
  font-weight: 500;
  color: #6b7280;
  text-transform: uppercase;
  letter-spacing: .05em;
}
.meter-input {
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
.meter-input:focus { border-color: #111; background: #fff; }
.meter-textarea { resize: vertical; }
.meter-submit-btn {
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
.meter-submit-btn:hover { background: #222; transform: translateY(-1px); }

/* ─── SHARED UTILS ─── */
.btn-primary-pill {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: #fff;
  color: #111;
  font-size: .875rem;
  font-weight: 500;
  padding: 14px 28px;
  border-radius: 100px;
  text-decoration: none;
  border: none;
  cursor: pointer;
  transition: background .2s, transform .2s;
}
.btn-primary-pill:hover { background: #e5e5e5; transform: translateY(-1px); }
.btn-dark-pill {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: #111;
  color: #fff;
  font-size: .875rem;
  font-weight: 500;
  padding: 14px 28px;
  border-radius: 100px;
  text-decoration: none;
  border: none;
  cursor: pointer;
  transition: background .2s, transform .2s;
}
.btn-dark-pill:hover { background: #333; transform: translateY(-1px); }
</style>
@endpush

@section('content')

{{-- ─── HERO ─── --}}
<div class="meter-hero">
  <img
    src="/assets/img/services/meter_accuracy_photo.png"
    alt="Water Meter Accuracy"
    class="meter-hero-img" />
  <div class="meter-hero-overlay"></div>
  <div class="meter-hero-content">
    <div class="section-eyebrow" style="color:rgba(255,255,255,0.4);">Flow Management</div>
    <h1 class="meter-hero-h1">
      Water Meter<br>
      <em>Accuracy</em>
    </h1>
    <p class="meter-hero-sub">
      Correcting a water meter will most likely save <strong>10–35%</strong> of your annual water utility fees.
      Flow management optimization enhances metering precision — leading to fewer errors on meter register consumption.
    </p>
    <div class="meter-hero-actions">
      <a href="#meter-form" class="btn-hero-primary">Request a Flow Assessment</a>
      <a href="#meter-features" class="btn-hero-ghost">Explore Capabilities</a>
    </div>
  </div>
  <div class="meter-hero-stats">
    <div class="meter-stat">
      <div class="meter-stat-val">180,000 gal/month</div>
      <div class="meter-stat-lbl">Audit uncovered savings</div>
    </div>
    <div class="meter-stat-sep"></div>
    <div class="meter-stat">
      <div class="meter-stat-val">6.3 months</div>
      <div class="meter-stat-lbl">Payback period</div>
    </div>
  </div>
</div>

{{-- ─── INTRO ─── --}}
<section class="meter-intro-section">
  <div class="meter-intro-inner">
    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Our Approach</div>
      <h2 class="section-h2" style="color:#fff;">
        Flow Management Audit &amp;<br><em>Precision Infrastructure</em>
      </h2>
      <div class="meter-rule-wrap">
        <div class="meter-rule" id="introRule"></div>
        <p class="section-sub" style="max-width:480px; color:rgba(255,255,255,.55);">
          You can modulate your property's pressure differential, upstream and downstream of your water meter register. This rectifies how the municipal water meter interprets the water volume, and provides the most accurate invoice in a dynamic way. An accurate water meter reflects an accurate invoice — and vice versa. Let us help you.
        </p>
      </div>
      <h3 style="font-size:1rem; font-weight:600; color:rgba(255,255,255,.4); text-transform:uppercase; letter-spacing:.08em; margin-bottom:20px;">What You Gain</h3>
      <ul class="meter-gains-list">
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          20–30% water &amp; sewer savings, typically
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          ESG-ready reporting for stakeholders
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          ROI — most audits pay for themselves within 12 months
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Asset value protection, risk mitigation, and compliance
        </li>
      </ul>
      <a href="#meter-form" class="btn-dark-pill" style="background:#fff; color:#111; margin-top:8px;">Schedule a Flow Assessment</a>
    </div>

    <div class="meter-stats-card">
      <div class="meter-stats-card-header">Water Metering Industry Insights</div>
      <div class="meter-stats-row">
        <div class="meter-stats-num">30%+</div>
        <div class="meter-stats-desc">of global water is lost ("non-revenue water") — mainly due to inaccurate or outdated metering.</div>
        <div class="meter-stats-source">World Bank, 2022</div>
      </div>
      <div class="meter-stats-row">
        <div class="meter-stats-num">10–20%</div>
        <div class="meter-stats-desc">typical water savings after installing advanced (smart) meters.</div>
        <div class="meter-stats-source">EPA, 2023</div>
      </div>
      <div class="meter-stats-row">
        <div class="meter-stats-num">15–25%</div>
        <div class="meter-stats-desc">billing inaccuracies from manual readings and aging meters.</div>
        <div class="meter-stats-source">AWWA, 2022</div>
      </div>
      <div class="meter-stats-row">
        <div class="meter-stats-num">&lt;2 Years</div>
        <div class="meter-stats-desc">payback on modern water metering solutions in commercial properties.</div>
        <div class="meter-stats-source">McKinsey, 2023</div>
      </div>
      <p class="meter-stats-quote">
        "Accurate, real-time water metering is not just a compliance or billing issue — it's a strategic advantage for cost control, sustainability, and asset value."
      </p>
    </div>
  </div>
</section>

{{-- ─── FEATURES / CAPABILITIES ─── --}}
<section class="meter-features-section" id="meter-features"
  x-data="{
    selected: 0,
    features: [
      { label: 'Accurate Flow Control Logic',     title: 'Accurate Flow Control Logic',     desc: 'Modulate upstream and downstream pressure to ensure your municipal water meter registers true consumption — eliminating systematic overcharges from day one.' },
      { label: 'Early Leak Detection',            title: 'Early Leak Detection',            desc: 'Real-time anomaly detection surfaces invisible leaks before they compound into major losses on your billing statement and infrastructure.' },
      { label: 'ESG-Grade Usage Reporting',       title: 'ESG-Grade Usage Reporting',       desc: 'Automatically generate LEED, GRESB, and ESG-ready reports benchmarked across your full property portfolio.' },
      { label: 'Verified Savings Validation',     title: 'Verified Savings Validation',     desc: 'Every efficiency gain is documented and independently verified — giving you defensible data for stakeholder reporting and asset valuations.' },
      { label: 'True Consumption Benchmarking',   title: 'True Consumption Benchmarking',   desc: 'Compare normalized water consumption across properties to identify outliers, set targets, and drive portfolio-wide optimization.' },
      { label: 'Pressure Optimization',           title: 'Pressure Optimization',           desc: 'Bring operating pressure from unregulated highs (120+ PSI) down to an optimal 60–75 PSI — extending fixture life, reducing surges, and saving energy.' }
    ]
  }"
>
  <div class="meter-features-inner">
    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Capabilities</div>
      <h2 class="section-h2" style="color:#fff;">
        Control the Flow.<br><em>Cut the Waste.</em>
      </h2>
      <ul class="meter-features-list">
        <template x-for="(item, idx) in features" :key="idx">
          <li>
            <button
              @click="selected = idx"
              :class="selected === idx ? 'active' : ''"
              x-text="item.label">
            </button>
          </li>
        </template>
      </ul>
    </div>

    <div class="meter-feature-display">
      <img
        src="/assets/img/services/meter_optimization.png"
        alt="Meter optimization"
        class="meter-feature-bg" />
      <div class="meter-feature-overlay"></div>
      <div class="meter-feature-content">
        <h4 class="meter-feature-title" x-text="features[selected].title"></h4>
        <p class="meter-feature-desc" x-text="features[selected].desc"></p>
        <a href="#meter-form" class="meter-feature-link">
          Request an assessment
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7l7 7-7 7"/>
          </svg>
        </a>
      </div>
    </div>
  </div>
</section>

{{-- ─── COMPARISON TABLE ─── --}}
<section class="meter-comparison-section">
  <div class="meter-comparison-inner">
    <div class="section-eyebrow">Side by Side</div>
    <h2 class="section-h2" style="color:#111;">
      Accurate Meters.<br><em>Trusted Data.</em>
    </h2>
    <table class="meter-comparison-table">
      <thead>
        <tr>
          <th>Without Flow Management</th>
          <th>With Flow Management</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Meter inaccuracies — inflated invoices</td>
          <td>Meter register reflects accurate use</td>
        </tr>
        <tr>
          <td>120 PSI, unregulated</td>
          <td>60–75 PSI, optimized</td>
        </tr>
        <tr>
          <td>Accelerated fixture wear &amp; tear</td>
          <td>Extended asset life</td>
        </tr>
        <tr>
          <td>Daily usage spikes — unpredictable bills</td>
          <td>Steady, predictable consumption</td>
        </tr>
        <tr>
          <td>No audit trail for ESG reporting</td>
          <td>LEED &amp; GRESB-ready reporting</td>
        </tr>
      </tbody>
    </table>
    <blockquote class="meter-blockquote">
      "Water metering accuracy through flow control saved us $2,400/month — but more importantly, it stabilized our system pressure."
      <cite>— President, Panna to Go Manufacturing</cite>
    </blockquote>
  </div>
</section>

{{-- ─── CHECKLIST + IMAGE ─── --}}
<section class="meter-checklist-section">
  <div class="meter-checklist-inner">
    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Full Scope</div>
      <h2 class="section-h2" style="color:#fff;">
        Accurate Meters.<br>Controlled Flow.<br><em>Trusted Data.</em>
      </h2>
      <p class="section-sub" style="color:rgba(255,255,255,.55);">
        Eliminate guesswork and overuse with precision-calibrated water metering that powers intelligent flow management.
      </p>
      <ul class="meter-checklist">
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Accurate flow control logic
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Early leak detection
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          ESG-grade usage reporting
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Verified savings validation
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          True consumption benchmarking
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Reduce invisible overuse
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Save water + energy simultaneously
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Extend pipe &amp; fixture life
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Protect against surge damage
        </li>
      </ul>
      <a href="#meter-form" class="btn-primary-pill">Request Flow Optimization Assessment</a>
      <div class="meter-testimonial">
        <p class="meter-testimonial-text">
          "Most buildings measure water after it's been wasted. Our solution ensures flow optimization starts with metering precision — no more 'estimated' consumption."
        </p>
        <div class="meter-testimonial-author">— Director of Engineering, Classic Properties</div>
      </div>
    </div>

    <img
      src="/assets/img/services/meter_optimization_5.png"
      alt="Engineer calibrating a water meter"
      class="meter-checklist-img" />
  </div>
</section>

{{-- ─── FINAL FORM ─── --}}
<section class="meter-form-section" id="meter-form">
  <div class="meter-form-inner">

    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Get Started</div>
      <h2 class="meter-form-h">
        Transform Hidden Water<br>Challenges to <em>Opportunities</em>
      </h2>
      <p class="meter-form-sub">
        Request a confidential flow management audit to optimize your property's health and profitability.
      </p>
      <a href="#meter-form" class="meter-form-ghost-btn">Schedule a Confidential Consultation</a>
    </div>

    <div class="meter-form-card" id="schedule-demo">
      <div class="meter-form-card-header">Confidential Flow Assessment Request</div>
      <form class="meter-form-fields">
        <div class="meter-form-row">
          <input type="text" placeholder="First Name" required class="meter-input" />
          <input type="text" placeholder="Last Name"  required class="meter-input" />
        </div>
        <div class="meter-form-row">
          <input type="text" placeholder="Company Name" required class="meter-input" />
          <input type="text" placeholder="Company Role" required class="meter-input" />
        </div>
        <div class="meter-form-row">
          <input type="tel"   placeholder="Contact Number" required class="meter-input" />
          <input type="email" placeholder="Email"          required class="meter-input" />
        </div>
        <div class="meter-form-row">
          <div class="meter-input-group">
            <label>Preferred Date</label>
            <input type="date" required class="meter-input" />
          </div>
          <div class="meter-input-group">
            <label>Preferred Time</label>
            <input type="time" required class="meter-input" />
          </div>
        </div>
        <textarea placeholder="Additional Message (optional)" rows="4" class="meter-input meter-textarea"></textarea>
        <button type="submit" class="meter-submit-btn">Submit Request</button>
      </form>
    </div>

  </div>
</section>

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