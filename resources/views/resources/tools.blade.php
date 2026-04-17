@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/tools.css') }}">
@endpush

@section('content')

<div class="reb-hero">
  <div class="reb-hero-inner">
    <div class="reb-bc">
      <a href="/resources">Resources</a>
      <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 1l4 4-4 4"/></svg>
      <span>My City Water Rebates</span>
    </div>
    <div class="reb-eye">Resources &mdash; Rebate Database</div>
    <h1 class="reb-h1">Find every water rebate<br><em>available to your property.</em></h1>
    <p class="reb-deck">32 commercial water rebate programmes across 10 states and 22 cities. Free to search. WST files sewer exemptions and rate credits on your behalf as part of the water programme &mdash; at no upfront cost.</p>
    <div class="reb-open-note">
      <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.3"><circle cx="6.5" cy="6.5" r="5"/><path d="M6.5 4v3l2 1.5"/></svg>
      No registration required &mdash; all rebate data is free to access and search.
    </div>
  </div>
  <div class="reb-strip">
    <div class="rs"><div class="rs-n">32</div><div class="rs-l">Rebate programmes catalogued</div></div>
    <div class="rs"><div class="rs-n">22</div><div class="rs-l">Cities covered across 10 states</div></div>
    <div class="rs"><div class="rs-n">10</div><div class="rs-l">Sewer exemption programmes &mdash; WST files all</div></div>
    <div class="rs"><div class="rs-n">$0</div><div class="rs-l">Upfront cost &mdash; WST shared-savings filing model</div></div>
  </div>
</div>

<!-- TYPE LEGEND -->
<div class="type-legend">
  <span style="font-size:9px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.22);margin-right:4px;">Programme types:</span>
  <div class="tl-item"><div class="tl-dot" style="background:#2D5C42;"></div>Sewer Exemption — credits for water that never enters the sewer</div>
  <div class="tl-item"><div class="tl-dot" style="background:#1E6B8C;"></div>Equipment Rebate — cash back on efficiency hardware</div>
  <div class="tl-item"><div class="tl-dot" style="background:#C8861E;"></div>Rate Credit / Reduction — lower rates for demonstrated efficiency</div>
</div>

<!-- CONTROLS: Search + Filters -->
<div class="reb-controls">
  <div class="reb-search-row">
    <input class="reb-search" type="search" id="reb-search" placeholder="Search by city, state, utility or programme type…" oninput="filterRebates()" aria-label="Search rebate programmes">
    <span class="reb-result-count" id="reb-count">32 programmes</span>
  </div>
  <div class="filter-row">
    <span class="filter-lbl">State:</span>
      <button class="sf on js-sf" data-s="all" role="tab" aria-selected="true">All States</button>
      <!-- <button class="sf js-sf" data-s="AZ" role="tab" aria-selected="false">Arizona (2 cities)</button>
      <button class="sf js-sf" data-s="CA" role="tab" aria-selected="false">California (4 cities)</button>
      <button class="sf js-sf" data-s="CO" role="tab" aria-selected="false">Colorado (1 city)</button>
      <button class="sf js-sf" data-s="FL" role="tab" aria-selected="false">Florida (7 cities)</button>
      <button class="sf js-sf" data-s="GA" role="tab" aria-selected="false">Georgia (1 city)</button>
      <button class="sf js-sf" data-s="IL" role="tab" aria-selected="false">Illinois (1 city)</button>
      <button class="sf js-sf" data-s="NV" role="tab" aria-selected="false">Nevada (1 city)</button>
      <button class="sf js-sf" data-s="NY" role="tab" aria-selected="false">New York (1 city)</button>
      <button class="sf js-sf" data-s="TX" role="tab" aria-selected="false">Texas (3 cities)</button>
      <button class="sf js-sf" data-s="WA" role="tab" aria-selected="false">Washington (1 city)</button> -->

    <div class="filter-div"></div>
    <span class="filter-lbl" style="margin-left:4px;">Type:</span>
      <button class="sf js-tf on" data-t="all" role="tab" aria-selected="true">All Types</button>
      <!-- <button class="sf js-tf " data-t="Sewer" role="tab" aria-selected="false">Sewer Exemptions</button>
      <button class="sf js-tf " data-t="Equipment" role="tab" aria-selected="false">Equipment Rebates</button>
      <button class="sf js-tf " data-t="Rate" role="tab" aria-selected="false">Rate Credits / Reductions</button> -->

  </div>
</div>

<!-- GRID -->
<div class="reb-grid-wrap">
  <div class="reb-grid" id="reb-grid">
    @forelse ($tools as $item)
      <div class="rc" data-state="FL" data-type="Sewer" data-city="Fort Lauderdale">
        <div class="rc-top">
          <div class="rc-meta">
            <span class="rc-badge" style="color:#2D5C42;background:rgba(45,92,66,.12);">
              <!-- Sewer Exemption -->
            </span>
            <span class="rc-city">Fort Lauderdale, FL</span>
          </div>
          <div class="rc-prog">{{$item->title}}</div>
          <div class="rc-util">{{$item->tags}}</div>
        </div>
        @if($item->image_path)
          <img src="{{ asset('storage/' . $item->image_path) }}"
                alt="{{ $item->title }}"
                style="width:100%; height:192px; object-fit:cover;">
        @else
          <img src="https://via.placeholder.com/400x300?text=No+Image"
                alt="Placeholder"
                style="width:100%; height:192px; object-fit:cover;">
        @endif
        <div class="rc-amount">Up to 100% of sewer charges on non-returned water</div>
        <div class="rc-props">
          <svg width="11" height="11" viewBox="0 0 11 11" fill="none" stroke="currentColor" stroke-width="1.3"><rect x="1" y="4" width="9" height="6" rx=".75"/><path d="M3 4V3a2.5 2.5 0 015 0v1"/></svg>
          Hotels, Office, Mixed-Use, Cooling Towers, Golf
        </div>
        <div class="rc-notes">{{ $item->description }}</div>
        <div class="rc-foot">
          <span class="rc-wst-tag">WST files this</span>
          <button class="rc-cta open-modal-btn"
            data-id="{{ $item->id }}"
            data-title="{{ $item->title }}"
            data-image="{{ asset('storage/' . $item->image_path) }}">
            Get Filing Help
            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 5h6M5 2l3 3-3 3"/></svg>
          </button>
        </div>
      </div>
    @empty
      <p style="color:rgba(255,255,255,0.55); font-size:14px; text-align:center; grid-column:1/-1;">
        No tools available at the moment.
      </p>
    @endforelse
    <div class="reb-empty" id="reb-empty" style="display:none;">
      No programmes found matching your search. <a href="#" onclick="clearFilters();return false;" style="color:var(--green-lt);">Clear filters</a>
    </div>
  </div>
</div>

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