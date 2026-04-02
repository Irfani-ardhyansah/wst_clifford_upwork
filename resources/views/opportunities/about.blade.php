@extends('layouts.app')

@section('title', 'About — Water Solutions Technology')

@section('content')

{{-- ─── HERO ─── --}}
<div class="about-hero">
  <img src="{{ asset('assets/img/about/about.png') }}" alt="Water Audit Engineer" class="about-hero-img" />
  <div class="about-hero-overlay"></div>
  <div class="about-hero-content">
    <div class="section-eyebrow" style="color:rgba(255,255,255,0.4);">Water Solutions Technology</div>
    <h1 class="about-hero-h1">
      Reimagining Water<br>
      as a <em>Strategic Asset</em>
    </h1>
    <p class="about-hero-sub">
      Precision technology. Data-driven insights. Turnkey execution.
    </p>
    <div class="about-hero-actions">
      <a href="/contact" class="btn-hero-primary">Start a Conversation</a>
      <a href="#about-commitment" class="btn-hero-ghost">Our Story</a>
    </div>
  </div>
</div>

{{-- ─── COMMITMENT ─── --}}
<section class="about-commit-section" id="about-commitment">
  <div class="about-commit-inner">
    <div>
      <div class="section-eyebrow">Our Commitment</div>
      <h2 class="section-h2">
        Empowering Commercial<br>
        Leaders to <em>Harness Water</em>
      </h2>
    </div>
    <div class="about-commit-body">
      <p class="section-sub" style="max-width:560px;">
        At Water Solutions Technology (WST), our commitment is to empower commercial property leaders to harness the full value of water. Through precision technology, data-driven insights, and turnkey execution, we help organizations reduce waste, lower operating costs, and lead in sustainability performance.
      </p>
    </div>
  </div>
</section>

{{-- ─── STATS STRIP ─── --}}
<div class="about-stats-strip">
  <div class="about-stat">
    <div class="about-stat-val count-up" data-target="500000" id="gallonsSaved">0</div>
    <div class="about-stat-lbl">Gallons of Water Saved</div>
  </div>
  <div class="about-stat-sep"></div>
  <div class="about-stat">
    <div class="about-stat-val count-up" data-target="250" id="projectsDelivered">0</div>
    <div class="about-stat-lbl">Projects Delivered</div>
  </div>
  <div class="about-stat-sep"></div>
  <div class="about-stat">
    <div class="about-stat-val count-up" data-target="50" id="blueChipClients">0</div>
    <div class="about-stat-lbl">Blue-Chip Clients Served</div>
  </div>
  <div class="about-stat-sep"></div>
  <div class="about-stat">
    <div class="about-stat-val count-up" data-target="1000" id="co2Reduced">0</div>
    <div class="about-stat-lbl">Tons of CO₂ Avoided</div>
  </div>
</div>

{{-- ─── WHO WE SERVE / WHAT WE DO ─── --}}
<section class="about-split-section">
  <div class="about-split-inner">

    <div class="about-split-item">
      <div class="about-split-text">
        <div class="section-eyebrow">Who We Serve</div>
        <h2 class="section-h2" style="font-size:clamp(1.6rem,3vw,2.4rem);">
          Commercial Real Estate<br><em>&amp; REIT Portfolios</em>
        </h2>
        <p class="section-sub">
          We support asset managers, property managers, CFOs, engineering directors, and ESG professionals who demand measurable, portfolio-wide results. Our clients span hospitality, healthcare, commercial real estate, schools, and manufacturing — each facing unique water and sustainability challenges.
        </p>
      </div>
      <div class="about-split-img-wrap">
        <img src="/assets/img/about/reit_water_saving_sustianability_built_environment_meter.png"
             alt="Who We Serve" class="about-split-img" />
      </div>
    </div>

    <div class="about-split-item about-split-item--reverse">
      <div class="about-split-img-wrap">
        <img src="/assets/img/about/water_meter_water saving.png"
             alt="What We Do" class="about-split-img" />
      </div>
      <div class="about-split-text">
        <div class="section-eyebrow">What We Do</div>
        <h2 class="section-h2" style="font-size:clamp(1.6rem,3vw,2.4rem);">
          Simplifying the<br><em>Business of Water</em>
        </h2>
        <p class="section-sub">
          From audits and scope studies to monitoring systems and flow optimization, WST provides the full spectrum of water stewardship tools. We turn complex plumbing systems into opportunities for operational savings, compliance, and carbon reduction — all with zero disruption to your operations.
        </p>
      </div>
    </div>

  </div>
