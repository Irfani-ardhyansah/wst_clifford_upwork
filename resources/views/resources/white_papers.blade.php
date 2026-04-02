@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')

<!-- ─── WHITE PAPERS HEADER ─── -->
<section class="industries-page-hero" style="background:#0d0d0d; padding: 80px 40px 60px; text-align:center;">
  <div class="section-eyebrow">Resources</div>
  <div class="text-center">
    <h1 class="hero-h1">White Papers & Insight Briefs</h1>
    <p class="hero-body" style="text-align:center;">Explore in-depth research, savings strategies, and smart water management insights by Water Solutions Technology.</p>
  </div>
</section>

<!-- ─── WHITE PAPERS GRID ─── -->
<section style="background:#111; padding: 40px;">
  <div style="max-width:1280px; margin:0 auto;">

    <!-- White Papers Cards Grid -->
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(320px,1fr)); gap:24px;">
      @forelse ($whitePapers as $item)
        <div class="tile"
          style="background:#1a1a1a; overflow:hidden; display:flex; flex-direction:column;
                 border:1px solid rgba(255,255,255,0.07); transition:transform 0.3s, box-shadow 0.3s;"
          onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 12px 32px rgba(0,0,0,0.4)'"
          onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">

          @if($item->image_path)
            <img src="{{ asset('storage/' . $item->image_path) }}"
                 alt="{{ $item->title }}"
                 style="width:100%; height:192px; object-fit:cover;">
          @else
            <img src="https://via.placeholder.com/400x300?text=No+Image"
                 alt="Placeholder"
                 style="width:100%; height:192px; object-fit:cover;">
          @endif

          <div style="padding:20px; flex:1;">
            <div class="service-panel-tag" style="margin-bottom:8px;">{{ $item->title }}</div>
            <p style="color:rgba(255,255,255,0.55); font-size:14px; font-weight:300; line-height:1.6; margin:0;">
              {{ $item->description }}
            </p>
          </div>

          <button class="open-modal-btn"
             data-id="{{ $item->id }}"
             data-title="{{ $item->title }}"
             data-image="{{ asset('storage/' . $item->image_path) }}"
             style="display:block; text-align:center; padding:14px;
                    border-top:1px solid rgba(255,255,255,0.07);
                    color:rgba(255,255,255,0.6); font-size:13px; font-weight:300;
                    letter-spacing:0.05em; text-decoration:none; transition:background 0.2s, color 0.2s; cursor:pointer; background:none; border:none; width:100%;"
             onmouseover="this.style.background='rgba(255,255,255,0.06)';this.style.color='#fff'"
             onmouseout="this.style.background='transparent';this.style.color='rgba(255,255,255,0.6)'">
            View White Paper →
          </button>
        </div>
      @empty
        <p style="color:rgba(255,255,255,0.55); font-size:14px; text-align:center; grid-column:1/-1;">
          No white papers available at the moment.
        </p>
      @endforelse
    </div>

  </div>
</section>

<!-- ─── SUBSCRIBE SECTION ─── -->
<section class="contact-section" style="padding:0;">
  <div class="cc">
    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Stay Updated</div>
      <h2 class="contact-h">Want new white papers<br>delivered to your inbox?</h2>
      <p class="contact-sub">
        Subscribe to our newsletter and get the latest insights on water efficiency and smart water management.
      </p>
    </div>

    <!-- Subscribe Form -->
    <div>
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

        $('#auth-modal').removeClass('hidden opacity-0').addClass('open');

        setTimeout(function() {
             $('#modal-content').removeClass('scale-95').addClass('scale-100');
        }, 10);
    });

    $(document).on('click', '.close-modal', function() {
        $('#modal-content').removeClass('scale-100').addClass('scale-95');

        setTimeout(function() {
            $('#auth-modal').addClass('hidden opacity-0').removeClass('open');
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