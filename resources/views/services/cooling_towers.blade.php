@extends('layouts.app')

@section('title', 'Cooling Tower Intelligence — Water Solutions Technology')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/cooling_tower.css') }}">
@endpush

@section('content')

<div class="svc-hero">
  <div class="svc-hero-bg"></div>
  <div class="svc-hero-content">
    <div class="svc-bc">
      <a href="/services">Services</a>
      <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 1l4 4-4 4"/></svg>
      <span>Cooling Tower Optimization</span>
    </div>
    <div class="svc-eye">Service &mdash; Cooling Tower Optimization</div>
    <h1 class="svc-h1">Cooling Tower Water Waste:<br><em>The $200K Hidden Cost<br>No One Monitors.</em></h1>
    <p class="svc-deck">Cooling towers in full-service hotels and office buildings account for 25&ndash;40% of total water consumption. Most are operating at bleed rates set at conservative manufacturer defaults &mdash; wasting 15&ndash;30% of make-up water above the optimum for local water chemistry. WST audits, recalibrates, and monitors.</p>
    <div class="svc-ctas">
      <a href="{{route('contact')}}" class="btn-svc-primary">Schedule Cooling Tower Assessment</a>
      <a href="#how-it-works" class="btn-svc-ghost">How It Works &darr;</a>
    </div>
  </div>
  <div class="svc-stat-strip">
    <div class="sss-cell"><div class="sss-num g">25&ndash;40%</div><div class="sss-lbl">Of total building water consumption — cooling towers in full-service hotel/office</div></div>
    <div class="sss-cell"><div class="sss-num">15&ndash;30%</div><div class="sss-lbl">Average make-up water waste from default bleed rate settings</div></div>
    <div class="sss-cell"><div class="sss-num g">$15&ndash;40K</div><div class="sss-lbl">Annual savings per asset from bleed rate recalibration alone</div></div>
    <div class="sss-cell"><div class="sss-num">Zero</div><div class="sss-lbl">Capital investment required — bleed rate adjustment is operational, not capital</div></div>
  </div>
</div>

<!-- WHY COOLING TOWERS OVERSPEND -->
<section class="sec sec-o">
  <div style="max-width:760px;margin-bottom:40px;">
    <p class="eye">The Problem</p>
    <h2 class="sh">Cooling towers are factory-set to waste water.<br><em>Almost no one changes the defaults.</em></h2>
    <p class="sub">Cooling tower bleed rates are set by manufacturers to protect equipment under worst-case water chemistry conditions. For most US commercial properties, local water quality is far better than the worst case &mdash; meaning the default bleed rate is wasting water that doesn't need to be expelled. The optimum bleed rate depends on local water chemistry, tower design, and cooling load. Without a water chemistry analysis and site-specific calculation, the default is always over-conservative.</p>
  </div>
  <div class="three" style="background:var(--border-l);">
    <div style="background:var(--white);padding:32px;">
      <div style="font-family:'Cormorant Garamond',serif;font-size:44px;font-weight:300;color:rgba(0,0,0,.06);line-height:1;margin-bottom:12px;">01</div>
      <div style="font-size:14px;font-weight:700;color:var(--black);margin-bottom:9px;">Bleed rate set to manufacturer default</div>
      <p style="font-size:12px;color:var(--gray-1);line-height:1.75;">Manufacturer default bleed rates are calibrated for water chemistry with high dissolved solids &mdash; the worst-case scenario for scale and corrosion. Most US municipal water supplies are significantly better than this threshold. Operating at the default bleed rate in a low-TDS water supply area wastes water protecting against a risk that doesn't exist at the local level.</p>
    </div>
    <div style="background:var(--white);padding:32px;">
      <div style="font-family:'Cormorant Garamond',serif;font-size:44px;font-weight:300;color:rgba(0,0,0,.06);line-height:1;margin-bottom:12px;">02</div>
      <div style="font-size:14px;font-weight:700;color:var(--black);margin-bottom:9px;">Sewer charges on water that never enters sewer</div>
      <p style="font-size:12px;color:var(--gray-1);line-height:1.75;">Cooling tower make-up water evaporates &mdash; it never enters the municipal sewer. Most utilities charge sewer fees on total water consumption unless the property files a sub-meter or non-return exemption. Hotels and office buildings paying sewer fees on cooling tower make-up water are paying for a service they're not receiving, often for years before the error is identified.</p>
    </div>
    <div style="background:var(--white);padding:32px;">
      <div style="font-family:'Cormorant Garamond',serif;font-size:44px;font-weight:300;color:rgba(0,0,0,.06);line-height:1;margin-bottom:12px;">03</div>
      <div style="font-size:14px;font-weight:700;color:var(--black);margin-bottom:9px;">Make-up water volume not sub-metered</div>
      <p style="font-size:12px;color:var(--gray-1);line-height:1.75;">Without a dedicated sub-meter on the cooling tower make-up line, total consumption cannot be split between tower use and other building systems. This prevents sewer exemption filing, makes it impossible to identify anomalous tower consumption, and leaves the property without the data required for GRESB MR3 target documentation on the most significant water-consuming system in the building.</p>
    </div>
  </div>
