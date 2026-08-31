<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function edit()
    {
        $item = VisiMisi::first() ?? new VisiMisi();

        return view('admin.visi-misi.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'tujuan' => 'nullable|string',
            'karakter' => 'nullable|string',
            'peo1_title' => 'nullable|string|max:255',
            'peo1_desc' => 'nullable|string',
            'peo2_title' => 'nullable|string|max:255',
            'peo2_desc' => 'nullable|string',
            'peo3_title' => 'nullable|string|max:255',
            'peo3_desc' => 'nullable|string',
            'banner_bg' => 'nullable|image|max:4096',
        ]);

        $item = VisiMisi::first() ?? new VisiMisi();

        if ($request->hasFile('banner_bg')) {
            $validated['banner_bg'] = $request->file('banner_bg')->store('visi-misi', 'public');
        } else {
            unset($validated['banner_bg']);
        }

        $item->fill($validated)->save();

        return redirect()->route('admin.visi-misi.edit')->with('success', 'Visi, Misi & Tujuan berhasil disimpan.');
    }
}
