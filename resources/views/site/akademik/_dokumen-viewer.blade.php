{{-- Kartu dokumen dengan cover + tombol "Lihat Dokumen" (modal iframe) + unduh.
     Params: $cover, $badge, $teks, $fileUrl (path), $judul --}}
<div x-data="{ showDoc: false }" class="max-w-2xl mx-auto">
    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-card">
        <div class="relative group">
            @if (!empty($cover))
                <img loading="lazy" src="{{ asset('storage/' . $cover) }}" alt="{{ $judul }}" class="w-full h-64 object-cover">
            @else
                <div class="w-full h-64 bg-gradient-to-br from-navy-600 to-navy-950"></div>
            @endif
            <div class="absolute inset-0 bg-navy-950/30 group-hover:bg-navy-950/50 transition-colors flex items-center justify-center">
                <button @click="showDoc = true"
                        class="bg-white/95 text-navy font-bold px-5 py-2.5 rounded-full shadow-lg flex items-center gap-2 hover:bg-white hover:-translate-y-0.5 transition">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    Lihat Dokumen
                </button>
            </div>
        </div>
        <div class="p-6 text-center">
            @if (!empty($badge))
                <span class="inline-block bg-gold/15 text-gold-deep text-xs font-bold px-3 py-1 rounded-full mb-4">{{ $badge }}</span>
            @endif
            @if (!empty($teks))
                <p class="text-sm text-gray-600 leading-relaxed">{{ $teks }}</p>
            @endif
        </div>
    </div>

    {{-- Modal viewer --}}
    <div x-show="showDoc" style="display:none;" x-transition.opacity
         class="fixed inset-0 z-50 flex items-center justify-center p-4" @click.self="showDoc = false" @keydown.escape.window="showDoc = false">
        <div class="absolute inset-0 bg-navy-950/70 backdrop-blur-sm" @click="showDoc = false"></div>
        <div x-show="showDoc" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
             class="relative bg-white rounded-2xl w-full max-w-4xl h-[85vh] flex flex-col overflow-hidden shadow-2xl">
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100">
                <h3 class="font-bold text-navy-950">Dokumen {{ $judul }}</h3>
                <button @click="showDoc = false" class="text-gray-400 hover:text-navy transition" aria-label="Tutup">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                </button>
            </div>
            <div class="flex-1 bg-gray-100">
                <iframe x-bind:src="showDoc ? '{{ asset('storage/' . $fileUrl) }}' : ''" class="w-full h-full" style="border:0;"></iframe>
            </div>
            <div class="px-6 py-4 border-t border-gray-100 flex justify-end">
                <x-ui.btn :href="asset('storage/' . $fileUrl)" variant="primary" size="md" download>Unduh Dokumen</x-ui.btn>
            </div>
        </div>
    </div>
</div>
