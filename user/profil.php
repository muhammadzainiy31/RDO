<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["login"])) {
    header("Location: login.php"); // Mengarahkan pengguna ke halaman login jika belum login
    exit; // Menghentikan eksekusi skrip
}

include '../koneksi.php';
$nik = $_SESSION["nik"];
$query = "SELECT * FROM tb_driver WHERE nik = '$nik'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Data ditemukan, tampilkan profil driver
    $driver = mysqli_fetch_assoc($result);
} else {
    // Data tidak ditemukan, tampilkan pesan
    $driver = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Profil Driver<?php echo $driver ? ' - ' . $driver['nama_driver'] : ''; ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/2.png">
    <link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <style>
        .scroll-horizontal {
            overflow-x: auto;
        }
    </style>
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

        <?php include "theme-header.php"; ?>
        <?php include "theme-sidebar.php"; ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Profil Driver</h4>
                        <br> <br>
                    </div>
                    <br>

                    <?php if ($driver) { ?>
                        <h2><?php echo $driver['nama_driver']; ?></h2>
                        <p>NIK Driver: <?php echo $driver['nik']; ?></p>
                        <p>Tanggal Lahir: <?php echo $driver['tanggal_lahir']; ?></p>
                        <p>Jabatan: <?php echo $driver['jabatan']; ?></p>
                        <p>Tingkat SIM: <?php echo $driver['sim']; ?></p>
                        <p>Berlaku SIM: <?php echo $driver['berlaku_sim']; ?></p>
                        <p>Alamat: <?php echo $driver['alamat_driver']; ?></p>
                        <!-- Anda dapat menampilkan informasi lainnya sesuai dengan kolom yang ada di tabel tb_driver -->

                        <a href="edit_password.php" class="btn btn-warning">Ganti Password</a>
                    <?php } else { ?>
                        <p>Profil driver tidak ditemukan.</p>
                    <?php } ?>
                    <br>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <?php include "theme-footer.php"; ?>

    </div>

    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
    <script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/deznav-init.js"></script>

    <script src="../vendor/highlightjs/highlight.pack.min.js"></script>

</body>

</html>
