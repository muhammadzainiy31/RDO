<?php
include 'koneksi.php';
$query = "SELECT * FROM tb_admin WHERE nik = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $nik);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$admin = null;
if (mysqli_num_rows($result) > 0) {
    // Data ditemukan, tampilkan profil admin
    $admin = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags, title, and other head content -->
</head>

<body>
    <div id="preloader">
        <!-- Preloader content -->
    </div>

    <div id="main-wrapper">

        <?php include "theme-header.php"; ?>
        <?php include "theme-sidebar.php"; ?>

        <!-- Content body -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Profil admin<?php echo $admin ? ' - ' . htmlspecialchars($admin['nama']) : ''; ?></h4>
                        <br> <br>
                    </div>
                    <br>

                    <?php if ($admin) { ?>
                        <h2><?php echo htmlspecialchars($admin['nama']); ?></h2>
                        <p>NIK Admin: <?php echo htmlspecialchars($admin['nik']); ?></p>

                        <a href="edit_password.php?nik=<?php echo htmlspecialchars($admin['nik']); ?>">Ganti Password</a>
                    <?php } else { ?>
                        <p>Profil admin tidak ditemukan.</p>
                    <?php } ?>
                    <br>
                </div>
            </div>
        </div>

        <?php include "../theme-footer.php"; ?>

    </div>

    <!-- Required vendors and scripts -->
</body>

</html>
