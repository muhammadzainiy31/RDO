<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>APLIKASI REPORT DELIVERY ORDER | CETAK DATA ARMADA</title>
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
					<h1>APLIKASI REPORT DELIVERY ORDER</h1><b>KM.15 GAMBUT Komplek Pergudangan Cipta Jaya NO.12F Banjarmasin</b>
				</td>
				</td>
		</table>
		<center>
			<h2>REPORT DATA ARMADA</h2>
		</center><?php
					include '../koneksi.php';
					?><table border="1" style="width: 100%">
			<tr>
				<th width="1%">No</th>
				<th>Nomor Polisi/Plat</th>
				<th>Type Armada</th>
				<th>Tahun</th>
				<th>Terakhir Servis</th>
			</tr><?php
					$no = 1;
					$ambilData = mysqli_query($conn, "SELECT tb_armada.*, rs.estimasi
		FROM tb_armada
		LEFT JOIN (
				SELECT no_plat, MAX(estimasi) AS estimasi
				FROM riwayat_servis
				GROUP BY no_plat
		) rs ON tb_armada.no_plat = rs.no_plat
		") or die(mysqli_error($conn));
					while ($hasil = mysqli_fetch_array($ambilData)) {
					?><tr align="center">
					<td><?php echo $no++ ?></td>
					<td><?php echo $hasil['no_plat'] ?></td>
					<td><?php echo $hasil['type_armada'] ?></td>
					<td><?php echo $hasil['tahun'] ?></td>
					<td><?php echo $hasil['estimasi'] ?></td>
				</tr><?php
					}
						?>
		</table>
		<center>
			<p align="right">Banjarmasin..................20..</p>
			<p align="right">MANAGER </p>
		</center>
		<script>
			window.print();
		</script>
</body>

</html>