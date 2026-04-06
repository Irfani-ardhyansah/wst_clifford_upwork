@extends('layouts.app')

@section('title', 'Water Site Audit — Water Solutions Technology')

@section('content')
<div class="inner-hero">
  <div class="hero-bg"></div>
  <div class="hero-content">
    <div class="inner-hero-bc">
      <a href="/services">Services</a>
      <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 1l4 4-4 4"/></svg>
      <span>Efficiency Audits</span>
    </div>
    <div class="inner-hero-eye">Service — Water Efficiency Audits</div>
    <h1>The cornerstone of<br><em>smart water management.</em></h1>
    <p class="inner-hero-sub">Our water audit strategies save commercial properties an average of 15–30% on annual water utility costs. Every audit begins with your bills and ends with a verified action plan.</p>
    <div class="hero-cta-row">
      <a href="#" class="hero-btn-primary" onclick="window.openConsult && window.openConsult('assess')">Speak With an Auditor</a>
      <a href="#how-it-works" class="hero-btn-ghost">
        See how it works
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M7 2v10M2 7l5 5 5-5"/></svg>
      </a>
    </div>
  </div>
  <div class="stat-row" style="margin-top:64px;">
    <div class="stat-cell"><div class="stat-val">15–30%</div><div class="stat-lbl">Average savings</div></div>
    <div class="stat-cell"><div class="stat-val">500+</div><div class="stat-lbl">Properties audited</div></div>
    <div class="stat-cell"><div class="stat-val">$2.3M</div><div class="stat-lbl">Verified savings delivered</div></div>
    <div class="stat-cell"><div class="stat-val">48 hrs</div><div class="stat-lbl">Bill audit turnaround</div></div>
  </div>
</div>

<!-- ─── ADVISORS: What You Gain + Industry Insights ─── -->
<section class="sec sec-w" style="padding:0;">
  <div style="padding:56px 48px 24px 48px;">
    <div class="eye">The Case for an External Audit</div>
    <h2 class="sh">Putting the External Water Audit<br>Advisors to Work</h2>
    <p style="font-size:14px;color:var(--gray-1);max-width:600px;line-height:1.75;margin-bottom:0;">
      Precision-engineered water audits that reduce OpEx and improve NOI — delivered by a fresh pair of eyes, from experts.
    </p>
  </div>
  <div class="advisors-grid">
    <div class="advisors-col">
      <div class="eye">What You Gain</div>
      <ul class="gain-list">
        <li class="gain-item"><span class="gain-check">&#10003;</span>20–30% water &amp; sewer savings, typically</li>
        <li class="gain-item"><span class="gain-check">&#10003;</span>ESG-ready reporting formatted for stakeholders and LP disclosure</li>
        <li class="gain-item"><span class="gain-check">&#10003;</span>ROI — most audits pay for themselves within 12 months</li>
        <li class="gain-item"><span class="gain-check">&#10003;</span>Asset value protection, risk mitigation, and compliance support</li>
        <li class="gain-item"><span class="gain-check">&#10003;</span>Historical overpayment recovery, often resulting in a cash return</li>
      </ul>
    </div>
    <div class="advisors-col" style="background:var(--off-white);">
      <div class="eye">Why External Matters</div>
      <p style="font-size:14px;color:var(--gray-1);line-height:1.8;margin-bottom:20px;">Internal teams are too close to the operation to catch systematic billing errors, and often lack specialist tariff knowledge. An external audit brings the forensic rigour your portfolio deserves — and the independence investors expect.</p>
      <p style="font-size:14px;color:var(--gray-1);line-height:1.8;">WST's team has reviewed over 500 commercial properties across hospitality, office, retail, and industrial. What we find consistently surprises even experienced facility directors.</p>
    </div>
    <div class="advisors-col dark">
      <div class="eye" style="color:var(--green-lt);">Industry Insights</div>
      <div class="insight-box">
        <div class="insight-row">
          <div class="insight-big">1 in 3</div>
          <div class="insight-text">commercial properties have undetected water billing errors</div>
        </div>
        <div class="insight-row">
          <div class="insight-big">24%</div>
          <div class="insight-text">average savings from external audit recommendations (WST data)</div>
        </div>
        <div class="insight-row">
          <p class="insight-quote">"The earlier a water audit is performed, the greater the savings and ROI."</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── HOW IT WORKS + OUTCOMES ─── -->
