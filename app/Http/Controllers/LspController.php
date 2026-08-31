<?php

namespace App\Http\Controllers;

use App\Models\Lsp;

class LspController extends Controller
{
    public function show()
    {
        $lsp = Lsp::first();

        return view('site.facilities.lsp', compact('lsp'));
    }
}
