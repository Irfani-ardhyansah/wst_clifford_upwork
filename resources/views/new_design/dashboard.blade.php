@extends('admin.portal')

@section('title', 'Dashboard')
@section('header_title', 'Admin Dashboard')
@section('header_section', 'Admin')

@push('styles')
<style>
    /* ── Dashboard-specific layout ── */
    .page-hdr-wrap    { margin-bottom:22px; }
    .page-hdr-wrap h2 { font-family:var(--font-display); font-size:30px; font-weight:300; color:var(--text-1); letter-spacing:-.3px; line-height:1; }
    .page-hdr-wrap p  { font-size:12px; color:var(--text-3); margin-top:6px; font-family:var(--font-mono); }

    /* ── Stats strip ── */
    .stats-strip { display:grid; grid-template-columns:repeat(4,1fr) 1.4fr; gap:0; background:var(--surface); border:1px solid var(--border); border-radius:var(--radius); overflow:hidden; margin-bottom:18px; }
    @media(max-width:1100px){ .stats-strip { grid-template-columns:repeat(2,1fr) !important; } .stat-cell { border-bottom:1px solid var(--border); } }
    @media(max-width:540px)  { .stats-strip { grid-template-columns:1fr !important; } }

    /* ── Chart area ── */
    .mid-grid { display:grid; grid-template-columns:1fr 360px; gap:16px; margin-bottom:18px; }
    @media(max-width:1100px){ .mid-grid { grid-template-columns:1fr; } }

    /* ── Performer bar animation ── */
    .p-bar { transition: width .8s var(--ease, cubic-bezier(0.16,1,0.3,1)); }

    /* ── Asset filter bar ── */
    .asset-filter-bar { display:flex; align-items:stretch; background:var(--surface-hi); border:1px solid var(--border); border-radius:9px; overflow:hidden; margin-bottom:16px; }
    .asset-filter-item { display:flex; align-items:center; gap:8px; padding:9px 14px; flex:1; border-right:1px solid var(--border); }
    .asset-filter-item:last-child { border-right:none; }
    .asset-filter-item i { color:var(--text-3); font-size:11px; flex-shrink:0; }
    .asset-filter-item input,
    .asset-filter-item select { border:none; outline:none; background:transparent; font-size:12.5px; color:var(--text-1); width:100%; font-family:var(--font-ui); }
    .asset-filter-item input::placeholder { color:var(--text-3); }
    .asset-filter-item select { cursor:pointer; appearance:none; color:var(--text-2); }
    .asset-filter-item select option { background:var(--surface); color:var(--text-1); }
    @media(max-width:640px){ .asset-filter-bar { flex-direction:column; } .asset-filter-item { border-right:none; border-bottom:1px solid var(--border); } .asset-filter-item:last-child { border-bottom:none; } }

    /* ── Expandable asset row ── */
    .asset-expand-row     { display:none; background:var(--surface-hi); }
    .asset-expand-row.open{ display:table-row; }
    .expand-inner         { padding:16px 20px 20px; }
    .expand-grid          { display:grid; grid-template-columns:repeat(4,1fr); gap:12px; margin-bottom:14px; }
    @media(max-width:600px){ .expand-grid { grid-template-columns:1fr 1fr; } }
    .eg-k { font-size:9px; font-weight:700; letter-spacing:.12em; text-transform:uppercase; color:var(--text-3); margin-bottom:4px; }
    .eg-v { font-family:var(--font-display); font-size:22px; font-weight:400; color:var(--text-1); }
    .eg-v.accent { color:var(--accent); }

    /* ── Viewer log inside expand ── */
    .mini-log     { width:100%; border-collapse:collapse; font-size:11.5px; }
    .mini-log th  { padding:7px 12px; font-size:9px; font-weight:700; letter-spacing:.10em; text-transform:uppercase; color:var(--text-3); text-align:left; border-bottom:1px solid var(--border); }
    .mini-log td  { padding:8px 12px; color:var(--text-2); border-bottom:1px solid var(--border); }
    .mini-log tr:last-child td { border-bottom:none; }
    .viewer-avatar-sm { width:22px; height:22px; border-radius:50%; flex-shrink:0; background:var(--accent-dim); display:flex; align-items:center; justify-content:center; font-size:9px; font-weight:700; color:var(--accent); text-transform:uppercase; }

    /* ── Dashboard viewer panel ── */
    .viewer-panel       { background:var(--surface-hi); border:1px solid var(--border); border-radius:var(--radius); padding:20px; }
    .viewer-panel-hdr   { display:flex; align-items:center; justify-content:space-between; margin-bottom:14px; flex-wrap:wrap; gap:10px; }
    .viewer-panel-title { font-size:13px; font-weight:700; color:var(--text-1); }
    .viewer-panel-meta  { font-size:11px; color:var(--text-3); }
    .viewer-search      { padding:7px 12px; border-radius:7px; border:1px solid var(--border); background:var(--surface); color:var(--text-1); font-family:var(--font-ui); font-size:12px; outline:none; transition:border-color .2s; min-width:200px; }
    .viewer-search:focus     { border-color:rgba(0,201,167,.4); }
    .viewer-search::placeholder { color:var(--text-3); }
    .viewer-avatar      { width:26px; height:26px; border-radius:50%; flex-shrink:0; background:var(--accent-dim); border:1px solid rgba(0,201,167,.2); display:flex; align-items:center; justify-content:center; font-size:10px; font-weight:700; color:var(--accent); text-transform:uppercase; }
