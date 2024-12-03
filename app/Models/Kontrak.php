<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kontrak extends Model
{
    use HasFactory;

    protected $table = 'kontrak';

    /**
     * Fields that can be mass assigned.
     */
    protected $fillable = [
        'jenis_kontrak',
        'durasi_kontrak',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi',
    ];

    /**
     * Accessor: Format tanggal_mulai (opsional).
     */
    public function getFormattedTanggalMulaiAttribute()
    {
        return date('d-m-Y', strtotime($this->tanggal_mulai));
    }

    /**
     * Accessor: Format tanggal_selesai (opsional).
     */
    public function getFormattedTanggalSelesaiAttribute()
    {
        return $this->tanggal_selesai
            ? date('d-m-Y', strtotime($this->tanggal_selesai))
            : null;
    }
}
