<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type', 'pengumuman');

        $posts = Post::where('type', $type)
            ->orderByDesc('tanggal')
            ->get();

        return view('admin.posts.index', compact('posts', 'type'));
    }

    public function create(Request $request)
    {
        $type = $request->get('type', 'pengumuman');

        return view('admin.posts.create', compact('type'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:pengumuman,prestasi,kerjasama,kegiatan',
            'kategori' => 'nullable|string|max:255',
            'judul' => 'required|string|max:255',
            'isi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
            'tanggal' => 'nullable|date',
            'lampiran' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('posts', 'public');
        }

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')->store('posts/lampiran', 'public');
        }

        Post::create($validated);

        return redirect()->route('admin.posts.index', ['type' => $validated['type']])
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'type' => 'required|in:pengumuman,prestasi,kerjasama,kegiatan',
            'judul' => 'required|string|max:255',
            'isi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
            'tanggal' => 'nullable|date',
            'lampiran' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('posts', 'public');
        }

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')->store('posts/lampiran', 'public');
        }

        $post->update($validated);

        return redirect()->route('admin.posts.index', ['type' => $validated['type']])
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $type = $post->type;
        $post->delete();

        return redirect()->route('admin.posts.index', ['type' => $type])
            ->with('success', 'Data berhasil dihapus.');
    }
}
