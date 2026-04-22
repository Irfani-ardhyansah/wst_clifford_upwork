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
        $query = Asset::with('industry')->withCount('views')->latest();
        
        // Filter by industry
        if ($request->filled('industry_id')) {
            $query->where('industry_id', $request->industry_id);
        }
        
        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        
        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('tags', 'like', "%{$search}%");
            });
        }
        
        $caseStudies = $query->paginate(10)->withQueryString();
        $industries = Industry::orderBy('title', 'asc')->get();

        return view('admin.case_studies.index', compact('caseStudies', 'industries'));
    }
}