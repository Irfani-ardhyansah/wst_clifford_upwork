<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AssetViewsSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Ambil semua asset dan user
        // Kita urutkan by ID supaya urutannya konsisten
        $assets = DB::table('assets')->orderBy('id')->pluck('id');
        $users  = DB::table('users')->pluck('id');

        if ($assets->isEmpty() || $users->isEmpty()) {
            return;
        }

        // 2. Tentukan Target Angka untuk Top 5
        $targets = [250, 200, 150, 100, 50];

        $rows = [];

        foreach ($assets as $index => $assetId) {
            
            // Cek apakah asset ini termasuk Top 5?
            if (isset($targets[$index])) {
                // Jika ya, gunakan angka target (plus sedikit variasi acak +/- 5 supaya tidak terlalu kaku)
                $count = $targets[$index] + rand(-5, 5);
            } else {
                // Sisanya kasih view sedikit saja (Noise) biar Top 5 menonjol
                $count = rand(0, 15);
            }

            // Generate Data View
            for ($i = 0; $i < $count; $i++) {
                // Sebar tanggal random dalam 30 hari terakhir
                $date = Carbon::now()->subDays(rand(0, 30));
                
                // Acak jam (jam 8 pagi - 8 malam)
                $date->setTime(rand(8, 20), rand(0, 59));

                $rows[] = [
                    'asset_id'   => $assetId,
                    'user_id'    => $users->random(),
                    'view_date'  => $date->toDateString(),
                    'created_at' => $date,
                    'updated_at' => $date,
                ];
            }
        }

        // 3. Insert ke database
        foreach (array_chunk($rows, 500) as $chunk) {
            DB::table('asset_views')->insertOrIgnore($chunk);
        }
    }
}