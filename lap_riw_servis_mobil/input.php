<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APPLIKASI REPORT DELIVERY ORDER | INPUT DATA</title>
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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Data</a></li>
                    </ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Input Riwayat Servis</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <h4><label for="no_plat">No Plat</label></h4>
                                            <select name="no_plat" id="no_plat" class="form-control" required>
                                                <option value="">- PILIH -</option>
                                                <?php
                                                include "../koneksi.php";
                                                $ambilData = mysqli_query($conn, "SELECT * FROM tb_armada") or die(mysqli_error($conn));
                                                while ($hasil = mysqli_fetch_array($ambilData)) {
                                                    echo '<option value="' . $hasil['no_plat'] . '">' . $hasil['no_plat'] . '-'.$hasil['type_armada'] .  '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="tanggal_servis">Tanggal Servis</label>
                                            <input type="date" class="form-control input-default" name="tanggal_servis" placeholder="Masukkan Tanggal Servis">
                                        </div>

                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <input type="text" class="form-control input-default" name="keterangan" placeholder="Masukkan Keterangan">
                                        </div>

                                        <div class="form-group">
                                            <label for="estimasi">Estimasi Selesai</label>
                                            <input type="date" class="form-control input-default" name="estimasi" placeholder="Masukkan estimasi">
                                        </div>

                                        <div class="form-group">
                                            <label for="biaya">Biaya</label>
                                            <input type="text" class="form-control input-default" name="biaya" placeholder="Masukkan Biaya">
                                        </div>

                                        <div class="mt-4"></div>
                                        <button class="btn btn-primary mr-2" name="simpan">Simpan</button>
                                        <a href="index.php" class="btn btn-danger">Batal</a>
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

    <script>
        var noPlatSelect = document.getElementById('no_plat');
        noPlatSelect.addEventListener('change', function() {
            var selectedNoPlat = this.value;
            <?php
            $ambilData = mysqli_query($conn, "SELECT * FROM tb_armada") or die(mysqli_error($conn));
            $options = [];
            while ($hasil = mysqli_fetch_array($ambilData)) {
                $option = "if (selectedNoPlat === '" . $hasil['no_plat'] . "') {";
                $option .= "}";
                $options[] = $option;
            }
            echo implode("\n", $options);
            ?>
        });
    </script>
<?php
include "../koneksi.php";
if (isset($_POST['simpan'])) {
    $plat = $_POST['no_plat'];
    $tanggal_servis = $_POST['tanggal_servis'];
    $keterangan = $_POST['keterangan'];
    $estimasi = $_POST['estimasi'];
    $biaya = $_POST['biaya'];
    $input = "INSERT INTO riwayat_servis (no_plat, tanggal_servis, keterangan, estimasi, biaya) VALUES ('$plat', '$tanggal_servis', '$keterangan', '$estimasi', '$biaya')";
    mysqli_query($conn, $input);
    echo "<div align='center'><h5>Silahkan Tunggu, Data Sedang Disimpan....</h5></div>";
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/lap_riw_servis_mobil/index.php'>";
}
?>

</body>

</html>
