@extends('layouts.app')
@section('title', 'Smart Water Monitoring — Water Solutions Technology')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/portfolio_intelligence.css') }}">
@endpush

@section('content')
      <main>
    <section class="hero">
      <div class="container hero-grid">
        <div>
          <div class="eyebrow">Institutional CRE Intelligence</div>
          <h1 class="h1">Portfolio-Level Water Intelligence for Institutional Real Estate</h1>
          <p class="lede">Centralize water, sewer, billing, and performance intelligence across your assets—so your team can reduce cost, surface risk, and prioritize action with confidence.</p>
          <div class="actions">
            <a href="#final-cta" class="btn btn-primary" style="border-radius: 0 !important;">Request a Portfolio Review</a>
            <a href="#brief" class="btn btn-secondary" style="border-radius: 0 !important;">View a 20-Second Brief</a>
          </div>
        </div>

        <aside class="hero-panel" aria-label="Portfolio summary">
          <div class="hero-panel-grid">
            <div class="hero-card">
              <div class="metric-value">1 View</div>
              <div class="metric-label">Across bills, anomalies, benchmarking, and asset performance</div>
            </div>
            <div class="hero-card">
              <div class="metric-value">1 Layer</div>
              <div class="metric-label">For portfolio managers, asset managers, engineering, and ESG teams</div>
            </div>
            <div class="hero-card">
              <div class="metric-value">4 Uses</div>
              <div class="metric-label">Visibility, control, prioritization, and reporting readiness</div>
            </div>
            <div class="hero-card">
              <div class="metric-value">0 Guesswork</div>
              <div class="metric-label">When cost spikes, billing errors, and underperformance surface early</div>
            </div>
          </div>
          <div class="hero-proof">
            <div class="label">Why this matters</div>
            <p>Most portfolios still manage water with incomplete visibility. This page reframes water from a utility line item into a portfolio performance variable.</p>
          </div>
        </aside>
      </div>

      <div class="container">
        <div class="proof-strip">
          <div class="proof-item">
            <strong>Portfolio-wide visibility</strong>
            <span>Across every asset</span>
          </div>
          <div class="proof-item">
            <strong>Billing integrity</strong>
            <span>Validation and exception review</span>
          </div>
          <div class="proof-item">
            <strong>Asset benchmarking</strong>
            <span>Compare performance by type and tier</span>
          </div>
          <div class="proof-item">
            <strong>Reporting-ready data</strong>
            <span>Internal and external use</span>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="eyebrow">The Problem</div>
        <h2 class="h2">Most portfolios still manage water with incomplete visibility</h2>
        <p class="section-sub body">Water data is often fragmented across bills, spreadsheets, vendors, site teams, and disconnected systems. That makes it difficult to identify overbilling, compare asset performance, detect anomalies early, or understand where water cost is materially affecting NOI.</p>

        <div class="cards-4">
          <article class="card">
            <div class="tag">Problem 01</div>
            <h3>Fragmented Data</h3>
            <p>Utility data lives in too many places to become decision-useful across the portfolio.</p>
          </article>
          <article class="card">
            <div class="tag">Problem 02</div>
            <h3>Limited Benchmarking</h3>
            <p>Most teams cannot compare one asset against the rest of the portfolio in a reliable way.</p>
          </article>
          <article class="card">
            <div class="tag">Problem 03</div>
            <h3>Reactive Operations</h3>
            <p>Leaks, inefficiencies, and cost spikes are often found after the damage is done.</p>
          </article>
          <article class="card">
            <div class="tag">Problem 04</div>
            <h3>Weak Financial Translation</h3>
            <p>Water is tracked as a utility expense, not managed as a controllable performance variable.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="eyebrow">What It Does</div>
        <h2 class="h2">A centralized layer for portfolio oversight</h2>

        <div class="cards-3">
          <article class="card">
            <div class="tag">Step 01</div>
            <h3>Consolidate</h3>
            <p>Bring together billing, metering, monitoring, and site-level data into one portfolio view.</p>
          </article>
          <article class="card">
            <div class="tag">Step 02</div>
            <h3>Detect</h3>
            <p>Identify anomalies, billing discrepancies, underperforming assets, and operational outliers.</p>
          </article>
          <article class="card">
            <div class="tag">Step 03</div>
            <h3>Prioritize</h3>
            <p>Focus capital, engineering effort, and reporting attention where impact is highest.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section" id="brief">
      <div class="container">
        <div class="eyebrow">Portfolio View</div>
        <h2 class="h2">What your team can see at a glance</h2>

        <div class="split">
          <div class="stack">
            <div class="stack-item">
              <h4>Portfolio Consumption Overview</h4>
              <p>See normalized use and cost trends across all properties in a single operating layer.</p>
            </div>
            <div class="stack-item">
              <h4>Billing Integrity</h4>
              <p>Spot sewer return factor issues, irregular charges, and possible overbilling conditions.</p>
            </div>
            <div class="stack-item">
              <h4>Asset Benchmarking</h4>
              <p>Compare assets by type, geography, usage pattern, or performance tier.</p>
            </div>
            <div class="stack-item">
              <h4>Anomaly Detection</h4>
              <p>Surface spikes, continuous flow events, and hidden system losses before they scale.</p>
            </div>
          </div>

          <div class="dashboard" aria-label="Portfolio dashboard blocks">
            <div class="dashboard-head">
              <strong>Portfolio Water Intelligence</strong>
              <span>Illustrative operating view</span>
            </div>
            <div class="dashboard-grid">
              <div class="dashboard-cell">
                <h4>Operational Risk Flags</h4>
                <p>Identify properties that may require engineering review, meter validation, or site intervention.</p>
              </div>
              <div class="dashboard-cell">
                <h4>Reporting Readiness</h4>
                <p>Support internal reporting, investor narratives, and framework-aligned disclosure.</p>
              </div>
              <div class="dashboard-cell">
                <h4>Cost Outliers</h4>
                <p>Rank unusual utility spend increases so teams can investigate based on materiality.</p>
              </div>
              <div class="dashboard-cell">
                <h4>Portfolio Priorities</h4>
                <p>Focus attention on the assets with the clearest combination of risk, cost, and opportunity.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section section-dark">
      <div class="container">
        <div class="eyebrow">Financial Translation</div>
        <h2 class="h2">Water intelligence should influence financial decisions</h2>
        <p class="section-sub body body-dark">Portfolio Water Intelligence helps teams move beyond utility tracking and toward financial action. By identifying billing errors, abnormal consumption, and performance gaps between assets, water becomes easier to quantify, prioritize, and improve.</p>

        <div class="impact-grid">
          <article class="impact-card">
            <div class="table-head">Impact 01</div>
            <h4>Protect NOI</h4>
            <p>Reduce avoidable utility expense and recover missed value hidden inside portfolio operations.</p>
          </article>
          <article class="impact-card">
            <div class="table-head">Impact 02</div>
            <h4>Prioritize Capital</h4>
            <p>Direct investment to the assets with the clearest payback and operational need.</p>
          </article>
          <article class="impact-card">
            <div class="table-head">Impact 03</div>
            <h4>Improve Forecasting</h4>
            <p>Understand cost volatility, budget pressure, and where water may distort asset performance.</p>
          </article>
          <article class="impact-card">
            <div class="table-head">Impact 04</div>
            <h4>Support Hold / Sell Strategy</h4>
            <p>Add operating insight to broader asset decisions with stronger context on cost behavior and exposure.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="eyebrow">Benchmarking</div>
        <h2 class="h2">Know which assets are leading—and which are quietly underperforming</h2>
        <p class="section-sub body">Without normalized comparison, portfolios miss hidden inefficiencies. This layer allows teams to benchmark water cost and consumption across similar assets, regions, and operating profiles.</p>

        <div class="cards-2">
          <article class="card">
            <div class="tag">Performance Leaders</div>
            <h3>Best-performing assets</h3>
            <p>Identify where operations, billing quality, and water performance are strongest—and use those properties as operating references.</p>
          </article>
          <article class="card">
            <div class="tag">Priority Outliers</div>
            <h3>Unexpected underperformance</h3>
            <p>Surface properties that appear normal operationally but deviate meaningfully on cost, usage, or trend behavior.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="eyebrow">Risk Framing</div>
        <h2 class="h2">Treat water as an operational and asset risk variable</h2>
        <p class="section-sub body">Water is not just a cost line. It affects operational resilience, engineering response, tenant experience, capital planning, and increasingly, investor scrutiny. Portfolio Water Intelligence helps organizations surface issues earlier and respond with stronger context.</p>

        <div class="cards-4">
          <article class="card">
            <div class="tag">Risk 01</div>
            <h3>Cost Risk</h3>
            <p>Unexpected utility increases, hidden overcharges, and billing volatility that go unchallenged.</p>
          </article>
          <article class="card">
            <div class="tag">Risk 02</div>
            <h3>Operational Risk</h3>
            <p>Leaks, system losses, and site-level failures that escalate before teams have clear visibility.</p>
          </article>
          <article class="card">
            <div class="tag">Risk 03</div>
            <h3>Reporting Risk</h3>
            <p>Incomplete or inconsistent water data for internal review, investor discussions, or ESG processes.</p>
          </article>
          <article class="card">
            <div class="tag">Risk 04</div>
            <h3>Reputational Risk</h3>
            <p>Weak visibility into sustainability-related performance and avoidable exposure at the asset or portfolio level.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="eyebrow">Stakeholder Use</div>
        <h2 class="h2">Used by the teams responsible for performance</h2>

        <div class="stakeholder-grid">
          <article class="stakeholder">
            <h4>For Portfolio Managers</h4>
            <p>Compare assets, identify exceptions, and direct attention where it matters most across the full operating portfolio.</p>
          </article>
          <article class="stakeholder">
            <h4>For Asset Managers</h4>
            <p>Translate water performance into cost control, variance analysis, and broader asset strategy decisions.</p>
          </article>
          <article class="stakeholder">
            <h4>For Directors of Engineering</h4>
            <p>Focus site response using data-backed alerts, operational context, and clearer property-level signals.</p>
          </article>
          <article class="stakeholder">
            <h4>For ESG / Sustainability Teams</h4>
            <p>Strengthen reporting quality with more complete, validated, and more decision-useful water data.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section section-dark">
      <div class="container">
        <div class="eyebrow">Elara AI Integration</div>
        <h2 class="h2">Powered by Elara AI</h2>
        <p class="section-sub body body-dark">Elara AI supports the extraction, validation, and interpretation of utility data at scale—reducing manual effort while making portfolio-level intelligence more consistent, faster, and easier to act on.</p>

        <div class="cards-3">
          <article class="card card-dark">
            <div class="tag">Capability 01</div>
            <h3>Automated bill data extraction</h3>
            <p>Reduce manual input and create a more consistent utility data foundation across the portfolio.</p>
          </article>
          <article class="card card-dark">
            <div class="tag">Capability 02</div>
            <h3>Validation support</h3>
            <p>Improve confidence in billing, usage interpretation, and the quality of portfolio-level comparisons.</p>
          </article>
          <article class="card card-dark">
            <div class="tag">Capability 03</div>
            <h3>Narrative-ready summaries</h3>
            <p>Turn raw utility data into internal reporting inputs and executive-level portfolio discussion points.</p>
          </article>
        </div>

        <div class="actions" style="margin-top:32px;">
          <a href="/pages/services/wst_elara_ai.html" class="btn btn-primary" style="border-radius: 0 !important;">Explore Elara AI</a>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="eyebrow">Differentiation</div>
        <h2 class="h2">Why this is different from dashboards and ESG tools</h2>

        <div class="comparison">
          <div class="comparison-box">
            <h3>Typical dashboards</h3>
            <ul>
              <li>Show data without clear prioritization</li>
              <li>Focus on single assets or narrow monitoring views</li>
              <li>Require heavy manual cleanup</li>
              <li>Stop at visualization</li>
            </ul>
          </div>
          <div class="comparison-box advantaged">
            <h3>Portfolio Water Intelligence</h3>
            <ul>
              <li>Connects data to action</li>
              <li>Compares performance across the portfolio</li>
              <li>Surfaces financial and operational exceptions</li>
              <li>Supports audit, engineering, and executive decisions</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="section section-dark" id="final-cta">
      <div class="container">
        <div class="cta-panel">
          <div class="eyebrow">Next Step</div>
          <h2 class="h2">Start with a portfolio-level review</h2>
          <p class="footer-note">See where your portfolio is losing visibility, where cost may be recoverable, and where action could create the strongest operational and financial return.</p>
          <div class="actions">
            <a href="/request-audit" class="btn btn-primary" style="border-radius: 0;">Request a Portfolio Review</a>
            <a href="/contact" class="btn btn-secondary" style="border-radius: 0;">Schedule an Executive Briefing</a>
          </div>
        </div>
      </div>
    </section>
  </main>  <main>
    <section class="hero">
      <div class="container hero-grid">
        <div>
          <div class="eyebrow">Institutional CRE Intelligence</div>
          <h1 class="h1">Portfolio-Level Water Intelligence for Institutional Real Estate</h1>
          <p class="lede">Centralize water, sewer, billing, and performance intelligence across your assets—so your team can reduce cost, surface risk, and prioritize action with confidence.</p>
          <div class="actions">
            <a href="#final-cta" class="btn btn-primary" style="border-radius: 0 !important;">Request a Portfolio Review</a>
            <a href="#brief" class="btn btn-secondary" style="border-radius: 0 !important;">View a 20-Second Brief</a>
          </div>
        </div>

        <aside class="hero-panel" aria-label="Portfolio summary">
          <div class="hero-panel-grid">
            <div class="hero-card">
              <div class="metric-value">1 View</div>
              <div class="metric-label">Across bills, anomalies, benchmarking, and asset performance</div>
            </div>
            <div class="hero-card">
              <div class="metric-value">1 Layer</div>
              <div class="metric-label">For portfolio managers, asset managers, engineering, and ESG teams</div>
            </div>
            <div class="hero-card">
              <div class="metric-value">4 Uses</div>
              <div class="metric-label">Visibility, control, prioritization, and reporting readiness</div>
            </div>
            <div class="hero-card">
              <div class="metric-value">0 Guesswork</div>
              <div class="metric-label">When cost spikes, billing errors, and underperformance surface early</div>
            </div>
          </div>
          <div class="hero-proof">
            <div class="label">Why this matters</div>
            <p>Most portfolios still manage water with incomplete visibility. This page reframes water from a utility line item into a portfolio performance variable.</p>
          </div>
        </aside>
      </div>

      <div class="container">
        <div class="proof-strip">
          <div class="proof-item">
            <strong>Portfolio-wide visibility</strong>
            <span>Across every asset</span>
          </div>
          <div class="proof-item">
            <strong>Billing integrity</strong>
            <span>Validation and exception review</span>
          </div>
          <div class="proof-item">
            <strong>Asset benchmarking</strong>
            <span>Compare performance by type and tier</span>
          </div>
          <div class="proof-item">
            <strong>Reporting-ready data</strong>
            <span>Internal and external use</span>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="eyebrow">The Problem</div>
        <h2 class="h2">Most portfolios still manage water with incomplete visibility</h2>
        <p class="section-sub body">Water data is often fragmented across bills, spreadsheets, vendors, site teams, and disconnected systems. That makes it difficult to identify overbilling, compare asset performance, detect anomalies early, or understand where water cost is materially affecting NOI.</p>

        <div class="cards-4">
          <article class="card">
            <div class="tag">Problem 01</div>
            <h3>Fragmented Data</h3>
            <p>Utility data lives in too many places to become decision-useful across the portfolio.</p>
          </article>
          <article class="card">
            <div class="tag">Problem 02</div>
            <h3>Limited Benchmarking</h3>
            <p>Most teams cannot compare one asset against the rest of the portfolio in a reliable way.</p>
          </article>
          <article class="card">
            <div class="tag">Problem 03</div>
            <h3>Reactive Operations</h3>
            <p>Leaks, inefficiencies, and cost spikes are often found after the damage is done.</p>
          </article>
          <article class="card">
            <div class="tag">Problem 04</div>
            <h3>Weak Financial Translation</h3>
            <p>Water is tracked as a utility expense, not managed as a controllable performance variable.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="eyebrow">What It Does</div>
        <h2 class="h2">A centralized layer for portfolio oversight</h2>

        <div class="cards-3">
          <article class="card">
            <div class="tag">Step 01</div>
            <h3>Consolidate</h3>
            <p>Bring together billing, metering, monitoring, and site-level data into one portfolio view.</p>
          </article>
          <article class="card">
            <div class="tag">Step 02</div>
            <h3>Detect</h3>
            <p>Identify anomalies, billing discrepancies, underperforming assets, and operational outliers.</p>
          </article>
          <article class="card">
            <div class="tag">Step 03</div>
            <h3>Prioritize</h3>
            <p>Focus capital, engineering effort, and reporting attention where impact is highest.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section" id="brief">
      <div class="container">
        <div class="eyebrow">Portfolio View</div>
        <h2 class="h2">What your team can see at a glance</h2>

        <div class="split">
          <div class="stack">
            <div class="stack-item">
              <h4>Portfolio Consumption Overview</h4>
              <p>See normalized use and cost trends across all properties in a single operating layer.</p>
            </div>
            <div class="stack-item">
              <h4>Billing Integrity</h4>
              <p>Spot sewer return factor issues, irregular charges, and possible overbilling conditions.</p>
            </div>
            <div class="stack-item">
              <h4>Asset Benchmarking</h4>
              <p>Compare assets by type, geography, usage pattern, or performance tier.</p>
            </div>
            <div class="stack-item">
              <h4>Anomaly Detection</h4>
              <p>Surface spikes, continuous flow events, and hidden system losses before they scale.</p>
            </div>
          </div>

          <div class="dashboard" aria-label="Portfolio dashboard blocks">
            <div class="dashboard-head">
              <strong>Portfolio Water Intelligence</strong>
              <span>Illustrative operating view</span>
            </div>
            <div class="dashboard-grid">
              <div class="dashboard-cell">
                <h4>Operational Risk Flags</h4>
                <p>Identify properties that may require engineering review, meter validation, or site intervention.</p>
              </div>
              <div class="dashboard-cell">
                <h4>Reporting Readiness</h4>
                <p>Support internal reporting, investor narratives, and framework-aligned disclosure.</p>
              </div>
              <div class="dashboard-cell">
                <h4>Cost Outliers</h4>
                <p>Rank unusual utility spend increases so teams can investigate based on materiality.</p>
              </div>
              <div class="dashboard-cell">
                <h4>Portfolio Priorities</h4>
                <p>Focus attention on the assets with the clearest combination of risk, cost, and opportunity.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section section-dark">
      <div class="container">
        <div class="eyebrow">Financial Translation</div>
        <h2 class="h2">Water intelligence should influence financial decisions</h2>
        <p class="section-sub body body-dark">Portfolio Water Intelligence helps teams move beyond utility tracking and toward financial action. By identifying billing errors, abnormal consumption, and performance gaps between assets, water becomes easier to quantify, prioritize, and improve.</p>

        <div class="impact-grid">
          <article class="impact-card">
            <div class="table-head">Impact 01</div>
            <h4>Protect NOI</h4>
            <p>Reduce avoidable utility expense and recover missed value hidden inside portfolio operations.</p>
          </article>
          <article class="impact-card">
            <div class="table-head">Impact 02</div>
            <h4>Prioritize Capital</h4>
            <p>Direct investment to the assets with the clearest payback and operational need.</p>
          </article>
          <article class="impact-card">
            <div class="table-head">Impact 03</div>
            <h4>Improve Forecasting</h4>
            <p>Understand cost volatility, budget pressure, and where water may distort asset performance.</p>
          </article>
          <article class="impact-card">
            <div class="table-head">Impact 04</div>
            <h4>Support Hold / Sell Strategy</h4>
            <p>Add operating insight to broader asset decisions with stronger context on cost behavior and exposure.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="eyebrow">Benchmarking</div>
        <h2 class="h2">Know which assets are leading—and which are quietly underperforming</h2>
        <p class="section-sub body">Without normalized comparison, portfolios miss hidden inefficiencies. This layer allows teams to benchmark water cost and consumption across similar assets, regions, and operating profiles.</p>

        <div class="cards-2">
          <article class="card">
            <div class="tag">Performance Leaders</div>
            <h3>Best-performing assets</h3>
            <p>Identify where operations, billing quality, and water performance are strongest—and use those properties as operating references.</p>
          </article>
          <article class="card">
            <div class="tag">Priority Outliers</div>
            <h3>Unexpected underperformance</h3>
            <p>Surface properties that appear normal operationally but deviate meaningfully on cost, usage, or trend behavior.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="eyebrow">Risk Framing</div>
        <h2 class="h2">Treat water as an operational and asset risk variable</h2>
        <p class="section-sub body">Water is not just a cost line. It affects operational resilience, engineering response, tenant experience, capital planning, and increasingly, investor scrutiny. Portfolio Water Intelligence helps organizations surface issues earlier and respond with stronger context.</p>

        <div class="cards-4">
          <article class="card">
            <div class="tag">Risk 01</div>
            <h3>Cost Risk</h3>
            <p>Unexpected utility increases, hidden overcharges, and billing volatility that go unchallenged.</p>
          </article>
          <article class="card">
            <div class="tag">Risk 02</div>
            <h3>Operational Risk</h3>
            <p>Leaks, system losses, and site-level failures that escalate before teams have clear visibility.</p>
          </article>
          <article class="card">
            <div class="tag">Risk 03</div>
            <h3>Reporting Risk</h3>
            <p>Incomplete or inconsistent water data for internal review, investor discussions, or ESG processes.</p>
          </article>
          <article class="card">
            <div class="tag">Risk 04</div>
            <h3>Reputational Risk</h3>
            <p>Weak visibility into sustainability-related performance and avoidable exposure at the asset or portfolio level.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="eyebrow">Stakeholder Use</div>
        <h2 class="h2">Used by the teams responsible for performance</h2>

        <div class="stakeholder-grid">
          <article class="stakeholder">
            <h4>For Portfolio Managers</h4>
            <p>Compare assets, identify exceptions, and direct attention where it matters most across the full operating portfolio.</p>
          </article>
          <article class="stakeholder">
            <h4>For Asset Managers</h4>
            <p>Translate water performance into cost control, variance analysis, and broader asset strategy decisions.</p>
          </article>
          <article class="stakeholder">
            <h4>For Directors of Engineering</h4>
            <p>Focus site response using data-backed alerts, operational context, and clearer property-level signals.</p>
          </article>
          <article class="stakeholder">
            <h4>For ESG / Sustainability Teams</h4>
            <p>Strengthen reporting quality with more complete, validated, and more decision-useful water data.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="section section-dark">
      <div class="container">
        <div class="eyebrow">Elara AI Integration</div>
        <h2 class="h2">Powered by Elara AI</h2>
        <p class="section-sub body body-dark">Elara AI supports the extraction, validation, and interpretation of utility data at scale—reducing manual effort while making portfolio-level intelligence more consistent, faster, and easier to act on.</p>

        <div class="cards-3">
          <article class="card card-dark">
            <div class="tag">Capability 01</div>
            <h3>Automated bill data extraction</h3>
            <p>Reduce manual input and create a more consistent utility data foundation across the portfolio.</p>
          </article>
          <article class="card card-dark">
            <div class="tag">Capability 02</div>
            <h3>Validation support</h3>
            <p>Improve confidence in billing, usage interpretation, and the quality of portfolio-level comparisons.</p>
          </article>
          <article class="card card-dark">
            <div class="tag">Capability 03</div>
            <h3>Narrative-ready summaries</h3>
            <p>Turn raw utility data into internal reporting inputs and executive-level portfolio discussion points.</p>
          </article>
        </div>

        <div class="actions" style="margin-top:32px;">
          <a href="/pages/services/wst_elara_ai.html" class="btn btn-primary" style="border-radius: 0 !important;">Explore Elara AI</a>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="eyebrow">Differentiation</div>
        <h2 class="h2">Why this is different from dashboards and ESG tools</h2>

        <div class="comparison">
          <div class="comparison-box">
            <h3>Typical dashboards</h3>
            <ul>
              <li>Show data without clear prioritization</li>
              <li>Focus on single assets or narrow monitoring views</li>
              <li>Require heavy manual cleanup</li>
              <li>Stop at visualization</li>
            </ul>
          </div>
          <div class="comparison-box advantaged">
            <h3>Portfolio Water Intelligence</h3>
            <ul>
              <li>Connects data to action</li>
              <li>Compares performance across the portfolio</li>
              <li>Surfaces financial and operational exceptions</li>
              <li>Supports audit, engineering, and executive decisions</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="section section-dark" id="final-cta">
      <div class="container">
        <div class="cta-panel">
          <div class="eyebrow">Next Step</div>
          <h2 class="h2">Start with a portfolio-level review</h2>
          <p class="footer-note">See where your portfolio is losing visibility, where cost may be recoverable, and where action could create the strongest operational and financial return.</p>
          <div class="actions">
            <a href="/request-audit" class="btn btn-primary" style="border-radius: 0;">Request a Portfolio Review</a>
            <a href="/contact" class="btn btn-secondary" style="border-radius: 0;">Schedule an Executive Briefing</a>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection