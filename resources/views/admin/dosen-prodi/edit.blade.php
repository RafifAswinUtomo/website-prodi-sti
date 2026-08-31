<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Dosen (Beranda)</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                @if ($dosen->foto)
                    <div class="mb-4">
                        <img loading="lazy" src="{{ asset('storage/' . $dosen->foto) }}" class="h-24 w-24 object-cover rounded-full">
                    </div>
                @endif

                <form action="{{ route('admin.dosen-prodi.update', $dosen) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h3 class="text-lg font-bold text-blue-900 mb-4">Data Utama</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', $dosen->nama) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('nama') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">NIDN</label>
                        <input type="text" name="nidn" value="{{ old('nidn', $dosen->nidn) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Jabatan (badge di kartu)</label>
                        <input type="text" name="jabatan" value="{{ old('jabatan', $dosen->jabatan) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Ganti Foto (kosongkan jika tidak diubah)</label>
                        <input type="file" name="foto" accept="image/*" class="mt-1 block w-full">
                        @error('foto') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <hr class="my-6">
                    <h3 class="text-lg font-bold text-blue-900 mb-4">Ringkasan di Kartu</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Edukasi Terakhir (ringkas)</label>
                        <input type="text" name="edukasi_terakhir" value="{{ old('edukasi_terakhir', $dosen->edukasi_terakhir) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Keahlian (ringkas)</label>
                        <input type="text" name="keahlian" value="{{ old('keahlian', $dosen->keahlian) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <hr class="my-6">
                    <h3 class="text-lg font-bold text-blue-900 mb-4">Biodata Lengkap (Modal)</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email Resmi</label>
                        <input type="email" name="email" value="{{ old('email', $dosen->email) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Ruang Kerja</label>
                        <input type="text" name="ruang_kerja" value="{{ old('ruang_kerja', $dosen->ruang_kerja) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Riwayat Pendidikan Tinggi (satu baris per item)</label>
                        <textarea name="riwayat_pendidikan" rows="3"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('riwayat_pendidikan', $dosen->riwayat_pendidikan) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Mata Kuliah Diampu (pisahkan dengan koma)</label>
                        <input type="text" name="mata_kuliah" value="{{ old('mata_kuliah', $dosen->mata_kuliah) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Riset & Publikasi Ilmiah (satu baris per item)</label>
                        <textarea name="riset_publikasi" rows="3"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('riset_publikasi', $dosen->riset_publikasi) }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Urutan</label>
                        <input type="number" name="urutan" value="{{ old('urutan', $dosen->urutan) }}"
                               class="mt-1 block w-32 border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Update</button>
                        <a href="{{ route('admin.dosen-prodi.index') }}" class="px-4 py-2 rounded border">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
