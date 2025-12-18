@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')
  <section class="relative overflow-hidden bg-gray-50">
    <div class="absolute inset-0 opacity-20"
         style="background: radial-gradient(1000px 500px at 10% 0%, #3b82f6 0%, transparent 60%), radial-gradient(900px 600px at 110% 60%, #06b6d4 0%, transparent 60%);">
    </div>
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8 py-20 lg:py-28 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      <div>
        <p class="text-xs tracking-widest text-gray-500 uppercase">ESG • Water • Carbon</p>
        <h1 class="mt-2 text-4xl md:text-5xl font-semibold leading-tight">Turn Water Performance into ESG Alpha</h1>
        <p class="mt-5 text-lg text-gray-600 leading-relaxed">
          We help property and asset managers cut water waste, lower operating costs, and translate improvements
          directly into stronger ESG scores, resilient NOI, and investor-grade reporting.
        </p>
        <div class="mt-8 flex flex-wrap gap-3">
          <a href="#kpis" class="inline-flex items-center rounded-full bg-gray-900 text-white px-6 py-3 text-sm font-medium hover:bg-black transition">
            View ESG KPIs
          </a>
          <a href="#cta" class="inline-flex items-center rounded-full border border-gray-300 text-gray-900 px-6 py-3 text-sm font-medium hover:bg-gray-100 transition">
            Request Portfolio Assessment
          </a>
        </div>
        <div class="mt-8 flex flex-wrap items-center gap-3">
          <span class="chip">GRESB: Water & Utilities</span>
          <span class="chip">GHG Protocol: Scope 2</span>
          <span class="chip">Investor-grade Evidence</span>
          <span class="chip">Asset-level KPIs</span>
        </div>
      </div>
      <div class="fade-up">
        <img src="/assets/img/water-management-&-sustainability-solutions-esg-water-saving-asset-protection.png"
             alt="Modern building with water features" class="w-full rounded-2xl shadow-2xl ring-1 ring-gray-200 object-cover">
      </div>
    </div>
  </section>

  <!-- ================= ESG Narrative + Value ================= -->
  <section class="py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-12">
      <div class="lg:col-span-2">
        <h2 class="text-3xl md:text-4xl font-semibold leading-tight">Water as a Strategic Asset</h2>
        <p class="mt-4 text-gray-600 leading-relaxed">
          Water touches NOI and ESG simultaneously. By auditing fixtures and processes, fixing hidden losses,
          and right-sizing hot-water loads, we reduce consumption and the energy required to move and heat water.
          The result: lower bills, fewer maintenance surprises, and a measurable drop in water-linked Scope&nbsp;2 emissions.
        </p>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
          <!-- Card -->
          <div class="rounded-2xl border border-gray-200 p-6 hover:shadow-md transition">
            <p class="text-sm font-semibold text-gray-900">Water Footprint ↓</p>
            <p class="mt-2 text-sm text-gray-600">Cut total consumption and intensity (gal/ft²), backed by M&V and tenant-aware controls.</p>
          </div>
          <div class="rounded-2xl border border-gray-200 p-6 hover:shadow-md transition">
            <p class="text-sm font-semibold text-gray-900">Energy for Water ↓</p>
            <p class="mt-2 text-sm text-gray-600">Reduce kWh for pumping, treatment, and hot water across systems and dayparts.</p>
          </div>
          <div class="rounded-2xl border border-gray-200 p-6 hover:shadow-md transition">
            <p class="text-sm font-semibold text-gray-900">Carbon Footprint ↓</p>
            <p class="mt-2 text-sm text-gray-600">Quantify avoided tCO₂e via utility emission factors; roll up to portfolio targets.</p>
          </div>
        </div>
      </div>
      <aside class="space-y-4">
        <div class="rounded-2xl border border-gray-200 p-6">
          <p class="text-sm font-semibold text-gray-900">Designed for PMs & AMs</p>
          <p class="mt-2 text-sm text-gray-600">Operational savings + reporting uplift, with minimal disruption to tenants.</p>
        </div>
        <div class="rounded-2xl border border-gray-200 p-6">
          <p class="text-sm font-semibold text-gray-900">Alignment</p>
          <ul class="mt-2 text-sm text-gray-600 space-y-1 list-disc list-inside">
            <li>GRESB Water & Utilities metrics</li>
            <li>GHG Protocol (Scope 2, market/location-based)</li>
            <li>Investor/LP reporting expectations</li>
          </ul>
        </div>
      </aside>
    </div>
  </section>

  <!-- ================= KPI Cards (Count-Up) ================= -->
  <section id="kpis" class="py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
      <h3 class="text-2xl md:text-3xl font-semibold leading-tight">Portfolio KPIs that move both NOI and ESG</h3>
      <p class="mt-3 text-gray-600">Real numbers, updated continuously, exportable for GRESB and investor disclosures.</p>

      <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Water Intensity -->
        <div class="rounded-2xl border border-gray-200 p-6 bg-white hover:shadow-md transition">
          <p class="text-xs uppercase tracking-wider text-gray-400">Water Intensity</p>
          <div class="mt-3 flex items-end gap-2">
            <div id="kpi-water-intensity" class="text-3xl font-semibold text-gray-900" data-target="12.4" data-decimals="1">0</div>
            <div class="text-sm text-gray-500">gal/ft²/yr</div>
          </div>
          <p class="mt-3 text-sm text-gray-600">Target glidepath to ≤ 10.0 gal/ft²/yr.</p>
        </div>
        <!-- Losses Detected -->
        <div class="rounded-2xl border border-gray-200 p-6 bg-white hover:shadow-md transition">
          <p class="text-xs uppercase tracking-wider text-gray-400">Losses Detected</p>
          <div class="mt-3 flex items-end gap-2">
            <div id="kpi-leak" class="text-3xl font-semibold text-gray-900" data-target="3.1" data-decimals="1" data-suffix="%">0</div>
          </div>
          <p class="mt-3 text-sm text-gray-600">Automated alerts reduce non-revenue water and bill disputes.</p>
        </div>
        <!-- Water-Related Energy -->
        <div class="rounded-2xl border border-gray-200 p-6 bg-white hover:shadow-md transition">
          <p class="text-xs uppercase tracking-wider text-gray-400">Water-Related Energy</p>
          <div class="mt-3 flex items-end gap-2">
            <div id="kpi-water-energy" class="text-3xl font-semibold text-gray-900" data-target="18" data-decimals="0" data-prefix="-" data-suffix="%">0</div>
          </div>
          <p class="mt-3 text-sm text-gray-600">kWh for pumping + hot water, normalized by area.</p>
        </div>
        <!-- tCO2e Impact -->
        <div class="rounded-2xl border border-gray-200 p-6 bg-white hover:shadow-md transition">
          <p class="text-xs uppercase tracking-wider text-gray-400">tCO₂e Impact from Water</p>
          <div class="mt-3 flex items-end gap-2">
            <div id="kpi-water-carbon" class="text-3xl font-semibold text-gray-900" data-target="112" data-decimals="0" data-prefix="-">0</div>
            <div class="text-sm text-gray-500">tCO₂e/yr</div>
          </div>
          <p class="mt-3 text-sm text-gray-600">Investor-grade calculations for disclosures.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= GRESB & Reporting ================= -->
  <section class="py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-14 items-start">
      <div>
        <h3 class="text-2xl md:text-3xl font-semibold leading-tight">Built for GRESB and Investor Reporting</h3>
        <p class="mt-3 text-gray-600">Our data model maps directly to GRESB Water & Utilities, with audit trails and M&V that withstand diligence.</p>
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div class="rounded-2xl border border-gray-200 p-6 hover:shadow-md transition">
            <p class="text-sm font-semibold text-gray-900">Asset-Level Readiness</p>
            <p class="mt-2 text-sm text-gray-600">Property-level metrics, rollups, and back-ups ready for sampling.</p>
          </div>
          <div class="rounded-2xl border border-gray-200 p-6 hover:shadow-md transition">
            <p class="text-sm font-semibold text-gray-900">Automated Evidence</p>
            <p class="mt-2 text-sm text-gray-600">Export PDFs/CSVs with assumptions, factors, and versioned histories.</p>
          </div>
        </div>
      </div>
      <div class="rounded-2xl border border-gray-200 p-6">
        <h4 class="text-sm font-semibold text-gray-900">What’s included</h4>
        <ul class="mt-3 text-sm text-gray-600 space-y-2 list-disc list-inside">
          <li>Baseline & post-implementation intensity</li>
          <li>Leak/loss detection with alert logs</li>
          <li>Hot-water optimization analysis</li>
          <li>Water-linked energy and tCO₂e</li>
          <li>Property and portfolio exports</li>
        </ul>
        <div class="mt-6 p-4 rounded-xl bg-gray-50 border border-gray-200">
          <p class="text-xs text-gray-600">Note: We align with recognized frameworks (e.g., GHG Protocol). Always validate emission factors with your utility and reporting year methodology.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= Mini Case Studies ================= -->
  <section class="py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
      <h3 class="text-2xl md:text-3xl font-semibold leading-tight">Recent Outcomes</h3>
      <p class="mt-3 text-gray-600">Illustrative examples from commercial portfolios.</p>

      <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="rounded-2xl border border-gray-200 bg-white p-6 hover:shadow-md transition">
          <p class="text-sm font-semibold text-gray-900">Urban Office — 1.2M ft²</p>
          <ul class="mt-2 text-sm text-gray-600 space-y-1 list-disc list-inside">
            <li>−22% water intensity (12 months)</li>
            <li>−14% water-related kWh</li>
            <li>−96 tCO₂e (annualized)</li>
          </ul>
        </div>
        <div class="rounded-2xl border border-gray-200 bg-white p-6 hover:shadow-md transition">
          <p class="text-sm font-semibold text-gray-900">Hospitality — Multi-site</p>
          <ul class="mt-2 text-sm text-gray-600 space-y-1 list-disc list-inside">
            <li>−28% domestic hot-water load</li>
            <li>Leak alerts ↓ resolution time by 46%</li>
            <li>Verified M&V package for lenders</li>
          </ul>
        </div>
        <div class="rounded-2xl border border-gray-200 bg-white p-6 hover:shadow-md transition">
          <p class="text-sm font-semibold text-gray-900">Mixed-Use — 800k ft²</p>
          <ul class="mt-2 text-sm text-gray-600 space-y-1 list-disc list-inside">
            <li>−18% total consumption</li>
            <li>Tenant sub-metering disputes ↓ 70%</li>
            <li>GRESB score uplift in Water & Utilities</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= CTA ================= -->
  <section id="cta" class="py-16 lg:py-20">
    <div class="max-w-5xl mx-auto px-6 lg:px-8 text-center">
      <h3 class="text-3xl md:text-4xl font-semibold leading-tight">See what your portfolio could save—financially and in tCO₂e</h3>
      <p class="mt-3 text-lg text-gray-600">We’ll baseline your properties and show the path to measurable, report-ready impact.</p>
      <div class="mt-8 flex flex-wrap justify-center gap-3">
        <a href="#" class="inline-flex items-center rounded-full bg-gray-900 text-white px-6 py-3 text-sm font-medium hover:bg-black transition">Request Assessment</a>
        <a href="#" class="inline-flex items-center rounded-full border border-gray-300 text-gray-900 px-6 py-3 text-sm font-medium hover:bg-gray-100 transition">Download KPI Spec</a>
      </div>
    </div>
  </section>

