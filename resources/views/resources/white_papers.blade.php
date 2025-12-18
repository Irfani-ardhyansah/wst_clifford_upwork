@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')
<section class="bg-white py-16 px-6">
  <div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-12">
      <h2 class="text-4xl font-bold text-gray-800">White Papers & Insight Briefs</h2>
      <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
        Explore in-depth research, savings strategies, and smart water management insights by Water Solutions Technology.
      </p>
    </div>

    <!-- Grid of White Papers -->
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
      <!-- Card 1 -->
      <div class="bg-gray-50 rounded-2xl shadow hover:shadow-lg transition duration-300">
        <img src="/assets/whitepaper-cover1.jpg" alt="White Paper Cover" class="rounded-t-2xl w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold text-gray-800">Commercial Buildings</h3>
          <p class="mt-2 text-gray-600 text-sm">
            Discover how flow management systems reduce water and sewer costs by up to 30% across property portfolios.
          </p>
          <div class="mt-4 flex items-center justify-between">
            <span class="text-sm text-blue-600 font-medium">#FlowManagement</span>
            <a href="#" class="text-white bg-blue-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">Download</a>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="bg-gray-50 rounded-2xl shadow hover:shadow-lg transition duration-300">
        <img src="/assets/whitepaper-cover2.jpg" alt="Cooling Tower Treatment" class="rounded-t-2xl w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold text-gray-800">Cooling Towers</h3>
          <p class="mt-2 text-gray-600 text-sm">
            Learn about chemical-free water treatment technologies that improve cooling tower efficiency, reduce scale, and lower operating costs.
          </p>
          <div class="mt-4 flex items-center justify-between">
            <span class="text-sm text-blue-600 font-medium">#CoolingTowers</span>
            <a href="#" class="text-white bg-blue-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">Download</a>
          </div>
        </div>
      </div>

      <div class="bg-gray-50 rounded-2xl shadow hover:shadow-lg transition duration-300">
        <img src="/assets/whitepaper-cover3.jpg" alt="Water Monitoring in Schools" class="rounded-t-2xl w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold text-gray-800">Sewer</h3>
          <p class="mt-2 text-gray-600 text-sm">
            Explore the benefits of real-time water monitoring systems in schools to detect leaks, improve safety, and support sustainability goals.
          </p>
          <div class="mt-4 flex items-center justify-between">
            <span class="text-sm text-blue-600 font-medium">#Education #SmartMonitoring</span>
            <a href="#" class="text-white bg-blue-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">Download</a>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="bg-gray-50 rounded-2xl shadow hover:shadow-lg transition duration-300">
        <img src="/assets/whitepaper-cover3.jpg" alt="Water Monitoring in Schools" class="rounded-t-2xl w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold text-gray-800">School And Campuses</h3>
          <p class="mt-2 text-gray-600 text-sm">
            Explore the benefits of real-time water monitoring systems in schools to detect leaks, improve safety, and support sustainability goals.
          </p>
          <div class="mt-4 flex items-center justify-between">
            <span class="text-sm text-blue-600 font-medium">#Education #SmartMonitoring</span>
            <a href="#" class="text-white bg-blue-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">Download</a>
          </div>
        </div>
      </div>

      <div class="bg-gray-50 rounded-2xl shadow hover:shadow-lg transition duration-300">
        <img src="/assets/whitepaper-cover3.jpg" alt="Water Monitoring in Schools" class="rounded-t-2xl w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold text-gray-800">Manufacturing & Industrial</h3>
          <p class="mt-2 text-gray-600 text-sm">
            Explore the benefits of real-time water monitoring systems in schools to detect leaks, improve safety, and support sustainability goals.
          </p>
          <div class="mt-4 flex items-center justify-between">
            <span class="text-sm text-blue-600 font-medium">#Education #SmartMonitoring</span>
            <a href="#" class="text-white bg-blue-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">Download</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom CTA -->
    <div class="mt-16 text-center">
      <h4 class="text-xl font-semibold text-gray-700">Want new white papers delivered to your inbox?</h4>
      <form class="mt-4 flex justify-center flex-wrap gap-4">
        <input type="email" placeholder="Enter your email" class="border border-gray-300 px-4 py-2 rounded-lg w-72">
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">Subscribe</button>
      </form>
    </div>
  </div>
</section>
@endsection
  