<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'surat_keluar';

    public function klasifikasi()
    {
        return $this->belongsTo(KlasifikasiSurat::class, 'klasifikasi_id', 'id');
    }

    public function tipe()
    {
        return $this->belongsTo(TipeSurat::class, 'tipe_id', 'id');
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id', 'id');
    }
}
