<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KelasKaryawan;
use Illuminate\Http\Request;

class KelasKaryawanController extends Controller
{
    public function edit()
    {
        $kelas = KelasKaryawan::first() ?? new KelasKaryawan();

        return view('admin.kelas-karyawan.edit', compact('kelas'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'link' => 'nullable|url|string|max:2048',
        ]);

        $kelas = KelasKaryawan::first() ?? new KelasKaryawan();

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('kelas-karyawan', 'public');
        }

        $kelas->fill($validated)->save();

        return redirect()->route('admin.kelas-karyawan.edit')->with('success', 'Kelas Karyawan berhasil disimpan.');
    }
}
