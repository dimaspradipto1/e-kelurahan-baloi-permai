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
        Schema::create('ahli_warises', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nik', 16);
            $table->string('nama_meninggal');
            $table->string('nik_pemohon', 16);
            $table->string('nama_pemohon');
            $table->string('alamat_pemohon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ahli_warises');
    }
};
