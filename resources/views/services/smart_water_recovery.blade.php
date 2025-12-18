@extends('layouts.app')

@section('title', 'Smart Water Treatment & Recovery Services')

@push('styles')
<style>
  /* initial state for animated rule */
  .rule {
    opacity: 0;
    transform: translateY(1rem);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
  }
  /* when it scrolls into view */
  .rule.visible {
    opacity: 1;
    transform: translateY(0);
  }
  /* Pulsing marker animation */
  @keyframes pulse {
    0%   { transform: scale(1); opacity: 0.8; }
    70%  { transform: scale(3); opacity: 0; }
    100% { transform: scale(3); opacity: 0; }
  }
  .pulse-marker {
    position: relative;
    width: 8px; height: 8px;
    background: #3B82F6;
    border: 2px solid #fff;
    border-radius: 50%;
    box-shadow: 0 0 6px rgba(59,130,246,0.8);
  }
  .pulse-marker::after {
    content: '';
    position: absolute;
    top: -8px; left: -8px;
    width: 24px; height: 24px;
    border-radius: 50%;
    background: rgba(59,130,246,0.4);
    animation: pulse 2s infinite;
  }
  /* Dark tooltip */
  .leaflet-tooltip.dark-tooltip {
    background: rgba(31,41,55,0.9) !important;
    color: #fff !important;
    border-radius: 0.5rem !important;
    padding: 0.5rem 0.75rem !important;
    box-shadow: 0 2px 8px rgba(0,0,0,0.5) !important;
    font-size: 0.875rem !important;
  }
  .loader {
  border:4px solid #f3f3f3;
  border-top:4px solid #071016;
  border-radius:50%;
  width:24px; height:24px;
  animation:spin 1s linear infinite;
}
@keyframes spin {
  to{transform:rotate(360deg)}
}
.transform-content { opacity:0; transition:opacity .5s ease; }
.transform-content.visible { opacity:1; }
</style>
@endpush