</style>
@endpush

@section('content')

{{-- ═══ PAGE HEADER ═══ --}}
<div class="page-hdr-wrap">
    <h2>Portfolio Intelligence</h2>
    <p>{{ now()->format('l, d F Y') }} &nbsp;·&nbsp; Manage assets and track engagement</p>
</div>

{{-- ═══ STATS STRIP ═══ --}}
<div class="stats-strip" id="stats-strip">
    <div class="stat-cell">
        <div class="stat-label"><i class="fa-solid fa-layer-group" style="color:var(--blue);"></i>Total Assets</div>
        <div class="stat-num">{{ number_format($stats['total_assets'] ?? 0) }}</div>
        <div class="stat-sub">Published resources</div>
    </div>
    <div class="stat-cell">
        <div class="stat-label"><i class="fa-solid fa-eye" style="color:var(--accent);"></i>Total Views</div>
        <div class="stat-num accent">{{ number_format($stats['total_views'] ?? 0) }}</div>
        <div class="stat-sub" style="display:flex;align-items:center;gap:5px;">
            <span style="background:var(--accent-dim);color:var(--accent);padding:1px 5px;border-radius:4px;font-size:9px;font-weight:700;">↑ 18%</span>
            <span>vs last month</span>
        </div>
    </div>
    <div class="stat-cell">
        <div class="stat-label"><i class="fa-solid fa-users" style="color:var(--purple);"></i>Registered Leads</div>
        <div class="stat-num">{{ number_format($stats['registered_users'] ?? 0) }}</div>
        <div class="stat-sub">Verified accounts</div>
    </div>
    <div class="stat-cell">
        <div class="stat-label"><i class="fa-solid fa-bell" style="color:var(--amber);"></i>Subscribers</div>
        <div class="stat-num">{{ number_format($stats['total_subscribers'] ?? 0) }}</div>
        <div class="stat-sub">Newsletter list</div>
    </div>
    <div class="stat-cell">
        <div class="stat-label"><i class="fa-solid fa-trophy" style="color:var(--amber);"></i>Top Asset</div>
        <div class="stat-num" style="font-size:13px;font-weight:600;font-family:var(--font-ui);line-height:1.4;">
            {{ $stats['top_asset_title'] ?? '—' }}
        </div>
        <div class="stat-sub">{{ number_format($stats['top_asset_views'] ?? 0) }} views</div>
    </div>
</div>

