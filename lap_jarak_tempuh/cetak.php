<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APPLIKASI REPORT DELIVERY ORDER  | CETAK DATA DRIVER</title>
	<style Type="text/css">
		body {font-family: arial;background-color: #ccc}
		.rangkasurat {width: 900px;margin:0 auto;background-color: #fff; height: 1000px;padding:50px;}
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
					<h1>APPLIKASI REPORT DELIVERY ORDER</h1>
					<b>KM.15 GAMBUT Komplek Pergudangan Cipta Jaya NO.12F Banjarmasin</b>
</td>
</td>
</table> 
	<center>
 
		<h2>REPORT DATA DRIVER</h2>
 
	</center>
 
	<?php 
	include '../koneksi.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
								<th width="1%">No</th>
                <th>NIK Driver</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Jabatan</th>
                <th>Tingkat SIM</th>
                <th>Alamat</th>
		</tr>
		<?php 
		$no = 1;
		$ambilData = mysqli_query($conn,"select * from tb_driver");
		while($hasil = mysqli_fetch_array($ambilData)){
		?>
 <tr align="center" >
                  <td><?php echo $no++ ?> </td>
                  <td><?php echo $hasil ['nik_driver']?></td>
                  <td><?php echo $hasil ['nama_driver']?></td>
                  <td><?php echo $hasil ['tanggal_lahir']?></td>
                  <td><?php echo $hasil ['jabatan']?> </td>
                  <td><?php echo $hasil ['sim']?></td>
                  <td><?php echo $hasil ['alamat_driver']?></td>
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