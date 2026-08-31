<x-layouts.public :title="$siteSettings['berita_title'] ?? 'Berita & Kegiatan Prodi STI'">
    <x-ui.page-header :title="$siteSettings['berita_title'] ?? 'Berita & Kegiatan Prodi STI'" parent="Beranda"
                      :subtitle="$siteSettings['berita_desc'] ?? 'Eksplorasi lini pemberitahuan kegiatan mahasiswa, event seminar nasional, pengabdian masyarakat, serta sederet prestasi mentereng program studi.'" />

@php
        // Kategori "berita" hanya tampil di beranda, jadi tidak ada di halaman ini.
        $beritaKategoriBadge = [
            'prestasi'  => ['label' => 'Prestasi', 'class' => 'bg-navy'],
            'kerjasama' => ['label' => 'Kerja Sama', 'class' => 'bg-green-600'],
            'kegiatan'  => ['label' => 'Event / Kegiatan', 'class' => 'bg-navy-600'],
        ];
    @endphp

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">

{{-- Toggle kategori --}}
        <div class="flex flex-wrap justify-center gap-2 mb-10">
            <a href="{{ route('berita-kegiatan.index') }}"
               class="px-3.5 py-1.5 rounded-full text-xs font-bold transition
                      {{ is_null($kategori) ? 'bg-navy text-white shadow-md' : 'bg-white text-gray-600 border border-navy/10 hover:bg-navy/5' }}">
                Semua ({{ $jmlSemua }})
            </a>
            <a href="{{ route('berita-kegiatan.index', ['kategori' => 'kegiatan']) }}"
               class="px-3.5 py-1.5 rounded-full text-xs font-bold transition
                      {{ $kategori === 'kegiatan' ? 'bg-navy text-white shadow-md' : 'bg-white text-gray-600 border border-navy/10 hover:bg-navy/5' }}">
                Kegiatan / Event ({{ $jmlKegiatan }})
            </a>
            <a href="{{ route('berita-kegiatan.index', ['kategori' => 'prestasi']) }}"
               class="px-3.5 py-1.5 rounded-full text-xs font-bold transition
                      {{ $kategori === 'prestasi' ? 'bg-navy text-white shadow-md' : 'bg-white text-gray-600 border border-navy/10 hover:bg-navy/5' }}">
                Prestasi ({{ $jmlPrestasi }})
            </a>
            <a href="{{ route('berita-kegiatan.index', ['kategori' => 'kerjasama']) }}"
               class="px-3.5 py-1.5 rounded-full text-xs font-bold transition
                      {{ $kategori === 'kerjasama' ? 'bg-navy text-white shadow-md' : 'bg-white text-gray-600 border border-navy/10 hover:bg-navy/5' }}">
                Kerja Sama ({{ $jmlKerjasama }})
            </a>
        </div>

        {{-- Grid kartu --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse ($beritaList as $item)
                @php
                    $badge = $beritaKategoriBadge[$item->kategori] ?? $beritaKategoriBadge['kegiatan'];
                @endphp
                <div x-data="{ open: false }">
                    <div class="bg-white rounded-xl border border-navy/10 overflow-hidden shadow-card hover:shadow-card-hover hover:-translate-y-1 hover:border-navy/30 transition-all duration-300 flex flex-col justify-between h-full">
                        <div>
                            <div class="h-28 sm:h-32 relative overflow-hidden bg-gray-50 flex items-center justify-center border-b border-navy/5">
                                @if ($item->gambar)
                                    <img loading="lazy" src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-[#28408f] to-[#1c2d64]"></div>
                                @endif
                                <span class="absolute top-2 left-2 text-[8px] font-extrabold px-2 py-0.5 rounded shadow-md uppercase tracking-wider text-white {{ $badge['class'] }}">
                                    {{ $badge['label'] }}
                                </span>
                            </div>

                            <div class="p-3 space-y-1.5">
                                @if ($item->tanggal)
                                    <span class="text-[9px] text-gray-400 font-mono font-bold flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        {{ $item->tanggal->translatedFormat('d M Y') }}
                                    </span>
                                @endif
                                <h4 class="font-bold text-gray-900 text-[12px] sm:text-[13px] tracking-tight leading-snug hover:text-navy cursor-pointer line-clamp-2" @click="open = true">
                                    {{ $item->judul }}
                                </h4>
                            </div>
                        </div>

                        <div class="px-3 pb-3">
                            <button @click="open = true" type="button"
                                    class="text-[10px] text-navy hover:text-navy-700 font-bold uppercase tracking-wider flex items-center gap-1 border-t border-gray-50 pt-2 w-full text-left transition-colors">
                                <span>Selengkapnya</span>
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                            </button>
                        </div>
                    </div>

                    {{-- Modal detail --}}
                    <div x-show="open" style="display:none;" x-transition.opacity
                         class="fixed inset-0 z-50 flex items-center justify-center p-4" @click.self="open = false" @keydown.escape.window="open = false">
                        <div class="absolute inset-0 bg-navy-950/70 backdrop-blur-sm" @click="open = false"></div>
                        <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                             class="relative bg-white rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl">
                            <div class="flex justify-between items-start gap-4 px-6 py-4 border-b border-gray-100 sticky top-0 bg-white z-10">
                                <div class="space-y-1.5">
                                    <div class="flex items-center gap-2">
                                        <span class="text-[9px] font-extrabold px-2.5 py-0.5 rounded uppercase tracking-wider text-white {{ $badge['class'] }}">{{ $badge['label'] }}</span>
                                        @if ($item->tanggal)
                                            <span class="text-[10px] text-gray-400 font-mono font-bold flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                                {{ $item->tanggal->translatedFormat('d F Y') }}
                                            </span>
                                        @endif
                                    </div>
                                    <h3 class="font-extrabold text-gray-950 text-base sm:text-lg leading-tight">{{ $item->judul }}</h3>
                                </div>
                                <button @click="open = false" class="text-gray-400 hover:text-navy transition shrink-0" aria-label="Tutup">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                </button>
                            </div>

                            <div class="p-6 space-y-4">
                                @if ($item->gambar)
                                    <div class="w-full bg-gray-50 rounded-2xl border border-gray-100 p-2 flex items-center justify-center overflow-hidden">
                                        <img loading="lazy" src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-auto max-h-[400px] object-contain rounded-xl">
                                    </div>
                                @endif
                                <div class="text-gray-600 text-xs sm:text-sm leading-relaxed whitespace-pre-line space-y-4">
                                    @if ($item->ringkasan)
                                        <p class="font-semibold text-gray-800">{{ $item->ringkasan }}</p>
                                    @endif
                                    @if ($item->konten)
                                        <p>{{ $item->konten }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 col-span-full text-center py-8">Belum ada data untuk kategori ini.</p>
            @endforelse
        </div>
    </section>
</x-layouts.public>