{{-- ═══ CHART + TOP PERFORMERS ═══ --}}
<div class="mid-grid">

    {{-- Chart --}}
    <div class="card">
        <div class="card-hdr">
            <div class="card-title">
                <i class="fa-solid fa-wave-square" style="color:var(--accent);font-size:11px;"></i>
                Engagement Trend
            </div>
            <div class="chart-tabs">
                <button class="tab-btn active" onclick="switchChart(this,'views')">Views</button>
                <button class="tab-btn" onclick="switchChart(this,'leads')">Leads</button>
                <button class="tab-btn" onclick="switchChart(this,'subs')">Subscribers</button>
            </div>
        </div>
        <div class="card-body">
            <div class="chart-wrap" style="position:relative;height:200px;width:100%;">
                <canvas id="mainChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Top Performing --}}
    <div class="card">
        <div class="card-hdr">
            <div class="card-title">
                <i class="fa-solid fa-ranking-star" style="color:var(--amber);font-size:11px;"></i>
                Top Performing
            </div>
            <span class="card-meta">click to view log</span>
        </div>
        <div class="card-body" style="padding:10px 12px;">
            <div class="performer-list">
                @foreach($topAssets ?? [] as $index => $asset)
                <button type="button"
                    class="performer-item"
                    data-asset-id="{{ $asset->id }}"
                    data-asset-title="{{ $asset->title }}"
                    data-asset-views="{{ $asset->views_count }}"
                    data-asset-url="{{ route('admin.asset.details', $asset->id) }}">
                    <span class="p-rank">{{ $index + 1 }}</span>
                    <span class="p-title">{{ $asset->title }}</span>
                    <div class="p-bar-wrap">
                        <div class="p-bar" style="width:{{ $loop->first ? 100 : round($asset->views_count / ($topAssets->first()->views_count ?? 1) * 100) }}%"></div>
                    </div>
                    <span class="p-views">
                        {{ number_format($asset->views_count / 1000, 1) }}k
                    </span>
                </button>
                @endforeach
            </div>
        </div>
    </div>

</div>

{{-- ═══ VIEWER LOG PANEL (appears on performer click) ═══ --}}
<div id="viewer-log-panel" class="viewer-panel" style="display:none;margin-bottom:18px;">
    <div class="viewer-panel-hdr">
        <div>
            <div class="viewer-panel-title" id="viewer-asset-title">—</div>
            <div class="viewer-panel-meta" id="viewer-asset-meta">Asset ID &mdash; Total Views &mdash;</div>
        </div>
        <div style="display:flex;align-items:center;gap:10px;">
            <input type="search" class="viewer-search" id="viewer-search"
                placeholder="Search user or date…"
                oninput="filterViewerLog()">
            <button class="btn btn-ghost" onclick="closeViewerLog()" style="padding:6px 10px;">
                <i class="fa-solid fa-xmark" style="font-size:11px;"></i>
            </button>
        </div>
    </div>
    <div class="table-scroll">
        <table class="wst-table">
            <thead>
                <tr><th>Viewer</th><th>Date</th><th class="r">Time</th></tr>
            </thead>
            <tbody id="viewer-log-tbody">
                <tr><td colspan="3" style="text-align:center;color:var(--text-3);padding:20px;">
                    <i class="fa-solid fa-circle-notch fa-spin" style="margin-right:6px;"></i>Loading…
                </td></tr>
            </tbody>
        </table>
    </div>
</div>