@section('content')
        <section class="relative min-h-[520px] flex items-center justify-start overflow-hidden bg-black">
          <img 
            src="/assets/img/services/water_treatment_recovery_1.png"
            alt="Modern hotel or commercial building"
            class="absolute inset-0 w-full h-full object-cover grayscale opacity-55 z-0" />
          <div class="absolute inset-0 bg-black bg-opacity-15 z-10"></div>
        
          <div class="relative z-20 max-w-2xl pl-6 md:pl-16 py-16">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight drop-shadow">
              Modern Water Treatment & Recovery 
            </h1>
            <p class="text-lg md:text-xl text-gray-100 font-light mb-7 max-w-xl">
              <span class="block"> <span class="font-bold text-white">When water itself becomes the problem: we use the same water as the solution
              </span> </span>
              <span class="text-gray-300 block mt-2">
                Using advanced electro-hydrodynamic 
                technology to protect your infrastructure, 
                reduce scale, and reclaim water—without 
                chemicals, power, or moving parts
              </span>
            </p>
            <a href="#"
              class="group inline-flex items-center justify-between rounded-full bg-white text-zinc-900 px-6 py-3 font-semibold
                shadow-lg shadow-black/20 transition-all duration-300 hover:-translate-y-1 hover:bg-white">
              <span>Request a Tower Audit</span>
              <span class="ml-4 grid place-items-center w-9 h-9 rounded-full bg-zinc-900/10 text-zinc-900 transition-transform duration-300 group-hover:rotate-45">
                <i class="ri-arrow-right-up-line"></i>
              </span>
            </a>
          </div>
        
          <div class="absolute bottom-8 right-8 bg-black bg-opacity-90 text-white p-6 w-80 shadow-2xl rounded-none z-30 flex flex-col items-start
                      max-md:relative max-md:bottom-0 max-md:right-0 max-md:mx-auto max-md:w-11/12 max-md:mt-10">
            <div class="text-base mb-2 font-semibold">
              Audit uncovered <br />
              <span class="text-xl font-bold">180,000 gal/month</span> savings
            </div>
            <div class="flex items-end space-x-1 mb-2 mt-2">
              <svg width="150" height="68" viewBox="0 0 80 32" fill="none">
                <rect x="5" y="16" width="8" height="12" fill="#888"/>
                <rect x="20" y="8" width="8" height="20" fill="#bbb"/>
                <rect x="35" y="12" width="8" height="16" fill="#ccc"/>
                <rect x="50" y="4" width="8" height="24" fill="#fff"/>
              </svg>
            </div>
            <div class="text-sm text-gray-200">
              Payback in <span class="font-bold">6.3</span> months<br>
              <span class="text-xs">verified savings by WST</span>
            </div>
          </div>
        </section>
        
        <section id="treatment-problem" class="bg-gray-50 py-20">
          <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
              <h2 class="text-4xl font-extrabold text-gray-900">
                The Challenge of Scale &amp; Corrosion
              </h2>
              <h3 class="text-xl font-semibold text-blue-600">
                When water itself becomes the problem…
              </h3>
              <p class="text-gray-700 leading-relaxed">
                Mineral deposits (calcium & magnesium) constrict flow and add up to a 15% energy 
                penalty across pipes, chillers and domestic equipment—driving up utility bills 
                and maintenance costs. In chillers, even a thin scale film acts like insulation, 
                forcing compressors to run longer and shortening equipment life. 
                Our non-chemical electrostatic treatment restores peak efficiency, 
                extends asset lifecycles and typically pays for itself in under 
                12 months—cooling towers included.
              </p>
              <p class="text-gray-700 leading-relaxed">
                In industrial chillers, scale acts as an insulator—chillers work harder, energy bills climb, and maintenance cycles shorten. Tackling the root cause is critical to safeguarding your assets.
              </p>
              <a href="#cooling-impacts" class="inline-block font-medium text-blue-600 hover:underline">
                Read more on Cooling Tower Impacts →
              </a>
            </div>
            <div class="flex justify-center">
              <img src="/assets/img/services/scaling_in_pipes_1.png" alt="Cross-section of pipe with scale" class="rounded shadow-lg w-full object-cover" />
            </div>
          </div>
        </section>
        
        <section id="treatment-hardness" class="bg-gray-50 py-16">
          <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div class="space-y-6">
              <h2 class="text-4xl font-extrabold text-gray-900">
                Smart Water Treatment & Hardness Insights
              </h2>
              <p class="text-lg text-gray-700">
                Mineral scale (calcium & magnesium) builds in pipes and cooling towers—restricting flow, spiking energy, accelerating corrosion, and risking unplanned downtime.
              </p>
              <ul class="space-y-3 text-gray-700">
                <li class="flex items-start">
                  <svg class="w-5 h-5 flex-shrink-0 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"/>
                  </svg>
                  <span><strong>Flow Restoration:</strong> Clears mineral blockages and normalizes system pressure.</span>
                </li>
                <li class="flex items-start">
                  <svg class="w-5 h-5 flex-shrink-0 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"/>
                  </svg>
                  <span><strong>Energy Savings:</strong> Reduces blowdowns and lowers thermal-transfer losses.</span>
                </li>
                <li class="flex items-start">
                  <svg class="w-5 h-5 flex-shrink-0 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"/>
                  </svg>
                  <span><strong>Asset Longevity:</strong> Slows corrosion and extends pump, chiller & boiler lifecycles.</span>
                </li>
              </ul>
              <p class="text-gray-700">
                Ideal for whole-building piping, boilers, chillers—and yes, even cooling towers.
              </p>
              <a href="#" 
                class="group mt-8 inline-flex items-center rounded-full px-6 py-3 bg-gray-900 text-white font-semibold shadow-md 
                  hover:shadow-lg hover:-translate-y-0.5 transition-all">
                <span>Request a Demo</span>
                <span class="ml-4 grid place-items-center w-9 h-9 rounded-full">
                  <i class="ri-arrow-right-up-line ml-3"></i>
                </span>
              </a>
            </div>
        
            <div>
              <div id="hardnessMap" class="w-full h-96 rounded-lg shadow-xl overflow-hidden"></div>
            </div>
          </div>
        </section>
        
        <section id="treatment-recovery" class="bg-white py-16">
          <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
            
            <div class="space-y-6">
              <h2 class="text-3xl font-extrabold text-gray-900">
                Non-Invasive Treatment & Recovery
              </h2>
              <p class="text-lg text-gray-700 leading-relaxed">
                Our proprietary electrostatic technology induces crystal precipitation in-flow—preventing scale before it starts. No chemicals. No added power draw. No moving parts.
              </p>
              <ul class="space-y-4 text-gray-700">
                <li>
                  <strong>Scale Inhibition</strong> — magnetically aline dissolved minerals to precipitate downstream, keeping pipes and towers clean.
                </li>
                <li>
                  <strong>Water Reclamation</strong> — capture and reuse blowdown for non-potable applications, cutting makeup water costs by up to 60%.
                </li>
                <li>
                  <strong>Plug-and-Play</strong> — install inline on any pipe material, from ½″ sub-meters to 42″ mains with no downtime.
                </li>
              </ul>
              <a href="#technology-details" class="inline-flex items-center text-blue-600 font-semibold hover:underline">
                Read more about the technology →
              </a>
            </div>
            
            <div class="h-64 md:h-100 bg-gray-100 rounded-lg overflow-hidden shadow-lg">
              <img
                src="/assets/img/services/scale_remover_1.png"
                alt="Electrostatic treatment unit installed inline"
                class="w-full h-full object-cover"
              />
            </div>
            
            <div class="h-64 md:h-100 bg-gray-100 rounded-lg overflow-hidden shadow-lg">
              <img
                src="/assets/img/services/scale_in_pipes_1.png"
                alt="Blowdown water reclamation and reuse diagram"
                class="w-full h-full object-cover"
              />
            </div>
        
          </div>
        </section>
        
        <section class="bg-white py-20">
          <div
            x-data="{
              selected: 0,
              features: [
                {
                  label: '97% Scale Reduction',
                  header: '97% Scale Reduction',
                  desc: '97% scale reduction across all asset classes. Increasing asses health'
                },
                {
                  label: '25% reduction in energy across portfolio',
                  header: '25% reduction in energy across portfolio',
                  desc: ' Reduce expenses in energy spend from normalized heat transfer'
                },
                {
                  label: '95% Savings Replacing Chemical Cost',
                  header: '95% Savings Replacing Chemical Cost',
                  desc: 'No chemicals, or additional power draw. Unlike systems that use harsh chemicals to dissolve scale and corrosion and contribute toxic pollutants to groundwater, the systems works without chemicals. '
                },
                {
                  label: 'Reduces WATER use by up to 40% ',
                  header: 'Reduces WATER use by up to 40% ',
                  desc: 'In non volumetric uses, water use have been reduced to 40%'
                },
                
              ]
            }"
            class="max-w-7xl mx-auto px-4 grid md:grid-cols-5 gap-10 items-stretch"
          >
            <div class="col-span-2 flex flex-col">
              <h3 class="text-3xl font-bold text-gray-900 mb-8 text-left">
                Financial Implications & Asset Protection
              </h3>
              <ul class="space-y-3">
                <template x-for="(item, idx) in features" :key="idx">
                  <li>
                    <button
                      @click="selected = idx"
                      :class="selected === idx
                        ? 'text-blue-700 font-bold'
                        : 'text-gray-600 font-normal'"
                      class="text-lg px-2 py-1 w-full text-left transition hover:text-blue-500 focus:outline-none"
                    >
                      <span x-text="item.label"></span>
                    </button>
                  </li>
                </template>
              </ul> 
            </div>
            
            <div class="col-span-3 relative min-h-[330px] flex items-center">
              <video
                class="absolute inset-0 w-full h-full object-cover z-0"
                autoplay
                loop
                muted
                playsinline
                poster="https://images.unsplash.com/photo-1465101162946-4377e57745c3?auto=format&fit=crop&w=1200&q=80"
              >
                <source
                  src="/assets/img/services/elara_ai_video_3.mp4"
                  type="video/mp4"
                />
              </video>
              <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>
              <div class="relative z-20 p-10 w-full text-left">
                <h4
                  class="text-3xl font-semibold text-white mb-3"
                  x-text="features[selected].header"
                ></h4>
                <p
                  class="text-lg font-light text-gray-100 mb-6"
                  x-text="features[selected].desc"
                ></p>
                <a
                  href="#"
                  class="inline-flex items-center text-blue-200 font-medium hover:underline gap-2"
                >
                  More about our approach
                  <svg
                    class="w-4 h-4"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M5 12h14m-7-7l7 7-7 7"
                    />
                  </svg>
                </a>
              </div>
            </div>
          </div>
          
        </section>
        
        <section id="featured-performance" class="py-20 bg-white">
          <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
            <div class="space-y-8">
              <h2 class="text-4xl font-extrabold text-gray-900">
                Featured Performance
              </h2>
              <blockquote class="border-l-4 border-blue-600 pl-6 italic text-gray-800 space-y-4">
                <p class="text-lg">
                  “Since rolling out treatment across our 15-building portfolio, we’ve cut energy costs by <strong>28%</strong> and avoided <strong>$350K</strong> in unplanned outages.”
                </p>
                <footer class="text-base font-semibold not-italic">
                  — Director of Engineering, Crestline Properties
                </footer>
              </blockquote>
              <a href="#" 
                class="group mt-8 inline-flex items-center rounded-full px-6 py-3 bg-gray-900 text-white font-semibold shadow-md 
                  hover:shadow-lg hover:-translate-y-0.5 transition-all">
                <span>Request a Demo</span>
                <span class="ml-4 grid place-items-center w-9 h-9 rounded-full">
                  <i class="ri-arrow-right-up-line ml-3"></i>
                </span>
              </a>
            </div>
        
            <div class="bg-gray-900 text-white p-6 shadow-lg rounded-none">
              <div class="grid grid-cols-2 divide-x divide-gray-700">
                <div class="py-6 text-center">
                  <p class="text-5xl font-light">120</p>
                  <p class="mt-1 uppercase tracking-wide font-medium text-gray-400 text-sm">Sites Deployed</p>
                </div>
                <div class="py-6 text-center">
                  <p class="text-5xl font-light">18M</p>
                  <p class="mt-1 uppercase tracking-wide font-medium text-gray-400 text-sm">Gallons Saved / yr</p>
                </div>
                <div class="py-6 text-center">
                  <p class="text-5xl font-light">3.8x</p>
                  <p class="mt-1 uppercase tracking-wide font-medium text-gray-400 text-sm">Avg. Energy ROI</p>
                </div>
                <div class="py-6 text-center">
                  <p class="text-5xl font-light">45</p>
                  <p class="mt-1 uppercase tracking-wide font-medium text-gray-400 text-sm">Avg. Alerts / Site</p>
                </div>
              </div>
            </div>
          </div>
        </section>
        
        
        <section class="bg-gray-50 py-16">
          <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="flex flex-col justify-center space-y-6">
              <h2 class="text-3xl md:text-4xl font-serif font-semibold uppercase text-gray-900 leading-tight">
                Protect Your Asset Performance
              </h2>
              <p class="text-lg text-gray-700 max-w-md">
                Request a confidential water audit to optimize your property’s health and profitability.
              </p>
              <a href="#"
                class="group mt-8 inline-flex items-center justify-between rounded-full bg-zinc-100 text-zinc-900 px-6 py-3 font-semibold
                  shadow-lg shadow-black/20 transition-all duration-300 hover:-translate-y-1 hover:bg-white">
                <span>Schedule a Demo</span>
                <span class="ml-4 grid place-items-center w-9 h-9 rounded-full bg-zinc-900/10 text-zinc-900 transition-transform duration-300 group-hover:rotate-45">
                  <i class="ri-arrow-right-up-line"></i>
                </span>
              </a>
            </div>
        
            <div id="schedule-demo">
              <form class="bg-white p-6 rounded-md shadow-md space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <input type="text" placeholder="First Name" required
                         class="w-full border border-gray-300 p-3 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                  <input type="text" placeholder="Last Name" required
                         class="w-full border border-gray-300 p-3 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <input type="text" placeholder="Company Name" required
                         class="w-full border border-gray-300 p-3 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                  <input type="text" placeholder="Company Role" required
                         class="w-full border border-gray-300 p-3 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <input type="tel" placeholder="Contact Number" required
                         class="w-full border border-gray-300 p-3 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                  <input type="email" placeholder="Email" required
                         class="w-full border border-gray-300 p-3 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div class="flex flex-col">
                    <label for="demo-date" class="mb-1 text-gray-600 font-medium">Preferred Date</label>
                    <input id="demo-date" type="date" required
                           class="w-full border border-gray-300 p-3 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                  </div>
                  <div class="flex flex-col">
                    <label for="demo-time" class="mb-1 text-gray-600 font-medium">Preferred Time</label>
                    <input id="demo-time" type="time" required
                           class="w-full border border-gray-300 p-3 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                  </div>
                </div>
                <div>
                  <textarea placeholder="Additional Message (optional)" rows="4"
                            class="w-full border border-gray-300 p-3 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                <div>
                  <a href="#" 
                    class="w-full group inline-flex items-center rounded-full px-6 py-3 bg-gray-900 text-white font-semibold shadow-md 
                      hover:shadow-lg hover:-translate-y-0.5 transition-all">
                    <span>Submit Request</span>
                    <span class="ml-auto grid place-items-center w-9 h-9 rounded-full">
                      <i class="ri-arrow-right-up-line ml-3"></i>
                    </span>
                  </a>
                </div>
              </form>
            </div>
          </div>
        </section>
