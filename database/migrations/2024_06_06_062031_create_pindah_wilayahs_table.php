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
        Schema::create('pindah_wilayahs', function (Blueprint $table) {
            $table->id();
            $table->string('warga');
            $table->string('nik', 16)->nullable(); 
            $table->string('alamat_asal');
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->string('rt_tujuan', 3);
            $table->string('rw_tujuan', 3);
            $table->string('alamat_tujuan');
            $table->date('tanggal_pindah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pindah_wilayahs');
    }
};
