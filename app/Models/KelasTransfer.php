<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasTransfer extends Model
{
    protected $table = 'kelas_transfer';
    protected $fillable = ['deskripsi', 'cover', 'file', 'link'];
}
