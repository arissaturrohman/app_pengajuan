<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index (){
        $data = [
            "title"  => "Data Pengajuan",
            "menuPengajuan" => "active",
            "pengajuan"      => Pengajuan::with('nasabah')->get(),
        ];
        return view('pengajuan/index', $data);
    }
    
    public function create(Request $request){
        $data = [
            'title' => 'Tambah Data Pengajuan',
            "menuPengajuan"   => "active",
            "nasabah"      => Nasabah::get(),
        ];
       
        $nik = $request->input('nik_pengajuan');
        $nama = Nasabah::find($nik);
        
        // Ambil produk berdasarkan kategori yang dipilih
        if ($nama) {
            return response()->json([
                'nama' => $nama->nama,
                'alamat' => $nama->alamat,
                'pengajuan' => $nama->pengajuan,
            ]);
        }

        // Mengirim data produk sebagai respons JSON
        return view('pengajuan/create', $data);
    }

    public function store(Request $request){
        $request->validate([
            'nik_pengajuan'         => 'required',
            'nama_pasangan'         => 'required',
            'pekerjaan_pasangan'    => 'required',
            'realisasi'             => 'required',
            'keterangan'            => 'required',
        ],
     [      'nik_pengajuan.required'        => 'NIK Tidak Boleh Kosong',
            'nama_pasangan.required'        => 'Nama Suami/Istri Tidak Boleh Kosong',
            'pekerjaan_pasangan.required'   => 'Pekerjaan Suami/Istri Tidak Boleh Kosong',
            'realisasi.required'            => 'Realisasi Tidak Boleh Kosong',
            'keterangan.required'           => 'Keterangan Belum Dipilih',

    ]);
        
        $pengajuan = new Pengajuan;
        $pengajuan->nasabah_id          = $request->nik_pengajuan;
        $pengajuan->nama_pasangan       = $request->nama_pasangan;
        $pengajuan->pekerjaan_pasangan  = $request->pekerjaan_pasangan;
        $pengajuan->realisasi           = $request->realisasi;
        $pengajuan->keterangan          = $request->keterangan;
        $pengajuan->save();
        
        return redirect()->route('pengajuan')->with('success', 'Data Berhasil Ditambahkan');
    }
}
