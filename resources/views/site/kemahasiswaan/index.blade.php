<x-layouts.public title="Kemahasiswaan">
    <x-ui.page-header title="Kemahasiswaan"
                      subtitle="Informasi karier, tracer studi alumni, pengembangan minat & bakat, serta peluang beasiswa untuk mahasiswa." />

    @php
        $icons = [
            'lowongan-pekerjaan' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
            'tracer-studi' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
            'penalaran-minat-bakat' => 'M13 10V3L4 14h7v7l9-11h-7z',
            'informasi-beasiswa' => 'M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.42a12 12 0 01-.16 6.42M12 14L5.84 10.58A12 12 0 006 17m6-3v6',
        ];
    @endphp

    <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            @foreach ($submenu as $slug => $label)
                <a href="{{ route('kemahasiswaan.show', $slug) }}"
                   class="group bg-white border border-gray-200 rounded-2xl p-5 shadow-card hover:shadow-card-hover hover:-translate-y-1 hover:border-navy/20 transition-all duration-300 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-navy flex items-center justify-center text-gold shrink-0 shadow-sm group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icons[$slug] ?? $icons['informasi-beasiswa'] }}"/></svg>
                    </div>
                    <span class="font-bold text-navy-950 text-sm leading-snug flex-1">{{ $label }}</span>
                    <svg class="w-4 h-4 text-gray-300 group-hover:text-gold-dark group-hover:translate-x-0.5 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
            @endforeach
        </div>
    </section>
</x-layouts.public>
