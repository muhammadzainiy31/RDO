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
                        <h4 class="card-title">RIWAYAT BARANG TERLARIS</h4>
                    </div>
                    <div class="input-group search-area ml-auto d-inline-flex">
                        <input type="text" class="form-control" placeholder="Masukkan Nama Barang" id="searchInput">
                        <div class="input-group-append">
                            <button type="button" class="input-group-text" onclick="searchData()"><i class="flaticon-381-search-2"></i></button>
                        </div>
                    </div>

                    <div class="container align-items-center">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col form-group">
                                    <label for="inputMulaiTanggal" class="font-weight-bold">Mulai Tanggal :</label>
                                    <input type="date" id="inputMulaiTanggal" name="mulai_tanggal" class="form-control" required>
                                </div>
                                <div class="col form-group">
                                    <label for="inputSampaiTanggal" class="font-weight-bold">Sampai Tanggal :</label>
                                    <input type="date" id="inputSampaiTanggal" name="sampai_tanggal" class="form-control" required>
                                </div>
                                <div class="col-auto form-group">
                                    <button type="submit" name="filter" class="btn btn-success mt-3">Tampilkan</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <br>
                    <br>
                    <a href="cetak.php" class="btn btn-primary">Cetak Laporan</a>
                    <br><br>
                    <table class="table table-bordered">
                        <thead align="center" bgcolor="#32c8ed">
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>ID Departemen</th>
                                <th>Nama Departemen</th>
                                <th>Tanggal kirim</th>
                                <th>Jumlah Terjual</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../koneksi.php';
                            $no = 1;

                            if (isset($_POST['filter'])) {
                                // Ambil tanggal mulai dan tanggal sampai dari form
                                $mulai_tanggal = $_POST['mulai_tanggal'];
                                $sampai_tanggal = $_POST['sampai_tanggal'];

                                // Buat query dengan kondisi filter tanggal
                                $query = "SELECT tb_pembelian.kode_brg, tb_barang.nama_brg, tb_departemen.id_dep, tb_departemen.nama, tb_surat.tanggal_kirim, SUM(tb_pembelian.qty) AS jumlah_transaksi
                                FROM tb_pembelian
                                JOIN tb_barang ON tb_pembelian.kode_brg = tb_barang.kode_brg
                                JOIN tb_departemen ON tb_barang.id_dep = tb_departemen.id_dep
                                JOIN tb_surat ON tb_pembelian.id_surat = tb_surat.id_surat
                                WHERE tb_surat.tanggal_kirim BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'
                                GROUP BY tb_pembelian.kode_brg, tb_barang.nama_brg, tb_departemen.id_dep, tb_departemen.nama, tb_surat.tanggal_kirim
                                ORDER BY jumlah_transaksi DESC";
                            } else {
                                $query = "SELECT tb_pembelian.kode_brg, tb_barang.nama_brg, tb_departemen.id_dep, tb_departemen.nama, tb_surat.tanggal_kirim, SUM(tb_pembelian.qty) AS jumlah_transaksi
                                FROM tb_pembelian
                                JOIN tb_barang ON tb_pembelian.kode_brg = tb_barang.kode_brg
                                JOIN tb_departemen ON tb_barang.id_dep = tb_departemen.id_dep
                                JOIN tb_surat ON tb_pembelian.id_surat = tb_surat.id_surat
                                GROUP BY tb_pembelian.kode_brg, tb_barang.nama_brg, tb_departemen.id_dep, tb_departemen.nama, tb_surat.tanggal_kirim
                                ORDER BY jumlah_transaksi DESC";
                            }

                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Kode HTML untuk menampilkan data
                                    echo "<tr align='center'>";
                                    echo "<td>" . $no++ . "</td>";
                                    echo "<td>" . $row['kode_brg'] . "</td>";
                                    echo "<td>" . $row['nama_brg'] . "</td>";
                                    echo "<td>" . $row['id_dep'] . "</td>";
                                    echo "<td>" . $row['nama'] . "</td>";
                                    echo "<td>" . $row['tanggal_kirim'] . "</td>";
                                    echo "<td>" . $row['jumlah_transaksi'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr>";
                                echo "<td colspan='7' align='center'>Data kosong</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

    <?php include "../theme-footer.php" ?>

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
