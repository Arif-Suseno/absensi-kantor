<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    
    // Relasi ke model User (satu Jabatan bisa dimiliki oleh banyak User)
  public function users()
  {
      return $this->hasMany(User::class);
  }
    
    /** @use HasFactory<\Database\Factories\JabatanFactory> */
    use HasFactory;
    // nama tabel
    protected $table = 'jabatan';

    use HasFactory;

    protected $fillable = [
        'nama_jabatan',
        'deskripsi',
    ];
}

