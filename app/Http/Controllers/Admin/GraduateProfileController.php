<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GraduateProfile;
use Illuminate\Http\Request;

class GraduateProfileController extends Controller
{
    public function index()
    {
        $profiles = GraduateProfile::orderBy('urutan')->get();

        return view('admin.graduate-profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.graduate-profiles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'urutan' => 'required|integer',
        ]);

        GraduateProfile::create($validated);

        return redirect()->route('admin.graduate-profiles.index')->with('success', 'Profil lulusan berhasil ditambahkan.');
    }

    public function edit(GraduateProfile $graduateProfile)
    {
        return view('admin.graduate-profiles.edit', compact('graduateProfile'));
    }

    public function update(Request $request, GraduateProfile $graduateProfile)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'urutan' => 'required|integer',
        ]);

        $graduateProfile->update($validated);

        return redirect()->route('admin.graduate-profiles.index')->with('success', 'Profil lulusan berhasil diperbarui.');
    }

    public function destroy(GraduateProfile $graduateProfile)
    {
        $graduateProfile->delete();

        return redirect()->route('admin.graduate-profiles.index')->with('success', 'Profil lulusan berhasil dihapus.');
    }
}
