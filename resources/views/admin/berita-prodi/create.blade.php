<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Berita (Beranda)</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('admin.berita-prodi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('judul') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

             <div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Kategori</label>
    <select name="kategori" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        <option value="berita" {{ old('kategori') == 'berita' ? 'selected' : '' }}>Berita (poster/flyer boleh)</option>
        <option value="kegiatan" {{ old('kategori') == 'kegiatan' ? 'selected' : '' }}>Kegiatan / Event (wajib foto asli)</option>
        <option value="prestasi" {{ old('kategori') == 'prestasi' ? 'selected' : '' }}>Prestasi (wajib foto asli)</option>
        <option value="kerjasama" {{ old('kategori') == 'kerjasama' ? 'selected' : '' }}>Kerja Sama</option>
    </select>
    @error('kategori') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal') }}"
                               class="mt-1 block w-48 border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Gambar</label>
                        <input type="file" name="gambar" accept="image/*" class="mt-1 block w-full">
                        @error('gambar') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Ringkasan (tampil di kartu)</label>
                        <textarea name="ringkasan" rows="2"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('ringkasan') }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Konten Lengkap (tampil di modal)</label>
                        <textarea name="konten" rows="5"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('konten') }}</textarea>
                    </div>

              <div class="mb-6">
    <label class="block text-sm font-medium text-gray-700">Urutan</label>
    <input type="number" name="urutan" value="{{ old('urutan', 0) }}"
           class="mt-1 block w-32 border-gray-300 rounded-md shadow-sm">
</div>

<div class="mb-6">
    <label class="flex items-center gap-2">
        <input type="checkbox" name="tampil_beranda" value="1" {{ old('tampil_beranda') ? 'checked' : '' }}
               class="rounded border-gray-300">
        <span class="text-sm font-medium text-gray-700">Tampilkan di Beranda</span>
    </label>
    <p class="text-xs text-gray-500 mt-1">Beranda tidak lagi otomatis ambil berita terbaru — centang manual item mana saja yang mau muncul di sana (maksimal disarankan 3-4 item).</p>
</div>

                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Simpan</button>
                        <a href="{{ route('admin.berita-prodi.index') }}" class="px-4 py-2 rounded border">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