</section>

{{-- ─── LEADING RESOURCES & NETWORK ─── --}}
<section class="about-resources-section">
  <div class="about-resources-inner">
    <div class="about-resources-header">
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Intelligence &amp; Access</div>
      <h2 class="section-h2" style="color:#fff;">
        Leading Resources<br>&amp; <em>Network</em>
      </h2>
      <p class="section-sub" style="color:rgba(255,255,255,0.5);max-width:480px;">
        We pair deep market intelligence with a high-trust industry network to deliver clarity, access, and measurable results.
      </p>
    </div>

    <div class="about-resources-grid">

      <div class="about-res-card">
        <h3 class="about-res-card-title">Proprietary Resources &amp; Intelligence</h3>
        <div class="about-res-items">
          <div class="about-res-item">
            <div class="about-res-label">Research &amp; Insights</div>
            <p>Proprietary research into segmentation, market trends, and competitive dynamics — translating signals into strategies.</p>
          </div>
          <div class="about-res-item">
            <div class="about-res-label">Technical Depth</div>
            <p>Broad technical, market, and regulatory perspectives that inform design choices and risk management.</p>
          </div>
          <div class="about-res-item">
            <div class="about-res-label">Benchmarks &amp; Data</div>
            <p>Exclusive 5,000+ company water-performance dataset powering realistic targets and portfolio benchmarking.</p>
          </div>
          <div class="about-res-item">
            <div class="about-res-label">Modeling &amp; Economics</div>
            <p>Lifecycle modeling, cost analysis, and scenario planning to prioritize projects with the strongest ROI.</p>
          </div>
        </div>
      </div>

      <div class="about-res-card">
        <h3 class="about-res-card-title">Strategic Network &amp; Access</h3>
        <div class="about-res-items">
          <div class="about-res-item">
            <div class="about-res-label">Executive Access</div>
            <p>Direct lines to industry leaders (CEOs, COOs, CTOs, SVPs) for rapid alignment and decision-making.</p>
          </div>
          <div class="about-res-item">
            <div class="about-res-label">Global Alliances</div>
            <p>Collaboration with international water organizations to share knowledge and accelerate adoption.</p>
          </div>
          <div class="about-res-item">
            <div class="about-res-label">Utilities &amp; Founders</div>
            <p>Connections with major utilities and founders — unlocking pilots, procurement, and scale.</p>
          </div>
          <div class="about-res-item">
            <div class="about-res-label">Capital Partners</div>
            <p>Backing from venture capital, private equity, and family offices to fund transformative projects.</p>
          </div>
        </div>
      </div>

    </div>

    <div class="about-res-cta">
      <div>
        <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Next Step</div>
        <p style="color:rgba(255,255,255,0.75);margin-top:4px;">Let's turn intelligence and access into results across your portfolio.</p>
      </div>
      <a href="/contact" class="btn-hero-primary">Start a Conversation</a>
    </div>
  </div>
</section>

