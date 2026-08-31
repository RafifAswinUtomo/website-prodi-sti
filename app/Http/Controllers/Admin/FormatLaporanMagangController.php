<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormatLaporanMagang;
use Illuminate\Http\Request;

class FormatLaporanMagangController extends Controller
{
    public function edit()
    {
        $formatLaporanMagang = FormatLaporanMagang::first() ?? new FormatLaporanMagang();

        return view('admin.format-laporan-magang.edit', compact('formatLaporanMagang'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf|max:10240',
        ]);

        $formatLaporanMagang = FormatLaporanMagang::first() ?? new FormatLaporanMagang();

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('format-laporan-magang', 'public');
        }

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('format-laporan-magang', 'public');
        }

        $formatLaporanMagang->fill($validated)->save();

        return redirect()->route('admin.format-laporan-magang.edit')->with('success', 'Format Laporan Magang berhasil disimpan.');
    }
}
