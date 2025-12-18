@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')
  <!-- ========= Hero ========= -->
  <section class="relative">
    <div class="absolute inset-0 -z-10 bg-[radial-gradient(1200px_400px_at_10%_-10%,#e2e8f0_0%,transparent_60%)]"></div>
    <div class="max-w-7xl mx-auto px-6 py-20 lg:py-24 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      <!-- Text -->
      <div>
        <p class="text-xs tracking-widest text-slate-500 uppercase">Partner Program</p>
        <h1 class="mt-3 text-4xl md:text-5xl font-extrabold leading-tight tracking-tight">
          Become a Water Solutions <span class="whitespace-nowrap">Partner.</span>
        </h1>
        <p class="mt-5 text-[17px] leading-8 text-slate-600">
          Turn your relationships into results. Introduce modern water management—audits, engineering, metering,
          and telemetry—and earn recurring commissions while delivering measurable savings and ESG impact.
        </p>

        <div class="mt-8 flex items-center gap-3">
          <button @click="openAgent=true"
                  class="inline-flex items-center justify-center rounded-full bg-slate-900 text-white px-6 py-3 text-[15px] font-semibold shadow-sm hover:bg-black transition">
            Become an Agent
            <i class="ri-arrow-right-up-line ml-3 text-[18px]"></i>
          </button>
          <a href="#how-it-works" class="text-slate-700 hover:text-black text-[15px] font-medium">How it works</a>
        </div>

        <div class="mt-8 flex items-center gap-8 text-sm text-slate-500">
          <div class="flex items-center gap-2"><i class="ri-shield-check-line"></i><span>Independent contractor friendly</span></div>
          <div class="hidden sm:flex items-center gap-2"><i class="ri-bar-chart-2-line"></i><span>Transparent commissions</span></div>
        </div>
      </div>

      <!-- Visual -->
      <div class="relative">
        <div class="aspect-[5/4] rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
          <img src="/assets/img/agents/one.avif"
               alt="Professional collaboration" class="w-full h-full object-cover">
        </div>
      </div>
    </div>
  </section>

  <!-- ========= Why Partner (3-up cards) ========= -->
  <section class="py-14">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="rounded-2xl border border-slate-200 p-8 hover:shadow-md transition">
          <div class="w-10 h-10 rounded-lg border border-slate-300 grid place-items-center text-slate-700">
            <i class="ri-group-line text-[18px]"></i>
          </div>
          <h3 class="mt-5 text-lg font-semibold">Leverage Your Network</h3>
          <p class="mt-2 text-slate-600 leading-7">
            Make warm introductions to owners and operators who need performance and clarity on water spend.
          </p>
        </div>

        <div class="rounded-2xl border border-slate-200 p-8 hover:shadow-md transition">
          <div class="w-10 h-10 rounded-lg border border-slate-300 grid place-items-center text-slate-700">
            <i class="ri-line-chart-line text-[18px]"></i>
          </div>
          <h3 class="mt-5 text-lg font-semibold">Recurring Revenue</h3>
          <p class="mt-2 text-slate-600 leading-7">
            Earn competitive, tiered commissions on projects you help initiate—clearly tracked and reported.
          </p>
        </div>

        <div class="rounded-2xl border border-slate-200 p-8 hover:shadow-md transition">
          <div class="w-10 h-10 rounded-lg border border-slate-300 grid place-items-center text-slate-700">
            <i class="ri-seedling-line text-[18px]"></i>
          </div>
          <h3 class="mt-5 text-lg font-semibold">Real ESG Outcomes</h3>
          <p class="mt-2 text-slate-600 leading-7">
            Help clients hit GRESB/CDP targets with verified savings, sub-metering and continuous reporting.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ========= How It Works (clean timeline) ========= -->
  <section id="how-it-works" class="py-14">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <div>
          <h2 class="text-3xl font-extrabold tracking-tight">How it works</h2>
          <p class="mt-4 text-[17px] leading-8 text-slate-600">
            We make it simple: you open the door; we do the heavy lifting—audits, design, implementation, and
            monitoring—then we all share the wins.
          </p>
        </div>

        <ol class="relative border-l border-slate-200 pl-6 space-y-8">
          <li class="relative">
            <span class="absolute -left-[29px] top-0 w-6 h-6 rounded-full border border-slate-400 bg-white grid place-items-center text-[12px]">1</span>
            <h3 class="font-semibold ml-8">Share your profile</h3>
            <p class="mt-1 text-slate-600 ml-8">Send your details + LinkedIn. We’ll align on ideal accounts and use-cases.</p>
          </li>
          <li class="relative">
            <span class="absolute -left-[29px] top-0 w-6 h-6 rounded-full border border-slate-400 bg-white grid place-items-center text-[12px]">2</span>
            <h3 class="font-semibold ml-8">Warm introductions</h3>
            <p class="mt-1 text-slate-600 ml-8">We prepare concise material and join you for a focused discovery call.</p>
          </li>
          <li class="relative">
            <span class="absolute -left-[29px] top-0 w-6 h-6 rounded-full border border-slate-400 bg-white grid place-items-center text-[12px]">3</span>
            <h3 class="font-semibold ml-8">Deliver and track</h3>
            <p class="mt-1 text-slate-600 ml-8">We execute, verify savings, and report. You track commissions in-line.</p>
          </li>
        </ol>
      </div>
    </div>
  </section>

  <!-- ========= Perks & Enablement ========= -->
  <section class="py-14">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
      <div class="rounded-2xl border border-slate-200 p-8">
        <h2 class="text-2xl font-bold">Perks & incentives</h2>
        <ul class="mt-5 space-y-3 text-slate-700">
          <li class="flex gap-3"><i class="ri-check-line mt-1"></i> Tiered commissions up to <span class="font-semibold">&nbsp;15%</span> of project value.</li>
          <li class="flex gap-3"><i class="ri-check-line mt-1"></i> Early access to pilots & co-marketing support.</li>
          <li class="flex gap-3"><i class="ri-check-line mt-1"></i> Partner portal to track leads & payouts.</li>
          <li class="flex gap-3"><i class="ri-check-line mt-1"></i> Quarterly performance bonuses.</li>
        </ul>
      </div>

      <div class="rounded-2xl border border-slate-200 p-8">
        <h2 class="text-2xl font-bold">What we deliver for your contacts</h2>
        <ul class="mt-5 space-y-3 text-slate-700">
          <li class="flex gap-3"><i class="ri-collage-line mt-1"></i> Strategic audits (portfolio → site → fixture) with clear ROI.</li>
          <li class="flex gap-3"><i class="ri-speed-up-line mt-1"></i> Systems engineering: metering, recirculation, controls, telemetry.</li>
          <li class="flex gap-3"><i class="ri-bar-chart-box-line mt-1"></i> Continuous monitoring & verified reporting (GRESB/CDP-ready).</li>
          <li class="flex gap-3"><i class="ri-customer-service-2-line mt-1"></i> Low-friction installs, minimal downtime, measurable outcomes.</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- ========= CTA Banner ========= -->
  <section class="py-10">
    <div class="max-w-7xl mx-auto px-6">
      <div class="rounded-2xl border border-slate-200 p-8 lg:p-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <div>
          <h3 class="text-xl font-bold">Ready to open a few doors?</h3>
          <p class="mt-1 text-slate-600">We’ll bring the engineering; you bring the warm intro. Let’s get you earning.</p>
        </div>
        <button @click="openAgent=true"
                class="inline-flex items-center justify-center rounded-full bg-slate-900 text-white px-6 py-3 text-[15px] font-semibold shadow-sm hover:bg-black transition">
          Become an Agent
          <i class="ri-arrow-right-up-line ml-3 text-[18px]"></i>
        </button>
      </div>
    </div>
  </section>

  <!-- ========= Modal (agent sign-up) ========= -->
  <div x-show="openAgent" @keydown.escape.window="openAgent=false" class="fixed inset-0 z-50 hidden">
    <div x-show="openAgent" class="absolute inset-0 bg-black/40 backdrop-blur-sm" @click="openAgent=false"
         x-transition.opacity></div>

    <div x-show="openAgent" x-transition
         class="absolute inset-0 grid place-items-center p-4">
      <div class="w-full max-w-lg rounded-2xl bg-white border border-slate-200 shadow-xl p-6 relative">
        <button @click="openAgent=false" class="absolute top-4 right-4 text-slate-500 hover:text-slate-900">
          <i class="ri-close-line text-2xl"></i>
        </button>

        <h3 class="text-2xl font-bold">Begin your partnership</h3>
        <p class="mt-1 text-slate-600">Share a few details—we’ll follow up promptly.</p>

        <form class="mt-6 space-y-4" @submit.prevent="">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-slate-700">First name</label>
              <input type="text" required class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-slate-900" />
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700">Last name</label>
              <input type="text" required class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-slate-900" />
            </div>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-slate-700">Email</label>
              <input type="email" required class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-slate-900" />
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700">Best reach number</label>
              <input type="tel" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-slate-900" />
            </div>
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700">LinkedIn URL (optional)</label>
            <input type="url" placeholder="https://linkedin.com/in/you"
                   class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-slate-900" />
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700">Notes (optional)</label>
            <textarea rows="3" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-slate-900"
                      placeholder="Accounts you’re thinking of, regions, niches…"></textarea>
          </div>

          <div class="pt-2 flex justify-end">
            <button type="submit"
                    class="inline-flex items-center justify-center rounded-full bg-slate-900 text-white px-6 py-3 text-[15px] font-semibold shadow-sm hover:bg-black transition">
              Submit & Get Started
              <i class="ri-arrow-right-line ml-3"></i>
            </button>
          </div>
        </form>

        <p class="mt-4 text-xs text-slate-500">
          By submitting, you agree that we may contact you about the partner program. You can opt out at any time.
        </p>
      </div>
    </div>
  </div>
  @endsection