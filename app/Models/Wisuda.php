<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisuda extends Model
{
        protected $table = 'wisuda';
    protected $fillable = ['deskripsi', 'cover', 'file'];
}
