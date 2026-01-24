@extends('admin.portal')

@section('title', 'Dashboard')
@section('header_title', 'Admin Dashboard')

@section('content')

    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">
            Welcome back, {{ auth()->user()->name ?? 'Admin' }}
        </h2>
        <p class="text-gray-500">
            Manage assets and track engagement
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-10">
        <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
            <p class="text-xs text-gray-400 uppercase tracking-wide mb-2">Total Assets</p>
            <p class="text-3xl font-bold text-gray-800">
                {{ $stats['total_assets'] ?? 0 }}
            </p>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
            <p class="text-xs text-gray-400 uppercase tracking-wide mb-2">Total Views</p>
            <p class="text-3xl font-bold text-teal-600">
                {{ $stats['total_views'] ?? 0 }}
            </p>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
            <p class="text-xs text-gray-400 uppercase tracking-wide mb-2">Registered Users</p>
            <p class="text-3xl font-bold text-gray-800">
                {{ $stats['registered_users'] ?? 0 }}
            </p>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
            <p class="text-xs text-gray-400 uppercase tracking-wide mb-2">Total Subscribers</p>
            <p class="text-3xl font-bold text-gray-800">
                {{ $stats['total_subscribers'] ?? 0 }}
            </p>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
            <p class="text-xs text-gray-400 uppercase tracking-wide mb-2">Top Asset</p>
            <p class="text-sm font-semibold text-gray-800 truncate">
                {{ $stats['top_asset_title'] ?? '-' }}
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                Asset Engagement
            </h3>

            <canvas id="assetChart" height="120"></canvas>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                Top Performing
            </h3>

            <ul class="space-y-4">
                @forelse($topAssets ?? [] as $index => $asset)
                    <li class="flex items-center justify-between">
                        <button type="button" 
                            data-url="{{ route('admin.asset.details', $asset->id) }}"
                            class="asset-trigger w-full flex items-center justify-between group p-3 rounded-lg border border-transparent hover:bg-gray-50 hover:border-gray-200 transition-all duration-200 text-left">
                        <div class="flex items-center gap-3">
                            <span class="text-gray-300 font-bold">
                                {{ $index + 1 }}
                            </span>
                            <span class="text-sm font-medium text-gray-800">
                                {{ $asset->title }}
                            </span>
                        </div>

                        <span
                            class="text-sm font-semibold text-teal-600 bg-teal-50 px-2 py-1 rounded">
                            {{ $asset->views_count }}
                        </span>
                    </li>
                @empty
                    <li class="text-sm text-gray-400">
                        No performance data available
                    </li>
                @endforelse
            </ul>
        </div>

    </div>

    <div id="detail-loader" class="hidden mt-8 text-center py-12">
        <i class="fa-solid fa-circle-notch fa-spin text-3xl text-teal-500 mb-3"></i>
        <p class="text-gray-400 animate-pulse">Loading logs data...</p>
    </div>

    <div id="asset-detail-container" class="mt-8" style="display: none;"></div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mt-8 p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="font-bold text-gray-800 text-lg">Registered Leads</h3>
            <button onclick="exportLeads()" class="text-sm text-teal-600 hover:text-teal-700 font-medium flex items-center gap-2 border border-teal-100 bg-teal-50 px-3 py-1.5 rounded-lg transition">
                <i class="fa-solid fa-download"></i> Export CSV
            </button>
        </div>

        <div class="overflow-x-auto">
            <table id="leadsTable" class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase font-semibold">
                    <tr>
                        <th class="p-4 rounded-tl-lg">Name</th>
                        <th class="p-4">Company</th>
                        <th class="p-4">Email</th>
                        <th class="p-4 rounded-tr-lg">Registered Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm bg-white">
                    @foreach($registeredUsers as $user)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-4 py-3 font-bold text-gray-900">{{ $user->name }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $user->company ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <a href="mailto:{{ $user->email }}" class="text-teal-600 hover:underline">{{ $user->email }}</a>
                            </td>
                            <td class="px-4 py-3 text-gray-500">
                                {{ $user->created_at->format('d M Y, H:i') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mt-8 p-6">
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center">
                <h3 class="font-bold text-gray-800 text-lg">Newsletter Subscribers</h3>
            </div>
            <span class="text-xs font-semibold bg-gray-100 text-gray-600 px-3 py-1 rounded-full">
                Total: {{ count($subscribers) }}
            </span>
        </div>

        <div class="overflow-x-auto">
            <table id="subscribersTable" class="w-full text-left border-collapse">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase font-semibold">
                    <tr>
                        <th class="p-4 rounded-tl-lg w-10">#</th>
                        <th class="p-4">Email Address</th>
                        <th class="p-4 rounded-tr-lg text-right">Subscribed At</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm bg-white">
                    @foreach($subscribers as $index => $sub)
                        <tr class="hover:bg-gray-50 transition duration-150 group">
                            <td class="px-4 py-3 text-gray-400 text-xs">
                                {{ $index + 1 }}
                            </td>
                            
                            <td class="px-4 py-3 font-medium text-gray-800">
                                <div class="flex items-center gap-2">
                                    <i class="fa-regular fa-envelope text-gray-300 group-hover:text-indigo-400 transition"></i>
                                    <a href="mailto:{{ $sub->email }}" class="hover:text-indigo-600 transition">
                                        {{ $sub->email }}
                                    </a>
                                </div>
                            </td>
                            
                            <td class="px-4 py-3 text-gray-500 text-right font-mono text-xs">
                                {{ $sub->created_at->format('d M Y') }} 
                                <span class="text-gray-300 mx-1">|</span> 
                                {{ $sub->created_at->format('H:i') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    const ctx = document.getElementById('assetChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Views',
                data: @json($chartValues),
                borderRadius: 8,
                backgroundColor: '#0d9488'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: '#f1f5f9' }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });

    function exportLeads() {
        window.location.href = "{{ route('admin.users.export') }}";
    }

    $(document).ready(function() {
        $('.asset-trigger').on('click', function(e) {
            e.preventDefault();
            
            let url = $(this).data('url');
            let container = $('#asset-detail-container');
            let loader = $('#detail-loader');
            let allTriggers = $('.asset-trigger');

            // Visual feedback pada tombol yang aktif
            allTriggers.removeClass('bg-teal-50 border-teal-200 shadow-sm ring-1 ring-teal-200');
            $(this).addClass('bg-teal-50 border-teal-200 shadow-sm ring-1 ring-teal-200');

            // Animasi slide up container lama (jika ada)
            container.slideUp(200, function() {
                // Tampilkan loader
                loader.removeClass('hidden').fadeIn(100);
                
                // Request AJAX
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        loader.hide(); // Sembunyikan loader
                        
                        container.html(response).slideDown(400);

                        $('html, body').animate({
                            scrollTop: container.offset().top - 150
                        }, 600);
                    },
                    error: function(xhr) {
                        loader.hide();
                        alert('Failed to load asset details.');
                    }
                });
            });
        });

        $(document).on('click', '#close-detail-btn', function() {
            $('#asset-detail-container').slideUp(300);
            $('.asset-trigger').removeClass('bg-teal-50 border-teal-200 shadow-sm ring-1 ring-teal-200');
        });

        const commonConfig = {
            responsive: true,
            language: {
                search: "", 
                searchPlaceholder: "Search records...",
                lengthMenu: "Show _MENU_ entries",
                paginate: {
                    previous: '<i class="fa-solid fa-chevron-left"></i>',
                    next: '<i class="fa-solid fa-chevron-right"></i>'
                }
            },
            // Menghilangkan garis border default DataTables yg jelek
            drawCallback: function () {
                $('.dataTables_paginate > .paginate_button').addClass('px-3 py-1 border rounded hover:bg-gray-100 mx-1 text-sm');
            }
        };

        $('#leadsTable').DataTable({
            ...commonConfig,
            pageLength: 10,
            order: [[3, 'desc']] 
        });

        $('#subscribersTable').DataTable({
            ...commonConfig,
            pageLength: 10,
            order: [[2, 'desc']]
        });
    });
</script>
@endpush
