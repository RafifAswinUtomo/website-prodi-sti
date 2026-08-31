<x-layouts.admin title="Skripsi/Tugas Akhir">
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">Kelola Skripsi/Tugas Akhir</h2>
            <a href="{{ route('admin.skripsi-tugas-akhir.create') }}" class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-dark">
                + Tambah Item
            </a>
        </div>
    </x-slot>

    <div class="bg-white border rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Urutan</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">File</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($items as $item)
                    <tr>
                        <td class="px-4 py-3">{{ $item->urutan }}</td>
                        <td class="px-4 py-3 font-medium">{{ $item->judul }}</td>
                        <td class="px-4 py-3">
                            @if ($item->file)
                                <a href="{{ asset('storage/' . $item->file) }}" target="_blank" class="text-blue-700 hover:underline">Lihat file</a>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="{{ route('admin.skripsi-tugas-akhir.edit', $item) }}" class="text-blue-700 hover:underline">Edit</a>
                            <form action="{{ route('admin.skripsi-tugas-akhir.destroy', $item) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Yakin hapus item ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-700 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-400">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
