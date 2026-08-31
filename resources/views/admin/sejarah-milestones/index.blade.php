<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Sejarah Pendirian & Perkembangan</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('success'))
                <div class="rounded bg-green-100 text-green-800 px-4 py-2 text-sm">{{ session('success') }}</div>
            @endif

            {{-- ══════════ JUDUL SECTION (BANNER) ══════════ --}}
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-bold text-blue-900 mb-4">Judul Section (Banner)</h3>
                <form action="{{ route('admin.sejarah-milestones.banner.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="sejarah_title" value="{{ old('sejarah_title', $settings['sejarah_title'] ?? '') }}"
                               placeholder="Contoh: Sejarah Pendirian & Perkembangan"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                        <textarea name="sejarah_desc" rows="2"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('sejarah_desc', $settings['sejarah_desc'] ?? '') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Gambar Latar Banner (opsional)</label>
                        @if (!empty($settings['sejarah_bg']))
                            <img loading="lazy" src="{{ asset('storage/' . $settings['sejarah_bg']) }}" class="h-20 rounded mb-2">
                        @endif
                        <input type="file" name="sejarah_bg" accept="image/*" class="mt-1 block w-full">
                    </div>

                    <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800 text-sm">Simpan Judul Section</button>
                </form>
            </div>

            {{-- ══════════ DAFTAR TAHUN ══════════ --}}
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <p class="text-sm text-gray-500">Setiap tahun akan tampil sebagai tab di beranda, diurutkan otomatis dari yang terlama.</p>
                    <a href="{{ route('admin.sejarah-milestones.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800 text-sm shrink-0 ml-4">
                        + Tambah Tahun
                    </a>
                </div>

                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left border-b border-gray-200 text-gray-500">
                            <th class="py-2 pr-4">Tahun</th>
                            <th class="py-2 pr-4">Judul</th>
                            <th class="py-2 pr-4">Badge</th>
                            <th class="py-2 pr-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($milestones as $m)
                            <tr class="border-b border-gray-100">
                                <td class="py-2.5 pr-4 font-bold text-navy">{{ $m->tahun }}</td>
                                <td class="py-2.5 pr-4">{{ $m->judul }}</td>
                                <td class="py-2.5 pr-4 text-gray-500">{{ $m->badge }}</td>
                                <td class="py-2.5 pr-4 text-right whitespace-nowrap">
                                    <a href="{{ route('admin.sejarah-milestones.edit', $m) }}" class="text-blue-900 hover:underline">Edit</a>
                                    <form action="{{ route('admin.sejarah-milestones.destroy', $m) }}" method="POST" class="inline" onsubmit="return confirm('Hapus tahun {{ $m->tahun }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline ml-3">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="py-6 text-center text-gray-400">Belum ada data. Klik "+ Tambah Tahun" untuk mulai.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>
