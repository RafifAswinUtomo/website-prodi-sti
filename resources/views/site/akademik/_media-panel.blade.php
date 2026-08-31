{{-- Panel media 2 kolom: gambar + deskripsi + aksi.
     Params: $cover (path|null), $deskripsi, $actionUrl (nullable), $actionLabel, $download (bool) --}}
@php
    $download = $download ?? false;
    $actionUrl = $actionUrl ?? null;
    $actionLabel = $actionLabel ?? 'Akses Sekarang';
@endphp
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
    <div class="rounded-2xl overflow-hidden border border-gray-200 shadow-card bg-gray-50 flex items-center justify-center">
        @if (!empty($cover))
            <img loading="lazy" src="{{ asset('storage/' . $cover) }}" alt="{{ $actionLabel }}" class="w-full h-auto max-h-[640px] object-contain">
        @else
            <div class="w-full h-72 bg-gradient-to-br from-navy-600 to-navy-950 flex items-center justify-center">
                <svg class="w-16 h-16 text-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
        @endif
    </div>

    <div>
        @if (!empty($deskripsi))
            <p class="text-gray-600 leading-relaxed mb-6 whitespace-pre-line">{{ $deskripsi }}</p>
        @endif
        @if ($actionUrl)
            <a href="{{ $actionUrl }}"
               @if ($download) download @else target="_blank" rel="noopener" @endif
               class="inline-flex items-center justify-center gap-2 font-bold rounded-lg transition-all duration-200 hover:-translate-y-0.5 bg-navy hover:bg-navy-700 text-white border border-navy-600 shadow-sm px-8 py-3.5 text-base">
                @if ($download)
                    <svg class="h-5 w-5 text-gold-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                @else
                    <svg class="h-5 w-5 text-gold-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                @endif
                {{ $actionLabel }}
            </a>
        @endif
    </div>
</div>
