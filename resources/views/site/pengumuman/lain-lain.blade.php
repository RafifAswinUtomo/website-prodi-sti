<x-layouts.public :title="$judul">
    <x-ui.page-header :title="$judul" parent="Pengumuman" :parentUrl="route('pengumuman.index')" />

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($items as $item)
                <div class="bg-white border border-gray-200 rounded-2xl p-5 flex flex-col shadow-card hover:shadow-card-hover hover:-translate-y-1 transition-all duration-300">
                    <div class="w-10 h-10 rounded-lg bg-navy/5 flex items-center justify-center text-navy mb-3">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    </div>
                    <h3 class="font-bold text-navy-950 mb-2 leading-snug">{{ $item->judul }}</h3>
                    @if ($item->deskripsi)
                        <p class="text-sm text-gray-600 leading-relaxed flex-1 mb-4">{{ $item->deskripsi }}</p>
                    @endif
                    @if ($item->file)
                        <a href="{{ asset('storage/' . $item->file) }}" download
                           class="inline-flex items-center justify-center gap-2 bg-navy hover:bg-navy-700 text-white text-sm font-bold px-4 py-2.5 rounded-lg mt-auto transition hover:-translate-y-0.5">
                            <svg class="h-4 w-4 text-gold-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            Unduh Berkas
                        </a>
                    @else
                        <span class="inline-flex items-center justify-center bg-gray-100 text-gray-400 text-sm px-4 py-2.5 rounded-lg mt-auto">Tidak ada unduhan</span>
                    @endif
                </div>
            @empty
                <p class="text-gray-400 col-span-full text-center py-8">Belum ada pengumuman.</p>
            @endforelse
        </div>
    </section>
</x-layouts.public>
