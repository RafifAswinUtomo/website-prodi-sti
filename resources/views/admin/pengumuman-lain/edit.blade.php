<x-layouts.admin title="Edit Pengumuman">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Edit Pengumuman Lain-lain</h2>
    </x-slot>
    <div class="bg-white border rounded-lg p-6 max-w-2xl">
        <form action="{{ route('admin.pengumuman-lain.update', $item) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $item->judul) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('judul') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                <textarea name="deskripsi" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('deskripsi', $item->deskripsi) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Berkas (opsional)</label>
                @if ($item->file)
                    <p class="text-sm text-gray-500 mb-1">File saat ini: <a href="{{ asset('storage/' . $item->file) }}" target="_blank" class="text-blue-700 hover:underline">lihat file</a></p>
                @endif
                <input type="file" name="file" accept=".pdf,.doc,.docx" class="mt-1 block w-full">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Urutan</label>
                <input type="number" name="urutan" value="{{ old('urutan', $item->urutan) }}" class="mt-1 block w-32 border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-dark">Update</button>
                <a href="{{ route('admin.pengumuman-lain.index') }}" class="px-4 py-2 rounded border">Batal</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
