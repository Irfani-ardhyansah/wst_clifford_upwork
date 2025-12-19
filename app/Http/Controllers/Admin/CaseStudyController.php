<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CaseStudyController extends Controller
{
    public function index(Request $request)
    {
        $query = CaseStudy::with('industry')->latest();
        if ($request->filled('industry_id')) {
            $query->where('industry_id', $request->industry_id);
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

    public function create()
    {
        $industries = Industry::where('is_active', true)->get();
        return view('admin.case_studies.create', compact('industries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'industry_id'      => 'required|exists:industries,id', 
            'title'            => 'required|string|max:255',
            'category'         => 'nullable|string|max:100', 
            'impact_highlight' => 'nullable|string|max:255', 
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link_url'         => 'nullable|url',
            'sort_order'       => 'integer',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::slug($request->title) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('case_studies', $filename, 'public');
            $validated['image_path'] = $path;
        }

        $validated['slug'] = Str::slug($request->title);
        
        // Checkbox handling (biasanya tidak terkirim jika unchecked)
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        CaseStudy::create($validated);

        return redirect()->back()->with('success', 'Case Study created successfully.');
    }

    public function edit(CaseStudy $caseStudy)
    {
        $industries = Industry::where('is_active', true)->get();
        return view('admin.case_studies.edit', compact('caseStudy', 'industries'));
    }

    public function update(Request $request, CaseStudy $caseStudy)
    {
        $validated = $request->validate([
            'industry_id'      => 'required|exists:industries,id',
            'title'            => 'required|string|max:255',
            'category'         => 'nullable|string',
            'impact_highlight' => 'nullable|string',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link_url'         => 'nullable|url',
            'sort_order'       => 'integer',
        ]);

        if ($request->hasFile('image')) {
            if ($caseStudy->image_path && Storage::disk('public')->exists($caseStudy->image_path)) {
                Storage::disk('public')->delete($caseStudy->image_path);
            }

            $file = $request->file('image');

            $filename = Str::slug($request->title) . '-' . time() . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs('case_studies', $filename, 'public');
            
            $validated['image_path'] = $path;
        }

        if ($request->title !== $caseStudy->title) {
            $validated['slug'] = Str::slug($request->title);
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        $caseStudy->update($validated);

        return redirect()->back()->with('success', 'Case Study updated successfully.');
    }
    
    public function destroy(CaseStudy $caseStudy)
    {
        if ($caseStudy->image_path && Storage::disk('public')->exists($caseStudy->image_path)) {
            Storage::disk('public')->delete($caseStudy->image_path);
        }
        
        $caseStudy->delete();
        return redirect()->back()->with('success', 'Case Study deleted.');
    }
}