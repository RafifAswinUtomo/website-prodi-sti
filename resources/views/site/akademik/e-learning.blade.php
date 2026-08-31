<x-layouts.public :title="$judul">
    <x-ui.page-header :title="$judul" parent="Akademik" :parentUrl="route('akademik.index')" />

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        @if ($eLearning)
            @include('site.akademik._media-panel', [
                'cover' => $eLearning->cover,
                'deskripsi' => $eLearning->deskripsi,
                'actionUrl' => $eLearning->link_url,
                'actionLabel' => $eLearning->link_label ?? 'Akses Sekarang',
                'download' => false,
            ])
        @else
            <p class="text-gray-400 text-center py-16">Konten belum diisi. Tambahkan lewat halaman admin (menu E-learning).</p>
        @endif
    </section>
</x-layouts.public>
