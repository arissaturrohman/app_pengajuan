<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use Illuminate\Http\Request;

class KelompokController extends Controller
{
    public function index (){
        $data = [
            "title"  => "Data Kelompok",
            "menuKelompok" => "active",
            "kelompok"       => Kelompok::with('nasabah')->get(),
        ];
        return view('kelompok/index', $data);
    }
}
