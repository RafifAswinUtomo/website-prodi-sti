@php
    $groups = [
'Beranda' => [
    ['route' => 'admin.sliders.index', 'pattern' => 'admin.sliders.*', 'label' => 'Slider Beranda'],
    ['route' => 'admin.statistik.edit', 'pattern' => 'admin.statistik.*', 'label' => 'Statistik Ringkas'],
    ['route' => 'admin.sambutan.edit', 'pattern' => 'admin.sambutan.*', 'label' => 'Sambutan Pimpinan'],
    ['route' => 'admin.pilar-kompetensi.edit', 'pattern' => 'admin.pilar-kompetensi.*', 'label' => 'Bidang Kompetensi'],
    ['route' => 'admin.prospek-karir.edit', 'pattern' => 'admin.prospek-karir.*', 'label' => 'Prospek Karir Lulusan'],
    ['route' => 'admin.sejarah-milestones.index', 'pattern' => 'admin.sejarah-milestones.*', 'label' => 'Sejarah Pendirian'],
    ['route' => 'admin.dosen-prodi.index', 'pattern' => 'admin.dosen-prodi.*', 'label' => 'Dosen Program Studi'],
    ['route' => 'admin.berita-prodi.index', 'pattern' => 'admin.berita-prodi.*', 'label' => 'Berita & Kegiatan Prodi'],
['route' => 'admin.sosial-media.edit', 'pattern' => 'admin.sosial-media.*', 'label' => 'Kanal Media Sosial'],
    ['route' => 'admin.maps-kontak.edit', 'pattern' => 'admin.maps-kontak.*', 'label' => 'Maps & Kontak PMB'],
    ['route' => 'admin.visi-misi.edit', 'pattern' => 'admin.visi-misi.*', 'label' => 'Visi, Misi & Tujuan'],
],
        'Profil' => [
            ['route' => 'admin.practitioners.index', 'pattern' => 'admin.practitioners.*', 'label' => 'Testimoni Alumni'],
            ['route' => 'admin.praktisi-industri.index', 'pattern' => 'admin.praktisi-industri.*', 'label' => 'Praktisi Industri'],
        ],
        'Akademik' => [
            ['route' => 'admin.kurikulum.edit', 'pattern' => 'admin.kurikulum.*', 'label' => 'Kurikulum'],
            ['route' => 'admin.e-learning.edit', 'pattern' => 'admin.e-learning.*', 'label' => 'E-learning'],
            ['route' => 'admin.jadwal-kuliah.edit', 'pattern' => 'admin.jadwal-kuliah.*', 'label' => 'Jadwal Kuliah'],
            ['route' => 'admin.panduan-magang.edit', 'pattern' => 'admin.panduan-magang.*', 'label' => 'Panduan Magang'],
            ['route' => 'admin.format-laporan-magang.edit', 'pattern' => 'admin.format-laporan-magang.*', 'label' => 'Format Laporan Magang'],
            ['route' => 'admin.skripsi-tugas-akhir.index', 'pattern' => 'admin.skripsi-tugas-akhir.*', 'label' => 'Skripsi/Tugas Akhir'],
            ['route' => 'admin.ebooks.index', 'pattern' => 'admin.ebooks.*', 'label' => 'E-Library'],
        ],
        'Fasilitas' => [
            ['route' => 'admin.facilities.index', 'pattern' => 'admin.facilities.*', 'label' => 'Kelola Fasilitas (Laboratorium)'],
            ['route' => 'admin.lsp.edit', 'pattern' => 'admin.lsp.*', 'label' => 'LSP'],
        ],
        'Kemahasiswaan' => [
            ['route' => 'admin.lowongan-pekerjaan.index', 'pattern' => 'admin.lowongan-pekerjaan.*', 'label' => 'Lowongan Pekerjaan'],
            ['route' => 'admin.tracer-studi.edit', 'pattern' => 'admin.tracer-studi.*', 'label' => 'Tracer Studi'],
            ['route' => 'admin.penalaran-minat-bakat.index', 'pattern' => 'admin.penalaran-minat-bakat.*', 'label' => 'Penalaran, Minat & Bakat'],
            ['route' => 'admin.informasi-beasiswa.index', 'pattern' => 'admin.informasi-beasiswa.*', 'label' => 'Informasi Beasiswa'],
        ],
       'Program Kelas' => [
    ['route' => 'admin.kelas-reguler.edit', 'pattern' => 'admin.kelas-reguler.*', 'label' => 'Kelas Reguler'],
    ['route' => 'admin.kelas-karyawan.edit', 'pattern' => 'admin.kelas-karyawan.*', 'label' => 'Kelas Karyawan'],
    ['route' => 'admin.kelas-transfer.edit', 'pattern' => 'admin.kelas-transfer.*', 'label' => 'Kelas Transfer'],
],
       'Pengumuman' => [
    ['route' => 'admin.kalender-akademik.edit', 'pattern' => 'admin.kalender-akademik.*', 'label' => 'Kalender Akademik'],
    ['route' => 'admin.wisuda.edit', 'pattern' => 'admin.wisuda.*', 'label' => 'Wisuda'],
    ['route' => 'admin.jadwal-sidang-skripsi.edit', 'pattern' => 'admin.jadwal-sidang-skripsi.*', 'label' => 'Jadwal Sidang Skripsi'],
    ['route' => 'admin.semester-antara.edit', 'pattern' => 'admin.semester-antara.*', 'label' => 'Semester Antara'],
    ['route' => 'admin.jadwal-uts-uas.edit', 'pattern' => 'admin.jadwal-uts-uas.*', 'label' => 'Jadwal UTS dan UAS'],
    ['route' => 'admin.pengumuman-lain.index', 'pattern' => 'admin.pengumuman-lain.*', 'label' => 'Lain-lain'],
],
        'Pengaturan' => [
            ['route' => 'admin.settings.index', 'pattern' => 'admin.settings.*', 'label' => 'Pengaturan Situs'],
        ],
    ];
