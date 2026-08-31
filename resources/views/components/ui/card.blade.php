@props([
    'hover' => true,   // efek angkat saat hover
    'as'    => 'div',  // elemen pembungkus (div / a)
    'href'  => null,
])

@php
    $tag = $href ? 'a' : $as;
    $base = 'block bg-white rounded-2xl border border-gray-200/80 shadow-card overflow-hidden';
    $hoverCls = $hover
        ? 'transition-all duration-300 hover:-translate-y-1 hover:shadow-card-hover hover:border-navy/20'
        : '';
@endphp

<{{ $tag }}
    @if ($href) href="{{ $href }}" @endif
    {{ $attributes->merge(['class' => "$base $hoverCls"]) }}
>
    {{ $slot }}
</{{ $tag }}>
