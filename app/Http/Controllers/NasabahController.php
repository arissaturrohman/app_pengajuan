<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Kelompok;
use Illuminate\Http\Request;
use App\Models\DetailKelompok;
use Illuminate\Support\Facades\DB;

class NasabahController extends Controller
{
    public function index (){
        $data = [
            "title"          => "Data Nasabah",
            "menuNasabah"    => "active",
            "nasabah"        => Nasabah::with('kelompok')->get(),
            "kelompok"       => Kelompok::get(),
        ];
        return view('nasabah/index', $data);
    }
    
    public function create(){
        $data = [
            'title' => 'Tambah Data Nasabah',
            "menuNasabah"   => "active",
            "kelompok"      => Kelompok::get(),
            
        ];
        return view('nasabah/create', $data);
    }

    public function store(Request $request){
        $request->validate([
            'nik'                => 'required',
            'nama'               => 'required',
            'tempat_lahir'       => 'required',
            'tgl_lahir'          => 'required',
            'jk'                 => 'required',
            'alamat'             => 'required',
            'agama'              => 'required',
            'status_kawin'       => 'required',
            'pekerjaan'          => 'required',
            'pengajuan'          => 'required',
            'kelompok_id'        => 'required',
        ],
     [      'nik.required'                => 'NIK Tidak Boleh Kosong',
            'nama.required'               => 'Nama Tidak Boleh Kosong',
            'tempat_lahir.required'       => 'Tempat Lahir Tidak Boleh Kosong',
            'tgl_lahir.required'          => 'Tanggal Lahir Tidak Boleh Kosong',
            'jk.required'                 => 'Jenis Kelamin Belum Dipilih',
            'alamat.required'             => 'Alamat Tidak Boleh Kosong',
            'agama.required'              => 'Agama Belum Dipilih',
            'status_kawin.required'       => 'Status Kawin Belum Dipilih',
            'pekerjaan.required'          => 'Pekerjaan Tidak Boleh Kosong',
            'pengajuan.required'          => 'Pengajuan Tidak Boleh Kosong',
            'kelompok_id.required'        => 'Kelompok Belum Dipilih',

    ]);

    // $jumlahKelompok = Nasabah::select('kelompok_id', DB::raw('count(*) as count'))->groupBy('kelompok_id')->havingRaw('count > 2')->get();
    // $jumlahKelompok = Nasabah::select('kelompok_id', DB::raw('count(*) as count'))->groupBy('kelompok_id')->get();

    // $gagal = $jumlahKelompok->firstWhere('count', '>', 2);

    // foreach ($jumlahKelompok as $key) {    

    // if ($key->count == 2) {
    //     return redirect()->route('nasabah')->with('error', 'Data Kelompok Melebihi 10 Kuota');
    // } else {
        
        $nasabah = new Nasabah;
        $nasabah->nik           = $request->nik;
        $nasabah->nama          = $request->nama;
        $nasabah->tempat_lahir  = $request->tempat_lahir;
        $nasabah->tgl_lahir     = $request->tgl_lahir;
        $nasabah->jk            = $request->jk;
        $nasabah->alamat        = $request->alamat;
        $nasabah->agama         = $request->agama;
        $nasabah->status_kawin  = $request->status_kawin;
        $nasabah->pekerjaan     = $request->pekerjaan;
        $nasabah->pekerjaan     = $request->pekerjaan;
        $nasabah->pengajuan     = $request->pengajuan;
        $nasabah->kelompok_id   = $request->kelompok_id;
        $nasabah->save();
        
        $detail = new DetailKelompok;
        $detail->nasabah_id       = $nasabah->id;
        $detail->kelompok_id      = $request->kelompok_id;
        $detail->save();
        
        return redirect()->route('nasabah')->with('success', 'Data Berhasil Ditambahkan');
    }

    // }
// }

    public function edit($id){
        $data = [
            'title' => 'Edit Data Nasabah',
            "menuNasabah"   => "active",
            // 'nasabah' => DB::table('nasabah')->join('kelompok', 'kelompok.id', '=', 'nasabah.kelompok')->find($id),
            "nasabah"      => Nasabah::with('kelompok')->findOrFail($id),
            "kelompok"      => Kelompok::get(),
        ];
        return view('nasabah/edit', $data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nik'                => 'required',
            'nama'               => 'required',
            'tempat_lahir'       => 'required',
            'tgl_lahir'          => 'required',
            'jk'                 => 'required',
            'alamat'             => 'required',
            'agama'              => 'required',
            'status_kawin'       => 'required',
            'pekerjaan'          => 'required',
            'pengajuan'          => 'required',
            'kelompok_id'          => 'required',
        ],
     [      'nik.required'                => 'NIK Tidak Boleh Kosong',
            'nama.required'               => 'Nama Tidak Boleh Kosong',
            'tempat_lahir.required'       => 'Tempat Lahir Tidak Boleh Kosong',
            'tgl_lahir.required'          => 'Tanggal Lahir Tidak Boleh Kosong',
            'jk.required'                 => 'Jenis Kelamin Belum Dipilih',
            'alamat.required'             => 'Alamat Tidak Boleh Kosong',
            'agama.required'              => 'Agama Belum Dipilih',
            'status_kawin.required'       => 'Status Kawin Belum Dipilih',
            'pekerjaan.required'          => 'Pekerjaan Tidak Boleh Kosong',
            'pengajuan.required'          => 'Pengajuan Tidak Boleh Kosong',
            'kelompok_id.required'           => 'Kelompok Belum Dipilih',

    ]);

    $nasabah = Nasabah::findOrFail($id);
    $nasabah->nik           = $request->nik;
    $nasabah->nama          = $request->nama;
    $nasabah->tempat_lahir  = $request->tempat_lahir;
    $nasabah->tgl_lahir     = $request->tgl_lahir;
    $nasabah->jk            = $request->jk;
    $nasabah->alamat        = $request->alamat;
    $nasabah->agama         = $request->agama;
    $nasabah->status_kawin  = $request->status_kawin;
    $nasabah->pekerjaan     = $request->pekerjaan;
    $nasabah->pekerjaan     = $request->pekerjaan;
    $nasabah->pengajuan     = $request->pengajuan;
    $nasabah->kelompok_id   = $request->kelompok_id;
    $nasabah->save();

    return redirect()->route('nasabah')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy($id){
        $nasabah = Nasabah::findOrFail($id);
        $nasabah->delete();

        return redirect()->route('nasabah')->with('success', 'Data Berhasil Dihapus');
    }
}
