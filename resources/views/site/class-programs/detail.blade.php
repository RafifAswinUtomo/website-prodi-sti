<x-layouts.public :title="$judul">
    <x-ui.page-header :title="$judul" parent="Program Kelas" :parentUrl="route('class-programs.index')" />

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        @if ($kelas && ($kelas->cover || $kelas->deskripsi))
            @include('site.akademik._media-panel', [
                'cover' => $kelas->cover,
                'deskripsi' => $kelas->deskripsi,
                'actionUrl' => $kelas->link ?: null,
                'actionLabel' => 'Informasi Pendaftaran',
                'download' => false,
            ])
        @else
            <p class="text-gray-400 text-center py-16">Konten belum diisi. Tambahkan lewat halaman admin.</p>
        @endif
    </section>
</x-layouts.public>