{{-- ─── OUR PEOPLE ─── --}}
<section class="about-people-section" x-data="{
  activePerson: null,
  people: [
    { name: 'Benjamin Kinster', role: 'Senior Auditor | Partner', image: '/assets/img/about/people/tb-ceo.png', linkedin: '#', url: '#', x: '#', bio: 'Dr. Clifford Latty is a pioneer in water management, bringing over 30 years of field and executive experience. He\'s led groundbreaking projects in smart utility optimization and water sustainability.' },
    { name: 'Alex Rivera', role: 'Director of Engineering', image: '/assets/img/about/people/ed.png', linkedin: '#', url: '#', x: '#', bio: 'Alex Rivera has a deep background in civil and mechanical engineering. He oversees all technical project execution across our commercial portfolios and turns theory into high-performance water systems.' },
    { name: 'Naomi Johnson', role: 'ESG & Sustainability Lead', image: '/assets/img/about/people/mc.png', linkedin: '#', url: '#', x: '#', bio: 'Naomi Johnson is an ESG strategist with expertise in environmental reporting, sustainable development, and stakeholder engagement. She ensures our projects align with global sustainability standards.' },
    { name: 'Jordan Ellis', role: 'Operations Strategist', image: '/assets/img/about/people/nd.png', linkedin: '#', url: '#', x: '#', bio: 'Jordan Ellis bridges fieldwork and business strategy to ensure flawless operational execution. With a logistics background and a sharp eye for process efficiency, he keeps timelines and teams aligned.' },
    { name: 'Taylor Green', role: 'Water Efficiency Analyst', image: '/assets/img/about/people/dp.png', linkedin: '#', url: '#', x: '#', bio: 'Taylor Green leads our consumption and flow benchmarking division. With a data science background, Taylor finds actionable insights in water use patterns to deliver measurable efficiency gains.' },
    { name: 'Morgan Lee', role: 'Technical Project Manager', image: '/assets/img/about/people/cl.png', linkedin: '#', url: '#', x: '#', bio: 'Morgan Lee is responsible for orchestrating technical delivery across engineering, installation, and monitoring. Her cross-disciplinary project management background ensures strong outcomes across all departments.' },
    { name: 'Ranjith Kumar', role: 'IT Team Lead', image: '/assets/img/about/people/rk.jpeg', linkedin: 'https://www.linkedin.com/in/ranjithkumar31', url: '#', x: '#', bio: 'Ranjith leads our IT initiatives, driving innovation, strengthening system security, and ensuring technology aligns with business goals to keep Water Solution Technology ahead in a fast-changing digital landscape.' }
  ]
}">
  <div class="about-people-inner">
    <div class="about-people-header">
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">The Team</div>
      <h2 class="section-h2" style="color:#fff;">Our <em>People</em></h2>
      <p class="section-sub" style="color:rgba(255,255,255,0.5);">
        Our team combines engineering, sustainability, AI, and field operations — bringing utility expertise and ESG execution to every project.
      </p>
    </div>

    <ul class="about-people-grid">
      <template x-for="(person, index) in people" :key="index">
        <li class="about-person-card" @click="activePerson = person">
          <div class="about-person-img-wrap">
            <img :src="person.image" :alt="person.name" class="about-person-img" />
            <div class="about-person-img-overlay"></div>
          </div>
          <div class="about-person-info">
            <p class="about-person-name" x-text="person.name"></p>
            <p class="about-person-role" x-text="person.role"></p>
            <div class="about-person-socials">
              <a :href="person.linkedin" target="_blank" @click.stop aria-label="LinkedIn" class="about-social-link">in</a>
              <a :href="person.url" target="_blank" @click.stop aria-label="Website" class="about-social-link">↗</a>
            </div>
          </div>
        </li>
      </template>
    </ul>
  </div>

</section>

