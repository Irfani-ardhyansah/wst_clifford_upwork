<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium mb-1 text-gray-700">Asset Title <span class="text-red-500">*</span></label>
            <input type="text" name="title" id="titleInput"
                value="{{ old('title', $asset->title ?? '') }}"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                placeholder="e.g. Cooling Tower Optimization Guide">
            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1 text-gray-700">Category <span class="text-red-500">*</span></label>
            <select name="category" id="categorySelect" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none">
                @foreach($categories as $row)
                    <option value="{{ $row['value'] }}" {{ old('category') == $row['value'] ? 'selected' : '' }}>
                        {{ $row['text'] }}
                    </option>
                @endforeach
            </select>
            @error('category') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium mb-1 text-gray-700">Industry</label>
            <select name="industry_id" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none">
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
            <label class="block text-sm font-medium mb-1 text-gray-700">Tags (comma separated)</label>
            <input type="text" name="tags"
                value="{{ old('tags', $asset->tags ?? '') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                placeholder="water, GRESB, savings">
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1 text-gray-700">Description</label>
        <textarea name="description" rows="2"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                placeholder="Brief description of this resource...">{{ old('description', $asset->description ?? '') }}</textarea>
    </div>

    <div id="field-video" class="hidden">
        <label class="block text-sm font-medium mb-1 text-gray-700">Video File <span class="text-red-500">* (Max 50MB)</span></label>
        
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
            class="block w-full text-sm text-gray-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-lg file:border-0
                file:text-sm file:font-semibold
                file:bg-teal-50 file:text-teal-700
                hover:file:bg-teal-100 transition cursor-pointer border border-gray-300 rounded-lg">
        <p class="text-xs text-gray-500 mt-1">Supported: MP4, MOV. Ensure file size is within server limits.</p>
        @error('video') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1 text-gray-700">HTML Content <span class="text-red-500">*</span></label>
        <textarea name="html_content" rows="10"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none font-mono text-sm bg-gray-50"
                placeholder="Paste your HTML content here...">{{ old('html_content', $asset->html_content ?? '') }}</textarea>
        <p class="text-xs text-gray-500 mt-1">This content will be rendered as raw HTML.</p>
        @error('html_content') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
        <label class="block text-sm font-medium text-gray-700 mb-2">Cover Image</label>
        <div class="flex items-center gap-6">
            @if(isset($asset) && $asset->image_path)
                <img src="{{ Storage::url($asset->image_path) }}" class="h-16 w-16 object-cover rounded-lg border">
            @endif
            <input type="file" name="image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-white file:text-teal-700 hover:file:bg-teal-50">
        </div>
    </div>

    <div class="flex items-center gap-6 pt-2">
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $asset->is_active ?? true) ? 'checked' : '' }} class="rounded text-teal-600 focus:ring-teal-500">
            <span class="text-sm font-medium text-gray-700">Active</span>
        </label>
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $asset->is_featured ?? false) ? 'checked' : '' }} class="rounded text-teal-600 focus:ring-teal-500">
            <span class="text-sm font-medium text-gray-700">Featured</span>
        </label>
        
        <div class="ml-auto flex items-center gap-2">
            <label class="text-sm font-medium text-gray-700">Sort Order:</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $asset->sort_order ?? 0) }}" class="w-20 border border-gray-300 rounded px-2 py-1 text-sm">
        </div>
    </div>

    <div class="pt-4 flex justify-end">
        <button type="submit" class="bg-black text-white px-6 py-2.5 rounded-lg hover:bg-gray-800 transition font-medium">
            + 
            {{ isset($asset) ? 'Update' : 'Add' }} 
            Asset
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('categorySelect');
        const impactField = document.getElementById('field-impact');
        const videoField = document.getElementById('field-video');

        function toggleFields() {
            const category = categorySelect.value;
            
            // Reset
            impactField.classList.add('hidden');
            videoField.classList.add('hidden');

            if (category === 'Case Study') {
                impactField.classList.remove('hidden');
            } else if (category === 'Webinar') {
                videoField.classList.remove('hidden');
            }
        }

        // Run on change and on load
        categorySelect.addEventListener('change', toggleFields);
        toggleFields(); // Initial run
    });
</script>