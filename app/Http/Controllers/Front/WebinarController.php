<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Asset;

class WebinarController extends Controller
{
    public function index()
    {
        $webinars = Asset::query()
            ->where('category', 'webinar')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        return view('resources.webinar', compact('webinars'));
    }
}
