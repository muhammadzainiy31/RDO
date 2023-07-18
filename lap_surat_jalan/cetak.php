<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APLIKASI REPORT DELIVERY ORDER | CETAK DATA SURAT</title>
    <style type="text/css">
        @page {
            size: landscape;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #ccc;
            margin: 0;
            padding: 0;
        }

        .rangkasurat {
            max-width: 1400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 50px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .address {
            font-weight: bold;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .date {
            text-align: right;
            margin-bottom: 10px;
        }

        .signature {
            text-align: right;
            margin-top: 30px;
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
        <div class="title">
            <h2>LAPORAN SURAT JALAN</h2>
        </div>

        <?php
        include '../koneksi.php';
        ?>

        <table>
            <tr>
                <th>No</th>
                <th>Id Pengiriman</th>
                <th>Id Surat</th>
                <th>Id Customer</th>
                <th>Nama Customer</th>
                <th>Telpon</th>
                <th>Alamat</th>
                <th>Kecamatan</th>
                <th>Rute</th>
                <th>Pembelian</th>
                <th>Tanggal Pengiriman</th>
                <th>NO Plat/Armada</th>
                <th>Type Armada</th>
                <th>NIK Driver</th>
                <th>Nama Driver</th>
            </tr>
            <?php
            $no = 1;
            $ambilData = mysqli_query($conn, "SELECT 
                tb_pengirim.*,   
                tb_surat.*, 
                tb_customer.*, 
                tb_armada.type_armada, 
                tb_driver.nama_driver,
                tb_pembelian.id_pembelian
                FROM 
                tb_pengirim
                JOIN 
                tb_surat ON tb_pengirim.id_surat = tb_surat.id_surat
                JOIN 
                tb_customer ON tb_pengirim.id_cust = tb_customer.id_cust
                JOIN 
                tb_armada ON tb_pengirim.no_plat = tb_armada.no_plat
                JOIN 
                tb_driver ON tb_pengirim.nik_driver = tb_driver.nik_driver
                LEFT JOIN
                tb_pembelian ON tb_pengirim.id_surat = tb_pembelian.id_surat
                ORDER BY tb_pengirim.id_pengiriman DESC");
            while ($hasil = mysqli_fetch_array($ambilData)) {
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $hasil['id_pengiriman'] ?></td>
                    <td><?php echo $hasil['id_surat'] ?></td>
                    <td><?php echo $hasil['id_cust'] ?></td>
                    <td><?php echo $hasil['nama_cust'] ?></td>
                    <td><?php echo $hasil['no_telpon'] ?></td>
                    <td><?php echo $hasil['alamat_cust'] ?></td>
                    <td><?php echo $hasil['kecamatan'] ?></td>
                    <td><?php echo $hasil['rute'] ?></td>
                    <td><?php echo $hasil['id_pembelian'] ?></td>
                    <td><?php echo $hasil['tanggal_kirim'] ?></td>
                    <td><?php echo $hasil['no_plat'] ?></td>
                    <td><?php echo $hasil['type_armada'] ?></td>
                    <td><?php echo $hasil['nik_driver'] ?></td>
                    <td><?php echo $hasil['nama_driver'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>

        <div class="date">
            <p align="right">Banjarmasin..................20..</p>
        </div>
        <div class="signature">
            <p align="right">MANAGER</p>
        </div>

        <script>
            window.print();
        </script>
    </div>
</body>

</html>