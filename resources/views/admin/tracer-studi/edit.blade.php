<x-layouts.admin title="Tracer Studi">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Kelola Tracer Studi</h2>
    </x-slot>

    <div class="bg-white border rounded-lg p-6 max-w-2xl">
        <form action="{{ route('admin.tracer-studi.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('deskripsi', $tracerStudi->deskripsi) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Gambar</label>
                @if ($tracerStudi->cover)
                    <img loading="lazy" src="{{ asset('storage/' . $tracerStudi->cover) }}" class="h-24 rounded mb-2">
                @endif
                <input type="file" name="cover" accept="image/*" class="mt-1 block w-full">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Teks Tombol</label>
                <input type="text" name="link_label" value="{{ old('link_label', $tracerStudi->link_label) }}"
                       placeholder="Contoh: Isi Form Tracer Studi"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">URL Tujuan</label>
                <input type="text" name="link_url" value="{{ old('link_url', $tracerStudi->link_url) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('link_url') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-dark">Simpan</button>
        </form>
    </div>
</x-layouts.admin>
