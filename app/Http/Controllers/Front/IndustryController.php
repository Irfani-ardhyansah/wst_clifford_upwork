<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\CaseStudy;

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
        $case_studies = CaseStudy::select('case_studies.*', 'industries.title as industry_name')
            ->join('industries', 'case_studies.industry_id', '=', 'industries.id')
            ->where('industries.slug', $slug)
            ->where('case_studies.is_active', true)
            ->orderBy('case_studies.sort_order', 'asc')
            ->get();

        return view('industries.case_study', compact('case_studies'));
    }
}