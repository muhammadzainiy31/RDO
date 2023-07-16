<?php
include "../koneksi.php";
$id = $_GET['id_pengiriman'];
$ambilData = mysqli_query($conn, "SELECT * FROM tb_pengirim WHERE id_pengiriman='$id'");
$hasil = mysqli_fetch_array($ambilData);

if (isset($_POST['submit'])) {
    $id_pengiriman = $_POST['id_pengiriman'];
    $km_tiba = $_POST['km_tiba'];
    $jam_tiba = $_POST['jam_tiba'];
    $status = $_POST['status'];
    $keterangan = $_POST['keterangan'];
    $foto = $_FILES['foto']['name'];

    
    move_uploaded_file($_FILES['foto']['tmp_name'], '../images/barang/'.$foto);

    $input = "INSERT INTO tb_cekout (id_pengiriman, km_tiba, jam_tiba, status, keterangan, foto) VALUES ('$id_pengiriman', '$km_tiba','$jam_tiba', '$status', '$keterangan', '$foto')";

    if (mysqli_query($conn, $input)) {
        echo "<div align='center'><h5>Data berhasil ditambahkan.</h5></div>";
        echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/user/index.php'>";
        exit();
    } else {
        echo "<div align='center'><h5>Gagal menambahkan data.</h5></div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APLIKASI REPORT DELIVERY ORDER</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/2.png">
    <!-- Custom Stylesheet -->
    <link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <?php include "theme-header.php" ?>
        <?php include "theme-sidebar.php" ?>

        <!--**********************************
         Content body start
     ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Input</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Data</a></li>
                    </ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">CEKOUT SURAT JALAN</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <h4><label for="id_pengiriman">ID PENGIRIMAN</label></h4>
                                            <input type="number" class="form-control input-default" name="id_pengiriman" id="id_pengiriman" value="<?php echo $hasil['id_pengiriman']; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="km_tiba">KM TIBA</label></h4>
                                            <input type="number" class="form-control input-default" name="km_tiba" placeholder="Masukkan KM Tiba">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="jam_tiba">JAM TIBA</label></h4>
                                            <input type="time" class="form-control input-default" name="jam_tiba" id="jam_tiba" placeholder="Masukkan Jam Tiba">
                                        </div>

                                        <script>
                                            // Mendapatkan elemen input jam_tiba
                                            var inputJamBerangkat = document.getElementById("jam_tiba");

                                            // Mendapatkan waktu sekarang
                                            var sekarang = new Date();

                                            // Format jam dan menit menjadi dua digit dengan leading zero jika perlu
                                            var jam = sekarang.getHours().toString().padStart(2, "0");
                                            var menit = sekarang.getMinutes().toString().padStart(2, "0");

                                            // Mengisi nilai default input jam_tiba dengan waktu sekarang
                                            inputJamBerangkat.value = jam + ":" + menit;
                                        </script>

                                        <div class="form-group">
                                            <h4><label for="status">STATUS</label></h4>
                                            <div>
                                                <label><input type="radio" name="status" value="TERKIRIM"> TERKIRIM</label>
                                            </div>
                                            <div>
                                                <label><input type="radio" name="status" value="PENDING"> PENDING</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="keterangan">KETERANGAN</label></h4>
                                            <input type="text" class="form-control input-default" name="keterangan" placeholder="Masukkan Keterangan">
                                        </div>
                                        
                                        <div class="form-group">
                                            <h4><label for="foto">Foto</label></h4>
                                            <input type="file" class="form-control-file" name="foto" id="foto" accept="image/*">
                                        </div>


                                        <div class="mt-4"></div>
                                        <button class="btn btn-primary mr-2" type="submit" name="submit">Submit</button>
                                        <a href="index.php" class="btn btn-danger">Batal</a>
                                    </form>
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


        <?php include "theme-footer.php" ?>

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
    <script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/deznav-init.js"></script>

</body>

</html>