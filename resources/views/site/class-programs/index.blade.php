<x-layouts.public title="Program Kelas">
    <x-ui.page-header title="Program Kelas"
                      subtitle="Pilihan kelas yang fleksibel — untuk lulusan SMA/SMK, profesional yang bekerja, maupun alih jenjang dari D3." />

    @php
        $icons = [
            'reguler'  => 'M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.42a12 12 0 01-.16 6.42M12 14L5.84 10.58A12 12 0 006 17m6-3v6',
            'karyawan' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
            'transfer' => 'M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4',
        ];
        $desc = [
            'reguler' => 'Perkuliahan pagi untuk lulusan SMA/SMK sederajat.',
            'karyawan' => 'Kelas akhir pekan / malam untuk yang sudah bekerja.',
            'transfer' => 'Program alih jenjang dari D3 ke S1.',
        ];
    @endphp

    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            @foreach ($submenu as $jenis => $label)
                <a href="{{ route('class-programs.show', $jenis) }}"
                   class="group bg-white border border-gray-200 rounded-2xl p-6 shadow-card hover:shadow-card-hover hover:-translate-y-1 hover:border-navy/20 transition-all duration-300 flex flex-col">
                    <div class="w-14 h-14 rounded-2xl bg-navy flex items-center justify-center text-gold shadow-sm mb-4 group-hover:scale-105 transition-transform">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icons[$jenis] ?? $icons['reguler'] }}"/></svg>
                    </div>
                    <h3 class="font-bold text-navy-950 text-base leading-snug mb-1">{{ $label }}</h3>
                    <p class="text-sm text-gray-500 leading-relaxed flex-1">{{ $desc[$jenis] ?? '' }}</p>
                    <span class="inline-flex items-center gap-1 text-xs text-navy font-bold mt-4 group-hover:text-gold-dark transition">
                        Selengkapnya <svg class="w-3.5 h-3.5 group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </span>
                </a>
            @endforeach
        </div>
    </section>
</x-layouts.public>
