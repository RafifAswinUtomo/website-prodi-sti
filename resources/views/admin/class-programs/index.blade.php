<x-layouts.admin>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Kelola Program Kelas
            </h2>
            <a href="{{ route('admin.class-programs.create') }}"
               class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">
                + Tambah Program
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Program</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis Kelas</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($classPrograms as $classProgram)
                            <tr>
                                <td class="px-4 py-3">{{ $classProgram->nama_program }}</td>
                                <td class="px-4 py-3 text-gray-500">{{ $classProgram->jenis_kelas }}</td>
                                <td class="px-4 py-3 text-gray-500">{{ \Illuminate\Support\Str::limit($classProgram->deskripsi, 60) }}</td>
                                <td class="px-4 py-3 space-x-2">
                                    <a href="{{ route('admin.class-programs.edit', $classProgram) }}" class="text-blue-700 hover:underline">Edit</a>
                                    <form action="{{ route('admin.class-programs.destroy', $classProgram) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Yakin hapus program ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-700 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-6 text-center text-gray-400">Belum ada program kelas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>
