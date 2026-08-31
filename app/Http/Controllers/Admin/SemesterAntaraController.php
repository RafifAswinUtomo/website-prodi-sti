<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SemesterAntara;
use Illuminate\Http\Request;

class SemesterAntaraController extends Controller
{
    public function edit()
    {
        $item = SemesterAntara::first() ?? new SemesterAntara();

        return view('admin.semester-antara.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf,jpg,jpeg,png|max:10240',
        ]);

        $item = SemesterAntara::first() ?? new SemesterAntara();

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('semester-antara', 'public');
        }
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('semester-antara', 'public');
        }

        $item->fill($validated)->save();

        return redirect()->route('admin.semester-antara.edit')->with('success', 'Semester Antara berhasil disimpan.');
    }
}
