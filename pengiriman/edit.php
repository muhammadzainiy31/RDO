<?php
include "../koneksi.php";
$id = $_GET['id_surat'];
$ambilData = mysqli_query($conn, "SELECT * FROM tb_surat WHERE id_surat='$id'");
$hasil = mysqli_fetch_array($ambilData);

if (isset($_POST['submit'])) {
    $id_surat = $_POST['id_surat'];
    $id_cust = $_POST['id_cust'];
    $no_plat = $_POST['no_plat'];
    $nik_driver = $_POST['nik_driver'];
    
    // Simpan data ke tabel pengirim
    $query = "INSERT INTO tb_pengirim (id_surat, id_cust, no_plat,nik_driver) 
              VALUES ('$id_surat', '$id_cust', '$no_plat', '$nik_driver')";
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Diproses....</h5></div>";
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/pengiriman/index.php'>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APPLIKASI REPORT DELIVERY ORDER | </title>
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
                                <h4 class="card-title">Buat Surat Jalan</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <h4><label for="id_surat">ID SURAT</label></h4>
                                            <input type="number" class="form-control input-default" name="id_surat" id="id_surat" value="<?php echo $hasil['id_surat']; ?>" readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                            <h4><label for="id_cust">ID CUSTOMER </label></h4>
                                            <input type="number" class="form-control input-default" name="id_cust" id="id_cust" value="<?php echo $hasil['id_cust']; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <h4>
                                                <label for="no_plat">Armada/Mobil</label>
                                                <select name="no_plat" id="no_plat" class="form-control" required>
                                                    <option value="">-PILIH-</option>
                                                    <?php
                                                    include "../koneksi.php";
                                                    $ambilData = mysqli_query($conn, "SELECT * FROM tb_armada") or die(mysqli_error($conn));
                                                    while ($hasil = mysqli_fetch_array($ambilData)) {
                                                        echo '<option value="' . $hasil['no_plat'] .  '">' .
                                                            $hasil['no_plat'] . '-'.  $hasil['type_armada'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </h4>
                                        </div>

                                        <script>
                                            // Fungsi untuk melakukan autofill pada type_armada
                                            function autofillBrg() {
                                                var no_plat = document.getElementById("no_plat").value;
                                                <?php
                                                $ambilData = mysqli_query($conn, "SELECT * FROM tb_armada") or die(mysqli_error($conn));
                                                while ($hasil = mysqli_fetch_array($ambilData)) {
                                                    echo "if (no_plat === '" . $hasil['no_plat'] . "') {";
                                                    echo "}";
                                                }
                                                ?>
                                            }

                                            // Panggil fungsi autofill saat combo box berubah
                                            document.getElementById("no_plat").addEventListener("change", autofillBrg);
                                        </script>

                                          <div class="form-group">
                                            <h4>
                                                <label for="nik_driver">NIK Driver</label>
                                                <select name="nik_driver" id="nik_driver" class="form-control" required>
                                                    <option value="">-PILIH-</option>
                                                    <?php
                                                    include "../koneksi.php";
                                                    $ambilData = mysqli_query($conn, "SELECT * FROM tb_driver") or die(mysqli_error($conn));
                                                    while ($hasil = mysqli_fetch_array($ambilData)) {
                                                        echo '<option value="' . $hasil['nik_driver'] . '">' .
                                                            $hasil['nik_driver'] . '-'.   $hasil['nama_driver'] .'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </h4>
                                        </div>
                                        <script>
                                            // Fungsi untuk melakukan autofill pada nama_driver
                                            function autofillBrg() {
                                                var nik_driver = document.getElementById("nik_driver").value;
                                                <?php
                                                $ambilData = mysqli_query($conn, "SELECT * FROM tb_driver") or die(mysqli_error($conn));
                                                while ($hasil = mysqli_fetch_array($ambilData)) {
                                                    echo "if (nik_driver === '" . $hasil['nik_driver'] . "') {";
                                                    echo "}";
                                                }
                                                ?>
                                            }

                                            // Panggil fungsi autofill saat combo box berubah
                                            document.getElementById("nik_driver").addEventListener("change", autofillBrg);
                                        </script>

                                        <div class="mt-4"></div>
                                        <button class="btn btn-primary mr-2" type="submit" name="submit">Submit</button>
                                        <a href="index.php" class="btn btn-danger">Batal</a>
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

</html>
