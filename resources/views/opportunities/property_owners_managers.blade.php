@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')
  <!-- Opportunity Snapshot Section -->
  <section class="bg-gray-800 py-16 px-6 text-center">
    <h1 class="text-4xl font-extrabold mb-4 text-white">An Opportunity to Lead — and Save</h1>
    <p class="text-lg max-w-3xl mx-auto text-gray-300">Water utility rates are climbing, sustainability is no longer optional, and outdated systems are draining property profits. We’re offering a no-capital, smart savings solution tailored for property portfolios — but only for a limited rollout phase.</p>
    <div class="mt-6 space-x-4">
      <a href="#" class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-light px-6 py-3 rounded-full text-sm tracking-wider uppercase shadow-lg hover:shadow-xl transition">See If You Qualify</a>
      <a href="#" class="bg-gray-700 border border-gray-500 text-white font-light px-6 py-3 rounded-full text-sm tracking-wider uppercase hover:bg-gray-600 transition">Book a Discovery Call</a>
    </div>
  </section>

  <!-- Why Now Section -->
  <section class="py-16 px-6 max-w-5xl mx-auto">
    <h2 class="text-3xl font-bold mb-6 text-center text-white">Why Now?</h2>
    <div class="grid md:grid-cols-2 gap-8 text-lg">
      <div class="bg-gray-800 p-6 rounded shadow-md">
        <h3 class="text-xl font-semibold mb-2 text-indigo-400">📈 Utility rates are increasing 6–9% per year</h3>
        <p class="text-gray-300">Without action, this compounds into thousands in lost NOI annually.</p>
      </div>
      <div class="bg-gray-800 p-6 rounded shadow-md">
        <h3 class="text-xl font-semibold mb-2 text-indigo-400">📉 Older buildings leak money — literally</h3>
        <p class="text-gray-300">Undetected losses and inaccurate billing inflate operating costs silently.</p>
      </div>
      <div class="bg-gray-800 p-6 rounded shadow-md">
        <h3 class="text-xl font-semibold mb-2 text-indigo-400">🌍 ESG pressure is rising</h3>
        <p class="text-gray-300">GRESB and CDP frameworks demand action and verified reporting.</p>
      </div>
      <div class="bg-gray-800 p-6 rounded shadow-md">
        <h3 class="text-xl font-semibold mb-2 text-indigo-400">🚫 Most managers lack time or capital</h3>
        <p class="text-gray-300">That’s why our no-cost model exists — we take care of everything, backed by ROI.</p>
      </div>
    </div>
  </section>

  <!-- Transformation Comparison Table -->
  <section class="bg-gray-800 py-16 px-6">
    <h2 class="text-3xl font-bold mb-10 text-center text-white">What Changes When You Partner With Us?</h2>
    <div class="overflow-x-auto">
      <table class="table-auto w-full text-left border border-gray-700 text-gray-300">
        <thead>
          <tr class="bg-gray-700 text-white">
            <th class="px-4 py-3">Category</th>
            <th class="px-4 py-3">Without Our Services</th>
            <th class="px-4 py-3">With Our Solution</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-t border-gray-700">
            <td class="px-4 py-3 font-semibold text-white">Water & Sewer Fees</td>
            <td class="px-4 py-3">Rising, with no clarity</td>
            <td class="px-4 py-3 text-green-400">10–30% reduction, verified</td>
          </tr>
          <tr class="border-t border-gray-700">
            <td class="px-4 py-3 font-semibold text-white">NOI Impact</td>
            <td class="px-4 py-3">Flat, unpredictable</td>
            <td class="px-4 py-3 text-green-400">Predictable uplift, reportable</td>
          </tr>
          <tr class="border-t border-gray-700">
            <td class="px-4 py-3 font-semibold text-white">ESG Reporting</td>
            <td class="px-4 py-3">Manual or missed</td>
            <td class="px-4 py-3 text-green-400">Auto-logged, GRESB/CDP-ready</td>
          </tr>
          <tr class="border-t border-gray-700">
            <td class="px-4 py-3 font-semibold text-white">Maintenance Costs</td>
            <td class="px-4 py-3">Reactive & costly</td>
            <td class="px-4 py-3 text-green-400">Preventative alerts & insights</td>
          </tr>
          <tr class="border-t border-gray-700">
            <td class="px-4 py-3 font-semibold text-white">Owner Perception</td>
            <td class="px-4 py-3">Neutral or negative</td>
            <td class="px-4 py-3 text-green-400">Proactive, performance-led</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="bg-gray-900 text-white py-16 px-6 text-center">
    <h2 class="text-3xl font-bold mb-4">See What Your Property Portfolio Could Save</h2>
    <p class="text-lg max-w-2xl mx-auto mb-6 text-gray-300">This opportunity is limited to early-adopting portfolios. Let's explore what your savings and ESG impact could be — with no upfront investment required.</p>
    <div class="space-x-4">
      <a href="#" class="bg-gradient-to-r from-teal-400 to-blue-500 text-white font-light px-6 py-3 rounded-full text-sm tracking-wider uppercase shadow-lg hover:shadow-xl transition">Request Your Free Savings Preview</a>
      <a href="#" class="bg-gray-700 border border-gray-600 text-white font-light px-6 py-3 rounded-full text-sm tracking-wider uppercase hover:bg-gray-600 transition">Talk With a Water Efficiency Strategist</a>
    </div>
  </section>
@endsection