@php
    $repositoryStiLink = $siteSettings['repository_sti_link'] ?? '#';

    // ── Sumber tunggal struktur menu ──────────────────────────────
    // Satu array, dipakai untuk desktop & mobile. Menghindari markup
    // berulang yang rawan salah-tempel.
    $menus = [
        ['label' => 'Beranda', 'url' => route('home'), 'match' => 'home', 'children' => []],

        ['label' => 'Profil', 'match' => ['profil.*', 'practitioners.*', 'praktisi-industri.*'], 'children' => [
            ['label' => 'Testimoni Alumni',   'url' => route('practitioners.index')],
            ['label' => 'Praktisi Industri',  'url' => route('praktisi-industri.index')],
        ]],

        ['label' => 'Akademik', 'match' => 'akademik.*', 'children' => [
            ['label' => 'Kurikulum',            'url' => route('akademik.show', 'kurikulum')],
            ['label' => 'E-Library',            'url' => route('akademik.show', 'e-library')],
            ['label' => 'E-learning',           'url' => route('akademik.show', 'e-learning')],
            ['label' => 'Jadwal Kuliah',        'url' => route('akademik.show', 'jadwal-kuliah')],
            ['label' => 'Panduan Magang',       'url' => route('akademik.show', 'panduan-magang')],
            ['label' => 'Format Laporan Magang','url' => route('akademik.show', 'format-laporan-magang')],
            ['label' => 'Repository STI',       'url' => $repositoryStiLink, 'external' => true],
        ]],

        ['label' => 'Fasilitas', 'match' => ['facilities.*', 'lsp.*'], 'children' => [
            ['label' => 'Laboratorium',    'url' => route('facilities.index', ['kategori' => 'laboratorium'])],
            ['label' => 'Lembaga Sertifikasi Profesi', 'url' => route('lsp.show')],
        ]],

        ['label' => 'Kemahasiswaan', 'match' => 'kemahasiswaan.*', 'children' => [
            ['label' => 'Lowongan Pekerjaan',      'url' => route('kemahasiswaan.show', 'lowongan-pekerjaan')],
            ['label' => 'Tracer Studi',            'url' => route('kemahasiswaan.show', 'tracer-studi')],
            ['label' => 'Penalaran, Minat & Bakat','url' => route('kemahasiswaan.show', 'penalaran-minat-bakat')],
            ['label' => 'Informasi Beasiswa',      'url' => route('kemahasiswaan.show', 'informasi-beasiswa')],
        ]],

        ['label' => 'Berita & Kegiatan', 'match' => 'berita-kegiatan.*', 'children' => [
            ['label' => 'Kegiatan / Event', 'url' => route('berita-kegiatan.index', ['kategori' => 'kegiatan'])],
            ['label' => 'Prestasi',         'url' => route('berita-kegiatan.index', ['kategori' => 'prestasi'])],
            ['label' => 'Kerja Sama',       'url' => route('berita-kegiatan.index', ['kategori' => 'kerjasama'])],
        ]],

        ['label' => 'Program Kelas', 'match' => 'class-programs.*', 'children' => [
            ['label' => 'Kelas Reguler',            'url' => route('class-programs.show', 'reguler')],
            ['label' => 'Kelas Karyawan',           'url' => route('class-programs.show', 'karyawan')],
            ['label' => 'Kelas Transfer / Alih Jenjang', 'url' => route('class-programs.show', 'transfer')],
        ]],

        ['label' => 'Pengumuman', 'match' => 'pengumuman.*', 'children' => [
            ['label' => 'Kalender Akademik',     'url' => route('pengumuman.show', 'kalender-akademik')],
            ['label' => 'Wisuda',                'url' => route('pengumuman.show', 'wisuda')],
            ['label' => 'Jadwal Sidang Skripsi', 'url' => route('pengumuman.show', 'jadwal-sidang-skripsi')],
            ['label' => 'Semester Antara',       'url' => route('pengumuman.show', 'semester-antara')],
            ['label' => 'Jadwal UTS dan UAS',    'url' => route('pengumuman.show', 'jadwal-uts-uas')],
            ['label' => 'Lain-lain',             'url' => route('pengumuman.show', 'lain-lain')],
        ]],
    ];

    // ── Struktur khusus bottom tab bar mobile ──────────────────────
    // Info & Menu menggabungkan beberapa grup dari $menus di atas
    // supaya cukup 5 tab (mengikuti pola referensi PVTO).
    $mobileTabs = [
        ['key' => 'beranda', 'label' => 'Beranda', 'icon' => 'home', 'url' => route('home'), 'match' => 'home'],

        ['key' => 'profil', 'label' => 'Profil', 'icon' => 'user', 'match' => ['profil.*', 'practitioners.*', 'praktisi-industri.*'], 'sections' => [
            ['title' => null, 'items' => [
                ['label' => 'Testimoni Alumni',  'url' => route('practitioners.index')],
                ['label' => 'Praktisi Industri', 'url' => route('praktisi-industri.index')],
            ]],
        ]],

        ['key' => 'akademik', 'label' => 'Akademik', 'icon' => 'book', 'match' => 'akademik.*', 'sections' => [
            ['title' => null, 'items' => [
                ['label' => 'Kurikulum',             'url' => route('akademik.show', 'kurikulum')],
                ['label' => 'E-Library',             'url' => route('akademik.show', 'e-library')],
                ['label' => 'E-learning',            'url' => route('akademik.show', 'e-learning')],
                ['label' => 'Jadwal Kuliah',         'url' => route('akademik.show', 'jadwal-kuliah')],
                ['label' => 'Panduan Magang',        'url' => route('akademik.show', 'panduan-magang')],
                ['label' => 'Format Laporan Magang', 'url' => route('akademik.show', 'format-laporan-magang')],
                ['label' => 'Repository STI', 'url' => $repositoryStiLink, 'external' => true],
            ]],
        ]],

        ['key' => 'info', 'label' => 'Info', 'icon' => 'bell', 'match' => ['berita-kegiatan.*', 'pengumuman.*'], 'sections' => [
            ['title' => 'Berita & Kegiatan', 'items' => [
                ['label' => 'Kegiatan / Event', 'url' => route('berita-kegiatan.index', ['kategori' => 'kegiatan'])],
                ['label' => 'Prestasi',         'url' => route('berita-kegiatan.index', ['kategori' => 'prestasi'])],
                ['label' => 'Kerja Sama',       'url' => route('berita-kegiatan.index', ['kategori' => 'kerjasama'])],
            ]],
            ['title' => 'Pengumuman', 'items' => [
                ['label' => 'Kalender Akademik',     'url' => route('pengumuman.show', 'kalender-akademik')],
                ['label' => 'Wisuda',                'url' => route('pengumuman.show', 'wisuda')],
                ['label' => 'Jadwal Sidang Skripsi', 'url' => route('pengumuman.show', 'jadwal-sidang-skripsi')],
                ['label' => 'Semester Antara',       'url' => route('pengumuman.show', 'semester-antara')],
                ['label' => 'Jadwal UTS dan UAS',    'url' => route('pengumuman.show', 'jadwal-uts-uas')],
                ['label' => 'Lain-lain',             'url' => route('pengumuman.show', 'lain-lain')],
            ]],
        ]],

        ['key' => 'menu', 'label' => 'Menu', 'icon' => 'grid', 'match' => ['facilities.*', 'lsp.*', 'kemahasiswaan.*', 'class-programs.*'], 'sections' => [
            ['title' => 'Fasilitas', 'items' => [
                ['label' => 'Laboratorium', 'url' => route('facilities.index', ['kategori' => 'laboratorium'])],
                ['label' => 'Lembaga Sertifikasi Profesi', 'url' => route('lsp.show')],
            ]],
            ['title' => 'Kemahasiswaan', 'items' => [
                ['label' => 'Lowongan Pekerjaan',       'url' => route('kemahasiswaan.show', 'lowongan-pekerjaan')],
                ['label' => 'Tracer Studi',             'url' => route('kemahasiswaan.show', 'tracer-studi')],
                ['label' => 'Penalaran, Minat & Bakat', 'url' => route('kemahasiswaan.show', 'penalaran-minat-bakat')],
                ['label' => 'Informasi Beasiswa',       'url' => route('kemahasiswaan.show', 'informasi-beasiswa')],
            ]],
            ['title' => 'Program Kelas', 'items' => [
                ['label' => 'Kelas Reguler',                 'url' => route('class-programs.show', 'reguler')],
                ['label' => 'Kelas Karyawan',                'url' => route('class-programs.show', 'karyawan')],
                ['label' => 'Kelas Transfer / Alih Jenjang', 'url' => route('class-programs.show', 'transfer')],
            ]],
        ]],
    ];

    $mobileIcons = [
        'home'  => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
        'user'  => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
        'book'  => 'M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25',
        'bell'  => 'M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0',
        'grid'  => 'M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z',
    ];

    // Deteksi menu aktif berdasarkan nama route saat ini.
    $isActive = function ($match) {
        if (!$match) return false;
        return request()->routeIs($match);
    };

    $namaProdi = $siteSettings['nama_prodi'] ?? 'S1 Sistem & Teknologi Informasi';
    $namaKampus = $siteSettings['nama_kampus'] ?? 'Universitas IVET Semarang';
    $webUniv = $siteSettings['web_universitas'] ?? 'https://unisvet.ac.id/';
    $portalPmb = $siteSettings['portal_pmb'] ?? 'https://pmb.unisvet.ac.id/';
