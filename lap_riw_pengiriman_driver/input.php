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
                                <h4 class="card-title">Input Data Driver</h4>
                            </div>
                             <div class="card-body">
                                <div class="basic-form">
                                    <form action=""method="POST" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <h4 <label for="id_surat">id surat </label></h4>
                                    <input type="number"  class="form-control input-default " name="id_surat" class="form-control col-md-9" placeholder="Masukkan NIK Driver" autofocus required>
                                     </div>

                                 <div class="form-group">
                                      <h4 <label for="nama_cust"> NAMA customer </label>
                                         <input type="text" class="form-control input-default " name="nama_cust" class="form-control col-md-9" placeholder="Masukkan Nama">
                                     </div>

                                 <div class="form-group">
                                      <h4 <label for="hp"> hp </label>
                                         <input type="number" class="form-control input-default " name="hp" class="form-control col-md-9" placeholder="Masukkan Password">
                                     </div>

                              <div class="form-group">
                                              <h4 <label for="alamt"> alamt</label>
                                       <input type="text" class="form-control input-default " name="alamt" class="form-control col-md-9" placeholder="Masukkan alamt">
                                   </div>

                                     <div class="form-group">
                                                 <h4 <label for="kode">kode </label>
                                                 <input type="number" class="form-control input-default " name="kode" class="form-control col-md-9" placeholder="Masukkan Tingkat kode">
                                     </div>

                                          <div class="form-group">
                                        <h4 <label for="nm_brng"> nama barang </label>
                                        <input type="text" class="form-control input-default " name="nm_brng" class="form-control col-md-9" placeholder="Masukkan Alamat">
                                      </div>

                                          <div class="form-group">
                                        <h4 <label for="jmlh">jumlah </label>
                                        <input type="number" class="form-control input-default " name="jmlh" class="form-control col-md-9" placeholder="Masukkan Alamat">
                                      </div>

                                          <div class="form-group">
                                        <h4 <label for="plat"> plat </label>
                                        <input type="text" class="form-control input-default " name="plat" class="form-control col-md-9" placeholder="Masukkan Alamat">
                                      </div>

                                          <div class="form-group">
                                        <h4 <label for="armada"> armada</label>
                                        <input type="text" class="form-control input-default " name="armada" class="form-control col-md-9" placeholder="Masukkan Alamat">
                                      </div>

                                          <div class="form-group">
                                        <h4 <label for="nik"> nik</label>
                                        <input type="number" class="form-control input-default " name="nik" class="form-control col-md-9" placeholder="Masukkan Alamat">
                                      </div>

                                          <div class="form-group">
                                        <h4 <label for="driver"> driver</label>
                                        <input type="text" class="form-control input-default " name="driver" class="form-control col-md-9" placeholder="Masukkan Alamat">
                                      </div>

                                        </div>
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
        $id_surat = $_POST['id_surat'];
        $nama_cust = $_POST['nama_cust'];
        $hp = $_POST['hp'];
        $alamt = $_POST['alamt']; 
        $kode = $_POST['kode'];
        $alamat_driver = $_POST['alamat_driver'];
        $input = "INSERT INTO tb_driver VALUES ('$id_surat', '$nama_cust', '$hp',  '$alamt', '$kode', '$alamat_driver'
        )";
        mysqli_query($conn, $input ); 
            echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Dikodepan....</h5></div>";
            echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/driver/index.php'>";
      }
