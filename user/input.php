

<?php
    include "../koneksi.php";
    $id = $_GET['id_surat'];
    $ambilData = mysqli_query($conn, "SELECT * FROM tb_rdo WHERE id_surat='$id'");
    $hasil =mysqli_fetch_array($ambilData)
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APLIKASI REPORT DELIVERY ORDER | INPUT DATA</title>
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
                                <h4 class="card-title">Input Data Surat</h4>
                            </div>
                             <div class="card-body">
                                <div class="basic-form">
                                    <form action=""method="POST" enctype="multipart/form-data" >
                                    <div class="form-group">
                                        <h4 <label for="id_surat"> Id Surat</label></h4>
                                        <input type="text"  class="form-control input-default " name="id_surat" id="id_surat" value="<?php echo $hasil['id_surat']?>"
                                    </div>

                                    <div class="form-group">
                                        <h4 <label for="dari"> DARI </label></h4>
                                        <input type="text"  class="form-control input-default " name="dari" id="dari" class="form-control col-md-9" placeholder="Masukkan Dari">
                                    </div>

                                     <div class="form-group">
                                         <h4 <label for="tujuan"> TUJUAN </label></h4>
                                         <input type="text"  class="form-control input-default " name="tujuan" id="tujuan" class="form-control col-md-9" placeholder="Masukkan Tujuan">
                                     </div>
                                     
                                     <div class="form-group">
                                         <h4 <label for="jam_berangkat"> JAM BERANGKAT </label></h4>
                                         <input type="time"  class="form-control input-default " name="jam_berangkat" id="jam_berangkat" class="form-control col-md-9" placeholder="Masukkan Jam Berangkat">
                                     </div>
                                     
                                     <div class="form-group">
                                         <h4 <label for="km_berangkat"> KM BERANGKAT </label></h4>
                                         <input type="number"  class="form-control input-default " name="km_berangkat" id="km_berangkat" class="form-control col-md-9"placeholder="Masukkan KM Berangkat">
                                     </div>
                                     
                                     <div class="form-group">
                                         <h4 <label for="jm_tiba"> JAM TIBA</label></h4>
                                         <input type="time"  class="form-control input-default " name="jm_tiba" id="jm_tiba" class="form-control col-md-9"placeholder="Masukkan Jam Tiba">
                                     </div>
                                     
                                     <div class="form-group">
                                         <h4 <label for="km_tiba">KM TIBA</label></h4>
                                         <input type="number"  class="form-control input-default " name="km_tiba" id="km_tiba" class="form-control col-md-9" placeholder="Masukkan KM Tiba">
                                     </div>
                                     
                                     <div class="form-group">
                                         <h4 <label for="status">STATUS</label></h4>
                                         <input type="text"  class="form-control input-default " name="status" id="status" class="form-control col-md-9" placeholder="Masukkan Status">
                                     </div>
                                     
                                     <div class="form-group">
                                         <h4 <label for="keterangan"> KETERANGAN </label></h4>
                                         <input type="text"  class="form-control input-default " name="keterangan" id="keterangan" class="form-control col-md-9" placeholder="Masukkan Keterangan">
                                     </div>
                                     
                                    <div class="form-group">
                                        <h4 <label for="nm_cust"> NAMA CUSTOMER </label></h4>
                                        <input type="text"  class="form-control input-default " name="nm_cust" id="nm_cust" value="<?php echo $hasil['nm_cust']?>"
                                    </div>

                                    <div class="form-group">
                                        <h4 <label for="nm_brng">  NAMA BARANG </label>
                                        <input type="text" class="form-control input-default " name="nm_brng"  id="nm_brng" value="<?php echo $hasil['nm_brng']?>"
                                     </div>

                                    <div class="form-group">
                                        <h4 <label for="jmlh"> JUMLAH </label>
                                        <input type="text" class="form-control input-default " name="jmlh"  id="jmlh" value="<?php echo $hasil['jmlh']?>"
                                     </div>

                                    <div class="form-group">
                                        <h4 <label for="armada">ARMADA</label>
                                        <input type="text" class="form-control input-default " name="armada"  id="armada" value="<?php echo $hasil['armada']?>"
                                     </div>

                                    <div class="form-group">
                                        <h4 <label for="driver"> DRIVER</label>
                                        <input type="text" class="form-control input-default " name="driver"  id="driver" value="<?php echo $hasil['driver']?>"
                                     </div>
                                        <div class="mt-4"></div>
                                        <button class="btn btn-primary mr-2" name="simpan" >Simpan</button>
                                        <a href="index.php" class="btn btn-danger" >Batal</a>
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

<?php
    include "../koneksi.php";
    if(isset($_POST['simpan']))
    {

        $id_surat = $_POST['id_surat'];
        $dari = $_POST['dari'];
        $tujuan  = $_POST['tujuan'];
        $jam_berangkat= $_POST['jam_berangkat'];
        $km_berangkat = $_POST['km_berangkat'];
        $jm_tiba = $_POST['jm_tiba'];
        $km_tiba  = $_POST['km_tiba'];
        $status = $_POST['status'];
        $keterangan = $_POST['keterangan'];
        $nm_cust = $_POST['nm_cust'];
        $nm_brng = $_POST['nm_brng'];
        $jmlh = $_POST['jmlh'];
        $armada = $_POST['armada'];
        $driver = $_POST['driver'];
        mysqli_query($conn, "UPDATE tb_rdo SET id_surat='$id_surat',  dari='$dari',  tujuan='$tujuan',  jam_berangkat='$jam_berangkat',  km_berangkat='$km_berangkat', jm_tiba='$jm_tiba',  km_tiba='$km_tiba', status='$status', keterangan='$keterangan',
        nm_cust='$nm_cust',nm_brng='$nm_brng',  jmlh='$jmlh',armada='$armada',
       driver='$driver'
        WHERE id_surat='$id'")or die (mysqli_error($conn));
            echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Disimpan....</h5></div>";
            echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/user/index.php'>";
      }