@endphp

<header class="w-full sticky top-0 z-50 shadow-lg" x-data="{ openMenu: null, closeTimer: null,
        openDropdown(label) {
            clearTimeout(this.closeTimer);
            this.closeTimer = null;
            this.openMenu = label;
        },
        scheduleClose() {
            clearTimeout(this.closeTimer);
            this.closeTimer = setTimeout(() => { this.openMenu = null; }, 250);
        },
        cancelClose() {
            clearTimeout(this.closeTimer);
            this.closeTimer = null;
        } }">

    {{-- Bar utama --}}
  <div class="bg-gradient-to-b from-[#4a60a0] to-[#263e83]" @click.outside="openMenu = null; cancelClose()">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-[68px]">

   {{-- Logo --}}
<a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0 group">
    @if (!empty($siteSettings['logo']))
        <div class="h-14 w-14 flex items-center justify-center shrink-0 transition-transform duration-200 group-hover:scale-105">
            <img loading="lazy" src="{{ asset('storage/' . $siteSettings['logo']) }}" alt="Logo {{ $namaProdi }}" class="h-full w-full object-contain">
        </div>
    @else
        <div class="h-14 w-14 rounded-lg bg-white shadow-md ring-1 ring-white/40 flex items-center justify-center font-black text-navy text-base shrink-0 transition-transform duration-200 group-hover:scale-105">
            STI
        </div>
    @endif
    <div class="hidden sm:block leading-tight">
        <div class="text-white font-bold text-sm tracking-wide">{{ $namaProdi }}</div>
        <div class="text-gold-light text-[10px] font-semibold uppercase tracking-wider">
            {{ $namaKampus }}
        </div>
    </div>
