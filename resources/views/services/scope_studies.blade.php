@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')
      <section class="relative min-h-[520px] flex items-center justify-start overflow-hidden bg-black">
      <img 
        src="/assets/img/services/scope_studies.png"
        alt="Modern hotel or commercial building"
        class="absolute inset-0 w-full h-full object-cover grayscale opacity-25 z-0" />
      <div class="absolute inset-0 bg-black bg-opacity-5 z-10"></div>
    
      <div class="relative z-20 max-w-2xl pl-6 md:pl-16 py-16">
        <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight drop-shadow">
          The Gold Standard in Water Stewardship for Asset Owners & Managers <br class="hidden md:block"> 
        </h1> 
        <p class="text-lg md:text-xl text-gray-100 font-light mb-7 max-w-xl">
          <span class="block"> Delivering <span class="font-bold text-white">proven returns</span> and transparency for owners, asset managers, and property teams.</span>
          <span class="text-gray-300 block mt-2"> 
          A trusted, science driven process for quantifiable savings, compliance, and true operational resilience. <br><br>
          
          </span>
        </p>
        <a href="#"
          class="group inline-flex items-center justify-between rounded-full bg-white text-zinc-900 px-6 py-3 font-semibold
            shadow-lg shadow-black/20 transition-all duration-300 hover:-translate-y-1 hover:bg-white">
          <span>Request a Flow Assessment</span>
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
    
    
    <div class="bg-white w-full py-14">
      <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 px-6 items-start">
        <div>
          <h2 class="text-3xl font-bold mb-8 text-gray-900">Our Proven Approach</h2>
          <div class="relative pl-10">
            <div class="absolute top-8 left-5 h-[320px] w-1 bg-yellow-700/60 rounded"></div>
            <div class="flex items-center mb-12 relative z-10">
              <div class="flex-shrink-0 bg-white z-10">
                <svg class="w-8 h-8 text-yellow-700" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                  <circle cx="12" cy="12" r="9" stroke="currentColor"/>
                  <path d="M12 7v5l3 3" stroke="currentColor" stroke-linecap="round"/>
                </svg>
              </div>
              <div class="ml-5">
                <span class="block text-xl font-semibold text-gray-900">Phase I</span>
                <span class="block text-lg text-gray-800">Scoping Studies:</span>
                <span class="block text-lg text-gray-800"> Pointing you into the right technical and economic decisions </span>
    
                
              </div>
            </div>
            <div class="flex items-center mb-12 relative z-10">
              <div class="flex-shrink-0 bg-white z-10">
                <svg class="w-8 h-8 text-yellow-700" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                  <rect x="4" y="4" width="16" height="16" rx="3" stroke="currentColor"/>
                  <path d="M8 12l2 2l4-4" stroke="currentColor" stroke-linecap="round"/>
                </svg>
              </div>
              <div class="ml-5">
                <span class="block text-xl font-semibold text-gray-900">Phase II</span>
                <span class="block text-lg text-gray-800">Implementation:</span>
    <span class="block text-lg text-gray-800">Delivering the highest quality workmanship and finish: exceeding ISO Standards meeting localized building codes </span>
              </div>
            </div>
            <div class="flex items-center mb-12 relative z-10">
              <div class="flex-shrink-0 bg-white z-10">
                <svg class="w-8 h-8 text-yellow-700" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                  <rect x="6" y="4" width="12" height="16" rx="2" stroke="currentColor"/>
                  <path d="M9 8h6M9 12h6M9 16h3" stroke="currentColor" stroke-linecap="round"/>
                </svg>
              </div>
              <div class="ml-5">
                <span class="block text-xl font-semibold text-gray-900">Phase III</span>
                <span class="block text-lg text-gray-800">Benchmarking:</span>
                <span class="block text-lg text-gray-800">Providing data-driven insights to maximize savings and efficiency</span>
              </div>
    
            </div>
            <div class="flex items-center relative z-10">
              <div class="flex-shrink-0 bg-white z-10">
                <svg class="w-8 h-8 text-yellow-700" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                  <circle cx="12" cy="10" r="4" stroke="currentColor"/>
                  <path d="M4 20v-1a6 6 0 0112 0v1" stroke="currentColor" stroke-linecap="round"/>
                </svg>
              </div>
              <div class="ml-5">
                <span class="block text-xl font-semibold text-gray-900">Phase IV</span>
                <span class="block text-lg text-gray-800">24/7 Ongoing Support:</span>
                <span class="block text-lg text-gray-800"> Continuous adjustments and optimizations to ensure that the original goals are met </span>
              </div>
            </div>
          </div>
        </div>
    
        <div>
          <div class="bg-gray-900 text-white p-8 shadow-xl min-w-[320px]">
            <h3 class="text-xl font-bold mb-6">Water Metering <span class="font-normal">Industry Insights</span></h3>
            <div class="grid grid-cols-2 gap-6 mb-6">
              <div>
                <div class="text-3xl font-extrabold mb-1">30% +</div>
                <div class="text-base text-gray-200 leading-tight">
                  non-revenue water is lost in distribution systems.
                </div>
              </div>
              <div>
                <div class="text-3xl font-extrabold mb-1">10-23%</div>
                <div class="text-base text-gray-200 leading-tight">
                  typical savings from our clients
                </div>
              </div>
              <div>
                <div class="text-3xl font-extrabold mb-1">15-25%</div>
                <div class="text-base text-gray-200 leading-tight">
                  billing discrepancy from manual readings and aging meters. 
                </div>
              </div>
              <div>
                <div class="text-3xl font-extrabold mb-1">ROI &lt; 2y</div>
                <div class="text-base text-gray-200 leading-tight">
                  payback for most commercial properties projects
                </div>
              </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-700 text-gray-300 italic text-base">
              “Accurate, real-time water metering is not just a compliance or billing issue—
              It’s a strategic advantage for cost control, sustainability, and asset value.”
              <br>See how your property stacks up vs. industry benchmarks
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="bg-white w-full py-14">
      <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 px-6 items-start">
        <div>
          <h2 class="text-3xl font-bold mb-8 text-gray-900">Why It Works for Leaders Like You</h2>
          <div class="space-y-6 mb-8">
            <div class="flex items-center space-x-6 mb-4"> <div>
                <svg class="w-8 h-8 text-yellow-700" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24">
                  <rect x="3" y="3" width="18" height="18" rx="4" stroke="currentColor"/>
                  <path d="M8 13l3 3l5-5" stroke="currentColor" stroke-linecap="round"/>
                </svg>
              </div>
              <div>
                <span class="block font-semibold text-lg text-gray-900">Strategic ROI</span>
                <span class="block text-base text-gray-700">ESG-Grade Reporting</span>
              </div>
            </div>
            <div class="flex items-center space-x-6">
              <div>
                <svg class="w-8 h-8 text-yellow-700" fill="none" stroke="currentColor" stroke-width="2"
                  viewBox="0 0 24 24">
                  <rect x="4" y="4" width="16" height="16" rx="3" stroke="currentColor"/>
                  <path d="M8 11h8M8 15h6" stroke="currentColor" stroke-linecap="round"/>
                  <circle cx="9" cy="9" r="1" fill="currentColor"/>
                </svg>
              </div>
              <span class="block font-semibold text-lg text-gray-900">White-Glove Service</span>
            </div>
          </div>
          <a href="#" 
            class="group inline-flex items-center rounded-full px-6 py-3 bg-gray-900 text-white font-semibold shadow-md 
              hover:shadow-lg hover:-translate-y-0.5 transition-all">
            <span>Download Playbook</span>
            <span class="ml-4 grid place-items-center w-9 h-9 rounded-full">
              <i class="ri-arrow-right-up-line ml-3"></i>
            </span>
          </a>
        </div>
        <div>
          <h2 class="text-3xl font-bold mb-8 text-gray-900">See how your property stacks up vs. industry benchmarks</h2>
          <span class="block text-xl font-semibold text-gray-900">What Is Your Water Use Intensity?</span>
          <span class="block text-lg text-gray-800"> Trusted by leaders at AD1 Global, DiamondRock Hospitality</span> <br>
          <img
            src="/assets/img/services/scope_study_water_use_intensity_5.png"
            alt="Water Savings Over Hours Chart"
            class="w-full h-auto rounded-lg mb-8"
          />
        </div>
      </div>
    </div>
    
    <div class="bg-white w-full py-16">
      <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-6">
        <div class="flex-1 md:pr-12">
          <h3 class="text-4xl md:text-5xl font-extrabold leading-tight mb-5 text-gray-900">
            Trusted by leaders <br>
          </h3>
          <p class="text-lg text-gray-700 mb-7">
            in Hospitality, Manufacturing Industries, Commercial Real Estate, Health Centers, Schools and Universities, Multifamily Communities, Condominiums - just to name a few.<br><br>
          </p>
          <blockquote class="italic text-lg text-gray-700 font-light mb-6 leading-relaxed border-l-4 border-blue-700 pl-4">
            “Their expertise in transformational water management led to impeccable results, - both in cost savings and sustainability at the - site and portfolio levels. .”
            <div class="text-sm text-gray-500 mt-2"> Asset Manager, Hilton South Tower</div>
          </blockquote>
          <a href="#" 
            class="group inline-flex items-center rounded-full px-6 py-3 bg-gray-900 text-white font-semibold shadow-md 
              hover:shadow-lg hover:-translate-y-0.5 transition-all">
            <span>Request a Confidential Consultation</span>
            <span class="ml-4 grid place-items-center w-9 h-9 rounded-full">
              <i class="ri-arrow-right-up-line ml-3"></i>
            </span>
          </a>
          <div class="flex flex-wrap gap-x-8 gap-y-4 mt-4 md:mt-8 opacity-80">
            <span class="text-3xl font-bold text-gray-300">Sandals</span>
            <span class="text-3xl font-bold text-gray-300">AD1</span>
            <span class="text-3xl font-bold text-gray-300">DiamondRock</span>
            <span class="text-3xl font-bold text-gray-300">Even Hotels</span>
          </div>
        </div>
        <div class="flex-1 flex justify-center mt-12 md:mt-0">
          <img
            src="/assets/img/services/scope_study_water_use_intensity_client_results_1.png"
            alt="Water Savings Over Hours Chart"
            class="w-full h-auto rounded-lg mb-8"
          />
        </div>
      </div>
    </div>
    
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