<x-layouts.public title="Profil Lulusan">
    <x-ui.page-header title="Profil Lulusan" parent="Profil"
                      subtitle="Peran dan bidang karier yang disiapkan bagi lulusan Program Studi." />

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse ($profiles as $profile)
                <div class="relative bg-white rounded-2xl border border-gray-200 p-6 shadow-card hover:shadow-card-hover hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col">
                    <div class="absolute -top-4 -right-4 h-20 w-20 bg-gold/15 rounded-full pointer-events-none"></div>
                    <div class="relative z-10 space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-navy flex items-center justify-center text-gold shadow-sm">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7h-3V5a2 2 0 00-2-2H9a2 2 0 00-2 2v2H4a1 1 0 00-1 1v10a2 2 0 002 2h14a2 2 0 002-2V8a1 1 0 00-1-1zM9 5h6v2H9V5z"/></svg>
                        </div>
                        <h3 class="font-bold text-navy-950 text-base leading-snug">{{ $profile->judul }}</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $profile->deskripsi }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 col-span-full text-center py-8">Belum ada data profil lulusan.</p>
            @endforelse
        </div>
    </section>
</x-layouts.public>
