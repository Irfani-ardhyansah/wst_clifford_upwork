@extends('layouts.app')
@section('title', 'Smart Water Monitoring — Water Solutions Technology')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
/* ═══════════════════════════════════════
   SMART WATER MONITORING PAGE
   Style system matching Water Meter Accuracy page
   ═══════════════════════════════════════ */

/* ─── RIPPLE / MAP MARKER ─── */
@keyframes ripple {
  0%   { transform: translate(-50%, -50%) scale(1); opacity: 0.8; }
  100% { transform: translate(-50%, -50%) scale(4); opacity: 0; }
}
.pulse-marker {
  position: relative;
  width: 6px;
  height: 6px;
  background: #fff;
  border-radius: 50%;
}
.pulse-marker::before {
  content: '';
  position: absolute;
  top: 50%; left: 50%;
  width: 6px; height: 6px;
  border: 2px solid rgba(255,255,255,0.6);
  border-radius: 50%;
  transform: translate(-50%, -50%) scale(1);
  animation: ripple 2s ease-out infinite;
}
.leaflet-tooltip.water-tooltip {
  background: rgba(22,24,29,0.9) !important;
  color: #fff !important;
  border-radius: 8px !important;
  padding: 12px !important;
  box-shadow: 0 2px 8px rgba(0,0,0,0.5) !important;
  font-size: 0.875rem !important;
  border: none !important;
}

/* ─── HERO ─── */
.swm-hero {
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #000;
  overflow: hidden;
}
.swm-hero-img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  opacity: .55;
  filter: grayscale(15%);
}
.swm-hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(0,0,0,.75) 40%, rgba(0,0,0,.45) 100%);
}
.swm-hero-content {
  position: relative;
  z-index: 10;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  text-align: left;
  padding: 0 24px;
  max-width: 780px;
}
.swm-hero-h1 {
  font-size: clamp(2.4rem, 6vw, 4.5rem);
  font-weight: 300;
  color: #fff;
  line-height: 1.12;
  letter-spacing: -0.02em;
  margin: 16px 0 20px;
}
.swm-hero-h1 em { font-style: italic; color: rgba(255,255,255,.65); }
.swm-hero-sub {
  color: rgba(255,255,255,.55);
  font-size: 1.1rem;
  font-weight: 300;
  letter-spacing: .04em;
  margin-bottom: 32px;
  max-width: 480px;
}
.swm-hero-sub strong { color: #fff; font-weight: 500; }
.swm-hero-actions { display: flex; gap: 12px; flex-wrap: wrap; }

.swm-hero-stats {
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
.swm-stat { text-align: center; }
.swm-stat-val {
  font-size: 1.1rem;
  font-weight: 500;
  color: #fff;
  margin-bottom: 4px;
}
.swm-stat-lbl {
  font-size: .75rem;
  color: rgba(255,255,255,.6);
  text-transform: uppercase;
  letter-spacing: .08em;
}
.swm-stat-sep {
  width: 1px;
  height: 40px;
  background: rgba(255,255,255,.2);
}
@media(max-width:768px){
  .swm-hero-stats {
    position: relative;
    bottom: 0; right: 0;
    margin: 40px auto 0;
    max-width: 320px;
  }
}

/* ─── ENTERPRISE VISIBILITY SECTION ─── */
.swm-visibility-section {
  background: #080808;
  padding: 96px 24px;
  border-bottom: 1px solid rgba(255,255,255,.06);
}
.swm-visibility-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .swm-visibility-inner{ grid-template-columns:1fr; gap:40px; } }

.swm-rule-wrap {
  display: flex;
  gap: 24px;
  align-items: flex-start;
  margin: 28px 0 32px;
}
.swm-rule {
  flex-shrink: 0;
  width: 3px;
  height: 120px;
  background: linear-gradient(to bottom, rgba(255,255,255,.5), rgba(255,255,255,.05));
  border-radius: 2px;
  opacity: 0;
  transform: translateY(1rem);
  transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}
.swm-rule.visible { opacity: 1; transform: translateY(0); }

/* ─── CARDS (dark) ─── */
.swm-cards-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 16px;
  margin-top: 32px;
}
@media(max-width:900px){ .swm-cards-grid{ grid-template-columns:1fr; } }

