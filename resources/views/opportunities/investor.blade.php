@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')
  <!-- Hero -->
  <section class="relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-black via-gray-900 to-black"></div>
    <div class="relative max-w-5xl mx-auto px-6 py-20 text-center">
      <h1 class="text-4xl md:text-5xl font-extrabold text-gray-100">Join Us in Transforming Water into an Asset</h1>
      <p class="mt-4 text-lg text-gray-300 max-w-3xl mx-auto">
        We empower property managers, asset managers and municipalities to save 10–30 % on water costs while meeting ESG targets.  Learn how you can partner with us as we scale.
      </p>
      <div class="mt-8 flex flex-wrap gap-4 justify-center">
        <button @click="openModal = true" class="px-6 py-3 rounded-full bg-gray-100 text-gray-900 font-semibold shadow hover:bg-white transition">Register Interest</button>
        <a href="/esg" class="px-6 py-3 rounded-full border border-gray-500 text-gray-100 hover:bg-gray-700 transition">See ESG Impact</a>
      </div>
    </div>
  </section>

  <!-- About & Investment Highlights -->
<section class="py-16 px-6 max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12">
  <div>
    <h2 class="text-2xl md:text-3xl font-bold mb-4">Why Invest in Water Solutions Technology?</h2>
    <ul class="space-y-4">
      <li><strong>Massive Market Need:</strong> Rising utility rates and aging infrastructure create urgency for water‑efficiency solutions.</li>
      <li><strong>Proven Model:</strong> Our zero‑CapEx approach delivers verified savings and high‑margin recurring revenue.</li>
      <li><strong>ESG Momentum:</strong> By lowering consumption and reducing Scope 2 emissions, we improve GRESB/CDP scores and protect asset value.</li>
      <li><strong>Experienced Team:</strong> Founders with decades in water engineering, IoT, and sustainability; backed by industry advisors.</li>
    </ul>
  </div>
  <div>
    <h3 class="text-xl font-bold mb-3">Milestones & Investment Timeline</h3>
    <ol class="relative border-l border-gray-700 pl-4 space-y-6">
      <li>
        <span class="absolute -left-3 top-0 inline-block w-3 h-3 bg-green-400 rounded-full"></span>
        <p class="font-semibold">2022 – Company founded</p>
        <p class="text-gray-400">Proof of concept for IoT water‑monitoring platform completed.</p>
      </li>
      <li>
        <span class="absolute -left-3 inline-block w-3 h-3 bg-green-400 rounded-full"></span>
        <p class="font-semibold">2023 – Pilot projects</p>
        <p class="text-gray-400">Deployed with five hospitality and multi‑family portfolios; reduced water costs by 25 % on average.</p>
      </li>
      <li>
        <span class="absolute -left-3 inline-block w-3 h-3 bg-green-400 rounded-full"></span>
        <p class="font-semibold">2024 – Seed round & scaling</p>
        <p class="text-gray-400">Raised $1 M seed capital; expanding engineering and sales teams.</p>
      </li>
      <li>
        <span class="absolute -left-3 inline-block w-3 h-3 bg-green-400 rounded-full animate-pulse"></span>
        <p class="font-semibold">2025 – Series A</p>
        <p class="text-gray-400">Seeking $X M to scale nationally and accelerate product roadmap.</p>
      </li>
    </ol>
  </div>
