@extends('layouts.app')

@section('title', 'Scoping Studies — Water Solutions Technology')

@section('content')

{{-- ─── HERO ─── --}}
<div class="scope-hero">
  <img
    src="/assets/img/services/scope_studies.png"
    alt="Modern hotel or commercial building"
    class="scope-hero-img" />
  <div class="scope-hero-overlay"></div>
  <div class="scope-hero-content">
    <div class="section-eyebrow" style="color:rgba(255,255,255,0.4);">Scoping Studies</div>
    <h1 class="scope-hero-h1">
      The Gold Standard in<br>
      <em>Water Stewardship</em>
    </h1>
    <p class="scope-hero-sub">
      Delivering proven returns and transparency for owners, asset managers, and property teams.
    </p>
    <div class="scope-hero-actions">
      <a href="#scope-form" class="btn-hero-primary">Request a Flow Assessment</a>
      <a href="#scope-approach" class="btn-hero-ghost">Learn More</a>
    </div>
  </div>
  <div class="scope-hero-stats">
    <div class="scope-stat">
      <div class="scope-stat-val">180,000 gal/month</div>
      <div class="scope-stat-lbl">Audit uncovered savings</div>
    </div>
    <div class="scope-stat-sep"></div>
    <div class="scope-stat">
      <div class="scope-stat-val">6.3 months</div>
      <div class="scope-stat-lbl">Payback period</div>
    </div>
  </div>
</div>

{{-- ─── PROVEN APPROACH ─── --}}
<section class="scope-approach-section" id="scope-approach">
  <div class="scope-approach-inner">

    <div class="scope-approach-phases">
      <div class="section-eyebrow">Our Proven Approach</div>
      <h2 class="section-h2">A Science-Driven<br><em>Four-Phase Process</em></h2>

      <div class="scope-phases">
        <div class="scope-phase">
          <div class="scope-phase-icon">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3" stroke-linecap="round"/>
            </svg>
          </div>
          <div class="scope-phase-body">
            <div class="scope-phase-label">Phase I</div>
            <div class="scope-phase-title">Scoping Studies</div>
            <p class="scope-phase-desc">Pointing you into the right technical and economic decisions</p>
          </div>
        </div>

        <div class="scope-phase">
          <div class="scope-phase-icon">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <rect x="4" y="4" width="16" height="16" rx="3"/><path d="M8 12l2 2l4-4" stroke-linecap="round"/>
            </svg>
          </div>
          <div class="scope-phase-body">
            <div class="scope-phase-label">Phase II</div>
            <div class="scope-phase-title">Implementation</div>
            <p class="scope-phase-desc">Delivering highest quality workmanship exceeding ISO Standards and localized building codes</p>
          </div>
        </div>

        <div class="scope-phase">
          <div class="scope-phase-icon">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <rect x="6" y="4" width="12" height="16" rx="2"/><path d="M9 8h6M9 12h6M9 16h3" stroke-linecap="round"/>
            </svg>
          </div>
          <div class="scope-phase-body">
            <div class="scope-phase-label">Phase III</div>
            <div class="scope-phase-title">Benchmarking</div>
            <p class="scope-phase-desc">Providing data-driven insights to maximize savings and efficiency</p>
          </div>
        </div>

        <div class="scope-phase">
          <div class="scope-phase-icon">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <circle cx="12" cy="10" r="4"/><path d="M4 20v-1a6 6 0 0112 0v1" stroke-linecap="round"/>
            </svg>
          </div>
          <div class="scope-phase-body">
            <div class="scope-phase-label">Phase IV</div>
            <div class="scope-phase-title">24/7 Ongoing Support</div>
            <p class="scope-phase-desc">Continuous adjustments and optimizations to ensure that the original goals are met</p>
          </div>
        </div>
      </div>
    </div>

    <div class="scope-approach-insights">
      <div class="scope-insights-card">
        <h3 class="scope-insights-title">Water Metering <span>Industry Insights</span></h3>
        <div class="scope-insights-grid">
          <div class="scope-insight-item">
            <div class="scope-insight-val">30%+</div>
            <div class="scope-insight-lbl">Non-revenue water lost in distribution systems</div>
          </div>
          <div class="scope-insight-item">
            <div class="scope-insight-val">10–23%</div>
            <div class="scope-insight-lbl">Typical savings from our clients</div>
          </div>
          <div class="scope-insight-item">
            <div class="scope-insight-val">15–25%</div>
            <div class="scope-insight-lbl">Billing discrepancy from manual readings and aging meters</div>
          </div>
          <div class="scope-insight-item">
            <div class="scope-insight-val">ROI &lt;2y</div>
            <div class="scope-insight-lbl">Payback for most commercial property projects</div>
          </div>
        </div>
        <div class="scope-insights-quote">
          "Accurate, real-time water metering is not just a compliance or billing issue — it's a strategic advantage for cost control, sustainability, and asset value."
        </div>
      </div>
    </div>

  </div>
