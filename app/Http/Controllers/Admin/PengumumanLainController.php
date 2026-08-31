<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengumumanLain;
use Illuminate\Http\Request;

class PengumumanLainController extends Controller
{
    public function index()
    {
        $items = PengumumanLain::orderBy('urutan')->get();

        return view('admin.pengumuman-lain.index', compact('items'));
    }

    public function create()
    {
        return view('admin.pengumuman-lain.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|mimes:pdf,doc,docx|max:10240',
            'urutan' => 'required|integer',
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('pengumuman-lain', 'public');
        }

        PengumumanLain::create($validated);

        return redirect()->route('admin.pengumuman-lain.index')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function edit(PengumumanLain $pengumumanLain)
    {
        return view('admin.pengumuman-lain.edit', ['item' => $pengumumanLain]);
    }

    public function update(Request $request, PengumumanLain $pengumumanLain)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|mimes:pdf,doc,docx|max:10240',
            'urutan' => 'required|integer',
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('pengumuman-lain', 'public');
        }

        $pengumumanLain->update($validated);

        return redirect()->route('admin.pengumuman-lain.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy(PengumumanLain $pengumumanLain)
    {
        $pengumumanLain->delete();

        return redirect()->route('admin.pengumuman-lain.index')->with('success', 'Pengumuman berhasil dihapus.');
    }
}
