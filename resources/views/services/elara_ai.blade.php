@extends('layouts.app')

@section('title', 'Elara AI Digital Billing Assistants — Water Solutions Technology')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/elara_ai.css') }}">
@endpush

@section('content')

<!-- HERO -->
<div class="inner-hero">
  <div class="ihero-bg"></div>
  <div class="ihero-content">
    <div class="ihero-bc">
      <a href="/services">Services</a>
      <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 1l4 4-4 4"/></svg>
      <span>Utility Intelligence</span>
    </div>
    <div class="ihero-eye">Service — Ara Utility Intelligence</div>
    <h1 class="ihero-h1">Automated Utility Intelligence<br><em>for Real Estate Portfolios.</em></h1>
    <p class="ihero-sub">Ara acquires utility bills portfolio-wide, validates consumption data, and produces GRESB-ready datasets at scale — eliminating the manual collection that most teams fail to complete before submission.</p>
    <div class="ihero-ctas">
      <a href="/contact" class="btn-hero-primary">Discuss an Engagement</a>
      <a href="#how-ara-works" class="btn-dark-ghost">How Ara Works ↓</a>
    </div>
  </div>
  <div class="stat-strip">
    <div class="stat-strip-cell"><div class="ssc-num accent">WT1</div><div class="ssc-lbl">Highest-weighted water indicator — up to 4 points</div></div>
    <div class="stat-strip-cell"><div class="ssc-num">Auto</div><div class="ssc-lbl">Portfolio-wide bill acquisition — no manual entry</div></div>
    <div class="stat-strip-cell"><div class="ssc-num accent">GRESB</div><div class="ssc-lbl">Submission-ready datasets, verified coverage</div></div>
    <div class="stat-strip-cell"><div class="ssc-num">31</div><div class="ssc-lbl">Assets with verified GRESB data — DiamondRock</div></div>
  </div>
</div>

<!-- WHAT ARA DOES -->
<section class="sec sec-w" id="how-ara-works">
  <div class="two">
    <div>
      <p class="eye">Automated Utility Intelligence</p>
      <h2 class="sh">From data gap to<br><em>GRESB-ready coverage.</em></h2>
      <p class="sub">Most portfolios enter GRESB submission season with incomplete water data. Ara closes that gap before it costs you points.</p>

      <div class="ai">
        <div class="ai-ic"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="12" height="10" rx="1"/><path d="M5 7h6M5 10h4"/></svg></div>
        <div><div class="ai-t">Utility Bill Acquisition</div><div class="ai-b">Ara sources utility bills directly from providers across your portfolio — automatically. No manual collection. No gaps from missed submissions. Every property, every billing period, on schedule.</div></div>
      </div>
      <div class="ai">
        <div class="ai-ic"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="8" cy="8" r="5.5"/><path d="M8 5.5v3l2 1.5"/></svg></div>
        <div><div class="ai-t">Billing Discrepancy Detection</div><div class="ai-b">Every bill is validated against historical consumption patterns, meter readings, and tariff schedules. Misclassified rates, estimation errors, and anomalies are flagged before they compound into multi-year overcharges.</div></div>
      </div>
      <div class="ai">
        <div class="ai-ic"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 14l4-4 4 4 4-8"/></svg></div>
        <div><div class="ai-t">Verified Consumption Data</div><div class="ai-b">All consumption data is verified against source bills — not estimated or extrapolated. This is the distinction that matters for GRESB: self-reported estimates score differently from verified coverage.</div></div>
      </div>
      <div class="ai" style="border-bottom:none;">
        <div class="ai-ic"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 4h10M3 8h7M3 12h5"/></svg></div>
        <div><div class="ai-t">GRESB-Ready Dataset Export</div><div class="ai-b">Ara produces consumption data structured to meet GRESB WT1 submission requirements. Not adapted from an operational report — built for submission from the start.</div></div>
      </div>
    </div>

    <div class="bm">
      <div class="bm-title">What Ara Delivers</div>
      <div class="brow"><span class="bl">Bill acquisition scope</span><span class="bv">Portfolio-wide</span></div>
      <div class="brow"><span class="bl">Data format</span><span class="bv">GRESB WT1-ready</span></div>
      <div class="brow"><span class="bl">Validation method</span><span class="bv">Source-bill verified</span></div>
      <div class="brow"><span class="bl">Discrepancy detection</span><span class="bv">Automated flagging</span></div>
      <div class="brow"><span class="bl">Historical coverage</span><span class="bv">Full billing history</span></div>
      <div class="brow"><span class="bl">Deployment model</span><span class="bv">Retained Advisory</span></div>
      <a href="/contact" class="bm-cta">Discuss an Engagement</a>
    </div>
  </div>
