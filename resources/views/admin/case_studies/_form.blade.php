<div class="space-y-5">
    <div>
        <label class="block text-sm font-medium mb-1 text-gray-700">Industry <span class="text-red-500">*</span></label>
        <select name="industry_id" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            <option value="">Select Industry</option>
            @foreach($industries as $industry)
                <option value="{{ $industry->id }}" 
                    {{ old('industry_id', $caseStudy->industry_id ?? '') == $industry->id ? 'selected' : '' }}>
                    {{ $industry->title }}
                </option>
            @endforeach
        </select>
        @error('industry_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1 text-gray-700">Title <span class="text-red-500">*</span></label>
        <input type="text" name="title"
               value="{{ old('title', $caseStudy->title ?? '') }}"
               required
               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
               placeholder="e.g. Digital Transformation for Retail">
        @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1 text-gray-700">Category</label>
        <input type="text" name="category"
               value="{{ old('category', $caseStudy->category ?? '') }}"
               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
               placeholder="e.g. Full-Service, Boutique">
        @error('category') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1 text-gray-700">Impact Highlight</label>
        <textarea name="impact_highlight" rows="3"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                  placeholder="Short quote or result highlight...">{{ old('impact_highlight', $caseStudy->impact_highlight ?? '') }}</textarea>
        @error('impact_highlight') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <!-- <div class="grid grid-cols-1 md:grid-cols-2 gap-4"> -->
        <div>
            <label class="block text-sm font-medium mb-1 text-gray-700">Sort Order</label>
            <input type="number" name="sort_order"
                    value="{{ old('sort_order', $caseStudy->sort_order ?? 0) }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            @error('sort_order') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
    <!-- </div> -->

    <div>
        <label class="block text-sm font-medium mb-1 text-gray-700">Cover Image</label>
        <input type="file" name="image" accept="image/*"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white">
        @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

        @if(isset($caseStudy) && $caseStudy->image_path)
            <div class="mt-2">
                <p class="text-xs text-gray-500 mb-1">Current Image:</p>
                <img src="{{ Storage::url($caseStudy->image_path) }}" alt="Preview" class="h-20 w-auto rounded border">
            </div>
        @endif
    </div>

    <div class="flex items-center gap-6 pt-2">
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="checkbox" name="is_active" value="1"
                    {{ old('is_active', $caseStudy->is_active ?? true) ? 'checked' : '' }}
                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            <span class="text-sm font-medium text-gray-700">Active</span>
        </label>

        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="checkbox" name="is_featured" value="1"
                    {{ old('is_featured', $caseStudy->is_featured ?? false) ? 'checked' : '' }}
                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            <span class="text-sm font-medium text-gray-700">Featured</span>
        </label>
    </div>

    <div class="pt-4">
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
            {{ isset($caseStudy) ? 'Update Case Study' : 'Create Case Study' }}
        </button>
    </div>
</div>