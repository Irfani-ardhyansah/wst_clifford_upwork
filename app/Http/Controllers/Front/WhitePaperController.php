<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset;

class WhitePaperController extends Controller
{
    public function index()
    {
        $whitePapers = Asset::query()
            ->where('category', 'white-paper')
            ->where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        return view('resources.white_papers', compact('whitePapers'));
    }
}
