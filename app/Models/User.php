<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
      // Relasi ke model Jabatan (satu User memiliki satu Jabatan)
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

      // Relasi ke model Kontrak (satu User memiliki satu Kontrak)
    public function kontrak()
    {
        return $this->belongsTo(Kontrak::class);
    }
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $table = 'users';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
        ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // Relasi ke model Jabatan (satu User memiliki satu Jabatan)

    // Relasi ke model Kontrak (satu User memiliki satu Kontrak)
    
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

public function cutiIzin()
{
    return $this->hasMany(CutiIzin::class);
}
}
