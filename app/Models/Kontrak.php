<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
