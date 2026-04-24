@push('styles')
<style>
    /* wrapper editor */
    .ck-editor__main {
        background-color: var(--surface) !important;
    }

    /* area content */
    .ck-content {
        background-color: var(--surface) !important;
        color: var(--text-1) !important;
    }

    /* toolbar */
    .ck-toolbar {
        background-color: var(--surface-2) !important;
        border-color: var(--border) !important;
    }

    /* border editor */
    .ck.ck-editor__main > .ck-editor__editable {
        border-color: var(--border) !important;
    }

    /* placeholder */
    .ck-content.ck-placeholder::before {
        color: var(--text-3) !important;
    }
</style>
@endpush

<div class="space-y-6">

    <!-- Title & Slug -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
                Title <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                name="title" 
                value="{{ old('title', optional($event)->title) }}"
                required
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    placeholder-[var(--text-3)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
                placeholder="Event title">
            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
                Slug (optional)
            </label>
            <input type="text" 
                name="slug" 
                value="{{ old('slug', optional($event)->slug) }}"
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    placeholder-[var(--text-3)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
                placeholder="auto-generated-if-empty">
            @error('slug') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
    </div>

    <!-- Event Date & Time -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
                Event Date <span class="text-red-500">*</span>
            </label>
            <input type="date" 
                name="event_date" 
                value="{{ old('event_date', optional($event)->event_date) }}"
                required
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]">
            @error('event_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
                Event Time
            </label>
            <input type="time" 
                name="event_time" 
                value="{{ old('event_time', optional($event)->event_time) }}"
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]">
            @error('event_time') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
    </div>

    <!-- Location & Virtual -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
                Location
            </label>
            <input type="text" 
                name="location" 
                value="{{ old('location', optional($event)->location) }}"
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    placeholder-[var(--text-3)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
                placeholder="e.g. New York, USA">
            @error('location') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-end">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_virtual" value="1" 
                    {{ old('is_virtual', optional($event)->is_virtual) ? 'checked' : '' }}
                    class="rounded text-[var(--primary)] focus:ring-[var(--primary)]">
                <span class="text-sm font-medium text-[var(--text-2)]">Virtual Event</span>
            </label>
        </div>
    </div>

    <!-- Event Type & Attendance Status -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
                Event Type <span class="text-red-500">*</span>
            </label>
            <select name="event_type"
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
                required>
                <option value="">Select Type</option>
                @foreach($eventTypes as $type)
                    <option value="{{ $type['value'] }}" 
                        {{ old('event_type', optional($event)->event_type) === $type['value'] ? 'selected' : '' }}>
                        {{ $type['text'] }}
                    </option>
                @endforeach
            </select>
            @error('event_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
                Attendance Status
            </label>
            <select name="attendance_status"
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]">
                <option value="">None</option>
                @foreach($attendanceStatuses as $status)
                    <option value="{{ $status['value'] }}" 
                        {{ old('attendance_status', optional($event)->attendance_status) === $status['value'] ? 'selected' : '' }}>
                        {{ $status['text'] }}
                    </option>
                @endforeach
            </select>
            @error('attendance_status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
    </div>

    <!-- Attendance Label -->
    <div>
        <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
            Attendance Label
        </label>
        <input type="text" 
            name="attendance_label" 
            value="{{ old('attendance_label', optional($event)->attendance_label) }}"
            class="w-full px-4 py-2 rounded-lg text-sm
                bg-[var(--surface)] text-[var(--text-1)]
                border border-[var(--border)]
                placeholder-[var(--text-3)]
                focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
            placeholder="e.g. SPEAKING OPPORTUNITY PURSUED">
        @error('attendance_label') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <!-- Description -->
    <div>
        <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
            Description
        </label>
        <textarea name="description" 
            rows="4"
            class="w-full px-4 py-2 rounded-lg text-sm
                bg-[var(--surface)] text-[var(--text-1)]
                border border-[var(--border)]
                placeholder-[var(--text-3)]
                focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
            placeholder="Event description...">{{ old('description', optional($event)->description) }}</textarea>
        @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <!-- Cover Image -->
    <div class="bg-[var(--surface-2)] border border-[var(--border)] p-4 rounded-lg">
        <label class="block text-sm font-medium text-[var(--text-2)] mb-2">
            Cover Image
        </label>

        <div class="flex items-center gap-6">
            @if(optional($event)->image_path)
                <img src="{{ asset('storage/' . $event->image_path) }}" 
                     class="h-16 w-16 object-cover rounded-lg border">
            @endif

            <input type="file" 
                name="image" 
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
        @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <!-- External URL & Featured -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
                External URL
            </label>
            <input type="url" 
                name="external_url" 
                value="{{ old('external_url', optional($event)->external_url) }}"
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    placeholder-[var(--text-3)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]"
                placeholder="https://example.com/register">
            @error('external_url') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-end">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" 
                    {{ old('is_featured', optional($event)->is_featured) ? 'checked' : '' }}
                    class="rounded text-[var(--primary)] focus:ring-[var(--primary)]">
                <span class="text-sm font-medium text-[var(--text-2)]">Featured</span>
            </label>
        </div>
    </div>

    <!-- Status & Sort Order -->
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
                <option value="1" {{ old('status', optional($event)->status ?? 1) == 1 ? 'selected' : '' }}>
                    Active
                </option>
                <option value="0" {{ old('status', optional($event)->status) == 0 ? 'selected' : '' }}>
                    Inactive
                </option>
            </select>
            @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1 text-[var(--text-2)]">
                Sort Order
            </label>
            <input type="number" 
                name="sort_order" 
                value="{{ old('sort_order', optional($event)->sort_order ?? 0) }}"
                class="w-full px-4 py-2 rounded-lg text-sm
                    bg-[var(--surface)] text-[var(--text-1)]
                    border border-[var(--border)]
                    focus:outline-none focus:ring-2 focus:ring-[var(--primary)]">
            @error('sort_order') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
    </div>

    <!-- Submit -->
    <div class="pt-4 flex justify-end gap-3">
        <a href="{{ route('admin.events.index') }}" 
            class="inline-flex items-center justify-center gap-2 bg-gray-500 hover:bg-gray-600 text-white px-5 py-2.5 rounded-xl font-medium transition-all duration-200">
            Cancel
        </a>
        <button type="submit"
            class="inline-flex items-center justify-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl font-medium transition-all duration-200 shadow-md shadow-teal-600/20 hover:shadow-lg hover:shadow-teal-600/30 hover:-translate-y-0.5">
            {{ isset($event) ? 'Update' : 'Add' }} 
            Event
        </button>
    </div>

</div>
