@extends('layouts.app')

@section('title', 'Scoping Studies — Water Solutions Technology')

@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/scope_studies.css') }}">
@endpush

@section('content')

<div class="svc-hero">
  <div class="svc-hero-bg"></div>
  <div class="svc-hero-content">
    <div class="svc-bc">
      <a href="/services">Services</a>
      <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 1l4 4-4 4"/></svg>
      <span>Feasibility Assessment</span>
    </div>
    <div class="svc-eye">Service &mdash; Feasibility Assessment</div>
    <h1 class="svc-h1">Know the opportunity<br><em>before committing to<br>a full engagement.</em></h1>
    <p class="svc-deck">A WST Feasibility Assessment maps your portfolio's water cost exposure, estimates the recoverable savings opportunity, and scopes the programme required to capture it &mdash; before you commit to a full engagement. Five days. No upfront cost.</p>
    <div class="svc-ctas">
      <a href="{{route('contact')}}" class="btn-svc-primary">Request Feasibility Assessment</a>
      <a href="#what-is-included" class="btn-svc-ghost">What's Included &darr;</a>
    </div>
  </div>
  <div class="svc-stat-strip">
    <div class="sss-cell"><div class="sss-num g">5 days</div><div class="sss-lbl">Typical turnaround — from billing records to findings summary</div></div>
    <div class="sss-cell"><div class="sss-num">Zero</div><div class="sss-lbl">Upfront cost — feasibility assessment is delivered before any programme fee is discussed</div></div>
    <div class="sss-cell"><div class="sss-num g">IC-ready</div><div class="sss-lbl">All output formatted for investment committee presentation</div></div>
    <div class="sss-cell"><div class="sss-num">No lock-in</div><div class="sss-lbl">The assessment is a standalone deliverable — not a commitment to a full programme</div></div>
  </div>
</div>

<!-- WHAT IS IT -->
<section class="sec sec-o">
  <div class="two">
    <div>
      <p class="eye">What Is a Feasibility Assessment?</p>
      <h2 class="sh">A defined-scope diagnostic that answers<br><em>one specific question.</em></h2>
      <p class="sub">The question is: "Given what's visible in our billing records and portfolio profile, what is the most likely water savings opportunity &mdash; and is a full WST programme likely to be worth the management attention it requires?"</p>
      <p style="font-size:14px;color:var(--gray-1);line-height:1.85;margin-bottom:16px;">Most potential clients reach WST through a specific trigger &mdash; an unexplained billing spike, a board question about GRESB water scores, a CFO reviewing the utilities line in the operating expense schedule. The Feasibility Assessment is designed for that moment: a fast, low-cost, low-friction way to establish whether a full programme makes financial sense for your specific portfolio before the engagement is structured.</p>
      <p style="font-size:14px;color:var(--gray-1);line-height:1.85;margin-bottom:24px;">The output is a written findings summary with three components: a savings opportunity estimate (quantified by category), a risk identification summary (categories of billing exposure present), and a programme scope recommendation (what WST would do if engaged for a full programme, and the expected outcome). This is not a proposal. It is a diagnostic. The decision to proceed is made after reviewing it.</p>
      <div style="background:rgba(45,92,66,.06);border-left:3px solid var(--green-lt);padding:16px 20px;">
        <p style="font-size:13px;color:var(--black);line-height:1.75;"><strong style="color:var(--green-lt);">Important:</strong> The Feasibility Assessment is not a watered-down version of a full audit. It uses the same billing forensics methodology &mdash; applied to a defined subset of records. If material overcharges are identified during the assessment, those findings are documented and recoverable immediately, regardless of whether the client proceeds to a full programme.</p>
      </div>
    </div>
    <div>
      <div class="bm">
        <div class="bm-title">Feasibility Assessment &mdash; At a Glance</div>
        <div class="brow"><span class="bl">Turnaround time</span><span class="bv">3&ndash;5 business days</span></div>
        <div class="brow"><span class="bl">Records required</span><span class="bv">12 months utility bills</span></div>
        <div class="brow"><span class="bl">Site visit required</span><span class="bv">No &mdash; remote only at this stage</span></div>
        <div class="brow"><span class="bl">Output format</span><span class="bv">Written findings summary</span></div>
        <div class="brow"><span class="bl">IC-ready documentation</span><span class="bv">Yes &mdash; structured for committee</span></div>
        <div class="brow"><span class="bl">Programme commitment required</span><span class="bv">None &mdash; standalone deliverable</span></div>
        <div class="brow"><span class="bl">Cost</span><span class="bv">Zero &mdash; no upfront fee</span></div>
        <a href="{{route('contact')}}" class="bm-cta">Request Feasibility Assessment</a>
      </div>
    </div>
  </div>
