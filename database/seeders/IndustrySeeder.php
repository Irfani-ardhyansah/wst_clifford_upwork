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
            'image_path'  => 'industries/hotel_industry_water_savings_2.jpeg', 
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
            'image_path'  => 'industries/manufacturing_water_effciency_1.jpeg',
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
            'image_path'  => 'industries/golf_course_water_savings_1.jpeg',
            'link_url'    => '#',
            'sort_order'  => 3,
            'is_active'   => true,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
        array_push($arrHospitalityId, $hospitalityId);

        DB::table('industries')->insert([
            'title'       => 'Health Care Facilities',
            'slug'        => Str::slug('Health Care Facilities'),
            'description' => 'Confidential coming soon (Use Jeffs).',
            'image_path'  => 'industries/healthcare_facility_water_efficiency_1.jpeg',
            'link_url'    => '#',
            'sort_order'  => 4,
            'is_active'   => true,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);
    }
}