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
 
		<h2>REPORT DATA SURAT</h2>
 
	</center>
 
	<?php 
	include '../koneksi.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
								<th width="1%">No</th>
                <th>Id Surat</th>
                <th>Dari</th>
                <th>Tujuan</th>
                <th>Jam Berangkat</th>
                <th>KM Berangkat</th>
                <th>Jam Tiba</th>
                <th>KM Tiba</th>
                <th>Status </th>
                <th>Keterangan</th>
                <th>Nama Customer</th>
                <th>No.Telpon</th>
                <th>Alamat</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>No.Polisi/Plat</th>
                <th>Type Armada</th>
                <th>NIK Driver</th>
                <th>Nama Driver</th>
		</tr>
		<?php 
		$no = 1;
		$ambilData = mysqli_query($conn,"select * from tb_rdo");
		while($hasil = mysqli_fetch_array($ambilData)){
		?>
 <tr align="center" >
                  <td><?php echo $no++ ?> </td>
                  <td><?php echo $hasil ['id_surat']?></td>
                  <td><?php echo $hasil ['dari']?></td>
                  <td><?php echo $hasil ['tujuan']?></td>
                  <td><?php echo $hasil ['jam_berangkat']?></td>
                  <td><?php echo $hasil ['km_berangkat']?></td>
                  <td><?php echo $hasil ['jm_tiba']?></td>
                  <td><?php echo $hasil ['km_tiba']?></td>
                  <td><?php echo $hasil ['status']?></td>
                  <td><?php echo $hasil ['keterangan']?></td>
                  <td><?php echo $hasil ['nm_cust']?></td>
                  <td><?php echo $hasil ['hp']?></td>
                  <td><?php echo $hasil ['alamt']?></td>
                  <td><?php echo $hasil ['kode']?></td>
                  <td><?php echo $hasil ['nm_brng']?></td>
                  <td><?php echo $hasil ['jmlh']?></td>
                  <td><?php echo $hasil ['plat']?></td>
                  <td><?php echo $hasil ['armada']?></td>
                  <td><?php echo $hasil ['nik']?></td>
                  <td><?php echo $hasil ['driver']?></td>
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