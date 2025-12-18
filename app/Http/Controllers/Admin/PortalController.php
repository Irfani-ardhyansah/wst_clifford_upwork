<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Http\Request;

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
}