<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login Admin — {{ $siteSettings['nama_prodi'] ?? config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col justify-center items-center px-4 py-10 relative overflow-hidden bg-gradient-to-br from-navy-950 via-navy-900 to-navy">

            {{-- Aksen dekoratif --}}
            <div class="absolute inset-0 opacity-[0.07] pointer-events-none"
                 style="background-image:radial-gradient(circle at 1px 1px, #ffffff 1px, transparent 0); background-size:22px 22px;"></div>
            <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-navy-600/30 blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -left-24 w-72 h-72 rounded-full bg-gold/10 blur-3xl pointer-events-none"></div>

            {{-- Logo & identitas --}}
            <a href="{{ route('home') }}" class="relative z-10 flex flex-col items-center gap-3 mb-6 group">
                @if (!empty($siteSettings['logo']))
                  <div class="h-16 w-16 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
    <img loading="lazy" src="{{ asset('storage/' . $siteSettings['logo']) }}" alt="Logo" class="h-full w-full object-contain">
</div>
                @else
                    <div class="h-16 w-16 rounded-full bg-navy-600 ring-2 ring-gold/50 flex items-center justify-center font-black text-gold text-xl shadow-lg transition-transform duration-300 group-hover:scale-105">
                        STI
                    </div>
                @endif
                <div class="text-center leading-tight">
                    <div class="text-white font-extrabold text-sm tracking-wide">{{ $siteSettings['nama_prodi'] ?? 'S1 Sistem & Teknologi Informasi' }}</div>
                    <div class="text-gold-light text-[11px] font-bold uppercase tracking-wider mt-0.5">{{ $siteSettings['nama_kampus'] ?? 'Universitas IVET Semarang' }}</div>
                </div>
            </a>

            {{-- Kartu form --}}
            <div class="relative z-10 w-full sm:max-w-md bg-white rounded-3xl shadow-2xl border border-white/10 px-7 py-8 sm:px-9 sm:py-9">
                {{ $slot }}
            </div>

            <a href="{{ route('home') }}" class="relative z-10 mt-6 text-white/50 hover:text-gold-light text-xs font-semibold transition-colors flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Beranda
            </a>
        </div>
    </body>
</html>
