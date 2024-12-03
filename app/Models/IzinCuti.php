<?php

// app/Models/IzinCuti.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinCuti extends Model
{
    use HasFactory;

    protected $table = 'cuti_izin';  // Menentukan nama tabel jika berbeda

    protected $fillable = [
        'user_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'jenis',
        'alasan',
        'status',
    ];

    // Relasi dengan tabel users (jika ada)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
