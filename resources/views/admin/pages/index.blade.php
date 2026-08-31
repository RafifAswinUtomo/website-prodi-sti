<x-layouts.admin>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Kelola Halaman (Visi Misi, Profil Lulusan, dll)
            </h2>
            <a href="{{ route('admin.pages.create') }}"
               class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">
                + Tambah Halaman
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Slug</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($pages as $page)
                            <tr>
                                <td class="px-4 py-3">{{ $page->judul }}</td>
                                <td class="px-4 py-3 text-gray-500">{{ $page->slug }}</td>
                                <td class="px-4 py-3 space-x-2">
                                    <a href="{{ route('admin.pages.edit', $page) }}" class="text-blue-700 hover:underline">Edit</a>
                                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Yakin hapus halaman ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-700 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-6 text-center text-gray-400">Belum ada halaman.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>
