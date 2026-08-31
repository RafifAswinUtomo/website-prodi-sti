<x-layouts.admin title="Tambah Lowongan">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Tambah Lowongan</h2>
    </x-slot>

    <div class="bg-white border rounded-lg p-6 max-w-2xl">
        <form action="{{ route('admin.lowongan-pekerjaan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" value="{{ old('judul') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('judul') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Foto / Poster</label>
                <input type="file" name="foto" accept="image/*" class="mt-1 block w-full">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Dibutuhkan (satu poin per baris)</label>
                <textarea name="kebutuhan" rows="5" placeholder="Guru Farmasi&#10;Guru TKR&#10;Guru PKN"
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('kebutuhan') }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Berkas Lowongan</label>
                <input type="file" name="file" accept=".pdf,.doc,.docx" class="mt-1 block w-full">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Urutan</label>
                <input type="number" name="urutan" value="{{ old('urutan', 0) }}" class="mt-1 block w-32 border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-dark">Simpan</button>
                <a href="{{ route('admin.lowongan-pekerjaan.index') }}" class="px-4 py-2 rounded border">Batal</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
