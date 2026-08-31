<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lsp;
use Illuminate\Http\Request;

class LspController extends Controller
{
    public function edit()
    {
        $lsp = Lsp::first() ?? new Lsp();

        return view('admin.lsp.edit', compact('lsp'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'link_label' => 'nullable|string|max:255',
            'link_url' => 'nullable|url',
        ]);

        $lsp = Lsp::first() ?? new Lsp();

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('lsp', 'public');
        }

        $lsp->fill($validated)->save();

        return redirect()->route('admin.lsp.edit')->with('success', 'LSP berhasil disimpan.');
    }
}