</section>

<!-- HOW WST APPROACHES IT -->
<section class="sec sec-w" id="how-it-works">
  <div class="two">
    <div>
      <p class="eye">WST Methodology</p>
      <h2 class="sh">Four steps from baseline<br><em>to optimised tower.</em></h2>
      <p class="sub">WST's cooling tower optimisation programme is not a one-time adjustment. It establishes the data infrastructure, calculates the optimal operating parameters, implements the changes, and monitors performance on an ongoing basis.</p>
      <div class="process-steps">
        <div class="process-step">
          <div class="ps-num"><div class="ps-num-inner">01</div></div>
          <div class="ps-body">
            <div class="ps-title">Water Chemistry Analysis</div>
            <div class="ps-text">Local municipal water quality report reviewed against tower specifications. Cycles of concentration calculated for the specific water chemistry. Optimum bleed rate determined for the tower's cooling load and local TDS levels &mdash; replacing the manufacturer default with a site-specific target.</div>
          </div>
        </div>
        <div class="process-step">
          <div class="ps-num"><div class="ps-num-inner">02</div></div>
          <div class="ps-body">
            <div class="ps-title">Make-Up Volume Measurement &amp; Sewer Exemption Filing</div>
            <div class="ps-text">Sub-metering installed on make-up water supply if not already present. Historical make-up volumes estimated from current consumption data. Sewer exemption application prepared and filed with the municipal utility for all eligible non-returned water volume &mdash; tower evaporation, drift, and blowdown.</div>
          </div>
        </div>
        <div class="process-step">
          <div class="ps-num"><div class="ps-num-inner">03</div></div>
          <div class="ps-body">
            <div class="ps-title">Bleed Rate Recalibration &amp; Controller Adjustment</div>
            <div class="ps-text">Tower controller programmed to the site-specific optimal bleed rate. Conductivity set-point adjusted to maintain cycles of concentration at the calculated optimum. Drift eliminator condition assessed. Any mechanical issues affecting bleed rate control identified and documented for maintenance scheduling.</div>
          </div>
        </div>
        <div class="process-step">
          <div class="ps-num"><div class="ps-num-inner">04</div></div>
          <div class="ps-body">
            <div class="ps-title">IoT Monitoring &amp; Continuous Verification</div>
            <div class="ps-text">Smart sensor on make-up line tracks consumption against the new optimised baseline. Anomalies &mdash; consumption above the expected range for the current cooling load &mdash; trigger cost-quantified alerts before they become billing events. Monthly performance reports confirm savings against pre-optimisation baseline for investment committee and GRESB documentation.</div>
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="bm" style="margin-bottom:2px;">
        <div class="bm-title">Cooling Tower Optimisation &mdash; Typical Outcomes</div>
        <div class="brow"><span class="bl">Make-up water reduction</span><span class="bv">15&ndash;30%</span></div>
        <div class="brow"><span class="bl">Annual cost saving (per tower)</span><span class="bv">$15&ndash;40K</span></div>
        <div class="brow"><span class="bl">Sewer exemption recovery (where applicable)</span><span class="bv">$18&ndash;45K/yr</span></div>
        <div class="brow"><span class="bl">Retroactive sewer credit recovery</span><span class="bv">Up to 5 years</span></div>
        <div class="brow"><span class="bl">Implementation timeline</span><span class="bv">1&ndash;3 days on-site</span></div>
        <div class="brow"><span class="bl">Capital investment required</span><span class="bv">Zero (operational adjustment)</span></div>
        <div class="brow"><span class="bl">Payback period</span><span class="bv">First billing cycle</span></div>
        <a href="{{route('contact')}}" class="bm-cta">Request Cooling Tower Assessment</a>
      </div>
      <div class="sys-diagram">
        <div class="sd-title">What WST Monitors Post-Optimisation</div>
        <div class="sd-row">
          <div class="sd-dot"></div>
          <div><div class="sd-label">Make-up water flow rate</div><div class="sd-desc">Continuous flow measurement vs. cooling load ratio — any deviation from expected range triggers an alert</div></div>
        </div>
        <div class="sd-row">
          <div class="sd-dot"></div>
          <div><div class="sd-label">Bleed / blowdown volume</div><div class="sd-desc">Actual bleed rate vs. calculated optimum — drift indicates controller fault or water chemistry change</div></div>
        </div>
        <div class="sd-row">
          <div class="sd-dot"></div>
          <div><div class="sd-label">Overnight consumption</div><div class="sd-desc">Tower make-up at 3am should be zero or minimal — any sustained overnight flow indicates a fault or valve leak</div></div>
        </div>
        <div class="sd-row">
          <div class="sd-dot" style="background:#b8860b;"></div>
          <div><div class="sd-label">Sewer exemption compliance</div><div class="sd-desc">Sub-metered make-up volumes confirmed for utility exemption filing — ensures exemption credits continue uninterrupted</div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- WHO BENEFITS -->
