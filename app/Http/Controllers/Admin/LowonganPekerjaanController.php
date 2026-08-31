<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LowonganPekerjaan;
use Illuminate\Http\Request;

class LowonganPekerjaanController extends Controller
{
    public function index()
    {
        $items = LowonganPekerjaan::orderBy('urutan')->get();

        return view('admin.lowongan-pekerjaan.index', compact('items'));
    }

    public function create()
    {
        return view('admin.lowongan-pekerjaan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kebutuhan' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf,doc,docx|max:10240',
            'urutan' => 'required|integer',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('lowongan-pekerjaan', 'public');
        }
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('lowongan-pekerjaan', 'public');
        }

        LowonganPekerjaan::create($validated);

        return redirect()->route('admin.lowongan-pekerjaan.index')->with('success', 'Lowongan berhasil ditambahkan.');
    }

    public function edit(LowonganPekerjaan $lowonganPekerjaan)
    {
        return view('admin.lowongan-pekerjaan.edit', ['item' => $lowonganPekerjaan]);
    }

    public function update(Request $request, LowonganPekerjaan $lowonganPekerjaan)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kebutuhan' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf,doc,docx|max:10240',
            'urutan' => 'required|integer',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('lowongan-pekerjaan', 'public');
        }
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('lowongan-pekerjaan', 'public');
        }

        $lowonganPekerjaan->update($validated);

        return redirect()->route('admin.lowongan-pekerjaan.index')->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function destroy(LowonganPekerjaan $lowonganPekerjaan)
    {
        $lowonganPekerjaan->delete();

        return redirect()->route('admin.lowongan-pekerjaan.index')->with('success', 'Lowongan berhasil dihapus.');
    }
}
