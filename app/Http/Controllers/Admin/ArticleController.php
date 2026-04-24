<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::query()
            ->where('type', Article::TYPE_ARTICLE)
            ->with('author')
            ->withCount('views')
            ->latest();
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where('title', 'like', "%{$s}%")->orWhere('slug', 'like', "%{$s}%");
        }

        $articles = $query->paginate(15)->withQueryString();
        return view('admin.articles.index', compact('articles'));
    }
    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => ['nullable', Rule::in(['article', 'white-paper'])],
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:articles,slug',
            'category' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string|max:1000',
            'target_audience' => 'nullable|array',
            'source_type' => ['required', Rule::in(['editor','pdf'])],
            'content' => 'nullable|string',
            'pdf' => 'nullable|file|mimes:pdf|max:51200',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'page_count' => 'nullable|integer|min:1',
            'status' => ['nullable', Rule::in(['draft','published'])],
            'published_at' => 'nullable|date',
        ]);

        if ($request->source_type === 'editor') {
            $request->validate(["content" => 'required|string']);
        } else {
            $request->validate(["pdf" => 'required|file|mimes:pdf|max:51200']);
        }

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($request->title);
            $base = $validated['slug'];
            $i = 1;
            while (Article::where('slug', $validated['slug'])->exists()) {
                $validated['slug'] = $base . '-' . $i++;
            }
        }

        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = $validated['slug'] . '-pdf-' . time() . '.' . $file->getClientOriginalExtension();
            $validated['pdf_path'] = $file->storeAs('articles/pdfs', $filename, 'public');
        }

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = $validated['slug'] . '-thumb-' . time() . '.' . $file->getClientOriginalExtension();
            $validated['thumbnail'] = $file->storeAs('articles/thumbnails', $filename, 'public');
        }

        $validated['author_id'] = auth()->id();
        $validated['type'] = $validated['type'] ?? 'article';
        $validated['status'] = $validated['status'] ?? 'draft';

        Article::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Article created successfully.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'type' => ['nullable', Rule::in(['article', 'white-paper'])],
            'title' => 'required|string|max:255',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('articles', 'slug')->ignore($article->id),
            ],
            'category' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string|max:1000',
            'target_audience' => 'nullable|array',
            'source_type' => ['required', Rule::in(['editor', 'pdf'])],
            'content' => 'nullable|string',
            'pdf' => 'nullable|file|mimes:pdf|max:51200',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'page_count' => 'nullable|integer|min:1',
            'status' => ['nullable', Rule::in(['draft','published'])],
            'published_at' => 'nullable|date',
        ]);

        /*
        |--------------------------------------------------------------------------
        | SOURCE TYPE VALIDATION LOGIC
        |--------------------------------------------------------------------------
        */

        if ($request->source_type === 'editor') {

            // Content wajib
            $request->validate([
                'content' => 'required|string'
            ]);

            // Kalau sebelumnya PDF → hapus file lama
            if ($article->source_type === 'pdf' && $article->pdf_path) {
                if (Storage::disk('public')->exists($article->pdf_path)) {
                    Storage::disk('public')->delete($article->pdf_path);
                }
                $validated['pdf_path'] = null;
            }

        } else { // source_type = pdf

            // PDF WAJIB kalau belum ada file lama
            if (!$article->pdf_path && !$request->hasFile('pdf')) {
                $request->validate([
                    'pdf' => 'required|file|mimes:pdf|max:51200'
                ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | SLUG HANDLING
        |--------------------------------------------------------------------------
        */

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($request->title);
        }

        // Kalau title berubah → regenerate slug
        if ($request->title !== $article->title) {
            $validated['slug'] = Str::slug($request->title);
        }

        /*
        |--------------------------------------------------------------------------
        | HANDLE PDF UPLOAD
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('pdf')) {

            if ($article->pdf_path && Storage::disk('public')->exists($article->pdf_path)) {
                Storage::disk('public')->delete($article->pdf_path);
            }

            $file = $request->file('pdf');
            $filename = $validated['slug'] . '-pdf-' . time() . '.' . $file->getClientOriginalExtension();

            $validated['pdf_path'] = $file->storeAs('articles/pdfs', $filename, 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | HANDLE THUMBNAIL UPLOAD
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('thumbnail')) {

            if ($article->thumbnail && Storage::disk('public')->exists($article->thumbnail)) {
                Storage::disk('public')->delete($article->thumbnail);
            }

            $file = $request->file('thumbnail');
            $filename = $validated['slug'] . '-thumb-' . time() . '.' . $file->getClientOriginalExtension();

            $validated['thumbnail'] = $file->storeAs('articles/thumbnails', $filename, 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | FINAL UPDATE
        |--------------------------------------------------------------------------
        */

        $validated['author_id'] = $article->author_id;
        $validated['type'] = $validated['type'] ?? $article->type ?? 'article';
        $validated['status'] = $validated['status'] ?? $article->status;

        $article->update($validated);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        if ($article->thumbnail && Storage::disk('public')->exists($article->thumbnail)) {
            Storage::disk('public')->delete($article->thumbnail);
        }
        if ($article->pdf_path && Storage::disk('public')->exists($article->pdf_path)) {
            Storage::disk('public')->delete($article->pdf_path);
        }
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully.');
    }
}
