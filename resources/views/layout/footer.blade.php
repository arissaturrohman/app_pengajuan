<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

<script>
    $(document).ready(function() {
    $("#kelompok_id").select2();
    });
</script>

<script>
    $(document).ready(function() {
    $("#nik_pengajuan").select2();
    });
</script>

<script>
    $(document).ready(function() {
      $(document).on('click', '#nik_pengajuan', function() {
        var nik = $(this).data('nik');
        var nama = $(this).data('nama');
        var alamat = $(this).data('alamat');
        $('#nik').val(nik);
        $('#nama').val(nama);
        $('#alamat').val(alamat);
      })
    })
  </script>


<script>
    function ambilData() {
        
            var nik_pengajuan = document.getElementById("nik_pengajuan").value; // Mendapatkan id_nama yang dipilih
            if (nik_pengajuan == "") {
                return; // Jika tidak ada id yang dipilih, tidak melakukan permintaan
            }

            // Menggunakan jQuery untuk AJAX POST request
            $.ajax({
                url: '{{ route("pengajuanCreate") }}', // URL route yang menangani POST request
                method: 'GET',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token untuk melindungi aplikasi dari serangan CSRF
                    nik_pengajuan: nik_pengajuan // Mengirimkan id_nama yang dipilih
                },
                success: function(data) {
                    if (data) {
                        // Menampilkan data yang diterima ke form
                        document.getElementById("nama").value = data.nama;
                        document.getElementById("alamat").value = data.alamat;
                        let pengajuan = document.getElementById("pengajuan").value = data.pengajuan;

                        let formattedNumber = new Intl.NumberFormat('id-ID', {
                            style: 'decimal',
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                            }).format(pengajuan);
                    } else {
                        alert('Data tidak ditemukan!');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan saat mengambil data.');
                }
            });
        }
</script>

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