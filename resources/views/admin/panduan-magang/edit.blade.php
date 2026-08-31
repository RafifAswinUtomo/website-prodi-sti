<x-layouts.admin title="Panduan Magang">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Kelola Panduan Magang</h2>
    </x-slot>

    <div class="bg-white border rounded-lg p-6 max-w-2xl">
        <form action="{{ route('admin.panduan-magang.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('deskripsi', $panduanMagang->deskripsi) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Gambar / Cover</label>
                @if ($panduanMagang->cover)
                    <img loading="lazy" src="{{ asset('storage/' . $panduanMagang->cover) }}" class="h-24 rounded mb-2">
                @endif
                <input type="file" name="cover" accept="image/*" class="mt-1 block w-full">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">File Panduan (PDF)</label>
                @if ($panduanMagang->file)
                    <p class="text-sm text-gray-500 mb-1">
                        File saat ini: <a href="{{ asset('storage/' . $panduanMagang->file) }}" target="_blank" class="text-blue-700 hover:underline">lihat file</a>
                    </p>
                @endif
                <input type="file" name="file" accept=".pdf" class="mt-1 block w-full">
            </div>
            <button type="submit" class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-dark">Simpan</button>
        </form>
    </div>
</x-layouts.admin>
