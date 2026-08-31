<x-layouts.public :title="$judul">
    <x-ui.page-header :title="$judul" parent="Akademik" :parentUrl="route('akademik.index')"
                      subtitle="Koleksi e-book dan referensi digital untuk mendukung perkuliahan, riset, dan pengembangan keilmuan mahasiswa." />

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">

        {{-- Pencarian & filter kategori --}}
<form method="GET" class="mb-8 space-y-4">
    <div class="max-w-2xl mx-auto flex flex-col sm:flex-row gap-3">
        <div class="relative flex-1">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul atau penulis..."
                   class="w-full border border-navy/10 rounded-full pl-11 pr-4 py-3 text-sm shadow-sm focus:ring-2 focus:ring-navy/20 focus:border-navy/30 outline-none">
            <svg class="w-4 h-4 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>

        <select name="tahun" onchange="this.form.submit()"
                class="border border-navy/10 rounded-full px-4 py-3 text-sm shadow-sm focus:ring-2 focus:ring-navy/20 focus:border-navy/30 outline-none bg-white text-gray-700 sm:w-40">
            <option value="">Semua Tahun</option>
            @foreach ($tahunList as $t)
                <option value="{{ $t }}" @selected(request('tahun') === $t)>{{ $t }}</option>
            @endforeach
        </select>

        @if (request('kategori'))
            <input type="hidden" name="kategori" value="{{ request('kategori') }}">
        @endif
    </div>

    <div class="flex flex-wrap justify-center gap-2">
        @php
            $extra = '';
            if (request('q')) $extra .= '&q=' . urlencode(request('q'));
            if (request('tahun')) $extra .= '&tahun=' . urlencode(request('tahun'));
        @endphp
        <a href="{{ route('akademik.show', 'e-library') }}{{ $extra ? '?' . ltrim($extra, '&') : '' }}"
           class="px-4 py-1.5 rounded-full text-xs font-bold transition
                  {{ !request('kategori') ? 'bg-navy text-white shadow-md' : 'bg-white text-gray-600 border border-navy/10 hover:bg-navy/5' }}">
            Semua
        </a>
        @foreach ($kategoriList as $k)
            <a href="{{ route('akademik.show', 'e-library') }}?kategori={{ urlencode($k) }}{{ $extra }}"
               class="px-4 py-1.5 rounded-full text-xs font-bold transition
                      {{ request('kategori') === $k ? 'bg-navy text-white shadow-md' : 'bg-white text-gray-600 border border-navy/10 hover:bg-navy/5' }}">
                {{ $k }}
            </a>
        @endforeach
    </div>
</form>

        {{-- Grid koleksi --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
            @forelse ($ebooks as $ebook)
                <div class="bg-white rounded-2xl border border-navy/10 overflow-hidden shadow-card hover:shadow-card-hover hover:-translate-y-1 transition-all duration-300 flex flex-col">
                    <div class="aspect-[3/4] bg-gray-50 border-b border-navy/5 overflow-hidden">
                        @if ($ebook->cover)
                            <img loading="lazy" src="{{ asset('storage/' . $ebook->cover) }}" alt="{{ $ebook->judul }}"
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-[#28408f] to-[#1c2d64] flex items-center justify-center p-3">
                                <span class="text-white/80 text-[11px] font-bold text-center leading-snug">{{ $ebook->judul }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-3.5 flex flex-col flex-1">
                        <span class="text-[9px] font-extrabold uppercase tracking-wider text-gold-dark mb-1">{{ $ebook->kategori }}</span>
                        <h4 class="font-bold text-gray-900 text-xs sm:text-[13px] leading-snug line-clamp-3 mb-1.5">{{ $ebook->judul }}</h4>
                        <p class="text-[11px] text-gray-500 line-clamp-1 mb-3">{{ $ebook->penulis ?: 'Tidak diketahui' }} @if($ebook->tahun) &middot; {{ $ebook->tahun }} @endif</p>

                 @if ($ebook->file)
    <div class="mt-auto flex gap-1.5">
        <a href="{{ asset('storage/' . $ebook->file) }}" target="_blank" rel="noopener"
           class="flex-1 inline-flex items-center justify-center gap-1 border border-navy/30 text-navy hover:bg-navy hover:text-white font-bold px-2 py-2 rounded-lg text-[11px] transition hover:-translate-y-0.5">
            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            Lihat
        </a>
        <a href="{{ route('akademik.e-library.unduh', $ebook) }}"
           class="flex-1 inline-flex items-center justify-center gap-1 bg-navy hover:bg-navy-700 text-white font-bold px-2 py-2 rounded-lg text-[11px] transition hover:-translate-y-0.5">
            <svg class="h-3.5 w-3.5 text-gold-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
            Unduh
        </a>
    </div>
    @if ($ebook->ukuran_format !== '-')
        <span class="text-[10px] text-gray-400 text-center mt-1.5">{{ $ebook->ukuran_format }}</span>
    @endif
@else
    <span class="mt-auto text-[11px] text-gray-400 italic">File belum tersedia</span>
@endif
                    </div>
                </div>
            @empty
                <p class="text-gray-400 col-span-full text-center py-12">Belum ada e-book untuk kategori/pencarian ini.</p>
            @endforelse
        </div>

        @if ($ebooks->hasPages())
            <div class="mt-10">
                {{ $ebooks->links() }}
            </div>
        @endif
    </section>
</x-layouts.public>
