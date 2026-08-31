<x-layouts.admin>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Kelola Slider Beranda
            </h2>
            <a href="{{ route('admin.sliders.create') }}"
               class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">
                + Tambah Slider
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Urutan</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aktif</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($sliders as $slider)
                            <tr>
                                <td class="px-4 py-3">
                                    <img loading="lazy" src="{{ asset('storage/' . $slider->gambar) }}" class="h-12 w-20 object-cover rounded">
                                </td>
                                <td class="px-4 py-3">{{ $slider->judul }}</td>
                                <td class="px-4 py-3">{{ $slider->urutan }}</td>
                                <td class="px-4 py-3">
                                    @if ($slider->is_active)
                                        <span class="text-green-700">Ya</span>
                                    @else
                                        <span class="text-gray-400">Tidak</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 space-x-2">
                                    <a href="{{ route('admin.sliders.edit', $slider) }}" class="text-blue-700 hover:underline">Edit</a>
                                    <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Yakin hapus slider ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-700 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-gray-400">Belum ada slider.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>
