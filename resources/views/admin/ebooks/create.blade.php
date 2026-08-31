<x-layouts.admin title="Tambah E-book">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Tambah E-book Baru</h2>
    </x-slot>

    <div class="bg-white border rounded-lg p-6 max-w-3xl">
        <form action="{{ route('admin.ebooks.store') }}" method="POST" enctype="multipart/form-data">
            @include('admin.ebooks._form')
        </form>
    </div>
</x-layouts.admin>
