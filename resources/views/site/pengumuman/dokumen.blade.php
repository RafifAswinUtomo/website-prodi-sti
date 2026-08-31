<x-layouts.public :title="$judul">
    <x-ui.page-header :title="$judul" parent="Pengumuman" :parentUrl="route('pengumuman.index')" />

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        @if ($dokumen && ($dokumen->cover || $dokumen->file))
            @include('site.akademik._media-panel', [
                'cover' => $dokumen->cover,
                'deskripsi' => $dokumen->deskripsi,
                'actionUrl' => $dokumen->file ? asset('storage/' . $dokumen->file) : null,
                'actionLabel' => 'Unduh ' . $judul,
                'download' => true,
            ])
        @else
            <p class="text-gray-400 text-center py-16">Konten belum diisi. Tambahkan lewat halaman admin (menu {{ $judul }}).</p>
        @endif
    </section>
</x-layouts.public>
