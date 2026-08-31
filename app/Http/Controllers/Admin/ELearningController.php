<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ELearning;
use Illuminate\Http\Request;

class ELearningController extends Controller
{
    public function edit()
    {
        $eLearning = ELearning::first() ?? new ELearning();

        return view('admin.e-learning.edit', compact('eLearning'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'link_label' => 'nullable|string|max:255',
            'link_url' => 'nullable|url',
        ], [
            'link_url.url' => 'Link harus berupa URL yang valid, contoh: https://edlink.id',
        ]);

        $eLearning = ELearning::first() ?? new ELearning();

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('e-learning', 'public');
        }

        $eLearning->fill($validated)->save();

        return redirect()->route('admin.e-learning.edit')->with('success', 'E-learning berhasil disimpan.');
    }
}
