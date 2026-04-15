@extends('layouts.app')

@section('title', 'Elara AI Digital Billing Assistants — Water Solutions Technology')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/elara_ai.css') }}">
<style>
.page-hero {
  background: var(--black);
  padding: 72px 48px 64px;
  position: relative; overflow: hidden;
  border-bottom: 1px solid var(--border-d);
}
.page-hero::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse at 75% 40%, rgba(45,92,66,.22) 0%, transparent 65%);
  pointer-events: none;
}
.page-hero-inner { position: relative; z-index: 2; max-width: 760px; }
.page-bc {
  display: flex; align-items: center; gap: 8px;
  font-size: 11px; font-weight: 500; letter-spacing: .06em;
  text-transform: uppercase; color: rgba(255,255,255,.25); margin-bottom: 24px;
}
.page-bc a { color: rgba(255,255,255,.25); text-decoration: none; }
.page-bc a:hover { color: rgba(255,255,255,.6); }
.page-eye {
  font-size: 10px; font-weight: 700; letter-spacing: .18em;
  text-transform: uppercase; color: var(--green-lt);
  display: flex; align-items: center; gap: 10px; margin-bottom: 14px;
}
.page-eye::before { content: ''; width: 22px; height: 1px; background: var(--green-lt); }
.page-h1 {
  font-family: 'Cormorant Garamond', serif;
  font-size: clamp(38px, 4.5vw, 60px); font-weight: 300;
  line-height: 1.06; color: var(--white); margin-bottom: 18px;
}
.page-h1 em { font-style: italic; }
.page-sub {
  font-size: 15px; line-height: 1.85;
  color: rgba(255,255,255,.42); max-width: 560px;
}

