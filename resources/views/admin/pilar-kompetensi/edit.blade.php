<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Bidang Kompetensi Keilmuan</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 rounded bg-green-100 text-green-800 px-4 py-2 text-sm">{{ session('success') }}</div>
                @endif

                <form action="{{ route('admin.pilar-kompetensi.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h3 class="text-lg font-bold text-blue-900 mb-4">Judul Section</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="pilar_title" value="{{ old('pilar_title', $settings['pilar_title'] ?? '') }}"
                               placeholder="Contoh: Bidang Kompetensi Keilmuan"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                        <textarea name="pilar_desc" rows="2"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('pilar_desc', $settings['pilar_desc'] ?? '') }}</textarea>
                    </div>

                    {{-- ══════════ PILAR 1 ══════════ --}}
                    <hr class="my-6">
                    <h3 class="text-lg font-bold text-blue-900 mb-4">Kartu 1</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul Kartu</label>
                        <input type="text" name="pilar1_title" value="{{ old('pilar1_title', $settings['pilar1_title'] ?? '') }}"
                               placeholder="Contoh: Sistem Informasi Bisnis"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="pilar1_desc" rows="3"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('pilar1_desc', $settings['pilar1_desc'] ?? '') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tag Keahlian (pisahkan dengan koma)</label>
                        <input type="text" name="pilar1_skills" value="{{ old('pilar1_skills', $settings['pilar1_skills'] ?? '') }}"
                               placeholder="Contoh: Enterprise Architecture, Data Analytics, IT Project Management"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Gambar Latar Kartu (opsional)</label>
                        @if (!empty($settings['pilar1_bg']))
                            <img loading="lazy" src="{{ asset('storage/' . $settings['pilar1_bg']) }}" class="h-20 rounded mb-2">
                        @endif
                        <input type="file" name="pilar1_bg" accept="image/*" class="mt-1 block w-full">
                    </div>

                    {{-- ══════════ PILAR 2 ══════════ --}}
                    <hr class="my-6">
                    <h3 class="text-lg font-bold text-blue-900 mb-4">Kartu 2</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul Kartu</label>
                        <input type="text" name="pilar2_title" value="{{ old('pilar2_title', $settings['pilar2_title'] ?? '') }}"
                               placeholder="Contoh: Teknologi Informasi & Cloud"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="pilar2_desc" rows="3"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('pilar2_desc', $settings['pilar2_desc'] ?? '') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tag Keahlian (pisahkan dengan koma)</label>
                        <input type="text" name="pilar2_skills" value="{{ old('pilar2_skills', $settings['pilar2_skills'] ?? '') }}"
                               placeholder="Contoh: Cloud Solutions, Linux Sysadmin, Cyber Security"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Gambar Latar Kartu (opsional)</label>
                        @if (!empty($settings['pilar2_bg']))
                            <img loading="lazy" src="{{ asset('storage/' . $settings['pilar2_bg']) }}" class="h-20 rounded mb-2">
                        @endif
                        <input type="file" name="pilar2_bg" accept="image/*" class="mt-1 block w-full">
                    </div>

                    {{-- ══════════ PILAR 3 ══════════ --}}
                    <hr class="my-6">
                    <h3 class="text-lg font-bold text-blue-900 mb-4">Kartu 3</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul Kartu</label>
                        <input type="text" name="pilar3_title" value="{{ old('pilar3_title', $settings['pilar3_title'] ?? '') }}"
                               placeholder="Contoh: Rekayasa Perangkat Lunak"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="pilar3_desc" rows="3"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('pilar3_desc', $settings['pilar3_desc'] ?? '') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tag Keahlian (pisahkan dengan koma)</label>
                        <input type="text" name="pilar3_skills" value="{{ old('pilar3_skills', $settings['pilar3_skills'] ?? '') }}"
                               placeholder="Contoh: React & Node.js, Mobile App Dev, AI SDK Integration"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Gambar Latar Kartu (opsional)</label>
                        @if (!empty($settings['pilar3_bg']))
                            <img loading="lazy" src="{{ asset('storage/' . $settings['pilar3_bg']) }}" class="h-20 rounded mb-2">
                        @endif
                        <input type="file" name="pilar3_bg" accept="image/*" class="mt-1 block w-full">
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Simpan</button>
                        <a href="{{ route('admin.settings.index') }}" class="px-4 py-2 rounded border">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
