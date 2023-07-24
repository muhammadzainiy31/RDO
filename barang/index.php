<?php
include '../koneksi.php';

// Jumlah data yang ditampilkan per halaman
$jumlahDataPerHalaman = 5;

// Cek halaman saat ini dari parameter GET
$halamanSaatIni = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

// Hitung data yang ada di database
$jumlahData = mysqli_num_rows(mysqli_query($conn, "SELECT tb_barang.*, tb_departemen.*
FROM tb_barang
JOIN tb_departemen ON tb_barang.id_dep = tb_departemen.id_dep
"));

// Hitung jumlah halaman
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

// Batasi halaman saat ini jika melebihi jumlah halaman yang ada
if ($halamanSaatIni > $jumlahHalaman) {
    $halamanSaatIni = $jumlahHalaman;
}

// Batas awal dan akhir data yang ditampilkan pada halaman saat ini
$batasAwal = ($halamanSaatIni - 1) * $jumlahDataPerHalaman;

$no = $batasAwal + 1;

$tampil = mysqli_query($conn, "SELECT tb_barang.*, tb_departemen.*
FROM tb_barang
JOIN tb_departemen ON tb_barang.id_dep = tb_departemen.id_dep ORDER BY kode_brg DESC LIMIT $batasAwal, $jumlahDataPerHalaman");

?>

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
                        <h4 class="card-title">DATA BARANG</h4>
                        <br> <br>
                    </div>
                    <br>
                    <div class="search-form">
                        <input type="text" class="form-control search-input" placeholder="Masukkan Nama Barang" id="searchInput">
                        <div class="input-group-append">
                            <button type="button" class="input-group-text" onclick="searchTable()"><i class="flaticon-381-search-2"></i></button>
                        </div>
                    </div>
                    <br>
                    <br>
                    <a href="../barang/input.php" class="btn btn-primary">Tambah Data</a>
                    <a href="cetak.php" class="btn btn-primary">Cetak Report</a>
                    <br> <br>
                    <table class="table table-bordered" id="dataTable">
                        <tr align="center" bgcolor="#32c8ed">
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>ID Departemen</th>
                            <th>Nama Departemen</th>
                            <th>Minim Stok/ Restok</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        if (mysqli_num_rows($tampil) > 0) {
                            while ($hasil = mysqli_fetch_array($tampil)) {
                        ?>
                                <tr align="center">
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $hasil['kode_brg'] ?></td>
                                    <td><?php echo $hasil['nama_brg'] ?></td>
                                    <td><?php echo $hasil['id_dep'] ?></td>
                                    <td><?php echo $hasil['nama'] ?></td>
                                    <td><?php echo $hasil['restok'] ?></td>
                                    <td><?php echo $hasil['jumlah_brg'] ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <div>
                                                <a href="tambah.php?kode_brg=<?php echo $hasil['kode_brg']; ?>" class="btn btn-primary">Tambah Stok</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                        <?php }
                        } else { ?>
                            <tr>
                                <td colspan="7" align="center">Data kosong</td>
                            </tr>
                        <?php } ?>
                    </table>

                    <!-- Tampilkan navigasi pagination -->
                    <nav>
                        <ul class="pagination pagination-gutter pagination-primary no-bg">
                            <li class="page-item page-indicator" onclick="gotoPage('prev')">
                                <a class="page-link" href="javascript:void()">
                                    <i class="la la-angle-left"></i>
                                </a>
                            </li>
                            <?php for ($halaman = 1; $halaman <= $jumlahHalaman; $halaman++) : ?>
                                <li class="page-item <?php echo ($halaman == $halamanSaatIni) ? 'active' : ''; ?>" onclick="gotoPage(<?php echo $halaman; ?>)">
                                    <a class="page-link" href="?halaman=<?php echo $halaman; ?>"><?php echo $halaman; ?></a>
                                </li>
                            <?php endfor; ?>
                            <li class="page-item page-indicator" onclick="gotoPage('next')">
                                <a class="page-link" href="javascript:void()">
                                    <i class="la la-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
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

        function gotoPage(page) {
            // Jika page adalah 'prev', pergi ke halaman sebelumnya
            if (page === 'prev') {
                // Implementasikan logika untuk pergi ke halaman sebelumnya
                // Misalnya, jika Anda ingin mengarahkan ke halaman sebelumnya,
                // Anda bisa menggunakan window.location.href untuk mengarahkan ke URL yang sesuai.
                // window.location.href = 'url_halaman_sebelumnya';
            }
            // Jika page adalah 'next', pergi ke halaman berikutnya
            else if (page === 'next') {
                // Implementasikan logika untuk pergi ke halaman berikutnya
                // Misalnya, jika Anda ingin mengarahkan ke halaman berikutnya,
                // Anda bisa menggunakan window.location.href untuk mengarahkan ke URL yang sesuai.
                // window.location.href = 'url_halaman_berikutnya';
            }
            // Jika page adalah angka, pergi ke halaman dengan nomor tersebut
            else if (!isNaN(page)) {
                // Implementasikan logika untuk pergi ke halaman dengan nomor tersebut
                // Misalnya, jika Anda ingin mengarahkan ke halaman sesuai nomor,
                // Anda bisa menggunakan window.location.href untuk mengarahkan ke URL yang sesuai.
                // window.location.href = 'url_halaman_dengan_nomor_tertentu';
            }
        }
    </script>

</body>

</html>
