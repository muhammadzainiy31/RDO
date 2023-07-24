<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["login"])) {
    header("Location: login.php"); // Mengarahkan pengguna ke halaman login jika belum login
    exit; // Menghentikan eksekusi skrip
}

// Ambil data User dari session nik
include '../koneksi.php';
$nik = $_SESSION["nik"];
$query = "SELECT * FROM tb_driver WHERE nik = '$nik'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Data User ditemukan, ambil nama User
    $user = mysqli_fetch_assoc($result);
    $namaUser = $user['nama_driver'];
} else {
    // Data User tidak ditemukan, beri nilai default
    $namaUser = "User";
}
?>

<!--**********************************
    Nav header start
***********************************-->
<div class="nav-header">
    <a href="index.html" class="brand-logo">
        <img class="logo-abbr" src="../images/2.png" alt="">
    </a>

    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>

<!--**********************************
    Header start
***********************************-->
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        APLIKASI REPORT DELIVERY ORDER SDC BANJARMASIN
                    </div>
                </div>
                <div class="header-right">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown header-profile">
                            


<!-- Kemudian tampilkan data User di bagian HTML -->
<a class="nav-link" href="javascript:;" role="button" data-toggle="dropdown">
    <img src="../images/profile/12.png" width="100" alt="">
    <div class="header-info">
        <span>Hello, <strong><?php echo $namaUser; ?></strong></span>
    </div>
</a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="./profil.php" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="ml-2">Profil</span>
                                </a>
                                <a href="../index.php" class="dropdown-item ai-icon">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    <span class="ml-2">Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<!--**********************************
    Header end
***********************************-->