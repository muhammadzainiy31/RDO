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
    $query = "SELECT
    tb_armada.no_plat,
    tb_armada.type_armada,
    tb_pengirim.id_pengiriman,
    tb_surat.tanggal_kirim,
    (tb_cekout.km_tiba - tb_cekin.km_berangkat) AS selisih_km,
    tb_cekout.km_tiba AS km_sekarang
FROM
    tb_armada
    JOIN tb_pengirim ON tb_armada.no_plat = tb_pengirim.no_plat
    JOIN tb_surat ON tb_pengirim.id_surat = tb_surat.id_surat
    JOIN tb_cekout ON tb_pengirim.id_pengiriman = tb_cekout.id_pengiriman
    JOIN tb_cekin ON tb_cekout.id_pengiriman = tb_cekin.id_pengiriman
WHERE
    (tb_armada.no_plat, tb_cekout.km_tiba) IN (
        SELECT
            tb_armada.no_plat,
            MAX(tb_cekout.km_tiba) AS km_tiba
        FROM
            tb_armada
            JOIN tb_pengirim ON tb_armada.no_plat = tb_pengirim.no_plat
            JOIN tb_cekout ON tb_pengirim.id_pengiriman = tb_cekout.id_pengiriman
        WHERE tb_surat.tanggal_kirim BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'
        GROUP BY tb_armada.no_plat
    )
ORDER BY tb_surat.tanggal_kirim";
    $result = mysqli_query($conn, $query);
} else {
    // Jika tanggal mulai dan tanggal sampai belum disetel, arahkan kembali ke halaman sebelumnya
    header("Location: data_surat.php");
    exit;
}
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>APLIKASI REPORT DELIVERY ORDER | DATA RIWAYAT PENGIRIMAN DRIVER</title>
	<style Type="text/css">
		body {
			font-family: arial;
			background-color: #ccc
		}

		.rangkasurat {
			width: 1500px;
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
            <h2>LAPORAN DATA JARAK TEMPUH ARMADA</h2>
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
                    <th>Armada</th>
                    <th>Type</th>
                    <th>Tanggal Kirim</th>
                    <th>KM Terpakai</th>
                    <th>KM Sekarang</th>
    </tr>
    <?php
            $no = 1;
            while ($hasil = mysqli_fetch_array($result)) {
            ?>
        <tr align="center">
            <td><?php echo $no++ ?> </td>
                            <td><?php echo $hasil['no_plat'] ?></td>
                            <td><?php echo $hasil['type_armada'] ?></td>
                            <td><?php echo $hasil['tanggal_kirim'] ?></td>
                            <td><?php echo $hasil['selisih_km'] ?></td>
                            <td><?php echo $hasil['km_sekarang'] ?></td>
        </tr>
    <?php
    }
    ?>
</table>

        </center>
        
		<script>
			window.print();
		</script>
    </div>
</body>

</html>
