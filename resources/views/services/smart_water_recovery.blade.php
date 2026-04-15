@extends('layouts.app')

@section('title', 'Smart Water Treatment & Recovery Services — Water Solutions Technology')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/smart_water_recovery.css') }}">
@endpush

@section('content')

<div class="svc-hero">
  <div class="svc-hero-bg"></div>
  <div class="svc-hero-content">
    <div class="svc-bc">
      <a href="/services">Services</a>
      <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 1l4 4-4 4"/></svg>
      <span>Smart Water Recovery</span>
    </div>
    <div class="svc-eye">Service &mdash; Smart Water Recovery</div>
    <h1 class="svc-h1">Recover the water costs<br><em>already overcharged &mdash;<br>and stop the next ones.</em></h1>
    <p class="svc-deck">Smart Water Recovery combines forensic billing analysis with real-time monitoring to identify and recover historical overcharges while eliminating the conditions that created them. Past credits recouped. Future overcharges prevented.</p>
    <div class="svc-ctas">
      <a href="{{route('contact')}}" class="btn-svc-primary">Request Recovery Assessment</a>
      <a href="#recovery-process" class="btn-svc-ghost">How Recovery Works &darr;</a>
    </div>
  </div>
  <div class="svc-stat-strip">
    <div class="sss-cell"><div class="sss-num g">8&ndash;12%</div><div class="sss-lbl">Average billing overcharge found across audited commercial properties</div></div>
    <div class="sss-cell"><div class="sss-num">3&ndash;5 yrs</div><div class="sss-lbl">Typical retroactive recovery window under most utility statutes</div></div>
    <div class="sss-cell"><div class="sss-num g">1 in 8</div><div class="sss-lbl">Commercial properties with a rate misclassification in WST's audit database</div></div>
    <div class="sss-cell"><div class="sss-num">Zero</div><div class="sss-lbl">Upfront fees — shared-savings model, payment on documented recovery only</div></div>
  </div>
</div>

