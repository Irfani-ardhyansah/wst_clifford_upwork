@php
    use App\Models\Industry;
    
    static $industries = null;
    
    if ($industries === null) {
        $all = Industry::active()
            ->orderBy('sort_order')
            ->get()
            ->keyBy('id');

        $all->each(fn($i) => $i->setRelation('allChildren', collect()));

        $all->each(function ($industry) use ($all) {
            if (
                $industry->parent_id &&
                $industry->parent_id !== $industry->id &&
                $all->has($industry->parent_id)
            ) {
                $all->get($industry->parent_id)->allChildren->push($industry);
            }
        });

        $industries = $all->filter(fn($i) => is_null($i->parent_id))->values();
    }
@endphp

<!-- TOP BAR -->
<div class="top-bar">
  <a href="{{ route('opportunities.investor') }}">Investors</a>
  <a href="{{ route('opportunities.about') }}">About</a>
  <div class="tb-dropdown-wrap">
    <a href="#">Opportunities
      <svg width="9" height="6" viewBox="0 0 10 6" fill="currentColor"><path d="M0 0l5 6 5-6z"/></svg>
    </a>
    <div class="tb-dropdown">
      <div class="tb-dropdown-header">Opportunities</div>
      <a href="{{ route('opportunities.mep_installers') }}">MEP Servicers</a>
      <a href="{{ route('opportunities.careers') }}">Careers</a>
      <a href="{{ route('opportunities.agents') }}">Agents</a>
    </div>
  </div>
@if(Auth::check())
    <a href="#" 
       onclick="event.preventDefault(); document.getElementById('nav-logout-form').submit();" 
       style="color:rgba(255,255,255,0.45); cursor:pointer; text-decoration:none; display:flex; align-items:center;">
        
        <svg width="12" height="12" viewBox="0 0 12 12" fill="currentColor" style="margin-right:4px;opacity:0.5">
            <circle cx="6" cy="4" r="2.5"/>
            <path d="M1 11c0-2.76 2.24-5 5-5s5 2.24 5 5"/>
        </svg>
        LOGOUT
    </a>

    <form id="nav-logout-form" method="POST" action="{{ route('logout') }}" style="display:none;">
        @csrf
    </form>
@else
    <a href="{{ route('login') }}" 
       style="color:rgba(255,255,255,0.45); text-decoration:none; display:flex; align-items:center;">
        
        <svg width="12" height="12" viewBox="0 0 12 12" fill="currentColor" style="margin-right:4px;opacity:0.5">
            <circle cx="6" cy="4" r="2.5"/>
            <path d="M1 11c0-2.76 2.24-5 5-5s5 2.24 5 5"/>
        </svg>
        LOGIN
    </a>
@endif
</div>

<!-- NAV -->
<nav>
  <!-- To use a PNG logo: replace the SVG below with
       <img src="/assets/img/wst-logo.png" alt="Water Solutions Technology" style="height:44px;width:auto;"/>
       inside the .nav-logo-wrap anchor tag. -->
  <a href="{{route('index')}}"><img src="{{ asset('assets/images/logo_fix.svg') }}" alt="Water Solutions Technology Logo"
  style="height:70px; width:auto; display:block;"/></a>

  <ul class="nav-links">

    <!-- ABOUT — plain link, no dropdown -->
    <li>
      <a href="{{ route('portfolio-intelligence') }}">Portfolio Intelligence</a>
    </li>

    <!-- SERVICES — dropdown -->
    <li>
      <a href="#">Services <svg viewBox="0 0 10 6" fill="currentColor"><path d="M0 0l5 6 5-6z"/></svg></a>
      <div class="dropdown">
        <div class="dropdown-section-label" style="padding:10px 16px 4px;font-size:9px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;color:#999;">Services</div>
        <a href="{{ route('services.audit') }}">Water Efficiency Audits</a>
        <a href="{{ route('services.smart_water_monitoring') }}">Smart Monitoring</a>
        <a href="{{ route('services.meter_accuracy_optimization') }}">Meter Accuracy Optimization</a>
        <a href="{{ route('services.cooling_towers') }}">Cooling Tower Optimization</a>
        <a href="{{ route('services.elara_ai') }}">Utility Intelligence (Ara AI)</a>
        <a href="{{ route('services.smart_water_recovery') }}">Smart Water Recovery</a>
        <a href="{{ route('services.gresb_compliance') }}">ESG (GRESB) Compliance</a>
        <a href="{{ route('services.scope_studies') }}">Water Risk Management</a>
      </div>
    </li>

    <!-- INDUSTRIES — plain link, no dropdown -->
    <li class="has-dropdown">
      <a href="#">
        Solutions
        <svg viewBox="0 0 10 6" fill="currentColor">
          <path d="M0 0l5 6 5-6z"/>
        </svg>
      </a>

      <div class="dropdown">
        <ul class="dropdown-menu">
            @include('components.industry-menu', ['industries' => $industries])
        </ul>
      </div>
    </li>

    <!-- RESOURCES — dropdown -->
    <li>
      <a href="#">Resources <svg viewBox="0 0 10 6" fill="currentColor"><path d="M0 0l5 6 5-6z"/></svg></a>
      <div class="dropdown">
        <div class="dropdown-section-label" style="padding:10px 16px 4px;font-size:9px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;color:#999;">Resources</div>
        <a href="{{ route('resources.my_city_rebates') }}">Water Target Tools</a>
        <a href="{{ route('case-studies.index') }}">Case Studies</a>
        <a href="{{ route('resources.white-papers') }}">White Papers</a>
        <a href="{{ route('resources.articles') }}">Articles</a>
        <!-- <a href="{{ route('resources.tools.selection_tool') }}">My City Water Rebates</a> -->
        <!-- <a href="{{ route('resources.financing_form') }}">Tax Strategy &amp; Financing</a> -->
        <a href="{{ route('resources.webinar') }}">Webinars</a>
        <a href="{{ route('resources.events') }}">Events </a>
      </div>
    </li>
  </ul>

  <div class="nav-right">
    <button id="nav-search-btn" class="nav-icon-btn" aria-label="Search" type="button">
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="7" cy="7" r="4.5"/><line x1="10.5" y1="10.5" x2="14" y2="14"/></svg>
    </button>

    <a href="/contact" class="nav-cta" id="nav-cta-btn">Speak with an Advisor</a>
    <button class="ham-btn" id="ham-btn" type="button" aria-label="Daily &mdash; date, joke &amp; scripture">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>