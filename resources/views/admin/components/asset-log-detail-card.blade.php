<div class="bg-white rounded-xl border border-gray-100 p-6 shadow-lg relative animate-fade-in-up">
    
    <button type="button" id="close-detail-btn" class="absolute top-4 right-4 text-gray-300 hover:text-red-500 hover:bg-red-50 p-2 rounded-full transition duration-200">
        <i class="fa-solid fa-xmark text-xl"></i>
    </button>

    <div class="mb-6 pr-10 flex flex-col md:flex-row md:items-end justify-between gap-4">
        
        <div>
            <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                {{ $asset->title }}
            </h2>
            <p class="text-gray-500 text-sm mt-1 ml-7">
                Asset ID: #{{ $asset->id }} &bull; Total Views: <span class="font-bold text-gray-700">{{ $views_count ?? $asset->views->count() }}</span>
            </p>
        </div>

        <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                <i class="fa-solid fa-magnifying-glass text-xs"></i>
            </span>
            <input type="text" id="localSearchInput" 
                class="pl-8 pr-3 py-1.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition w-48"
                placeholder="Search user or date...">
        </div>

    </div>

    <div class="grid grid-cols-1">
        <div class="lg:col-span-2 flex flex-col h-full">
            
            <div class="overflow-hidden rounded-lg border border-gray-100 flex flex-col">
                
                <div class="max-h-80 overflow-y-auto custom-scrollbar">
                    <table class="w-full text-sm text-left">
                        
                        <thead class="bg-gray-50 text-xs uppercase text-gray-500 font-semibold sticky top-0 z-10 shadow-sm">
                            <tr>
                                <th class="px-4 py-3 bg-gray-50">Viewer</th>
                                <th class="px-4 py-3 bg-gray-50">Date</th>
                                <th class="px-4 py-3 bg-gray-50 text-right">Time</th>
                            </tr>
                        </thead>
                        
                        <tbody id="logsTableBody" class="divide-y divide-gray-100 bg-white">
                            @forelse($asset->views as $view)
                                <tr class="hover:bg-gray-50 transition-colors group">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center text-xs font-bold shrink-0">
                                                {{ substr($view->user->name ?? 'G', 0, 1) }}
                                            </div>
                                            <span class="font-medium text-gray-700 group-hover:text-indigo-600 transition">
                                                {{ $view->user->name ?? 'Guest/Unknown' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-gray-500 whitespace-nowrap">
                                        {{ $view->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-4 py-3 text-right text-gray-400 font-mono text-xs whitespace-nowrap">
                                        {{ $view->created_at->format('H:i') }}
                                    </td>
                                </tr>
                            @empty
                                <tr class="no-data">
                                    <td colspan="3" class="px-4 py-6 text-center text-gray-400">
                                        No interaction data found.
                                    </td>
                                </tr>
                            @endforelse
                            
                            <tr id="noSearchResults" style="display: none;">
                                <td colspan="3" class="px-4 py-6 text-center text-gray-400">
                                    No matching records found.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Fitur Search Table Sederhana
    $('#localSearchInput').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        var visibleRows = 0;

        // Loop semua baris di tbody (kecuali pesan 'no-data' bawaan)
        $('#logsTableBody tr:not(.no-data, #noSearchResults)').filter(function() {
            // Cek apakah teks di baris ini mengandung kata kunci
            var match = $(this).text().toLowerCase().indexOf(value) > -1;
            $(this).toggle(match);
            
            if (match) visibleRows++;
        });

        // Tampilkan pesan "No matching records" jika hasil 0
        if (visibleRows === 0 && value !== '') {
            $('#noSearchResults').show();
        } else {
            $('#noSearchResults').hide();
        }
    });
</script>