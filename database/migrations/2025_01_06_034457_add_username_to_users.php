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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username');
            $table->string('no_telp');
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->enum('spesialis', ['pu', 'pg', 'pk', 'ppd'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
