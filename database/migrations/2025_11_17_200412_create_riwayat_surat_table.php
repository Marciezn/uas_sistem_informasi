<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_surat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('jenis');        // Surat Masuk / Surat Keluar
            $table->string('no_surat');
            $table->date('tanggal');
            $table->string('nama')->nullable();   // pengirim / tujuan
            $table->string('perihal');
            $table->string('file_surat')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_surat');
    }
};
