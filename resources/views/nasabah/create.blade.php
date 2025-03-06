@extends('layout/app')


@section('content')

<h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

<!-- DataTales Example -->
<div class="row">
    <div class="col-xl-8 col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <a href="{{ route('nasabah') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('nasabahStore') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                      <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" name="nik" id="nik" value="{{ old('nik') }}">
                        @error('nik')
                            <small class="text-danger">
                              {{ $message }}
                            </small>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}">
                          @error('nama')
                            <small class="text-danger">
                              {{ $message }}
                            </small>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}">
                          @error('tempat_lahir')
                            <small class="text-danger">
                              {{ $message }}
                            </small>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="{{ old('tgl_lahir') }}">
                            @error('tgl_lahir')
                            <small class="text-danger">
                              {{ $message }}
                            </small>
                        @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select name="jk" id="jk" class="form-control">
                                <option selected disabled>--Pilih--</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('jk')
                            <small class="text-danger">
                              {{ $message }}
                            </small>
                        @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat') }}</textarea>
                            @error('alamat')
                            <small class="text-danger">
                              {{ $message }}
                            </small>
                        @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                        <div class="col-sm-9">
                            <select name="agama" id="agama" class="form-control">
                                <option selected disabled>--Pilih--</option>
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                            </select>
                            @error('agama')
                            <small class="text-danger">
                              {{ $message }}
                            </small>
                        @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="status_kawin" class="col-sm-3 col-form-label">Status Perkawinan</label>
                        <div class="col-sm-9">
                            <select name="status_kawin" id="status_kawin" class="form-control">
                                <option selected disabled>--Pilih--</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                            </select>
                            @error('status_kawin')
                            <small class="text-danger">
                              {{ $message }}
                            </small>
                        @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan') }}">
                            @error('pekerjaan')
                            <small class="text-danger">
                              {{ $message }}
                            </small>
                        @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="pengajuan" class="col-sm-3 col-form-label">Pengajuan</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="pengajuan" id="pengajuan" value="{{ old('pengajuan') }}">
                            @error('pengajuan')
                            <small class="text-danger">
                              {{ $message }}
                            </small>
                        @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="kelompok" class="col-sm-3 col-form-label">Kelompok</label>
                        <div class="col-sm-9">
                            <select name="kelompok" id="kelompok" class="form-control">
                              <option selected disabled>--Pilih--</option>
                              @foreach ($kelompok as $items)
                              <option value="{{ $items->nama_kelompok }}">{{ $items->nama_kelompok }}</option>                                  
                              @endforeach
                            </select>
                            @error('kelompok')
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