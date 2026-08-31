<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('urutan')->get();

        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'judul_baris2' => 'nullable|string|max:255',
            'judul_sorot' => 'nullable|string|max:255',
            'subjudul' => 'nullable|string|max:255',
            'gambar' => 'required|image|max:2048',
            'tombol_teks' => 'nullable|string|max:255',
            'tombol_link' => 'nullable|string|max:255',
            'urutan' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $validated['gambar'] = $request->file('gambar')->store('sliders', 'public');
        $validated['is_active'] = $request->boolean('is_active');

        Slider::create($validated);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider berhasil ditambahkan.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'judul_baris2' => 'nullable|string|max:255',
            'judul_sorot' => 'nullable|string|max:255',
            'subjudul' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|max:2048',
            'tombol_teks' => 'nullable|string|max:255',
            'tombol_link' => 'nullable|string|max:255',
            'urutan' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('sliders', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');

        $slider->update($validated);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider berhasil diperbarui.');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider berhasil dihapus.');
    }
}
