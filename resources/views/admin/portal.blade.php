<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal') - WST Member</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
[data-theme="light"] .consult-row:hover td { background:#f0f7f5 !important; }
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
    @stack('styles')
</head>
<body data-theme="dark">

<div id="mob-overlay" onclick="closeMobile()"></div>

<div class="shell">

<!-- ════ SIDEBAR ════ -->
<aside id="sidebar">
  <div class="sb-brand">
    <div class="sb-logo-mark"></div>
    <div class="sb-brand-text">
      <div class="sb-brand-name">Water Solutions<span style="color:var(--accent);">Tech</span></div>
      <div class="sb-brand-sub">Member Portal</div>
    </div>
  </div>

  <nav class="sb-nav">
    <div class="nav-section">Admin</div>
    @if(auth()->user()->role == 'admin')
        <a href="{{ route('admin.dashboard') }}"
        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
          <i class="fa-solid fa-gauge-high"></i><span class="lbl">Dashboard</span>
        </a>
    
        <a href="{{ route('admin.assets.index') }}"
        class="nav-link {{ request()->routeIs('admin.assets*') ? 'active' : '' }}">
          <i class="fa-solid fa-layer-group"></i><span class="lbl">All Resources</span>
        </a>

        <a href="{{ route('admin.articles.index') }}"
        class="nav-link {{ request()->routeIs('admin.articles*') ? 'active' : '' }}">
          <i class="fa-solid fa-newspaper"></i><span class="lbl">Articles</span>
        </a>

        <a href="{{ route('admin.industries.index') }}"
        class="nav-link {{ request()->routeIs('admin.industries*') ? 'active' : '' }}">
          <i class="fa-solid fa-industry"></i><span class="lbl">Industries</span>
        </a>

        <a href="{{route('admin.white-papers.index')}}"
        class="nav-link {{ request()->routeIs('admin.white-papers*') ? 'active' : '' }}">
          <i class="fa-solid fa-file-lines"></i><span class="lbl">White Papers</span>
        </a>

        <a href="{{ route('admin.case-studies.index') }}"
        class="nav-link {{ request()->routeIs('admin.case-studies*') ? 'active' : '' }}">
          <i class="fa-solid fa-briefcase"></i><span class="lbl">Case Studies</span>
        </a>

        <a href="{{ route('admin.webinars.index') }}"
        class="nav-link {{ request()->routeIs('admin.webinars*') ? 'active' : '' }}">
          <i class="fa-solid fa-video"></i><span class="lbl">Webinars</span>
        </a>

        <a href="{{ route('admin.tools.index') }}"
        class="nav-link {{ request()->routeIs('admin.tools*') ? 'active' : '' }}">
          <i class="fa-solid fa-calculator"></i><span class="lbl">Tools &amp; Calculators</span>
        </a>

        <a href="{{ route('admin.gresb-water.index') }}"
            class="nav-link {{ request()->routeIs('admin.gresb-water.index') ? 'active' : '' }}">
          <i class="fa-solid fa-droplet"></i><span class="lbl">Schedule Audit &amp; Water Management Advisory Call</span>
        </a>
    <div class="nav-section">User Output</div>
    @endif 

        <a href="{{ route('member-dashboard.index') }}"
        class="nav-link {{ request()->routeIs('member-dashboard.index') && !request()->has('category') ? 'active' : '' }}">
          <i class="fa-solid fa-layer-group"></i><span class="lbl">All Resources</span>
        </a>

        <a href="{{ route('member-dashboard.articles.index') }}"
            class="nav-link {{ request()->routeIs('member-dashboard.articles*') ? 'active' : '' }}">
          <i class="fa-solid fa-newspaper"></i><span class="lbl">Articles</span>
        </a>

        <a href="{{ route('member-dashboard.index', ['category' => 'white-paper']) }}"
            class="nav-link {{ request('category') == 'white-paper' ? 'active' : '' }}">
                <i class="fa-solid fa-file-lines"></i><span class="lbl">Industry White Papers</span>
            </a>

        <a href="{{ route('member-dashboard.index', ['category' => 'case-study']) }}"
            class="nav-link {{ request('category') == 'case-study' ? 'active' : '' }}">
                <i class="fa-solid fa-briefcase"></i><span class="lbl">Case Studies</span>
        </a>

        <a href="{{ route('member-dashboard.index', ['category' => 'webinar']) }}"
            class="nav-link {{ request('category') == 'webinar' ? 'active' : '' }}">
          <i class="fa-solid fa-video"></i><span class="lbl">Webinars On Demand</span>
        </a>

        <a href="{{ route('member-dashboard.index', ['category' => 'tool']) }}"
            class="nav-link {{ request('category') == 'tool' ? 'active' : '' }}">
          <i class="fa-solid fa-calculator"></i><span class="lbl">Water Target tools</span>
        </a>

        <a href="{{ route('member-dashboard.gresb-water.index') }}"
            class="nav-link {{ request()->routeIs('member-dashboard.gresb-water.index') ? 'active' : '' }}">
          <i class="fa-solid fa-droplet"></i><span class="lbl">Cost Reduction Estimators</span>
        </a>

        @php
            $isGresbActive = request()->routeIs('admin.gresb-water.index') 
                || request()->routeIs('member-dashboard.gresb-water.form');
        @endphp
        <div x-data="{ open: {{ $isGresbActive ? 'true' : 'false' }} }" class="mb-2">

          <!-- Parent -->
          <button 
              @click="open = !open" 
              type="button"
              class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition
              {{ $isGresbActive ? 'active' : 'text-gray-400 hover:text-white hover:bg-white/10' }}
              focus:outline-none">

            <i class="fa-solid fa-calendar-check w-5"></i>
            <span>Schedule Audit & Water Management Advisory Call</span>

            <svg :class="{'rotate-180': open}" 
                class="ml-auto h-4 w-4 transition-transform" 
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <!-- Children -->
          <div x-show="open" x-cloak class="pl-8 mt-1 space-y-1">

            <a href="{{ route('admin.gresb-water.index') }}"
            class="flex items-center gap-3 px-4 py-2 rounded-lg transition
            {{ request()->routeIs('admin.gresb-water.index') 
                    ? 'text-teal-400 font-semibold bg-white/10' 
                    : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                <i class="fa-solid fa-clock w-4"></i> Upcoming
            </a>

            <a href="{{ route('member-dashboard.gresb-water.form') }}"
            class="flex items-center gap-3 px-4 py-2 rounded-lg transition
            {{ request()->routeIs('member-dashboard.gresb-water.form') 
                    ? 'text-teal-400 font-semibold bg-white/10' 
                    : 'text-gray-400 hover:text-white hover:bg-white/10' }}">
                <i class="fa-solid fa-plus w-4"></i> Scheduled New
            </a>

          </div>
        </div>

        <div class="nav-section">Quick Links</div>

        <a href="{{route('index')}}" target="_blank" class="nav-link">
          <i class="fa-solid fa-arrow-up-right-from-square"></i><span class="lbl">Main Website</span>
        </a>

        <a href="mailto:{{ config('mail.support_address') }}" class="nav-link">
          <i class="fa-solid fa-envelope"></i><span class="lbl">Contact Support</span>
        </a>
  </nav>

  <div class="sb-footer">
    <div class="sb-user">
      <div class="sb-avatar">{{ substr(auth()->user()->name ?? 'U', 0, 1) }}</div>
      <div class="sb-user-info">
        <div class="sb-uname">{{ auth()->user()->name ?? 'User' }}</div>
        <div class="sb-urole">{{ ucfirst(auth()->user()->role ?? 'member') }}</div>
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
      <div class="hdr-title">@yield('header_title', 'Dashboard')</div>
      <div class="hdr-breadcrumb">
        <span>WST Portal</span>
        <i class="fa-solid fa-chevron-right" style="font-size:8px;opacity:.4;"></i>
        <span style="color:var(--text-2);" id="hdr-section">@yield('section', 'Admin')</span>
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
      <div class="sb-avatar" style="width:28px;height:28px;font-size:11px;">{{ substr(auth()->user()->name ?? 'U', 0, 1) }}</div>
      <span class="hide-sm" style="font-size:12px;font-weight:500;color:var(--text-2);">{{ auth()->user()->name ?? 'User' }}</span>
    </div>
  </header>

  <main class="content">
    @yield('content')
  </main>
</div>
</div>

    <script>
        function toggleTheme(){const body=document.body;const isDark=body.getAttribute('data-theme')==='dark';body.setAttribute('data-theme',isDark?'light':'dark');const icon=document.getElementById('theme-icon');if(icon)icon.className=isDark?'fa-solid fa-moon':'fa-solid fa-circle-half-stroke';}
        function toggleSidebar(){document.getElementById('sidebar').classList.toggle('collapsed');}
        function openMobile(){document.getElementById('sidebar').classList.add('mob-open');const ov=document.getElementById('mob-overlay');ov.style.opacity='1';ov.style.pointerEvents='auto';document.body.style.overflow='hidden';}
        function closeMobile(){document.getElementById('sidebar').classList.remove('mob-open');const ov=document.getElementById('mob-overlay');ov.style.opacity='0';ov.style.pointerEvents='none';document.body.style.overflow='';}
        function startClock(){function tick(){document.getElementById('hdr-clock').textContent=new Date().toLocaleTimeString('en-US',{hour:'2-digit',minute:'2-digit',second:'2-digit',hour12:true});}tick();setInterval(tick,1000);}
        document.addEventListener('DOMContentLoaded',()=>{startClock();});
        document.addEventListener('keydown',e=>{if(e.key==='Escape')closeMobile();});
    </script>
    @stack('scripts')
</body>
</html>