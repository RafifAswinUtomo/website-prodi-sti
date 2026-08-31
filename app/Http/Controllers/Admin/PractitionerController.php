<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Practitioner;
use Illuminate\Http\Request;

class PractitionerController extends Controller
{
    public function index()
    {
        $practitioners = Practitioner::latest()->get();

        return view('admin.practitioners.index', compact('practitioners'));
    }

    public function create()
    {
        return view('admin.practitioners.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('practitioners', 'public');
        }

        if ($request->hasFile('foto_kegiatan')) {
            $validated['foto_kegiatan'] = $request->file('foto_kegiatan')->store('practitioners/kegiatan', 'public');
        }

        Practitioner::create($validated);

        return redirect()->route('admin.practitioners.index')->with('success', 'Testimoni alumni berhasil ditambahkan.');
    }

    public function edit(Practitioner $practitioner)
    {
        return view('admin.practitioners.edit', compact('practitioner'));
    }

    public function update(Request $request, Practitioner $practitioner)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('practitioners', 'public');
        }

        if ($request->hasFile('foto_kegiatan')) {
            $validated['foto_kegiatan'] = $request->file('foto_kegiatan')->store('practitioners/kegiatan', 'public');
        }

        $practitioner->update($validated);

        return redirect()->route('admin.practitioners.index')->with('success', 'Testimoni alumni berhasil diperbarui.');
    }

    public function destroy(Practitioner $practitioner)
    {
        $practitioner->delete();

        return redirect()->route('admin.practitioners.index')->with('success', 'Testimoni alumni berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'instansi' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
            'foto_kegiatan' => 'nullable|image|max:4096',
        ]);
    }
}
