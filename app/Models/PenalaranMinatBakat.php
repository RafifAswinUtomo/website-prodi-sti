<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenalaranMinatBakat extends Model
{
    protected $table = 'penalaran_minat_bakat';
    protected $fillable = ['judul', 'foto', 'deskripsi', 'file', 'urutan'];
}
