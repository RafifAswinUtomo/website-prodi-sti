<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PanduanMagang;
use Illuminate\Http\Request;

class PanduanMagangController extends Controller
{
    public function edit()
    {
        $panduanMagang = PanduanMagang::first() ?? new PanduanMagang();

        return view('admin.panduan-magang.edit', compact('panduanMagang'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf|max:10240',
        ]);

        $panduanMagang = PanduanMagang::first() ?? new PanduanMagang();

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('panduan-magang', 'public');
        }

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('panduan-magang', 'public');
        }

        $panduanMagang->fill($validated)->save();

        return redirect()->route('admin.panduan-magang.edit')->with('success', 'Panduan Magang berhasil disimpan.');
    }
}
