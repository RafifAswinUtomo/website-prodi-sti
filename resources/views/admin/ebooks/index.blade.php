<x-layouts.admin title="E-Library">
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">Kelola E-Library</h2>
            <a href="{{ route('admin.ebooks.create') }}" class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-dark">
                + Tambah E-book
            </a>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="mb-4 rounded bg-green-100 text-green-800 px-4 py-2 text-sm">{{ session('success') }}</div>
    @endif

    <form method="GET" class="mb-4 flex flex-wrap gap-2 items-center bg-white border rounded-lg p-4">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul / penulis..."
               class="border-gray-300 rounded-md shadow-sm text-sm flex-1 min-w-[200px]">
        <select name="kategori" class="border-gray-300 rounded-md shadow-sm text-sm">
            <option value="">Semua Kategori</option>
            @foreach ($kategoriList as $k)
                <option value="{{ $k }}" @selected(request('kategori') === $k)>{{ $k }}</option>
            @endforeach
        </select>
        <button type="submit" class="bg-navy text-white px-4 py-2 rounded text-sm hover:bg-navy-dark">Filter</button>
        @if (request('q') || request('kategori'))
            <a href="{{ route('admin.ebooks.index') }}" class="text-sm text-gray-500 hover:underline">Reset</a>
        @endif
        <span class="text-sm text-gray-400 ml-auto">{{ $items->total() }} e-book</span>
    </form>

    <div class="bg-white border rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cover</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tahun</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">File</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Unduhan</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($items as $item)
                    <tr>
                        <td class="px-4 py-3">
                            @if ($item->cover)
                                <img loading="lazy" src="{{ asset('storage/' . $item->cover) }}" class="h-14 w-10 object-cover rounded border border-gray-200">
                            @else
                                <div class="h-14 w-10 rounded bg-gray-100 flex items-center justify-center text-gray-300 text-xs">-</div>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="font-medium text-gray-900 max-w-xs">{{ $item->judul }}</div>
                            <div class="text-xs text-gray-500">{{ $item->penulis }}</div>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $item->kategori }}</td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $item->tahun }}</td>
                        <td class="px-4 py-3">
                            @if ($item->file)
                                <a href="{{ asset('storage/' . $item->file) }}" target="_blank" class="text-blue-700 hover:underline text-sm">Lihat file</a>
                                <div class="text-xs text-gray-400">{{ $item->ukuran_format }}</div>
                            @else
                                <span class="text-gray-400 text-sm">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $item->unduhan }}x</td>
                        <td class="px-4 py-3 space-x-2 whitespace-nowrap">
                            <a href="{{ route('admin.ebooks.edit', $item) }}" class="text-blue-700 hover:underline text-sm">Edit</a>
                            <form action="{{ route('admin.ebooks.destroy', $item) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Yakin hapus e-book ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-700 hover:underline text-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-400">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $items->links() }}
    </div>
</x-layouts.admin>
