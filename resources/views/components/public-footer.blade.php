@php
    $namaProdi  = $siteSettings['nama_prodi'] ?? 'S1 Sistem & Teknologi Informasi';
    $namaKampus = $siteSettings['nama_kampus'] ?? 'Universitas IVET Semarang';
    $akreditasi = $siteSettings['akreditasi'] ?? null;
    $deskripsi  = $siteSettings['deskripsi_footer']
        ?? 'Program Studi S1 Sistem dan Teknologi Informasi. Mencetak lulusan unggul di bidang rekayasa perangkat lunak, keamanan siber, sains data, dan technopreneurship.';
@endphp

<footer class="bg-gradient-to-b from-[#263e83] to-[#0f2452] text-white mt-20 border-t-4 border-navy-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-14 pb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-10 border-b border-white/10">

            {{-- Brand --}}
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    @if (!empty($siteSettings['logo']))
                        <img loading="lazy" src="{{ asset('storage/' . $siteSettings['logo']) }}" alt="Logo" class="h-11 w-auto">
                    @else
                        <div class="w-11 h-11 rounded-lg bg-navy-600 border border-gold flex items-center justify-center font-black text-gold text-xl shadow">
                            STI
                        </div>
                    @endif
                    <div class="leading-tight">
                        <h3 class="font-bold text-sm tracking-wide">S1 STI</h3>
                        <p class="text-[11px] text-gold-light font-semibold uppercase tracking-wider">{{ \Illuminate\Support\Str::limit($namaKampus, 26) }}</p>
                    </div>
                </div>
                <p class="text-[13px] text-slate-300 leading-relaxed">{{ $deskripsi }}</p>
                @if ($akreditasi)
                    <div class="inline-flex items-center gap-1.5 bg-navy-600/70 border border-navy-600 px-3 py-1 rounded text-xs font-semibold text-gold-light">
                        <svg class="w-4 h-4 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Akreditasi BAN-PT: {{ $akreditasi }}
                    </div>
                @endif
            </div>

            {{-- Navigasi cepat --}}
            <div>
                <h4 class="text-sm font-bold text-gold-light uppercase tracking-wider mb-4 border-b border-white/10 pb-2 inline-block">Navigasi Cepat</h4>
                <ul class="space-y-2 text-[13px] text-slate-300">
                    <li><a href="{{ route('home') }}" class="hover:text-gold-light transition">Beranda</a></li>
                    <li><a href="{{ route('akademik.index') }}" class="hover:text-gold-light transition">Akademik & Kurikulum</a></li>
                    <li><a href="{{ route('facilities.index') }}" class="hover:text-gold-light transition">Laboratorium & Fasilitas</a></li>
                    <li><a href="{{ route('class-programs.index') }}" class="hover:text-gold-light transition">Program Kelas</a></li>
                    <li><a href="{{ route('pengumuman.index') }}" class="hover:text-gold-light transition">Pengumuman</a></li>
                </ul>
            </div>

            {{-- PMB --}}
            <div>
                <h4 class="text-sm font-bold text-gold-light uppercase tracking-wider mb-4 border-b border-white/10 pb-2 inline-block">Pendaftaran & PMB</h4>
                <ul class="space-y-2 text-[13px] text-slate-300">
                    <li>Penerimaan Mahasiswa Baru Gelombang I & II</li>
                    <li>Jalur Beasiswa Prestasi & KIP-Kuliah</li>
                    <li>Kelas Reguler, Karyawan & Transfer</li>
                    <li><a href="{{ route('kemahasiswaan.show', 'informasi-beasiswa') }}" class="hover:text-gold-light transition">Informasi Beasiswa</a></li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div>
                <h4 class="text-sm font-bold text-gold-light uppercase tracking-wider mb-4 border-b border-white/10 pb-2 inline-block">Kontak</h4>
                <ul class="space-y-3 text-[13px] text-slate-300">
                    @if (!empty($siteSettings['alamat']))
                        <li class="flex gap-2">
                            <svg class="w-4 h-4 text-gold-light shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>{{ $siteSettings['alamat'] }}</span>
                        </li>
                    @endif
                    @if (!empty($siteSettings['telepon']))
                        <li class="flex gap-2 items-center">
                            <svg class="w-4 h-4 text-gold-light shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11 11 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>{{ $siteSettings['telepon'] }}</span>
                        </li>
                    @endif
                    @if (!empty($siteSettings['email']))
                        <li class="flex gap-2 items-center">
                            <svg class="w-4 h-4 text-gold-light shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span>{{ $siteSettings['email'] }}</span>
                        </li>
                    @endif
                </ul>

                <div class="flex gap-2 mt-4">
                    @if (!empty($siteSettings['instagram']))
                        <a href="{{ $siteSettings['instagram'] }}" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-navy-600/60 border border-white/10 flex items-center justify-center hover:bg-gold hover:text-navy-950 transition" aria-label="Instagram">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.6 0 4.9.07 1.17.05 1.8.25 2.23.41.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.42.36 1.06.41 2.23.06 1.27.07 1.65.07 4.86s0 3.6-.07 4.86c-.05 1.17-.25 1.8-.41 2.23-.22.56-.48.96-.9 1.38-.42.42-.82.68-1.38.9-.42.16-1.06.36-2.23.41-1.27.06-1.65.07-4.9.07s-3.6 0-4.9-.07c-1.17-.05-1.8-.25-2.23-.41a3.7 3.7 0 01-1.38-.9 3.7 3.7 0 01-.9-1.38c-.16-.42-.36-1.06-.41-2.23C2.2 15.6 2.2 15.2 2.2 12s0-3.6.07-4.86c.05-1.17.25-1.8.41-2.23.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.42-.16 1.06-.36 2.23-.41C8.4 2.2 8.8 2.2 12 2.2zm0 3.2A6.6 6.6 0 1012 18.6 6.6 6.6 0 0012 5.4zm0 10.9a4.3 4.3 0 110-8.6 4.3 4.3 0 010 8.6zm6.85-11.1a1.54 1.54 0 11-3.08 0 1.54 1.54 0 013.08 0z"/></svg>
                        </a>
                    @endif
                    @if (!empty($siteSettings['facebook']))
                        <a href="{{ $siteSettings['facebook'] }}" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-navy-600/60 border border-white/10 flex items-center justify-center hover:bg-gold hover:text-navy-950 transition" aria-label="Facebook">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12a10 10 0 10-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.5 1.49-3.89 3.78-3.89 1.09 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.78l-.44 2.89h-2.34v6.99A10 10 0 0022 12z"/></svg>
                        </a>
                    @endif
                    @if (!empty($siteSettings['youtube']))
                        <a href="{{ $siteSettings['youtube'] }}" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-navy-600/60 border border-white/10 flex items-center justify-center hover:bg-gold hover:text-navy-950 transition" aria-label="YouTube">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.5 6.2a3 3 0 00-2.1-2.1C19.5 3.5 12 3.5 12 3.5s-7.5 0-9.4.6A3 3 0 00.5 6.2 31 31 0 000 12a31 31 0 00.5 5.8 3 3 0 002.1 2.1c1.9.6 9.4.6 9.4.6s7.5 0 9.4-.6a3 3 0 002.1-2.1A31 31 0 0024 12a31 31 0 00-.5-5.8zM9.6 15.6V8.4l6.2 3.6-6.2 3.6z"/></svg>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="pt-6 text-center text-[12px] text-slate-400">
            &copy; {{ date('Y') }} {{ $namaProdi }} — {{ $namaKampus }}. Seluruh hak cipta dilindungi.
        </div>
    </div>
</footer>
