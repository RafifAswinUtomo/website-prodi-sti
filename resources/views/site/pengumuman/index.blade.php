<x-layouts.public title="Pengumuman">
    <x-ui.page-header title="Pengumuman"
                      subtitle="Informasi resmi seputar kalender akademik, jadwal ujian, wisuda, sidang, dan pengumuman lainnya." />

    @php
        $icons = [
            'kalender-akademik' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
            'wisuda' => 'M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.42a12 12 0 01-.16 6.42M12 14L5.84 10.58A12 12 0 006 17m6-3v6',
            'jadwal-sidang-skripsi' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4',
            'semester-antara' => 'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15',
            'jadwal-uts-uas' => 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z',
            'lain-lain' => 'M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z',
        ];
    @endphp

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($submenu as $slug => $label)
                <a href="{{ route('pengumuman.show', $slug) }}"
                   class="group bg-white border border-gray-200 rounded-2xl p-5 shadow-card hover:shadow-card-hover hover:-translate-y-1 hover:border-navy/20 transition-all duration-300 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-navy flex items-center justify-center text-gold shrink-0 shadow-sm group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icons[$slug] ?? $icons['lain-lain'] }}"/></svg>
                    </div>
                    <span class="font-bold text-navy-950 text-sm leading-snug flex-1">{{ $label }}</span>
                    <svg class="w-4 h-4 text-gray-300 group-hover:text-gold-dark group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
            @endforeach
        </div>
    </section>
</x-layouts.public>
