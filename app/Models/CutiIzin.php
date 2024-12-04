<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CutiIzin extends Model
{
    use HasFactory;

    
    //Relasi ke model User
    //Setiap pengajuan izin dibuat oleh seorang pengguna
    protected $table = 'cuti_izin';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Kolom yang dapat diisi
    protected $fillable = [
        'user_id',
        'jenis',
        'alasan',
        'status',
    ];


}
