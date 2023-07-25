<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["login"])) {
    header("Location: login.php"); // Mengarahkan pengguna ke halaman login jika belum login
    exit; // Menghentikan eksekusi skrip
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APLIKASI REPORT DELIVERY ORDER | DASHBOARD</title>
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
        <?php include "../theme-header.php"; ?>
        <?php include "../theme-sidebar.php"; ?>

        <!-- Content body start -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">DASHBOARD</h4>
                    </div>
                    <br><br>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="card-title">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                            <path d="M6 3h10a4 4 0 0 1 4 4v12a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4z"></path>
                                            <line x1="8" y1="3" x2="8" y2="11"></line>
                                            <line x1="8" y1="15" x2="8" y2="15"></line>
                                            <line x1="12" y1="11" x2="12" y2="23"></line>
                                            <line x1="16" y1="3" x2="16" y2="11"></line>
                                            <line x1="16" y1="15" x2="16" y2="15"></line>
                                        </svg>
                                        Data
                                    </h1>

                                    <div class="btn-group-vertical" role="group" aria-label="Data Master Buttons">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='../surat/index.php'">Surat Penjualan</button>
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='../pengiriman/index.php'">Pengiriman</button>
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='../customer/index.php'">Customer</button>
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='../barang/index.php'">Barang</button>
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='../driver/index.php'">Driver</button>
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='../armada/index.php'">Armada</button>
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='../departemen/index.php'">Departemen</button>
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='../admin/index.php'">Admin</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="card-title">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M12 20h9"></path>
                                            <path d="M16 3s-7.119 0-8 0-4 4-4 8 0 8 0 8h16s0-7.119 0-8-4-4-8-4z"></path>
                                            <path d="M16 3v4a2 2 0 0 1-2 2H6.929a2 2 0 0 0-1.789 1.106L3 12v5"></path>
                                        </svg>
                                        Inputan
                                    </h1>

                                    <div class="btn-group-vertical" role="group" aria-label="Data Master Buttons">
                                        <button type="button" class="btn btn-warning" onclick="window.location.href='../surat/input.php'">Surat</button>
                                        <button type="button" class="btn btn-warning" onclick="window.location.href='../customer/input.php'">Customer</button>
                                        <button type="button" class="btn btn-warning" onclick="window.location.href='../barang/input.php'">Barang</button>
                                        <button type="button" class="btn btn-warning" onclick="window.location.href='../driver/input.php'">Driver</button>
                                        <button type="button" class="btn btn-warning" onclick="window.location.href='../armada/input.php'">Armada</button>
                                        <button type="button" class="btn btn-warning" onclick="window.location.href='../lap_riw_servis_mobil/input.php'">Servis Armada</button>
                                        <button type="button" class="btn btn-warning" onclick="window.location.href='../departemen/input.php'">Departemen</button>
                                        <button type="button" class="btn btn-warning" onclick="window.location.href='../admin/input.php'">Admin</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="card-title">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                            <path d="M6 3h10a4 4 0 0 1 4 4v12a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4z"></path>
                                            <line x1="8" y1="3" x2="8" y2="11"></line>
                                            <line x1="8" y1="15" x2="8" y2="15"></line>
                                            <line x1="12" y1="11" x2="12" y2="23"></line>
                                            <line x1="16" y1="3" x2="16" y2="11"></line>
                                            <line x1="16" y1="15" x2="16" y2="15"></line>
                                        </svg>
                                        Laporan
                                    </h1>

                                    <div class="btn-group-vertical" role="group" aria-label="Data Master Buttons">
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='../lap_surat_jalan/index.php'">Pengiriman</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='../pengiriman/index.php'">Surat Jalan</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='../lap_minim_barang_stok/index.php'">Barang Minim Stok</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='../riwayat_lap_barang_laris/index.php'">Barang Terlaris</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='../lap_barang_laris/index.php'">Riwayat Barang Terlaris</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='../lap_berlaku_sim/index.php'">Berlaku SIM Driver</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='../lap_cust_berdasarkan_wil/index.php'">Customer Berdasarkan Kecamatan</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='../rekap_cust_berdasarkan_wil/index.php'">Rekap Customer Berdasarkan Kecamatan</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='../lap_cust_royal/index.php'">Customer Paling Royal</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='../lap_riw_pengiriman_driver/index.php'">Riwayat Pengiriman Driver</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='../rekap_pengiriman_driver/index.php'">Rekap Pengiriman Driver</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='../lap_riw_servis_mobil/index.php'">Riwayat Servis Armada</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='../lap_jarak_tempuh/index.php'">Jarak Tempuh Armada</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='../rdo/index.php'">RDO</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content body end -->

        <?php include "../theme-footer.php"; ?>

    </div>

    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
    <script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/deznav-init.js"></script>
    <script src="../vendor/highlightjs/highlight.pack.min.js"></script>
    <!-- Circle progress -->
</body>

</html>