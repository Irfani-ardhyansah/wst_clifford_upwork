<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventAttendance;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    public $eventTypes = [
        ['value' => 'conference', 'text' => 'Conference'],
        ['value' => 'workshop', 'text' => 'Workshop'],
        ['value' => 'speaking_engagement', 'text' => 'Speaking Engagement'],
        ['value' => 'webinar', 'text' => 'Webinar'],
        ['value' => 'other', 'text' => 'Other'],
    ];

    public $attendanceStatuses = [
        ['value' => 'attending', 'text' => 'Attending'],
        ['value' => 'presenting', 'text' => 'Presenting'],
        ['value' => 'speaking', 'text' => 'Speaking'],
        ['value' => 'presented', 'text' => 'Presented'],
    ];

    public function index(Request $request)
    {
        $query = Event::withCount('attendances')->latest();

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where('title', 'like', "%{$s}%")
                    ->orWhere('slug', 'like', "%{$s}%")
                    ->orWhere('location', 'like', "%{$s}%");
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('event_type')) {
            $query->where('event_type', $request->event_type);
        }

        $events = $query->paginate(15)->withQueryString();
        $eventTypes = $this->eventTypes;

        return view('admin.events.index', compact('events', 'eventTypes'));
    }

    public function create()
    {
        $eventTypes = $this->eventTypes;
        $attendanceStatuses = $this->attendanceStatuses;
        return view('admin.events.create', compact('eventTypes', 'attendanceStatuses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:events,slug',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'event_time' => 'nullable|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'is_virtual' => 'nullable|boolean',
            'event_type' => ['required', Rule::in(array_column($this->eventTypes, 'value'))],
            'attendance_status' => ['nullable', Rule::in(array_column($this->attendanceStatuses, 'value'))],
            'attendance_label' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_featured' => 'nullable|boolean',
            'external_url' => 'nullable|url',
            'status' => 'nullable|in:0,1',
            'sort_order' => 'nullable|integer',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($request->title);
            $base = $validated['slug'];
            $i = 1;
            while (Event::where('slug', $validated['slug'])->exists()) {
                $validated['slug'] = $base . '-' . $i++;
            }
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $validated['slug'] . '-' . time() . '.' . $file->getClientOriginalExtension();
            $validated['image_path'] = $file->storeAs('events', $filename, 'public');
        }

        $validated['is_virtual'] = $request->has('is_virtual');
        $validated['is_featured'] = $request->has('is_featured');
        $validated['status'] = $validated['status'] ?? 1;
        $validated['sort_order'] = $validated['sort_order'] ?? Event::max('sort_order') + 1;

        // Generate Jitsi meeting link
        $hashDate = $request->event_date ? substr(md5($request->event_date), 0, 8) : Str::lower(Str::random(8));
        $slug = 'event-' . Str::slug($request->title) . '-' . $hashDate;
        $validated['external_url'] = 'https://meet.jit.si/' . $slug;

        Event::create($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        $eventTypes = $this->eventTypes;
        $attendanceStatuses = $this->attendanceStatuses;
        return view('admin.events.edit', compact('event', 'eventTypes', 'attendanceStatuses'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('events', 'slug')->ignore($event->id),
            ],
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'event_time' => 'nullable|date_format:H:i',
            'location' => 'nullable|string|max:255',
            'is_virtual' => 'nullable|boolean',
            'event_type' => ['required', Rule::in(array_column($this->eventTypes, 'value'))],
            'attendance_status' => ['nullable', Rule::in(array_column($this->attendanceStatuses, 'value'))],
            'attendance_label' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_featured' => 'nullable|boolean',
            'external_url' => 'nullable|url',
            'status' => 'nullable|in:0,1',
            'sort_order' => 'nullable|integer',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($request->title);
        }

        if ($request->title !== $event->title) {
            $validated['slug'] = Str::slug($request->title);
        }

        if ($request->hasFile('image')) {
            if ($event->image_path && Storage::disk('public')->exists($event->image_path)) {
                Storage::disk('public')->delete($event->image_path);
            }
            $file = $request->file('image');
            $filename = $validated['slug'] . '-' . time() . '.' . $file->getClientOriginalExtension();
            $validated['image_path'] = $file->storeAs('events', $filename, 'public');
        }

        $validated['is_virtual'] = $request->has('is_virtual');
        $validated['is_featured'] = $request->has('is_featured');
        $validated['status'] = $validated['status'] ?? $event->status;

        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    public function show(Event $event)
    {
        $event->load('attendances.user');
        $attendances = $event->attendances()->with('user')->paginate(20);
        
        return view('admin.events.show', compact('event', 'attendances'));
    }

    public function destroy(Event $event)
    {
        if ($event->image_path && Storage::disk('public')->exists($event->image_path)) {
            Storage::disk('public')->delete($event->image_path);
        }
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }

    public function approveAttendance(EventAttendance $attendance)
    {
        $attendance->update([
            'status' => EventAttendance::STATUS_APPROVED,
            'confirmed_at' => now(),
        ]);

        return back()->with('success', 'Attendance approved.');
    }

    public function rejectAttendance(EventAttendance $attendance)
    {
        $attendance->update([
            'status' => EventAttendance::STATUS_REJECTED,
        ]);

        return back()->with('success', 'Attendance rejected.');
    }

    public function cancelAttendance(EventAttendance $attendance)
    {
        $attendance->update([
            'status' => EventAttendance::STATUS_CANCELLED,
            'cancelled_at' => now(),
        ]);

        return back()->with('success', 'Attendance cancelled.');
    }
}
