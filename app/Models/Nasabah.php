<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    /**
     * The roles that belong to the Nasabah
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function detail(): BelongsToMany
    {
        return $this->belongsToMany(DetailKelompok::class, 'detail_kelompok', 'kelompok_id', 'nasabah_id');
    }

}
