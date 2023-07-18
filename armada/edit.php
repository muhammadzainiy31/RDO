<?php
include "../koneksi.php";
$id = $_GET['no_plat'];
$ambilData = mysqli_query($conn, "SELECT * FROM tb_armada WHERE no_plat='$id'");
$hasil = mysqli_fetch_array($ambilData);
?>

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
                                <h4 class="card-title">EDIT DATA ARMADA</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <h4><label for="no_plat">NOMOR POLISI/PLAT</label></h4>
                                            <input type="text" class="form-control input-default" name="no_plat" id="no_plat" value="<?php echo $hasil['no_plat']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <h4><label for="type_armada">TYPE ARMADA</label></h4>
                                            <br>
                                            <h4><label><input type="radio" name="type_armada" value="HINO" <?php if ($hasil['type_armada'] == "HINO") echo "checked"; ?>> HINO</label></h4>
                                            <h4><label><input type="radio" name="type_armada" value="TAYO" <?php if ($hasil['type_armada'] == "TAYO") echo "checked"; ?>> TAYO</label></h4>
                                            <h4><label><input type="radio" name="type_armada" value="KUDA" <?php if ($hasil['type_armada'] == "KUDA") echo "checked"; ?>> KUDA</label></h4>
                                        </div>
                                        <div class="form-group">
                                            <h4><label for="tahun">TAHUN</label></h4>
                                            <input type="number" class="form-control input-default" name="tahun" id="tahun" value="<?php echo $hasil['tahun']; ?>">
                                        </div>
                                        <br> <br>
                                        <input type="hidden" name="status" value="1">
                                        <div class="mt-4"></div><br> <br>
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
</body>

</html>

<?php
include "../koneksi.php";
if (isset($_POST['simpan'])) {
    $no_plat = $_POST['no_plat'];
    $type_armada = $_POST['type_armada'];
    $tahun = $_POST['tahun'];
    mysqli_query($conn, "UPDATE tb_armada SET no_plat='$no_plat', type_armada='$type_armada', tahun='$tahun' WHERE no_plat='$id'") or die(mysqli_error($conn));

    echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Diupdate....</h5></div>";
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/armada/index.php'>";
}
?>