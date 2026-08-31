<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SemesterAntara extends Model
{
        protected $table = 'semester_antara';
    protected $fillable = ['deskripsi', 'cover', 'file'];
}
