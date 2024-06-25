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
        Schema::create('pernikahans', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->date('tanggal_surat');
            $table->string('nama');
            $table->string('nik', 16);
            $table->text('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pernikahans');
    }
};