<section class="sec sec-o" id="how-it-works">
  <div class="two">
    <div>
      <div class="eye">How It Works</div>
      <h2 class="sh">Efficiency Audits in practice.</h2>
      <p class="sub">Every engagement begins with the right diagnosis and ends with verified, documented results — no upfront cost.</p>
      <div class="ai">
        <div class="ai-ic"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><rect x="2" y="3" width="12" height="10" rx="1"/><path d="M5 7h6M5 10h4"/></svg></div>
        <div><div class="ai-t">Remote Bill Audit</div><div class="ai-b">We acquire and analyse 12–36 months of utility bills, identify billing errors, detect leak signatures, validate rate classifications, and uncover rebate opportunities — within 48 hours.</div></div>
      </div>
      <div class="ai">
        <div class="ai-ic"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><circle cx="8" cy="8" r="5.5"/><path d="M8 5.5v3l2 1.5"/></svg></div>
        <div><div class="ai-t">On-Site Physical Audit</div><div class="ai-b">Comprehensive walk-through of all water-using systems: plumbing fixtures, cooling towers, irrigation, mechanical rooms, and process equipment. Every meter read. Every flow rate documented.</div></div>
      </div>
      <div class="ai">
        <div class="ai-ic"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><path d="M2 14l4-4 4 4 4-8"/></svg></div>
        <div><div class="ai-t">Verified Action Plan</div><div class="ai-b">Prioritised recommendations with ROI projections, estimated savings per measure, and implementation sequencing — formatted for capital planning and GRESB reporting.</div></div>
      </div>
      <div class="ai" style="border-bottom:none;">
        <div class="ai-ic"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><path d="M3 4h10M3 8h7M3 12h5"/></svg></div>
        <div><div class="ai-t">ESG-Ready Documentation</div><div class="ai-b">Audit documentation supports GRESB, CDP, and investor disclosure requirements. Every finding is verification-ready for LP reporting and sustainability frameworks.</div></div>
      </div>
    </div>
    <div class="bm">
      <div class="bm-title">Efficiency Audits Outcomes</div>
      <div class="brow"><span class="bl">Bill validation recovery (avg)</span><span class="bv">8–12%</span></div>
      <div class="brow"><span class="bl">On-site savings identified</span><span class="bv">15–30%</span></div>
      <div class="brow"><span class="bl">Audit-to-savings timeline</span><span class="bv">30–60 days</span></div>
      <div class="brow"><span class="bl">ROI on audit investment</span><span class="bv">10–40×</span></div>
      <div class="brow"><span class="bl">Properties audited to date</span><span class="bv">500+</span></div>
      <div class="brow"><span class="bl">GRESB documentation</span><span class="bv">Included</span></div>
      <a href="#" class="bm-cta">Request a Water Audit</a>
    </div>
  </div>
</section>

<!-- ─── WHY VALIDATE BILLS + WATER MANAGEMENT GUIDE ─── -->
<section class="sec sec-w">
  <div class="validate-grid">
    <div class="validate-body">
      <div class="eye">The Financial Case</div>
      <h2 class="sh">Why It Pays to Validate Bills:<br><em>Understanding Your Water Utility Fees</em></h2>
      <p>For most enterprises, water is an unmanaged utility and an unmitigated financial risk. While you have strategic oversight on energy, complex water billing — rife with regional variances and errors — creates significant financial exposure.</p>
      <p>We provide the expertise to audit this complexity, recover overpayments, and transform an operational blind spot into a source of savings and efficiency.</p>
      <p>A WST water audit removes uncertainty from your water bill. We are specialists at navigating water and wastewater tariffs — identifying errors that utilities will not flag on your behalf.</p>
    </div>
    <div>
      <div class="insights-guide">
        <div>
          <div style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--green-lt);margin-bottom:10px;">Free Resource</div>
          <div class="guide-title">Water Management Insights</div>
        </div>
        <p class="guide-body">Download your free water management guide to learn expert strategies, resolving excessively high water bills, data-driven solutions, and proven methods to help you control costs, improve efficiency, and drive sustainability.</p>
        <a href="#" class="guide-btn">
          Download Now
          <span class="guide-btn-arrow">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 2l8 8M10 3v7H3"/></svg>
          </span>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ─── WATER PRICE INCREASES + IMAGE + PRICING ─── -->
<section class="sec sec-o">
  <div class="price-grid">
    <div>
      <div class="eye">Water Price Increases</div>
      <h2 class="sh">Water Price Increases &amp; Business Meaning:<br><em>Conducting a Water Audit</em></h2>
      <p style="font-size:14px;color:var(--gray-1);line-height:1.8;margin-bottom:8px;">
        We don't stop at insights — we take action. Our end-to-end audit mitigates water-related financial risk by identifying infrastructure process improvement, complex billing errors and recovering historical overpayments, often resulting in a substantial cash return. Proprietary technology and expert system engineers transform this liability into measurable gain.
      </p>
      <div class="price-check-list">
        <div class="price-check-item"><span class="price-check-icon">&#10003;</span>Invoice &amp; Tariff Analysis</div>
        <div class="price-check-item"><span class="price-check-icon">&#10003;</span>Targeted Site Inspections</div>
        <div class="price-check-item"><span class="price-check-icon">&#10003;</span>Detailed Reporting</div>
        <div class="price-check-item"><span class="price-check-icon">&#10003;</span>Implementation &amp; Recovery</div>
        <div class="price-check-item"><span class="price-check-icon">&#10003;</span>Opportunity Identification</div>
        <div class="price-check-item"><span class="price-check-icon">&#10003;</span>Utility forecasting, budgeting &amp; procurement</div>
        <div class="price-check-item"><span class="price-check-icon">&#10003;</span>Ongoing support from a dedicated team of water efficiency specialists and engineers</div>
      </div>
      <a href="{{ route('resources.webinar') }}" style="font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--green-lt);text-decoration:none;display:inline-flex;align-items:center;gap:6px;">
        Water Webinars on Demand &rarr;
      </a>
    </div>
    <div>
      <div class="price-img-wrap">
        <img
          src="https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=800&q=80&auto=format&fit=crop"
          alt="Water systems engineer conducting an on-site audit"
          loading="lazy"
          width="800" height="560"
        >
      </div>
      <div class="pricing-box">
        <div class="pricing-box-title">What Our Water Audit Will Cost You</div>
        <p class="pricing-box-body">No upfront fees. Delivered via a shared-savings approach — meaning there are no upfront costs. Our compensation is tied directly to the savings we help you recover.</p>
        <p class="pricing-box-body" style="margin-top:8px;">Our compensation is tied directly to the savings we help you recover.</p>
        <div class="pricing-box-highlight">You Only Pay When You Save.</div>
      </div>
    </div>
  </div>
