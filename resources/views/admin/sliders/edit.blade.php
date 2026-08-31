<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Slider</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                <div class="mb-4">
                    <img loading="lazy" src="{{ asset('storage/' . $slider->gambar) }}" class="h-24 rounded">
                </div>

                <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul Baris 1</label>
                        <input type="text" name="judul" value="{{ old('judul', $slider->judul) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('judul') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul Baris 2</label>
                        <input type="text" name="judul_baris2" value="{{ old('judul_baris2', $slider->judul_baris2) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('judul_baris2') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul Sorot (Emas)</label>
                        <input type="text" name="judul_sorot" value="{{ old('judul_sorot', $slider->judul_sorot) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('judul_sorot') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Subjudul</label>
                        <input type="text" name="subjudul" value="{{ old('subjudul', $slider->subjudul) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Ganti Gambar (kosongkan jika tidak diubah)</label>
                        <input type="file" name="gambar" accept="image/*" class="mt-1 block w-full">
                        @error('gambar') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Teks Tombol</label>
                        <input type="text" name="tombol_teks" value="{{ old('tombol_teks', $slider->tombol_teks) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Link Tombol</label>
                        <input type="text" name="tombol_link" value="{{ old('tombol_link', $slider->tombol_link) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Urutan</label>
                        <input type="number" name="urutan" value="{{ old('urutan', $slider->urutan) }}"
                               class="mt-1 block w-32 border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ $slider->is_active ? 'checked' : '' }} class="rounded">
                            <span class="ml-2 text-sm text-gray-700">Tampilkan di beranda</span>
                        </label>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">
                            Update
                        </button>
                        <a href="{{ route('admin.sliders.index') }}" class="px-4 py-2 rounded border">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