{{-- ═══ ASSET LIBRARY ═══ --}}
<div class="card" style="margin-bottom:18px;">
    <div class="card-hdr">
        <div class="card-title">
            <i class="fa-solid fa-database" style="color:var(--blue);font-size:11px;"></i>
            Asset Library
        </div>
        <span class="card-meta" id="asset-count-lbl">{{ count($assets ?? []) }} assets</span>
    </div>
    <div class="card-body">
        {{-- Filters --}}
        <div class="asset-filter-bar">
            <div class="asset-filter-item">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" id="asset-search"
                    value="{{ request('search') }}"
                    placeholder="Search asset title…"
                    autocomplete="off" aria-label="Search assets">
            </div>
            <div class="asset-filter-item">
                <i class="fa-solid fa-layer-group"></i>
                <select id="asset-category" aria-label="Filter by category">
                    <option value="">All Categories</option>
                    @foreach($categories ?? [] as $cat)
                    <option value="{{ $cat['value'] }}"
                        {{ request('category') == $cat['value'] ? 'selected' : '' }}>
                        {{ $cat['text'] }}
                    </option>
                    @endforeach
                </select>
                <i class="fa-solid fa-chevron-down" style="color:var(--text-3);font-size:9px;flex-shrink:0;"></i>
            </div>
            <div class="asset-filter-item">
                <i class="fa-solid fa-building"></i>
                <select id="asset-industry" aria-label="Filter by industry">
                    <option value="">All Industries</option>
                    @foreach($industries ?? [] as $industry)
                    <option value="{{ $industry->id }}"
                        {{ request('industry_id') == $industry->id ? 'selected' : '' }}>
                        {{ $industry->title }}
                    </option>
                    @endforeach
                </select>
                <i class="fa-solid fa-chevron-down" style="color:var(--text-3);font-size:9px;flex-shrink:0;"></i>
            </div>
        </div>

        {{-- Asset results (loaded via AJAX) --}}
        <div id="assets-results" aria-live="polite">
            {{-- Populated by loadAssets() JS below --}}
        </div>
    </div>
</div>

{{-- Asset detail panel (AJAX) --}}
<div id="detail-loader" style="display:none;padding:40px;text-align:center;">
    <i class="fa-solid fa-circle-notch fa-spin" style="font-size:28px;color:var(--accent);"></i>
    <p style="margin-top:10px;color:var(--text-3);font-size:13px;">Loading asset details…</p>
</div>
<div id="asset-detail-container" style="display:none;margin-bottom:18px;"></div>

{{-- ═══ REGISTERED LEADS ═══ --}}
<div class="card" style="margin-bottom:18px;">
    <div class="card-hdr">
        <div class="card-title">
            <i class="fa-solid fa-user-tie" style="color:var(--purple);font-size:11px;"></i>
            Registered Leads
        </div>
        <button class="btn btn-ghost" onclick="exportLeads()" style="font-size:11px;">
            <i class="fa-solid fa-download" style="font-size:10px;"></i> Export CSV
        </button>
    </div>
    <div class="card-body" style="padding:0;">
        <div class="table-scroll">
            <table id="leadsTable" class="wst-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th class="r">Registered</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registeredUsers ?? [] as $user)
                    <tr>
                        <td class="primary">{{ $user->name }}</td>
                        <td>{{ $user->company ?? '—' }}</td>
                        <td>
                            <a href="mailto:{{ $user->email }}"
                               style="color:var(--accent);font-family:var(--font-mono);font-size:11px;">
                                {{ $user->email }}
                            </a>
                        </td>
                        <td class="r" style="font-family:var(--font-mono);font-size:11px;color:var(--text-3);">
                            {{ $user->created_at->format('d M Y, H:i') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- ═══ NEWSLETTER SUBSCRIBERS ═══ --}}
