<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Support\SettingsCache;
use Illuminate\Http\Request;

class PilarKompetensiController extends Controller
{
    protected array $keys = [
        'pilar_title',
        'pilar_desc',
        'pilar1_title',
        'pilar1_desc',
        'pilar1_skills',
        'pilar1_bg',
        'pilar2_title',
        'pilar2_desc',
        'pilar2_skills',
        'pilar2_bg',
        'pilar3_title',
        'pilar3_desc',
        'pilar3_skills',
        'pilar3_bg',
    ];

    public function edit()
    {
        $settings = Setting::whereIn('key', $this->keys)->pluck('value', 'key');

        return view('admin.pilar-kompetensi.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'pilar_title' => 'nullable|string|max:255',
            'pilar_desc' => 'nullable|string',
            'pilar1_title' => 'nullable|string|max:255',
            'pilar1_desc' => 'nullable|string',
            'pilar1_skills' => 'nullable|string|max:255',
            'pilar1_bg' => 'nullable|image|max:4096',
            'pilar2_title' => 'nullable|string|max:255',
            'pilar2_desc' => 'nullable|string',
            'pilar2_skills' => 'nullable|string|max:255',
            'pilar2_bg' => 'nullable|image|max:4096',
            'pilar3_title' => 'nullable|string|max:255',
            'pilar3_desc' => 'nullable|string',
            'pilar3_skills' => 'nullable|string|max:255',
            'pilar3_bg' => 'nullable|image|max:4096',
        ]);

        $textKeys = [
            'pilar_title',
            'pilar_desc',
            'pilar1_title',
            'pilar1_desc',
            'pilar1_skills',
            'pilar2_title',
            'pilar2_desc',
            'pilar2_skills',
            'pilar3_title',
            'pilar3_desc',
            'pilar3_skills',
        ];

        foreach ($textKeys as $key) {
            Setting::updateOrCreate(['key' => $key], ['value' => $validated[$key] ?? null]);
        }

        foreach (['pilar1_bg', 'pilar2_bg', 'pilar3_bg'] as $imgKey) {
            if ($request->hasFile($imgKey)) {
                $path = $request->file($imgKey)->store('settings', 'public');
                Setting::updateOrCreate(['key' => $imgKey], ['value' => $path]);
            }
        }

        SettingsCache::flush();

        return redirect()->route('admin.pilar-kompetensi.edit')->with('success', 'Bidang Kompetensi Keilmuan berhasil disimpan.');
    }
}
