<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Asset;

class WebinarController extends Controller
{
    public function index()
    {
        $featuredWebinar = Asset::query()
            ->where('category', 'webinar')
            ->where('is_active', 1)
            ->where('is_featured', 1)
            ->orderBy('id', 'desc')
            ->first();

        $webinars = Asset::query()
            ->where('category', 'webinar')
            ->where('is_active', 1)
            ->where('is_featured', 0)
            ->orderBy('sort_order')
            ->get();

        return view('resources.webinar', compact('webinars', 'featuredWebinar'));
    }
}