</section>

<!-- THE PROBLEM ARA SOLVES -->
<section class="sec sec-o">
  <div style="max-width:800px;margin-bottom:48px;">
    <p class="eye">The Problem</p>
    <h2 class="sh">Most portfolios enter GRESB submission<br><em>with a data coverage problem.</em></h2>
    <p class="sub">The WT1 indicator is worth up to 4 of ~7.67 available water points — more than any other water indicator. It measures data coverage, not performance. A portfolio that has improved water efficiency but has incomplete data scores lower than a portfolio that has done less but documents everything. Ara exists to close that gap.</p>
  </div>

  <div class="three" style="margin-bottom:32px;">
    <div style="background:var(--white);padding:32px;">
      <p class="eye">Problem 01</p>
      <h3 style="font-family:'Cormorant Garamond',serif;font-size:22px;font-weight:300;color:var(--black);margin-bottom:10px;line-height:1.25;">Manual bill collection takes 30+ hours per GRESB cycle</h3>
      <p style="font-size:12px;color:var(--gray-1);line-height:1.75;">Sustainability teams spend weeks chasing utility providers, property managers, and sub-meter data before each submission. Every missed property is a coverage gap that costs points — not because the water wasn't managed, but because the data wasn't collected.</p>
    </div>
    <div style="background:var(--white);padding:32px;">
      <p class="eye">Problem 02</p>
      <h3 style="font-family:'Cormorant Garamond',serif;font-size:22px;font-weight:300;color:var(--black);margin-bottom:10px;line-height:1.25;">Missing coverage suppresses your WT1 score</h3>
      <p style="font-size:12px;color:var(--gray-1);line-height:1.75;">WT1 awards points based on the percentage of portfolio floor area for which you can submit verified consumption data. A 10-property portfolio where 3 properties have gaps loses WT1 points regardless of how well the other 7 are managed. Coverage, not performance, drives this indicator.</p>
    </div>
    <div style="background:var(--white);padding:32px;">
      <p class="eye">Problem 03</p>
      <h3 style="font-family:'Cormorant Garamond',serif;font-size:22px;font-weight:300;color:var(--black);margin-bottom:10px;line-height:1.25;">Billing errors go undetected for months</h3>
      <p style="font-size:12px;color:var(--gray-1);line-height:1.75;">Without automated validation, billing errors — rate misclassifications, estimation overrides, meter substitution errors — compound over multiple billing cycles. The average commercial property with unreviewed bills carries 8–12% in recoverable overcharges. Ara flags these before they reach year-end.</p>
    </div>
  </div>

  <div class="hl-box">
    <p>On the DiamondRock portfolio, Ara enabled <strong>GRESB-reported documentation across 31 assets</strong> — converting verified field savings into submission-ready data that satisfied WT1 requirements and contributed to a 4-star overall GRESB rating.</p>
  </div>
</section>

<!-- GRESB CONNECTION -->
<section class="sec sec-dk">
  <div class="two">
    <div>
      <p class="eye" style="color:rgba(255,255,255,.35);">GRESB Water Indicators</p>
      <h2 class="sh sh--white">Ara directly addresses<br><em>three GRESB water indicators.</em></h2>
      <p class="sub sub--white">Not as a secondary benefit — as its primary purpose. Every dataset Ara produces is structured to satisfy the specific evidence requirements of WT1, MR3, and RA4.</p>

      <div class="ind-row ind-row--dark">
        <div class="ind-code">WT1</div>
        <div>
          <div class="ind-name">Water Consumption Data Coverage</div>
          <div class="ind-desc">The highest-weighted water indicator (up to 4 of ~7.67 points). Ara automates bill acquisition portfolio-wide — eliminating manual collection that causes coverage gaps before submission.</div>
        </div>
        <div class="ind-pts">4 pts</div>
      </div>
      <div class="ind-row ind-row--dark">
        <div class="ind-code">MR3</div>
        <div>
          <div class="ind-name">Monitoring & Targets</div>
          <div class="ind-desc">Ara's validated billing data provides the historical baseline required to set and document water consumption targets — a requirement for MR3 credit. Every billing record is logged and timestamped.</div>
        </div>
        <div class="ind-pts">2 pts</div>
      </div>
      <div class="ind-row ind-row--dark" style="border-bottom:none;">
        <div class="ind-code">RA4</div>
        <div>
          <div class="ind-name">Risk Assessment</div>
          <div class="ind-desc">Billing discrepancies flagged by Ara — anomalous consumption, meter accuracy issues, tariff misclassification — constitute documented water risk evidence at the asset level, supporting RA4 scoring.</div>
        </div>
        <div class="ind-pts">1 pt</div>
      </div>
    </div>

    <div>
      <div class="stat-panel">
        <div class="stat-panel-grid">
          <div class="sp-cell"><div class="sp-num g">67.7%</div><div class="sp-lbl">DiamondRock water indicator score, GRESB 2025</div></div>
          <div class="sp-cell"><div class="sp-num">86/100</div><div class="sp-lbl">DiamondRock overall GRESB score — 4-star rating</div></div>
          <div class="sp-cell"><div class="sp-num g">25.3%</div><div class="sp-lbl">Verified water consumption reduction — Westin FL</div></div>
          <div class="sp-cell"><div class="sp-cell"><div class="sp-num">31</div><div class="sp-lbl">Assets with GRESB-reported data via WST</div></div></div>
        </div>
        <div class="quote-bl quote-bl--dark">
          <p>"Ara enabled us to close the coverage gap that had been suppressing our water score for two consecutive cycles. The data was submission-ready within weeks."</p>
          <cite>Sustainability Director · DiamondRock Hospitality Company</cite>
        </div>
      </div>
      <div style="background:#0f1a13;border:1px solid rgba(255,255,255,.05);padding:24px;margin-top:2px;">
        <p class="eye" style="color:rgba(255,255,255,.28);margin-bottom:10px;">Important</p>
        <p style="font-size:12px;color:rgba(255,255,255,.35);line-height:1.75;">Ara is deployed as part of WST's Retained Advisory engagement — not as a standalone software subscription. This distinction matters: advisory deployment means WST owns the outcome, not just the tool.</p>
      </div>
    </div>
  </div>
