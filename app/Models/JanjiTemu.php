<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JanjiTemu extends Model
{
    use HasFactory;


    protected $table = 'janji_temu';


    protected $fillable = [
        'tanggal_temu',
        'jam_temu',
        'id_pasien',
        'id_dokter',
        'status',
        'alasan',
    ];


    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }

    /**
     * 
     * 
     * @return string
     */
    public function getStatusDescriptionAttribute()
    {
        $statuses = [
            '0' => 'Menunggu Persetujuan',
            '1' => 'Disetujui',
            '2' => 'Ditolak',
            '3' => 'Selesai',
        ];

        return $statuses[$this->status] ?? 'Tidak Diketahui';
    }
}
