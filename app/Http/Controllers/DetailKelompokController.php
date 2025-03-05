<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Kelompok;
use Illuminate\Http\Request;

class DetailKelompokController extends Controller
{
    public function index (){
        $data = [
            "title"         => "Detail Nasabah",
            "nasabah"       => Nasabah::with('detail')->get(),
            "kelompok"       => Kelompok::with('detail')->get(),
        ];
        return view('nasabah/index', $data);
    }
}