</section>

{{-- ─── WHY IT WORKS ─── --}}
<section class="scope-split-section">
  <div class="scope-split-inner">

    <div class="scope-split-item">
      <div class="scope-split-text">
        <div class="section-eyebrow">Why It Works for Leaders Like You</div>
        <h2 class="section-h2" style="font-size:clamp(1.6rem,3vw,2.4rem);">
          Strategic ROI &amp;<br><em>ESG-Grade Reporting</em>
        </h2>
        <div class="scope-why-list">
          <div class="scope-why-item">
            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <rect x="3" y="3" width="18" height="18" rx="4"/><path d="M8 13l3 3l5-5" stroke-linecap="round"/>
            </svg>
            <div>
              <div class="scope-why-title">Strategic ROI</div>
              <div class="scope-why-sub">ESG-Grade Reporting aligned to your sustainability strategy</div>
            </div>
          </div>
          <div class="scope-why-item">
            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <rect x="4" y="4" width="16" height="16" rx="3"/><path d="M8 11h8M8 15h6" stroke-linecap="round"/><circle cx="9" cy="9" r="1" fill="currentColor"/>
            </svg>
            <div>
              <div class="scope-why-title">White-Glove Service</div>
              <div class="scope-why-sub">Dedicated specialists from scoping through ongoing optimization</div>
            </div>
          </div>
        </div>
        <a href="/resources" class="scope-dl-btn">Download Playbook</a>
      </div>

      <div class="scope-split-right">
        <div class="section-eyebrow">Water Use Intensity Benchmarking</div>
        <p class="section-sub" style="max-width:440px;">
          See how your property stacks up vs. industry benchmarks. Trusted by leaders at AD1 Global and DiamondRock Hospitality.
        </p>
        <div class="scope-split-img-wrap">
          <img
            src="/assets/img/services/scope_study_water_use_intensity_5.png"
            alt="Water Use Intensity Chart"
            class="scope-split-img" />
        </div>
      </div>
    </div>

  </div>
</section>

{{-- ─── TRUSTED BY ─── --}}
<section class="scope-trust-section">
  <div class="scope-trust-inner">

    <div class="scope-trust-text">
      <div class="section-eyebrow">Trusted By</div>
      <h2 class="section-h2" style="font-size:clamp(1.8rem,4vw,3rem);">
        Industry Leaders<br><em>Across Every Sector</em>
      </h2>
      <p class="section-sub">
        Hospitality, Manufacturing, Commercial Real Estate, Health Centers, Schools &amp; Universities, Multifamily Communities, Condominiums — and many more.
      </p>
      <blockquote class="scope-quote">
        <p>"Their expertise in transformational water management led to impeccable results — both in cost savings and sustainability at the site and portfolio levels."</p>
        <cite>Asset Manager, Hilton South Tower</cite>
      </blockquote>
      <a href="/contact" class="scope-cta-btn">Request a Confidential Consultation</a>
      <div class="scope-logos">
        <span>Sandals</span>
        <span>AD1</span>
        <span>DiamondRock</span>
        <span>Even Hotels</span>
      </div>
    </div>

    <div class="scope-trust-img-wrap">
      <img
        src="/assets/img/services/scope_study_water_use_intensity_client_results_1.png"
        alt="Client Results Chart"
        class="scope-trust-img" />
    </div>

  </div>
