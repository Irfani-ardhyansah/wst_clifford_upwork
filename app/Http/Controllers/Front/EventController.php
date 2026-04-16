<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\GresbConsultation;

class EventController extends Controller
{
    public function index()
    {
        $events = GresbConsultation::where('status', 1)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('resources.events', compact('events'));
    }
}
