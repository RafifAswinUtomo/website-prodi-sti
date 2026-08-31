<x-layouts.public title="Lembaga Sertifikasi Profesi">
    <x-ui.page-header title="Lembaga Sertifikasi Profesi (LSP)" parent="Fasilitas" :parentUrl="route('facilities.index')"
                      subtitle="Sertifikasi kompetensi resmi yang mengakui keahlian mahasiswa sesuai standar nasional dan kebutuhan industri." />

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        @if ($lsp)
            @include('site.akademik._media-panel', [
                'cover' => $lsp->cover,
                'deskripsi' => $lsp->deskripsi,
                'actionUrl' => $lsp->link_url,
                'actionLabel' => $lsp->link_label ?? 'Buka Website',
                'download' => false,
            ])
        @else
            <p class="text-gray-400 text-center py-16">Konten belum diisi.</p>
        @endif
    </section>
</x-layouts.public>
