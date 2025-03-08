<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Kelompok;
use Illuminate\Http\Request;
use App\Models\DetailKelompok;
use Illuminate\Support\Facades\DB;

class KelompokController extends Controller
{
    public function index (){
        $data = [
            "title"  => "Data Kelompok",
            "menuKelompok" => "active",
            "kelompok"       => Kelompok::with('nasabah')->get(),
            'jumlahKelompok' => DB::table('kelompoks as k')
            ->leftJoin('nasabahs as n', 'k.id', '=', 'n.kelompok_id')
            ->select('k.id', 'k.nama_kelompok', DB::raw('COUNT(n.kelompok_id) as jumlah_nasabah'))
            ->groupBy('k.id', 'k.nama_kelompok') 
            ->get(),

];  
        
        return view('kelompok/index', $data);
    }

    public function create(){
        $data = [
            'title' => 'Tambah Data Kelompok',
            "menuKelompok"   => "active",
            
        ];
        return view('kelompok/create', $data);
    }

    public function store(Request $request){
        $request->validate([
            'nama_kelompok'                => 'required',
        ],
     [      'nama_kelompok.required'                => 'Nama Kelompok Tidak Boleh Kosong',

    ]);
        
        $kelompok = new Kelompok;
        $kelompok->nama_kelompok       = $request->nama_kelompok;
        $kelompok->save();
        
        return redirect()->route('kelompok')->with('success', 'Data Berhasil Ditambahkan');
    }
}