{{-- ─── BACKED BY INDUSTRY LEADERS ─── --}}
<section class="about-advisors-section" x-data="{
  activePerson: null,
  people: [
    { name: 'Dr. Danuta Leszczynska', role: 'Professor, Jack State University', image: '/assets/img/about/people/dl.png', linkedin: '#', url: '#', bio: 'Dr. Leszczynska is a leading environmental engineer whose work spans water contamination and remediation. Her expertise encompasses the detection and treatment of contaminants in water, stormwater, wastewater, and soil, pioneering constructed wetlands, phytoremediation, and photodegradation technologies.' },
    { name: 'Alex Rivera', role: 'Director of Engineering', image: '/assets/img/about/people/ed.png', linkedin: '#', url: '#', bio: 'Alex Rivera has a deep background in civil and mechanical engineering. He oversees all technical project execution across our commercial portfolios and turns theory into high-performance water systems.' },
    { name: 'Dr. Oliver Jones', role: 'Source Energy Global', image: '/assets/img/about/people/dr_o_j.jpg', linkedin: '#', url: '#', bio: 'Dr. Oliver Jones is at the forefront of innovative energy solutions. His leadership in the SourceEnergy Battery System — featuring graphene/graphite-based carbon nanotubes covered by gold — exemplifies his commitment to sustainable, high-performance energy technologies.' },
    { name: 'Jeff Chalfin', role: 'Flow Dynamics LLC', image: '/assets/img/about/people/jc_fd.jpg', linkedin: '#', url: '#', bio: 'Jeff bridges fieldwork and business strategy to ensure flawless operational execution. With a logistics background and a sharp eye for process efficiency, he keeps timelines and teams aligned.' },
    { name: 'Marc Freedman', role: 'Expense to Profit', image: '/assets/img/about/people/m_f.png', linkedin: '#', url: '#', bio: 'Marc Freedman leads consumption and flow benchmarking with a data science background — finding actionable insights in water use patterns to deliver measurable efficiency gains.' },
    { name: 'Ben Lapscher', role: 'Expense Reduction Coaching (ERC)', image: '/assets/img/about/people/bl_erc.jpg', linkedin: '#', url: '#', bio: 'Ben orchestrates technical delivery across engineering, installation, and monitoring. His cross-disciplinary project management background ensures strong outcomes across all departments.' }
  ]
}">
  <div class="about-people-inner">
    <div class="about-people-header">
      <div class="section-eyebrow">Strategic Advisors</div>
      <h2 class="section-h2">Backed by Proven<br><em>Industry Leaders</em></h2>
      <p class="section-sub" style="max-width:560px;">
        <span style="color:#1d4ed8;font-weight:500;">Water Solutions Technology</span> is supported by a distinguished network of
        <a href="#" style="color:#2563eb;">strategic advisors</a> who bring decades of hands-on experience in engineering, finance, policy, and innovation.
      </p>
    </div>

    <ul class="about-people-grid about-people-grid--light">
      <template x-for="(person, index) in people" :key="index">
        <li class="about-person-card about-person-card--light" @click="activePerson = person">
          <div class="about-person-img-wrap">
            <img :src="person.image" :alt="person.name" class="about-person-img" />
            <div class="about-person-img-overlay"></div>
          </div>
          <div class="about-person-info">
            <p class="about-person-name" style="color:#111;" x-text="person.name"></p>
            <p class="about-person-role" style="color:#666;" x-text="person.role"></p>
            <div class="about-person-socials">
              <a :href="person.linkedin" target="_blank" @click.stop aria-label="LinkedIn" class="about-social-link about-social-link--dark">in</a>
              <a :href="person.url" target="_blank" @click.stop aria-label="Website" class="about-social-link about-social-link--dark">↗</a>
            </div>
          </div>
        </li>
      </template>
    </ul>
  </div>

</section>

{{-- ─── VALUES ─── --}}
<section class="about-values-section">
  <div class="about-values-inner">
    <div class="about-values-header">
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Our Values</div>
      <h2 class="section-h2" style="color:#fff;">Core Shared <em>Values</em></h2>
      <p class="section-sub" style="color:rgba(255,255,255,0.5);max-width:480px;">
        Principles that guide how we build, serve, and lead — inside our teams and with every client we support.
      </p>
    </div>

    <div class="about-values-grid">
      <div class="about-value-card">
        <div class="about-value-bar"></div>
        <h3 class="about-value-title">We Believe in YHVH</h3>
        <p class="about-value-body">We believe in the one true Almighty who designed you with purpose — and when you walk in His ways, success follows.</p>
      </div>
      <div class="about-value-card">
        <div class="about-value-bar"></div>
        <h3 class="about-value-title">Remember Others</h3>
        <p class="about-value-body">We thrive best when we show kindness, empathy, and support for others.</p>
      </div>
      <div class="about-value-card">
        <div class="about-value-bar"></div>
        <h3 class="about-value-title">Keep Growing</h3>
        <p class="about-value-body">Be courageous. Make mistakes. Stay curious. Growth is an endless pursuit.</p>
      </div>
      <div class="about-value-card">
        <div class="about-value-bar"></div>
        <h3 class="about-value-title">Speak the Truth</h3>
        <p class="about-value-body">Honesty, candor, and clarity help us improve, trust more, and grow together.</p>
      </div>
      <div class="about-value-card">
        <div class="about-value-bar"></div>
        <h3 class="about-value-title">Be a Team Player</h3>
        <p class="about-value-body">Collaboration brings the most value — learning, solving, and achieving more together.</p>
      </div>
      <div class="about-value-card">
        <div class="about-value-bar"></div>
        <h3 class="about-value-title">Client Priority</h3>
        <p class="about-value-body">Transparency and excellence in service are how we grow alongside our clients.</p>
      </div>
    </div>
  </div>
</section>

