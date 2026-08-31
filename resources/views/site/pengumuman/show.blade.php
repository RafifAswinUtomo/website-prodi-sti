<x-layouts.public :title="$post->judul ?? 'Pengumuman'">
    <x-ui.page-header :title="$post->judul ?? 'Pengumuman'" parent="Pengumuman" :parentUrl="route('pengumuman.index')" />

    <section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="bg-white rounded-2xl border border-gray-200 shadow-card overflow-hidden">
            @if (!empty($post->gambar))
                <img loading="lazy" src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full max-h-96 object-cover">
            @endif
            <div class="p-6 md:p-8">
                @if (!empty($post->tanggal))
                    <p class="text-xs text-gray-400 mb-3">{{ \Illuminate\Support\Carbon::parse($post->tanggal)->translatedFormat('d F Y') }}</p>
                @endif
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($post->isi ?? '')) !!}
                </div>
                @if (!empty($post->lampiran))
                    <a href="{{ asset('storage/' . $post->lampiran) }}" download
                       class="inline-flex items-center gap-2 mt-6 bg-navy hover:bg-navy-700 text-white text-sm font-bold px-5 py-2.5 rounded-lg transition hover:-translate-y-0.5">
                        <svg class="h-4 w-4 text-gold-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        Unduh Lampiran
                    </a>
                @endif
            </div>
        </div>
    </section>
</x-layouts.public>
