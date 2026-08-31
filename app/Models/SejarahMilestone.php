<?php

namespace App\Models;

use App\Models\Concerns\ClearsHomeCache;
use Illuminate\Database\Eloquent\Model;

class SejarahMilestone extends Model
{
    use ClearsHomeCache;

    protected $fillable = ['tahun', 'judul', 'badge', 'deskripsi', 'poin'];
}