{{-- ─── MANDATE / WHY IT MATTERS ─── --}}
<div class="mandate-strip">
  <div class="mandate-label">Why It Matters</div>
  <div class="mandate-items">
    <div class="mandate-item">Undervalued Resource<span>Water is the most mismanaged asset in the built environment</span></div>
    <div class="mandate-item">Driver of NOI<span>The right strategy converts water into measurable financial gain</span></div>
    <div class="mandate-item">ESG Performance<span>Verified data satisfies GRESB, LP disclosure, and ESG mandates</span></div>
    <div class="mandate-item">Operational Resilience<span>Real-time monitoring protects against costly, undetected failures</span></div>
  </div>
</div>

{{-- ─── FINAL CTA ─── --}}
<section class="contact-section" style="padding:0;">
  <div class="cc">
    <div>
      <div class="section-eyebrow" style="color:rgba(255,255,255,0.35);">Get Started</div>
      <h2 class="contact-h">Let's Talk<br>About Your Portfolio</h2>
      <p class="contact-sub">Water is one of the most undervalued resources in the built environment. With the right strategy, it becomes a key driver of NOI, ESG performance, and operational resilience. That's why we exist.</p>
      <div class="cc-btns">
        <a href="/contact" class="cc-btn-primary">Start a Conversation</a>
        <a href="/services" class="cc-btn-ghost">Our Services</a>
      </div>
    </div>
    <div class="cc-grid">
      <div class="cc-card">
        <div class="cc-card-lbl">Commitment</div>
        <div class="cc-card-title">Precision technology, not guesswork</div>
        <div class="cc-card-body">Every recommendation is backed by data, verified in the field, and documented for your investment committee.</div>
      </div>
      <div class="cc-card">
        <div class="cc-card-lbl">Our Reach</div>
        <div class="cc-card-title">Hospitality, CRE, Manufacturing</div>
        <div class="cc-card-body">Across all asset classes, our team delivers portfolio-wide water stewardship with zero disruption to operations.</div>
      </div>
      <div class="cc-card">
        <div class="cc-card-lbl">The Outcome</div>
        <div class="cc-card-title">Measurable, reportable savings</div>
        <div class="cc-card-body">25.3% average reduction. $2.3M documented savings. GRESB-verified. The outcomes are not estimated — they are measured.</div>
      </div>
      <div class="cc-card">
        <div class="cc-card-lbl">Network</div>
        <div class="cc-card-title">5,000+ company benchmark dataset</div>
        <div class="cc-card-body">Exclusive proprietary data powering realistic targets and portfolio benchmarking across all commercial sectors.</div>
      </div>
    </div>
  </div>
</section>

@endsection

@push('styles')
<style>
/* ═══════════════════════════════════════
   ABOUT PAGE — Styles matching Home aesthetic
   ═══════════════════════════════════════ */

/* ─── HERO ─── */
.about-hero {
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #000;
  overflow: hidden;
}
.about-hero-img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  opacity: .85;
}
.about-hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(0,0,0,.75) 40%, rgba(0,0,0,.45) 100%);
}
.about-hero-content {
  position: relative;
  z-index: 10;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: 0 24px;
  max-width: 780px;
}
.about-hero-h1 {
  font-size: clamp(2.4rem, 6vw, 4.5rem);
  font-weight: 300;
  color: #fff;
  line-height: 1.12;
  letter-spacing: -0.02em;
  margin: 16px 0 20px;
}
.about-hero-h1 em { font-style: italic; color: rgba(255,255,255,.65); }
.about-hero-sub {
  color: rgba(255,255,255,.55);
  font-size: 1.1rem;
  font-weight: 300;
  letter-spacing: .04em;
  margin-bottom: 32px;
}
.about-hero-actions { display: flex; gap: 12px; flex-wrap: wrap; justify-content: center; }

/* ─── COMMITMENT ─── */
.about-commit-section {
  background: #080808;
  padding: 96px 24px;
  border-bottom: 1px solid rgba(255,255,255,.06);
}
.about-commit-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: start;
}
@media(max-width:768px){ .about-commit-inner{ grid-template-columns:1fr; gap:32px; } }
.about-commit-body {}

