<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DosenProdi;
use Illuminate\Http\Request;

class DosenProdiController extends Controller
{
    public function index()
    {
        $dosenList = DosenProdi::orderBy('urutan')->get();

        return view('admin.dosen-prodi.index', compact('dosenList'));
    }

    public function create()
    {
        return view('admin.dosen-prodi.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('dosen-prodi', 'public');
        }

        DosenProdi::create($validated);

        return redirect()->route('admin.dosen-prodi.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function edit(DosenProdi $dosenProdi)
    {
        return view('admin.dosen-prodi.edit', ['dosen' => $dosenProdi]);
    }

    public function update(Request $request, DosenProdi $dosenProdi)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('dosen-prodi', 'public');
        }

        $dosenProdi->update($validated);

        return redirect()->route('admin.dosen-prodi.index')->with('success', 'Dosen berhasil diperbarui.');
    }

    public function destroy(DosenProdi $dosenProdi)
    {
        $dosenProdi->delete();

        return redirect()->route('admin.dosen-prodi.index')->with('success', 'Dosen berhasil dihapus.');
    }

    protected function validated(Request $request): array
    {
        return $request->validate([
            'nama' => 'required|string|max:255',
            'nidn' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:255',
            'foto' => 'nullable|image|max:2048',
            'edukasi_terakhir' => 'nullable|string|max:255',
            'keahlian' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'ruang_kerja' => 'nullable|string|max:255',
            'riwayat_pendidikan' => 'nullable|string',
            'mata_kuliah' => 'nullable|string',
            'riset_publikasi' => 'nullable|string',
            'urutan' => 'nullable|integer',
        ]);
    }
}
