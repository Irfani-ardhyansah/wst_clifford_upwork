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
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-800">{{$industry->title}}</h2>
        <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
          {{$industry->description}}
        </p>
      </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($case_studies as $item)    
          <div class="bg-gray-50 rounded-2xl shadow hover:shadow-lg transition duration-300">
            <img
              src="{{ asset('storage/' .$item->image_path) }}"
              alt="{{ $item->title }}"
              class="rounded-t-2xl w-full h-48 object-cover"
            >

            <div class="p-6">
              <h3 class="text-xl font-semibold text-gray-800">
                {{ $item->title }}
              </h3>

              <p class="mt-2 text-gray-600 text-sm line-clamp-2 min-h-[2.5rem]">
                {{ $item->description }}
              </p>

              <div class="mt-4 flex items-center justify-between">
                <button
                    class="open-modal-btn w-full group inline-flex items-center justify-between rounded-full bg-gray-900 text-white px-6 py-3 font-semibold shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:bg-gray-800"
                    data-id="{{ $item->id }}" data-title="{{ $item->title }}" data-image="{{ asset('storage/' . $item->image_path) }}"
                >
                  <span>View Tools</span>
                  <span class="ml-auto grid place-items-center w-9 h-9 rounded-full bg-white/10 text-white transition-transform duration-300 group-hover:rotate-45">
                      <i class="ri-arrow-right-up-line"></i>
                  </span>
              </button>
              </div>
            </div>
          </div>
        @empty
          <p class="text-gray-500 col-span-3 text-center">
            No white papers available at the moment.
          </p>
        @endforelse
      </div>
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


@include('layouts.partials.modal-form-user')

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
        const image     = $(this).data('image');
        
        $('#modal-case-id').val(caseId);
        $('#modal-asset-title').text(caseTitle);

        $('#modal-image').addClass('hidden').attr('src', '');
        $('#modal-icon').removeClass('hidden');

        if (image) {
            $('#modal-image')
                .attr('src', image)
                .removeClass('hidden');

            $('#modal-icon').addClass('hidden');
        }

        $('#pending-asset-preview').removeClass('hidden').addClass('flex');
        $('#auth-modal').removeClass('hidden opacity-0').addClass('flex');
        
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


