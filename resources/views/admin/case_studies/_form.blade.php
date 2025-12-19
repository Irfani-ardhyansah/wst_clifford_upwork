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

    <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
        <label class="block text-sm font-medium text-gray-700 mb-2">Cover Image</label>
        
        <div class="flex items-center gap-6">
            @if(isset($caseStudy) && $caseStudy->image_path)
                <div class="relative group flex-shrink-0">
                    <img src="{{ Storage::url($caseStudy->image_path) }}" 
                        alt="Current Image" 
                        class="h-20 w-24 object-cover rounded-lg border border-gray-300 shadow-sm">
                    <div class="absolute inset-0 bg-black/50 rounded-lg flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                        <span class="text-white text-xs font-medium">Current</span>
                    </div>
                </div>
            @endif

            <div class="flex-1">
                <input type="file" name="image" accept="image/*"
                    class="block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-white file:text-teal-700
                    file:ring-1 file:ring-gray-200
                    hover:file:bg-teal-50 transition cursor-pointer">
                <p class="text-xs text-gray-500 mt-2">
                    Supported formats: JPEG, PNG, WEBP. Max size: 2MB.
                </p>
                @error('image') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

<div class="flex items-center gap-6 pt-2">
    <label class="flex items-center space-x-2 cursor-pointer group">
        <input type="checkbox" name="is_active" value="1"
               {{ old('is_active', $caseStudy->is_active ?? true) ? 'checked' : '' }}
               class="rounded border-gray-300 text-teal-600 shadow-sm focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50 
                      checked:bg-teal-600 checked:border-transparent transition cursor-pointer">
        <span class="text-sm font-medium text-gray-700 group-hover:text-teal-700 transition">Active</span>
    </label>

    <label class="flex items-center space-x-2 cursor-pointer group">
        <input type="checkbox" name="is_featured" value="1"
               {{ old('is_featured', $caseStudy->is_featured ?? false) ? 'checked' : '' }}
               class="rounded border-gray-300 text-teal-600 shadow-sm focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50 
                      checked:bg-teal-600 checked:border-transparent transition cursor-pointer">
        <span class="text-sm font-medium text-gray-700 group-hover:text-teal-700 transition">Featured</span>
    </label>
</div>

    <div class="pt-4">
        <button type="submit" class="bg-teal-600 text-white px-6 py-2.5 rounded-lg hover:bg-teal-700 transition font-medium shadow-lg shadow-teal-900/10">
            {{ isset($caseStudy) ? 'Update Case Study' : 'Create Case Study' }}
        </button>
    </div>
</div>