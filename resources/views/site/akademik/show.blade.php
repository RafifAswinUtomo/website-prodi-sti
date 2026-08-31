<x-layouts.public :title="$judul">
    <x-ui.page-header :title="$judul" parent="Akademik" :parentUrl="route('akademik.index')" />

    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        @if ($page && $page->file)
            @include('site.akademik._dokumen-viewer', [
                'cover' => $page->cover,
                'badge' => $page->badge,
                'teks' => $page->isi,
                'fileUrl' => $page->file,
                'judul' => $judul,
            ])
        @elseif ($page && $page->isi)
            <div class="max-w-4xl mx-auto bg-white rounded-2xl border border-gray-200 shadow-card p-8 md:p-10">
                <div class="prose max-w-none text-gray-700 leading-relaxed">{!! nl2br(e($page->isi)) !!}</div>
            </div>
        @else
            <p class="text-gray-400 text-center py-16">
                Konten belum diisi. Tambahkan lewat halaman admin
                (Kelola Halaman, slug: <code class="bg-gray-100 px-1 rounded">{{ request()->route('slug') }}</code>).
            </p>
        @endif
    </section>
</x-layouts.public>
