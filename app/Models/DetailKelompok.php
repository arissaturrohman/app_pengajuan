<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailKelompok extends Model
{
    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class);
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class);
    }
}
