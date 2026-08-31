<x-layouts.admin title="Kelas Karyawan">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Kelola Kelas Karyawan</h2>
    </x-slot>

    <div class="bg-white border rounded-lg p-6 max-w-2xl">
        <form action="{{ route('admin.kelas-karyawan.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" rows="5"
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('deskripsi', $kelas->deskripsi) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Poster / Cover</label>
                @if ($kelas->cover)
                    <img loading="lazy" src="{{ asset('storage/' . $kelas->cover) }}" class="h-24 rounded mb-2">
                @endif
                <input type="file" name="cover" accept="image/*" class="mt-1 block w-full">
            </div>
<div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Link Informasi Pendaftaran</label>
                @if ($kelas->link)
                    <p class="text-sm text-gray-500 mb-1">
                        Link saat ini: <a href="{{ $kelas->link }}" target="_blank" rel="noopener" class="text-blue-700 hover:underline">{{ $kelas->link }}</a>
                    </p>
                @endif
                <input type="url" name="link" value="{{ old('link', $kelas->link) }}" placeholder="https://..." class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <button type="submit" class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-dark">Simpan</button>
        </form>
    </div>
</x-layouts.admin>