</section>

{{-- ─── FINAL CTA + FORM ─── --}}
<section class="scope-form-section" id="scope-form">
  <div class="scope-form-inner">

    <div class="scope-form-text">
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Get Started</div>
      <h2 class="scope-form-h">Transform Hidden Water<br>Challenges to <em>Opportunities</em></h2>
      <p class="scope-form-sub">
        Request a confidential flow management audit to optimize your property's profitability.
      </p>
      <a href="#scope-form" class="scope-form-ghost-btn">Schedule a Confidential Consultation</a>
    </div>

    <div class="scope-form-card" id="schedule-demo">
      <div class="scope-form-card-header">Confidential Flow Assessment</div>
      <form class="scope-form-fields">
        <div class="scope-form-row">
          <input type="text" placeholder="First Name" required class="scope-input" />
          <input type="text" placeholder="Last Name" required class="scope-input" />
        </div>
        <div class="scope-form-row">
          <input type="text" placeholder="Company Name" required class="scope-input" />
          <input type="text" placeholder="Company Role" required class="scope-input" />
        </div>
        <div class="scope-form-row">
          <input type="tel" placeholder="Contact Number" required class="scope-input" />
          <input type="email" placeholder="Email" required class="scope-input" />
        </div>
        <div class="scope-form-row">
          <div class="scope-input-group">
            <label>Preferred Date</label>
            <input type="date" required class="scope-input" />
          </div>
          <div class="scope-input-group">
            <label>Preferred Time</label>
            <input type="time" required class="scope-input" />
          </div>
        </div>
        <textarea placeholder="Additional Message (optional)" rows="4" class="scope-input scope-textarea"></textarea>
        <button type="submit" class="scope-submit-btn">Submit Request</button>
      </form>
    </div>

  </div>
</section>

@endsection

@push('styles')
<style>
/* ═══════════════════════════════════════
   SCOPE STUDIES PAGE — Style matching Audit page
   ═══════════════════════════════════════ */

/* ─── HERO ─── */
.scope-hero {
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #000;
  overflow: hidden;
}
.scope-hero-img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  opacity: .25;
  filter: grayscale(15%);
}
.scope-hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(0,0,0,.75) 40%, rgba(0,0,0,.45) 100%);
}
.scope-hero-content {
  position: relative;
  z-index: 10;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  text-align: left;
  padding: 0 24px;
  max-width: 780px;
}
.scope-hero-h1 {
  font-size: clamp(2.4rem, 6vw, 4.5rem);
  font-weight: 300;
  color: #fff;
  line-height: 1.12;
  letter-spacing: -0.02em;
  margin: 16px 0 20px;
}
.scope-hero-h1 em { font-style: italic; color: rgba(255,255,255,.65); }
.scope-hero-sub {
  color: rgba(255,255,255,.55);
  font-size: 1.1rem;
  font-weight: 300;
  letter-spacing: .04em;
  margin-bottom: 32px;
  max-width: 480px;
}
.scope-hero-actions { display: flex; gap: 12px; flex-wrap: wrap; }
.scope-hero-stats {
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
.scope-stat { text-align: center; }
.scope-stat-val {
  font-size: 1.1rem;
  font-weight: 500;
  color: #fff;
  margin-bottom: 4px;
}
.scope-stat-lbl {
  font-size: .75rem;
  color: rgba(255,255,255,.6);
  text-transform: uppercase;
  letter-spacing: .08em;
}
.scope-stat-sep {
  width: 1px;
  height: 40px;
  background: rgba(255,255,255,.2);
}
@media(max-width:768px){
  .scope-hero-stats {
    position: relative;
    bottom: 0; right: 0;
    margin: 40px auto 0;
    max-width: 320px;
  }
}

/* ─── APPROACH ─── */
.scope-approach-section {
  background: #080808;
  padding: 96px 24px;
  border-bottom: 1px solid rgba(255,255,255,.06);
}
.scope-approach-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .scope-approach-inner{ grid-template-columns:1fr; gap:40px; } }

