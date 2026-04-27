<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventAttendance;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        $user = Auth::user();
        $registeredEventIds = [];

        // Get event IDs user sudah register
        if ($user) {
            $registeredEventIds = EventAttendance::where('user_id', $user->id)
                ->pluck('event_id')
                ->toArray();
        }

        return view('resources.events', compact('events', 'user', 'registeredEventIds'));
    }
}
