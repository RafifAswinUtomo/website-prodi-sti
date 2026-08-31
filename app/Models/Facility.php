<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = ['nama', 'kategori', 'foto', 'deskripsi', 'perlengkapan'];
}
