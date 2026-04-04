@extends('admin.portal')

@section('title', 'GRESB Water')
@section('header_title', 'GRESB Water Performance Tool')

@section('content')
  <div class="page-hdr"><div class="page-hdr-left"><h2>Cost Reduction Estimator</h2><p>Calculate projected water savings and ROI for your portfolio</p></div></div>
  <div class="estimator-wrap">
    <div>
      <div class="card">
        <div class="card-hdr"><div class="card-title"><i class="fa-solid fa-sliders" style="color:var(--accent);font-size:11px;"></i>Portfolio Inputs</div></div>
        <div class="card-body">
          <div class="form-group">
            <label class="form-label">Number of Properties</label>
            <input type="number" class="form-input" id="est-props" value="10" min="1" oninput="calcEstimate()">
          </div>
          <div class="form-grid-2">
            <div class="form-group">
              <label class="form-label">Annual Water Spend / Property ($)</label>
              <input type="number" class="form-input" id="est-spend" value="250000" oninput="calcEstimate()">
            </div>
            <div class="form-group">
              <label class="form-label">Asset Type</label>
              <select class="form-select" id="est-type" onchange="calcEstimate()">
                <option value="0.25">Hospitality (avg 25% savings)</option>
                <option value="0.18">Office Buildings (avg 18%)</option>
                <option value="0.22">Manufacturing (avg 22%)</option>
                <option value="0.15">Retail (avg 15%)</option>
                <option value="0.20">Mixed Use (avg 20%)</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Implementation Timeline</label>
            <select class="form-select" id="est-timeline" onchange="calcEstimate()">
              <option value="1">Phase 1 — Audit &amp; Bill Validation</option>
              <option value="2">Phase 2 — Smart Monitoring Deploy</option>
              <option value="3" selected>Phase 3 — Full Portfolio Programme</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="result-panel" style="background:#1a2420;border-color:#2a3d35;">
          <div>
              <div style="font-size:9px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:#8a9e96;margin-bottom:6px;">Projected Annual Savings</div>
              <div class="result-big" id="est-result" style="color:#f0ece4;">$0</div>
              <div style="font-size:12px;color:#8a9e96;margin-top:4px;" id="est-pct">0% reduction</div>
          </div>
          <div>
              <div class="result-row"><span class="result-k" style="color:#6b7d75;">Properties analysed</span><span class="result-v" id="r-props" style="color:#f0ece4;">10</span></div>
              <div class="result-row"><span class="result-k" style="color:#6b7d75;">Current annual spend</span><span class="result-v" id="r-spend" style="color:#f0ece4;">$2,500,000</span></div>
              <div class="result-row"><span class="result-k" style="color:#6b7d75;">Savings per property</span><span class="result-v" id="r-per" style="color:#f0ece4;">$62,500</span></div>
              <div class="result-row"><span class="result-k" style="color:#6b7d75;">Est. payback period</span><span class="result-v" id="r-payback" style="color:#f0ece4;">11 months</span></div>
              <div class="result-row"><span class="result-k" style="color:#6b7d75;">5-year NOI impact</span><span class="result-v" id="r-noi" style="color:#f0ece4;">$3,125,000</span></div>
          </div>
          <a href="{{ route('member-dashboard.gresb-water.form') }}" 
            class="btn btn-primary" 
            style="width:100%;justify-content:center;background:#2d4a3e;border-color:#3d5e50;color:#f0ece4;">
              <i class="fa-solid fa-calendar-check"></i> Schedule Assessment
          </a>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
