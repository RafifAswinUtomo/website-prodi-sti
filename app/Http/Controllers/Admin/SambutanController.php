<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Support\SettingsCache;
use Illuminate\Http\Request;

class SambutanController extends Controller
{
    protected array $keys = [
        'kaprodi_nama',
        'kaprodi_jabatan',
        'kaprodi_nidn',
        'kaprodi_foto',
        'kaprodi_judul',
        'kaprodi_sambutan',
        'kaprodi_sambutan2',
        'rektor_nama',
        'rektor_jabatan',
        'rektor_nidn',
        'rektor_foto',
        'rektor_judul',
        'rektor_sambutan',
        'rektor_sambutan2',
    ];

    public function edit()
    {
        $settings = Setting::whereIn('key', $this->keys)->pluck('value', 'key');

        return view('admin.sambutan.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'kaprodi_nama' => 'nullable|string|max:255',
            'kaprodi_jabatan' => 'nullable|string|max:255',
            'kaprodi_nidn' => 'nullable|string|max:100',
            'kaprodi_judul' => 'nullable|string|max:255',
            'kaprodi_sambutan' => 'nullable|string',
            'kaprodi_sambutan2' => 'nullable|string',
            'kaprodi_foto' => 'nullable|image|max:2048',
            'rektor_nama' => 'nullable|string|max:255',
            'rektor_jabatan' => 'nullable|string|max:255',
            'rektor_nidn' => 'nullable|string|max:100',
            'rektor_judul' => 'nullable|string|max:255',
            'rektor_sambutan' => 'nullable|string',
            'rektor_sambutan2' => 'nullable|string',
            'rektor_foto' => 'nullable|image|max:2048',
        ]);

        $textKeys = [
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
        ];

        foreach ($textKeys as $key) {
            Setting::updateOrCreate(['key' => $key], ['value' => $validated[$key] ?? null]);
        }

        foreach (['kaprodi_foto', 'rektor_foto'] as $imgKey) {
            if ($request->hasFile($imgKey)) {
                $path = $request->file($imgKey)->store('settings', 'public');
                Setting::updateOrCreate(['key' => $imgKey], ['value' => $path]);
            }
        }

        SettingsCache::flush();

        return redirect()->route('admin.sambutan.edit')->with('success', 'Sambutan Pimpinan berhasil disimpan.');
    }
}
