@props([
    'variant' => 'primary', // primary | accent | outline | ghost | whatsapp
    'href'    => null,
    'size'    => 'md',      // sm | md | lg
    'type'    => 'button',
])

@php
    $variants = [
        'primary'  => 'bg-navy hover:bg-navy-700 text-white border border-navy-600 shadow-sm',
        'accent'   => 'bg-gold hover:bg-gold-dark text-navy-950 shadow-sm',
        'outline'  => 'border border-navy/25 text-navy hover:bg-navy hover:text-white',
        'ghost'    => 'text-navy hover:bg-navy/5',
        'whatsapp' => 'bg-green-600 hover:bg-green-700 text-white shadow-sm',
    ];
    $sizes = [
        'sm' => 'px-4 py-2 text-xs',
        'md' => 'px-6 py-3 text-sm',
        'lg' => 'px-8 py-3.5 text-base',
    ];
    $base = 'inline-flex items-center justify-center gap-2 font-bold rounded-lg transition-all duration-200 hover:-translate-y-0.5';
    $cls  = trim($base.' '.($variants[$variant] ?? $variants['primary']).' '.($sizes[$size] ?? $sizes['md']));
    $tag  = $href ? 'a' : 'button';
@endphp

<{{ $tag }}
    @if ($href) href="{{ $href }}" @else type="{{ $type }}" @endif
    {{ $attributes->merge(['class' => $cls]) }}
>
    {{ $slot }}
</{{ $tag }}>
