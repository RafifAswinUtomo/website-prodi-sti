<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->get('kategori');

        $facilities = Facility::when($kategori, fn ($q) => $q->where('kategori', $kategori))
            ->latest()
            ->get();

        return view('site.facilities.index', compact('facilities', 'kategori'));
    }
}