@endphp

<aside class="w-64 bg-navy text-white flex-shrink-0 min-h-screen flex flex-col">
    <div class="px-6 py-5 border-b border-white/10">
        <a href="{{ route('dashboard') }}" class="font-semibold text-lg">Panel Admin</a>
        <p class="text-white/50 text-xs mt-0.5">{{ auth()->user()->name }}</p>
    </div>

    <nav class="flex-1 py-4 overflow-y-auto">
        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-6 py-2.5 text-sm mb-2 {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white font-medium border-r-4 border-maroon' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
            Dashboard
        </a>

        @foreach ($groups as $groupLabel => $items)
            @php
                $groupActive = collect($items)->contains(function ($item) {
                    if (!request()->routeIs($item['pattern'])) {
                        return false;
                    }
                    return !isset($item['type']) || request()->get('type') === $item['type'];
                });
            @endphp
            <div x-data="{ open: {{ $groupActive ? 'true' : 'false' }} }" class="mb-1">
                <button @click="open = !open"
                        class="w-full flex items-center justify-between px-6 py-2 text-xs uppercase tracking-wide text-white/50 hover:text-white/80">
                    {{ $groupLabel }}
                    <svg :class="open ? 'rotate-180' : ''" class="h-3 w-3 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" x-transition>
                    @foreach ($items as $item)
                        @php
                            $isActive = request()->routeIs($item['pattern'])
                                && (!isset($item['type']) || request()->get('type') === $item['type']);
                            $href = is_array($item['route']) ? route($item['route'][0], $item['route'][1]) : route($item['route']);
                        @endphp
                        <a href="{{ $href }}"
                           class="flex items-center gap-3 pl-9 pr-6 py-2 text-sm {{ $isActive ? 'bg-white/10 text-white font-medium border-r-4 border-maroon' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </nav>

    <div class="px-6 py-4 border-t border-white/10 space-y-2">
        <a href="{{ route('home') }}" class="block text-sm text-white/60 hover:text-white">&larr; Lihat Situs</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-white/60 hover:text-white">Log Out</button>
        </form>
    </div>
</aside>
