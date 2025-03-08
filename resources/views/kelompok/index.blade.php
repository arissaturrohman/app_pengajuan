@extends('layout/app')


@section('content')

<h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="{{ route('kelompokCreate') }}" class="btn btn-sm btn-outline-primary">Tambah</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center" width="5%">No</th>
                        <th>Nama Kelompok</th>
                        <th>Jumlah Anggota</th>
                        <th class="text-center">Detail Anggota</th>
                        <th class="text-center"><i class="fas fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jumlahKelompok as $item)
                        
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_kelompok }}</td>
                        <td>{{ $item->jumlah_nasabah }}</td>
                        <td width="15%" class="text-center">
                        <a href="{{ route('detail', $item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i> detail</a>
                        </td>
                        <td width="15%" class="text-center">
                            <a href="" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> edit</a>
                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


    
@endsection