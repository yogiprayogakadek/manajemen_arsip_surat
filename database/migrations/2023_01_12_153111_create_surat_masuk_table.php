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
            $table->foreignId('pengajuan_id')->references('id')->on('pengajuan')->onDelete('cascade');
            $table->enum('kategori', ['Penting', 'Biasa', 'Rahasia', 'Undangan', 'Pengantar']);
            // $table->string('nomor_surat', 100);
            $table->string('perihal', 100);
            // $table->foreignId('dinas_id')->references('id')->on('dinas')->onDelete('cascade');
            $table->json('tembusan')->nullable();
            $table->string('tembusan_khusus', 50)->nullable();
            $table->date('tanggal_surat');
            $table->string('file_surat', 100)->nullable();
            $table->json('file_lampiran')->nullable();
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
