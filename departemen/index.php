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
                        <h4 class="card-title">DATA DEPARTEMEN</h4>
                        <br> <br>
                    </div>
                    <br>


                  
                    <br>
                    <br>
                    <a href="../departemen/input.php" class="btn btn-primary">Tambah Data</a>
                    <a href="cetak.php" class="btn btn-primary">Cetak laporan</a>
                    <br> <br>
                    <table class="table table-bordered" id="dataTable">
                        <tr align="center" bgcolor="#32c8ed">
                            <th>No</th>
                            <th>Kode Departemen</th>
                            <th>Nama </th>
                        </tr>
                        <?php
                        include '../koneksi.php';
                        $no = 1;
                        $tampil = mysqli_query($conn, "SELECT * FROM tb_departemen ORDER BY id_dep DESC");
                        if (mysqli_num_rows($tampil) > 0) {
                            while ($hasil = mysqli_fetch_array($tampil)) {

                        ?>
                                <tr align="center">
                                    <td><?php echo $no++ ?> </td>
                                    <td><?php echo $hasil['id_dep'] ?></td>
                                    <td><?php echo $hasil['nama'] ?></td>
                                        <div class="d-flex">
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="7" align="center">Data kosong</td>
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