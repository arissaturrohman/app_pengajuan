@extends('layout/app')


@section('content')

<h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="{{ route('pengajuanCreate') }}" class="btn btn-sm btn-outline-primary">Tambah</a>
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
                        <th>Alamat</th>
                        <th>Nama Suami/Istri</th>
                        <th>Pekerjaan Suami/Istri</th>
                        <th>Pengajuan</th>
                        <th>Realisasi</th>
                        <th>Keterangan</th>
                        <th class="text-center"><i class="fas fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengajuan as $item)
                        
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nasabah->NIK }}</td>
                        <td>{{ $item->nasabah->nama }}</td>
                        <td>{{ $item->nasabah->alamat }}</td>
                        <td>{{ $item->nama_pasangan }}</td>
                        <td>{{ $item->pekerjaan_pasangan }}</td>
                        <td>{{ number_format($item->nasabah->pengajuan) }}</td>
                        <td>{{ number_format($item->realisasi) }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td width="15%">
                            <a href="#" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> edit</a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


    
@endsection