<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">Asset Title <span class="text-red-500">*</span></label>
            <input type="text" name="title" id="titleInput"
                value="{{ old('title', $asset->title ?? '') }}"
                required
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    placeholder-[var(--text-3)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
                placeholder="e.g. Cooling Tower Optimization Guide">
            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">Category <span class="text-red-500">*</span></label>
            <select name="category" id="categorySelect" class="w-full px-4 py-2 rounded-lg text-sm
                bg-[var(--surface)] text-[var(--text-1)]
                border border-[var(--border)]
                focus:outline-none focus:ring-2 focus:ring-[var(--primary)]">
            @foreach($categories as $row)
                <option value="{{ $row['value'] }}"
                    {{ old('category', $asset->category ?? '') == $row['value'] ? 'selected' : '' }}>
                    {{ $row['text'] }}
                </option>
            @endforeach
            </select>
            @error('category') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div id="field-industry">
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">Industry</label>
            <select id="industry_id" name="industry_id" class="w-full px-4 py-2 rounded-lg text-sm
                bg-[var(--surface)] text-[var(--text-1)]
                border border-[var(--border)]
                focus:outline-none focus:ring-2 focus:ring-[var(--primary)]">
                <option value="">All Industries</option>
                @foreach($industries as $industry)
                    <option value="{{ $industry->id }}" 
                        {{ old('industry_id', $asset->industry_id ?? '') == $industry->id ? 'selected' : '' }}>
                        {{ $industry->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">Tags (comma separated)</label>
            <input type="text" name="tags"
                value="{{ old('tags', $asset->tags ?? '') }}"
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    placeholder-[var(--text-3)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
                placeholder="water, GRESB, savings">
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">Description</label>
        <textarea name="description" rows="2"
                class="w-full px-4 py-2 rounded-lg text-sm
                bg-[var(--surface)] text-[var(--text-1)]
                border border-[var(--border)]
                placeholder-[var(--text-3)]
                focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
                placeholder="Brief description of this resource...">{{ old('description', $asset->description ?? '') }}</textarea>
    </div>

    <div id="field-video" class="hidden">
        <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">Video File <span class="text-red-500">* (Max 50MB)</span></label>
        
        @if(isset($asset) && $asset->video_path)
            <div class="mb-3 p-3 bg-gray-50 border rounded-lg flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    <span class="text-sm text-gray-600 truncate max-w-xs">{{ basename($asset->video_path) }}</span>
                </div>
                <a href="{{ Storage::url($asset->video_path) }}" target="_blank" class="text-xs text-teal-600 hover:text-teal-800 font-medium">View Current</a>
            </div>
        @endif

        <input type="file" name="video" accept="video/mp4,video/quicktime,video/x-m4v"
            class="block w-full text-sm text-[var(--text-2)]
                border border-[var(--border)] rounded-lg
                file:mr-4 file:py-2 file:px-4
                file:rounded-lg file:border-0
                file:text-sm file:font-semibold
                file:bg-[var(--surface-2)]
                file:text-[var(--text-1)]
                hover:file:brightness-110
                cursor-pointer">
        <p class="text-xs text-gray-500 mt-1">Supported: MP4, MOV. Ensure file size is within server limits.</p>
        @error('video') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">HTML Content <span class="text-red-500">*</span></label>
        <textarea name="html_content" rows="10"
                class="w-full px-4 py-2 rounded-lg text-sm
                bg-[var(--surface)] text-[var(--text-1)]
                border border-[var(--border)]
                placeholder-[var(--text-3)]
                focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
                placeholder="Paste your HTML content here...">{{ old('html_content', $asset->html_content ?? '') }}</textarea>
        <p class="text-xs text-gray-500 mt-1">This content will be rendered as raw HTML.</p>
        @error('html_content') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div class="bg-[var(--surface-2)] border-[var(--border)]">
        <label class="block text-sm font-medium text-[var(--text-2)] mb-2">Cover Image</label>
        <div class="flex items-center gap-6">
            @if(isset($asset) && $asset->image_path)
                <img src="{{ Storage::url($asset->image_path) }}" class="h-16 w-16 object-cover rounded-lg border">
            @endif
            <input type="file" name="image" accept="image/*" class="block w-full text-sm text-[var(--text-2)] border border-[var(--border)] rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[var(--surface-2)] file:text-[var(--text-1)] hover:file:brightness-110 cursor-pointer">
        </div>
    </div>

    <div class="flex items-center gap-6 pt-2">
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $asset->is_active ?? true) ? 'checked' : '' }} class="rounded text-[var(--primary)] focus:ring-[var(--primary)]">
            <span class="text-sm font-medium text-[var(--text-2)]">Active</span>
        </label>
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $asset->is_featured ?? false) ? 'checked' : '' }} class="rounded text-[var(--primary)] focus:ring-[var(--primary)]">
            <span class="text-sm font-medium text-[var(--text-2)]">Featured</span>
        </label>
    </div>

    <div class="pt-4 flex justify-end">
        <button type="submit" class="inline-flex items-center justify-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl font-medium transition-all duration-200 shadow-md shadow-teal-600/20 hover:shadow-lg hover:shadow-teal-600/30 hover:-translate-y-0.5">
            + 
            {{ isset($asset) ? 'Update' : 'Add' }} 
            Asset
        </button>
    </div>
</div>

@push('scripts')
<script>
$(function () {
    const $category = $('#categorySelect');
    const $video    = $('#field-video');
    const $industry = $('#field-industry');

    const isEdit = {{ isset($asset) ? 'true' : 'false' }};

    function toggleFields(resetValue = true) {
        const category = $category.val();

        $video.addClass('hidden');
        $industry.addClass('hidden');

        if (!isEdit && resetValue) {
            $('#industry_id').val('');
        }

        if (category === 'webinar') {
            $video.removeClass('hidden');
        }

        if (category === 'case-study') {
            $industry.removeClass('hidden');
        }
    }

    $category.on('change', function () {
        toggleFields(true);
    });

    toggleFields(false);
});
</script>
@endpush

