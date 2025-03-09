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
            
        ];  
        $kelompoks       = DB::table('kelompoks as k')
        ->leftJoin('nasabahs as n', 'k.id', '=', 'n.kelompok_id')
        ->select('k.id', 'k.nama_kelompok', DB::raw('COUNT(n.kelompok_id) as jumlah_nasabah'))
        ->groupBy('k.id', 'k.nama_kelompok')
        ->get();
        
return view('kelompok/index', compact('kelompoks'), $data);
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
     [      'nama_kelompok.required'       => 'Nama Kelompok Tidak Boleh Kosong',

    ]);
        
        $kelompok = new Kelompok;
        $kelompok->nama_kelompok       = $request->nama_kelompok;
        $kelompok->save();
        
        return redirect()->route('kelompok')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id){
        $data = [
            'title' => 'Edit Data Kelompok',
            "menuKelompok"   => "active",
            // 'nasabah' => DB::table('nasabah')->join('kelompok', 'kelompok.id', '=', 'nasabah.kelompok')->find($id),
            // "nasabah"      => Nasabah::with('kelompok')->findOrFail($id),
            "kelompok"      => Kelompok::findOrFail($id),
        ];
        return view('kelompok/edit', $data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama_kelompok'                => 'required',
        ],
     [      'nama_kelompok.required'       => 'Nama Kelompok Tidak Boleh Kosong',

    ]);

    $kelompok = Kelompok::findOrFail($id);
    $kelompok->nama_kelompok           = $request->nama_kelompok;
    $kelompok->save();

    return redirect()->route('kelompok')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy($id){
            // Cek apakah kelompok yang akan dihapus ada dalam hasil query yang diberikan
            $kelompok = DB::table('kelompoks as k')
                ->leftJoin('nasabahs as n', 'k.id', '=', 'n.kelompok_id')
                ->select('k.id', 'k.nama_kelompok', DB::raw('COUNT(n.kelompok_id) as jumlah_nasabah'))
                ->groupBy('k.id', 'k.nama_kelompok')
                ->where('k.id', $id)
                ->first();
    
            if ($kelompok) {
                // Jika kelompok ada dan memiliki jumlah nasabah lebih dari 0, jangan hapus
                if ($kelompok->jumlah_nasabah > 0) {
                    return redirect()->route('kelompok')->with('error', 'Kelompok tidak dapat dihapus karena masih memiliki nasabah.');
                }
    
                // Hapus kelompok
                Kelompok::where('id', $id)->delete();
    
                return redirect()->route('kelompok')->with('success', 'Data Berhasil Dihapus');
            }
    
            return redirect()->route('kelompok')->with('error', 'Data tidak ditemukan.');
        }
    }
  
