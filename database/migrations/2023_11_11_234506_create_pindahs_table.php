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
        Schema::create('pindahs', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('warga');
            $table->text('alamat_asal');
            $table->text('alamat_tujuan');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('rt');
            $table->string('rw');
            $table->date('tanggal_pindah');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pindahs');
    }
};