</section>

<!-- WHAT IS INCLUDED -->
<section class="sec sec-w" id="what-is-included">
  <div style="margin-bottom:36px;">
    <p class="eye">What's Included</p>
    <h2 class="sh">Three deliverables in<br><em>five business days.</em></h2>
  </div>
  <div class="three" style="background:var(--border-l);">
    <div style="background:var(--white);padding:36px;">
      <div style="font-family:'Cormorant Garamond',serif;font-size:52px;font-weight:300;color:rgba(45,92,66,.12);line-height:1;margin-bottom:16px;">01</div>
      <div style="font-size:15px;font-weight:700;color:var(--black);margin-bottom:10px;">Savings Opportunity Estimate</div>
      <p style="font-size:13px;color:var(--gray-1);line-height:1.8;margin-bottom:14px;">A quantified estimate of the recoverable savings opportunity across four categories: billing error recovery (rate misclassifications, estimation overrides, meter accuracy), sewer exemption opportunity, operational efficiency (cooling tower, leak exposure), and GRESB data coverage gap.</p>
      <p style="font-size:13px;color:var(--gray-1);line-height:1.8;">Each category is expressed as an annual savings range (low/mid/high) based on the billing records reviewed and the portfolio characteristics provided. The estimate is clearly marked as preliminary &mdash; the full audit will produce verified figures.</p>
    </div>
    <div style="background:var(--white);padding:36px;">
      <div style="font-family:'Cormorant Garamond',serif;font-size:52px;font-weight:300;color:rgba(45,92,66,.12);line-height:1;margin-bottom:16px;">02</div>
      <div style="font-size:15px;font-weight:700;color:var(--black);margin-bottom:10px;">Risk Identification Summary</div>
      <p style="font-size:13px;color:var(--gray-1);line-height:1.8;margin-bottom:14px;">A summary of the specific billing risk categories identified in the records reviewed &mdash; which specific error types appear to be present, which assets show anomalous consumption patterns, and which properties should be prioritised for on-site audit attention.</p>
      <p style="font-size:13px;color:var(--gray-1);line-height:1.8;">Where material overcharges are clearly visible in the remote review (rate misclassification, obvious estimation errors), these are documented immediately regardless of whether a full programme follows.</p>
    </div>
    <div style="background:var(--white);padding:36px;">
      <div style="font-family:'Cormorant Garamond',serif;font-size:52px;font-weight:300;color:rgba(45,92,66,.12);line-height:1;margin-bottom:16px;">03</div>
      <div style="font-size:15px;font-weight:700;color:var(--black);margin-bottom:10px;">Programme Scope Recommendation</div>
      <p style="font-size:13px;color:var(--gray-1);line-height:1.8;margin-bottom:14px;">A clear recommendation on whether a full WST programme makes financial sense for your portfolio, and if so, what the programme should include &mdash; which services, which assets, in what sequence, with what expected outcome range.</p>
      <p style="font-size:13px;color:var(--gray-1);line-height:1.8;">The recommendation is honest. If the assessment suggests the savings opportunity is below the threshold where a full programme makes economic sense, WST says so. The Feasibility Assessment is not a sales document &mdash; it is a diagnostic.</p>
    </div>
  </div>
