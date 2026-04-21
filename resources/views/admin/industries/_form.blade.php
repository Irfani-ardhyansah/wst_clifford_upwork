<div class="space-y-6">

    {{-- Row 1: Title + Sort Order --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2 space-y-1">
            <label class="block text-sm font-medium text-[var(--text-2)]">
                Industry Name <span class="text-red-500">*</span>
            </label>
            <input type="text" name="title"
                   value="{{ old('title', $industry->title ?? '') }}"
                   required
                   class="w-full px-4 py-2 rounded-lg text-sm
                       bg-[var(--surface)] text-[var(--text-1)]
                       border border-[var(--border)]
                       placeholder-[var(--text-3)]
                       focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
                   placeholder="e.g. Healthcare, Finance">
            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="space-y-1">
            <label class="block text-sm font-medium text-[var(--text-2)]">Sort Order</label>
            <input type="number" name="sort_order"
                   value="{{ old('sort_order', $industry->sort_order ?? 0) }}"
                   min="0"
                   class="w-full px-4 py-2 rounded-lg text-sm
                       bg-[var(--surface)] text-[var(--text-1)]
                       border border-[var(--border)]
                       placeholder-[var(--text-3)]
                       focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
                   placeholder="0">
            <p class="text-xs text-[var(--text-3)]">Lower numbers appear first.</p>
        </div>
    </div>

    {{-- Row 2: Parent Industry --}}
    <div class="space-y-1">
        <label class="block text-sm font-medium text-[var(--text-2)]">Parent Industry</label>
        <select name="parent_id"
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]">
            <option value="">— None (Top-level industry) —</option>
            @foreach($parentOptions as $parent)
                {{-- Cegah industry memilih dirinya sendiri sebagai parent --}}
                @if(!isset($industry) || $industry->id !== $parent->id)
                    <option value="{{ $parent->id }}"
                        {{ old('parent_id', $industry->parent_id ?? '') == $parent->id ? 'selected' : '' }}>
                        {{ $parent->title }}
                    </option>
                @endif
            @endforeach
        </select>
        <p class="text-xs text-[var(--text-3)]">Leave empty if this is a top-level industry.</p>
        @error('parent_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    {{-- Row 3: Description --}}
    <div class="space-y-1">
        <label class="block text-sm font-medium text-[var(--text-2)]">
            Description <span class="text-red-500">*</span>
        </label>
        <textarea name="description" rows="4"
                  required
                  class="w-full px-4 py-2 rounded-lg text-sm
                      bg-[var(--surface)] text-[var(--text-1)]
                      border border-[var(--border)]
                      placeholder-[var(--text-3)]
                      focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
                  placeholder="Brief description about this industry sector...">{{ old('description', $industry->description ?? '') }}</textarea>
        @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    {{-- Row 4: Image Upload --}}
    <div class="bg-[var(--surface-2)] border border-[var(--border)] p-4 rounded-lg">
        <label class="block text-sm font-medium text-[var(--text-2)] mb-2">Icon / Image</label>

        <div class="flex items-center gap-6">
            @if(isset($industry) && $industry->image_path)
                <div class="relative group shrink-0">
                    <img src="{{ Storage::url($industry->image_path) }}"
                         class="h-20 w-20 object-cover rounded-lg border border-[var(--border)] shadow-sm">
                    <div class="absolute inset-0 bg-black/50 rounded-lg flex items-center justify-center
                                opacity-0 group-hover:opacity-100 transition">
                        <span class="text-white text-xs">Current</span>
                    </div>
                </div>
            @endif

            <input type="file" name="image" accept="image/*"
                class="block w-full text-sm text-[var(--text-2)]
                    border border-[var(--border)] rounded-lg
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-lg file:border-0
                    file:text-sm file:font-semibold
                    file:bg-[var(--surface-2)] file:text-[var(--text-1)]
                    hover:file:brightness-110 cursor-pointer">
        </div>
        <p class="text-xs text-[var(--text-3)] mt-2">Recommended size: 500×500px. Max: 2MB.</p>
        @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    {{-- Row 5: Status & Featured --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t border-[var(--border)] pt-5">

        {{-- is_active: 3 state --}}
        <div class="space-y-1">
            <label class="block text-sm font-medium text-[var(--text-2)]">Status</label>
            <select name="is_active"
                    class="w-full px-4 py-2 rounded-lg text-sm
                        bg-[var(--surface)] text-[var(--text-1)]
                        border border-[var(--border)]
                        focus:outline-none focus:ring-2 focus:ring-[var(--primary)]">
                <option value="0" {{ old('is_active', $industry->is_active ?? 0) == 0 ? 'selected' : '' }}>
                    Inactive
                </option>
                <option value="1" {{ old('is_active', $industry->is_active ?? 0) == 1 ? 'selected' : '' }}>
                    Active
                </option>
                <option value="2" {{ old('is_active', $industry->is_active ?? 0) == 2 ? 'selected' : '' }}>
                    Coming Soon
                </option>
            </select>
            @error('is_active') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        {{-- is_featured toggle --}}
        <div class="flex items-center gap-4 pt-5">
            <label class="flex items-center space-x-3 cursor-pointer group">
                <div class="relative">
                    <input type="hidden" name="is_featured" value="0">
                    <input type="checkbox" name="is_featured" value="1" class="peer sr-only"
                           {{ old('is_featured', $industry->is_featured ?? false) ? 'checked' : '' }}>
                    <div class="block bg-[var(--border)] w-10 h-6 rounded-full peer-checked:bg-teal-600 transition"></div>
                    <div class="absolute left-1 top-1 bg-[var(--surface)] w-4 h-4 rounded-full transition peer-checked:translate-x-4"></div>
                </div>
                <div>
                    <span class="text-sm font-medium text-[var(--text-2)] group-hover:text-teal-700 transition">
                        Featured
                    </span>
                    <p class="text-xs text-[var(--text-3)]">Highlight this industry on the homepage.</p>
                </div>
            </label>
        </div>
    </div>

    {{-- Actions --}}
    <div class="pt-2 flex items-center gap-3">
        <button type="submit"
                class="inline-flex items-center justify-center gap-2
                       bg-teal-600 hover:bg-teal-700 text-white
                       px-5 py-2.5 rounded-xl font-medium
                       transition-all duration-200
                       shadow-md shadow-teal-600/20
                       hover:shadow-lg hover:shadow-teal-600/30 hover:-translate-y-0.5">
            {{ isset($industry) ? 'Update Industry' : 'Create Industry' }}
        </button>
        <a href="{{ route('admin.industries.index') }}"
           class="text-[var(--text-3)] px-4 py-2 hover:text-[var(--text-1)] transition">
            Cancel
        </a>
    </div>

</div>