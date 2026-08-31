<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Fasilitas</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama Fasilitas</label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                               placeholder="Contoh: Laboratorium Jaringan Komputer"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('nama') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Kategori</label>
    <select name="kategori" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        <option value="">- Pilih Kategori -</option>
        <option value="laboratorium" {{ old('kategori') === 'laboratorium' ? 'selected' : '' }}>Laboratorium</option>
        <option value="lembaga-sertifikasi-profesi" {{ old('kategori') === 'lembaga-sertifikasi-profesi' ? 'selected' : '' }}>Lembaga Sertifikasi Profesi</option>
    </select>
</div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Foto</label>
                        <input type="file" name="foto" accept="image/*" class="mt-1 block w-full">
                        @error('foto') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" rows="5"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('deskripsi') }}</textarea>
                    </div>
<div class="mb-6">
    <label class="block text-sm font-medium text-gray-700">Perlengkapan Utama (satu poin per baris)</label>
    <textarea name="perlengkapan" rows="5"
              placeholder="Scanner OBD-II Modern&#10;Engine Test Bed&#10;Gas Analyzer Terkalibrasi"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('perlengkapan') }}</textarea>
    <p class="text-xs text-gray-400 mt-1">Khusus untuk kategori Laboratorium. Kosongkan kalau tidak perlu.</p>
</div>
                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">
                            Simpan
                        </button>
                        <a href="{{ route('admin.facilities.index') }}" class="px-4 py-2 rounded border">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
