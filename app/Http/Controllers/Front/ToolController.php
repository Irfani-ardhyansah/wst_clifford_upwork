<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Asset;

class ToolController extends Controller
{
    public function index()
    {
        $tools = Asset::query()
            ->where('category', 'tool')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        return view('resources.tools', compact('tools'));
    }
}