</a>

                {{-- Nav desktop --}}
                <nav class="hidden lg:flex items-center gap-0.5">
                    @foreach ($menus as $menu)
                        @php $active = $isActive($menu['match'] ?? null); @endphp
                        @if (empty($menu['children']))
                            <a href="{{ $menu['url'] }}"
                               class="px-2.5 py-2 text-[13px] font-bold rounded-md transition-colors whitespace-nowrap
                                      {{ $active ? 'text-gold-light' : 'text-white hover:text-gold-light' }}">
                                {{ $menu['label'] }}
                            </a>
                        @else
<div class="relative"
                                 @mouseenter="if (window.matchMedia('(hover: hover)').matches) openDropdown('{{ $menu['label'] }}')"
                                 @mouseleave="if (window.matchMedia('(hover: hover)').matches) scheduleClose()">
                                <button @click="openMenu = openMenu === '{{ $menu['label'] }}' ? null : '{{ $menu['label'] }}'"
                                        class="flex items-center gap-1 px-2.5 py-2 text-[13px] font-bold rounded-md transition-colors whitespace-nowrap
                                               {{ $active ? 'text-gold-light' : 'text-white hover:text-gold-light' }}">
                                    {{ $menu['label'] }}
                                    <svg class="h-3.5 w-3.5 transition-transform shrink-0" :class="openMenu === '{{ $menu['label'] }}' ? 'rotate-180 text-gold-light' : 'text-white/70'"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <div x-show="openMenu === '{{ $menu['label'] }}'" x-transition style="display:none;"
                                     @mouseenter="cancelClose()"
                                     @mouseleave="scheduleClose()"
                                     class="absolute top-full left-0 w-64 bg-white rounded-xl shadow-2xl border border-slate-200 py-2 z-50 text-slate-800">
                                    @foreach ($menu['children'] as $child)
                                        <a href="{{ $child['url'] }}"
                                           @if (!empty($child['external'])) target="_blank" rel="noopener" @endif
                                           class="block px-4 py-2.5 text-[12.5px] transition-colors border-b border-slate-100 last:border-0
                                                  {{ !empty($child['lead']) ? 'font-bold text-navy' : 'font-semibold text-slate-700' }}
                                                  hover:bg-navy/5 hover:text-navy">
                                            {{ $child['label'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </nav>
            </div>
        </div>
    </div>
</header>

{{-- ══════════ Bottom Tab Bar (mobile) ══════════ --}}
<div class="lg:hidden fixed bottom-0 inset-x-0 z-50" x-data="{ activeSheet: null }">

    {{-- Overlay --}}
    <div x-show="activeSheet" x-transition.opacity style="display:none;"
         class="fixed inset-0 bg-navy-950/50 backdrop-blur-sm" @click="activeSheet = null"></div>

    {{-- Bottom sheets --}}
    @foreach ($mobileTabs as $tab)
        @if (!empty($tab['sections']))
            <div x-show="activeSheet === '{{ $tab['key'] }}'" style="display:none;"
                 x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-y-full" x-transition:enter-end="translate-y-0"
                 x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-y-0" x-transition:leave-end="translate-y-full"
                 class="fixed bottom-0 inset-x-0 bg-white rounded-t-3xl shadow-2xl max-h-[75vh] overflow-y-auto">
                <div class="sticky top-0 bg-white pt-3 pb-3 px-5 border-b border-gray-100">
                    <div class="w-10 h-1.5 bg-gray-300 rounded-full mx-auto mb-3"></div>
                    <div class="flex items-center gap-2">
                        <svg class="h-5 w-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $mobileIcons[$tab['icon']] }}"/></svg>
                        <h3 class="font-bold text-navy-950 text-base">{{ $tab['label'] }}</h3>
                    </div>
                </div>
                <div class="px-5 py-4" style="padding-bottom: calc(1.5rem + env(safe-area-inset-bottom) + 72px);">
                    @if ($tab['key'] === 'menu')
                        <a href="{{ $portalPmb }}" target="_blank" rel="noopener" @click="activeSheet = null"
                           class="flex items-center justify-center gap-2 bg-gold hover:bg-gold-dark text-navy-950 font-bold py-3 rounded-xl text-sm mb-5">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.42A12 12 0 0112 21a12 12 0 01-6.16-10.42L12 14z"/>
                            </svg>
                            Informasi Pendaftaran PMB
                        </a>
                    @endif
                    @foreach ($tab['sections'] as $section)
                        <div class="mb-5 last:mb-0">
                            @if ($section['title'])
                                <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-2 px-1">{{ $section['title'] }}</p>
                            @endif
                            <div class="space-y-1.5">
                                @foreach ($section['items'] as $item)
                                    <a href="{{ $item['url'] }}" @click="activeSheet = null"
                                       @if (!empty($item['external'])) target="_blank" rel="noopener" @endif
                                       class="block bg-gray-50 hover:bg-navy/5 border border-gray-100 rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:text-navy transition">
                                        {{ $item['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach

    {{-- Tab bar --}}
    <nav class="relative bg-white border-t border-gray-200 grid grid-cols-5 shadow-[0_-4px_16px_rgba(0,0,0,0.08)]"
         style="padding-bottom: env(safe-area-inset-bottom);">
        @foreach ($mobileTabs as $tab)
            @php $tabActive = $isActive($tab['match'] ?? null); @endphp
            @if (empty($tab['sections']))
                <a href="{{ $tab['url'] }}" class="flex flex-col items-center justify-center gap-0.5 py-2.5 {{ $tabActive ? 'text-navy' : 'text-gray-400' }}">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $mobileIcons[$tab['icon']] }}"/></svg>
                    <span class="text-[10px] font-semibold">{{ $tab['label'] }}</span>
                </a>
            @else
                <button @click="activeSheet = activeSheet === '{{ $tab['key'] }}' ? null : '{{ $tab['key'] }}'"
                        class="flex flex-col items-center justify-center gap-0.5 py-2.5 transition-colors {{ $tabActive ? 'text-navy' : 'text-gray-400' }}"
                        :class="activeSheet === '{{ $tab['key'] }}' ? 'text-navy' : ''">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $mobileIcons[$tab['icon']] }}"/></svg>
                    <span class="text-[10px] font-semibold">{{ $tab['label'] }}</span>
                </button>
            @endif
        @endforeach
    </nav>
</div>