</section>

<!-- HOW TO ENGAGE -->
<section class="sec sec-w">
  <div style="max-width:720px;margin-bottom:48px;">
    <p class="eye">Engagement Model</p>
    <h2 class="sh">Ara is available through<br><em>WST's Retained Advisory engagement.</em></h2>
    <p class="sub">Ara is not licensed as standalone software. It is deployed by WST as part of an ongoing advisory relationship — which means WST is accountable for the outcome, not just the delivery of a tool.</p>
  </div>

  <div class="tiers">
    <div class="tier">
      <div class="tier-lbl">Project-Based</div>
      <div class="tier-name">Portfolio Water Assessment</div>
      <div class="tier-desc">A scoped engagement producing audit-grade findings, GRESB-formatted data, and a prioritised efficiency roadmap. Designed for GRESB preparation, acquisition due diligence, or establishing a water baseline.</div>
      <ul class="tier-list">
        <li><span class="tier-tick">✓</span>Ara-driven utility bill acquisition across defined assets</li>
        <li><span class="tier-tick">✓</span>Billing discrepancy identification and recovery documentation</li>
        <li><span class="tier-tick">✓</span>WT1-formatted consumption data for GRESB submission</li>
        <li><span class="tier-tick">✓</span>Historical data coverage — full billing history</li>
        <li><span class="tier-tick">✓</span>Investment committee–ready findings documentation</li>
      </ul>
      <a href="/contact" class="tier-cta">Request Scope &amp; Proposal</a>
    </div>
    <div class="tier tier--featured">
      <div class="tier-lbl">Retained Advisory</div>
      <div class="tier-name">Ongoing Portfolio Intelligence</div>
      <div class="tier-desc">Continuous advisory with Ara operating portfolio-wide on an ongoing basis — automated data collection, annual GRESB preparation, and quarterly performance reporting included.</div>
      <ul class="tier-list">
        <li><span class="tier-tick">✓</span>Ara automated utility bill collection — portfolio-wide, year-round</li>
        <li><span class="tier-tick">✓</span>Annual GRESB water data preparation and submission support</li>
        <li><span class="tier-tick">✓</span>Quarterly portfolio water performance reporting</li>
        <li><span class="tier-tick">✓</span>Billing discrepancy monitoring and recovery flagging</li>
        <li><span class="tier-tick">✓</span>Investment committee briefings and ESG disclosure support</li>
        <li><span class="tier-tick">✓</span>WST advisory team accountable for outcomes</li>
      </ul>
      <a href="/contact" class="tier-cta">Discuss Retained Engagement</a>
    </div>
  </div>
</section>

<!-- CTA -->
<div class="cs">
  <div>
    <div class="cs-t">Close your portfolio's<br><em>GRESB data coverage gap.</em></div>
    <p class="cs-s">A 90-minute working session with WST to map your current water data coverage, identify your WT1 gaps, and outline the impact of closing them before your next submission.</p>
  </div>
  <a href="/contact" class="cs-btn">Schedule Assessment</a>
</div>
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