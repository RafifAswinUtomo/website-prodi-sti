<x-layouts.public :title="$judul">
    <x-ui.page-header :title="$judul" parent="Kemahasiswaan" :parentUrl="route('kemahasiswaan.index')"
                      subtitle="Pelacakan jejak alumni untuk mengukur relevansi lulusan dengan dunia kerja." />

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        @if ($tracerStudi)
            @include('site.akademik._media-panel', [
                'cover' => $tracerStudi->cover,
                'deskripsi' => $tracerStudi->deskripsi,
                'actionUrl' => $tracerStudi->link_url,
                'actionLabel' => $tracerStudi->link_label ?? 'Akses Sekarang',
                'download' => false,
            ])
        @else
            <p class="text-gray-400 text-center py-16">Konten belum diisi.</p>
        @endif
    </section>
</x-layouts.public>
