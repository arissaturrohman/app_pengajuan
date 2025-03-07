@extends('layout/app')


@section('content')

<h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="" class="btn btn-sm btn-outline-primary">Tambah</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tempat/Tgl. Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Agama</th>
                        <th>Status Perkawinan</th>
                        <th>Pekerjaan</th>
                        <th>Pengajuan</th>
                        <th>Realisasi</th>
                        <th class="text-center"><i class="fas fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>Edinburgh</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>61</td>
                        <td>61</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td width="15%">
                            <a href="" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> edit</a>
                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> hapus</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


    
@endsection