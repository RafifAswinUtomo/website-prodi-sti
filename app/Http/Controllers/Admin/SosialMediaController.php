<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Support\SettingsCache;
use Illuminate\Http\Request;

class SosialMediaController extends Controller
{
    protected array $keys = [
        'sosmed1_handle',
        'sosmed1_desc',
        'sosmed1_link', // Instagram STI
        'sosmed2_handle',
        'sosmed2_desc',
        'sosmed2_link', // Instagram HIMASTI
        'sosmed3_handle',
        'sosmed3_desc',
        'sosmed3_link', // TikTok STI
        'sosmed4_handle',
        'sosmed4_desc',
        'sosmed4_link', // TikTok HIMASTI
    ];

    public function edit()
    {
        $settings = Setting::whereIn('key', $this->keys)->pluck('value', 'key');

        return view('admin.sosial-media.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'sosmed1_handle' => 'nullable|string|max:100',
            'sosmed1_desc' => 'nullable|string|max:255',
            'sosmed1_link' => 'nullable|string|max:255',
            'sosmed2_handle' => 'nullable|string|max:100',
            'sosmed2_desc' => 'nullable|string|max:255',
            'sosmed2_link' => 'nullable|string|max:255',
            'sosmed3_handle' => 'nullable|string|max:100',
            'sosmed3_desc' => 'nullable|string|max:255',
            'sosmed3_link' => 'nullable|string|max:255',
            'sosmed4_handle' => 'nullable|string|max:100',
            'sosmed4_desc' => 'nullable|string|max:255',
            'sosmed4_link' => 'nullable|string|max:255',
        ]);

        foreach ($this->keys as $key) {
            Setting::updateOrCreate(['key' => $key], ['value' => $validated[$key] ?? null]);
        }

        SettingsCache::flush();

        return redirect()->route('admin.sosial-media.edit')->with('success', 'Kanal Media Sosial berhasil disimpan.');
    }
}
