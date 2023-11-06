<?php
include '../koneksi.php';

// Periksa apakah parameter id_surat telah diberikan melalui URL
if (isset($_GET['id_surat']) && !empty($_GET['id_surat'])) {
    $id_surat = $_GET['id_surat'];

    // Query untuk mengambil data surat dan informasi progres pengiriman
    $query = "SELECT tb_surat.*, tb_customer.*
              FROM tb_surat
              JOIN tb_customer ON tb_surat.id_cust = tb_customer.id_cust
              WHERE tb_surat.id_surat = $id_surat";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
    } else {
        $error_message = "Gagal mengambil data dari database.";
    }
} else {
    $error_message = "ID Surat tidak valid.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cek Progres Pengiriman</title>
</head>

<body>
    <?php if (isset($data)) : ?>
        <h1>Progres Pengiriman</h1>
        <p>ID Surat: <?php echo $data['id_surat']; ?></p>
        <p>ID Customer: <?php echo $data['id_cust']; ?></p>
        <p>Nama Customer: <?php echo $data['nama_cust']; ?></p>
        <p>Tanggal Pengiriman: <?php echo $data['tanggal_kirim']; ?></p>
        <!-- Tampilkan informasi progres pengiriman lainnya sesuai kebutuhan -->
    <?php elseif (isset($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php else : ?>
        <p>Data tidak ditemukan.</p>
    <?php endif; ?>
</body>

</html>
