@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@push('style')
<style>
  @keyframes fade-in {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-in {
    animation: fade-in 0.8s ease-out;
  }
</style>
@endpush

@section('content')
<section class="min-h-screen bg-white py-20 px-6 animate-fade-in">
  <div class="max-w-7xl mx-auto text-center mb-12">
    <h2 class="text-3xl font-semibold text-gray-800 mb-4">Choose a Water Consumption Tool</h2>
    <p class="text-gray-500 text-lg">Select which system you’d like to analyze today. Each tool gives you real-time savings insights tailored to that area of usage.</p>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
    <!-- Toilets -->
      <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-md transition duration-200">
        <div class="mb-4">
          <img src="/icons/toilet.svg" alt="Toilet" class="w-12 h-12 mx-auto">
        </div>
        <h3 class="text-xl font-medium text-gray-800 mb-2">Water Consumption Selection Tool</h3>
        <p class="text-gray-600 text-sm">
          Toilets waste up to 200 gallons per day in older systems. Pinpoint inefficiencies and get savings instantly.
        </p>
        <a href="{{ route('resources.tools.selection_tool') }}" class="mt-4 inline-block bg-black text-white font-light tracking-wide text-sm py-2 px-5 rounded-md hover:bg-gray-800 transition-all duration-200">Launch Tool</a>
      </div>
    
    <!-- Whole Building -->
    <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-md transition duration-200">
      <div class="mb-4">
        <img src="/icons/whole-building.svg" alt="Whole Building" class="w-12 h-12 mx-auto">
      </div>
      <h3 class="text-xl font-medium text-gray-800 mb-2">Whole Building Water Consumption</h3>
      <p class="text-gray-600 text-sm">
        Assess your building’s total daily consumption. Uncover high-usage periods and optimize across systems.
      </p>
      <a href="{{ route('resources.tools.whole_building') }}" class="mt-4 inline-block bg-black text-white font-light tracking-wide text-sm py-2 px-5 rounded-md hover:bg-gray-800 transition-all duration-200">Launch Tool</a>
    </div>

    <!-- Cooling Tower -->
    <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-md transition duration-200">
      <div class="mb-4">
        <img src="cooling_tower_consumtoion_tool.jpeg" alt="Cooling Tower" class="w-12 h-12 mx-auto">
      </div>
      <h3 class="text-xl font-medium text-gray-800 mb-2">Cooling Tower Water Consumption</h3>
      <p class="text-gray-600 text-sm">
        Monitor blowdown, cycles of concentration, and make‑up water. Cooling towers can account for 30–50% of usage.
      </p>
      <a href="{{ route('resources.tools.cooling_tower') }}" class="mt-4 inline-block bg-black text-white font-light tracking-wide text-sm py-2 px-5 rounded-md hover:bg-gray-800 transition-all duration-200">Launch Tool</a>
    </div>

  </div>

  <!-- Back Button -->
  <div class="max-w-6xl mx-auto text-center mt-16">
    <a href="/" class="inline-block bg-black text-white font-light tracking-wide text-sm py-2 px-6 rounded-md hover:bg-gray-800 transition-all duration-200">← Back to Home</a>
  </div>
</section>
@endsection

  