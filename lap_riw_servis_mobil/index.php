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
                        <h4 class="card-title">LAPORAN RIWAYAT SERVIS ARMADA/MOBIL</h4>
                        <br> <br>
                    </div>
                    <br>
                    <div class="input-group search-area ml-auto d-inline-flex">
                        <input type="text" class="form-control" id="searchInput" onkeyup="searchTable()" placeholder="Masukkan NO Plat">
                        <div class="input-group-append">
                            <button type="button" class="input-group-text"><i class="flaticon-381-search-2"></i></button>
                        </div>
                    </div>


                    <!-- Bagian form filter -->
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
                    <a href="input.php" class="btn btn-primary">Tambah Data Servis</a>
                    <a href="cetak.php" class="btn btn-primary">Cetak Report</a>
                    <br> <br>
                    <table id="dataTable" class="table table-bordered">
                        <tr align="center" bgcolor="#E9967A">
                            <th>No</th>
                            <th>ID Servis</th>
                            <th>NO Plat</th>
                            <th>Type Armada</th>
                            <th>Tanggal Servis</th>
                            <th>Keterangan</th>
                            <th>Estimasi Selesai</th>
                            <th>Biaya</th>
                        </tr>

<?php
include '../koneksi.php';
$no = 1;
if (isset($_POST['filter'])) {
    // Ambil tanggal mulai dan tanggal sampai dari form
    $mulai_tanggal = $_POST['mulai_tanggal'];
    $sampai_tanggal = $_POST['sampai_tanggal'];

    // Buat query dengan kondisi filter tanggal
    $query = "SELECT rs.*, a.type_armada
    FROM riwayat_servis rs
    INNER JOIN tb_armada a ON rs.no_plat = a.no_plat
            WHERE tanggal_servis BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'";
    $result = mysqli_query($conn, $query);
} else {
    $query = "SELECT rs.*, a.type_armada
    FROM riwayat_servis rs
    INNER JOIN tb_armada a ON rs.no_plat = a.no_plat
    ORDER BY rs.id_servis DESC";
    $result = mysqli_query($conn, $query);
}

if (mysqli_num_rows($result) > 0) {
    while ($hasil = mysqli_fetch_assoc($result)) {
        // Kode HTML untuk menampilkan data
        ?>


                                <tr align="center">
                                    <td><?php echo $no++ ?> </td>
                                    <td><?php echo $hasil['id_servis'] ?></td>
                                    <td><?php echo $hasil['no_plat'] ?></td>
                                    <td><?php echo $hasil['type_armada'] ?></td>
                                    <td><?php echo $hasil['tanggal_servis'] ?></td>
                                    <td><?php echo $hasil['keterangan'] ?> </td>
                                    <td><?php echo $hasil['estimasi'] ?></td>
                                    <td><?php echo $hasil['biaya'] ?></td>
                                </tr>
                        <?php }
                        } else { ?>
                            <tr>
                                <td colspan="8" align="center">Data kosong</td>
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
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <?php include "../theme-footer.php" ?>

    </div>

    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
    <script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/deznav-init.js"></script>


    <script src="../vendor/highlightjs/highlight.pack.min.js"></script>
    <!-- Circle progress -->

    <!-- Circle progress -->


    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("dataTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2]; // Adjust the column index for the desired search
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
