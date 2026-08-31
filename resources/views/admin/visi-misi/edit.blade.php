<x-layouts.admin title="Visi, Misi & Tujuan">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Kelola Visi, Misi & Tujuan</h2>
    </x-slot>

    <div class="bg-white border rounded-lg p-6 max-w-2xl">

        @if (session('success'))
            <div class="mb-4 rounded bg-green-100 text-green-800 px-4 py-2 text-sm">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.visi-misi.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- ══════════ JUDUL SECTION (BANNER) ══════════ --}}
            <div class="mb-6 border border-gray-200 rounded-lg p-5 bg-gray-50/60">
                <h3 class="text-lg font-bold text-blue-900 mb-4">Judul Section (Banner)</h3>

                @if (!empty($item->banner_bg))
                    <img loading="lazy" src="{{ asset('storage/' . $item->banner_bg) }}" class="h-24 w-full max-w-md object-cover rounded mb-3 border border-gray-200">
                @endif

                <label class="block text-sm font-medium text-gray-700">Gambar Latar Banner (opsional)</label>
                <input type="file" name="banner_bg" accept="image/*" class="mt-1 block w-full">
                <p class="text-xs text-gray-500 mt-1">Gambar ini tampil sebagai latar belakang banner "Visi, Misi & Tujuan Program Studi" di beranda.</p>
                @error('banner_bg') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Visi</label>
                <textarea name="visi" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('visi', $item->visi) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Misi (satu poin per baris)</label>
                <textarea name="misi" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('misi', $item->misi) }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Tujuan (satu poin per baris)</label>
                <textarea name="tujuan" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('tujuan', $item->tujuan) }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Definisi Karakter (kotak kecil di bawah Visi, opsional)</label>
                <textarea name="karakter" rows="2" placeholder="Contoh: Melambangkan integritas moral, akhlak mulia, disiplin, semangat patriotisme, serta menjunjung tinggi kode etik teknologi."
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('karakter', $item->karakter) }}</textarea>
            </div>

            <hr class="my-6">
            <h3 class="text-lg font-bold text-navy mb-4">Tujuan Pendidikan Program Studi (PEO)</h3>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">PEO-1: Judul</label>
                <input type="text" name="peo1_title" value="{{ old('peo1_title', $item->peo1_title) }}"
                       placeholder="Contoh: Kompetensi Profesional"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">PEO-1: Deskripsi</label>
                <textarea name="peo1_desc" rows="2" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('peo1_desc', $item->peo1_desc) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">PEO-2: Judul</label>
                <input type="text" name="peo2_title" value="{{ old('peo2_title', $item->peo2_title) }}"
                       placeholder="Contoh: Creativepreneurship"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">PEO-2: Deskripsi</label>
                <textarea name="peo2_desc" rows="2" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('peo2_desc', $item->peo2_desc) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">PEO-3: Judul</label>
                <input type="text" name="peo3_title" value="{{ old('peo3_title', $item->peo3_title) }}"
                       placeholder="Contoh: Eksplorasi Pembelajaran Seumur Hidup"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">PEO-3: Deskripsi</label>
                <textarea name="peo3_desc" rows="2" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('peo3_desc', $item->peo3_desc) }}</textarea>
            </div>

            <button type="submit" class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-700">Simpan</button>
        </form>
    </div>
</x-layouts.admin>
