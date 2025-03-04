<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function index (){
        $data = [
            "title"         => "Data Nasabah",
            "menuNasabah"   => "active",
            "nasabah"       => Nasabah::with('kelompok')->get(),
        ];
        return view('nasabah/index', $data);
    }
}
