<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('pengirim', 100);
            $table->foreignId('klasifikasi_id')->references('id')->on('klasifikasi_surat')->onDelete('cascade');
            $table->enum('kategori', ['Penting', 'Umum']);
            $table->string('nomor_surat', 100);
            $table->string('perihal', 100);
            $table->foreignId('dinas_id')->references('id')->on('dinas')->onDelete('cascade');
            $table->json('tembusan_khusus')->nullable();
            $table->date('tanggal_surat');
            $table->string('file_surat', 100)->nullable();
            $table->string('file_lampiran', 100)->nullable();
            $table->foreignId('unit_kerja_id')->references('id')->on('unit_kerja')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_masuk');
    }
};
