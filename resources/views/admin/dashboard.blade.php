@extends('admin.portal')

@section('title', 'Dashboard')
@section('header_title', 'Admin Dashboard')

@section('content')

    <div class="page-hdr">
        <div class="page-hdr-left">
            <h2>Portfolio Intelligence</h2>
            <p id="date-label">Loading…</p>
        </div>
    </div>

    <div class="stats-strip" id="stats-strip" style="grid-template-columns:repeat(5,1fr);">
        <div class="stat-cell">
            <div class="stat-label">
                <i class="fa-solid fa-layer-group" style="color:var(--blue);"></i>Total Assets
            </div>
            <div class="stat-num" id="cnt-assets">{{ $stats['total_assets'] ?? 0 }}</div>
            <div class="stat-sub">Published resources</div>
        </div>
        <div class="stat-cell">
            <div class="stat-label">
                <i class="fa-solid fa-eye" style="color:var(--accent);"></i>Total Views
            </div>
            <div class="stat-num accent" id="cnt-views">{{ $stats['total_views'] ?? 0 }}</div>
            <div class="stat-sub">Users</div>
        </div>
        <div class="stat-cell">
            <div class="stat-label">
                <i class="fa-solid fa-users" style="color:var(--purple);"></i>Registered Users
            </div>
            <div class="stat-num" id="cnt-leads">{{ $stats['registered_users'] ?? 0 }}</div>
            <div class="stat-sub">Verified accounts</div>
        </div>
        <div class="stat-cell">
            <div class="stat-label">
                <i class="fa-solid fa-bell" style="color:var(--amber);"></i>Subscribers
            </div>
            <div class="stat-num" id="cnt-subs">{{ $stats['total_subscribers'] ?? 0 }}</div>
            <div class="stat-sub">Newsletter</div>
        </div>
        <div class="stat-cell">
            <div class="stat-label">
                <i class="fa-solid fa-trophy" style="color:var(--amber);"></i>Top Asset
            </div>
            <div class="stat-num" style="font-size:13px;font-weight:600;font-family:var(--font-ui);" id="top-asset">{{ $stats['top_asset_title'] ?? '-' }}</div>
            <div class="stat-sub" id="top-views">{{ $stats['top_asset_views'] ?? '-' }} views</div>
        </div>
    </div>

    <div class="mid-grid">
        <div class="card">
            <div class="card-hdr">
                <div class="card-title"><i class="fa-solid fa-wave-square" style="color:var(--accent);font-size:11px;"></i>Asset Engagement</div>
                <div class="chart-tabs">
                    <button class="tab-btn active" onclick="switchChart(this,'views')">Views</button>
                    <button class="tab-btn" onclick="switchChart(this,'leads')">Leads</button>
                    <button class="tab-btn" onclick="switchChart(this,'subs')">Subscribers</button>
                </div>
            </div>
            <div class="card-body"><div class="chart-wrap"><canvas id="assetChart"></canvas></div></div>
        </div>
        <div class="card">
            <div class="card-hdr">
                <div class="card-title">
                    <i class="fa-solid fa-ranking-star" style="color:var(--amber);font-size:11px;"></i>Top Performing
                </div>
                <span class="card-meta">by views</span>
            </div>
            <div class="card-body" style="padding:10px 12px;">
                <div class="performer-list" id="top-performers">
                    @forelse($topAssets ?? [] as $index => $asset)
                        <button 
                            data-url="{{ route('admin.asset.details', $asset->id) }}"
                            class="performer-item asset-trigger" onclick="openViewerLog({{ $asset->id }},this)">
                            <span class="p-rank">{{ $index + 1 }}</span>
                            <span class="p-title">{{ $asset->title }}</span>
                            <!-- <div class="p-bar-wrap"><div class="p-bar" style="width:{{ $asset->views->count() > 0 ? min(100, ($asset->views->count() / ($topAssets->first()->views->count() ?? 1)) * 100) : 0 }}%"></div></div> -->
                            <span class="p-views">{{ $asset->views_count }}</span>
                        </button>
                    @empty
                        <div class="text-sm text-gray-400">No performance data available</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div id="detail-loader" class="hidden mt-8 text-center">
        <i class="fa-solid fa-circle-notch fa-spin text-3xl text-teal-500 mb-3"></i>
        <p class="text-gray-400 animate-pulse">Loading logs data...</p>
    </div>
    <div id="asset-detail-container" class="viewer-panel" style="display:none;margin-bottom:18px;"></div>

    <div class="card mt-8 text-center" id="list-assets-card">
        <div class="card-hdr">
            <div class="card-title"><i class="fa-solid fa-list" style="color:var(--accent);font-size:11px;"></i>List Of Assets</div>
        </div>
        <div class="card-body">
            <div class="flex flex-col md:flex-row md:items-center w-full gap-2">

                <!-- SEARCH -->
                <div class="relative flex-1 group w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fa-solid fa-magnifying-glass text-[var(--text-3)] text-xs"></i>
                    </div>
                    <input type="text" 
                        id="search"
                        value="{{ request('search') }}"
                        placeholder="Search asset title..." 
                        class="block w-full pl-10 pr-3 py-2 text-sm rounded-lg transition
                            border border-[var(--border)]
                            bg-[var(--surface)] text-[var(--text-1)] placeholder-[var(--text-3)]
                            focus:ring-0 focus:outline-none"
                    >
                </div>

                <div class="hidden md:block w-px h-6 mx-1 bg-[var(--border)]"></div>

                <div class="flex flex-col sm:flex-row gap-2 w-full md:w-auto">
                    
                    <!-- CATEGORY -->
                    <div class="relative min-w-[160px] group rounded-lg border border-[var(--border)] bg-[var(--surface)]">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa-solid fa-layer-group text-[var(--text-3)] text-xs"></i>
                        </div>
                        <select id="category" 
                                onchange="this.form.submit()" 
                                class="w-full pl-8 pr-8 py-2 text-sm font-medium rounded-lg appearance-none
                                    bg-transparent text-[var(--text-1)]
                                    focus:ring-0 focus:outline-none cursor-pointer">
                            <option value="">All Categories</option>
                            @foreach($categories as $row)
                                <option value="{{ $row['value'] }}" {{ request('category') == $row['value'] ? 'selected' : '' }}>
                                    {{ $row['text'] }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none text-[var(--text-3)]">
                            <i class="fa-solid fa-chevron-down text-[10px]"></i>
                        </div>
                    </div>

                    <div class="hidden sm:block w-px h-6 my-auto bg-[var(--border)]"></div>

                    <!-- INDUSTRY -->
                    <div class="relative min-w-[160px] group rounded-lg border border-[var(--border)] bg-[var(--surface)]">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa-solid fa-building text-[var(--text-3)] text-xs"></i>
                        </div>
                        <select id="industry_id" 
                                onchange="this.form.submit()" 
                                class="w-full pl-8 pr-8 py-2 text-sm font-medium rounded-lg appearance-none
                                    bg-transparent text-[var(--text-1)]
                                    focus:ring-0 focus:outline-none cursor-pointer">
                            <option value="">All Industries</option>
                            @foreach($industries as $industry)
                                <option value="{{ $industry->id }}" {{ request('industry_id') == $industry->id ? 'selected' : '' }}>
                                    {{ $industry->title }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none text-[var(--text-3)]">
                            <i class="fa-solid fa-chevron-down text-[10px]"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div id="assets-results">
                <!-- Assets will be loaded here -->
            </div>
        </div>
    </div>

    <div class="card mt-8 text-center">
        <div class="card-hdr">
            <div class="card-title">
                <i class="fa-solid fa-user-tie" style="color:var(--purple);font-size:11px;"></i>Recent Leads
            </div>
            <button class="btn btn-ghost" style="font-size:11px;" onclick="location.href='{{ route('admin.assets.index') }}'">
                <i class="fa-solid fa-arrow-right" style="font-size:10px;"></i> View All
            </button>
        </div>
        <div class="card-body np"><div class="table-scroll"><table class="wst-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th class="r">Registered</th>
                </tr>
            </thead>
            <tbody id="dash-leads">
            @foreach($registeredUsers as $user)
                <tr>
                    <td class="primary">{{ $user->name }}</td>
                    <td>{{ $user->company ?? '-' }}</td>
                    <td><a href="mailto:{{ $user->email }}" style="color:var(--accent);font-family:var(--font-mono);font-size:11px;">{{ $user->email }}</a></td>
                    <td class="r" style="font-family:var(--font-mono);font-size:11px;color:var(--text-3);">{{ $user->created_at->format('d M Y, H:i') }}</td>
                </tr>
            @endforeach
        </tbody></table></div></div>
    </div>

    <div class="card mt-8 text-center">
        <div class="card-hdr">
            <div class="card-title">
                <i class="fa-solid fa-bell" style="color:var(--amber);font-size:11px;"></i>Recent Subscribers
            </div>
            <span class="pill pill-dim" id="sub-count">{{ count($subscribers) }} total</span>
        </div>
        <div class="card-body np">
            <div class="table-scroll">
                <table class="wst-table">
                    <thead>
                        <tr>
                            <th style="width:36px;">#</th>
                            <th>Email</th>
                            <th class="r">Subscribed</th>
                        </tr>
                    </thead>
                    <tbody id="dash-subs">
                        @foreach($subscribers as $index => $sub)
                            <tr>
                                <td style="font-family:var(--font-mono);font-size:10px;color:var(--text-3);">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                <td>
                                    <div style="display:flex;align-items:center;gap:8px;">
                                        <i class="fa-regular fa-envelope" style="font-size:10px;color:var(--text-3);"></i>
                                        <a href="mailto:{{ $sub->email }}" style="color:var(--text-1);font-weight:500;">{{ $sub->email }}</a>
                                    </div>
                                </td>
                                <td class="r" style="font-family:var(--font-mono);font-size:11px;color:var(--text-3);">{{ $sub->created_at->format('d M Y') }} - {{ $sub->created_at->format('H:i') }}</td>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Menampilkan detail asset logs dengan AJAX ketika tombol dipilih
$(document).on('click', '.asset-trigger', function(e) {
    e.preventDefault();
    let $this = $(this);
    let url = $this.data('url');
    let container = $('#asset-detail-container');
    let loader = $('#detail-loader');
    let listCard = $('#list-assets-card');
    let allTriggers = $('.asset-trigger');

    // Jika sudah active, close dan tampilkan list card kembali
    if ($this.hasClass('bg-teal-50')) {
        $this.removeClass('bg-teal-50 border-teal-200 shadow-sm ring-1 ring-teal-200');
        container.slideUp(300);
        listCard.slideDown(300);
        return;
    }

    allTriggers.removeClass('bg-teal-50 border-teal-200 shadow-sm ring-1 ring-teal-200');
    $this.addClass('bg-teal-50 border-teal-200 shadow-sm ring-1 ring-teal-200');

    // Jika container sudah terbuka, flash content tanpa animasi buka/tutup
    if (container.is(':visible')) {
        container.css('opacity', 0.4);
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                container.html(response).animate({ opacity: 1 }, 200);
            },
            error: function() {
                container.animate({ opacity: 1 }, 200);
                alert('Failed to load asset details.');
            }
        });
        return;
    }

    // Container belum terbuka — sembunyikan list card dulu, lalu load
    listCard.slideUp(200, function() {
        loader.removeClass('hidden').fadeIn(100);
        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                loader.hide();
                container.html(response).slideDown(400);
                $('html, body').animate({
                    scrollTop: container.offset().top - 150
                }, 600);
            },
            error: function() {
                loader.hide();
                listCard.slideDown(300);
                alert('Failed to load asset details.');
            }
        });
    });
});

