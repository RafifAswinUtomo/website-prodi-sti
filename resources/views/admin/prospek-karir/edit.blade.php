<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Prospek Karir Lulusan</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 rounded bg-green-100 text-green-800 px-4 py-2 text-sm">{{ session('success') }}</div>
                @endif

                <form action="{{ route('admin.prospek-karir.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <h3 class="text-lg font-bold text-blue-900 mb-4">Judul Section</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="prospek_title" value="{{ old('prospek_title', $settings['prospek_title'] ?? '') }}"
                               placeholder="Contoh: Prospek Karir Lulusan STI Universitas Ivet"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="prospek_desc" rows="3"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('prospek_desc', $settings['prospek_desc'] ?? '') }}</textarea>
                    </div>

                    @for ($i = 1; $i <= 4; $i++)
                        <hr class="my-6">
                        <h3 class="text-lg font-bold text-blue-900 mb-4">Peran {{ $i }}</h3>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Peran / Profesi</label>
                            <input type="text" name="prospek{{ $i }}_title" value="{{ old("prospek{$i}_title", $settings["prospek{$i}_title"] ?? '') }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                            <textarea name="prospek{{ $i }}_desc" rows="2"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old("prospek{$i}_desc", $settings["prospek{$i}_desc"] ?? '') }}</textarea>
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
