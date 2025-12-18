@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@push('styles')
<style>
    .device {
      border-radius: 36px;
      background: linear-gradient(180deg,#0b1220 0%,#101827 100%);
      box-shadow:
        0 28px 80px rgba(2,6,23,.28),
        inset 0 0 0 2px rgba(255,255,255,.5);
      border: 10px solid rgba(15,23,42,.04);
    }
    .notch {
      width: 38%;
      height: 26px;
      background: #0b1220;
      border-bottom-left-radius: 14px;
      border-bottom-right-radius: 14px;
      margin: 0 auto;
      box-shadow: 0 2px 8px rgba(0,0,0,.35) inset;
    }
    /* Soft animation */
    .tap {transition: transform .2s ease, box-shadow .3s ease;}
    .tap:active {transform: translateY(1px) scale(.995);}
    .lift {transition: transform .25s ease, box-shadow .25s ease;}
    .lift:hover {transform: translateY(-2px); box-shadow: 0 18px 50px rgba(2,6,23,.18);}
    /* Glass card */
    .glass {
      background: linear-gradient(180deg,rgba(255,255,255,.92),rgba(255,255,255,.88));
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,.7);
    }
    /* Subtle gradient haze */
    .haze {
      background:
        radial-gradient(1200px 600px at 30% -10%, #7ab6ff33 0%, transparent 60%),
        radial-gradient(900px 500px at 120% 80%, #60a5fa33 0%, transparent 60%);
    }
</style>
@endpush

@section('content')
<section class="bg-white py-16">
  <div class="container mx-auto px-6 lg:px-8 flex flex-col lg:flex-row items-center gap-12">
    <!-- Hero Text -->
    <div class="lg:w-1/2">
      <h1 class="text-4xl font-extrabold text-gray-900 mb-4">
        Partner with Us as an MEP Servicer
      </h1>
      <p class="text-lg text-gray-700 mb-6">
        Join our network of mechanical, electrical & plumbing professionals to deliver cutting-edge water-efficiency solutions—and unlock new revenue streams, training, & ongoing support.
      </p>
      <a href="#"
        class="group mt-8 inline-flex items-center justify-between rounded-full bg-zinc-100 text-zinc-900 px-6 py-3 font-semibold
                shadow-lg shadow-black/20 transition-all duration-300 hover:-translate-y-1 hover:bg-white">
        <span>Become an Servicer</span>
        <span class="ml-4 grid place-items-center w-9 h-9 rounded-full bg-zinc-900/10 text-zinc-900 transition-transform duration-300 group-hover:rotate-45">
          <i class="ri-arrow-right-up-line"></i>
        </span>
      </a>
    </div>
    <!-- Hero Image -->
    <div class="lg:w-1/2">
      <img src="/assets/img/Plumbing_installers_Increasing_revenue_1.png"
           alt="MEP Technician"
           class="rounded-lg shadow-lg w-full object-cover" />
    </div>
  </div>
</section>

<!-- === Premium Cards (drop-in) === -->
<section class="max-w-7xl mx-auto px-6 py-14">
  <div class="mb-8">
    <p class="text-sm tracking-widest text-slate-500 uppercase">The easy way to go: Built for pros.</p>
    <h2 class="text-3xl md:text-4xl font-semibold text-slate-900">Why Partner with Us? </h2>
    <p class="mt-3 text-slate-600 max-w-2xl">Real time—alerting for available jobs in your radius, applying, verifying, and growing your pipeline with less effort.</p>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

    <!-- Card 1 -->
    <article class="lift glass rounded-3xl p-6 shadow-xl">
      <div class="flex items-center justify-between">
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-blue-600 to-indigo-600 text-white grid place-items-center shadow">
          <!-- bell -->
          <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.5 18.5a2.5 2.5 0 11-5 0m9-7a6.5 6.5 0 10-13 0c0 3-1.5 4.5-2.5 5.5h20c-1-1-2.5-2.5-2.5-5.5z"/>
          </svg>
        </div>
        <span class="text-xs text-slate-500">Real-time</span>
      </div>
      <h3 class="mt-5 text-lg font-semibold text-slate-900">Instant Alerts</h3>
      <p class="mt-1 text-slate-600 leading-relaxed">Get new jobs the moment they’re available—no refreshing, no chasing.</p>
      
    </article>

    <!-- Card 2 -->
    <article class="lift glass rounded-3xl p-6 shadow-xl">
      <div class="flex items-center justify-between">
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-emerald-500 to-teal-600 text-white grid place-items-center shadow">
          <!-- tap -->
          <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11v8m0 0l-3-3m3 3l3-3M6 11a6 6 0 1112 0v1"/>
          </svg>
        </div>
        <span class="text-xs text-slate-500">1-tap</span>
      </div>
      <h3 class="mt-5 text-lg font-semibold text-slate-900">Quick Apply</h3>
      <p class="mt-1 text-slate-600 leading-relaxed">Send your profile in a tap. No long forms. Keep momentum and win the work.</p>
    </article>

    <!-- Card 3 -->
    <article class="lift glass rounded-3xl p-6 shadow-xl">
      <div class="flex items-center justify-between">
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-fuchsia-500 to-purple-600 text-white grid place-items-center shadow">
          <!-- shield -->
          <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l7 4v5c0 5-3.5 7.5-7 9-3.5-1.5-7-4-7-9V7l7-4z"/>
          </svg>
        </div>
        <span class="text-xs text-slate-500">Verified</span>
      </div>
      <h3 class="mt-5 text-lg font-semibold text-slate-900">Trusted Jobs</h3>
      <p class="mt-1 text-slate-600 leading-relaxed">Opportunities pre-screened for legitimacy, scope, and fair expectations.</p>
    </article>

    <!-- Card 4 -->
    <article class="lift glass rounded-3xl p-6 shadow-xl">
      <div class="flex items-center justify-between">
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-orange-500 to-amber-600 text-white grid place-items-center shadow">
          <!-- chart -->
          <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 19h16M7 16V8m5 8V5m5 11v-6"/>
          </svg>
        </div>
        <span class="text-xs text-slate-500">Growth</span>
      </div>
      <h3 class="mt-5 text-lg font-semibold text-slate-900">Grow Your Pipeline</h3>
      <p class="mt-1 text-slate-600 leading-relaxed">Better leads, clearer scopes, faster close—so you can scale with confidence.</p>
    </article>


    <!-- Card 5 -->
    <article
      class="rounded-[28px] bg-white shadow-[0_30px_60px_rgba(2,6,23,.08)] p-8
             transition-all duration-300 will-change-transform hover:-translate-y-1 hover:shadow-2xl hover:scale-[1.01]">
      <div class="w-14 h-14 rounded-2xl bg-slate-900/90 text-white grid place-items-center mb-6">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h8m-8 5h16"/>
        </svg>
      </div>
      <h3 class="text-xl font-semibold text-slate-900">Discounted Equipment</h3>
      <p class="mt-3 text-[15px] leading-relaxed text-slate-500">
        Exclusive partner pricing on top-quality equipment and tools.
      </p>
    </article>

    <!-- Card 5 -->
    <article
      class="rounded-[28px] bg-white shadow-[0_30px_60px_rgba(2,6,23,.08)] p-8
             transition-all duration-300 will-change-transform hover:-translate-y-1 hover:shadow-2xl hover:scale-[1.01]">
      <div class="w-14 h-14 rounded-2xl bg-slate-900/90 text-white grid place-items-center mb-6">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 17l6-6 4 4 8-8"/>
        </svg>
      </div>
      <h3 class="text-xl font-semibold text-slate-900">Referral Commissions</h3>
      <p class="mt-3 text-[15px] leading-relaxed text-slate-500">
        Earn recurring commissions for every successful referral you make.
      </p>
    </article>

    <!-- Card 7 -->
    <article
      class="rounded-[28px] bg-white shadow-[0_30px_60px_rgba(2,6,23,.08)] p-8
             transition-all duration-300 will-change-transform hover:-translate-y-1 hover:shadow-2xl hover:scale-[1.01]">
      <div class="w-14 h-14 rounded-2xl bg-slate-900/90 text-white grid place-items-center mb-6">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9"/>
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m0-16L3 12h9"/>
        </svg>
      </div>
      <h3 class="text-xl font-semibold text-slate-900">Training & Support</h3>
      <p class="mt-3 text-[15px] leading-relaxed text-slate-500">
        Access ongoing training, resources, and dedicated partner support.
      </p>
    </article>

    <!-- Card 8 -->
    <article
      class="rounded-[28px] bg-white shadow-[0_30px_60px_rgba(2,6,23,.08)] p-8
             transition-all duration-300 will-change-transform hover:-translate-y-1 hover:shadow-2xl hover:scale-[1.01]">
      <div class="w-14 h-14 rounded-2xl bg-slate-900/90 text-white grid place-items-center mb-6">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-6h13v6m-8 0h8M3 13v-2h6v2H3z"/>
        </svg>
      </div>
      <h3 class="text-xl font-semibold text-slate-900">Automated Proposals</h3>
      <p class="mt-3 text-[15px] leading-relaxed text-slate-500">
        Generate and send professional proposals with one click.
      </p>
    </article>

     <!-- Dark premium CTA -->
      <a href="#"
         class="group mt-8 inline-flex items-center justify-between rounded-full bg-zinc-100 text-zinc-900 px-6 py-3 font-semibold
                shadow-lg shadow-black/20 transition-all duration-300 hover:-translate-y-1 hover:bg-white">
        <span>Get Early Access</span>
        <span class="ml-4 grid place-items-center w-9 h-9 rounded-full bg-zinc-900/10 text-zinc-900 transition-transform duration-300 group-hover:rotate-45">
          <i class="ri-arrow-right-up-line"></i>
        </span>
      </a>

  </div>
</section>

<section class="bg-white py-20 sm:py-24">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-16 gap-y-12 items-center">
      
      <!-- Left Content -->
      <div>
        <h2 class="text-sm font-semibold tracking-wide uppercase text-gray-800">Exclusive On-Demand Training</h2>
        <p class="mt-3 text-4xl sm:text-4xl font-bold tracking-tight text-gray-900">Watch Our Installer Webinar</p>
        <p class="mt-6 text-lg text-gray-600 leading-relaxed">
          In just 15 minutes, uncover the exact strategies top MEP professionals use to increase project profitability by 20% without adding a single dollar to their overhead.
        </p>

        <!-- Features -->
        <div class="mt-10 space-y-8">
          <div class="flex gap-x-4">
            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center ring-1 ring-gray-200 group hover:bg-gray-200 transition-all">
              <i class="ri-pie-chart-2-fill text-xl text-gray-700 group-hover:scale-110 transition-transform"></i>
            </div>
            <div>
              <h3 class="text-lg font-semibold text-gray-900">Increase Profit Margins</h3>
              <p class="mt-1 text-gray-600">Learn to bid smarter and integrate high-margin services into existing jobs.</p>
            </div>
          </div>
          <div class="flex gap-x-4">
            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center ring-1 ring-gray-200 group hover:bg-gray-200 transition-all">
              <i class="ri-user-star-fill text-xl text-gray-700 group-hover:scale-110 transition-transform"></i>
            </div>
            <div>
              <h3 class="text-lg font-semibold text-gray-900">Become the Go-To Pro</h3>
              <p class="mt-1 text-gray-600">Stand out with cutting-edge tech and unmatched service quality.</p>
            </div>
          </div>
          <div class="flex gap-x-4">
            <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center ring-1 ring-gray-200 group hover:bg-gray-200 transition-all">
              <i class="ri-timer-flash-fill text-xl text-gray-700 group-hover:scale-110 transition-transform"></i>
            </div>
            <div>
              <h3 class="text-lg font-semibold text-gray-900">Win Back Your Time</h3>
              <p class="mt-1 text-gray-600">Streamline your workflow from bidding to installation with our proven system.</p>
            </div>
          </div>
        </div>

        <!-- CTA Button -->
        <div class="mt-8">
          <a href="#" class="inline-flex items-center px-6 py-3 rounded-full bg-gray-900 text-white font-semibold shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all">
            Reserve My Spot Now
            <i class="ri-arrow-right-up-line ml-3"></i>
          </a>
        </div>
      </div>

      <!-- Right Content -->
      <div class="flex flex-col gap-10">
        <div class="aspect-video rounded-xl shadow-2xl overflow-hidden ring-1 ring-gray-200">
          <img src="/assets/img/Plumbing_installers_Increasing_revenue.png" 
               alt="Webinar preview thumbnail showing a professional presenting" 
               class="w-full h-full object-cover" />
        </div>


        <figure class="bg-gray-50 p-6 rounded-xl shadow-md ring-1 ring-gray-200">
          <blockquote class="text-lg font-medium leading-7 text-gray-700">
            <p>“I was skeptical, but this laid out a practical blueprint. We implemented two suggestions and saw an immediate 18% bump on our next three projects. It’s a no-brainer.”</p>
          </blockquote>
          <figcaption class="mt-4 flex items-center gap-x-3">
            <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Photo of John Carter" class="h-12 w-12 rounded-full object-cover ring-2 ring-gray-200">
            <div>
              <div class="font-semibold text-gray-900">John Carter</div>
              <div class="text-gray-600 text-sm">Owner, Carter Plumbing & HVAC</div>
            </div>
          </figcaption>
        </figure>
      </div>

    </div>
  </div>
</section>

<style>
  .glass-ui {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);
    border: 1px solid rgba(255, 255, 255, 0.1);
  }
  .haze-bg {
    background-image: linear-gradient(160deg, #1e3a8a 0%, #3b82f6 50%, #ea580c 100%);
  }
</style>

<style>
  .glass-ui {
    background: rgba(255, 255, 255, 0.06);
    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);
    border: 1px solid rgba(255, 255, 255, 0.12);
  }
  .device {
    border-radius: 40px;
    box-shadow: 0 30px 80px rgba(0,0,0,.45);
  }
  .mono-chip {
    background: linear-gradient(180deg, rgba(255,255,255,.14), rgba(255,255,255,.06));
    border: 1px solid rgba(255,255,255,.12);
  }
</style>

<section class="max-w-7xl mx-auto px-6 py-12">
  <h3 class="text-2xl md:text-3xl font-semibold tracking-tight  mb-10">
    TRUSTED BY INDUSTRY LEADERS: JOIN OUR NETWORK 
  </h3>
   

  <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-8 items-center">
    <!-- Logo 1 -->
    <a href="https://example.com/partner-1" target="_blank" rel="noopener" aria-label="Partner 1"
       class="group flex items-center justify-center">
      <img src="/assets/img/partners/hdm-business-1.png"
           alt="Partner 1 logo"
           class="h-10 w-auto filter grayscale opacity-60 transition duration-300 group-hover:grayscale-0 group-hover:opacity-100" />
    </a>

    <!-- Logo 2 -->
    <a href="https://example.com/partner-2" target="_blank" rel="noopener" aria-label="Partner 2"
       class="group flex items-center justify-center">
      <img src="/assets/img/partners/Maximum-plumbing-inc.png"
           alt="Partner 2 logo"
           class="h-10 w-auto filter grayscale opacity-60 transition duration-300 group-hover:grayscale-0 group-hover:opacity-100" />
    </a>

    <!-- Logo 3 -->
    <a href="https://example.com/partner-3" target="_blank" rel="noopener" aria-label="Partner 3"
       class="group flex items-center justify-center">
      <img src="/assets/img/partners/rks-plumbing.png"
           alt="Partner 3 logo"
           class="h-10 w-auto filter grayscale opacity-60 transition duration-300 group-hover:grayscale-0 group-hover:opacity-100" />
    </a>

    <!-- Logo 4 -->
    <a href="https://example.com/partner-4" target="_blank" rel="noopener" aria-label="Partner 4"
       class="group flex items-center justify-center">
      <img src="/assets/img/partners/logo-RWP-white.png"
           alt="Partner 4 logo"
           class="h-10 w-auto filter grayscale opacity-60 transition duration-300 group-hover:grayscale-0 group-hover:opacity-100" />
    </a>

    <!-- Logo 5 -->
    <a href="https://example.com/partner-5" target="_blank" rel="noopener" aria-label="Partner 5"
       class="group flex items-center justify-center">
      <img src="/assets/img/partners/TRV-Mechanical-HVAC.png"
           alt="Partner 5 logo"
           class="h-10 w-auto filter grayscale opacity-60 transition duration-300 group-hover:grayscale-0 group-hover:opacity-100" />
    </a>

    <!-- Logo 6 -->
    <a href="https://example.com/partner-6" target="_blank" rel="noopener" aria-label="Partner 6"
       class="group flex items-center justify-center">
      <img src="/assets/img/partners/logo-1-6.png"
           alt="Partner 6 logo"
           class="h-10 w-auto filter grayscale opacity-60 transition duration-300 group-hover:grayscale-0 group-hover:opacity-100" />
    </a>
    
  </div>
</section>

<section class="">

  <div class="max-w-7xl mx-auto px-6 py-20 grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
    <!-- Left column -->
    <div class="lg:mb-20">
      <h1 class="text-4xl md:text-4xl font-bold leading-tight tracking-tight">
        Your Next High-Value Project is Waiting.
      </h1>
      <p class="mt-4 text-lg text-zinc-400">
        Stop chasing leads. Join an elite network of MEP professionals and let high-quality, verified jobs come directly to you.
      </p>
    <p class="mt-4 text-lg text-zinc-400">
      Sign up today and we’ll reach out with your personalized onboarding guide. No cost or obligation. We respect your privacy. Unsubscribe anytime.
        </p> 
      <!-- Dark premium CTA -->
      <a href="#"
         class="group mt-8 inline-flex items-center justify-between rounded-full bg-zinc-100 text-zinc-900 px-6 py-3 font-semibold
                shadow-lg shadow-black/20 transition-all duration-300 hover:-translate-y-1 hover:bg-white">
        <span>Get Early Access</span>
        <span class="ml-4 grid place-items-center w-9 h-9 rounded-full bg-zinc-900/10 text-zinc-900 transition-transform duration-300 group-hover:rotate-45">
          <i class="ri-arrow-right-up-line"></i>
        </span>
      </a>

      <!-- Logos -->
      <div class="mt-12">
        <p class="text-sm font-medium text-zinc-500"></p>
        <div class="mt-4 flex items-center gap-x-6 gap-y-4 flex-wrap text-zinc-500">
          <i class="ri-hard-hat-fill text-4xl"></i>
          <i class="ri-tools-fill text-4xl"></i>
          <i class="ri-building-4-fill text-4xl"></i>
          <i class="ri-fire-fill text-4xl"></i>
        </div>
      </div>
    </div>

    <!-- Right column: two premium mock screens (straight) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 lg:gap-8">
      <!-- Screen A -->
      <div class="device relative w-[280px] h-[580px] p-2.5 bg-zinc-800 rounded-[40px] transition-transform duration-500">
        <div class="h-full w-full bg-zinc-900 rounded-[30px] overflow-hidden">
          <div class="relative h-full px-4 pt-8 pb-6">
            <h3 class="text-zinc-100 text-lg font-semibold tracking-wide">Priority Jobs</h3>

            <!-- Hero card (monochrome) -->
            <div class="glass-ui rounded-3xl p-4 mt-4 shadow-2xl">
              <div class="w-14 h-14 rounded-full mono-chip text-white grid place-items-center mx-auto -mt-11 shadow ring-8 ring-zinc-900">
                <i class="ri-notification-3-fill text-2xl text-zinc-100"></i>
              </div>
              <div class="text-center mt-2">
                <div class="text-zinc-100 text-xl font-bold">Immediate Opening</div>
                <div class="mt-1 text-zinc-100 text-[22px] font-semibold leading-tight">Commercial Plumber</div>
                <div class="mt-2 text-zinc-400 text-sm">Downtown Financial District</div>
              </div>
              <!-- Dark pill -->
              <a href="#"
                 class="group mt-5 w-full inline-flex items-center justify-between rounded-full bg-zinc-100 text-zinc-900 px-5 py-3 font-semibold
                        shadow transition-all duration-300 hover:bg-white">
                <span>View Details</span>
                <span class="grid place-items-center w-7 h-7 rounded-full bg-zinc-900/10 transition-transform duration-300 group-hover:translate-x-1">
                  <i class="ri-arrow-right-s-line"></i>
                </span>
              </a>
            </div>

            <!-- List -->
            <div class="mt-5 space-y-3">
              <div class="glass-ui rounded-2xl px-4 py-3 flex items-center gap-4">
                <div class="mono-chip w-10 h-10 rounded-xl grid place-items-center text-zinc-200"><i class="ri-home-gear-line"></i></div>
                <div>
                  <p class="text-zinc-100 font-medium">Residential HVAC</p>
                  <p class="text-zinc-400 text-xs">Contract • 3.2 miles</p>
                </div>
              </div>
              <div class="glass-ui rounded-2xl px-4 py-3 flex items-center gap-4">
                <div class="mono-chip w-10 h-10 rounded-xl grid place-items-center text-zinc-200"><i class="ri-lightbulb-flash-line"></i></div>
                <div>
                  <p class="text-zinc-100 font-medium">Electrical Panel Upgrade</p>
                  <p class="text-zinc-400 text-xs">Contract • 5.0 miles</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Screen B -->
      <div class="device relative w-[280px] h-[580px] p-2.5 bg-zinc-800 rounded-[40px] transition-transform duration-500 lg:mt-12">
        <div class="relative h-full w-full rounded-[30px] overflow-hidden ring-1 ring-white/10">
          <!-- Map (desaturated) -->
          <!-- <div class="h-full w-full bg-[url('office_building_water_efficiency_1.jpeg')] bg-cover bg-center grayscale opacity-70"></div> -->
          <div
              class="h-full w-full bg-cover bg-center grayscale opacity-70"
              style="background-image: url('{{ asset('assets/img/industries/office_building_water_efficiency_1.jpeg') }}')">
          </div>

          <!-- Bottom sheet -->
          <div class="absolute bottom-4 left-1/2 -translate-x-1/2 w-[90%] glass-ui rounded-3xl p-4 shadow-xl">
            <div class="flex items-center justify-between">
              <div>
                <p class="text-zinc-100 font-semibold">Main St — Burst pipe</p>
                <p class="text-zinc-400 text-xs">Urgent • 2.0 miles</p>
              </div>
              <div class="text-zinc-200"><i class="ri-map-pin-fill text-2xl"></i></div>
            </div>
            <div class="mt-4 flex items-center gap-3">
              <button class="flex-1 rounded-full bg-zinc-100 text-zinc-900 py-2.5 font-semibold shadow transition-all hover:bg-white">Accept</button>
              <button class="flex-1 rounded-full bg-zinc-800 text-zinc-200 py-2.5 font-medium border border-white/10 transition-all hover:bg-zinc-700">Decline</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection
