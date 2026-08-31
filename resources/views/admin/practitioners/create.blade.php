<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Testimoni Alumni</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('admin.practitioners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama Alumni</label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('nama') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Instansi / Tempat Kerja Saat Ini</label>
                        <input type="text" name="instansi" value="{{ old('instansi') }}"
                               placeholder="Contoh: PT Astra Otoparts"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Jabatan / Peran</label>
                        <input type="text" name="jabatan" value="{{ old('jabatan') }}"
                               placeholder="Contoh: Staff IT Support"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Testimoni</label>
                        <textarea name="deskripsi" rows="4" placeholder="Kutipan pengalaman alumni selama/setelah kuliah di prodi ini..."
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6 border-t pt-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Foto Formal (Headshot)</label>
                            <input type="file" name="foto" accept="image/*" class="mt-1 block w-full">
                            <p class="text-xs text-gray-500 mt-1">Foto identitas, mis. pas foto berseragam/formal.</p>
                            @error('foto') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Foto Kegiatan / Kerja</label>
                            <input type="file" name="foto_kegiatan" accept="image/*" class="mt-1 block w-full">
                            <p class="text-xs text-gray-500 mt-1">Foto suasana alumni saat bekerja/beraktivitas. Tampil sebagai cover kartu.</p>
                            @error('foto_kegiatan') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">
                            Simpan
                        </button>
                        <a href="{{ route('admin.practitioners.index') }}" class="px-4 py-2 rounded border">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
