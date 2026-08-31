<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Halaman</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" name="slug" value="{{ old('slug', $slug) }}"
                               placeholder="Contoh: e-learning"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <p class="text-xs text-gray-400 mt-1">Dipakai di URL, huruf kecil, tanpa spasi (pakai tanda "-")</p>
                        @error('slug') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('judul') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    @if ($jenis === 'teks')
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Isi</label>
                            <textarea name="isi" rows="10"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('isi') }}</textarea>
                        </div>
                    @endif

                    @if ($jenis === 'dokumen')
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                            <textarea name="isi" rows="3"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('isi') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Badge / Label Singkat</label>
                            <input type="text" name="badge" value="{{ old('badge') }}"
                                   placeholder='Contoh: Integrasi SKKNI & Technician Leader'
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Cover / Gambar Sampul</label>
                            <input type="file" name="cover" accept="image/*" class="mt-1 block w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">File Dokumen (PDF)</label>
                            <input type="file" name="file" accept=".pdf" class="mt-1 block w-full">
                        </div>
                    @endif

                    @if ($jenis === 'link')
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                            <textarea name="isi" rows="3"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('isi') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Gambar</label>
                            <input type="file" name="cover" accept="image/*" class="mt-1 block w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Teks Tombol</label>
                            <input type="text" name="link_label" value="{{ old('link_label') }}"
                                   placeholder="Contoh: AKSES EDlink"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">URL Tujuan</label>
                            <input type="text" name="link_url" value="{{ old('link_url') }}"
                                   placeholder="https://edlink.id"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('link_url') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    @endif

                    @if ($jenis === 'visimisi')
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Visi</label>
                            <textarea name="visi" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('visi') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Misi (satu poin per baris)</label>
                            <textarea name="misi" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('misi') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Tujuan (satu poin per baris)</label>
                            <textarea name="tujuan" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('tujuan') }}</textarea>
                        </div>
                    @endif

                    <div class="flex gap-2 border-t pt-4 mt-4">
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">
                            Simpan
                        </button>
                        <a href="{{ route('admin.pages.index') }}" class="px-4 py-2 rounded border">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