const ASSETS = [
  {id:1,title:'How Water Audits Reduce CRE Costs by 25%+',cat:'Case Study',ind:'Hospitality',views:2341,dl:312,status:'published'},
  {id:2,title:'GRESB Water Reporting Guide 2025',cat:'White Paper',ind:'Office',views:1890,dl:287,status:'published'},
  {id:3,title:'Kimpton Hotels — 11-Month Payback Case Study',cat:'Case Study',ind:'Hospitality',views:1654,dl:241,status:'published'},
  {id:4,title:'Portfolio Water Consumption Calculator',cat:'Tool',ind:'Retail',views:1433,dl:0,status:'published'},
  {id:5,title:'Section 179 Tax Strategy for Water Equipment',cat:'White Paper',ind:'Office',views:1210,dl:198,status:'published'},
  {id:6,title:'Smart Monitoring IoT Deployment Webinar',cat:'Webinar',ind:'Manufacturing',views:987,dl:0,status:'published'},
  {id:7,title:'DiamondRock Hospitality — 25.3% Reduction',cat:'Case Study',ind:'Hospitality',views:876,dl:154,status:'published'},
  {id:8,title:'Cooling Tower Optimisation Technical Guide',cat:'White Paper',ind:'Manufacturing',views:743,dl:112,status:'published'},
  {id:9,title:'ESG Water Peer Comparison Dashboard',cat:'Tool',ind:'Office',views:698,dl:0,status:'draft'},
  {id:10,title:'Westin Fort Lauderdale Case Study',cat:'Case Study',ind:'Hospitality',views:612,dl:98,status:'published'},
];
const VIEWER_LOGS={1:[{user:'James Whitmore',d:'12 Mar 2026',t:'09:14'},{user:'Sarah Okonkwo',d:'11 Mar 2026',t:'16:42'},{user:'Michael Chen',d:'10 Mar 2026',t:'11:05'},{user:'Laura Reyes',d:'09 Mar 2026',t:'08:30'},{user:'Admin',d:'05 Mar 2026',t:'13:22'}],2:[{user:'Admin',d:'20 Jan 2026',t:'16:36'},{user:'test',d:'31 Dec 2025',t:'23:31'},{user:'Admin',d:'25 Dec 2025',t:'01:52'},{user:'Even Hotels',d:'24 Dec 2025',t:'23:00'},{user:'Even Hotels',d:'23 Dec 2025',t:'21:16'}],3:[{user:'ABC',d:'20 Jan 2026',t:'16:36'},{user:'test',d:'31 Dec 2025',t:'23:31'},{user:'Admin',d:'25 Dec 2025',t:'01:52'},{user:'Even Hotels',d:'24 Dec 2025',t:'23:00'},{user:'Even Hotels',d:'23 Dec 2025',t:'21:16'},{user:'Admin',d:'22 Dec 2025',t:'03:41'},{user:'Kimpton Team',d:'20 Dec 2025',t:'14:22'}],4:[{user:'Sarah Okonkwo',d:'12 Mar 2026',t:'10:45'},{user:'James Whitmore',d:'10 Mar 2026',t:'09:32'}],5:[{user:'Admin',d:'15 Feb 2026',t:'11:00'},{user:'CFO Team',d:'12 Feb 2026',t:'16:45'}],6:[{user:'Even Hotels',d:'15 Mar 2026',t:'14:30'},{user:'Panna Mfg',d:'10 Mar 2026',t:'11:22'}],7:[{user:'James Whitmore',d:'20 Feb 2026',t:'09:00'},{user:'Admin',d:'18 Feb 2026',t:'16:00'}],8:[{user:'Panna Mfg',d:'01 Mar 2026',t:'13:00'},{user:'Admin',d:'28 Feb 2026',t:'10:15'}],9:[{user:'Admin',d:'10 Mar 2026',t:'08:00'}],10:[{user:'James Whitmore',d:'01 Mar 2026',t:'10:00'},{user:'Admin',d:'20 Feb 2026',t:'09:30'}]};
const CONSULTATIONS=[
  {name:'Irfan Testing',company:'Company',interest:'Improve GRESB Score',properties:1,meetDate:'Mar 29, 2026 \u2022 15:20',reqDate:'Requested: Mar 29, 2026 13:21',status:'approved',meetLink:'https://meet.google.com/abc-defg-hij'},
  {name:'tom brady',company:'abc',interest:'General Inquiry',properties:24,meetDate:'Mar 06, 2026 \u2022 18:03',reqDate:'Requested: Mar 06, 2026 18:03',status:'approved',meetLink:''},
  {name:'Admin irfan',company:'hogwarts',interest:'General Inquiry',properties:21,meetDate:'Feb 25, 2026 \u2022 12:55',reqDate:'Requested: Feb 25, 2026 00:56',status:'approved',meetLink:'https://meet.google.com/xyz-uvwx-yz'},
  {name:'Sarah Okonkwo',company:'SL Green Realty',interest:'Portfolio Water Audit',properties:28,meetDate:'Apr 17, 2026 \u2022 14:00',reqDate:'Requested: Mar 15, 2026 09:42',status:'pending',meetLink:''},
  {name:'Michael Chen',company:'Kimpton Hotels',interest:'GRESB WT1 Compliance',properties:14,meetDate:'Apr 22, 2026 \u2022 11:00',reqDate:'Requested: Mar 14, 2026 11:20',status:'review',meetLink:''},
];
const ARTICLES=[{title:'Why Water Is the Next ESG Frontier for CRE Portfolios',author:'WST Editorial',cat:'ESG',ind:'Office',views:1240,status:'published'},{title:'GRESB 2025: What the WT1 Changes Mean for Asset Managers',author:'C. Campbell',cat:'GRESB',ind:'Office',views:987,status:'published'},{title:'Section 179 and Water Equipment: A Guide for Fund Managers',author:'WST Advisory',cat:'Tax Strategy',ind:'Office',views:832,status:'published'},{title:'How DiamondRock Cut Water Costs Across 37 Properties',author:'WST Editorial',cat:'Case Study',ind:'Hospitality',views:741,status:'published'},{title:'Cooling Tower Water Waste: The $200K Problem No One Talks About',author:'C. Campbell',cat:'Operations',ind:'Manufacturing',views:623,status:'draft'}];
const INDUSTRIES=[{name:'Hospitality',slug:'hospitality',assets:4,views:5483},{name:'Office Buildings',slug:'office',assets:3,views:3797},{name:'Manufacturing',slug:'manufacturing',assets:2,views:1730},{name:'Retail & Supermarkets',slug:'retail',assets:2,views:2131},{name:'Condominiums',slug:'condominiums',assets:1,views:612},{name:'Golf Courses',slug:'golf',assets:1,views:441},{name:'Healthcare',slug:'healthcare',assets:0,views:0},{name:'Senior Living',slug:'senior-living',assets:1,views:389}];
const WHITE_PAPERS=[{title:'GRESB Water Reporting Guide 2025',ind:'Office',pages:28,dl:287,status:'published',views:287},{title:'Section 179 Tax Strategy for Water Equipment',ind:'Office',pages:14,dl:198,status:'published',views:198},{title:'Cooling Tower Optimisation Technical Guide',ind:'Manufacturing',pages:22,dl:112,status:'published',views:112},{title:'ESG Water Data Coverage Methodology',ind:'All',pages:18,dl:76,status:'draft',views:76}];
const CASE_STUDIES=[{title:'How Water Audits Reduce CRE Costs by 25%+',client:'Portfolio Overview',ind:'Hospitality',savings:'$2.3M+',views:2341},{title:'Kimpton Hotels — 11-Month Payback',client:'Kimpton / IHG',ind:'Hospitality',savings:'$184K',views:1654},{title:'DiamondRock Hospitality — 25.3% Reduction',client:'DiamondRock',ind:'Hospitality',savings:'$2.3M',views:876},{title:'Westin Fort Lauderdale Case Study',client:'Westin / Marriott',ind:'Hospitality',savings:'$69K',views:612}];
const WEBINARS=[{title:'Smart Monitoring IoT Deployment',date:'15 Mar 2026',dur:'58 min',views:987,status:'published',ind:'Manufacturing'},{title:'GRESB Water Reporting - 2025 Requirements',date:'01 Mar 2026',dur:'45 min',views:743,status:'published',ind:'Office'},{title:'Section 179 Water Equipment Tax Strategy',date:'18 Feb 2026',dur:'52 min',views:621,status:'published',ind:'Office'},{title:'Portfolio Water Audit - Live Walkthrough',date:'05 Feb 2026',dur:'70 min',views:489,status:'published',ind:'Hospitality'},{title:'ESG Water Data Coverage Best Practices',date:'20 Apr 2026',dur:'',views:0,status:'upcoming',ind:'Office'}];
const TOOLS=[{name:'Portfolio Water Consumption Calculator',title:'Portfolio Water Consumption Calculator',type:'Calculator',uses:1433,status:'published',views:1433},{name:'ESG Water Peer Comparison Dashboard',title:'ESG Water Peer Comparison Dashboard',type:'Dashboard',uses:698,status:'draft',views:698},{name:'GRESB WT1 Score Estimator',title:'GRESB WT1 Score Estimator',type:'Calculator',uses:521,status:'published',views:521},{name:'Cooling Tower Savings Calculator',title:'Cooling Tower Savings Calculator',type:'Calculator',uses:412,status:'published',views:412},{name:'Section 179 ROI Calculator',title:'Section 179 ROI Calculator',type:'Calculator',uses:387,status:'published',views:387}];
const LEADS=[{name:'James Whitmore',co:'DiamondRock Hospitality',email:'j.whitmore@diamondrock.com',date:'12 Mar 2026, 09:14'},{name:'Sarah Okonkwo',co:'SL Green Realty Corp',email:'sokonkwo@slgreen.com',date:'11 Mar 2026, 16:42'},{name:'Michael Chen',co:'Kimpton Hotels & Resorts',email:'m.chen@kimpton.com',date:'10 Mar 2026, 11:05'},{name:'Laura Reyes',co:'Sandals Resorts',email:'l.reyes@sandals.com',date:'09 Mar 2026, 08:30'},{name:'David Harrington',co:'Kroger Co.',email:'d.harrington@kroger.com',date:'07 Mar 2026, 14:55'},{name:'Amara Nwosu',co:'Brookfield Properties',email:'a.nwosu@brookfield.com',date:'05 Mar 2026, 13:22'}];
const SUBS=[{email:'asset.mgr@blackstone.com',d:'15 Mar 2026',t:'10:22'},{email:'esg@brookfieldproperties.com',d:'14 Mar 2026',t:'09:15'},{email:'facilities@regus.com',d:'13 Mar 2026',t:'16:48'},{email:'sustainability@greystar.com',d:'12 Mar 2026',t:'11:03'},{email:'cre.ops@prologis.com',d:'11 Mar 2026',t:'08:37'},{email:'water@ventasreit.com',d:'10 Mar 2026',t:'14:20'}];
const SCHEDULE=[{client:'DiamondRock Hospitality',contact:'James Whitmore',type:'Portfolio Water Audit',day:'14',month:'Apr',time:'10:00 AM EST',props:37,advisor:'Clifford Campbell',status:'confirmed'},{client:'SL Green Realty Corp',contact:'Sarah Okonkwo',type:'ESG Reporting Advisory',day:'17',month:'Apr',time:'2:00 PM EST',props:28,advisor:'WST Advisory Team',status:'confirmed'},{client:'Kimpton Hotels & Resorts',contact:'Michael Chen',type:'GRESB WT1 Compliance',day:'22',month:'Apr',time:'11:00 AM EST',props:14,advisor:'Clifford Campbell',status:'pending'},{client:'Kroger Co.',contact:'David Harrington',type:'Cost Reduction Assessment',day:'28',month:'Apr',time:'3:30 PM EST',props:8,advisor:'WST Advisory Team',status:'confirmed'},{client:'Brookfield Properties',contact:'Amara Nwosu',type:'Smart Monitoring Demo',day:'02',month:'May',time:'10:30 AM EST',props:22,advisor:'Clifford Campbell',status:'pending'}];
const CHART_DATA={views:{labels:['Oct','Nov','Dec','Jan','Feb','Mar'],data:[4200,5800,7100,6400,8900,11300]},leads:{labels:['Oct','Nov','Dec','Jan','Feb','Mar'],data:[8,12,9,14,18,24]},subs:{labels:['Oct','Nov','Dec','Jan','Feb','Mar'],data:[22,31,28,35,41,56]}};
const CAT_PILL={'Case Study':'pill-teal','White Paper':'pill-blue','Webinar':'pill-purple','Tool':'pill-amber','Article':'pill-blue'};