<!-- WHAT IS SMART WATER RECOVERY -->
<section class="sec sec-o">
  <div style="max-width:760px;margin-bottom:40px;">
    <p class="eye">What Smart Water Recovery Is</p>
    <h2 class="sh">Forensic analysis to find what you've<br><em>overpaid &mdash; and systematic monitoring<br>to ensure it doesn't happen again.</em></h2>
    <p class="sub">Smart Water Recovery is WST's integrated billing forensics and forward-monitoring service. It addresses both directions of cost recovery: the historical overcharges that have accumulated in prior billing cycles, and the ongoing monitoring infrastructure that prevents the same errors from recurring. Most billing analysis services deliver one or the other. WST delivers both in a single coordinated engagement.</p>
  </div>
  <div class="two">
    <div>
      <div style="border-left:2px solid var(--green-lt);padding:16px 20px;background:rgba(45,92,66,.05);margin-bottom:24px;">
        <p style="font-size:13px;font-weight:700;color:var(--green-lt);margin-bottom:5px;">Phase 1: Forensic Recovery</p>
        <p style="font-size:13px;color:var(--black);line-height:1.75;">Systematic review of 12&ndash;60 months of billing records identifying overcharges, misclassifications, and exemptions not claimed. Recovery documentation prepared and filed with the utility on your behalf.</p>
      </div>
      <div class="ai">
        <div class="ai-ic"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="12" height="10" rx="1"/><path d="M5 7h6M5 10h4"/></svg></div>
        <div>
          <div class="ai-t">Rate Misclassification Recovery</div>
          <div class="ai-b">Properties billed at the wrong tariff rate &mdash; commercial vs. industrial, occupancy category mismatches, service tier errors &mdash; are corrected at source. Retroactive credits filed for the full recovery period under the applicable statute of limitations.</div>
        </div>
      </div>
      <div class="ai">
        <div class="ai-ic"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M8 2C5.2 2 3 5 3 8s2.2 6 5 6 5-3 5-6-2.2-6-5-6z"/><path d="M8 5v3l2 2"/></svg></div>
        <div>
          <div class="ai-t">Estimation Override Disputes</div>
          <div class="ai-b">Utility-estimated reads that overstated consumption are identified against meter reading records. Adjusted bill requests filed for every billing period where an estimation was applied and the actual consumption was lower than the estimate.</div>
        </div>
      </div>
      <div class="ai">
        <div class="ai-ic"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 4h10M3 8h7M3 12h5"/></svg></div>
        <div>
          <div class="ai-t">Sewer Exemption &amp; Non-Return Credits</div>
          <div class="ai-b">Water used in cooling towers, pools, irrigation, and laundry that never enters the sewer system is identified and exemption applications filed. Retroactive credits claimed for all eligible periods where exemptions were not in effect.</div>
        </div>
      </div>
      <div class="ai" style="border-bottom:none;">
        <div class="ai-ic"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="8" cy="8" r="5.5"/><path d="M8 5.5v3l2 1.5"/></svg></div>
        <div>
          <div class="ai-t">Meter Accuracy Disputes</div>
          <div class="ai-b">Meters that have been running fast due to calibration drift or incorrect multiplier settings generate systematic overcharges. WST documents the error, prepares the utility dispute, and oversees correction &mdash; with retroactive adjustment for the full period of inaccuracy.</div>
        </div>
      </div>
    </div>
    <div>
      <div style="border-left:2px solid #3b6fd4;padding:16px 20px;background:rgba(59,111,212,.05);margin-bottom:24px;">
        <p style="font-size:13px;font-weight:700;color:#3b6fd4;margin-bottom:5px;">Phase 2: Forward Monitoring</p>
        <p style="font-size:13px;color:var(--black);line-height:1.75;">IoT sensors and automated billing validation applied after recovery to prevent the same categories of error from recurring. Real-time alerts when billing anomalies reappear.</p>
      </div>
      <div class="ai">
        <div class="ai-ic" style="background:rgba(59,111,212,.08);color:#3b6fd4;"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 14l4-4 4 4 4-8"/></svg></div>
        <div>
          <div class="ai-t">Automated Bill Validation</div>
          <div class="ai-b">Every subsequent bill is automatically validated against the corrected rate classification and verified meter readings. Rate classification changes, new estimation overrides, and tier calculation errors are flagged immediately rather than accumulated over billing cycles.</div>
        </div>
      </div>
      <div class="ai">
        <div class="ai-ic" style="background:rgba(59,111,212,.08);color:#3b6fd4;"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="8" cy="8" r="5.5"/><path d="M8 5.5v3l2 1.5"/></svg></div>
        <div>
          <div class="ai-t">Consumption Anomaly Detection</div>
          <div class="ai-b">Real-time IoT monitoring flags consumption anomalies that indicate billing risk before they manifest in the monthly bill &mdash; giving the engineering team 48&ndash;72 hours to investigate rather than 30&ndash;45 days to react.</div>
        </div>
      </div>
      <div class="ai">
        <div class="ai-ic" style="background:rgba(59,111,212,.08);color:#3b6fd4;"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 4h10M3 8h7M3 12h5"/></svg></div>
        <div>
          <div class="ai-t">Sewer Exemption Maintenance</div>
          <div class="ai-b">Sub-metered non-return volumes continuously documented to support annual exemption renewal filings. Any change in water use patterns that creates a new exemption opportunity is identified and actioned automatically.</div>
        </div>
      </div>
      <div class="ai" style="border-bottom:none;">
        <div class="ai-ic" style="background:rgba(59,111,212,.08);color:#3b6fd4;"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 8h10M8 3v10"/></svg></div>
        <div>
          <div class="ai-t">GRESB Documentation</div>
          <div class="ai-b">All verified consumption data, billing corrections, and exemption documentation structured for GRESB WT1 submission. Monitoring records formatted for MR3 evidence. Cost-tagged anomaly alerts formatted for RA4 risk quantification.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- RECOVERY PROCESS -->
