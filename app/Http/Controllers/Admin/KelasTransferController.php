<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KelasTransfer;
use Illuminate\Http\Request;

class KelasTransferController extends Controller
{
    public function edit()
    {
        $kelas = KelasTransfer::first() ?? new KelasTransfer();

        return view('admin.kelas-transfer.edit', compact('kelas'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'link' => 'nullable|url|string|max:2048',
        ]);

        $kelas = KelasTransfer::first() ?? new KelasTransfer();

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('kelas-transfer', 'public');
        }

        $kelas->fill($validated)->save();

        return redirect()->route('admin.kelas-transfer.edit')->with('success', 'Kelas Transfer berhasil disimpan.');
    }
}
