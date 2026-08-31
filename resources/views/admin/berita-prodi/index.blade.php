<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Berita & Kegiatan Prodi (Beranda)</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="rounded bg-green-100 text-green-800 px-4 py-2 text-sm">{{ session('success') }}</div>
            @endif

            {{-- ══════════ JUDUL SECTION (BANNER) ══════════ --}}
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-bold text-blue-900 mb-4">Judul Section (Banner)</h3>
                <p class="text-xs text-gray-400 mb-4">Judul & deskripsi ini dipakai baik di beranda maupun di halaman lengkap Berita &amp; Kegiatan.</p>
                <form action="{{ route('admin.berita-prodi.banner.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="berita_title" value="{{ old('berita_title', $settings['berita_title'] ?? '') }}"
                               placeholder="Contoh: Berita & Kegiatan Prodi STI"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                        <textarea name="berita_desc" rows="2"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('berita_desc', $settings['berita_desc'] ?? '') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Gambar Latar Banner (opsional)</label>
                        @if (!empty($settings['berita_bg']))
                            <img loading="lazy" src="{{ asset('storage/' . $settings['berita_bg']) }}" class="h-20 rounded mb-2">
                        @endif
                        <input type="file" name="berita_bg" accept="image/*" class="mt-1 block w-full">
                    </div>

                    <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800 text-sm">Simpan Judul Section</button>
                </form>
            </div>

            {{-- ══════════ DAFTAR BERITA ══════════ --}}
            <div class="bg-white shadow rounded-lg p-6">
      <div class="flex justify-between items-center mb-4">
    <p class="text-sm text-gray-500">
        Beranda sekarang dikurasi manual — centang <strong>"Tampilkan di Beranda"</strong> di form tiap item untuk memilih mana yang muncul. Semua data tetap tampil lengkap di halaman "Berita & Kegiatan" (menu navbar).
    </p>
    <a href="{{ route('admin.berita-prodi.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800 text-sm shrink-0 ml-4">
        + Tambah Berita
    </a>
</div>

{{-- Filter kategori --}}
@php $kategoriFilter = request()->query('kategori'); @endphp
<div class="flex flex-wrap gap-2 mb-4">
    <a href="{{ route('admin.berita-prodi.index') }}"
       class="px-3 py-1.5 rounded-full text-xs font-bold {{ is_null($kategoriFilter) ? 'bg-blue-900 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
        Semua
    </a>
    <a href="{{ route('admin.berita-prodi.index', ['kategori' => 'berita']) }}"
       class="px-3 py-1.5 rounded-full text-xs font-bold {{ $kategoriFilter === 'berita' ? 'bg-blue-900 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
        Berita
    </a>
    <a href="{{ route('admin.berita-prodi.index', ['kategori' => 'kegiatan']) }}"
       class="px-3 py-1.5 rounded-full text-xs font-bold {{ $kategoriFilter === 'kegiatan' ? 'bg-blue-900 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
        Kegiatan / Event
    </a>
    <a href="{{ route('admin.berita-prodi.index', ['kategori' => 'prestasi']) }}"
       class="px-3 py-1.5 rounded-full text-xs font-bold {{ $kategoriFilter === 'prestasi' ? 'bg-blue-900 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
        Prestasi
    </a>
    <a href="{{ route('admin.berita-prodi.index', ['kategori' => 'kerjasama']) }}"
       class="px-3 py-1.5 rounded-full text-xs font-bold {{ $kategoriFilter === 'kerjasama' ? 'bg-blue-900 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
        Kerja Sama
    </a>
</div>

<table class="w-full text-sm">
    <thead>
        <tr class="text-left border-b border-gray-200 text-gray-500">
            <th class="py-2 pr-4">Gambar</th>
            <th class="py-2 pr-4">Judul</th>
            <th class="py-2 pr-4">Kategori</th>
            <th class="py-2 pr-4">Tanggal</th>
            <th class="py-2 pr-4">Beranda</th>
            <th class="py-2 pr-4">Urutan</th>
            <th class="py-2 pr-4 text-right">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($beritaList as $b)
            <tr class="border-b border-gray-100">
                <td class="py-2.5 pr-4">
                    @if ($b->gambar)
                        <img loading="lazy" src="{{ asset('storage/' . $b->gambar) }}" class="h-10 w-14 object-cover rounded">
                    @else
                        <div class="h-10 w-14 rounded bg-gray-100"></div>
                    @endif
                </td>
                <td class="py-2.5 pr-4 font-bold text-navy">{{ $b->judul }}</td>
                <td class="py-2.5 pr-4 text-gray-500 capitalize">{{ $b->kategori }}</td>
                <td class="py-2.5 pr-4 text-gray-500">{{ optional($b->tanggal)->format('d M Y') }}</td>
                <td class="py-2.5 pr-4">
                    @if ($b->tampil_beranda)
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-bold bg-green-100 text-green-700">Ya</span>
                    @else
                        <span class="text-gray-300 text-[11px]">—</span>
                    @endif
                </td>
                <td class="py-2.5 pr-4 text-gray-500">{{ $b->urutan }}</td>
                <td class="py-2.5 pr-4 text-right whitespace-nowrap">
                    <a href="{{ route('admin.berita-prodi.edit', $b) }}" class="text-blue-900 hover:underline">Edit</a>
                    <form action="{{ route('admin.berita-prodi.destroy', $b) }}" method="POST" class="inline" onsubmit="return confirm('Hapus {{ $b->judul }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline ml-3">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7" class="py-6 text-center text-gray-400">Belum ada data untuk kategori ini.</td></tr>
        @endforelse
    </tbody>
</table>
            </div>
        </div>
    </div>
</x-layouts.admin>
