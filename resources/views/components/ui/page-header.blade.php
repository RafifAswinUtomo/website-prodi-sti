@props([
    'title'     => '',
    'subtitle'  => null,
    'parent'    => null,     // label induk breadcrumb (mis. "Profil")
    'parentUrl' => null,     // url induk (opsional)
])

<section class="relative bg-gradient-to-br from-[#263e83] via-[#2f96d0] to-[#3cbed8] overflow-hidden">
    {{-- Aksen dekoratif halus --}}
    <div class="absolute inset-0 opacity-[0.07]"
         style="background-image:radial-gradient(circle at 1px 1px, #ffffff 1px, transparent 0); background-size:22px 22px;"></div>
    <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-white/10 blur-3xl"></div>
    <div class="absolute -bottom-24 -left-24 w-72 h-72 rounded-full bg-gold/20 blur-3xl"></div>

    {{-- Motif jaringan/sirkuit — mencerminkan identitas Sistem & Teknologi Informasi --}}
    <svg class="absolute right-0 top-0 h-full w-[46%] min-w-[320px] opacity-[0.16] pointer-events-none" viewBox="0 0 600 400" preserveAspectRatio="xMaxYMid slice" fill="none">
        <g stroke="#ffffff" stroke-width="1.4">
            <path d="M120 60 L230 60 L230 140 L340 140" />
            <path d="M230 140 L230 230 L110 230 L110 320" />
            <path d="M340 140 L340 60 L460 60 L460 150 L560 150" />
            <path d="M340 140 L440 140 L440 240 L340 240 L340 320" />
            <path d="M440 240 L540 240 L540 330" />
            <path d="M110 230 L20 230" />
            <path d="M340 320 L230 320 L230 380" />
        </g>
        <g fill="#ffffff">
            <circle cx="120" cy="60" r="5" />
            <circle cx="230" cy="60" r="3.5" />
            <circle cx="230" cy="140" r="5.5" />
            <circle cx="340" cy="140" r="7" />
            <circle cx="230" cy="230" r="3.5" />
            <circle cx="110" cy="230" r="5.5" />
            <circle cx="110" cy="320" r="4" />
            <circle cx="20" cy="230" r="3.5" />
            <circle cx="460" cy="60" r="4" />
            <circle cx="460" cy="150" r="5.5" />
            <circle cx="560" cy="150" r="4" />
            <circle cx="440" cy="140" r="3.5" />
            <circle cx="440" cy="240" r="5.5" />
            <circle cx="340" cy="240" r="3.5" />
            <circle cx="340" cy="320" r="5.5" />
            <circle cx="230" cy="320" r="3.5" />
            <circle cx="230" cy="380" r="4" />
            <circle cx="540" cy="240" r="3.5" />
            <circle cx="540" cy="330" r="4.5" />
        </g>
        <g fill="#f5c451">
            <circle cx="340" cy="140" r="3" />
            <circle cx="440" cy="240" r="3" />
        </g>
    </svg>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-1.5 text-xs text-white/60 mb-4">
            <a href="{{ route('home') }}" class="hover:text-gold-light transition">Beranda</a>
            @if ($parent)
                <span class="text-white/30">/</span>
                @if ($parentUrl)
                    <a href="{{ $parentUrl }}" class="hover:text-gold-light transition">{{ $parent }}</a>
                @else
                    <span>{{ $parent }}</span>
                @endif
            @endif
            <span class="text-white/30">/</span>
            <span class="text-gold-light font-semibold">{{ $title }}</span>
        </nav>

        <h1 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight">{{ $title }}</h1>
        <div class="w-16 h-1 bg-gold rounded-full mt-4"></div>

        @if ($subtitle)
            <p class="mt-4 text-white/75 max-w-2xl leading-relaxed">{{ $subtitle }}</p>
        @endif
    </div>
</section>
