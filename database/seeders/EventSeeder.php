<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            // ─────────────────────────────────────────────
            // 1. Opal Group Real Estate Investment Summit 2026
            // Jul 14, 2026 | FEATURED (dark card) | UPCOMING
            // ─────────────────────────────────────────────
            [
                'title'               => 'Opal Group Real Estate Investment Summit 2026',
                'slug'                => 'opal-group-real-estate-investment-summit-2026',
                'description'         => 'WST attending the 2026 Opal Group Real Estate Investment Summit — the primary institutional real estate investment conference for fund managers, asset managers, and institutional allocators in the Southeast. The event brings together 200+ institutional decision-makers across hotel, office, and mixed-use asset classes.',
                'event_date'          => '2026-07-14',
                'event_time'          => null,
                'location'            => 'The Breakers, Palm Beach, FL',
                'is_virtual'          => false,
                'event_type'          => 'conference',
                'attendance_status'   => 'ATTENDING',
                'attendance_label'    => 'SPEAKING OPPORTUNITY PURSUED',
                'image_path'          => null,
                'is_featured'         => true,
                'external_url'        => null,
                'status'              => 1,
                'sort_order'          => 1,
            ],

            // ─────────────────────────────────────────────
            // 2. NAREIT REITweek 2026 — Investor Conference
            // Jun 23, 2026 | UPCOMING
            // ─────────────────────────────────────────────
            [
                'title'               => 'NAREIT REITweek 2026 — Investor Conference',
                'slug'                => 'nareit-reitweek-2026-investor-conference',
                'description'         => 'The annual NAREIT investor conference bringing together 4,000+ REIT executives, institutional investors, and advisors. WST is targeting attendance to connect with sustainability and ESG teams at listed hotel and office REITs engaged in GRESB reporting.',
                'event_date'          => '2026-06-23',
                'event_time'          => null,
                'location'            => 'New York, NY',
                'is_virtual'          => false,
                'event_type'          => 'conference',
                'attendance_status'   => 'ATTENDING',
                'attendance_label'    => null,
                'image_path'          => null,
                'is_featured'         => false,
                'external_url'        => null,
                'status'              => 1,
                'sort_order'          => 2,
            ],

            // ─────────────────────────────────────────────
            // 3. ULI Spring Meeting 2026
            // May 19, 2026 | UPCOMING
            // ─────────────────────────────────────────────
            [
                'title'               => 'ULI Spring Meeting 2026',
                'slug'                => 'uli-spring-meeting-2026',
                'description'         => 'Urban Land Institute Spring Meeting — the primary gathering of real estate developers, investors, and professionals across all asset classes. WST attending with focus on ESG working sessions and sustainability-focused networking.',
                'event_date'          => '2026-05-19',
                'event_time'          => null,
                'location'            => 'Denver, CO',
                'is_virtual'          => false,
                'event_type'          => 'conference',
                'attendance_status'   => 'ATTENDING',
                'attendance_label'    => null,
                'image_path'          => null,
                'is_featured'         => false,
                'external_url'        => null,
                'status'              => 1,
                'sort_order'          => 3,
            ],

            // ─────────────────────────────────────────────
            // 4. GRESB Water Management Workshop — Regional Insights
            // May 07, 2026 | Virtual | UPCOMING
            // ─────────────────────────────────────────────
            [
                'title'               => 'GRESB Water Management Workshop — Regional Insights',
                'slug'                => 'gresb-water-management-workshop-regional-insights',
                'description'         => 'GRESB Solution Provider Partner workshop on water indicator optimisation for the 2026 submission cycle. WST presenting on WTI data coverage methodology and Ara AI\'s automated bill acquisition approach for closing coverage gaps before submission deadlines.',
                'event_date'          => '2026-05-07',
                'event_time'          => null,
                'location'            => 'Virtual (GRESB Partner Event)',
                'is_virtual'          => true,
                'event_type'          => 'workshop',
                'attendance_status'   => 'PRESENTING',
                'attendance_label'    => 'WST GRESB PARTNER',
                'image_path'          => null,
                'is_featured'         => false,
                'external_url'        => null,
                'status'              => 1,
                'sort_order'          => 4,
            ],

            // ─────────────────────────────────────────────
            // 5. Florida BOMA Annual Conference & Expo
            // Apr 28, 2026 | UPCOMING (Speaking Engagement)
            // ─────────────────────────────────────────────
            [
                'title'               => 'Florida BOMA Annual Conference & Expo',
                'slug'                => 'florida-boma-annual-conference-expo-2026',
                'description'         => 'Building Owners and Managers Association Florida Annual Conference. WST presenting on water billing forensics and GRESB water documentation methodology for the commercial real estate facilities management community.',
                'event_date'          => '2026-04-28',
                'event_time'          => null,
                'location'            => 'Orlando, FL',
                'is_virtual'          => false,
                'event_type'          => 'speaking_engagement',
                'attendance_status'   => 'SPEAKING',
                'attendance_label'    => 'WATER BILLING & GRESB SESSION',
                'image_path'          => null,
                'is_featured'         => false,
                'external_url'        => null,
                'status'              => 1,
                'sort_order'          => 5,
            ],

            // ─────────────────────────────────────────────
            // 6. GRESB Regional Insights — Southeast US
            // Mar 18, 2026 | PAST EVENT
            // ─────────────────────────────────────────────
            [
                'title'               => 'GRESB Regional Insights — Southeast US',
                'slug'                => 'gresb-regional-insights-southeast-us-2026',
                'description'         => 'GRESB Southeast regional briefing on 2025 benchmark results and 2026 methodology updates. WST presented analysis of Hotel/Americas water indicator data including DiamondRock\'s 2025 results.',
                'event_date'          => '2026-03-18',
                'event_time'          => null,
                'location'            => 'Miami, FL',
                'is_virtual'          => false,
                'event_type'          => 'conference',
                'attendance_status'   => 'PRESENTED',
                'attendance_label'    => 'GRESB SOLUTION PROVIDER PARTNER',
                'image_path'          => null,
                'is_featured'         => false,
                'external_url'        => null,
                'status'              => 1,      // 0 = inactive
                'sort_order'          => 6,
            ],
        ];

        foreach ($events as $event) {
            DB::table('events')->updateOrInsert(
                ['slug' => $event['slug']],
                array_merge($event, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}