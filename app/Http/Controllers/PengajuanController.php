<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index (){
        $data = [
            "title"  => "Data Pengajuan",
            "menuPengajuan" => "active",
        ];
        return view('pengajuan/index', $data);
    }
}
