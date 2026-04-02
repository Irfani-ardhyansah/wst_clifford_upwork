<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Industry;

class MemberController extends Controller
{
    public function index()
    {
        $webinars = Asset::where('category', 'webinar')
                        ->where('is_active', 1)
                        ->withCount('views')
                        ->orderByDesc('views_count')
                        ->limit(3)->get();

        $industries = Industry::orderBy('sort_order', 'asc')
                        ->limit(5)->get();

        return view('index', compact('webinars', 'industries'));
    }
}
