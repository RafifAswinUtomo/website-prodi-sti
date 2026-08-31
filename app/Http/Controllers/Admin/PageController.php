<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Peta slug -> jenis form. Tambahkan baris baru di sini kalau ada
     * halaman baru yang butuh field khusus.
     */
    protected function jenisForSlug(?string $slug): string
    {
        return match ($slug) {
            'visi-misi' => 'visimisi',
            'kurikulum' => 'dokumen',
            'e-learning' => 'link',
            default => 'teks',
        };
    }

    public function index()
    {
        $pages = Page::orderBy('judul')->get();

        return view('admin.pages.index', compact('pages'));
    }

    public function create(Request $request)
    {
        $slug = $request->get('slug');
        $jenis = $this->jenisForSlug($slug);

        return view('admin.pages.create', compact('slug', 'jenis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|string|max:255|unique:pages,slug',
            'judul' => 'required|string|max:255',
            'isi' => 'nullable|string',
            'badge' => 'nullable|string|max:255',
            'cover' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf|max:10240',
            'link_url' => 'nullable|url',
            'link_label' => 'nullable|string|max:255',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'tujuan' => 'nullable|string',
        ], [
            'slug.unique' => 'Slug ":input" sudah digunakan oleh halaman lain. Silakan edit halaman yang sudah ada, atau gunakan slug yang berbeda.',
            'slug.required' => 'Slug wajib diisi.',
            'judul.required' => 'Judul wajib diisi.',
            'link_url.url' => 'Link harus berupa URL yang valid, contoh: https://edlink.id',
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('pages/cover', 'public');
        }

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('pages/dokumen', 'public');
        }

        Page::create($validated);

        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil ditambahkan.');
    }

    public function edit(Page $page)
    {
        $jenis = $this->jenisForSlug($page->slug);

        return view('admin.pages.edit', compact('page', 'jenis'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'judul' => 'required|string|max:255',
            'isi' => 'nullable|string',
            'badge' => 'nullable|string|max:255',
            'cover' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf|max:10240',
            'link_url' => 'nullable|url',
            'link_label' => 'nullable|string|max:255',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'tujuan' => 'nullable|string',
        ], [
            'slug.unique' => 'Slug ":input" sudah digunakan oleh halaman lain. Silakan edit halaman yang sudah ada, atau gunakan slug yang berbeda.',
            'slug.required' => 'Slug wajib diisi.',
            'judul.required' => 'Judul wajib diisi.',
            'link_url.url' => 'Link harus berupa URL yang valid, contoh: https://edlink.id',
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('pages/cover', 'public');
        }

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('pages/dokumen', 'public');
        }

        $page->update($validated);

        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil diperbarui.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil dihapus.');
    }

    public function bySlug(string $slug)
    {
        $page = Page::where('slug', $slug)->first();

        if ($page) {
            return redirect()->route('admin.pages.edit', $page);
        }

        return redirect()->route('admin.pages.create', ['slug' => $slug]);
    }
}
