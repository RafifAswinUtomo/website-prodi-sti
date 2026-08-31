<x-layouts.public :title="$judul">
    <x-ui.page-header :title="$judul" parent="Kemahasiswaan" :parentUrl="route('kemahasiswaan.index')" />

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($items as $item)
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-card hover:shadow-card-hover hover:-translate-y-1 transition-all duration-300 flex flex-col">
                    <div class="h-90 overflow-hidden bg-gray-100 group">
                        @if ($item->foto)
                            <img loading="lazy" src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="h-full w-full bg-gradient-to-br from-navy-600 to-navy-950"></div>
                        @endif
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="font-bold text-navy-950 mb-2">{{ $item->judul }}</h3>
                        @if ($item->deskripsi)
                            <p class="text-sm text-gray-600 leading-relaxed mb-4 flex-1">{{ $item->deskripsi }}</p>
                        @endif
                        @if ($item->file)
                            <a href="{{ asset('storage/' . $item->file) }}" download
                               class="inline-flex items-center justify-center gap-2 bg-navy hover:bg-navy-700 text-white text-sm font-bold px-4 py-2.5 rounded-lg mt-auto transition hover:-translate-y-0.5">
                                <svg class="h-4 w-4 text-gold-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                Unduh Berkas
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-gray-400 col-span-full text-center py-8">Belum ada data.</p>
            @endforelse
        </div>
    </section>
</x-layouts.public>
