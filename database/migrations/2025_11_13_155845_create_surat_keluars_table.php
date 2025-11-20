<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->date('tanggal');
            $table->string('tujuan');
            $table->string('perihal');
            $table->string('file_surat')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); // penting
            $table->timestamps();

            // relasi user
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_keluar');
    }
};
