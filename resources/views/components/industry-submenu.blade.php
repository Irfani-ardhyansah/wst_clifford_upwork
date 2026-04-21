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
                {{-- Include dirinya sendiri untuk level berikutnya --}}
                @include('components.industry-submenu', [
                    'industries' => $industry->allChildren
                ])
            </ul>
        @endif
    </li>
@endforeach