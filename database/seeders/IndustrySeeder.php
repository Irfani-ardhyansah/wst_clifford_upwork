<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class IndustrySeeder extends Seeder
{
    public function run(): void
    {
        $arrHospitalityId = [];
        $hospitalityId = DB::table('industries')->insertGetId([
            'title'       => 'Hospitality',
            'slug'        => Str::slug('Hospitality'),
            'description' => 'Smart water reuse, leak detection, and accurate metering in hotels and resorts.',
            'image_path'  => 'images/industries/hospitality.jpg', // Placeholder
            'link_url'    => '#',
            'sort_order'  => 1,
            'is_active'   => true,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
        array_push($arrHospitalityId, $hospitalityId);

        $hospitalityId = DB::table('industries')->insertGetId([
            'title'       => 'Manufacturing & Industrial',
            'slug'        => Str::slug('Manufacturing & Industrial'),
            'description' => 'Process cooling, water reuse and high-volume system optimization.',
            'image_path'  => 'images/industries/manufacturing.jpg',
            'link_url'    => '#',
            'sort_order'  => 2,
            'is_active'   => true,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
        array_push($arrHospitalityId, $hospitalityId);

        $hospitalityId = DB::table('industries')->insertGetId([
            'title'       => 'Golf Courses',
            'slug'        => Str::slug('Golf Courses'),
            'description' => 'Will provide 3 irrigation case studies (Concours club, Kimpton, Ocean One).',
            'image_path'  => 'images/industries/golf.jpg',
            'link_url'    => '#',
            'sort_order'  => 3,
            'is_active'   => true,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
        array_push($arrHospitalityId, $hospitalityId);

        $hospitalityId = DB::table('industries')->insertGetId([
            'title'       => 'Health Care Facilities',
            'slug'        => Str::slug('Health Care Facilities'),
            'description' => 'Confidential coming soon (Use Jeffs).',
            'image_path'  => 'images/industries/healthcare.jpg',
            'link_url'    => '#',
            'sort_order'  => 4,
            'is_active'   => true,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
        array_push($arrHospitalityId, $hospitalityId);

        foreach($arrHospitalityId as $id) {
            DB::table('case_studies')->insert([
                [
                    'industry_id'      => $id, 
                    'title'            => 'Westin Hotel & Resorts',
                    'slug'             => Str::slug('Westin Hotel & Resorts'),
                    'category'         => 'Full-Service',
                    'impact_highlight' => 'Saved 184,000 gallons /month.',
                    'image_path'       => 'images/cases/westin.jpg',
                    'link_url'         => '#',
                    'sort_order'       => 1,
                    'is_featured'      => true,
                    'is_active'        => true,
                    'created_at'       => Carbon::now(),
                    'updated_at'       => Carbon::now(),
                ],
                [
                    'industry_id'      => $id,
                    'title'            => 'Even Hotels',
                    'slug'             => Str::slug('Even Hotels'),
                    'category'         => 'Boutique',
                    'impact_highlight' => 'Reduced consumption by 30%.',
                    'image_path'       => 'images/cases/even.jpg',
                    'link_url'         => '#',
                    'sort_order'       => 2,
                    'is_featured'      => true,
                    'is_active'        => true,
                    'created_at'       => Carbon::now(),
                    'updated_at'       => Carbon::now(),
                ],
                [
                    'industry_id'      => $id,
                    'title'            => 'Kimpton',
                    'slug'             => Str::slug('Kimpton'),
                    'category'         => 'Independent',
                    'impact_highlight' => 'Payback period in 11 months.',
                    'image_path'       => 'images/cases/kimpton.jpg',
                    'link_url'         => '#',
                    'sort_order'       => 3,
                    'is_featured'      => true,
                    'is_active'        => true,
                    'created_at'       => Carbon::now(),
                    'updated_at'       => Carbon::now(),
                ],
            ]);
        }
    }
}