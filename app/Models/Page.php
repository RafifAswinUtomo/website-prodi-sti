<?php

namespace App\Models;

use App\Models\Concerns\ClearsHomeCache;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use ClearsHomeCache;

    protected $fillable = ['slug', 'judul', 'isi', 'cover', 'file', 'badge', 'link_url', 'link_label', 'visi', 'misi', 'tujuan'];
}
