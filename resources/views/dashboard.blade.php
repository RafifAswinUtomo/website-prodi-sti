<x-layouts.admin title="Dashboard">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Dashboard</h2>
        <p class="text-sm text-gray-500 mt-1">Ringkasan data situs</p>
    </x-slot>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        @foreach ([
            ['label' => 'Slider', 'value' => $stats['sliders'], 'route' => 'admin.sliders.index'],
            ['label' => 'Dosen Pengampu', 'value' => $stats['lecturers'], 'route' => 'admin.lecturers.index'],
            ['label' => 'Praktisi Industri', 'value' => $stats['practitioners'], 'route' => 'admin.practitioners.index'],
            ['label' => 'Fasilitas', 'value' => $stats['facilities'], 'route' => 'admin.facilities.index'],
            ['label' => 'Program Kelas', 'value' => $stats['class_programs'], 'route' => 'admin.class-programs.index'],
            ['label' => 'Pengumuman', 'value' => $stats['pengumuman'], 'route' => ['admin.posts.index', ['type' => 'pengumuman']]],
            ['label' => 'Prestasi', 'value' => $stats['prestasi'], 'route' => ['admin.posts.index', ['type' => 'prestasi']]],
            ['label' => 'Kerjasama', 'value' => $stats['kerjasama'], 'route' => ['admin.posts.index', ['type' => 'kerjasama']]],
        ] as $card)
            <a href="{{ is_array($card['route']) ? route($card['route'][0], $card['route'][1]) : route($card['route']) }}"
               class="bg-white border rounded-lg p-5 hover:border-navy hover:shadow transition">
                <p class="text-3xl font-bold text-navy">{{ $card['value'] }}</p>
                <p class="text-sm text-gray-500 mt-1">{{ $card['label'] }}</p>
            </a>
        @endforeach
    </div>

    <div class="bg-white border rounded-lg p-6">
        <h3 class="font-semibold text-gray-800 mb-2">Selamat datang, {{ auth()->user()->name }}</h3>
        <p class="text-sm text-gray-500">
            Gunakan menu di samping untuk mengelola konten situs. Semua perubahan yang disimpan
            akan langsung tampil di halaman publik.
        </p>
    </div>
</x-layouts.admin>
