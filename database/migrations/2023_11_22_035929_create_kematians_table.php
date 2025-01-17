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
        Schema::create('kematians', function (Blueprint $table) {
            $table->id();
            $table->string('warga');
            $table->string('jenis_kematian');
            $table->string('tempat');
            $table->date('tanggal_kematian');
            $table->string('jenis_kelamin');
            $table->string('rt');
            $table->string('rw');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kematians');
    }
};
