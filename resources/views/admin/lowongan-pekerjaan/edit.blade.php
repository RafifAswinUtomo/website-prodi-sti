<x-layouts.admin title="Edit Lowongan">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Edit Lowongan</h2>
    </x-slot>

    <div class="bg-white border rounded-lg p-6 max-w-2xl">
        <form action="{{ route('admin.lowongan-pekerjaan.update', $item) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $item->judul) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('judul') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Foto / Poster</label>
                @if ($item->foto)
                    <img loading="lazy" src="{{ asset('storage/' . $item->foto) }}" class="h-24 rounded mb-2">
                @endif
                <input type="file" name="foto" accept="image/*" class="mt-1 block w-full">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Dibutuhkan (satu poin per baris)</label>
                <textarea name="kebutuhan" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('kebutuhan', $item->kebutuhan) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Berkas Lowongan</label>
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
                <a href="{{ route('admin.lowongan-pekerjaan.index') }}" class="px-4 py-2 rounded border">Batal</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
