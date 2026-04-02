@extends('layouts.app')

@section('title', 'Smart Water Treatment & Recovery Services — Water Solutions Technology')

@push('styles')
<style>
/* ═══════════════════════════════════════
   WATER TREATMENT PAGE — Style matching Elara AI page
   ═══════════════════════════════════════ */

/* ─── HERO ─── */
.wt-hero {
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #000;
  overflow: hidden;
}
.wt-hero-img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  opacity: .55;
  filter: grayscale(15%);
}
.wt-hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(0,0,0,.75) 40%, rgba(0,0,0,.45) 100%);
}
.wt-hero-content {
  position: relative;
  z-index: 10;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  text-align: left;
  padding: 0 24px;
  max-width: 780px;
}
.wt-hero-h1 {
  font-size: clamp(2.4rem, 6vw, 4.5rem);
  font-weight: 300;
  color: #fff;
  line-height: 1.12;
  letter-spacing: -0.02em;
  margin: 16px 0 20px;
}
.wt-hero-h1 em { font-style: italic; color: rgba(255,255,255,.65); }
.wt-hero-sub {
  color: rgba(255,255,255,.55);
  font-size: 1.1rem;
  font-weight: 300;
  letter-spacing: .04em;
  margin-bottom: 32px;
  max-width: 480px;
}
.wt-hero-sub strong { color: #fff; font-weight: 500; }
.wt-hero-actions { display: flex; gap: 12px; flex-wrap: wrap; }
.wt-hero-stats {
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
.wt-stat { text-align: center; }
.wt-stat-val {
  font-size: 1.1rem;
  font-weight: 500;
  color: #fff;
  margin-bottom: 4px;
}
.wt-stat-lbl {
  font-size: .75rem;
  color: rgba(255,255,255,.6);
  text-transform: uppercase;
  letter-spacing: .08em;
}
.wt-stat-sep {
  width: 1px;
  height: 40px;
  background: rgba(255,255,255,.2);
}
@media(max-width:768px){
  .wt-hero-stats {
    position: relative;
    bottom: 0; right: 0;
    margin: 40px auto 0;
    max-width: 320px;
  }
}

/* ─── PROBLEM SECTION ─── */
.wt-problem-section {
  background: #080808;
  padding: 96px 24px;
  border-bottom: 1px solid rgba(255,255,255,.06);
}
.wt-problem-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: center;
}
@media(max-width:768px){ .wt-problem-inner{ grid-template-columns:1fr; gap:40px; } }

.wt-rule-wrap {
  display: flex;
  gap: 24px;
  align-items: flex-start;
  margin: 28px 0 32px;
}
.wt-rule {
  flex-shrink: 0;
  width: 3px;
  height: 120px;
  background: linear-gradient(to bottom, rgba(255,255,255,.5), rgba(255,255,255,.05));
  border-radius: 2px;
  opacity: 0;
  transform: translateY(1rem);
  transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}
.wt-rule.visible { opacity: 1; transform: translateY(0); }

.wt-problem-img {
  width: 100%;
  height: auto;
  display: block;
  border-radius: 12px;
  filter: grayscale(10%);
}

/* ─── HARDNESS SECTION ─── */
.wt-hardness-section {
  background: #080808;
  padding: 96px 24px;
  border-top: 1px solid rgba(255,255,255,.06);
}
.wt-hardness-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .wt-hardness-inner{ grid-template-columns:1fr; gap:40px; } }

.wt-check-list {
  list-style: none;
  padding: 0;
  margin: 20px 0 24px;
  display: flex;
  flex-direction: column;
  gap: 14px;
}
.wt-check-list li {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  color: rgba(255,255,255,.65);
  font-size: .95rem;
  font-weight: 300;
  line-height: 1.6;
}
.wt-check-list li svg {
  flex-shrink: 0;
  width: 16px;
  height: 16px;
  margin-top: 3px;
  color: rgba(255,255,255,.5);
}
.wt-check-list li strong { color: #fff; font-weight: 500; }

.wt-map-wrap {
  width: 100%;
  height: 380px;
  border-radius: 12px;
  overflow: hidden;
}

/* ─── RECOVERY SECTION ─── */
.wt-recovery-section {
  background: #000;
  padding: 96px 24px;
  border-top: 1px solid rgba(255,255,255,.06);
}
.wt-recovery-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 32px;
  align-items: start;
}
@media(max-width:900px){ .wt-recovery-inner{ grid-template-columns:1fr; gap:32px; } }

