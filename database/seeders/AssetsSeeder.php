<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AssetsSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $arrHospitalityId = DB::table('industries')
            ->where('slug', 'hospitality')
            ->pluck('id');

        foreach ($arrHospitalityId as $id) {
            DB::table('assets')->insert([
                [
                    'industry_id' => $id,
                    'title'       => 'Westin Hotel & Resorts',
                    'slug'        => Str::slug('Westin Hotel & Resorts'),
                    'category'    => 'case-study',
                    'tags'        => 'Full-Service',
                    'description' => 'Saved 184,000 gallons /month.',
                    'image_path'  => 'industries/hospitality/westin_fort_lauderdale.jpeg',
                    'sort_order'  => 1,
                    'is_featured' => 1,
                    'is_active'   => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                [
                    'industry_id' => $id,
                    'title'       => 'Even Hotels',
                    'slug'        => Str::slug('Even Hotels'),
                    'category'    => 'case-study',
                    'tags'        => 'Boutique',
                    'description' => 'Reduced consumption by 30%.',
                    'image_path'       => 'industries/hospitality/even-hotels-miami-5997860446-4x3.png',
                    'sort_order'  => 2,
                    'is_featured' => 1,
                    'is_active'   => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                [
                    'industry_id' => $id,
                    'title'       => 'Kimpton',
                    'slug'        => Str::slug('Kimpton'),
                    'category'    => 'case-study',
                    'tags'        => 'Independent',
                    'description' => 'Payback period in 11 months.',
                    'image_path'       => 'industries/hospitality/kimpton-hotel-palomar-phoenix-exterior-ea53d8e1.png',
                    'sort_order'  => 3,
                    'is_featured' => 1,
                    'is_active'   => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
            ]);
        }

        DB::table('assets')->insert([
            [
                'title'       => 'Energy Efficiency for Hotels',
                'slug'        => Str::slug('Energy Efficiency for Hotels'),
                'category'    => 'webinar',
                'description' => 'How hospitality leaders reduce energy costs.',
                'video_path'  => 'videos/webinars/hospitality-energy.mp4',
                'image_path'  => 'industries/hospitality/westin_fort_lauderdale.jpeg',
                'sort_order'  => 1,
                'is_active'   => 1,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ]);

        DB::table('assets')->insert([
            [
                'title'       => 'Maximizing Flow Efficiency in Commercial Buildings',
                'slug'        => Str::slug('Maximizing Flow Efficiency in Commercial Buildings'),
                'category'    => 'white-paper',
                'tags'        => 'FlowManagement',
                'description' => 'Discover how flow management systems reduce water and sewer costs by up to 30% across property portfolios.',
                'image_path'  => 'industries/hotel_industry_water_savings_2.jpeg',
                'sort_order'  => 1,
                'is_active'   => 1,
                'is_featured' => 0,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'title'       => 'Water Treatment Optimization for Cooling Towers',
                'slug'        => Str::slug('Water Treatment Optimization for Cooling Towers'),
                'category'    => 'white-paper',
                'tags'        => 'CoolingTowers',
                'description' => 'Learn about chemical-free water treatment technologies that improve cooling tower efficiency, reduce scale, and lower operating costs.',
                'image_path'  => 'industries/office_building_water_efficiency_1.jpeg',
                'sort_order'  => 2,
                'is_active'   => 1,
                'is_featured' => 0,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'title'       => 'Smart Water Monitoring in Educational Facilities',
                'slug'        => Str::slug('Smart Water Monitoring in Educational Facilities'),
                'category'    => 'white-paper',
                'tags'        => 'Education,SmartMonitoring',
                'description' => 'Explore the benefits of real-time water monitoring systems in schools to detect leaks, improve safety, and support sustainability goals.',
                'image_path'  => 'industries/campus_water_efficiency_2.jpeg',
                'sort_order'  => 3,
                'is_active'   => 1,
                'is_featured' => 0,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ]);

        DB::table('assets')->insert([
            [
                'title'       => 'Energy Savings Calculator',
                'slug'        => Str::slug('Energy Savings Calculator'),
                'category'    => 'tool',
                'description' => 'Estimate your hotel energy savings.',
                'image_path'       => 'industries/hospitality/even-hotels-miami-5997860446-4x3.png',
                'sort_order'  => 1,
                'is_active'   => 1,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ]);
    }
}
