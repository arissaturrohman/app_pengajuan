<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Nasabah;
use App\Models\Kelompok;
use App\Models\Pengajuan;
use App\Models\DetailKelompok;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama'      => 'Administrator',
            'username'  => 'admin',
            'password'  => Hash::make('admin'),
        ]);
        
        Nasabah::create([
            'NIK'           => '123456789',
            'nama'          => 'Tes',
            'tempat_lahir'  => 'Demak',
            'tgl_lahir'     => '2020-01-02',
            'jk'            => 'Laki-laki',
            'alamat'        => 'Bonang Demak',
            'agama'         => 'Islam',
            'status_kawin'  => 'Kawin',
            'pekerjaan'     => 'Swasta',
            'pengajuan'     => '2000000',
            'kelompok_id'      => 1,
        ]);
        
        Kelompok::create([
            'nama_kelompok' => 'Mawar',
        ]);
        
        Kelompok::create([
            'nama_kelompok' => 'Melati',
        ]);

        Pengajuan::create([
            'nasabah_id' => 1,
            'nama_pasangan' => 'Siti',
            'pekerjaan_pasangan' => 'Buruh',
            'realisasi' => '1500000',
            'keterangan' => 'Disetujui',
        ]);

    }
}