<section class="sec sec-w" id="recovery-process">
  <div class="two">
    <div>
      <p class="eye">The Recovery Process</p>
      <h2 class="sh">From billing records<br><em>to credited account.</em></h2>
      <p class="sub">WST manages the recovery process end-to-end &mdash; from initial record review to utility dispute resolution. Most clients receive their first credit within 60&ndash;90 days of engagement commencement.</p>
      <div class="process-steps">
        <div class="process-step">
          <div class="ps-num"><div class="ps-num-inner">01</div></div>
          <div class="ps-body">
            <div class="ps-title">Record Collection &amp; Forensic Review</div>
            <div class="ps-text">12&ndash;60 months of utility bills reviewed. Rate classifications cross-referenced against municipal tariff schedules. Estimation overrides identified against meter reading records. Sewer charge calculations compared to consumption by use type.</div>
          </div>
        </div>
        <div class="process-step">
          <div class="ps-num"><div class="ps-num-inner">02</div></div>
          <div class="ps-body">
            <div class="ps-title">Findings Report &amp; Recovery Quantification</div>
            <div class="ps-text">All identified overcharges documented with supporting evidence. Recovery value quantified by category, billing period, and total. Report delivered to the client before any utility filings are made &mdash; enabling client review and approval of the recovery approach.</div>
          </div>
        </div>
        <div class="process-step">
          <div class="ps-num"><div class="ps-num-inner">03</div></div>
          <div class="ps-body">
            <div class="ps-title">Utility Dispute &amp; Exemption Filing</div>
            <div class="ps-text">WST prepares and files all dispute documentation, reclassification requests, and exemption applications on behalf of the client. Utility interactions managed by WST throughout &mdash; the client does not need to engage directly with the utility billing department.</div>
          </div>
        </div>
        <div class="process-step">
          <div class="ps-num"><div class="ps-num-inner">04</div></div>
          <div class="ps-body">
            <div class="ps-title">Credit Confirmation &amp; Forward Monitoring Activation</div>
            <div class="ps-text">All credits confirmed and documented. Forward monitoring deployed on accounts where billing errors are most likely to recur. Ongoing bill validation activated to ensure rate classifications and exemption credits remain in effect.</div>
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="bm" style="margin-bottom:2px;">
        <div class="bm-title">Smart Water Recovery &mdash; Typical Outcomes</div>
        <div class="brow"><span class="bl">Billing error recovery (retroactive)</span><span class="bv">2&ndash;5 years of credits</span></div>
        <div class="brow"><span class="bl">Average overcharge found</span><span class="bv">8&ndash;12% of annual bill</span></div>
        <div class="brow"><span class="bl">Time to first credit</span><span class="bv">60&ndash;90 days</span></div>
        <div class="brow"><span class="bl">Rate misclassification frequency</span><span class="bv">1 in 8 properties</span></div>
        <div class="brow"><span class="bl">Sewer exemption frequency (hospitality)</span><span class="bv">1 in 3 properties</span></div>
        <div class="brow"><span class="bl">Upfront investment</span><span class="bv">Zero &mdash; shared savings</span></div>
        <a href="{{route('contact')}}" class="bm-cta">Start Recovery Assessment</a>
      </div>
      <div style="background:var(--off-white);border:1px solid var(--border-l);padding:24px;">
        <p style="font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--gray-1);margin-bottom:12px;">The Most Common Recovery Categories</p>
        <div style="display:flex;flex-direction:column;gap:0;">
          <div style="display:flex;justify-content:space-between;padding:10px 0;border-bottom:1px solid var(--border-l);font-size:12px;">
            <span style="color:var(--black);font-weight:600;">Sewer surcharge on non-return water</span><span style="color:var(--green-lt);font-weight:700;">35% of hotel audits</span>
          </div>
          <div style="display:flex;justify-content:space-between;padding:10px 0;border-bottom:1px solid var(--border-l);font-size:12px;">
            <span style="color:var(--black);font-weight:600;">Rate misclassification</span><span style="color:var(--green-lt);font-weight:700;">12% of all audits</span>
          </div>
          <div style="display:flex;justify-content:space-between;padding:10px 0;border-bottom:1px solid var(--border-l);font-size:12px;">
            <span style="color:var(--black);font-weight:600;">Meter accuracy error</span><span style="color:var(--green-lt);font-weight:700;">15% of properties &gt;10 yrs old</span>
          </div>
          <div style="display:flex;justify-content:space-between;padding:10px 0;font-size:12px;">
            <span style="color:var(--black);font-weight:600;">Estimation override (billed high)</span><span style="color:var(--green-lt);font-weight:700;">Common in rural/suburban assets</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="proof-strip">
  <div class="proof-inner">
    <div class="proof-left">
      <div class="proof-num">$2.3M</div>
      <div class="proof-lbl">Verified savings documented — billing recovery and operational improvements across 31 assets</div>
      <div class="proof-num">500+</div>
      <div class="proof-lbl">Commercial properties where WST has completed billing forensic review</div>
    </div>
    <div class="proof-right">
      <div class="quote-bl quote-bl--dark">
        <p>"The sewer exemption alone was $38,000 a year. We'd been overpaying for three years. WST found it in the first week of the remote audit."</p>
        <cite>Property Manager &middot; Full-Service Hotel &middot; Southeast US</cite>
      </div>
      <p style="font-size:12px;color:rgba(255,255,255,.3);line-height:1.75;margin-top:16px;">WST's shared-savings model means the client bears no financial risk on the recovery engagement. If no material overcharges are found, no fee is payable. If significant overcharges are recovered, WST receives a share of the documented credit value.</p>
    </div>
  </div>
</div>

<div class="cs">
  <div>
    <div class="cs-t">Start with the bills<br><em>already in your files.</em></div>
    <p class="cs-s">WST's recovery assessment begins with the utility records you already have. Send us 12 months of bills and we'll tell you within 48 hours whether material overcharges are present &mdash; before any engagement is formalised.</p>
  </div>
  <a href="{{route('contact')}}" class="cs-btn">Start Recovery Assessment</a>
</div>>

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