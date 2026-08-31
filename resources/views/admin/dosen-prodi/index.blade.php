<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dosen Program Studi (Beranda)</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 rounded bg-green-100 text-green-800 px-4 py-2 text-sm">{{ session('success') }}</div>
                @endif

                <div class="flex justify-between items-center mb-4">
                    <p class="text-sm text-gray-500">Kartu dosen di beranda, diurutkan berdasarkan kolom Urutan.</p>
                    <a href="{{ route('admin.dosen-prodi.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800 text-sm shrink-0 ml-4">
                        + Tambah Dosen
                    </a>
                </div>

                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left border-b border-gray-200 text-gray-500">
                            <th class="py-2 pr-4">Foto</th>
                            <th class="py-2 pr-4">Nama</th>
                            <th class="py-2 pr-4">Jabatan</th>
                            <th class="py-2 pr-4">Urutan</th>
                            <th class="py-2 pr-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dosenList as $d)
                            <tr class="border-b border-gray-100">
                                <td class="py-2.5 pr-4">
                                    @if ($d->foto)
                                        <img loading="lazy" src="{{ asset('storage/' . $d->foto) }}" class="h-10 w-10 object-cover rounded-full">
                                    @else
                                        <div class="h-10 w-10 rounded-full bg-gray-100"></div>
                                    @endif
                                </td>
                                <td class="py-2.5 pr-4 font-bold text-navy">{{ $d->nama }}</td>
                                <td class="py-2.5 pr-4 text-gray-500">{{ $d->jabatan }}</td>
                                <td class="py-2.5 pr-4 text-gray-500">{{ $d->urutan }}</td>
                                <td class="py-2.5 pr-4 text-right whitespace-nowrap">
                                    <a href="{{ route('admin.dosen-prodi.edit', $d) }}" class="text-blue-900 hover:underline">Edit</a>
                                    <form action="{{ route('admin.dosen-prodi.destroy', $d) }}" method="POST" class="inline" onsubmit="return confirm('Hapus {{ $d->nama }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline ml-3">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="py-6 text-center text-gray-400">Belum ada data. Klik "+ Tambah Dosen" untuk mulai.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>