function toggleTheme(){const body=document.body;const isDark=body.getAttribute('data-theme')==='dark';body.setAttribute('data-theme',isDark?'light':'dark');const icon=document.getElementById('theme-icon');if(icon)icon.className=isDark?'fa-solid fa-moon':'fa-solid fa-circle-half-stroke';if(chartInst&&rendered['dashboard'])buildChart(currentChartKey);}

function nav(screenId,btn,title,section){document.querySelectorAll('.screen').forEach(s=>s.classList.remove('active'));document.querySelectorAll('.nav-link,.nav-child').forEach(l=>l.classList.remove('active'));const screen=document.getElementById('screen-'+screenId);if(screen){screen.classList.add('active');document.getElementById('main-content').scrollTop=0;}if(btn)btn.classList.add('active');document.getElementById('hdr-title').textContent=title||'Dashboard';document.getElementById('hdr-section').textContent=section||'Portal';closeMobile();lazyRender(screenId);}
const rendered={};
function lazyRender(id){if(rendered[id])return;rendered[id]=true;const fn=RENDERERS[id];if(fn)fn();}

function renderAdminTable(tbodyId,data,rowFn){const tb=document.getElementById(tbodyId);if(tb)tb.innerHTML=data.map(rowFn).join('');}
function arArticleRow(a){return `<tr><td class="primary">${a.title}</td><td style="color:var(--text-3);">${a.author}</td><td><span class="pill ${CAT_PILL['Article']}">${a.cat}</span></td><td class="r" style="font-family:var(--font-mono);color:var(--accent);">${a.views.toLocaleString()}</td><td class="r"><span class="pill ${a.status==='published'?'pill-green':'pill-amber'}">${a.status}</span></td><td class="r"><button class="btn btn-ghost" style="font-size:10px;padding:4px 8px;" onclick="showToast('Editing…','fa-pencil')"><i class="fa-solid fa-pencil" style="font-size:9px;"></i> Edit</button></td></tr>`;}
function arIndustryRow(a){return `<tr><td class="primary">${a.name}</td><td style="font-family:var(--font-mono);color:var(--text-3);font-size:11px;">${a.slug}</td><td class="r" style="font-family:var(--font-mono);">${a.assets}</td><td class="r" style="font-family:var(--font-mono);color:var(--accent);">${a.views.toLocaleString()}</td><td class="r"><button class="btn btn-ghost" style="font-size:10px;padding:4px 8px;" onclick="showToast('Editing…','fa-pencil')"><i class="fa-solid fa-pencil" style="font-size:9px;"></i> Edit</button></td></tr>`;}
function arWPRow(a){return `<tr><td class="primary">${a.title}</td><td>${a.ind}</td><td class="r" style="font-family:var(--font-mono);">${a.pages}p</td><td class="r" style="font-family:var(--font-mono);color:var(--accent);">${a.dl.toLocaleString()}</td><td class="r"><span class="pill ${a.status==='published'?'pill-green':'pill-amber'}">${a.status}</span></td><td class="r"><button class="btn btn-ghost" style="font-size:10px;padding:4px 8px;" onclick="showToast('Editing…','fa-pencil')"><i class="fa-solid fa-pencil" style="font-size:9px;"></i> Edit</button></td></tr>`;}
function arCSRow(a){return `<tr><td class="primary">${a.title}</td><td style="color:var(--text-3);">${a.client}</td><td>${a.ind}</td><td class="r" style="font-family:var(--font-mono);color:var(--accent);">${a.savings}</td><td class="r" style="font-family:var(--font-mono);">${a.views.toLocaleString()}</td><td class="r"><button class="btn btn-ghost" style="font-size:10px;padding:4px 8px;" onclick="showToast('Editing…','fa-pencil')"><i class="fa-solid fa-pencil" style="font-size:9px;"></i> Edit</button></td></tr>`;}
function arWebRow(a){return `<tr><td class="primary">${a.title}</td><td style="font-family:var(--font-mono);font-size:11px;color:var(--text-3);">${a.date}</td><td class="r" style="font-family:var(--font-mono);">${a.dur}</td><td class="r" style="font-family:var(--font-mono);color:var(--accent);">${a.views>0?a.views.toLocaleString():'--'}</td><td class="r"><span class="pill ${a.status==='published'?'pill-green':a.status==='upcoming'?'pill-blue':'pill-amber'}">${a.status}</span></td><td class="r"><button class="btn btn-ghost" style="font-size:10px;padding:4px 8px;" onclick="showToast('Editing…','fa-pencil')"><i class="fa-solid fa-pencil" style="font-size:9px;"></i> Edit</button></td></tr>`;}
function arToolRow(a){return `<tr><td class="primary">${a.name}</td><td><span class="pill pill-blue">${a.type}</span></td><td class="r" style="font-family:var(--font-mono);color:var(--accent);">${a.uses.toLocaleString()}</td><td class="r"><span class="pill ${a.status==='published'?'pill-green':'pill-amber'}">${a.status}</span></td><td class="r"><button class="btn btn-ghost" style="font-size:10px;padding:4px 8px;" onclick="showToast('Editing…','fa-pencil')"><i class="fa-solid fa-pencil" style="font-size:9px;"></i> Edit</button></td></tr>`;}

