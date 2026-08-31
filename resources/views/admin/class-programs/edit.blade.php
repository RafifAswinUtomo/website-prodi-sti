<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Program Kelas</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('admin.class-programs.update', $classProgram) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama Program</label>
                        <input type="text" name="nama_program" value="{{ old('nama_program', $classProgram->nama_program) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('nama_program') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

  <div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Jenis Kelas</label>
    <select name="jenis_kelas" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        <option value="">- Pilih Jenis Kelas -</option>
        <option value="reguler" {{ old('jenis_kelas', $classProgram->jenis_kelas) === 'reguler' ? 'selected' : '' }}>Kelas Reguler</option>
        <option value="karyawan" {{ old('jenis_kelas', $classProgram->jenis_kelas) === 'karyawan' ? 'selected' : '' }}>Kelas Karyawan</option>
        <option value="transfer" {{ old('jenis_kelas', $classProgram->jenis_kelas) === 'transfer' ? 'selected' : '' }}>Kelas Transfer</option>
    </select>
</div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" rows="6"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('deskripsi', $classProgram->deskripsi) }}</textarea>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">
                            Update
                        </button>
                        <a href="{{ route('admin.class-programs.index') }}" class="px-4 py-2 rounded border">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
