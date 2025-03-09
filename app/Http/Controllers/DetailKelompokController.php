<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Kelompok;
use Illuminate\Http\Request;
use App\Models\DetailKelompok;
use Illuminate\Support\Facades\DB;

class DetailKelompokController extends Controller
{
    public function index ($id){
        $data = [
            "title"         => "Detail Nasabah Kelompok",
        //     "detail" => DetailKelompok::with(['nasabah' => function ($query) use ($id) {
        //         $query->select('id', 'nama', 'kelompok_id');
        //     }, 'kelompok' => function ($query) {
        //         $query->select('id', 'nama_kelompok');
        //     }])
        //     ->whereHas('nasabah', function ($query) use ($id) {
        //         $query->where('kelompok_id', $id);
        //     })
        //     ->get(),
        ]; 
        $results = DB::table('nasabahs')
    ->join('kelompoks', 'nasabahs.kelompok_id', '=', 'kelompoks.id')
    ->select('nasabahs.*', 'kelompoks.id AS id_kelompok', 'kelompoks.*')
    ->where('kelompoks.id', $id)
    ->get();
        return view('detail/index', compact('results'), $data);
        
    }
}
