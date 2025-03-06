<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Kelompok;
use Illuminate\Http\Request;
use App\Models\DetailKelompok;

class DetailKelompokController extends Controller
{
    public function index (){
        $data = [
            "title"         => "Detail Nasabah Kelompok",
            "detail"        => DetailKelompok::with('nasabah','kelompok')->get(),
        ];
        return view('detail/index', $data);
    }
}
