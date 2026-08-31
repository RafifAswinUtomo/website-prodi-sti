<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Practitioner;
use App\Models\Facility;
use App\Models\ClassProgram;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            return view('dashboard');
        }

        $stats = [
            'sliders' => Slider::count(),
            'practitioners' => Practitioner::count(),
            'facilities' => Facility::count(),
            'class_programs' => ClassProgram::count(),
            'pengumuman' => Post::where('type', 'pengumuman')->count(),
            'prestasi' => Post::where('type', 'prestasi')->count(),
            'kerjasama' => Post::where('type', 'kerjasama')->count(),
            'kegiatan' => Post::where('type', 'kegiatan')->count(),
        ];

        return view('admin.dashboard', $stats);
    }
}
