<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class WhitePaperController extends Controller
{
    public function index(Request $request)
    { 
        $query = Article::query()
            ->where('type', Article::TYPE_WHITE_PAPER)
            ->with('author')
            ->withCount('views')
            ->latest();
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where('title', 'like', "%{$s}%")->orWhere('slug', 'like', "%{$s}%");
        }

        $whitePapers = $query->paginate(10)->withQueryString();

        return view('admin.white_papers.index', compact('whitePapers'));
    }
}
