<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\Asset;
use App\Models\AssetView;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Str;

class PortalController extends Controller
{
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
                            ->get()
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
        ];

        $topAssets = Asset::withCount('views')
            ->having('views_count', '>', 0)
            ->orderByDesc('views_count')
            ->limit(5)
            ->get(['id', 'title']);

        $chartLabels = $topAssets->map(function ($asset) {
            return Str::limit($asset->title, 18);
        });
        $chartValues = $topAssets->pluck('views_count');

        return view('admin.dashboard', compact(
            'registeredUsers',
            'stats',
            'topAssets',
            'chartLabels',
            'chartValues'
        ));
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
}