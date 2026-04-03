    <div class="card-hdr">
        <div class="card-title">
            <i class="fa-solid fa-eye" style="color:var(--accent);font-size:11px;"></i>{{ $asset->title }}
        </div>
        <div style="display:flex;align-items:center;gap:10px;">
            <div class="card-meta">Asset ID #{{ $asset->id }} • Total Views: {{ $views_count ?? $asset->views->count() }}</div>
            <div class="relative">
                <input type="text" id="localSearchInput"
                    style="padding-left:28px;padding-right:12px;padding-top:6px;padding-bottom:6px;font-size:12px;border:1px solid var(--border);border-radius:6px;background:var(--surface);color:var(--text-1);width:200px;"
                    placeholder="Search user or date...">
            </div>
            <button type="button" id="close-detail-btn" style="padding:6px;border:1px solid var(--border);border-radius:6px;background:none;color:var(--text-3);cursor:pointer;">
                <i class="fa-solid fa-xmark" style="font-size:12px;"></i>
            </button>
        </div>
    </div>
    <div class="card-body np">
        <div class="table-scroll">
            <table class="wst-table">
                <thead>
                    <tr>
                        <th>Viewer</th>
                        <th>Date</th>
                        <th class="r">Time</th>
                    </tr>
                </thead>
                <tbody id="logsTableBody">
                    @forelse($asset->views as $view)
                        <tr>
                            <td class="primary">
                                <div style="display:flex;align-items:center;gap:8px;">
                                    <div style="  width:26px; height:26px; border-radius:50%; flex-shrink:0;
                                        background:var(--accent-dim); border:1px solid rgba(0,201,167,.2);
                                        display:flex; align-items:center; justify-content:center;
                                        font-size:10px; font-weight:700; color:var(--accent);
                                        text-transform:uppercase;">
                                        {{ substr($view->user->name ?? 'G', 0, 1) }}
                                    </div>
                                    <span>{{ $view->user->name ?? 'Guest/Unknown' }}</span>
                                </div>
                            </td>
                            <td style="font-family:var(--font-mono);font-size:11px;color:var(--text-3);">{{ $view->created_at->format('d M Y') }}</td>
                            <td class="r" style="font-family:var(--font-mono);font-size:11px;color:var(--text-3);">{{ $view->created_at->format('H:i') }}</td>
                        </tr>
                    @empty
                        <tr class="no-data">
                            <td colspan="3" style="text-align:center;padding:20px;color:var(--text-3);">
                                No interaction data found.
                            </td>
                        </tr>
                    @endforelse
                    <tr id="noSearchResults" style="display: none;">
                        <td colspan="3" style="text-align:center;padding:20px;color:var(--text-3);">
                            No matching records found.
                        </td>
                    </tr>
                </tbody>
            </table>
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