<?php
include '../koneksi.php';
$id = $_GET['id_surat'];
$ambildata = mysqli_query($conn, "select * from tb_surat where id_surat='$id'");
$hasil = mysqli_fetch_array($ambildata);
$data = array(
            'nm_cust'      =>  $hasil['nm_cust'],
            'telp '      =>  $hasil['telp'],
            'almt '      =>  $hasil['almt'],
            'kode'      =>  $hasil['kode'],
            'nm_brg '      =>  $hasil['nm_brg'],
            'jmlh_brg'      =>  $hasil['jmlh_brg'],
            'plat'      =>  $hasil['plat'],
            'armada'      =>  $hasil['armada'],
            'nik'      =>  $hasil['nik'],
            'driver'      =>  $hasil['driver']);
 echo json_encode($data);









?>