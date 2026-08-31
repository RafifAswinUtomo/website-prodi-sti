<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Halaman</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" name="slug" value="{{ old('slug', $page->slug) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('slug') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul', $page->judul) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('judul') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    @if ($jenis === 'teks')
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Isi</label>
                            <textarea name="isi" rows="10"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('isi', $page->isi) }}</textarea>
                        </div>
                    @endif

                    @if ($jenis === 'dokumen')
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                            <textarea name="isi" rows="3"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('isi', $page->isi) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Badge / Label Singkat</label>
                            <input type="text" name="badge" value="{{ old('badge', $page->badge) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Cover / Gambar Sampul</label>
                            @if ($page->cover)
                                <img loading="lazy" src="{{ asset('storage/' . $page->cover) }}" class="h-24 rounded mb-2">
                            @endif
                            <input type="file" name="cover" accept="image/*" class="mt-1 block w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">File Dokumen (PDF)</label>
                            @if ($page->file)
                                <p class="text-sm text-gray-500 mb-1">
                                    File saat ini: <a href="{{ asset('storage/' . $page->file) }}" target="_blank" class="text-blue-700 hover:underline">lihat file</a>
                                </p>
                            @endif
                            <input type="file" name="file" accept=".pdf" class="mt-1 block w-full">
                        </div>
                    @endif

                    @if ($jenis === 'link')
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                            <textarea name="isi" rows="3"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('isi', $page->isi) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Gambar</label>
                            @if ($page->cover)
                                <img loading="lazy" src="{{ asset('storage/' . $page->cover) }}" class="h-24 rounded mb-2">
                            @endif
                            <input type="file" name="cover" accept="image/*" class="mt-1 block w-full">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Teks Tombol</label>
                            <input type="text" name="link_label" value="{{ old('link_label', $page->link_label) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">URL Tujuan</label>
                            <input type="text" name="link_url" value="{{ old('link_url', $page->link_url) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('link_url') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    @endif

                    @if ($jenis === 'visimisi')
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Visi</label>
                            <textarea name="visi" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('visi', $page->visi) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Misi (satu poin per baris)</label>
                            <textarea name="misi" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('misi', $page->misi) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Tujuan (satu poin per baris)</label>
                            <textarea name="tujuan" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('tujuan', $page->tujuan) }}</textarea>
                        </div>
                    @endif

                    <div class="flex gap-2 border-t pt-4 mt-4">
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">
                            Update
                        </button>
                        <a href="{{ route('admin.pages.index') }}" class="px-4 py-2 rounded border">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
