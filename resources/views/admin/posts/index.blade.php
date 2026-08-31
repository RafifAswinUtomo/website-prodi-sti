<x-layouts.admin>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Kelola Konten (Pengumuman, Prestasi, Kerjasama, Kegiatan)
            </h2>
            <a href="{{ route('admin.posts.create', ['type' => $type]) }}"
               class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">
                + Tambah Data
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex gap-2 border-b">
                @foreach (['pengumuman' => 'Pengumuman', 'prestasi' => 'Prestasi', 'kerjasama' => 'Kerjasama', 'kegiatan' => 'Kegiatan Kemahasiswaan'] as $key => $label)
                    <a href="{{ route('admin.posts.index', ['type' => $key]) }}"
                       class="px-4 py-2 -mb-px border-b-2 {{ $type === $key ? 'border-blue-900 text-blue-900 font-medium' : 'border-transparent text-gray-500' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gambar</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Lampiran</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($posts as $post)
                            <tr>
                                <td class="px-4 py-3">
                                    @if ($post->gambar)
                                        <img loading="lazy" src="{{ asset('storage/' . $post->gambar) }}" class="h-12 w-16 object-cover rounded">
                                    @else
                                        <div class="h-12 w-16 bg-gray-200 rounded"></div>
                                    @endif
                                </td>
                                <td class="px-4 py-3">{{ $post->judul }}</td>
                                <td class="px-4 py-3 text-gray-500">{{ $post->tanggal?->format('d M Y') }}</td>
                                <td class="px-4 py-3">
                                    @if ($post->lampiran)
                                        <a href="{{ asset('storage/' . $post->lampiran) }}" target="_blank" class="text-blue-700 hover:underline">Lihat file</a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 space-x-2">
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="text-blue-700 hover:underline">Edit</a>
                                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-700 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-gray-400">Belum ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>
