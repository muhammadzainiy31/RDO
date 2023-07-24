<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>APLIKASI REPORT DELIVERY ORDER | CETAK DATA DRIVER</title>
	<style Type="text/css">
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
				</td>
		</table>
		<center>
			<h2>LAPORAN DATA PENGIRIMAN</h2>
		</center>

		<?php
		include '../koneksi.php';
		?>

		<table border="1" style="width: 100%">
			<tr>
				<th width="1%">No</th>
				<th>ID Surat</th>
				<th>ID Customer</th>
				<th>Nama Customer</th>
				<th>Telpon</th>
				<th>Alamat</th>
				<th>Kecamatan</th>
				<th>Rute</th>
				<th>Tanggal Pengiriman</th>
			</tr>
			<?php
			$no = 1;
			$ambilData = mysqli_query($conn, "SELECT tb_surat.*, tb_customer.*
		FROM tb_surat
		JOIN tb_customer ON tb_surat.id_cust = tb_customer.id_cust
		ORDER BY tb_surat.tanggal_kirim ");
			while ($hasil = mysqli_fetch_array($ambilData)) {
			?>
				<tr align="center">
					<td><?php echo $no++ ?> </td>
					<td><?php echo $hasil['id_surat'] ?></td>
					<td><?php echo $hasil['id_cust'] ?></td>
					<td><?php echo $hasil['nama_cust'] ?></td>
					<td><?php echo $hasil['no_telpon'] ?></td>
					<td><?php echo $hasil['alamat_cust'] ?></td>
					<td><?php echo $hasil['kecamatan'] ?></td>
					<td><?php echo $hasil['rute'] ?></td>
					<td><?php echo $hasil['tanggal_kirim'] ?></td>
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