<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Industry;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    public $categories = [
            ['value' => 'case-study', 'text' => 'Case Study'], 
            ['value' => 'webinar', 'text' => 'Webinar'], 
            ['value' => 'white-paper', 'text' => 'White Paper'], 
            ['value' => 'tool', 'text' => 'Tool'], 
        ];
    
    public function index(Request $request)
    {
        $query = Asset::with('industry')->latest();
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
        $assets = $query->paginate(10)->withQueryString();
        $categories = $this->categories;
        $industries = Industry::orderBy('title', 'asc')->get();

        return view('admin.assets.index', compact('assets', 'industries', 'categories'));
    }

    public function create()
    {
        $industries = Industry::where('is_active', true)->get();
        $categories = $this->categories;
        return view('admin.assets.create', compact('industries', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'industry_id'      => 'required_if:category,case_study|nullable|exists:industries,id',
            'title'            => 'required|string|max:255',
            'category'         => 'required|string|max:100',
            'video'            => 'required_if:category,webinar|nullable|file|mimes:mp4,mov,ogg,qt|max:51200',
            'html_content'     => 'nullable|string',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'sort_order'       => 'nullable|integer',
            'tags'             => 'nullable|string|max:255', 
            'description'      => 'nullable|string',          
        ]);

        if ($request->filled('sort_order')) {
            $this->reorderOnCreate($request->sort_order);
            $validated['sort_order'] = $request->sort_order;
        } else {
            $validated['sort_order'] = Asset::max('sort_order') + 1;
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::slug($request->title) . '-img-' . time() . '.' . $file->getClientOriginalExtension();
            $validated['image_path'] = $file->storeAs('assets/images', $filename, 'public');
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = Str::slug($request->title) . '-vid-' . time() . '.' . $file->getClientOriginalExtension();
            $validated['video_path'] = $file->storeAs('assets/videos', $filename, 'public');
        }

        $validated['slug'] = Str::slug($request->title);
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        Asset::create($validated);

        return redirect()->route('admin.assets.index')->with('success', 'Asset created successfully.');
    }

    public function edit(Asset $asset)
    {
        $industries = Industry::where('is_active', true)->get();
        $categories = $this->categories;
        return view('admin.assets.edit', compact('asset', 'industries', 'categories'));
    }

    public function update(Request $request, Asset $asset)
    {
        $validated = $request->validate([
            'industry_id'      => 'required_if:category,case_study|nullable|exists:industries,id',
            'title'            => 'required|string|max:255',
            'category'         => 'required|string',
            'video'            => 'nullable|file|mimes:mp4,mov,ogg,qt|max:51200', 
            'html_content'     => 'nullable|string',
            'image'            => 'nullable|image|max:2048',
            'tags'             => 'nullable|string|max:255', 
            'description'      => 'nullable|string',          
            'sort_order'       => 'nullable|integer',
        ]);

        if ($request->filled('sort_order') && $request->sort_order != $asset->sort_order) {
            $this->reorderOnUpdate($asset->sort_order, $request->sort_order);
            $validated['sort_order'] = $request->sort_order;
        }

        if ($request->hasFile('image')) {
            if ($asset->image_path && Storage::disk('public')->exists($asset->image_path)) {
                Storage::disk('public')->delete($asset->image_path);
            }
            $file = $request->file('image');
            $filename = Str::slug($request->title) . '-img-' . time() . '.' . $file->getClientOriginalExtension();
            $validated['image_path'] = $file->storeAs('assets/images', $filename, 'public');
        }

        if ($request->hasFile('video')) {
            if ($asset->video_path && Storage::disk('public')->exists($asset->video_path)) {
                Storage::disk('public')->delete($asset->video_path);
            }
            
            $file = $request->file('video');
            $filename = Str::slug($request->title) . '-vid-' . time() . '.' . $file->getClientOriginalExtension();
            $validated['video_path'] = $file->storeAs('assets/videos', $filename, 'public');
        }

        if ($request->title !== $asset->title) {
            $validated['slug'] = Str::slug($request->title);
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        $asset->update($validated);

        return redirect()->route('admin.assets.index')->with('success', 'Asset updated successfully.');
    }
    
    public function destroy(Asset $asset)
    {
        if ($asset->image_path && Storage::disk('public')->exists($asset->image_path)) {
            Storage::disk('public')->delete($asset->image_path);
        }
        if ($asset->video_path && Storage::disk('public')->exists($asset->video_path)) {
            Storage::disk('public')->delete($asset->video_path);
        }
        
        $asset->delete();
        return redirect()->back()->with('success', 'Asset deleted.');
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
