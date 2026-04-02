@extends('layouts.app')

@section('title', 'Water Solutions Technology')

@section('content')

<!-- ─── TOOLS HEADER ─── -->
<section class="industries-page-hero" style="background:#0d0d0d; padding: 80px 40px 60px; text-align:center;">
  <div class="section-eyebrow">Resources</div>
  <div class="text-center">
    <h1 class="hero-h1">Article</h1>
    <p class="hero-body" style="text-align:center;">Editorial content from the WST advisory team.</p>
  </div>
</section>

<!-- ─── TOOLS GRID ─── -->
<section style="background:#111; padding: 40px;">
  <div style="max-width:1280px; margin:0 auto;">

    <!-- Tools Cards Grid -->
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(320px,1fr)); gap:24px;">
      @forelse ($articles as $item)
        <div class="tile"
          style="background:#1a1a1a; overflow:hidden; display:flex; flex-direction:column;
                 border:1px solid rgba(255,255,255,0.07); transition:transform 0.3s, box-shadow 0.3s;"
          onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 12px 32px rgba(0,0,0,0.4)'"
          onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">

          @if($item->thumbnail)
            <img src="{{ asset('storage/' . $item->thumbnail) }}"
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

          <button class="open-article"
             data-id="{{ $item->id }}"
             style="display:block; text-align:center; padding:14px;
                    border-top:1px solid rgba(255,255,255,0.07);
                    color:rgba(255,255,255,0.6); font-size:13px; font-weight:300;
                    letter-spacing:0.05em; text-decoration:none; transition:background 0.2s, color 0.2s; cursor:pointer; background:none; border:none; width:100%;"
             onmouseover="this.style.background='rgba(255,255,255,0.06)';this.style.color='#fff'"
             onmouseout="this.style.background='transparent';this.style.color='rgba(255,255,255,0.6)'">
            Read Article →
          </button>
        </div>
      @empty
        <p style="color:rgba(255,255,255,0.55); font-size:14px; text-align:center; grid-column:1/-1;">
          No tools available at the moment.
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
      <h2 class="contact-h">Want new tools<br>delivered to your inbox?</h2>
      <p class="contact-sub">
        Subscribe to our newsletter and get the latest water efficiency tools and calculators.
      </p>
    </div>

    <!-- Subscribe Form -->
    <div>
      @include('layouts.partials.subscribe')
    </div>
  </div>
</section>

<div id="article-modal" style="display:none; position:fixed; inset:0; z-index:1000;">
    
    <!-- Backdrop -->
    <div style="position:fixed; inset:0; background:rgba(0,0,0,0.75); backdrop-filter:blur(4px);"></div>

    <!-- Modal Container -->
    <div style="position:fixed; inset:0; display:flex; flex-direction:column; background:#0d0d0d;">

        <!-- Close Button -->
        <button id="close-article-modal"
            style="position:fixed; top:24px; right:24px; z-index:100;
                   background:#1a1a1a; border:1px solid rgba(255,255,255,0.1);
                   color:rgba(255,255,255,0.6); padding:10px;
                   cursor:pointer; transition:all 0.2s;"
            onmouseover="this.style.background='rgba(255,255,255,0.08)';this.style.color='#fff'"
            onmouseout="this.style.background='#1a1a1a';this.style.color='rgba(255,255,255,0.6)'">
            <svg style="width:20px;height:20px;" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Content -->
        <div id="article-modal-content"
            style="flex:1; overflow-y:auto; width:100%; height:100%;
                   background:#0d0d0d; color:rgba(255,255,255,0.75);
                   padding:60px 40px;
                   font-size:15px; font-weight:300; line-height:1.8;">
        </div>

    </div>
</div>

@endsection
  
@push('scripts')
<script>
$(document).ready(function () {
    $(document).on('click', '.open-article', function () {
        const id = $(this).data('id');

        $.ajax({
            url: `{{ url('/member-dashboard/articles') }}/${id}/content`,
            type: 'GET',
            success: function (response) {
                $('#article-modal-content').html(response);
                $('#article-modal').show();
            },
            error: function () {
                alert('Failed to load article.');
            }
        });
    });

    $('#close-article-modal').on('click', function () {
        $('#article-modal').hide();
        $('#article-modal-content').html('');
    });

    $('#article-modal').on('click', function (e) {
        if (e.target === this) {
            $(this).hide();
            $('#article-modal-content').html('');
        }
    });

    $('input[name="search"]').on('keypress', function (e) {
        if (e.which === 13) {
            e.preventDefault();
            $(this).closest('form').submit();
        }
    });
});
</script>
@endpush