function renderAdminResources(){renderFilteredAdminResources(ASSETS);}
function renderFilteredAdminResources(list){
  const tb=document.getElementById('ar-tbody');if(!tb)return;
  tb.innerHTML=list.map(a=>{
    const m=CAT_PILL[a.cat]||'pill-dim';
    return `<tr class="row-clickable" onclick="toggleARRow(${a.id},this)"><td style="padding-left:12px;width:24px;"><i class="fa-solid fa-chevron-right" id="ar-arrow-${a.id}" style="font-size:9px;color:var(--text-3);transition:transform .2s;"></i></td><td class="primary" style="max-width:220px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">${a.title}</td><td><span class="pill ${m}">${a.cat}</span></td><td>${a.ind}</td><td class="r" style="font-family:var(--font-mono);color:var(--accent);">${a.views.toLocaleString()}</td><td class="r"><span class="pill ${a.status==='published'?'pill-green':'pill-amber'}">${a.status}</span></td><td class="r"><button class="btn btn-ghost" style="font-size:10px;padding:4px 8px;" onclick="event.stopPropagation();showToast('Editing…','fa-pencil')"><i class="fa-solid fa-pencil" style="font-size:9px;"></i> Edit</button></td></tr><tr class="expand-row" id="ar-exp-${a.id}"><td colspan="7" id="ar-inner-${a.id}" style="padding:0;"></td></tr>`;
  }).join('');
}
function toggleARRow(id){
  const exp=document.getElementById('ar-exp-'+id);const arrow=document.getElementById('ar-arrow-'+id);const inner=document.getElementById('ar-inner-'+id);
  if(!exp)return;
  const isOpen=exp.classList.contains('open');
  document.querySelectorAll('.expand-row.open').forEach(r=>r.classList.remove('open'));
  document.querySelectorAll('[id^="ar-arrow-"]').forEach(a=>{a.style.transform='';});
  if(!isOpen){exp.classList.add('open');arrow.style.transform='rotate(90deg)';inner.innerHTML=buildViewerLogHTML(id);inner.style.padding='16px 20px 20px';}
}
function buildViewerLogHTML(id){
  const a=ASSETS.find(x=>x.id===id);if(!a)return '';
  const logs=VIEWER_LOGS[id]||[];
  const rows=logs.map(l=>`<tr><td><div style="display:flex;align-items:center;gap:8px;"><div class="viewer-avatar">${l.user.charAt(0)}</div><span style="color:var(--text-1);font-weight:500;">${l.user}</span></div></td><td>${l.d}</td><td class="r" style="font-family:var(--font-mono);font-size:12px;color:var(--text-3);">${l.t}</td></tr>`).join('');
  return `<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;flex-wrap:wrap;gap:10px;"><div><div style="font-weight:700;color:var(--text-1);font-size:13px;">${a.title}</div><div style="font-size:10px;color:var(--text-3);margin-top:2px;font-family:var(--font-mono);">Asset ID: #${a.id} &nbsp;&bull;&nbsp; Total Views: <strong style="color:var(--accent);">${a.views}</strong></div></div><input type="search" class="viewer-search" id="ar-vs-${id}" placeholder="Search user or date..." oninput="filterInlineLog(${id},this.value)" style="min-width:180px;"></div><div class="table-scroll"><table class="wst-table"><thead><tr><th>Viewer</th><th>Date</th><th class="r">Time</th></tr></thead><tbody id="ar-vb-${id}">${rows}</tbody></table></div>`;
}
function filterInlineLog(id,q){
  const tb=document.getElementById('ar-vb-'+id);if(!tb)return;
  const logs=VIEWER_LOGS[id]||[];
  const f=q?logs.filter(l=>l.user.toLowerCase().includes(q.toLowerCase())||l.d.toLowerCase().includes(q.toLowerCase())):logs;
  tb.innerHTML=f.map(l=>`<tr><td><div style="display:flex;align-items:center;gap:8px;"><div class="viewer-avatar">${l.user.charAt(0)}</div><span style="color:var(--text-1);font-weight:500;">${l.user}</span></div></td><td>${l.d}</td><td class="r" style="font-family:var(--font-mono);font-size:12px;color:var(--text-3);">${l.t}</td></tr>`).join('');
}

