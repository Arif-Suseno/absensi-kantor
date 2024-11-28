<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
class Absensi extends Model
{
    
    use HasFactory;

    protected $table = 'absensi';
    // Tambahkan atribut yang diizinkan untuk mass assignment

    protected $fillable = [
        'user_id',
        'tanggal',
        'waktu_masuk',
        'waktu_keluar',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
