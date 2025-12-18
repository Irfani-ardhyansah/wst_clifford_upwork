@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')
        <section class="relative min-h-[520px] flex items-center justify-start overflow-hidden bg-black">
          <img 
            src="/assets/img/services/meter_accuracy_photo.png"
            alt="Modern hotel or commercial building"
            class="absolute inset-0 w-full h-full object-cover grayscale opacity-55 z-0" />
          <div class="absolute inset-0 bg-black bg-opacity-20 z-10"></div>
        
          <div class="relative z-20 max-w-2xl pl-6 md:pl-16 py-16">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight drop-shadow">
              Water Meter Accuracy 
            </h1> 
            <p class="text-lg md:text-xl text-gray-100 font-light mb-7 max-w-xl">
              <span class="block"> Correcting a water meter will mostly likely save <span class="font-bold text-white">10–35%</span> of your annual water utility fees.</span>
              <span class="text-gray-300 block mt-2"> 
              Flow management optimization enhance metering precision - leading to low erros on meter register consumption.
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
        
        <section>
        <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
          <div>
             <h2 class="text-2xl font-bold mb-4">
              Flow management audit and precision-engineered infrastructure resolution
            </h2>
            <p class="text-gray-700 mb-8">
              You can modulate your property's pressure differential, upstream and downstream of your water meter register. This rectifies, how the municipal water meter interprets the water volume, and provide the most accurate invoice in a dynamic way. The meter’s accuracy has the most impact on your water billing statements. Your water billing statement mirror’s your water meter register. So, an accurate operated water meter reflects an accurate invoice. Likewise, a water meter that is inaccurate reflects and inaccurate invoice. Let us help you.
            </p>
            <h3 class="text-xl font-bold mb-3">What You Gain</h3>
            <ul class="space-y-2 text-gray-800">
              <li>✔️ 20–30% water & sewer savings, typically</li>
              <li>✔️ ESG-ready reporting for stakeholders</li>
              <li>✔️ ROI – most audits pay for themselves within 12 months</li>
              <li>✔️ Asset value protection, risk mitigation, and compliance</li>
            </ul>
          </div>
        
          <div>
            <div class="bg-gray-900 p-8 shadow-lg text-white max-w-md mx-auto">
              <h3 class="text-xl font-bold mb-6"> Water Metering Industry Insights</h3>
              
              <div class="mb-6">
                <span class="text-3xl font-extrabold">30%+</span>
                <div class="mt-2 text-base text-gray-100">
                  of global water is lost (“non-revenue water”)—mainly due to inaccurate or outdated metering.<br>
                  <span class="text-gray-400 italic">(World Bank, 2022)</span>
                </div>
              </div>
              
              <hr class="border-gray-700 mb-6">
        
              <div class="mb-6">
                <span class="text-3xl font-extrabold">10–20%</span>
                <div class="mt-2 text-base text-gray-100">
                  typical water savings after installing advanced (smart) meters.<br>
                  <span class="text-gray-400 italic">(EPA, 2023)</span>
                </div>
              </div>
              
              <hr class="border-gray-700 mb-6">
        
              <div class="mb-6">
                <span class="text-3xl font-extrabold">15–25%</span>
                <div class="mt-2 text-base text-gray-100">
                  billing inaccuracies from manual readings and aging meters.<br>
                  <span class="text-gray-400 italic">(AWWA, 2022)</span>
                </div>
              </div>
              
              <hr class="border-gray-700 mb-6">
        
              <div class="mb-6">
                <span class="text-3xl font-extrabold">&lt;2 Years</span>
                <div class="mt-2 text-base text-gray-100">
                  payback on modern water metering solutions in commercial properties.<br>
                  <span class="text-gray-400 italic">(McKinsey, 2023)</span>
                </div>
              </div>
              
              <hr class="border-gray-700 mb-6">
        
              <div>
                <span class="block italic text-base text-gray-300">
                  “Accurate, real-time water metering is not just a compliance or billing issue—it’s a strategic advantage for cost control, sustainability, and asset value.”
                </span>
              </div>
            </div>
          </div>
        </div>
        </section>
        
        <section class="bg-white py-20">
          <div class="max-w-7xl mx-auto px-4 space-y-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
              <div class="space-y-6">
                <h2 class="text-4xl font-serif font-semibold text-gray-900">
                  Control the Flow.<br>
                  Cut the Waste.
                </h2>
                <p class="text-lg text-gray-700 max-w-lg">
                  Optimize water pressure and flow rates without compromising performance — with intelligent flow management systems.
                </p>
                <p class="text-base text-gray-700 max-w-lg">
                  Reduce over-pressurization, extend fixture life, and eliminate silent waste. Real-time insight + mechanical precision.
                </p>
              </div>
              <div class="relative">
                <img src="/assets/img/services/meter_optimization.png" alt="Optimized Flow Rate Chart" class="rounded-lg shadow-lg w-full h-auto object-cover">
              </div>
            </div>
        
            
            <section class="max-w-7xl mx-auto px-6 py-20">
            <div class="grid md:grid-cols-2 gap-12 items-center">
              <div class="space-y-6">
                <h2 class="text-4xl font-extrabold text-gray-900">
                  Accurate Meters.<br>
                  Controlled Flow.<br>
                  Trusted Data.
                </h2>
                <p class="text-lg text-gray-700">
                  Eliminate guesswork and overuse with precision-calibrated water metering that powers intelligent flow management.
                </p>
                <ul class="space-y-3">
                  <li class="flex items-start">
                    <svg class="flex-shrink-0 h-6 w-6 text-black mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="ml-3 text-lg text-gray-900">Accurate flow control logic</span>
                  </li>
                  <li class="flex items-start">
                    <svg class="flex-shrink-0 h-6 w-6 text-black mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="ml-3 text-lg text-gray-900">Early leak detection</span>
                  </li>
                  <li class="flex items-start">
                    <svg class="flex-shrink-0 h-6 w-6 text-black mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="ml-3 text-lg text-gray-900">ESG-grade usage reporting</span>
                  </li>
                  <li class="flex items-start">
                    <svg class="flex-shrink-0 h-6 w-6 text-black mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="ml-3 text-lg text-gray-900">Verified savings validation</span>
                  </li>
                  <li class="flex items-start">
                    <svg class="flex-shrink-0 h-6 w-6 text-black mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="ml-3 text-lg text-gray-900">True consumption benchmarking</span>
                  </li>
                  <li class="flex items-start">
                    <svg class="flex-shrink-0 h-6 w-6 text-black mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="ml-3 text-lg text-gray-900">Reduce invisible overuse</span>
                  </li>
                  <li class="flex items-start">
                    <svg class="flex-shrink-0 h-6 w-6 text-black mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="ml-3 text-lg text-gray-900">Save water + energy</span> 
                  </li>
                  <li class="flex items-start">
                    <svg class="flex-shrink-0 h-6 w-6 text-black mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="ml-3 text-lg text-gray-900">Extend pipe + fixture life</span> 
                  </li>
                  <li class="flex items-start">
                    <svg class="flex-shrink-0 h-6 w-6 text-black mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="ml-3 text-lg text-gray-900">Protect against surges</span> 
                  </li>
                </ul>
                <blockquote class="mt-8 italic text-gray-700">
                  “Most buildings measure water after it’s been wasted. Our solution ensures flow optimization starts with metering precision — no more “estimated” consumption.”
                </blockquote>
                <p class="font-semibold text-gray-900">— Director of Engineering, Classic Properties </p>
                <a href="#" 
                  class="group inline-flex items-center rounded-full px-6 py-3 bg-gray-900 text-white font-semibold shadow-md 
                    hover:shadow-lg hover:-translate-y-0.5 transition-all">
                  <span>Request Flow Assessment</span>
                  <span class="ml-4 grid place-items-center w-9 h-9 rounded-full">
                    <i class="ri-arrow-right-up-line ml-3"></i>
                  </span>
                </a>
              </div>
        
              <div class="flex justify-center">
                <img src="/assets/img/services/meter_optimization_5.png"
                     alt="Engineer calibrating a water meter"
                     class="object-cover w-full h-auto rounded-xl shadow-xl"/>
              </div>
            </div>
          </section>
        
        
            <div class="overflow-x-auto">
              <table class="w-full text-left border-t border-b border-gray-200 divide-y divide-gray-200">
                <thead>
                  <tr class="bg-gray-50">
                    <th class="px-6 py-4 text-gray-900 font-medium">Without Flow Management</th>
                    <th class="px-6 py-4 text-gray-900 font-medium">With Flow Management</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr>
                    <td class="px-6 py-4"> Meter, inaccuracies</td>
                    <td class="px-6 py-4"> Meter, register accurate uses</td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4">120 PSI, unregulated</td>
                    <td class="px-6 py-4">60–75 PSI, optimized</td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4">Fixture wear & tear</td>
                    <td class="px-6 py-4">Extended asset life</td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4">Daily usage spikes</td>
                    <td class="px-6 py-4">Steady, predictable</td>
                  </tr>
                </tbody>
              </table>
            </div>
        
           
              <div class="flex items-center justify-center lg:justify-end">
                <a href="#" 
                  class="group inline-flex items-center rounded-full px-6 py-3 bg-gray-900 text-white font-semibold shadow-md 
                    hover:shadow-lg hover:-translate-y-0.5 transition-all">
                  <span>Request Flow Optimization Assessment</span>
                  <span class="ml-4 grid place-items-center w-9 h-9 rounded-full">
                    <i class="ri-arrow-right-up-line ml-3"></i>
                  </span>
                </a>
                
              </div>
            </div>
            <blockquote class="text-2xl italic font-light text-gray-900 max-w-4xl mx-auto text-center mt-16">
              “Water metering accuracy through flow control saved us $2,400/month — but more importantly, it stabilized our system pressure.” President - Panna to Go Manufacturing"
            </blockquote>
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
        </main>


      <!-- =============== FOOTER SECTION (PREMIUM, MATCHES HEADER) =============== -->
     <footer class="relative bg-black text-white pt-16 pb-0 mt-32 shadow-xl px-0">
      <div class="max-w-12xl mx-auto flex flex-col md:flex-row md:justify-between px-10">
        <div class="mb-12 md:mb-0 flex-1 min-w-[270px]">
          <div class="flex items-center mb-3">
            <img src="/assets/img/logo.png" alt="Water Solutions Technology Logo" class="h-12 w-auto mr-4" />
            <span class="text-2xl tracking-wider font-light" style="font-family:'Avenir', Arial, sans-serif; letter-spacing:0.09em;">Water Solutions Technology</span>
          </div>
          
          <p class="text-gray-300 text-sm mb-1">
            1200 S. Andrews Ave, <br>
            Suite 504, <br>
            Fort Lauderdale, FL 33301
          </p>
          <div class="text-gray-300 text-sm mb-4">+1 (954) 508-3877</div>
          
          <div class="flex space-x-2 mt-3">
            <a href="https://www.linkedin.com/yourcompany" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="hover:text-blue-400 transition">
              <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5A2.48 2.48 0 002.5 6c0 1.38 1.12 2.5 2.48 2.5A2.48 2.48 0 007.5 6c0-1.38-1.12-2.5-2.52-2.5zm.02 5.75H2.5v12.75h2.5V9.25zm7.2 0h-2.45v12.75h2.45v-6.3c0-1.84 2.38-2 2.38 0v6.3h2.45v-7.14c0-4.06-4.91-3.91-4.91 0V9.25z"/></svg>
            </a>
            <a href="https://twitter.com/yourcompany" target="_blank" rel="noopener noreferrer" aria-label="X (Twitter)" class="hover:text-blue-400 transition">
              <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 1200 1227"><path d="M1119.77 0h-207.08L599.84 495.92 285.31 0H67.39l430.47 633.57L55.29 1227h207.08l312.37-388.56L914.6 1227h217.92l-450.06-666.22L1119.77 0z"/></svg>
            </a>
            <a href="https://www.youtube.com/yourcompany" target="_blank" rel="noopener noreferrer" aria-label="YouTube" class="hover:text-blue-400 transition">
              <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 576 512"><path d="M549.7 124.1c-6.3-24-25-42.6-48.9-48.7C468.4 64 288 64 288 64s-180.4 0-212.8 11.4c-23.9 6.1-42.6 24.7-48.9 48.7C16 162.6 16 256 16 256s0 93.4 10.3 131.9c6.3 24 25 42.6 48.9 48.7C107.6 448 288 448 288 448s180.4 0 212.8-11.4c23.9-6.1 42.6-24.7 48.9-48.7C560 349.4 560 256 560 256s0-93.4-10.3-131.9zM232 336V176l142.7 80-142.7 80z"/></svg>
            </a>
          </div>
          <div class="flex space-x-3 mt-6">
            <a href="https://play.google.com/store/apps/details?id=your.app.id" target="_blank" rel="noopener noreferrer" aria-label="Get it on Google Play">
              <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Download on Google Play" class="h-8"/>
            </a>
            <a href="https://apps.apple.com/us/app/your-app-name/idYOURAPPID" target="_blank" rel="noopener noreferrer" aria-label="Download on the App Store">
              <img src="https://developer.apple.com//assets/elements/badges/download-on-the-app-store.svg" alt="Download on the App Store" class="h-8"/>
            </a>
          </div>
        </div>
        
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-8 flex-1 min-w-[320px]">
          <div>
            <div class="font-semibold uppercase text-gray-300 text-xs mb-2 tracking-widest">About</div>
            <a href="/about/story" class="block text-sm text-gray-100 hover:text-blue-400 mb-2 transition">Our Story</a>
            <a href="/about/team" class="block text-sm text-gray-100 hover:text-blue-400 mb-2 transition">Team</a>
            <a href="/careers" class="block text-sm text-gray-100 hover:text-blue-400 mb-2 transition">Careers</a>
            <a href="/contact" class="block text-sm text-gray-100 hover:text-blue-400 mb-2 transition">Contact</a>
          </div>
          <div>
            <div class="font-semibold uppercase text-gray-300 text-xs mb-2 tracking-widest">Portfolio</div>
            <a href="/portfolio/projects" class="block text-sm text-gray-100 hover:text-blue-400 mb-2 transition">Projects</a>
            <a href="/portfolio/case-studies" class="block text-sm text-gray-100 hover:text-blue-400 mb-2 transition">Case Studies</a>
            <a href="/industries" class="block text-sm text-gray-100 hover:text-blue-400 mb-2 transition">Industries</a>
          </div>
          <div>
            <div class="font-semibold uppercase text-gray-300 text-xs mb-2 tracking-widest">Resources</div>
            <a href="/blog" class="block text-sm text-gray-100 hover:text-blue-400 mb-2 transition">Blog</a>
            <a href="/faqs" class="block text-sm text-gray-100 hover:text-blue-400 mb-2 transition">FAQs</a>
            <a href="/resources/water-consumption-tool" class="block text-sm text-gray-100 hover:text-blue-400 mb-2 transition">Water Consumption Tool</a>
            <a href="/resources/financing-application" class="block text-sm text-gray-100 hover:text-blue-400 mb-2 transition">Financing Application</a>
          </div>
          <div>
            <div class="font-semibold uppercase text-gray-300 text-xs mb-2 tracking-widest">Legal</div>
            <a href="/terms-of-service" class="block text-sm text-gray-100 hover:text-blue-400 mb-2 transition">Terms of Service</a>
            <a href="/privacy-policy" class="block text-sm text-gray-100 hover:text-blue-400 mb-2 transition">Privacy Policy</a>
            <a href="/user-agreement" class="block text-sm text-gray-100 hover:text-blue-400 mb-2 transition">User Agreement</a>
          </div>
        </div>
      </div>
      
      <div class="max-w-7xl mx-auto flex justify-end px-6 pt-6">
        <a href="/webinars-events" class="text-sm text-gray-300 hover:text-blue-400 mx-3">Webinars & Events</a>
        <a href="/login" class="text-sm text-gray-300 hover:text-blue-400 mx-3">Login</a>
      </div>
      
      <div class="bg-black w-full mt-6 border-t border-gray-800">
        <div class="max-w-12xl mx-auto flex flex-col md:flex-row items-center justify-between py-3 px-12">
          <div class="text-xs text-gray-400">&copy; 2025 Water Solutions Technology. All rights reserved.</div>
          <div class="flex-1 flex justify-center space-x-6">
            <a href="/privacy-policy" class="text-xs text-gray-400 hover:text-blue-400">Privacy Policy</a>
            <span class="text-xs text-gray-400">|</span>
            <a href="/user-agreement" class="text-xs text-gray-400 hover:text-blue-400">User Agreement</a>
          </div>
          <div class="flex items-center">
            <span class="text-xs text-gray-200 mr-2 tracking-wide">Stay Connected:</span>
            <a href="/choose-portfolio" class="bg-white hover:bg-gray-300 text-black px-4 py-1 rounded uppercase text-xs tracking-wider ml-2 font-bold shadow transition">CHOOSE YOUR PORTFOLIO</a>
          </div>
        </div>
      @endsection