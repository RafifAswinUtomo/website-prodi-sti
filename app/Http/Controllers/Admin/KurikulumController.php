<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function edit()
    {
        $kurikulum = Kurikulum::first() ?? new Kurikulum();

        return view('admin.kurikulum.edit', compact('kurikulum'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'badge' => 'nullable|string|max:255',
            'cover' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf|max:10240',
        ]);

        $kurikulum = Kurikulum::first() ?? new Kurikulum();

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('kurikulum', 'public');
        }

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('kurikulum', 'public');
        }

        $kurikulum->fill($validated)->save();

        return redirect()->route('admin.kurikulum.edit')->with('success', 'Kurikulum berhasil disimpan.');
    }
}
