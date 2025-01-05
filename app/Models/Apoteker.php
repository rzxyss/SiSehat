<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apoteker extends Model
{   
    
    use HasFactory;
    protected $table='apoteker';
    protected $fillable=[
    'nama_apoteker',
        'no_telepon',
        'email',
    ];
}
