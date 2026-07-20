@props([
    'type' => 'primary',
    'size' => '',
    'href' => null
])

@if($href)

<a href="{{ $href }}"
   {{ $attributes->merge([
        'class' => "btn btn-$type btn-$size"
   ]) }}>

    {{ $slot }}

</a>

@else

<button
    {{ $attributes->merge([
        'class' => "btn btn-$type btn-$size"
    ]) }}>

    {{ $slot }}

</button>

@endif