/* ── INDUSTRIES INDEX ── */
.ind-index-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2px; background: var(--border-l);
}
.ind-index-card {
  background: var(--white);
  padding: 28px 24px 22px;
  display: flex; flex-direction: column;
  text-decoration: none;
  transition: background .18s;
  border-bottom: 2px solid transparent;
}
.ind-index-card:hover {
  background: var(--off-white);
  border-bottom-color: var(--green-lt);
}
.ind-index-card.featured {
  background: var(--black);
  border-bottom-color: var(--green-lt);
}
.ind-index-card.featured:hover { background: #1a1a1a; }
.iic-tag {
  font-size: 9px; font-weight: 700; letter-spacing: .14em;
  text-transform: uppercase; color: var(--green-lt); margin-bottom: 8px;
}
.ind-index-card.featured .iic-tag { color: var(--green-lt); }
.iic-name {
  font-size: 14px; font-weight: 700; color: var(--black); margin-bottom: 6px; line-height: 1.3;
}
.ind-index-card.featured .iic-name { color: var(--white); }
.iic-desc { font-size: 11px; color: var(--gray-1); line-height: 1.65; flex: 1; }
.ind-index-card.featured .iic-desc { color: rgba(255,255,255,.38); }
.iic-arrow {
  margin-top: 14px; font-size: 11px; font-weight: 700;
  color: var(--green-lt); display: flex; align-items: center; gap: 5px;
}
.iic-coming {
  font-size: 9px; font-weight: 700; letter-spacing: .10em;
  text-transform: uppercase; color: var(--gray-3);
  margin-top: 14px;
}

/* ── ABOUT PAGE ── */
.about-intro-grid {
  display: grid; grid-template-columns: 1fr 1fr; gap: 0;
  background: var(--border-l);
}
.about-intro-left  { background: var(--white);  padding: 64px 56px; }
.about-intro-right { background: var(--black);  padding: 64px 56px; }
.about-tagline {
  font-family: 'Cormorant Garamond', serif;
  font-size: clamp(22px, 2.5vw, 32px); font-weight: 300;
  line-height: 1.35; color: var(--black); margin-bottom: 24px;
}
.about-tagline em { font-style: italic; color: var(--green-lt); }
.about-body-text { font-size: 14px; color: var(--gray-1); line-height: 1.85; margin-bottom: 16px; }
.about-body-text:last-child { margin-bottom: 0; }
.about-proof-grid {
  display: grid; grid-template-columns: 1fr 1fr; gap: 1px;
  background: rgba(255,255,255,.06); margin-bottom: 32px;
}
.about-proof-cell { padding: 22px; background: var(--black); }
.apc-num {
  font-family: 'Cormorant Garamond', serif;
  font-size: 40px; font-weight: 300; color: var(--green-lt);
  line-height: 1; margin-bottom: 5px;
}
.apc-lbl {
  font-size: 9px; font-weight: 600; letter-spacing: .10em;
  text-transform: uppercase; color: rgba(255,255,255,.28);
}
.credential-list { display: flex; flex-direction: column; gap: 0; }
.cred-item {
  display: flex; align-items: flex-start; gap: 12px;
  padding: 14px 0; border-bottom: 1px solid var(--border-d);
  font-size: 12px; color: rgba(255,255,255,.5); line-height: 1.6;
}
.cred-item:last-child { border-bottom: none; }
.cred-icon { color: var(--green-lt); flex-shrink: 0; font-size: 14px; margin-top: 1px; }
.about-values-grid {
  display: grid; grid-template-columns: repeat(3,1fr);
  gap: 2px; background: var(--border-l);
}
.val-card { background: var(--off-white); padding: 32px; }
.val-num {
  font-family: 'Cormorant Garamond', serif;
  font-size: 44px; font-weight: 300; color: rgba(45,92,66,.15);
  line-height: 1; margin-bottom: 10px;
}
.val-title { font-size: 15px; font-weight: 700; color: var(--black); margin-bottom: 8px; }
.val-body  { font-size: 12px; color: var(--gray-1); line-height: 1.75; }
.team-strip {
  display: grid; grid-template-columns: 1fr 1fr;
  gap: 2px; background: var(--border-l);
}
.team-cell { background: var(--white); padding: 36px 40px; }
.team-cell.dark { background: var(--black); }
.team-name {
  font-family: 'Cormorant Garamond', serif;
  font-size: 26px; font-weight: 300; color: var(--black); margin-bottom: 4px;
}
.team-cell.dark .team-name { color: var(--white); }
.team-role {
  font-size: 11px; font-weight: 700; letter-spacing: .10em;
  text-transform: uppercase; color: var(--green-lt); margin-bottom: 14px;
}
.team-bio { font-size: 13px; color: var(--gray-1); line-height: 1.8; }
.team-cell.dark .team-bio { color: rgba(255,255,255,.4); }
.team-linkedin {
  display: inline-flex; align-items: center; gap: 7px;
  margin-top: 16px; font-size: 11px; font-weight: 700;
  color: var(--green-lt); text-decoration: none; letter-spacing: .06em;
  text-transform: uppercase;
}

/* ── CONTACT PAGE ── */
.contact-wrap {
  display: grid; grid-template-columns: 1fr 1fr;
  gap: 0; background: var(--border-l); min-height: 600px;
}
.contact-left  { background: var(--white);  padding: 64px 56px; }
.contact-right { background: var(--black);  padding: 64px 56px; }
.contact-form-group {
  display: flex; flex-direction: column; gap: 5px; margin-bottom: 18px;
}
.contact-form-row {
  display: grid; grid-template-columns: 1fr 1fr; gap: 18px; margin-bottom: 0;
}
.cf-label {
  font-size: 10px; font-weight: 700; letter-spacing: .10em;
  text-transform: uppercase; color: var(--black);
}
.cf-req { color: var(--green-lt); }
.cf-input, .cf-select, .cf-textarea {
  padding: 12px 0;
  border: none; border-bottom: 1.5px solid rgba(0,0,0,.12);
  background: transparent; font-family: 'DM Sans', sans-serif;
  font-size: 14px; color: var(--black); outline: none;
  transition: border-color .2s; width: 100%;
  -webkit-appearance: none;
}
.cf-input:focus, .cf-select:focus, .cf-textarea:focus { border-bottom-color: var(--black); }
.cf-input.is-err, .cf-select.is-err { border-bottom-color: #c0392b; }
.cf-input::placeholder, .cf-textarea::placeholder { color: var(--gray-1); }
.cf-textarea { resize: vertical; min-height: 80px; }
.cf-select { background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%23888580'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 0 center; padding-right: 20px; cursor: pointer; }
.cf-err { font-size: 11px; color: #c0392b; display: none; margin-top: 3px; }
.cf-err.show { display: block; }
.cf-submit {
  width: 100%; padding: 15px; background: var(--black); color: var(--white);
  font-size: 12px; font-weight: 700; letter-spacing: .10em; text-transform: uppercase;
  border: none; cursor: pointer; font-family: 'DM Sans', sans-serif;
  margin-top: 8px; transition: background .2s;
}
.cf-submit:hover { background: var(--green-lt); }
.cf-submit:disabled { opacity: .5; cursor: not-allowed; }
.cf-legal { font-size: 10px; color: var(--gray-1); margin-top: 12px; line-height: 1.65; }
.cf-legal a { color: var(--gray-1); }
.cf-success {
  display: none; text-align: center; padding: 48px 0;
}
.cf-success.show { display: block; }
.cf-success-icon {
  width: 52px; height: 52px; background: var(--green-lt); border-radius: 50%;
  display: flex; align-items: center; justify-content: center; margin: 0 auto 18px;
}
.cf-success-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: 30px; font-weight: 300; color: var(--black); margin-bottom: 10px;
}
.cf-success-body { font-size: 14px; color: var(--gray-1); line-height: 1.75; }
.contact-right-stat {
  padding: 18px 0; border-bottom: 1px solid var(--border-d);
}
.contact-right-stat:last-of-type { border-bottom: none; }
.crs-num {
  font-family: 'Cormorant Garamond', serif;
  font-size: 44px; font-weight: 300; color: var(--green-lt);
  line-height: 1; margin-bottom: 5px;
}
.crs-lbl { font-size: 11px; color: rgba(255,255,255,.35); line-height: 1.55; }
.contact-right-quote {
  margin-top: 28px; border-left: 2px solid var(--green-lt);
  padding: 14px 16px;
}
.contact-right-quote p {
  font-family: 'Cormorant Garamond', serif;
  font-size: 17px; font-weight: 300; font-style: italic;
  color: rgba(255,255,255,.65); line-height: 1.65; margin-bottom: 8px;
}
.contact-right-quote cite {
  font-size: 10px; font-weight: 600; letter-spacing: .09em;
  text-transform: uppercase; color: rgba(255,255,255,.28); font-style: normal;
}

/* ── RESPONSIVE ── */
@media(max-width: 1024px) {
  .ind-index-grid { grid-template-columns: repeat(3, 1fr); }
  .about-intro-grid, .about-values-grid,
  .team-strip, .contact-wrap { grid-template-columns: 1fr; }
  .about-intro-left, .about-intro-right,
  .contact-left, .contact-right { padding: 48px 32px; }
  .contact-form-row { grid-template-columns: 1fr; gap: 0; }
  .about-proof-grid { grid-template-columns: 1fr 1fr; }
}
@media(max-width: 768px) {
  .page-hero { padding: 56px 24px 48px; }
  .ind-index-grid { grid-template-columns: 1fr 1fr; }
  .about-values-grid { grid-template-columns: 1fr; }
  .sec { padding-left: 24px; padding-right: 24px; }
}
@media(max-width: 480px) {
  .ind-index-grid { grid-template-columns: 1fr; }
}

</style>
@endpush

@section('content')
<div class="page-hero">
  <div class="page-hero-inner">
    <div class="page-eye">Contact</div>
    <h1 class="page-h1">Schedule a portfolio<br><em>water assessment.</em></h1>
    <p class="page-sub">A 90-minute working session with WST to map your current water data coverage, identify billing exposure, and outline the verified financial impact of a structured water programme. No obligation.</p>
  </div>
</div>

<section style="padding:0;">
  <div class="contact-wrap">

    <!-- FORM -->
    <div class="contact-left">
      <p class="eye">Get in Touch</p>
      <h2 class="sh" style="margin-bottom:24px;">Schedule Your ESG<br><em>Water Consultation.</em></h2>

      <div id="cf-form">
       <form action="{{ route('member-dashboard.gresb-water.store') }}" method="POST">
        @csrf
        <div style="position:absolute;left:-9999px;height:0;overflow:hidden;" aria-hidden="true">
          <input type="text" name="co_hp" id="co-hp" tabindex="-1" autocomplete="off">
        </div>

        <div class="row">
          <div class="field">
            <label for="co-fn">First name <span class="req">*</span></label>
            <input type="text" id="co-fn" name="first_name" value="{{ old('first_name', auth()->check() ? auth()->user()->name : '') }}" placeholder="First name" maxlength="80" autocomplete="given-name" required>
            <span class="co-errmsg" id="co-fn-e"></span>
            @error('first_name')<p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>@enderror
          </div>
          <div class="field">
            <label for="co-ln">Last name <span class="req">*</span></label>
            <input type="text" id="co-ln" name="last_name" value="{{ old('last_name') }}" placeholder="Last name" maxlength="80" autocomplete="family-name" required>
            <span class="co-errmsg" id="co-ln-e"></span>
            @error('last_name')<p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>@enderror
          </div>
        </div>

        <div class="row">
          <div class="field">
            <label for="co-em">Work email <span class="req">*</span></label>
            <input type="email" id="co-em" name="email" value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}" placeholder="you@company.com" maxlength="200" autocomplete="email" required>
            <span class="co-errmsg" id="co-em-e"></span>
            @error('email')<p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>@enderror
          </div>
          <div class="field">
            <label for="co-co">Company <span class="req">*</span></label>
            <input type="text" id="co-co" name="company" value="{{ old('company', auth()->check() ? auth()->user()->company : '') }}" placeholder="Company name" maxlength="120" autocomplete="organization" required>
            <span class="co-errmsg" id="co-co-e"></span>
            @error('company')<p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>@enderror
          </div>
        </div>

        <div class="row">
          <div class="field">
            <label for="co-ph">Phone number</label>
            <input type="tel" id="co-ph" name="phone" value="{{ old('phone') }}" placeholder="+1 (000) 000-0000" maxlength="30" autocomplete="tel">
            <span class="co-errmsg" id="co-ph-e"></span>
          </div>
          <div class="field">
            <label for="co-ps">Portfolio size (# properties)</label>
            <input type="number" id="co-ps" name="portfolio_size" value="{{ old('portfolio_size') }}" placeholder="e.g. 25" min="1" max="9999">
            @error('portfolio_size')<p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>@enderror
          </div>
        </div>

        <div class="row">
          <div class="field">
            <label for="co-int">Primary interest</label>
            <select id="co-int" name="interest">
              <option value="" disabled selected>Select your goal&hellip;</option>
              <option value="savings" {{ old('interest') == 'savings' ? 'selected' : '' }}>Reduce water infrastructure cost exposure</option>
              <option value="compliance" {{ old('interest') == 'compliance' ? 'selected' : '' }}>ESG water data coverage &amp; reporting</option>
              <option value="gresb" {{ old('interest') == 'gresb' ? 'selected' : '' }}>GRESB WT1 / MR3 / RA4 compliance</option>
              <option value="monitoring" {{ old('interest') == 'monitoring' ? 'selected' : '' }}>Smart monitoring &amp; leak detection</option>
              <option value="cooling" {{ old('interest') == 'cooling' ? 'selected' : '' }}>Cooling tower optimisation</option>
              <option value="audit" {{ old('interest') == 'audit' ? 'selected' : '' }}>Utility bill validation &amp; audit</option>
              <option value="tax" {{ old('interest') == 'tax' ? 'selected' : '' }}>Section 179 tax strategy &amp; financing</option>
              <option value="full_portfolio" {{ old('interest') == 'full_portfolio' ? 'selected' : '' }}>Full portfolio water programme</option>
              <option value="other" {{ old('interest') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('interest')<p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>@enderror
          </div>
          <div class="field">
            <label for="co-mt">Preferred meeting time</label>
            <input type="datetime-local" id="co-mt" name="time_preference" value="{{ old('time_preference', now()->format('Y-m-d\TH:i')) }}">
            @error('time_preference')<p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>@enderror
          </div>
        </div>

        <div class="row-full field">
          <label for="co-nt">Additional notes</label>
          <textarea id="co-nt" name="notes" placeholder="Tell us about your specific challenges&hellip;" maxlength="1000">{{ old('notes') }}</textarea>
          @error('notes')<p class="mt-2 text-xs text-red-500 font-medium">{{ $message }}</p>@enderror
        </div>

        <div class="modal-foot">
          <p class="foot-note">We'll follow up within 24 hours to schedule a 30-minute call. Every submission reviewed personally.</p>
          <button type="submit" class="submit-btn" id="co-submit">Submit request</button>
        </div>

      </form>
        <p class="cf-legal">We'll follow up within 24 hours to schedule a 30-minute call. Every submission reviewed personally. By submitting you agree to WST's <a href="/privacy-policy">Privacy Policy</a>.</p>
      </div>

      <!-- Success -->
      <div class="cf-success" id="cf-success">
        <div class="cf-success-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5"><path d="M4 12l5 5 11-11"/></svg>
        </div>
        <div class="cf-success-title">Request received.</div>
        <p class="cf-success-body">A WST advisor will follow up within 24 hours to confirm your assessment time.<br><br>Every submission is reviewed personally &mdash; no automated sequences.</p>
      </div>
    </div>

    <!-- RIGHT: PROOF + CONTACT INFO -->
    <div class="contact-right">
      <p class="eye" style="color:rgba(255,255,255,.3);">Why WST</p>
      <h2 style="font-family:'Cormorant Garamond',serif;font-size:clamp(24px,2.5vw,34px);font-weight:300;color:var(--white);margin-bottom:28px;line-height:1.2;">Portfolio water advisory for institutional real estate.</h2>

      <div class="contact-right-stat">
        <div class="crs-num">$2.3M</div>
        <div class="crs-lbl">Verified savings documented across institutional engagements to date</div>
      </div>
      <div class="contact-right-stat">
        <div class="crs-num">25.3%</div>
        <div class="crs-lbl">Average water consumption reduction — DiamondRock hospitality portfolio, GRESB-reported</div>
      </div>
      <div class="contact-right-stat">
        <div class="crs-num">500+</div>
        <div class="crs-lbl">Commercial properties audited and monitored across all asset classes</div>
      </div>

      <div class="contact-right-quote">
        <p>"WST gave us the data to have a different conversation with our investors."</p>
        <cite>Portfolio Manager &middot; DiamondRock Hospitality Company</cite>
      </div>

      <div style="margin-top:32px;padding-top:28px;border-top:1px solid var(--border-d);">
        <p style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.28);margin-bottom:14px;">Direct Contact</p>
        <div style="display:flex;flex-direction:column;gap:10px;">
          <a href="tel:+19545083877" style="font-size:14px;color:rgba(255,255,255,.6);text-decoration:none;display:flex;align-items:center;gap:10px;">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><path d="M2 2h3l1.5 3.5-2 1.5a9 9 0 005 5l1.5-2L14 11.5V14h-2A10 10 0 012 4V2z"/></svg>
            +1 (954) 508-3877
          </a>
          <a href="mailto:acc@watersolutech.com" style="font-size:14px;color:rgba(255,255,255,.6);text-decoration:none;display:flex;align-items:center;gap:10px;">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><rect x="1" y="2.5" width="12" height="9" rx="1"/><path d="M1 3.5l6 4.5 6-4.5"/></svg>
            acc@watersolutech.com
          </a>
          <div style="font-size:13px;color:rgba(255,255,255,.35);display:flex;align-items:flex-start;gap:10px;margin-top:2px;">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="var(--green-lt)" stroke-width="1.5" style="flex-shrink:0;margin-top:2px;"><path d="M7 1C4.8 1 3 2.8 3 5c0 3.3 4 8 4 8s4-4.7 4-8c0-2.2-1.8-4-4-4z"/><circle cx="7" cy="5" r="1.5"/></svg>
            <span>200 S. Andrews Avenue, Suite 504<br>Fort Lauderdale, FL 33301</span>
          </div>
        </div>
      </div>

      <div style="margin-top:28px;padding:18px 20px;background:rgba(45,92,66,.15);border-left:2px solid var(--green-lt);">
        <p style="font-size:12px;color:rgba(255,255,255,.55);line-height:1.75;">WST is a <strong style="color:rgba(255,255,255,.75);">GRESB Solution Provider Partner</strong>. Our engagement model is advisory — compensation tied to documented outcomes, not upfront fees.</p>
      </div>
    </div>
  </div>
</section>

<!-- WHAT TO EXPECT -->
<section class="sec sec-o">
  <div style="margin-bottom:36px;">
    <p class="eye">What to Expect</p>
    <h2 class="sh">From first contact to<br><em>documented savings.</em></h2>
  </div>
  <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:2px;background:var(--border-l);">
    <div style="background:var(--white);padding:28px;">
      <div style="font-family:'Cormorant Garamond',serif;font-size:40px;font-weight:300;color:var(--green-lt);line-height:1;margin-bottom:10px;">01</div>
      <div style="font-size:13px;font-weight:700;color:var(--black);margin-bottom:8px;">90-minute visibility session</div>
      <p style="font-size:12px;color:var(--gray-1);line-height:1.75;">We map your current water data coverage, identify the billing exposure categories most likely to yield recovery, and outline the GRESB gap in your portfolio.</p>
    </div>
    <div style="background:var(--white);padding:28px;">
      <div style="font-family:'Cormorant Garamond',serif;font-size:40px;font-weight:300;color:var(--green-lt);line-height:1;margin-bottom:10px;">02</div>
      <div style="font-size:13px;font-weight:700;color:var(--black);margin-bottom:8px;">Scoped proposal within 5 days</div>
      <p style="font-size:12px;color:var(--gray-1);line-height:1.75;">WST delivers a defined-scope engagement proposal with estimated savings range, timeline, and the documentation framework we will produce.</p>
    </div>
    <div style="background:var(--white);padding:28px;">
      <div style="font-family:'Cormorant Garamond',serif;font-size:40px;font-weight:300;color:var(--green-lt);line-height:1;margin-bottom:10px;">03</div>
      <div style="font-size:13px;font-weight:700;color:var(--black);margin-bottom:8px;">Audit &amp; findings — 30 to 60 days</div>
      <p style="font-size:12px;color:var(--gray-1);line-height:1.75;">Bill validation and on-site audit complete. First verified findings delivered with IC-ready documentation. Billing recovery process initiated.</p>
    </div>
    <div style="background:var(--white);padding:28px;">
      <div style="font-family:'Cormorant Garamond',serif;font-size:40px;font-weight:300;color:var(--green-lt);line-height:1;margin-bottom:10px;">04</div>
      <div style="font-size:13px;font-weight:700;color:var(--black);margin-bottom:8px;">Verified, documented savings</div>
      <p style="font-size:12px;color:var(--gray-1);line-height:1.75;">All savings verified against utility bills and meter readings. GRESB-formatted data package delivered. Shared-savings invoice issued only on confirmed outcomes.</p>
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