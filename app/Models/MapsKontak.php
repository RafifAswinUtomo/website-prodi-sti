<?php

namespace App\Models;

use App\Models\Concerns\ClearsHomeCache;
use Illuminate\Database\Eloquent\Model;

class MapsKontak extends Model
{
    use ClearsHomeCache;

    protected $table = 'maps_kontak';
    protected $fillable = ['nama_kaprodi', 'whatsapp_kaprodi', 'maps_embed', 'whatsapp_pmb'];
}
