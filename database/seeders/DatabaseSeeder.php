<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Nasabah;
use App\Models\Kelompok;
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
            'nama'          => 'tes',
            'tempat_lahir'  => 'demak',
            'tgl_lahir'     => '2020-01-02',
            'jk'            => 'Laki-laki',
            'alamat'        => 'bonang demak',
            'agama'         => 'islam',
            'status_kawin'  => 'kawin',
            'pekerjaan'     => 'Swasta',
            'pengajuan'     => '2000000',
            'kelompok'   => 1,
        ]);
        
        Kelompok::create([
            'nama_kelompok' => 'mawar',
        ]);
        
        Kelompok::create([
            'nama_kelompok' => 'melati',
        ]);
        
        DetailKelompok::create([
            'kelompok_id' => 1,
            'nasabah_id' => 1,
        ]);

    }
}
