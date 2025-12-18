@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')

    <section>
      <div class="max-w-screen-xl mx-auto px-4 py-8">
        <div class="text-center mb-8">
          <h1 class="text-4xl mb-2">Industries We Serve</h1>
          <p class="text-gray-600">Tailored water efficiency strategies for every sector.</p>
        </div>
        <div class="text-right mb-4">
          <button onclick="toggleFilter()" class="bg-gray-800 text-white px-4 py-2 rounded-none cursor-pointer">Filter by Sector</button>
        </div>
        <div id="filterDropdown" class="hidden mb-4">
          <select id="sectorSelect" onchange="filterTiles()" class="p-2">
            <option value="all">All Industries</option>
            <!-- <option value="hospitality">Hospitality</option>
            <option value="manufacturing">Manufacturing & Industrial</option> -->
            <option value="golf">Golf Courses</option>
            <option value="healthcare">Health Care Facilities</option>
            <option value="office">Office Buildings</option>
            <option value="restaurants">Restaurants</option>
            <option value="education">Schools, Universities & Stadiums</option>
            <option value="senior">Senior Living Homes</option>
            <option value="laundries">Commercial Laundries</option>
            <option value="supermarkets">Supermarkets</option>
            <option value="carwash">Service Stations & Car Washes</option>
            <option value="condos">Condominiums</option>
            <option value="clubs">Clubs & Marinas</option>
            <option value="parks">Water Parks</option>
            <option value="others">Others We Serve</option>
          </select>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($industries as $item)
                <div class="tile {{ $item->slug }} bg-white rounded-none overflow-hidden shadow-md flex flex-col transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg">
                    @if($item->image_path)
                      <img src="{{ asset('storage/' . $item->image_path) }}" 
                          alt="{{ $item->title }}" 
                          class="w-full h-48 object-cover">
                    @else
                      <img src="https://via.placeholder.com/400x300?text=No+Image" 
                          alt="Placeholder">
                    @endif
                    
                    <div class="p-4 flex-grow">
                        <h3>{{ $item->title }}</h3>
                        <p class="text-gray-700">{{ $item->description }}</p>
                    </div>
                    
                    <a href="{{ route('industries.case_study', ['slug' => $item->slug]) }}" 
                      class="block text-center bg-gray-100 text-black py-3 border-t border-gray-300 hover:bg-gray-200 transition-colors">
                        View Solutions
                    </a>
                </div>
            @endforeach
        </div>
      </div>
    </section>
    <!-- ========== Protect Your Asset Performance: Clean, Compact Two Column ========== -->
    <section class="bg-gray-50 py-16">
      <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center px-4">
        <!-- LEFT: Heading & Description -->
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
        <!-- RIGHT: Premium Contact Form -->
        <div>
          <form id="contact-form" class="flex flex-col gap-4 max-w-lg w-full">
            <div class="flex gap-4">
              <input id="first-name" name="first-name" type="text" required
                placeholder="First Name"
                class="flex-1 border border-gray-300 px-3 py-2 bg-white text-gray-900 font-light rounded-none text-base placeholder-gray-400 focus:border-gray-900 focus:outline-none"/>
              <input id="last-name" name="last-name" type="text" required
                placeholder="Last Name"
                class="flex-1 border border-gray-300 px-3 py-2 bg-white text-gray-900 font-light rounded-none text-base placeholder-gray-400 focus:border-gray-900 focus:outline-none"/>
            </div>
            <div class="flex gap-4">
              <input id="company-name" name="company-name" type="text"
                placeholder="Company Name"
                class="flex-1 border border-gray-300 px-3 py-2 bg-white text-gray-900 font-light rounded-none text-base placeholder-gray-400 focus:border-gray-900 focus:outline-none"/>
              <input id="company-role" name="company-role" type="text"
                placeholder="Company Role"
                class="flex-1 border border-gray-300 px-3 py-2 bg-white text-gray-900 font-light rounded-none text-base placeholder-gray-400 focus:border-gray-900 focus:outline-none"/>
            </div>
            <div class="flex gap-4">
              <input id="contact-number" name="contact-number" type="tel"
                placeholder="Contact Number"
                class="flex-1 border border-gray-300 px-3 py-2 bg-white text-gray-900 font-light rounded-none text-base placeholder-gray-400 focus:border-gray-900 focus:outline-none"/>
              <input id="email" name="email" type="email" required
                placeholder="Email"
                class="flex-1 border border-gray-300 px-3 py-2 bg-white text-gray-900 font-light rounded-none text-base placeholder-gray-400 focus:border-gray-900 focus:outline-none"/>
            </div>
            <select id="reason" name="reason"
              class="border border-gray-300 px-3 py-2 bg-white text-gray-900 font-light rounded-none text-base placeholder-gray-400 focus:border-gray-900 focus:outline-none">
              <option value="">Reason for Contact</option>
              <option>Request a Water Audit</option>
              <option>Billing or Invoice Question</option>
              <option>Consultation on Smart Water Solutions</option>
              <option>Technical Support</option>
              <option>General Inquiry</option>
            </select>
            <textarea id="message" name="message" rows="3" required
              placeholder="Message"
              class="border border-gray-300 px-3 py-2 bg-white text-gray-900 font-light rounded-none text-base placeholder-gray-400 focus:border-gray-900 focus:outline-none resize-none"></textarea>
            <button type="submit"
              class="mt-2 border border-gray-900 text-gray-900 font-light px-8 py-2 rounded-none bg-transparent transition
                hover:bg-gray-900 hover:text-white hover:shadow-md tracking-wide text-base">
              Submit Request
            </button>
          </form>
        </div>
    </section>
    </main>
@endsection

@push('scripts')
<script>
  function toggleFilter() {
    document.getElementById("filterDropdown").classList.toggle("hidden");
  }

  function filterTiles() {
    const value = document.getElementById("sectorSelect").value;
    const tiles = document.querySelectorAll(".tile");

    tiles.forEach(tile => {
      if (value === "all" || tile.classList.contains(value)) {
        tile.classList.remove("hidden"); 
      } else {
        tile.classList.add("hidden"); 
      }
    });
  }
</script>
@endpush
  
  