<section class="sec sec-dk">
  <div style="margin-bottom:36px;">
    <p class="eye" style="color:rgba(255,255,255,.3);">Applications</p>
    <h2 class="sh sh--white">Property types where cooling tower<br><em>optimisation delivers the highest returns.</em></h2>
  </div>
  <div class="dark-feat-grid">
    <div class="dfc">
      <div class="dfc-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M3 16V9l7-7 7 7v7M8 16v-5h4v5"/></svg></div>
      <div class="dfc-title">Full-Service Hotels &amp; Hotel REITs</div>
      <div class="dfc-body">Centralised chilled water plant serving guest rooms, restaurants, event space, and back-of-house. Cooling towers typically running year-round in Florida and Southeast US climates. Sewer exemption on pool make-up frequently applicable alongside tower optimisation.</div>
    </div>
    <div class="dfc">
      <div class="dfc-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="2" y="4" width="16" height="14" rx="1.5"/><path d="M6 4V2M14 4V2M2 9h16"/></svg></div>
      <div class="dfc-title">Class A Office Buildings</div>
      <div class="dfc-body">Cooling towers serving centralised HVAC systems in multi-tenant office buildings. Multiple towers on large footprint properties create compounding savings opportunity. Tenant sub-metering often provides the monitoring infrastructure for GRESB MR3 credit.</div>
    </div>
    <div class="dfc">
      <div class="dfc-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M2 18V8l8-6 8 6v10"/><path d="M7 18v-6h6v6"/></svg></div>
      <div class="dfc-title">Mixed-Use &amp; Institutional Portfolios</div>
      <div class="dfc-body">Multi-asset portfolios with varying building ages and cooling system vintages. Oldest equipment typically carries the highest deviation from optimal bleed rates. Portfolio-level optimisation delivers compounding aggregate savings across all assets.</div>
    </div>
    <div class="dfc">
      <div class="dfc-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="3" y="3" width="14" height="14" rx="1"/><path d="M3 8h14M8 3v14"/></svg></div>
      <div class="dfc-title">Manufacturing &amp; Industrial Facilities</div>
      <div class="dfc-body">Process cooling towers with high and continuous loads. Water quality variation and seasonal make-up demand require more dynamic bleed rate management. WST's chemical treatment coordination ensures optimised bleed rates remain compatible with corrosion and scale control targets.</div>
    </div>
    <div class="dfc">
      <div class="dfc-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M10 2C6.7 2 4 5.1 4 9s6 11 6 11 6-7.1 6-11c0-3.9-2.7-7-6-7z"/><circle cx="10" cy="9" r="2"/></svg></div>
      <div class="dfc-title">Healthcare &amp; Medical Campuses</div>
      <div class="dfc-body">Year-round cooling demand with regulatory compliance requirements. WST's documentation framework is structured to satisfy both operational efficiency targets and the risk quantification required for healthcare facility water management compliance programmes.</div>
    </div>
    <div class="dfc">
      <div class="dfc-icon"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M2 14l4-4 4 4 4-8 4 4"/></svg></div>
      <div class="dfc-title">Portfolios Preparing for GRESB Submission</div>
      <div class="dfc-body">Cooling tower optimisation generates the verified baseline consumption data, monitored targets, and financial risk quantification required for WT1 coverage, MR3 evidence, and RA4 documentation &mdash; three indicators addressed by one programme.</div>
    </div>
  </div>
