<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Data</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
<form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data"
      x-data="{ selectedType: '{{ old('type', $type) }}' }">
    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Jenis Konten</label>
                       <select name="type" x-model="selectedType" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @foreach (['pengumuman' => 'Pengumuman', 'prestasi' => 'Prestasi', 'kerjasama' => 'Kerjasama', 'kegiatan' => 'Kegiatan Kemahasiswaan'] as $key => $label)
                                <option value="{{ $key }}" {{ old('type', $type) === $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('type') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
<div class="mb-4" x-show="selectedType === 'pengumuman'">
    <label class="block text-sm font-medium text-gray-700">Kategori Pengumuman</label>
    <select name="kategori" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        <option value="">- Pilih Kategori -</option>
        <option value="kalender-akademik" {{ old('kategori') === 'kalender-akademik' ? 'selected' : '' }}>Kalender Akademik</option>
        <option value="wisuda" {{ old('kategori') === 'wisuda' ? 'selected' : '' }}>Wisuda</option>
        <option value="jadwal-sidang-skripsi" {{ old('kategori') === 'jadwal-sidang-skripsi' ? 'selected' : '' }}>Jadwal Sidang Skripsi</option>
        <option value="semester-antara" {{ old('kategori') === 'semester-antara' ? 'selected' : '' }}>Semester Antara</option>
        <option value="jadwal-uts-uas" {{ old('kategori') === 'jadwal-uts-uas' ? 'selected' : '' }}>Jadwal UTS dan UAS</option>
        <option value="lain-lain" {{ old('kategori') === 'lain-lain' ? 'selected' : '' }}>Lain-lain</option>
    </select>
</div>

<div class="mb-4" x-show="selectedType === 'kegiatan'">
    <label class="block text-sm font-medium text-gray-700">Kategori Kemahasiswaan</label>
    <select name="kategori" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        <option value="">- Pilih Kategori -</option>
        <option value="lowongan-pekerjaan" {{ old('kategori') === 'lowongan-pekerjaan' ? 'selected' : '' }}>Lowongan Pekerjaan</option>
        <option value="tracer-studi" {{ old('kategori') === 'tracer-studi' ? 'selected' : '' }}>Tracer Studi</option>
        <option value="penalaran-minat-bakat" {{ old('kategori') === 'penalaran-minat-bakat' ? 'selected' : '' }}>Penalaran, Minat & Bakat</option>
        <option value="informasi-beasiswa" {{ old('kategori') === 'informasi-beasiswa' ? 'selected' : '' }}>Informasi Beasiswa</option>
    </select>
</div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('judul') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal') }}"
                               class="mt-1 block w-48 border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Isi / Deskripsi</label>
                        <textarea name="isi" rows="6"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('isi') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Gambar</label>
                        <input type="file" name="gambar" accept="image/*" class="mt-1 block w-full">
                        @error('gambar') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Lampiran (PDF/Word, opsional)</label>
                        <input type="file" name="lampiran" accept=".pdf,.doc,.docx" class="mt-1 block w-full">
                        @error('lampiran') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">
                            Simpan
                        </button>
                        <a href="{{ route('admin.posts.index', ['type' => $type]) }}" class="px-4 py-2 rounded border">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
