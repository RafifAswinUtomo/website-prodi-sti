<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\GraduateProfile;

class ProfilController extends Controller
{
    public function show(string $slug)
    {
        if ($slug === 'profil-lulusan') {
            $profiles = GraduateProfile::orderBy('urutan')->get();

            return view('site.profil.lulusan', compact('profiles'));
        }

        $page = Page::where('slug', $slug)->firstOrFail();

        return view('site.profil.show', compact('page'));
    }
}
