<x-layouts.public title="Testimoni Alumni">
    <x-ui.page-header title="Testimoni Alumni" parent="Profil"
                      subtitle="Kisah nyata alumni Program Studi STI — dari bangku kuliah hingga berkarya di dunia kerja dan pendidikan." />

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-12">
            @forelse ($practitioners as $practitioner)
                @include('site.practitioners._card', ['practitioner' => $practitioner])
            @empty
                <p class="text-gray-400 col-span-full text-center py-8">Belum ada data testimoni alumni.</p>
            @endforelse
        </div>
    </section>
</x-layouts.public>
