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
                    <h4 class="card-title">DATA LAPORAN PENGIRIMAN </h4>
                      <br> <br>
              </div>
              <br>
					<div class="input-group search-area ml-auto d-inline-flex">
						<input type="text" class="form-control" placeholder="Search here">
						<div class="input-group-append">
							<button type="button" class="input-group-text"><i class="flaticon-381-search-2"></i></button>
						</div>
					</div>
                    <br>
                    <br>
                <a href="../lap_pengiriman/input.php" class="btn btn-primary">Tambah Data</a> 
                <a href="cetak.php" class="btn btn-primary">Cetak Report</a>
                <br> <br>
                <table class="table table-bordered">
            <tr align="center"  bgcolor="#E9967A">
    <th>No</th>
    <th>Kode Pengiriman</th>
    <th>Rute</th>
    <th>Nama Barang</th>
    <th>Jumlah</th>
    <th>Pelanggan</th>
    <th>Tanggal Pengiriman</th>
                <th>Aksi</th>
            </tr>
            <?php
            include'../koneksi.php';
            $no =1;
            $tampil = mysqli_query ($conn, "SELECT * FROM pengiriman");
            if (mysqli_num_rows ($tampil)>0) {
              while($hasil = mysqli_fetch_array($tampil)){

            ?>
                <tr align="center" >
                  <td><?php echo $no++ ?> </td>
                  <td><?php echo $hasil ['kode_pengiriman']?></td>
                  <td><?php echo $hasil ['rute']?></td>
                  <td><?php echo $hasil ['nama_barang']?></td>
                  <td><?php echo $hasil ['jumlah']?> </td>
                  <td><?php echo $hasil ['pelanggan']?></td>
                  <td><?php echo $hasil ['tanggal_pengiriman']?></td>
                  <td>
                    
													<div class="d-flex">
                                                    <a href="edit.php?kode_pengiriman=<?php echo $hasil['kode_pengiriman'];?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="hapus.php?kode_pengiriman=<?php echo $hasil['kode_pengiriman'];?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
                  </td>
                </tr>
                <?php }} else{ ?>
                <tr>
                    <td colspan="7" align="center" >Data kosong</td>
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



</body>

</html>