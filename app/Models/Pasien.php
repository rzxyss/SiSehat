<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;
    protected $table='pasien';
    protected $fillable=[
        'nama_pasien',
        'tgl_lahir',
        'jenis_kelamin',
        'no_telp',
        'alamat',
        'riwayat_alergi',
        'riwayat_penyakit',
    ];
}
