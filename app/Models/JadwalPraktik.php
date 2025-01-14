<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalPraktik extends Model
{
    use HasFactory;
    protected $table = 'jadwal_praktik';
    protected $guarded = [];


    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }
}
