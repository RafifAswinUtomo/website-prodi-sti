<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassProgram;
use Illuminate\Http\Request;

class ClassProgramController extends Controller
{
    public function index()
    {
        $classPrograms = ClassProgram::latest()->get();

        return view('admin.class-programs.index', compact('classPrograms'));
    }

    public function create()
    {
        return view('admin.class-programs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_program' => 'required|string|max:255',
            'jenis_kelas' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        ClassProgram::create($validated);

        return redirect()->route('admin.class-programs.index')->with('success', 'Program kelas berhasil ditambahkan.');
    }

    public function edit(ClassProgram $classProgram)
    {
        return view('admin.class-programs.edit', compact('classProgram'));
    }

    public function update(Request $request, ClassProgram $classProgram)
    {
        $validated = $request->validate([
            'nama_program' => 'required|string|max:255',
            'jenis_kelas' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $classProgram->update($validated);

        return redirect()->route('admin.class-programs.index')->with('success', 'Program kelas berhasil diperbarui.');
    }

    public function destroy(ClassProgram $classProgram)
    {
        $classProgram->delete();

        return redirect()->route('admin.class-programs.index')->with('success', 'Program kelas berhasil dihapus.');
    }
}
