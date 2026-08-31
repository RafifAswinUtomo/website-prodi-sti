<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Tahun Sejarah</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('admin.sejarah-milestones.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tahun</label>
                        <input type="number" name="tahun" value="{{ old('tahun') }}" placeholder="Contoh: 2026"
                               class="mt-1 block w-40 border-gray-300 rounded-md shadow-sm">
                        @error('tahun') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul Milestone</label>
                        <input type="text" name="judul" value="{{ old('judul') }}"
                               placeholder="Contoh: Transformasi Digital & Inovasi Global"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('judul') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Badge (label kecil, opsional)</label>
                        <input type="text" name="badge" value="{{ old('badge') }}"
                               placeholder="Contoh: AKSELERASI TEKNOLOGI"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" rows="4"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Poin Capaian Penting (satu poin per baris)</label>
                        <textarea name="poin" rows="5" placeholder="Contoh:&#10;Kurikulum terintegrasi kecerdasan buatan & keamanan siber&#10;Peluncuran sistem pendaftaran HIMASTI digital mandiri"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('poin') }}</textarea>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Simpan</button>
                        <a href="{{ route('admin.sejarah-milestones.index') }}" class="px-4 py-2 rounded border">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
