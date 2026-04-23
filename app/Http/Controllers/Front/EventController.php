<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('status', 1)
        ->orderBy('sort_order', 'asc')
        ->get();

        return view('resources.events', compact('events'));
    }
}