function filterTable(prefix){
  const q=(document.getElementById(prefix+'-search')||{value:''}).value.toLowerCase();
  const cat=(document.getElementById(prefix+'-cat')||{value:''}).value.toLowerCase();
  const ind=(document.getElementById(prefix+'-ind')||{value:''}).value.toLowerCase();
  if(prefix==='ar'){renderFilteredAdminResources(ASSETS.filter(a=>(!q||a.title.toLowerCase().includes(q))&&(!cat||a.cat.toLowerCase().includes(cat))&&(!ind||a.ind.toLowerCase().includes(ind))));return;}
  const tbody=document.getElementById(prefix+'-tbody');if(!tbody)return;
  tbody.querySelectorAll('tr').forEach(r=>{const txt=r.textContent.toLowerCase();r.style.display=(!q||txt.includes(q))&&(!cat||txt.includes(cat))&&(!ind||txt.includes(ind))?'':'none';});
}

function filterCards(sid){
  const q=(document.getElementById(sid+'-search')||document.getElementById('mr-search')||{value:''}).value.toLowerCase();
  const cat=(document.getElementById(sid+'-cat')||{value:''}).value.toLowerCase();
  const ind=(document.getElementById(sid+'-ind')||{value:''}).value.toLowerCase();
  const gridMap={'mr':'mr-grid','articles':'ma-grid','whitepapers':'mwp-grid','casestudies':'mcs-grid','webinars':'mweb-grid','tools':'mt-grid'};
  const grid=document.getElementById(gridMap[sid]||sid+'-grid');if(!grid)return;
  grid.querySelectorAll('.resource-card').forEach(card=>{const txt=card.textContent.toLowerCase();card.style.display=(!q||txt.includes(q))&&(!cat||txt.includes(cat))&&(!ind||txt.includes(ind))?'':'none';});
}

function renderCards(gridId,data){
  const grid=document.getElementById(gridId);if(!grid)return;
  grid.innerHTML=data.map(a=>`<div class="resource-card" onclick="showToast('Opening resource...','fa-file')"><div class="rc-type"><span class="pill ${CAT_PILL[a.cat||'']||'pill-dim'}">${a.cat||'Resource'}</span>${a.ind?`<span style="color:var(--text-3);font-size:10px;">${a.ind}</span>`:''}</div><div class="rc-title">${a.title||a.name||'--'}</div><div class="rc-meta">${a.date||''} ${a.dur?'- '+a.dur:''} ${a.pages?'- '+a.pages+' pages':''}</div><div class="rc-footer"><span class="rc-views">${(a.views||a.uses||a.dl||0).toLocaleString()} ${a.cat==='Tool'?'uses':a.cat==='Webinar'?'views':'views'}</span><span class="rc-cta">${a.cat==='Tool'?'Use Tool ->':a.cat==='Webinar'?'Watch ->':'Read ->'}</span></div></div>`).join('');
}

