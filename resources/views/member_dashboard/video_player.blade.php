<div class="w-full">
    <div class="relative rounded-xl overflow-hidden bg-black shadow-lg aspect-video">
        <video 
            controls 
            autoplay 
            controlsList="nodownload" 
            class="w-full h-full object-contain"
            poster="{{ $asset->image_path ? Storage::url($asset->image_path) : '' }}"
        >
            <source src="{{ Storage::url($asset->video_path) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="mt-4">
        <h4 class="text-lg font-bold text-gray-900">{{ $asset->title }}</h4>
        <p class="text-gray-500 text-sm mt-1">
            {{ $asset->category ?? 'Video Content' }}
        </p>
        
        @if(!blank($asset->description))
            <div class="mt-4 prose prose-sm max-w-none text-gray-600 border-t pt-4 border-gray-100">
                {!! $asset->description !!}
            </div>
        @endif
    </div>
</div>