</section>

<!-- WHEN TO USE IT -->
<section class="sec sec-dk">
  <div style="margin-bottom:36px;">
    <p class="eye" style="color:rgba(255,255,255,.3);">When to Commission a Feasibility Assessment</p>
    <h2 class="sh sh--white">Six scenarios where a<br><em>Feasibility Assessment is the right first step.</em></h2>
  </div>
  <div class="dark-feat-grid">
    <div class="dfc">
      <div class="dfc-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M2 14l4-4 4 4 4-8 4 4"/></svg></div>
      <div class="dfc-title">Unexplained billing increase</div>
      <div class="dfc-body">A billing spike that engineering can't explain. The feasibility assessment identifies whether it's a meter error, leak, rate change, or estimation override &mdash; in 48 hours, from records already in your files.</div>
    </div>
    <div class="dfc">
      <div class="dfc-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M10 2l2.4 4.9 5.4.8-3.9 3.8.9 5.4L10 14.4l-4.8 2.5.9-5.4L1.2 7.7l5.4-.8z"/></svg></div>
      <div class="dfc-title">GRESB water score below peer average</div>
      <div class="dfc-body">GRESB water indicator below 75% without a clear understanding of why. The assessment maps the specific WT1/MR3/RA4 gaps and estimates the score improvement achievable with a documentation programme.</div>
    </div>
    <div class="dfc">
      <div class="dfc-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="3" y="3" width="14" height="14" rx="1"/><path d="M7 10h6M10 7v6"/></svg></div>
      <div class="dfc-title">New acquisition due diligence</div>
      <div class="dfc-body">Pre-acquisition water risk assessment. The feasibility review identifies billing exposure, infrastructure risk, and efficiency opportunity in the target assets &mdash; before the deal closes and the cost becomes yours.</div>
    </div>
    <div class="dfc">
      <div class="dfc-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M2 18V8l8-6 8 6v10"/><path d="M7 18v-6h6v6"/></svg></div>
      <div class="dfc-title">Annual budget review</div>
      <div class="dfc-body">Water utilities line item under scrutiny in the operating budget. The assessment provides a defensible savings estimate the CFO or asset manager can use to evaluate whether a formal programme belongs in the budget.</div>
    </div>
    <div class="dfc">
      <div class="dfc-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="10" cy="10" r="7"/><path d="M10 7v3l2 2"/></svg></div>
      <div class="dfc-title">LP or investor ESG request</div>
      <div class="dfc-body">An LP or ESG-focused investor has asked about water performance for the first time. The assessment provides enough documentation to frame an initial response while scoping the full programme required to satisfy ongoing disclosure requirements.</div>
    </div>
    <div class="dfc">
      <div class="dfc-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M4 6h12M4 10h8M4 14h10"/></svg></div>
      <div class="dfc-title">Never audited a commercial property</div>
      <div class="dfc-body">The property has never had a water audit. The assessment provides a baseline understanding of the billing exposure and savings opportunity &mdash; before committing to the full on-site audit programme.</div>
    </div>
  </div>
</section>

