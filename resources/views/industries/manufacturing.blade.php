@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')

  <section class="manufacturing-section container mx-auto px-4 py-16 lg:py-24">
  
    <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-900 mb-4">How Leading Manufacturers Slashed Water Waste While Strengthening Compliance & Output</h1>
    <p class="text-lg text-gray-700 mb-12 max-w-3xl">
      Our water efficiency solutions have helped manufacturers across industries — from food processing to packaging —
      reduce overuse, stabilize pressure, and protect equipment from unregulated flow.
    </p>
  
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
      <div class="bg-white p-6 text-center border border-gray-200 rounded-lg shadow-sm">
        <strong class="block text-2xl font-bold text-blue-600 mb-1">22–35%</strong>
        <span class="text-gray-600">Avg Water Reduction</span>
      </div>
      <div class="bg-white p-6 text-center border border-gray-200 rounded-lg shadow-sm">
        <strong class="block text-2xl font-bold text-blue-600 mb-1">6–10 months</strong>
        <span class="text-gray-600">Payback Period</span>
      </div>
      <div class="bg-white p-6 text-center border border-gray-200 rounded-lg shadow-sm">
        <strong class="block text-2xl font-bold text-blue-600 mb-1">✓ Reduced</strong>
        <span class="text-gray-600">Compliance Risk</span>
      </div>
      <div class="bg-white p-6 text-center border border-gray-200 rounded-lg shadow-sm">
        <strong class="block text-2xl font-bold text-blue-600 mb-1">5.2× (avg)</strong>
        <span class="text-gray-600">ROI</span>
      </div>
    </div>
  
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <div class="bg-gray-50 border border-gray-200 rounded-lg shadow-md p-6 flex flex-col items-center text-center transition-transform hover:scale-105 hover:shadow-lg">
        <img src="/images/profab.jpg" alt="ProFab Steelworks" class="w-full h-48 object-cover rounded-md mb-4">
        <h3 class="text-xl font-bold text-gray-900 mb-1">ProFab Steelworks</h3>
        <p class="text-gray-600 mb-2">Metal Fabrication – Houston, TX</p>
        <p class="text-gray-700 italic mb-4"><em>“Flow issues eliminated, ROI in 5 months.”</em></p>
        <button onclick="openModal('modal1')" class="mt-auto px-6 py-3 bg-black text-white font-semibold rounded-md hover:bg-gray-700 transition">View Case Study</button>
      </div>
  
      <div class="bg-gray-50 border border-gray-200 rounded-lg shadow-md p-6 flex flex-col items-center text-center transition-transform hover:scale-105 hover:shadow-lg">
        <img src="/images/puredrinks.jpg" alt="PureDrinks Ltd" class="w-full h-48 object-cover rounded-md mb-4">
        <h3 class="text-xl font-bold text-gray-900 mb-1">PureDrinks Ltd.</h3>
        <p class="text-gray-600 mb-2">Beverage Production – Tampa, FL</p>
        <p class="text-gray-700 italic mb-4"><em>“Water use cut by 32%, zero complaints.”</em></p>
        <button onclick="openModal('modal2')" class="mt-auto px-6 py-3 bg-black text-white font-semibold rounded-md hover:bg-gray-700 transition">View Case Study</button>
      </div>
  
      <div class="bg-gray-50 border border-gray-200 rounded-lg shadow-md p-6 flex flex-col items-center text-center transition-transform hover:scale-105 hover:shadow-lg">
        <img src="/images/ecoplastics.jpg" alt="EcoPlastics Inc" class="w-full h-48 object-cover rounded-md mb-4">
        <h3 class="text-xl font-bold text-gray-900 mb-1">EcoPlastics Inc.</h3>
        <p class="text-gray-600 mb-2">Injection Molding – Atlanta, GA</p>
        <p class="text-gray-700 italic mb-4"><em>“Avoided $60K in regulatory fines.”</em></p>
        <button onclick="openModal('modal3')" class="mt-auto px-6 py-3 bg-black text-white font-semibold rounded-md hover:bg-gray-700 transition">View Case Study</button>
      </div>
    </div>
  
    <div class="flex flex-col lg:flex-row items-center justify-between gap-8 mt-16 bg-blue-50 p-8 rounded-lg shadow-inner">
      <div class="flex-1 text-center lg:text-left">
        <h3 class="text-2xl font-extrabold text-gray-900 mb-4">Let’s Assess Your Plant Water Efficiency</h3>
        <button class="px-8 py-3 bg-black text-white font-semibold rounded-md hover:bg-gray-700 transition">Request Water Impact Assessment</button>
      </div>
      <div class="flex-1 flex flex-col sm:flex-row lg:justify-end gap-4">
        <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold transition underline">Watch Webinar</a>
        <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold transition underline">Download White Paper</a>
      </div>
    </div>
  
    <div id="modal1" class="modal fixed inset-0 bg-black bg-opacity-70 z-[9999] flex items-center justify-center p-4 hidden">
      <div class="bg-white p-8 rounded-lg shadow-xl relative max-w-2xl w-full mx-auto">
        <span onclick="closeModal('modal1')" class="absolute top-4 right-6 text-gray-600 text-3xl cursor-pointer hover:text-gray-900">&times;</span>
        <img src="/images/profab.jpg" alt="ProFab" class="w-full h-64 object-cover rounded-md mb-6">
        <h3 class="text-2xl font-bold text-gray-900 mb-2">ProFab Steelworks</h3>
        <p class="text-gray-700 mb-1"><strong class="font-bold">ROI:</strong> 5 months</p>
        <p class="text-gray-700 mb-1">“Flow issues eliminated by reducing overpressure.”</p>
      </div>
    </div>
  
    <div id="modal2" class="modal fixed inset-0 bg-black bg-opacity-70 z-[9999] flex items-center justify-center p-4 hidden">
      <div class="bg-white p-8 rounded-lg shadow-xl relative max-w-2xl w-full mx-auto">
        <span onclick="closeModal('modal2')" class="absolute top-4 right-6 text-gray-600 text-3xl cursor-pointer hover:text-gray-900">&times;</span>
        <img src="/images/puredrinks.jpg" alt="PureDrinks" class="w-full h-64 object-cover rounded-md mb-6">
        <h3 class="text-2xl font-bold text-gray-900 mb-2">PureDrinks Ltd.</h3>
        <p class="text-gray-700 mb-1"><strong class="font-bold">Water Reduction:</strong> 32%</p>
        <p class="text-gray-700 mb-1">“Zero customer complaints since implementation.”</p>
      </div>
    </div>
  
    <div id="modal3" class="modal fixed inset-0 bg-black bg-opacity-70 z-[9999] flex items-center justify-center p-4 hidden">
      <div class="bg-white p-8 rounded-lg shadow-xl relative max-w-2xl w-full mx-auto">
        <span onclick="closeModal('modal3')" class="absolute top-4 right-6 text-gray-600 text-3xl cursor-pointer hover:text-gray-900">&times;</span>
        <img src="/images/ecoplastics.jpg" alt="EcoPlastics" class="w-full h-64 object-cover rounded-md mb-6">
        <h3 class="text-2xl font-bold text-gray-900 mb-2">EcoPlastics Inc.</h3>
        <p class="text-gray-700 mb-1"><strong class="font-bold">Avoided:</strong> $60,000 in regulatory fines</p>
        <p class="text-gray-700 mb-1">“Highly accurate metering & flow correction.”</p>
      </div>
    </div>
  </section>
  @endsection

@push('scripts')
  <script>
    function openModal(id) {
      document.getElementById(id).style.display = 'flex';
    }
    function closeModal(id) {
      document.getElementById(id).style.display = 'none';
    }
  </script>
@endpush