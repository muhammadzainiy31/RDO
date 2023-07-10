<?php
    include "../koneksi.php";
    $id = $_GET['surat_id'];
    $ambilData = mysqli_query($conn, "SELECT * FROM tb_surat WHERE surat_id='$id'");
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
                                <h4 class="card-title">Input RDO</h4>
                            </div>
                             <div class="card-body">
                                <div class="basic-form">
                                    <form action=""method="POST" enctype="multipart/form-data" >

                                 <div class="form-group">
                                    <h4 <label for="surat_id"> Surat Id </label></h4>
                                    <input type="number"  class="form-control input-default " name="surat_id" id="surat_id" value="<?php echo $hasil['surat_id']?>"
                                     </div>

                                 <div class="form-group">
                                      <h4 <label for="nm_custr"> NAMA CUSTOMER </label>
                                         <input type="text" class="form-control input-default " name="nm_custr" id="nm_custr" value="<?php echo $hasil['nm_custr']?>"
                                         </div>
                                 <div class="form-group">
                                      <h4 <label for="telp"> Telpon</label>
                                         <input type="number" class="form-control input-default " name="telp" id="telp" value="<?php echo $hasil['telp']?>"
                                         </div>
                              <div class="form-group">
                                              <h4 <label for="almt"> ALAMAT</label>
                                       <input type="text" class="form-control input-default " name="almt" id="almt" value="<?php echo $hasil['almt']?>"
                                       </div>
                                     <div class="form-group">
                                                 <h4 <label for="kode"> KODE BARANG </label>
                                                 <input type="number" class="form-control input-default " name="kode" id="kode" value="<?php echo $hasil['kode']?>"
                                     </div>
                                        <div class="form-group">
                                        <h4 <label for="nm_brg"> NAMA BARANG </label>
                                        <input type="text" class="form-control input-default " name="nm_brg"id="nm_brg" value="<?php echo $hasil['nm_brg']?>"
                                        </div>
                                        <div class="form-group">
                                        <h4 <label for="jmlh_brg"> JUMLAH </label>
                                        <input type="text" class="form-control input-default " name="jmlh_brg"id="jmlh_brg" value="<?php echo $hasil['nm_brg']?>"
                                        </div>
                                        <div class="form-group">
                                        <h4 <label for="plat"> PLAT </label>
                                        <input type="text" class="form-control input-default " name="plat"id="plat" value="<?php echo $hasil['nm_brg']?>"
                                        </div>
                                        <div class="form-group">
                                        <h4 <label for="armada"> ARMADA </label>
                                        <input type="text" class="form-control input-default " name="armada"id="armada" value="<?php echo $hasil['nm_brg']?>"
                                        </div>
                                        <div class="form-group">
                                        <h4 <label for="nik"> NIK DRIVER</label>
                                        <input type="text" class="form-control input-default " name="nik"id="nik" value="<?php echo $hasil['nm_brg']?>"
                                        </div>
                                        <div class="form-group">
                                        <h4 <label for="driver"> NAMA DRIVER </label>
                                        <input type="text" class="form-control input-default " name="driver"id="driver" value="<?php echo $hasil['nm_brg']?>"
                                        </div>
                                        
                                        <input type="hidden" name="status" value="1">
                                        <div class="mt-4"></div>
                                        <button class="btn btn-primary mr-2" name="kodepan" >kodepan</button>
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
    if(isset($_POST['kodepan']))
    {
        $surat_id = $_POST['surat_id'];
        $nm_custr = $_POST['nm_custr']; 
        $telp = $_POST['telp'];
        $almt = $_POST['almt']; 
        $kode = $_POST['kode'];
        $nm_brg = $_POST['nm_brg'];
        $jmlh = $_POST['jmlh'];
        $plat = $_POST['plat'];
        $nik = $_POST['nik'];
        $driver = $_POST['driver'];
        $input = "INSERT INTO tb_rdo VALUES ('','$surat_id','$nm_cust','$telp','$almt','$kode','$nm_brg','$jmlh','$plat','$nik','$driver'
        )";
          echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Diupdate....</h5></div>";
          echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/rdo/index.php'>";
    }
    