<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>WST Admin — Portfolio Intelligence</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,300;12..96,400;12..96,500;12..96,600;12..96,700&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=JetBrains+Mono:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
:root {
  /* ── Charcoal dark theme (matches reference screenshot) ── */
  --bg:#1a1a1c;          /* page background  — warm charcoal */
  --surface:#242426;     /* card surface     — slightly lighter */
  --surface-hi:#2c2c2e;  /* elevated surface — panels, rows */
  --surface-hov:#323234; /* hover state */
  --border:rgba(255,255,255,0.06);
  --border-hi:rgba(255,255,255,0.12);
  --accent:#00c9a7; --accent-dim:rgba(0,201,167,0.13); --accent-glow:rgba(0,201,167,0.25);
  --amber:#e8a020; --amber-dim:rgba(232,160,32,0.13);
  --red:#ef4444; --red-dim:rgba(239,68,68,0.13);
  --blue:#6ea8fe; --blue-dim:rgba(110,168,254,0.13);
  --purple:#c084fc; --purple-dim:rgba(192,132,252,0.13);
  --green:#4ade80; --green-dim:rgba(74,222,128,0.13);
  --text-1:#f0f0f0; --text-2:#9a9aa0; --text-3:rgba(240,240,240,0.32);
  --font-ui:'Bricolage Grotesque',sans-serif;
  --font-display:'Cormorant Garamond',serif;
  --font-mono:'JetBrains Mono',monospace;
  --sidebar-w:228px; --sidebar-c:56px; --header-h:56px; --radius:10px;
  --ease:cubic-bezier(0.16,1,0.3,1);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
html{font-size:14px;}
body{font-family:var(--font-ui);background:var(--bg);color:var(--text-1);-webkit-font-smoothing:antialiased;overflow:hidden;height:100vh;}
a{text-decoration:none;color:inherit;}
button{font-family:var(--font-ui);cursor:pointer;}
input,select,textarea{font-family:var(--font-ui);}
:focus-visible{outline:2px solid var(--accent);outline-offset:2px;}
:focus:not(:focus-visible){outline:none;}
::-webkit-scrollbar{width:4px;height:4px;}
::-webkit-scrollbar-track{background:transparent;}
::-webkit-scrollbar-thumb{background:rgba(255,255,255,0.08);border-radius:2px;}

/* Shell */
.shell{display:flex;height:100vh;overflow:hidden;}

/* ── Sidebar ── */
#sidebar{
  width:var(--sidebar-w);flex-shrink:0;height:100vh;
  background:#1e1e20;display:flex;flex-direction:column;
  border-right:1px solid var(--border);
  transition:width .3s var(--ease);position:relative;z-index:40;overflow:hidden;
}
#sidebar.collapsed{width:var(--sidebar-c);}
#sidebar::before{
  content:'';position:absolute;inset:0;pointer-events:none;z-index:0;
  background:repeating-linear-gradient(0deg,transparent,transparent 2px,rgba(255,255,255,0.009) 2px,rgba(255,255,255,0.009) 4px);
}
.sb-brand{padding:0 16px;height:var(--header-h);border-bottom:1px solid var(--border);display:flex;align-items:center;gap:10px;flex-shrink:0;position:relative;z-index:1;overflow:hidden;}
.sb-logo-mark{width:28px;height:28px;flex-shrink:0;background:var(--accent);clip-path:polygon(50% 0%,100% 25%,100% 75%,50% 100%,0% 75%,0% 25%);display:flex;align-items:center;justify-content:center;position:relative;}
.sb-logo-mark::after{content:'';width:10px;height:10px;background:#0c0d11;clip-path:circle(50%);position:absolute;}
.sb-brand-text{overflow:hidden;white-space:nowrap;transition:opacity .2s;}
#sidebar.collapsed .sb-brand-text{opacity:0;width:0;}
.sb-brand-name{font-size:13px;font-weight:600;color:var(--text-1);line-height:1.2;}
.sb-brand-sub{font-size:9px;font-weight:400;letter-spacing:.12em;text-transform:uppercase;color:var(--text-3);margin-top:1px;}
.sb-nav{flex:1;overflow-y:auto;overflow-x:hidden;padding:10px 8px;display:flex;flex-direction:column;gap:1px;position:relative;z-index:1;}
.nav-section{font-size:8.5px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--text-3);padding:10px 10px 4px;white-space:nowrap;overflow:hidden;transition:opacity .2s;}
#sidebar.collapsed .nav-section{opacity:0;}
.nav-link{display:flex;align-items:center;gap:10px;padding:8px 10px;border-radius:8px;font-size:12.5px;font-weight:500;color:var(--text-2);cursor:pointer;transition:all .15s;white-space:nowrap;overflow:hidden;border:1px solid transparent;position:relative;background:none;width:100%;text-align:left;}
.nav-link i{width:16px;text-align:center;flex-shrink:0;font-size:11px;}
.nav-link .lbl{overflow:hidden;transition:opacity .2s,max-width .3s;max-width:160px;}
#sidebar.collapsed .nav-link .lbl{opacity:0;max-width:0;}
.nav-link:hover{color:var(--text-1);background:var(--surface-hov);}
.nav-link.active{color:var(--accent);background:var(--accent-dim);border-color:rgba(0,201,167,.15);}
.nav-link.active::before{content:'';position:absolute;left:0;top:50%;transform:translateY(-50%);width:2px;height:60%;background:var(--accent);border-radius:0 2px 2px 0;}
.nav-acc-arrow{margin-left:auto;font-size:9px;flex-shrink:0;transition:transform .2s;color:var(--text-3);}
.nav-acc-arrow.open{transform:rotate(180deg);}
#sidebar.collapsed .nav-acc-arrow{opacity:0;}
.nav-acc-children{padding-left:26px;margin-top:2px;display:none;flex-direction:column;gap:1px;}
.nav-acc-children.open{display:flex;}
#sidebar.collapsed .nav-acc-children{display:none!important;}
.nav-child{display:flex;align-items:center;gap:8px;padding:6px 10px;border-radius:6px;font-size:12px;font-weight:500;color:var(--text-2);cursor:pointer;transition:all .15s;background:none;border:none;width:100%;text-align:left;}
.nav-child:hover{color:var(--text-1);background:var(--surface-hov);}
.nav-child.active{color:var(--accent);}
.sb-footer{flex-shrink:0;border-top:1px solid var(--border);padding:10px 8px;position:relative;z-index:1;}
.sb-user{display:flex;align-items:center;gap:10px;padding:8px 10px;border-radius:8px;overflow:hidden;margin-bottom:4px;}
.sb-avatar{width:28px;height:28px;border-radius:50%;flex-shrink:0;background:linear-gradient(135deg,#00c9a7,#0891b2);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#fff;}
.sb-user-info{overflow:hidden;transition:opacity .2s;}
#sidebar.collapsed .sb-user-info{opacity:0;width:0;}
.sb-uname{font-size:12px;font-weight:600;color:var(--text-1);white-space:nowrap;}
.sb-urole{font-size:10px;color:var(--text-3);white-space:nowrap;}
.sb-collapse-btn{width:100%;display:flex;align-items:center;justify-content:center;gap:8px;padding:8px 10px;border-radius:8px;border:1px solid var(--border);background:none;color:var(--text-3);font-size:11px;font-weight:500;transition:all .15s;overflow:hidden;}
.sb-collapse-btn:hover{border-color:var(--border-hi);color:var(--text-2);background:var(--surface-hov);}
.sb-collapse-btn .lbl{transition:opacity .2s,max-width .3s;max-width:120px;white-space:nowrap;}
#sidebar.collapsed .sb-collapse-btn .lbl{opacity:0;max-width:0;}
.sb-collapse-icon{transition:transform .3s var(--ease);flex-shrink:0;}
#sidebar.collapsed .sb-collapse-icon{transform:rotate(180deg);}

/* Main */
.main{flex:1;display:flex;flex-direction:column;min-width:0;overflow:hidden;}
.top-hdr{height:var(--header-h);flex-shrink:0;background:var(--surface);border-bottom:1px solid var(--border);display:flex;align-items:center;padding:0 24px;gap:14px;position:sticky;top:0;z-index:20;}
.hdr-ham{width:32px;height:32px;border:1px solid var(--border);border-radius:7px;display:none;align-items:center;justify-content:center;background:none;color:var(--text-2);transition:all .15s;flex-shrink:0;}
@media(max-width:767px){.hdr-ham{display:flex;}}
.hdr-page-info{flex:1;min-width:0;}
.hdr-title{font-size:13px;font-weight:600;color:var(--text-1);}
.hdr-breadcrumb{font-size:11px;color:var(--text-3);margin-top:2px;display:flex;align-items:center;gap:5px;}
.hdr-right{display:flex;align-items:center;gap:10px;flex-shrink:0;}
.live-pill{display:flex;align-items:center;gap:6px;padding:4px 10px;border-radius:999px;background:rgba(0,201,167,0.08);border:1px solid rgba(0,201,167,.16);font-size:10px;font-weight:600;letter-spacing:.06em;color:var(--accent);}
.live-dot{width:6px;height:6px;border-radius:50%;background:var(--accent);animation:pulse-live 2s ease infinite;}
@keyframes pulse-live{0%,100%{opacity:1;}50%{opacity:.4;}}
.hdr-date{font-family:var(--font-mono);font-size:11px;color:var(--text-3);padding:4px 10px;border:1px solid var(--border);border-radius:6px;}
.content{flex:1;overflow-y:auto;padding:24px;}
@media(max-width:640px){.content{padding:14px;}}

/* Screens */
.screen{display:none;animation:fadeUp .35s var(--ease) both;}
.screen.active{display:block;}
@keyframes fadeUp{from{opacity:0;transform:translateY(10px);}to{opacity:1;transform:translateY(0);}}

/* Page header */
.page-hdr{margin-bottom:22px;display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:12px;}
.page-hdr-left h2{font-family:var(--font-display);font-size:30px;font-weight:300;color:var(--text-1);letter-spacing:-.3px;line-height:1;}
.page-hdr-left p{font-size:12px;color:var(--text-3);margin-top:6px;}
.page-hdr-right{display:flex;align-items:center;gap:8px;flex-wrap:wrap;}

/* Cards */
.card{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);overflow:hidden;}
.card-hdr{display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-bottom:1px solid var(--border);flex-wrap:wrap;gap:8px;}
.card-title{font-size:13px;font-weight:600;color:var(--text-1);display:flex;align-items:center;gap:8px;}
.card-meta{font-size:11px;color:var(--text-3);}
.card-body{padding:18px;}
.card-body.np{padding:0;}

/* Stats strip */
.stats-strip{display:grid;gap:0;background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);overflow:hidden;margin-bottom:18px;}
.stat-cell{padding:20px 22px;border-right:1px solid var(--border);position:relative;overflow:hidden;}
.stat-cell:last-child{border-right:none;}
.stat-cell::after{content:'';position:absolute;bottom:0;left:0;height:2px;width:0;background:var(--accent);transition:width .8s var(--ease);}
.stat-cell.loaded::after{width:100%;}
.stat-label{font-size:9px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--text-3);margin-bottom:10px;display:flex;align-items:center;gap:6px;}
.stat-num{font-family:var(--font-display);font-size:38px;font-weight:300;color:var(--text-1);line-height:1;font-variant-numeric:tabular-nums;}
.stat-num.accent{color:var(--accent);}
.stat-sub{font-size:10px;color:var(--text-3);margin-top:5px;font-family:var(--font-mono);}

