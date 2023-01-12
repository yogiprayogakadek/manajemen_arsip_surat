<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';
    protected $guarded = ['id'];

    public function suratKeluar()
    {
        return $this->hasOne(SuratKeluar::class, 'pengajuan_id', 'id');
    }
}
