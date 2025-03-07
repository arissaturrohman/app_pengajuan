@extends('layout/app')


@section('content')

<h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="{{ route('nasabahCreate') }}" class="btn btn-sm btn-outline-primary">Tambah</a>
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
                        <th>Kelompok</th>
                        <th class="text-center"><i class="fas fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nasabah as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->NIK }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->tempat_lahir }}, {{ $item->tgl_lahir }}</td>
                        <td>{{ $item->jk }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->agama }}</td>
                        <td>{{ $item->status_kawin }}</td>
                        <td>{{ $item->pekerjaan }}</td>
                        <td>{{ number_format($item->pengajuan) }}</td>
                        <td></td>
                        <td>{{ $item->kelompok }}</td>
                        <td width="15%">
                            <a href="{{ route('nasabahEdit', $item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> edit</a>                         
                            
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete"><i class="fas fa-trash-alt"></i> hapus</button>
                        </td>
                    </tr>
                    <!-- Modal -->
<div class="modal fade" id="delete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h6 class="modal-title" id="exampleModalLabel">Yakin Hapus {{ $title }}?</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body h3">
            Data tidak bisa dikembalikan!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
          <form action="{{ route('nasabahDestroy', $item->id) }}" method="post">
            @csrf
            @method('delete')
              <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </div>
      </div>
    </div>
  </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



    
@endsection