/* ─── STATS STRIP ─── */
.about-stats-strip {
  background: #0d0d0d;
  border-top: 1px solid rgba(255,255,255,.06);
  border-bottom: 1px solid rgba(255,255,255,.06);
  padding: 40px 24px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  gap: 0;
  max-width: 100%;
}
.about-stat {
  text-align: center;
  padding: 16px 40px;
}
.about-stat-val {
  font-size: clamp(1.8rem, 4vw, 3rem);
  font-weight: 200;
  color: #fff;
  letter-spacing: -0.02em;
  font-variant-numeric: tabular-nums;
}
.about-stat-lbl {
  font-size: .72rem;
  letter-spacing: .12em;
  text-transform: uppercase;
  color: rgba(255,255,255,.35);
  margin-top: 6px;
}
.about-stat-sep {
  width: 1px;
  height: 40px;
  background: rgba(255,255,255,.1);
}
@media(max-width:640px){
  .about-stat-sep{ display:none; }
  .about-stat{ padding: 12px 20px; }
}

/* ─── SPLIT SECTIONS ─── */
.about-split-section {
  background: #fff;
  padding: 96px 24px;
}
.about-split-inner {
  max-width: 1100px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: 80px;
}
.about-split-item {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: center;
}
.about-split-item--reverse { }
@media(max-width:768px){
  .about-split-item{ grid-template-columns:1fr; gap:32px; }
  .about-split-item--reverse .about-split-img-wrap{ order:-1; }
}
.about-split-img-wrap { overflow: hidden; border-radius: 12px; }
.about-split-img {
  width: 100%;
  height: 360px;
  object-fit: cover;
  display: block;
  filter: grayscale(15%);
  transition: filter .4s, transform .4s;
}
.about-split-img:hover { filter: grayscale(0%); transform: scale(1.02); }
.about-split-text {}

/* ─── RESOURCES SECTION ─── */
.about-resources-section {
  background: #080808;
  padding: 96px 24px;
  border-top: 1px solid rgba(255,255,255,.06);
}
.about-resources-inner { max-width: 1100px; margin: 0 auto; }
.about-resources-header { margin-bottom: 56px; }
.about-resources-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 24px;
}
@media(max-width:768px){ .about-resources-grid{ grid-template-columns:1fr; } }
.about-res-card {
  border: 1px solid rgba(255,255,255,.08);
  border-radius: 16px;
  padding: 36px;
  background: rgba(255,255,255,.025);
  transition: border-color .3s, background .3s;
}
.about-res-card:hover {
  border-color: rgba(255,255,255,.15);
  background: rgba(255,255,255,.04);
}
.about-res-card-title {
  color: #fff;
  font-size: 1.1rem;
  font-weight: 500;
  letter-spacing: -.01em;
  margin-bottom: 28px;
}
.about-res-items { display: flex; flex-direction: column; gap: 0; }
.about-res-item { padding: 20px 0; border-top: 1px solid rgba(255,255,255,.07); }
.about-res-item:first-child { border-top: none; padding-top: 0; }
.about-res-label {
  font-size: .68rem;
  letter-spacing: .14em;
  text-transform: uppercase;
  color: rgba(255,255,255,.3);
  margin-bottom: 6px;
}
.about-res-item p {
  color: rgba(255,255,255,.6);
  font-size: .9rem;
  line-height: 1.6;
  font-weight: 300;
  margin: 0;
}
.about-res-cta {
  margin-top: 40px;
  border: 1px solid rgba(255,255,255,.08);
  border-radius: 12px;
  background: rgba(255,255,255,.025);
  padding: 24px 32px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 24px;
  flex-wrap: wrap;
}

