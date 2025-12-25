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
</div>