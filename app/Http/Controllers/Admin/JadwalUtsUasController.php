<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalUtsUas;
use Illuminate\Http\Request;

class JadwalUtsUasController extends Controller
{
    public function edit()
    {
        $item = JadwalUtsUas::first() ?? new JadwalUtsUas();

        return view('admin.jadwal-uts-uas.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        $item = JadwalUtsUas::first() ?? new JadwalUtsUas();

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('jadwal-uts-uas', 'public');
        }
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('jadwal-uts-uas', 'public');
        }

        $item->fill($validated)->save();

        return redirect()->route('admin.jadwal-uts-uas.edit')->with('success', 'Jadwal UTS/UAS berhasil disimpan.');
    }
}
