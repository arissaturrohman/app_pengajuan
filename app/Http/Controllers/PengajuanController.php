<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

     // Cek apakah ada pengajuan dengan nasabah_id yang sama dan status keterangan "Disetujui"
     $existingPengajuan = Pengajuan::where('nasabah_id', $request->nik_pengajuan)
     ->where('keterangan', 'Disetujui')
     ->first();

        if ($existingPengajuan) {
        // Jika ditemukan, hentikan proses dan beri pesan error
        return redirect()->route('pengajuan')->with('error', 'Pengajuan untuk NIK ini sudah Disetujui, tidak bisa melanjutkan proses simpan.');
        }

    $existingPengajuanTolak = Pengajuan::where('nasabah_id', $request->nik_pengajuan)
                                  ->where('keterangan', 'Ditolak')
                                  ->first();

    if ($existingPengajuanTolak) {
        // Jika ditemukan, hentikan proses dan beri pesan error
        return redirect()->route('pengajuan')->with('error', 'Pengajuan untuk NIK ini sudah ditolak, tidak bisa melanjutkan proses simpan.');
    }

    // Ambil data nasabah berdasarkan NIK pengajuan
    $nasabah = Nasabah::where('id', $request->nik_pengajuan)->first();

    // Jika nasabah tidak ditemukan
    if (!$nasabah) {
        return redirect()->back()->withErrors(['nik_pengajuan' => 'Nasabah dengan NIK ini tidak ditemukan.']);
    }

    // Cek apakah nominal realisasi lebih besar dari jumlah pengajuan di tabel nasabah
    if ($request->realisasi > $nasabah->pengajuan) {
        return redirect()->back()->withErrors(['realisasi' => 'Nominal Realisasi tidak boleh lebih besar dari jumlah pengajuan.']);
    }
        
        $pengajuan = new Pengajuan;
        $pengajuan->nasabah_id          = $request->nik_pengajuan;
        $pengajuan->nama_pasangan       = $request->nama_pasangan;
        $pengajuan->pekerjaan_pasangan  = $request->pekerjaan_pasangan;
        $pengajuan->realisasi           = $request->realisasi;
        $pengajuan->keterangan          = $request->keterangan;
        $pengajuan->save();
        
        return redirect()->route('pengajuan')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id){
        $data = [
            'title' => 'Edit Data Realisasi',
            "menuPengajuan"   => "active",
            // 'nasabah' => DB::table('nasabah')->join('kelompok', 'kelompok.id', '=', 'nasabah.kelompok')->find($id),
            // "pengajuan"      => DB::table('pengajuans')
            // ->leftJoin('nasabahs', 'nasabahs.id', '=', 'pengajuans.nasabah_id')
            // ->where('pengajuans.id', $id)
            // ->select('pengajuans.*', 'nasabahs.id as nasabah_id')
            // ->first(),
            "pengajuan"      => Pengajuan::with('nasabah')->findOrFail($id),
        ];
        return view('pengajuan/edit', $data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama_pasangan'         => 'required',
            'pekerjaan_pasangan'    => 'required',
            'realisasi'             => 'required',
            'keterangan'            => 'required',
        ],
     [      'nama_pasangan.required'        => 'Nama Suami/Istri Tidak Boleh Kosong',
            'pekerjaan_pasangan.required'   => 'Pekerjaan Suami/Istri Tidak Boleh Kosong',
            'realisasi.required'            => 'Realisasi Tidak Boleh Kosong',
            'keterangan.required'           => 'Keterangan Belum Dipilih',

    ]);
        
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->nama_pasangan       = $request->nama_pasangan;
        $pengajuan->pekerjaan_pasangan  = $request->pekerjaan_pasangan;
        $pengajuan->realisasi           = $request->realisasi;
        $pengajuan->keterangan          = $request->keterangan;
        $pengajuan->save();

    return redirect()->route('pengajuan')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy($id)
{
    // Ambil data pengajuan berdasarkan ID
    $pengajuan = Pengajuan::find($id);

    // Jika pengajuan tidak ditemukan
    if (!$pengajuan) {
        return redirect()->route('pengajuan')->with('error', 'Data pengajuan tidak ditemukan.');
    }

    // Cek apakah pengajuan sudah disimpan dan tidak bisa dihapus
    if ($pengajuan->keterangan == 'Disetujui') { // Gantilah kondisi ini sesuai dengan kondisi pengajuan yang sudah disimpan
        return redirect()->route('pengajuan')->with('error', 'Data ini tidak bisa dihapus karena pengajuan Disetujui.');
    }

    // Jika data pengajuan bisa dihapus, lakukan proses penghapusan
    $pengajuan->delete();

    // Redirect setelah berhasil menghapus data
    return redirect()->route('pengajuan')->with('success', 'Data Berhasil Dihapus');
}
}
