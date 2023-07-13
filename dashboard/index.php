<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APLIKASI REPORT DELIVERY ORDER | DATA</title>
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
        <?php include "../theme-header.php" ?>



        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
                                    <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                    <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                    <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                </svg>
                                Data Master
                            </h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go to Data Master</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                    <path d="M12 20h9"></path>
                                    <path d="M16 3s-7.119 0-8 0-4 4-4 8 0 8 0 8h16s0-7.119 0-8-4-4-8-4z"></path>
                                    <path d="M16 3v4a2 2 0 0 1-2 2H6.929a2 2 0 0 0-1.789 1.106L3 12v5"></path>
                                </svg>
                                Inputan
                            </h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go to Inputan</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                    <path d="M6 3h10a4 4 0 0 1 4 4v12a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4z"></path>
                                    <line x1="8" y1="3" x2="8" y2="11"></line>
                                    <line x1="8" y1="15" x2="8" y2="15"></line>
                                    <line x1="12" y1="11" x2="12" y2="23"></line>
                                    <line x1="16" y1="3" x2="16" y2="11"></line>
                                    <line x1="16" y1="15" x2="16" y2="15"></line>
                                </svg>
                                Laporan
                            </h5>
                            <ul aria-expanded="false">
                                <li><a href="../pengiriman/index.php">Pengiriman</a></li>
                                <li><a href="../lap_surat_jalan/index.php">Surat Jalan</a></li>
                                <li><a href="../lap_barang_laris/index.php">Barang Terlaris</a></li>
                                <li><a href="../lap_minim_barang_stok/index.php">Barang Minim stok</a></li>
                                <li><a href="../lap_berlaku_sim/index.php">Berlaku SIM Driver</a></li>
                                <li><a href="../lap_cust_berdasarkan_wil/index.php">Customer berdasarkan Wilayah</a></li>
                                <li><a href="../lap_cust_royal/index.php">Customer Paling Royal</a></li>
                                <li><a href="../lap_jarak_tempuh/index.php">Jarak Tempuh Armada</a></li>
                                <li><a href="../lap_riw_pengiriman_driver/index.php">Riwayat Pengiriman Driver</a></li>
                                <li><a href="../lap_riw_servis_mobil/index.php">Riwayat Servis Armada</a></li>
                                <li><a href="../rekap_pengiriman_driver/index.php">Rekap Pengiriman Driver</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>

        <?php include "../theme-footer.php" ?>

    </div>

    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
    <script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/deznav-init.js"></script>
    <script src="../vendor/highlightjs/highlight.pack.min.js"></script>

    <script>
        function searchData() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementsByClassName("table")[0];
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3]; // Ganti angka 2 dengan indeks kolom nama

                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <!-- Circle progress -->
</body>

</html>
