<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkripsiTugasAkhir;
use Illuminate\Http\Request;

class SkripsiTugasAkhirController extends Controller
{
    public function index()
    {
        $items = SkripsiTugasAkhir::orderBy('urutan')->get();

        return view('admin.skripsi-tugas-akhir.index', compact('items'));
    }

    public function create()
    {
        return view('admin.skripsi-tugas-akhir.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|mimes:pdf|max:10240',
            'urutan' => 'required|integer',
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('skripsi-tugas-akhir', 'public');
        }

        SkripsiTugasAkhir::create($validated);

        return redirect()->route('admin.skripsi-tugas-akhir.index')->with('success', 'Item berhasil ditambahkan.');
    }

    public function edit(SkripsiTugasAkhir $skripsiTugasAkhir)
    {
        return view('admin.skripsi-tugas-akhir.edit', ['item' => $skripsiTugasAkhir]);
    }

    public function update(Request $request, SkripsiTugasAkhir $skripsiTugasAkhir)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|mimes:pdf|max:10240',
            'urutan' => 'required|integer',
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('skripsi-tugas-akhir', 'public');
        }

        $skripsiTugasAkhir->update($validated);

        return redirect()->route('admin.skripsi-tugas-akhir.index')->with('success', 'Item berhasil diperbarui.');
    }

    public function destroy(SkripsiTugasAkhir $skripsiTugasAkhir)
    {
        $skripsiTugasAkhir->delete();

        return redirect()->route('admin.skripsi-tugas-akhir.index')->with('success', 'Item berhasil dihapus.');
    }
}