@endsection
@push('scripts')
     <script>
       document.addEventListener('DOMContentLoaded', () => {
    // 1) initialize map
    const map = L.map('hardnessMap', {
      center: [39.5, -98.35],
      zoom: 4,
      zoomControl: false,
      attributionControl: false
    });

    // 2) dark basemap
    L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png',{
      maxZoom: 19
    }).addTo(map);

    // 3) sample 40 site data (city, [lat,lng], gpg)
    const sites = [
      ["Phoenix, AZ",[33.45,-112.07],12],
      ["Denver, CO",[39.74,-104.99],8],
      ["Miami, FL",[25.77,-80.19],15],
      ["Minneapolis, MN",[44.98,-93.27],3],
      ["New York, NY",[40.71,-74.00],7],
      ["Los Angeles, CA",[34.05,-118.24],10],
      ["Houston, TX",[29.76,-95.37],14],
      ["Chicago, IL",[41.88,-87.63],9],
      // …add 32 more entries here to total 40…
    ];

    // label helper
    function gradeLabel(g){
      if(g <= 3 ) return "Slightly Hard";
      if(g <= 7 ) return "Moderate Hard";
      if(g <= 10) return "Hard";
      if(g <= 14) return "Very Hard";
      return "Extreme Hard";
    }

    // 4) drop 40 pulsing markers
    sites.forEach(([city,latlng,g]) => {
      const icon = L.divIcon({
        className: 'pulse-marker',
        iconSize: [8,8],
        iconAnchor: [4,4]
      });
      const m = L.marker(latlng, { icon }).addTo(map);

      // tooltip
      const html = `
        <strong>${city}</strong><br>
        Hardness: ${g} gpg (${gradeLabel(g)})
      `;
      m.bindTooltip(html, {
        direction:'top', offset:[0,-10], className:'dark-tooltip'
      });
      m.on('mouseover', ()=>m.openTooltip());
      m.on('mouseout', ()=>m.closeTooltip());
    });
  });


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

  document.addEventListener('DOMContentLoaded', () => {
  const btn = document.getElementById('get-ai-advice-btn');
  const input = document.getElementById('ai-challenge-input');
  const loader = document.getElementById('ai-loader');
  const err = document.getElementById('ai-error-msg');

  btn.addEventListener('click', async () => {
    const challenge = input.value.trim();
    if (!challenge) {
      err.textContent = 'Please describe your challenge first.';
      err.classList.remove('hidden');
      return;
    }
    loader.classList.remove('hidden');
    err.classList.add('hidden');
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
        headers: {'Content-Type':'application/json'},
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
      document.getElementById('transform-overlay-link').href = data.overlayLink||'#';
    } catch (e) {
      err.textContent = "Could not generate advice. Try again later.";
      err.classList.remove('hidden');
      console.error(e);
    } finally {
      loader.classList.add('hidden');
      btn.disabled = false;
    }
  });
});
     </script>
@endpush
