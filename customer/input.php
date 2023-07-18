<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APLIKASI REPORT DELIVERY ORDER | INPUT DATA</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/2.png">
    <!-- Custom Stylesheet -->
    <link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <!-- Select2 Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
</head>

<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <?php include "../theme-header.php"; ?>
        <?php include "../theme-sidebar.php"; ?>

        <!-- Content body start -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Input</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Data</a></li>
                    </ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Input Data Customer</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="nama_cust"> NAMA CUSTOMER </label>
                                            <input type="text" class="form-control input-default" name="nama_cust" placeholder="Masukkan Nama Customer" autofocus required>
                                        </div>

                                        <div class="form-group">
                                            <label for="no_telpon"> NO TELPON </label>
                                            <input type="text" class="form-control input-default" name="no_telpon" placeholder="Masukkan Nomor Telpon">
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat_cust"> ALAMAT </label>
                                            <input type="text" class="form-control input-default" name="alamat_cust" placeholder="Masukkan Alamat">
                                        </div>

                                        <div class="form-group">
                                            <label for="kecamatan">KECAMATAN</label>
                                            <select class="form-control select2" name="kecamatan" id="kecamatan" style="width: 100%;">
                                                <option value="">Pilih Kecamatan</option>
                                                <?php
                                                include "../koneksi.php";

                                                // Query untuk mendapatkan daftar kecamatan
                                                $query = "SELECT kecamatan.nama
        FROM kecamatan
        JOIN kota_kabupaten ON kecamatan.id_kota_kabupaten = kota_kabupaten.id
        JOIN provinsi ON kota_kabupaten.id_provinsi = provinsi.id
        WHERE provinsi.kode = '63'";

                                                // Eksekusi query
                                                $result = mysqli_query($conn, $query);

                                                if ($result) {
                                                    // Loop untuk menampilkan hasil query sebagai pilihan dropdown
                                                    while ($hasil = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="' . $hasil['nama'] . '">' . $hasil['nama'] . '</option>';
                                                    }
                                                } else {
                                                    echo '<option value="">Error retrieving data</option>';
                                                }

                                                mysqli_close($conn);
                                                ?>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="rute">Rute</label>
                                            <br>
                                            <label><input type="radio" name="rute" value="BJB"> BJB</label>
                                            <label><input type="radio" name="rute" value="BJM"> BJM</label>
                                            <label><input type="radio" name="rute" value="LUAR KOTA"> LUAR KOTA</label>
                                        </div>

                                        <input type="hidden" name="status" value="1">
                                        <div class="mt-4"></div>
                                        <button class="btn btn-primary mr-2" name="simpan">Simpan</button>
                                        <a href="./index.php" class="btn btn-danger">Batal</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content body end -->
        <?php include "../theme-footer.php"; ?>
    </div>
    <!-- Main wrapper end -->

    <!-- Scripts -->
    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
    <script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/deznav-init.js"></script>
    <!-- Select2 Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</body>

</html>
<?php
include "../koneksi.php";

if (isset($_POST['simpan'])) {
    $nama_cust = $_POST['nama_cust'];
    $no_telpon = $_POST['no_telpon'];
    $alamat_cust = $_POST['alamat_cust'];
    $kecamatan = $_POST['kecamatan'];
    $rute = $_POST['rute'];
    $input = "INSERT INTO tb_customer (nama_cust, no_telpon, alamat_cust, kecamatan, rute) VALUES ('$nama_cust', '$no_telpon', '$alamat_cust', '$kecamatan', '$rute')";

    mysqli_query($conn, $input) or die(mysqli_error($conn));

    echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Disimpan....</h5></div>";
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/customer/index.php'>";
}
?>