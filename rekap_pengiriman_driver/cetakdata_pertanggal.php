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
    $query = "SELECT tb_armada.no_plat, tb_armada.type_armada, tb_surat.tanggal_kirim, tb_customer.rute, tb_driver.nama_driver,tb_driver.nik, COUNT(tb_driver.nama_driver) AS jumlah_pengiriman
    FROM tb_armada
    JOIN tb_pengirim ON tb_armada.no_plat = tb_pengirim.no_plat
    JOIN tb_surat ON tb_pengirim.id_surat = tb_surat.id_surat
    JOIN tb_customer ON tb_pengirim.id_cust = tb_customer.id_cust
    JOIN tb_driver ON tb_pengirim.nik = tb_driver.nik
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
    <title>CETAK DATA SURAT BERDASARKAN TANGGAL</title>
    <style Type="text/css">
        /* CSS untuk tampilan cetak */
        body {
            font-family: arial;
            background-color: #ccc;
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
            padding: 2px;
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
			<h2>LAPORAN REKAP PENGIRIMAN DRIVER</h2>
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
            while ($hasil = mysqli_fetch_array($result)) {
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
