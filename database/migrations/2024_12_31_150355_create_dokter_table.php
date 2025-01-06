<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokter');
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['laki_laki', 'perempuan']);
            $table->date('tanggal_lahir');
            $table->string('email');
            $table->string('no_telp');
            $table->string('spesialis');
            $table->text('jadwal_praktik');
            $table->float('gaji');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokter');
    }
};