/* Tables */
.wst-table{width:100%;border-collapse:collapse;font-size:12.5px;}
.wst-table thead tr{border-bottom:1px solid var(--border-hi);}
.wst-table thead th{padding:10px 16px;font-size:9px;font-weight:700;text-transform:uppercase;letter-spacing:.12em;color:var(--text-3);text-align:left;white-space:nowrap;}
.wst-table thead th.r{text-align:right;}
.wst-table tbody tr{border-bottom:1px solid var(--border);transition:background .12s;}
.wst-table tbody tr:last-child{border-bottom:none;}
.wst-table tbody tr:hover td{background:var(--surface-hov);}
.wst-table tbody td{padding:11px 16px;color:var(--text-2);}
.wst-table tbody td.r{text-align:right;}
.wst-table tbody td.primary{color:var(--text-1);font-weight:600;}
.table-scroll{overflow-x:auto;}

/* Pills */
.pill{display:inline-flex;align-items:center;gap:3px;padding:3px 8px;border-radius:5px;font-size:10px;font-weight:600;letter-spacing:.03em;}
.pill-teal{background:var(--accent-dim);color:var(--accent);border:1px solid rgba(0,201,167,.15);}
.pill-blue{background:var(--blue-dim);color:var(--blue);border:1px solid rgba(110,168,254,.15);}
.pill-amber{background:var(--amber-dim);color:var(--amber);border:1px solid rgba(232,160,32,.15);}
.pill-purple{background:var(--purple-dim);color:var(--purple);border:1px solid rgba(192,132,252,.15);}
.pill-green{background:var(--green-dim);color:var(--green);border:1px solid rgba(74,222,128,.15);}
.pill-red{background:var(--red-dim);color:var(--red);border:1px solid rgba(239,68,68,.15);}
.pill-dim{background:rgba(255,255,255,.05);color:var(--text-2);border:1px solid var(--border);}

/* Buttons */
.btn{display:inline-flex;align-items:center;gap:6px;padding:7px 14px;border-radius:7px;font-size:12px;font-weight:600;font-family:var(--font-ui);cursor:pointer;transition:all .15s;border:none;}
.btn-ghost{background:none;border:1px solid var(--border);color:var(--text-2);}
.btn-ghost:hover{border-color:var(--border-hi);color:var(--text-1);background:var(--surface-hov);}
.btn-accent{background:var(--accent-dim);color:var(--accent);border:1px solid rgba(0,201,167,.2);}
.btn-accent:hover{background:rgba(0,201,167,.2);border-color:rgba(0,201,167,.35);}
.btn-primary{background:var(--accent);color:#0c0d11;border:1px solid var(--accent);}
.btn-primary:hover{background:#00b093;}
.btn-danger{background:var(--red-dim);color:var(--red);border:1px solid rgba(239,68,68,.2);}
.btn-danger:hover{background:rgba(239,68,68,.22);}

/* Filter bar */
.filter-bar{display:flex;align-items:stretch;background:var(--surface-hi);border:1px solid var(--border);border-radius:9px;overflow:hidden;margin-bottom:16px;}
.filter-item{display:flex;align-items:center;gap:8px;padding:9px 14px;flex:1;border-right:1px solid var(--border);}
.filter-item:last-child{border-right:none;}
.filter-item i{color:var(--text-3);font-size:11px;flex-shrink:0;}
.filter-item input,.filter-item select{border:none;outline:none;background:transparent;font-size:12.5px;color:var(--text-1);width:100%;font-family:var(--font-ui);}
.filter-item input::placeholder{color:var(--text-3);}
.filter-item select{cursor:pointer;appearance:none;color:var(--text-2);}
.filter-item select option{background:var(--surface);color:var(--text-1);}
@media(max-width:580px){.filter-bar{flex-direction:column;}.filter-item{border-right:none;border-bottom:1px solid var(--border);}.filter-item:last-child{border-bottom:none;}}

/* Content grid for member views */
.resource-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:14px;}
.resource-card{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:20px;cursor:pointer;transition:all .2s;position:relative;overflow:hidden;}
.resource-card::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,transparent 60%,rgba(0,201,167,.04));pointer-events:none;}
.resource-card:hover{border-color:var(--border-hi);transform:translateY(-2px);box-shadow:0 8px 32px rgba(0,0,0,.3);}
.rc-type{font-size:9px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--text-3);margin-bottom:12px;display:flex;align-items:center;gap:6px;}
.rc-title{font-size:14px;font-weight:600;color:var(--text-1);line-height:1.45;margin-bottom:10px;}
.rc-meta{font-size:11px;color:var(--text-3);font-family:var(--font-mono);}
.rc-footer{display:flex;align-items:center;justify-content:space-between;margin-top:16px;padding-top:14px;border-top:1px solid var(--border);}
.rc-views{font-size:10px;font-weight:600;color:var(--text-3);font-family:var(--font-mono);}
.rc-cta{font-size:10px;font-weight:700;color:var(--accent);letter-spacing:.06em;text-transform:uppercase;}

