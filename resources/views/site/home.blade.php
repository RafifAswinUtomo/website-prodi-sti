<x-layouts.public :title="($siteSettings['nama_prodi'] ?? 'Beranda')">

    {{-- ══════════ HERO SLIDER (2 kolom) ══════════ --}}
    @php
        $heroBg    = $siteSettings['hero_bg'] ?? (optional($sliders->first())->gambar);
        $heroBadge = $siteSettings['hero_badge'] ?? ($siteSettings['nama_kampus'] ?? 'Universitas IVET Semarang');
        $pmbLink   = $siteSettings['pmb_link'] ?? null;
        $brosur    = array_values(array_filter([$siteSettings['brosur_1'] ?? null, $siteSettings['brosur_2'] ?? null]));
        $brosurCaptions = [$siteSettings['brosur_1_caption'] ?? null, $siteSettings['brosur_2_caption'] ?? null];
    @endphp

    <style>
        @keyframes heroKenburns { from { transform: scale(1.12); } to { transform: scale(1); } }
        .hero-bg-anim { animation: heroKenburns 6s ease-out forwards; }
        @media (prefers-reduced-motion: reduce) { .hero-bg-anim { animation: none; } }
    </style>

    <section class="relative bg-gradient-to-br from-[#1c457d] via-[#2f96d0] to-[#3cbed8] text-white overflow-hidden"
             x-data="{
                 active: 0, total: {{ max($sliders->count(), 1) }},
                 brosur: 0, brosurTotal: {{ max(count($brosur), 1) }}, lightbox: false,
                 heroTimer: null, brosurTimer: null,
                 init() {
                     this.startTimers();
                     document.addEventListener('visibilitychange', () => {
                         // Saat tab tidak aktif: hentikan timer. Saat aktif lagi: mulai ulang bersih
                         // (bukan 'mengejar ketertinggalan'), supaya slide tidak terasa macet lalu meloncat.
                         if (document.hidden) { this.stopTimers(); }
                         else { this.startTimers(); }
                     });
                 },
                 startTimers() {
                     this.stopTimers();
                     this.heroTimer = setInterval(() => { if (this.total > 1) this.active = (this.active + 1) % this.total; }, 5000);
                     this.brosurTimer = setInterval(() => { if (this.brosurTotal > 1) this.brosur = (this.brosur + 1) % this.brosurTotal; }, 4000);
                 },
                 stopTimers() {
                     if (this.heroTimer) clearInterval(this.heroTimer);
                     if (this.brosurTimer) clearInterval(this.brosurTimer);
                 }
             }"
             >

        {{-- Latar (ganti + zoom perlahan tiap slide) --}}
        <div class="absolute inset-0 z-0 overflow-hidden">
            @forelse ($sliders as $index => $slider)
                @php $bg = $slider->gambar ?: $heroBg; @endphp
                <div x-show="active === {{ $index }}"
                     x-transition:enter="transition ease-in-out duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                     class="absolute inset-0" style="{{ $index > 0 ? 'display:none;' : '' }}">
                    @if ($bg)
                        <img src="{{ asset('storage/' . $bg) }}" alt="" class="hero-bg-anim w-full h-full object-cover opacity-40">
                    @endif
                </div>
            @empty
                @if ($heroBg)
                    <img src="{{ asset('storage/' . $heroBg) }}" alt="" class="hero-bg-anim absolute inset-0 w-full h-full object-cover opacity-40">
                @endif
            @endforelse

            <div class="absolute inset-0 bg-gradient-to-b from-[#3cbed8]/40 via-[#1c457d]/85 to-[#1c457d]/95"></div>
            <div class="absolute -top-40 -left-40 w-96 h-96 rounded-full bg-white/5 blur-3xl"></div>
            <div class="absolute -bottom-40 -right-40 w-96 h-96 rounded-full bg-gold/10 blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">

            {{-- Kiri: teks --}}
            <div class="lg:col-span-7 text-center lg:text-left space-y-6">
                <span class="inline-block bg-gold text-navy-950 text-xs font-extrabold uppercase tracking-widest px-3.5 py-1.5 rounded-full border border-gold-light shadow-sm">
                    {{ $heroBadge }}
                </span>

                <div class="grid">
                @forelse ($sliders as $index => $slider)
                    @php
                        // 4 mode animasi berganti-ganti sesuai urutan slide, meniru referensi persis.
                        $mode = $index % 4;
                        $titleModes = [
                            0 => ['enter' => 'opacity-0 [transform:translateX(-35px)] blur-[6px]', 'leave' => 'opacity-0 [transform:translateX(35px)] blur-[6px]'],
                            1 => ['enter' => 'opacity-0 [transform:translateX(35px)] blur-[6px]',  'leave' => 'opacity-0 [transform:translateX(-35px)] blur-[6px]'],
                            2 => ['enter' => 'opacity-0 [transform:translateY(-25px)] blur-[6px]', 'leave' => 'opacity-0 [transform:translateY(25px)] blur-[6px]'],
                            3 => ['enter' => 'opacity-0 [transform:scale(0.94)_translateY(15px)] blur-[6px]', 'leave' => 'opacity-0 [transform:scale(1.06)_translateY(-15px)] blur-[6px]'],
                        ];
                        $subModes = [
                            0 => ['enter' => 'opacity-0 [transform:translateX(-25px)]', 'leave' => 'opacity-0 [transform:translateX(25px)]'],
                            1 => ['enter' => 'opacity-0 [transform:translateX(25px)]',  'leave' => 'opacity-0 [transform:translateX(-25px)]'],
                            2 => ['enter' => 'opacity-0 [transform:translateY(-20px)]', 'leave' => 'opacity-0 [transform:translateY(20px)]'],
                            3 => ['enter' => 'opacity-0 [transform:scale(0.94)_translateY(10px)]', 'leave' => 'opacity-0 [transform:scale(1.06)_translateY(-10px)]'],
                        ];
                        $titleNeutral = 'opacity-100 [transform:translateX(0)_translateY(0)_scale(1)] blur-0';
                        $subNeutral   = 'opacity-100 [transform:translateX(0)_translateY(0)_scale(1)]';
                    @endphp
                    <div class="[grid-area:1/1]">
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight drop-shadow-[0_2px_6px_rgba(0,0,0,0.5)]"
                            x-show="active === {{ $index }}" style="{{ $index > 0 ? 'display:none;' : '' }}"
                            x-transition:enter="transition ease-[cubic-bezier(0.16,1,0.3,1)] duration-1000" x-transition:enter-start="{{ $titleModes[$mode]['enter'] }}" x-transition:enter-end="{{ $titleNeutral }}"
                            x-transition:leave="transition ease-[cubic-bezier(0.16,1,0.3,1)] duration-1000" x-transition:leave-start="{{ $titleNeutral }}" x-transition:leave-end="{{ $titleModes[$mode]['leave'] }}">
                            {{ $slider->judul }}
                            @if ($slider->judul_baris2)<br>{{ $slider->judul_baris2 }}@endif
                            @if ($slider->judul_sorot)<span class="text-gold block mt-1 uppercase">{{ $slider->judul_sorot }}</span>@endif
                        </h1>
                        @if ($slider->subjudul)
                            <p class="mt-4 text-sm sm:text-base text-white/85 max-w-2xl leading-relaxed"
                               x-show="active === {{ $index }}" style="{{ $index > 0 ? 'display:none;' : '' }}"
                               x-transition:enter="transition ease-[cubic-bezier(0.16,1,0.3,1)] duration-1000 delay-100" x-transition:enter-start="{{ $subModes[$mode]['enter'] }}" x-transition:enter-end="{{ $subNeutral }}"
                               x-transition:leave="transition ease-[cubic-bezier(0.16,1,0.3,1)] duration-1000" x-transition:leave-start="{{ $subNeutral }}" x-transition:leave-end="{{ $subModes[$mode]['leave'] }}">
                                {{ $slider->subjudul }}
                            </p>
                        @endif

                        {{-- Tombol utama: per-slider, cadangan ke Pengaturan Situs kalau kosong --}}
                        @php
                            $btnLabel = $slider->tombol_teks ?: ($pmbLink ? 'Informasi Pendaftaran' : null);
                            $btnLink  = $slider->tombol_link ?: $pmbLink;
                        @endphp
                        @if ($btnLabel && $btnLink)
                            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3 pt-6"
                                 x-show="active === {{ $index }}" style="{{ $index > 0 ? 'display:none;' : '' }}"
                                 x-transition:enter="transition ease-[cubic-bezier(0.16,1,0.3,1)] duration-1000 delay-200" x-transition:enter-start="opacity-0 [transform:translateY(15px)]" x-transition:enter-end="opacity-100 [transform:translateY(0)]"
                                 x-transition:leave="transition ease-[cubic-bezier(0.16,1,0.3,1)] duration-500" x-transition:leave-start="opacity-100 [transform:translateY(0)]" x-transition:leave-end="opacity-0 [transform:translateY(-10px)]">
                                <a href="{{ $btnLink }}"
                                   class="px-6 py-3 bg-gold hover:bg-gold-dark text-navy-950 font-black rounded-xl shadow-lg transition-all text-sm flex items-center gap-2 hover:-translate-y-0.5">
                                    {{ $btnLabel }}
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                                </a>
                            </div>
                        @endif
                    </div>
                @empty
                    <h1 class="text-3xl md:text-5xl font-extrabold">Selamat Datang</h1>
                    <p class="text-white/70">Belum ada slider aktif. Tambahkan lewat halaman admin.</p>
                @endforelse
                </div>

                @if ($sliders->count() > 1)
                    <div class="flex items-center gap-2 pt-4 justify-center lg:justify-start">
                        <button @click="active = (active - 1 + total) % total" class="p-1.5 rounded-full bg-white/10 hover:bg-white/20 border border-white/10 transition" aria-label="Sebelumnya">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <div class="flex gap-1.5">
                            @foreach ($sliders as $index => $s)
                                <button @click="active = {{ $index }}" :class="active === {{ $index }} ? 'bg-gold w-4' : 'bg-white/30 w-2 hover:bg-white/50'" class="h-2 rounded-full transition-all" aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach
                        </div>
                        <button @click="active = (active + 1) % total" class="p-1.5 rounded-full bg-white/10 hover:bg-white/20 border border-white/10 transition" aria-label="Berikutnya">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                @endif
            </div>

            {{-- Kanan: panel brosur PMB --}}
            <div class="lg:col-span-5 flex justify-center w-full">
                <div class="bg-navy-950/80 backdrop-blur-md p-4 rounded-3xl border border-white/10 w-full max-w-sm sm:max-w-md shadow-2xl relative">

                    {{-- Header panel --}}
                    <div class="flex items-center justify-between mb-3 px-1">
                        <p class="flex items-center gap-1.5 text-gold-light text-[11px] font-bold uppercase tracking-widest">
                            <span class="w-1.5 h-1.5 rounded-full bg-gold"></span>
                            Brosur PMB / {{ $siteSettings['nama_prodi'] ?? 'STI' }}
                        </p>
                        @if (count($brosur) > 1)
                            <span class="text-[10px] font-bold text-white/70 bg-white/10 px-2 py-0.5 rounded-full" x-text="'Hal ' + (brosur + 1) + ' dari ' + brosurTotal"></span>
                        @endif
                    </div>

                    {{-- Gambar (klik untuk perbesar) --}}
                    <button type="button" @click="lightbox = true" class="relative rounded-2xl overflow-hidden bg-navy-900 aspect-[4/3] w-full block group cursor-zoom-in [perspective:1000px]">
                        @forelse ($brosur as $i => $b)
                            @php
                                $flipFrom = $i === 0 ? '[transform:rotateY(-30deg)_translateX(-30px)_scale(0.94)]' : '[transform:rotateY(30deg)_translateX(30px)_scale(0.94)]';
                                $flipTo   = $i === 0 ? '[transform:rotateY(30deg)_translateX(30px)_scale(0.94)]'  : '[transform:rotateY(-30deg)_translateX(-30px)_scale(0.94)]';
                            @endphp
                            <img loading="lazy" x-show="brosur === {{ $i }}"
                                 x-transition:enter="transition ease-[cubic-bezier(0.16,1,0.3,1)] duration-500" x-transition:enter-start="opacity-0 {{ $flipFrom }}" x-transition:enter-end="opacity-100 [transform:rotateY(0deg)_translateX(0px)_scale(1)]"
                                 x-transition:leave="transition ease-[cubic-bezier(0.16,1,0.3,1)] duration-500" x-transition:leave-start="opacity-100 [transform:rotateY(0deg)_translateX(0px)_scale(1)]" x-transition:leave-end="opacity-0 {{ $flipTo }}"
                                 src="{{ asset('storage/' . $b) }}" alt="Brosur PMB halaman {{ $i + 1 }}"
                                 class="absolute inset-0 w-full h-full object-cover [backface-visibility:hidden]" style="{{ $i > 0 ? 'display:none;' : '' }}">
                        @empty
                            <div class="absolute inset-0 flex items-center justify-center text-center text-white/40 text-sm px-6">
                                Belum ada brosur. Unggah di Pengaturan Situs.
                            </div>
                        @endforelse
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors flex items-center justify-center">
                            <span class="opacity-0 group-hover:opacity-100 transition-opacity bg-black/70 text-white text-xs font-semibold px-3 py-1.5 rounded-full">
                                Klik untuk Memperbesar
                            </span>
                        </div>
                    </button>

                    {{-- Panah navigasi panel --}}
                    @if (count($brosur) > 1)
                        <button @click="brosur = (brosur - 1 + brosurTotal) % brosurTotal" type="button"
                                class="absolute left-1 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-navy-700 text-white p-1.5 rounded-full transition z-10" aria-label="Brosur sebelumnya">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button @click="brosur = (brosur + 1) % brosurTotal" type="button"
                                class="absolute right-1 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-navy-700 text-white p-1.5 rounded-full transition z-10" aria-label="Brosur berikutnya">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    @endif

                    {{-- Keterangan halaman + dots --}}
                    <div class="flex items-center justify-between mt-3 px-1">
                        <p class="text-white/80 text-xs font-medium">
                            @foreach ($brosurCaptions as $i => $cap)
                                <span x-show="brosur === {{ $i }}" style="{{ $i > 0 ? 'display:none;' : '' }}">{{ $cap ?: 'Halaman ' . ($i + 1) }}</span>
                            @endforeach
                        </p>
                        @if (count($brosur) > 1)
                            <div class="flex gap-1.5">
                                @foreach ($brosur as $i => $b)
                                    <button @click="brosur = {{ $i }}" :class="brosur === {{ $i }} ? 'bg-gold w-4' : 'bg-white/30 w-2'" class="h-2 rounded-full transition-all" aria-label="Brosur {{ $i + 1 }}"></button>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- Tombol unduh per halaman --}}
                    @if (count($brosur) > 0)
                        <div class="grid {{ count($brosur) > 1 ? 'grid-cols-2' : 'grid-cols-1' }} gap-2 mt-3">
                            @foreach ($brosur as $i => $b)
                                <a href="{{ asset('storage/' . $b) }}" download
                                   class="flex items-center justify-center gap-1.5 {{ $i === 0 ? 'bg-navy hover:bg-navy-700 border border-navy-600' : 'bg-gold hover:bg-gold-dark' }} {{ $i === 0 ? 'text-white' : 'text-navy-950' }} font-bold py-2 rounded-xl text-xs transition hover:-translate-y-0.5">
                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                    Unduh Hal {{ $i + 1 }}
                                </a>
                            @endforeach
                        </div>
                    @endif

                    @if ($pmbLink)
                        <a href="{{ $pmbLink }}" target="_blank" rel="noopener"
                           class="mt-2 w-full flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white border border-white/20 font-bold py-2.5 rounded-xl text-sm transition">
                            Daftar Sekarang
                        </a>
                    @endif
                </div>
            </div>
        </div>

        {{-- Lightbox --}}
                    <div x-show="lightbox" style="display:none;" x-transition.opacity
                         class="fixed inset-0 z-[60] flex items-center justify-center p-4" @keydown.escape.window="lightbox = false">
                        <div class="absolute inset-0 bg-black/85 backdrop-blur-sm" @click="lightbox = false"></div>

                        <div class="relative bg-navy-950 border border-white/10 rounded-2xl w-full max-w-3xl shadow-2xl overflow-hidden">
                            <div class="flex items-start justify-between gap-4 px-6 py-4 border-b border-white/10">
                                <div>
                                    <h3 class="font-bold text-white text-sm sm:text-base">Brosur Resmi {{ $siteSettings['nama_prodi'] ?? 'Program Studi' }}</h3>
                                    <p class="text-gold-light text-xs font-semibold mt-0.5">
                                        @foreach ($brosurCaptions as $i => $cap)
                                            <span x-show="brosur === {{ $i }}" style="{{ $i > 0 ? 'display:none;' : '' }}">Halaman {{ $i + 1 }}: {{ $cap ?: 'Brosur PMB' }}</span>
                                        @endforeach
                                    </p>
                                </div>
                                <div class="flex items-center gap-3 shrink-0">
                                    @if (count($brosur) > 1)
                                        <span class="text-[11px] font-bold text-white/70 bg-white/10 px-2.5 py-1 rounded-full" x-text="'Halaman ' + (brosur + 1) + ' / ' + brosurTotal"></span>
                                    @endif
                                    <button @click="lightbox = false" class="text-white/60 hover:text-white transition" aria-label="Tutup">
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                    </button>
                                </div>
                            </div>

                            <div class="p-4 sm:p-5 bg-navy-950">
                                <div class="relative aspect-[1.414/1] w-full max-h-[72vh] rounded-2xl overflow-hidden bg-black mx-auto">
                                    @foreach ($brosur as $i => $b)
                                        <img loading="lazy" x-show="brosur === {{ $i }}" src="{{ asset('storage/' . $b) }}" alt="Brosur halaman {{ $i + 1 }}"
                                             class="w-full h-full object-contain" style="{{ $i > 0 ? 'display:none;' : '' }}">
                                    @endforeach

                                    @if (count($brosur) > 1)
                                        <button @click="brosur = (brosur - 1 + brosurTotal) % brosurTotal" type="button"
                                                class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/60 hover:bg-gold hover:text-navy-950 text-white p-2.5 rounded-full transition" aria-label="Sebelumnya">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                                        </button>
                                        <button @click="brosur = (brosur + 1) % brosurTotal" type="button"
                                                class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/60 hover:bg-gold hover:text-navy-950 text-white p-2.5 rounded-full transition" aria-label="Berikutnya">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                        </button>
                                    @endif
                                </div>

                                @if (count($brosur) > 1)
                                    <div class="flex gap-1.5 mt-3">
                                        @foreach ($brosur as $i => $b)
                                            <button @click="brosur = {{ $i }}" type="button"
                                                    :class="brosur === {{ $i }} ? 'bg-gold text-navy-950' : 'bg-white/5 text-white/50 hover:bg-white/10 hover:text-white'"
                                                    class="px-3 py-1.5 rounded-lg text-[10px] font-extrabold transition-all">
                                                HALAMAN {{ $i + 1 }}
                                            </button>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

        {{-- Badge pengunjung --}}
        <div class="absolute bottom-4 right-4 z-20 flex items-center gap-4 bg-black/60 backdrop-blur-md rounded-lg px-4 py-2 text-white text-xs border border-white/15 shadow-xl">
            <span class="font-mono tracking-wide">TOTAL <strong class="ml-0.5">{{ number_format($totalPengunjung, 0, ',', '.') }}</strong></span>
            <div class="h-3 w-px bg-white/20"></div>
            <span class="font-mono tracking-wide text-green-400">ONLINE <strong class="ml-0.5">{{ $onlineSekarang }}</strong></span>
        </div>
    </section>

    {{-- ══════════ STATISTIK RINGKAS ══════════ --}}
    @php
        $statDefaults = [
            ['label' => 'Akreditasi Prodi', 'val' => 'BAIK', 'sub' => 'BAN-PT Resmi'],
            ['label' => 'Mahasiswa Aktif', 'val' => '180+', 'sub' => 'Tahun Ajaran 2026'],
            ['label' => 'Mitra Kerja Sama', 'val' => '25+', 'sub' => 'Perusahaan & Instansi'],
            ['label' => 'Alumni Bekerja', 'val' => '92%', 'sub' => 'Kurang dari 6 Bulan'],
        ];
        $statCards = [];
        for ($i = 1; $i <= 4; $i++) {
            $label = $siteSettings["stat{$i}_label"] ?? null;
            $val   = $siteSettings["stat{$i}_val"] ?? null;
            if (!$label && !$val) continue;
            $statCards[] = [
                'label' => $label ?: $statDefaults[$i - 1]['label'],
                'val'   => $val ?: $statDefaults[$i - 1]['val'],
                'sub'   => $siteSettings["stat{$i}_sub"] ?? $statDefaults[$i - 1]['sub'],
            ];
        }
        if (count($statCards) === 0) {
            $statCards = $statDefaults;
        }
    @endphp

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
            @foreach ($statCards as $stat)
                <div class="bg-white p-5 rounded-2xl border border-navy/20 shadow-card hover:shadow-card-hover hover:-translate-y-1 hover:border-navy/40 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute top-0 inset-x-0 h-1.5 bg-navy"></div>
                    <span class="block text-[10px] text-navy/70 font-extrabold uppercase tracking-widest mb-1">{{ $stat['label'] }}</span>
                    <span class="block text-2xl sm:text-3xl font-black text-navy tracking-tight">{{ $stat['val'] }}</span>
                    <span class="block text-xs text-gray-500 font-bold mt-1">{{ $stat['sub'] }}</span>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ══════════ SAMBUTAN REKTOR ══════════ --}}
    @if (!empty($siteSettings['rektor_sambutan']))
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16">
            <div class="bg-gradient-to-br from-[#1c2d64] via-[#28408f] to-[#3163e0] rounded-3xl border-2 border-gold/30 p-6 sm:p-10 shadow-lg grid grid-cols-1 md:grid-cols-12 gap-8 items-center relative overflow-hidden text-white transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:border-gold/60">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gold/5 rounded-bl-full pointer-events-none"></div>

                {{-- Foto --}}
                <div class="md:col-span-4 text-center space-y-3">
                    <div class="relative inline-block">
                        @if (!empty($siteSettings['rektor_foto']))
                            <img loading="lazy" src="{{ asset('storage/' . $siteSettings['rektor_foto']) }}" alt="{{ $siteSettings['rektor_nama'] ?? 'Rektor' }}"
                                 class="w-32 h-32 md:w-44 md:h-44 object-cover rounded-3xl mx-auto shadow-md border-4 border-gold/20">
                        @else
                            <div class="w-32 h-32 md:w-44 md:h-44 rounded-3xl mx-auto border-4 border-gold/20 bg-navy-800 flex items-center justify-center text-gold/40">
                                <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/></svg>
                            </div>
                        @endif
                        <span class="absolute -bottom-2 -right-2 bg-gold text-navy-950 font-extrabold text-[10px] px-2.5 py-1 rounded-lg uppercase tracking-wider shadow-sm">
                            {{ $siteSettings['rektor_jabatan'] ?? 'Rektor' }}
                        </span>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-white text-sm sm:text-base">{{ $siteSettings['rektor_nama'] ?? '' }}</h4>
                        @if (!empty($siteSettings['rektor_nidn']))
                            <p class="text-xs text-gold-light/80 font-mono">NIDN: {{ $siteSettings['rektor_nidn'] }}</p>
                        @endif
                    </div>
                </div>

                {{-- Teks --}}
                <div class="md:col-span-8 space-y-4">
                    <span class="text-gold font-extrabold text-[11px] uppercase tracking-widest block border-b border-white/10 pb-1">
                        Sambutan Rektor {{ $siteSettings['nama_kampus'] ?? '' }}
                    </span>
                    @if (!empty($siteSettings['rektor_judul']))
                        <h3 class="font-extrabold text-white text-xl sm:text-2xl tracking-tight leading-tight">
                            "{{ $siteSettings['rektor_judul'] }}"
                        </h3>
                    @endif
                    <p class="text-white/90 text-sm sm:text-base leading-relaxed italic whitespace-pre-line">
                        "{{ $siteSettings['rektor_sambutan'] }}"
                    </p>
                    @if (!empty($siteSettings['rektor_sambutan2']))
                        <p class="text-white/80 text-xs sm:text-sm leading-relaxed font-medium whitespace-pre-line">
                            {{ $siteSettings['rektor_sambutan2'] }}
                        </p>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- ══════════ SAMBUTAN KAPRODI ══════════ --}}
    @if (!empty($siteSettings['kaprodi_sambutan']))
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
            <div class="bg-white rounded-3xl border border-gray-200 p-6 sm:p-10 shadow-xl grid grid-cols-1 md:grid-cols-12 gap-8 items-center relative overflow-hidden text-gray-800 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-gold via-navy-600 to-navy"></div>
                <div class="absolute -top-12 -right-12 w-40 h-40 bg-navy/5 rounded-full opacity-70 pointer-events-none"></div>
                <div class="absolute -bottom-16 -left-16 w-48 h-48 bg-gold/10 rounded-full opacity-70 pointer-events-none"></div>

                {{-- Foto --}}
                <div class="md:col-span-4 text-center space-y-4 relative z-10">
                    <div class="relative inline-block group">
                        <div class="absolute inset-0 bg-gradient-to-tr from-gold to-navy-600 rounded-3xl blur-[4px] opacity-30 group-hover:opacity-50 transition-opacity"></div>
                        <div class="relative overflow-hidden rounded-3xl border-4 border-white shadow-xl bg-gray-50">
                            @if (!empty($siteSettings['kaprodi_foto']))
                                <img loading="lazy" src="{{ asset('storage/' . $siteSettings['kaprodi_foto']) }}" alt="{{ $siteSettings['kaprodi_nama'] ?? 'Kaprodi' }}"
                                     class="w-36 h-36 md:w-48 md:h-48 object-cover mx-auto transition-transform duration-300 group-hover:scale-105">
                            @else
                                <div class="w-36 h-36 md:w-48 md:h-48 bg-gray-100 flex items-center justify-center text-gray-300">
                                    <svg class="w-20 h-20" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/></svg>
                                </div>
                            @endif
                        </div>
                        <span class="absolute -bottom-2 -right-2 bg-navy text-white font-extrabold text-[9px] px-3 py-1.5 rounded-xl uppercase tracking-widest shadow-md border border-navy-600">
                            {{ $siteSettings['kaprodi_jabatan'] ?? 'Kaprodi' }}
                        </span>
                    </div>
                    <div class="space-y-1">
                        <h4 class="font-extrabold text-navy text-sm sm:text-base tracking-tight">{{ $siteSettings['kaprodi_nama'] ?? '' }}</h4>
                        @if (!empty($siteSettings['kaprodi_nidn']))
                            <span class="bg-gold/10 text-gold-deep border border-gold/30 font-bold text-[9px] px-2.5 py-0.5 rounded-full inline-block font-mono">
                                NIDN: {{ $siteSettings['kaprodi_nidn'] }}
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Teks --}}
                <div class="md:col-span-8 space-y-4 relative z-10">
                    <span class="absolute -top-6 -left-4 text-8xl font-serif text-navy/10 select-none pointer-events-none -z-10">“</span>
                    <span class="text-navy font-extrabold text-[10px] uppercase tracking-wider bg-navy/5 px-2.5 py-1 rounded-md border border-navy/10 inline-block">
                        Sambutan Hangat
                    </span>
                    @if (!empty($siteSettings['kaprodi_judul']))
                        <h3 class="font-extrabold text-gray-900 text-lg sm:text-2xl tracking-tight leading-snug">
                            "{{ $siteSettings['kaprodi_judul'] }}"
                        </h3>
                    @endif
                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed italic pl-3 border-l-4 border-gold whitespace-pre-line">
                        {{ $siteSettings['kaprodi_sambutan'] }}
                    </p>
                    @if (!empty($siteSettings['kaprodi_sambutan2']))
                        <p class="text-gray-500 text-xs sm:text-sm leading-relaxed pl-3 font-medium whitespace-pre-line">
                            {{ $siteSettings['kaprodi_sambutan2'] }}
                        </p>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- ══════════ BIDANG KOMPETENSI KEILMUAN ══════════ --}}
    @php
        $pilarTitle = $siteSettings['pilar_title'] ?? 'Bidang Kompetensi Keilmuan';
        $pilarDesc  = $siteSettings['pilar_desc'] ?? 'Kami mengintegrasikan dua kutub keilmuan teknologi untuk menghasilkan pengembang sistem informasi mumpuni.';

        $pilarIcons = [
            // 1: buku, 2: kompas, 3: target
            'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
            'M12 21a9 9 0 100-18 9 9 0 000 18z M15.5 8.5l-2.121 5.379a1 1 0 01-1.379.7l-.386-.193a1 1 0 01-.7-1.379L13.5 7.5l2 1z',
            'M12 21a9 9 0 100-18 9 9 0 000 18z M12 16a4 4 0 100-8 4 4 0 000 8z M12 13a1 1 0 100-2 1 1 0 000 2z',
        ];

        $pilarCards = [];
        for ($i = 1; $i <= 3; $i++) {
            $title = $siteSettings["pilar{$i}_title"] ?? null;
            if (!$title) continue;
            $skillsRaw = $siteSettings["pilar{$i}_skills"] ?? '';
            $skills = array_values(array_filter(array_map('trim', explode(',', $skillsRaw))));
            $pilarCards[] = [
                'title' => $title,
                'desc'  => $siteSettings["pilar{$i}_desc"] ?? '',
                'skills' => $skills,
                'bg'    => $siteSettings["pilar{$i}_bg"] ?? null,
                'icon'  => $pilarIcons[$i - 1],
            ];
        }
    @endphp

    @if (count($pilarCards) > 0)
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16">
            <x-ui.section-heading eyebrow="Pilar Kompetensi" :title="$pilarTitle" :subtitle="$pilarDesc" class="mb-10" />

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($pilarCards as $card)
                    <div class="relative bg-gradient-to-br from-navy/75 via-navy-950/80 to-navy-950/95 backdrop-blur-md p-6 rounded-3xl border border-navy-500/30 shadow-lg transition-all duration-500 overflow-hidden flex flex-col justify-between group hover:-translate-y-1 hover:border-gold/40 hover:shadow-2xl min-h-[280px]">

                        {{-- Latar gambar (opsional) --}}
                        <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none">
                            @if ($card['bg'])
                                <img loading="lazy" src="{{ asset('storage/' . $card['bg']) }}" alt="{{ $card['title'] }}"
                                     class="w-full h-full object-cover opacity-15 mix-blend-overlay group-hover:scale-110 group-hover:opacity-25 transition-all duration-700 ease-out">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-navy-950/95 via-transparent to-transparent"></div>
                        </div>

                        {{-- Konten --}}
                        <div class="space-y-4 relative z-10">
                            <div class="w-12 h-12 rounded-2xl bg-white/10 text-gold-light border border-white/10 flex items-center justify-center group-hover:bg-gold group-hover:text-navy-950 group-hover:border-gold transition-all duration-300 shadow-md">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $card['icon'] }}"/></svg>
                            </div>
                            <h4 class="font-extrabold text-white text-base sm:text-lg group-hover:text-gold-light transition-colors duration-300">{{ $card['title'] }}</h4>
                            @if ($card['desc'])
                                <p class="text-white/80 text-xs sm:text-[13px] leading-relaxed font-medium">{{ $card['desc'] }}</p>
                            @endif
                        </div>

                        @if (count($card['skills']) > 0)
                            <div class="pt-4 mt-4 border-t border-white/10 flex flex-wrap gap-1.5 relative z-10">
                                @foreach ($card['skills'] as $skill)
                                    <span class="bg-white/5 group-hover:bg-white/10 text-gold-light font-mono text-[9px] font-bold px-2 py-1 rounded border border-white/5 transition-colors">
                                        {{ $skill }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- ══════════ PROSPEK KARIR LULUSAN ══════════ --}}
    @php
        $prospekTitle = $siteSettings['prospek_title'] ?? 'Prospek Karir Lulusan STI Universitas Ivet';
        $prospekDesc  = $siteSettings['prospek_desc'] ?? 'Sektor digital yang terus berekspansi pesat membuka peluang karir tanpa batas bagi Sarjana Komputer lulusan prodi Sistem dan Teknologi Informasi. Kami merancang profil lulusan agar siap mengisi peran strategis industri.';

        $prospekList = [];
        for ($i = 1; $i <= 4; $i++) {
            $role = $siteSettings["prospek{$i}_title"] ?? null;
            if (!$role) continue;
            $prospekList[] = ['role' => $role, 'desc' => $siteSettings["prospek{$i}_desc"] ?? ''];
        }

        // Fallback default kalau admin belum mengisi sama sekali
        if (count($prospekList) === 0) {
            $prospekList = [
                ['role' => 'Fullstack Web/Mobile Developer', 'desc' => 'Membangun aplikasi website interaktif serta aplikasi seluler modern.'],
                ['role' => 'System Analyst & IT Consultant', 'desc' => 'Menganalisis kebutuhan perangkat lunak korporat dan memberikan solusi TI.'],
                ['role' => 'Network & Cloud Administrator', 'desc' => 'Mengelola server cloud serta menjaga reliabilitas infrastruktur komputer.'],
                ['role' => 'IT Project Manager', 'desc' => 'Memimpin tim pengembang, merencanakan, serta memastikan kesuksesan rilis produk digital.'],
            ];
        }
    @endphp

    <section class="bg-gradient-to-b from-gray-50 via-navy-50/20 to-gray-100 py-12 border-y border-navy/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">

            {{-- Kiri: judul & deskripsi --}}
            <div class="lg:col-span-5 space-y-5">
                <span class="text-navy font-extrabold text-[10px] uppercase tracking-widest block bg-navy/5 px-2.5 py-1 rounded-md border border-navy/10 inline-block">Lulusan Kompeten</span>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight leading-tight">{{ $prospekTitle }}</h3>
                <p class="text-gray-500 text-xs sm:text-sm leading-relaxed">{{ $prospekDesc }}</p>
            </div>

            {{-- Kanan: 4 kartu peran --}}
            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach ($prospekList as $i => $career)
                    <div class="bg-gradient-to-br from-navy/5 to-white p-4 rounded-xl border border-navy/10 hover:border-navy/30 shadow-sm flex gap-3.5 items-start transition-all duration-300 group">
                        <span class="w-6 h-6 rounded-full bg-navy text-white font-black text-xs flex items-center justify-center shrink-0 mt-0.5 font-mono shadow-md group-hover:bg-navy-700 transition-colors">
                            {{ $i + 1 }}
                        </span>
                        <div>
                            <h4 class="font-extrabold text-navy-950 text-xs sm:text-sm group-hover:text-navy-700 transition-colors">{{ $career['role'] }}</h4>
                            @if ($career['desc'])
                                <p class="text-gray-600 text-[11px] leading-normal mt-1">{{ $career['desc'] }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══════════ SEJARAH PENDIRIAN & PERKEMBANGAN ══════════ --}}
    @if (isset($milestones) && $milestones->isNotEmpty())
        @php
            $sejarahIcons = [
                'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                'M12 15a3 3 0 100-6 3 3 0 000 6z M12 1v4m0 14v4m9-9h-4M5 12H1m15.36-6.36l-2.83 2.83M8.46 15.54l-2.83 2.83m0-12.73l2.83 2.83m6.24 6.24l2.83 2.83',
                'M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 10-4-4 4 4 0 004 4zm6 0a4 4 0 10-4-4',
            ];
        @endphp

        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 space-y-6"
                 x-data="{ activeYear: {{ optional($milestones->first())->tahun ?? 'null' }} }">

            {{-- Banner judul section --}}
            <div class="relative rounded-3xl p-6 sm:p-10 text-white shadow-lg overflow-hidden">
                @if (!empty($siteSettings['sejarah_bg']))
                    <img loading="lazy" src="{{ asset('storage/' . $siteSettings['sejarah_bg']) }}" alt="" class="absolute inset-0 w-full h-full object-cover">
                @endif
                <div class="absolute inset-0 bg-gradient-to-r from-[#28408f]/90 to-[#3163e0]/85"></div>
                <div class="relative z-10 space-y-2">
                    <span class="text-[10px] font-bold text-gold-light uppercase tracking-widest bg-gold/20 px-2.5 py-1 rounded border border-gold-light/30">Profil Singkat</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">{{ $siteSettings['sejarah_title'] ?? 'Sejarah Pendirian & Perkembangan' }}</h2>
                    <p class="text-xs sm:text-sm text-white/85 max-w-2xl leading-relaxed">
                        {{ $siteSettings['sejarah_desc'] ?? 'Alur sejarah perjalanan pendirian program studi, SK resmi kementerian, dan milestone perkembangan Program Studi Sistem dan Teknologi Informasi.' }}
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-3xl border border-gray-200 shadow-card p-6 sm:p-10 space-y-8">

                {{-- Header: judul + tombol tahun --}}
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-gray-150">
                    <div class="flex items-center gap-3">
                        <div class="p-2.5 bg-navy/5 text-navy rounded-2xl shrink-0">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <span class="text-navy bg-navy/5 border border-navy/10 text-[10px] font-black px-2.5 py-0.5 rounded-full uppercase tracking-wider inline-block">
                                Garis Waktu Perjalanan
                            </span>
                            <h3 class="font-extrabold text-gray-900 text-lg sm:text-xl tracking-tight mt-1">Sejarah Pendirian & Perkembangan</h3>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-1.5 rounded-2xl border border-gray-150 flex flex-wrap gap-1.5">
                        @foreach ($milestones as $m)
                            <button @click="activeYear = {{ $m->tahun }}"
                                    :class="activeYear === {{ $m->tahun }} ? 'bg-navy text-white shadow-sm scale-105' : 'text-gray-500 hover:text-gray-900 hover:bg-white'"
                                    class="px-4 py-2 rounded-xl text-xs font-extrabold transition-all duration-200">
                                Tahun {{ $m->tahun }}
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Konten per tahun --}}
                <div class="grid">
                @foreach ($milestones as $m)
                    @php
                        $poinList = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string) $m->poin))));
                        $icon = $sejarahIcons[$loop->index % count($sejarahIcons)];
                        $isEven = $m->tahun % 2 === 0;
                        $enterFrom = $isEven ? '-translate-x-[60px]' : 'translate-x-[60px]';
                        $leaveTo   = $isEven ? 'translate-x-[60px]' : '-translate-x-[60px]';
                    @endphp
                    <div x-show="activeYear === {{ $m->tahun }}"
                         x-transition:enter="transition ease-[cubic-bezier(0.16,1,0.3,1)] duration-[450ms]"
                         x-transition:enter-start="opacity-0 {{ $enterFrom }} scale-[0.96]"
                         x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                         x-transition:leave="transition ease-[cubic-bezier(0.16,1,0.3,1)] duration-300"
                         x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                         x-transition:leave-end="opacity-0 {{ $leaveTo }} scale-[0.96]"
                         class="[grid-area:1/1] grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch" style="{{ $loop->first ? '' : 'display:none;' }}">

                        <div class="lg:col-span-4 flex flex-col items-center justify-center bg-gradient-to-br from-navy to-navy-700 p-8 rounded-3xl text-white text-center shadow-inner relative overflow-hidden min-h-[220px]">
                            <div class="absolute -top-12 -left-12 w-32 h-32 rounded-full border border-white/10"></div>
                            <div class="absolute -bottom-16 -right-16 w-48 h-48 rounded-full bg-white/5"></div>

                            @if ($m->badge)
                                <span class="text-[9px] font-black bg-gold text-navy-950 px-3.5 py-1 rounded-full uppercase tracking-widest shadow-sm z-10">
                                    {{ $m->badge }}
                                </span>
                            @endif
                            <div class="text-6xl sm:text-7xl font-black tracking-tighter text-white mt-4 z-10">{{ $m->tahun }}</div>
                            <div class="mt-4 p-3 bg-white/10 rounded-2xl border border-white/10 z-10">
                                <svg class="w-6 h-6 text-gold-light animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/></svg>
                            </div>
                        </div>

                        <div class="lg:col-span-8 flex flex-col justify-between space-y-6">
                            <div class="space-y-3">
                                <h4 class="text-base sm:text-lg font-extrabold text-gray-900 tracking-tight flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-navy inline-block animate-pulse"></span>
                                    {{ $m->judul }}
                                </h4>
                                @if ($m->deskripsi)
                                    <p class="text-gray-600 text-xs sm:text-sm leading-relaxed">{{ $m->deskripsi }}</p>
                                @endif
                            </div>

                            @if (count($poinList) > 0)
                                <div class="border-t border-gray-100 pt-5">
                                    <span class="text-[10px] font-black text-gray-400 uppercase tracking-wider block mb-3">
                                        Poin Legalitas & Capaian Penting
                                    </span>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                                        @foreach ($poinList as $i => $poin)
                                            <div class="flex items-start gap-2.5 text-xs text-gray-600 bg-gray-50 hover:bg-navy/5 p-3 rounded-xl border border-gray-100 hover:border-navy/10 transition-all">
                                                <div class="w-4 h-4 rounded-full bg-navy/5 text-navy flex items-center justify-center shrink-0 mt-0.5 border border-navy/10">
                                                    <span class="text-[9px] font-bold">{{ $i + 1 }}</span>
                                                </div>
                                                <span class="font-medium">{{ $poin }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                </div>

                {{-- Garis progres + timeline bawah --}}
                <div class="relative pt-6 border-t border-gray-100">
                    <div class="absolute top-1/2 left-0 right-0 h-1 bg-gray-100 -translate-y-1/2 rounded-full"></div>
                    <div class="absolute top-1/2 left-0 h-1 bg-gradient-to-r from-navy-700 to-navy -translate-y-1/2 rounded-full transition-all duration-500"
                         :style="`width: ${ {{ $milestones->count() }} > 1 ? ([{{ $milestones->pluck('tahun')->implode(',') }}].indexOf(activeYear) / ({{ $milestones->count() }} - 1)) * 100 : 0 }%`"></div>

                    <div class="relative z-10 flex justify-between px-2 sm:px-6">
                        @foreach ($milestones as $m)
                            @php $icon = $sejarahIcons[$loop->index % count($sejarahIcons)]; @endphp
                            <button @click="activeYear = {{ $m->tahun }}" class="flex flex-col items-center group focus:outline-none" type="button">
                                <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full flex items-center justify-center border-2 transition-all duration-300"
                                     :class="activeYear === {{ $m->tahun }} ? 'bg-navy border-navy text-white scale-110 shadow-md' : (activeYear >= {{ $m->tahun }} ? 'bg-navy/5 border-navy text-navy' : 'bg-white border-gray-200 text-gray-400 group-hover:border-gray-300')">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/></svg>
                                </div>
                                <span class="text-[10px] font-black mt-2 transition-colors" :class="activeYear === {{ $m->tahun }} ? 'text-navy' : 'text-gray-400 group-hover:text-gray-600'">
                                    {{ $m->tahun }}
                                </span>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- ══════════ VISI, MISI & TUJUAN PROGRAM STUDI ══════════ --}}
    @if ($visiMisi && ($visiMisi->visi || $visiMisi->misi))
        @php
            $vmMisiList = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string) $visiMisi->misi))));
            $vmPeoList = [];
            for ($i = 1; $i <= 3; $i++) {
                $peoTitle = $visiMisi->{"peo{$i}_title"} ?? null;
                if (!$peoTitle) continue;
                $vmPeoList[] = ['title' => $peoTitle, 'desc' => $visiMisi->{"peo{$i}_desc"} ?? ''];
            }
        @endphp

        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 space-y-8">

            {{-- Banner judul --}}
            <div class="relative rounded-3xl p-6 sm:p-10 text-white shadow-lg overflow-hidden">
                @if (!empty($visiMisi->banner_bg))
                    <img loading="lazy" src="{{ asset('storage/' . $visiMisi->banner_bg) }}" alt="" class="absolute inset-0 w-full h-full object-cover">
                @endif
                <div class="absolute inset-0 bg-gradient-to-r from-[#28408f]/90 to-[#3163e0]/85"></div>
                <div class="relative z-10 space-y-2">
                    <span class="text-[10px] font-bold text-gold-light uppercase tracking-widest bg-gold/20 px-2.5 py-1 rounded border border-gold-light/30">Target &amp; Tujuan</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Visi, Misi &amp; Tujuan Program Studi</h2>
                    <p class="text-xs sm:text-sm text-white/85 max-w-2xl leading-relaxed">
                        Panduan nilai dasar dan peta arah strategis kami dalam mencetak Sumber Daya Manusia (SDM) handal dalam bidang sistem serta teknologi informasi.
                    </p>
                </div>
            </div>

            {{-- Grid Visi & Misi --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">

                {{-- Kiri: Visi --}}
                <div class="lg:col-span-5 bg-gradient-to-br from-[#28408f] to-[#3163e0] text-white p-6 sm:p-8 rounded-3xl shadow-sm flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute -top-12 -left-12 w-44 h-44 rounded-full bg-white/5"></div>

                    <div class="space-y-6 relative z-10">
                        <div class="flex items-center gap-3 border-b border-white/10 pb-3">
                            <div class="p-2 bg-white/10 text-gold-light rounded-xl">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 100-18 9 9 0 000 18z M15.5 8.5l-2.121 5.379a1 1 0 01-1.379.7l-.386-.193a1 1 0 01-.7-1.379L13.5 7.5l2 1z"/></svg>
                            </div>
                            <h3 class="font-extrabold text-white text-base sm:text-lg uppercase tracking-widest">Visi Keilmuan</h3>
                        </div>

                        <p class="text-sm sm:text-base leading-relaxed font-semibold italic text-white/85">
                            "{{ $visiMisi->visi }}"
                        </p>
                    </div>

                    @if ($visiMisi->karakter)
                        <div class="bg-white/10 p-4 rounded-2xl border border-white/5 text-[11px] text-white/85 mt-6 font-mono leading-relaxed relative z-10">
                            <span class="block font-bold text-gold-light uppercase tracking-wider mb-1">Definisi Karakter:</span>
                            {{ $visiMisi->karakter }}
                        </div>
                    @endif
                </div>

                {{-- Kanan: Misi --}}
                <div class="lg:col-span-7 bg-white p-6 sm:p-8 rounded-3xl border border-gray-100 shadow-sm space-y-6">
                    <div class="flex items-center gap-3 border-b border-gray-100 pb-3">
                        <div class="p-2 bg-navy/5 text-navy rounded-xl">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 100-18 9 9 0 000 18z M12 16a4 4 0 100-8 4 4 0 000 8z M12 13a1 1 0 100-2 1 1 0 000 2z"/></svg>
                        </div>
                        <h3 class="font-extrabold text-gray-900 text-base sm:text-lg uppercase tracking-widest">Misi Strategis</h3>
                    </div>

                    <div class="space-y-4">
                        @foreach ($vmMisiList as $i => $misiText)
                            <div class="flex gap-4 items-start">
                                <span class="font-mono text-xs sm:text-sm font-black text-navy bg-navy/5 w-8 h-8 rounded-lg flex items-center justify-center shrink-0 mt-0.5">
                                    {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>
                                <p class="text-gray-600 text-xs sm:text-sm leading-relaxed">{{ $misiText }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Tujuan Pendidikan Program Studi (PEO) --}}
            @if (count($vmPeoList) > 0)
                <div class="bg-gradient-to-b from-navy-50/10 via-white to-white p-6 sm:p-8 rounded-3xl border border-navy/5 shadow-sm space-y-6">
                    <div class="flex items-center gap-3 border-b border-navy/5 pb-3">
                        <div class="p-2 bg-navy/5 text-navy rounded-xl">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.42a12 12 0 01-.16 6.42M12 14L5.84 10.58A12 12 0 006 17m6-3v6"/></svg>
                        </div>
                        <h3 class="font-extrabold text-gray-900 text-sm sm:text-base uppercase tracking-widest">Tujuan Pendidikan Program Studi (PEO)</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($vmPeoList as $i => $peo)
                            <div class="p-5 bg-gradient-to-br from-[#28408f] to-[#3163e0] rounded-2xl border border-white/10 hover:border-gold/40 space-y-2.5 transition-all duration-300 shadow-sm hover:-translate-y-1">
                                <span class="font-mono text-[10px] font-black text-gold tracking-widest block bg-gold/10 inline-block px-2.5 py-0.5 rounded-full border border-gold/20">PEO-{{ $i + 1 }}</span>
                                <h4 class="font-extrabold text-gold-light text-sm">{{ $peo['title'] }}</h4>
                                @if ($peo['desc'])
                                    <p class="text-white/85 text-xs leading-relaxed">{{ $peo['desc'] }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </section>
    @endif

    {{-- ══════════ DOSEN PROGRAM STUDI ══════════ --}}
    @if (isset($dosenProdi) && $dosenProdi->isNotEmpty())
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 space-y-6">
            <div class="text-center space-y-2 max-w-xl mx-auto">
                <span class="text-navy bg-navy/5 border border-navy/10 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider inline-block">Tim Pengajar</span>
                <h3 class="text-xl sm:text-2xl font-extrabold text-gray-900 tracking-tight uppercase">Dosen Program Studi</h3>
                <p class="text-xs sm:text-sm text-gray-500">Dipandu oleh jajaran dosen yang mumpuni secara akademis serta berpengalaman luas sebagai praktisi teknologi informasi.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
                @foreach ($dosenProdi as $d)
                    @php
                        $riwayatList = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string) $d->riwayat_pendidikan))));
                        $courseList  = array_values(array_filter(array_map('trim', explode(',', (string) $d->mata_kuliah))));
                        $pubList     = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string) $d->riset_publikasi))));
                    @endphp
                    <div x-data="{ open: false }">
                        <button type="button" @click="open = true"
                                class="w-full text-left bg-gradient-to-b from-[#3163e0] via-[#28408f] to-[#1c2d64] p-5 rounded-2xl border border-white/10 border-t-4 border-t-gold shadow-lg flex flex-col items-center text-center gap-4 transition-all duration-300 hover:-translate-y-1 hover:border-gold/60 hover:shadow-2xl relative overflow-hidden group">

                            @if ($d->foto)
                                <div class="absolute inset-0 z-0 opacity-10 pointer-events-none transition-all duration-500 group-hover:opacity-20 group-hover:scale-110">
                                    <img loading="lazy" src="{{ asset('storage/' . $d->foto) }}" alt="" class="w-full h-full object-cover blur-[2px] scale-105">
                                    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-navy-800/40 to-navy-950"></div>
                                </div>
                            @endif

                            <div class="relative z-10 overflow-hidden rounded-2xl border border-gold/20 shadow-md shrink-0 bg-navy-800/40">
                                @if ($d->foto)
                                    <img loading="lazy" src="{{ asset('storage/' . $d->foto) }}" alt="{{ $d->nama }}" class="w-20 h-20 sm:w-24 sm:h-24 object-cover transition-transform duration-300 group-hover:scale-110">
                                @else
                                    <div class="w-20 h-20 sm:w-24 sm:h-24 flex items-center justify-center text-gold/40 font-black text-xl">
                                        {{ \Illuminate\Support\Str::of($d->nama)->explode(' ')->take(2)->map(fn($w) => \Illuminate\Support\Str::substr($w, 0, 1))->implode('') }}
                                    </div>
                                @endif
                            </div>

                            <div class="space-y-1 text-center min-w-0 w-full flex-grow relative z-10">
                                <h4 class="font-extrabold text-white text-xs sm:text-sm leading-tight truncate px-1 group-hover:text-gold-light transition-colors" title="{{ $d->nama }}">
                                    {{ $d->nama }}
                                </h4>
                                @if ($d->jabatan)
                                    <span class="bg-gold/10 text-gold-light border border-gold/30 font-extrabold text-[9px] px-2 py-0.5 rounded uppercase tracking-wider inline-block">
                                        {{ $d->jabatan }}
                                    </span>
                                @endif
                                @if ($d->nidn)
                                    <p class="font-mono text-[9px] text-white/60 mt-1">NIDN: {{ $d->nidn }}</p>
                                @endif
                            </div>

                            @if ($d->edukasi_terakhir || $d->keahlian)
                                <div class="border-t border-navy-600/60 pt-3 w-full text-[10px] text-left space-y-2 text-white/70 relative z-10">
                                    @if ($d->edukasi_terakhir)
                                        <div>
                                            <span class="block text-gold-light/60 font-extrabold text-[8px] uppercase tracking-wider">Edukasi Terakhir</span>
                                            <span class="font-bold block truncate text-white" title="{{ $d->edukasi_terakhir }}">{{ $d->edukasi_terakhir }}</span>
                                        </div>
                                    @endif
                                    @if ($d->keahlian)
                                        <div>
                                            <span class="block text-gold-light/60 font-extrabold text-[8px] uppercase tracking-wider">Keahlian</span>
                                            <span class="font-medium text-white/80 block truncate" title="{{ $d->keahlian }}">{{ $d->keahlian }}</span>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <div class="pt-2 border-t border-navy-600/60 w-full text-center mt-auto relative z-10">
                                <span class="text-[10px] font-extrabold text-white/70 group-hover:text-gold-light inline-flex items-center gap-0.5 transition-colors">
                                    Lihat Biodata
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                </span>
                            </div>
                        </button>

                        {{-- Modal biodata --}}
                        <div x-show="open" style="display:none;" x-transition.opacity
                             class="fixed inset-0 z-50 flex items-center justify-center p-4" @click.self="open = false" @keydown.escape.window="open = false">
                            <div class="absolute inset-0 bg-navy-950/70 backdrop-blur-sm" @click="open = false"></div>
                            <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                 class="relative bg-white rounded-3xl w-full max-w-3xl max-h-[90vh] overflow-hidden shadow-2xl grid grid-cols-1 md:grid-cols-12">

                                {{-- Kiri: identitas --}}
                                <div class="md:col-span-5 bg-gradient-to-br from-[#28408f] to-[#1c2d64] p-6 sm:p-8 flex flex-col items-center justify-center text-center relative overflow-hidden">
                                    <div class="absolute -bottom-16 -left-16 w-48 h-48 rounded-full bg-white/5 pointer-events-none"></div>
                                    <div class="absolute -top-16 -right-16 w-36 h-36 rounded-full bg-white/5 pointer-events-none"></div>

                                    <div class="space-y-6 w-full relative z-10 my-auto">
                                        <div class="relative inline-block">
                                            @if ($d->foto)
                                                <img loading="lazy" src="{{ asset('storage/' . $d->foto) }}" alt="{{ $d->nama }}" class="w-32 h-32 sm:w-40 sm:h-40 object-cover rounded-3xl mx-auto border-4 border-white/20 shadow-lg">
                                            @else
                                                <div class="w-32 h-32 sm:w-40 sm:h-40 rounded-3xl mx-auto border-4 border-white/20 shadow-lg bg-navy-800 flex items-center justify-center text-gold/40 font-black text-3xl">
                                                    {{ \Illuminate\Support\Str::of($d->nama)->explode(' ')->take(2)->map(fn($w) => \Illuminate\Support\Str::substr($w, 0, 1))->implode('') }}
                                                </div>
                                            @endif
                                            <span class="absolute -bottom-2 -right-2 bg-gold text-navy-950 font-black text-[9px] sm:text-[10px] px-2.5 py-1 rounded-lg uppercase tracking-wider shadow">
                                                Profil Dosen
                                            </span>
                                        </div>

                                        <div class="space-y-2">
                                            <h3 class="text-base sm:text-lg md:text-xl font-black tracking-tight text-white leading-tight">{{ $d->nama }}</h3>
                                            @if ($d->jabatan)
                                                <div class="inline-block bg-white/10 border border-white/10 px-3 py-0.5 rounded text-gold-light font-extrabold text-[10px] uppercase tracking-wider">
                                                    {{ $d->jabatan }}
                                                </div>
                                            @endif
                                            @if ($d->nidn)
                                                <p class="text-white/80 font-mono text-xs mt-1">NIDN: {{ $d->nidn }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mt-8 pt-4 border-t border-white/10 w-full text-center relative z-10">
                                        <p class="text-[11px] text-white/70 font-medium">Program Studi Sistem dan Teknologi Informasi</p>
                                        <p class="text-[9px] text-gold-light/80 font-bold uppercase tracking-wider mt-1">{{ $siteSettings['nama_kampus'] ?? 'Universitas IVET Semarang' }}</p>
                                    </div>
                                </div>

                                {{-- Kanan: detail biodata --}}
                                <div class="md:col-span-7 p-6 sm:p-8 space-y-6 max-h-[90vh] md:max-h-[600px] overflow-y-auto">

                                    <div class="flex justify-end md:hidden">
                                        <button @click="open = false" class="text-gray-400 hover:text-navy" aria-label="Tutup">
                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                        </button>
                                    </div>

                                    @if ($d->email || $d->ruang_kerja)
                                        <div class="space-y-3">
                                            <h4 class="text-xs font-black uppercase tracking-widest text-navy-950 border-b border-gray-100 pb-1.5 flex items-center gap-2">
                                                <svg class="w-4 h-4 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11 11 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                                <span>Kontak &amp; Ruang Kerja</span>
                                            </h4>
                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 text-xs text-gray-600">
                                                @if ($d->email)
                                                    <div class="flex items-start gap-2 bg-gray-50 p-3 rounded-xl border border-gray-100">
                                                        <svg class="w-4 h-4 text-navy shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                                        <div class="min-w-0">
                                                            <span class="block text-gray-400 font-extrabold text-[8px] uppercase tracking-wider">Email Resmi</span>
                                                            <a href="mailto:{{ $d->email }}" class="font-bold text-gray-800 break-all hover:underline">{{ $d->email }}</a>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($d->ruang_kerja)
                                                    <div class="flex items-start gap-2 bg-gray-50 p-3 rounded-xl border border-gray-100">
                                                        <svg class="w-4 h-4 text-navy shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                        <div>
                                                            <span class="block text-gray-400 font-extrabold text-[8px] uppercase tracking-wider">Ruang Kerja</span>
                                                            <span class="font-bold text-gray-800">{{ $d->ruang_kerja }}</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif

                                    @if (count($riwayatList) > 0)
                                        <div class="space-y-3">
                                            <h4 class="text-xs font-black uppercase tracking-widest text-navy-950 border-b border-gray-100 pb-1.5 flex items-center gap-2">
                                                <svg class="w-4 h-4 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.42a12 12 0 01-.16 6.42M12 14L5.84 10.58A12 12 0 006 17m6-3v6"/></svg>
                                                <span>Riwayat Pendidikan Tinggi</span>
                                            </h4>
                                            <ul class="space-y-2 text-xs">
                                                @foreach ($riwayatList as $edu)
                                                    <li class="flex gap-2.5 items-start">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-navy shrink-0 mt-1.5"></span>
                                                        <span class="text-gray-700 font-medium">{{ $edu }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if (count($courseList) > 0)
                                        <div class="space-y-3">
                                            <h4 class="text-xs font-black uppercase tracking-widest text-navy-950 border-b border-gray-100 pb-1.5 flex items-center gap-2">
                                                <svg class="w-4 h-4 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                                <span>Mata Kuliah Diampu</span>
                                            </h4>
                                            <div class="flex flex-wrap gap-1.5">
                                                @foreach ($courseList as $course)
                                                    <span class="bg-navy/5 text-navy font-bold text-[10px] px-2.5 py-1 rounded-lg border border-navy/10">{{ $course }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    @if (count($pubList) > 0)
                                        <div class="space-y-3">
                                            <h4 class="text-xs font-black uppercase tracking-widest text-navy-950 border-b border-gray-100 pb-1.5 flex items-center gap-2">
                                                <svg class="w-4 h-4 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                <span>Riset &amp; Publikasi Ilmiah Terbaru</span>
                                            </h4>
                                            <div class="space-y-2.5 text-xs text-gray-600">
                                                @foreach ($pubList as $i => $pub)
                                                    <div class="bg-gray-50/50 p-3 rounded-xl border border-gray-100 flex gap-2">
                                                        <span class="font-extrabold text-navy text-[10px] bg-navy/5 w-5 h-5 rounded-full flex items-center justify-center shrink-0 border border-navy/10">{{ $i + 1 }}</span>
                                                        <p class="font-medium text-gray-700 italic">"{{ $pub }}"</p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    <div class="pt-4 border-t border-gray-100 flex justify-end">
                                        <button @click="open = false" class="px-5 py-2 bg-navy hover:bg-navy-700 text-white font-extrabold text-xs rounded-xl shadow transition-colors">
                                            Tutup Profil
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- ══════════ BERITA & KEGIATAN PRODI STI (cuplikan 3 terbaru) ══════════ --}}
    @if (isset($beritaList) && $beritaList->isNotEmpty())
        @php
 $beritaKategoriBadge = [
    'berita'    => ['label' => 'Berita', 'class' => 'bg-gold-dark'],
    'prestasi'  => ['label' => 'Prestasi', 'class' => 'bg-navy'],
    'kerjasama' => ['label' => 'Kerja Sama', 'class' => 'bg-green-600'],
    'kegiatan'  => ['label' => 'Event / Kegiatan', 'class' => 'bg-navy-600'],
];
        @endphp

        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 space-y-6">

            {{-- Banner --}}
            <div class="relative rounded-3xl p-6 sm:p-10 text-white shadow-lg overflow-hidden">
                @if (!empty($siteSettings['berita_bg']))
                    <img loading="lazy" src="{{ asset('storage/' . $siteSettings['berita_bg']) }}" alt="" class="absolute inset-0 w-full h-full object-cover">
                @endif
                <div class="absolute inset-0 bg-gradient-to-r from-[#28408f]/90 to-[#3163e0]/85"></div>
                <div class="relative z-10 space-y-2">
                    <span class="text-[10px] font-bold text-gold-light uppercase tracking-widest bg-gold/20 px-2.5 py-1 rounded border border-gold-light/30">Publikasi Informasi</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">{{ $siteSettings['berita_title'] ?? 'Berita & Kegiatan Prodi STI' }}</h2>
                    <p class="text-xs sm:text-sm text-white/85 max-w-2xl leading-relaxed">
                        {{ $siteSettings['berita_desc'] ?? 'Eksplorasi lini pemberitahuan kegiatan mahasiswa, event seminar nasional, pengabdian masyarakat, serta sederet prestasi mentereng program studi.' }}
                    </p>
                </div>
            </div>

            {{-- Grid 3 kartu terbaru --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($beritaList as $item)
                    @php $badge = $beritaKategoriBadge[$item->kategori] ?? $beritaKategoriBadge['kegiatan']; @endphp
                    <div x-data="{ open: false }">
                        <div class="bg-white rounded-2xl border border-navy/10 overflow-hidden shadow-card hover:shadow-card-hover hover:-translate-y-1 hover:border-navy/30 transition-all duration-300 flex flex-col justify-between h-full">
                            <div>
                                <div class="h-48 relative overflow-hidden bg-gray-50 flex items-center justify-center border-b border-navy/5">
                                    @if ($item->gambar)
                                        <img loading="lazy" src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-contain transition-transform duration-500 hover:scale-105">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-[#28408f] to-[#1c2d64]"></div>
                                    @endif
                                    <span class="absolute top-3 left-3 text-[9px] font-extrabold px-2.5 py-0.5 rounded shadow-md uppercase tracking-wider text-white {{ $badge['class'] }}">
                                        {{ $badge['label'] }}
                                    </span>
                                </div>

                                <div class="p-5 space-y-2.5">
                                    @if ($item->tanggal)
                                        <span class="text-[10px] text-gray-400 font-mono font-bold flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                            {{ $item->tanggal->translatedFormat('d M Y') }}
                                        </span>
                                    @endif
                                    <h4 class="font-extrabold text-gray-900 text-sm sm:text-base tracking-tight leading-tight hover:text-navy cursor-pointer" @click="open = true">
                                        {{ $item->judul }}
                                    </h4>
                                    @if ($item->ringkasan)
                                        <p class="text-gray-500 text-xs leading-relaxed line-clamp-3">{{ $item->ringkasan }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="p-5 pt-0">
                                <button @click="open = true" type="button"
                                        class="text-[11px] text-navy hover:text-navy-700 font-extrabold uppercase tracking-wider flex items-center gap-1 border-t border-gray-50 pt-3 w-full text-left transition-colors">
                                    <span>Baca Selengkapnya</span>
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
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
                @endforeach
            </div>

            {{-- Tombol lihat semua --}}
            <div class="text-center pt-2">
                <a href="{{ route('berita-kegiatan.index') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 bg-navy hover:bg-navy-700 text-white font-bold rounded-xl shadow-sm transition-all hover:-translate-y-0.5 text-sm">
                    Lihat Semua Berita
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>
        </section>
    @endif

    {{-- ══════════ KANAL INFORMASI & KOMUNITAS ══════════ --}}
    @php
        $sosmedDefaults = [
            1 => ['handle' => '@sti_unisvet', 'desc' => 'Program Studi Sistem & Teknologi Informasi Universitas Ivet', 'link' => 'https://www.instagram.com/sti_unisvet', 'platform' => 'instagram', 'btn' => 'Ikuti STI'],
            2 => ['handle' => '@himasti_ivet', 'desc' => 'Himpunan Mahasiswa Sistem & Teknologi Informasi Unisvet', 'link' => 'https://www.instagram.com/himasti_ivet', 'platform' => 'instagram', 'btn' => 'Ikuti HIMASTI'],
            3 => ['handle' => '@sti_unisvet', 'desc' => 'Video kreatif seputar teknologi, edukasi, & aktivitas kampus STI', 'link' => 'https://www.tiktok.com/@sti_unisvet', 'platform' => 'tiktok', 'btn' => 'Ikuti TikTok'],
            4 => ['handle' => '@himastiivet', 'desc' => 'Dokumentasi keseruan acara, tips kemahasiswaan, & konten HIMASTI', 'link' => 'https://www.tiktok.com/@himastiivet', 'platform' => 'tiktok', 'btn' => 'Ikuti TikTok'],
        ];
        $sosmedCards = [];
        foreach ($sosmedDefaults as $i => $def) {
            $sosmedCards[] = [
                'handle' => $siteSettings["sosmed{$i}_handle"] ?? $def['handle'],
                'desc'   => $siteSettings["sosmed{$i}_desc"] ?? $def['desc'],
                'link'   => $siteSettings["sosmed{$i}_link"] ?? $def['link'],
                'platform' => $def['platform'],
                'btn' => $def['btn'],
            ];
        }
    @endphp

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 space-y-8">
        <div class="text-center space-y-2 max-w-lg mx-auto">
            <span class="text-navy bg-navy/5 border border-navy/10 text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-wider inline-flex items-center gap-1.5">
                <span class="inline-block w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span> Hubungkan Media Sosial
            </span>
            <h3 class="text-xl sm:text-2xl font-extrabold text-gray-900 tracking-tight">Kanal Informasi &amp; Komunitas</h3>
            <p class="text-xs text-gray-400">
                Terhubung langsung dengan akun resmi STI &amp; HIMASTI untuk berita akademik, kegiatan mahasiswa, dan info terkini.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($sosmedCards as $card)
                <div class="bg-white rounded-2xl border border-navy/20 p-5 shadow-card hover:shadow-card-hover hover:-translate-y-1 hover:border-navy/40 transition-all duration-300 flex flex-col justify-between">
                    <div class="space-y-3.5">
                        <div class="flex items-center justify-between">
                            @if ($card['platform'] === 'instagram')
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-yellow-500 via-pink-500 to-purple-600 p-[2px] flex items-center justify-center shrink-0">
                                    <div class="w-full h-full bg-white rounded-[9px] flex items-center justify-center">
                                        <svg class="w-5 h-5 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><path stroke-linecap="round" d="M17.5 6.5h.01"/></svg>
                                    </div>
                                </div>
                                <span class="text-[9px] font-bold text-pink-600 bg-pink-50 px-2 py-0.5 rounded-full border border-pink-100 uppercase tracking-wider">Instagram</span>
                            @else
                                <div class="w-10 h-10 rounded-xl bg-gray-900 p-[2px] flex items-center justify-center shrink-0">
                                    <div class="w-full h-full bg-white rounded-[9px] flex items-center justify-center">
                                        <svg class="w-5 h-5 text-gray-900" fill="currentColor" viewBox="0 0 24 24"><path d="M16.6 5.82s.51.5 0 0A4.278 4.278 0 0115.54 3h-3.09v12.4a2.592 2.592 0 01-2.59 2.5c-1.42 0-2.6-1.16-2.6-2.6 0-1.72 1.66-3.01 3.37-2.48V9.66c-3.45-.46-6.47 2.22-6.47 5.64 0 3.33 2.76 5.7 5.69 5.7 3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 004.3 1.38V7.3s-1.88.09-3.24-1.48z"/></svg>
                                    </div>
                                </div>
                                <span class="text-[9px] font-bold text-gray-800 bg-gray-50 px-2 py-0.5 rounded-full border border-gray-200 uppercase tracking-wider">TikTok</span>
                            @endif
                        </div>

                        <div class="space-y-1">
                            <div class="flex items-center gap-1">
                                <h4 class="font-extrabold text-gray-900 text-sm truncate">{{ $card['handle'] }}</h4>
                                <span class="bg-blue-500 text-white rounded-full p-0.5 shrink-0" title="Akun Resmi">
                                    <svg class="w-2 h-2 fill-current" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                                </span>
                            </div>
                            <p class="text-[10px] text-gray-400 font-medium leading-relaxed truncate" title="{{ $card['desc'] }}">{{ $card['desc'] }}</p>
                        </div>
                    </div>

                    <div class="pt-4">
                        <a href="{{ $card['link'] }}" target="_blank" rel="noopener"
                           class="w-full py-2 px-3 rounded-xl text-xs font-bold {{ $card['platform'] === 'instagram' ? 'bg-navy hover:bg-navy-700' : 'bg-gray-900 hover:bg-black' }} text-white transition-all flex items-center justify-center gap-1.5 shadow-sm active:scale-[0.98]">
                            {{ $card['btn'] }}
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

{{-- ══════════ MAPS & KONTAK ══════════ --}}
    <section id="kontak" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <x-ui.section-heading eyebrow="Lokasi & Kontak" title="Temukan & Hubungi Kami" class="mb-10" />

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            {{-- Maps --}}
            <div>
                @if ($mapsKontak && $mapsKontak->maps_embed)
                    <div class="rounded-2xl overflow-hidden border border-gray-200 shadow-card">
                        <iframe src="{{ $mapsKontak->maps_embed }}" class="w-full h-80" loading="lazy" style="border:0;"></iframe>
                    </div>
                @else
                    <div class="w-full h-80 bg-gray-100 rounded-2xl flex items-center justify-center text-gray-400 text-sm border border-gray-200">
                        Peta belum diatur
                    </div>
                @endif
                @if (!empty($siteSettings['alamat']))
                    <p class="text-sm text-gray-600 mt-4 flex gap-2">
                        <svg class="w-4 h-4 text-navy shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>{{ $siteSettings['alamat'] }}</span>
                    </p>
                @endif
            </div>

            {{-- Kontak --}}
            <div class="space-y-4">
                @if ($mapsKontak && $mapsKontak->nama_kaprodi)
                    <x-ui.card :hover="false" class="p-5">
                        <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Ketua Program Studi</p>
                        <p class="font-bold text-navy-950 mt-1">{{ $mapsKontak->nama_kaprodi }}</p>
                        @if ($mapsKontak->whatsapp_kaprodi)
                            <a href="https://wa.me/{{ $mapsKontak->whatsapp_kaprodi }}" target="_blank" rel="noopener"
                               class="inline-flex items-center gap-1.5 text-sm text-green-600 font-semibold hover:underline mt-2">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38a9.9 9.9 0 004.79 1.22h.01c5.46 0 9.91-4.45 9.91-9.91C22 6.45 17.5 2 12.04 2zm5.83 14.16c-.25.7-1.22 1.28-1.94 1.44-.53.11-1.21.19-3.53-.75-2.97-1.23-4.88-4.24-5.03-4.44-.14-.2-1.2-1.6-1.2-3.06 0-1.46.76-2.17 1.03-2.47.27-.3.59-.37.79-.37.2 0 .4 0 .57.01.18.01.43-.07.68.51.25.6.85 2.06.93 2.21.08.15.13.32.02.52-.1.2-.15.32-.3.5-.15.18-.32.4-.45.53-.15.15-.31.31-.13.62.18.31.8 1.32 1.72 2.14 1.18 1.05 2.18 1.38 2.5 1.54.32.15.5.13.68-.08.19-.21.79-.92.99-1.24.2-.31.41-.26.68-.16.28.11 1.75.83 2.05.98.31.15.51.23.58.36.08.13.08.75-.17 1.45z"/></svg>
                                Chat WhatsApp
                            </a>
                        @endif
                    </x-ui.card>
                @endif

   <x-ui.card :hover="false" class="p-5">
    <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Kontak Program Studi</p>
    <p class="font-bold text-navy-950 mt-1">Layanan Informasi & Pendaftaran</p>
    @if (!empty($siteSettings['telepon']))
        <p class="text-sm text-gray-500 mt-1">{{ $siteSettings['telepon'] }}</p>
    @endif
</x-ui.card>

@if ($mapsKontak && $mapsKontak->whatsapp_pmb)
    <x-ui.btn :href="'https://wa.me/' . $mapsKontak->whatsapp_pmb" variant="whatsapp" size="lg" class="w-full">
        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38a9.9 9.9 0 004.79 1.22h.01c5.46 0 9.91-4.45 9.91-9.91C22 6.45 17.5 2 12.04 2z"/></svg>
        Chat WhatsApp Prodi
    </x-ui.btn>
@endif
            </div>
        </div>
    </section>

</x-layouts.public>
