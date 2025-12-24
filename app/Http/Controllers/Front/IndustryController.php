<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\Asset;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::where('is_active', true)
                        ->orderBy('sort_order', 'asc')
                        ->get();

        return view('industries.index', compact('industries'));
    }

    public function showCaseStudy(string $slug)
    {
        $case_studies = Asset::select('assets.*', 'industries.title as industry_name')
            ->join('industries', 'assets.industry_id', '=', 'industries.id')
            ->where('industries.slug', $slug)
            ->where('assets.is_active', true)
            ->orderBy('assets.sort_order', 'asc')
            ->get();

        return view('industries.case_study', compact('case_studies'));
    }
}