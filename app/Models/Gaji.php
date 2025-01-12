<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $table = 'gaji';

    protected $fillable = [
        'id_dokter',
        'tanggal_ambil',
        'gaji',
    ];

    /**
     * Relasi ke model User sebagai dokter.
     */
    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }
}
