<ul class="space-y-4 mt-4">
    @forelse($assets as $index => $asset)
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
            <span class="text-sm font-semibold text-teal-600 bg-teal-50 px-2 py-1 rounded">
                {{ $asset->views_count }}
            </span>
        </li>
    @empty
        <li class="text-sm text-gray-400">
            No assets found
        </li>
    @endforelse
</ul>