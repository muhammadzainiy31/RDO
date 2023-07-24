<?php
include "../koneksi.php";
$id_pengiriman = $_GET['id_pengiriman'];
$ambilData = mysqli_query($conn, "SELECT * FROM tb_pengirim WHERE id_pengiriman='$id_pengiriman'");
$hasil = mysqli_fetch_array($ambilData);

include "../theme-header.php";
include "../theme-sidebar.php";

if (isset($_POST['simpan'])) {
    $id_pengiriman = $_POST['id_pengiriman'];
    $id_surat = $_POST['id_surat'];
    $no_plat = $_POST['no_plat'];
    $nik = $_POST['nik'];

    mysqli_query($conn, "UPDATE tb_pengirim SET id_surat='$id_surat', no_plat='$no_plat', nik='$nik' WHERE id_pengiriman='$id_pengiriman'") or die(mysqli_error($conn));

    echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Disimpan....</h5></div>";
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/lap_surat_jalan/index.php'>";
}
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

        <!--**********************************
            Header start
        ***********************************-->
        <?php include "../theme-header.php" ?>
        <!--**********************************
            Header end
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include "../theme-sidebar.php" ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
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
                                <h4 class="card-title">Edit Pengiriman</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <h4><label for="id_pengiriman">ID PENGIRIMAN</label></h4>
                                            <input type="number" class="form-control input-default" name="id_pengiriman" id="id_pengiriman" value="<?php echo $hasil['id_pengiriman']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <h4><label for="id_surat">ID SURAT</label></h4>
                                            <input type="number" class="form-control input-default" name="id_surat" id="id_surat" value="<?php echo $hasil['id_surat']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <h4><label for="no_plat">NO PLAT</label></h4>
                                            <select name="no_plat" id="no_plat" class="form-control" required onchange="autofill()">
                                                <option value="">-PILIH-</option>
                                                <?php
                                                $ambilDataArmada = mysqli_query($conn, "SELECT * FROM tb_armada") or die(mysqli_error($conn));
                                                while ($hasilArmada = mysqli_fetch_array($ambilDataArmada)) {
                                                    $selected = ($hasilArmada['no_plat'] == $hasil['no_plat']) ? 'selected' : '';
                                                    echo '<option value="' . $hasilArmada['no_plat'] . '" ' . $selected . '>' . $hasilArmada['no_plat'] . ' - ' . $hasilArmada['type_armada'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <script>
                                            // Fungsi untuk melakukan autofill pada no_telpon dan alamat_cust
                                            function autofill() {
                                                var no_plat = document.getElementById("no_plat").value;
                                                <?php
                                                $ambilDataCustomer = mysqli_query($conn, "SELECT * FROM tb_customer") or die(mysqli_error($conn));
                                                while ($hasilCustomer = mysqli_fetch_array($ambilDataCustomer)) {
                                                    echo "if (no_plat === '" . $hasilCustomer['no_plat'] . "') {";
                                                    echo "document.getElementById('no_telpon').value = '" . $hasilCustomer['no_telpon'] . "';";
                                                    echo "document.getElementById('alamat_cust').value = '" . $hasilCustomer['alamat_cust'] . "';";
                                                    echo "}";
                                                }
                                                ?>
                                            }
                                        </script>
                                        <div class="form-group">
                                            <h4><label for="nik">NIK Driver</label></h4>
                                            <select name="nik" id="nik" class="form-control" required>
                                                <option value="">-PILIH-</option>
                                                <?php
                                                $ambilDataDriver = mysqli_query($conn, "SELECT * FROM tb_driver") or die(mysqli_error($conn));
                                                while ($hasilDriver = mysqli_fetch_array($ambilDataDriver)) {
                                                    $selected = ($hasilDriver['nik'] == $hasil['nik']) ? 'selected' : '';
                                                    echo '<option value="' . $hasilDriver['nik'] . '" ' . $selected . '>' . $hasilDriver['nik'] . ' - ' . $hasilDriver['nama_driver'] . '</option>';
                                                }
                                                ?>
                                            </select>
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
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <?php include "../theme-footer.php" ?>
        <!--**********************************
            Footer end
        ***********************************-->

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