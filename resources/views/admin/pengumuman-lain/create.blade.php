<x-layouts.admin title="Tambah Pengumuman">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Tambah Pengumuman Lain-lain</h2>
    </x-slot>
    <div class="bg-white border rounded-lg p-6 max-w-2xl">
        <form action="{{ route('admin.pengumuman-lain.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" value="{{ old('judul') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('judul') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                <textarea name="deskripsi" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('deskripsi') }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Berkas (opsional)</label>
                <input type="file" name="file" accept=".pdf,.doc,.docx" class="mt-1 block w-full">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Urutan</label>
                <input type="number" name="urutan" value="{{ old('urutan', 0) }}" class="mt-1 block w-32 border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-dark">Simpan</button>
                <a href="{{ route('admin.pengumuman-lain.index') }}" class="px-4 py-2 rounded border">Batal</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
