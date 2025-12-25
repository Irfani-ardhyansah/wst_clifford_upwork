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

    <!-- Grid -->
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

      @forelse ($whitePapers as $item)
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

            <p class="mt-2 text-gray-600 text-sm">
              {{ $item->description }}
            </p>

            <div class="mt-4 flex items-center justify-between">
              <button
                class="open-modal-btn w-full group inline-flex items-center rounded-full w-auto px-6 py-3 bg-gray-900 text-white font-semibold shadow-md 
                  hover:shadow-lg hover:-translate-y-0.5 transition-all"
                  data-id="{{ $item->id }}" data-title="{{ $item->title }}" data-image="{{ asset('storage/' . $item->image_path) }}"
                  >
                <span>View Case Study</span>
                <span class="ml-auto grid place-items-center w-9 h-9 rounded-full">
                  <i class="ri-arrow-right-up-line ml-3"></i>
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

    <!-- Bottom CTA -->
    <div class="mt-16 text-center">
      <h4 class="text-xl font-semibold text-gray-700">
        Want new white papers delivered to your inbox?
      </h4>

      <form class="mt-4 flex justify-center flex-wrap gap-4">
        <input
          type="email"
          placeholder="Enter your email"
          class="border border-gray-300 px-4 py-2 rounded-lg w-72"
        >
        <button
          type="submit"
          class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition"
        >
          Subscribe
        </button>
      </form>
    </div>

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
                          <i 
                              id="modal-icon"
                              class="fa-solid fa-file-lines text-xl text-blue-600"
                          ></i>

                          <img
                              id="modal-image"
                              src=""
                              alt="Asset Preview"
                              class="hidden w-full h-full object-cover rounded-lg"
                          >
                      </div>
                      <div class="flex-1 min-w-0">
                          <p class="font-semibold truncate" id="modal-asset-title">Asset Title</p>
                          <p class="text-sm text-gray-500">White Paper</p>
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