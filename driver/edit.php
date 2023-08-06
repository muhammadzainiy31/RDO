<?php
include "../koneksi.php";
$id = $_GET['nik'];
$ambilData = mysqli_query($conn, "SELECT * FROM tb_driver WHERE nik='$id'");
$hasil = mysqli_fetch_array($ambilData);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APLIKASI REPORT DELIVERY ORDER | EDIT DATA</title>
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

        <?php include "../theme-header.php"; ?>
        <?php include "../theme-sidebar.php"; ?>

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
                                <h4 class="card-title">Edit</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <h4><label for="nik">NIK DRIVER</label></h4>
                                            <input type="number" class="form-control input-default" name="nik" id="nik" value="<?php echo $hasil['nik']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="nama_driver">NAMA</label></h4>
                                            <input type="text" class="form-control input-default" name="nama_driver" id="nama_driver" value="<?php echo $hasil['nama_driver']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="tanggal_lahir">TANGGAL LAHIR</label></h4>
                                            <input type="date" class="form-control input-default" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $hasil['tanggal_lahir']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="jabatan">JABATAN </label></h4>
                                            <br>
                                            <h4><label><input type="radio" name="jabatan" value="DRIVER" <?php if ($hasil['jabatan'] == "DRIVER") echo "checked"; ?>> DRIVER</label></h4>
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="sim">TINGKAT SIM </label></h4>
                                            <br>
                                            <h4><label><input type="radio" name="sim" value="SIM A" <?php if ($hasil['sim'] == "SIM A") echo "checked"; ?>> SIM A</label></h4>
                                            <h4><label><input type="radio" name="sim" value="SIM B1" <?php if ($hasil['sim'] == "SIM B1") echo "checked"; ?>> SIM B1</label></h4>
                                            <h4><label><input type="radio" name="sim" value="SIM B2" <?php if ($hasil['sim'] == "SIM B2") echo "checked"; ?>> SIM B2</label></h4>
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="berlaku_sim">Berlaku SIM</label></h4>
                                            <input type="date" class="form-control input-default" name="berlaku_sim" id="berlaku_sim" value="<?php echo $hasil['tanggal_lahir']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="alamat_driver">ALAMAT</label></h4>
                                            <input type="text" class="form-control input-default" name="alamat_driver" id="alamat_driver" value="<?php echo $hasil['alamat_driver']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="password">ALAMAT</label></h4>
                                            <input type="text" class="form-control input-default" name="password" id="password" value="<?php echo $hasil['password']; ?>">
                                        </div>

                                        <input type="hidden" name="status" value="1">
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

        <?php include "../theme-footer.php"; ?>

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
if (isset($_POST['simpan'])) {
    $nik = $_POST['nik'];
    $nama_driver = $_POST['nama_driver'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jabatan = $_POST['jabatan'];
    $sim = $_POST['sim'];
    $berlaku_sim = $_POST['berlaku_sim'];
    $alamat_driver = $_POST['alamat_driver'];
    $password = $_POST['password'];
    mysqli_query($conn, "UPDATE tb_driver SET nik='$nik', nama_driver='$nama_driver', tanggal_lahir='$tanggal_lahir', jabatan='$jabatan', sim='$sim',berlaku_sim='$berlaku_sim', alamat_driver='$alamat_driver', password='$password' 
        WHERE nik='$id'") or die(mysqli_error($conn));

    echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Diupdate....</h5></div>";
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/driver/index.php'>";
}
?>