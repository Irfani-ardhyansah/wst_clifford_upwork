@extends('layouts.app')

@section('title', 'Elara AI Digital Billing Assistants — Water Solutions Technology')

@push('styles')
<style>
/* ═══════════════════════════════════════
   ELARA AI PAGE — Style matching Audit page
   ═══════════════════════════════════════ */

/* ─── HERO ─── */
.elara-hero {
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #000;
  overflow: hidden;
}
.elara-hero-img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  opacity: .55;
  filter: grayscale(15%);
}
.elara-hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(0,0,0,.75) 40%, rgba(0,0,0,.45) 100%);
}
.elara-hero-content {
  position: relative;
  z-index: 10;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  text-align: left;
  padding: 0 24px;
  max-width: 780px;
}
.elara-hero-h1 {
  font-size: clamp(2.4rem, 6vw, 4.5rem);
  font-weight: 300;
  color: #fff;
  line-height: 1.12;
  letter-spacing: -0.02em;
  margin: 16px 0 20px;
}
.elara-hero-h1 em { font-style: italic; color: rgba(255,255,255,.65); }
.elara-hero-sub {
  color: rgba(255,255,255,.55);
  font-size: 1.1rem;
  font-weight: 300;
  letter-spacing: .04em;
  margin-bottom: 32px;
  max-width: 480px;
}
.elara-hero-sub strong { color: #fff; font-weight: 500; }
.elara-hero-actions { display: flex; gap: 12px; flex-wrap: wrap; }
.elara-hero-stats {
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
.elara-stat { text-align: center; }
.elara-stat-val {
  font-size: 1.1rem;
  font-weight: 500;
  color: #fff;
  margin-bottom: 4px;
}
.elara-stat-lbl {
  font-size: .75rem;
  color: rgba(255,255,255,.6);
  text-transform: uppercase;
  letter-spacing: .08em;
}
.elara-stat-sep {
  width: 1px;
  height: 40px;
  background: rgba(255,255,255,.2);
}
@media(max-width:768px){
  .elara-hero-stats {
    position: relative;
    bottom: 0; right: 0;
    margin: 40px auto 0;
    max-width: 320px;
  }
}

/* ─── WELCOME SECTION ─── */
.elara-welcome-section {
  background: #080808;
  padding: 96px 24px;
  border-bottom: 1px solid rgba(255,255,255,.06);
}
.elara-welcome-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .elara-welcome-inner{ grid-template-columns:1fr; gap:40px; } }

.elara-rule-wrap {
  display: flex;
  gap: 24px;
  align-items: flex-start;
  margin: 28px 0 32px;
}
.elara-rule {
  flex-shrink: 0;
  width: 3px;
  height: 120px;
  background: linear-gradient(to bottom, rgba(255,255,255,.5), rgba(255,255,255,.05));
  border-radius: 2px;
  opacity: 0;
  transform: translateY(1rem);
  transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}
.elara-rule.visible { opacity: 1; transform: translateY(0); }

.elara-welcome-img-wrap {
  display: flex;
  flex-direction: column;
  gap: 12px;
}
.elara-welcome-img {
  width: 100%;
  height: auto;
  display: block;
  border-radius: 12px;
  filter: grayscale(10%);
}
.elara-welcome-img-caption {
  font-size: .8rem;
  color: rgba(255,255,255,.35);
  text-transform: uppercase;
  letter-spacing: .08em;
  text-align: center;
}

/* ─── FEATURES SECTION ─── */
.elara-features-section {
  background: #080808;
  padding: 96px 24px;
  border-top: 1px solid rgba(255,255,255,.06);
}
.elara-features-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 2fr 3fr;
  gap: 64px;
  align-items: stretch;
}
@media(max-width:768px){ .elara-features-inner{ grid-template-columns:1fr; gap:40px; } }

