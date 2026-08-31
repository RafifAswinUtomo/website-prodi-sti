<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TracerStudi;
use Illuminate\Http\Request;

class TracerStudiController extends Controller
{
    public function edit()
    {
        $tracerStudi = TracerStudi::first() ?? new TracerStudi();

        return view('admin.tracer-studi.edit', compact('tracerStudi'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'link_label' => 'nullable|string|max:255',
            'link_url' => 'nullable|url',
        ]);

        $tracerStudi = TracerStudi::first() ?? new TracerStudi();

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('tracer-studi', 'public');
        }

        $tracerStudi->fill($validated)->save();

        return redirect()->route('admin.tracer-studi.edit')->with('success', 'Tracer Studi berhasil disimpan.');
    }
}
