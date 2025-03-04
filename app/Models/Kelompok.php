<?php

namespace App\Models;

use App\Models\Nasabah;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    public function nasabah(){
        return $this->belongsTo(Nasabah::class);
    }
}
