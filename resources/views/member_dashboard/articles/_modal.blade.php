<div>
    <h2 class="text-2xl font-bold mb-2 text-[var(--text-2)]">{{ $article->title }}</h2>

    @if($article->thumbnail)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $article->thumbnail) }}" 
                 alt="thumb" 
                 style="width:100%; max-height:200px; object-fit:cover;" />
        </div>
    @endif

    <div class="prose max-w-none text-[var(--text-2)]">
        @if($article->source_type === 'pdf' && $article->pdf_path)
            <iframe 
                src="{{ asset('storage/' . $article->pdf_path) }}" 
                style="width:100%; height:85vh; border:none; display:block;">
            </iframe>
        @else
            {!! $article->content !!}
        @endif
    </div>
</div>