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
        <div class="content-body">
            <div class="container-fluid">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">DATA BARANG TERLARIS</h4>
                        <br> <br>
                    </div>
                    <br>
                    <div class="input-group search-area ml-auto d-inline-flex">
                        <input type="text" class="form-control" placeholder="Masukkan Nama Barang" id="searchInput">
                        <div class="input-group-append">
                            <button type="button" class="input-group-text" onclick="searchData()"><i class="flaticon-381-search-2"></i></button>
                        </div>
                    </div>
                    <br>
                    <br>
                    <a href="cetak.php" class="btn btn-primary">Cetak Report</a>
                    <br> <br>
                    <table class="table table-bordered">
                        <tr align="center" bgcolor="#E9967A">
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Departemen</th>
                            <th>Jumlah Terjual</th>
                        </tr>

                        <?php
include '../koneksi.php';
$no = 1;
$tampil = mysqli_query($conn, "SELECT tb_pembelian.kode_brg, tb_barang.nama_brg, tb_barang.departemen, SUM(tb_pembelian.qty) AS jumlah_transaksi
                FROM tb_pembelian
                JOIN tb_barang ON tb_pembelian.kode_brg = tb_barang.kode_brg
                GROUP BY tb_pembelian.kode_brg, tb_barang.nama_brg, tb_barang.departemen
                ORDER BY jumlah_transaksi DESC");
if (mysqli_num_rows($tampil) > 0) {
    while ($row = mysqli_fetch_array($tampil)) {
        echo "<tr align='center'>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['kode_brg'] . "</td>";
        echo "<td>" . $row['nama_brg'] . "</td>";
        echo "<td>" . $row['departemen'] . "</td>";
        echo "<td>" . $row['jumlah_transaksi'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo "<td colspan='5' align='center'>Data kosong</td>";
    echo "</tr>";
}
?>



                    </table>
                    <br>

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
                td = tr[i].getElementsByTagName("td")[2]; // Ganti angka 2 dengan indeks kolom nama

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
