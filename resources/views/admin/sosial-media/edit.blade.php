<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kanal Media Sosial (Beranda)</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 rounded bg-green-100 text-green-800 px-4 py-2 text-sm">{{ session('success') }}</div>
                @endif

                <form action="{{ route('admin.sosial-media.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    @php
                        $labels = [
                            1 => 'Instagram STI',
                            2 => 'Instagram HIMASTI',
                            3 => 'TikTok STI',
                            4 => 'TikTok HIMASTI',
                        ];
                        $placeholders = [
                            1 => ['@sti_unisvet', 'Program Studi Sistem & Teknologi Informasi Universitas Ivet', 'https://www.instagram.com/sti_unisvet'],
                            2 => ['@himasti_ivet', 'Himpunan Mahasiswa Sistem & Teknologi Informasi Unisvet', 'https://www.instagram.com/himasti_ivet'],
                            3 => ['@sti_unisvet', 'Video kreatif seputar teknologi, edukasi, & aktivitas kampus STI', 'https://www.tiktok.com/@sti_unisvet'],
                            4 => ['@himastiivet', 'Dokumentasi keseruan acara, tips kemahasiswaan, & konten HIMASTI', 'https://www.tiktok.com/@himastiivet'],
                        ];
                    @endphp

                    @for ($i = 1; $i <= 4; $i++)
                        <hr class="my-6 first:mt-0 first:border-0">
                        <h3 class="text-lg font-bold text-blue-900 mb-4">{{ $labels[$i] }}</h3>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Username / Handle</label>
                            <input type="text" name="sosmed{{ $i }}_handle" value="{{ old("sosmed{$i}_handle", $settings["sosmed{$i}_handle"] ?? '') }}"
                                   placeholder="{{ $placeholders[$i][0] }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                            <input type="text" name="sosmed{{ $i }}_desc" value="{{ old("sosmed{$i}_desc", $settings["sosmed{$i}_desc"] ?? '') }}"
                                   placeholder="{{ $placeholders[$i][1] }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Link Akun</label>
                            <input type="text" name="sosmed{{ $i }}_link" value="{{ old("sosmed{$i}_link", $settings["sosmed{$i}_link"] ?? '') }}"
                                   placeholder="{{ $placeholders[$i][2] }}"
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
