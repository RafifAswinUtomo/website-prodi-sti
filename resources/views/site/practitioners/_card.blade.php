<div x-data="{ open: false }">
    <div class="bg-white rounded-2xl border border-navy/10 shadow-card hover:shadow-card-hover hover:-translate-y-1 transition-all duration-300 text-center flex flex-col h-full overflow-visible">

        {{-- Cover: foto kegiatan/kerja --}}
        <div class="relative">
            <div class="h-32 sm:h-36 rounded-t-2xl overflow-hidden bg-gradient-to-br from-navy-600 to-navy-950">
                @if ($practitioner->foto_kegiatan)
                    <img loading="lazy" src="{{ asset('storage/' . $practitioner->foto_kegiatan) }}" alt="Kegiatan {{ $practitioner->nama }}"
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white/20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 7.5l-4.5-4.5m0 0L7.5 7.5m4.5-4.5v13.5"/></svg>
                    </div>
                @endif
            </div>

            {{-- Avatar: foto formal, overlap ke cover --}}
            <div class="absolute left-1/2 -bottom-9 -translate-x-1/2">
                <div class="w-[72px] h-[72px] rounded-full border-4 border-white shadow-md overflow-hidden bg-gray-100">
                    @if ($practitioner->foto)
                        <img loading="lazy" src="{{ asset('storage/' . $practitioner->foto) }}" alt="{{ $practitioner->nama }}"
                             class="w-full h-full object-cover object-top">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-navy-600 to-navy-950 flex items-center justify-center text-gold/60 font-black text-lg">
                            {{ \Illuminate\Support\Str::of($practitioner->nama)->explode(' ')->take(2)->map(fn($w) => \Illuminate\Support\Str::substr($w, 0, 1))->implode('') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Body --}}
        <div class="pt-12 px-5 pb-5 flex flex-col flex-1">
            <h3 class="font-bold text-navy-950 text-sm leading-snug">{{ $practitioner->nama }}</h3>
            @if ($practitioner->jabatan)
                <p class="text-gold-dark text-[11px] font-bold mt-1 leading-snug">{{ $practitioner->jabatan }}</p>
            @endif
            @if ($practitioner->instansi)
                <p class="text-[11px] text-gray-400 mt-0.5">{{ $practitioner->instansi }}</p>
            @endif

            @if ($practitioner->deskripsi)
                <div class="mt-3 pt-3 border-t border-gray-100 flex-1 flex flex-col">
                    <svg class="w-4 h-4 text-gold/50 mx-auto mb-1.5" fill="currentColor" viewBox="0 0 24 24"><path d="M9.983 3v7.391c0 5.704-3.731 9.57-8.983 10.609l-.995-2.151c2.432-.917 3.995-3.638 3.995-5.849h-4v-10h9.983zm14.017 0v7.391c0 5.704-3.748 9.571-9 10.609l-.996-2.151c2.433-.917 3.996-3.638 3.996-5.849h-3.983v-10h9.983z"/></svg>
                    <p class="text-xs text-gray-500 leading-relaxed italic line-clamp-3">
                        {{ \Illuminate\Support\Str::limit($practitioner->deskripsi, 110) }}
                    </p>
                </div>

                <button @click="open = true" class="text-navy hover:text-gold-dark text-xs font-bold inline-flex items-center justify-center gap-1 group mt-3 pt-3 border-t border-gray-50">
                    Baca testimoni lengkap
                    <svg class="w-3.5 h-3.5 group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>
            @endif
        </div>
    </div>

    {{-- Modal detail --}}
    <div x-show="open" style="display:none;" x-transition.opacity
         class="fixed inset-0 z-50 flex items-center justify-center p-4" @click.self="open = false" @keydown.escape.window="open = false">
        <div class="absolute inset-0 bg-navy-950/70 backdrop-blur-sm" @click="open = false"></div>
        <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
             class="relative bg-white rounded-3xl max-w-lg w-full max-h-[90vh] overflow-y-auto shadow-2xl">

            <button @click="open = false" class="absolute top-3 right-3 z-10 bg-white/90 rounded-full p-1.5 text-gray-500 hover:text-navy transition shadow" aria-label="Tutup">
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
            </button>

            <div class="relative">
                <div class="h-48 rounded-t-3xl overflow-hidden bg-gradient-to-br from-navy-600 to-navy-950">
                    @if ($practitioner->foto_kegiatan)
                        <img loading="lazy" src="{{ asset('storage/' . $practitioner->foto_kegiatan) }}" alt="Kegiatan {{ $practitioner->nama }}" class="w-full h-full object-cover">
                    @endif
                </div>
                <div class="absolute left-1/2 -bottom-12 -translate-x-1/2">
                    <div class="w-24 h-24 rounded-full border-4 border-white shadow-lg overflow-hidden bg-gray-100">
                        @if ($practitioner->foto)
                            <img loading="lazy" src="{{ asset('storage/' . $practitioner->foto) }}" alt="{{ $practitioner->nama }}" class="w-full h-full object-cover object-top">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-navy-600 to-navy-950"></div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="pt-16 px-6 sm:px-8 pb-8 text-center">
                <h3 class="font-bold text-navy-950 text-lg">{{ $practitioner->nama }}</h3>
                @if ($practitioner->jabatan)<p class="text-gold-dark font-bold text-sm mt-1">{{ $practitioner->jabatan }}</p>@endif
                @if ($practitioner->instansi)<p class="text-xs text-gray-400 mt-0.5 mb-5">{{ $practitioner->instansi }}</p>@endif

                @if ($practitioner->deskripsi)
                    <p class="text-sm text-gray-600 text-left leading-relaxed whitespace-pre-line mt-4">
                        {{ $practitioner->deskripsi }}
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
