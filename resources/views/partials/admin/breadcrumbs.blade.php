@isset($breadcrumbs)
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        @foreach($breadcrumbs as $breadcrumb)
            @if($loop->last)
                <li class="breadcrumb-item active">
                    {{ $breadcrumb['label'] }}
                </li>
            @else
                <li class="breadcrumb-item">
                    <a href="{{ $breadcrumb['url'] }}">
                        {{ $breadcrumb['label'] }}
                    </a>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
@endisset