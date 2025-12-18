
  <div class="flex items-start space-x-3">
    <a href="{{route('index')}}"><img src="{{ asset('assets/img/logo.png') }}" alt="Water Solutions Technology Logo" class="h-10 w-auto md:h-12" /></a>
    <div>
      <div class="uppercase font-extrabold tracking-widest text-base md:text-lg" style="font-family: 'Avenir', Arial, sans-serif;">
        Water Solutions Technology
      </div>
      <div class="text-xs text-gray-500 font-light">An end-to-end water management solution for your business</div>
    </div>
  </div>

  <nav class="hidden md:flex space-x-8 mx-auto font-semibold text-base items-center">

    <div x-data="{ dropdown: null }" class="relative" @mouseenter="dropdown = 'services'" @mouseleave="dropdown = null">
      <button class="flex items-center gap-1 hover:text-blue-400 focus:outline-none">
        Services
        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
          <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
        </svg>
      </button>
      <div x-show="dropdown === 'services'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
          class="absolute left-0 top-10 w-72 bg-white text-gray-900 shadow-xl rounded-b-lg p-4 z-40 space-y-2">
        <a href="{{ route('services.audit') }}" class="block hover:bg-gray-100 px-2 py-1 rounded">Water Audit</a>
        <a href="{{ route('services.scope_studies') }}" class="block hover:bg-gray-100 px-2 py-1 rounded">Water Technology TEA</a>
        <a href="{{ route('services.elara_ai') }}" class="block hover:bg-gray-100 px-2 py-1 rounded">Ara AI Assistant Management</a>
        <a href="{{ route('services.meter_accuracy_optimization') }}" class="block hover:bg-gray-100 px-2 py-1 rounded">Meter Accuracy Optimization</a>
        <a href="{{ route('services.smart_water_monitoring') }}" class="block hover:bg-gray-100 px-2 py-1 rounded">Smart Water Monitoring</a>
        <a href="{{ route('services.smart_water_recovery') }}" class="block hover:bg-gray-100 px-2 py-1 rounded">Smart Water Recovery</a>
        <a href="{{ route('services.cooling_towers') }}" class="block hover:bg-gray-100 px-2 py-1 rounded">Cooling Towers</a>
        <a href="#" class="block hover:bg-gray-100 px-2 py-1 rounded text-red-500">Meeting GRESB Reporting</a>
      </div>
    </div>

    <a href="{{ url('/industries') }}" class="hover:text-blue-400">Industries</a>

    <div x-data="{ dropdown: null, subDropdown: null }" class="relative" @mouseenter="dropdown = 'resources'" @mouseleave="dropdown = null; subDropdown = null">
  
      <button class="flex items-center gap-1 hover:text-blue-400 focus:outline-none">
        Resources
        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
          <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
        </svg>
      </button>

      <div x-show="dropdown === 'resources'" 
          x-transition:enter="transition ease-out duration-200" 
          x-transition:enter-start="opacity-0 scale-95" 
          x-transition:enter-end="opacity-100 scale-100" 
          x-transition:leave="transition ease-in duration-150" 
          x-transition:leave-start="opacity-100 scale-100" 
          x-transition:leave-end="opacity-0 scale-95"
          class="absolute left-0 top-10 w-72 bg-white text-gray-900 shadow-xl rounded-b-lg p-2 z-40 space-y-1">

        <div class="relative" @mouseenter="subDropdown = 'water'" @mouseleave="subDropdown = null">
          <a href="{{ route('resources.tools.selection_tool') }}" 
            @mouseenter="subDropdown = null" 
            class="block hover:bg-gray-100 px-2 py-2 rounded">
            Water Consumption Tool
          </a>

          <button class="w-full text-left flex items-center justify-between hover:bg-gray-100 px-2 py-2 rounded">
            <span>Water Consumption Selection Tool</span>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
          </button>

          <div x-show="subDropdown === 'water'"
              x-transition:enter="transition ease-out duration-100"
              x-transition:enter-start="opacity-0 -translate-x-2"
              x-transition:enter-end="opacity-100 translate-x-0"
              class="absolute left-full top-0 ml-1 w-64 bg-white shadow-xl rounded-lg p-2 border border-gray-100">
            <a href="{{ route('resources.tools.whole_building') }}" class="block hover:bg-gray-100 px-2 py-2 rounded">Whole Building Water Utility Reduction Calculator</a>
            <a href="{{ route('resources.tools.cooling_tower') }}" class="block hover:bg-gray-100 px-2 py-2 rounded">Cooling Tower Water Consumption</a>
            <a href="#" class="block hover:bg-gray-100 px-2 py-2 rounded text-red-500">ESG Peer Comparison Calculator</a>
          </div>
        </div>

        <div class="relative" @mouseenter="subDropdown = 'papers'" @mouseleave="subDropdown = null">
          <button class="w-full text-left flex items-center justify-between hover:bg-gray-100 px-2 py-2 rounded text-red-500">
            <span>White Papers</span>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
          </button>

          <div x-show="subDropdown === 'papers'"
              x-transition:enter="transition ease-out duration-100"
              x-transition:enter-start="opacity-0 -translate-x-2"
              x-transition:enter-end="opacity-100 translate-x-0"
              class="absolute left-full top-0 ml-1 w-64 bg-white shadow-xl rounded-lg p-2 border border-gray-100">
            <!-- <a href="{{ route('resources.white_papers') }}#" class="block hover:bg-gray-100 px-2 py-2 rounded">White Papers Selection Tool</a> -->
            <a href="#" class="block hover:bg-gray-100 px-2 py-2 rounded text-red-500">Commercial Building</a>
            <a href="#" class="block hover:bg-gray-100 px-2 py-2 rounded text-red-500">Cooling Towers</a>
            <a href="#" class="block hover:bg-gray-100 px-2 py-2 rounded text-red-500">School and Campuses</a>
            <a href="#" class="block hover:bg-gray-100 px-2 py-2 rounded text-red-500">Manufacturing & Industrial</a>
          </div>
        </div>

        <a href="{{ route('resources.my_city_rebates') }}" 
          @mouseenter="subDropdown = null" 
          class="block hover:bg-gray-100 px-2 py-2 rounded">
          My City Water Rebates
        </a>

        <a href="{{ route('resources.financing_form') }}" 
          @mouseenter="subDropdown = null" 
          class="block hover:bg-gray-100 px-2 py-2 rounded">
          Financing Form
        </a>

        <a href="#" 
          @mouseenter="subDropdown = null" 
          class="block hover:bg-gray-100 px-2 py-2 rounded text-red-500">
          Webinars & Events
        </a>

        <a href="#" 
          @mouseenter="subDropdown = null" 
          class="block hover:bg-gray-100 px-2 py-2 rounded text-red-500">
          Blog
        </a>

        <a href="#" 
          @mouseenter="subDropdown = null" 
          class="block hover:bg-gray-100 px-2 py-2 rounded text-red-500">
          Articles
        </a>

      </div>
    </div>
  </nav>

  <div class="flex items-center space-x-3 md:space-x-4">
    <div x-data="{ searchOpen: false }" class="relative flex items-center">
      <button @click="searchOpen = !searchOpen" class="z-20 p-1 rounded-full hover:bg-gray-100 focus:outline-none">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <circle cx="11" cy="11" r="8"/>
          <line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
      </button>
      <input x-show="searchOpen" @click.away="searchOpen=false" type="text" placeholder="Search..."
        class="absolute top-0 right-0 bg-white text-gray-900 border border-gray-300 rounded p-1 w-36 text-sm transition-all duration-300 transform z-10"
        :class="searchOpen ? 'translate-x-0 opacity-100' : 'translate-x-full opacity-0 pointer-events-none'"
        style="padding-right: 36px;"/>
    </div>

    <div class="md:hidden">
      <button @click="toggleMobileMenu()" class="block p-1 focus:outline-none rounded-md hover:bg-gray-100">
        <template x-if="!mobileMenuOpen">
          <svg class="h-8 w-8 text-gray-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </template>
        <template x-if="mobileMenuOpen">
          <svg class="h-8 w-8 text-gray-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </template>
      </button>
    </div>
    <div class="hidden md:block relative" x-data="{ open: false, activeSubMenu: null }">
      <!-- Main Dropdown Button -->
      <button @click="open = !open" class="block focus:outline-none p-1 rounded-md hover:bg-gray-100">
        <svg class="h-8 w-8 text-gray-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    
      <!-- Main Dropdown Panel -->
      <div
        x-show="open"
        @click.away="open = false"
        x-transition
        class="absolute right-0 mt-2 bg-white text-black shadow-xl rounded-lg w-80 p-4 z-50"
      >
        <div class="space-y-4 leading-relaxed">
          <!-- Water Audits -->
          <div class="relative" @mouseenter="activeSubMenu = 'audits'" @mouseleave="activeSubMenu = null">
            <div class="text-black font-semibold cursor-pointer">Water Audits</div>
            <ul
              x-show="activeSubMenu === 'audits'"
              x-transition
              class="mt-2 bg-white shadow-lg rounded-md p-3 list-none text-gray-800"
            >
              <li><a href="#" class="block px-2 py-1 hover:bg-gray-100 rounded">Audit Bill Audit</a></li>
              <li><a href="#" class="block px-2 py-1 hover:bg-gray-100 rounded">Water Audit Site</a></li>
              <li><a href="#" class="block px-2 py-1 hover:bg-gray-100 rounded">Retrospective Water Audits</a></li>
            </ul>
          </div>
    
          <!-- Monitoring & Analysis -->
          <div class="relative" @mouseenter="activeSubMenu = 'monitoring'" @mouseleave="activeSubMenu = null">
            <div class="text-black font-semibold cursor-pointer">Monitoring & Analysis</div>
            <ul
              x-show="activeSubMenu === 'monitoring'"
              x-transition
              class="mt-2 bg-white shadow-lg rounded-md p-3 list-none text-gray-800"
            >
              <li><a href="#" class="block px-2 py-1 hover:bg-gray-100 rounded">Monitoring and Targeting</a></li>
              <li><a href="#" class="block px-2 py-1 hover:bg-gray-100 rounded">Consumption Management</a></li>
              <li><a href="#" class="block px-2 py-1 hover:bg-gray-100 rounded">Water Accounting</a></li>
            </ul>
          </div>
    
          <!-- Efficiency & Conservation -->
          <div class="relative" @mouseenter="activeSubMenu = 'efficiency'" @mouseleave="activeSubMenu = null">
            <div class="text-black font-semibold cursor-pointer">Efficiency & Conservation</div>
            <ul
              x-show="activeSubMenu === 'efficiency'"
              x-transition
              class="mt-2 bg-white shadow-lg rounded-md p-3 list-none text-gray-800"
            >
              <li><a href="#" class="block px-2 py-1 hover:bg-gray-100 rounded">Water Efficiency</a></li>
              <li><a href="#" class="block px-2 py-1 hover:bg-gray-100 rounded">Water Conservation</a></li>
              <li><a href="#" class="block px-2 py-1 hover:bg-gray-100 rounded">Leak Detection</a></li>
            </ul>
          </div>
    
          <!-- Sustainability & ESG -->
          <div class="relative" @mouseenter="activeSubMenu = 'sustainability'" @mouseleave="activeSubMenu = null">
            <div class="text-black font-semibold cursor-pointer">Sustainability & ESG</div>
            <ul
              x-show="activeSubMenu === 'sustainability'"
              x-transition
              class="mt-2 bg-white shadow-lg rounded-md p-3 list-none text-gray-800"
            >
              <li><a href="#" class="block px-2 py-1 hover:bg-gray-100 rounded">Corporate Sustainability Reporting</a></li>
              <li><a href="#" class="block px-2 py-1 hover:bg-gray-100 rounded">Net-Zero Water Pathways</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>