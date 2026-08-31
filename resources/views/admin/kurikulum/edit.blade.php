<x-layouts.admin title="Kurikulum">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Kelola Kurikulum</h2>
    </x-slot>

    <div class="bg-white border rounded-lg p-6 max-w-2xl">
        <form action="{{ route('admin.kurikulum.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                <textarea name="deskripsi" rows="4"
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('deskripsi', $kurikulum->deskripsi) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Badge / Label Singkat</label>
                <input type="text" name="badge" value="{{ old('badge', $kurikulum->badge) }}"
                       placeholder="Contoh: Integrasi SKKNI & Technician Leader"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Cover / Gambar Sampul</label>
                @if ($kurikulum->cover)
                    <img loading="lazy" src="{{ asset('storage/' . $kurikulum->cover) }}" class="h-24 rounded mb-2">
                @endif
                <input type="file" name="cover" accept="image/*" class="mt-1 block w-full">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">File Dokumen (PDF)</label>
                @if ($kurikulum->file)
                    <p class="text-sm text-gray-500 mb-1">
                        File saat ini: <a href="{{ asset('storage/' . $kurikulum->file) }}" target="_blank" class="text-blue-700 hover:underline">lihat file</a>
                    </p>
                @endif
                <input type="file" name="file" accept=".pdf" class="mt-1 block w-full">
            </div>

            <button type="submit" class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-dark">
                Simpan
            </button>
        </form>
    </div>
</x-layouts.admin>
