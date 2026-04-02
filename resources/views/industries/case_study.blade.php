@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')

<!-- ─── CASE STUDY HEADER ─── -->
<section class="industries-page-hero" style="background:#0d0d0d; padding: 80px 40px 60px; text-align:center;">
  <div class="section-eyebrow">Case Studies</div>
  <h1 class="hero-h1">{{ $industry->title }}</h1>
  <p class="hero-body">{{ $industry->description }}</p>
</section>

<!-- ─── CASE STUDIES GRID ─── -->
<section style="background:#111; padding: 40px;">
  <div style="max-width:1280px; margin:0 auto;">

    <!-- Case Studies Cards Grid -->
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(260px,1fr)); gap:24px;">
      @forelse ($case_studies as $item)
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
             style="display:block; text-align:center; padding:14px;
                    border-top:1px solid rgba(255,255,255,0.07);
                    color:rgba(255,255,255,0.6); font-size:13px; font-weight:300;
                    letter-spacing:0.05em; text-decoration:none; transition:background 0.2s, color 0.2s; cursor:pointer; background:none; border:none; width:100%;"
             onmouseover="this.style.background='rgba(255,255,255,0.06)';this.style.color='#fff'"
             onmouseout="this.style.background='transparent';this.style.color='rgba(255,255,255,0.6)'"
             data-id="{{ $item->id }}" data-title="{{ $item->title }}" data-image="{{ asset('storage/' . $item->image_path) }}">
            View Tools →
          </button>
        </div>
      @empty
        <p style="color:rgba(255,255,255,0.6); text-align:center; grid-column:1/-1;">
          No case studies available at the moment.
        </p>
      @endforelse
    </div>

  </div>
</section>

<!-- ─── PROTECT YOUR ASSET PERFORMANCE ─── -->
<section class="contact-section" style="padding:0;">
  <div class="cc">
    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Start Here</div>
      <h2 class="contact-h">Protect Your<br>Asset Performance</h2>
      <p class="contact-sub">
        Request a confidential water audit to optimize your property's health and profitability.
      </p>
      <div class="cc-btns">
        <a href="#contact-form" class="cc-btn-primary">Speak with an Auditor</a>
      </div>
    </div>

    <!-- Contact Form -->
    <div>
      <form id="contact-form" style="display:flex; flex-direction:column; gap:16px; max-width:480px; width:100%;">
        <div style="display:flex; gap:12px;">
          <input type="text" name="first-name" required placeholder="First Name"
            style="flex:1; background:#1a1a1a; border:1px solid rgba(255,255,255,0.12);
                   color:#fff; padding:10px 14px; font-size:14px; font-weight:300; outline:none;"
            onfocus="this.style.borderColor='rgba(255,255,255,0.4)'"
            onblur="this.style.borderColor='rgba(255,255,255,0.12)'"/>
          <input type="text" name="last-name" required placeholder="Last Name"
            style="flex:1; background:#1a1a1a; border:1px solid rgba(255,255,255,0.12);
                   color:#fff; padding:10px 14px; font-size:14px; font-weight:300; outline:none;"
            onfocus="this.style.borderColor='rgba(255,255,255,0.4)'"
            onblur="this.style.borderColor='rgba(255,255,255,0.12)'"/>
        </div>
        <div style="display:flex; gap:12px;">
          <input type="text" name="company-name" placeholder="Company Name"
            style="flex:1; background:#1a1a1a; border:1px solid rgba(255,255,255,0.12);
                   color:#fff; padding:10px 14px; font-size:14px; font-weight:300; outline:none;"
            onfocus="this.style.borderColor='rgba(255,255,255,0.4)'"
            onblur="this.style.borderColor='rgba(255,255,255,0.12)'"/>
          <input type="text" name="company-role" placeholder="Company Role"
            style="flex:1; background:#1a1a1a; border:1px solid rgba(255,255,255,0.12);
                   color:#fff; padding:10px 14px; font-size:14px; font-weight:300; outline:none;"
            onfocus="this.style.borderColor='rgba(255,255,255,0.4)'"
            onblur="this.style.borderColor='rgba(255,255,255,0.12)'"/>
        </div>
        <div style="display:flex; gap:12px;">
          <input type="tel" name="contact-number" placeholder="Contact Number"
            style="flex:1; background:#1a1a1a; border:1px solid rgba(255,255,255,0.12);
                   color:#fff; padding:10px 14px; font-size:14px; font-weight:300; outline:none;"
            onfocus="this.style.borderColor='rgba(255,255,255,0.4)'"
            onblur="this.style.borderColor='rgba(255,255,255,0.12)'"/>
          <input type="email" name="email" required placeholder="Email"
            style="flex:1; background:#1a1a1a; border:1px solid rgba(255,255,255,0.12);
                   color:#fff; padding:10px 14px; font-size:14px; font-weight:300; outline:none;"
            onfocus="this.style.borderColor='rgba(255,255,255,0.4)'"
            onblur="this.style.borderColor='rgba(255,255,255,0.12)'"/>
        </div>
        <select name="reason"
          style="background:#1a1a1a; border:1px solid rgba(255,255,255,0.12);
                 color:rgba(255,255,255,0.6); padding:10px 14px; font-size:14px; font-weight:300; outline:none;">
          <option value="">Reason for Contact</option>
          <option>Request a Water Audit</option>
          <option>Billing or Invoice Question</option>
          <option>Consultation on Smart Water Solutions</option>
          <option>Technical Support</option>
          <option>General Inquiry</option>
        </select>
        <textarea name="message" rows="3" required placeholder="Message"
          style="background:#1a1a1a; border:1px solid rgba(255,255,255,0.12);
                 color:#fff; padding:10px 14px; font-size:14px; font-weight:300;
                 outline:none; resize:none;"
          onfocus="this.style.borderColor='rgba(255,255,255,0.4)'"
          onblur="this.style.borderColor='rgba(255,255,255,0.12)'"></textarea>
        <button type="submit" class="cc-btn-primary" style="cursor:pointer;">
          Submit Request
        </button>
      </form>
    </div>
  </div>
</section>

<!-- @include('layouts.partials.modal-form-user') -->

@endsection

@push('scripts')
<script>
    $(document).on('click', '.open-modal-btn', function(e) {
        e.preventDefault();
        console.log('Modal button clicked');

        const caseId = $(this).data('id');
        const caseTitle = $(this).data('title');
        console.log('Case ID:', caseId, 'Title:', caseTitle);

        $('#modal-case-id').val(caseId);
        $('#modal-asset-title').text(caseTitle);

        $('#modal-image').addClass('hidden').attr('src', '');
        $('#modal-icon').removeClass('hidden');

        $('#pending-asset-preview').removeClass('hidden').addClass('flex');

        $('#auth-modal').removeClass('hidden opacity-0').addClass('open');
        console.log('Modal classes after:', $('#auth-modal').attr('class'));
        
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
</script>
@endpush

