<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function index (){
        $data = [
            "title"  => "Data Nasabah",
            "menuNasabah" => "active",
        ];
        return view('nasabah/index', $data);
    }
}