// Close button
$(document).on('click', '#close-detail-btn', function() {
    let container = $('#asset-detail-container');
    let listCard = $('#list-assets-card');
    let allTriggers = $('.asset-trigger');

    allTriggers.removeClass('bg-teal-50 border-teal-200 shadow-sm ring-1 ring-teal-200');
    container.slideUp(300, function() {
        listCard.slideDown(300);
    });
});

    function loadAssets() {
        let search = $('#search').val();
        let category = $('#category').val();
        let industry_id = $('#industry_id').val();
        $.ajax({
            url: "{{ route('admin.dashboard.assets.ajax') }}",
            type: 'GET',
            data: { search, category, industry_id },
            success: function(response) {
                $('#assets-results').html(response);
            }
        });
    }

    $('#search, #category, #industry_id').on('change input', loadAssets);
    loadAssets(); // initial load
});

    // Initialize chart
    let assetChart;
    const ctx = document.getElementById('assetChart');

    function initChart(data, labels) {
        if (assetChart) {
            assetChart.destroy();
        }

        const isDark = document.body.getAttribute('data-theme') === 'dark';
        const gridColor = isDark ? 'rgba(255,255,255,0.04)' : 'rgba(0,0,0,0.05)';
        const tickColor = isDark ? '#8b92a5' : '#6b7280';
        const accentHex = isDark ? '#00c9a7' : '#007a64';

        const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, ctx.offsetHeight);
        gradient.addColorStop(0, isDark ? 'rgba(0,201,167,0.20)' : 'rgba(0,122,100,0.15)');
        gradient.addColorStop(1, 'rgba(0,201,167,0)');

        assetChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    borderColor: accentHex,
                    borderWidth: 2,
                    backgroundColor: gradient,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 0,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: accentHex,
                    pointHoverBorderColor: isDark ? '#0c0d11' : '#fff',
                    pointHoverBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: isDark ? '#141720' : '#fff',
                        borderColor: isDark ? 'rgba(255,255,255,0.08)' : 'rgba(0,0,0,0.10)',
                        borderWidth: 1,
                        titleColor: isDark ? '#ecedf2' : '#0d0f1a',
                        bodyColor: isDark ? '#8b92a5' : '#5a6278',
                        padding: 12,
                        cornerRadius: 8
                    }
                },
                scales: {
                    y: {
                        grid: {
                            color: gridColor,
                            drawBorder: false
                        },
                        ticks: {
                            color: tickColor,
                            font: { family: 'JetBrains Mono', size: 10 },
                            callback: v => v >= 1000 ? (v / 1000).toFixed(0) + 'k' : v
                        },
                        border: { display: false }
                    },
                    x: {
                        grid: { display: false },
                        ticks: {
                            color: tickColor,
                            font: { family: 'JetBrains Mono', size: 10 }
                        },
                        border: { display: false }
                    }
                }
            }
        });
    }

    // Initialize with views data
    initChart(@json($chartValues), @json($chartLabels));

    // Chart switching function
    function switchChart(button, type) {
        // Update tab buttons
        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        // Update chart based on type
        if (type === 'views') {
            initChart(@json($chartValues), @json($chartLabels));
        } else if (type === 'leads') {
            initChart(@json($leadsValues), @json($chartLabels));
        } else if (type === 'subs') {
            initChart(@json($subsValues), @json($chartLabels));
        }
    }

    // Viewer log functions
    function openViewerLog(assetId, button) {
        // Remove active state from all performer items
        document.querySelectorAll('.performer-item').forEach(item => {
            item.classList.remove('active');
        });
        // Add active state to clicked item
        button.classList.add('active');

        // Show panel
        const panel = document.getElementById('viewer-log-panel');
        panel.style.display = 'block';

        // Set asset info
        document.getElementById('viewer-asset-title').textContent = button.querySelector('.p-title').textContent;
        document.getElementById('viewer-asset-meta').textContent = `Asset ID ${assetId} • Total Views ${button.querySelector('.p-views').textContent}`;

        // Load viewer data (mock data for now)
        const tbody = document.getElementById('viewer-log-tbody');
        tbody.innerHTML = `
            <tr><td>John Doe</td><td>2024-01-15</td><td class="r">14:32</td></tr>
            <tr><td>Jane Smith</td><td>2024-01-14</td><td class="r">09:15</td></tr>
            <tr><td>Bob Johnson</td><td>2024-01-13</td><td class="r">16:45</td></tr>
        `;
    }

    function closeViewerLog() {
        document.getElementById('viewer-log-panel').style.display = 'none';
        document.querySelectorAll('.performer-item').forEach(item => {
            item.classList.remove('active');
        });
    }

    function filterViewerLog() {
        const searchTerm = document.getElementById('viewer-search').value.toLowerCase();
        const rows = document.querySelectorAll('#viewer-log-tbody tr');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    }

    // Clock function
    function updateClock() {
        const now = new Date();
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        };
        document.getElementById('date-label').textContent = now.toLocaleDateString('en-US', options);
    }

    // Update clock every second
    setInterval(updateClock, 1000);
    updateClock(); // Initial call

    // Export function
    function exportLeads() {
        window.location.href = "{{ route('admin.users.export') }}";
    }

    // Initialize on document ready
    $(document).ready(function() {
        // Any additional initialization can go here
    });
</script>
@endpush
