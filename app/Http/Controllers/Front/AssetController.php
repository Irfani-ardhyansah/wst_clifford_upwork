<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\AssetView;
use Carbon\Carbon;

class AssetController extends Controller
{
    public function show($id)
    {
        $asset = Asset::where('id', $id)
            ->where('is_active', 1)
            ->firstOrFail();

        $user = auth()->user();
        if ($user->role !== 'admin') {
            AssetView::firstOrCreate([
                'asset_id' => $asset->id,
                'user_id'  => $user->id,
                'view_date'=> Carbon::today(),
            ]);
        }

        if (blank($asset->html_content)) {
            return response()->json([
                'html' => view('member_dashboard.empty-content', compact('asset'))->render()
            ]);
        }


        return response()->json([
            'html' => $asset->html_content,
        ]);
    }
}
