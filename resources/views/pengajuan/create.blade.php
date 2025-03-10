@extends('layout/app')


@section('content')

<h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

<!-- DataTales Example -->
<div class="row">
    <div class="col-xl-8 col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <a href="{{ route('pengajuan') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('pengajuanStore') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="form-group row">
                      <label for="nik_pengajuan" class="col-sm-3 col-form-label">NIK</label>
                      <div class="col-sm-9">
                        <select name="nik_pengajuan" id="nik_pengajuan" class="form-control select2" onchange="ambilData()">
                          <option selected disabled>--Pilih--</option>
                          @foreach ($nasabah as $items)
                              <option value="{{ $items->id }}">{{ $items->NIK }}</option>
                              @endforeach
                        </select>
                        @error('nik_pengajuan')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                      </div>
                    </div> 
                    <div class="form-group row">
                      <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="nama" id="nama" readonly>
                        </div>
                    </div>                   
                    <div class="form-group row">
                      <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="alamat" id="alamat" readonly>
                        </div>
                    </div>                   
                    <div class="form-group row">
                      <label for="pengajuan" class="col-sm-3 col-form-label">Pengajuan</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="pengajuan" id="pengajuan" readonly>
                        </div>
                    </div>                   
                    <div class="form-group row">
                      <label for="nama_pasangan" class="col-sm-3 col-form-label">Nama Suami/Istri</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="nama_pasangan" id="nama_pasangan">
                          @error('nama_pasangan')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                        </div>
                    </div>                   
                    <div class="form-group row">
                      <label for="pekerjaan_pasangan" class="col-sm-3 col-form-label">Pekerjaan Suami/Istri</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="pekerjaan_pasangan" id="pekerjaan_pasangan">
                          @error('pekerjaan_pasangan')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                        </div>
                    </div>                   
                    <div class="form-group row">
                      <label for="realisasi" class="col-sm-3 col-form-label">Realisasi</label>
                      <div class="col-sm-9">
                          <input type="number" class="form-control" name="realisasi" id="realisasi">
                          @error('realisasi')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                        </div>
                    </div>                   
                    <div class="form-group row">
                      <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                      <div class="col-sm-9">
                          <select name="keterangan" id="keterangan" class="form-control">
                            <option>--Pilih--</option>
                            <option value="Disetujui">Disetujui</option>
                            <option value="Ditolak">Ditolak</option>
                          </select>
                          @error('keterangan')
                        <small class="text-danger">
                          {{ $message }}
                        </small>
                        @enderror
                        </div>
                    </div>                   
                    <div class="form-group row">
                        <div class="col-sm-3"></div>
                      <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary float-right btn-sm">Simpan</button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>

    </div>
</div>


    
@endsection