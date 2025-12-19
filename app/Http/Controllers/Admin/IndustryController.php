<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class IndustryController extends Controller
{
    public function index(Request $request)
    {
        $query = Industry::orderBy('sort_order', 'asc');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        $industries = $query->paginate(10)->withQueryString();

        return view('admin.industries.index', compact('industries'));
    }
    
    public function create()
    {
        return view('admin.industries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string', // Bisa nullable kalau mau opsional
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', 
            'link_url'    => 'nullable|url',
            'sort_order'  => 'integer',
        ]);

        if ($request->filled('sort_order')) {
            $this->reorderOnCreate($request->sort_order);
            $validated['sort_order'] = $request->sort_order;
        } else {
            $validated['sort_order'] = Industry::max('sort_order') + 1;
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::slug($request->title) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('industries', $filename, 'public');
            $validated['image_path'] = $path;
        }

        $validated['slug'] = Str::slug($request->title);
        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $request->input('sort_order', 0);

        Industry::create($validated);

        return redirect()->route('admin.industries.index')->with('success', 'Industry created successfully.');
    }

    public function edit(Industry $industry)
    {
        return view('admin.industries.edit', compact('industry'));
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

        if ($request->filled('sort_order') && $request->sort_order != $industry->sort_order) {
            $this->reorderOnUpdate($industry->sort_order, $request->sort_order);
            $validated['sort_order'] = $request->sort_order;
        }

        if ($request->hasFile('image')) {
            // Hapus image lama
            if ($industry->image_path && Storage::disk('public')->exists($industry->image_path)) {
                Storage::disk('public')->delete($industry->image_path);
            }
            
            // Upload image baru
            $file = $request->file('image');
            $filename = Str::slug($request->title) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('industries', $filename, 'public');
            $validated['image_path'] = $path;
        }

        if ($request->title !== $industry->title) {
            $validated['slug'] = Str::slug($request->title);
        }
        
        $validated['is_active'] = $request->has('is_active');

        $industry->update($validated);

        return redirect()->route('admin.industries.index')->with('success', 'Industry updated successfully.');
    }
    
    public function destroy(Industry $industry)
    {
        if ($industry->image_path && Storage::disk('public')->exists($industry->image_path)) {
            Storage::disk('public')->delete($industry->image_path);
        }
        
        $industry->delete();
        return redirect()->back()->with('success', 'Industry deleted.');
    }

    private function reorderOnCreate($newOrder)
    {
        Industry::where('sort_order', '>=', $newOrder)
                    ->increment('sort_order');
    }

    private function reorderOnUpdate($currentOrder, $newOrder)
    {
        if ($newOrder < $currentOrder) {
            Industry::where('sort_order', '>=', $newOrder)
                        ->where('sort_order', '<', $currentOrder)
                        ->increment('sort_order');
        } elseif ($newOrder > $currentOrder) {
            Industry::where('sort_order', '>', $currentOrder)
                        ->where('sort_order', '<=', $newOrder)
                        ->decrement('sort_order');
        }
    }
}