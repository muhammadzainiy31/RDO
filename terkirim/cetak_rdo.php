<!DOCTYPE html>
<html>
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
 
		<h2>LAPORAN DATA BARANG TERKIRIM</h2>
 
	</center>
 
	<?php 
	include '../koneksi.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
								<th width="1%">No</th>
								<th>Id Pembelian</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>QTY</th>
		</tr>
		<?php 
		$no = 1;
		$ambilData = mysqli_query($conn,"SELECT tb_pembelian.id_pembelian, tb_pembelian.kode_brg, tb_pembelian.qty, tb_barang.nama_brg
		FROM tb_pembelian
		INNER JOIN tb_barang ON tb_pembelian.kode_brg = tb_barang.kode_brg");
		while($hasil = mysqli_fetch_array($ambilData)){
		?>
 <tr align="center" >
                  <td><?php echo $no++ ?> </td>
									<td><?php echo $hasil['id_pembelian'] ?></td>
                                        <td><?php echo $hasil['kode_brg'] ?></td>
                                        <td><?php echo $hasil['nama_brg'] ?></td>

                                        <td><?php echo $hasil['qty'] ?></td>
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