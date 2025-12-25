<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset;

class ToolController extends Controller
{
    public function index(Request $request)
    { 
        $query = Asset::where('category', 'tool')->latest();
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
        $tools = $query->paginate(10)->withQueryString();

        return view('admin.tool.index', compact('tools'));
    }
}