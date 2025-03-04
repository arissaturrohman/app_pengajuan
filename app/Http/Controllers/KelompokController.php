<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelompokController extends Controller
{
    public function index (){
        $data = [
            "title"  => "Data Kelompok",
            "menuKelompok" => "active",
        ];
        return view('kelompok/index', $data);
    }
}
