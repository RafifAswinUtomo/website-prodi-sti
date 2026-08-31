<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisuda;
use Illuminate\Http\Request;

class WisudaController extends Controller
{
    public function edit()
    {
        $item = Wisuda::first() ?? new Wisuda();

        return view('admin.wisuda.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        $item = Wisuda::first() ?? new Wisuda();

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('wisuda', 'public');
        }
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('wisuda', 'public');
        }

        $item->fill($validated)->save();

        return redirect()->route('admin.wisuda.edit')->with('success', 'Wisuda berhasil disimpan.');
    }
}
