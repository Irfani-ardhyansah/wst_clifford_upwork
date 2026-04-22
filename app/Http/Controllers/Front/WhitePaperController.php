<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\WhitePaper;

class WhitePaperController extends Controller
{
    public function index()
    {
        $whitePapers = WhitePaper::query()  
            ->published()
            ->orderBy('id')
            ->get();

        return view('resources.white_papers', compact('whitePapers'));
    }
}
