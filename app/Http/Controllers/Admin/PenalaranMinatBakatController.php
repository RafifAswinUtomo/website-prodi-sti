<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PenalaranMinatBakat;
use Illuminate\Http\Request;

class PenalaranMinatBakatController extends Controller
{
    public function index()
    {
        $items = PenalaranMinatBakat::orderBy('urutan')->get();

        return view('admin.penalaran-minat-bakat.index', compact('items'));
    }

    public function create()
    {
        return view('admin.penalaran-minat-bakat.create');
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
            $validated['foto'] = $request->file('foto')->store('penalaran-minat-bakat', 'public');
        }
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('penalaran-minat-bakat', 'public');
        }

        PenalaranMinatBakat::create($validated);

        return redirect()->route('admin.penalaran-minat-bakat.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(PenalaranMinatBakat $penalaranMinatBakat)
    {
        return view('admin.penalaran-minat-bakat.edit', ['item' => $penalaranMinatBakat]);
    }

    public function update(Request $request, PenalaranMinatBakat $penalaranMinatBakat)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf,doc,docx|max:10240',
            'urutan' => 'required|integer',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('penalaran-minat-bakat', 'public');
        }
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('penalaran-minat-bakat', 'public');
        }

        $penalaranMinatBakat->update($validated);

        return redirect()->route('admin.penalaran-minat-bakat.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(PenalaranMinatBakat $penalaranMinatBakat)
    {
        $penalaranMinatBakat->delete();

        return redirect()->route('admin.penalaran-minat-bakat.index')->with('success', 'Data berhasil dihapus.');
    }
}
