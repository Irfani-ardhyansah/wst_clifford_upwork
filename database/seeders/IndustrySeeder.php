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
        $dataIndustries = [
            [
                'title' => 'Hospitality',
                'description' => 'Smart water reuse, leak detection, and accurate metering in hotels and resorts.',
                'image_path'  => 'industries/hotel_industry_water_savings_2.jpeg', 
                'sort_order'  => 1,
                'assets'   => [
                    ['Westin Hotel & Resorts', 'Saved 184,000 gallons/month.', 'Full-Service'],
                    ['Even Hotels', 'Reduced consumption by 30%.', 'Boutique'],
                    ['Kimpton', 'Payback period in 11 months.', 'Independent'],
                ]
            ],
            [
                'title' => 'Manufacturing & Industrial',
                'description' => 'Process cooling, water reuse and high-volume system optimization.',
                'image_path'  => 'industries/manufacturing_water_effciency_1.jpeg',
                'sort_order'  => 2,
                'assets'   => [
                    ['General Motors Plant', 'Cooling tower blowdown recovery.', 'Automotive'],
                    ['Tesla Gigafactory', 'Process water recycling system.', 'Tech'],
                    ['Coca-Cola Bottling', 'High-volume sterilization efficiency.', 'F&B'],
                ]
            ],
            [
                'title' => 'Golf Courses',
                'description' => 'Smart irrigation, reclaimed water strategies, and pump optimization.',
                'image_path'  => 'industries/golf_course_water_savings_1.jpeg',
                'sort_order'  => 3,
                'assets'   => [
                    ['The Concours Club', 'Smart irrigation zoning implementation.', 'Private Club'],
                    ['Ocean One Course', 'Reclaimed water filtration system.', 'Resort'],
                    ['Pebble Beach Links', 'Pump station energy optimization.', 'Championship'],
                ]
            ],
            [
                'title' => 'Health Care Facilities',
                'description' => 'Clean water compliance, critical infrastructure, and leak prevention.',
                'image_path' => 'industries/healthcare_facility_water_efficiency_1.jpeg',
                'sort_order'  => 4,
                'assets'   => [
                    ['Mayo Clinic', 'Sterilization equipment retrofitting.', 'Hospital'],
                    ['Cleveland Center', 'Dialysis water treatment upgrade.', 'Medical Center'],
                    ['Johns Hopkins', 'Critical leak detection prevention.', 'Research'],
                ]
            ],
            [
                'title' => 'Office Buildings',
                'description' => 'Centralized monitoring, fixture retrofits, and demand balance.',
                'image_path' => 'industries/office_building_water_efficiency_1.jpeg',
                'sort_order'  => 5,
                'assets'   => [
                    ['Empire State Building', 'Restroom fixture retrofit project.', 'Skyscraper'],
                    ['Salesforce Tower', 'Greywater reuse for landscaping.', 'Commercial'],
                    ['The Shard', 'Cooling system demand balancing.', 'Mixed-Use'],
                ]
            ],
            [
                'title' => 'Restaurants',
                'description' => 'Dishwashing, kitchen, restroom and HVAC savings optimization.',
                'image_path' => 'industries/restaurant_water_savings_1.jpeg',
                'sort_order'  => 6,
                'assets'   => [
                    ['Starbucks HQ', 'High-efficiency filtration rollout.', 'Chain'],
                    ['Chipotle', 'Kitchen prep water optimization.', 'Fast Casual'],
                    ['McDonalds', 'Restroom sensor implementation.', 'QSR'],
                ]
            ],
            [
                'title' => 'Schools, Universities & Stadiums',
                'description' => 'Whole-campus metering and bulk-use optimization for institutions.',
                'image_path' => 'industries/campus_water_efficiency_2.jpeg',
                'sort_order'  => 7,
                'assets'   => [
                    ['Harvard University', 'Dormitory showerhead retrofit.', 'University'],
                    ['Texas A&M', 'Irrigation field optimization.', 'Campus'],
                    ['Stanford Stadium', 'Bulk-use event monitoring.', 'Stadium'],
                ]
            ],
            [
                'title' => 'Senior Living Homes',
                'description' => 'Safe, accessible water systems with consistent flow monitoring.',
                'image_path' => 'industries/senior_living_home_water_savings_1.jpeg',
                'sort_order'  => 8,
                'assets'   => [
                    ['Sunrise Senior Living', 'Thermostatic mixing valve safety.', 'Residential'],
                    ['Brookdale', 'Accessible fixture upgrades.', 'Care Home'],
                    ['Holiday Retirement', 'Consistent pressure monitoring.', 'Retirement'],
                ]
            ],
            [
                'title' => 'Commercial Laundries',
                'description' => 'Water reuse and accurate flow control for high-throughput laundry systems.',
                'image_path' => 'industries/laundry_water_savings_1.jpeg',
                'sort_order'  => 9,
                'assets'   => [
                    ['Cintas Facility', 'Tunnel washer water reuse.', 'Industrial'],
                    ['Aramark Services', 'Flow control automation.', 'Uniforms'],
                    ['UniFirst Plant', 'Wastewater heat recovery.', 'Textile'],
                ]
            ],
            [
                'title' => 'Supermarkets',
                'description' => 'Cooling systems, sanitation stations, and fixture optimization.',
                'image_path' => 'industries/supermarket_water_savings_1.jpeg',
                'sort_order'  => 10,
                'assets'   => [
                    ['Whole Foods Market', 'Misting system efficiency.', 'Retail'],
                    ['Costco Wholesale', 'Food court filtration upgrade.', 'Big Box'],
                    ['Walmart Supercenter', 'Sanitation station metering.', 'Grocery'],
                ]
            ],
            [
                'title' => 'Service Stations & Car Washes',
                'description' => 'Rinse water recycling and pump performance optimization.',
                'image_path' => 'industries/carwash_water_saving_1.jpeg',
                'sort_order'  => 11,
                'assets'   => [
                    ['Mister Car Wash', 'Rinse water recycling loop.', 'Car Wash'],
                    ['Zips Car Wash', 'High-pressure pump tuning.', 'Express'],
                    ['Shell Station', 'Restroom & landscaping audit.', 'Service Station'],
                ]
            ],
            [
                'title' => 'Condominiums',
                'description' => 'Fair billing, leak detection, and water balance optimization.',
                'image_path' => 'industries/condo_water_savings_1.jpeg',
                'sort_order'  => 12,
                'assets'   => [
                    ['Turnberry Ocean', 'Individual unit sub-metering.', 'Luxury'],
                    ['Porsche Design Tower', 'Pool & spa leak detection.', 'High-Rise'],
                    ['The Estates', 'Common area water balancing.', 'Residential'],
                ]
            ],
            [
                'title' => 'Clubs & Marinas',
                'description' => 'Water efficiency for coastal and recreational venues.',
                'image_path' => 'industries/yacht_club_marina_water_savings_2.jpeg',
                'sort_order'  => 13,
                'assets'   => [
                    ['Miami Yacht Club', 'Dockside pedestal monitoring.', 'Marina'],
                    ['Soho House', 'Pool filtration efficiency.', 'Private Club'],
                    ['Monaco Port', 'Desalination unit integration.', 'International'],
                ]
            ],
            [
                'title' => 'Water Parks',
                'description' => 'Reclaim and reuse for rides, splash zones and locker facilities.',
                'image_path' => 'industries/water_park_resorts_water_savings_1.jpeg',
                'sort_order'  => 14,
                'assets'   => [
                    ['Typhoon Lagoon', 'Splash zone recirculation.', 'Theme Park'],
                    ['Volcano Bay', 'Ride flume water reclamation.', 'Resort'],
                    ['Schlitterbahn', 'Locker room efficiency upgrade.', 'Water Park'],
                ]
            ],
            [
                'title' => 'Others We Serve',
                'description' => 'Need a custom solution? We serve unique and hybrid-use cases too.',
                'image_path' => 'industries/others_we_serve_water_savings_1.jpeg',
                'sort_order'  => 15,
                'assets'   => [
                    ['Data Center X', 'Adiabatic cooling optimization.', 'Tech'],
                    ['International Airport', 'Terminal restroom overhaul.', 'Transportation'],
                    ['Cruise Ship Z', 'Onboard water purification.', 'Maritime'],
                ]
            ],
        ];

        foreach ($dataIndustries as $index => $item) {
            $industryId = DB::table('industries')->insertGetId([
                'title'       => $item['title'],
                'slug'        => Str::slug($item['title']),
                'description' => $item['description'],
                'sort_order'  => $index + 1,
                'image_path'  => $item['image_path'], 
                'link_url'    => '#',
                'is_active'   => true,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ]);

            $assetsBatch = [];
            foreach ($item['assets'] as $key => $asset) {
                $assetsBatch[] = [
                    'industry_id' => $industryId,
                    'title'       => $asset[0], 
                    'slug'        => Str::slug($asset[0]),
                    'description' => $asset[1], 
                    'tags'        => $asset[2], 
                    
                    'category'    => 'case-study',
                    'image_path'  => 'industries/hospitality/westin_fort_lauderdale.jpeg', 
                    'sort_order'  => $key + 1, 
                    'is_featured' => 1,
                    'is_active'   => 1,
                    'created_at'  => Carbon::now(),
                    'updated_at'  => Carbon::now(),
                ];
            }

            DB::table('assets')->insert($assetsBatch);
        }
    }
}