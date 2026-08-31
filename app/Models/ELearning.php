<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ELearning extends Model
{
    protected $table = 'e_learning';
    protected $fillable = ['deskripsi', 'cover', 'link_label', 'link_url'];
}
