<div class="space-y-6">

    <!-- Title & Slug -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium mb-1 text-gray-700">
                Title <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                name="title" 
                value="{{ old('title', optional($article)->title) }}"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                placeholder="Enter article title">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1 text-gray-700">
                Slug (optional)
            </label>
            <input type="text" 
                name="slug" 
                value="{{ old('slug', optional($article)->slug) }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                placeholder="auto-generated-if-empty">
        </div>
    </div>


    <!-- Source Type -->
    <div>
        <label class="block text-sm font-medium mb-2 text-gray-700">
            Source
        </label>

        <div class="flex items-center gap-6 bg-gray-50 p-4 rounded-xl border border-gray-200">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="source_type" value="editor"
                    {{ old('source_type', optional($article)->source_type ?? 'editor') === 'editor' ? 'checked' : '' }}
                    class="text-teal-600 focus:ring-teal-500">
                <span class="text-sm font-medium text-gray-700">Editor</span>
            </label>

            <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="source_type" value="pdf"
                    {{ old('source_type', optional($article)->source_type) === 'pdf' ? 'checked' : '' }}
                    class="text-teal-600 focus:ring-teal-500">
                <span class="text-sm font-medium text-gray-700">PDF Upload</span>
            </label>
        </div>
    </div>


    <!-- Editor -->
    <div id="editor-wrap" class="{{ old('source_type', optional($article)->source_type ?? 'editor') === 'editor' ? '' : 'hidden' }}">
        <label class="block text-sm font-medium mb-1 text-gray-700">
            Content
        </label>
        <textarea id="content" 
            name="content" 
            rows="10"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none bg-gray-50 text-sm">{{ old('content', optional($article)->content) }}</textarea>
    </div>


    <!-- PDF Upload -->
    <div id="pdf-wrap" class="{{ old('source_type', optional($article)->source_type) === 'pdf' ? '' : 'hidden' }}">
        <label class="block text-sm font-medium mb-1 text-gray-700">
            PDF File
        </label>

        @if(optional($article)->pdf_path)
            <div class="mb-3 p-3 bg-gray-50 border rounded-lg flex items-center justify-between">
                <span class="text-sm text-gray-600 truncate">
                    {{ basename(optional($article)->pdf_path) }}
                </span>
                <a href="{{ asset('storage/' . $article->pdf_path) }}" 
                   target="_blank"
                   class="text-xs text-teal-600 hover:text-teal-800 font-medium">
                   View Current
                </a>
            </div>
        @endif

        <input type="file" 
            name="pdf" 
            accept="application/pdf"
            class="block w-full text-sm text-gray-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-lg file:border-0
                file:text-sm file:font-semibold
                file:bg-teal-50 file:text-teal-700
                hover:file:bg-teal-100 transition cursor-pointer border border-gray-300 rounded-lg">
    </div>


    <!-- Thumbnail -->
    <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
        <label class="block text-sm font-medium text-gray-700 mb-2">
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
                class="block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-white file:text-teal-700
                    hover:file:bg-teal-50">
        </div>
    </div>


    <!-- Status & Published -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            <label class="block text-sm font-medium mb-1 text-gray-700">
                Status
            </label>
            <select name="status"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none">
                <option value="draft" {{ old('status', optional($article)->status ?? 'draft') === 'draft' ? 'selected' : '' }}>
                    Draft
                </option>
                <option value="published" {{ old('status', optional($article)->status) === 'published' ? 'selected' : '' }}>
                    Published
                </option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1 text-gray-700">
                Published At
            </label>
            <input type="datetime-local"
                name="published_at"
                value="{{ old('published_at', optional($article)->published_at ? optional($article)->published_at->format('Y-m-d\TH:i') : '') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none">
        </div>

    </div>


    <!-- Submit -->
    <div class="pt-4 flex justify-end">
        <button type="submit"
            class="bg-black text-white px-6 py-2.5 rounded-lg hover:bg-gray-800 transition font-medium">
            Save Article
        </button>
    </div>

</div>