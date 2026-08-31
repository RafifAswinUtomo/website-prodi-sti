<?php

namespace App\Http\Controllers;

use App\Models\Practitioner;

class PractitionerController extends Controller
{
    public function index()
    {
        $practitioners = Practitioner::latest()->get();

        return view('site.practitioners.index', compact('practitioners'));
    }
}
