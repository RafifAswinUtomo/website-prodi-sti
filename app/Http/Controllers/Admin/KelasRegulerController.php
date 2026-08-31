<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KelasReguler;
use Illuminate\Http\Request;

class KelasRegulerController extends Controller
{
    public function edit()
    {
        $kelas = KelasReguler::first() ?? new KelasReguler();

        return view('admin.kelas-reguler.edit', compact('kelas'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'link' => 'nullable|url|string|max:2048',
        ]);

        $kelas = KelasReguler::first() ?? new KelasReguler();

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('kelas-reguler', 'public');
        }

        $kelas->fill($validated)->save();

        return redirect()->route('admin.kelas-reguler.edit')->with('success', 'Kelas Reguler berhasil disimpan.');
    }
}
