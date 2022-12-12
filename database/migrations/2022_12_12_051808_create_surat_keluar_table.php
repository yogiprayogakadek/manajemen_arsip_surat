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
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klasifikasi_id')->references('id')->on('klasifikasi_surat')->onDelete('cascade');
            $table->foreignId('tipe_id')->references('id')->on('tipe_surat')->onDelete('cascade');
            $table->enum('kategori', ['Penting', 'Umum']);
            $table->string('perihal', 100);
            $table->date('tanggal_surat');
            $table->text('catatan_pengingat')->nullable();
            // $table->foreignId('dinas_id')->references('id')->on('dinas')->onDelete('cascade');
            $table->json('tujuan');
            $table->json('tembusan')->nullable();
            $table->json('tembusan_dinas')->nullable();
            $table->json('tembusan_keluar')->nullable();
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
        Schema::dropIfExists('surat_keluar');
    }
};
