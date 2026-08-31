<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeritaProdi;
use App\Models\Setting;
use App\Support\SettingsCache;
use Illuminate\Http\Request;

class BeritaProdiController extends Controller
{
    protected array $bannerKeys = ['berita_title', 'berita_desc', 'berita_bg'];

    public function index()
    {
        $kategori = request()->query('kategori');

        $beritaList = BeritaProdi::when($kategori, fn($q) => $q->where('kategori', $kategori))
            ->orderBy('urutan')
            ->orderByDesc('tanggal')
            ->get();

        $settings = Setting::whereIn('key', $this->bannerKeys)->pluck('value', 'key');

        return view('admin.berita-prodi.index', compact('beritaList', 'settings'));
    }

    public function updateBanner(Request $request)
    {
        $validated = $request->validate([
            'berita_title' => 'nullable|string|max:255',
            'berita_desc' => 'nullable|string',
            'berita_bg' => 'nullable|image|max:4096',
        ]);

        foreach (['berita_title', 'berita_desc'] as $key) {
            Setting::updateOrCreate(['key' => $key], ['value' => $validated[$key] ?? null]);
        }

        if ($request->hasFile('berita_bg')) {
            $path = $request->file('berita_bg')->store('settings', 'public');
            Setting::updateOrCreate(['key' => 'berita_bg'], ['value' => $path]);
        }

        SettingsCache::flush();

        return redirect()->route('admin.berita-prodi.index')->with('success', 'Judul section berhasil disimpan.');
    }

    public function create()
    {
        return view('admin.berita-prodi.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita-prodi', 'public');
        }

        BeritaProdi::create($validated);

        return redirect()->route('admin.berita-prodi.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(BeritaProdi $beritaProdi)
    {
        return view('admin.berita-prodi.edit', ['berita' => $beritaProdi]);
    }

    public function update(Request $request, BeritaProdi $beritaProdi)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita-prodi', 'public');
        }

        $beritaProdi->update($validated);

        return redirect()->route('admin.berita-prodi.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(BeritaProdi $beritaProdi)
    {
        $beritaProdi->delete();

        return redirect()->route('admin.berita-prodi.index')->with('success', 'Berita berhasil dihapus.');
    }

protected function validated(Request $request): array
{
    $data = $request->validate([
        'judul' => 'required|string|max:255',
        'kategori' => 'required|in:berita,kegiatan,prestasi,kerjasama',
        'gambar' => 'nullable|image|max:2048',
        'tanggal' => 'nullable|date',
        'ringkasan' => 'nullable|string',
        'konten' => 'nullable|string',
        'urutan' => 'nullable|integer',
    ]);

    // Checkbox tidak terkirim sama sekali kalau tidak dicentang,
    // jadi set eksplisit supaya "uncheck" beneran ke-update ke false.
    $data['tampil_beranda'] = $request->boolean('tampil_beranda');

    return $data;
}
}
