<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MapsKontak;
use Illuminate\Http\Request;

class MapsKontakController extends Controller
{
    public function edit()
    {
        $item = MapsKontak::first() ?? new MapsKontak();

        return view('admin.maps-kontak.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama_kaprodi' => 'nullable|string|max:255',
            'whatsapp_kaprodi' => 'nullable|string|max:20',
            'maps_embed' => 'nullable|string',
            'whatsapp_pmb' => 'nullable|string|max:20',
        ]);

        $item = MapsKontak::first() ?? new MapsKontak();
        $item->fill($validated)->save();

        return redirect()->route('admin.maps-kontak.edit')->with('success', 'Maps & Kontak PMB berhasil disimpan.');
    }
}
