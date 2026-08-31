<x-layouts.public title="Visi, Misi & Tujuan">
    <x-ui.page-header title="Visi, Misi & Tujuan" parent="Profil"
                      subtitle="Arah, komitmen, dan sasaran Program Studi dalam mengembangkan keilmuan dan mencetak lulusan unggul." />

    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        @if ($visiMisi)
            @include('site.profil._visi-misi', [
                'visi' => $visiMisi->visi,
                'misi' => $visiMisi->misi,
                'tujuan' => $visiMisi->tujuan,
            ])
        @else
            <div class="text-center py-16 text-gray-400">
                Konten belum diisi. Tambahkan lewat halaman admin (menu Visi, Misi &amp; Tujuan).
            </div>
        @endif
    </section>
</x-layouts.public>
