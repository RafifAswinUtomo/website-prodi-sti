<x-layouts.public :title="$judul">
    <x-ui.page-header :title="$judul" parent="Akademik" :parentUrl="route('akademik.index')" />

    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        @if ($kurikulum && $kurikulum->file)
            @include('site.akademik._dokumen-viewer', [
                'cover' => $kurikulum->cover,
                'badge' => $kurikulum->badge,
                'teks' => $kurikulum->deskripsi,
                'fileUrl' => $kurikulum->file,
                'judul' => $judul,
            ])
        @else
            <p class="text-gray-400 text-center py-16">Konten belum diisi. Tambahkan lewat halaman admin (menu Kurikulum).</p>
        @endif
    </section>
</x-layouts.public>
