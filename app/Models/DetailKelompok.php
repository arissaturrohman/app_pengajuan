<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DetailKelompok extends Model
{
    public function detail(): BelongsToMany
    {
        return $this->belongsToMany(Kelompok::class, 'detail_kelompok', 'kelompok_id', 'nasabah_id');
    }
}