/* Form elements */
.form-group{margin-bottom:18px;}
.form-label{display:block;font-size:10px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--text-3);margin-bottom:7px;}
.form-input,.form-select,.form-textarea{width:100%;background:var(--surface-hi);border:1px solid var(--border);border-radius:8px;padding:10px 14px;font-size:13px;color:var(--text-1);font-family:var(--font-ui);transition:border-color .2s,box-shadow .2s;outline:none;}
.form-input:focus,.form-select:focus,.form-textarea:focus{border-color:rgba(0,201,167,.4);box-shadow:0 0 0 3px rgba(0,201,167,.08);}
.form-input::placeholder,.form-textarea::placeholder{color:var(--text-3);}
.form-select{cursor:pointer;appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16'%3E%3Cpath stroke='%238b92a5' stroke-width='1.5' d='M4 6l4 4 4-4'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 12px center;background-size:16px;padding-right:36px;}
.form-select option{background:var(--surface);}
.form-textarea{resize:vertical;min-height:100px;}
.form-grid-2{display:grid;grid-template-columns:1fr 1fr;gap:16px;}
@media(max-width:600px){.form-grid-2{grid-template-columns:1fr;}}
.form-hint{font-size:11px;color:var(--text-3);margin-top:5px;}

/* Chart */
.chart-wrap{position:relative;height:200px;width:100%;}
.chart-tabs{display:flex;gap:2px;}
.tab-btn{padding:5px 12px;border-radius:6px;font-size:11px;font-weight:600;font-family:var(--font-ui);border:1px solid transparent;background:none;color:var(--text-3);transition:all .15s;cursor:pointer;}
.tab-btn.active{background:var(--accent-dim);color:var(--accent);border-color:rgba(0,201,167,.2);}
.tab-btn:hover:not(.active){color:var(--text-2);background:var(--surface-hov);}

/* Performer */
.performer-list{display:flex;flex-direction:column;gap:2px;}
.performer-item{display:flex;align-items:center;gap:10px;padding:8px 12px;border-radius:8px;border:1px solid transparent;cursor:pointer;transition:all .18s;background:none;width:100%;text-align:left;font-family:var(--font-ui);}
.performer-item:hover{background:var(--surface-hov);border-color:var(--border);}
.performer-item.selected{background:var(--accent-dim);border-color:rgba(0,201,167,.2);}
.p-rank{font-family:var(--font-mono);font-size:10px;color:var(--text-3);width:14px;text-align:center;flex-shrink:0;}
.p-title{font-size:12px;font-weight:500;color:var(--text-1);flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;}
.p-bar-wrap{width:44px;height:3px;background:rgba(255,255,255,.06);border-radius:2px;flex-shrink:0;}
.p-bar{height:100%;background:var(--accent);border-radius:2px;transition:width .6s var(--ease);}
.p-views{font-family:var(--font-mono);font-size:11px;color:var(--accent);font-weight:500;flex-shrink:0;min-width:32px;text-align:right;}

/* Expand row */
.expand-row{display:none;background:var(--surface-hi);}
.expand-row.open{display:table-row;}
.expand-inner{padding:16px 20px 20px;}
.expand-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-bottom:14px;}
@media(max-width:600px){.expand-grid{grid-template-columns:1fr 1fr;}}
.eg-k{font-size:9px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--text-3);margin-bottom:4px;}
.eg-v{font-family:var(--font-display);font-size:22px;font-weight:400;color:var(--text-1);}
.eg-v.accent{color:var(--accent);}
.mini-log{width:100%;border-collapse:collapse;font-size:11.5px;}
.mini-log th{padding:7px 12px;font-size:9px;font-weight:700;letter-spacing:.10em;text-transform:uppercase;color:var(--text-3);text-align:left;border-bottom:1px solid var(--border);}
.mini-log td{padding:8px 12px;color:var(--text-2);border-bottom:1px solid var(--border);}
.mini-log tr:last-child td{border-bottom:none;}

/* Schedule/calendar */
.schedule-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:14px;}
.appt-card{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius);padding:18px;transition:all .2s;}
.appt-card:hover{border-color:var(--border-hi);box-shadow:0 4px 24px rgba(0,0,0,.2);}
.appt-date-badge{display:inline-flex;flex-direction:column;align-items:center;padding:6px 12px;border-radius:8px;background:var(--accent-dim);border:1px solid rgba(0,201,167,.2);margin-bottom:14px;}
.appt-month{font-size:9px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--accent);}
.appt-day{font-family:var(--font-display);font-size:28px;font-weight:300;color:var(--accent);line-height:1;}

/* Estimator */
.estimator-wrap{display:grid;grid-template-columns:1fr 1fr;gap:20px;}
@media(max-width:900px){.estimator-wrap{grid-template-columns:1fr;}}
.result-panel{background:var(--accent-dim);border:1px solid rgba(0,201,167,.2);border-radius:var(--radius);padding:24px;display:flex;flex-direction:column;gap:14px;}
.result-big{font-family:var(--font-display);font-size:52px;font-weight:300;color:var(--accent);line-height:1;}
.result-row{display:flex;justify-content:space-between;padding:10px 0;border-bottom:1px solid rgba(0,201,167,.12);}
.result-row:last-child{border-bottom:none;}
.result-k{font-size:11px;color:rgba(0,201,167,.6);}
.result-v{font-family:var(--font-mono);font-size:13px;font-weight:600;color:var(--accent);}

/* Toast */
.toast{position:fixed;bottom:20px;right:20px;z-index:9999;display:flex;align-items:center;gap:10px;padding:12px 16px;border-radius:10px;font-size:12.5px;font-weight:500;background:var(--surface-hi);border:1px solid var(--border-hi);box-shadow:0 16px 48px rgba(0,0,0,.5);animation:toastIn .3s var(--ease);}
@keyframes toastIn{from{opacity:0;transform:translateY(12px);}to{opacity:1;transform:translateY(0);}}

