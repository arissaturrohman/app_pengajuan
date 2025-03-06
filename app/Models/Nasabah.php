<?php

namespace App\Models;

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

    public function detail()
    {
        return $this->belongsTo(DetailKelompok::class);
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class);
    }

}
