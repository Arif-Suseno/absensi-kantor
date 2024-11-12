<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
       // Relasi ke model User (satu Kon bisa dimiliki oleh banyak User)
       public function users()
       {
           return $this->hasMany(User::class);
       }
    /** @use HasFactory<\Database\Factories\KontrakFactory> */
    use HasFactory;
    protected $table = 'kontrak';
}