.scope-phases {
  margin-top: 40px;
  display: flex;
  flex-direction: column;
  gap: 0;
  border-left: 1px solid rgba(255,255,255,.1);
  padding-left: 28px;
}
.scope-phase {
  display: flex;
  gap: 20px;
  align-items: flex-start;
  padding: 24px 0;
  border-bottom: 1px solid rgba(255,255,255,.06);
}
.scope-phase:last-child { border-bottom: none; }
.scope-phase-icon {
  flex-shrink: 0;
  width: 44px;
  height: 44px;
  border: 1px solid rgba(255,255,255,.15);
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: rgba(255,255,255,.5);
}
.scope-phase-body {}
.scope-phase-label {
  font-size: .72rem;
  font-weight: 500;
  color: rgba(255,255,255,.35);
  text-transform: uppercase;
  letter-spacing: .1em;
  margin-bottom: 4px;
}
.scope-phase-title {
  font-size: 1rem;
  font-weight: 500;
  color: #fff;
  margin-bottom: 6px;
}
.scope-phase-desc {
  font-size: .875rem;
  color: rgba(255,255,255,.5);
  font-weight: 300;
  line-height: 1.6;
  margin: 0;
}

/* ─── INSIGHTS CARD ─── */
.scope-insights-card {
  border: 1px solid rgba(255,255,255,.08);
  border-radius: 16px;
  padding: 36px;
  background: rgba(255,255,255,.025);
}
.scope-insights-title {
  font-size: 1.1rem;
  font-weight: 500;
  color: #fff;
  margin-bottom: 28px;
  letter-spacing: -.01em;
}
.scope-insights-title span { font-weight: 300; color: rgba(255,255,255,.5); }
.scope-insights-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 24px;
  margin-bottom: 28px;
}
.scope-insight-item {}
.scope-insight-val {
  font-size: 2rem;
  font-weight: 200;
  color: #fff;
  letter-spacing: -.02em;
  margin-bottom: 6px;
}
.scope-insight-lbl {
  font-size: .8rem;
  color: rgba(255,255,255,.5);
  font-weight: 300;
  line-height: 1.5;
}
.scope-insights-quote {
  border-top: 1px solid rgba(255,255,255,.07);
  padding-top: 20px;
  font-size: .875rem;
  color: rgba(255,255,255,.45);
  font-style: italic;
  font-weight: 300;
  line-height: 1.7;
}

/* ─── SPLIT SECTION ─── */
.scope-split-section {
  background: #fff;
  padding: 96px 24px;
}
.scope-split-inner {
  max-width: 1100px;
  margin: 0 auto;
}
.scope-split-item {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .scope-split-item{ grid-template-columns:1fr; gap:40px; } }

.scope-why-list {
  margin: 28px 0 32px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}
.scope-why-item {
  display: flex;
  gap: 16px;
  align-items: flex-start;
  padding: 20px 0;
  border-bottom: 1px solid #f0f0f0;
}
.scope-why-item svg { flex-shrink: 0; color: #374151; margin-top: 2px; }
.scope-why-title {
  font-size: 1rem;
  font-weight: 600;
  color: #111;
  margin-bottom: 4px;
}
.scope-why-sub {
  font-size: .875rem;
  color: #6b7280;
  font-weight: 300;
  line-height: 1.6;
}
.scope-dl-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: #111;
  color: #fff;
  font-size: .875rem;
  font-weight: 500;
  padding: 12px 24px;
  border-radius: 100px;
  text-decoration: none;
  transition: background .2s, transform .2s;
}
.scope-dl-btn:hover { background: #222; transform: translateY(-1px); }

.scope-split-right {}
.scope-split-img-wrap {
  margin-top: 24px;
  overflow: hidden;
  border-radius: 12px;
}
.scope-split-img {
  width: 100%;
  height: auto;
  display: block;
  filter: grayscale(10%);
  transition: filter .4s, transform .4s;
}
.scope-split-img:hover { filter: grayscale(0%); transform: scale(1.02); }

/* ─── TRUSTED BY ─── */
.scope-trust-section {
  background: #f9f9f9;
  padding: 96px 24px;
}
.scope-trust-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: center;
}
@media(max-width:768px){ .scope-trust-inner{ grid-template-columns:1fr; gap:40px; } }

