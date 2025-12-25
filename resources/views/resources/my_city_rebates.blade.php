@extends('layouts.app')

@section('title', 'Water Solutions Technology')

  @push('styles')
  <style>
    :root {
      --bg-dark-black: #111111;
      --bg-charcoal: #1F1F1F;
      --border-color: #333333;
      --text-primary: #F5F5F5;
      --text-secondary: #A3A3A3;
    }
    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--bg-dark-black);
      color: var(--text-secondary);
      -webkit-font-smoothing: antialiased;
    }
    .card {
      background-color: var(--bg-charcoal);
      border: 1px solid var(--border-color);
    }
    /* Map Styles */
    .us-state {
      fill: #27272a;
      stroke: var(--bg-charcoal);
      stroke-width: 2;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    .us-state:hover { fill: #a3a3a3; }
    .us-state.has-rebates {
      fill: #52525b;
    }
    .us-state.has-rebates:hover { fill: #f5f5f5; }
    .us-state.selected { fill: #ffffff; }
    
    /* Modal Styles */
    .city-modal { display: none; opacity: 0; transform: translate(-50%, -50%) scale(0.95); transition: opacity 0.3s ease, transform 0.3s ease; }
    .city-modal.active { display: block; opacity: 1; transform: translate(-50%, -50%) scale(1); }
    .modal-backdrop { display: none; opacity: 0; transition: opacity 0.3s ease; }
    .modal-backdrop.active { display: block; opacity: 1; }
    
    /* Filter Styles */
    .filter-chip {
      transition: all 0.2s ease;
    }
    .filter-chip.active {
      background-color: white;
      color: black;
    }
  </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  @endpush

@section('main-class', 'bg-zinc-950')

@section('content')
  <div class="bg-zinc-950 max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-bold text-white mb-4">Find Rebates Instantly</h2>
            <div class="relative">
                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="text" id="citySearch" 
                    placeholder="Enter any US city (e.g., Chicago, Springfield)..." 
                    class="w-full pl-11 pr-4 py-3 border border-zinc-700 bg-zinc-800 rounded-lg text-white placeholder-gray-500 focus:ring-2 focus:ring-teal-500 focus:outline-none transition" 
                    autocomplete="off" />
            </div>
            
            <div class="mt-4 flex flex-wrap items-center gap-x-3 gap-y-2">
                <span class="text-sm text-gray-400">Popular:</span>
                <button onclick="searchCity('San Diego, CA')" class="text-sm text-gray-300 hover:text-white hover:underline transition">San Diego, CA</button>
                <button onclick="searchCity('Los Angeles, CA')" class="text-sm text-gray-300 hover:text-white hover:underline transition">Los Angeles, CA</button>
                <button onclick="searchCity('Phoenix, AZ')" class="text-sm text-gray-300 hover:text-white hover:underline transition">Phoenix, AZ</button>
                <button onclick="searchCity('New York, NY')" class="text-sm text-gray-300 hover:text-white hover:underline transition">New York, NY</button>
            </div>
        </div>

        <div class="rounded-xl p-1 border border-zinc-700 bg-zinc-900 overflow-hidden relative z-0">
            <div id="leafletMap" class="w-full h-80 md:h-96 rounded-lg bg-zinc-800"></div>
        </div>
    </div>

      <div class="card rounded-xl p-8">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-2xl font-bold text-[var(--text-primary)]">Available Rebates</h2>
          <span id="rebateCounter" class="text-sm text-[var(--text-secondary)]"></span>
        </div>
        
        <!-- Filter Chips -->
        <div id="filterSection" class="mb-6 hidden">
          <p class="text-sm text-[var(--text-secondary)] mb-3">Filter by type:</p>
          <div class="flex flex-wrap gap-2">
            <button onclick="filterRebates('all')" class="filter-chip active px-4 py-2 rounded-full text-sm font-medium border border-[var(--border-color)] bg-white text-black">
              All
            </button>
            <button onclick="filterRebates('toilet')" class="filter-chip px-4 py-2 rounded-full text-sm font-medium border border-[var(--border-color)] text-[var(--text-primary)]">
              <i class="fas fa-toilet mr-1"></i> Toilets
            </button>
            <button onclick="filterRebates('seedling')" class="filter-chip px-4 py-2 rounded-full text-sm font-medium border border-[var(--border-color)] text-[var(--text-primary)]">
              <i class="fas fa-seedling mr-1"></i> Irrigation
            </button>
            <button onclick="filterRebates('thermometer-half')" class="filter-chip px-4 py-2 rounded-full text-sm font-medium border border-[var(--border-color)] text-[var(--text-primary)]">
              <i class="fas fa-thermometer-half mr-1"></i> Cooling
            </button>
            <button onclick="filterRebates('tint')" class="filter-chip px-4 py-2 rounded-full text-sm font-medium border border-[var(--border-color)] text-[var(--text-primary)]">
              <i class="fas fa-tint mr-1"></i> Monitoring
            </button>
            <button onclick="filterRebates('search')" class="filter-chip px-4 py-2 rounded-full text-sm font-medium border border-[var(--border-color)] text-[var(--text-primary)]">
              <i class="fas fa-search mr-1"></i> Audits
            </button>
          </div>
        </div>
        
        <div id="rebates-placeholder" class="text-center py-20">
            <i class="fas fa-list-alt text-5xl text-gray-700 mb-4"></i>
            <p>Your search results will appear here.</p>
        </div>
        <div id="rebates-list" class="space-y-3"></div>
      </div>

      <!-- COLUMN 3: Services -->
      <div class="card rounded-xl p-8">
        <div id="services-content">
            <h2 class="text-2xl font-bold text-[var(--text-primary)] mb-6">How We Help</h2>
            <div class="space-y-6">
              <div class="flex items-start gap-4"><div class="flex-shrink-0 w-8 h-8 rounded-full bg-black/30 border border-[var(--border-color)] flex items-center justify-center font-bold text-[var(--text-primary)]">1</div><div><h3 class="font-semibold text-[var(--text-primary)]">Assess</h3><p>Free consultation to identify all potential rebates.</p></div></div>
              <div class="flex items-start gap-4"><div class="flex-shrink-0 w-8 h-8 rounded-full bg-black/30 border border-[var(--border-color)] flex items-center justify-center font-bold text-[var(--text-primary)]">2</div><div><h3 class="font-semibold text-[var(--text-primary)]">Apply</h3><p>We handle 100% of the paperwork and utility coordination.</p></div></div>
              <div class="flex items-start gap-4"><div class="flex-shrink-0 w-8 h-8 rounded-full bg-black/30 border border-[var(--border-color)] flex items-center justify-center font-bold text-[var(--text-primary)]">3</div><div><h3 class="font-semibold text-[var(--text-primary)]">Install</h3><p>Professional installation and verification of all equipment.</p></div></div>
              <div class="flex items-start gap-4"><div class="flex-shrink-0 w-8 h-8 rounded-full bg-black/30 border border-[var(--border-color)] flex items-center justify-center font-bold text-[var(--text-primary)]">4</div><div><h3 class="font-semibold text-[var(--text-primary)]">Save</h3><p>You receive your guaranteed rebate and enjoy lower bills.</p></div></div>
            </div>
        </div>
      </div>

    </div>
</div>

  <div class="modal-backdrop fixed inset-0 bg-black/70 backdrop-blur-sm z-50" id="modalBackdrop" onclick="closeModal()"></div>
  <div class="city-modal fixed top-1/2 left-1/2 card rounded-2xl shadow-2xl p-8 max-w-lg w-full mx-4 z-50" id="cityModal">
    <div class="flex justify-between items-start mb-6">
      <div>
        <h3 class="text-2xl font-semibold text-[var(--text-primary)] mb-1" id="modalStateName"></h3>
        <p class="text-[var(--text-secondary)]">Select a city to view rebates</p>
      </div>
      <button onclick="closeModal()" class="text-[var(--text-secondary)] hover:text-white transition p-2 rounded-full -mt-2 -mr-2">
        <i class="fas fa-times text-2xl"></i>
      </button>
    </div>
    <div id="modalCitiesList" class="space-y-3 max-h-96 overflow-y-auto"></div>
  </div>
@endsection 

@push('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    const rebateData = {
      // Real Data - California
      'San Diego, CA': { city: 'San Diego', state: 'CA', utility: 'San Diego Water Department', rebates: [ { type: 'High-Efficiency Toilets', amount: '$100-$200', service: 'Water Audit', icon: 'toilet' }, { type: 'Smart Irrigation Controllers', amount: '$200-$500', service: 'Irrigation Optimization', icon: 'seedling' }, { type: 'Cooling Tower Controllers', amount: '$2,500', service: 'Cooling Tower Optimization', icon: 'thermometer-half' }, { type: 'Commercial Clothes Washers', amount: '$500-$1,500', service: 'Water Efficiency Programs', icon: 'tshirt' }, { type: 'Water Audits', amount: '$2,000', service: 'Water Audit', icon: 'search' }, { type: 'Leak Detection Systems', amount: '$1,000-$5,000', service: 'Smart Water Monitoring', icon: 'tint' } ], totalSavings: '$38,000', website: 'https://www.sandiego.gov/water/conservation/rebates' },
      'Los Angeles, CA': { city: 'Los Angeles', state: 'CA', utility: 'LADWP', rebates: [ { type: 'High-Efficiency Toilets', amount: '$100', service: 'Water Audit', icon: 'toilet' }, { type: 'Smart Irrigation Controllers', amount: '$250', service: 'Irrigation Optimization', icon: 'seedling' }, { type: 'Cooling Tower Conductivity Controllers', amount: '$3,000', service: 'Cooling Tower Optimization', icon: 'thermometer-half' }, { type: 'High-Efficiency Clothes Washers', amount: '$300', service: 'Water Efficiency Programs', icon: 'tshirt' } ], totalSavings: '$45,000', website: 'https://www.ladwp.com/rebates' },
      'San Francisco, CA': { city: 'San Francisco', state: 'CA', isPlaceholder: true },
      
      // Florida
      'Fort Lauderdale, FL': { city: 'Fort Lauderdale', state: 'FL', utility: 'Fort Lauderdale Water & Sewer', rebates: [ { type: 'High-Efficiency Toilets', amount: '$150', service: 'Water Audit', icon: 'toilet' }, { type: 'Smart Irrigation Systems', amount: '$300', service: 'Irrigation Optimization', icon: 'seedling' }, { type: 'Commercial Water Audits', amount: '$1,500', service: 'Water Audit', icon: 'search' }, { type: 'Leak Detection Equipment', amount: '$2,500', service: 'Smart Water Monitoring', icon: 'tint' } ], totalSavings: '$28,000', website: 'https://www.fortlauderdale.gov/water' },
      'Miami, FL': { city: 'Miami', state: 'FL', utility: 'Miami-Dade Water', rebates: [ { type: 'High-Efficiency Toilets', amount: '$125', service: 'Water Audit', icon: 'toilet' }, { type: 'Irrigation Controllers', amount: '$200', service: 'Irrigation Optimization', icon: 'seedling' }, { type: 'Water Audits', amount: '$2,000', service: 'Water Audit', icon: 'search' }, { type: 'Cooling Tower Upgrades', amount: '$2,000', service: 'Cooling Tower Optimization', icon: 'thermometer-half' } ], totalSavings: '$32,000', website: 'https://www.miamidade.gov/water' },
      'Tampa, FL': { city: 'Tampa', state: 'FL', isPlaceholder: true },
      'Orlando, FL': { city: 'Orlando', state: 'FL', isPlaceholder: true },
      
      // Arizona
      'Phoenix, AZ': { city: 'Phoenix', state: 'AZ', utility: 'Phoenix Water Services', rebates: [ { type: 'Commercial Toilets', amount: '$150', service: 'Water Audit', icon: 'toilet' }, { type: 'Smart Irrigation', amount: '$400', service: 'Irrigation Optimization', icon: 'seedling' }, { type: 'Cooling Tower Equipment', amount: '$3,500', service: 'Cooling Tower Optimization', icon: 'thermometer-half' }, { type: 'Water Monitoring Systems', amount: '$1,800', service: 'Smart Water Monitoring', icon: 'tint' } ], totalSavings: '$41,000', website: 'https://www.phoenix.gov/water' },
      'Tucson, AZ': { city: 'Tucson', state: 'AZ', isPlaceholder: true },
      
      // Texas
      'Dallas, TX': { city: 'Dallas', state: 'TX', utility: 'Dallas Water Utilities', rebates: [ { type: 'High-Efficiency Toilets', amount: '$200', service: 'Water Audit', icon: 'toilet' }, { type: 'Smart Irrigation Systems', amount: '$350', service: 'Irrigation Optimization', icon: 'seedling' }, { type: 'Commercial Water Audits', amount: '$1,800', service: 'Water Audit', icon: 'search' } ], totalSavings: '$35,000', website: 'https://dallascityhall.com/water' },
      'Houston, TX': { city: 'Houston', state: 'TX', utility: 'Houston Public Works', rebates: [ { type: 'High-Efficiency Toilets', amount: '$175', service: 'Water Audit', icon: 'toilet' }, { type: 'Irrigation Controllers', amount: '$300', service: 'Irrigation Optimization', icon: 'seedling' }, { type: 'Cooling Tower Upgrades', amount: '$2,200', service: 'Cooling Tower Optimization', icon: 'thermometer-half' } ], totalSavings: '$31,000', website: 'https://www.publicworks.houstontx.gov' },
      'Austin, TX': { city: 'Austin', state: 'TX', isPlaceholder: true },
      'San Antonio, TX': { city: 'San Antonio', state: 'TX', isPlaceholder: true },

      // Add placeholder data for all other states/cities from the map
      'Seattle, WA': { city: 'Seattle', state: 'WA', isPlaceholder: true },
      'Portland, OR': { city: 'Portland', state: 'OR', isPlaceholder: true },
      'Las Vegas, NV': { city: 'Las Vegas', state: 'NV', isPlaceholder: true },
      'Boise, ID': { city: 'Boise', state: 'ID', isPlaceholder: true },
      'Salt Lake City, UT': { city: 'Salt Lake City', state: 'UT', isPlaceholder: true },
      'Denver, CO': { city: 'Denver', state: 'CO', isPlaceholder: true },
      'Albuquerque, NM': { city: 'Albuquerque', state: 'NM', isPlaceholder: true },
      'Santa Fe, NM': { city: 'Santa Fe', state: 'NM', isPlaceholder: true },
      'Cheyenne, WY': { city: 'Cheyenne', state: 'WY', isPlaceholder: true },
      'Billings, MT': { city: 'Billings', state: 'MT', isPlaceholder: true },
      'Bismarck, ND': { city: 'Bismarck', state: 'ND', isPlaceholder: true },
      'Sioux Falls, SD': { city: 'Sioux Falls', state: 'SD', isPlaceholder: true },
      'Omaha, NE': { city: 'Omaha', state: 'NE', isPlaceholder: true },
      'Wichita, KS': { city: 'Wichita', state: 'KS', isPlaceholder: true },
      'Oklahoma City, OK': { city: 'Oklahoma City', state: 'OK', isPlaceholder: true },
      'Minneapolis, MN': { city: 'Minneapolis', state: 'MN', isPlaceholder: true },
      'Des Moines, IA': { city: 'Des Moines', state: 'IA', isPlaceholder: true },
      'Kansas City, MO': { city: 'Kansas City', state: 'MO', isPlaceholder: true },
      'St. Louis, MO': { city: 'St. Louis', state: 'MO', isPlaceholder: true },
      'Little Rock, AR': { city: 'Little Rock', state: 'AR', isPlaceholder: true },
      'New Orleans, LA': { city: 'New Orleans', state: 'LA', isPlaceholder: true },
      'Baton Rouge, LA': { city: 'Baton Rouge', state: 'LA', isPlaceholder: true },
      'Milwaukee, WI': { city: 'Milwaukee', state: 'WI', isPlaceholder: true },
      'Chicago, IL': { city: 'Chicago', state: 'IL', isPlaceholder: true },
      'Detroit, MI': { city: 'Detroit', state: 'MI', isPlaceholder: true },
      'Indianapolis, IN': { city: 'Indianapolis', state: 'IN', isPlaceholder: true },
      'Columbus, OH': { city: 'Columbus', state: 'OH', isPlaceholder: true },
      'Cleveland, OH': { city: 'Cleveland', state: 'OH', isPlaceholder: true },
      'Louisville, KY': { city: 'Louisville', state: 'KY', isPlaceholder: true },
      'Nashville, TN': { city: 'Nashville', state: 'TN', isPlaceholder: true },
      'Memphis, TN': { city: 'Memphis', state: 'TN', isPlaceholder: true },
      'Jackson, MS': { city: 'Jackson', state: 'MS', isPlaceholder: true },
      'Birmingham, AL': { city: 'Birmingham', state: 'AL', isPlaceholder: true },
      'Atlanta, GA': { city: 'Atlanta', state: 'GA', isPlaceholder: true },
      'Charleston, WV': { city: 'Charleston', state: 'WV', isPlaceholder: true },
      'Richmond, VA': { city: 'Richmond', state: 'VA', isPlaceholder: true },
      'Charlotte, NC': { city: 'Charlotte', state: 'NC', isPlaceholder: true },
      'Raleigh, NC': { city: 'Raleigh', state: 'NC', isPlaceholder: true },
      'Charleston, SC': { city: 'Charleston', state: 'SC', isPlaceholder: true },
      'Philadelphia, PA': { city: 'Philadelphia', state: 'PA', isPlaceholder: true },
      'Pittsburgh, PA': { city: 'Pittsburgh', state: 'PA', isPlaceholder: true },
      'New York, NY': { city: 'New York', state: 'NY', isPlaceholder: true },
      'Buffalo, NY': { city: 'Buffalo', state: 'NY', isPlaceholder: true },
      'Newark, NJ': { city: 'Newark', state: 'NJ', isPlaceholder: true },
      'Wilmington, DE': { city: 'Wilmington', state: 'DE', isPlaceholder: true },
      'Baltimore, MD': { city: 'Baltimore', state: 'MD', isPlaceholder: true },
      'Burlington, VT': { city: 'Burlington', state: 'VT', isPlaceholder: true },
      'Manchester, NH': { city: 'Manchester', state: 'NH', isPlaceholder: true },
      'Portland, ME': { city: 'Portland', state: 'ME', isPlaceholder: true },
      'Boston, MA': { city: 'Boston', state: 'MA', isPlaceholder: true },
      'Providence, RI': { city: 'Providence', state: 'RI', isPlaceholder: true },
      'Hartford, CT': { city: 'Hartford', state: 'CT', isPlaceholder: true },
      'Anchorage, AK': { city: 'Anchorage', state: 'AK', isPlaceholder: true },
      'Honolulu, HI': { city: 'Honolulu', state: 'HI', isPlaceholder: true }
    };

    var map = L.map('leafletMap').setView([37.0902, -95.7129], 4); 

    L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; Water Solutions Technology',
        subdomains: 'abcd',
        maxZoom: 19
    }).addTo(map);

    var currentMarker = null;

    setTimeout(function(){ 
        map.invalidateSize(); 
    }, 500); 
    // --------------------------------------------------------

    async function searchCity(query) {
        // if (!query.toLowerCase().includes("usa") && !query.toLowerCase().includes("united states")) {
        //     query += ", USA";
        // }

        const inputField = document.getElementById('citySearch');
        inputField.style.opacity = "0.5";

        try {
            const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}`);
            const data = await response.json();

            if (data && data.length > 0) {
                const lat = parseFloat(data[0].lat);
                const lon = parseFloat(data[0].lon);
                const displayName = data[0].display_name;

                map.invalidateSize();

                map.flyTo([lat, lon], 12, {
                    animate: true,
                    duration: 1.5
                });

                if (currentMarker) map.removeLayer(currentMarker);
                
                currentMarker = L.marker([lat, lon]).addTo(map)
                    .bindPopup(`<div style='color:black; text-align:center;'><b>${displayName}</b><br>Rebates Available!</div>`)
                    .openPopup();

                displayResults(query);

            } else {
                alert("City not found! Please check the spelling.");
            }
        } catch (error) {
            console.error("Error fetching city:", error);
            alert("Error connecting to map service.");
        } finally {
            inputField.style.opacity = "1";
        }
    }

    document.getElementById('citySearch').addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            searchCity(this.value);
            displayResults(this.value);
        }
    });

    const resizeObserver = new ResizeObserver(() => {
        map.invalidateSize();
    });
    resizeObserver.observe(document.getElementById('leafletMap'));


    function filterRebates(filterType) {
        currentFilter = filterType;
        
        // Update active filter chip
        document.querySelectorAll('.filter-chip').forEach(chip => {
            chip.classList.remove('active', 'bg-white', 'text-black');
            chip.classList.add('text-[var(--text-primary)]');
        });
        event.target.classList.add('active', 'bg-white', 'text-black');
        event.target.classList.remove('text-[var(--text-primary)]');
        
        // Re-display with filter
        if (currentCityData) {
            displayFilteredRebates(currentCityData, filterType);
        }
    }

    function displayFilteredRebates(data, filterType) {
        let filteredRebates = data.rebates;
        
        if (filterType !== 'all') {
            filteredRebates = data.rebates.filter(rebate => rebate.icon === filterType);
        }
        
        const rebatesList = document.getElementById('rebates-list');
        const rebateCounter = document.getElementById('rebateCounter');
        
        rebateCounter.textContent = `${filteredRebates.length} of ${data.rebates.length}`;
        
        if (filteredRebates.length === 0) {
            rebatesList.innerHTML = '<p class="text-center py-10 text-[var(--text-secondary)]">No rebates match this filter.</p>';
            return;
        }
        
        rebatesList.innerHTML = filteredRebates.map(rebate => `
            <div class="border border-[var(--border-color)] rounded-lg p-4 transition bg-[var(--bg-dark-black)] hover:border-gray-600">
            <div class="flex justify-between items-center gap-4">
                <div class="flex items-center gap-4">
                <i class="fas fa-${rebate.icon} text-lg text-[var(--text-secondary)] w-6 text-center"></i>
                <div class="font-medium text-[var(--text-primary)]">${rebate.type}</div>
                </div>
                <div class="text-[var(--text-primary)] font-bold text-lg whitespace-nowrap">${rebate.amount}</div>
            </div>
            </div>
        `).join('');
    }

    function displayResults(cityName) {
        const data = rebateData[cityName];
            console.log(cityName);
        // Handle placeholder data
        if (data.isPlaceholder) {
            alert(`Rebate data for ${data.city}, ${data.state} is coming soon! Contact us to research rebates for your area.`);
            return;
        }
        
        currentCityData = data;
        currentFilter = 'all';

        // Show filter section
        document.getElementById('filterSection').classList.remove('hidden');
        
        // Reset filter chips
        document.querySelectorAll('.filter-chip').forEach(chip => {
            chip.classList.remove('active', 'bg-white', 'text-black');
            chip.classList.add('text-[var(--text-primary)]');
        });
        document.querySelector('.filter-chip').classList.add('active', 'bg-white', 'text-black');

        // --- Column 2: Rebates ---
        const rebatesPlaceholder = document.getElementById('rebates-placeholder');
        rebatesPlaceholder.classList.add('hidden');
        
        displayFilteredRebates(data, 'all');

        // --- Column 3: Services ---
        const servicesContent = document.getElementById('services-content');
        const uniqueServices = [...new Set(data.rebates.map(r => r.service))];
        
        const servicesHTML = `
            <h2 class="text-2xl font-bold text-[var(--text-primary)] mb-6">How We Help in ${data.city}</h2>
            <p class="mb-6">For the rebates in ${data.city}, we provide the following expert services to ensure you maximize your savings:</p>
            <div class="space-y-4">
            ${uniqueServices.map(service => `
                <div class="card rounded-lg p-4 flex items-center gap-4 bg-[var(--bg-dark-black)]">
                <i class="fas fa-check-circle text-green-500"></i>
                <span class="font-semibold text-[var(--text-primary)]">${service}</span>
                </div>
            `).join('')}
            </div>
            <div id="contact" class="mt-8 bg-white rounded-lg p-6 text-center">
                <h3 class="text-xl font-bold text-black mb-2">Ready to save?</h3>
                <p class="text-gray-700 mb-4">Let's get started on your free consultation.</p>
                <a href="#" class="bg-black text-white hover:bg-gray-800 px-6 py-2 rounded-md font-semibold text-sm transition">Book Now</a>
            </div>
        `;
        servicesContent.innerHTML = servicesHTML;
    }
</script>
@endpush