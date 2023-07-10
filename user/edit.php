<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APPLIKASI REPORT ORDER DELIVERY | INPUT DATa SURAT</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/2.png">
    <!-- Custom Stylesheet -->
    	<link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body>
            <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" size  class="brand-logo">
                <img class="logo-abbr" src="../images/2.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
		<!--**********************************

            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
														APPLIKASI REPORT DELIVERY ORDER SDC BANJARMASIN
                            </div>
                        </div>
                                <a class="nav-link" href="javascript:;" role="button" data-toggle="dropdown">
                                    <img src="../images/profile/12.png" width="100" alt=""/>
									<div class="header-info">
										<span>Hello,<strong> User</strong></span>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="../app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="../email-inbox.html" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="logout.php" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        
                                     
                                    <div class="form-group">
                                        <h4 <label for="dari"> DARI </label></h4>
                                        <input type="text"  class="form-control input-default " name="dari" id="dari" class="form-control col-md-9" 
                                    </div>
                                     
                                     <div class="form-group">
                                         <h4 <label for="tujuan"> TUJUAN </label></h4>
                                         <input type="text"  class="form-control input-default " name="tujuan" id="tujuan" class="form-control col-md-9" 
                                     </div>
                                     
                                     <div class="form-group">
                                         <h4 <label for="jam_berangkat"> JAM BERANGKAT </label></h4>
                                         <input type="time"  class="form-control input-default " name="jam_berangkat" id="jam_berangkat" class="form-control col-md-9" 
                                     </div>
                                     
                                     <div class="form-group">
                                         <h4 <label for="km_berangkat"> KM BERANGKAT </label></h4>
                                         <input type="number"  class="form-control input-default " name="km_berangkat" id="km_berangkat" class="form-control col-md-9" 
                                     </div>
                                     
                                     <div class="form-group">
                                         <h4 <label for="jam_tiba"> JAM TIBA</label></h4>
                                         <input type="time"  class="form-control input-default " name="jam_tiba" id="jam_tiba" class="form-control col-md-9" 
                                     </div>
                                     
                                     <div class="form-group">
                                         <h4 <label for="km_tiba">KM TIBA</label></h4>
                                         <input type="number"  class="form-control input-default " name="km_tiba" id="km_tiba" class="form-control col-md-9" 
                                     </div>
                                     
                                     <div class="form-group">
                                         <h4 <label for="status">STATUS</label></h4>
                                         <input type="text"  class="form-control input-default " name="status" id="status" class="form-control col-md-9" 
                                     </div>
                                     
                                     <div class="form-group">
                                         <h4 <label for="keterangan"> KETERANGAN </label></h4>
                                         <input type="text"  class="form-control input-default " name="nm_cust" id="nm_cust" class="form-control col-md-9" 
                                     </div>

                                    <div class="form-group">
                                        <h4 <label for="id_surat"> ID SURAT </label></h4>
                                        <input type="number" onkeyup="isi_otomatis()" id="id_surat" name="id_surat"class="form-control input-default class="form-control col-md-9
                                    </div>
                                     
                                    <div class="form-group">
                                        <h4 <label for="nm_cust"> NAMA CUSTOMER </label></h4>
                                        <input type="text"  class="form-control input-default " name="nm_cust" id="nm_cust" class="form-control col-md-9" 
                                    </div>

                                    <div class="form-group">
                                        <h4 <label for="telp">  Telpon </label>
                                        <input type="number" class="form-control input-default " name="telp"  id="telp" class="form-control col-md-9" 
                                     </div>

                                    <div class="form-group">
                                        <h4 <label for="almt">  alamat </label>
                                        <input type="text" class="form-control input-default " name="almt"  id="almt" class="form-control col-md-9" 
                                     </div>

                                    <div class="form-group">
                                        <h4 <label for="kode">  kode </label>
                                        <input type="number" class="form-control input-default " name="kode"  id="kode" class="form-control col-md-9" 
                                     </div>

                                    <div class="form-group">
                                        <h4 <label for="nm_brg">  Nama Barang </label>
                                        <input type="text" class="form-control input-default " name="nm_brg"  id="nm_brg" class="form-control col-md-9" 
                                     </div>

                                    <div class="form-group">
                                        <h4 <label for="jmlh_brg">  Jumlah </label>
                                        <input type="number" class="form-control input-default " name="jmlh_brg"  id="jmlh_brg" class="form-control col-md-9" 
                                     </div>

                                    <div class="form-group">
                                        <h4 <label for="plat"> Plat  </label>
                                        <input type="text" class="form-control input-default " name="plat"  id="plat" class="form-control col-md-9" 
                                     </div>

                                    <div class="form-group">
                                        <h4 <label for="armada">Armada  </label>
                                        <input type="text" class="form-control input-default " name="armada"  id="armada" class="form-control col-md-9" 
                                     </div>

                                    <div class="form-group">
                                        <h4 <label for="nik">  NIK </label>
                                        <input type="number" class="form-control input-default " name="nik"  id="nik" class="form-control col-md-9" 
                                     </div>

                                    <div class="form-group">
                                        <h4 <label for="driver">  Driver </label>
                                        <input type="text" class="form-control input-default " name="driver"  id="driver" class="form-control col-md-9" 
                                     </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var id_surat = $("#id_surat").val();
                $.ajax({
                    url: 'ajax.php',
                    data:"id_surat="+id_surat ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nm_cust').val(obj.nm_cust);
                    $('#telp').val(obj.telp);
                    $('#almt').val(obj.almt);
                    $('#kode').val(obj.kode);
                    $('#nm_brg').val(obj.nm_brg);
                    $('#jmlh_brg').val(obj.jmlh_brg);
                    $('#plat').val(obj.plat);
                    $('#armada').val(obj.armada);
                    $('#nik').val(obj.nik);
                    $('#driver').val(obj.driver);
                });
            }
        </script>

                                    </div>
                                        <div class="mt-4"></div>
                                        <a href="./index.php" class="btn btn-danger" >Batal</a>
                                        <button class="btn btn-primary mr-2" name="simpan" >Simpan</button>
                                        <a href="./input_brg.php" class="btn btn-primary" >NEXT</a>
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
        

</body>
</html>

<?php
    include "../koneksi.php";
    if(isset($_POST['simpan']))
    {
        $dari= $_POST['dari'];
        $tujuan= $_POST['tujuan'];
        $jam_berangkat= $_POST['jam_berangkat'];
        $km_berankgat= $_POST['km_berangkat'];
        $jam_tiba = $_POST['jam_tiba'];
        $km_tiba= $_POST['km_tiba'];
        $status= $_POST['status'];
        $keterangan= $_POST['keterangan'];
        $input = "INSERT INTO tb_rdo VALUES (' $dari', '$tujuan', '$jam_berangkat', '$km_berankgat', '$jam_tiba', '$km_tiba', '$status', '$keterangan
        )";
        
        mysqli_query($conn, $input); 
          echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Disimpan....</h5></div>";
          echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/user/index.php'>";
    }
