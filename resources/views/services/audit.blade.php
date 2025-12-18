@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')
  <section class="relative min-h-[520px] flex items-center justify-start overflow-hidden bg-black">
    <img 
      src="/assets/img/services/watersite_audit_building_1.png"
      alt="Modern hotel or commercial building"
      class="absolute inset-0 w-full h-full object-cover grayscale opacity-25 z-0" />
    <div class="absolute inset-0 bg-black bg-opacity-5 z-10"></div>
  
    <div class="relative z-20 max-w-2xl pl-6 md:pl-16 py-16">
      <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight drop-shadow">
        Water Site Audit: The Cornerstone<br class="hidden md:block"> to Smart Water Management
      </h1>
      <p class="text-lg md:text-xl text-gray-100 font-light mb-7 max-w-xl">
        <span class="block">Our unique water audit strategies save businesses an average of <span class="font-bold text-white">10–25%</span> of their annual water utility fees.</span>
        <span class="text-gray-300 block mt-2">
          Water utility bills and statements can be confusing, and billing errors often go unnoticed.<br><br>
          Without routine audits conducted by external experts and advisors (“fresh eyes”), your business could be unknowingly overpaying—not just for months, but potentially for years.
        </span>
      </p>
      <a href="#"
        class="group mt-8 inline-flex items-center justify-between rounded-full bg-zinc-100 text-zinc-900 px-6 py-3 font-semibold
                shadow-lg shadow-black/20 transition-all duration-300 hover:-translate-y-1 hover:bg-white">
        <span>Speak With an Auditor</span>
        <span class="ml-4 grid place-items-center w-9 h-9 rounded-full bg-zinc-900/10 text-zinc-900 transition-transform duration-300 group-hover:rotate-45">
          <i class="ri-arrow-right-up-line"></i>
        </span>
      </a>
    </div>
  
    <div class="absolute bottom-8 right-8 bg-black bg-opacity-90 text-white p-6 w-80 shadow-2xl rounded-none z-30 flex flex-col items-start
                max-md:relative max-md:bottom-0 max-md:right-0 max-md:mx-auto max-md:w-11/12 max-md:mt-10">
      <div class="text-base mb-2 font-semibold">
        Audit uncovered <br />
        <span class="text-xl font-bold">180,000 gal/month</span> savings
      </div>
      <div class="flex items-end space-x-1 mb-2 mt-2">
        <svg width="150" height="68" viewBox="0 0 80 32" fill="none">
          <rect x="5" y="16" width="8" height="12" fill="#888"/>
          <rect x="20" y="8" width="8" height="20" fill="#bbb"/>
          <rect x="35" y="12" width="8" height="16" fill="#ccc"/>
          <rect x="50" y="4" width="8" height="24" fill="#fff"/>
        </svg>
      </div>
      <div class="text-sm text-gray-200">
        Payback in <span class="font-bold">6.3</span> months<br>
        <span class="text-xs">verified savings by WST</span>
      </div>
    </div>
  </section>
  <section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">
      <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-10 text-left">
        Putting the External Water Audit Advisors to Work
      </h2>
      <div class="grid md:grid-cols-3 gap-10 items-start">
        <div>
          <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-2">
            Precision-engineered water audits that reduce OpEx and improve NOI
          </h3>
          <p class="text-gray-600 font-light">
            <span class="text-sm">The fresh pair of eyes – from experts.</span>
          </p>
        </div>
        <div>
          <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-3">
            What You Gain
          </h3>
          <ul class="space-y-3 text-gray-800 font-light">
            <li class="flex items-start">
              <span class="text-blue-600 font-bold mr-2 mt-0.5">&#10003;</span>
              20–30% water &amp; sewer savings, typically
            </li>
            <li class="flex items-start">
              <span class="text-blue-600 font-bold mr-2 mt-0.5">&#10003;</span>
              ESG-ready reporting for stakeholders
            </li>
            <li class="flex items-start">
              <span class="text-blue-600 font-bold mr-2 mt-0.5">&#10003;</span>
              ROI – most audits pay for themselves within 12 months
            </li>
            <li class="flex items-start">
              <span class="text-blue-600 font-bold mr-2 mt-0.5">&#10003;</span>
              Asset value protection, risk mitigation, and compliance
            </li>
          </ul>
        </div>
        <div>
          <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-3">
            Industry Insights
          </h3>
          <div class="bg-gray-900 text-white p-6 shadow-xl">
            <p class="text-3xl font-bold mb-1">1 in 3</p>
            <p class="mb-4 text-sm text-gray-200">
              commercial properties<br> have undetected water billing errors.
            </p>
            <hr class="border-gray-700 mb-3">
            <p class="text-2xl font-semibold mb-1">24%</p>
            <p class="mb-4 text-sm text-gray-200">
              average savings from external audit recommendations (WST data)
            </p>
            <hr class="border-gray-700 mb-3">
            <p class="text-base text-gray-300 italic">
              “The earlier a water audit is performed, the greater the savings and ROI.”
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-10 items-start">
      <div class="md:col-span-2">
        <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-6">
          Why It Pays to Validate Bills: Understanding Your Water Utility Fees
        </h2>
        <p class="text-lg text-gray-800 mb-5 font-light">
          For most enterprises, water is an unmanaged utility and an unmitigated financial risk. While you have strategic oversight on energy, complex water billing—rife with regional variances and errors—creates significant financial exposure.
        </p>
        <p class="text-lg text-gray-800 mb-5 font-light">
          We provide the expertise to audit this complexity, recover overpayments, and transform an operational blind spot into a source of savings and efficiency. 
        </p>
        <p class="text-lg text-gray-800 mb-5 font-light">
          A WST water audit removes uncertainty from your water bill. We are experts at navigating water and wastewater tariffs.
        </p>
      </div>
      <aside class="bg-black text-white rounded-none shadow-xl p-8 flex flex-col items-start">
        <h3 class="text-2xl font-extrabold mb-4">Water Management Insights</h3>
        <p class="text-lg font-light mb-8">
          Download your free water management guide to learn expert strategies, resolving excessively high water bills, data-driven solutions, and proven methods to help you control costs, improve efficiency, and drive sustainability.
        </p>
        <a href="#"
          class="group mt-8 inline-flex items-center justify-between rounded-full bg-zinc-100 text-zinc-900 px-6 py-3 font-semibold
                  shadow-lg shadow-black/20 transition-all duration-300 hover:-translate-y-1 hover:bg-white">
          <span>DOWNLOAD NOW</span>
          <span class="ml-4 grid place-items-center w-9 h-9 rounded-full bg-zinc-900/10 text-zinc-900 transition-transform duration-300 group-hover:rotate-45">
            <i class="ri-arrow-right-up-line"></i>
          </span>
        </a>
      </aside>
    </div>
  </section>
  <section class="bg-white py-14">
    <div class="max-w-7xl mx-auto px-7 grid md:grid-cols-2 gap-12 items-center"> <div>
        <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-5">
          Water Price Increases & Business Meaning: Conducting a Water Audit 
        </h2>
        <p class="text-lg text-gray-800 font-light mb-6">
          We don’t stop at insights – we take action. 
          Our end-to-end audit mitigates water-related financial risk by identifying infrastructure process improvement, complex billing errors and recovering historical overpayments, often resulting in a substantial cash return.
          Proprietary technology and expert system engineers transform this liability into measurable gain.
        </p>
        <ul class="space-y-3 text-gray-900 font-medium text-base mb-8">
          <li class="flex items-center">
            <span class="text-blue-600 text-xl font-bold mr-3">&#10003;</span>
            Invoice &amp; Tariff Analysis
          </li>
          <li class="flex items-center">
            <span class="text-blue-600 text-xl font-bold mr-3">&#10003;</span>
            Targeted Site Inspections
          </li>
          <li class="flex items-center">
            <span class="text-blue-600 text-xl font-bold mr-3">&#10003;</span>
            Detailed Reporting
          </li>
          <li class="flex items-center">
            <span class="text-blue-600 text-xl font-bold mr-3">&#10003;</span>
            Implementation &amp; Recovery
          </li>
          <li class="flex items-center">
            <span class="text-blue-600 text-xl font-bold mr-3">&#10003;</span>
            Opportunity Identification
          </li>
          <li class="flex items-center">
            <span class="text-blue-600 text-xl font-bold mr-3">&#10003;</span>
            Utility forecasting, budgeting &amp; procurement
          </li>
          <li class="flex items-center">
            <span class="text-blue-600 text-xl font-bold mr-3">&#10003;</span>
            Ongoing support from a dedicated team of water efficiency specialists and engineers
          </li>
        </ul>
        <div class="bg-gray-900 text-white p-6 shadow-lg rounded-none mt-6">
          <h3 class="text-lg font-bold mb-1">What Our Water Audit Will Cost You:</h3>
          <p class="font-light text-sm mb-2">
            <strong>No upfront fees.</strong> Delivered via a shared-savings approach—meaning there are no upfront costs.
          </p>
          <p class="font-light text-sm">
            Our compensation is tied directly to the savings we help you recover.
            <span class="block text-blue-200 font-semibold mt-1">
              You Only Pay When You Save.
            </span>
          </p>
        </div>
      </div>
      <div class="flex items-center justify-center">
        <img src="/assets/img/services/audit_engineer_hotel.png"
          alt="Sample Water Audit Document"
          class="w-full h-auto max-h-[400px] object-contain shadow border border-gray-100" /> </div>
    </div>
  </section>
  <section class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-2">
      <blockquote class="italic text-lg text-gray-700 font-light mb-6 leading-relaxed border-l-4 border-blue-700 pl-4">
        “WST's audit found issues our engineers missed—it paid for itself in 90 days.”
        <div class="text-sm text-gray-500 mt-2">Director of Engineering, Hilton South Tower</div>
      </blockquote>
  
      <hr class="border-gray-200 mb-8">
  
      <div class="mb-8">
        <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-2">
          Demonstrate ESG & Regulatory Compliance
        </h3>
        <p class="text-lg text-gray-600 font-light mb-4 max-w-2xl">
          Our audit reports are aligned with your sustainability strategy and environmental compliance.
        </p>
        <div class="bg-gray-900 bg-opacity-95 border border-gray-800 shadow-lg px-6 py-5 w-full max-w-[160px] mt-2 mb-4">
          <div class="text-gray-300 uppercase text-xs mb-1 tracking-widest">ESG IMPACT</div>
          <div class="flex items-end mb-2">
            <div class="text-3xl font-extrabold text-white mr-3">27%</div>
            <div class="text-sm text-gray-400 font-light leading-tight">
              Avg. Water Use Reduction <br class="hidden sm:block"/> Post-Audit
            </div>
          </div>
          <div class="text-xs text-gray-400 mt-2">
            *ESG-ready audit documentation supports GRESB, CDP &amp; investor compliance.
          </div>
        </div>
      </div>
  
      <div class="flex flex-col sm:flex-row items-start sm:items-center gap-5 mt-10">
        
        <a href="#" 
          class="group mt-8 inline-flex items-center rounded-full px-6 py-3 bg-gray-900 text-white font-semibold shadow-md 
            hover:shadow-lg hover:-translate-y-0.5 transition-all">
          <span>Request a Confidential Audit</span>
          <span class="ml-4 grid place-items-center w-9 h-9 rounded-full">
            <i class="ri-arrow-right-up-line ml-3"></i>
          </span>
        </a>
        <a href="#"
          class="group mt-8 inline-flex items-center justify-between rounded-full bg-zinc-100 text-zinc-900 px-6 py-3 font-semibold
            shadow-lg shadow-black/20 transition-all duration-300 hover:-translate-y-1 hover:bg-white">
          <span>Water Webinars on Demand</span>
          <span class="ml-4 grid place-items-center w-9 h-9 rounded-full bg-zinc-900/10 text-zinc-900 transition-transform duration-300 group-hover:rotate-45">
            <i class="ri-arrow-right-up-line"></i>
          </span>
        </a>
        
      </div>
    </div>
  </section>
  @endsection