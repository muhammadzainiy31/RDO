<?php
    include "../koneksi.php";

    if (isset($_GET['id_cust'])) {
        $id = $_GET['id_cust'];
        $ambilData = mysqli_query($conn, "SELECT * FROM tb_customer WHERE id_cust='$id'");
        $hasil = mysqli_fetch_array($ambilData);
    }

    if (isset($_POST['simpan'])) {
        $id_cust = $_POST['id_cust'];
        $nama_cust = $_POST['nama_cust'];
        $no_telpon = $_POST['no_telpon'];
        $alamat_cust = $_POST['alamat_cust'];
        $kelurahan = $_POST['kelurahan'];
        $rute = $_POST['rute'];

        mysqli_query($conn, "UPDATE tb_customer SET id_cust='$id_cust', nama_cust='$nama_cust', no_telpon='$no_telpon', alamat_cust='$alamat_cust', kelurahan='$kelurahan', rute='$rute' WHERE id_cust='$id'") or die(mysqli_error($conn));

        echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Diupdate....</h5></div>";
        echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/customer/index.php'>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APPLIKASI REPORT DELIVERY ORDER | EDIT DATA</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/2.png">
    <!-- Custom Stylesheet -->
    <link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Preloader start -->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!-- Preloader end -->

    <!-- Main wrapper start -->
    <div id="main-wrapper">
        <?php include "../theme-header.php" ?>
        <?php include "../theme-sidebar.php" ?>

        <!-- Content body start -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Input</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Data</a></li>
                    </ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">EDIT DATA CUSTOMER</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <h4><label for="id_cust">KODE CUSTOMER</label></h4>
                                            <input type="number" class="form-control input-default" name="id_cust" id="id_cust" value="<?php echo isset($hasil['id_cust']) ? $hasil['id_cust'] : ''; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="nama_cust">NAMA CUSTOMER</label></h4>
                                            <input type="text" class="form-control input-default" name="nama_cust" id="nama_cust" value="<?php echo isset($hasil['nama_cust']) ? $hasil['nama_cust'] : ''; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="no_telpon">NO TELPON</label></h4>
                                            <input type="number" class="form-control input-default" name="no_telpon" id="no_telpon" value="<?php echo isset($hasil['no_telpon']) ? $hasil['no_telpon'] : ''; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="alamat_cust">ALAMAT</label></h4>
                                            <input type="text" class="form-control input-default" name="alamat_cust" id="alamat_cust" value="<?php echo isset($hasil['alamat_cust']) ? $hasil['alamat_cust'] : ''; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="kelurahan">KELURAHAN</label></h4>
                                            <input type="text" class="form-control input-default" name="kelurahan" id="kelurahan" value="<?php echo isset($hasil['kelurahan']) ? $hasil['kelurahan'] : ''; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="rute">Rute</label>
                                            <br>
                                            <label><input type="radio" name="rute" value="BJB" <?php echo isset($hasil['rute']) && $hasil['rute'] == 'BJB' ? 'checked' : ''; ?>> BJB</label>
                                            <label><input type="radio" name="rute" value="BJM" <?php echo isset($hasil['rute']) && $hasil['rute'] == 'BJM' ? 'checked' : ''; ?>> BJM</label>
                                            <label><input type="radio" name="rute" value="LUAR KOTA" <?php echo isset($hasil['rute']) && $hasil['rute'] == 'LUAR KOTA' ? 'checked' : ''; ?>> LUAR KOTA</label>
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

        <?php include "../theme-footer.php" ?>
    </div>
    <!-- Main wrapper end -->

    <!-- Scripts -->
    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
    <script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/deznav-init.js"></script>

</body>
</html>
