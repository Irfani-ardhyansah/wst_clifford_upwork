<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Industry;
use App\Models\Article;
use App\Models\AssetView;
use App\Models\Event;
use App\Models\EventAttendance;
use Carbon\Carbon;

class MemberDashboardController extends Controller
{
    public $categories = [
            ['value' => 'case-study', 'text' => 'Case Study'], 
            ['value' => 'webinar', 'text' => 'Webinar'], 
            ['value' => 'white-paper', 'text' => 'White Paper'], 
            ['value' => 'tool', 'text' => 'Tool'], 
        ];

    public function index(Request $request)
    {
        $typeFunction = 'index';
        $pageTitle = $request->category ? Str::plural($request->category) : 'All Resources';
        $categories = $this->categories;
        $industries = Industry::orderBy('title', 'asc')->get();

        // Handle white-paper from Article model
        if ($request->filled('category') && $request->category === 'white-paper') {
            $typeFunction = 'detail';
            $query = Article::where('status', 'published')
                        ->where('type', 'white-paper');

            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%");
                });
            }

            $assets = $query->latest('published_at')->paginate(12)->withQueryString();
        } else {
            // Handle all other assets (case-study, webinar, tool) from Asset model
            // dd(Asset::where('is_active', true)->where('category', 'Case Study')->with('industry')->latest('sort_order')->get());
            $query = Asset::where('is_active', true)
                        ->with('industry')
                        ->latest('sort_order');

            if ($request->filled('category')) {
                $typeFunction = 'detail';
                $query->where('category', $request->category);
            }

            if ($request->filled('industry_id')) {
                $query->where('industry_id', $request->industry_id);
            }

            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('tags', 'like', "%{$search}%");
                });
            }

            $assets = $query->paginate(12)->withQueryString();
        }

        $sidebarMenu = [
            ['value' => 'white-paper', 'label' => 'White Papers', 'icon' => 'fa-file-lines'],
            ['value' => 'case-study', 'label' => 'Case Studies', 'icon' => 'fa-briefcase'],
            ['value' => 'webinar', 'label' => 'Webinars', 'icon' => 'fa-video'],
            ['value' => 'tool', 'label' => 'Tools & Calculators', 'icon' => 'fa-calculator'],
        ];
        return view('member_dashboard.index', compact('assets', 'pageTitle', 'sidebarMenu', 'typeFunction', 'industries', 'categories'));
    }

    public function articles(Request $request)
    {
        $query = Article::where('status', 'published');

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where('title', 'like', "%{$s}%");
        }

        $articles = $query->paginate(12)->withQueryString();

        return view('member_dashboard.articles.index', compact('articles'));
    }

    public function articleContent($id)
    {
        $article = Article::findOrFail($id);
        $user = auth()->user();
        
        if ($user && $user->role !== 'admin') {
            AssetView::firstOrCreate([
                'article_id' => $article->id,
                'user_id'  => $user->id,
                'view_date'=> Carbon::today(),
            ]);
        } else {
            AssetView::firstOrCreate([
                'article_id' => $article->id,
                'user_id'  => null,
                'view_date'=> Carbon::today(),
            ]);
        }

        // Return HTML content as JSON response
        $html = view('member_dashboard.articles._modal', compact('article'))->render();
        return response()->json(['html' => $html]);
    }

    public function events(Request $request)
    {
        $user = auth()->user();
        
        // Admin sees all events with their attendances, users see only events they registered for
        if ($user->role === 'admin') {
            $query = Event::with('attendances.user')
                        ->latest('created_at');
        } else {
            $query = Event::whereHas('attendances', function($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->with('attendances')
            ->latest('created_at');
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where('title', 'like', "%{$s}%");
        }

        $events = $query->paginate(12)->withQueryString();

        return view('member_dashboard.events.index', compact('events'));
    }
}
