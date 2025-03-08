<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    public function detail(): BelongsToMany
    {
        return $this->belongsToMany(DetailKelompok::class, 'detail_kelompok', 'kelompok_id', 'nasabah_id');
    }

    public function nasabah()
    {
        return $this->hasMany(Nasabah::class);
    }
}
