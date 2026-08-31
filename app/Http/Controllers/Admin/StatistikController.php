<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Support\SettingsCache;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    protected array $keys = [
        'stat1_label',
        'stat1_val',
        'stat1_sub',
        'stat2_label',
        'stat2_val',
        'stat2_sub',
        'stat3_label',
        'stat3_val',
        'stat3_sub',
        'stat4_label',
        'stat4_val',
        'stat4_sub',
    ];

    public function edit()
    {
        $settings = Setting::whereIn('key', $this->keys)->pluck('value', 'key');

        return view('admin.statistik.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'stat1_label' => 'nullable|string|max:100',
            'stat1_val' => 'nullable|string|max:50',
            'stat1_sub' => 'nullable|string|max:100',
            'stat2_label' => 'nullable|string|max:100',
            'stat2_val' => 'nullable|string|max:50',
            'stat2_sub' => 'nullable|string|max:100',
            'stat3_label' => 'nullable|string|max:100',
            'stat3_val' => 'nullable|string|max:50',
            'stat3_sub' => 'nullable|string|max:100',
            'stat4_label' => 'nullable|string|max:100',
            'stat4_val' => 'nullable|string|max:50',
            'stat4_sub' => 'nullable|string|max:100',
        ]);

        foreach ($this->keys as $key) {
            Setting::updateOrCreate(['key' => $key], ['value' => $validated[$key] ?? null]);
        }

        SettingsCache::flush();

        return redirect()->route('admin.statistik.edit')->with('success', 'Statistik Ringkas berhasil disimpan.');
    }
}
