{{-- ══════════ CHATBOT WIDGET (mengambang, muncul di semua halaman publik) ══════════ --}}
@php
    $cbNamaProdi = $siteSettings['nama_prodi'] ?? 'S1 Sistem dan Teknologi Informasi';
    $cbNamaKampus = $siteSettings['nama_kampus'] ?? 'Universitas IVET Semarang';
    $cbWaNumber = null;
    if (!empty($siteSettings['telepon'])) {
        $cbWaNumber = preg_replace('/[^0-9]/', '', $siteSettings['telepon']);
        if (str_starts_with($cbWaNumber, '0')) {
            $cbWaNumber = '62' . substr($cbWaNumber, 1);
        }
    }
@endphp

<div x-data="{
        open: false,
        input: '',
        loading: false,
        messages: [
            { sender: 'bot', text: 'Halo! 👋 Saya asisten virtual {{ $cbNamaProdi }} {{ $cbNamaKampus }}.\n\nAda yang bisa saya bantu? Kamu bisa tanya soal pendaftaran, dosen, jadwal, fasilitas, beasiswa, atau kontak kami.' }
        ],
        quickQuestions: [
            'Info pendaftaran PMB',
            'Siapa saja dosennya?',
            'Fasilitas lab apa saja?',
            'Info beasiswa',
            'Kontak sekretariat'
        ],
        async send(customMsg) {
            const msg = customMsg || this.input;
            if (!msg.trim() || this.loading) return;
            this.messages.push({ sender: 'user', text: msg });
            if (!customMsg) this.input = '';
            this.loading = true;
            this.$nextTick(() => this.scrollDown());
            try {
                const res = await fetch('{{ route('chatbot.respond') }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: JSON.stringify({ message: msg })
                });
                const data = await res.json();
                this.messages.push({ sender: 'bot', text: data.reply || 'Maaf, terjadi kendala. Silakan coba lagi.' });
            } catch (e) {
                this.messages.push({ sender: 'bot', text: 'Maaf, gagal terhubung ke server. Silakan coba lagi atau hubungi Sekretariat.' });
            }
            this.loading = false;
            this.$nextTick(() => this.scrollDown());
        },
        scrollDown() {
            const el = this.$refs.scrollArea;
            if (el) el.scrollTop = el.scrollHeight;
        }
     }"
     class="fixed bottom-20 right-4 lg:bottom-5 lg:right-5 z-40">

    {{-- Tombol bulat mengambang --}}
    <button @click="open = !open" type="button"
            class="relative bg-gradient-to-br from-navy to-navy-700 hover:from-navy-700 hover:to-navy-800 text-white p-4 rounded-full shadow-2xl border-2 border-gold transition-all duration-300 hover:scale-110 flex items-center justify-center"
            aria-label="Buka Asisten Chat">
        <svg x-show="!open" class="w-6 h-6 text-gold-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 8V4H8"/><rect width="16" height="12" x="4" y="8" rx="2"/><path d="M2 14h2"/><path d="M20 14h2"/><path d="M15 13v2"/><path d="M9 13v2"/>
        </svg>
        <svg x-show="open" style="display:none;" class="w-6 h-6 text-gold-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        <span x-show="!open" class="absolute -top-1 -right-1 w-3.5 h-3.5 bg-green-400 rounded-full border-2 border-white animate-pulse"></span>
    </button>

    {{-- Jendela chat --}}
    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90 translate-y-4" x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         style="display:none;"
         class="absolute bottom-[72px] right-0 w-[92vw] max-w-[380px] h-[520px] max-h-[75vh] bg-white rounded-2xl shadow-2xl border border-navy/10 flex flex-col overflow-hidden">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-navy to-navy-700 text-white px-4 py-3.5 flex items-center justify-between shrink-0">
            <div class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl bg-gold flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-navy-950" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 8V4H8"/><rect width="16" height="12" x="4" y="8" rx="2"/><path d="M2 14h2"/><path d="M20 14h2"/><path d="M15 13v2"/><path d="M9 13v2"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-extrabold text-sm leading-tight">Asisten Virtual</h3>
                    <p class="text-[10px] text-gold-light font-semibold">{{ \Illuminate\Support\Str::limit($cbNamaProdi, 30) }}</p>
                </div>
            </div>
            <button @click="open = false" class="text-white/70 hover:text-white transition" aria-label="Tutup">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- Area pesan --}}
        <div x-ref="scrollArea" class="flex-1 overflow-y-auto p-3.5 space-y-3 bg-gray-50">
            <template x-for="(msg, idx) in messages" :key="idx">
                <div class="flex" :class="msg.sender === 'user' ? 'justify-end' : 'justify-start'">
                    <div class="max-w-[85%] rounded-2xl px-3.5 py-2.5 text-[13px] leading-relaxed whitespace-pre-line shadow-sm"
                         :class="msg.sender === 'user' ? 'bg-navy text-white rounded-tr-sm' : 'bg-white text-gray-700 border border-gray-100 rounded-tl-sm'"
                         x-text="msg.text">
                    </div>
                </div>
            </template>

            {{-- Indikator mengetik --}}
            <div x-show="loading" class="flex justify-start">
                <div class="bg-white border border-gray-100 rounded-2xl rounded-tl-sm px-4 py-3 flex items-center gap-1.5 shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-navy/40 animate-pulse"></span>
                    <span class="w-1.5 h-1.5 rounded-full bg-navy/40 animate-pulse" style="animation-delay:0.15s"></span>
                    <span class="w-1.5 h-1.5 rounded-full bg-navy/40 animate-pulse" style="animation-delay:0.3s"></span>
                </div>
            </div>
        </div>

        {{-- Chip pertanyaan cepat --}}
        <div class="px-3 py-2 border-t border-gray-100 bg-white overflow-x-auto flex gap-1.5 shrink-0 scrollbar-slim">
            <template x-for="(q, idx) in quickQuestions" :key="idx">
                <button @click="send(q)" type="button"
                        class="shrink-0 bg-navy/5 hover:bg-navy/10 text-navy text-[11px] font-semibold px-3 py-1.5 rounded-full border border-navy/10 transition whitespace-nowrap"
                        x-text="q">
                </button>
            </template>
        </div>

        {{-- Input --}}
        <form @submit.prevent="send()" class="p-3 border-t border-gray-100 bg-white flex items-center gap-2 shrink-0">
            <input type="text" x-model="input" placeholder="Ketik pertanyaan Anda..."
                   class="flex-1 text-sm px-3.5 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:border-navy/40 focus:ring-1 focus:ring-navy/20">
            <button type="submit" :disabled="!input.trim() || loading"
                    class="bg-gold hover:bg-gold-dark disabled:opacity-40 disabled:cursor-not-allowed text-navy-950 p-2.5 rounded-xl transition shrink-0" aria-label="Kirim">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
            </button>
        </form>
    </div>
</div>
