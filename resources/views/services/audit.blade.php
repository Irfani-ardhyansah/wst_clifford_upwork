@extends('layouts.app')

@section('title', 'Water Site Audit — Water Solutions Technology')

@section('content')

{{-- ─── HERO ─── --}}
<div class="audit-hero">
  <img src="/assets/img/services/watersite_audit_building_1.png" alt="Water Audit Engineer" class="audit-hero-img" />
  <div class="audit-hero-overlay"></div>
  <div class="audit-hero-content">
    <div class="section-eyebrow" style="color:rgba(255,255,255,0.4);">Water Site Audit</div>
    <h1 class="audit-hero-h1">
      The Cornerstone to<br>
      <em>Smart Water Management</em>
    </h1>
    <p class="audit-hero-sub">
      Our unique water audit strategies save businesses an average of 10–25% of their annual water utility fees.
    </p>
    <div class="audit-hero-actions">
      <a href="#audit-commitment" class="btn-hero-primary">Speak With an Auditor</a>
      <a href="#audit-commitment" class="btn-hero-ghost">Learn More</a>
    </div>
  </div>
  <div class="audit-hero-stats">
    <div class="audit-stat">
      <div class="audit-stat-val">180,000 gal/month</div>
      <div class="audit-stat-lbl">Audit uncovered savings</div>
    </div>
    <div class="audit-stat-sep"></div>
    <div class="audit-stat">
      <div class="audit-stat-val">6.3 months</div>
      <div class="audit-stat-lbl">Payback period</div>
    </div>
  </div>
</div>

{{-- ─── COMMITMENT ─── --}}
<section class="audit-commit-section" id="audit-commitment">
  <div class="audit-commit-inner">
    <div>
      <div class="section-eyebrow">Putting the External Water Audit Advisors to Work</div>
      <h2 class="section-h2">
        Precision-engineered water audits that<br><em>reduce OpEx and improve NOI</em>
      </h2>
    </div>
    <div class="audit-commit-body">
      <p class="section-sub" style="max-width:560px;">
        The fresh pair of eyes – from experts. Water utility bills and statements can be confusing, and billing errors often go unnoticed. Without routine audits conducted by external experts and advisors, your business could be unknowingly overpaying.
      </p>
    </div>
  </div>
</section>

{{-- ─── WHAT YOU GAIN ─── --}}
<section class="audit-gain-section">
  <div class="audit-gain-inner">
    <div class="audit-gain-header">
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">What You Gain</div>
      <h2 class="section-h2" style="color:#fff;">
        Measurable Results<br>&amp; <em>Proven Savings</em>
      </h2>
      <p class="section-sub" style="color:rgba(255,255,255,0.5);max-width:480px;">
        Our water audits deliver tangible benefits across operations, finance, and sustainability.
      </p>
    </div>

    <div class="audit-gain-grid">
      <div class="audit-gain-card">
        <h3 class="audit-gain-card-title">20–30% Water &amp; Sewer Savings</h3>
        <div class="audit-gain-items">
          <div class="audit-gain-item">
            <p>Typically achieved through our comprehensive audit process</p>
          </div>
        </div>
      </div>

      <div class="audit-gain-card">
        <h3 class="audit-gain-card-title">ESG-Ready Reporting</h3>
        <div class="audit-gain-items">
          <div class="audit-gain-item">
            <p>For stakeholders, investors, and regulatory compliance</p>
          </div>
        </div>
      </div>

      <div class="audit-gain-card">
        <h3 class="audit-gain-card-title">ROI Within 12 Months</h3>
        <div class="audit-gain-items">
          <div class="audit-gain-item">
            <p>Most audits pay for themselves within one year</p>
          </div>
        </div>
      </div>

      <div class="audit-gain-card">
        <h3 class="audit-gain-card-title">Asset Protection &amp; Compliance</h3>
        <div class="audit-gain-items">
          <div class="audit-gain-item">
            <p>Risk mitigation and regulatory compliance</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ─── WHY IT PAYS ─── --}}
<section class="audit-split-section">
  <div class="audit-split-inner">

    <div class="audit-split-item">
      <div class="audit-split-text">
        <div class="section-eyebrow">Why It Pays to Validate Bills</div>
        <h2 class="section-h2" style="font-size:clamp(1.6rem,3vw,2.4rem);">
          Understanding Your<br><em>Water Utility Fees</em>
        </h2>
        <p class="section-sub">
          For most enterprises, water is an unmanaged utility and an unmitigated financial risk. While you have strategic oversight on energy, complex water billing—rife with regional variances and errors—creates significant financial exposure.
        </p>
        <p class="section-sub">
          We provide the expertise to audit this complexity, recover overpayments, and transform an operational blind spot into a source of savings and efficiency. A WST water audit removes uncertainty from your water bill.
        </p>
      </div>
      <div class="audit-split-img-wrap">
        <img src="/assets/img/services/audit_engineer_hotel.png"
             alt="Water Audit Process" class="audit-split-img" />
      </div>
    </div>

  </div>
