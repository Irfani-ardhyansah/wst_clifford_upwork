@extends('layouts.app')
@section('title', 'Smart Water Monitoring Services')

@push('styles')
  <style>
    @keyframes ripple {
      0% {
        transform: translate(-50%, -50%) scale(1);
        opacity: 0.8;
      }
      100% {
        transform: translate(-50%, -50%) scale(4);
        opacity: 0;
      }
    }
    /* Base for each site marker */
    .pulse-marker {
      position: relative;
      width: 6px;
      height: 6px;
      background: #3B82F6;
      border-radius: 50%;
    }
    /* radiating circle */
    .pulse-marker::before {
      content: '';
      position: absolute;
      top: 50%; left: 50%;
      width: 6px; height: 6px;
      border: 2px solid rgba(59,130,246,0.7);
      border-radius: 50%;
      transform: translate(-50%, -50%) scale(1);
      animation: ripple 2s ease-out infinite;
    }
    /* tooltip styling */
    .leaflet-tooltip.water-tooltip {
      background: rgba(22,24,29,0.85) !important;
      color: #fff !important;
      border-radius: 0.5rem !important;
      padding: 0.75rem !important;
      box-shadow: 0 2px 8px rgba(0,0,0,0.5) !important;
      font-size: 0.875rem !important;
    }
  </style>
@endpush

