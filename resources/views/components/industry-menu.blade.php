@php
    use App\Models\Industry;
    
    static $industries = null;
    
    if ($industries === null) {
        $all = Industry::active()
            ->orderBy('sort_order')
            ->get()
            ->keyBy('id');

        $all->each(fn($i) => $i->setRelation('allChildren', collect()));

        $all->each(function ($industry) use ($all) {
            if (
                $industry->parent_id &&
                $industry->parent_id !== $industry->id &&
                $all->has($industry->parent_id)
            ) {
                $all->get($industry->parent_id)->allChildren->push($industry);
            }
        });

        $industries = $all->filter(fn($i) => is_null($i->parent_id))->values();
    }
@endphp

@foreach($industries as $industry)
    <li class="dropdown-item">
        <a href="{{ url('/industries/' . $industry->slug) }}">
            {{ $industry->title }}
            @if($industry->allChildren->count())
                <span class="arrow">›</span>
            @endif
        </a>

        @if($industry->allChildren->count())
            <ul class="dropdown-submenu">
                {{-- Pakai file BERBEDA untuk rekursi --}}
                @include('components.industry-submenu', [
                    'industries' => $industry->allChildren
                ])
            </ul>
        @endif
    </li>
@endforeach