<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APLIKASI REPORT DELIVERY ORDER | DATA</title>
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
        <?php include "../theme-sidebar.php" ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">PROGRES PENGIRIMAN</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-group search-area ml-auto d-inline-flex">
                            <input type="text" class="form-control" placeholder="Masukkan Nama Customer" id="searchInput">
                            <div class="input-group-append">
                                <button type="button" class="input-group-text" onclick="searchData()">
                                    <i class="flaticon-381-search-2"></i>
                                </button>
                            </div>
                            <br>
                        </div>
                        <div class="scroll-horizontal">
                            <table class="table table-bordered">
                                <thead>
                                    <tr align="center" bgcolor="#32c8ed">
                                        <th>No</th>
                                        <th>ID Surat</th>
                                        <th>ID Customer</th>
                                        <th>Nama Customer</th>
                                        <th>Status Pesanan</th>
                                        <th>Status Pengiriman </th>
                                        <th>Status Akhir</th>
                                    </tr>
                                </thead>
                                <tbody><?php
include '../koneksi.php';
$no = 1;

$query = "
    SELECT tb_pengirim.*, tb_customer.*
    FROM tb_pengirim
    JOIN tb_customer ON tb_pengirim.id_cust = tb_customer.id_cust
";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($hasil = mysqli_fetch_array($result)) {
        // Cek apakah id_cust ada di tb_pembelian
        $check_pembelian_query = "SELECT COUNT(*) AS count FROM tb_pembelian WHERE id_cust = {$hasil['id_cust']}";
        $check_pembelian_result = mysqli_query($conn, $check_pembelian_query);
        $check_pembelian_data = mysqli_fetch_assoc($check_pembelian_result);

        // Cek apakah id_pengiriman ada di tb_cekin
        $check_cekin_query = "SELECT COUNT(*) AS count FROM tb_cekin WHERE id_pengiriman = {$hasil['id_pengiriman']}";
        $check_cekin_result = mysqli_query($conn, $check_cekin_query);
        $check_cekin_data = mysqli_fetch_assoc($check_cekin_result);

        // Cek apakah id_pengiriman ada di tb_cekout
        $check_cekout_query = "SELECT COUNT(*) AS count FROM tb_cekout WHERE id_pengiriman = {$hasil['id_pengiriman']}";
        $check_cekout_result = mysqli_query($conn, $check_cekout_query);
        $check_cekout_data = mysqli_fetch_assoc($check_cekout_result);

        // Set status pesanan
        $status_pesanan = ($check_pembelian_data['count'] > 0) ? '<span style="color: red;">Sedang Disiapkan</span>' : '';
        
        // Set status pengiriman
        $status_pengiriman = ($check_cekin_data['count'] > 0) ? '<span style="color: green;">Sedang Diperjalankan Kerumah Customer</span>' : '';

        // Set status akhir
        $status_akhir = ($check_cekout_data['count'] > 0) ? '<span style="color: blue;">Terkirim</span>' : '<span style="color: blue;">Belum Terkirim</span>';


        ?>
        <tr align="center">
            <td><?php echo $no++ ?></td>
            <td><?php echo $hasil['id_pengiriman'] ?></td>
            <td><?php echo $hasil['id_cust'] ?></td>
            <td><?php echo $hasil['nama_cust'] ?></td>
            <td><?php echo $status_pesanan ?></td>
            <td><?php echo $status_pengiriman ?></td>
            <td><?php echo $status_akhir ?></td>
        </tr>
    <?php
    }
} else {
    ?>
    <tr>
        <td colspan="6" align="center">Data kosong</td>
    </tr>
<?php
}
?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "../theme-footer.php" ?>
    </div>

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
            table = document.querySelector(".table");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[4]; // Indeks kolom Nama Customer

                if (td) {
                    txtValue = td.textContent || td.innerText;
                    tr[i].style.display = txtValue.toUpperCase().indexOf(filter) > -1 ? "" : "none";
                }
            }
        }
    </script>
</body>

</html>
