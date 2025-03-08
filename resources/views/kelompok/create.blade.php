@extends('layout/app')


@section('content')

<h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

<!-- DataTales Example -->
<div class="row">
    <div class="col-xl-8 col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <a href="{{ route('kelompok') }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('kelompokStore') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                      <label for="nama_kelompok" class="col-sm-3 col-form-label">Nama Kelompok</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_kelompok" id="nama_kelompok" value="{{ old('nama_kelompok') }}">
                        @error('nama_kelompok')
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