.wt-recovery-body {
  color: rgba(255,255,255,.65);
  font-size: .95rem;
  font-weight: 300;
  line-height: 1.7;
  margin: 16px 0 24px;
}
.wt-recovery-list {
  list-style: none;
  padding: 0;
  margin: 0 0 28px;
  display: flex;
  flex-direction: column;
  gap: 14px;
}
.wt-recovery-list li {
  color: rgba(255,255,255,.65);
  font-size: .9rem;
  font-weight: 300;
  line-height: 1.6;
}
.wt-recovery-list li strong { color: #fff; font-weight: 500; }

.wt-recovery-img {
  width: 100%;
  height: 320px;
  object-fit: cover;
  border-radius: 12px;
  display: block;
  filter: grayscale(10%);
}

/* ─── FEATURES SECTION ─── */
.wt-features-section {
  background: #080808;
  padding: 96px 24px;
  border-top: 1px solid rgba(255,255,255,.06);
}
.wt-features-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 2fr 3fr;
  gap: 64px;
  align-items: stretch;
}
@media(max-width:768px){ .wt-features-inner{ grid-template-columns:1fr; gap:40px; } }

.wt-features-list {
  list-style: none;
  padding: 0;
  margin: 32px 0 0;
  display: flex;
  flex-direction: column;
  gap: 0;
}
.wt-features-list button {
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
.wt-features-list button:hover { color: rgba(255,255,255,.7); }
.wt-features-list button.active { color: #fff; font-weight: 500; }

.wt-feature-display {
  position: relative;
  min-height: 360px;
  border-radius: 16px;
  overflow: hidden;
}
.wt-feature-video {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.wt-feature-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,.65);
}
.wt-feature-content {
  position: relative;
  z-index: 10;
  padding: 40px;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
}
.wt-feature-title {
  font-size: 1.6rem;
  font-weight: 300;
  color: #fff;
  letter-spacing: -.02em;
  margin-bottom: 12px;
}
.wt-feature-desc {
  font-size: .95rem;
  color: rgba(255,255,255,.65);
  font-weight: 300;
  line-height: 1.7;
  margin-bottom: 24px;
  max-width: 480px;
}
.wt-feature-link {
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
.wt-feature-link:hover { color: #fff; }
.wt-feature-link svg { width: 14px; height: 14px; }

/* ─── PERFORMANCE SECTION ─── */
.wt-perf-section {
  background: #fff;
  padding: 96px 24px;
}
.wt-perf-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .wt-perf-inner{ grid-template-columns:1fr; gap:40px; } }

.wt-blockquote {
  border-left: 3px solid #111;
  padding-left: 24px;
  margin: 28px 0 32px;
}
.wt-blockquote p {
  font-size: 1.05rem;
  color: #374151;
  font-weight: 300;
  line-height: 1.7;
  font-style: italic;
}
.wt-blockquote strong { color: #111; font-weight: 600; }
.wt-blockquote footer {
  font-size: .85rem;
  color: #6b7280;
  font-weight: 500;
  margin-top: 12px;
  font-style: normal;
}

.wt-stats-card {
  background: #111;
  border-radius: 12px;
  padding: 8px;
  display: grid;
  grid-template-columns: 1fr 1fr;
}
.wt-stats-card-item {
  padding: 32px 24px;
  text-align: center;
  border-right: 1px solid rgba(255,255,255,.08);
  border-bottom: 1px solid rgba(255,255,255,.08);
}
.wt-stats-card-item:nth-child(2n) { border-right: none; }
.wt-stats-card-item:nth-last-child(-n+2) { border-bottom: none; }
.wt-stats-val {
  font-size: 2.8rem;
  font-weight: 200;
  color: #fff;
  letter-spacing: -.02em;
  line-height: 1;
  margin-bottom: 8px;
}
.wt-stats-lbl {
  font-size: .72rem;
  color: rgba(255,255,255,.45);
  text-transform: uppercase;
  letter-spacing: .08em;
  font-weight: 500;
}

/* ─── FINAL FORM SECTION ─── */
.wt-form-section {
  background: #000;
  padding: 96px 24px;
}
.wt-form-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .wt-form-inner{ grid-template-columns:1fr; gap:40px; } }

.wt-form-h {
  font-size: clamp(2rem, 4vw, 3rem);
  font-weight: 300;
  color: #fff;
  line-height: 1.2;
  margin: 16px 0 20px;
}
.wt-form-sub {
  color: rgba(255,255,255,.55);
  font-size: 1rem;
  font-weight: 300;
  margin-bottom: 32px;
  max-width: 400px;
}
.wt-form-ghost-btn {
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
.wt-form-ghost-btn:hover { border-color: rgba(255,255,255,.5); color: #fff; }

.wt-form-card {
  background: #fff;
  border-radius: 16px;
  padding: 36px;
}
.wt-form-card-header {
  font-size: 1rem;
  font-weight: 600;
  color: #111;
  margin-bottom: 24px;
  padding-bottom: 20px;
  border-bottom: 1px solid #e5e7eb;
  letter-spacing: -.01em;
}
.wt-form-fields { display: flex; flex-direction: column; gap: 16px; }
.wt-form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
@media(max-width:480px){ .wt-form-row{ grid-template-columns:1fr; } }
.wt-input-group { display: flex; flex-direction: column; gap: 6px; }
.wt-input-group label {
  font-size: .8rem;
  font-weight: 500;
  color: #6b7280;
  text-transform: uppercase;
  letter-spacing: .05em;
}
.wt-input {
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
.wt-input:focus { border-color: #111; background: #fff; }
.wt-textarea { resize: vertical; }
.wt-submit-btn {
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
.wt-submit-btn:hover { background: #222; transform: translateY(-1px); }

/* ─── MAP TOOLTIP ─── */
@keyframes wt-pulse {
  0%   { transform: scale(1); opacity: 0.8; }
  70%  { transform: scale(3); opacity: 0; }
  100% { transform: scale(3); opacity: 0; }
}
.pulse-marker {
  position: relative;
  width: 8px; height: 8px;
  background: rgba(255,255,255,.8);
  border: 2px solid rgba(255,255,255,.4);
  border-radius: 50%;
}
.pulse-marker::after {
  content: '';
  position: absolute;
  top: -8px; left: -8px;
  width: 24px; height: 24px;
  border-radius: 50%;
  background: rgba(255,255,255,.2);
  animation: wt-pulse 2s infinite;
}
.leaflet-tooltip.dark-tooltip {
  background: rgba(10,10,10,.92) !important;
  color: #fff !important;
  border-radius: 8px !important;
  padding: 8px 12px !important;
  box-shadow: 0 2px 12px rgba(0,0,0,.5) !important;
  font-size: .85rem !important;
  border: 1px solid rgba(255,255,255,.08) !important;
}
</style>
@endpush

@section('content')

{{-- ─── HERO ─── --}}
<div class="wt-hero">
  <img
    src="/assets/img/services/water_treatment_recovery_1.png"
    alt="Modern Water Treatment & Recovery"
    class="wt-hero-img" />
  <div class="wt-hero-overlay"></div>
  <div class="wt-hero-content">
    <div class="section-eyebrow" style="color:rgba(255,255,255,0.4);">Water Treatment</div>
    <h1 class="wt-hero-h1">
      Modern Water Treatment<br>
      <em>&amp; Recovery Services</em>
    </h1>
    <p class="wt-hero-sub">
      <strong>When water itself becomes the problem — we use the same water as the solution.</strong>
      Advanced electro-hydrodynamic technology to protect your infrastructure, reduce scale, and reclaim water — without chemicals, power, or moving parts.
    </p>
    <div class="wt-hero-actions">
      <a href="#wt-form" class="btn-hero-primary">Request a Tower Audit</a>
      <a href="#wt-features" class="btn-hero-ghost">Explore Features</a>
    </div>
  </div>
  <div class="wt-hero-stats">
    <div class="wt-stat">
      <div class="wt-stat-val">180,000 gal/month</div>
      <div class="wt-stat-lbl">Audit uncovered savings</div>
    </div>
    <div class="wt-stat-sep"></div>
    <div class="wt-stat">
      <div class="wt-stat-val">6.3 months</div>
      <div class="wt-stat-lbl">Payback period</div>
    </div>
  </div>
</div>

{{-- ─── PROBLEM ─── --}}
<section class="wt-problem-section" id="treatment-problem">
  <div class="wt-problem-inner">
    <div>
      <div class="section-eyebrow">The Challenge</div>
      <h2 class="section-h2" style="color:#fff;">
        The Challenge of<br><em>Scale &amp; Corrosion</em>
      </h2>
      <div class="wt-rule-wrap">
        <div class="wt-rule" id="wtIntroRule"></div>
        <p class="section-sub" style="max-width:480px;">
          Mineral deposits (calcium &amp; magnesium) constrict flow and add up to a 15% energy penalty across pipes, chillers and domestic equipment — driving up utility bills and maintenance costs. Our non-chemical electrostatic treatment restores peak efficiency, extends asset lifecycles and typically pays for itself in under 12 months.
        </p>
      </div>
      <a href="#wt-form" class="btn-hero-primary" style="display:inline-flex;">Request a Tower Audit</a>
    </div>
    <div>
      <img
        src="/assets/img/services/scaling_in_pipes_1.png"
        alt="Cross-section of pipe with scale"
        class="wt-problem-img" />
    </div>
  </div>
</section>

{{-- ─── HARDNESS MAP ─── --}}
<section class="wt-hardness-section" id="treatment-hardness">
  <div class="wt-hardness-inner">
    <div>
      <div class="section-eyebrow">Water Hardness Insights</div>
      <h2 class="section-h2" style="color:#fff;">
        Smart Treatment &amp;<br><em>Hardness Mapping</em>
      </h2>
      <ul class="wt-check-list">
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
          </svg>
          <span><strong>Flow Restoration</strong> — Clears mineral blockages and normalizes system pressure.</span>
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
          </svg>
          <span><strong>Energy Savings</strong> — Reduces blowdowns and lowers thermal-transfer losses.</span>
        </li>
        <li>
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
          </svg>
          <span><strong>Asset Longevity</strong> — Slows corrosion and extends pump, chiller &amp; boiler lifecycles.</span>
        </li>
      </ul>
      <p class="section-sub">Ideal for whole-building piping, boilers, chillers — and cooling towers.</p>
    </div>
    <div>
      <div id="hardnessMap" class="wt-map-wrap"></div>
    </div>
  </div>
</section>

{{-- ─── RECOVERY ─── --}}
<section class="wt-recovery-section" id="treatment-recovery">
  <div class="wt-recovery-inner">
    <div>
      <div class="section-eyebrow">Technology</div>
      <h2 class="section-h2" style="color:#fff;">
        Non-Invasive Treatment<br><em>&amp; Recovery</em>
      </h2>
      <p class="wt-recovery-body">
        Our proprietary electrostatic technology induces crystal precipitation in-flow — preventing scale before it starts. No chemicals. No added power draw. No moving parts.
      </p>
      <ul class="wt-recovery-list">
        <li><strong>Scale Inhibition</strong> — Magnetically aligns dissolved minerals to precipitate downstream, keeping pipes and towers clean.</li>
        <li><strong>Water Reclamation</strong> — Capture and reuse blowdown for non-potable applications, cutting makeup water costs by up to 60%.</li>
        <li><strong>Plug-and-Play</strong> — Install inline on any pipe material, from ½″ sub-meters to 42″ mains with no downtime.</li>
      </ul>
      <a href="#wt-features" class="wt-feature-link" style="font-size:.9rem;">
        Read more about the technology
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7l7 7-7 7"/>
        </svg>
      </a>
    </div>
    <img src="/assets/img/services/scale_remover_1.png" alt="Electrostatic treatment unit installed inline" class="wt-recovery-img" />
    <img src="/assets/img/services/scale_in_pipes_1.png" alt="Blowdown water reclamation" class="wt-recovery-img" />
  </div>
</section>

{{-- ─── FEATURES ─── --}}
<section class="wt-features-section" id="wt-features">
  <div class="wt-features-inner"
    x-data="{
      selected: 0,
      features: [
        { label: '97% Scale Reduction', title: '97% Scale Reduction', desc: '97% scale reduction across all asset classes — increasing asset health and extending equipment lifecycles significantly.' },
        { label: '25% Energy Reduction Across Portfolio', title: '25% Energy Reduction', desc: 'Reduce energy expenses across your portfolio through normalized heat transfer and restored system efficiency.' },
        { label: '95% Savings Replacing Chemical Cost', title: '95% Chemical Cost Savings', desc: 'No chemicals or additional power draw. Unlike harsh chemical systems that dissolve scale and contribute toxic pollutants, our technology works cleanly.' },
        { label: 'Reduces Water Use by up to 40%', title: 'Up to 40% Water Use Reduction', desc: 'In non-volumetric applications, water consumption has been reduced by up to 40% — directly impacting operating costs and ESG targets.' }
      ]
    }"
  >
    <div class="elara-features-nav">
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Financial Impact</div>
      <h2 class="section-h2" style="color:#fff;">Financial Implications<br><em>&amp; Asset Protection</em></h2>
      <ul class="wt-features-list">
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

    <div class="wt-feature-display">
      <video class="wt-feature-video" autoplay loop muted playsinline>
        <source src="/assets/img/services/elara_ai_video_3.mp4" type="video/mp4" />
      </video>
      <div class="wt-feature-overlay"></div>
      <div class="wt-feature-content">
        <h4 class="wt-feature-title" x-text="features[selected].title"></h4>
        <p class="wt-feature-desc" x-text="features[selected].desc"></p>
        <a href="#" class="wt-feature-link">
          More about our approach
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7l7 7-7 7"/>
          </svg>
        </a>
      </div>
    </div>
  </div>
</section>

{{-- ─── PERFORMANCE ─── --}}
<section class="wt-perf-section" id="featured-performance">
  <div class="wt-perf-inner">
    <div>
      <div class="section-eyebrow">Featured Performance</div>
      <h2 class="section-h2" style="color:#111;">Proven Results<br><em>Across Every Portfolio</em></h2>
      <div class="wt-blockquote">
        <p>
          "Since rolling out treatment across our 15-building portfolio, we've cut energy costs by <strong>28%</strong> and avoided <strong>$350K</strong> in unplanned outages."
        </p>
        <footer>— Director of Engineering, Crestline Properties</footer>
      </div>
      <a href="#wt-form" class="btn-hero-primary" style="display:inline-flex;">Request a Demo</a>
    </div>

    <div class="wt-stats-card">
      <div class="wt-stats-card-item">
        <div class="wt-stats-val">120</div>
        <div class="wt-stats-lbl">Sites Deployed</div>
      </div>
      <div class="wt-stats-card-item">
        <div class="wt-stats-val">18M</div>
        <div class="wt-stats-lbl">Gallons Saved / yr</div>
      </div>
      <div class="wt-stats-card-item">
        <div class="wt-stats-val">3.8x</div>
        <div class="wt-stats-lbl">Avg. Energy ROI</div>
      </div>
      <div class="wt-stats-card-item">
        <div class="wt-stats-val">45</div>
        <div class="wt-stats-lbl">Avg. Alerts / Site</div>
      </div>
    </div>
  </div>
</section>

{{-- ─── FINAL FORM ─── --}}
<section class="wt-form-section" id="wt-form">
  <div class="wt-form-inner">

    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Get Started</div>
      <h2 class="wt-form-h">Protect Your<br>Asset <em>Performance</em></h2>
      <p class="wt-form-sub">
        Request a confidential water audit to optimize your property's health and profitability.
      </p>
      <a href="#wt-form" class="wt-form-ghost-btn">Schedule a Demo</a>
    </div>

    <div class="wt-form-card" id="schedule-demo">
      <div class="wt-form-card-header">Confidential Demo Request</div>
      <form class="wt-form-fields">
        <div class="wt-form-row">
          <input type="text" placeholder="First Name" required class="wt-input" />
          <input type="text" placeholder="Last Name" required class="wt-input" />
        </div>
        <div class="wt-form-row">
          <input type="text" placeholder="Company Name" required class="wt-input" />
          <input type="text" placeholder="Company Role" required class="wt-input" />
        </div>
        <div class="wt-form-row">
          <input type="tel" placeholder="Contact Number" required class="wt-input" />
          <input type="email" placeholder="Email" required class="wt-input" />
        </div>
        <div class="wt-form-row">
          <div class="wt-input-group">
            <label>Preferred Date</label>
            <input type="date" required class="wt-input" />
          </div>
          <div class="wt-input-group">
            <label>Preferred Time</label>
            <input type="time" required class="wt-input" />
          </div>
        </div>
        <textarea placeholder="Additional Message (optional)" rows="4" class="wt-input wt-textarea"></textarea>
        <button type="submit" class="wt-submit-btn">Submit Request</button>
      </form>
    </div>

  </div>
</section>

@endsection

@push('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
  // Intro rule scroll animation
  document.addEventListener('DOMContentLoaded', () => {
    const rule = document.getElementById('wtIntroRule');
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

  // Hardness map
  document.addEventListener('DOMContentLoaded', () => {
    const map = L.map('hardnessMap', {
      center: [39.5, -98.35],
      zoom: 4,
      zoomControl: false,
      attributionControl: false
    });

    L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
      maxZoom: 19
    }).addTo(map);

    const sites = [
      ["Phoenix, AZ",    [33.45,-112.07], 12],
      ["Denver, CO",     [39.74,-104.99],  8],
      ["Miami, FL",      [25.77, -80.19], 15],
      ["Minneapolis, MN",[44.98, -93.27],  3],
      ["New York, NY",   [40.71, -74.00],  7],
      ["Los Angeles, CA",[34.05,-118.24], 10],
      ["Houston, TX",    [29.76, -95.37], 14],
      ["Chicago, IL",    [41.88, -87.63],  9],
      ["Dallas, TX",     [32.78, -96.80], 13],
      ["Atlanta, GA",    [33.75, -84.39],  6],
      ["Seattle, WA",    [47.60,-122.33],  2],
      ["Las Vegas, NV",  [36.17,-115.14], 16],
      ["Salt Lake City, UT",[40.76,-111.89],11],
      ["San Antonio, TX",[29.42, -98.49], 14],
      ["Portland, OR",   [45.52,-122.68],  3],
      ["Nashville, TN",  [36.16, -86.78],  8],
    ];

    function gradeLabel(g) {
      if (g <= 3)  return "Slightly Hard";
      if (g <= 7)  return "Moderately Hard";
      if (g <= 10) return "Hard";
      if (g <= 14) return "Very Hard";
      return "Extremely Hard";
    }

    sites.forEach(([city, latlng, g]) => {
      const icon = L.divIcon({
        className: 'pulse-marker',
        iconSize: [8, 8],
        iconAnchor: [4, 4]
      });
      const m = L.marker(latlng, { icon }).addTo(map);
      const html = `<strong>${city}</strong><br>Hardness: ${g} gpg — ${gradeLabel(g)}`;
      m.bindTooltip(html, { direction: 'top', offset: [0, -10], className: 'dark-tooltip' });
      m.on('mouseover', () => m.openTooltip());
      m.on('mouseout',  () => m.closeTooltip());
    });
  });
</script>
@endpush