</section>

<!-- GRESB / ESG CONNECTION -->
<section class="sec sec-o">
  <div class="two">
    <div>
      <p class="eye">GRESB Connection</p>
      <h2 class="sh">Cooling tower optimisation addresses<br><em>three GRESB water indicators.</em></h2>
      <p class="sub">A cooling tower that has been sub-metered, optimised, and placed on continuous monitoring simultaneously satisfies the evidence requirements for WT1, MR3, and RA4 &mdash; the three water indicators that collectively account for ~7.67 points in the GRESB scoring model.</p>
      <div class="check-list" style="margin-top:8px;">
        <div class="check-item"><span class="check-icon">✓</span><span><strong>WT1 Data Coverage:</strong> Sub-metered make-up volume provides verified consumption data for the property's most significant water system &mdash; critical for WT1 coverage calculation.</span></div>
        <div class="check-item"><span class="check-icon">✓</span><span><strong>MR3 Monitoring &amp; Targets:</strong> IoT monitoring generates the continuous consumption record required for MR3. Optimised bleed rate becomes the documented target against which monitoring performance is measured.</span></div>
        <div class="check-item"><span class="check-icon">✓</span><span><strong>RA4 Risk Assessment:</strong> Cost-quantified anomaly alerts (excess make-up flow, overnight consumption) constitute the financially-expressed water risk evidence RA4 requires at the asset level.</span></div>
        <div class="check-item"><span class="check-icon">✓</span><span><strong>Sewer Exemption Documentation:</strong> Sub-metered make-up volumes provide the evidence basis for ongoing sewer exemption filing &mdash; eliminating recurring overcharges while creating GRESB-usable consumption records.</span></div>
      </div>
    </div>
    <div>
      <div class="stat-panel">
        <div class="stat-panel-grid">
          <div class="sp-cell"><div class="sp-num g">28%</div><div class="sp-lbl">Cooling tower make-up reduction — Miami full-service hotel, 2024</div></div>
          <div class="sp-cell"><div class="sp-num">$38K</div><div class="sp-lbl">Annual sewer exemption credit recovered — same property</div></div>
          <div class="sp-cell"><div class="sp-num g">Day 1</div><div class="sp-lbl">Savings begin — bleed rate adjustment implemented during site visit</div></div>
          <div class="sp-cell"><div class="sp-num">3 days</div><div class="sp-lbl">Typical on-site time for assessment and full optimisation</div></div>
        </div>
        <div class="quote-bl quote-bl--dark" style="margin-top:0;">
          <p>"The cooling tower adjustment took half a day. The sewer exemption filing took a week. The combined saving was $38,000 a year &mdash; and we'd been leaving it on the table for three years."</p>
          <cite>Engineering Director &middot; Full-Service Hotel &middot; Miami, FL</cite>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="sec sec-w">
  <div style="max-width:720px;">
    <p class="eye">Common Questions</p>
    <h2 class="sh" style="margin-bottom:28px;">Cooling tower optimisation &mdash;<br><em>what to expect.</em></h2>
    <div class="svc-faq">
      <div class="svc-faq-item">
        <div class="svc-faq-q">Does cooling tower optimisation require shutting the system down?</div>
        <div class="svc-faq-a">No. Bleed rate recalibration is performed on operating equipment &mdash; the controller adjustment requires the tower to be running, not shut down. WST completes the optimisation process during normal operations, typically within a single site visit. Sub-meter installation on make-up lines may require a brief valve isolation, which is coordinated with the engineering team to minimise any operational impact.</div>
      </div>
      <div class="svc-faq-item">
        <div class="svc-faq-q">What is a sewer exemption and does my property qualify?</div>
        <div class="svc-faq-a">A sewer exemption (also called a non-return water credit or sewer discharge adjustment) is a billing adjustment available in most US municipalities for water that doesn't enter the sewer system. Cooling tower evaporation, pool make-up water, and irrigation water all qualify. To claim the exemption, properties must typically install a sub-meter on the non-return supply and file an application with the utility. WST handles the sub-meter specification, the application preparation, and the filing. Historical exemptions can typically be recovered for 2&ndash;5 years depending on the utility and jurisdiction.</div>
      </div>
      <div class="svc-faq-item">
        <div class="svc-faq-q">How does WST calculate the optimum bleed rate?</div>
        <div class="svc-faq-a">The optimum bleed rate (expressed as cycles of concentration) is determined by the Langelier Saturation Index for the local water supply &mdash; a calculation that balances scale prevention against water waste. WST obtains the current municipal water quality report, cross-references against the tower's design specifications and current cooling load, and calculates the highest safe cycles of concentration for the local water chemistry. This is typically 1.5&ndash;2x higher than the manufacturer default, translating directly to a 30&ndash;50% reduction in bleed volume for the same cooling output.</div>
      </div>
      <div class="svc-faq-item">
        <div class="svc-faq-q">Will optimising the bleed rate affect water treatment chemical costs?</div>
        <div class="svc-faq-a">Higher cycles of concentration require more active chemical treatment to maintain corrosion and scale control. WST's optimisation programme includes a review of the current chemical treatment programme and, where necessary, a recommendation for treatment adjustment to match the new operating parameters. In most cases, the reduction in water and sewer costs significantly exceeds any increase in chemical treatment costs &mdash; the net saving remains strongly positive. WST documents the full programme economics including chemical treatment in the client findings report.</div>
      </div>
    </div>
  </div>
