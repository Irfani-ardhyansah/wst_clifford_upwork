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

      @forelse ($tools as $item)
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

    <!-- Bottom CTA -->
    <div class="mt-16 text-center">
      <h4 class="text-xl font-semibold text-gray-700">
        Want new white papers delivered to your inbox?
      </h4>

      @include('layouts.partials.subscribe')
    </div>

  </div>
</section>

@include('layouts.partials.modal-form-user')
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

        $('#subscribeForm').on('submit', function(e) {
        e.preventDefault();
        
        let form = $(this);
        let btn = $('#btnSubscribe');
        let originalBtnText = btn.html();
        let emailInput = $('#emailInput');
        let errorMsg = $('#subscribeError');

        btn.prop('disabled', true).html('<i class="fa-solid fa-circle-notch fa-spin"></i> Processing...');
        errorMsg.addClass('hidden').text('');
        emailInput.removeClass('border-red-500 ring-red-500');

        $.ajax({
            url: "{{ route('subscribe.store') }}",
            type: "POST",
            data: form.serialize(),
            success: function(response) {
                if(response.status === 'success') {
                    form[0].reset(); 
                    $('#successEmail').text(emailInput.val());
                    $('#successModal').removeClass('hidden').addClass('flex'); 
                }
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMessage = 'Something went wrong. Please try again.';
                
                if(errors && errors.email) {
                    errorMessage = errors.email[0]; 
                } else if (xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                errorMsg.text(errorMessage).removeClass('hidden');
                emailInput.addClass('border-red-500 ring-red-500 focus:border-red-500 focus:ring-red-500');
            },
            complete: function() {
                btn.prop('disabled', false).html(originalBtnText);
            }
        });
    });

    $('#closeModalBtn').on('click', function() {
        $('#successModal').addClass('hidden').removeClass('flex');
    });

    $('#successModal').on('click', function(e) {
        if (e.target === this) {
            $(this).addClass('hidden').removeClass('flex');
        }
    });
});
</script>
@endpush