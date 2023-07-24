<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>APLIKASI REPORT DELIVERY ORDER | CETAK DATA DRIVER</title>
	<style type="text/css">
		@media print {
			@page {
				size: landscape;
			}
		}

		body {
			font-family: arial;
			background-color: #ccc
		}

		.rangkasurat {
			width: 900px;
			margin: 0 auto;
			background-color: #fff;
			height: 1000px;
			padding: 50px;
		}

		table {
			border-bottom: 5px solid #000;
			padding: 2px
		}

		.tengah {
			text-align: center;
			line-height: 5px;
		}
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
			</tr>
		</table>
		<center>
			<h2>LAPORAN REKAP PENGIRIMAN DRIVER</h2>
		</center>
		<?php
		include '../koneksi.php';
		?>
		<table border="1" style="width: 100%">
			<tr>
				<th width="1%">No</th>
				<th>NIK Driver</th>
				<th>Nama Driver</th>
				<th>Tanggal Kirim</th>
				<th>Jumlah Pengiriman</th>
				<th>NO Plat</th>
				<th>Type Armada</th>
				<th>Rute</th>
			</tr>
			<?php
			$no = 1;
			$ambilData = mysqli_query($conn, "SELECT tb_armada.no_plat, tb_armada.type_armada, tb_surat.tanggal_kirim, tb_customer.rute, tb_driver.nama_driver,tb_driver.nik, COUNT(tb_driver.nama_driver) AS jumlah_pengiriman
			FROM tb_armada
			JOIN tb_pengirim ON tb_armada.no_plat = tb_pengirim.no_plat
			JOIN tb_surat ON tb_pengirim.id_surat = tb_surat.id_surat
			JOIN tb_customer ON tb_pengirim.id_cust = tb_customer.id_cust
			JOIN tb_driver ON tb_pengirim.nik = tb_driver.nik
			GROUP BY tb_armada.no_plat, tb_driver.nama_driver");
			while ($hasil = mysqli_fetch_array($ambilData)) {
			?>
				<tr align="center">
					<td><?php echo $no++ ?></td>
					<td><?php echo $hasil['nik'] ?></td>
					<td><?php echo $hasil['nama_driver'] ?></td>
					<td><?php echo $hasil['tanggal_kirim'] ?></td>
					<td><?php echo $hasil['jumlah_pengiriman'] ?></td>
					<td><?php echo $hasil['no_plat'] ?></td>
					<td><?php echo $hasil['type_armada'] ?></td>
					<td><?php echo $hasil['rute'] ?></td>
				</tr>
			<?php
			}
			?>
		</table>
		<center>
			<p align="right">Banjarmasin..................20..</p>
			<p align="right">MANAGER</p>
		</center>
		<script>
			window.print();
		</script>
	</div>
</body>

</html>