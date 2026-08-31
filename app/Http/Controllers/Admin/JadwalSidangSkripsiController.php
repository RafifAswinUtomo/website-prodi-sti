<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalSidangSkripsi;
use Illuminate\Http\Request;

class JadwalSidangSkripsiController extends Controller
{
    public function edit()
    {
        $item = JadwalSidangSkripsi::first() ?? new JadwalSidangSkripsi();

        return view('admin.jadwal-sidang-skripsi.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        $item = JadwalSidangSkripsi::first() ?? new JadwalSidangSkripsi();

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('jadwal-sidang-skripsi', 'public');
        }
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('jadwal-sidang-skripsi', 'public');
        }

        $item->fill($validated)->save();

        return redirect()->route('admin.jadwal-sidang-skripsi.edit')->with('success', 'Jadwal Sidang Skripsi berhasil disimpan.');
    }
}
