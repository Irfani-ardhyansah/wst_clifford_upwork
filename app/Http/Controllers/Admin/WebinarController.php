<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;

class WebinarController extends Controller
{
    public function index(Request $request)
    { 
        $query = Asset::where('category', 'webinar')->latest();
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
        $webinars = $query->paginate(10)->withQueryString();

        return view('admin.webinar.index', compact('webinars'));
    }
}
