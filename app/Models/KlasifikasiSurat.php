<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiSurat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'klasifikasi_surat';

    public function surat_masuk()
    {
        return $this->hasMany(SuratMasuk::class, 'klasifikasi_id', 'id');
    }
}
