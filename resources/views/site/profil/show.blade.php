<x-layouts.public :title="$page->judul">
    <x-ui.page-header :title="$page->judul" parent="Profil" />

    @if ($page->slug === 'visi-misi')
        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            @include('site.profil._visi-misi', [
                'visi' => $page->visi,
                'misi' => $page->misi,
                'tujuan' => $page->tujuan,
            ])
        </section>
    @else
        <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <div class="bg-white rounded-2xl border border-gray-200 shadow-card p-8 md:p-10">
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($page->isi)) !!}
                </div>
            </div>
        </section>
    @endif
</x-layouts.public>
