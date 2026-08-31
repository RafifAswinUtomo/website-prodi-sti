@props([
    'eyebrow' => null,   // label kecil di atas judul (uppercase pill)
    'title'   => '',     // judul utama
    'subtitle'=> null,   // deskripsi opsional di bawah judul
    'align'   => 'center', // center | left
    'light'   => false,  // true bila dipakai di atas latar gelap
])

@php
    $wrap  = $align === 'left' ? 'text-left' : 'text-center mx-auto';
    $barMx = $align === 'left' ? '' : 'mx-auto';
    $titleColor = $light ? 'text-white' : 'text-navy-950';
    $subColor   = $light ? 'text-white/70' : 'text-gray-600';
    $pill = $light
        ? 'bg-white/10 text-gold-light'
        : 'bg-navy/5 text-navy';
@endphp

<div {{ $attributes->merge(['class' => "max-w-2xl $wrap"]) }}>
    @if ($eyebrow)
        <span class="inline-block text-[11px] font-bold uppercase tracking-[0.15em] {{ $pill }} px-3 py-1 rounded-full mb-3">
            {{ $eyebrow }}
        </span>
    @endif

    <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight {{ $titleColor }}">
        {{ $title }}
    </h2>

    <div class="w-14 h-1 bg-gold rounded-full mt-3 {{ $barMx }}"></div>

    @if ($subtitle)
        <p class="mt-4 text-base leading-relaxed {{ $subColor }}">
            {{ $subtitle }}
        </p>
    @endif
</div>
