<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Sambutan Pimpinan</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 rounded bg-green-100 text-green-800 px-4 py-2 text-sm">{{ session('success') }}</div>
                @endif

                <form action="{{ route('admin.sambutan.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- ══════════ KAPRODI ══════════ --}}
                    <h3 class="text-lg font-bold text-blue-900 mb-4">Sambutan Kaprodi</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama Kaprodi</label>
                        <input type="text" name="kaprodi_nama" value="{{ old('kaprodi_nama', $settings['kaprodi_nama'] ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Jabatan / Gelar</label>
                        <input type="text" name="kaprodi_jabatan" value="{{ old('kaprodi_jabatan', $settings['kaprodi_jabatan'] ?? '') }}"
                               placeholder="Contoh: Ketua Program Studi STI"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">NIDN</label>
                        <input type="text" name="kaprodi_nidn" value="{{ old('kaprodi_nidn', $settings['kaprodi_nidn'] ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul Sambutan (teks tebal besar)</label>
                        <input type="text" name="kaprodi_judul" value="{{ old('kaprodi_judul', $settings['kaprodi_judul'] ?? '') }}"
                               placeholder="Contoh: Selamat Datang di Portal Resmi STI Universitas Ivet"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Isi Sambutan (kutipan)</label>
                        <textarea name="kaprodi_sambutan" rows="4"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('kaprodi_sambutan', $settings['kaprodi_sambutan'] ?? '') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Sambutan Tambahan (paragraf bawah, opsional)</label>
                        <textarea name="kaprodi_sambutan2" rows="3"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('kaprodi_sambutan2', $settings['kaprodi_sambutan2'] ?? '') }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Foto Kaprodi</label>
                        @if (!empty($settings['kaprodi_foto']))
                            <img loading="lazy" src="{{ asset('storage/' . $settings['kaprodi_foto']) }}" class="h-24 rounded mb-2">
                        @endif
                        <input type="file" name="kaprodi_foto" accept="image/*" class="mt-1 block w-full">
                        @error('kaprodi_foto') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- ══════════ REKTOR ══════════ --}}
                    <hr class="my-6">
                    <h3 class="text-lg font-bold text-blue-900 mb-4">Sambutan Rektor</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama Rektor</label>
                        <input type="text" name="rektor_nama" value="{{ old('rektor_nama', $settings['rektor_nama'] ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Jabatan / Gelar</label>
                        <input type="text" name="rektor_jabatan" value="{{ old('rektor_jabatan', $settings['rektor_jabatan'] ?? '') }}"
                               placeholder="Contoh: Rektor Universitas Ivet"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">NIDN</label>
                        <input type="text" name="rektor_nidn" value="{{ old('rektor_nidn', $settings['rektor_nidn'] ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul Sambutan (teks tebal besar)</label>
                        <input type="text" name="rektor_judul" value="{{ old('rektor_judul', $settings['rektor_judul'] ?? '') }}"
                               placeholder="Contoh: Menyongsong Masa Depan Indonesia Unggul"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Isi Sambutan (kutipan)</label>
                        <textarea name="rektor_sambutan" rows="4"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('rektor_sambutan', $settings['rektor_sambutan'] ?? '') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Sambutan Tambahan (paragraf bawah, opsional)</label>
                        <textarea name="rektor_sambutan2" rows="3"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('rektor_sambutan2', $settings['rektor_sambutan2'] ?? '') }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Foto Rektor</label>
                        @if (!empty($settings['rektor_foto']))
                            <img loading="lazy" src="{{ asset('storage/' . $settings['rektor_foto']) }}" class="h-24 rounded mb-2">
                        @endif
                        <input type="file" name="rektor_foto" accept="image/*" class="mt-1 block w-full">
                        @error('rektor_foto') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Simpan</button>
                        <a href="{{ route('admin.settings.index') }}" class="px-4 py-2 rounded border">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
