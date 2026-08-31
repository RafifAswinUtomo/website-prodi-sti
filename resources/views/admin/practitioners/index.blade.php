<x-layouts.admin>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Kelola Testimoni Alumni
            </h2>
            <a href="{{ route('admin.practitioners.create') }}"
               class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">
                + Tambah Testimoni
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
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto Formal</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto Kegiatan</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Instansi</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($practitioners as $practitioner)
                            <tr>
                                <td class="px-4 py-3">
                                    @if ($practitioner->foto)
                                        <img loading="lazy" src="{{ asset('storage/' . $practitioner->foto) }}" class="h-12 w-12 object-cover rounded-full">
                                    @else
                                        <div class="h-12 w-12 bg-gray-200 rounded-full"></div>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    @if ($practitioner->foto_kegiatan)
                                        <img loading="lazy" src="{{ asset('storage/' . $practitioner->foto_kegiatan) }}" class="h-12 w-16 object-cover rounded-md">
                                    @else
                                        <div class="h-12 w-16 bg-gray-100 rounded-md flex items-center justify-center text-gray-300 text-[10px]">-</div>
                                    @endif
                                </td>
                                <td class="px-4 py-3">{{ $practitioner->nama }}</td>
                                <td class="px-4 py-3 text-gray-500">{{ $practitioner->instansi }}</td>
                                <td class="px-4 py-3 space-x-2 whitespace-nowrap">
                                    <a href="{{ route('admin.practitioners.edit', $practitioner) }}" class="text-blue-700 hover:underline">Edit</a>
                                    <form action="{{ route('admin.practitioners.destroy', $practitioner) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Yakin hapus testimoni ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-700 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-gray-400">Belum ada data testimoni.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>
