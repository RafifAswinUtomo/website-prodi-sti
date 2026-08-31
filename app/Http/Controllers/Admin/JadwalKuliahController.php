<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalKuliah;
use Illuminate\Http\Request;

class JadwalKuliahController extends Controller
{
    public function edit()
    {
        $jadwalKuliah = JadwalKuliah::first() ?? new JadwalKuliah();

        return view('admin.jadwal-kuliah.edit', compact('jadwalKuliah'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf|max:10240',
        ]);

        $jadwalKuliah = JadwalKuliah::first() ?? new JadwalKuliah();

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('jadwal-kuliah', 'public');
        }

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('jadwal-kuliah', 'public');
        }

        $jadwalKuliah->fill($validated)->save();

        return redirect()->route('admin.jadwal-kuliah.edit')->with('success', 'Jadwal Kuliah berhasil disimpan.');
    }
}
