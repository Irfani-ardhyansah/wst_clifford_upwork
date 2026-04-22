@extends('layouts.app')

@section('title', $case_study->title . ' - Water Solutions Technology')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/case_study.css') }}">
@endpush

@section('content')

<div class="cs-page-hero" style="padding-bottom:52px;">
  <div class="cs-page-hero-inner">
    <div class="cs-label">Case Study &middot; {{ $case_study->category }}</div>
    <h1 class="cs-page-h1">{{ $case_study->title }}</h1>
    <p class="cs-page-sub">{{ $case_study->description }}</p>
  </div>
</div>

@if($case_study->image_path)
<div style="width:100%; height:400px; object-fit:cover; background:var(--border-l);">
    <img src="{{ asset('storage/' . $case_study->image_path) }}"
         alt="{{ $case_study->title }}"
         style="width:100%; height:100%; object-fit:cover;">
</div>
@endif

<section class="sec sec-w" style="padding:48px;">
  <div style="max-width:800px; margin:0 auto;">
    <div style="display:grid; gap:32px;">
      
      @if($case_study->html_content)
        <div class="case-study-content">
          {!! $case_study->html_content !!}
        </div>
      @elseif($case_study->video_path)
        <div style="position:relative; width:100%; padding-bottom:56.25%; height:0; overflow:hidden; border-radius:8px;">
          <iframe src="{{ $case_study->video_path }}" 
                  style="position:absolute; top:0; left:0; width:100%; height:100%; border:none;" 
                  allowfullscreen 
                  allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture">
          </iframe>
        </div>
      @endif

      <div>
        <p style="font-size:12px; color:var(--gray-1); font-weight:600; text-transform:uppercase; letter-spacing:.12em; margin-bottom:8px;">Details</p>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px;">
          <div>
            <p style="font-size:11px; color:var(--gray-1); margin-bottom:4px;">Category</p>
            <p style="font-size:14px; color:var(--black);">{{ $case_study->category }}</p>
          </div>
          @if($case_study->tags)
          <div>
            <p style="font-size:11px; color:var(--gray-1); margin-bottom:4px;">Tags</p>
            <p style="font-size:14px; color:var(--black);">{{ $case_study->tags }}</p>
          </div>
          @endif
        </div>
      </div>

    </div>
  </div>
</section>

<div class="cs">
  <div><div class="cs-t">Ready to add your portfolio<br><em>to the evidence base?</em></div>
  <p class="cs-s">A 90-minute portfolio visibility session maps your water data coverage and outlines the savings opportunity. No obligation.</p></div>
  <a href="{{ route('contact') }}" class="cs-btn">Schedule Assessment</a>
</div>

@endsection
