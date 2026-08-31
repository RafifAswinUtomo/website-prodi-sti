<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Support\SettingsCache;
use Illuminate\Http\Request;

class ProspekKarirController extends Controller
{
    protected array $keys = [
        'prospek_title',
        'prospek_desc',
        'prospek1_title',
        'prospek1_desc',
        'prospek2_title',
        'prospek2_desc',
        'prospek3_title',
        'prospek3_desc',
        'prospek4_title',
        'prospek4_desc',
    ];

    public function edit()
    {
        $settings = Setting::whereIn('key', $this->keys)->pluck('value', 'key');

        return view('admin.prospek-karir.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'prospek_title' => 'nullable|string|max:255',
            'prospek_desc' => 'nullable|string',
            'prospek1_title' => 'nullable|string|max:255',
            'prospek1_desc' => 'nullable|string',
            'prospek2_title' => 'nullable|string|max:255',
            'prospek2_desc' => 'nullable|string',
            'prospek3_title' => 'nullable|string|max:255',
            'prospek3_desc' => 'nullable|string',
            'prospek4_title' => 'nullable|string|max:255',
            'prospek4_desc' => 'nullable|string',
        ]);

        foreach ($this->keys as $key) {
            Setting::updateOrCreate(['key' => $key], ['value' => $validated[$key] ?? null]);
        }

        SettingsCache::flush();

        return redirect()->route('admin.prospek-karir.edit')->with('success', 'Prospek Karir Lulusan berhasil disimpan.');
    }
}