</section>

{{-- ─── WATER PRICE INCREASES ─── --}}
<section class="audit-price-section">
  <div class="audit-price-inner">
    <div class="audit-price-text">
      <div class="section-eyebrow">Water Price Increases &amp; Business Impact</div>
      <h2 class="section-h2">
        Conducting a<br><em>Water Audit</em>
      </h2>
      <p class="section-sub">
        We don't stop at insights – we take action. Our end-to-end audit mitigates water-related financial risk by identifying infrastructure improvements, complex billing errors, and recovering historical overpayments.
      </p>
      <ul class="audit-price-list">
        <li>Invoice &amp; Tariff Analysis</li>
        <li>Targeted Site Inspections</li>
        <li>Detailed Reporting</li>
        <li>Implementation &amp; Recovery</li>
        <li>Opportunity Identification</li>
        <li>Utility forecasting, budgeting &amp; procurement</li>
        <li>Ongoing support from water efficiency specialists</li>
      </ul>
      <div class="audit-price-cost">
        <h3>What Our Water Audit Will Cost You:</h3>
        <p><strong>No upfront fees.</strong> Delivered via a shared-savings approach—meaning there are no upfront costs.</p>
        <p>Our compensation is tied directly to the savings we help you recover. <span>You Only Pay When You Save.</span></p>
      </div>
    </div>
  </div>
</section>

{{-- ─── FINAL CTA ─── --}}
<section class="audit-final-section">
  <div class="audit-final-inner">
    <div class="audit-final-content">
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Get Started</div>
      <h2 class="audit-final-h">Demonstrate ESG &amp; Regulatory Compliance</h2>
      <p class="audit-final-sub">Our audit reports are aligned with your sustainability strategy and environmental compliance.</p>
      <div class="audit-final-stats">
        <div class="audit-final-stat">
          <div class="audit-final-stat-val">27%</div>
          <div class="audit-final-stat-lbl">Avg. Water Use Reduction Post-Audit</div>
        </div>
      </div>
      <div class="audit-final-cta">
        <a href="/contact" class="audit-final-btn-primary">Request a Confidential Audit</a>
        <a href="/resources" class="audit-final-btn-ghost">Water Webinars on Demand</a>
      </div>
    </div>
  </div>
</section>

@endsection

@push('styles')
<style>
/* ═══════════════════════════════════════
   AUDIT PAGE — Styles matching About aesthetic
   ═══════════════════════════════════════ */

/* ─── HERO ─── */
.audit-hero {
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #000;
  overflow: hidden;
}
.audit-hero-img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  opacity: .25;
  filter: grayscale(15%);
}
.audit-hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(0,0,0,.75) 40%, rgba(0,0,0,.45) 100%);
}
.audit-hero-content {
  position: relative;
  z-index: 10;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  text-align: left;
  padding: 0 24px;
  max-width: 780px;
}
.audit-hero-h1 {
  font-size: clamp(2.4rem, 6vw, 4.5rem);
  font-weight: 300;
  color: #fff;
  line-height: 1.12;
  letter-spacing: -0.02em;
  margin: 16px 0 20px;
}
.audit-hero-h1 em { font-style: italic; color: rgba(255,255,255,.65); }
.audit-hero-sub {
  color: rgba(255,255,255,.55);
  font-size: 1.1rem;
  font-weight: 300;
  letter-spacing: .04em;
  margin-bottom: 32px;
  max-width: 480px;
}
.audit-hero-actions { display: flex; gap: 12px; flex-wrap: wrap; }
.audit-hero-stats {
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
.audit-stat {
  text-align: center;
}
.audit-stat-val {
  font-size: 1.1rem;
  font-weight: 500;
  color: #fff;
  margin-bottom: 4px;
}
.audit-stat-lbl {
  font-size: .75rem;
  color: rgba(255,255,255,.6);
  text-transform: uppercase;
  letter-spacing: .08em;
}
.audit-stat-sep {
  width: 1px;
  height: 40px;
  background: rgba(255,255,255,.2);
}
@media(max-width:768px){
  .audit-hero-stats {
    position: relative;
    bottom: 0;
    right: 0;
    margin: 40px auto 0;
    max-width: 320px;
  }
}

/* ─── COMMITMENT ─── */
.audit-commit-section {
  background: #080808;
  padding: 96px 24px;
  border-bottom: 1px solid rgba(255,255,255,.06);
}
.audit-commit-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .audit-commit-inner{ grid-template-columns:1fr; gap:32px; } }
.audit-commit-body {}

