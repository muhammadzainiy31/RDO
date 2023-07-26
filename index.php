<?php
session_start();
include "koneksi.php";

if (isset($_POST["login"])) {
    $nik = mysqli_real_escape_string($conn, $_POST["nik"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $ambilData = mysqli_query($conn, "SELECT * FROM tb_admin WHERE nik ='$nik'");

    if (mysqli_num_rows($ambilData) == 1) {
        $hasil = mysqli_fetch_assoc($ambilData);

        if (password_verify($password, $hasil["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["nama"] = $hasil["nama"];
            $_SESSION["nik"] = $hasil["nik"];

            // Pengalihan halaman setelah login berhasil
            header("Location: dashboard/index.php");
            exit;
        } else {
            $error = true; // Password salah
        }
    } else {
        $error = true; // NIK tidak ditemukan
    }

    // Pengalihan halaman jika NIK tidak ditemukan atau password salah
    header("Location: ./index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>LOGIN APLIKASI RDO SDC BANJARMASIN</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account Admin</h4>
                                    <?php
                                    if (isset($error)) {
                                        echo '<div class="alert alert-danger" role="alert">Invalid NIK or Password!</div>';
                                    }
                                    ?>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label class="mb-1" for="nik"><strong>NIK</strong></label>
                                            <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1" for="password"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox ml-1">
                                                    <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                                    <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div><div class="text-center">
    <button type="submit" name="login" value="login" class="btn btn-primary btn-block">Masuk</button>
</div>
<br>
<div class="text-center">
    <a href="index_user.php" class="btn btn-info">Login Driver</a>
</div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/deznav-init.js"></script>
</body>

</html>
