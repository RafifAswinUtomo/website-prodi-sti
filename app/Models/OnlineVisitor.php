<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineVisitor extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'session_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['session_id', 'last_activity'];
}