@section('content')
  <section class="relative min-h-[520px] flex items-center justify-start overflow-hidden bg-black">
    <img 
      src="/assets/img/services/smart_water_monitoring_1.mov"
      alt="Modern hotel or commercial building"
      class="absolute inset-0 w-full h-full object-cover grayscale opacity-55 z-0" />
    <div class="absolute inset-0 bg-black bg-opacity-20 z-10"></div>
  
    <div class="relative z-20 max-w-2xl pl-6 md:pl-16 py-16">
      <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight drop-shadow">
        Smart Water Monitoring<br/>for Complete Asset Visibility
      </h1> 
      <p class="text-lg md:text-xl text-gray-100 font-light mb-7 max-w-xl">
        <span class="block"> Monitor whole-building flows, sub-meter key assests, detect leaks instantly—and optimize usage across your site and entire portfolio. 
          <span class="font-bold text-white">20–45% </span> water savings</span>
        <span class="text-gray-300 block mt-2"> 
        Track total site consumption at a glance—no more manual reads or billing surprises
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
  
    <div class="absolute bottom-8 right-8 bg-black bg-opacity-50 text-white p-6 w-80 shadow-2xl rounded-none z-30 flex flex-col items-start
                max-md:relative max-md:bottom-0 max-md:right-0 max-md:mx-auto max-md:w-11/12 max-md:mt-10">
      <div class="text-base mb-2 font-semibold">
        Smart Monitoring Uncovered <br />
        <span class="text-xl font-bold"> 15 alerts/month/site</span> savings
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
  
  <section id="whole-building-monitoring" class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
      
      <div class="space-y-8">
        <h2 class="text-4xl font-extrabold text-gray-900">
          Enterprise-Wide Water Visibility
        </h2>
        <p class="mt-2 text-lg text-gray-700 max-w-2xl">
          Get a single pane of glass on every drop across your entire property portfolio.  
          Near real-time analytics uncover hidden inefficiencies, protect assets, 
          and arm the C-suite with bullet-proof water KPI reporting.
        </p>
  
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <div class="bg-gray-50 p-6 shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Live Consumption Dashboards</h3>
            <p class="text-gray-600">
              Aggregate flow, pressure, level and cost across all meters — updated every minute.
            </p>
          </div>
          <div class="bg-gray-50 p-6 shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Automated Alerts & Trends</h3>
            <p class="text-gray-600">
              Threshold-based notifications for spikes, drifts or leaks, plus rolling 12-month trends.
            </p>
          </div>
          <div class="bg-gray-50 p-6 shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Executive Reporting</h3>
            <p class="text-gray-600">
              One-click PDF exports of actual vs. budgeted use, carbon & cost savings — fit for boardrooms.
            </p>
          </div>
        </div>
      </div>
  
      <div>
        <div id="usWaterMap" class="w-full h-96 rounded-none shadow-lg overflow-hidden"></div>
      </div>
    </div>
  </section>
  
  <section id="site-asset-monitoring" class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-6 md:flex md:items-center md:space-x-12">
      <div class="flex-1 mb-8 md:mb-0">
        <img src="/assets/img/services/water_monitoring.png" alt="Asset-level water metering" class="w-full h-auto rounded shadow-lg"/>
      </div>
  
      <div class="flex-1 space-y-6">
        <h2 class="text-4xl font-extrabold text-gray-900">
          Site & Asset-Specific Insights
        </h2>
        <p class="text-lg text-gray-700">
          Drill down to individual boilers, chillers, tenant suites or rooftop gardens.  Understand exactly where to intervene, schedule maintenance and validate savings at the device level.
        </p>
  
        <ul class="list-disc list-inside text-gray-700 space-y-2">
          <li><strong>Per-meter breakouts</strong> — visualize make-up vs. discharge at any pipe or valve.</li>
          <li><strong>Condition-based routing</strong> — push critical alarms to engineering teams instantly.</li>
          <li><strong>Historical playback</strong> — replay last month’s flow map to pinpoint abnormal cycles.</li>
        </ul>
  
        <a
          href="/technologies/cooling-tower-monitoring"
          class="inline-block mt-4 font-semibold text-blue-600 hover:underline"
        >
          → Explore Cooling Tower Monitoring
        </a>
      </div>
    </div>
  </section>
  
  <section id="water-monitoring" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
  
      <div class="space-y-6">
        <h2 class="text-4xl font-extrabold text-gray-900">
          Water Monitoring Intelligence
        </h2>
  
        <p class="text-lg text-gray-700">
          Gain full visibility into your portfolio’s water usage. Real-time alerts, leak detection and AI-driven insights help you cut waste and drive 20–30% savings—all with sub-10-month payback.
        </p>
  
        <ul class="space-y-3 text-gray-700">
          <li class="flex items-start">
            <svg class="w-5 h-5 flex-shrink-0 text-blue-600 mr-2 mt-1" fill="currentColor" viewBox="0 0 20 20">
              <path d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"/>
            </svg>
            <span>
              <strong>Meter Integration:</strong>
              Connect your existing main and sub-meters—no new hardware required.
            </span>
          </li>
          <li class="flex items-start">
            <svg class="w-5 h-5 flex-shrink-0 text-blue-600 mr-2 mt-1" fill="currentColor" viewBox="0 0 20 20">
              <path d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"/>
            </svg>
            <span>
              <strong>Data Aggregation:</strong>
              Streams from all meters feed into our cloud platform—centralizing usage data.
            </span>
          </li>
          <li class="flex items-start">
            <svg class="w-5 h-5 flex-shrink-0 text-blue-600 mr-2 mt-1" fill="currentColor" viewBox="0 0 20 20">
              <path d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"/>
            </svg>
            <span>
              <strong>Analytics &amp; Alerts:</strong>
              Dashboards, trend analysis, leak detection, and customizable alerts keep you in control.
            </span>
          </li>
        </ul>
        <a href="#" 
          class="group mt-8 inline-flex items-center rounded-full px-6 py-3 bg-gray-900 text-white font-semibold shadow-md 
            hover:shadow-lg hover:-translate-y-0.5 transition-all">
          <span>Request a Demo</span>
          <span class="ml-4 grid place-items-center w-9 h-9 rounded-full">
            <i class="ri-arrow-right-up-line ml-3"></i>
          </span>
        </a>
      </div>
  
      <div class="space-y-6">
        <div class="bg-gray-900 text-white p-6 no-round shadow-lg">
          <h3 class="sr-only">Water Monitoring Metrics</h3>
          <div class="grid grid-cols-2 gap-y-6 gap-x-4 text-center">
            <div>
              <p class="text-3xl font-bold">256</p>
              <p class="text-sm text-gray-300">Alerts Delivered</p>
            </div>
            <div>
              <p class="text-3xl font-bold">78</p>
              <p class="text-sm text-gray-300">Leaks Caught</p>
            </div>
            <div>
              <p class="text-3xl font-bold">1.2M</p>
              <p class="text-sm text-gray-300">Gal Saved / yr</p>
            </div>
            <div>
              <p class="text-3xl font-bold">$45K</p>
              <p class="text-sm text-gray-300">Estimated Savings</p>
            </div>
            <div>
              <p class="text-3xl font-bold">8mo</p>
              <p class="text-sm text-gray-300">Avg. Payback</p>
            </div>
            <div>
              <p class="text-3xl font-bold">30</p>
              <p class="text-sm text-gray-300">Alerts Last 30 Days</p>
            </div>
          </div>
        </div>
  
        <blockquote class="border-l-4 border-blue-600 pl-4 italic text-gray-800">
          “We have saved <strong>$2,000/month</strong> thanks to early leak detection at our Miami site.”
          <span class="block mt-2 font-semibold">—Property Manager, Ocean One Condominium</span>
        </blockquote>
        <a
          href="/technologies/cooling-tower-monitoring"
          class="inline-block mt-4 font-semibold text-blue-600 hover:underline"
        >
          Learn More → 
        </a>
        <p class="mt-2 text-gray-700">See how we helped a mixed-use campus reduce water costs by 30% in 4 months.</p>
      </div>
  
    </div>
  </section>
  
  <section class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12">
      <div class="flex flex-col justify-center space-y-6">
        <h2 class="text-3xl md:text-4xl font-serif font-semibold uppercase text-gray-900 leading-tight">
          Transform Hidden Water Challenges to Opportunities 
        </h2>
        <p class="text-lg text-gray-700 max-w-md">
          Request a confidential flow management audit to optimize your property’s profitability.
        </p>
        <a href="#"
          class="group mt-8 inline-flex items-center justify-between rounded-full bg-zinc-100 text-zinc-900 px-6 py-3 font-semibold
            shadow-lg shadow-black/20 transition-all duration-300 hover:-translate-y-1 hover:bg-white">
          <span>Schedule a Confidential Consultation</span>
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
     document.addEventListener('DOMContentLoaded', function() {
    // initialize Leaflet
    const map = L.map('usWaterMap', {
      center: [37.8, -96.0],
      zoom: 4,
      zoomControl: false,
      attributionControl: false
    });

    // dark‐theme tiles
    L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
      maxZoom: 19
    }).addTo(map);

    // utility for random data
    function randInt(min, max){ return Math.floor(Math.random()*(max-min+1))+min; }

    // place 40 DivIcon markers
    for(let i=0; i<40; i++){
      const lat = 25 + Math.random()*24;
      const lng = -125 + Math.random()*58;
      const data = {
        alerts: randInt(150,400),
        leaks:  randInt(50,120),
        saved:  (randInt(8,15)/10).toFixed(1) + 'M',
        pay:    randInt(6,12) + ' mo',
        last30: randInt(20,50)
      };
      const tooltipHtml = `
        <strong>Site #${i+1}</strong><br>
        Alerts: ${data.alerts}<br>
        Leaks Caught: ${data.leaks}<br>
        Saved: ${data.saved} gal/yr<br>
        Avg Payback: ${data.pay}<br>
        Alerts (30d): ${data.last30}
      `;
      // create DivIcon
      const icon = L.divIcon({
        className: 'pulse-marker',
        iconSize: [6,6],
        iconAnchor: [3,3]
      });
      const marker = L.marker([lat,lng], { icon }).addTo(map);
      marker.bindTooltip(tooltipHtml, {
        direction: 'top',
        offset: [0, -8],
        className: 'water-tooltip'
      });
      marker.on('mouseover', () => marker.openTooltip());
      marker.on('mouseout',  () => marker.closeTooltip());
    }
  });

      document.addEventListener('DOMContentLoaded', function () {
  // --- your existing map init here ---
  const map = L.map('usWaterMap', {
    center: [37.8, -96.0],
    zoom: 4,
    zoomControl: false,
    attributionControl: false,
  });
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19 }).addTo(map);

  // === now add your interactive markers ===
  const sites = [
    {
      name: 'Los Angeles',
      coords: [34.05, -118.24],
      html:
        '<strong>Los Angeles</strong><br>' +
        '256 Alerts Delivered<br>' +
        '1.2M Gal Saved / yr<br>' +
        '8 mo Avg Payback<br>' +
        '30 Alerts (last 30d)'
    },
    {
      name: 'New York',
      coords: [40.71, -74.00],
      html:
        '<strong>New York</strong><br>' +
        '300 Alerts Delivered<br>' +
        '1.5M Gal Saved / yr<br>' +
        '7 mo Avg Payback<br>' +
        '42 Alerts (last 30d)'
    },
    {
      name: 'Miami',
      coords: [25.77, -80.19],
      html:
        '<strong>Miami</strong><br>' +
        '284 Alerts Delivered<br>' +
        '1.1M Gal Saved / yr<br>' +
        '9 mo Avg Payback<br>' +
        '36 Alerts (last 30d)'
    }
  ];

  sites.forEach(site => {
    const marker = L.circleMarker(site.coords, {
      radius: 8,
      fillColor: '#3B82F6',
      color: '#fff',
      weight: 2,
      fillOpacity: 0.9
    }).addTo(map);

    // bindTooltip so it shows on hover
    marker.bindTooltip(site.html, {
      direction: 'top',
      offset: [0, -10],
      className: 'bg-black text-white p-2 rounded shadow'
    });

    // optional: open on hover, close on mouseout
    marker.on('mouseover', () => marker.openTooltip());
    marker.on('mouseout',  () => marker.closeTooltip());
  });
});
 document.addEventListener('DOMContentLoaded', function () {
    // initialize map
    const map = L.map('usWaterMap', {
      center: [37.8, -96.0],
      zoom: 4,
      zoomControl: false,
      attributionControl: false,
    });

    // light basemap
    L.tileLayer(
      'https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}{r}.png',
      { maxZoom: 19 }
    ).addTo(map);

    // subtle overlay
    L.tileLayer(
      'https://{s}.basemaps.cartocdn.com/rastertiles/voyager_nolabels/{z}/{x}/{y}{r}.png',
      { maxZoom: 19, opacity: 0.3 }
    ).addTo(map);

    // demo: scatter 40 blue markers (replace with your coords)
    for (let i = 0; i < 40; i++) {
      const lat = 25 + Math.random() * 24;
      const lng = -125 + Math.random() * 58;
      L.circleMarker([lat, lng], {
        radius: 5,
        fillColor: '#2563EB',
        color: '#fff',
        weight: 1.5,
        fillOpacity: 0.9,
      }).addTo(map);
    }
  });
     </script>
     @endpush