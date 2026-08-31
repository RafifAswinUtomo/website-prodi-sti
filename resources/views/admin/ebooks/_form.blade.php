@csrf
@isset($item)
    @method('PUT')
@endisset

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block text-sm font-medium text-gray-700">Judul</label>
        <input type="text" name="judul" value="{{ old('judul', $item->judul ?? '') }}"
               placeholder="Contoh: Software Engineering, 2nd Edition"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('judul') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Penulis</label>
        <input type="text" name="penulis" value="{{ old('penulis', $item->penulis ?? '') }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('penulis') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
    <div>
        <label class="block text-sm font-medium text-gray-700">Kategori</label>
        <select name="kategori" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($kategoriList as $k)
                <option value="{{ $k }}" @selected(old('kategori', $item->kategori ?? '') === $k)>{{ $k }}</option>
            @endforeach
        </select>
        @error('kategori') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Tahun Terbit</label>
        <input type="text" name="tahun" maxlength="4" value="{{ old('tahun', $item->tahun ?? '') }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('tahun') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Jumlah Halaman</label>
        <input type="number" name="halaman" value="{{ old('halaman', $item->halaman ?? '') }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @error('halaman') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
    <textarea name="deskripsi" rows="3"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
    @error('deskripsi') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label class="block text-sm font-medium text-gray-700">Sampul / Cover (opsional)</label>
        @isset($item)
            @if ($item->cover)
                <img loading="lazy" src="{{ asset('storage/' . $item->cover) }}" class="h-28 w-20 object-cover rounded border border-gray-200 mb-2">
            @endif
        @endisset
        <input type="file" name="cover" accept="image/*" class="mt-1 block w-full">
        @error('cover') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">File PDF</label>
        @isset($item)
            @if ($item->file)
                <a href="{{ asset('storage/' . $item->file) }}" target="_blank" class="text-blue-700 text-sm hover:underline block mb-2">File saat ini ({{ $item->ukuran_format }})</a>
            @endif
        @endisset
        <input type="file" name="file" accept=".pdf" class="mt-1 block w-full">
        <p class="text-xs text-gray-500 mt-1">Maks 50MB.</p>
        @error('file') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mb-6">
    <label class="block text-sm font-medium text-gray-700">Urutan Tampil</label>
    <input type="number" name="urutan" value="{{ old('urutan', $item->urutan ?? 0) }}"
           class="mt-1 block w-32 border-gray-300 rounded-md shadow-sm">
</div>

<div class="flex gap-2">
    <button type="submit" class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-dark">Simpan</button>
    <a href="{{ route('admin.ebooks.index') }}" class="px-4 py-2 rounded border">Batal</a>
</div>
