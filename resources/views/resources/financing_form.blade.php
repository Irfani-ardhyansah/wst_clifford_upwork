@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')
<br><br><br>
<section class="max-w-6xl mx-auto px-6 pt-4">
  <div class="flex justify-end">
    <a href="/pdfs/financing-application.pdf" target="_blank" 
       class="bg-black text-white font-light tracking-wide text-sm py-2 px-5 rounded-md border border-black hover:bg-white hover:text-black transition-all duration-200">
      DOWNLOAD PDF
    </a>
  </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-10 space-y-12">
  <!-- Business Entity Information -->
  <div class="border rounded shadow">
    <div class="bg-blue-100 px-6 py-3 font-semibold text-lg border-l-4 border-blue-800">Business Entity Information</div>
    <div class="p-6 space-y-6">
      <div class="grid md:grid-cols-2 gap-4">
        <div>
          <label class="font-semibold">Legal Business Name: <span class="text-red-600">*</span></label>
          <input type="text" placeholder="Legal Business Name" class="w-full border px-4 py-2 rounded" required>
        </div>
        <div>
          <label class="font-semibold">Business Description / Industry: <span class="text-red-600">*</span></label>
          <input type="text" placeholder="Business Description / Industry" class="w-full border px-4 py-2 rounded" required>
        </div>
      </div>
      <div class="grid md:grid-cols-3 gap-4">
        <input type="text" placeholder="Business Type" class="border px-4 py-2 rounded">
        <input type="text" placeholder="Tax ID" class="border px-4 py-2 rounded">
        <input type="text" placeholder="Business Phone" class="border px-4 py-2 rounded">
        <input type="text" placeholder="Gross Annual Revenue" class="border px-4 py-2 rounded">
      </div>
      <input type="text" placeholder="Business Street Address (no P.O. box)" class="w-full border px-4 py-2 rounded">
      <div class="grid md:grid-cols-4 gap-4">
        <input type="text" placeholder="City" class="border px-4 py-2 rounded">
        <input type="text" placeholder="State" class="border px-4 py-2 rounded">
        <input type="text" placeholder="Zip Code" class="border px-4 py-2 rounded">
        <input type="date" class="border px-4 py-2 rounded">
      </div>
    </div>
  </div>

  <!-- Business Owner Information -->
  <div class="border rounded shadow">
    <div class="bg-blue-100 px-6 py-3 font-semibold text-lg border-l-4 border-blue-800">Business Owner Information</div>
    <div class="p-6 space-y-6">
      <div class="grid md:grid-cols-2 gap-4">
        <input type="text" placeholder="Business Owner Full Name" class="border px-4 py-2 rounded" required>
        <input type="email" placeholder="Email" class="border px-4 py-2 rounded" required>
      </div>
      <div class="grid md:grid-cols-4 gap-4">
        <input type="text" placeholder="Phone" class="border px-4 py-2 rounded">
        <input type="date" class="border px-4 py-2 rounded">
        <input type="text" placeholder="Social Security Number" class="border px-4 py-2 rounded">
        <input type="text" placeholder="Ownership %" class="border px-4 py-2 rounded">
      </div>
      <input type="text" placeholder="Home Street Address (no P.O. box)" class="w-full border px-4 py-2 rounded">
      <div class="grid md:grid-cols-3 gap-4">
        <input type="text" placeholder="City" class="border px-4 py-2 rounded">
        <input type="text" placeholder="State" class="border px-4 py-2 rounded">
        <input type="text" placeholder="Zip Code" class="border px-4 py-2 rounded">
      </div>
    </div>
  </div>

  <!-- Funding Request -->
  <div class="border rounded shadow">
    <div class="bg-blue-100 px-6 py-3 font-semibold text-lg border-l-4 border-blue-800">Funding Request</div>
    <div class="p-6 space-y-6">
      <div class="grid md:grid-cols-3 gap-4">
        <input type="text" placeholder="Requested Amount" class="border px-4 py-2 rounded">
        <input type="text" placeholder="Estimated Credit Score" class="border px-4 py-2 rounded">
        <input type="text" placeholder="Equipment Make / Model" class="border px-4 py-2 rounded">
      </div>
      <div class="text-sm text-gray-700 leading-relaxed">
        <p class="mt-4 mb-2 font-semibold">Declaration of Accuracy and Authorization</p>
        <p>
          I, the undersigned, affirm that the information provided herein is accurate, complete, and submitted in good faith. I understand that any wilful misrepresentation could result in punitive actions including potential claims of fraud... <em>(truncated for space — full legal text should be included here)</em>
        </p>
      </div>
      <div class="grid md:grid-cols-2 gap-4 mt-6">
        <input type="text" placeholder="Owner Signature" class="border px-4 py-2 rounded">
        <input type="date" class="border px-4 py-2 rounded">
      </div>
      <div class="pt-4">
        <button class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800">Submit</button>
      </div>
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
@endsection