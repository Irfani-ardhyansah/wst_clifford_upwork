<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title'           => 'GRESB Water Score Benchmarks: Hotel REIT Performance in 2025',
                'slug'            => 'gresb-water-score-benchmarks-hotel-reit-2025',
                'category'        => 'ESG & GRESB Strategy',
                'excerpt'         => 'Hotel REITs average 67.7% on the water indicator in GRESB 2025 — the second-lowest performance indicator. Here\'s why the gap exists and how the three-step documentation programme closes it.',
                'target_audience' => ['Sustainability Managers', 'Asset Managers'],
                'source_type'     => 'editor',
                'content'         => $this->contentGresb(),
                'status'          => 'published',
                'published_at'    => Carbon::parse('2026-04-01'),
            ],
            [
                'title'           => 'Water Efficiency as a Cap Rate Lever: What Asset Managers Need to Know',
                'slug'            => 'water-efficiency-cap-rate-lever-asset-managers',
                'category'        => 'Financial Analysis',
                'excerpt'         => 'A $90K annual water saving adds $1.6M in asset value at a 5.5% cap rate. The complete financial framework for institutional CRE water management.',
                'target_audience' => ['Asset Managers', 'CFOs'],
                'source_type'     => 'editor',
                'content'         => $this->contentCapRate(),
                'status'          => 'published',
                'published_at'    => Carbon::parse('2026-04-01'),
            ],
            [
                'title'           => 'What a Commercial Water Audit Actually Finds: A Step-by-Step Guide',
                'slug'            => 'commercial-water-audit-step-by-step-guide',
                'category'        => 'Efficiency Audits',
                'excerpt'         => 'Most commercial properties carry billing errors, operational waste, and missed exemptions that compound over years. This guide explains the full audit process and what the output looks like.',
                'target_audience' => ['All Buyer Roles'],
                'source_type'     => 'editor',
                'content'         => $this->contentAudit(),
                'status'          => 'published',
                'published_at'    => Carbon::parse('2026-04-01'),
            ],
            [
                'title'           => 'How DiamondRock Hospitality Verified $2.3M in Water Savings',
                'slug'            => 'diamondrock-hospitality-verified-water-savings',
                'category'        => 'Case Study',
                'excerpt'         => 'DiamondRock had genuine field water improvements — but their GRESB score didn\'t show it. This is how WST closed the gap between field performance and documented outcomes across 31 assets.',
                'target_audience' => ['Asset Managers', 'Sustainability Managers'],
                'source_type'     => 'editor',
                'content'         => $this->contentDiamondRock(),
                'status'          => 'published',
                'published_at'    => Carbon::parse('2026-04-01'),
            ],
            [
                'title'           => 'IoT Water Monitoring ROI: Calculating Payback for Real Estate Portfolios',
                'slug'            => 'iot-water-monitoring-roi-real-estate-portfolios',
                'category'        => 'Smart Monitoring',
                'excerpt'         => 'Traditional meter reading misses 60–80% of water cost opportunities. The full ROI framework for IoT monitoring — what it detects, 8-month average payback, and GRESB indicator impact.',
                'target_audience' => ['Directors of Engineering', 'COOs'],
                'source_type'     => 'editor',
                'content'         => $this->contentIoT(),
                'status'          => 'published',
                'published_at'    => Carbon::parse('2026-04-01'),
            ],
        ];

        foreach ($articles as $article) {
            $article['target_audience'] = json_encode($article['target_audience']);
            $article['author_id']       = 1;
            $article['created_at']      = now();
            $article['updated_at']      = now();
            DB::table('articles')->insert($article);
        }
    }

    // ── Content HTML ─────────────────────────────────────────────

    private function contentGresb(): string
    {
        return <<<HTML
<article>
    <h1>GRESB Water Score Benchmarks: Hotel REIT Performance in 2025</h1>

    <p>Hotel REITs continue to underperform on water-related indicators within the GRESB Real Estate Assessment. In 2025, the average water indicator score sits at <strong>67.7%</strong> — the second-lowest across all performance categories. This article examines the structural reasons behind this gap and outlines a three-step documentation programme to close it.</p>

    <h2>Why Hotel REITs Underperform on Water</h2>
    <p>Unlike office or industrial assets, hotels operate with highly variable occupancy rates, multiple water-intensive amenities (pools, laundries, kitchens), and complex sub-metering requirements. The combination of operational complexity and inconsistent data collection creates a documentation deficit that GRESB scoring penalises directly.</p>

    <h2>The Three Core Gaps</h2>
    <ul>
        <li><strong>Sub-meter coverage:</strong> Less than 40% of hotel REITs report sub-meter data at the asset level.</li>
        <li><strong>Normalisation errors:</strong> Intensity metrics are frequently miscalculated due to occupancy weighting errors.</li>
        <li><strong>Third-party verification:</strong> Only 28% of hotel REIT submissions include independently verified water data.</li>
    </ul>

    <h2>The Three-Step Documentation Programme</h2>

    <h3>Step 1 — Baseline Audit</h3>
    <p>Conduct a full water audit across the portfolio to establish consumption baselines at the asset and system level. This includes utility bill reconciliation, sub-meter installation gap analysis, and identification of billing anomalies.</p>

    <h3>Step 2 — Data Infrastructure</h3>
    <p>Deploy IoT sub-metering across primary consumption nodes (HVAC, laundry, kitchen, irrigation). Integrate meter data into a centralised reporting platform that produces GRESB-compliant output formats.</p>

    <h3>Step 3 — Verified Reporting</h3>
    <p>Engage a third-party verifier aligned with GRESB's assurance requirements. Ensure that all intensity calculations use verified occupied-room-night denominators, and that year-over-year comparisons exclude acquisitions and disposals.</p>

    <h2>Expected Outcome</h2>
    <p>REITs that implement this programme across their portfolios have achieved score improvements of 12–18 percentage points on the water indicator within two GRESB cycles. The documentation programme also serves as the foundation for LEED, BREEAM, and ENERGY STAR water certifications.</p>
</article>
HTML;
    }

    private function contentCapRate(): string
    {
        return <<<HTML
<article>
    <h1>Water Efficiency as a Cap Rate Lever: What Asset Managers Need to Know</h1>

    <p>Water costs are a direct NOI line item — and in institutional commercial real estate, <strong>every $90,000 in annual water savings translates to approximately $1.6 million in asset value</strong> at a 5.5% cap rate. This article provides the complete financial framework for evaluating water efficiency investments across a CRE portfolio.</p>

    <h2>The NOI Mechanics</h2>
    <p>Net Operating Income drives asset valuation in commercial real estate. Water expenses — including utility costs, sewer charges, and stormwater fees — typically represent 8–14% of total utility spend for office and mixed-use assets, rising to 18–24% for hospitality and multifamily properties.</p>

    <p>Reducing this line item directly increases NOI, which at stabilised cap rates produces a multiplied increase in asset value:</p>

    <table>
        <thead>
            <tr>
                <th>Annual Water Saving</th>
                <th>Cap Rate 4.5%</th>
                <th>Cap Rate 5.5%</th>
                <th>Cap Rate 6.5%</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>$30,000</td><td>$667K</td><td>$545K</td><td>$462K</td></tr>
            <tr><td>$60,000</td><td>$1.33M</td><td>$1.09M</td><td>$923K</td></tr>
            <tr><td>$90,000</td><td>$2.0M</td><td>$1.64M</td><td>$1.38M</td></tr>
            <tr><td>$150,000</td><td>$3.33M</td><td>$2.73M</td><td>$2.31M</td></tr>
        </tbody>
    </table>

    <h2>Payback Period Analysis</h2>
    <p>Water efficiency interventions — sub-metering, fixture upgrades, cooling tower optimisation — typically carry project costs of $40,000–$120,000 per asset. At average water savings of $60,000–$90,000 annually, simple payback periods range from 8 to 18 months.</p>

    <h2>Portfolio-Level Compounding</h2>
    <p>Across a 20-asset portfolio with an average annual saving of $75,000 per asset, the aggregate NOI improvement reaches $1.5 million per year — producing $27.3 million in additional portfolio value at a 5.5% cap rate. This represents a return on water efficiency investment exceeding 15:1 in most institutional portfolios.</p>

    <h2>Integration with ESG Underwriting</h2>
    <p>Water efficiency now features explicitly in debt underwriting criteria for GSE loans, green bonds, and PACE financing. Documented water performance reduces insurance risk premiums and strengthens GRESB scores, which increasingly influence institutional LP due diligence.</p>
</article>
HTML;
    }

    private function contentAudit(): string
    {
        return <<<HTML
<article>
    <h1>What a Commercial Water Audit Actually Finds: A Step-by-Step Guide</h1>

    <p>Most commercial properties carry billing errors, operational waste, and missed exemptions that compound quietly over years. A professional water audit surfaces these issues systematically. This guide explains each phase of the audit process and what property owners and managers should expect at each stage.</p>

    <h2>Phase 1 — Utility Bill Analysis</h2>
    <p>The audit begins with 24–36 months of utility billing data. Auditors reconcile billed consumption against meter reads, identify rate classification errors, and flag anomalous spikes that may indicate leaks or billing mistakes. In a typical commercial portfolio, <strong>12–18% of properties carry active billing errors</strong> at any given time.</p>

    <h2>Phase 2 — On-Site Systems Assessment</h2>
    <p>A licensed auditor walks the property to assess all primary consumption systems:</p>
    <ul>
        <li>HVAC cooling towers and chilled water loops</li>
        <li>Domestic hot water systems and recirculation losses</li>
        <li>Restroom fixtures — toilets, urinals, faucets</li>
        <li>Irrigation systems and landscape water schedules</li>
        <li>Kitchen and laundry equipment (where applicable)</li>
        <li>Sub-meter coverage and dead zones</li>
    </ul>

    <h2>Phase 3 — Leak Detection</h2>
    <p>Acoustic leak detection equipment identifies pressurised pipe leaks that are invisible to visual inspection. Silent toilet leaks — the single most common finding — can waste 50,000–100,000 gallons per year per fixture without triggering any visible symptom.</p>

    <h2>Phase 4 — Rate and Exemption Review</h2>
    <p>Municipal water rate structures include sewer exemptions for irrigation and cooling tower make-up water that many properties fail to claim. The average unclaimed exemption across commercial portfolios audited by WST is $8,400 per year per property.</p>

    <h2>The Audit Output</h2>
    <p>A completed audit delivers a prioritised findings report with projected savings, implementation costs, and payback periods for each identified measure. The report also includes GRESB-compatible baseline data suitable for direct submission.</p>
</article>
HTML;
    }

    private function contentDiamondRock(): string
    {
        return <<<HTML
<article>
    <h1>How DiamondRock Hospitality Verified $2.3M in Water Savings</h1>

    <p>DiamondRock Hospitality had made genuine progress on water efficiency across their 31-asset hotel portfolio — but their GRESB water indicator score did not reflect it. The problem was documentation, not performance. This case study describes how WST closed the gap between field results and verified outcomes.</p>

    <h2>The Challenge</h2>
    <p>Between 2022 and 2024, DiamondRock implemented a series of operational water efficiency measures across their portfolio: low-flow fixture retrofits, cooling tower conductivity optimisation, linen reuse programme expansion, and irrigation scheduling upgrades. Field-level consumption data indicated meaningful reductions — but the data existed in disconnected property management systems, utility portals, and paper records.</p>

    <p>Without aggregated, normalised, and verified data, GRESB submissions could not reflect the actual performance improvement. The portfolio's water indicator score remained static despite real-world progress.</p>

    <h2>The WST Engagement</h2>
    <p>WST deployed a three-phase engagement across all 31 assets over an 8-month period:</p>

    <h3>Phase 1 — Data Aggregation (Months 1–2)</h3>
    <p>WST integrated utility billing feeds, sub-meter data, and property management system exports into a unified data platform. Missing historical data was reconstructed from utility provider archives.</p>

    <h3>Phase 2 — Normalisation and Verification (Months 3–5)</h3>
    <p>Consumption data was normalised against occupied room nights to produce GRESB-compliant intensity metrics. An independent third-party verifier reviewed the methodology and issued assurance statements for all 31 assets.</p>

    <h3>Phase 3 — GRESB Submission and Reporting (Months 6–8)</h3>
    <p>Verified data was formatted for direct GRESB portal submission. WST prepared the supporting evidence package and managed the submission process, including response to GRESB reviewer queries.</p>

    <h2>The Outcome</h2>
    <p>The verified submission documented <strong>$2.3 million in annual water cost savings</strong> across the portfolio — savings that had been operationally real but documentarily invisible. DiamondRock's water indicator score improved by 14 percentage points, moving the portfolio from the third quartile to the top quartile of hotel sector peers.</p>
</article>
HTML;
    }

    private function contentIoT(): string
    {
        return <<<HTML
<article>
    <h1>IoT Water Monitoring ROI: Calculating Payback for Real Estate Portfolios</h1>

    <p>Traditional monthly meter reading captures consumption totals — but it misses the timing, pattern, and system-level data that reveals where water costs are actually generated. Research across commercial real estate portfolios consistently shows that <strong>60–80% of actionable water cost opportunities are invisible to manual meter reading</strong>. IoT sub-metering closes this gap.</p>

    <h2>What IoT Monitoring Detects</h2>
    <p>Continuous IoT monitoring identifies issues that monthly reads cannot:</p>
    <ul>
        <li><strong>Silent leaks:</strong> Continuous flow signatures during unoccupied hours — typically 11pm to 5am — reveal leaks that accumulate without visible symptoms.</li>
        <li><strong>Cooling tower blowdown waste:</strong> Conductivity sensors identify inefficient cycles of concentration, reducing make-up water consumption by 15–30%.</li>
        <li><strong>Irrigation overrun:</strong> Smart controllers cross-referenced against weather data eliminate rain-day irrigation events.</li>
        <li><strong>Peak demand anomalies:</strong> Sudden demand spikes indicate equipment failures or unauthorised usage that would otherwise appear only on the next monthly bill.</li>
    </ul>

    <h2>The ROI Framework</h2>

    <h3>Deployment Cost</h3>
    <p>A full IoT sub-metering deployment for a 200,000 SF commercial office building typically costs $18,000–$35,000 installed, depending on existing infrastructure and the number of monitored nodes.</p>

    <h3>Annual Savings Profile</h3>
    <p>Across WST-monitored portfolios, the average annual water cost saving from IoT monitoring is $42,000 per asset — comprising leak elimination ($18K), cooling tower optimisation ($14K), and irrigation reduction ($10K).</p>

    <h3>Payback Period</h3>
    <p>At an average deployment cost of $26,000 and annual savings of $42,000, the average simple payback period is <strong>7.4 months</strong>. Across a 15-asset portfolio, the aggregate 5-year NPV of an IoT monitoring programme exceeds $2.8 million.</p>

    <h2>GRESB Impact</h2>
    <p>IoT monitoring provides the sub-meter coverage and data frequency required for GRESB's highest-scoring data quality bands. Properties with continuous sub-meter data consistently score 8–12 percentage points higher on the water indicator than comparable properties relying on utility bill data alone.</p>
</article>
HTML;
    }
}