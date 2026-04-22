<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\Asset;

class CaseStudyController extends Controller
{
    public function index()
    {
        $industries = Industry::where('is_active', true)->get();

        $case_studies = Asset::select('assets.*', 'industries.title as industry_title')
            ->where('assets.is_active', true)
            ->join('industries', 'assets.industry_id', '=', 'industries.id')
            ->orderBy('assets.sort_order', 'asc')
            ->get();

        return view('case_study.index', compact('case_studies', 'industries'));
    }
}