<!-- PROCESS -->
<section class="sec sec-w">
  <div style="max-width:720px;margin-bottom:36px;">
    <p class="eye">How It Works</p>
    <h2 class="sh">From first contact to<br><em>findings in five days.</em></h2>
  </div>
  <div class="process-steps" style="max-width:720px;">
    <div class="process-step">
      <div class="ps-num"><div class="ps-num-inner">01</div></div>
      <div class="ps-body">
        <div class="ps-title">Initial Conversation (30 minutes)</div>
        <div class="ps-text">A brief call with a WST advisor to understand your portfolio, the trigger for the assessment request, and which assets should be prioritised. No preparation required &mdash; we'll ask you what we need to know.</div>
      </div>
    </div>
    <div class="process-step">
      <div class="ps-num"><div class="ps-num-inner">02</div></div>
      <div class="ps-body">
        <div class="ps-title">Bill Submission (12 months, 1&ndash;3 assets)</div>
        <div class="ps-text">Provide 12 months of utility bills for the 1&ndash;3 assets identified in the initial call. Bills can be PDFs, portal exports, or paper scans &mdash; whatever format you have. No reformatting required on your end.</div>
      </div>
    </div>
    <div class="process-step">
      <div class="ps-num"><div class="ps-num-inner">03</div></div>
      <div class="ps-body">
        <div class="ps-title">Remote Forensic Review (3&ndash;5 days)</div>
        <div class="ps-text">WST conducts the billing forensics, cross-references tariff schedules, identifies anomalies, and builds the savings opportunity model. No further input required from the client during this phase.</div>
      </div>
    </div>
    <div class="process-step">
      <div class="ps-num"><div class="ps-num-inner">04</div></div>
      <div class="ps-body">
        <div class="ps-title">Findings Presentation (45 minutes)</div>
        <div class="ps-text">WST presents the three deliverables &mdash; savings estimate, risk summary, and programme recommendation &mdash; in a written report and live walk-through call. The report is structured for IC circulation if required. No decision required at this point.</div>
      </div>
    </div>
  </div>
</section>

<!-- RELATED -->
<section class="sec sec-o" style="padding:48px;">
  <p class="eye">Next Steps After Feasibility</p>
  <h2 class="sh" style="margin-bottom:24px;">If the feasibility confirms a material<br><em>opportunity, these are the next steps.</em></h2>
  <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:2px;background:var(--border-l);">
    <a href="/services/efficiency-audits" style="background:var(--white);padding:24px 26px;text-decoration:none;display:flex;flex-direction:column;gap:6px;transition:background .18s;" onmouseover="this.style.background='var(--off-white)'" onmouseout="this.style.background='var(--white)'">
      <div style="font-size:10px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--green-lt);">Water Efficiency Audits</div>
      <div style="font-size:13px;font-weight:600;color:var(--black);">Full remote + on-site audit programme</div>
      <div style="font-size:11px;color:var(--gray-1);">The complete verified savings programme &rarr;</div>
    </a>
    <a href="/services/smart-water-recovery" style="background:var(--white);padding:24px 26px;text-decoration:none;display:flex;flex-direction:column;gap:6px;transition:background .18s;" onmouseover="this.style.background='var(--off-white)'" onmouseout="this.style.background='var(--white)'">
      <div style="font-size:10px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--green-lt);">Smart Water Recovery</div>
      <div style="font-size:13px;font-weight:600;color:var(--black);">Billing forensics &amp; forward monitoring</div>
      <div style="font-size:11px;color:var(--gray-1);">Recover historical overcharges &rarr;</div>
    </a>
    <a href="/services/gresb-compliance-strategy" style="background:var(--white);padding:24px 26px;text-decoration:none;display:flex;flex-direction:column;gap:6px;transition:background .18s;" onmouseover="this.style.background='var(--off-white)'" onmouseout="this.style.background='var(--white)'">
      <div style="font-size:10px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--green-lt);">ESG &amp; GRESB Strategy</div>
      <div style="font-size:13px;font-weight:600;color:var(--black);">If GRESB gap was identified in feasibility</div>
      <div style="font-size:11px;color:var(--gray-1);">Close the water score gap &rarr;</div>
    </a>
  </div>
</section>

<div class="cs">
  <div>
    <div class="cs-t">Start with the bills<br><em>you already have.</em></div>
    <p class="cs-s">Send WST 12 months of utility bills for one property. Within 5 business days, you'll have a written estimate of the recoverable savings opportunity &mdash; with zero commitment and zero cost.</p>
  </div>
  <a href="{{route('contact')}}" class="cs-btn">Request Feasibility Assessment</a>
</div>

@endsection
