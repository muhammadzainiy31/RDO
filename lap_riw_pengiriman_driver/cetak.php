<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APLIKASI REPORT DELIVERY ORDER  | CETAK DATA ARMADA</title>
	<style Type="text/css">
		body {font-family: arial;background-color: #ccc}
		.rangkasurat {width: 1500px;margin:0 auto;background-color: #fff; height:1000px;padding:50px;}
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
 
		<h2>REPORT DATA RIWAYAT PENGIRIMAN DRIVER</h2>
 
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
                                <th>Nama Customer</th>
                                <th>Nomor Telepon</th>
                                <th>Alamat Customer</th>
                                <th>Kecamatan</th>
                                <th>Rute</th>
                                <th>Tanggal Kirim</th>
                                <th>NO Plat</th>
                                <th>Type Armada</th>
		</tr>
		<?php 
		$no = 1;
		$ambilData = mysqli_query($conn,"SELECT tb_pengirim.*, tb_surat.*,tb_customer.*, tb_cekin.*, tb_cekout.*, tb_armada.type_armada, tb_driver.nama_driver
		FROM tb_pengirim
		JOIN tb_surat ON tb_pengirim.id_surat = tb_surat.id_surat
JOIN 
		tb_customer ON tb_pengirim.id_cust = tb_customer.id_cust
		JOIN tb_armada ON tb_pengirim.no_plat = tb_armada.no_plat
		JOIN tb_driver ON tb_pengirim.nik_driver = tb_driver.nik_driver
		JOIN tb_cekin ON tb_pengirim.id_pengiriman = tb_cekin.id_pengiriman
		JOIN tb_cekout ON tb_pengirim.id_pengiriman = tb_cekout.id_pengiriman
		ORDER BY tb_pengirim.id_pengiriman DESC");
		while($hasil = mysqli_fetch_array($ambilData)){
		?>
 <tr align="center" >
                  <td><?php echo $no++ ?> </td>
                  <td><?php echo $hasil ['id_pengiriman']?></td>
                  <td><?php echo $hasil ['id_surat']?></td>
                  <td><?php echo $hasil ['nik_driver']?></td>
                  <td><?php echo $hasil ['nama_driver']?></td>
                  <td><?php echo $hasil ['nama_cust']?></td>
                  <td><?php echo $hasil ['no_telpon']?></td>
                  <td><?php echo $hasil ['alamat_cust']?></td>
                  <td><?php echo $hasil ['kecamatan']?></td>
                  <td><?php echo $hasil ['rute']?></td>
                  <td><?php echo $hasil ['tanggal_kirim']?></td>
                  <td><?php echo $hasil ['no_plat']?></td>
                  <td><?php echo $hasil ['type_armada']?></td>
		</tr>
		<?php 
		}
		?>



	</table>
 
	<center>
		<p align="right">Banjarmasin..................20..</p>
		
		<p align="right">MANAGER         


		</p>
 
	</center>
	<script>
		window.print();
	</script>
 
</body>
</html>