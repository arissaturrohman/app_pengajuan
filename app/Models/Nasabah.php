<?php

namespace App\Models;

use App\Models\Kelompok;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    protected $fillable = [
        'NIK',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'jk',
        'alamat',
        'agama',
        'status_kawin',
        'pekerjaan',
        'pengajuan',
    ];

    public function kelompok(){
        return $this->hasOne(Kelompok::class);
    }
}
