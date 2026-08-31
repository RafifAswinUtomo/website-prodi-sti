<x-layouts.public title="Praktisi Industri">
    <x-ui.page-header title="Praktisi Industri" parent="Profil"
                      subtitle="Kolaborasi dengan praktisi dari dunia industri dan akademik untuk menghadirkan pembelajaran yang relevan dengan kebutuhan nyata." />

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($items as $item)
                @include('site.praktisi-industri._card', ['item' => $item])
            @empty
                <p class="text-gray-400 col-span-full text-center py-8">Belum ada data praktisi industri.</p>
            @endforelse
        </div>
    </section>
</x-layouts.public>
