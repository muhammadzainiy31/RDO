<?php
    include "../koneksi.php";
    $id_pengiriman = $_GET['id_pengiriman'];
    $ambilData = mysqli_query($conn, "DELETE FROM tb_pengirim WHERE id_pengiriman='$id_pengiriman'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/lap_surat_jalan/index.php'>";
?>