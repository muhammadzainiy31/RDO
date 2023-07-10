<?php
    include "../koneksi.php";
    $id = $_GET['nik_driver'];
    $ambilData = mysqli_query($conn, "SELECT * FROM tb_driver WHERE nik_driver='$id'");
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

    <?php include "../theme-header.php" ?>
    <?php include "../theme-sidebar.php" ?>

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
                                <h4 class="card-title">Input</h4>
                            </div>
                             <div class="card-body">
                                <div class="basic-form">
                                    <form action=""method="POST" enctype="multipart/form-data" >

                                 <div class="form-group">
                                    <h4 <label for="nik_driver"> NIK DRIVER </label></h4>
                                    <input type="number"  class="form-control input-default " name="nik_driver" id="nik_driver" value="<?php echo $hasil['nik_driver']?>"
                                     </div>

                                 <div class="form-group">
                                      <h4 <label for="nama_driver"> NAMA </label>
                                         <input type="text" class="form-control input-default " name="nama_driver" id="nama_driver" value="<?php echo $hasil['nama_driver']?>"
                                         </div>
                                 <div class="form-group">
                                      <h4 <label for="tanggal_lahir"> TANGGAL LAHIR </label>
                                         <input type="date" class="form-control input-default " name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $hasil['tanggal_lahir']?>"
                                         </div>
                              <div class="form-group">
                                              <h4 <label for="jabatan"> JABATAN</label>
                                       <input type="text" class="form-control input-default " name="jabatan" id="jabatan" value="<?php echo $hasil['jabatan']?>"
                                       </div>
                                     <div class="form-group">
                                                 <h4 <label for="sim"> TINGKAT SIM </label>
                                                 <input type="text" class="form-control input-default " name="sim" id="sim" value="<?php echo $hasil['sim']?>"
                                     </div>

                                          <div class="form-group">
                                        <h4 <label for="alamat_driver"> ALAMAT </label>
                                        <input type="text" class="form-control input-default " name="alamat_driver"id="alamat_driver" value="<?php echo $hasil['alamat_driver']?>"
                                        </div>
                                        
                                        <input type="hidden" name="status" value="1">
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


        <?php include "../theme-footer.php" ?>
        
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
        $nik_driver = $_POST['nik_driver'];
        $nama_driver = $_POST['nama_driver']; 
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jabatan = $_POST['jabatan']; 
        $sim = $_POST['sim'];
        $alamat_driver = $_POST['alamat_driver'];
        mysqli_query($conn, "UPDATE tb_driver SET nik_driver='$nik_driver',nama_driver='$nama_driver', tanggal_lahir='$tanggal_lahir', jabatan='$jabatan', sim='$sim', alamat_driver='$alamat_driver' 
        WHERE nik_driver='$id'")or die (mysqli_error($conn));

          echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Diupdate....</h5></div>";
          echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/driver/index.php'>";
    }
    