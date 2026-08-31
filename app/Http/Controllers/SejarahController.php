<?php

namespace App\Http\Controllers;

use App\Models\SejarahMilestone;

class SejarahController extends Controller
{
    public function index()
    {
        $milestones = SejarahMilestone::orderBy('tahun')->get();

        return view('site.profil.sejarah', compact('milestones'));
    }
}
