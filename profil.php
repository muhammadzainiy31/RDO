<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

include './koneksi.php';

$nik = $_SESSION["nik"];

// Use prepared statement to prevent SQL injection
$query = "SELECT * FROM tb_admin WHERE nik = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $nik);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$admin = mysqli_fetch_assoc($result);

// Close the prepared statement
mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Profil admin<?php echo $admin ? ' - ' . htmlspecialchars($admin['nama']) : ''; ?></title>
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

        <?php include "./theme-header.php"; ?>
        <?php include "./theme-sidebar.php"; ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Profil admin</h4>
                        <br> <br>
                    </div>
                    <br>

                    <?php if ($admin) { ?>
                        <h2><?php echo htmlspecialchars($admin['nama']); ?></h2>
                        <p>NIK admin: <?php echo htmlspecialchars($admin['nik']); ?></p>
                        <!-- You can display other information based on columns in the tb_admin table -->

                        <a href="edit_password.php?nik=<?php echo htmlspecialchars($admin['nik']); ?>">Ganti Password</a>
                    <?php } else { ?>
                        <p>Profil admin tidak ditemukan.</p>
                    <?php } ?>
                    <br>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <?php include "./theme-footer.php"; ?>

    </div>

    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
    <script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/deznav-init.js"></script>

    <script src="../vendor/highlightjs/highlight.pack.min.js"></script>

</body>

</html>
