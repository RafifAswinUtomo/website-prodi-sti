<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white shadow rounded-lg p-6">
                <p class="text-sm text-gray-500">Selamat datang, <span class="font-bold text-gray-800">{{ auth()->user()->name }}</span>. Berikut ringkasan konten situs.</p>
            </div>

            @php
                $cards = [
['label' => 'Slider Beranda', 'value' => $sliders ?? 0, 'route' => 'admin.sliders.index', 'color' => 'bg-navy'],
                    ['label' => 'Praktisi Industri', 'value' => $practitioners ?? 0, 'route' => 'admin.practitioners.index', 'color' => 'bg-navy-600'],
                    ['label' => 'Fasilitas', 'value' => $facilities ?? 0, 'route' => 'admin.facilities.index', 'color' => 'bg-navy'],
                    ['label' => 'Program Kelas', 'value' => $class_programs ?? 0, 'route' => 'admin.class-programs.index', 'color' => 'bg-navy-700'],
                    ['label' => 'Pengumuman', 'value' => $pengumuman ?? 0, 'route' => 'admin.posts.index', 'color' => 'bg-navy-600'],
                    ['label' => 'Prestasi', 'value' => $prestasi ?? 0, 'route' => 'admin.posts.index', 'params' => ['type' => 'prestasi'], 'color' => 'bg-navy'],
                    ['label' => 'Kerjasama', 'value' => $kerjasama ?? 0, 'route' => 'admin.posts.index', 'params' => ['type' => 'kerjasama'], 'color' => 'bg-navy-700'],
                    ['label' => 'Kegiatan', 'value' => $kegiatan ?? 0, 'route' => 'admin.posts.index', 'params' => ['type' => 'kegiatan'], 'color' => 'bg-navy-600'],
                ];
            @endphp

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($cards as $card)
                    @if (\Illuminate\Support\Facades\Route::has($card['route']))
                        <a href="{{ route($card['route'], $card['params'] ?? []) }}"
                           class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200 flex flex-col gap-2">
                            <span class="{{ $card['color'] }} text-white text-xs font-bold px-2 py-1 rounded w-fit">{{ $card['label'] }}</span>
                            <span class="text-3xl font-black text-gray-800">{{ $card['value'] }}</span>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.admin>
