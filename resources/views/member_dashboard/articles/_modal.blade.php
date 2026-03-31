<div>
    <h2 class="text-2xl font-bold mb-2 text-[var(--text-2)]">{{ $article->title }}</h2>
    @if($article->thumbnail)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="thumb" class="w-full rounded" />
        </div>
    @endif

    <div class="prose max-w-none text-[var(--text-2)]">
        @if($article->source_type === 'pdf' && $article->pdf_path)
            <div class="flex-1">
                <iframe 
                    src="{{ asset('storage/' . $article->pdf_path) }}" 
                    class="w-full h-full rounded"
                ></iframe>
            </div>
        @else
            {!! $article->content !!}
        @endif
    </div>
</div>
