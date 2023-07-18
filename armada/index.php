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
        .search-form {
            display: flex;
            margin-bottom: 20px;
        }

        .search-input {
            flex: 1;
            margin-right: 10px;
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
                        <h4 class="card-title">DATA ARMADA</h4>
                        <br> <br>
                    </div>
                    <br>
                    <br>
                    <div class="input-group search-area ml-auto d-inline-flex">
                        <input type="text" class="form-control" placeholder="Search here">
                        <div class="input-group-append">
                            <button type="button" class="input-group-text"><i class="flaticon-381-search-2"></i></button>
                        </div>
                    </div>

                    <br>
                    <br>
                    <a href="input.php" class="btn btn-primary">Tambah Data</a>
                    <a href="cetak.php" class="btn btn-primary">Cetak Report</a>
                    <br> <br>
                    <?php
                    $no = 1;
                    include '../koneksi.php';

                    // Menggunakan LEFT JOIN agar data armada tetap ditampilkan walaupun tidak ada data di riwayat_servis
                    $tampil = mysqli_query($conn, "SELECT tb_armada.*, rs.estimasi
FROM tb_armada
LEFT JOIN (
    SELECT no_plat, MAX(estimasi) AS estimasi
    FROM riwayat_servis
    GROUP BY no_plat
) rs ON tb_armada.no_plat = rs.no_plat
") or die(mysqli_error($conn));
                    ?>
                    <table class="table table-bordered">
                        <tr align="center" bgcolor="#32c8ed">
                            <th>No</th>
                            <th>Nomor Polisi/Plat</th>
                            <th>Type Armada</th>
                            <th>Tahun</th>
                            <th>Terakhir Servis</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        // Menampilkan hasil
                        if (mysqli_num_rows($tampil) > 0) {
                            while ($hasil = mysqli_fetch_assoc($tampil)) {
                        ?>
                                <tr align="center">
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $hasil['no_plat'] ?></td>
                                    <td><?php echo $hasil['type_armada'] ?></td>
                                    <td><?php echo $hasil['tahun'] ?></td>
                                    <td><?php echo $hasil['estimasi'] ?></td>
                                    <td>
                                        <!-- Tambahkan aksi sesuai kebutuhan -->
                                        <div class="d-flex">
                                            <a href="edit.php?no_plat=<?php echo $hasil['no_plat']; ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="hapus.php?no_plat=<?php echo $hasil['no_plat']; ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6">Tidak ada data</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>

                    <br>
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