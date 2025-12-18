@extends('layouts.app')

@section('title', 'Water Solutions Technology')

  @push('styles')
  <style>
    /* Lock chart size */
    #instantCocChart {
      width: 100%  !important;
      height: 260px !important;
    }
  </style>
  @endpush
@section('content')
  <section class="relative min-h-[520px] flex items-center justify-start overflow-hidden bg-black">
    <img 
      src="/assets/img/services/cooling_tower_1.png"
      alt="Modern hotel or commercial building"
      class="absolute inset-0 w-full h-full object-cover grayscale opacity-55 z-0" />
    <div class="absolute inset-0 bg-black bg-opacity-20 z-10"></div>
  
    <div class="relative z-20 max-w-2xl pl-6 md:pl-16 py-16">
      <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight drop-shadow">
        Cooling Tower Intelligence: Balancing OpEx & CapEx
      </h1> 
      <p class="text-lg md:text-xl text-gray-100 font-light mb-7 max-w-xl">
        <span class="block"> Leverage real-time flow metering and smart CoC (Cycles of Concentration) control to unlock <span class="font-bold text-white">20–45% </span> water savings</span>
        <span class="text-gray-300 block mt-2"> 
        A trusted, science driven process for quantifiable savings, compliance, and true operational resilience.
        </span>
      </p>
      <a href="#"
        class="group mt-8 inline-flex items-center justify-between rounded-full bg-zinc-100 text-zinc-900 px-6 py-3 font-semibold
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
  
  <section id="problem-brief" class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
  
        <div class="space-y-8">
          <h2 class="text-4xl font-extrabold text-gray-900">
            Why Cooling Towers Fail to Deliver
          </h2>
          <p class="mt-1 text-gray-600">
            When your cooling tower underperforms, you face higher OPEX and CAPEX. Here’s where the inefficiencies hide:
          </p>
          <ul class="space-y-6">
            <li class="flex items-start">
              <svg class="w-6 h-6 flex-shrink-0 text-blue-600 mt-1" fill="currentColor" viewBox="0 0 20 20">
                <path d="M7.673 13.427l-3.55-3.55a1 1 0 011.414-1.414l2.136 2.136 5.657-5.657a1 1 0 111.414 1.414l-6.364 6.364a1 1 0 01-1.414 0z"/>
              </svg>
              <div class="ml-4">
                <p class="text-xl font-semibold text-gray-800">Scale &amp; Fouling</p>
                <p class="mt-1 text-gray-600"><em>Impedes heat transfer; ~25% energy penalty.</em></p>
              </div>
            </li>
            <li class="flex items-start">
              <svg class="w-6 h-6 flex-shrink-0 text-blue-600 mt-1" fill="currentColor" viewBox="0 0 20 20">
                <path d="M7.673 13.427l-3.55-3.55a1 1 0 011.414-1.414l2.136 2.136 5.657-5.657a1 1 0 111.414 1.414l-6.364 6.364a1 1 0 01-1.414 0z"/>
              </svg>
              <div class="ml-4">
                <p class="text-xl font-semibold text-gray-800">Corrosion &amp; Biogrowth</p>
                <p class="mt-1 text-gray-600">Equipment damage &amp; Legionella risk.</p>
              </div>
            </li>
            <li class="flex items-start">
              <svg class="w-6 h-6 flex-shrink-0 text-blue-600 mt-1" fill="currentColor" viewBox="0 0 20 20">
                <path d="M7.673 13.427l-3.55-3.55a1 1 0 011.414-1.414l2.136 2.136 5.657-5.657a1 1 0 111.414 1.414l-6.364 6.364a1 1 0 01-1.414 0z"/>
              </svg>
              <div class="ml-4">
                <p class="text-xl font-semibold text-gray-800">Manual Blowdown</p>
                <p class="mt-1 text-gray-600">Time-based or probe-based—wasted water &amp; missed CoC targets.</p>
              </div>
            </li>
          </ul>
          <a href="#" 
            class="group mt-8 inline-flex items-center rounded-full px-6 py-3 bg-gray-900 text-white font-semibold shadow-md 
              hover:shadow-lg hover:-translate-y-0.5 transition-all">
            <span>Download the Problem Brief (PDF)</span>
            <span class="ml-4 grid place-items-center w-9 h-9 rounded-full">
              <i class="ri-arrow-right-up-line ml-3"></i>
            </span>
          </a>
        </div>
  
        <div>
          <video
            src="/assets/img/services/cooling_tower_video_1.mp4"
            controls
            class="w-full h-64 md:h-80 bg-black shadow-lg"
          >
            Your browser does not support the video tag.
          </video>
        </div>
  
      </div>
    </div>
  </section>
  
  
  <section id="success-opex-capex" class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
  
        <div class="space-y-6">
          <h2 class="text-4xl font-extrabold text-gray-900">
            Cooling Tower Success Reduces OpEx &amp; CapEx
          </h2>
          <p class="text-lg text-gray-700">
            The success relies on advanced water treatment and optimized in-time monitoring—delivering  
            significant operational savings while deferring capital expenditures.
          </p>
          <ul class="list-disc list-inside space-y-2 text-gray-700">
            <li>Significant water conservation</li>
            <li>Energy conservation</li>
            <li>Zero chemical required or used</li>
          </ul>
          <a href="#" 
            class="group mt-8 inline-flex items-center rounded-full px-6 py-3 bg-gray-900 text-white font-semibold shadow-md 
              hover:shadow-lg hover:-translate-y-0.5 transition-all">
            <span>Download the Problem Brief (PDF)</span>
            <span class="ml-4 grid place-items-center w-9 h-9 rounded-full">
              <i class="ri-arrow-right-up-line ml-3"></i>
            </span>
          </a>
        </div>
  
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 md:mt-6">
          <div class="bg-gray-900 text-white p-6 shadow-lg">
            <h3 class="text-2xl font-light mb-4">OpEx Savings</h3>
            <ul class="list-disc list-inside space-y-3 text-lg font-light">
              <li>Lower water &amp; chemical costs</li>
              <li>Reduced maintenance</li>
              <li>Predictable budgets</li>
            </ul>
          </div>
          <div class="bg-gray-900 text-white p-6 shadow-lg">
            <h3 class="text-2xl font-light mb-4">CapEx Deferral</h3>
            <ul class="list-disc list-inside space-y-3 text-lg font-light">
              <li>Delay infrastructure upgrades</li>
              <li>Extend equipment life</li>
              <li>Defer rebuilds</li>
            </ul>
          </div>
        </div>
  
      </div>
    </div>
  </section>
  
  <section id="instant-coc" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12">
  
      <div class="space-y-6">
        <h2 class="text-4xl font-extrabold text-gray-900">
          How Cooling Tower Success Happens: Balancing OpEx & CapEx through Treatment and Flow - WST Patented Process
        </h2>
        <p class="text-gray-700 text-left">
          Simultaneous smart treatment of make-up water and optimizing cycles of concentration (CoCs)
        </p>
  
        <div class="space-y-6">
          <div class="bg-white shadow p-4 border-l-4 border-blue-600">
            <div class="flex items-start space-x-3">
              <svg class="w-6 h-6 text-blue-600 mt-1" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2l3 7h7l-5.5 4.5L18 21l-6-4-6 4 1.5-7.5L2 9h7z"/>
              </svg>
              <div>
                <h3 class="text-lg font-medium text-gray-800"> Make-up Water Treatment</h3>
                <p class="text-gray-600"> Through a patented process, our electro-water reactors 
                  remove the unstable minerals in the make-up water to allow for high cycle rates. 
                  This water treatement help to manage 3 importnat factors that drives the 
                  operating and capital expenses, in cooling towers :</p> <br>
                <p class="text-gray-600"> - Scale formation </p>
                <p class="text-gray-600"> - Corrosion</p>
                <p class="text-gray-600"> - Bio-contamination</p>
              </div>
            </div>
          </div>
  
          <div class="flex justify-center text-gray-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6"/>
            </svg>
          </div>
  
          <div class="bg-white shadow p-4 border-l-4 border-blue-600">
            <div class="flex items-start space-x-3">
              <svg class="w-6 h-6 text-blue-600 mt-1" fill="currentColor" viewBox="0 0 24 24">
                <path d="M3 3h18v2H3V3zm0 16h18v2H3v-2zm0-8h18v2H3v-2z"/>
              </svg>
              <div>
                <h3 class="text-lg font-medium text-gray-800">Smart Monitoring with AI</h3> <br>
                <p class="text-gray-600"> - Make-up water metering </p>
                <p class="text-gray-600"> - Blowdown - water metering</p>
              </div>
            </div>
          </div>
  
          <div class="flex justify-center text-gray-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6"/>
            </svg>
          </div>
  
          <div class="bg-white shadow p-4 border-l-4 border-blue-600">
            <div class="flex items-start space-x-3">
              <svg class="w-6 h-6 text-blue-600 mt-1" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
              </svg>
              <div>
                <h3 class="text-lg font-medium text-gray-800">Enhance &amp; Optimize</h3>
                <p class="text-gray-600">Implement improvements</p>
              </div>
            </div>
          </div>
        </div>
  
        <div class="mt-6">
          <a href="#contact" 
            class="w-full group inline-flex items-center rounded-full px-6 py-3 bg-gray-900 text-white font-semibold shadow-md 
              hover:shadow-lg hover:-translate-y-0.5 transition-all">
            <span>Get Started</span>
            <span class="ml-auto grid place-items-center w-9 h-9 rounded-full">
              <i class="ri-arrow-right-up-line ml-3"></i>
            </span>
          </a>
        </div>
      </div>
  
      <div class="space-y-6">
        <div class="bg-gradient-to-tr from-gray-900 to-gray-800 p-6 shadow-2xl overflow-hidden">
          <canvas id="instantCocChart"></canvas>
        </div>
  
        <h4 class="text-lg font-semibold text-gray-800">
          Instant CoC = Make-Up Flow ÷ Blow-Down Flow
        </h4>
  
        <ul class="list-decimal list-inside space-y-2 text-gray-800">
          <li><strong>Make-Up Meter</strong> measures incoming water flow.</li>
          <li><strong>Blow-Down Meter</strong> measures discharged water flow.</li>
          <li>Instant Cycles of Concentration = MU ÷ BD.</li>
          <li><strong>Treatment Module</strong> adjusts chemistry dosage based on CoC.</li>
          <li>Comparator checks CoC &amp; treatment set-points.</li>
          <li><strong>Auto-actuate Valve</strong> or <strong>Trigger Alert</strong> if out of range.</li>
        </ul>
  
        <div>
          <a href="#learn-more" class="inline-flex items-center text-blue-600 font-medium">
            View More Trends
            <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
          </a>
        </div>
      </div>
  
    </div>
  </section>
  
  <section id="savings-profile" class="bg-white py-20">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
      
      <div class="space-y-6">
        <h2 class="text-4xl font-extrabold text-gray-900">
          The EnviroTower Savings Profile
        </h2>
        <p class="text-lg text-gray-700">
          Aligned results reaching net-zero goals. Here’s how EnviroTower drives savings across every Opex line item—bringing your cooling tower closer to net zero.
        </p>
  
        <blockquote class="border-l-4 border-blue-600 pl-4 italic text-gray-800">
          “Since installing Water Solutions' technology package, we boosted our CoC from 2.4× to 3.5× in just 6 months—cutting water spend by 22% and slashing annual chemical costs by over $40K.”  
          <span class="block mt-2 font-semibold">—Alexandra Wu, Director of Engineering, GreenOak Asset Management</span>
        </blockquote>
  
        <a href="#contact" 
          class="w-full group inline-flex items-center rounded-full px-6 py-3 bg-gray-900 text-white font-semibold shadow-md 
            hover:shadow-lg hover:-translate-y-0.5 transition-all">
          <span>Estimate How much I Could be saving</span>
          <span class="ml-auto grid place-items-center w-9 h-9 rounded-full">
            <i class="ri-arrow-right-up-line ml-3"></i>
          </span>
        </a>
      </div>
  
      <div>
        <div class="bg-white p-6 rounded-none shadow-lg" style="height:400px;">
          <canvas id="savingsProfileChart"></canvas>
        </div>
      </div>
  
    </div>
  </section>
  
  
  
  <section class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12">
      <div class="flex flex-col justify-center space-y-6">
        <h2 class="text-3xl md:text-4xl font-serif font-semibold uppercase text-gray-900 leading-tight">
          Transform Hidden Water Challengies to Opportunities 
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
        new Chart(
      document.getElementById('instantCocChart').getContext('2d'),
      {
        type: 'line',
        data: {
          labels: ['M1','M2','M3','M4','M5','M6'],
          datasets: [
            { label:'CoC Before', data:[2.5,2.6,2.6,2.7,2.8,2.9], borderColor:'#FBBF24', backgroundColor:'transparent', pointRadius:3, borderWidth:2, tension:0.3 },
            { label:'CoC After',  data:[2.8,3.0,3.1,3.2,3.4,3.5], borderColor:'#10B981', backgroundColor:'transparent', pointRadius:3, borderWidth:2, tension:0.3 },
            { label:'Water Saved Before', data:[20000,25000,30000,35000,38000,40000], borderColor:'#3B82F6', backgroundColor:'transparent', pointStyle:'rect', pointRadius:3, borderWidth:2, tension:0.3, yAxisID:'y1' },
            { label:'Water Saved After',  data:[40000,50000,60000,80000,120000,160000], borderColor:'#60A5FA', backgroundColor:'transparent', pointStyle:'rectRot', pointRadius:3, borderWidth:2, tension:0.3, yAxisID:'y1' }
          ]
        },
        options: {
          responsive:true,
          maintainAspectRatio:false,
          plugins:{ legend:{ labels:{ color:'#ddd' }, position:'bottom' } },
          scales:{
            x:{ grid:{ display:false }, ticks:{ color:'#ccc' } },
            y:{ position:'left', grid:{ color:'rgba(255,255,255,0.1)' }, ticks:{ color:'#FBBF24' }, title:{ display:true, text:'CoC Ratio', color:'#FBBF24' } },
            y1:{ position:'right', grid:{ display:false }, ticks:{ color:'#60A5FA', callback:v=> (v/1000)+'k' }, title:{ display:true, text:'Gallons Saved', color:'#60A5FA' } }
          }
        }
      }
    );


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
            font: { size: 16, weight: 'normal' }
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
              font: { size: 14 }
            },
            grid: { display: false }
          }
        }
      }
    });
  </script>
  @endpush
  