@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@push('styles')
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
<section class="max-w-7xl mx-auto px-6 py-16 animate-fade-in">
  <div class="text-center mb-10">
    <h2 class="text-3xl font-semibold text-gray-800">Whole Building Water Savings Estimator</h2>
    <p class="text-gray-500 text-lg mt-2">Estimate your potential savings by selecting smart technologies and entering your building portfolio data.</p>
  </div>

  <!-- Step 1: Select Technologies -->
  <div class="bg-gray-50 p-6 rounded-xl shadow mb-10">
    <h3 class="text-xl font-medium text-gray-800 mb-4">1. Choose Technologies</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
      <label class="flex items-start space-x-3">
        <input type="checkbox" id="flowMgmt" class="mt-1">
        <span><strong>Flow Management Solution</strong><br><span class="text-sm text-gray-600">Reduce water bills by 10% – 30%</span></span>
      </label>
      <label class="flex items-start space-x-3">
        <input type="checkbox" id="waterTreatment" class="mt-1">
        <span><strong>Whole Building Water Treatment</strong><br><span class="text-sm text-gray-600">Improve water quality and reduce scaling</span></span>
      </label>
      <label class="flex items-start space-x-3">
        <input type="checkbox" id="toiletSensor" class="mt-1">
        <span><strong>Toilet Flow Sensor</strong><br><span class="text-sm text-gray-600">Save up to 25% by addressing toilet leaks</span></span>
      </label>
      <label class="flex items-start space-x-3">
        <input type="checkbox" id="coolingTower" class="mt-1">
        <span><strong>Cooling Tower Optimization</strong><br><span class="text-sm text-gray-600">Enhance performance and reduce water waste</span></span>
      </label>
    </div>
  </div>

  <!-- Step 2: Portfolio Info -->
  <div class="bg-gray-50 p-6 rounded-xl shadow mb-10">
    <h3 class="text-xl font-medium text-gray-800 mb-4">2. Portfolio Information</h3>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
      <div>
        <label class="text-gray-700 text-sm font-semibold">Number of Properties</label>
        <input type="number" id="numProps" class="w-full mt-1 border px-4 py-2 rounded" placeholder="e.g., 5">
      </div>
      <div>
        <label class="text-gray-700 text-sm font-semibold">Average Monthly Water Bill ($)</label>
        <input type="number" id="avgBill" class="w-full mt-1 border px-4 py-2 rounded" placeholder="e.g., 2200">
      </div>
      <div>
        <label class="text-gray-700 text-sm font-semibold">Region / Utility Zone</label>
        <select id="regionRate" class="w-full mt-1 border px-4 py-2 rounded">
          <option value="5">Nationwide Average</option>
          <option value="8">California</option>
          <option value="5">Texas</option>
          <option value="4">Florida</option>
          <option value="6">New York</option>
          <option value="7">Massachusetts</option>
          <option value="3">Nevada</option>
          <option value="6.5">New Jersey</option>
          <option value="5.5">Georgia</option>
          <option value="4.2">Arizona</option>
          <option value="4.8">Colorado</option>
          <option value="3.5">Ohio</option>
          <option value="4.1">Washington</option>
          <option value="4.3">North Carolina</option>
          <option value="3.2">Michigan</option>
          <option value="4.7">Illinois</option>
        </select>
      </div>
    </div>
  </div>

  <!-- Step 3: Estimated Savings -->
  <div class="bg-white p-6 border rounded-xl shadow mb-10">
    <h3 class="text-xl font-medium text-gray-800 mb-4">3. Estimated Savings</h3>
    <div id="results" class="text-gray-700 space-y-2">
      <!-- Dynamic results here -->
    </div>
  </div>

  <!-- Step 4: CTA for Report -->
  <div class="text-center space-y-4">
    <button id="generateReportBtn" class="bg-black text-white text-sm font-light tracking-wide py-3 px-8 rounded hover:bg-gray-800 transition">Get Full C-Suite Report</button>
    <a href="/tools/cooling-tower" class="inline-block bg-blue-900 text-white py-2 px-6 rounded hover:bg-blue-800 transition">🔍 Advance Cooling Tower Calculator</a>
    <a href="/contact" class="inline-block bg-gray-800 text-white py-2 px-6 rounded hover:bg-gray-700 transition">📩 Get In Touch with Our Experts</a>
  </div>

  <!-- Email Modal -->
  <div id="emailModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-lg max-w-md w-full p-6 text-center">
      <h4 class="text-lg font-semibold text-gray-800 mb-2">Enter Your Work Email</h4>
      <p class="text-gray-500 text-sm mb-4">We’ll send your full savings & sustainability report.</p>
      <input id="workEmail" type="email" placeholder="you@company.com" class="w-full border px-4 py-2 mb-4 rounded">
      <button id="submitEmail" class="bg-black text-white py-2 px-6 rounded hover:bg-gray-800 transition">Send Report</button>
      <button id="cancelModal" class="block mt-3 text-gray-500 text-sm hover:underline">Cancel</button>
    </div>
  </div>
</section>
@endsection

@push('scripts')
  <script>
  const ids = ['flowMgmt','waterTreatment','toiletSensor','coolingTower','numProps','avgBill','regionRate'];
  ids.forEach(id => document.getElementById(id).addEventListener('change', calculateSavings));

  function calculateSavings() {
    const props = parseInt(numProps.value) || 1;
    const bill = parseFloat(avgBill.value) || 0;
    const rate = parseFloat(regionRate.value) || 5;
    const baseAnnual = bill * 12 * props;
    let savings = 0;

    if (flowMgmt.checked) savings += 0.2 * baseAnnual;
    if (waterTreatment.checked) savings += 0.1 * baseAnnual;
    if (toiletSensor.checked) savings += 0.25 * baseAnnual;
    if (coolingTower.checked) savings += 0.15 * baseAnnual;

    const waterSaved = (savings / rate) * 1000;
    const co2 = (savings / 1000) * 0.38;

    results.innerHTML = `
      <p><strong>Total Estimated Annual Savings:</strong> $${savings.toFixed(2)}</p>
      <p><strong>Estimated Water Saved:</strong> ${Math.round(waterSaved).toLocaleString()} gallons</p>
      <p><strong>Estimated CO₂ Saved:</strong> ${co2.toFixed(1)} kg</p>
      <p><strong>Properties Analyzed:</strong> ${props}</p>
    `;
  }

  document.getElementById('generateReportBtn').onclick = () => {
    document.getElementById('emailModal').classList.remove('hidden');
  };
  document.getElementById('cancelModal').onclick = () => {
    document.getElementById('emailModal').classList.add('hidden');
  };
  document.getElementById('submitEmail').onclick = () => {
    const email = document.getElementById('workEmail').value;
    if (!email.includes('@')) return alert('Please enter a valid work email.');
    alert(`Report sent to ${email}`);
    document.getElementById('emailModal').classList.add('hidden');
  };
</script>
@endpush
  


