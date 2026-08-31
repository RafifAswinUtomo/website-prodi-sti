<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TracerStudi extends Model
{
    protected $table = 'tracer_studi';
    protected $fillable = ['deskripsi', 'cover', 'link_label', 'link_url'];
}