/* Mobile */
#mob-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.65);backdrop-filter:blur(6px);z-index:30;opacity:0;transition:opacity .25s;}
@media(max-width:767px){#mob-overlay{display:block;}#sidebar{position:fixed;top:0;left:0;height:100vh;transform:translateX(-100%);transition:transform .3s var(--ease);}#sidebar.mob-open{transform:translateX(0);}}
.hide-sm{display:none;}
@media(min-width:640px){.hide-sm{display:initial;}}

/* Mid grid */
.mid-grid{display:grid;grid-template-columns:1fr 360px;gap:16px;margin-bottom:18px;}
@media(max-width:1100px){.mid-grid{grid-template-columns:1fr;}}

/* ── LIGHT THEME ── */
[data-theme="light"] {
  --bg:#f0f2f7; --surface:#ffffff; --surface-hi:#f4f6fb; --surface-hov:#eef0f8;
  --border:rgba(0,0,0,0.07); --border-hi:rgba(0,0,0,0.13);
  --text-1:#0d0f1a; --text-2:#5a6278; --text-3:rgba(13,15,26,0.35);
  --accent:#007a64; --accent-dim:rgba(0,122,100,0.10); --accent-glow:rgba(0,122,100,0.20);
  --amber:#c47a00; --amber-dim:rgba(196,122,0,0.10);
  --red:#c0392b; --red-dim:rgba(192,57,43,0.10);
  --blue:#2563b5; --blue-dim:rgba(37,99,181,0.10);
  --purple:#7c3aed; --purple-dim:rgba(124,58,237,0.10);
  --green:#166534; --green-dim:rgba(22,101,52,0.10);
  --font-mono:'JetBrains Mono',monospace;
}
[data-theme="light"] .sb-brand-name { color:#0d0f1a; }
[data-theme="light"] .sb-brand-sub  { color:rgba(0,0,0,0.3); }
[data-theme="light"] .sb-logo-mark::after { background:#f0f2f7; }
[data-theme="light"] .wst-table tbody tr:hover td { background:#eef0f8 !important; }
[data-theme="light"] .filter-item input::placeholder { color:rgba(13,15,26,0.3); }
[data-theme="light"] .filter-item select option { background:#fff; color:#0d0f1a; }
[data-theme="light"] .chart-wrap canvas { filter:none; }
[data-theme="light"] 
[data-theme="light"] #sidebar .nav-link { color:rgba(255,255,255,0.5); }
[data-theme="light"] #sidebar .nav-link:hover { color:#fff; background:rgba(255,255,255,0.08); }
[data-theme="light"] #sidebar .nav-link.active { color:#00c9a7; background:rgba(0,201,167,0.15); }
[data-theme="light"] #sidebar .nav-section { color:rgba(255,255,255,0.2); }
[data-theme="light"] #sidebar .sb-avatar { background:linear-gradient(135deg,#007a64,#0891b2); }
[data-theme="light"] #sidebar .sb-uname { color:#fff; }
[data-theme="light"] #sidebar .sb-urole { color:rgba(255,255,255,0.3); }
[data-theme="light"] #sidebar .sb-collapse-btn { border-color:rgba(255,255,255,0.1); color:rgba(255,255,255,0.3); }
[data-theme="light"] #sidebar .sb-collapse-btn:hover { color:rgba(255,255,255,0.7); background:rgba(255,255,255,0.07); }
[data-theme="light"] #sidebar .nav-acc-arrow { color:rgba(255,255,255,0.3); }
[data-theme="light"] #sidebar .nav-child { color:rgba(255,255,255,0.45); }
[data-theme="light"] #sidebar .nav-child:hover { color:#fff; background:rgba(255,255,255,0.07); }
[data-theme="light"] #sidebar .nav-child.active { color:#00c9a7; }
[data-theme="light"] #sidebar::before { background:repeating-linear-gradient(0deg,transparent,transparent 2px,rgba(255,255,255,0.015) 2px,rgba(255,255,255,0.015) 4px); }
[data-theme="light"] .top-hdr { background:#ffffff; border-bottom-color:rgba(0,0,0,0.07); }
[data-theme="light"] .hdr-title { color:#0d0f1a; }
[data-theme="light"] .hdr-date { color:rgba(13,15,26,0.45); border-color:rgba(0,0,0,0.09); }
[data-theme="light"] .live-pill { background:rgba(0,122,100,0.08); border-color:rgba(0,122,100,0.18); color:#007a64; }
[data-theme="light"] .live-dot { background:#007a64; }
[data-theme="light"] .stat-cell::after { background:#007a64; }
[data-theme="light"] .stat-num.accent { color:#007a64; }
[data-theme="light"] .performer-item:hover { background:#eef0f8; }
[data-theme="light"] .performer-item.selected { background:rgba(0,122,100,0.10); border-color:rgba(0,122,100,0.25); }
[data-theme="light"] .p-bar { background:#007a64; }
[data-theme="light"] .p-views { color:#007a64; }
[data-theme="light"] .tab-btn.active { background:rgba(0,122,100,0.10); color:#007a64; border-color:rgba(0,122,100,0.22); }
[data-theme="light"] .card { background:#ffffff; border-color:rgba(0,0,0,0.07); }
[data-theme="light"] .card-hdr { border-bottom-color:rgba(0,0,0,0.06); }
[data-theme="light"] .resource-card { background:#ffffff; border-color:rgba(0,0,0,0.07); }
[data-theme="light"] .resource-card:hover { border-color:rgba(0,0,0,0.14); box-shadow:0 8px 32px rgba(0,0,0,0.08); }
[data-theme="light"] .filter-bar { background:#f4f6fb; border-color:rgba(0,0,0,0.08); }
[data-theme="light"] .filter-item { border-right-color:rgba(0,0,0,0.07); }
[data-theme="light"] .filter-item input,.filter-item select { color:#0d0f1a; }
[data-theme="light"] .form-input,.form-select,.form-textarea { background:#f4f6fb; border-color:rgba(0,0,0,0.10); color:#0d0f1a; }
[data-theme="light"] .form-input:focus,.form-select:focus,.form-textarea:focus { border-color:rgba(0,122,100,0.4); }
[data-theme="light"] .result-panel { background:rgba(0,122,100,0.08); border-color:rgba(0,122,100,0.2); }
[data-theme="light"] .result-big { color:#007a64; }
[data-theme="light"] .result-k { color:rgba(0,100,80,0.55); }
[data-theme="light"] .result-v { color:#007a64; }
[data-theme="light"] .result-row { border-bottom-color:rgba(0,122,100,0.12); }
[data-theme="light"] .appt-card { background:#ffffff; border-color:rgba(0,0,0,0.07); }
[data-theme="light"] .appt-date-badge { background:rgba(0,122,100,0.08); border-color:rgba(0,122,100,0.2); }
[data-theme="light"] .appt-month,.appt-day { color:#007a64; }
[data-theme="light"] .toast { background:#ffffff; border-color:rgba(0,0,0,0.10); }
[data-theme="light"] .pill-teal { background:rgba(0,122,100,0.10); color:#007a64; border-color:rgba(0,122,100,0.2); }
[data-theme="light"] .consultation-row:hover td { background:#f0f7f5 !important; }
[data-theme="light"] .viewer-panel { background:#f4f6fb; border-color:rgba(0,0,0,0.08); }
[data-theme="light"] .viewer-search { background:#fff; border-color:rgba(0,0,0,0.10); color:#0d0f1a; }
[data-theme="light"] .wst-table thead th { background:#f8f9fc; }
[data-theme="light"] .expand-row { background:#f4f6fb; }
[data-theme="light"] .expand-inner { border-top:1px solid rgba(0,0,0,0.06); }
[data-theme="light"] .mini-log th { border-bottom-color:rgba(0,0,0,0.07); }
[data-theme="light"] .mini-log td { border-bottom-color:rgba(0,0,0,0.05); }

/* ── Theme toggle button ── */
.theme-toggle {
  width:34px; height:34px; border-radius:8px;
  border:1px solid var(--border); background:none;
  color:var(--text-2); display:flex; align-items:center;
  justify-content:center; cursor:pointer;
  transition:all .15s; flex-shrink:0;
  font-size:14px;
}
.theme-toggle:hover { border-color:var(--border-hi); color:var(--text-1); background:var(--surface-hov); }

/* ── Viewer log panel ── */
.viewer-panel {
  background:var(--surface-hi); border:1px solid var(--border);
  border-radius:var(--radius); padding:20px; margin-top:16px;
}
.viewer-panel-hdr {
  display:flex; align-items:center; justify-content:space-between;
  margin-bottom:14px; flex-wrap:wrap; gap:10px;
}
.viewer-panel-title {
  font-size:13px; font-weight:700; color:var(--text-1);
}
.viewer-panel-meta { font-size:11px; color:var(--text-3); }
.viewer-search {
  padding:7px 12px; border-radius:7px;
  border:1px solid var(--border); background:var(--surface);
  color:var(--text-1); font-family:var(--font-ui); font-size:12px;
  outline:none; transition:border-color .2s; min-width:200px;
}
.viewer-search:focus { border-color:rgba(0,201,167,.4); }
.viewer-search::placeholder { color:var(--text-3); }
.viewer-avatar {
  width:26px; height:26px; border-radius:50%; flex-shrink:0;
  background:var(--accent-dim); border:1px solid rgba(0,201,167,.2);
  display:flex; align-items:center; justify-content:center;
  font-size:10px; font-weight:700; color:var(--accent);
  text-transform:uppercase;
}
.row-clickable { cursor:pointer; }
.row-clickable:hover td { background:var(--surface-hov) !important; }
.row-active td { background:var(--accent-dim) !important; }

/* ── Consultation screen ── */
.consult-row { cursor:pointer; }
.consult-row:hover td { background:var(--surface-hov) !important; }
.status-pill-approved { background:rgba(74,222,128,0.12); color:#4ade80; border:1px solid rgba(74,222,128,0.2); padding:4px 10px; border-radius:999px; font-size:10px; font-weight:700; letter-spacing:.06em; white-space:nowrap; }
.status-pill-pending  { background:var(--amber-dim); color:var(--amber); border:1px solid rgba(232,160,32,.2); padding:4px 10px; border-radius:999px; font-size:10px; font-weight:700; letter-spacing:.06em; white-space:nowrap; }
.status-pill-review   { background:var(--blue-dim); color:var(--blue); border:1px solid rgba(110,168,254,.2); padding:4px 10px; border-radius:999px; font-size:10px; font-weight:700; letter-spacing:.06em; white-space:nowrap; }
.client-avatar { width:32px; height:32px; border-radius:50%; flex-shrink:0; background:var(--accent-dim); border:1px solid rgba(0,201,167,.2); display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:700; color:var(--accent); text-transform:uppercase; }
.meeting-link { color:var(--accent); font-size:12px; font-weight:600; text-decoration:none; }
.meeting-link:hover { text-decoration:underline; }
.meeting-inprog { font-size:11px; color:var(--text-3); font-style:italic; }
.timeline-badge { display:inline-flex; align-items:center; gap:5px; padding:4px 10px; border-radius:999px; background:var(--blue-dim); border:1px solid rgba(110,168,254,.2); font-size:11px; font-weight:600; color:var(--blue); font-family:var(--font-mono); white-space:nowrap; }
.consult-select { background:var(--surface-hi); border:1px solid var(--border); border-radius:6px; padding:4px 10px; font-size:11px; font-weight:600; color:var(--text-1); font-family:var(--font-ui); cursor:pointer; outline:none; transition:border-color .2s; }
.consult-select:focus { border-color:var(--accent); }

</style>
</head>
<body data-theme="dark">

<div class="toast" id="toast">
  <div style="width:24px;height:24px;border-radius:50%;background:var(--accent-dim);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
    <i class="fa-solid fa-check" style="font-size:10px;color:var(--accent);"></i>
  </div>
  <div>
    <div style="color:var(--text-1);font-weight:600;font-size:12px;">WST Portal loaded</div>
    <div style="color:var(--text-3);font-size:11px;margin-top:1px;font-family:var(--font-mono);" id="toast-time"></div>
  </div>
</div>

<div id="mob-overlay" onclick="closeMobile()"></div>

<div class="shell">

<!-- ════ SIDEBAR ════ -->
<aside id="sidebar">
  <div class="sb-brand">
    <div class="sb-logo-mark"></div>
    <div class="sb-brand-text">
      <div class="sb-brand-name">Water Solutions<span style="color:var(--accent);">Tech</span></div>
      <div class="sb-brand-sub">Portfolio Intelligence</div>
    </div>
  </div>

  <nav class="sb-nav">
    <div class="nav-section">Admin</div>
    <button class="nav-link active" onclick="nav('dashboard',this,'Admin Dashboard','Admin')">
      <i class="fa-solid fa-gauge-high"></i><span class="lbl">Dashboard</span>
    </button>
    <button class="nav-link" onclick="nav('admin-resources',this,'All Resources','Admin')">
      <i class="fa-solid fa-layer-group"></i><span class="lbl">All Resources</span>
    </button>
    <button class="nav-link" onclick="nav('admin-articles',this,'Articles','Admin')">
      <i class="fa-solid fa-newspaper"></i><span class="lbl">Articles</span>
    </button>
    <button class="nav-link" onclick="nav('admin-industries',this,'Industries','Admin')">
      <i class="fa-solid fa-industry"></i><span class="lbl">Industries</span>
    </button>
    <button class="nav-link" onclick="nav('admin-whitepapers',this,'White Papers','Admin')">
      <i class="fa-solid fa-file-lines"></i><span class="lbl">White Papers</span>
    </button>
    <button class="nav-link" onclick="nav('admin-casestudies',this,'Case Studies','Admin')">
      <i class="fa-solid fa-briefcase"></i><span class="lbl">Case Studies</span>
    </button>
    <button class="nav-link" onclick="nav('admin-webinars',this,'Webinars','Admin')">
      <i class="fa-solid fa-video"></i><span class="lbl">Webinars</span>
    </button>
    <button class="nav-link" onclick="nav('admin-tools',this,'Tools & Calculators','Admin')">
      <i class="fa-solid fa-calculator"></i><span class="lbl">Tools &amp; Calculators</span>
    </button>

    <button class="nav-link" onclick="nav('admin-consultation',this,'Consultation Requests','Admin')">
      <i class="fa-solid fa-calendar-check"></i><span class="lbl">Schedule Audit &amp; Advisory</span>
    </button>

    <div class="nav-section">Member View</div>
    <button class="nav-link" onclick="nav('member-resources',this,'All Resources','Member')">
      <i class="fa-solid fa-layer-group"></i><span class="lbl">All Resources</span>
    </button>
    <button class="nav-link" onclick="nav('member-articles',this,'Articles','Member')">
      <i class="fa-solid fa-newspaper"></i><span class="lbl">Articles</span>
    </button>
    <button class="nav-link" onclick="nav('member-whitepapers',this,'Industry White Papers','Member')">
      <i class="fa-solid fa-file-lines"></i><span class="lbl">Industry White Papers</span>
    </button>
    <button class="nav-link" onclick="nav('member-casestudies',this,'Case Studies','Member')">
      <i class="fa-solid fa-briefcase"></i><span class="lbl">Case Studies</span>
    </button>
    <button class="nav-link" onclick="nav('member-webinars',this,'Webinars On Demand','Member')">
      <i class="fa-solid fa-video"></i><span class="lbl">Webinars On Demand</span>
    </button>
    <button class="nav-link" onclick="nav('member-tools',this,'Water Target Tools','Member')">
      <i class="fa-solid fa-calculator"></i><span class="lbl">Water Target Tools</span>
    </button>
    <button class="nav-link" onclick="nav('estimators',this,'Cost Reduction Estimators','Member')">
      <i class="fa-solid fa-chart-line"></i><span class="lbl">Cost Reduction Estimators</span>
    </button>

    <div>
      <button class="nav-link" onclick="toggleAcc(this)" style="justify-content:flex-start;">
        <i class="fa-solid fa-calendar-check"></i>
        <span class="lbl">Schedule Audit &amp; Advisory</span>
        <i class="fa-solid fa-chevron-down nav-acc-arrow lbl"></i>
      </button>
      <div class="nav-acc-children">
        <button class="nav-child" onclick="nav('schedule-upcoming',this,'Schedule Audit & Advisory — Upcoming','Schedule')">
          <i class="fa-solid fa-clock" style="width:12px;font-size:10px;color:var(--text-3);"></i> Upcoming
        </button>
        <button class="nav-child" onclick="nav('schedule-new',this,'Schedule New Audit','Schedule')">
          <i class="fa-solid fa-plus" style="width:12px;font-size:10px;color:var(--text-3);"></i> Schedule New
        </button>
      </div>
    </div>

    <div class="nav-section">Quick Links</div>
    <button class="nav-link" onclick="showToast('Opening main website…','fa-arrow-up-right-from-square')">
      <i class="fa-solid fa-arrow-up-right-from-square"></i><span class="lbl">Main Website</span>
    </button>
    <button class="nav-link" onclick="showToast('Opening support…','fa-envelope')">
      <i class="fa-solid fa-envelope"></i><span class="lbl">Contact Support</span>
    </button>
  </nav>

  <div class="sb-footer">
    <div class="sb-user">
      <div class="sb-avatar">C</div>
      <div class="sb-user-info">
        <div class="sb-uname">Clifford Campbell</div>
        <div class="sb-urole">Administrator</div>
      </div>
    </div>
    <button class="sb-collapse-btn" onclick="toggleSidebar()">
      <i class="fa-solid fa-chevrons-left sb-collapse-icon" style="font-size:11px;"></i>
      <span class="lbl" style="font-size:11px;">Collapse</span>
    </button>
  </div>
</aside>

<!-- ════ MAIN ════ -->
<div class="main">
  <header class="top-hdr">
    <button class="hdr-ham" onclick="openMobile()"><i class="fa-solid fa-bars" style="font-size:12px;"></i></button>
    <div class="hdr-page-info">
      <div class="hdr-title" id="hdr-title">Admin Dashboard</div>
      <div class="hdr-breadcrumb">
        <span>WST Portal</span>
        <i class="fa-solid fa-chevron-right" style="font-size:8px;opacity:.4;"></i>
        <span style="color:var(--text-2);" id="hdr-section">Admin</span>
      </div>
    </div>
    <div class="hdr-right">
      <div class="live-pill"><div class="live-dot"></div>Live</div>
      <div class="hdr-date" id="hdr-clock">--:--:--</div>
      <div style="width:1px;height:20px;background:var(--border);"></div>
      <button class="theme-toggle" id="theme-toggle" onclick="toggleTheme()" title="Toggle light/dark">
        <i class="fa-solid fa-circle-half-stroke" id="theme-icon"></i>
      </button>
      <div style="width:1px;height:20px;background:var(--border);"></div>
      <div class="sb-avatar" style="width:28px;height:28px;font-size:11px;">C</div>
      <span class="hide-sm" style="font-size:12px;font-weight:500;color:var(--text-2);">Clifford</span>
    </div>
  </header>

  <main class="content" id="main-content">

    <!-- ══════════════════════════════════════
         SCREEN: DASHBOARD
    ══════════════════════════════════════ -->
    <div class="screen active" id="screen-dashboard">
      <div class="page-hdr">
        <div class="page-hdr-left">
          <h2>Portfolio Intelligence</h2>
          <p id="date-label">Loading…</p>
        </div>
      </div>

      <div class="stats-strip" id="stats-strip" style="grid-template-columns:repeat(4,1fr) 1.4fr;">
        <div class="stat-cell"><div class="stat-label"><i class="fa-solid fa-layer-group" style="color:var(--blue);"></i>Total Assets</div><div class="stat-num" id="cnt-assets">0</div><div class="stat-sub">Published resources</div></div>
        <div class="stat-cell"><div class="stat-label"><i class="fa-solid fa-eye" style="color:var(--accent);"></i>Total Views</div><div class="stat-num accent" id="cnt-views">0</div><div class="stat-sub" style="display:flex;align-items:center;gap:5px;"><span style="background:var(--accent-dim);color:var(--accent);padding:1px 5px;border-radius:4px;font-size:9px;font-weight:700;">↑ 18%</span><span>vs last month</span></div></div>
        <div class="stat-cell"><div class="stat-label"><i class="fa-solid fa-users" style="color:var(--purple);"></i>Registered Leads</div><div class="stat-num" id="cnt-leads">0</div><div class="stat-sub">Verified accounts</div></div>
        <div class="stat-cell"><div class="stat-label"><i class="fa-solid fa-bell" style="color:var(--amber);"></i>Subscribers</div><div class="stat-num" id="cnt-subs">0</div><div class="stat-sub">Newsletter</div></div>
        <div class="stat-cell"><div class="stat-label"><i class="fa-solid fa-trophy" style="color:var(--amber);"></i>Top Asset</div><div class="stat-num" style="font-size:13px;font-weight:600;font-family:var(--font-ui);" id="top-asset">Loading…</div><div class="stat-sub" id="top-views">—</div></div>
      </div>

      <div class="mid-grid">
        <div class="card">
          <div class="card-hdr">
            <div class="card-title"><i class="fa-solid fa-wave-square" style="color:var(--accent);font-size:11px;"></i>Engagement Trend</div>
            <div class="chart-tabs">
              <button class="tab-btn active" onclick="switchChart(this,'views')">Views</button>
              <button class="tab-btn" onclick="switchChart(this,'leads')">Leads</button>
              <button class="tab-btn" onclick="switchChart(this,'subs')">Subscribers</button>
            </div>
          </div>
          <div class="card-body"><div class="chart-wrap"><canvas id="mainChart"></canvas></div></div>
        </div>
        <div class="card">
          <div class="card-hdr"><div class="card-title"><i class="fa-solid fa-ranking-star" style="color:var(--amber);font-size:11px;"></i>Top Performing</div><span class="card-meta">by views</span></div>
          <div class="card-body" style="padding:10px 12px;"><div class="performer-list" id="top-performers"></div></div>
        </div>
      </div>

      <!-- Asset viewer log panel (appears when performer clicked) -->
      <div id="viewer-log-panel" class="viewer-panel" style="display:none;margin-bottom:18px;">
        <div class="viewer-panel-hdr">
          <div>
            <div class="viewer-panel-title" id="viewer-asset-title">—</div>
            <div class="viewer-panel-meta" id="viewer-asset-meta">Asset ID — Total Views —</div>
          </div>
          <div style="display:flex;align-items:center;gap:10px;">
            <input type="search" class="viewer-search" id="viewer-search" placeholder="Search user or date…" oninput="filterViewerLog()">
            <button class="btn btn-ghost" onclick="closeViewerLog()" style="padding:6px 10px;">
              <i class="fa-solid fa-xmark" style="font-size:11px;"></i>
            </button>
          </div>
        </div>
        <div class="table-scroll">
          <table class="wst-table">
            <thead><tr><th>Viewer</th><th>Date</th><th class="r">Time</th></tr></thead>
            <tbody id="viewer-log-tbody"></tbody>
          </table>
        </div>
      </div>

      <div class="card" style="margin-bottom:18px;">
        <div class="card-hdr"><div class="card-title"><i class="fa-solid fa-user-tie" style="color:var(--purple);font-size:11px;"></i>Recent Leads</div><button class="btn btn-ghost" style="font-size:11px;" onclick="nav('admin-resources',document.querySelector('.nav-link:nth-child(3)'),'All Resources','Admin')"><i class="fa-solid fa-arrow-right" style="font-size:10px;"></i> View All</button></div>
        <div class="card-body np"><div class="table-scroll"><table class="wst-table"><thead><tr><th>Name</th><th>Company</th><th>Email</th><th class="r">Registered</th></tr></thead><tbody id="dash-leads"></tbody></table></div></div>
      </div>

      <div class="card">
        <div class="card-hdr"><div class="card-title"><i class="fa-solid fa-bell" style="color:var(--amber);font-size:11px;"></i>Recent Subscribers</div><span class="pill pill-dim" id="sub-count">— total</span></div>
        <div class="card-body np"><div class="table-scroll"><table class="wst-table"><thead><tr><th style="width:36px;">#</th><th>Email</th><th class="r">Subscribed</th></tr></thead><tbody id="dash-subs"></tbody></table></div></div>
      </div>
    </div>

    <!-- ══════════════════════════════════════
         SCREEN: ADMIN RESOURCES
    ══════════════════════════════════════ -->
    <div class="screen" id="screen-admin-resources">
      <div class="page-hdr">
        <div class="page-hdr-left"><h2>All Resources</h2><p>Manage published content assets across all categories</p></div>
        <div class="page-hdr-right"><button class="btn btn-primary" onclick="showToast('Opening asset editor…','fa-plus')"><i class="fa-solid fa-plus"></i> Add Asset</button></div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="filter-bar">
            <div class="filter-item"><i class="fa-solid fa-magnifying-glass"></i><input type="search" placeholder="Search resources…" oninput="filterTable('ar',this.value)" id="ar-search"></div>
            <div class="filter-item"><i class="fa-solid fa-layer-group"></i><select onchange="filterTable('ar')" id="ar-cat"><option value="">All Categories</option><option>Case Study</option><option>Webinar</option><option>White Paper</option><option>Tool</option></select><i class="fa-solid fa-chevron-down" style="color:var(--text-3);font-size:9px;flex-shrink:0;"></i></div>
            <div class="filter-item" style="min-width:150px;"><i class="fa-solid fa-building"></i><select id="ar-ind" onchange="filterTable('ar')"><option value="">All Industries</option><option>Hospitality</option><option>Office</option><option>Manufacturing</option><option>Retail</option></select><i class="fa-solid fa-chevron-down" style="color:var(--text-3);font-size:9px;flex-shrink:0;"></i></div>
          </div>
          <div class="table-scroll"><table class="wst-table" id="ar-table"><thead><tr><th style="width:28px;"></th><th>Title</th><th>Category</th><th>Industry</th><th class="r">Views</th><th class="r">Status</th><th></th></tr></thead><tbody id="ar-tbody"></tbody></table></div>
        </div>
      </div>
    </div>

    <!-- ══════════════════════════════════════
         SCREEN: ADMIN ARTICLES
    ══════════════════════════════════════ -->
    <div class="screen" id="screen-admin-articles">
      <div class="page-hdr">
        <div class="page-hdr-left"><h2>Articles</h2><p>Manage editorial content and insights</p></div>
        <div class="page-hdr-right"><button class="btn btn-primary" onclick="showToast('Opening article editor…','fa-pencil')"><i class="fa-solid fa-plus"></i> New Article</button></div>
      </div>
      <div class="card"><div class="card-body np"><div class="table-scroll"><table class="wst-table"><thead><tr><th>Title</th><th>Author</th><th>Category</th><th class="r">Views</th><th class="r">Status</th><th></th></tr></thead><tbody id="articles-tbody"></tbody></table></div></div></div>
    </div>

    <!-- ══════════════════════════════════════
         SCREEN: ADMIN INDUSTRIES
    ══════════════════════════════════════ -->
    <div class="screen" id="screen-admin-industries">
      <div class="page-hdr">
        <div class="page-hdr-left"><h2>Industries</h2><p>Manage industry categories and segments</p></div>
        <div class="page-hdr-right"><button class="btn btn-primary" onclick="showToast('Opening industry editor…','fa-plus')"><i class="fa-solid fa-plus"></i> Add Industry</button></div>
      </div>
      <div class="card"><div class="card-body np"><div class="table-scroll"><table class="wst-table"><thead><tr><th>Industry</th><th>Slug</th><th class="r">Assets</th><th class="r">Views</th><th></th></tr></thead><tbody id="industries-tbody"></tbody></table></div></div></div>
    </div>

    <!-- ══════════════════════════════════════
         SCREEN: ADMIN WHITE PAPERS
    ══════════════════════════════════════ -->
    <div class="screen" id="screen-admin-whitepapers">
      <div class="page-hdr">
        <div class="page-hdr-left"><h2>White Papers</h2><p>Technical research documents and advisory guides</p></div>
        <div class="page-hdr-right"><button class="btn btn-primary" onclick="showToast('Opening white paper editor…','fa-plus')"><i class="fa-solid fa-plus"></i> Upload Paper</button></div>
      </div>
      <div class="card"><div class="card-body np"><div class="table-scroll"><table class="wst-table"><thead><tr><th>Title</th><th>Industry</th><th class="r">Pages</th><th class="r">Downloads</th><th class="r">Status</th><th></th></tr></thead><tbody id="wp-tbody"></tbody></table></div></div></div>
    </div>

    <!-- ══════════════════════════════════════
         SCREEN: ADMIN CASE STUDIES
    ══════════════════════════════════════ -->
    <div class="screen" id="screen-admin-casestudies">
      <div class="page-hdr">
        <div class="page-hdr-left"><h2>Case Studies</h2><p>Verified client results and implementation records</p></div>
        <div class="page-hdr-right"><button class="btn btn-primary" onclick="showToast('Opening case study editor…','fa-plus')"><i class="fa-solid fa-plus"></i> Add Case Study</button></div>
      </div>
      <div class="card"><div class="card-body np"><div class="table-scroll"><table class="wst-table"><thead><tr><th>Title</th><th>Client</th><th>Industry</th><th class="r">Savings</th><th class="r">Views</th><th></th></tr></thead><tbody id="cs-tbody"></tbody></table></div></div></div>
    </div>

    <!-- ══════════════════════════════════════
         SCREEN: ADMIN WEBINARS
    ══════════════════════════════════════ -->
    <div class="screen" id="screen-admin-webinars">
      <div class="page-hdr">
        <div class="page-hdr-left"><h2>Webinars</h2><p>On-demand and upcoming webinar sessions</p></div>
        <div class="page-hdr-right"><button class="btn btn-primary" onclick="showToast('Opening webinar editor…','fa-plus')"><i class="fa-solid fa-plus"></i> Add Webinar</button></div>
      </div>
      <div class="card"><div class="card-body np"><div class="table-scroll"><table class="wst-table"><thead><tr><th>Title</th><th>Date</th><th class="r">Duration</th><th class="r">Views</th><th class="r">Status</th><th></th></tr></thead><tbody id="webinars-tbody"></tbody></table></div></div></div>
    </div>

    <!-- ══════════════════════════════════════
         SCREEN: ADMIN TOOLS
    ══════════════════════════════════════ -->
    <div class="screen" id="screen-admin-tools">
      <div class="page-hdr">
        <div class="page-hdr-left"><h2>Tools &amp; Calculators</h2><p>Interactive water management tools</p></div>
        <div class="page-hdr-right"><button class="btn btn-primary" onclick="showToast('Opening tool editor…','fa-plus')"><i class="fa-solid fa-plus"></i> Add Tool</button></div>
      </div>
      <div class="card"><div class="card-body np"><div class="table-scroll"><table class="wst-table"><thead><tr><th>Tool Name</th><th>Type</th><th class="r">Uses</th><th class="r">Status</th><th></th></tr></thead><tbody id="tools-tbody"></tbody></table></div></div></div>
    </div>

    <!-- ══════════════════════════════════════
         SCREEN: MEMBER — ALL RESOURCES
    ══════════════════════════════════════ -->
    <div class="screen" id="screen-member-resources">
      <div class="page-hdr">
        <div class="page-hdr-left"><h2>Resource Library</h2><p>Browse all available content and intelligence reports</p></div>
        <div class="page-hdr-right" style="flex-wrap:wrap;gap:8px;">
          <div class="filter-bar" style="margin-bottom:0;border-radius:9px;overflow:hidden;">
            <div class="filter-item"><i class="fa-solid fa-magnifying-glass"></i><input type="search" id="mr-search" placeholder="Search…" style="min-width:130px;" oninput="filterCards('mr')"></div>
            <div class="filter-item" style="min-width:130px;"><i class="fa-solid fa-layer-group"></i><select id="mr-cat" onchange="filterCards('mr')"><option value="">All Types</option><option>Case Study</option><option>White Paper</option><option>Webinar</option><option>Tool</option></select><i class="fa-solid fa-chevron-down" style="color:var(--text-3);font-size:9px;flex-shrink:0;"></i></div>
            <div class="filter-item" style="min-width:130px;"><i class="fa-solid fa-building"></i><select id="mr-ind" onchange="filterCards('mr')"><option value="">All Industries</option><option>Hospitality</option><option>Office</option><option>Manufacturing</option><option>Retail</option></select><i class="fa-solid fa-chevron-down" style="color:var(--text-3);font-size:9px;flex-shrink:0;"></i></div>
          </div>
        </div>
      </div>
      <div class="resource-grid" id="mr-grid"></div>
    </div>

    <!-- ══════════════════════════════════════
         SCREEN: MEMBER — ARTICLES
    ══════════════════════════════════════ -->
    <div class="screen" id="screen-member-articles">
      <div class="page-hdr"><div class="page-hdr-left"><h2>Articles &amp; Insights</h2><p>Editorial content from the WST advisory team</p></div></div>
      <div class="filter-bar" style="margin-bottom:16px;border-radius:9px;overflow:hidden;">
        <div class="filter-item"><i class="fa-solid fa-magnifying-glass"></i><input type="search" id="articles-search" placeholder="Search…" oninput="filterCards('articles')" ></div>
        <div class="filter-item" style="min-width:130px;"><i class="fa-solid fa-layer-group"></i><select id="articles-cat" onchange="filterCards('articles')"><option value="">All Types</option><option>ESG</option><option>GRESB</option><option>Tax Strategy</option><option>Operations</option></select><i class="fa-solid fa-chevron-down" style="color:var(--text-3);font-size:9px;flex-shrink:0;"></i></div>
      </div>
      <div class="resource-grid" id="ma-grid"></div>
    </div>

    <!-- ══════════════════════════════════════
         SCREEN: MEMBER — WHITE PAPERS
    ══════════════════════════════════════ -->
    <div class="screen" id="screen-member-whitepapers">
      <div class="page-hdr"><div class="page-hdr-left"><h2>Industry White Papers</h2><p>Technical research for institutional portfolios</p></div></div>
      <div class="filter-bar" style="margin-bottom:16px;border-radius:9px;overflow:hidden;">
        <div class="filter-item"><i class="fa-solid fa-magnifying-glass"></i><input type="search" id="whitepapers-search" placeholder="Search…" oninput="filterCards('whitepapers')" ></div>
        <div class="filter-item" style="min-width:130px;"><i class="fa-solid fa-building"></i><select id="whitepapers-ind" onchange="filterCards('whitepapers')"><option value="">All Industries</option><option>Hospitality</option><option>Office</option><option>Manufacturing</option><option>Retail</option></select><i class="fa-solid fa-chevron-down" style="color:var(--text-3);font-size:9px;flex-shrink:0;"></i></div>
      </div>
      <div class="resource-grid" id="mwp-grid"></div>
    </div>

    <!-- ══════════════════════════════════════
         SCREEN: MEMBER — CASE STUDIES
    ══════════════════════════════════════ -->
    <div class="screen" id="screen-member-casestudies">
      <div class="page-hdr"><div class="page-hdr-left"><h2>Case Studies</h2><p>Verified savings and implementation outcomes</p></div></div>
      <div class="filter-bar" style="margin-bottom:16px;border-radius:9px;overflow:hidden;">
        <div class="filter-item"><i class="fa-solid fa-magnifying-glass"></i><input type="search" id="casestudies-search" placeholder="Search…" oninput="filterCards('casestudies')" ></div>
        <div class="filter-item" style="min-width:130px;"><i class="fa-solid fa-building"></i><select id="casestudies-ind" onchange="filterCards('casestudies')"><option value="">All Industries</option><option>Hospitality</option><option>Office</option><option>Manufacturing</option><option>Retail</option></select><i class="fa-solid fa-chevron-down" style="color:var(--text-3);font-size:9px;flex-shrink:0;"></i></div>
      </div>
      <div class="resource-grid" id="mcs-grid"></div>
    </div>

    <!-- ══════════════════════════════════════
         SCREEN: MEMBER — WEBINARS
    ══════════════════════════════════════ -->
    <div class="screen" id="screen-member-webinars">
      <div class="page-hdr"><div class="page-hdr-left"><h2>Webinars On Demand</h2><p>Recorded sessions available any time</p></div></div>
      <div class="filter-bar" style="margin-bottom:16px;border-radius:9px;overflow:hidden;">
        <div class="filter-item"><i class="fa-solid fa-magnifying-glass"></i><input type="search" id="webinars-search" placeholder="Search…" oninput="filterCards('webinars')" ></div>
      </div>
      <div class="resource-grid" id="mweb-grid"></div>
    </div>

    <!-- ══════════════════════════════════════
         SCREEN: MEMBER — TOOLS
    ══════════════════════════════════════ -->
    <div class="screen" id="screen-member-tools">
      <div class="page-hdr"><div class="page-hdr-left"><h2>Water Target Tools</h2><p>Interactive calculators for portfolio analysis</p></div></div>
      <div class="filter-bar" style="margin-bottom:16px;border-radius:9px;overflow:hidden;">
        <div class="filter-item"><i class="fa-solid fa-magnifying-glass"></i><input type="search" id="tools-search" placeholder="Search…" oninput="filterCards('tools')" ></div>
        <div class="filter-item" style="min-width:130px;"><i class="fa-solid fa-layer-group"></i><select id="tools-cat" onchange="filterCards('tools')"><option value="">All Types</option><option>Calculator</option><option>Dashboard</option></select><i class="fa-solid fa-chevron-down" style="color:var(--text-3);font-size:9px;flex-shrink:0;"></i></div>
      </div>
      <div class="resource-grid" id="mt-grid"></div>
    </div>

    <!-- ══════════════════════════════════════
         SCREEN: COST REDUCTION ESTIMATORS
    ══════════════════════════════════════ -->
    <div class="screen" id="screen-estimators">
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
          <div class="result-panel">
            <div>
              <div style="font-size:9px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:rgba(0,201,167,.5);margin-bottom:6px;">Projected Annual Savings</div>
              <div class="result-big" id="est-result">$0</div>
              <div style="font-size:12px;color:rgba(0,201,167,.5);margin-top:4px;" id="est-pct">0% reduction</div>
            </div>
            <div>
              <div class="result-row"><span class="result-k">Properties analysed</span><span class="result-v" id="r-props">10</span></div>
              <div class="result-row"><span class="result-k">Current annual spend</span><span class="result-v" id="r-spend">$2,500,000</span></div>
              <div class="result-row"><span class="result-k">Savings per property</span><span class="result-v" id="r-per">$62,500</span></div>
              <div class="result-row"><span class="result-k">Est. payback period</span><span class="result-v" id="r-payback">11 months</span></div>
              <div class="result-row"><span class="result-k">5-year NOI impact</span><span class="result-v" id="r-noi">$3,125,000</span></div>
            </div>
            <button class="btn btn-primary" style="width:100%;justify-content:center;" onclick="nav('schedule-new',null,'Schedule New Audit','Schedule')">
              <i class="fa-solid fa-calendar-check"></i> Schedule Assessment
            </button>
          </div>
        </div>
      </div>
    </div>


    <!-- ══════════════════════════════════════
         SCREEN: ADMIN — CONSULTATION REQUESTS (Schedule Audit & Advisory)
    ══════════════════════════════════════ -->
    <div class="screen" id="screen-admin-consultation">
      <div class="page-hdr">
        <div class="page-hdr-left">
          <h2>Consultation Requests</h2>
          <p>Review and update status of inbound audit &amp; advisory requests</p>
        </div>
        <div class="page-hdr-right">
          <button class="btn btn-primary" onclick="showToast('Opening new consultation form…','fa-plus')">
            <i class="fa-solid fa-plus"></i> New Request
          </button>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="filter-bar" style="margin-bottom:18px;">
            <div class="filter-item">
              <i class="fa-solid fa-magnifying-glass"></i>
              <input type="search" id="consult-search" placeholder="Search by name or company…" oninput="filterConsultations()">
            </div>
            <div class="filter-item" style="flex:0;min-width:160px;">
              <i class="fa-solid fa-filter"></i>
              <select id="consult-status-filter" onchange="filterConsultations()">
                <option value="">All Statuses</option>
                <option value="approved">Approved</option>
                <option value="pending">Pending</option>
                <option value="review">Under Review</option>
              </select>
              <i class="fa-solid fa-chevron-down" style="color:var(--text-3);font-size:9px;flex-shrink:0;"></i>
            </div>
          </div>
          <div class="table-scroll">
            <table class="wst-table">
              <thead>
                <tr>
                  <th>Client Info</th>
                  <th>Interest</th>
                  <th>Timeline</th>
                  <th>Status</th>
                  <th>Meeting Link</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody id="consult-tbody"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- ══════════════════════════════════════
         SCREEN: SCHEDULE — UPCOMING
    ══════════════════════════════════════ -->
    <div class="screen" id="screen-schedule-upcoming">
      <div class="page-hdr">
        <div class="page-hdr-left"><h2>Upcoming Audits &amp; Advisory Calls</h2><p>Scheduled sessions with WST advisors</p></div>
        <div class="page-hdr-right"><button class="btn btn-primary" onclick="nav('schedule-new',null,'Schedule New Audit','Schedule')"><i class="fa-solid fa-plus"></i> Schedule New</button></div>
      </div>
      <div class="schedule-grid" id="schedule-grid"></div>
    </div>

    <!-- ══════════════════════════════════════
         SCREEN: SCHEDULE — NEW
    ══════════════════════════════════════ -->
    <div class="screen" id="screen-schedule-new">
      <div class="page-hdr"><div class="page-hdr-left"><h2>Schedule Audit &amp; Advisory Call</h2><p>Book a session with a WST water performance advisor</p></div></div>
      <div style="display:grid;grid-template-columns:1fr 360px;gap:20px;">
        <div class="card">
          <div class="card-hdr"><div class="card-title"><i class="fa-solid fa-calendar-plus" style="color:var(--accent);font-size:11px;"></i>Session Details</div></div>
          <div class="card-body">
            <div class="form-grid-2">
              <div class="form-group"><label class="form-label">First Name</label><input type="text" class="form-input" placeholder="James"></div>
              <div class="form-group"><label class="form-label">Last Name</label><input type="text" class="form-input" placeholder="Whitmore"></div>
            </div>
            <div class="form-grid-2">
              <div class="form-group"><label class="form-label">Work Email</label><input type="email" class="form-input" placeholder="you@company.com"></div>
              <div class="form-group"><label class="form-label">Company</label><input type="text" class="form-input" placeholder="DiamondRock Hospitality"></div>
            </div>
            <div class="form-grid-2">
              <div class="form-group">
                <label class="form-label">Session Type</label>
                <select class="form-select">
                  <option>Portfolio Water Audit</option>
                  <option>ESG Reporting Advisory</option>
                  <option>GRESB WT1 Compliance Review</option>
                  <option>Smart Monitoring Consultation</option>
                  <option>Cost Reduction Assessment</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Portfolio Size</label>
                <input type="number" class="form-input" placeholder="e.g. 12 properties">
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Preferred Date &amp; Time</label>
              <input type="datetime-local" class="form-input">
            </div>
            <div class="form-group">
              <label class="form-label">Specific Challenges or Goals</label>
              <textarea class="form-textarea" placeholder="Tell us about your current water spend, ESG targets, or specific assets you'd like reviewed…"></textarea>
            </div>
            <button class="btn btn-primary" style="width:100%;justify-content:center;padding:12px;" onclick="showToast('Session request submitted — WST will confirm within 24 hours','fa-calendar-check')">
              <i class="fa-solid fa-paper-plane"></i> Submit Request
            </button>
          </div>
        </div>
        <div style="display:flex;flex-direction:column;gap:14px;">
          <div class="card">
            <div class="card-hdr"><div class="card-title"><i class="fa-solid fa-circle-info" style="color:var(--blue);font-size:11px;"></i>What to Expect</div></div>
            <div class="card-body">
              <div style="display:flex;flex-direction:column;gap:14px;">
                <div style="display:flex;gap:12px;"><div style="width:28px;height:28px;border-radius:50%;background:var(--accent-dim);border:1px solid rgba(0,201,167,.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:11px;font-weight:700;color:var(--accent);">1</div><div><div style="font-size:12px;font-weight:600;color:var(--text-1);margin-bottom:3px;">Portfolio Review</div><div style="font-size:11px;color:var(--text-3);">We analyse your current water spend, billing history, and asset profile.</div></div></div>
                <div style="display:flex;gap:12px;"><div style="width:28px;height:28px;border-radius:50%;background:var(--accent-dim);border:1px solid rgba(0,201,167,.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:11px;font-weight:700;color:var(--accent);">2</div><div><div style="font-size:12px;font-weight:600;color:var(--text-1);margin-bottom:3px;">Savings Identification</div><div style="font-size:11px;color:var(--text-3);">We identify billing errors, ESG gaps, and efficiency opportunities.</div></div></div>
                <div style="display:flex;gap:12px;"><div style="width:28px;height:28px;border-radius:50%;background:var(--accent-dim);border:1px solid rgba(0,201,167,.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:11px;font-weight:700;color:var(--accent);">3</div><div><div style="font-size:12px;font-weight:600;color:var(--text-1);margin-bottom:3px;">Action Plan Delivered</div><div style="font-size:11px;color:var(--text-3);">You receive a documented plan with verified financial projections.</div></div></div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body" style="text-align:center;padding:20px;">
              <div style="font-family:var(--font-display);font-size:36px;font-weight:300;color:var(--accent);line-height:1;">90 min</div>
              <div style="font-size:11px;color:var(--text-3);margin-top:6px;">No obligation — every session reviewed personally by a WST advisor</div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>
</div>
</div>

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
</body>
</html>