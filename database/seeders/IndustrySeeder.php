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
        $now = Carbon::now();

        // ── STRUKTUR HIERARKI ─────────────────────────────────────
        // Parent → Children (sesuai gambar)
        //
        // Commercial Real Estate
        //   ├── Commercial Real Estate Portfolio
        //   ├── Office Buildings
        //   ├── Supermarkets
        //   ├── Restaurants
        //   ├── Service Stations & Car Washes
        //   └── Others We Serve
        // Hospitality
        //   ├── Hospitality (General)
        //   ├── Golf Courses
        //   ├── Clubs & Marinas
        //   └── Water Parks
        // Multifamily
        //   ├── Condominiums
        //   └── Senior Living Homes
        // Health Care
        //   └── Health Care Facilities
        // Education
        //   ├── Schools (Pre-K12)
        //   └── Universities & Stadiums
        // Industrial
        //   ├── Manufacturing & Industrial
        //   └── Commercial Laundries

        $structure = [
            // ── PARENT 1 ──────────────────────────────────────────
            [
                'title'       => 'Commercial Real Estate',
                'description' => 'Water efficiency solutions for commercial real estate including offices, retail, and mixed-use properties.',
                'image_path'  => 'industries/office_building_water_efficiency_1.jpeg',
                'sort_order'  => 1,
                'children'    => [
                    [
                        'title'       => 'Commercial Real Estate Portfolio',
                        'description' => 'Portfolio-wide water metering, monitoring and ESG reporting for commercial real estate owners.',
                        'image_path'  => 'industries/office_building_water_efficiency_1.jpeg',
                        'sort_order'  => 1,
                        'assets'      => [
                            ['Brookfield Properties', 'Portfolio-wide sub-metering rollout.', 'Portfolio'],
                            ['CBRE Global', 'ESG water reporting integration.', 'Asset Management'],
                            ['JLL Portfolio', 'Centralized leak detection system.', 'Commercial'],
                        ],
                    ],
                    [
                        'title'       => 'Office Buildings',
                        'description' => 'Centralized monitoring, fixture retrofits, and demand balance for office properties.',
                        'image_path'  => 'industries/office_building_water_efficiency_1.jpeg',
                        'sort_order'  => 2,
                        'assets'      => [
                            ['Empire State Building', 'Restroom fixture retrofit project.', 'Skyscraper'],
                            ['Salesforce Tower',      'Greywater reuse for landscaping.',   'Commercial'],
                            ['The Shard',             'Cooling system demand balancing.',    'Mixed-Use'],
                        ],
                    ],
                    [
                        
                        'title'       => 'Supermarkets',
                        'description' => 'Cooling systems, sanitation stations, and fixture optimization for grocery retail.',
                        'image_path'  => 'industries/supermarket_water_savings_1.jpeg',
                        'sort_order'  => 3,
                        'assets'      => [
                            ['Whole Foods Market', 'Misting system efficiency.',         'Retail'],
                            ['Costco Wholesale',   'Food court filtration upgrade.',     'Big Box'],
                            ['Walmart Supercenter','Sanitation station metering.',        'Grocery'],
                        ],
                    ],
                    [
                        'title'       => 'Restaurants',
                        'description' => 'Dishwashing, kitchen, restroom and HVAC savings optimization for food service.',
                        'image_path'  => 'industries/restaurant_water_savings_1.jpeg',
                        'sort_order'  => 4,
                        'assets'      => [
                            ['Starbucks HQ', 'High-efficiency filtration rollout.',  'Chain'],
                            ['Chipotle',     'Kitchen prep water optimization.',      'Fast Casual'],
                            ['McDonalds',    'Restroom sensor implementation.',       'QSR'],
                        ],
                    ],
                    [
                        'title'       => 'Service Stations & Car Washes',
                        'description' => 'Rinse water recycling and pump performance optimization for auto service facilities.',
                        'image_path'  => 'industries/carwash_water_saving_1.jpeg',
                        'sort_order'  => 5,
                        'assets'      => [
                            ['Mister Car Wash', 'Rinse water recycling loop.',          'Car Wash'],
                            ['Zips Car Wash',   'High-pressure pump tuning.',           'Express'],
                            ['Shell Station',   'Restroom & landscaping audit.',        'Service Station'],
                        ],
                    ],
                    [
                        'title'       => 'Others We Serve',
                        'description' => 'Need a custom solution? We serve unique and hybrid commercial use cases too.',
                        'image_path'  => 'industries/others_we_serve_water_savings_1.jpeg',
                        'sort_order'  => 6,
                        'assets'      => [
                            ['Data Center X',          'Adiabatic cooling optimization.',   'Tech'],
                            ['International Airport',  'Terminal restroom overhaul.',       'Transportation'],
                            ['Cruise Ship Z',          'Onboard water purification.',       'Maritime'],
                        ],
                    ],
                ],
            ],

            // ── PARENT 2 ──────────────────────────────────────────
            [
                'title'       => 'Hospitality',
                'description' => 'Smart water management solutions across hotels, resorts, golf courses, and recreational venues.',
                'image_path'  => 'industries/hotel_industry_water_savings_2.jpeg',
                'sort_order'  => 2,
                'children'    => [
                    [
                        'title'       => 'Hospitality (General)',
                        'description' => 'Smart water reuse, leak detection, and accurate metering in hotels and resorts.',
                        'image_path'  => 'industries/hotel_industry_water_savings_2.jpeg',
                        'sort_order'  => 1,
                        'assets'      => [
                            ['Westin Hotel & Resorts', 'Saved 184,000 gallons/month.', 'Full-Service'],
                            ['Even Hotels',            'Reduced consumption by 30%.', 'Boutique'],
                            ['Kimpton',                'Payback period in 11 months.', 'Independent'],
                        ],
                    ],
                    [
                        'title'       => 'Golf Courses',
                        'description' => 'Smart irrigation, reclaimed water strategies, and pump optimization for golf facilities.',
                        'image_path'  => 'industries/golf_course_water_savings_1.jpeg',
                        'sort_order'  => 2,
                        'assets'      => [
                            ['The Concours Club', 'Smart irrigation zoning implementation.', 'Private Club'],
                            ['Ocean One Course',  'Reclaimed water filtration system.',      'Resort'],
                            ['Pebble Beach Links','Pump station energy optimization.',       'Championship'],
                        ],
                    ],
                    [
                        'title'       => 'Clubs & Marinas',
                        'description' => 'Water efficiency solutions for coastal and recreational club venues.',
                        'image_path'  => 'industries/yacht_club_marina_water_savings_2.jpeg',
                        'sort_order'  => 3,
                        'assets'      => [
                            ['Miami Yacht Club', 'Dockside pedestal monitoring.',      'Marina'],
                            ['Soho House',       'Pool filtration efficiency.',         'Private Club'],
                            ['Monaco Port',      'Desalination unit integration.',      'International'],
                        ],
                    ],
                    [
                        'title'       => 'Water Parks',
                        'description' => 'Reclaim and reuse for rides, splash zones and locker facilities.',
                        'image_path'  => 'industries/water_park_resorts_water_savings_1.jpeg',
                        'sort_order'  => 4,
                        'assets'      => [
                            ['Typhoon Lagoon', 'Splash zone recirculation.',           'Theme Park'],
                            ['Volcano Bay',    'Ride flume water reclamation.',        'Resort'],
                            ['Schlitterbahn', 'Locker room efficiency upgrade.',       'Water Park'],
                        ],
                    ],
                ],
            ],

            // ── PARENT 3 ──────────────────────────────────────────
            [
                'title'       => 'Multifamily',
                'description' => 'Water management solutions for residential communities including condos and senior living.',
                'image_path'  => 'industries/condo_water_savings_1.jpeg',
                'sort_order'  => 3,
                'children'    => [
                    [
                        'title'       => 'Condominiums',
                        'description' => 'Fair billing, leak detection, and water balance optimization for condo properties.',
                        'image_path'  => 'industries/condo_water_savings_1.jpeg',
                        'sort_order'  => 1,
                        'assets'      => [
                            ['Turnberry Ocean',       'Individual unit sub-metering.',    'Luxury'],
                            ['Porsche Design Tower',  'Pool & spa leak detection.',       'High-Rise'],
                            ['The Estates',           'Common area water balancing.',     'Residential'],
                        ],
                    ],
                    [
                        'title'       => 'Senior Living Homes',
                        'description' => 'Safe, accessible water systems with consistent flow monitoring for senior facilities.',
                        'image_path'  => 'industries/senior_living_home_water_savings_1.jpeg',
                        'sort_order'  => 2,
                        'assets'      => [
                            ['Sunrise Senior Living', 'Thermostatic mixing valve safety.', 'Residential'],
                            ['Brookdale',             'Accessible fixture upgrades.',      'Care Home'],
                            ['Holiday Retirement',    'Consistent pressure monitoring.',  'Retirement'],
                        ],
                    ],
                ],
            ],

            // ── PARENT 4 ──────────────────────────────────────────
            [
                'title'       => 'Health Care',
                'description' => 'Clean water compliance and critical infrastructure solutions for health care environments.',
                'image_path'  => 'industries/healthcare_facility_water_efficiency_1.jpeg',
                'sort_order'  => 4,
                'children'    => [
                    [
                        'title'       => 'Health Care Facilities',
                        'description' => 'Clean water compliance, critical infrastructure, and leak prevention for medical facilities.',
                        'image_path'  => 'industries/healthcare_facility_water_efficiency_1.jpeg',
                        'sort_order'  => 1,
                        'assets'      => [
                            ['Mayo Clinic',      'Sterilization equipment retrofitting.',   'Hospital'],
                            ['Cleveland Center', 'Dialysis water treatment upgrade.',       'Medical Center'],
                            ['Johns Hopkins',    'Critical leak detection prevention.',     'Research'],
                        ],
                    ],
                ],
            ],

            // ── PARENT 5 ──────────────────────────────────────────
            [
                'title'       => 'Education',
                'description' => 'Whole-campus water metering and efficiency solutions for educational institutions.',
                'image_path'  => 'industries/campus_water_efficiency_2.jpeg',
                'sort_order'  => 5,
                'children'    => [
                    [
                        'title'       => 'Schools (Pre-K12)',
                        'description' => 'Water efficiency and safety solutions for K-12 school campuses.',
                        'image_path'  => 'industries/campus_water_efficiency_2.jpeg',
                        'sort_order'  => 1,
                        'assets'      => [
                            ['Miami-Dade Schools',  'Restroom sensor retrofit program.',   'Public School'],
                            ['Phillips Academy',    'Campus-wide leak detection.',         'Private School'],
                            ['BASIS Charter',       'Water consumption benchmarking.',     'Charter'],
                        ],
                    ],
                    [
                        'title'       => 'Universities & Stadiums',
                        'description' => 'Whole-campus metering and bulk-use optimization for universities and stadiums.',
                        'image_path'  => 'industries/campus_water_efficiency_2.jpeg',
                        'sort_order'  => 2,
                        'assets'      => [
                            ['Harvard University', 'Dormitory showerhead retrofit.',      'University'],
                            ['Texas A&M',          'Irrigation field optimization.',       'Campus'],
                            ['Stanford Stadium',   'Bulk-use event monitoring.',          'Stadium'],
                        ],
                    ],
                ],
            ],

            // ── PARENT 6 ──────────────────────────────────────────
            [
                'title'       => 'Industrial',
                'description' => 'High-volume water process optimization for manufacturing and industrial operations.',
                'image_path'  => 'industries/manufacturing_water_effciency_1.jpeg',
                'sort_order'  => 6,
                'children'    => [
                    [
                        'title'       => 'Manufacturing & Industrial',
                        'description' => 'Process cooling, water reuse and high-volume system optimization for manufacturers.',
                        'image_path'  => 'industries/manufacturing_water_effciency_1.jpeg',
                        'sort_order'  => 1,
                        'assets'      => [
                            ['General Motors Plant', 'Cooling tower blowdown recovery.',     'Automotive'],
                            ['Tesla Gigafactory',    'Process water recycling system.',      'Tech'],
                            ['Coca-Cola Bottling',   'High-volume sterilization efficiency.','F&B'],
                        ],
                    ],
                    [
                        'title'       => 'Commercial Laundries',
                        'description' => 'Water reuse and accurate flow control for high-throughput laundry operations.',
                        'image_path'  => 'industries/laundry_water_savings_1.jpeg',
                        'sort_order'  => 2,
                        'assets'      => [
                            ['Cintas Facility',  'Tunnel washer water reuse.',          'Industrial'],
                            ['Aramark Services', 'Flow control automation.',            'Uniforms'],
                            ['UniFirst Plant',   'Wastewater heat recovery.',           'Textile'],
                        ],
                    ],
                ],
            ],
        ];

        // ── INSERT ────────────────────────────────────────────────
        foreach ($structure as $parentData) {
            // 1. Insert parent
            $parentId = DB::table('industries')->insertGetId([
                'parent_id'   => null,
                'title'       => $parentData['title'],
                'slug'        => Str::slug($parentData['title']),
                'description' => $parentData['description'],
                'image_path'  => $parentData['image_path'],
                'sort_order'  => $parentData['sort_order'],
                'is_featured' => false,
                'is_active'   => 1,
                'created_at'  => $now,
                'updated_at'  => $now,
            ]);

            // 2. Insert children
            foreach ($parentData['children'] as $childData) {
                $childId = DB::table('industries')->insertGetId([
                    'parent_id'   => $parentId,
                    'title'       => $childData['title'],
                    'slug'        => Str::slug($childData['title']),
                    'description' => $childData['description'],
                    'image_path'  => $childData['image_path'],
                    'sort_order'  => $childData['sort_order'],
                    'is_featured' => false,
                    'is_active'   => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ]);

                // 3. Insert assets per child
                $assetsBatch = [];
                foreach ($childData['assets'] as $key => $asset) {
                    $assetsBatch[] = [
                        'industry_id' => $childId,
                        'title'       => $asset[0],
                        'slug'        => Str::slug($asset[0]),
                        'description' => $asset[1],
                        'tags'        => $asset[2],
                        'category'    => 'case-study',
                        'image_path'  => 'industries/hospitality/westin_fort_lauderdale.jpeg',
                        'sort_order'  => $key + 1,
                        'is_featured' => 1,
                        'is_active'   => 1,
                        'created_at'  => $now,
                        'updated_at'  => $now,
                    ];
                }

                DB::table('assets')->insert($assetsBatch);
            }
        }
    }
}