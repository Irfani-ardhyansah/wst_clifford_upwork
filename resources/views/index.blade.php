@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')
      <section class="relative min-h-screen flex items-center justify-center bg-black overflow-hidden">
        <img src="{{ asset('assets/img/wst_engineer_auditing_pipes.png')}}"
             alt="Water Solutions Technology Engineer Auditing Pipes"
             class="absolute inset-0 w-full h-full object-cover object-center opacity-90"
             loading="eager" /> <div class="absolute inset-0 bg-black opacity-60"></div>
    
        <div class="relative z-10 flex flex-col items-center text-center w-full px-6">
          <h1 class="font-serif text-white text-4xl md:text-6xl font-semibold mb-6 leading-tight tracking-tight drop-shadow">
            Total Water Visibility.<br>
            Unmatched Peace of Mind.
          </h1>
          <p class="max-w-xl text-lg md:text-2xl text-gray-200 mb-8 font-light">
            Precision water audits and monitoring that protect<br>
            your /assets, budget, and reputation.
          </p>
          <br>
          <a href="/request-audit"
             class="inline-block bg-black bg-opacity-90 text-white font-semibold px-8 py-4 border border-white shadow hover:bg-white hover:text-black transition-all duration-200 uppercase tracking-wider">
            Request a Confidential Audit
          </a>
          <p class="max-w-xl text-lg md:text-2xl text-gray-200 mb-8 font-light">
            <br> <br> Simplifying the Business of Water <br>
          </p>
        </div>
      </section>
    
      <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4">
          <div class="grid md:grid-cols-4 gap-8 items-stretch">
            <div class="flex flex-col justify-start mt-10 md:mt-20">
              <h2 class="text-2xl font-extrabold mb-4 text-gray-900">Trending Insights for Businesses</h2>
              <p class="text-gray-600 font-light">Get the latest updates and expert guidance on water, costs, and sustainability—critical for your portfolio.</p>
            </div>
            <div class="bg-black matte text-white rounded-none border border-neutral-800 shadow-xl p-8 flex flex-col justify-between mt-8 hover:scale-105 hover:shadow-2xl transition duration-300">
              <h3 class="text-lg font-semibold mb-2 tracking-wide">Water Provider Overcharging: Are You Being Overcharged?</h3>
              <p class="text-gray-300 font-light mb-5 flex-1">Find out if your property is losing money due to utility overcharges.</p>
              <a href="/blog/water-provider-overcharging" class="block mx-auto mt-auto border border-white bg-transparent text-white font-light text-sm px-6 py-2 hover:bg-white hover:text-gray-900 transition text-center tracking-wider">WATCH NOW</a>
            </div>
            <div class="bg-black matte text-white rounded-none border border-neutral-800 shadow-xl p-8 flex flex-col justify-between mt-8 hover:scale-105 hover:shadow-2xl transition duration-300">
              <h3 class="text-lg font-semibold mb-2 tracking-wide">2025 Water and Sewerage Price Increases</h3>
              <p class="text-gray-300 font-light mb-5 flex-1">Prepare your strategy before new regulations hit your budget.</p>
              <a href="/blog/2025-water-sewerage-price-increases" class="block mx-auto mt-auto border border-white bg-transparent text-white font-light text-sm px-6 py-2 hover:bg-white hover:text-gray-900 transition text-center tracking-wider">WATCH NOW</a>
            </div>
            <div class="bg-black matte text-white rounded-none border border-neutral-800 shadow-xl p-8 flex flex-col justify-between mt-8 hover:scale-105 hover:shadow-2xl transition duration-300">
              <h3 class="text-lg font-semibold mb-2 tracking-wide">How Elara AI Assistant is Changing Property Water Management?</h3>
              <p class="text-gray-300 font-light mb-5 flex-1">Discover how AI brings transparency, efficiency, and savings to your operation.</p>
              <a href="/blog/elara-ai-water-management" class="block mx-auto mt-auto border border-white bg-transparent text-white font-light text-sm px-6 py-2 hover:bg-white hover:text-gray-900 transition text-center tracking-wider">WATCH NOW</a>
            </div>
          </div>
          <div class="mt-8 flex justify-end">
            <a href="/blog" class="text-blue-700 font-semibold flex items-center hover:underline">
              View More Trends
              <svg class="h-5 w-5 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
            </a>
          </div>
        </div>
      </section>
    
      <section class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4">
          <div class="grid grid-cols-1 md:grid-cols-6 gap-6 items-end">
            <div class="flex flex-col justify-center h-full col-span-1">
              <h2 class="text-2xl font-bold mb-3 text-gray-900">Who We Provide Guidance To</h2>
              <p class="text-gray-500 text-base font-light tracking-wide">
                Trusted by forward-thinking owners and operators of hotels, multifamily properties, manufacturers and commercial real estate.
              </p>
            </div>
            <div class="flex flex-col items-center group">
              <div class="relative h-44 w-full overflow-hidden rounded-none shadow-lg">
                <img src="{{ asset('assets/img/hotel.png') }}"
                     alt="Guidance for Hotel Owners"
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                     loading="lazy" />
              </div>
              <span class="mt-4 text-gray-800 font-medium text-base inline-block skew-x-[-12deg] transition-all duration-200 cursor-pointer hover:text-blue-700 hover:-translate-y-1">
                <span class="skew-x-[12deg]">Hotel Owners</span>
              </span>
            </div>
            <div class="flex flex-col items-center group">
              <div class="relative h-44 w-full overflow-hidden rounded-none shadow-lg">
                <img src="{{ asset('assets/img/multi-family.png') }}"
                     alt="Guidance for Multifamily Operators"
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                     loading="lazy" />
              </div>
              <span class="mt-4 text-gray-800 font-medium text-base inline-block skew-x-[-12deg] transition-all duration-200 cursor-pointer hover:text-blue-700 hover:-translate-y-1">
                <span class="skew-x-[12deg]">Multifamily Operators</span>
              </span>
            </div>
            <div class="flex flex-col items-center group">
              <div class="relative h-44 w-full overflow-hidden rounded-none shadow-lg">
                <img src="{{ asset('assets/img/manufacturing_plant.png') }}"
                     alt="Guidance for Manufacturers"
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                     loading="lazy" />
              </div>
              <span class="mt-4 text-gray-800 font-medium text-base inline-block skew-x-[-12deg] transition-all duration-200 cursor-pointer hover:text-blue-700 hover:-translate-y-1">
                <span class="skew-x-[12deg]">Manufacturers</span>
              </span>
            </div>
            <div class="flex flex-col items-center group">
              <div class="relative h-44 w-full overflow-hidden rounded-none shadow-lg">
                <img src="{{ asset('assets/img/commercial_real_estate.png') }}"
                     alt="Guidance for Commercial Real Estate Professionals"
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                     loading="lazy" />
              </div>
              <span class="mt-4 text-gray-800 font-medium text-base inline-block skew-x-[-12deg] transition-all duration-200 cursor-pointer hover:text-blue-700 hover:-translate-y-1">
                <span class="skew-x-[12deg]">Commercial Real Estate</span>
              </span>
            </div>
            <div class="flex flex-col items-center group">
              <div class="relative h-44 w-full overflow-hidden rounded-none shadow-lg">
                <img src="{{ asset('assets/img/sustainability.png') }}"
                     alt="Guidance for Sustainability Teams"
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                     loading="lazy" />
              </div>
              <span class="mt-4 text-gray-800 font-medium text-base inline-block skew-x-[-12deg] transition-all duration-200 cursor-pointer hover:text-blue-700 hover:-translate-y-1">
                <span class="skew-x-[12deg]">Sustainability Teams</span>
              </span>
            </div>
          </div>
          <div class="hidden md:flex justify-end mt-10">
            <a href="/target-operators" class="text-base font-bold text-blue-700 hover:text-blue-900 transition-all duration-150 flex items-center">
              View Similar Operators
              <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
              </svg>
            </a>
          </div>
        </div>
      </section>
    
      <section class="bg-white py-20">
        <div
          x-data="{
            selected: 0,
            features: [
              {
                label: 'Strategic Water Audits',
                header: 'Strategic Water Audits',
                desc: 'Identify hidden inefficiencies and drive measurable ROI with a portfolio-wide review. Detailed reporting for asset owners.'
              },
              {
                label: 'Portfolio Optimization',
                header: 'Portfolio Optimization',
                desc: 'Maximize performance and tenant satisfaction through smart water planning, benchmarking, and continuous improvement.'
              },
              {
                label: 'Regulatory Compliance',
                header: 'Regulatory Compliance',
                desc: 'Stay ahead of changing rules and avoid fines—our experts guide you through every requirement and deadline.'
              },
              {
                label: 'Benchmarking & Analytics',
                header: 'Benchmarking & Analytics',
                desc: 'Compare your portfolio’s performance to industry leaders, with AI-powered analytics for management teams.'
              },
              {
                label: 'Capital Planning',
                header: 'Capital Planning',
                desc: 'Plan and prioritize investments for water infrastructure with confidence, guided by true cost-benefit analysis.'
              },
              {
                label: 'Technology Implementation',
                header: 'Technology Implementation',
                desc: 'Deploy smart meters, sensors, and AI. We manage every step, from selection to monitoring.'
              }
            ]
          }"
          class="max-w-7xl mx-auto px-4 grid md:grid-cols-5 gap-10 items-stretch"
        >
          <div class="col-span-2 flex flex-col z-10">
            <h3 class="text-3xl font-bold text-gray-900 mb-8 text-left">
              Advisory Services that Transform Water Challenges into Opportunities
            </h3>
            <ul class="space-y-3">
              <template x-for="(item, idx) in features" :key="idx">
                <li>
                  <button
                    @click="selected = idx"
                    :class="selected === idx ? 'text-blue-700 font-bold' : 'text-gray-600 font-normal'"
                    class="text-lg px-2 py-1 transition w-full text-left hover:text-blue-500 focus:outline-none"
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
              aria-label="Water flowing through pipes, symbolizing water management solutions."
              title="Water Management Solutions Overview"
            >
              <source src="{{ asset('assets/video/water-management-solutions.mp4') }}" type="video/mp4" />
              Your browser does not support the video tag.
            </video>
            <div class="absolute inset-0 bg-black bg-opacity-80 z-10"></div>
            <div class="relative z-20 p-10 w-full text-left">
              <h4 class="text-3xl font-semibold text-white mb-3" x-text="features[selected].header"></h4>
              <p class="text-lg font-light text-gray-100 mb-6" x-text="features[selected].desc"></p>
              <a href="/advisory-services" class="inline-flex items-center text-blue-200 font-medium hover:underline transition text-base gap-2">
                More about our approach
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7l7 7-7 7" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </section>
    
      <section class="bg-black text-white px-0 py-16 md:py-24">
        <div class="max-w-6xl mx-auto">
          <p class="text-gray-500 font-light mb-3 text-center">YOUR STRATEGIC ALLY IN EXECUTION</p>
          <h2 class="text-3xl font-bold text-white-900 mb-3 text-center">Elevating Your Capabilities</h2>
          <p class="text-lg font-light text-gray-100 mb-14 text-center">We partner with every key stakeholder-helping you execute water <br>savings, compliance, and sustainable value.</p>
          </h2>
      
          <div class="grid md:grid-cols-2 gap-10 md:gap-20 text-sm md:text-base text-neutral-300">
            
            <!-- Asset Managers -->
            <div class="flex flex-col">
              <h3 class="uppercase text-white font-bold text-lg md:text-xl mb-2">Asset Managers</h3>
              <p class="text-neutral-400">Improve NOI and portfolio water performance</p>
            </div>
      
            <!-- Property Managers -->
            <div class="flex flex-col">
              <h3 class="uppercase text-white font-bold text-lg md:text-xl mb-2">Property Managers</h3>
              <p class="text-neutral-400">Streamline ops and detect costly leaks early</p>
            </div>
      
            <!-- Directors of Engineering -->
            <div class="flex flex-col">
              <h3 class="uppercase text-white font-bold text-lg md:text-xl mb-2">Directors of Engineering</h3>
              <p class="text-neutral-400">Optimize infrastructure & utility use</p>
            </div>
      
            <!-- Sustainability Teams -->
            <div class="flex flex-col">
              <h3 class="uppercase text-white font-bold text-lg md:text-xl mb-2">Sustainability Teams</h3>
              <p class="text-neutral-400">Align with ESG goals & track Scope 3 impact</p>
            </div>
      
            <!-- Facility Operators -->
            <div class="flex flex-col">
              <h3 class="uppercase text-white font-bold text-lg md:text-xl mb-2">Facility Operators</h3>
              <p class="text-neutral-400">Implement & monitor upgrades with minimal downtime</p>
            </div>
          </div>
      
          <div class="hidden md:flex justify-end mt-10">
            <a href="/target-operators" class="text-base font-bold text-blue-700 hover:text-blue-900 transition-all duration-150 flex items-center">
              Learn More
              <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
              </svg>
            </a>
          </div>
        </div>
      </section>
    
      <section class="bg-gray-50 py-10">
         <div class="max-w-7xl mx-auto px-4 flex flex-wrap justify-center gap-x-12 gap-y-8 items-center">
          <img src="{{ asset('assets/img/clients/hilton.png') }}" alt="Hilton Logo" class="h-24 w-auto object-contain opacity-80 hover:opacity-100 transition" loading="lazy" />
          <img src="{{ asset('assets/img/clients/ihg.') }}'" alt="IHG Logo" class="h-20 w-auto object-contain opacity-80 hover:opacity-100 transition" loading="lazy" />
          <img src="{{ asset('assets/img/clients/kimpton.png') }}" alt="Kimpton Logo" class="h-10 w-auto object-contain opacity-80 hover:opacity-100 transition" loading="lazy" />
          <img src="{{ asset('assets/img/clients/westin.png') }}" alt="Westin Logo" class="h-20 w-auto object-contain opacity-80 hover:opacity-100 transition" loading="lazy" />
          <img src="{{ asset('assets/img/clients/sandals.png') }}" alt="Sandals Logo" class="h-10 w-auto object-contain opacity-80 hover:opacity-100 transition" loading="lazy" />
    
          <img src="{{ asset('assets/img/clients/hill.jpeg') }}" alt="Hillel Logo" class="h-20 w-auto object-contain opacity-90 hover:opacity-70 transition" loading="lazy" />
          <img src="{{ asset('assets/img/clients/even-hotels.png') }}" alt="Hillel Logo" class="h-20 w-auto object-contain opacity-90 hover:opacity-70 transition" loading="lazy" />
          <img src="{{ asset('assets/img/clients/panna.png') }}" alt="Hillel Logo" class="h-20 w-auto object-contain opacity-90 hover:opacity-70 transition" loading="lazy" />
          <img src="{{ asset('assets/img/clients/kroger.png') }}" alt="Hillel Logo" class="h-20 w-auto object-contain opacity-90 hover:opacity-70 transition" loading="lazy" />
          <img src="{{ asset('assets/img/clients/concours.png') }}" alt="Concours Logo" class="h-20 w-auto object-contain opacity-80 hover:opacity-100 transition" loading="lazy" />
          <img src="{{ asset('assets/img/clients/slgreen.png') }}" alt="SL Green Realty Corp Logo" class="h-20 w-auto object-contain opacity-80 hover:opacity-100 transition" loading="lazy" />
          <img src="{{ asset('assets/img/clients/fredmyer.svg') }}" alt="Fred Meyer Logo" class="h-7 w-auto object-contain opacity-80 hover:opacity-100 transition" loading="lazy" />
          <img src="{{ asset('assets/img/clients/diamondrock.png') }}" alt="DiamondRock Hospitality Company Logo" class="h-20 w-auto object-contain opacity-90 hover:opacity-70 transition" loading="lazy" />
          <img src="{{ asset('assets/img/clients/ad1global.jpg') }}" alt="AD1 Global Logo" class="h-11 w-auto object-contain opacity-80 hover:opacity-100 transition" loading="lazy" />
          <img src="{{ asset('assets/img/clients/marriottbonvoy.png') }}" alt="Marriott Bonvoy Logo" class="h-20 w-auto object-contain opacity-80 hover:opacity-100 transition" loading="lazy" />
         </div>
      </section>
    
      <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center px-4">
          <div class="text-left">
            <h2 class="text-3xl md:text-4xl font-serif tracking-tight font-semibold mb-5 text-gray-900 uppercase">
              PROTECT YOUR ASSET PERFORMANCE
            </h2>
            <p class="text-lg text-gray-700 font-light mb-8 max-w-md">
              Request a confidential water audit to optimize your property’s health and profitability.
            </p>
            <a href="#contact-form" class="inline-block border border-gray-900 text-gray-900 font-light px-8 py-2 rounded-none bg-transparent transition
              hover:bg-gray-900 hover:text-white hover:shadow-md focus:outline-none tracking-wide text-base"
            >
              SPEAK WITH AN AUDITOR
            </a>
          </div>
          <div>
            <form id="contact-form" class="flex flex-col gap-4 max-w-lg w-full" action="/submit-contact" method="POST">
              <div class="flex gap-4">
                <input id="first-name" name="first-name" type="text" required
                  placeholder="First Name" aria-label="First Name"
                  class="flex-1 border border-gray-300 px-3 py-2 bg-white text-gray-900 font-light rounded-none text-base placeholder-gray-400 focus:border-gray-900 focus:outline-none"/>
                <input id="last-name" name="last-name" type="text" required
                  placeholder="Last Name" aria-label="Last Name"
                  class="flex-1 border border-gray-300 px-3 py-2 bg-white text-gray-900 font-light rounded-none text-base placeholder-gray-400 focus:border-gray-900 focus:outline-none"/>
              </div>
              <div class="flex gap-4">
                <input id="company-name" name="company-name" type="text"
                  placeholder="Company Name" aria-label="Company Name"
                  class="flex-1 border border-gray-300 px-3 py-2 bg-white text-gray-900 font-light rounded-none text-base placeholder-gray-400 focus:border-gray-900 focus:outline-none"/>
                <input id="company-role" name="company-role" type="text"
                  placeholder="Company Role" aria-label="Company Role"
                  class="flex-1 border border-gray-300 px-3 py-2 bg-white text-gray-900 font-light rounded-none text-base placeholder-gray-400 focus:border-gray-900 focus:outline-none"/>
              </div>
              <div class="flex gap-4">
                <input id="contact-number" name="contact-number" type="tel"
                  placeholder="Contact Number" aria-label="Contact Number"
                  class="flex-1 border border-gray-300 px-3 py-2 bg-white text-gray-900 font-light rounded-none text-base placeholder-gray-400 focus:border-gray-900 focus:outline-none"/>
                <input id="email" name="email" type="email" required
                  placeholder="Email" aria-label="Email Address"
                  class="flex-1 border border-gray-300 px-3 py-2 bg-white text-gray-900 font-light rounded-none text-base placeholder-gray-400 focus:border-gray-900 focus:outline-none"/>
              </div>
              <select id="reason" name="reason" aria-label="Reason for Contact"
                class="border border-gray-300 px-3 py-2 bg-white text-gray-900 font-light rounded-none text-base placeholder-gray-400 focus:border-gray-900 focus:outline-none">
                <option value="">Reason for Contact</option>
                <option>Request a Water Audit</option>
                <option>Billing or Invoice Question</option>
                <option>Consultation on Smart Water Solutions</option>
                <option>Technical Support</option>
                <option>General Inquiry</option>
              </select>
              <textarea id="message" name="message" rows="3" required
                placeholder="Message" aria-label="Your Message"
                class="border border-gray-300 px-3 py-2 bg-white text-gray-900 font-light rounded-none text-base placeholder-gray-400 focus:border-gray-900 focus:outline-none resize-none"></textarea>
              <button type="submit"
                class="mt-2 border border-gray-900 text-gray-900 font-light px-8 py-2 rounded-none bg-transparent transition
                  hover:bg-gray-900 hover:text-white hover:shadow-md tracking-wide text-base">
                Submit Request
              </button>
            </form>
          </div>
        </div>
      </section>
  @endsection

