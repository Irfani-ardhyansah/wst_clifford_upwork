@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')

@push('styles')
  <style>
    .case-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin-top: 40px;
    }

    .case-card {
      background-color: #f9f9f9;
      width: 300px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      overflow: hidden;
      text-align: left;
    }

    .case-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .case-card .content {
      padding: 20px;
    }

    .case-card h3 {
      margin: 0;
      font-size: 1.1rem;
    }

    .case-card .subtitle {
      font-size: 0.9rem;
      color: #555;
      margin-bottom: 10px;
    }

    .case-card .quote {
      font-size: 0.95rem;
      font-style: italic;
      margin-bottom: 15px;
      color: #444;
    }

    .btn {
      display: inline-block;
      background-color: #111;
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 6px;
      font-size: 0.9rem;
    }
  </style>
@endpush

@section('content')
      <section class="case-study-section pb-20 pt-5 px-4 bg-white">
        <div class="max-w-7xl mx-auto font-sans text-gray-800 mb-10">
          <h2 class="text-3xl font-medium mb-4 text-center">
            Featured Case Studies
          </h2>
        </div>
        <div class="case-grid">
          <!-- Card 1 -->
          @foreach($case_studies as $item)
            <div class="case-card">
              @if($item->image_path)
                <img src="{{ asset('storage/' . $item->image_path) }}" 
                    alt="{{ $item->title }}">
              @else
                <img src="https://via.placeholder.com/400x300?text=No+Image" 
                    alt="Placeholder">
              @endif
              <div class="case-content">
                <h3>{{$item->title}}</h3>
                <div class="subtitle">{{$item->category}}</div>
                <div class="quote">{{$item->impact_highlight}}</div>
                <button
                  class="open-modal-btn group inline-flex items-center rounded-full px-6 py-3 bg-gray-900 text-white font-semibold shadow-md 
                    hover:shadow-lg hover:-translate-y-0.5 transition-all"
                    data-id="{{ $item->id }}" data-title="{{ $item->title }}"
                    >
                  <span>View Case Study</span>
                  <span class="ml-4 grid place-items-center w-9 h-9 rounded-full">
                    <i class="ri-arrow-right-up-line ml-3"></i>
                  </span>
                </button>
              </div>
            </div>
          @endforeach
        </div>
        
      </section>

      <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center px-4">
          <!-- LEFT: Heading & Description -->
          <div class="text-left">
            <h2 class="text-3xl md:text-4xl font-serif  text-left tracking-tight font-semibold mb-5 text-gray-900 uppercase">
              Let’s Assess Your Water Efficiency
            </h2>
            <p class="text-lg text-gray-700 font-light mb-8 max-w-md">
              Request a confidential water audit to optimize your property’s health and profitability.
            </p>
            <a href="#"
              class="group mt-8 inline-flex items-center justify-between rounded-full bg-zinc-100 text-zinc-900 px-6 py-3 font-semibold
                shadow-lg shadow-black/20 transition-all duration-300 hover:-translate-y-1 hover:bg-white">
              <span>Water Webinars on Demand</span>
              <span class="ml-4 grid place-items-center w-9 h-9 rounded-full bg-zinc-900/10 text-zinc-900 transition-transform duration-300 group-hover:rotate-45">
                <i class="ri-arrow-right-up-line"></i>
              </span>
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
                class="group inline-flex items-center justify-between rounded-full bg-zinc-100 text-zinc-900 px-6 py-3 font-semibold
                  shadow-lg shadow-black/20 transition-all duration-300 hover:-translate-y-1 hover:bg-white">
                <span>Submit Request</span>
                <span class="ml-4 grid place-items-center w-9 h-9 rounded-full bg-zinc-900/10 text-zinc-900 transition-transform duration-300 group-hover:rotate-45">
                  <i class="ri-arrow-right-up-line"></i>
                </span>
              </button>
            </form>
          </div>
      </section>

      <div id="auth-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 hidden opacity-0 transition-all duration-300">
          <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden transform transition-all scale-95" id="modal-content">
              <div class="bg-black text-white p-8 relative">
                  <button type="button" class="close-modal absolute top-4 right-4 text-white-400 hover:text-white transition">
                      X
                  </button>
                  <h3 class="text-2xl font-bold">Access Premium Content</h3>
                  <p class="text-gray-400 mt-2">Register once for unlimited access.</p>
              </div>
              <div class="p-8">
                  <div id="pending-asset-preview" class="bg-gray-50 rounded-lg p-4 mb-6 flex items-center gap-4 hidden">
                      <div class="w-12 h-12 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center">
                          <i class="fa-solid fa-file-lines text-xl"></i>
                      </div>
                      <div class="flex-1 min-w-0">
                          <p class="font-semibold truncate" id="modal-asset-title">Asset Title</p>
                          <p class="text-sm text-gray-500">Case Study</p>
                      </div>
                  </div>
                  @guest
                    <form method="POST" action="{{ route('login.phone') }}"  class="space-y-4">
                        @csrf
                        <input type="hidden" name="case_study_id" id="modal-case-id">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" required class="w-full p-3 bg-gray-50 border border-gray-200 rounded-lg outline-none focus:ring-2 focus:ring-teal-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Company <span class="text-red-500">*</span></label>
                            <input type="text" name="company" required class="w-full p-3 bg-gray-50 border border-gray-200 rounded-lg outline-none focus:ring-2 focus:ring-teal-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Work Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" required class="w-full p-3 bg-gray-50 border border-gray-200 rounded-lg outline-none focus:ring-2 focus:ring-teal-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number <span class="text-red-500">*</span></label>
                            <input type="number" name="phone" required class="w-full p-3 bg-gray-50 border border-gray-200 rounded-lg outline-none focus:ring-2 focus:ring-teal-500">
                        </div>
                          <button type="submit"
                              class="w-full bg-black hover:bg-teal-700 text-white font-bold py-3 rounded-lg mt-2 transition">
                              <i class="fa-solid fa-unlock mr-2"></i>Get Instant Access
                          </button>
                    </form>
                  @endguest
                  @auth
                    <div class="text-center space-y-4">

                        <p class="text-lg font-semibold">
                            Welcome back, {{ auth()->user()->name }}
                        </p>

                        <p class="text-gray-500 text-sm">
                            You already have access to this premium content.
                        </p>

                      <a class="btn" href="{{route('member-dashboard.index')}}"
                              class="w-full bg-black hover:bg-gray-700 text-white font-bold
                                    py-3 rounded-lg transition">
                          <i class="fa-solid fa-arrow-right mr-2"></i> View Content
                      </a>
                    </div>
                @endauth
              </div>
          </div>
      </div>

    </main>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    
    // Buka Modal
    $(document).on('click', '.open-modal-btn', function(e) {
        e.preventDefault();

        const caseId = $(this).data('id');
        const caseTitle = $(this).data('title');

        $('#modal-case-id').val(caseId);
        $('#modal-asset-title').text(caseTitle);

        $('#pending-asset-preview').removeClass('hidden').addClass('flex');

        // 4. Animasi Muncul
        // Hapus class hidden & opacity-0 bawaan Tailwind biar kelihatan
        $('#auth-modal').removeClass('hidden opacity-0').addClass('flex');
        
        // Efek Zoom In
        setTimeout(function() {
             $('#modal-content').removeClass('scale-95').addClass('scale-100');
        }, 10);
    });

    $(document).on('click', '.close-modal', function() {
        $('#modal-content').removeClass('scale-100').addClass('scale-95');

        setTimeout(function() {
            $('#auth-modal').addClass('hidden opacity-0').removeClass('flex');
        }, 300); 
    });

    $('#leads-form').on('submit', function(e) {
        const submitBtn = $(this).find('button[type="submit"]');
        submitBtn.prop('disabled', true).html('<i class="fa-solid fa-spinner fa-spin mr-2"></i> Processing...');
    });
});
</script>
@endpush


