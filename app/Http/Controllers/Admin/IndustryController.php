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
        $query = Industry::withCount('assets')
            ->with('parent')
            ->orderBy('sort_order', 'asc');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $industries = $query->paginate(10)->withQueryString();

        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        // Hanya root industries yang bisa jadi parent (hindari nested terlalu dalam)
        $parentOptions = Industry::roots()->orderBy('sort_order')->get();

        return view('admin.industries.create', compact('parentOptions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_id'   => 'nullable|exists:industries,id',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'sort_order'  => 'nullable|integer|min:0',
            'is_active'   => 'required|in:0,1,2',
            'is_featured' => 'nullable|boolean',
        ]);

        // Slug: pastikan unik
        $slug = Str::slug($validated['title']);
        $validated['slug'] = $this->uniqueSlug($slug);

        // Sort order
        $validated['sort_order'] = $request->filled('sort_order')
            ? (int) $request->sort_order
            : (Industry::max('sort_order') + 1);

        if ($request->filled('sort_order')) {
            $this->reorderOnCreate((int) $request->sort_order);
        }

        // Upload image
        if ($request->hasFile('image')) {
            $validated['image_path'] = $this->uploadImage($request, $validated['slug']);
        }

        // Casting
        $validated['is_active']   = (int) $validated['is_active'];
        $validated['is_featured'] = (bool) $request->input('is_featured', false);
        $validated['parent_id']   = $request->input('parent_id') ?: null;

        Industry::create($validated);

        return redirect()->route('admin.industries.index')
                         ->with('success', 'Industry created successfully.');
    }

    public function edit(Industry $industry)
    {
        // Exclude diri sendiri dan semua child-nya agar tidak circular
        $excludeIds = $this->getDescendantIds($industry);
        $excludeIds[] = $industry->id;

        $parentOptions = Industry::roots()
            ->whereNotIn('id', $excludeIds)
            ->orderBy('sort_order')
            ->get();

        return view('admin.industries.edit', compact('industry', 'parentOptions'));
    }

    public function update(Request $request, Industry $industry)
    {
        $validated = $request->validate([
            'parent_id'   => 'nullable|exists:industries,id',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'sort_order'  => 'nullable|integer|min:0',
            'is_active'   => 'required|in:0,1,2',
            'is_featured' => 'nullable|boolean',
        ]);

        // Slug: update hanya jika title berubah
        if ($validated['title'] !== $industry->title) {
            $slug = Str::slug($validated['title']);
            $validated['slug'] = $this->uniqueSlug($slug, $industry->id);
        }

        // Sort order reorder
        $newOrder = (int) $request->input('sort_order', $industry->sort_order);
        if ($newOrder !== $industry->sort_order) {
            $this->reorderOnUpdate($industry->sort_order, $newOrder);
        }
        $validated['sort_order'] = $newOrder;

        // Upload image baru & hapus lama
        if ($request->hasFile('image')) {
            $this->deleteImage($industry->image_path);
            $slug = $validated['slug'] ?? $industry->slug;
            $validated['image_path'] = $this->uploadImage($request, $slug);
        }

        // Casting
        $validated['is_active']   = (int) $validated['is_active'];
        $validated['is_featured'] = (bool) $request->input('is_featured', false);
        $validated['parent_id']   = $request->input('parent_id') ?: null;

        $industry->update($validated);

        return redirect()->route('admin.industries.index')
                         ->with('success', 'Industry updated successfully.');
    }

    public function destroy(Industry $industry)
    {
        // Lepas parent dari children sebelum hapus
        $industry->children()->update(['parent_id' => null]);

        $this->deleteImage($industry->image_path);
        $industry->delete();

        return redirect()->back()->with('success', 'Industry deleted.');
    }

    // ── Private Helpers ────────────────────────────────────────────

    private function uploadImage(Request $request, string $slug): string
    {
        $file     = $request->file('image');
        $filename = $slug . '-' . time() . '.' . $file->getClientOriginalExtension();

        return $file->storeAs('industries', $filename, 'public');
    }

    private function deleteImage(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    private function uniqueSlug(string $slug, ?int $ignoreId = null): string
    {
        $original = $slug;
        $counter  = 1;

        while (
            Industry::where('slug', $slug)
                ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $original . '-' . $counter++;
        }

        return $slug;
    }

    private function getDescendantIds(Industry $industry): array
    {
        $ids = [];
        foreach ($industry->children as $child) {
            $ids[] = $child->id;
            $ids   = array_merge($ids, $this->getDescendantIds($child));
        }
        return $ids;
    }

    private function reorderOnCreate(int $newOrder): void
    {
        Industry::where('sort_order', '>=', $newOrder)->increment('sort_order');
    }

    private function reorderOnUpdate(int $currentOrder, int $newOrder): void
    {
        if ($newOrder < $currentOrder) {
            Industry::whereBetween('sort_order', [$newOrder, $currentOrder - 1])
                    ->increment('sort_order');
        } elseif ($newOrder > $currentOrder) {
            Industry::whereBetween('sort_order', [$currentOrder + 1, $newOrder])
                    ->decrement('sort_order');
        }
    }
}