/* ─── GAIN SECTION ─── */
.audit-gain-section {
  background: #080808;
  padding: 96px 24px;
  border-top: 1px solid rgba(255,255,255,.06);
}
.audit-gain-inner { max-width: 1100px; margin: 0 auto; }
.audit-gain-header { margin-bottom: 56px; }
.audit-gain-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 20px;
}
.audit-gain-card {
  border: 1px solid rgba(255,255,255,.08);
  border-radius: 16px;
  padding: 36px;
  background: rgba(255,255,255,.025);
  transition: border-color .3s, background .3s;
}
.audit-gain-card:hover {
  border-color: rgba(255,255,255,.15);
  background: rgba(255,255,255,.04);
}
.audit-gain-card-title {
  color: #fff;
  font-size: 1.1rem;
  font-weight: 500;
  letter-spacing: -.01em;
  margin-bottom: 28px;
}
.audit-gain-items { display: flex; flex-direction: column; gap: 0; }
.audit-gain-item { padding: 20px 0; border-top: 1px solid rgba(255,255,255,.07); }
.audit-gain-item:first-child { border-top: none; padding-top: 0; }
.audit-gain-item p {
  color: rgba(255,255,255,.6);
  font-size: .9rem;
  line-height: 1.6;
  font-weight: 300;
  margin: 0;
}

/* ─── SPLIT SECTIONS ─── */
.audit-split-section {
  background: #fff;
  padding: 96px 24px;
}
.audit-split-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: 80px;
}
.audit-split-item {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: center;
}
@media(max-width:768px){
  .audit-split-item{ grid-template-columns:1fr; gap:32px; }
}
.audit-split-img-wrap { overflow: hidden; border-radius: 12px; }
.audit-split-img {
  width: 100%;
  height: 360px;
  object-fit: cover;
  display: block;
  filter: grayscale(15%);
  transition: filter .4s, transform .4s;
}
.audit-split-img:hover { filter: grayscale(0%); transform: scale(1.02); }
.audit-split-text {}

/* ─── PRICE SECTION ─── */
.audit-price-section {
  background: #f9f9f9;
  padding: 96px 24px;
}
.audit-price-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .audit-price-inner{ grid-template-columns:1fr; gap:32px; } }
.audit-price-text {}
.audit-price-list {
  list-style: none;
  padding: 0;
  margin: 24px 0;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px;
}
.audit-price-list li {
  padding: 12px 0;
  border-bottom: 1px solid #e5e5e5;
  font-weight: 500;
  color: #374151;
}
.audit-price-list li:before {
  content: "✓";
  color: #2563eb;
  font-weight: bold;
  margin-right: 8px;
}
.audit-price-cost {
  background: #111;
  color: #fff;
  padding: 24px;
  border-radius: 12px;
  margin-top: 32px;
}
.audit-price-cost h3 {
  font-size: 1.1rem;
  font-weight: 600;
  margin-bottom: 12px;
}
.audit-price-cost p {
  font-size: .9rem;
  line-height: 1.6;
  margin-bottom: 8px;
}
.audit-price-cost span {
  color: #60a5fa;
  font-weight: 600;
}

/* ─── FINAL SECTION ─── */
.audit-final-section {
  background: #000;
  padding: 96px 24px;
}
.audit-final-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: center;
}
@media(max-width:768px){ .audit-final-inner{ grid-template-columns:1fr; gap:32px; } }
.audit-final-content {}
.audit-final-h {
  font-size: clamp(2rem, 4vw, 3rem);
  font-weight: 300;
  color: #fff;
  line-height: 1.2;
  margin: 16px 0 20px;
}
.audit-final-sub {
  color: rgba(255,255,255,.6);
  font-size: 1rem;
  font-weight: 300;
  margin-bottom: 32px;
  max-width: 480px;
}
.audit-final-stats {
  margin-bottom: 40px;
}
.audit-final-stat {
  display: inline-block;
  background: rgba(255,255,255,.1);
  padding: 16px 24px;
  border-radius: 8px;
  margin-bottom: 16px;
}
.audit-final-stat-val {
  font-size: 2rem;
  font-weight: 200;
  color: #fff;
  display: block;
}
.audit-final-stat-lbl {
  font-size: .8rem;
  color: rgba(255,255,255,.7);
  margin-top: 4px;
}
.audit-final-cta {
  display: flex;
  gap: 16px;
  flex-wrap: wrap;
}
</style>
@endpush