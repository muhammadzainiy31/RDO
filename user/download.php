<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Cetak Surat Jalan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .rangkasurat {
            width: 100%;
            margin: 0 auto;
            padding: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
            padding: 6px;
        }
        th {
            background-color: #32c8ed;
        }
        .tengah {
            text-align: center;
        }
        .header-logo {
            width: 80px;
        }
    </style>
</head>
<body>
    <div class="rangkasurat">
        <h2 style="text-align: center;">Detail Surat Jalan</h2>

				<?php 
        include '../koneksi.php';
        
        $id_pengiriman = $_GET['id_pengiriman']; // Ganti dengan cara Anda untuk mendapatkan ID pengiriman
        
        $ambilData = mysqli_query($conn, "SELECT tb_pengirim.*, tb_surat.*, 
            tb_customer.*, tb_cekin.*, tb_cekout.*, tb_armada.type_armada, tb_driver.nama_driver, tb_driver.nik
            FROM tb_pengirim
            JOIN tb_surat ON tb_pengirim.id_surat = tb_surat.id_surat
            JOIN tb_customer ON tb_pengirim.id_cust = tb_customer.id_cust
            JOIN tb_armada ON tb_pengirim.no_plat = tb_armada.no_plat
            JOIN tb_driver ON tb_pengirim.nik = tb_driver.nik
            JOIN tb_cekin ON tb_pengirim.id_pengiriman = tb_cekin.id_pengiriman
            JOIN tb_cekout ON tb_pengirim.id_pengiriman = tb_cekout.id_pengiriman
            WHERE tb_pengirim.id_pengiriman = '$id_pengiriman'
            ORDER BY tb_pengirim.id_pengiriman DESC");
        $hasil = mysqli_fetch_assoc($ambilData);
        ?>

        <table>
            <tr>
                <th>ID Pengiriman</th>
                <td><?php echo $hasil['id_pengiriman'] ?></td>
            </tr>
            <tr>
                <th>ID Surat</th>
                <td><?php echo $hasil['id_surat'] ?></td>
            </tr>
            <tr>
                <th>NIK Driver</th>
                <td><?php echo $hasil['nik'] ?></td>
            </tr>
            <tr>
                <th>Nama Driver</th>
                <td><?php echo $hasil['nama_driver'] ?></td>
            </tr>
            <tr>
                <th>ID Customer</th>
                <td><?php echo $hasil['id_cust'] ?></td>
            </tr>
            <tr>
                <th>Nama Customer</th>
                <td><?php echo $hasil['nama_cust'] ?></td>
            </tr>
            <tr>
                <th>Nomor Telpon</th>
                <td><?php echo $hasil['no_telpon'] ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo $hasil['alamat_cust'] ?></td>
            </tr>
            <tr>
                <th>Tanggal Kirim</th>
                <td><?php echo $hasil['tanggal_kirim'] ?></td>
            </tr>
            <tr>
                <th>NO Plat</th>
                <td><?php echo $hasil['no_plat'] ?></td>
            </tr>
            <tr>
                <th>Type Armada</th>
                <td><?php echo $hasil['type_armada'] ?></td>
            </tr>
            <tr>
                <th>Dari</th>
                <td><?php echo $hasil['dari'] ?></td>
            </tr>
            <tr>
                <th>Tujuan</th>
                <td><?php echo $hasil['tujuan'] ?></td>
            </tr>
            <tr>
                <th>KM Berangkat</th>
                <td><?php echo $hasil['km_berangkat'] ?></td>
            </tr>
            <tr>
                <th>Jam Berangkat</th>
                <td><?php echo $hasil['jam_berangkat'] ?></td>
            </tr>
            <tr>
                <th>KM Tiba</th>
                <td><?php echo $hasil['km_tiba'] ?></td>
            </tr>
            <tr>
                <th>Jam Tiba</th>
                <td><?php echo $hasil['jam_tiba'] ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?php echo $hasil['status'] ?></td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td><?php echo $hasil['keterangan'] ?></td>
            </tr>
            <tr>
                <th>Foto</th>
                <td><img src="../images/avatar/<?php echo $hasil['foto'] ?>" alt="Foto" width="50"></td>
            </tr>
            <tr>
                <th>Pembelian</th>
                <td>
                    <?php
                 $query_pembelian = "SELECT tb_pembelian.*, 
								 tb_pembelian.kode_brg, tb_pembelian.qty, 
								 tb_barang.nama_brg   -- Tambahkan kolom nama_brg dari tb_barang
								 FROM tb_pembelian
								 JOIN tb_barang ON tb_pembelian.kode_brg = tb_barang.kode_brg  -- Hubungkan dengan tb_barang
								 WHERE tb_pembelian.id_surat = " . $hasil['id_surat'];

$result_pembelian = mysqli_query($conn, $query_pembelian);

if (mysqli_num_rows($result_pembelian) > 0) {
 while ($pembelian = mysqli_fetch_assoc($result_pembelian)) {
		 echo "<p>Kode Barang: " . $pembelian['kode_brg'] . "</p>";
		 echo "<p>Nama Barang: " . $pembelian['nama_brg'] . "</p>";  // Menampilkan nama_brg dari tb_barang
		 echo "<p>Jumlah: " . $pembelian['qty'] . "</p>";
		 echo "<br>";
 }
} else {
 echo "Data pembelian tidak tersedia.";
}


                    ?>
                </td>
            </tr>
            <!-- ... (Tambahkan kolom lain sesuai kebutuhan) ... -->
        </table>

        <script>
            window.onload = function() {
                window.print();
            };
        </script>
    </div>
</body>
</html>
