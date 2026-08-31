<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Praktisi Industri</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('admin.praktisi-industri.update', $item) }}" method="POST" enctype="multipart/form-data">
                    @include('admin.praktisi-industri._form')
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
