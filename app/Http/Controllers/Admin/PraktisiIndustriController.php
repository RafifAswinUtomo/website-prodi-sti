<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PraktisiIndustri;
use Illuminate\Http\Request;

class PraktisiIndustriController extends Controller
{
    public function index()
    {
        $items = PraktisiIndustri::orderBy('urutan')->get();

        return view('admin.praktisi-industri.index', compact('items'));
    }

    public function create()
    {
        return view('admin.praktisi-industri.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('praktisi-industri', 'public');
        }

        PraktisiIndustri::create($validated);

        return redirect()->route('admin.praktisi-industri.index')->with('success', 'Praktisi industri berhasil ditambahkan.');
    }

    public function edit(PraktisiIndustri $praktisiIndustri)
    {
        return view('admin.praktisi-industri.edit', ['item' => $praktisiIndustri]);
    }

    public function update(Request $request, PraktisiIndustri $praktisiIndustri)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('praktisi-industri', 'public');
        }

        $praktisiIndustri->update($validated);

        return redirect()->route('admin.praktisi-industri.index')->with('success', 'Praktisi industri berhasil diperbarui.');
    }

    public function destroy(PraktisiIndustri $praktisiIndustri)
    {
        $praktisiIndustri->delete();

        return redirect()->route('admin.praktisi-industri.index')->with('success', 'Praktisi industri berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'instansi' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
            'urutan' => 'nullable|integer',
        ]);
    }
}
