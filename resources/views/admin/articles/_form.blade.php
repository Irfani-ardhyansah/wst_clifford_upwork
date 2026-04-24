<div class="space-y-6">

    <!-- Type -->
    <div>
        <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
            Type
        </label>
        <select name="type"
            class="w-full px-4 py-2 rounded-lg text-sm
                bg-[var(--surface)] text-[var(--text-1)]
                border border-[var(--border)]
                focus:outline-none focus:ring-2 focus:ring-[var(--primary)]">
            <option value="article" {{ old('type', optional($article)->type ?? 'article') === 'article' ? 'selected' : '' }}>
                Article
            </option>
            <option value="white-paper" {{ old('type', optional($article)->type) === 'white-paper' ? 'selected' : '' }}>
                White Paper
            </option>
        </select>
        @error('type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <!-- Title & Slug -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
                Title <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                name="title" 
                value="{{ old('title', optional($article)->title) }}"
                required
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    placeholder-[var(--text-3)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
                placeholder="Enter article title">
            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
                Slug (optional)
            </label>
            <input type="text" 
                name="slug" 
                value="{{ old('slug', optional($article)->slug) }}"
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    placeholder-[var(--text-3)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
                placeholder="auto-generated-if-empty">
            @error('slug') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
    </div>

    <!-- Category & Excerpt -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
                Category
            </label>

            <select name="category"
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]">

                <option value="">-- Select Category --</option>

                @php
                    $categories = [
                        'technical-reference' => 'Technical Reference',
                        'financial-analysis' => 'Financial Analysis',
                        'esg-gresb-strategy' => 'ESG & GRESB strategy',
                        'efficiency-audits' => 'Efficiency Audits',
                        'smart-monitoring' => 'Smart Monitoring',
                        'case-study' => 'Case Study',
                    ];
                @endphp

                @foreach ($categories as $cat)
                    <option value="{{ $cat }}"
                        {{ old('category', optional($article)->category) == $cat ? 'selected' : '' }}>
                        {{ $cat }}
                    </option>
                @endforeach

            </select>

            @error('category')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
                Page Count
            </label>
            <input type="number" 
                name="page_count" 
                value="{{ old('page_count', optional($article)->page_count) }}"
                min="1"
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    placeholder-[var(--text-3)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
                placeholder="Number of pages">
            @error('page_count') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
    </div>

    <!-- Excerpt -->
    <div>
        <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
            Excerpt
        </label>
        <textarea name="excerpt" 
            rows="3"
            class="w-full px-4 py-2 rounded-lg text-sm
                bg-[var(--surface)] text-[var(--text-1)]
                border border-[var(--border)]
                placeholder-[var(--text-3)]
                focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
            placeholder="Short summary of the article...">{{ old('excerpt', optional($article)->excerpt) }}</textarea>
        @error('excerpt') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <!-- Target Audience -->
    <div>
        <label class="block text-sm font-medium mb-2 text-[var(--text-2)]">
            Target Audience
        </label>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
            @php
                $audiences = ['Executives', 'Managers', 'Analysts', 'Developers', 'Students', 'Investors'];
                $selected = old('target_audience', optional($article)->target_audience ?? []);
            @endphp
            @foreach($audiences as $audience)
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" 
                        name="target_audience[]" 
                        value="{{ $audience }}"
                        {{ in_array($audience, (array)$selected) ? 'checked' : '' }}
                        class="rounded border-[var(--border)] text-[var(--primary)] focus:ring-[var(--primary)]">
                    <span class="text-sm text-[var(--text-2)]">{{ $audience }}</span>
                </label>
            @endforeach
        </div>
        @error('target_audience') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>


    <!-- Source Type -->
    <div>
        <label class="block text-sm font-medium mb-2 text-[var(--text-2)]">
            Source
        </label>

        <div class="flex items-center gap-6 bg-[var(--surface-2)] p-4 rounded-xl border border-[var(--border)]">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="source_type" value="editor"
                    {{ old('source_type', optional($article)->source_type ?? 'editor') === 'editor' ? 'checked' : '' }}
                    class="text-[var(--primary)] focus:ring-[var(--primary)]">
                <span class="text-sm font-medium text-[var(--text-1)]">Editor</span>
            </label>

            <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="source_type" value="pdf"
                    {{ old('source_type', optional($article)->source_type) === 'pdf' ? 'checked' : '' }}
                    class="text-[var(--primary)] focus:ring-[var(--primary)]">
                <span class="text-sm font-medium text-[var(--text-1)]">PDF Upload</span>
            </label>
        </div>
    </div>


    <!-- Editor -->
    <div id="editor-wrap" class="{{ old('source_type', optional($article)->source_type ?? 'editor') === 'editor' ? '' : 'hidden' }}">
        <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
            Content
        </label>
        <textarea id="content" 
            name="content" 
            rows="10"
            class="w-full px-4 py-2 rounded-lg text-sm
                !bg-[var(--surface)] text-[var(--text-1)]
                border border-[var(--border)]
                placeholder-[var(--text-3)]
                focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
            placeholder="Enter article content...">{{ old('content', optional($article)->content) }}</textarea>
        @error('content') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>


    <!-- PDF Upload -->
    <div id="pdf-wrap" class="{{ old('source_type', optional($article)->source_type) === 'pdf' ? '' : 'hidden' }}">
        <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
            PDF File
        </label>

        @if(optional($article)->pdf_path)
            <div class="mb-3 p-3 bg-[var(--surface-2)] border border-[var(--border)] rounded-lg flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-[var(--text-3)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span class="text-sm text-[var(--text-2)] truncate max-w-xs">{{ basename(optional($article)->pdf_path) }}</span>
                </div>
                <a href="{{ asset('storage/' . $article->pdf_path) }}" 
                   target="_blank"
                   class="text-xs text-[var(--primary)] hover:text-[var(--primary-dim)] font-medium">View Current</a>
            </div>
        @endif

        <input type="file" 
            name="pdf" 
            accept="application/pdf"
            class="block w-full text-sm text-[var(--text-2)]
                border border-[var(--border)] rounded-lg
                file:mr-4 file:py-2 file:px-4
                file:rounded-lg file:border-0
                file:text-sm file:font-semibold
                file:bg-[var(--surface-2)]
                file:text-[var(--text-1)]
                hover:file:brightness-110
                cursor-pointer">
        <p class="text-xs text-[var(--text-3)] mt-1">Supported: PDF files only.</p>
        @error('pdf') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>


    <!-- Thumbnail -->
    <div class="bg-[var(--surface-2)] border border-[var(--border)] p-4 rounded-lg">
        <label class="block text-sm font-medium text-[var(--text-2)] mb-2">
            Thumbnail (image)
        </label>

        <div class="flex items-center gap-6">
            @if(optional($article)->thumbnail)
                <img src="{{ asset('storage/' . $article->thumbnail) }}" 
                     class="h-16 w-16 object-cover rounded-lg border">
            @endif

            <input type="file" 
                name="thumbnail" 
                accept="image/*"
                class="block w-full text-sm text-[var(--text-2)]
                    border border-[var(--border)] rounded-lg
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-[var(--surface-2)]
                    file:text-[var(--text-1)]
                    hover:file:brightness-110
                    cursor-pointer">
        </div>
        @error('thumbnail') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>


    <!-- Status & Published -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
                Status
            </label>
            <select name="status"
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]">
                <option value="draft" {{ old('status', optional($article)->status ?? 'draft') === 'draft' ? 'selected' : '' }}>
                    Draft
                </option>
                <option value="published" {{ old('status', optional($article)->status) === 'published' ? 'selected' : '' }}>
                    Published
                </option>
            </select>
            @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
                Published At
            </label>
            <input type="datetime-local"
                name="published_at"
                value="{{ old('published_at', optional($article)->published_at ? optional($article)->published_at->format('Y-m-d\TH:i') : '') }}"
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]">
            @error('published_at') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

    </div>


    <!-- Submit -->
    <div class="pt-4 flex justify-end">
        <button type="submit"
            class="inline-flex items-center justify-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl font-medium transition-all duration-200 shadow-md shadow-teal-600/20 hover:shadow-lg hover:shadow-teal-600/30 hover:-translate-y-0.5">
            {{ isset($article) ? 'Update' : 'Add' }} 
            Article
        </button>
    </div>

</div>

@push('scripts')
<script>
$(function () {
    const $editorWrap = $('#editor-wrap');
    const $pdfWrap = $('#pdf-wrap');

    function toggleSource() {
        const sourceType = $('input[name="source_type"]:checked').val();

        if (sourceType === 'editor') {
            $editorWrap.removeClass('hidden');
            $pdfWrap.addClass('hidden');
        } else if (sourceType === 'pdf') {
            $editorWrap.addClass('hidden');
            $pdfWrap.removeClass('hidden');
        }
    }

    $('input[name="source_type"]').on('change', function () {
        toggleSource();
    });

    toggleSource(); // initial toggle
});
</script>
@endpush