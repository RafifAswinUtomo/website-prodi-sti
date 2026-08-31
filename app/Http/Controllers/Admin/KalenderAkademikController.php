<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KalenderAkademik;
use Illuminate\Http\Request;

class KalenderAkademikController extends Controller
{
    public function edit()
    {
        $item = KalenderAkademik::first() ?? new KalenderAkademik();

        return view('admin.kalender-akademik.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        $item = KalenderAkademik::first() ?? new KalenderAkademik();

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('kalender-akademik', 'public');
        }
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('kalender-akademik', 'public');
        }

        $item->fill($validated)->save();

        return redirect()->route('admin.kalender-akademik.edit')->with('success', 'Kalender Akademik berhasil disimpan.');
    }
}
