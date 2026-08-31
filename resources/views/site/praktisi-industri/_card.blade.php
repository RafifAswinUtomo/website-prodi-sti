<div x-data="{ open: false }">
    <div class="bg-white rounded-2xl border border-navy/10 shadow-card hover:shadow-card-hover hover:-translate-y-1 transition-all duration-300 text-center p-5 h-full flex flex-col">
        <div class="w-28 h-36 mx-auto rounded-xl overflow-hidden bg-gray-100 shadow-sm">
            @if ($item->foto)
                <img loading="lazy" src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover object-top">
            @else
                <div class="w-full h-full bg-gradient-to-br from-navy-600 to-navy-950 flex items-center justify-center text-gold/50 font-black text-2xl">
                    {{ \Illuminate\Support\Str::of($item->nama)->explode(' ')->take(2)->map(fn($w) => \Illuminate\Support\Str::substr($w, 0, 1))->implode('') }}
                </div>
            @endif
        </div>

        <div class="mt-3 space-y-1 flex-1">
            <h3 class="font-bold text-navy-950 text-sm leading-snug">{{ $item->nama }}</h3>
            @if ($item->jabatan)
                <p class="text-gold-dark text-[11px] font-bold">{{ $item->jabatan }}</p>
            @endif
            @if ($item->instansi)
                <p class="text-[11px] text-gray-400">{{ $item->instansi }}</p>
            @endif

            @if ($item->deskripsi)
                <p class="text-xs text-gray-500 leading-relaxed line-clamp-3 pt-2">
                    {{ \Illuminate\Support\Str::limit($item->deskripsi, 110) }}
                </p>
            @endif
        </div>

        @if ($item->deskripsi)
            <div class="pt-3 mt-3 border-t border-gray-100 flex justify-center">
                <button @click="open = true" class="text-navy hover:text-gold-dark text-xs font-bold inline-flex items-center gap-1 group">
                    Selengkapnya
                    <svg class="w-3.5 h-3.5 group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        @endif
    </div>

    {{-- Modal detail --}}
    <div x-show="open" style="display:none;" x-transition.opacity
         class="fixed inset-0 z-50 flex items-center justify-center p-4" @click.self="open = false" @keydown.escape.window="open = false">
        <div class="absolute inset-0 bg-navy-950/60 backdrop-blur-sm" @click="open = false"></div>
        <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
             class="relative bg-white rounded-2xl max-w-2xl w-full max-h-[85vh] overflow-y-auto shadow-2xl">
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100 sticky top-0 bg-white z-10">
                <div>
                    <h3 class="font-bold text-navy-950">{{ $item->nama }}</h3>
                    @if ($item->instansi)<p class="text-xs text-gray-400">{{ $item->instansi }}</p>@endif
                </div>
                <button @click="open = false" class="text-gray-400 hover:text-navy transition" aria-label="Tutup">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                </button>
            </div>
            <div class="p-6 sm:p-8 text-center">
                <div class="w-40 h-48 mx-auto rounded-xl overflow-hidden bg-gray-100 shadow mb-5">
                    @if ($item->foto)
                        <img loading="lazy" src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover object-top">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-navy-600 to-navy-950"></div>
                    @endif
                </div>
                @if ($item->jabatan)<p class="text-gold-dark font-bold mb-4">{{ $item->jabatan }}</p>@endif
                @if ($item->deskripsi)
                    <p class="text-sm text-gray-600 text-left leading-relaxed whitespace-pre-line">
                        {{ $item->deskripsi }}
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