function renderConsultations(){_renderConsultList(CONSULTATIONS);}
function _renderConsultList(list){
  const tb=document.getElementById('consult-tbody');if(!tb)return;
  tb.innerHTML=list.map((c,i)=>{
    const sp=c.status==='approved'?'<span class="status-pill-approved">APPROVED</span>':c.status==='pending'?'<span class="status-pill-pending">PENDING</span>':'<span class="status-pill-review">UNDER REVIEW</span>';
    const mc=c.meetLink?`<a href="${c.meetLink}" target="_blank" class="meeting-link">Join Meeting</a>`:'<span class="meeting-inprog">Link in progress</span>';
    return `<tr class="consult-row"><td><div style="display:flex;align-items:center;gap:10px;"><div class="client-avatar">${c.name.charAt(0).toUpperCase()}</div><div><div style="font-weight:600;color:var(--text-1);font-size:13px;">${c.name}</div><div style="font-size:11px;color:var(--text-3);">${c.company}</div></div></div></td><td><span class="pill pill-dim" style="margin-bottom:5px;display:inline-flex;">${c.interest}</span><br><span style="font-size:11px;color:var(--text-3);"><i class="fa-solid fa-building" style="font-size:9px;margin-right:4px;"></i>${c.properties} Propert${c.properties===1?'y':'ies'}</span></td><td><span class="timeline-badge"><i class="fa-solid fa-calendar" style="font-size:9px;"></i>${c.meetDate}</span><br><span style="font-size:10px;color:var(--text-3);margin-top:4px;display:block;">${c.reqDate}</span></td><td>${sp}</td><td>${mc}</td><td><select class="consult-select" onchange="updateConsultStatus(${i},this.value)"><option value="approved" ${c.status==='approved'?'selected':''}>Approve</option><option value="pending" ${c.status==='pending'?'selected':''}>Pending</option><option value="review" ${c.status==='review'?'selected':''}>Review</option></select><br><button class="btn btn-danger" style="font-size:10px;padding:3px 7px;margin-top:5px;" onclick="deleteConsult(${i})"><i class="fa-solid fa-trash" style="font-size:9px;"></i></button></td></tr>`;
  }).join('');
}
function updateConsultStatus(i,val){CONSULTATIONS[i].status=val;_renderConsultList(CONSULTATIONS);showToast('Status updated to '+val,'fa-check');}
function deleteConsult(i){if(!confirm('Remove this request?'))return;CONSULTATIONS.splice(i,1);_renderConsultList(CONSULTATIONS);showToast('Removed','fa-trash');}
function filterConsultations(){
  const q=(document.getElementById('consult-search')||{value:''}).value.toLowerCase();
  const st=(document.getElementById('consult-status-filter')||{value:''}).value.toLowerCase();
  _renderConsultList(CONSULTATIONS.filter(c=>(!q||c.name.toLowerCase().includes(q)||c.company.toLowerCase().includes(q))&&(!st||c.status===st)));
}

let chartInst=null,currentChartKey='views';
function renderDashboard(){
  const now=new Date();const el=document.getElementById('date-label');if(el)el.textContent=now.toLocaleDateString('en-US',{weekday:'long',year:'numeric',month:'long',day:'numeric'})+' - Manage assets and track engagement';
  const top=[...ASSETS].sort((a,b)=>b.views-a.views)[0];document.getElementById('top-asset').textContent=top.title;document.getElementById('top-views').textContent=top.views.toLocaleString()+' views';
  [{id:'cnt-assets',val:ASSETS.length},{id:'cnt-views',val:ASSETS.reduce((a,x)=>a+x.views,0)},{id:'cnt-leads',val:LEADS.length},{id:'cnt-subs',val:SUBS.length}].forEach(({id,val})=>{const el=document.getElementById(id);if(!el)return;let cur=0;const start=performance.now();(function tick(now){const p=Math.min((now-start)/900,1);const e=1-Math.pow(1-p,3);el.textContent=Math.round(e*val).toLocaleString();if(p<1)requestAnimationFrame(tick);})(performance.now());});
  setTimeout(()=>document.querySelectorAll('.stat-cell').forEach((el,i)=>setTimeout(()=>el.classList.add('loaded'),i*100)),400);
  const top5=[...ASSETS].sort((a,b)=>b.views-a.views).slice(0,5);const max=top5[0].views;
  document.getElementById('top-performers').innerHTML=top5.map((a,i)=>`<button class="performer-item" onclick="openViewerLog(${a.id},this)"><span class="p-rank">${i+1}</span><span class="p-title">${a.title}</span><div class="p-bar-wrap"><div class="p-bar" style="width:${(a.views/max*100).toFixed(0)}%"></div></div><span class="p-views">${(a.views/1000).toFixed(1)}k</span></button>`).join('');
  document.getElementById('dash-leads').innerHTML=LEADS.map(l=>`<tr><td class="primary">${l.name}</td><td>${l.co}</td><td><a href="mailto:${l.email}" style="color:var(--accent);font-family:var(--font-mono);font-size:11px;">${l.email}</a></td><td class="r" style="font-family:var(--font-mono);font-size:11px;color:var(--text-3);">${l.date}</td></tr>`).join('');
  document.getElementById('sub-count').textContent=SUBS.length+' total';
  document.getElementById('dash-subs').innerHTML=SUBS.map((s,i)=>`<tr><td style="font-family:var(--font-mono);font-size:10px;color:var(--text-3);">${String(i+1).padStart(2,'0')}</td><td><div style="display:flex;align-items:center;gap:8px;"><i class="fa-regular fa-envelope" style="font-size:10px;color:var(--text-3);"></i><a href="mailto:${s.email}" style="color:var(--text-1);font-weight:500;">${s.email}</a></div></td><td class="r" style="font-family:var(--font-mono);font-size:11px;color:var(--text-3);">${s.d} - ${s.t}</td></tr>`).join('');
  buildChart('views');
}

