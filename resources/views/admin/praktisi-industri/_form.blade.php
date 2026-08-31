@csrf
@isset($item)
    @method('PUT')
@endisset

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Nama</label>
    <input type="text" name="nama" value="{{ old('nama', $item->nama ?? '') }}"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    @error('nama') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Jabatan / Peran</label>
    <input type="text" name="jabatan" value="{{ old('jabatan', $item->jabatan ?? '') }}"
           placeholder="Contoh: IT Manager, Dosen Praktisi"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Instansi</label>
    <input type="text" name="instansi" value="{{ old('instansi', $item->instansi ?? '') }}"
           placeholder="Contoh: PT Astra Otoparts"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Deskripsi / Bio</label>
    <textarea name="deskripsi" rows="4" placeholder="Latar belakang keahlian, kontribusi mengajar/mentoring, dsb."
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Foto</label>
    @isset($item)
        @if ($item->foto)
            <img src="{{ asset('storage/' . $item->foto) }}" class="h-24 w-24 object-cover rounded-full mb-2 border border-gray-200">
        @endif
    @endisset
    <input type="file" name="foto" accept="image/*" class="mt-1 block w-full">
    @error('foto') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-6">
    <label class="block text-sm font-medium text-gray-700">Urutan Tampil</label>
    <input type="number" name="urutan" value="{{ old('urutan', $item->urutan ?? 0) }}"
           class="mt-1 block w-32 border-gray-300 rounded-md shadow-sm">
</div>

<div class="flex gap-2">
    <button type="submit" class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-dark">Simpan</button>
    <a href="{{ route('admin.praktisi-industri.index') }}" class="px-4 py-2 rounded border">Batal</a>
</div>
