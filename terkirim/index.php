
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
        <?php include "../theme-sidebar.php" ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">LAPORAN BARANG SELESAI KIRIM </h4>
                        <br> <br>
                    </div>
                    <br>


                
                    <br>
                    <a href="cetak_rdo.php" class="btn btn-primary">Cetak Laporan</a>
                    <?php if (isset($_POST['filter'])) : ?>
                        <a href="cetakdata_pertanggal.php?mulai_tanggal=<?php echo $mulai_tanggal; ?>&sampai_tanggal=<?php echo $sampai_tanggal; ?>" class="btn btn-primary">Cetak Data</a>
                    <?php endif; ?>
                    <br> <br>
                    <div class="scroll-horizontal">
                        <table class="table">
                            <tr align="center" bgcolor="#32c8ed">
                                <th>No</th>
            <th>Id Pembelian</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>QTY</th>
                            </tr>



                            <?php
                            include '../koneksi.php';
                            $no = 1;

                            if (isset($_POST['filter'])) {
                                // Ambil tanggal mulai dan tanggal sampai dari form
                                $mulai_tanggal = $_POST['mulai_tanggal'];
                                $sampai_tanggal = $_POST['sampai_tanggal'];

                                // Buat query dengan kondisi filter tanggal
                                $query = "SELECT tb_pembelian.id_pembelian, tb_pembelian.kode_brg, tb_pembelian.qty, tb_barang.nama_brg
                                FROM tb_pembelian
                                INNER JOIN tb_barang ON tb_pembelian.kode_brg = tb_barang.kode_brg
                                WHERE tanggal_kirim BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'
            ORDER BY tb_surat.tanggal_kirim";
                                $result = mysqli_query($conn, $query);
                            } else {
                                $query = "SELECT tb_pembelian.id_pembelian, tb_pembelian.kode_brg, tb_pembelian.qty, tb_barang.nama_brg
                                FROM tb_pembelian
                                INNER JOIN tb_barang ON tb_pembelian.kode_brg = tb_barang.kode_brg";
                                $result = mysqli_query($conn, $query);
                            }

                            if (mysqli_num_rows($result) > 0) {
                                while ($hasil = mysqli_fetch_assoc($result)) {
                                    // Kode HTML untuk menampilkan data
                            ?>

                        
                                    <tr align="center">
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $hasil['id_pembelian'] ?></td>
                                        <td><?php echo $hasil['kode_brg'] ?></td>
                                        <td><?php echo $hasil['nama_brg'] ?></td>

                                        <td><?php echo $hasil['qty'] ?></td>
                                    </tr>
                            <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="7" align="center">Data kosong</td>
                                </tr>
                            <?php } ?>
                        </table>

                        <?php if (isset($_POST['filter']) && mysqli_num_rows($result) > 0) : ?>
                         <a href="cetakdata_pertanggal.php?mulai_tanggal=<?php echo $mulai_tanggal; ?>&sampai_tanggal=<?php echo $sampai_tanggal; ?>" class="btn btn-primary mt-3">Cetak Pertanggal</a>
                        <?php endif; ?>
                    </div>
                    <br>
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
                td = tr[i].getElementsByTagName("td")[6]; // Ganti angka 2 dengan indeks kolom nama

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
</body>

</html>
