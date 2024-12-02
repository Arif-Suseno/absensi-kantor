<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CutiIzin extends Model
{
    protected $table = 'cuti_izin';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
