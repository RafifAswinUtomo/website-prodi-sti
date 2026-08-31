<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SejarahMilestone;
use App\Models\Setting;
use Illuminate\Http\Request;

class SejarahMilestoneController extends Controller
{
    protected array $bannerKeys = ['sejarah_title', 'sejarah_desc', 'sejarah_bg'];

    public function index()
    {
        $milestones = SejarahMilestone::orderBy('tahun')->get();
        $settings = Setting::whereIn('key', $this->bannerKeys)->pluck('value', 'key');

        return view('admin.sejarah-milestones.index', compact('milestones', 'settings'));
    }

    public function updateBanner(Request $request)
    {
        $validated = $request->validate([
            'sejarah_title' => 'nullable|string|max:255',
            'sejarah_desc' => 'nullable|string',
            'sejarah_bg' => 'nullable|image|max:4096',
        ]);

        foreach (['sejarah_title', 'sejarah_desc'] as $key) {
            Setting::updateOrCreate(['key' => $key], ['value' => $validated[$key] ?? null]);
        }

        if ($request->hasFile('sejarah_bg')) {
            $path = $request->file('sejarah_bg')->store('settings', 'public');
            Setting::updateOrCreate(['key' => 'sejarah_bg'], ['value' => $path]);
        }

        return redirect()->route('admin.sejarah-milestones.index')->with('success', 'Judul section berhasil disimpan.');
    }

    public function create()
    {
        return view('admin.sejarah-milestones.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun' => 'required|integer|digits:4',
            'judul' => 'required|string|max:255',
            'badge' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'poin' => 'nullable|string',
        ]);

        SejarahMilestone::create($validated);

        return redirect()->route('admin.sejarah-milestones.index')->with('success', 'Milestone berhasil ditambahkan.');
    }

    public function edit(SejarahMilestone $sejarahMilestone)
    {
        return view('admin.sejarah-milestones.edit', ['milestone' => $sejarahMilestone]);
    }

    public function update(Request $request, SejarahMilestone $sejarahMilestone)
    {
        $validated = $request->validate([
            'tahun' => 'required|integer|digits:4',
            'judul' => 'required|string|max:255',
            'badge' => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'poin' => 'nullable|string',
        ]);

        $sejarahMilestone->update($validated);

        return redirect()->route('admin.sejarah-milestones.index')->with('success', 'Milestone berhasil diperbarui.');
    }

    public function destroy(SejarahMilestone $sejarahMilestone)
    {
        $sejarahMilestone->delete();

        return redirect()->route('admin.sejarah-milestones.index')->with('success', 'Milestone berhasil dihapus.');
    }
}
