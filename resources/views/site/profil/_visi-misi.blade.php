{{-- Partial Visi-Misi-Tujuan. Menerima: $visi, $misi, $tujuan (string, baris per item). --}}
@php
    $splitLines = function ($text) {
        if (empty($text)) return [];
        $decoded = json_decode($text, true);
        $arr = is_array($decoded) ? $decoded : preg_split('/\r\n|\r|\n/', $text);
        return array_values(array_filter(array_map('trim', $arr), fn ($x) => $x !== ''));
    };
    $misiItems = $splitLines($misi ?? null);
    $tujuanItems = $splitLines($tujuan ?? null);
@endphp

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-stretch">
    {{-- Visi --}}
    <div class="bg-white rounded-2xl border border-gray-200 shadow-card overflow-hidden flex flex-col">
        <div class="bg-navy text-white px-5 py-4 flex items-center gap-3">
            <svg class="w-5 h-5 text-gold shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 2H21l-3 6 3 6h-8.5l-1-2H5a2 2 0 00-2 2z"/></svg>
            <h3 class="text-base sm:text-lg font-bold">Visi Program Studi</h3>
        </div>
        <div class="p-8 sm:p-12 flex-1 flex items-center justify-center text-center">
            <p class="text-gray-700 italic font-medium leading-relaxed max-w-md">"{{ $visi }}"</p>
        </div>
    </div>

    {{-- Misi & Tujuan --}}
    <div class="space-y-6 flex flex-col">
        <div class="bg-white rounded-2xl border border-gray-200 shadow-card p-6">
            <div class="flex items-center gap-2 mb-4">
                <svg class="w-5 h-5 text-gold-dark shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18m0 0l-3.5-3.5M12 21l3.5-3.5M12 3a9 9 0 100 18 9 9 0 000-18z"/></svg>
                <h3 class="text-base font-bold text-navy">Misi</h3>
            </div>
            <ol class="space-y-2.5 text-sm text-gray-600 leading-relaxed">
                @foreach ($misiItems as $i => $item)
                    <li class="flex gap-2.5">
                        <span class="font-bold text-gold-dark shrink-0">{{ chr(97 + $i) }}.</span>
                        <span>{{ $item }}</span>
                    </li>
                @endforeach
            </ol>
        </div>

        <div class="bg-white rounded-2xl border border-gray-200 shadow-card p-6">
            <div class="flex items-center gap-2 mb-4">
                <svg class="w-5 h-5 text-gold-dark shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 11a1 1 0 100-2 1 1 0 000 2z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 3a7 7 0 017 7c0 5-7 11-7 11S5 15 5 10a7 7 0 017-7z"/></svg>
                <h3 class="text-base font-bold text-navy">Tujuan</h3>
            </div>
            <ul class="space-y-2.5 text-sm text-gray-600 leading-relaxed">
                @foreach ($tujuanItems as $item)
                    <li class="flex items-start gap-2.5">
                        <span class="w-1.5 h-1.5 bg-navy rounded-full mt-2 shrink-0"></span>
                        <span>{{ $item }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
