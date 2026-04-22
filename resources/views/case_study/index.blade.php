@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/case_study.css') }}">
@endpush

@section('content')
<div class="cs-page-hero" style="padding-bottom:52px;">
  <div class="cs-page-hero-inner">
    <div class="cs-label">Resources &mdash; Case Studies</div>
    <h1 class="cs-page-h1">Verified results.<br><em>Named clients. Documented savings.</em></h1>
    <p class="cs-page-sub">Every WST case study contains verified consumption data, documented financial outcomes, and where applicable, GRESB-reported evidence. No estimates. No projections. Independently verifiable outcomes.</p>
    <div style="display:inline-flex;align-items:center;gap:8px;margin-top:20px;font-size:11px;font-weight:600;color:rgba(255,255,255,.35);border:1px solid rgba(255,255,255,.1);padding:8px 14px;">
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="var(--green-lt)" stroke-width="1.5"><rect x="3" y="6" width="8" height="6" rx="1"/><path d="M5 6V4.5a2.5 2.5 0 015 0V6"/></svg>
      Full case studies available to registered professionals &mdash; free to access.
    </div>
  </div>
</div>

<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1px;background:var(--border-l);">
  <div style="background:var(--off-white);padding:24px;"><div style="font-family:'Cormorant Garamond',serif;font-size:36px;font-weight:300;color:var(--green-lt);line-height:1;margin-bottom:5px;">$2.3M</div><div style="font-size:11px;color:var(--gray-1);">Verified savings documented across WST engagements</div></div>
  <div style="background:var(--off-white);padding:24px;"><div style="font-family:'Cormorant Garamond',serif;font-size:36px;font-weight:300;color:var(--green-lt);line-height:1;margin-bottom:5px;">25.3%</div><div style="font-size:11px;color:var(--gray-1);">Average water reduction, hospitality portfolios</div></div>
  <div style="background:var(--off-white);padding:24px;"><div style="font-family:'Cormorant Garamond',serif;font-size:36px;font-weight:300;color:var(--green-lt);line-height:1;margin-bottom:5px;">18</div><div style="font-size:11px;color:var(--gray-1);">Case studies across 13 industry categories</div></div>
  <div style="background:var(--off-white);padding:24px;"><div style="font-family:'Cormorant Garamond',serif;font-size:36px;font-weight:300;color:var(--green-lt);line-height:1;margin-bottom:5px;">GRESB</div><div style="font-size:11px;color:var(--gray-1);">All major outcomes reported at GRESB level</div></div>
</div>

<div style="display:flex;align-items:center;gap:8px;padding:14px 48px;background:var(--white);border-bottom:1px solid var(--border-l);flex-wrap:wrap;">
  <span style="font-size:10px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--gray-1);margin-right:4px;">Industry:</span>
  <button class="filter-pill  is-active js-csf" data-filter="all">All Industries</button>
  
  @foreach($industries as $ind)
    <button class="filter-pill js-csf" data-filter="{{ strtolower(str_replace(' ', '-', $ind->title)) }}">{{ $ind->title }}</button>
  @endforeach

</div>

<section class="sec sec-w" style="padding-top:36px;">
  <div class="cs-index-grid" id="cs-grid">

    @forelse ($case_studies as $item)
      <div class="csi-card" data-industry="{{ strtolower(str_replace(' ', '-', $item->industry_title)) }}" style="display:flex;flex-direction:column;">
        @if($item->image_path)
            <img src="{{ asset('storage/' . $item->image_path) }}"
                alt="{{ $item->title }}"
                style="width:100%; height:192px; object-fit:cover;">
        @else
            <img src="https://via.placeholder.com/400x300?text=No+Image"
                alt="Placeholder"
                style="width:100%; height:192px; object-fit:cover;">
        @endif
        <div class="csi-body">
          <div class="csi-tag">{{ $item->is_featured ? 'Anchor Case Study' : 'Case Study' }}</div>
          <div class="csi-industry">{{ $item->industry_title }}</div>
          <div class="csi-title">{{ $item->title }}</div>
          <div class="csi-outcome">{{ $item->tags }}</div>
          <p class="csi-narrative">{{ $item->description }}</p>
        </div>
        <div class="csi-footer">
          <span class="csi-meta">{{ $item->category }}</span>
          <button class="csi-btn open-modal-btn" data-id="{{ $item->id }}" data-title="{{ $item->title }}" data-image="{{ asset('storage/' . $item->image_path) }}">
            <svg width="11" height="11" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="5" width="8" height="5.5" rx=".75"/><path d="M4 5V3.5a2 2 0 014 0V5"/></svg>
            Read Case Study
          </button>
        </div>
      </div>
    @empty
      <p style="color:rgba(255,255,255,0.6); text-align:center; grid-column:1/-1;">
        No case studies available at the moment.
      </p>
    @endforelse

  </div>

  <p style="font-size:10px;color:var(--gray-1);margin-top:16px;line-height:1.65;">All case studies require free registration to access full reports. Client identities are published with permission or are described as "Confidential" where client privacy has been requested. All outcomes are verified against utility bill records, meter readings, or GRESB submission evidence.</p>
</section>
<section class="sec sec-dk" style="padding:48px 48px;">
  <div style="max-width:640px;margin:0 auto;text-align:center;">
    <p class="eye" style="color:rgba(255,255,255,.3);display:flex;justify-content:center;">Verification Standard</p>
    <h2 style="font-family:'Cormorant Garamond',serif;font-size:28px;font-weight:300;color:var(--white);margin-bottom:14px;line-height:1.2;">Every outcome is verified. No projections. No estimates.</h2>
    <p style="font-size:13px;color:rgba(255,255,255,.4);line-height:1.8;margin-bottom:20px;">WST only reports consumption reductions verified against utility bills, meter readings, or GRESB submission evidence. If it isn't independently verifiable, it doesn't appear in a WST case study.</p>
  </div>
</section>

<div class="cs">
  <div><div class="cs-t">Ready to add your portfolio<br><em>to the evidence base?</em></div>
  <p class="cs-s">A 90-minute portfolio visibility session maps your water data coverage and outlines the savings opportunity. No obligation.</p></div>
  <a href="/contact" class="cs-btn">Schedule Assessment</a>
</div>
@endsection 

@push('scripts')
<script>
document.querySelectorAll('.js-csf').forEach(function(btn){
  btn.addEventListener('click', function(){
    document.querySelectorAll('.js-csf').forEach(function(b){b.classList.remove('is-active');});
    btn.classList.add('is-active');
    var f = btn.dataset.filter;
    document.querySelectorAll('#cs-grid .csi-card').forEach(function(card){
      if(f === 'all'){ 
        card.style.display = ''; 
        return; 
      }
      var industry = card.dataset.industry || '';
      card.style.display = industry === f ? '' : 'none';
    });
  });
});

    $(document).on('click', '.open-modal-btn', function(e) {
        e.preventDefault();

        const caseId = $(this).data('id');
        const caseTitle = 'Access ' + $(this).data('title');

        $('#modal-case-id').val(caseId);
        $('#co-title').text(caseTitle);

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
</script>
@endpush