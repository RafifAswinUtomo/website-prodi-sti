<x-layouts.admin title="Maps & Kontak PMB">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Kelola Maps & Kontak PMB</h2>
        <p class="text-sm text-gray-500 mt-1">Tampil di bagian bawah Beranda</p>
    </x-slot>

    <div class="bg-white border rounded-lg p-6 max-w-2xl">
        <form action="{{ route('admin.maps-kontak.update') }}" method="POST">
            @csrf

<div class="border-b pb-4 mb-4">
    <p class="text-sm font-semibold text-gray-700 mb-3">Ketua Program Studi</p>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama Ketua Program Studi</label>
        <input type="text" name="nama_kaprodi" value="{{ old('nama_kaprodi', $item->nama_kaprodi) }}"
               placeholder="Contoh: Fahmy Zuhda Bahtiar, M.Pd"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nomor WhatsApp Ketua Program Studi</label>
        <input type="text" name="whatsapp_kaprodi" value="{{ old('whatsapp_kaprodi', $item->whatsapp_kaprodi) }}"
               placeholder="6281234567890"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        <p class="text-xs text-gray-400 mt-1">Awali kode negara (62), tanpa tanda + atau spasi.</p>
    </div>
</div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Link Embed Google Maps</label>
                <textarea name="maps_embed" rows="3"
                          placeholder="Buka Google Maps > cari lokasi > Share > Embed a map > salin isi atribut src&quot;...&quot; dari kode iframe"
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('maps_embed', $item->maps_embed) }}</textarea>
                <p class="text-xs text-gray-400 mt-1">Cukup tempel URL dari atribut src iframe Google Maps, bukan seluruh kode HTML-nya.</p>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Nomor WhatsApp PMB</label>
                <input type="text" name="whatsapp_pmb" value="{{ old('whatsapp_pmb', $item->whatsapp_pmb) }}"
                       placeholder="6281234567890"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <p class="text-xs text-gray-400 mt-1">Awali kode negara (62), tanpa tanda + atau spasi.</p>
            </div>

            <button type="submit" class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-dark">Simpan</button>
        </form>
    </div>
</x-layouts.admin>
