<x-layouts.admin>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelola Praktisi Industri</h2>
            <a href="{{ route('admin.praktisi-industri.create') }}"
               class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-dark">
                + Tambah Praktisi
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 rounded bg-green-100 text-green-800 px-4 py-2 text-sm">{{ session('success') }}</div>
            @endif
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jabatan / Instansi</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Urutan</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($items as $item)
                            <tr>
                                <td class="px-4 py-3">
                                    @if ($item->foto)
                                        <img loading="lazy" src="{{ asset('storage/' . $item->foto) }}" class="h-12 w-12 object-cover rounded-full">
                                    @else
                                        <div class="h-12 w-12 bg-gray-200 rounded-full"></div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 font-medium">{{ $item->nama }}</td>
                                <td class="px-4 py-3 text-gray-500">
                                    {{ $item->jabatan }}
                                    @if ($item->instansi) <span class="text-gray-400">— {{ $item->instansi }}</span> @endif
                                </td>
                                <td class="px-4 py-3">{{ $item->urutan }}</td>
                                <td class="px-4 py-3 space-x-2 whitespace-nowrap">
                                    <a href="{{ route('admin.praktisi-industri.edit', $item) }}" class="text-blue-700 hover:underline">Edit</a>
                                    <form action="{{ route('admin.praktisi-industri.destroy', $item) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Yakin hapus data praktisi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-700 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-gray-400">Belum ada data praktisi industri.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>
