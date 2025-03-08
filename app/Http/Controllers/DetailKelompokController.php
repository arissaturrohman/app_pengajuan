<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Kelompok;
use Illuminate\Http\Request;
use App\Models\DetailKelompok;

class DetailKelompokController extends Controller
{
    public function index ($id){
        $data = [
            "title"         => "Detail Nasabah Kelompok",
            "detail" => DetailKelompok::with(['nasabah' => function ($query) use ($id) {
                $query->select('id', 'nama', 'kelompok_id'); // Memilih kolom yang ingin ditampilkan
            }, 'kelompok' => function ($query) {
                $query->select('id', 'nama_kelompok'); // Memilih kolom yang ingin ditampilkan
            }])
            ->whereHas('nasabah', function ($query) use ($id) {
                $query->where('kelompok_id', $id);
            })
            ->get(),
        ];
        // @dd($data) ;
        return view('detail/index', $data);
        
    }
}
