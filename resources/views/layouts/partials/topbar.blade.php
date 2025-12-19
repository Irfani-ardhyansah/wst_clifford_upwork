
    <!-- start small navbar -->
  <div class="hidden md:flex bg-gray-100 text-xs py-1 px-4 justify-end items-center space-x-4 text-gray-800">
    <a href="{{ route('opportunities.investor') }}" class="hover:underline">Investors</a>
    <a href="{{ route('opportunities.about') }}" class="hover:underline">About</a>

    <div x-data="{ dropdown: null }" class="relative" @mouseenter="dropdown = 'opportunities'" @mouseleave="dropdown = null">
      <button class="hover:underline flex items-center focus:outline-none">
        Opportunities
        <svg class="w-3 h-3 ml-1" fill="currentColor" viewBox="0 0 20 20">
          <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
        </svg>
      </button>
      <div x-show="dropdown === 'opportunities'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
          class="absolute right-0 mt-2 bg-white text-gray-800 shadow-lg rounded p-2 text-sm space-y-2 w-56 z-40">
        <a href="{{ route('opportunities.property_owners_managers') }}" class="block hover:bg-gray-50 rounded px-2 py-1">Asset Owners and Managers</a>
        <a href="{{ route('opportunities.mep_installers') }}" class="block hover:bg-gray-50 rounded px-2 py-1">Mechanical & Plumbing Installers</a>
        <a href="{{ route('opportunities.esg') }}" class="block hover:bg-gray-50 rounded px-2 py-1">Real Estate Benchmark - GRESB</a>
        <a href="{{ route('opportunities.careers') }}" class="block hover:bg-gray-50 rounded px-2 py-1">Careers</a>
        <a href="{{ route('opportunities.agents') }}" class="block hover:bg-gray-50 rounded px-2 py-1">Agents</a>
      </div>
    </div>

    <div x-data="{ open: false }" class="relative">
      <button @click="open = !open" class="focus:outline-none">
        <svg class="h-4 w-4 inline" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <circle cx="12" cy="8" r="4"/><path d="M6 20v-2a6 6 0 1 1 12 0v2"/>
        </svg>
      </button>
      <div x-show="open" @click.away="open=false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
          class="absolute right-0 mt-2 bg-white shadow-lg rounded p-2 text-sm space-y-2 w-44 z-40 text-gray-800">
        <a href="#" class="block hover:bg-gray-50 rounded px-2 py-1">Smart Monitoring</a>
        <a href="#" class="block hover:bg-gray-50 rounded px-2 py-1">Project Progress</a>
        <a href="#" class="block hover:bg-gray-50 rounded px-2 py-1">Elara AI Assistant</a>
      </div>
    </div>

  <div
      x-data="{
          open: false,
          index: 0,
          images: [
              '{{ asset('assets/img/condo_water_savings_2.jpeg') }}',
              '{{ asset('assets/img/cooling_tower_1.png') }}',
          ]
      }"
      x-effect="open 
          ? document.body.classList.add('overflow-hidden') 
          : document.body.classList.remove('overflow-hidden')">

    <!-- ================= TRIGGER (ICON / PHOTO CARD) ================= -->
    <button
        @click="open = true"
        class="rounded-3xl overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105"
        aria-label="Open location modal">
        <svg class="h-4 w-4 inline text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path d="M12 21s-6-5.686-6-10a6 6 0 1 1 12 0c0 4.314-6 10-6 10z"/>
          <circle cx="12" cy="11" r="2"/>
        </svg>
    </button>

    <!-- ================= OVERLAY ================= -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 backdrop-blur-0"
        x-transition:enter-end="opacity-100 backdrop-blur-sm"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 backdrop-blur-sm"
        x-transition:leave-end="opacity-0 backdrop-blur-0"
        class="fixed inset-0 z-50 bg-black/70 backdrop-blur-sm">

          <!-- ================= MODAL ================= -->
          <div
              x-show="open"
              x-transition:enter="transition ease-out duration-500"
              x-transition:enter-start="opacity-0 scale-95 translate-y-6"
              x-transition:enter-end="opacity-100 scale-100 translate-y-0"
              x-transition:leave="transition ease-in duration-300"
              x-transition:leave-start="opacity-100 scale-100 translate-y-0"
              x-transition:leave-end="opacity-0 scale-95 translate-y-6"
              @click.away="open = false"
              class="relative w-full h-full bg-white flex flex-col md:flex-row">

              <!-- ================= LEFT: IMAGE SLIDER ================= -->
              <div class="relative md:w-1/2 h-72 md:h-full bg-black overflow-hidden">

                  <template x-for="(img, i) in images" :key="i">
                      <img
                          x-show="index === i"
                          :src="img"
                          x-transition:enter="transition ease-out duration-700"
                          x-transition:enter-start="opacity-0 scale-105"
                          x-transition:enter-end="opacity-100 scale-100"
                          class="absolute inset-0 w-full h-full object-cover"
                      >
                  </template>

                  <!-- PREV -->
                  <button
                      @click="index = (index - 1 + images.length) % images.length"
                      class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full px-3 py-1 text-xl shadow"
                  >‹</button>

                  <!-- NEXT -->
                  <button
                      @click="index = (index + 1) % images.length"
                      class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full px-3 py-1 text-xl shadow"
                  >›</button>
              </div>

              <!-- ================= RIGHT: INFO + VERSE ================= -->
              <div class="md:w-1/2 p-6 md:p-10 overflow-y-auto space-y-6 text-gray-800">

                  <h2 class="text-2xl font-semibold">Location</h2>
                  <p>
                      <strong>Address:</strong><br>
                      1200 S. Andrews Ave,<br>
                      Suite 504,<br>
                      Fort Lauderdale, FL 33301
                  </p>

                  <p>
                      <strong>Email:</strong>
                      <a href="mailto:acc@watersolutech.com" class="underline">
                          acc@watersolutech.com
                      </a>
                  </p>

                  <p>
                      <strong>Phone:</strong>
                      <a href="tel:+19545083877" class="underline">
                          +1 (954) 508-3877
                      </a>
                  </p>

                  <hr>

                  <!-- ================= BIBLE VERSE ================= -->
                  <div
                      x-transition:enter="transition ease-out delay-300 duration-500"
                      x-transition:enter-start="opacity-0 translate-y-2"
                      x-transition:enter-end="opacity-100 translate-y-0"
                      class="space-y-2"
                  >
                      <p class="text-sm font-semibold tracking-wide">
                          John 4:14 | Yochanan (יוֹחָנָן) 4:14
                      </p>

                      <p class="italic leading-relaxed text-gray-600">
                          “But whosoever drinketh of the water that I shall give him shall never thirst;
                          but the water that I shall give him shall be in him a well of water springing
                          up into everlasting life.”
                      </p>
                  </div>
              </div>

              <!-- ================= CLOSE BUTTON ================= -->
              <button
                  @click="open = false"
                  class="absolute top-4 right-4 text-white md:text-black text-3xl"
                  aria-label="Close modal"
              >
                  ✕
              </button>

          </div>
      </div>
  </div>

  @guest
    <a
        href="{{ route('login') }}"
        class="rounded-3xl overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105"
        title="Login"
    >
        <svg class="h-4 w-4 inline text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
            <polyline points="10 17 15 12 10 7"/>
            <line x1="15" y1="12" x2="3" y2="12"/>
        </svg>
    </a>
  @endguest
  @auth
    <form method="POST" action="{{ route('logout') }}" class="inline">
        @csrf
        <button
            type="submit"
            class="rounded-3xl overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105"
            title="Logout"
        >
            <svg class="h-4 w-4 inline text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                <polyline points="16 17 21 12 16 7"/>
                <line x1="21" y1="12" x2="9" y2="12"/>
            </svg>
        </button>
    </form>
  @endauth

  </div>
  <!-- end small navbar -->