.scope-quote {
  border-left: 3px solid #111;
  padding-left: 20px;
  margin: 28px 0 32px;
}
.scope-quote p {
  font-size: 1rem;
  font-style: italic;
  color: #374151;
  font-weight: 300;
  line-height: 1.7;
  margin: 0 0 8px;
}
.scope-quote cite {
  font-size: .8rem;
  color: #9ca3af;
  font-style: normal;
  text-transform: uppercase;
  letter-spacing: .06em;
}
.scope-cta-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: #111;
  color: #fff;
  font-size: .875rem;
  font-weight: 500;
  padding: 12px 24px;
  border-radius: 100px;
  text-decoration: none;
  transition: background .2s, transform .2s;
}
.scope-cta-btn:hover { background: #222; transform: translateY(-1px); }
.scope-logos {
  display: flex;
  flex-wrap: wrap;
  gap: 24px;
  margin-top: 32px;
}
.scope-logos span {
  font-size: 1.4rem;
  font-weight: 700;
  color: #d1d5db;
  letter-spacing: -.01em;
}

.scope-trust-img-wrap { overflow: hidden; border-radius: 12px; }
.scope-trust-img {
  width: 100%;
  height: auto;
  display: block;
  filter: grayscale(10%);
  transition: filter .4s, transform .4s;
}
.scope-trust-img:hover { filter: grayscale(0%); transform: scale(1.01); }

/* ─── FORM SECTION ─── */
.scope-form-section {
  background: #000;
  padding: 96px 24px;
}
.scope-form-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .scope-form-inner{ grid-template-columns:1fr; gap:40px; } }

.scope-form-h {
  font-size: clamp(2rem, 4vw, 3rem);
  font-weight: 300;
  color: #fff;
  line-height: 1.2;
  margin: 16px 0 20px;
}
.scope-form-h em { font-style: italic; color: rgba(255,255,255,.65); }
.scope-form-sub {
  color: rgba(255,255,255,.55);
  font-size: 1rem;
  font-weight: 300;
  margin-bottom: 32px;
  max-width: 400px;
}
.scope-form-ghost-btn {
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
.scope-form-ghost-btn:hover { border-color: rgba(255,255,255,.5); color: #fff; }

.scope-form-card {
  background: #fff;
  border-radius: 16px;
  padding: 36px;
}
.scope-form-card-header {
  font-size: 1rem;
  font-weight: 600;
  color: #111;
  margin-bottom: 24px;
  padding-bottom: 20px;
  border-bottom: 1px solid #e5e7eb;
  letter-spacing: -.01em;
}
.scope-form-fields { display: flex; flex-direction: column; gap: 16px; }
.scope-form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
@media(max-width:480px){ .scope-form-row{ grid-template-columns:1fr; } }

.scope-input-group { display: flex; flex-direction: column; gap: 6px; }
.scope-input-group label {
  font-size: .8rem;
  font-weight: 500;
  color: #6b7280;
  text-transform: uppercase;
  letter-spacing: .05em;
}
.scope-input {
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
.scope-input:focus { border-color: #111; background: #fff; }
.scope-textarea { resize: vertical; }
.scope-submit-btn {
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
.scope-submit-btn:hover { background: #222; transform: translateY(-1px); }
</style>
@endpush