<?php

namespace App\Http\Controllers;

use App\Models\PraktisiIndustri;

class PraktisiIndustriController extends Controller
{
    public function index()
    {
        $items = PraktisiIndustri::orderBy('urutan')->get();

        return view('site.praktisi-industri.index', compact('items'));
    }
}
