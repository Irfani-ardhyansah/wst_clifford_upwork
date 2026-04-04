<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\Asset;
use App\Models\AssetView;
use App\Models\User;
use App\Models\Subscriber;
use App\Models\Industry;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\DB;

class PortalController extends Controller
{
    public $categories = [
        ['value' => 'case-study', 'text' => 'Case Study'], 
            ['value' => 'webinar', 'text' => 'Webinar'], 
            ['value' => 'white-paper', 'text' => 'White Paper'], 
            ['value' => 'tool', 'text' => 'Tool'], 
        ];

    public function caseStudies()
    {
        $caseStudies = CaseStudy::where('is_active', true)
                        ->orderBy('sort_order')
                        ->get();
                        
        return view('admin.case_studies', compact('caseStudies'));
    }

    public function whitePapers()
    {
        // Jika belum ada tabel white_papers, bisa pakai dummy atau tabel yang sama dgn kategori beda
        $whitePapers = []; // Ganti dengan Query DB
        
        return view('admin.white_papers', compact('whitePapers'));
    }

    public function dashboard()
    {
        $registeredUsers = User::where('role', 'user')
                            ->latest()
                            ->get()
                            ->map(function ($user) {
                                $user->formatted_created_at = $user->created_at->format('d/m/Y');
                                return $user;
                            });

        $subscribers = Subscriber::latest()->get()
                            ->map(function ($user) {
                                $user->formatted_created_at = $user->created_at->format('d/m/Y');
                                return $user;
                            });

        $stats = [
            'total_assets' => Asset::count(),

            'total_views' => AssetView::count(),

            'registered_users' => $registeredUsers->count(),

            'top_asset_title' => Asset::withCount('views')
                ->orderByDesc('views_count')
                ->value('title'),

            'total_subscribers' => Subscriber::count()
        ];

        $topAssets = Asset::withCount('views')
            ->having('views_count', '>', 0)
            ->orderByDesc('views_count')
            ->limit(5)
            ->get(['id', 'title']);

        $months = collect(range(0, 5))->map(fn($i) => now()->subMonths($i))
            ->reverse()->values();

        $startDate = now()->subMonths(5)->startOfMonth();

        $viewsByMonth = AssetView::selectRaw('YEAR(view_date) as year, MONTH(view_date) as month, COUNT(*) as total')
            ->where('view_date', '>=', $startDate)
            ->groupByRaw('YEAR(view_date), MONTH(view_date)')
            ->get()
            ->keyBy(fn($row) => $row->year . '-' . str_pad($row->month, 2, '0', STR_PAD_LEFT));

        $chartLabels = $months->map(fn($m) => $m->format('M Y'));

        $chartValues = $months->map(fn($m) => 
            $viewsByMonth[$m->format('Y-m')]->total ?? 0
        );

        $leadsByMonth = User::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total')
            ->where('created_at', '>=', $startDate)
            ->where('role', 'user')
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->get()
            ->keyBy(fn($row) => $row->year . '-' . str_pad($row->month, 2, '0', STR_PAD_LEFT));

        $leadsValues = $months->map(fn($m) =>
            $leadsByMonth[$m->format('Y-m')]->total ?? 0
        );

        // Subscribers per month
        $subsByMonth = Subscriber::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total')
            ->where('created_at', '>=', $startDate)
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->get()
            ->keyBy(fn($row) => $row->year . '-' . str_pad($row->month, 2, '0', STR_PAD_LEFT));

        $subsValues = $months->map(fn($m) =>
            $subsByMonth[$m->format('Y-m')]->total ?? 0
        );

        $industries = Industry::orderBy('title')->get();

        $categories = $this->categories;

        return view('admin.dashboard', compact(
            'registeredUsers',
            'stats',
            'topAssets',
            'chartLabels',
            'chartValues',
            'leadsValues',
            'subsValues',
            'subscribers',
            'industries',
            'categories'
        ));
    }

    public function getAssetsAjax(Request $request)
    {
        $query = Asset::with('industry')->withCount('views');
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
        $assets = $query->latest()->limit(10)->get();

        return view('admin.partials.assets_list', compact('assets'));
    }

    public function exportUsersCsv()
    {
        $fileName = 'registered_users_' . date('Y-m-d_H-i') . '.csv';

        return new StreamedResponse(function () {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, ['Name', 'Company', 'Email', 'Registered Date']);

            $users = User::where('role', 'user')->cursor(); 

            foreach ($users as $user) {
                fputcsv($handle, [
                    $user->name,
                    $user->company ?? '-',
                    $user->email,
                    $user->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }

    public function getAssetViewDetails($id, Request $request)
    {
        $asset = Asset::with(['views' => function ($query) {
            $query->orderBy('view_date', 'desc')->with('user');
        }])->findOrFail($id);
        $views_count = AssetView::where('asset_id', $id)->count(); 

        if ($request->ajax()) {
            
            $search = $request->get('search');
            $top5 = $asset->views->take(5);
            // return response()->json($top5);
            return response()->json([
                'success' => true,
                'data' => [
                    'asset' => $asset,
                    'views_count' => $views_count,
                    'logs' => $top5->map(function($view) {
                        return [
                            'user' => $view->user ? $view->user->name : 'Unknown',
                            'date' => $view->created_at->format('d M Y'),
                            'time' => $view->created_at->format('H:i:s'),
                        ];
                    })
                ]
            ]);
        }

        return view('admin.components.asset-log-detail-card', compact('asset', 'views_count'));
    }
}