</section>

<!-- ─── PROOF STRIP: Hilton + 180K stat ─── -->
<div class="proof-strip">
  <div class="proof-inner">
    <div class="proof-left">
      <div class="proof-stat-num">180K</div>
      <div class="proof-stat-lbl">Gallons saved per month — verified by WST</div>
      <div class="proof-stat-num">6.3</div>
      <div class="proof-stat-lbl" style="margin-bottom:0;">Month payback period on audit investment</div>
    </div>
    <div class="proof-right">
      <p class="proof-quote">"WST's audit uncovered billing errors and infrastructure issues our own engineers had missed entirely. The engagement paid for itself within 90 days — and keeps paying."</p>
      <div class="proof-attr">Director of Engineering &nbsp;&middot;&nbsp; Hilton South Tower</div>
    </div>
  </div>
</div>

<!-- ─── ESG & REGULATORY COMPLIANCE ─── -->
<section class="sec sec-d">
  <div class="two">
    <div>
      <div class="eye" style="color:var(--green-lt);">ESG &amp; Regulatory</div>
      <h2 class="sh" style="color:var(--white);">Demonstrate ESG &amp;<br>Regulatory Compliance</h2>
      <p class="sub">Our audit reports are aligned with your sustainability strategy and environmental compliance framework — formatted for institutional reporting from day one.</p>
      <div class="esg-check-list">
        <div class="esg-check-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><path d="M2 8l4 4 8-8"/></svg>ESG-ready audit documentation aligned with GRESB WT1, MR3, and RA4 indicators</div>
        <div class="esg-check-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><path d="M2 8l4 4 8-8"/></svg>CDP and investor disclosure compatible reporting formats</div>
        <div class="esg-check-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><path d="M2 8l4 4 8-8"/></svg>Verified documentation for LP and institutional reporting requirements</div>
        <div class="esg-check-item"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><path d="M2 8l4 4 8-8"/></svg>Supports asset value protection and regulatory risk mitigation</div>
      </div>
    </div>
    <div class="esg-stat-block">
      <div class="esg-stat-big">27%</div>
      <div class="esg-stat-lbl">Avg. Water Use Reduction Post-Audit</div>
      <p class="esg-stat-note">ESG-ready audit documentation supports GRESB, CDP &amp; investor compliance across your full portfolio.</p>
      <a href="/contact" class="esg-cta">Request a Confidential Audit</a>
    </div>
  </div>
</section>

<!-- ─── FINAL CTA ─── -->
<div class="cs">
  <div>
    <h2 class="cs-t">Ready to audit your<br><em>portfolio's water spend?</em></h2>
    <p class="cs-s">A 48-hour remote bill audit is the fastest way to understand where your water dollars are going — and where the savings are.</p>
  </div>
  <a href="/contact" class="cs-btn">Schedule Assessment</a>
</div>

@endsection

