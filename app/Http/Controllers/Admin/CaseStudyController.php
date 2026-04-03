<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use App\Models\Asset;

class CaseStudyController extends Controller
{
    public function index(Request $request)
    { 
        $query = Asset::where('category', 'case-study')->withCount('views')->with('industry')->latest();
        if ($request->filled('industry_id')) {
            $query->where('industry_id', $request->industry_id);
        }
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('category', 'like', "%{$search}%");
            });
        }
        $caseStudies = $query->paginate(10)->withQueryString();
        $industries = Industry::orderBy('title', 'asc')->get();

        return view('admin.case_studies.index', compact('caseStudies', 'industries'));
    }
}