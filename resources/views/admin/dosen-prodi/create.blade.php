<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Dosen (Beranda)</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('admin.dosen-prodi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h3 class="text-lg font-bold text-blue-900 mb-4">Data Utama</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('nama') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">NIDN</label>
                        <input type="text" name="nidn" value="{{ old('nidn') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Jabatan (badge di kartu)</label>
                        <input type="text" name="jabatan" value="{{ old('jabatan') }}"
                               placeholder="Contoh: Dosen Program Studi / Kepala Program Studi (Kaprodi)"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Foto</label>
                        <input type="file" name="foto" accept="image/*" class="mt-1 block w-full">
                        @error('foto') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <hr class="my-6">
                    <h3 class="text-lg font-bold text-blue-900 mb-4">Ringkasan di Kartu</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Edukasi Terakhir (ringkas)</label>
                        <input type="text" name="edukasi_terakhir" value="{{ old('edukasi_terakhir') }}"
                               placeholder="Contoh: S2 Magister Komputer - Universitas Dian Nuswantoro"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Keahlian (ringkas)</label>
                        <input type="text" name="keahlian" value="{{ old('keahlian') }}"
                               placeholder="Contoh: Sistem Basis Data, Rekayasa Perangkat Lunak"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <hr class="my-6">
                    <h3 class="text-lg font-bold text-blue-900 mb-4">Biodata Lengkap (Modal)</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email Resmi</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Ruang Kerja</label>
                        <input type="text" name="ruang_kerja" value="{{ old('ruang_kerja') }}"
                               placeholder="Contoh: Lab Rekayasa Perangkat Lunak, Gedung C Lantai 1"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Riwayat Pendidikan Tinggi (satu baris per item)</label>
                        <textarea name="riwayat_pendidikan" rows="3" placeholder="Contoh:&#10;S1 Teknik Informatika - Universitas Dian Nuswantoro (Lulus 2013)&#10;S2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2016)"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('riwayat_pendidikan') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Mata Kuliah Diampu (pisahkan dengan koma)</label>
                        <input type="text" name="mata_kuliah" value="{{ old('mata_kuliah') }}"
                               placeholder="Contoh: Basis Data Lanjut, Rekayasa Perangkat Lunak, Pemrograman Web Dasar"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Riset & Publikasi Ilmiah (satu baris per item)</label>
                        <textarea name="riset_publikasi" rows="3" placeholder="Contoh:&#10;Optimasi Kueri SQL Menggunakan Indeksasi Dinamis Pada Database Terdistribusi&#10;Sistem Informasi Inventaris Lab Berbasis Web Dengan Metodologi Scrum"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('riset_publikasi') }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Urutan</label>
                        <input type="number" name="urutan" value="{{ old('urutan', 0) }}"
                               class="mt-1 block w-32 border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Simpan</button>
                        <a href="{{ route('admin.dosen-prodi.index') }}" class="px-4 py-2 rounded border">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
