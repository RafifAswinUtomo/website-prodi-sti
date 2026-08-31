<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformasiBeasiswa;
use Illuminate\Http\Request;

class InformasiBeasiswaController extends Controller
{
    public function index()
    {
        $items = InformasiBeasiswa::orderBy('urutan')->get();

        return view('admin.informasi-beasiswa.index', compact('items'));
    }

    public function create()
    {
        return view('admin.informasi-beasiswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf,doc,docx|max:10240',
            'urutan' => 'required|integer',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('informasi-beasiswa', 'public');
        }
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('informasi-beasiswa', 'public');
        }

        InformasiBeasiswa::create($validated);

        return redirect()->route('admin.informasi-beasiswa.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(InformasiBeasiswa $informasiBeasiswa)
    {
        return view('admin.informasi-beasiswa.edit', ['item' => $informasiBeasiswa]);
    }

    public function update(Request $request, InformasiBeasiswa $informasiBeasiswa)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf,doc,docx|max:10240',
            'urutan' => 'required|integer',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('informasi-beasiswa', 'public');
        }
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('informasi-beasiswa', 'public');
        }

        $informasiBeasiswa->update($validated);

        return redirect()->route('admin.informasi-beasiswa.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(InformasiBeasiswa $informasiBeasiswa)
    {
        $informasiBeasiswa->delete();

        return redirect()->route('admin.informasi-beasiswa.index')->with('success', 'Data berhasil dihapus.');
    }
}