<div class="card">
    <div class="card-hdr">
        <div class="card-title">
            <i class="fa-solid fa-bell" style="color:var(--amber);font-size:11px;"></i>
            Newsletter Subscribers
        </div>
        <span class="pill pill-dim">{{ count($subscribers ?? []) }} total</span>
    </div>
    <div class="card-body" style="padding:0;">
        <div class="table-scroll">
            <table id="subscribersTable" class="wst-table">
                <thead>
                    <tr>
                        <th style="width:36px;">#</th>
                        <th>Email Address</th>
                        <th class="r">Subscribed</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscribers ?? [] as $index => $sub)
                    <tr>
                        <td style="font-family:var(--font-mono);font-size:10px;color:var(--text-3);">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </td>
                        <td>
                            <div style="display:flex;align-items:center;gap:8px;">
                                <i class="fa-regular fa-envelope" style="font-size:10px;color:var(--text-3);flex-shrink:0;"></i>
                                <a href="mailto:{{ $sub->email }}"
                                   style="color:var(--text-1);font-weight:500;font-size:12px;">
                                    {{ $sub->email }}
                                </a>
                            </div>
                        </td>
                        <td class="r" style="font-family:var(--font-mono);font-size:11px;color:var(--text-3);">
                            {{ $sub->created_at->format('d M Y') }}
                            <span style="color:var(--text-3);margin:0 4px;">·</span>
                            {{ $sub->created_at->format('H:i') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
/* ════ CHART ════ */
let chartInst = null;
let currentChartKey = 'views';

const CHART_DATA = {
    views: { labels: @json($chartLabels ?? []), data: @json($chartValues ?? []) },
    leads: { labels: @json($chartLabels ?? []), data: @json($leadsChartValues ?? []) },
    subs:  { labels: @json($chartLabels ?? []), data: @json($subsChartValues ?? []) },
};

function buildChart(key) {
    currentChartKey = key;
    const d   = CHART_DATA[key];
    const ctx = document.getElementById('mainChart');
    if (!ctx) return;
    if (chartInst) chartInst.destroy();

    const isDark   = document.body.getAttribute('data-theme') === 'dark';
    const gridClr  = isDark ? 'rgba(255,255,255,0.04)' : 'rgba(0,0,0,0.05)';
    const tickClr  = isDark ? '#8a8a8a' : '#6b7280';
    const accentHx = isDark ? '#00c9a7' : '#007a64';

    const grad = ctx.getContext('2d').createLinearGradient(0, 0, 0, 200);
    grad.addColorStop(0, isDark ? 'rgba(0,201,167,0.22)' : 'rgba(0,122,100,0.15)');
    grad.addColorStop(1, 'rgba(0,201,167,0)');

    chartInst = new Chart(ctx, {
        type: 'line',
        data: {
            labels: d.labels,
            datasets: [{
                data: d.data,
                borderColor: accentHx,
                borderWidth: 2,
                backgroundColor: grad,
                fill: true,
                tension: .4,
                pointRadius: 0,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: accentHx,
                pointHoverBorderColor: isDark ? '#1a1a1c' : '#fff',
                pointHoverBorderWidth: 2,
            }]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: isDark ? '#2d2d2d' : '#fff',
                    borderColor: isDark ? 'rgba(255,255,255,0.08)' : 'rgba(0,0,0,0.10)',
                    borderWidth: 1, titleColor: isDark ? '#f2f2f2' : '#0d0f1a',
                    bodyColor: isDark ? '#8a8a8a' : '#5a6278',
                    padding: 12, cornerRadius: 8,
                    callbacks: { label: c => ` ${c.parsed.y.toLocaleString()}` }
                }
            },
            scales: {
                y: {
                    grid: { color: gridClr, drawBorder: false },
                    ticks: { color: tickClr, font: { family: 'JetBrains Mono', size: 10 }, callback: v => v >= 1000 ? (v/1000).toFixed(0)+'k' : v },
                    border: { display: false }
                },
                x: {
                    grid: { display: false },
                    ticks: { color: tickClr, font: { family: 'JetBrains Mono', size: 10 } },
                    border: { display: false }
                }
            }
        }
    });
}

function switchChart(btn, key) {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    buildChart(key);
}

// Boot chart
buildChart('views');

// Animate stat cells
setTimeout(() => {
    document.querySelectorAll('.stat-cell').forEach((el, i) => {
        setTimeout(() => el.classList.add('loaded'), i * 100);
    });
}, 400);

/* ════ PERFORMER CLICK → VIEWER LOG ════ */
document.querySelectorAll('.performer-item').forEach(btn => {
    btn.addEventListener('click', function() {
        const url     = this.dataset.assetUrl;
        const title   = this.dataset.assetTitle;
        const views   = this.dataset.assetViews;
        const assetId = this.dataset.assetId;

        document.querySelectorAll('.performer-item').forEach(b => b.classList.remove('selected'));
        this.classList.add('selected');

        document.getElementById('viewer-asset-title').textContent = title;
        document.getElementById('viewer-asset-meta').textContent  = `Asset ID: #${assetId}  ·  Total Views: ${Number(views).toLocaleString()}`;
        document.getElementById('viewer-search').value = '';

        const panel = document.getElementById('viewer-log-panel');
        panel.style.display = 'block';

        // Load via AJAX
        fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(r => r.text())
            .then(html => {
                // Extract rows from returned HTML and render in our table
                const tbody = document.getElementById('viewer-log-tbody');
                tbody.innerHTML = html; // Expects partial returning <tr> rows
                panel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            })
            .catch(() => {
                document.getElementById('viewer-log-tbody').innerHTML =
                    '<tr><td colspan="3" style="text-align:center;color:var(--red);padding:16px;">Failed to load viewer log.</td></tr>';
            });
    });
});

