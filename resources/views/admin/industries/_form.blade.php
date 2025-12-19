<div class="space-y-6">
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2 space-y-1">
            <label class="block text-sm font-medium text-gray-700">Industry Name <span class="text-red-500">*</span></label>
            <input type="text" name="title"
                   value="{{ old('title', $industry->title ?? '') }}"
                   required
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition"
                   placeholder="e.g. Healthcare, Finance">
            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Sort Order</label>
            <input type="number" name="sort_order"
                   value="{{ old('sort_order', $industry->sort_order ?? 0) }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition"
                   placeholder="0">
            <p class="text-xs text-gray-500">Lower numbers appear first.</p>
        </div>
    </div>

    <div class="space-y-1">
        <label class="block text-sm font-medium text-gray-700">Description <span class="text-red-500">*</span></label>
        <textarea name="description" rows="4"
                  required
                  class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition"
                  placeholder="Brief description about this industry sector...">{{ old('description', $industry->description ?? '') }}</textarea>
        @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
        <label class="block text-sm font-medium text-gray-700 mb-2">Icon / Image</label>
        
        <div class="flex items-center gap-6">
            @if(isset($industry) && $industry->image_path)
                <div class="relative group">
                    <img src="{{ Storage::url($industry->image_path) }}" class="h-20 w-20 object-cover rounded-lg border border-gray-300 shadow-sm">
                    <div class="absolute inset-0 bg-black/50 rounded-lg flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                        <span class="text-white text-xs">Current</span>
                    </div>
                </div>
            @endif

            <input type="file" name="image" accept="image/*"
                class="block w-full text-sm text-gray-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-teal-50 file:text-teal-700
                hover:file:bg-teal-100 transition cursor-pointer">
        </div>
        <p class="text-xs text-gray-500 mt-2">Recommended size: 500x500px. Max: 2MB.</p>
        @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div class="flex items-center justify-between border-t border-gray-100 pt-4">
        <label class="flex items-center space-x-3 cursor-pointer group">
            <div class="relative">
                <input type="checkbox" name="is_active" value="1" class="peer sr-only"
                    {{ old('is_active', $industry->is_active ?? true) ? 'checked' : '' }}>
                <div class="block bg-gray-200 w-10 h-6 rounded-full peer-checked:bg-teal-600 transition"></div>
                <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition peer-checked:translate-x-4"></div>
            </div>
            <span class="text-sm font-medium text-gray-700 group-hover:text-teal-700 transition">Active Status</span>
        </label>
    </div>

    <div class="pt-2 flex items-center gap-3">
        <button type="submit" class="bg-teal-600 text-white px-6 py-2.5 rounded-lg hover:bg-teal-700 transition font-medium shadow-lg shadow-teal-900/10">
            {{ isset($industry) ? 'Update Industry' : 'Create Industry' }}
        </button>
        <a href="{{ route('admin.industries.index') }}" class="text-gray-500 px-4 py-2 hover:text-gray-700 transition">Cancel</a>
    </div>
</div>