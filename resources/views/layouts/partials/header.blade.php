
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
      <a href="{{ route('opportunities.property_owners_managers') }}">Portfolio Owner &amp; Asset Managers</a>
      <a href="{{ route('opportunities.mep_installers') }}">MEP Servicers</a>
      <a href="{{ route('opportunities.esg') }}">ESG</a>
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

    <!-- SERVICES — dropdown -->
    <li>
      <a href="#">Services <svg viewBox="0 0 10 6" fill="currentColor"><path d="M0 0l5 6 5-6z"/></svg></a>
      <div class="dropdown">
        <div class="dropdown-section-label" style="padding:10px 16px 4px;font-size:9px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;color:#999;">Services</div>
        <a href="{{ route('services.audit') }}">Efficiency Audits</a>
        <a href="{{ route('services.scope_studies') }}">Feasibility Assessment</a>
        <a href="{{ route('services.elara_ai') }}">Utility Intelligence (Ara AI)</a>
        <a href="{{ route('services.meter_accuracy_optimization') }}">Meter Accuracy Optimization</a>
        <a href="{{ route('services.smart_water_monitoring') }}">Smart Water Monitoring</a>
        <a href="{{ route('services.smart_water_recovery') }}">Smart Water Recovery</a>
        <a href="{{ route('services.cooling_towers') }}">Cooling Tower Optimization</a>
        <a href="{{ route('services.gresb_compliance') }}">GRESB Compliance &amp; Strategy</a>
      </div>
    </li>

    <!-- INDUSTRIES — plain link, no dropdown -->
    <li>
      <a href="{{ url('/industries') }}">Industries</a>
    </li>

    <!-- RESOURCES — dropdown -->
    <li>
      <a href="#">Resources <svg viewBox="0 0 10 6" fill="currentColor"><path d="M0 0l5 6 5-6z"/></svg></a>
      <div class="dropdown">
        <div class="dropdown-section-label" style="padding:10px 16px 4px;font-size:9px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;color:#999;">Resources</div>
        <a href="{{ route('resources.articles') }}">Articles</a>
        <a href="{{ route('industries.case_study', ['slug' => 'hospitality']) }}">Case Studies</a>
        <a href="{{ route('resources.white-papers') }}">White Papers</a>
        <a href="{{ route('resources.my_city_rebates') }}">My City Water Rebates</a>
        <a href="{{ route('resources.financing_form') }}">Tax Strategy &amp; Financing</a>
        <a href="{{ route('resources.webinar') }}">Webinars On Demand</a>
        <a href="{{ route('member-dashboard.gresb-water.list') }}">Events (Past &amp; Upcoming)</a>
        <a href="{{ route('resources.tools.selection_tool') }}">Water Target Tools (&amp; Cost Reduction)</a>
      </div>
    </li>
  </ul>

  <div class="nav-portfolio">
    <a href="#" class="nav-portfolio-link">Portfolio Intelligence</a>
  </div>


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