.swm-card {
  background: #111;
  border: 1px solid rgba(255,255,255,.08);
  border-radius: 12px;
  padding: 28px 24px;
}
.swm-card-title {
  font-size: 1rem;
  font-weight: 500;
  color: #fff;
  margin-bottom: 10px;
  letter-spacing: -.01em;
}
.swm-card-desc {
  font-size: .9rem;
  color: rgba(255,255,255,.5);
  font-weight: 300;
  line-height: 1.7;
}

/* ─── MAP CARD ─── */
.swm-map-card {
  background: #111;
  border: 1px solid rgba(255,255,255,.08);
  border-radius: 16px;
  overflow: hidden;
}
.swm-map-card-header {
  padding: 20px 24px;
  font-size: .85rem;
  font-weight: 500;
  color: rgba(255,255,255,.4);
  text-transform: uppercase;
  letter-spacing: .08em;
  border-bottom: 1px solid rgba(255,255,255,.06);
}
#usWaterMap {
  width: 100%;
  height: 360px;
}

/* ─── LEAFLET CUSTOM STYLES ─── */
.pulse-marker {
  background: #fff;
  border-radius: 50%;
  animation: pulse 2s infinite;
}
@keyframes pulse {
  0% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.5); opacity: 0.5; }
  100% { transform: scale(1); opacity: 1; }
}
.water-tooltip {
  background: rgba(0,0,0,0.8) !important;
  color: #fff !important;
  border: none !important;
  border-radius: 4px !important;
  font-size: 12px !important;
  box-shadow: 0 2px 8px rgba(0,0,0,0.3) !important;
}

/* ─── STATS CARD (dark) ─── */
.swm-stats-card {
  background: #111;
  border: 1px solid rgba(255,255,255,.08);
  border-radius: 16px;
  padding: 40px;
}
.swm-stats-card-header {
  font-size: 1rem;
  font-weight: 500;
  color: #fff;
  letter-spacing: -.01em;
  margin-bottom: 32px;
  padding-bottom: 20px;
  border-bottom: 1px solid rgba(255,255,255,.08);
}
.swm-stats-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 0;
}
.swm-stats-cell {
  padding: 20px 0;
  border-bottom: 1px solid rgba(255,255,255,.06);
}
.swm-stats-cell:nth-child(odd) { padding-right: 20px; border-right: 1px solid rgba(255,255,255,.06); }
.swm-stats-cell:nth-child(even) { padding-left: 20px; }
.swm-stats-cell:nth-last-child(-n+2) { border-bottom: none; }
.swm-stats-num {
  font-size: 2rem;
  font-weight: 600;
  color: #fff;
  line-height: 1;
  margin-bottom: 6px;
}
.swm-stats-desc {
  font-size: .85rem;
  color: rgba(255,255,255,.4);
  font-weight: 300;
  text-transform: uppercase;
  letter-spacing: .06em;
}

/* ─── SITE + ASSET SECTION ─── */
.swm-asset-section {
  background: #080808;
  padding: 96px 24px;
  border-top: 1px solid rgba(255,255,255,.06);
}
.swm-asset-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: center;
}
@media(max-width:768px){ .swm-asset-inner{ grid-template-columns:1fr; gap:40px; } }

.swm-asset-img {
  width: 100%;
  height: 420px;
  object-fit: cover;
  border-radius: 16px;
  filter: grayscale(10%);
}

/* ─── GAINS LIST ─── */
.swm-gains-list {
  list-style: none;
  padding: 0;
  margin: 24px 0 32px;
  display: flex;
  flex-direction: column;
  gap: 12px;
}
.swm-gains-list li {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  color: rgba(255,255,255,.7);
  font-size: .95rem;
  font-weight: 300;
  line-height: 1.5;
}
.swm-gains-list li svg {
  flex-shrink: 0;
  width: 16px;
  height: 16px;
  margin-top: 3px;
  opacity: .8;
}

/* ─── FEATURES / CAPABILITIES SECTION ─── */
.swm-features-section {
  background: #080808;
  padding: 96px 24px;
  border-top: 1px solid rgba(255,255,255,.06);
}
.swm-features-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 2fr 3fr;
  gap: 64px;
  align-items: stretch;
}
@media(max-width:768px){ .swm-features-inner{ grid-template-columns:1fr; gap:40px; } }

