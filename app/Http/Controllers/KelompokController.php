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
            "kelompok"       => Kelompok::get(),
        ];
        return view('kelompok/index', $data);
    }
}
