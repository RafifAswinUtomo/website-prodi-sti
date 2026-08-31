<x-layouts.public title="Fasilitas">
    <x-ui.page-header title="Fasilitas & Laboratorium"
                      subtitle="Laboratorium yang mensimulasikan lingkungan industri sesungguhnya — tempat mahasiswa mengasah keterampilan teknis secara langsung." />

    <section class="bg-white py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Galeri fasilitas --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($facilities as $facility)
                    @php
                        $perlengkapan = [];
                        if (!empty($facility->perlengkapan)) {
                            $decoded = json_decode($facility->perlengkapan, true);
                            $perlengkapan = is_array($decoded)
                                ? $decoded
                                : array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $facility->perlengkapan)), fn ($x) => $x !== ''));
                        }
                    @endphp
                    <div x-data="{ open: false }">
                        {{-- Kartu galeri (klik untuk buka detail) --}}
                        <button type="button" @click="open = true"
                                class="w-full text-left bg-gradient-to-br from-[#28408f] to-[#3163e0] rounded-2xl overflow-hidden flex flex-col transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl shadow-lg group">
                            <div class="relative h-44 overflow-hidden bg-navy-950">
                                @if ($facility->foto)
                                    <img loading="lazy" src="{{ asset('storage/' . $facility->foto) }}" alt="{{ $facility->nama }}"
                                         class="h-full w-full object-cover opacity-95 group-hover:scale-105 transition-transform duration-500">
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-[#1c2d64]/70 via-transparent to-transparent"></div>
                                <span class="absolute bottom-3 right-3 bg-white/95 text-navy text-[10px] font-extrabold px-2.5 py-1 rounded-full shadow flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                    Lihat Detail
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                                </span>
                            </div>
                            <div class="p-5 flex flex-col flex-1">
                                <h3 class="font-bold text-white mb-2">{{ $facility->nama }}</h3>
                                @if ($facility->deskripsi)
                                    <p class="text-sm text-white/80 leading-relaxed line-clamp-3">{{ $facility->deskripsi }}</p>
                                @endif
                            </div>
                        </button>

                        {{-- Modal detail --}}
                        <div x-show="open" style="display:none;" x-transition.opacity
                             class="fixed inset-0 z-50 flex items-center justify-center p-4" @click.self="open = false" @keydown.escape.window="open = false">
                            <div class="absolute inset-0 bg-navy-950/70 backdrop-blur-sm" @click="open = false"></div>
                            <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                 class="relative bg-white rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl">
                                <div class="flex justify-between items-start gap-4 px-6 py-4 border-b border-gray-100 sticky top-0 bg-white z-10">
                                    <h3 class="font-extrabold text-gray-950 text-base sm:text-lg leading-tight">{{ $facility->nama }}</h3>
                                    <button @click="open = false" class="text-gray-400 hover:text-navy transition shrink-0" aria-label="Tutup">
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                    </button>
                                </div>

                                <div class="p-6 space-y-4">
                                    @if ($facility->foto)
                                        <div class="w-full rounded-2xl overflow-hidden">
                                            <img loading="lazy" src="{{ asset('storage/' . $facility->foto) }}" alt="{{ $facility->nama }}" class="w-full h-auto max-h-[400px] object-cover">
                                        </div>
                                    @endif

                                    @if ($facility->deskripsi)
                                        <p class="text-sm text-gray-600 leading-relaxed whitespace-pre-line">{{ $facility->deskripsi }}</p>
                                    @endif

                                    @if (count($perlengkapan) > 0)
                                        <div class="pt-2">
                                            <p class="text-[11px] font-extrabold uppercase tracking-[0.15em] text-gold-deep mb-2">Perlengkapan Utama</p>
                                            <ul class="space-y-1.5">
                                                @foreach ($perlengkapan as $item)
                                                    <li class="flex items-start gap-2 text-sm text-gray-700">
                                                        <svg class="h-4 w-4 text-navy flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                                        <span>{{ $item }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400 col-span-full text-center py-8">Belum ada data fasilitas.</p>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.public>