function openViewerLog(assetId,btn){
  document.querySelectorAll('.performer-item').forEach(b=>b.classList.remove('selected'));if(btn)btn.classList.add('selected');
  const a=ASSETS.find(x=>x.id===assetId);if(!a)return;
  const panel=document.getElementById('viewer-log-panel');if(!panel)return;
  document.getElementById('viewer-asset-title').textContent=a.title;
  document.getElementById('viewer-asset-meta').textContent='Asset ID: #'+a.id+' - Total Views: '+a.views;
  renderViewerLogBody(assetId,'');document.getElementById('viewer-search').value='';
  panel.style.display='block';panel.scrollIntoView({behavior:'smooth',block:'nearest'});
}
function renderViewerLogBody(assetId,q){
  const logs=(VIEWER_LOGS[assetId]||[]).filter(l=>!q||l.user.toLowerCase().includes(q.toLowerCase())||l.d.toLowerCase().includes(q.toLowerCase()));
  const tb=document.getElementById('viewer-log-tbody');if(!tb)return;
  tb.innerHTML=logs.map(l=>`<tr><td><div style="display:flex;align-items:center;gap:9px;"><div class="viewer-avatar">${l.user.charAt(0)}</div><span style="color:var(--text-1);font-weight:500;">${l.user}</span></div></td><td style="font-family:var(--font-mono);font-size:12px;">${l.d}</td><td class="r" style="font-family:var(--font-mono);font-size:12px;color:var(--text-3);">${l.t}</td></tr>`).join('');
}
function filterViewerLog(){
  const q=(document.getElementById('viewer-search')||{value:''}).value;
  const sel=document.querySelector('.performer-item.selected');if(!sel)return;
  const m=sel.getAttribute('onclick').match(/openViewerLog\((\d+)/);if(m)renderViewerLogBody(parseInt(m[1]),q);
}
function closeViewerLog(){const p=document.getElementById('viewer-log-panel');if(p)p.style.display='none';document.querySelectorAll('.performer-item').forEach(b=>b.classList.remove('selected'));}

function buildChart(key){
  currentChartKey=key;const d=CHART_DATA[key];const ctx=document.getElementById('mainChart');if(!ctx)return;if(chartInst)chartInst.destroy();
  const isDark=document.body.getAttribute('data-theme')==='dark';
  const gridColor=isDark?'rgba(255,255,255,0.04)':'rgba(0,0,0,0.05)';const tickColor=isDark?'#8b92a5':'#6b7280';const accentHex=isDark?'#00c9a7':'#007a64';
  const grad=ctx.getContext('2d').createLinearGradient(0,0,0,200);grad.addColorStop(0,isDark?'rgba(0,201,167,0.22)':'rgba(0,122,100,0.15)');grad.addColorStop(1,'rgba(0,201,167,0)');
  chartInst=new Chart(ctx,{type:'line',data:{labels:d.labels,datasets:[{data:d.data,borderColor:accentHex,borderWidth:2,backgroundColor:grad,fill:true,tension:.4,pointRadius:0,pointHoverRadius:5,pointHoverBackgroundColor:accentHex,pointHoverBorderColor:isDark?'#0c0d11':'#fff',pointHoverBorderWidth:2}]},options:{responsive:true,maintainAspectRatio:false,plugins:{legend:{display:false},tooltip:{backgroundColor:isDark?'#141720':'#fff',borderColor:isDark?'rgba(255,255,255,0.08)':'rgba(0,0,0,0.10)',borderWidth:1,titleColor:isDark?'#ecedf2':'#0d0f1a',bodyColor:isDark?'#8b92a5':'#5a6278',padding:12,cornerRadius:8}},scales:{y:{grid:{color:gridColor,drawBorder:false},ticks:{color:tickColor,font:{family:'JetBrains Mono',size:10},callback:v=>v>=1000?(v/1000).toFixed(0)+'k':v},border:{display:false}},x:{grid:{display:false},ticks:{color:tickColor,font:{family:'JetBrains Mono',size:10}},border:{display:false}}}}});
}
function switchChart(btn,key){document.querySelectorAll('.tab-btn').forEach(b=>b.classList.remove('active'));btn.classList.add('active');buildChart(key);}

function renderSchedule(){
  const grid=document.getElementById('schedule-grid');if(!grid)return;
  grid.innerHTML=SCHEDULE.map(s=>`<div class="appt-card"><div class="appt-date-badge"><div class="appt-month">${s.month}</div><div class="appt-day">${s.day}</div></div><div style="margin-bottom:12px;"><div style="font-size:14px;font-weight:600;color:var(--text-1);margin-bottom:4px;">${s.client}</div><div style="font-size:11px;color:var(--text-3);">${s.contact}</div></div><div style="display:flex;flex-direction:column;gap:7px;margin-bottom:14px;"><div style="display:flex;justify-content:space-between;"><span style="font-size:11px;color:var(--text-3);">Session</span><span style="font-size:11px;font-weight:600;color:var(--text-1);">${s.type}</span></div><div style="display:flex;justify-content:space-between;"><span style="font-size:11px;color:var(--text-3);">Time</span><span style="font-family:var(--font-mono);font-size:11px;color:var(--text-2);">${s.time}</span></div><div style="display:flex;justify-content:space-between;"><span style="font-size:11px;color:var(--text-3);">Properties</span><span style="font-family:var(--font-mono);font-size:11px;color:var(--text-2);">${s.props}</span></div></div><div style="display:flex;justify-content:space-between;align-items:center;"><span class="pill ${s.status==='confirmed'?'pill-green':'pill-amber'}">${s.status}</span><button class="btn btn-ghost" style="font-size:10px;padding:4px 8px;" onclick="showToast('Opening details...','fa-calendar')">Details</button></div></div>`).join('');
}

function calcEstimate(){
  const props=parseInt(document.getElementById('est-props')?.value||10);const spend=parseInt(document.getElementById('est-spend')?.value||250000);const rate=parseFloat(document.getElementById('est-type')?.value||0.25);
  const totalSpend=props*spend;const savings=totalSpend*rate;const perProp=savings/props;const months=Math.round((spend*0.15)/perProp*12);const r=v=>'$'+Math.round(v).toLocaleString();
  document.getElementById('est-result')&&(document.getElementById('est-result').textContent=r(savings));document.getElementById('est-pct')&&(document.getElementById('est-pct').textContent=(rate*100).toFixed(0)+'% portfolio-wide reduction');document.getElementById('r-props')&&(document.getElementById('r-props').textContent=props);document.getElementById('r-spend')&&(document.getElementById('r-spend').textContent=r(totalSpend));document.getElementById('r-per')&&(document.getElementById('r-per').textContent=r(perProp));document.getElementById('r-payback')&&(document.getElementById('r-payback').textContent=months+' months');document.getElementById('r-noi')&&(document.getElementById('r-noi').textContent=r(savings*5));
}

const RENDERERS={'dashboard':renderDashboard,'admin-resources':renderAdminResources,'admin-articles':()=>renderAdminTable('articles-tbody',ARTICLES,arArticleRow),'admin-industries':()=>renderAdminTable('industries-tbody',INDUSTRIES,arIndustryRow),'admin-whitepapers':()=>renderAdminTable('wp-tbody',WHITE_PAPERS,arWPRow),'admin-casestudies':()=>renderAdminTable('cs-tbody',CASE_STUDIES,arCSRow),'admin-webinars':()=>renderAdminTable('webinars-tbody',WEBINARS,arWebRow),'admin-tools':()=>renderAdminTable('tools-tbody',TOOLS,arToolRow),'admin-consultation':renderConsultations,'member-resources':()=>renderCards('mr-grid',ASSETS),'member-articles':()=>renderCards('ma-grid',ARTICLES.map(a=>({...a,cat:'Article'}))),'member-whitepapers':()=>renderCards('mwp-grid',WHITE_PAPERS.filter(a=>a.status==='published')),'member-casestudies':()=>renderCards('mcs-grid',CASE_STUDIES.map(a=>({...a,cat:'Case Study'}))),'member-webinars':()=>renderCards('mweb-grid',WEBINARS.filter(a=>a.status==='published')),'member-tools':()=>renderCards('mt-grid',TOOLS.filter(a=>a.status==='published').map(a=>({...a,cat:'Tool'}))),'estimators':calcEstimate,'schedule-upcoming':renderSchedule};

function toggleSidebar(){document.getElementById('sidebar').classList.toggle('collapsed');}
function openMobile(){document.getElementById('sidebar').classList.add('mob-open');const ov=document.getElementById('mob-overlay');ov.style.opacity='1';ov.style.pointerEvents='auto';document.body.style.overflow='hidden';}
function closeMobile(){document.getElementById('sidebar').classList.remove('mob-open');const ov=document.getElementById('mob-overlay');ov.style.opacity='0';ov.style.pointerEvents='none';document.body.style.overflow='';}
function toggleAcc(btn){const ch=btn.nextElementSibling;const ar=btn.querySelector('.nav-acc-arrow');const open=ch.classList.toggle('open');if(ar)ar.classList.toggle('open',open);}
document.addEventListener('keydown',e=>{if(e.key==='Escape')closeMobile();});

let toastTimer;
function showToast(msg,icon='fa-check'){const t=document.getElementById('toast');const label=t.querySelector('div:last-child>div:first-child');const iconEl=t.querySelector('[class*="fa-"]');if(label)label.textContent=msg;if(iconEl)iconEl.className='fa-solid '+icon;t.style.opacity='1';t.style.transform='translateY(0)';t.style.pointerEvents='auto';clearTimeout(toastTimer);toastTimer=setTimeout(()=>{t.style.opacity='0';t.style.transform='translateY(10px)';},2500);}
function dismissToast(){const t=document.getElementById('toast');setTimeout(()=>{t.style.opacity='0';t.style.transform='translateY(10px)';},3500);}
function startClock(){function tick(){document.getElementById('hdr-clock').textContent=new Date().toLocaleTimeString('en-US',{hour:'2-digit',minute:'2-digit',second:'2-digit',hour12:true});}tick();setInterval(tick,1000);}

document.addEventListener('DOMContentLoaded',()=>{document.getElementById('toast-time').textContent=new Date().toLocaleTimeString('en-US',{hour:'2-digit',minute:'2-digit'});startClock();lazyRender('dashboard');dismissToast();});
const t=document.getElementById('toast');t.style.transition='all .4s var(--ease)';t.style.opacity='1';
</script>
@endpush