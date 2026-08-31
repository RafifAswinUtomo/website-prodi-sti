<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Support\SettingsCache;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected array $keys = [
        'nama_prodi',
        'nama_kampus',
        'alamat',
        'telepon',
        'email',
        'instagram',
        'facebook',
        'youtube',
        'logo',
        // Hero beranda
        'hero_badge',
        'hero_bg',
        'pmb_link',
        'repository_sti_link',
        // Sambutan Kaprodi
        'kaprodi_nama',
        'kaprodi_jabatan',
        'kaprodi_nidn',
        'kaprodi_foto',
        'kaprodi_judul',
        'kaprodi_sambutan',
        'kaprodi_sambutan2',
        // Sambutan Rektor
        'rektor_nama',
        'rektor_jabatan',
        'rektor_nidn',
        'rektor_foto',
        'rektor_judul',
        'rektor_sambutan',
        'rektor_sambutan2',
        // Brosur PMB
        'brosur_1',
        'brosur_1_caption',
        'brosur_2',
        'brosur_2_caption',
    ];

    public function index()
    {
        $settings = Setting::whereIn('key', $this->keys)->pluck('value', 'key');

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama_prodi' => 'nullable|string|max:255',
            'nama_kampus' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
            // Hero
            'hero_badge' => 'nullable|string|max:255',
            'pmb_link' => 'nullable|string|max:255',
            'repository_sti_link' => 'nullable|string|max:255',
            'hero_bg' => 'nullable|image|max:4096',
            // Sambutan Kaprodi
            'kaprodi_nama' => 'nullable|string|max:255',
            'kaprodi_jabatan' => 'nullable|string|max:255',
            'kaprodi_nidn' => 'nullable|string|max:100',
            'kaprodi_sambutan' => 'nullable|string',
            'kaprodi_foto' => 'nullable|image|max:2048',
            'kaprodi_judul' => 'nullable|string|max:255',
            'kaprodi_sambutan2' => 'nullable|string',
            // Sambutan Rektor
            'rektor_nama' => 'nullable|string|max:255',
            'rektor_jabatan' => 'nullable|string|max:255',
            'rektor_nidn' => 'nullable|string|max:100',
            'rektor_sambutan' => 'nullable|string',
            'rektor_foto' => 'nullable|image|max:2048',
            'rektor_judul' => 'nullable|string|max:255',
            'rektor_sambutan2' => 'nullable|string',
            // Brosur
            'brosur_1' => 'nullable|image|max:4096',
            'brosur_1_caption' => 'nullable|string|max:255',
            'brosur_2' => 'nullable|image|max:4096',
            'brosur_2_caption' => 'nullable|string|max:255',
        ]);

        foreach (
            [
                'nama_prodi',
                'nama_kampus',
                'alamat',
                'telepon',
                'email',
                'instagram',
                'facebook',
                'youtube',
                'hero_badge',
                'pmb_link',
                'repository_sti_link',
                'kaprodi_nama',
                'kaprodi_jabatan',
                'kaprodi_nidn',
                'kaprodi_judul',
                'kaprodi_sambutan',
                'kaprodi_sambutan2',
                'rektor_nama',
                'rektor_jabatan',
                'rektor_nidn',
                'rektor_judul',
                'rektor_sambutan',
                'rektor_sambutan2',
                'brosur_1_caption',
                'brosur_2_caption',
            ] as $key
        ) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $validated[$key] ?? null]
            );
        }

        foreach (['logo', 'hero_bg', 'kaprodi_foto', 'rektor_foto', 'brosur_1', 'brosur_2'] as $imgKey) {
            if ($request->hasFile($imgKey)) {
                $path = $request->file($imgKey)->store('settings', 'public');
                Setting::updateOrCreate(['key' => $imgKey], ['value' => $path]);
            }
        }

        SettingsCache::flush();

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan situs berhasil disimpan.');
    }
}