.swm-features-list {
  list-style: none;
  padding: 0;
  margin: 32px 0 0;
  display: flex;
  flex-direction: column;
  gap: 0;
}
.swm-features-list button {
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
.swm-features-list button:hover { color: rgba(255,255,255,.7); }
.swm-features-list button.active { color: #fff; font-weight: 500; }

.swm-feature-display {
  position: relative;
  min-height: 420px;
  border-radius: 16px;
  overflow: hidden;
  background: #111;
}
.swm-feature-bg {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  opacity: .5;
  filter: grayscale(20%);
}
.swm-feature-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,.65);
}
.swm-feature-content {
  position: relative;
  z-index: 10;
  padding: 40px;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
}
.swm-feature-title {
  font-size: 1.6rem;
  font-weight: 300;
  color: #fff;
  letter-spacing: -.02em;
  margin-bottom: 12px;
}
.swm-feature-desc {
  font-size: .95rem;
  color: rgba(255,255,255,.65);
  font-weight: 300;
  line-height: 1.7;
  margin-bottom: 24px;
  max-width: 480px;
}
.swm-feature-link {
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
.swm-feature-link:hover { color: #fff; }
.swm-feature-link svg { width: 14px; height: 14px; }

/* ─── COMPARISON SECTION ─── */
.swm-comparison-section {
  background: #fff;
  padding: 96px 24px;
}
.swm-comparison-inner {
  max-width: 1100px;
  margin: 0 auto;
}
.swm-comparison-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 48px;
}
.swm-comparison-table thead tr { background: #f5f5f5; }
.swm-comparison-table th {
  padding: 20px 28px;
  font-size: .85rem;
  font-weight: 600;
  color: #111;
  text-transform: uppercase;
  letter-spacing: .06em;
  text-align: left;
  border-bottom: 2px solid #e5e7eb;
}
.swm-comparison-table td {
  padding: 20px 28px;
  font-size: .95rem;
  color: #374151;
  font-weight: 300;
  border-bottom: 1px solid #e5e7eb;
}
.swm-comparison-table tr:last-child td { border-bottom: none; }
.swm-comparison-table td:first-child { color: #9ca3af; }
.swm-comparison-table td:last-child { color: #111; font-weight: 400; }

.swm-blockquote {
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
.swm-blockquote cite {
  display: block;
  font-size: .85rem;
  font-style: normal;
  font-weight: 500;
  color: #6b7280;
  margin-top: 16px;
  letter-spacing: .02em;
}

/* ─── CHECKLIST SECTION ─── */
.swm-checklist-section {
  background: #080808;
  padding: 96px 24px;
  border-top: 1px solid rgba(255,255,255,.06);
}
.swm-checklist-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: center;
}
@media(max-width:768px){ .swm-checklist-inner{ grid-template-columns:1fr; gap:40px; } }

.swm-checklist {
  list-style: none;
  padding: 0;
  margin: 28px 0 32px;
  display: flex;
  flex-direction: column;
  gap: 14px;
}
.swm-checklist li {
  display: flex;
  align-items: flex-start;
  gap: 14px;
  color: rgba(255,255,255,.7);
  font-size: .95rem;
  font-weight: 300;
}
.swm-checklist li svg {
  flex-shrink: 0;
  width: 18px;
  height: 18px;
  margin-top: 2px;
  color: rgba(255,255,255,.5);
}
.swm-checklist-img {
  width: 100%;
  height: 480px;
  object-fit: cover;
  border-radius: 16px;
  filter: grayscale(10%);
}
.swm-testimonial {
  margin-top: 36px;
  padding-top: 28px;
  border-top: 1px solid rgba(255,255,255,.08);
}
.swm-testimonial-text {
  font-size: .95rem;
  font-style: italic;
  color: rgba(255,255,255,.5);
  font-weight: 300;
  line-height: 1.7;
  margin-bottom: 12px;
}
.swm-testimonial-author {
  font-size: .82rem;
  font-weight: 500;
  color: rgba(255,255,255,.35);
  text-transform: uppercase;
  letter-spacing: .06em;
}

/* ─── FINAL FORM SECTION ─── */
.swm-form-section {
  background: #000;
  padding: 96px 24px;
}
.swm-form-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .swm-form-inner{ grid-template-columns:1fr; gap:40px; } }

.swm-form-h {
  font-size: clamp(2rem, 4vw, 3rem);
  font-weight: 300;
  color: #fff;
  line-height: 1.2;
  margin: 16px 0 20px;
}
.swm-form-sub {
  color: rgba(255,255,255,.55);
  font-size: 1rem;
  font-weight: 300;
  margin-bottom: 32px;
  max-width: 400px;
}
.swm-form-ghost-btn {
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
.swm-form-ghost-btn:hover { border-color: rgba(255,255,255,.5); color: #fff; }

.swm-form-card {
  background: #fff;
  border-radius: 16px;
  padding: 36px;
}
.swm-form-card-header {
  font-size: 1rem;
  font-weight: 600;
  color: #111;
  margin-bottom: 24px;
  padding-bottom: 20px;
  border-bottom: 1px solid #e5e7eb;
  letter-spacing: -.01em;
}
.swm-form-fields { display: flex; flex-direction: column; gap: 16px; }
.swm-form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
@media(max-width:480px){ .swm-form-row{ grid-template-columns:1fr; } }
.swm-input-group { display: flex; flex-direction: column; gap: 6px; }
.swm-input-group label {
  font-size: .8rem;
  font-weight: 500;
  color: #6b7280;
  text-transform: uppercase;
  letter-spacing: .05em;
}
.swm-input {
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
.swm-input:focus { border-color: #111; background: #fff; }
.swm-textarea { resize: vertical; }
.swm-submit-btn {
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
.swm-submit-btn:hover { background: #222; transform: translateY(-1px); }

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
<div class="swm-hero">
  <img
    src="/assets/img/services/smart_water_monitoring_1.mov"
    alt="Smart Water Monitoring"
    class="swm-hero-img" />
  <div class="swm-hero-overlay"></div>
  <div class="swm-hero-content">
    <div class="section-eyebrow" style="color:rgba(255,255,255,0.4);">Flow Monitoring</div>
    <h1 class="swm-hero-h1">
      Smart Water Monitoring<br>
      <em>Complete Asset Visibility</em>
    </h1>
    <p class="swm-hero-sub">
      Monitor whole-building flows, sub-meter key assets, detect leaks instantly —
      and optimize usage across your site and entire portfolio.
      <strong>20–45%</strong> water savings, verified.
    </p>
    <div class="swm-hero-actions">
      <a href="#swm-form" class="btn-hero-primary">Request a Tower Audit</a>
      <a href="#swm-features" class="btn-hero-ghost">Explore Capabilities</a>
    </div>
  </div>
  <div class="swm-hero-stats">
    <div class="swm-stat">
      <div class="swm-stat-val">15 alerts/month/site</div>
      <div class="swm-stat-lbl">Smart monitoring uncovered</div>
    </div>
    <div class="swm-stat-sep"></div>
    <div class="swm-stat">
      <div class="swm-stat-val">6.3 months</div>
      <div class="swm-stat-lbl">Payback period</div>
    </div>
  </div>
</div>

{{-- ─── ENTERPRISE VISIBILITY ─── --}}
<section class="swm-visibility-section" id="whole-building-monitoring">
  <div class="swm-visibility-inner">
    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Our Approach</div>
      <h2 class="section-h2" style="color:#fff;">
        Enterprise-Wide<br><em>Water Visibility</em>
      </h2>
      <div class="swm-rule-wrap">
        <div class="swm-rule" id="visibilityRule"></div>
        <p class="section-sub" style="max-width:480px; color:rgba(255,255,255,.55);">
          Get a single pane of glass on every drop across your entire property portfolio.
          Near real-time analytics uncover hidden inefficiencies, protect assets,
          and arm the C-suite with bullet-proof water KPI reporting.
        </p>
      </div>
      <div class="swm-cards-grid">
        <div class="swm-card">
          <div class="swm-card-title">Live Consumption Dashboards</div>
          <div class="swm-card-desc">Aggregate flow, pressure, level and cost across all meters — updated every minute.</div>
        </div>
        <div class="swm-card">
          <div class="swm-card-title">Automated Alerts &amp; Trends</div>
          <div class="swm-card-desc">Threshold-based notifications for spikes, drifts or leaks, plus rolling 12-month trends.</div>
        </div>
        <div class="swm-card">
          <div class="swm-card-title">Executive Reporting</div>
          <div class="swm-card-desc">One-click PDF exports of actual vs. budgeted use, carbon &amp; cost savings — fit for boardrooms.</div>
        </div>
      </div>
    </div>

    <div class="swm-map-card">
      <div class="swm-map-card-header">Portfolio Sites — Live Overview</div>
      <div id="usWaterMap"></div>
    </div>
  </div>
</section>

{{-- ─── SITE + ASSET MONITORING ─── --}}
<section class="swm-asset-section" id="site-asset-monitoring">
  <div class="swm-asset-inner">
    <img
      src="/assets/img/services/water_monitoring.png"
      alt="Asset-level water metering"
      class="swm-asset-img" />

    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Asset Intelligence</div>
      <h2 class="section-h2" style="color:#fff;">
        Site &amp; Asset-Specific<br><em>Insights</em>
      </h2>
      <div class="swm-rule-wrap">
        <div class="swm-rule" id="assetRule"></div>
        <p class="section-sub" style="max-width:480px; color:rgba(255,255,255,.55);">
          Drill down to individual boilers, chillers, tenant suites or rooftop gardens.
          Understand exactly where to intervene, schedule maintenance and validate savings at the device level.
        </p>
      </div>
      <ul class="swm-gains-list">
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          <span><strong style="color:#fff;font-weight:500;">Per-meter breakouts</strong> — visualize make-up vs. discharge at any pipe or valve.</span>
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          <span><strong style="color:#fff;font-weight:500;">Condition-based routing</strong> — push critical alarms to engineering teams instantly.</span>
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          <span><strong style="color:#fff;font-weight:500;">Historical playback</strong> — replay last month's flow map to pinpoint abnormal cycles.</span>
        </li>
      </ul>
      <a href="/technologies/cooling-tower-monitoring" class="btn-dark-pill" style="background:#fff;color:#111;">
        Explore Cooling Tower Monitoring
      </a>
    </div>
  </div>
</section>

{{-- ─── FEATURES / CAPABILITIES ─── --}}
<section class="swm-features-section" id="swm-features"
  x-data="{
    selected: 0,
    features: [
      { label: 'Meter Integration',       title: 'Meter Integration',       desc: 'Connect your existing main and sub-meters — no new hardware required. Our platform adapts to your infrastructure from day one.' },
      { label: 'Data Aggregation',        title: 'Data Aggregation',        desc: 'Streams from all meters feed into our cloud platform, centralizing usage data into a single source of truth for your portfolio.' },
      { label: 'Analytics &amp; Alerts',  title: 'Analytics &amp; Alerts',  desc: 'Dashboards, trend analysis, leak detection, and customizable alerts keep you in control. Surface anomalies before they become costly surprises.' },
      { label: 'Early Leak Detection',    title: 'Early Leak Detection',    desc: 'Real-time anomaly detection surfaces invisible leaks before they compound into major losses on your billing statement and infrastructure.' },
      { label: 'ESG-Grade Reporting',     title: 'ESG-Grade Reporting',     desc: 'Automatically generate LEED, GRESB, and ESG-ready reports benchmarked across your full property portfolio.' },
      { label: 'Verified Savings',        title: 'Verified Savings',        desc: 'Every efficiency gain is documented and independently verified — giving you defensible data for stakeholder reporting and asset valuations.' }
    ]
  }"
>
  <div class="swm-features-inner">
    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Capabilities</div>
      <h2 class="section-h2" style="color:#fff;">
        Monitor Everything.<br><em>Miss Nothing.</em>
      </h2>
      <ul class="swm-features-list">
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

    <div class="swm-feature-display">
      <img
        src="/assets/img/services/water_monitoring.png"
        alt="Water monitoring"
        class="swm-feature-bg" />
      <div class="swm-feature-overlay"></div>
      <div class="swm-feature-content">
        <h4 class="swm-feature-title" x-html="features[selected].title"></h4>
        <p class="swm-feature-desc" x-html="features[selected].desc"></p>
        <a href="#swm-form" class="swm-feature-link">
          Request a demo
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7l7 7-7 7"/>
          </svg>
        </a>
      </div>
    </div>
  </div>
</section>

{{-- ─── COMPARISON TABLE ─── --}}
<section class="swm-comparison-section">
  <div class="swm-comparison-inner">
    <div class="section-eyebrow">Side by Side</div>
    <h2 class="section-h2" style="color:#111;">
      Blind Spots vs.<br><em>Full Visibility.</em>
    </h2>
    <table class="swm-comparison-table">
      <thead>
        <tr>
          <th>Without Smart Monitoring</th>
          <th>With Smart Monitoring</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Manual meter reads — billing surprises</td>
          <td>Real-time consumption, no surprises</td>
        </tr>
        <tr>
          <td>Leaks discovered weeks later</td>
          <td>Leak alerts within minutes</td>
        </tr>
        <tr>
          <td>No asset-level breakdown</td>
          <td>Per-meter, per-device visibility</td>
        </tr>
        <tr>
          <td>Estimated usage — no audit trail</td>
          <td>Verified, exportable usage data</td>
        </tr>
        <tr>
          <td>No ESG or portfolio reporting</td>
          <td>LEED &amp; GRESB-ready reporting</td>
        </tr>
      </tbody>
    </table>
    <blockquote class="swm-blockquote">
      "We saved $2,000/month thanks to early leak detection at our Miami site."
      <cite>— Property Manager, Ocean One Condominium</cite>
    </blockquote>
  </div>
</section>

{{-- ─── CHECKLIST + IMAGE ─── --}}
<section class="swm-checklist-section">
  <div class="swm-checklist-inner">
    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Full Scope</div>
      <h2 class="section-h2" style="color:#fff;">
        Monitor Every Drop.<br>Protect Every Asset.<br><em>Report Everything.</em>
      </h2>
      <p class="section-sub" style="color:rgba(255,255,255,.55);">
        Eliminate blind spots with intelligent water monitoring that powers real decisions at every level of your organization.
      </p>
      <ul class="swm-checklist">
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Meter integration — no new hardware
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Centralized cloud data aggregation
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Early leak detection &amp; instant alerts
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          ESG-grade usage reporting
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Per-asset, per-site consumption breakouts
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Historical playback &amp; trend analysis
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          20–45% water savings, verified
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Sub-10-month payback on investment
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Executive reporting — boardroom ready
        </li>
      </ul>
      <a href="#swm-form" class="btn-primary-pill">Request a Smart Monitoring Demo</a>
      <div class="swm-testimonial">
        <p class="swm-testimonial-text">
          "We reduced water costs by 30% in 4 months. The visibility into our mixed-use campus was a game-changer — we finally knew exactly where every gallon was going."
        </p>
        <div class="swm-testimonial-author">— Director of Engineering, Classic Properties</div>
      </div>
    </div>

    <img
      src="/assets/img/services/water_monitoring.png"
      alt="Smart water monitoring system"
      class="swm-checklist-img" />
  </div>
</section>

{{-- ─── FINAL FORM ─── --}}
<section class="swm-form-section" id="swm-form">
  <div class="swm-form-inner">

    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Get Started</div>
      <h2 class="swm-form-h">
        Transform Hidden Water<br>Challenges to <em>Opportunities</em>
      </h2>
      <p class="swm-form-sub">
        Request a confidential flow management audit to optimize your property's health and profitability.
      </p>
      <a href="#swm-form" class="swm-form-ghost-btn">Schedule a Confidential Consultation</a>
    </div>

    <div class="swm-form-card" id="schedule-demo">
      <div class="swm-form-card-header">Confidential Flow Assessment Request</div>
      <form class="swm-form-fields">
        <div class="swm-form-row">
          <input type="text" placeholder="First Name" required class="swm-input" />
          <input type="text" placeholder="Last Name"  required class="swm-input" />
        </div>
        <div class="swm-form-row">
          <input type="text" placeholder="Company Name" required class="swm-input" />
          <input type="text" placeholder="Company Role" required class="swm-input" />
        </div>
        <div class="swm-form-row">
          <input type="tel"   placeholder="Contact Number" required class="swm-input" />
          <input type="email" placeholder="Email"          required class="swm-input" />
        </div>
        <div class="swm-form-row">
          <div class="swm-input-group">
            <label>Preferred Date</label>
            <input type="date" required class="swm-input" />
          </div>
          <div class="swm-input-group">
            <label>Preferred Time</label>
            <input type="time" required class="swm-input" />
          </div>
        </div>
        <textarea placeholder="Additional Message (optional)" rows="4" class="swm-input swm-textarea"></textarea>
        <button type="submit" class="swm-submit-btn">Submit Request</button>
      </form>
    </div>

  </div>
</section>

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