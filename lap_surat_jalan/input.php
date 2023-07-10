<?php
include "../koneksi.php";
$id_surat = $_GET['id_surat'];
$ambilData = mysqli_query($conn, "SELECT * FROM tb_surat WHERE id_surat='$id_surat'");
$hasil = mysqli_fetch_array($ambilData);
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
                                <h4 class="card-title">Buat Pengiriman</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <h4><label for="id_surat">ID SURAT</label></h4>
                                            <input type="number" class="form-control input-default" name="id_surat" id="id_surat" value="<?php echo $hasil['id_surat']; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="nm_cust">NAMA CUSTOMER</label></h4>
                                            <input type="text" class="form-control input-default" name="nm_cust" id="nm_cust" value="<?php echo $hasil['nm_cust']; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="no_telpon">NO TELPON</label></h4>
                                            <input type="text" class="form-control input-default" name="no_telpon" id="no_telpon" value="<?php echo $hasil['no_telpon']; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="alamat_cust">ALAMAT</label></h4>
                                            <input type="text" class="form-control input-default" name="alamat_cust" id="alamat_cust" value="<?php echo $hasil['alamat_cust']; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="kelurahan">KELURAHAN</label></h4>
                                            <input type="text" class="form-control input-default" name="kelurahan" id="kelurahan" value="<?php echo $hasil['kelurahan']; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="rute">RUTE</label></h4>
                                            <input type="text" class="form-control input-default" name="rute" id="rute" value="<?php echo $hasil['rute']; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="pembelian">PEMBELIAN</label></h4>
                                            <input type="text" class="form-control input-default" name="pembelian" id="pembelian" value="<?php echo $hasil['pembelian']; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="tanggal_kirim">TANGGAL KIRIM</label></h4>
                                            <input type="text" class="form-control input-default" name="tanggal_kirim" id="tanggal_kirim" value="<?php echo $hasil['tanggal_kirim']; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="no_plat">NO PLAT</label></h4>
                                            <select name="no_plat" id="no_plat" class="form-control" required onchange="autofill()">
                                                <option value="">-PILIH-</option>
                                                <?php
                                                $ambilDataArmada = mysqli_query($conn, "SELECT * FROM tb_armada") or die(mysqli_error($conn));
                                                while ($hasilArmada = mysqli_fetch_array($ambilDataArmada)) {
                                                    echo '<option value="' . $hasilArmada['no_plat'] . '">' . $hasilArmada['no_plat'] . ' - ' . $hasilArmada['type_armada'] . '</option>';
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
                                            <h4><label for="nik_driver">NIK Driver</label></h4>
                                            <select name="nik_driver" id="nik_driver" class="form-control" required>
                                                <option value="">-PILIH-</option>
                                                <?php
                                                $ambilDataDriver = mysqli_query($conn, "SELECT * FROM tb_driver") or die(mysqli_error($conn));
                                                while ($hasilDriver = mysqli_fetch_array($ambilDataDriver)) {
                                                    echo '<option value="' . $hasilDriver['nik_driver'] . '">' .  $hasilDriver['nik_driver'] . ' - ' . $hasilDriver['nama_driver'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>


                                        <div class="mt-4"></div>
                                        <button class="btn btn-primary mr-2" type="submit" name="submit">Submit</button>
                                        <a href="transaksi.php" class="btn btn-danger">Batal</a>
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

<?php
include "../koneksi.php";
if (isset($_POST['submit'])) {
    $id_surat = $_POST['id_surat'];
    $nm_cust = $_POST['nm_cust'];
    $no_telpon = $_POST['no_telpon'];
    $alamat_cust = $_POST['alamat_cust'];
    $kelurahan = $_POST['kelurahan'];
    $rute = $_POST['rute'];
    $pembelian = $_POST['pembelian'];
    $no_plat = $_POST['no_plat'];
    $nik_driver = $_POST['nik_driver'];
    $input = "INSERT INTO tb_pengirim VALUES ('', '$id_surat', '$nm_cust', '$no_telpon', '$alamat_cust', '$kelurahan', '$rute', '$pembelian', '$no_plat', '$nik_driver')";
    header('location:../surat/index.php');
    echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Diproses....</h5></div>";
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/surat/index.php'>";
}
?>
