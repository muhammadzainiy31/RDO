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
        <?php include "../theme-sidebar.php" ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <<?php
include '../koneksi.php';

// Perform a query to get the total number of customers per kecamatan
$query = "SELECT kecamatan, COUNT(id_cust) AS jumlah_customer FROM tb_customer GROUP BY kecamatan";
$result = mysqli_query($conn, $query);
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="card-body">
            <div class="card-header">
                <h4 class="card-title">REKAP CUSTOMER BERDASARKAN WILAYAH</h4>
                <br> <br>
            </div>
            <br>
            <div class="input-group search-area ml-auto d-inline-flex">
                <input type="text" class="form-control" placeholder="Masukkan Kecamatan " id="searchInput">
                <div class="input-group-append">
                    <button type="button" class="input-group-text" onclick="searchData()"><i class="flaticon-381-search-2"></i></button>
                </div>
            </div>

            <br>
            <br>
            <a href="cetak.php" class="btn btn-primary">Cetak Laporan</a>
            <br> <br>
            <table class="table table-bordered">
                <tr align="center" bgcolor="#32c8ed">
                    <th>No</th>
                    <th>Kecamatan</th>
                    <th>Jumlah Customer</th>
                </tr>
                <?php
                $no = 1;
                if (mysqli_num_rows($result) > 0) {
                    while ($hasil = mysqli_fetch_array($result)) {
                ?>
                        <tr align="center">
                            <td><?php echo $no++ ?> </td>
                            <td><?php echo $hasil['kecamatan'] ?></td>
                            <td><?php echo $hasil['jumlah_customer'] ?></td>
                        </tr>
                <?php }
                } else { ?>
                    <tr>
                        <td colspan="3" align="center">Data kosong</td>
                    </tr>
                <?php } ?>
            </table>
            <br>

        </div>
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
                td = tr[i].getElementsByTagName("td")[4]; // Ganti angka 2 dengan indeks kolom nama

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