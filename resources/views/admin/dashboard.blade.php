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

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
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

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mt-8">
        <div class="p-4 border-b border-gray-100 flex justify-between items-center">
            <h3 class="font-bold">Registered Leads</h3>
            <button onclick="exportLeads()" class="text-sm text-teal-600 hover:text-teal-700 font-medium">
                <i class="fa-solid fa-download mr-1"></i>Export CSV
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase font-semibold">
                    <tr>
                        <th class="p-4">Name</th>
                        <th class="p-4">Company</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Registered</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm bg-white">
                    @forelse($registeredUsers as $user)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap">
                                {{ $user->name }}
                            </td>
                            
                            <td class="px-6 py-4 text-gray-600 whitespace-nowrap">
                                {{ $user->company ?? '-' }}
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="mailto:{{ $user->email }}" class="text-teal-600 hover:text-teal-800 hover:underline">
                                    {{ $user->email }}
                                </a>
                            </td>
                            
                            <td class="px-6 py-4 text-gray-500 whitespace-nowrap">
                                {{ $user->formatted_created_at }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-gray-400">
                                No registered leads found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
        
        // 1. Handle Klik pada List Item
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

        // 2. Handle Tombol Close (Delegated Event karena tombol dibuat dinamis)
        $(document).on('click', '#close-detail-btn', function() {
            $('#asset-detail-container').slideUp(300);
            // Hapus highlight aktif pada list
            $('.asset-trigger').removeClass('bg-teal-50 border-teal-200 shadow-sm ring-1 ring-teal-200');
        });

});
</script>
@endpush
