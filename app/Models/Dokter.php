<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Dokter extends Model
{
    use HasFactory;
    protected $table='dokter';
    protected $fillable=[
        'nama_dokter',
        'alamat',
        'jenis_kelamin',
        'tanggal_lahir',
        'email',
        'no_telp',
        'spesialis',
        'jadwal_praktik',
        'gaji'
    ];
}
