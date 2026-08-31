<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ebook;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    public function index(Request $request)
    {
        $query = Ebook::orderBy('kategori')->orderBy('urutan')->orderBy('judul');

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->input('kategori'));
        }

        if ($request->filled('q')) {
            $keyword = $request->input('q');
            $query->where(function ($q) use ($keyword) {
                $q->where('judul', 'like', "%{$keyword}%")
                  ->orWhere('penulis', 'like', "%{$keyword}%");
            });
        }

        $items = $query->paginate(20)->withQueryString();

        return view('admin.ebooks.index', [
            'items' => $items,
            'kategoriList' => Ebook::KATEGORI,
        ]);
    }

    public function create()
    {
        return view('admin.ebooks.create', ['kategoriList' => Ebook::KATEGORI]);
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('ebooks/covers', 'public');
        }

        if ($request->hasFile('file')) {
            $uploaded = $request->file('file');
            $validated['file'] = $uploaded->store('ebooks/files', 'public');
            $validated['ukuran_bytes'] = $uploaded->getSize();
        }

        Ebook::create($validated);

        return redirect()->route('admin.ebooks.index')->with('success', 'E-book berhasil ditambahkan.');
    }

    public function edit(Ebook $ebook)
    {
        return view('admin.ebooks.edit', ['item' => $ebook, 'kategoriList' => Ebook::KATEGORI]);
    }

    public function update(Request $request, Ebook $ebook)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('ebooks/covers', 'public');
        }

        if ($request->hasFile('file')) {
            $uploaded = $request->file('file');
            $validated['file'] = $uploaded->store('ebooks/files', 'public');
            $validated['ukuran_bytes'] = $uploaded->getSize();
        }

        $ebook->update($validated);

        return redirect()->route('admin.ebooks.index')->with('success', 'E-book berhasil diperbarui.');
    }

    public function destroy(Ebook $ebook)
    {
        $ebook->delete();

        return redirect()->route('admin.ebooks.index')->with('success', 'E-book berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'nullable|string|max:255',
            'tahun' => 'nullable|digits:4',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf|max:51200',
            'halaman' => 'nullable|integer|min:1',
            'urutan' => 'nullable|integer',
        ]);
    }
}
