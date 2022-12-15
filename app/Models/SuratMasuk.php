<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'surat_masuk';
    // protected $dates = ['tanggal_surat'];

    public function klasifikasi()
    {
        return $this->belongsTo(KlasifikasiSurat::class, 'klasifikasi_id', 'id');
    }
}
