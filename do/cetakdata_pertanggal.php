<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["login"])) {
    header("Location: login.php"); // Mengarahkan pengguna ke halaman login jika belum login
    exit; // Menghentikan eksekusi skrip
}

// Periksa apakah tanggal mulai dan tanggal sampai telah disetel
if (isset($_GET['mulai_tanggal']) && isset($_GET['sampai_tanggal'])) {
    // Ambil tanggal mulai dan tanggal sampai dari query string
    $mulai_tanggal = $_GET['mulai_tanggal'];
    $sampai_tanggal = $_GET['sampai_tanggal'];

    // Validasi tanggal (misalnya: apakah formatnya benar, dan apakah tanggal mulai tidak melebihi tanggal sampai)
    // ... (Tambahan validasi bisa ditambahkan sesuai kebutuhan)

    // Lakukan query untuk mengambil data berdasarkan tanggal
    include '../koneksi.php';
    $query = "SELECT tb_pengirim.*, tb_surat.*, 
    tb_customer.*, tb_cekin.*, tb_cekout.*, tb_armada.type_armada, tb_driver.nama_driver
    FROM tb_pengirim
    JOIN tb_surat ON tb_pengirim.id_surat = tb_surat.id_surat
JOIN 
    tb_customer ON tb_pengirim.id_cust = tb_customer.id_cust
    JOIN tb_armada ON tb_pengirim.no_plat = tb_armada.no_plat
    JOIN tb_driver ON tb_pengirim.nik = tb_driver.nik
    JOIN tb_cekin ON tb_pengirim.id_pengiriman = tb_cekin.id_pengiriman
    JOIN tb_cekout ON tb_pengirim.id_pengiriman = tb_cekout.id_pengiriman
            WHERE tanggal_kirim BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'
            ORDER BY tb_surat.tanggal_kirim";
    $result = mysqli_query($conn, $query);
} else {
    // Jika tanggal mulai dan tanggal sampai belum disetel, arahkan kembali ke halaman sebelumnya
    header("Location: data_surat.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APLIKASI REPORT DELIVERY ORDER  | DATA RDO</title>
	<style Type="text/css">
		body {font-family: arial;background-color: #ccc}
		.rangkasurat {width: 2000px;margin:0 auto;background-color: #fff; height:1000px;padding:50px;}
		table{border-bottom: 5px solid #000;padding:2px}
		.tengah {text-align: center;line-height:5px;}
		</style>
</head>

<body>
    <div class="rangkasurat">
        <table width="100%">
            <tr>
                <td><img src="../images/informa.png" width="100px"></td>
                <td class="tengah">
                    <h2>PT. HOME CENTER INDONESIA </h2>
                    <h2>INFORMA BANJARMASIN</h2>
                    <h2>SDC BANJARMASIN</h2>
                    <h1>APLIKASI REPORT DELIVERY ORDER</h1>
                    <b>KM.15 GAMBUT Komplek Pergudangan Cipta Jaya NO.12F Banjarmasin</b>
                </td>
                </td>
        </table>
        <center>
            <h2>LAPORAN DATA RDO</h2>
            <?php if (isset($_GET['mulai_tanggal']) && isset($_GET['sampai_tanggal'])) : ?>
                <p>Periode: <?php echo $_GET['mulai_tanggal'] ?> hingga <?php echo $_GET['sampai_tanggal'] ?></p>
            <?php endif; ?>
        </center>
 
 <?php 
 include '../koneksi.php';
 ?>

 <table border="1" style="width: 100%">
     <tr>
                             <th width="1%">No</th>
                             <th>Id Pengiriman</th>
                             <th>Id Surat</th>
         <th>NIK Driver</th>
         <th>Nama Driver</th>
         <th>Id Customer</th>
         <th>Nama Customer</th>
         <th>Nomor Telepon</th>
         <th>Alamat Customer</th>
         <th>Tanggal Kirim</th>
         <th>NO Plat</th>
         <th>Type Armada</th>
         <th>Dari</th>
         <th>Tujuan</th>
         <th>KM Berangkat</th>
         <th>Jam Berangkat</th>
         <th>KM Tiba</th>
         <th>Jam Tiba</th>
         <th>Status</th>
         <th>Keterangan</th>
         <th>Foto</th>
     </tr>
     <?php
            $no = 1;
            while ($hasil = mysqli_fetch_array($result)) {
            ?>
<tr align="center" >
               <td><?php echo $no++ ?> </td>
                                     <td><?php echo $hasil['id_pengiriman'] ?></td>
                                     <td><?php echo $hasil['id_surat'] ?></td>
                                     <td><?php echo $hasil['nik'] ?></td>
                                     <td><?php echo $hasil['nama_driver'] ?></td>
                                     <td><?php echo $hasil['id_cust'] ?></td>
                                     <td><?php echo $hasil['nama_cust'] ?></td>
                                     <td><?php echo $hasil['no_telpon'] ?></td>
                                     <td><?php echo $hasil['alamat_cust'] ?></td>
                                     <td><?php echo $hasil['tanggal_kirim'] ?></td>
                                     <td><?php echo $hasil['no_plat'] ?></td>
                                     <td><?php echo $hasil['type_armada'] ?></td>
                                     <td><?php echo $hasil['dari'] ?></td>
                                     <td><?php echo $hasil['tujuan'] ?></td>
                                     <td><?php echo $hasil['km_berangkat'] ?></td>
                                     <td><?php echo $hasil['jam_berangkat'] ?></td>
                                     <td><?php echo $hasil['km_tiba'] ?></td>
                                     <td><?php echo $hasil['jam_tiba'] ?></td>
                                     <td><?php echo $hasil['status'] ?></td>
                                     <td><?php echo $hasil['keterangan'] ?></td>
                                     <td><img src="../images/avatar/<?php echo $hasil["foto"] ?>" alt="foto" width="50"></td>
     </tr>
     <?php 
     }
     ?>



 </table>




        <center>
            <br>
            <br>
            <br>
            <p align="right">Banjarmasin..................20..</p>
            <p align="right">MANAGER</p>
        </center>
        
		<script>
			window.print();
		</script>
    </div>
</body>

</html>
