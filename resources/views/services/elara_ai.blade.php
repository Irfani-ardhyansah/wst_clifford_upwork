@extends('layouts.app')

@section('title', 'Water Solutions Technology')

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
      src="/assets/img/services/elara_ai_hero.png"
      alt="Modern hotel or commercial building"
      class="absolute inset-0 w-full h-full object-cover grayscale opacity-55 z-0" />
    <div class="absolute inset-0 bg-black bg-opacity-20 z-10"></div>
  
    <div class="relative z-20 max-w-2xl pl-6 md:pl-16 py-16">
      <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight drop-shadow">
        Elara AI Digital Billing Assistants 
      </h1>
      <p class="text-lg md:text-xl text-gray-100 font-light mb-7 max-w-xl">
        <span class="block"> <span class="font-bold text-white">Now every property has an AI water analyst</span> </span> 
        <span class="text-gray-300 block mt-2">
          Built on the world’s premier real estate water management, AI platform: Your water is now intelligent, and will speak to you!
        </span>
      </p>
        <a href="#"
          class="group inline-flex items-center justify-between rounded-full bg-white text-zinc-900 px-6 py-3 font-semibold
            shadow-lg shadow-black/20 transition-all duration-300 hover:-translate-y-1 hover:bg-white">
          <span>Request a Confidential Demo</span>
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
  
  <section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-start">
      
      <div class="space-y-8">
        <h2 class="text-4xl font-extrabold text-gray-900 leading-snug">
          Welcome to Elara AI
        </h2>
  
        <div class="flex items-start space-x-6" data-aos="fade-right">
          <div class="rule w-1 h-40 bg-gradient-to-b from-blue-600 to-blue-300"></div>
          <p class="flex-1 text-lg text-gray-700 leading-relaxed">
            Elara AI empowers real-estate professionals (property managers &amp; asset managers)
            with instant, accurate billing insights while eliminating manual data entry. From
            portfolio-wide benchmarking to ESG-ready reports and predictive alerts, Elara is
            your partner in utility optimization.
          </p>
        </div>
  
        <a href="#contact"
           class="inline-block bg-black text-white font-semibold px-8 py-3 text-base hover:bg-gray-900 transition">
          Speak with an Auditor
        </a>
      </div>
  
      <div class="space-y-1">
        <h3 class="text-xl font-extrabold text-gray-900 leading-snug">
          A Better Way to Manage Portfolio and Property Water Utilities
        </h3>
        <img 
          src="/assets/img/services/elara_ai_dashboard.png" 
          alt="Water Utilities Illustration"
          class="w-full h-auto object-cover rounded-lg"
        />  
        <h3 class="text-xl font-extrabold text-gray-900 leading-snug">
          Elara AI | Know More. React Faster. Save Smarter.
        </h3>
      </div>
  
    </div>
  </section>
  
  <section class="bg-white py-20">
    <div
      x-data="{
        selected: 0,
        features: [
          {
            label: 'Smart Utility Data Extraction',
            header: 'Smart Utility Data Extraction',
            desc: 'Extracts data from water utility bills (PDF, scan, image, or Excel) instantly and with zero manual entry. From 7 manual hours – 30 seconds.'
          },
          {
            label: 'Integrated with Smart Technology Systems',
            header: 'Integrated with Smart Technology Systems',
            desc: 'Connects data insights directly to building-level monitoring systems to track real-time improvements and savings.'
          },
          {
            label: 'Benchmarking & ESG Reporting',
            header: 'Benchmarking & ESG Reporting',
            desc: 'Automatically compares water usage across properties and generates ESG, LEED, or GRESB-ready reports.'
          },
          {
            label: 'Real-Time Anomaly Detection',
            header: 'Real-Time Anomaly Detection',
            desc: 'Instantly detects billing errors, leaks, and inefficient consumption across your portfolio.'
          },
          {
            label: 'Built-in Chatbot Support',
            header: 'Built-in Chatbot Support',
            desc: 'Ask Elara anything — from utility trends and usage summaries to projected savings. Get instant answers and recommendations.'
          },
          {
            label: 'Chat with Elara',
            header: 'Chat with Elara',
            desc: 'Elara’s chatbot is available 24/7. Ask questions, review summaries, or run quick savings estimates in a conversational interface.'
          }
        ]
      }"
      class="max-w-7xl mx-auto px-4 grid md:grid-cols-5 gap-10 items-stretch"
    >
      <div class="col-span-full md:col-span-2 flex flex-col">
        <h3 class="text-3xl font-bold text-gray-900 mb-8 text-left">
          What Makes Elara AI the Industry Standard?
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
      
      <div class="col-span-full md:col-span-3 relative min-h-[330px] flex items-center mt-8 md:mt-0">
        <video
          class="absolute inset-0 w-full h-full object-cover z-0"
          autoplay
          loop
          muted
          playsinline
        >
          <source
            src="/assets/img/services/elara_ai_video.mp4"
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

  <section class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
        <div class="space-y-12 mt-8 lg:mt-0">
          <h2 class="text-4xl font-bold text-gray-900">
            Advisory Services
          </h2>
          <p class="text-lg text-gray-600">
            Our core services to get you started.
          </p>
  
          <div class="mt-8 pt-6 border-t">
            <label for="ai-challenge-input" class="font-semibold text-lg">
              Describe your challenge:
            </label>
            <textarea
              id="ai-challenge-input"
              rows="3"
              class="w-full mt-2 p-2 border rounded-md"
              placeholder="e.g., 'My hotel's water bills have increased by 30% this year...'">
            </textarea>
            <a href="#" 
              class="group inline-flex items-center rounded-full px-6 py-3 bg-gray-900 text-white font-semibold shadow-md 
                hover:shadow-lg hover:-translate-y-0.5 transition-all">
              <span>✨ Get Elara AI-Powered Advice</span>
              <span class="ml-4 grid place-items-center w-9 h-9 rounded-full">
                <i class="ri-arrow-right-up-line ml-3"></i>
              </span>
            </a>
            <p id="ai-error-msg" class="text-red-500 text-sm mt-2 hidden"></p>
          </div>
        </div>
  
        <div class="flex flex-col justify-center space-y-4">
          <h2 class="text-2xl font-bold text-gray-900">Chat with Elara</h2>
          <p class="text-lg text-gray-600">
            Sample Elara before scheduling a demo.
          </p>
        </div>
  
        <div class="relative mt-8 lg:mt-0">
          <img
            src="/assets/img/services/elara_ai_hero.png"
            alt="Advisory Service Image"
            class="shadow-lg w-full h-96 object-cover"
          />
          <div
            class="absolute inset-0 bg-black/60 px-6 pt-6 pb-20 flex flex-col justify-end text-white transform-content visible"
          >
            <h3 class="text-2xl font-bold">
              Comprehensive Water Audits
            </h3>
            <p class="mt-2 text-sm">
              We begin with a thorough audit of your property's water usage to identify key areas for improvement and savings.
            </p>
            <a
              href="#"
              class="mt-4 font-semibold hover:underline"
            >
              More about Audits →
            </a>
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
  </script>
@endpush
