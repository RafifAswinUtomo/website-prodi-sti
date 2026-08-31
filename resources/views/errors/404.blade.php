<x-layouts.public title="Halaman Tidak Ditemukan">

    <section class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
        <p class="text-navy font-bold text-7xl mb-4">404</p>
        <h1 class="text-2xl font-semibold text-gray-800 mb-3">Halaman Tidak Ditemukan</h1>
        <p class="text-gray-500 mb-8">
            Maaf, halaman yang Anda cari tidak tersedia atau sudah dipindahkan.
        </p>
        <a href="{{ route('home') }}"
           class="inline-block bg-navy hover:bg-navy-dark text-white font-medium px-6 py-3 rounded">
            Kembali ke Beranda
        </a>
    </section>

</x-layouts.public>