/* ─── PEOPLE / ADVISORS ─── */
.about-people-section {
  background: #080808;
  padding: 96px 24px;
  position: relative;
  border-top: 1px solid rgba(255,255,255,.06);
}
.about-advisors-section {
  background: #f9f9f9;
  padding: 96px 24px;
  position: relative;
}
.about-people-inner { max-width: 1100px; margin: 0 auto; }
.about-people-header { margin-bottom: 56px; }
.about-people-grid {
  list-style: none;
  padding: 0;
  margin: 0;
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
  gap: 32px;
}
.about-person-card {
  cursor: pointer;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  gap: 14px;
  transition: transform .25s;
}
.about-person-card:hover { transform: translateY(-4px); }
.about-person-img-wrap {
  position: relative;
  width: 160px;
  height: 160px;
  border-radius: 50%;
  overflow: hidden;
  border: 1px solid rgba(255,255,255,.1);
}
.about-person-card--light .about-person-img-wrap {
  border-color: rgba(0,0,0,.1);
}
.about-person-img { width: 100%; height: 100%; object-fit: cover; display: block; }
.about-person-img-overlay {
  position: absolute;
  inset: 0;
  border-radius: 50%;
  background: rgba(0,0,0,0);
  transition: background .3s;
}
.about-person-card:hover .about-person-img-overlay { background: rgba(0,0,0,.15); }
.about-person-info {}
.about-person-name {
  font-size: .95rem;
  font-weight: 500;
  color: #fff;
  margin: 0;
}
.about-person-role {
  font-size: .8rem;
  color: rgba(255,255,255,.4);
  margin: 3px 0 0;
}
.about-person-socials {
  display: flex;
  justify-content: center;
  gap: 8px;
  margin-top: 8px;
}
.about-social-link {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 28px; height: 28px;
  border-radius: 50%;
  border: 1px solid rgba(255,255,255,.15);
  color: rgba(255,255,255,.5);
  font-size: .75rem;
  font-weight: 600;
  text-decoration: none;
  transition: border-color .2s, color .2s;
}
.about-social-link:hover { border-color: rgba(255,255,255,.5); color: #fff; }
.about-social-link--dark {
  border-color: rgba(0,0,0,.15);
  color: rgba(0,0,0,.45);
}
.about-social-link--dark:hover { border-color: rgba(0,0,0,.4); color: #111; }

/* ─── MODAL ─── */
.about-modal-backdrop {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,.75);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  padding: 24px;
  backdrop-filter: blur(4px);
}
.about-modal {
  background: #111;
  border: 1px solid rgba(255,255,255,.1);
  border-radius: 20px;
  padding: 40px;
  max-width: 680px;
  width: 100%;
  display: flex;
  gap: 32px;
  position: relative;
  align-items: flex-start;
}
@media(max-width:600px){ .about-modal{ flex-direction:column; } }
.about-modal-close {
  position: absolute;
  top: 16px; right: 20px;
  background: none;
  border: none;
  color: rgba(255,255,255,.4);
  font-size: 1.1rem;
  cursor: pointer;
  transition: color .2s;
  line-height: 1;
  padding: 4px 8px;
}
.about-modal-close:hover { color: #fff; }
.about-modal-photo { flex-shrink: 0; }
.about-modal-img {
  width: 140px;
  height: 140px;
  border-radius: 50%;
  object-fit: cover;
  border: 1px solid rgba(255,255,255,.1);
}
.about-modal-sep {
  width: 1px;
  background: rgba(255,255,255,.08);
  align-self: stretch;
  flex-shrink: 0;
}
.about-modal-content { flex: 1; }
.about-modal-name {
  font-size: 1.2rem;
  font-weight: 500;
  color: #fff;
  margin: 0 0 4px;
}
.about-modal-role {
  font-size: .82rem;
  color: rgba(255,255,255,.4);
  font-style: italic;
  margin: 0 0 16px;
}
.about-modal-bio {
  font-size: .88rem;
  color: rgba(255,255,255,.6);
  line-height: 1.7;
  font-weight: 300;
  margin: 0;
}

/* ─── VALUES ─── */
.about-values-section {
  background: #050505;
  padding: 96px 24px;
  border-top: 1px solid rgba(255,255,255,.06);
}
.about-values-inner { max-width: 1100px; margin: 0 auto; }
.about-values-header { margin-bottom: 56px; }
.about-values-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 20px;
}
.about-value-card {
  border: 1px solid rgba(255,255,255,.07);
  border-radius: 16px;
  padding: 28px 28px 32px;
  background: rgba(255,255,255,.02);
  transition: border-color .3s, background .3s;
}
.about-value-card:hover {
  border-color: rgba(255,255,255,.14);
  background: rgba(255,255,255,.035);
}
.about-value-bar {
  width: 36px;
  height: 3px;
  background: rgba(255,255,255,.5);
  border-radius: 99px;
  margin-bottom: 18px;
}
.about-value-title {
  font-size: 1rem;
  font-weight: 500;
  color: #fff;
  letter-spacing: -.01em;
  margin: 0 0 10px;
}
.about-value-body {
  font-size: .875rem;
  color: rgba(255,255,255,.5);
  line-height: 1.65;
  font-weight: 300;
  margin: 0;
}

/* ─── Advisors section light override ─── */
.about-advisors-section .about-people-header .section-eyebrow { color: #888; }
</style>
@endpush

@push('scripts')
  <script src="/assets/js/about.js"></script>
@endpush