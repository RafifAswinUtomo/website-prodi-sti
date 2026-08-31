<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lsp extends Model
{
    protected $table = 'lsp';
    protected $fillable = ['deskripsi', 'cover', 'link_label', 'link_url'];
}
