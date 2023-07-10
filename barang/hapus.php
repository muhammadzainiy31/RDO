<?php
    include "../koneksi.php";
    $id= $_GET['kode_brg'];
    $ambilData = mysqli_query($conn, "DELETE FROM tb_barang WHERE kode_brg='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/barang/index.php'>";
?>