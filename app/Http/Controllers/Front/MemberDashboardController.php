<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Asset;

class MemberDashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Asset::where('is_active', true)
                    ->with('industry')
                    ->latest('sort_order');
        $typeFunction = 'index';

        if ($request->filled('category')) {
            $typeFunction = 'detail';
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('tags', 'like', "%{$search}%");
            });
        }

        $assets = $query->paginate(9)->withQueryString();

        $pageTitle = $request->category ? Str::plural($request->category) : 'All Resources';

        $sidebarMenu = [
            ['value' => 'white-paper', 'label' => 'White Papers', 'icon' => 'fa-file-lines'],
            ['value' => 'case-study', 'label' => 'Case Studies', 'icon' => 'fa-briefcase'],
            ['value' => 'webinar', 'label' => 'Webinars', 'icon' => 'fa-video'],
            ['value' => 'tool', 'label' => 'Tools & Calculators', 'icon' => 'fa-calculator'],
        ];
        return view('member_dashboard.index', compact('assets', 'pageTitle', 'sidebarMenu', 'typeFunction'));
    }
}
