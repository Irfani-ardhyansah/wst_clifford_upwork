
  <div x-show="mobileMenuOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-4"
    class="md:hidden fixed inset-0 bg-black bg-opacity-90 z-40 flex flex-col items-center justify-center p-4 overflow-y-auto">

  <div class="absolute top-4 right-4 z-50">
    <button @click="toggleMobileMenu()" class="text-white p-2 focus:outline-none rounded-md hover:bg-gray-800">
      <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>
  </div>

  <nav class="text-white text-2xl font-semibold space-y-6 text-center w-full max-w-sm">
    <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Investors</a>
    <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">About</a>

    <div class="relative w-full"> <button @click="toggleMobileSubMenu('services')" class="flex items-center justify-center gap-2 hover:text-blue-400 focus:outline-none w-full">
        Services
        <svg class="w-6 h-6 transform transition-transform" :class="{ 'rotate-180': currentOpenMobileDropdown === 'services' }" fill="currentColor" viewBox="0 0 20 20">
          <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
        </svg>
      </button>
      <div x-show="currentOpenMobileDropdown === 'services'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
          class="bg-gray-800 text-gray-200 shadow-xl rounded p-3 mt-3 text-lg space-y-3 text-left">
        <a href="/pages/services/wst_audit.html" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Water Audit</a>
        <a href="/pages/services/wst_scope_studies.html" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Scope Studies</a>
        <a href="/pages/services/wst_elara_ai.html" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Elara AI Assistant</a>
        <a href="/pages/services/wst_meter_accuracy_optimization.html" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Meter Accuracy Optimization</a>
        <a href="/pages/services/wst_smart_water_monitoring.html" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Smart Water Monitoring</a>
        <a href="/pages/services/wst_smart_water_recovery.html" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Smart Water Treatment & Recovery</a>
        <a href="/pages/services/wst_cooling_towers.html" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Cooling Towers</a>
      </div>
    </div>

    <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Industries</a>

    <div class="relative w-full">
      <button @click="toggleMobileSubMenu('resources')" class="flex items-center justify-center gap-2 hover:text-blue-400 focus:outline-none w-full">
        Resources
        <svg class="w-6 h-6 transform transition-transform" :class="{ 'rotate-180': currentOpenMobileDropdown === 'resources' }" fill="currentColor" viewBox="0 0 20 20">
          <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
        </svg>
      </button>
      <div x-show="currentOpenMobileDropdown === 'resources'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
          class="bg-gray-800 text-gray-200 shadow-xl rounded p-3 mt-3 text-lg space-y-3 text-left">
        <a href="/pages/resources/water_consumption_tool/wst_water_consumption_selection_tool.html" class="block hover:bg-gray-100 px-2 py-1 rounded">Water Consumption Tool</a>
        <a href="/pages/resources/wst_resources_my_city_rebates.html" @click="mobileMenuOpen = false" class="block hover:text-blue-400">My City Rebates</a>
        <a href="/pages/resources/wst_financing_form.html" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Financing Application Form</a>
        <a href="/pages/resources/wst_water_white_papers_.html" @click="mobileMenuOpen = false" class="block hover:text-blue-400">White Paper</a>
      </div>
    </div>
    <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">About</a>

    <div class="relative w-full">
      <button @click="toggleMobileSubMenu('opportunities')" class="flex items-center justify-center gap-2 hover:text-blue-400 focus:outline-none w-full">
        Opportunities
        <svg class="w-6 h-6 transform transition-transform" :class="{ 'rotate-180': currentOpenMobileDropdown === 'opportunities' }" fill="currentColor" viewBox="0 0 20 20">
          <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
        </svg>
      </button>
      <div x-show="currentOpenMobileDropdown === 'opportunities'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
          class="bg-gray-800 text-gray-200 shadow-xl rounded p-3 mt-3 text-lg space-y-3 text-left">
        <a href="/pages/opportunities/wst_Property_Owners_Managers.html" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Property Owner & Managers</a>
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">MEP Installers</a>
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">ESG</a>
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Careers</a>
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Agents</a>
      </div>
    </div>

    <div class="relative w-full">
      <button @click="toggleMobileSubMenu('directory')" class="flex items-center justify-center gap-2 hover:text-blue-400 focus:outline-none w-full">
        Water Service Directory
        <svg class="w-6 h-6 transform transition-transform" :class="{ 'rotate-180': currentOpenMobileDropdown === 'directory' }" fill="currentColor" viewBox="0 0 20 20">
          <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
        </svg>
      </button>
      <div x-show="currentOpenMobileDropdown === 'directory'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
          class="bg-gray-800 text-gray-200 shadow-xl rounded p-3 mt-3 text-lg space-y-3 text-left">
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Audit Bill Audit</a>
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Corporate Sustainability Reporting (Water)</a>
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Consumption Management</a>
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Forensic Water Coast Audit</a>
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Leak Detection</a>
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Monitoring and Targeting</a>
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Net-Zero Water Pathways (Planners and Strategies)</a>
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Retrospective Water Audits</a>
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Water Accounting</a>
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Water Audit Site</a>
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Water Bill Validation</a>
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Water Conservation</a>
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Water Efficiency</a>
        <a href="#" @click="mobileMenuOpen = false" class="block hover:text-blue-400">Water Procurement</a>
      </div>
    </div>
    
    <a href="#" @click="mobileMenuOpen = false" class="flex items-center justify-center gap-2 hover:text-blue-400">
      <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
          <circle cx="12" cy="8" r="4"/><path d="M6 20v-2a6 6 0 1 1 12 0v2"/>
      </svg>
      Login / Profile
    </a>
    <a href="#" @click="mobileMenuOpen = false" class="flex items-center justify-center gap-2 hover:text-blue-400">
      <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 21s-6-5.686-6-10a6 6 0 1 1 12 0c0 4.314-6 10-6 10z"/><circle cx="12" cy="11" r="2"/>
      </svg>
      Location
    </a>
  </nav>
  </div>