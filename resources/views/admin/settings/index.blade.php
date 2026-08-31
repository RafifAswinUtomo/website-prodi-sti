<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pengaturan Situs
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if (!empty($settings['logo']))
                        <div class="mb-4">
                            <img loading="lazy" src="{{ asset('storage/' . $settings['logo']) }}" class="h-16">
                        </div>
                    @endif

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Logo</label>
                        <input type="file" name="logo" accept="image/*" class="mt-1 block w-full">
                        @error('logo') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama Program Studi</label>
                        <input type="text" name="nama_prodi" value="{{ old('nama_prodi', $settings['nama_prodi'] ?? '') }}"
                               placeholder="Contoh: S1 Sistem Teknologi Informasi"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama Kampus</label>
                        <input type="text" name="nama_kampus" value="{{ old('nama_kampus', $settings['nama_kampus'] ?? '') }}"
                               placeholder="Contoh: Universitas Ivet"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea name="alamat" rows="3"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('alamat', $settings['alamat'] ?? '') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Telepon</label>
                        <input type="text" name="telepon" value="{{ old('telepon', $settings['telepon'] ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $settings['email'] ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Instagram (link)</label>
                        <input type="text" name="instagram" value="{{ old('instagram', $settings['instagram'] ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Facebook (link)</label>
                        <input type="text" name="facebook" value="{{ old('facebook', $settings['facebook'] ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">YouTube (link)</label>
                        <input type="text" name="youtube" value="{{ old('youtube', $settings['youtube'] ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
{{-- ══════════ HERO BERANDA ══════════ --}}
                    <hr class="my-6">
                    <h3 class="text-lg font-bold text-blue-900 mb-4">Hero Beranda</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Badge Hero (teks kecil di atas judul)</label>
                        <input type="text" name="hero_badge" value="{{ old('hero_badge', $settings['hero_badge'] ?? '') }}"
                               placeholder="Contoh: Fakultas Sains dan Teknologi"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Link Pendaftaran (tombol amber)</label>
                        <input type="text" name="pmb_link" value="{{ old('pmb_link', $settings['pmb_link'] ?? '') }}"
                               placeholder="Contoh: https://pmb.unisvet.ac.id/"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Link Repository STI</label>
    <input type="text" name="repository_sti_link" value="{{ old('repository_sti_link', $settings['repository_sti_link'] ?? '') }}"
           placeholder="Contoh: https://repository.sti-unisvet.ac.id/"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    <p class="text-xs text-gray-500 mt-1">Dipakai oleh menu Akademik → Repository STI (buka tab baru). Bisa diisi/diganti kapan saja setelah situs repository-nya online.</p>
</div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Gambar Latar Hero</label>
                        @if (!empty($settings['hero_bg']))
                            <img loading="lazy" src="{{ asset('storage/' . $settings['hero_bg']) }}" class="h-20 rounded mb-2">
                        @endif
                        <input type="file" name="hero_bg" accept="image/*" class="mt-1 block w-full">
                        @error('hero_bg') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- ══════════ BROSUR PMB ══════════ --}}
                    <hr class="my-6">
                    <h3 class="text-lg font-bold text-blue-900 mb-4">Brosur PMB (panel kanan hero)</h3>

   <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Brosur 1</label>
                        @if (!empty($settings['brosur_1']))
                            <img loading="lazy" src="{{ asset('storage/' . $settings['brosur_1']) }}" class="h-24 rounded mb-2">
                        @endif
                        <input type="file" name="brosur_1" accept="image/*" class="mt-1 block w-full mb-2">
                        <input type="text" name="brosur_1_caption" value="{{ old('brosur_1_caption', $settings['brosur_1_caption'] ?? '') }}"
                               placeholder="Contoh: Detail Kurikulum & Biaya Kuliah"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Brosur 2</label>
                        @if (!empty($settings['brosur_2']))
                            <img loading="lazy" src="{{ asset('storage/' . $settings['brosur_2']) }}" class="h-24 rounded mb-2">
                        @endif
                        <input type="file" name="brosur_2" accept="image/*" class="mt-1 block w-full mb-2">
                        <input type="text" name="brosur_2_caption" value="{{ old('brosur_2_caption', $settings['brosur_2_caption'] ?? '') }}"
                               placeholder="Contoh: Detail Beasiswa & Pendaftaran"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-sm">
                    </div>
                    <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">
                        Simpan Pengaturan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
