<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APPLIKASI REPORT DELIVERY ORDER | INPUT DATA</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/2.png">
    <!-- Custom Stylesheet -->
    <link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

    <?php include "../theme-header.php" ?>
    <?php include "../theme-sidebar.php" ?>

     <!--**********************************
         Content body start
     ***********************************-->
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
                                <h4 class="card-title">Input Data Barang</h4>
                            </div>
                             <div class="card-body">
                                <div class="basic-form">
                                    <form action="" method="POST" enctype="multipart/form-data" >

                                        <div class="form-group">
                                            <label for="nama_brg">BARANG</label>
                                            <input type="text" class="form-control input-default" name="nama_brg" placeholder="Masukkan Nama Barang" required>
                                        </div>

                                        <div class="form-group">
                                            <label>DEPARTEMEN</label>
                                            <br>
                                            <label><input type="radio" name="departemen" value="KAMAR TIDUR" required> KAMAR TIDUR</label>
                                            <br>
                                            <label><input type="radio" name="departemen" value="DAPUR DAN RUANG MAKAN" required> DAPUR DAN RUANG MAKAN</label>
                                            <br>
                                            <label><input type="radio" name="departemen" value="RUANG TAMU" required> RUANG TAMU</label>
                                            <br>
                                            <label><input type="radio" name="departemen" value="RUANG KERJA" required> RUANG KERJA</label>
                                        </div>

                                        <div class="form-group">
                                            <label for="restok">MINIM STOK</label>
                                            <input type="number" class="form-control input-default" name="restok" placeholder="Masukkan Jumlah Minim Stok" required>
                                        </div>


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
        <!--**********************************
            Content body end
        ***********************************-->


        <?php include "../theme-footer.php" ?>

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
    <script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/deznav-init.js"></script>

</body>
</html><?php
include "../koneksi.php";

if (isset($_POST['simpan'])) {
    $nama_brg = $_POST['nama_brg'];
    $departemen = $_POST['departemen'];
    $restok = $_POST['restok'];
    $jumlah_brg = !empty($_POST['jumlah_brg']) ? $_POST['jumlah_brg'] : 0; // Menggunakan nilai 0 jika tidak ada nilai yang diberikan
    $input = "INSERT INTO tb_barang (nama_brg, departemen, restok, jumlah_brg) VALUES ('$nama_brg', '$departemen', '$restok', '$jumlah_brg')";

    mysqli_query($conn, $input);
    echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Disimpan....</h5></div>";
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/barang/index.php'>";
}
?>

