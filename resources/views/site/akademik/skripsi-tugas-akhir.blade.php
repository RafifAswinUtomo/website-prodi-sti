<x-layouts.public :title="$judul">
    <x-ui.page-header :title="$judul" parent="Akademik" :parentUrl="route('akademik.index')"
                      subtitle="Panduan, template, dan dokumen pendukung penyusunan skripsi / tugas akhir." />

    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse ($items as $index => $item)
                <div class="bg-white border border-gray-200 rounded-2xl p-6 flex flex-col shadow-card hover:shadow-card-hover hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="h-9 w-9 rounded-full bg-navy text-gold font-bold flex items-center justify-center text-sm shrink-0">
                            {{ $index + 1 }}
                        </span>
                        <h3 class="font-bold text-navy-950 leading-snug">{{ $item->judul }}</h3>
                    </div>
                    @if ($item->deskripsi)
                        <p class="text-sm text-gray-600 leading-relaxed flex-1">{{ $item->deskripsi }}</p>
                    @endif
                    @if ($item->file)
                        <a href="{{ asset('storage/' . $item->file) }}" download
                           class="inline-flex items-center justify-center gap-2 bg-navy hover:bg-navy-700 text-white font-bold px-4 py-2.5 rounded-lg mt-4 transition hover:-translate-y-0.5 text-sm">
                            <svg class="h-4 w-4 text-gold-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            Unduh Dokumen
                        </a>
                    @endif
                </div>
            @empty
                <p class="text-gray-400 col-span-full text-center py-8">Belum ada data.</p>
            @endforelse
        </div>
    </section>
</x-layouts.public>