</section>

<!-- RELATED SERVICES -->
<section class="sec sec-o" style="padding-top:48px;padding-bottom:48px;">
  <p class="eye">Related Services</p>
  <h2 class="sh" style="margin-bottom:24px;">Services that complement<br><em>cooling tower optimisation.</em></h2>
  <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:2px;background:var(--border-l);">
    <a href="/services/smart-water-monitoring" style="background:var(--white);padding:24px 26px;text-decoration:none;display:flex;flex-direction:column;gap:6px;transition:background .18s;" onmouseover="this.style.background='var(--off-white)'" onmouseout="this.style.background='var(--white)'">
      <div style="font-size:10px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--green-lt);">Smart Water Monitoring</div>
      <div style="font-size:13px;font-weight:600;color:var(--black);">IoT monitoring on make-up lines post-optimisation</div>
      <div style="font-size:11px;color:var(--gray-1);">Verify savings and catch anomalies in real time &rarr;</div>
    </a>
    <a href="/services/efficiency-audits" style="background:var(--white);padding:24px 26px;text-decoration:none;display:flex;flex-direction:column;gap:6px;transition:background .18s;" onmouseover="this.style.background='var(--off-white)'" onmouseout="this.style.background='var(--white)'">
      <div style="font-size:10px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--green-lt);">Water Efficiency Audits</div>
      <div style="font-size:13px;font-weight:600;color:var(--black);">Full building water audit including all systems</div>
      <div style="font-size:11px;color:var(--gray-1);">Cooling tower plus billing validation and fixtures &rarr;</div>
    </a>
    <a href="/services/gresb-compliance-strategy" style="background:var(--white);padding:24px 26px;text-decoration:none;display:flex;flex-direction:column;gap:6px;transition:background .18s;" onmouseover="this.style.background='var(--off-white)'" onmouseout="this.style.background='var(--white)'">
      <div style="font-size:10px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--green-lt);">ESG &amp; GRESB Strategy</div>
      <div style="font-size:13px;font-weight:600;color:var(--black);">Translate tower data into GRESB submission evidence</div>
      <div style="font-size:11px;color:var(--gray-1);">WT1, MR3, and RA4 documentation &rarr;</div>
    </a>
  </div>
