<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::orderBy('sort_order', 'asc')->get();
        // return view('admin.industries.index', compact('industries'));
        return response()->json($industries); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', 
            'link_url'    => 'nullable|url',
            'sort_order'  => 'integer',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('industries', 'public');
            $validated['image_path'] = $path;
        }

        $validated['slug'] = Str::slug($request->title);
        $validated['is_active'] = $request->has('is_active');

        Industry::create($validated);

        return redirect()->back()->with('success', 'Industry created successfully.');
    }

    public function update(Request $request, Industry $industry)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'link_url'    => 'nullable|url',
            'sort_order'  => 'integer',
        ]);

        if ($request->hasFile('image')) {
            if ($industry->image_path && Storage::disk('public')->exists($industry->image_path)) {
                Storage::disk('public')->delete($industry->image_path);
            }
            $path = $request->file('image')->store('industries', 'public');
            $validated['image_path'] = $path;
        }

        if ($request->title !== $industry->title) {
            $validated['slug'] = Str::slug($request->title);
        }
        
        $validated['is_active'] = $request->has('is_active');

        $industry->update($validated);

        return redirect()->back()->with('success', 'Industry updated successfully.');
    }
    
    public function destroy(Industry $industry)
    {
        if ($industry->image_path && Storage::disk('public')->exists($industry->image_path)) {
            Storage::disk('public')->delete($industry->image_path);
        }
        
        $industry->delete();
        return redirect()->back()->with('success', 'Industry deleted.');
    }
}