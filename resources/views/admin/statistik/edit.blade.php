<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Statistik Ringkas (Beranda)</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 rounded bg-green-100 text-green-800 px-4 py-2 text-sm">{{ session('success') }}</div>
                @endif

                <p class="text-sm text-gray-500 mb-6">4 kartu statistik yang tampil di bawah slider beranda. Kosongkan semua field satu kartu jika ingin menyembunyikannya.</p>

                <form action="{{ route('admin.statistik.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    @for ($i = 1; $i <= 4; $i++)
                        <hr class="my-6 first:mt-0 first:border-0">
                        <h3 class="text-lg font-bold text-blue-900 mb-4">Kartu {{ $i }}</h3>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Label (teks kecil di atas)</label>
                            <input type="text" name="stat{{ $i }}_label" value="{{ old("stat{$i}_label", $settings["stat{$i}_label"] ?? '') }}"
                                   placeholder="Contoh: Akreditasi Prodi"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nilai (angka/teks besar)</label>
                            <input type="text" name="stat{{ $i }}_val" value="{{ old("stat{$i}_val", $settings["stat{$i}_val"] ?? '') }}"
                                   placeholder="Contoh: BAIK / 180+ / 92%"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Keterangan (teks kecil di bawah)</label>
                            <input type="text" name="stat{{ $i }}_sub" value="{{ old("stat{$i}_sub", $settings["stat{$i}_sub"] ?? '') }}"
                                   placeholder="Contoh: BAN-PT Resmi"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                    @endfor

                    <div class="flex gap-2 mt-6">
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Simpan</button>
                        <a href="{{ route('admin.settings.index') }}" class="px-4 py-2 rounded border">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