</section>

<div class="cs">
  <div>
    <div class="cs-t">How much is your cooling tower<br><em>wasting right now?</em></div>
    <p class="cs-s">A WST cooling tower assessment identifies the specific make-up water waste at your property, calculates the optimum bleed rate, and documents the annual saving &mdash; typically delivered within 48 hours of on-site visit.</p>
  </div>
  <a href="/contact" class="cs-btn">Schedule Assessment</a>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Intro rule scroll animation
  document.addEventListener('DOMContentLoaded', () => {
    const rule = document.getElementById('ctIntroRule');
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

  // CoC Chart
  document.addEventListener('DOMContentLoaded', () => {
    new Chart(
      document.getElementById('instantCocChart').getContext('2d'),
      {
        type: 'line',
        data: {
          labels: ['M1','M2','M3','M4','M5','M6'],
          datasets: [
            {
              label: 'CoC Before',
              data: [2.5,2.6,2.6,2.7,2.8,2.9],
              borderColor: '#FBBF24',
              backgroundColor: 'transparent',
              pointRadius: 3,
              borderWidth: 2,
              tension: 0.3
            },
            {
              label: 'CoC After',
              data: [2.8,3.0,3.1,3.2,3.4,3.5],
              borderColor: '#10B981',
              backgroundColor: 'transparent',
              pointRadius: 3,
              borderWidth: 2,
              tension: 0.3
            },
            {
              label: 'Water Saved Before',
              data: [20000,25000,30000,35000,38000,40000],
              borderColor: '#3B82F6',
              backgroundColor: 'transparent',
              pointStyle: 'rect',
              pointRadius: 3,
              borderWidth: 2,
              tension: 0.3,
              yAxisID: 'y1'
            },
            {
              label: 'Water Saved After',
              data: [40000,50000,60000,80000,120000,160000],
              borderColor: '#60A5FA',
              backgroundColor: 'transparent',
              pointStyle: 'rectRot',
              pointRadius: 3,
              borderWidth: 2,
              tension: 0.3,
              yAxisID: 'y1'
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              labels: { color: '#ddd' },
              position: 'bottom'
            }
          },
          scales: {
            x: {
              grid: { display: false },
              ticks: { color: '#ccc' }
            },
            y: {
              position: 'left',
              grid: { color: 'rgba(255,255,255,0.1)' },
              ticks: { color: '#FBBF24' },
              title: { display: true, text: 'CoC Ratio', color: '#FBBF24' }
            },
            y1: {
              position: 'right',
              grid: { display: false },
              ticks: { color: '#60A5FA', callback: v => (v/1000)+'k' },
              title: { display: true, text: 'Gallons Saved', color: '#60A5FA' }
            }
          }
        }
      }
    );
  });

  // Savings Profile Chart
  document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('savingsProfileChart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [
          'Chemicals or Minerals',
          'Annual Cleaning/Service',
          'Maintenance/Labour',
          'Water Discharge Cost',
          'Water',
          'Total OpEx',
          'Energy (Chiller & Pumps)'
        ],
        datasets: [{
          label: 'Savings (%)',
          data: [91, 88, 83, 23, 20, 15, 9],
          backgroundColor: '#1F2937',
          barThickness: 20
        }]
      },
      options: {
        indexAxis: 'y',
        maintainAspectRatio: false,
        plugins: {
          title: {
            display: true,
            text: 'Percentage Savings From Featured Client – Example',
            color: '#6B7280',
            font: { size: 14, weight: 'normal' }
          },
          legend: { display: false }
        },
        scales: {
          x: {
            max: 100,
            ticks: {
              callback: v => v + '%',
              color: '#374151',
              font: { size: 12 }
            },
            grid: { color: 'rgba(55,65,81,0.1)' }
          },
          y: {
            ticks: {
              color: '#374151',
              font: { size: 13 }
            },
            grid: { display: false }
          }
        }
      }
    });
  });
</script>
@endpush