<section class="flex justify-center">
<a href="/property-managers" class="inline-flex items-center rounded-full border px-6 py-3 text-sm hover:bg-gray-100">
  Operational playbook for PMs & AMs
</a>
  </section>
@endsection

@push('scripts')
  <script>
    // Count-up animation
    (function () {
      function animateCount(el) {
        const target = parseFloat(el.dataset.target || "0");
        const decimals = parseInt(el.dataset.decimals || "0", 10);
        const prefix = el.dataset.prefix || "";
        const suffix = el.dataset.suffix || "";
        const duration = 1100;
        const start = performance.now();
        const startVal = 0;

        function frame(now) {
          const t = Math.min(1, (now - start) / duration);
          const eased = 1 - Math.pow(1 - t, 3); // ease-out cubic
          const value = startVal + (target - startVal) * eased;
          el.textContent = prefix + value.toFixed(decimals) + suffix;
          if (t < 1) requestAnimationFrame(frame);
        }
        requestAnimationFrame(frame);
      }

      let ran = false;
      const ids = ["#kpi-water-intensity", "#kpi-leak", "#kpi-water-energy", "#kpi-water-carbon"];
      const kpis = ids.map(sel => document.querySelector(sel)).filter(Boolean);
      if (!kpis.length) return;

      const section = document.querySelector("#kpis");
      const io = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting && !ran) {
            ran = true;
            kpis.forEach(el => animateCount(el));
            io.disconnect();
          }
        });
      }, { threshold: 0.35 });
      io.observe(section);
    })();

    // Fade-up observer
    (function () {
      const els = document.querySelectorAll('.fade-up');
      if (!els.length) return;
      const io = new IntersectionObserver((entries) => {
        entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('is-visible'); });
      }, { threshold: 0.2 });
      els.forEach(el => io.observe(el));
    })();

    // Year
    document.getElementById('year').textContent = new Date().getFullYear();
  </script>
@endpush

