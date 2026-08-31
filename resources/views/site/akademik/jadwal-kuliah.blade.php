<x-layouts.public :title="$judul">
    <x-ui.page-header :title="$judul" parent="Akademik" :parentUrl="route('akademik.index')" />

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        @if ($jadwalKuliah && ($jadwalKuliah->cover || $jadwalKuliah->file))
            @include('site.akademik._media-panel', [
                'cover' => $jadwalKuliah->cover,
                'deskripsi' => $jadwalKuliah->deskripsi,
                'actionUrl' => $jadwalKuliah->file ? asset('storage/' . $jadwalKuliah->file) : null,
                'actionLabel' => 'Unduh ' . $judul,
                'download' => true,
            ])
        @else
            <p class="text-gray-400 text-center py-16">Konten belum diisi. Tambahkan lewat halaman admin (menu Jadwal Kuliah).</p>
        @endif
    </section>
</x-layouts.public>
