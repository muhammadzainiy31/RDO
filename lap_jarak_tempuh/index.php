
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <?php include "../theme-header.php"; ?>
        <?php include "../theme-sidebar.php"; ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">DATA JARAK TEMPUH</h4>
                        <br> <br>
                    </div>
                    <br>
                    <div class="input-group search-area ml-auto d-inline-flex">
                        <input type="text" class="form-control" placeholder="Search here">
                        <div class="input-group-append">
                            <button type="button" class="input-group-text"><i class="flaticon-381-search-2"></i></button>
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
                    <br> <br>
                    <table class="table table-bordered">
                        <tr align="center" bgcolor="#32c8ed">
                            <th>No</th>
                            <th>Armada</th>
                            <th>Type</th>
                            <th>Tanggal Kirim</th>
                            <th>KM Terpakai</th>
                            <th>KM Sekarang</th>
                        </tr>

                        <?php
                        include '../koneksi.php';
                        $no = 1;

                        if (isset($_POST['filter'])) {
                            // Ambil tanggal mulai dan tanggal sampai dari form
                            $mulai_tanggal = $_POST['mulai_tanggal'];
                            $sampai_tanggal = $_POST['sampai_tanggal'];

                            // Buat query dengan kondisi filter tanggal
                            $query = "SELECT
                                        tb_armada.no_plat,
                                        tb_armada.type_armada,
                                        tb_pengirim.id_pengiriman,
                                        tb_surat.tanggal_kirim,
                                        (tb_cekout.km_tiba - tb_cekin.km_berangkat) AS selisih_km,
                                        tb_cekout.km_tiba AS km_sekarang
                                    FROM
                                        tb_armada
                                        JOIN tb_pengirim ON tb_armada.no_plat = tb_pengirim.no_plat
                                        JOIN tb_surat ON tb_pengirim.id_surat = tb_surat.id_surat
                                        JOIN tb_cekout ON tb_pengirim.id_pengiriman = tb_cekout.id_pengiriman
                                        JOIN tb_cekin ON tb_cekout.id_pengiriman = tb_cekin.id_pengiriman
                                    WHERE
                                        (tb_armada.no_plat, tb_cekout.km_tiba) IN (
                                            SELECT
                                                tb_armada.no_plat,
                                                MAX(tb_cekout.km_tiba) AS km_tiba
                                            FROM
                                                tb_armada
                                                JOIN tb_pengirim ON tb_armada.no_plat = tb_pengirim.no_plat
                                                JOIN tb_cekout ON tb_pengirim.id_pengiriman = tb_cekout.id_pengiriman
                                            WHERE tb_surat.tanggal_kirim BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'
                                            GROUP BY tb_armada.no_plat
                                        )
                                    ORDER BY tb_surat.tanggal_kirim";
                            $result = mysqli_query($conn, $query);
                        } else {
                            $query = "SELECT
                                        tb_armada.no_plat,
                                        tb_armada.type_armada,
                                        tb_pengirim.id_pengiriman,
                                        tb_surat.tanggal_kirim,
                                        (tb_cekout.km_tiba - tb_cekin.km_berangkat) AS selisih_km,
                                        tb_cekout.km_tiba AS km_sekarang
                                    FROM
                                        tb_armada
                                        JOIN tb_pengirim ON tb_armada.no_plat = tb_pengirim.no_plat
                                        JOIN tb_surat ON tb_pengirim.id_surat = tb_surat.id_surat
                                        JOIN tb_cekout ON tb_pengirim.id_pengiriman = tb_cekout.id_pengiriman
                                        JOIN tb_cekin ON tb_cekout.id_pengiriman = tb_cekin.id_pengiriman
                                    WHERE
                                        (tb_armada.no_plat, tb_cekout.km_tiba) IN (
                                            SELECT
                                                tb_armada.no_plat,
                                                MAX(tb_cekout.km_tiba) AS km_tiba
                                            FROM
                                                tb_armada
                                                JOIN tb_pengirim ON tb_armada.no_plat = tb_pengirim.no_plat
                                                JOIN tb_cekout ON tb_pengirim.id_pengiriman = tb_cekout.id_pengiriman
                                            GROUP BY tb_armada.no_plat
                                        );";
                            $result = mysqli_query($conn, $query);
                        }

                        if (mysqli_num_rows($result) > 0) {
                            while ($hasil = mysqli_fetch_assoc($result)) {
                                // Kode HTML untuk menampilkan data
                        ?>
                                <tr align="center">
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $hasil['no_plat'] ?></td>
                                    <td><?php echo $hasil['type_armada'] ?></td>
                                    <td><?php echo $hasil['tanggal_kirim'] ?></td>
                                    <td><?php echo $hasil['selisih_km'] ?></td>
                                    <td><?php echo $hasil['km_sekarang'] ?></td>
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
                    </table>

                    <?php if (isset($_POST['filter']) && mysqli_num_rows($result) > 0) : ?>
                         <a href="cetakdata_pertanggal.php?mulai_tanggal=<?php echo $mulai_tanggal; ?>&sampai_tanggal=<?php echo $sampai_tanggal; ?>" class="btn btn-primary mt-3">Cetak Pertanggal</a>
                        <?php endif; ?>


                    <br>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

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