.elara-features-nav {}
.elara-features-list {
  list-style: none;
  padding: 0;
  margin: 32px 0 0;
  display: flex;
  flex-direction: column;
  gap: 0;
}
.elara-features-list li {}
.elara-features-list button {
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
.elara-features-list button:hover { color: rgba(255,255,255,.7); }
.elara-features-list button.active {
  color: #fff;
  font-weight: 500;
}

.elara-feature-display {
  position: relative;
  min-height: 360px;
  border-radius: 16px;
  overflow: hidden;
}
.elara-feature-video {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.elara-feature-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,.65);
}
.elara-feature-content {
  position: relative;
  z-index: 10;
  padding: 40px;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
}
.elara-feature-title {
  font-size: 1.6rem;
  font-weight: 300;
  color: #fff;
  letter-spacing: -.02em;
  margin-bottom: 12px;
}
.elara-feature-desc {
  font-size: .95rem;
  color: rgba(255,255,255,.65);
  font-weight: 300;
  line-height: 1.7;
  margin-bottom: 24px;
  max-width: 480px;
}
.elara-feature-link {
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
.elara-feature-link:hover { color: #fff; }
.elara-feature-link svg { width: 14px; height: 14px; }

/* ─── ADVISORY SECTION ─── */
.elara-advisory-section {
  background: #fff;
  padding: 96px 24px;
}
.elara-advisory-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 48px;
  align-items: start;
}
@media(max-width:900px){ .elara-advisory-inner{ grid-template-columns:1fr; gap:40px; } }

.elara-advisory-ai {}
.elara-advisory-textarea {
  width: 100%;
  margin-top: 16px;
  padding: 12px 14px;
  border: 1px solid #e5e7eb;
  border-radius: 8px;
  font-size: .9rem;
  color: #111;
  background: #fafafa;
  outline: none;
  resize: vertical;
  transition: border-color .2s;
  box-sizing: border-box;
}
.elara-advisory-textarea:focus { border-color: #111; background: #fff; }
.elara-advisory-btn {
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
  border: none;
  cursor: pointer;
  margin-top: 12px;
  transition: background .2s, transform .2s;
}
.elara-advisory-btn:hover { background: #222; transform: translateY(-1px); }
.elara-advisory-error {
  color: #ef4444;
  font-size: .8rem;
  margin-top: 8px;
  display: none;
}

.elara-advisory-chat {}
.elara-advisory-img-wrap {
  position: relative;
  overflow: hidden;
  border-radius: 12px;
}
.elara-advisory-img {
  width: 100%;
  height: 300px;
  object-fit: cover;
  display: block;
  filter: grayscale(10%);
}
.elara-advisory-img-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,.6);
  padding: 24px;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  color: #fff;
}
.elara-advisory-img-overlay h3 {
  font-size: 1.2rem;
  font-weight: 500;
  margin-bottom: 8px;
  letter-spacing: -.01em;
}
.elara-advisory-img-overlay p {
  font-size: .85rem;
  color: rgba(255,255,255,.7);
  font-weight: 300;
  line-height: 1.6;
  margin-bottom: 12px;
}
.elara-advisory-img-overlay a {
  font-size: .85rem;
  color: rgba(255,255,255,.6);
  text-decoration: none;
  font-weight: 500;
  transition: color .2s;
}
.elara-advisory-img-overlay a:hover { color: #fff; }

/* ─── FINAL FORM SECTION ─── */
.elara-form-section {
  background: #000;
  padding: 96px 24px;
}
.elara-form-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .elara-form-inner{ grid-template-columns:1fr; gap:40px; } }

.elara-form-h {
  font-size: clamp(2rem, 4vw, 3rem);
  font-weight: 300;
  color: #fff;
  line-height: 1.2;
  margin: 16px 0 20px;
}
.elara-form-sub {
  color: rgba(255,255,255,.55);
  font-size: 1rem;
  font-weight: 300;
  margin-bottom: 32px;
  max-width: 400px;
}
.elara-form-ghost-btn {
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
.elara-form-ghost-btn:hover { border-color: rgba(255,255,255,.5); color: #fff; }

.elara-form-card {
  background: #fff;
  border-radius: 16px;
  padding: 36px;
}
.elara-form-card-header {
  font-size: 1rem;
  font-weight: 600;
  color: #111;
  margin-bottom: 24px;
  padding-bottom: 20px;
  border-bottom: 1px solid #e5e7eb;
  letter-spacing: -.01em;
}
.elara-form-fields { display: flex; flex-direction: column; gap: 16px; }
.elara-form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
@media(max-width:480px){ .elara-form-row{ grid-template-columns:1fr; } }
.elara-input-group { display: flex; flex-direction: column; gap: 6px; }
.elara-input-group label {
  font-size: .8rem;
  font-weight: 500;
  color: #6b7280;
  text-transform: uppercase;
  letter-spacing: .05em;
}
.elara-input {
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
.elara-input:focus { border-color: #111; background: #fff; }
.elara-textarea { resize: vertical; }
.elara-submit-btn {
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
.elara-submit-btn:hover { background: #222; transform: translateY(-1px); }

/* ─── LOADER ─── */
.elara-loader {
  display: none;
  width: 20px; height: 20px;
  border: 3px solid rgba(255,255,255,.2);
  border-top-color: #fff;
  border-radius: 50%;
  animation: elara-spin 0.8s linear infinite;
  margin-left: 8px;
}
@keyframes elara-spin { to { transform: rotate(360deg); } }
</style>
@endpush

@section('content')

{{-- ─── HERO ─── --}}
<div class="elara-hero">
  <img
    src="/assets/img/services/elara_ai_hero.png"
    alt="Elara AI Digital Billing Assistant"
    class="elara-hero-img" />
  <div class="elara-hero-overlay"></div>
  <div class="elara-hero-content">
    <div class="section-eyebrow" style="color:rgba(255,255,255,0.4);">Elara AI</div>
    <h1 class="elara-hero-h1">
      Now Every Property Has<br>
      <em>an AI Water Analyst</em>
    </h1>
    <p class="elara-hero-sub">
      <strong>Digital Billing Assistants</strong> built on the world's premier real estate water management AI platform. Your water is now intelligent — and it will speak to you.
    </p>
    <div class="elara-hero-actions">
      <a href="#elara-form" class="btn-hero-primary">Request a Confidential Demo</a>
      <a href="#elara-features" class="btn-hero-ghost">Explore Features</a>
    </div>
  </div>
  <div class="elara-hero-stats">
    <div class="elara-stat">
      <div class="elara-stat-val">180,000 gal/month</div>
      <div class="elara-stat-lbl">Audit uncovered savings</div>
    </div>
    <div class="elara-stat-sep"></div>
    <div class="elara-stat">
      <div class="elara-stat-val">6.3 months</div>
      <div class="elara-stat-lbl">Payback period</div>
    </div>
  </div>
</div>

{{-- ─── WELCOME ─── --}}
<section class="elara-welcome-section">
  <div class="elara-welcome-inner">
    <div>
      <div class="section-eyebrow">Welcome to Elara AI</div>
      <h2 class="section-h2">
        A Better Way to Manage<br><em>Portfolio Water Utilities</em>
      </h2>
      <div class="elara-rule-wrap">
        <div class="elara-rule" id="introRule"></div>
        <p class="section-sub" style="max-width:480px;">
          Elara AI empowers real-estate professionals — property managers and asset managers — with instant, accurate billing insights while eliminating manual data entry. From portfolio-wide benchmarking to ESG-ready reports and predictive alerts, Elara is your partner in utility optimization.
        </p>
      </div>
      <a href="#elara-features" class="elara-advisory-btn" style="display:inline-flex;">Speak with an Auditor</a>
    </div>

    <div class="elara-welcome-img-wrap">
      <img
        src="/assets/img/services/elara_ai_dashboard.png"
        alt="Elara AI Dashboard"
        class="elara-welcome-img" />
      <div class="elara-welcome-img-caption">Elara AI &nbsp;|&nbsp; Know More. React Faster. Save Smarter.</div>
    </div>
  </div>
</section>

{{-- ─── FEATURES ─── --}}
<section class="elara-features-section" id="elara-features">
  <div class="elara-features-inner"
    x-data="{
      selected: 0,
      features: [
        { label: 'Smart Utility Data Extraction', title: 'Smart Utility Data Extraction', desc: 'Extracts data from water utility bills (PDF, scan, image, or Excel) instantly and with zero manual entry. From 7 manual hours – 30 seconds.' },
        { label: 'Integrated with Smart Technology Systems', title: 'Integrated with Smart Technology Systems', desc: 'Connects data insights directly to building-level monitoring systems to track real-time improvements and savings.' },
        { label: 'Benchmarking & ESG Reporting', title: 'Benchmarking & ESG Reporting', desc: 'Automatically compares water usage across properties and generates ESG, LEED, or GRESB-ready reports.' },
        { label: 'Real-Time Anomaly Detection', title: 'Real-Time Anomaly Detection', desc: 'Instantly detects billing errors, leaks, and inefficient consumption across your portfolio.' },
        { label: 'Built-in Chatbot Support', title: 'Built-in Chatbot Support', desc: 'Ask Elara anything — from utility trends and usage summaries to projected savings. Get instant answers and recommendations.' },
        { label: 'Chat with Elara', title: 'Chat with Elara', desc: 'Elara\'s chatbot is available 24/7. Ask questions, review summaries, or run quick savings estimates in a conversational interface.' }
      ]
    }"
  >
    <div class="elara-features-nav">
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Capabilities</div>
      <h2 class="section-h2" style="color:#fff;">What Makes Elara AI<br><em>the Industry Standard?</em></h2>
      <ul class="elara-features-list">
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

    <div class="elara-feature-display">
      <video class="elara-feature-video" autoplay loop muted playsinline>
        <source src="/assets/img/services/elara_ai_video.mp4" type="video/mp4" />
      </video>
      <div class="elara-feature-overlay"></div>
      <div class="elara-feature-content">
        <h4 class="elara-feature-title" x-text="features[selected].title"></h4>
        <p class="elara-feature-desc" x-text="features[selected].desc"></p>
        <a href="#" class="elara-feature-link">
          More about our approach
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7l7 7-7 7"/>
          </svg>
        </a>
      </div>
    </div>
  </div>
</section>

{{-- ─── ADVISORY ─── --}}
<section class="elara-advisory-section">
  <div class="elara-advisory-inner">

    <div class="elara-advisory-ai">
      <div class="section-eyebrow">Advisory Services</div>
      <h2 class="section-h2" style="font-size:clamp(1.6rem,3vw,2.4rem);">
        Core Services<br><em>to Get You Started</em>
      </h2>
      <p class="section-sub">Our experts are ready to address your specific water management challenges.</p>
      <div style="margin-top:28px;">
        <label for="ai-challenge-input" style="font-size:.85rem;font-weight:600;color:#374151;text-transform:uppercase;letter-spacing:.05em;">
          Describe your challenge
        </label>
        <textarea
          id="ai-challenge-input"
          rows="3"
          class="elara-advisory-textarea"
          placeholder="e.g., 'My hotel's water bills have increased by 30% this year...'">
        </textarea>
        <button id="get-ai-advice-btn" class="elara-advisory-btn">
          ✨ Get Elara AI-Powered Advice
          <span class="elara-loader" id="ai-loader"></span>
        </button>
        <p id="ai-error-msg" class="elara-advisory-error"></p>
      </div>
    </div>

    <div class="elara-advisory-chat">
      <div class="section-eyebrow">Chat with Elara</div>
      <h2 class="section-h2" style="font-size:clamp(1.6rem,3vw,2.4rem);">
        Sample Elara<br><em>Before Your Demo</em>
      </h2>
      <p class="section-sub">Available 24/7 to answer questions, review summaries, and run savings estimates.</p>
    </div>

    <div>
      <div class="section-eyebrow">Audit Services</div>
      <div class="elara-advisory-img-wrap" style="margin-top:16px;">
        <img
          src="/assets/img/services/elara_ai_hero.png"
          alt="Comprehensive Water Audits"
          class="elara-advisory-img" />
        <div class="elara-advisory-img-overlay">
          <h3>Comprehensive Water Audits</h3>
          <p>We begin with a thorough audit of your property's water usage to identify key areas for improvement and savings.</p>
          <a href="#">More about Audits →</a>
        </div>
      </div>
    </div>

  </div>
</section>

{{-- ─── FINAL FORM ─── --}}
<section class="elara-form-section" id="elara-form">
  <div class="elara-form-inner">

    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Get Started</div>
      <h2 class="elara-form-h">Protect Your<br>Asset <em>Performance</em></h2>
      <p class="elara-form-sub">
        Request a confidential water audit to optimize your property's health and profitability.
      </p>
      <a href="#elara-form" class="elara-form-ghost-btn">Schedule a Demo</a>
    </div>

    <div class="elara-form-card" id="schedule-demo">
      <div class="elara-form-card-header">Confidential Demo Request</div>
      <form class="elara-form-fields">
        <div class="elara-form-row">
          <input type="text" placeholder="First Name" required class="elara-input" />
          <input type="text" placeholder="Last Name" required class="elara-input" />
        </div>
        <div class="elara-form-row">
          <input type="text" placeholder="Company Name" required class="elara-input" />
          <input type="text" placeholder="Company Role" required class="elara-input" />
        </div>
        <div class="elara-form-row">
          <input type="tel" placeholder="Contact Number" required class="elara-input" />
          <input type="email" placeholder="Email" required class="elara-input" />
        </div>
        <div class="elara-form-row">
          <div class="elara-input-group">
            <label>Preferred Date</label>
            <input type="date" required class="elara-input" />
          </div>
          <div class="elara-input-group">
            <label>Preferred Time</label>
            <input type="time" required class="elara-input" />
          </div>
        </div>
        <textarea placeholder="Additional Message (optional)" rows="4" class="elara-input elara-textarea"></textarea>
        <button type="submit" class="elara-submit-btn">Submit Request</button>
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

  // AI advice button
  document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('get-ai-advice-btn');
    const input = document.getElementById('ai-challenge-input');
    const loader = document.getElementById('ai-loader');
    const err = document.getElementById('ai-error-msg');

    btn.addEventListener('click', async () => {
      const challenge = input.value.trim();
      if (!challenge) {
        err.textContent = 'Please describe your challenge first.';
        err.style.display = 'block';
        return;
      }
      loader.style.display = 'inline-block';
      err.style.display = 'none';
      btn.disabled = true;

      const prompt = `You are a water-management expert. Client says: "${challenge}". Reply with JSON: { title, subtitle, overlayTitle, overlayText }.`;
      const payload = {
        contents: [{ role: "user", parts: [{ text: prompt }] }],
        generationConfig: {
          responseMimeType: "application/json",
          responseSchema: {
            type: "OBJECT",
            properties: {
              title: { type: "STRING" },
              subtitle: { type: "STRING" },
              overlayTitle: { type: "STRING" },
              overlayText: { type: "STRING" }
            },
            required: ["title","subtitle","overlayTitle","overlayText"]
          }
        }
      };

      try {
        const apiKey = "AIzaSyA3IlhRLqoVXo9IllNKGezYkyy2Va8X8Jc";
        const url = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=${apiKey}`;
        const res = await fetch(url, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(payload),
        });
        if (!res.ok) throw new Error(res.statusText);
        const json = await res.json();
        const aiText = json.candidates[0].content.parts[0].text;
        const data = JSON.parse(aiText);

        document.getElementById('transform-title').textContent = data.title;
        document.getElementById('transform-subtitle').textContent = data.subtitle;
        document.getElementById('transform-overlay-title').textContent = data.overlayTitle;
        document.getElementById('transform-overlay-text').textContent = data.overlayText;
        if (document.getElementById('transform-overlay-link')) {
          document.getElementById('transform-overlay-link').href = data.overlayLink || '#';
        }
      } catch (e) {
        err.textContent = "Could not generate advice. Try again later.";
        err.style.display = 'block';
        console.error(e);
      } finally {
        loader.style.display = 'none';
        btn.disabled = false;
      }
    });
  });
</script>
@endpush