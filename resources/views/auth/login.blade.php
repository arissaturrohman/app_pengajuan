
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Pengajuan | Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('img/logo.jpg') }}" type="image/x-icon">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-8 col-md-8">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Silahkan Login!</h1>
                                    </div>
                                    <form class="user" action="{{ route('loginProses') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror"
                                                placeholder="Masukkan Username" name="username" value="{{ old('username') }}" autofocus>
                                                @error('username')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                                 placeholder="Masukkan Password" name="password">
                                                 @error('password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>

    @session('success')        
    <script>
        Swal.fire({
            title: "Sukses!",
            text: "{{ session('success') }}",
            icon: "success"
        });
        </script>
    @endsession

    @session('error')        
    <script>
        Swal.fire({
            title: "Gagal!",
            text: "{{ session('error') }}",
            icon: "error"
        });
        </script>
    @endsession

</body>

</html>