function filterViewerLog() {
    const q = document.getElementById('viewer-search').value.toLowerCase();
    document.querySelectorAll('#viewer-log-tbody tr').forEach(tr => {
        tr.style.display = !q || tr.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
}

function closeViewerLog() {
    document.getElementById('viewer-log-panel').style.display = 'none';
    document.querySelectorAll('.performer-item').forEach(b => b.classList.remove('selected'));
}

/* ════ ASSET AJAX FILTER ════ */
let searchTimer;
function loadAssets() {
    const params = new URLSearchParams({
        search:      document.getElementById('asset-search').value,
        category:    document.getElementById('asset-category').value,
        industry_id: document.getElementById('asset-industry').value,
    });
    document.getElementById('assets-results').style.opacity = '0.5';
    fetch(`{{ route('admin.dashboard.assets.ajax') }}?${params}`, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(r => r.text())
    .then(html => {
        document.getElementById('assets-results').innerHTML = html;
        document.getElementById('assets-results').style.opacity = '1';
    })
    .catch(() => {
        document.getElementById('assets-results').innerHTML =
            '<p style="color:var(--red);padding:16px;font-size:13px;">Failed to load assets.</p>';
        document.getElementById('assets-results').style.opacity = '1';
    });
}

document.getElementById('asset-search').addEventListener('input', () => {
    clearTimeout(searchTimer);
    searchTimer = setTimeout(loadAssets, 320);
});
document.getElementById('asset-category').addEventListener('change', loadAssets);
document.getElementById('asset-industry').addEventListener('change', loadAssets);
loadAssets();

/* ════ ASSET DETAIL PANEL (existing AJAX pattern kept) ════ */
$(document).on('click', '.asset-trigger', function(e) {
    e.preventDefault();
    const $this = $(this);
    const url   = $this.data('url');
    const $container = $('#asset-detail-container');
    const $loader    = $('#detail-loader');

    if ($this.hasClass('active-asset')) {
        $this.removeClass('active-asset');
        $container.slideUp(250);
        return;
    }
    $('.asset-trigger').removeClass('active-asset');
    $this.addClass('active-asset');

    $container.slideUp(150, function() {
        $loader.show();
        $.ajax({
            url, type: 'GET',
            success: html => {
                $loader.hide();
                $container.html(html).slideDown(280, () => {
                    $('html,body').animate({ scrollTop: $container.offset().top - 120 }, 500);
                });
            },
            error: () => {
                $loader.hide();
                $container.html(
                    '<div class="card" style="padding:16px;"><p style="color:var(--red);font-size:13px;">Failed to load asset details.</p></div>'
                ).slideDown(200);
            }
        });
    });
});

$(document).on('click', '#close-detail-btn', () => {
    $('#asset-detail-container').slideUp(250);
    $('.asset-trigger').removeClass('active-asset');
});

/* ════ DATATABLES ════ */
const dtConfig = {
    responsive: true,
    language: {
        search: '',
        searchPlaceholder: 'Search records…',
        lengthMenu: 'Show _MENU_ entries',
        paginate: {
            previous: '<i class="fa-solid fa-chevron-left" style="font-size:10px;"></i>',
            next:     '<i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>',
        }
    }
};
$('#leadsTable').DataTable({ ...dtConfig, pageLength: 10, order: [[3, 'desc']] });
$('#subscribersTable').DataTable({ ...dtConfig, pageLength: 10, order: [[2, 'desc']] });

/* ════ EXPORT ════ */
function exportLeads() {
    window.location.href = "{{ route('admin.users.export') }}";
}
</script>
@endpush