@push('styles')
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    .inner-hero { background: var(--black); padding: 72px 48px 64px; border-bottom: 1px solid var(--border-d); }
    .inner-hero-bc { display:flex; align-items:center; gap:8px; font-size:11px; font-weight:500; letter-spacing:0.06em; text-transform:uppercase; color:rgba(255,255,255,0.25); margin-bottom:28px; }
    .inner-hero-bc a { color:rgba(255,255,255,0.25); text-decoration:none; }
    .inner-hero-bc a:hover { color:rgba(255,255,255,0.6); }
    .inner-hero-eye { font-size:10px; font-weight:700; letter-spacing:0.18em; text-transform:uppercase; color:var(--green-lt); margin-bottom:16px; }
    .inner-hero h1 { font-family:'Cormorant Garamond',serif; font-size:clamp(40px,5vw,66px); font-weight:300; line-height:1.05; color:var(--white); margin-bottom:20px; }
    .inner-hero h1 em { font-style:italic; }
    .inner-hero-sub { font-size:15px; color:rgba(255,255,255,0.45); line-height:1.75; max-width:560px; }
    .stat-row { display:grid; grid-template-columns:repeat(4,1fr); gap:1px; background:rgba(255,255,255,0.06); margin-top:48px; border-top:1px solid rgba(255,255,255,0.06); }
    .stat-cell { padding:24px 28px; background:var(--black); }
    .stat-val { font-family:'Cormorant Garamond',serif; font-size:36px; font-weight:300; color:var(--white); line-height:1; margin-bottom:6px; }
    .stat-lbl { font-size:10px; font-weight:600; letter-spacing:0.10em; text-transform:uppercase; color:rgba(255,255,255,0.28); }
    section.sec { padding:72px 48px; }
    .sec-w { background:var(--white); }
    .sec-o { background:var(--off-white); }
    .sec-d { background:var(--dark-2); }
    .eye { font-size:10px; font-weight:700; letter-spacing:0.16em; text-transform:uppercase; color:var(--green-lt); margin-bottom:12px; }
    h2.sh { font-family:'Cormorant Garamond',serif; font-size:clamp(28px,3vw,44px); font-weight:300; line-height:1.1; margin-bottom:14px; }
    h2.sh em { font-style:italic; }
    .sub { font-size:14px; color:var(--gray-1); line-height:1.75; max-width:560px; margin-bottom:40px; }
    .two { display:grid; grid-template-columns:1fr 1fr; gap:72px; align-items:start; }
    .three { display:grid; grid-template-columns:1fr 1fr 1fr; gap:1px; background:var(--border-l); }
    .four { display:grid; grid-template-columns:repeat(4,1fr); gap:1px; background:var(--border-l); }
    .card { background:var(--white); display:flex; flex-direction:column; border:1px solid var(--border-l); }
    .card-img { width:100%; height:220px; overflow:hidden; position:relative; }
    .card-img img { width:100%; height:100%; object-fit:cover; transition:transform .4s; display:block; }
    .card:hover .card-img img { transform:scale(1.03); }
    .card-img::after { content:'CASE STUDY'; position:absolute; top:14px; right:14px; background:rgba(0,0,0,0.78); color:rgba(255,255,255,0.8); font-size:9px; font-weight:700; letter-spacing:0.12em; padding:5px 10px; }
    .card-body { padding:24px 24px 0; flex:1; }
    .card-name { font-size:16px; font-weight:700; color:var(--black); margin-bottom:8px; }
    .card-text { font-size:13px; color:var(--gray-1); line-height:1.65; }
    .card-text strong { color:var(--black); font-weight:600; }
    .card-btn { margin-top:20px; display:flex; align-items:center; justify-content:space-between; padding:16px 24px; background:var(--black); color:var(--white); font-size:11px; font-weight:700; letter-spacing:0.08em; text-transform:uppercase; border:none; cursor:pointer; width:100%; transition:background .2s; font-family:'DM Sans',sans-serif; text-decoration:none; }
    .card-btn:hover { background:var(--green-lt); }
    .ai { padding:20px 0; border-bottom:1px solid var(--border-l); display:flex; gap:18px; }
    .ai:first-of-type { border-top:1px solid var(--border-l); }
    .ai-ic { width:36px; height:36px; background:rgba(45,92,66,0.08); display:flex; align-items:center; justify-content:center; flex-shrink:0; margin-top:2px; }
    .ai-t { font-size:13px; font-weight:700; color:var(--black); margin-bottom:4px; }
    .ai-b { font-size:12px; color:var(--gray-1); line-height:1.7; }
    .bm { background:var(--off-white); padding:36px; border:1px solid var(--border-l); }
    .bm-title { font-family:'Cormorant Garamond',serif; font-size:26px; font-weight:400; margin-bottom:20px; color:var(--black); }
    .brow { display:flex; justify-content:space-between; align-items:baseline; padding:12px 0; border-bottom:1px solid var(--border-l); }
    .brow:last-of-type { border-bottom:none; }
    .bl { font-size:12px; color:var(--gray-1); }
    .bv { font-family:'Cormorant Garamond',serif; font-size:22px; font-weight:300; color:var(--black); }
    .bm-cta { margin-top:24px; display:block; text-align:center; padding:14px; background:var(--green-lt); color:var(--white); font-size:11px; font-weight:700; letter-spacing:0.10em; text-transform:uppercase; text-decoration:none; transition:background .2s; }
    .bm-cta:hover { background:var(--green); }
    .cs { background:var(--dark); padding:80px 48px; display:grid; grid-template-columns:1fr auto; gap:48px; align-items:center; }
    .cs-t { font-family:'Cormorant Garamond',serif; font-size:clamp(28px,3vw,44px); font-weight:300; color:var(--white); line-height:1.1; }
    .cs-t em { font-style:italic; }
    .cs-s { font-size:14px; color:rgba(255,255,255,0.38); margin-top:12px; max-width:480px; line-height:1.75; }
    .cs-btn { font-size:11px; font-weight:700; letter-spacing:0.10em; text-transform:uppercase; color:var(--black); background:var(--white); padding:15px 32px; text-decoration:none; white-space:nowrap; transition:background .2s; display:inline-block; }
    .cs-btn:hover { background:var(--off-white); }
    .art-grid { display:grid; grid-template-columns:1fr 1fr 1fr; gap:32px; }
    .art { background:var(--white); border:1px solid var(--border-l); overflow:hidden; text-decoration:none; color:inherit; display:flex; flex-direction:column; transition:box-shadow .2s; }
    .art:hover { box-shadow:0 8px 32px rgba(0,0,0,0.08); }
    .art-img { width:100%; height:180px; overflow:hidden; }
    .art-img img { width:100%; height:100%; object-fit:cover; display:block; }
    .art-body { padding:20px; flex:1; }
    .art-tag { font-size:10px; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:var(--green-lt); margin-bottom:8px; }
    .art-title { font-family:'Cormorant Garamond',serif; font-size:20px; font-weight:400; color:var(--black); margin-bottom:8px; line-height:1.25; }
    .art-excerpt { font-size:12px; color:var(--gray-1); line-height:1.65; }
    .art-foot { padding:12px 20px; border-top:1px solid var(--border-l); font-size:11px; color:var(--gray-1); display:flex; justify-content:space-between; }
    .modal-overlay { position:fixed; inset:0; z-index:1000; background:rgba(0,0,0,0.75); backdrop-filter:blur(6px); display:flex; align-items:center; justify-content:center; padding:24px; opacity:0; pointer-events:none; transition:opacity .25s; }
    .modal-overlay.open { opacity:1; pointer-events:auto; }
    .modal { background:var(--white); width:100%; max-width:480px; overflow:hidden; transform:translateY(16px); transition:transform .25s; box-shadow:0 32px 80px rgba(0,0,0,0.4); }
    .modal-overlay.open .modal { transform:translateY(0); }
    .mhdr { background:var(--black); padding:28px 28px 22px; position:relative; }
    .mx { position:absolute; top:16px; right:16px; background:none; border:none; color:rgba(255,255,255,0.4); font-size:24px; cursor:pointer; line-height:1; padding:0; }
    .mx:hover { color:var(--white); }
    .mhdr h2 { font-family:'Cormorant Garamond',serif; font-size:28px; font-weight:300; color:var(--white); margin-bottom:4px; }
    .mhdr p { font-size:13px; color:rgba(255,255,255,0.4); }
    .mprev { display:flex; align-items:center; gap:14px; background:var(--off-white); margin:20px 24px 0; padding:14px; }
    .mthumb { width:48px; height:48px; object-fit:cover; flex-shrink:0; }
    .mprev-name { font-size:14px; font-weight:600; color:var(--black); }
    .mbody { padding:20px 24px 28px; }
    .mform { display:flex; flex-direction:column; gap:12px; }
    .mlabel { font-size:12px; font-weight:600; color:var(--black); margin-bottom:4px; }
    .mreq { color:#e33; }
    .mfield { width:100%; padding:12px 14px; border:1.5px solid rgba(0,0,0,0.12); background:var(--off-white); font-family:'DM Sans',sans-serif; font-size:13px; color:var(--black); outline:none; }
    .mfield:focus { border-color:var(--black); background:var(--white); }
    .msub { width:100%; padding:14px; background:var(--black); color:var(--white); border:none; font-family:'DM Sans',sans-serif; font-size:12px; font-weight:700; letter-spacing:0.08em; text-transform:uppercase; cursor:pointer; transition:background .2s; margin-top:4px; }
    .msub:hover { background:var(--green-lt); }
    .mlegal { font-size:10px; color:var(--gray-1); text-align:center; margin-top:8px; }
    .malr { text-align:center; margin-top:14px; font-size:12px; color:var(--gray-1); }
    .malr a { color:var(--green-lt); text-decoration:none; font-weight:600; }
    .mwelcome { text-align:center; padding:16px 0 4px; }
    .mwtitle { font-size:20px; font-weight:700; color:var(--black); margin-bottom:8px; }
    .mwtitle span { color:var(--green-lt); }
    .mwsub { font-size:13px; color:var(--gray-1); margin-bottom:22px; line-height:1.6; }
    .mvbtn { display:block; width:100%; padding:14px; background:var(--black); color:var(--white); border:none; font-family:'DM Sans',sans-serif; font-size:12px; font-weight:700; letter-spacing:0.08em; text-transform:uppercase; cursor:pointer; text-align:center; text-decoration:none; transition:background .2s; }
    .mvbtn:hover { background:var(--green-lt); }
    @media(max-width:1100px){
      .inner-hero,.sec,.cs{padding-left:24px;padding-right:24px;}
      .stat-row{grid-template-columns:1fr 1fr;}
      .two{grid-template-columns:1fr;gap:40px;}
      .three,.four{grid-template-columns:1fr;}
      .cs{grid-template-columns:1fr;}
      .art-grid{grid-template-columns:1fr 1fr;}
    }
    @media(max-width:600px){.art-grid{grid-template-columns:1fr;}}

    /* ─── FOOTER ─── */
    footer { background: var(--black); }
    .footer-main {
      display: grid; grid-template-columns: 1.8fr 1fr 1fr 1fr;
      gap: 48px; padding: 64px 48px 48px;
      border-bottom: 1px solid rgba(255,255,255,0.06);
    }
    .footer-logo-wrap {
      display: flex; align-items: center; gap: 10px;
      text-decoration: none; margin-bottom: 16px; display: block;
    }
    .footer-brand-name {
      font-family: 'DM Sans', sans-serif;
      font-size: 15px; font-weight: 600; color: var(--white);
      letter-spacing: 0.04em; display: block; margin-bottom: 14px;
      text-decoration: none;
    }
    .footer-tagline {
      font-size: 12px; line-height: 1.75; color: rgba(255,255,255,0.3);
      margin-bottom: 20px; max-width: 260px;
    }
    .footer-address {
      font-size: 12px; line-height: 1.8; color: rgba(255,255,255,0.3);
    }
    .footer-address a { color: rgba(255,255,255,0.45); text-decoration: none; }
    .footer-address a:hover { color: rgba(255,255,255,0.8); }
    .footer-socials {
      display: flex; gap: 12px; margin-top: 20px;
    }
    .footer-social {
      width: 32px; height: 32px; border: 1px solid rgba(255,255,255,0.12);
      display: flex; align-items: center; justify-content: center;
      color: rgba(255,255,255,0.35); text-decoration: none;
      font-size: 12px; font-weight: 700;
      transition: all 0.2s;
    }
    .footer-social:hover { border-color: rgba(255,255,255,0.4); color: rgba(255,255,255,0.7); }

    .footer-col-title {
      font-size: 9px; font-weight: 700; letter-spacing: 0.16em;
      text-transform: uppercase; color: rgba(255,255,255,0.2);
      margin-bottom: 18px;
    }
    .footer-links { list-style: none; display: flex; flex-direction: column; gap: 9px; }
    .footer-links a {
      font-size: 12px; color: rgba(255,255,255,0.4);
      text-decoration: none; transition: color 0.2s;
    }
    .footer-links a:hover { color: rgba(255,255,255,0.8); }

    .footer-bottom {
      padding: 20px 48px;
      display: flex; justify-content: space-between; align-items: center;
      flex-wrap: wrap; gap: 12px;
    }
    .footer-bottom-left {
      display: flex; align-items: center; gap: 16px;
    }
    .footer-copy {
      font-size: 11px; color: rgba(255,255,255,0.2); letter-spacing: 0.04em;
    }
    .footer-bottom-links { display: flex; gap: 20px; }
    .footer-bottom-links a {
      font-size: 11px; color: rgba(255,255,255,0.25); text-decoration: none;
    }
    .footer-bottom-links a:hover { color: rgba(255,255,255,0.6); }
    .footer-portfolio-cta {
      font-size: 11px; font-weight: 700; letter-spacing: 0.10em;
      text-transform: uppercase; color: var(--black); background: var(--white);
      padding: 10px 20px; text-decoration: none; transition: background 0.2s;
    }
    .footer-portfolio-cta:hover { background: var(--off-white); }

    /* ─── STICKY BOTTOM CTA ─── */
    .sticky-cta {
      position: fixed; bottom: 0; left: 0; right: 0; z-index: 150;
      background: var(--green-lt);
      display: flex; align-items: center; justify-content: space-between;
      padding: 14px 48px; gap: 24px;
      transform: translateY(100%);
      transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 0 -4px 24px rgba(0,0,0,0.2);
    }
    .sticky-cta.visible { transform: translateY(0); }
    .sticky-cta-text {
      font-size: 13px; font-weight: 500; color: rgba(255,255,255,0.85);
      display: flex; align-items: center; gap: 16px;
    }
    .sticky-cta-text strong { color: #fff; font-weight: 700; }
    .sticky-cta-actions { display: flex; gap: 10px; align-items: center; }
    .sticky-cta-btn {
      font-size: 11px; font-weight: 700; letter-spacing: 0.10em;
      text-transform: uppercase; color: var(--black); background: var(--white);
      padding: 10px 22px; text-decoration: none; transition: background 0.2s;
      white-space: nowrap;
    }
    .sticky-cta-btn:hover { background: var(--off-white); }
    .sticky-cta-dismiss {
      background: none; border: none; cursor: pointer;
      color: rgba(255,255,255,0.5); font-size: 18px; padding: 4px 8px;
      transition: color 0.2s; line-height: 1;
    }
    .sticky-cta-dismiss:hover { color: rgba(255,255,255,0.9); }

    /* ─── RESPONSIVE ─── */
    @media (max-width: 1100px) {
      .hero-main { grid-template-columns: 1fr; }
      .hero-right { display: none; }
      .insights-grid { grid-template-columns: 1fr; }
      .services-layout { grid-template-columns: 1fr; }
      .services-list { border-right: none; border-bottom: 1px solid var(--border-l); }
      .ba-layout { grid-template-columns: 1fr; gap: 2px; }
      .ba-center { flex-direction: row; padding: 20px 0; border: none; }
      .contact-layout { grid-template-columns: 1fr; }
      .footer-main { grid-template-columns: 1fr 1fr; }
      .logos-grid { grid-template-columns: repeat(3, 1fr); }
      section { padding: 72px 24px; }
      nav, .top-bar, .footer-main, .footer-bottom { padding-left: 24px; padding-right: 24px; }
      .hero-main { padding: 60px 24px 40px; }
      .hero-strip { grid-template-columns: 1fr; }
      .hero-strip-item { padding: 18px 24px; border-right: none; border-bottom: 1px solid rgba(255,255,255,0.07); }
      .cap-grid { grid-template-columns: 1fr; }
      .cap-card:last-child { grid-column: auto; }
      .industries-header { grid-template-columns: 1fr; }
    }

  
    /* ══ HERO with background image ══ */
    .inner-hero {
      position: relative;
      background: var(--black);
      padding: 96px 48px 0;
      border-bottom: 1px solid var(--border-d);
      overflow: hidden;
      min-height: 520px;
    }
    .hero-bg {
      position: absolute; inset: 0;
      background-image: url('https://images.unsplash.com/photo-1486325212027-8081e485255e?w=1600&q=80&auto=format&fit=crop');
      background-size: cover; background-position: center 30%;
      opacity: 0.18;
      transition: opacity 1.2s ease;
    }
    .hero-bg::after {
      content: '';
      position: absolute; inset: 0;
      background: linear-gradient(to right, rgba(0,0,0,0.85) 40%, rgba(0,0,0,0.3) 100%),
                  linear-gradient(to top, var(--black) 0%, transparent 40%);
    }
    .hero-content { position: relative; z-index: 2; }
    .hero-cta-row {
      display: flex; align-items: center; gap: 18px;
      margin-top: 32px; flex-wrap: wrap;
    }
    .hero-btn-primary {
      display: inline-block; padding: 14px 28px;
      background: var(--white); color: var(--black);
      font-size: 11px; font-weight: 700; letter-spacing: .10em;
      text-transform: uppercase; text-decoration: none;
      transition: background .2s;
    }
    .hero-btn-primary:hover { background: var(--off-white); }
    .hero-btn-ghost {
      display: inline-flex; align-items: center; gap: 8px;
      font-size: 12px; font-weight: 600; letter-spacing: .06em;
      color: rgba(255,255,255,0.5); text-decoration: none;
      text-transform: uppercase; transition: color .2s;
    }
    .hero-btn-ghost:hover { color: var(--white); }
    .hero-btn-ghost svg { opacity: .6; }

    /* ══ ADVISORS section (3-col: intro | gain | insights) ══ */
    .advisors-grid {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 1px;
      background: var(--border-l);
    }
    .advisors-col { background: var(--white); padding: 48px 36px; }
    .advisors-col.dark { background: var(--dark); }
    .gain-list { list-style: none; display: flex; flex-direction: column; gap: 0; }
    .gain-item {
      display: flex; align-items: flex-start; gap: 12px;
      padding: 14px 0; border-bottom: 1px solid var(--border-l);
      font-size: 13px; color: var(--black); line-height: 1.55;
    }
    .gain-item:last-child { border-bottom: none; }
    .gain-check {
      color: var(--green-lt); font-size: 13px; flex-shrink: 0; margin-top: 1px;
    }
    .insight-box { display: flex; flex-direction: column; gap: 0; }
    .insight-row {
      padding: 20px 0; border-bottom: 1px solid rgba(255,255,255,0.07);
    }
    .insight-row:last-child { border-bottom: none; }
    .insight-big {
      font-family: 'Cormorant Garamond', serif;
      font-size: 42px; font-weight: 300; color: var(--white);
      line-height: 1; margin-bottom: 5px;
    }
    .insight-text { font-size: 12px; color: rgba(255,255,255,0.42); line-height: 1.65; }
    .insight-quote {
      font-family: 'Cormorant Garamond', serif;
      font-size: 16px; font-style: italic; font-weight: 300;
      color: rgba(255,255,255,0.55); line-height: 1.65;
      padding-top: 20px;
    }

    /* ══ WHY VALIDATE BILLS ══ */
    .validate-grid { display: grid; grid-template-columns: 1fr 380px; gap: 72px; align-items: start; }
    .validate-body p { font-size: 14px; color: var(--gray-1); line-height: 1.85; margin-bottom: 18px; }
    .validate-body p:last-child { margin-bottom: 0; }
    .insights-guide {
      background: var(--dark);
      padding: 40px;
      display: flex; flex-direction: column; gap: 24px;
    }
    .guide-title { font-size: 16px; font-weight: 700; color: var(--white); margin-bottom: 2px; }
    .guide-body { font-size: 13px; color: rgba(255,255,255,0.4); line-height: 1.8; }
    .guide-btn {
      display: inline-flex; align-items: center; justify-content: space-between;
      padding: 14px 20px; background: var(--white); color: var(--black);
      font-size: 11px; font-weight: 700; letter-spacing: .10em;
      text-transform: uppercase; text-decoration: none;
      border-radius: 999px; gap: 12px; transition: background .2s;
    }
    .guide-btn:hover { background: var(--off-white); }
    .guide-btn-arrow {
      width: 28px; height: 28px; border-radius: 50%;
      background: var(--black); display: flex; align-items: center;
      justify-content: center; flex-shrink: 0;
    }

    /* ══ WATER PRICE INCREASES ══ */
    .price-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 72px; align-items: start; }
    .price-check-list { display: flex; flex-direction: column; gap: 0; margin: 24px 0 32px; }
    .price-check-item {
      display: flex; align-items: center; gap: 12px;
      padding: 12px 0; border-bottom: 1px solid var(--border-l);
      font-size: 13px; font-weight: 600; color: var(--black);
    }
    .price-check-item:last-child { border-bottom: none; }
    .price-check-icon { color: var(--green-lt); flex-shrink: 0; }
    .price-img-wrap {
      position: relative; overflow: hidden;
      background: var(--dark);
    }
    .price-img-wrap img {
      width: 100%; display: block;
      filter: grayscale(100%) contrast(1.05);
      transition: transform .5s ease;
    }
    .price-img-wrap:hover img { transform: scale(1.03); }
    .pricing-box {
      background: var(--dark); padding: 32px 36px;
      border-top: 1px solid rgba(255,255,255,0.06);
    }
    .pricing-box-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 22px; font-weight: 300; color: var(--white);
      margin-bottom: 12px;
    }
    .pricing-box-body { font-size: 13px; color: rgba(255,255,255,0.4); line-height: 1.75; margin-bottom: 8px; }
    .pricing-box-highlight {
      font-size: 12px; font-weight: 700; letter-spacing: .06em;
      text-transform: uppercase; color: var(--green-lt);
      margin-top: 12px;
    }

    /* ══ PROOF STRIP ══ */
    .proof-strip { background: var(--black); border-top: 1px solid var(--border-d); border-bottom: 1px solid var(--border-d); }
    .proof-inner { display: grid; grid-template-columns: 1fr 1fr; }
    .proof-left  { padding: 72px 48px; border-right: 1px solid var(--border-d); }
    .proof-right { padding: 72px 48px; }
    .proof-stat-num { font-family: 'Cormorant Garamond', serif; font-size: 72px; font-weight: 300; color: var(--green-lt); line-height: 1; margin-bottom: 4px; }
    .proof-stat-lbl { font-size: 10px; font-weight: 700; letter-spacing: .13em; text-transform: uppercase; color: rgba(255,255,255,0.28); margin-bottom: 40px; }
    .proof-quote { font-family: 'Cormorant Garamond', serif; font-size: 22px; font-weight: 300; font-style: italic; color: var(--white); line-height: 1.6; margin-bottom: 20px; }
    .proof-attr  { font-size: 11px; font-weight: 600; letter-spacing: .09em; text-transform: uppercase; color: rgba(255,255,255,0.3); }

    /* ══ ESG ══ */
    .esg-check-list { display: flex; flex-direction: column; gap: 12px; margin-top: 8px; }
    .esg-check-item { display: flex; align-items: flex-start; gap: 12px; font-size: 13px; color: rgba(255,255,255,0.55); line-height: 1.55; }
    .esg-stat-block { background: rgba(255,255,255,0.04); border: 1px solid var(--border-d); padding: 48px 40px; display: flex; flex-direction: column; align-items: center; text-align: center; }
    .esg-stat-big   { font-family: 'Cormorant Garamond', serif; font-size: 88px; font-weight: 300; color: var(--green-lt); line-height: 1; }
    .esg-stat-lbl   { font-size: 10px; font-weight: 700; letter-spacing: .13em; text-transform: uppercase; color: rgba(255,255,255,0.28); margin: 8px 0 16px; }
    .esg-stat-note  { font-size: 12px; color: rgba(255,255,255,0.28); line-height: 1.7; max-width: 220px; }
    .esg-cta {
      margin-top: 28px; display: inline-block;
      padding: 12px 24px; background: var(--green-lt); color: var(--white);
      font-size: 11px; font-weight: 700; letter-spacing: .10em;
      text-transform: uppercase; text-decoration: none; transition: background .2s;
    }
    .esg-cta:hover { background: #3a7a55; }

    /* ══ RESPONSIVE ══ */
    @media (max-width: 1024px) {
      .advisors-grid { grid-template-columns: 1fr; }
      .validate-grid, .price-grid { grid-template-columns: 1fr; }
      .proof-inner { grid-template-columns: 1fr; }
      .proof-left { border-right: none; border-bottom: 1px solid var(--border-d); }
      .two { grid-template-columns: 1fr; gap: 48px; }
    }
    @media (max-width: 640px) {
      .inner-hero { padding: 64px 20px 0; min-height: auto; }
      section.sec { padding: 52px 20px; }
      .advisors-col { padding: 36px 24px; }
      .validate-grid, .price-grid { gap: 40px; }
      .proof-left, .proof-right { padding: 48px 20px; }
      .pricing-box { padding: 24px 20px; }
      .insights-guide { padding: 28px 24px; }
    }

  </style>
@endpush