</section>

  <!-- Use of Proceeds -->
  <section class="bg-gray-800 py-12">
    <div class="max-w-5xl mx-auto px-6">
      <h3 class="text-xl font-bold text-gray-100 mb-4">Use of Proceeds</h3>
      <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-300">
        <li>• Expand product development and AI analytics</li>
        <li>• Scale sales team and channel partnerships</li>
        <li>• Build ESG reporting & customer success tools</li>
        <li>• Working capital and operations</li>
      </ul>
      <p class="mt-6 text-xs text-gray-400">Note: This page is for informational purposes only and does not constitute an offer to sell or a solicitation to buy securities.  Offers will be made only to accredited investors through appropriate legal channels.</p>
    </div>
  </section>

  <section class="max-w-7xl mx-auto px-6 py-14">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
      <!-- LEFT -->
      <div>
        <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight">Current Activities</h2>
        <p class="mt-5 text-[17px] leading-8 text-slate-600">
          We’re helping property portfolios treat water as a managed asset. Our team blends
          <span class="font-semibold text-slate-800">strategic audits</span>—portfolio, site, and fixture-level—with a
          <span class="font-semibold text-slate-800">systems-engineering approach</span> that looks at supply,
          distribution, metering, controls, and end-use together. The result is a clear roadmap pairing targeted
          retrofits with sensing, telemetry, and analytics to reduce consumption, stabilize utility costs, and
          strengthen ESG performance without disrupting operations.
        </p>
        <p class="mt-4 text-[17px] leading-8 text-slate-600">
          Right now, we’re executing multi-site water scope studies, deploying sub-metering and leak intelligence,
          optimizing domestic hot-water recirculation, and building GRESB-ready reporting that converts savings into
          verified outcomes. Our integrated delivery—assessment → design → implementation → monitoring—lets owners and
          operators see fast paybacks and durable NOI uplift.
        </p>
      </div>

      <!-- RIGHT: Chart -->
      <div class="bg-slate-50 rounded-2xl border border-slate-200 shadow-sm p-4">
        <h3 class="text-lg font-semibold text-slate-800 px-2 pt-2">
          Unique Value Proposition: Service vs Technology
        </h3>
        <div class="mt-3 rounded-xl bg-white border border-slate-200 p-3">
          <!-- Fixed height so it always paints -->
          <svg id="uvpChart" viewBox="0 0 640 420" width="100%" height="360" style="display:block;border-radius:10px;"></svg>
        </div>
        <p class="mt-3 text-xs text-slate-500 px-2">
          Positioning compares service completeness (→ “Complete Water Management”) and technology sophistication (↑).
        </p>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="py-16 text-center bg-gray-900" id="cta">
    <h3 class="text-3xl font-bold text-gray-100">Learn how you can be part of the change</h3>
    <p class="mt-4 text-lg text-gray-300">Complete our investor form, and we’ll reach out with our deck and more information.</p>
    <button @click="openModal = true" class="mt-6 px-8 py-3 rounded-full bg-gray-100 text-gray-900 font-semibold shadow hover:bg-white transition">Register Your Interest</button>
  </section>

  <!-- Sign‑Up Modal -->
  <template x-if="openModal">
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
      <div class="bg-white text-gray-800 w-full max-w-md p-8 rounded-xl shadow-lg relative">
        <button @click="openModal = false" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">×</button>
        <h4 class="text-xl font-bold mb-4">Investor Interest Form</h4>
        <form @submit.prevent="openModal = false /* submit to server */">
          <label class="block mb-2">Name</label>
          <input type="text" class="w-full mb-4 border border-gray-300 rounded px-3 py-2" placeholder="Your full name" required>
          <label class="block mb-2">Email</label>
          <input type="email" class="w-full mb-4 border border-gray-300 rounded px-3 py-2" placeholder="Your email" required>
          <label class="block mb-2">Mobile number</label>
          <input type="email" class="w-full mb-4 border border-gray-300 rounded px-3 py-2" placeholder="Your mobile number" required>
          <label class="block mb-2">Investment range (optional)</label>
          <select class="w-full mb-6 border border-gray-300 rounded px-3 py-2">
            <option>$175k–$250k</option>
            <option>$250k–$550k</option>
            <option>$550k+</option>
             <option>$Other</option>
          </select>
          <label class="flex items-start gap-2 mb-4 text-xs"><input type="checkbox" required> I understand this is not a public offering and that further information will be provided only to qualified or accredited investors.</label>
          <button type="submit" class="w-full rounded-full bg-gray-900 text-white py-3 font-semibold hover:bg-black transition">Submit</button>
        </form>
      </div>
    </div>
  </template>
  @endsection

  @push('scripts')
    <script>
      window.addEventListener('DOMContentLoaded', function () {
        // ---- Data (edit freely) ----
        const points = [
          { name: "Traditional Plumbing",       x: 18, y: 24 },
          { name: "Billing / Utility Mgmt",     x: 52, y: 34 },
          { name: "Sustainability Consultant",  x: 34, y: 72 },
          { name: "IoT Sensor Vendor",          x: 74, y: 80 },
          { name: "Generic BMS / Controls",     x: 60, y: 56 },
          { name: "Water Solutions Technology", x: 88, y: 88, primary: true } // YOU
        ];
        // ----------------------------

        const svg = document.getElementById('uvpChart');
        if (!svg) return;

        // Safe viewBox parsing (works everywhere)
        const vb = (svg.getAttribute('viewBox') || '0 0 640 420').split(' ').map(Number);
        const W = vb[2], H = vb[3];

        const m = { top: 48, right: 28, bottom: 56, left: 72 };
        const innerW = W - m.left - m.right;
        const innerH = H - m.top - m.bottom;

        // Helpers
        const sx = v => (v / 100) * innerW;
        const sy = v => innerH - (v / 100) * innerH;
        const N = (tag, attrs = {}, text) => {
          const el = document.createElementNS('http://www.w3.org/2000/svg', tag);
          for (const k in attrs) el.setAttribute(k, attrs[k]);
          if (text) el.textContent = text;
          return el;
        };

        // Clear & base group
        svg.innerHTML = '';
        const g = N('g', { transform: `translate(${m.left},${m.top})` });
        svg.appendChild(g);

        // Background
        g.appendChild(N('rect', { x:0, y:0, width:innerW, height:innerH, rx:10, fill:'#f8fafc' }));

        // Grid (darker so it shows)
        const grid = '#cbd5e1';
        for (let i = 0; i <= 10; i++) {
          const y = (innerH / 10) * i;
          g.appendChild(N('line', { x1:0, y1:y, x2:innerW, y2:y, stroke:grid, 'stroke-width':1 }));
        }
        for (let i = 0; i <= 10; i++) {
          const x = (innerW / 10) * i;
          g.appendChild(N('line', { x1:x, y1:0, x2:x, y2:innerH, stroke:grid, 'stroke-width':1 }));
        }

        // Mid dashed lines
        const mid = '#64748b';
        g.appendChild(N('line', { x1:innerW/2, y1:0, x2:innerW/2, y2:innerH, stroke:mid, 'stroke-dasharray':'6,6' }));
        g.appendChild(N('line', { x1:0, y1:innerH/2, x2:innerW, y2:innerH/2, stroke:mid, 'stroke-dasharray':'6,6' }));

        // Axes
        const axis = '#0f172a';
        g.appendChild(N('line', { x1:0, y1:innerH, x2:innerW, y2:innerH, stroke:axis, 'stroke-width':2 }));
        g.appendChild(N('line', { x1:0, y1:innerH, x2:0, y2:0, stroke:axis, 'stroke-width':2 }));

        // Axis labels
        svg.appendChild(N('text', {
          x: m.left + innerW/2, y: H - 18, 'text-anchor':'middle',
          fill: axis, 'font-size': 12, 'font-weight': 700
        }, 'Service Completeness → (toward Complete Water Management)'));

        svg.appendChild(N('text', {
          x: 16, y: m.top + innerH/2,
          transform: `rotate(-90, 16, ${m.top + innerH/2})`,
          'text-anchor':'middle', fill: axis, 'font-size': 12, 'font-weight': 700
        }, 'Technology Sophistication ↑'));

        // Glow filter for your point
        const defs = N('defs');
        const f = N('filter', { id:'glow', x:'-50%', y:'-50%', width:'200%', height:'200%' });
        f.appendChild(N('feGaussianBlur', { stdDeviation:3, result:'b' }));
        const merge = N('feMerge');
        merge.appendChild(N('feMergeNode', { in:'b' }));
        merge.appendChild(N('feMergeNode', { in:'SourceGraphic' }));
        f.appendChild(merge);
        defs.appendChild(f);
        svg.appendChild(defs);

        // Points
        points.forEach(p => {
          const x = sx(p.x), y = sy(p.y);
          const group = N('g', { transform:`translate(${m.left + x},${m.top + y})` });

          group.appendChild(N('circle', {
            r: p.primary ? 8 : 5,
            fill: p.primary ? '#0f172a' : '#334155',
            stroke: p.primary ? '#0f172a' : '#475569',
            'stroke-width': p.primary ? 0 : 1,
            filter: p.primary ? 'url(#glow)' : ''
          }));

          group.appendChild(N('text', {
            x: 10, y: -10, fill: '#0f172a',
            'font-size': p.primary ? 12.5 : 11, 'font-weight': p.primary ? 800 : 600
          }, p.name));

          group.appendChild(N('title', {}, `${p.name}\nService: ${p.x} • Tech: ${p.y}`));
          svg.appendChild(group);
        });
      });
    </script>
  @endpush
