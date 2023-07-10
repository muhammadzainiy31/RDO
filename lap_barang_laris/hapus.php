<?php
    include "../koneksi.php";
    $id = $_GET['nik_driver'];
    $ambilData = mysqli_query($conn, "DELETE FROM tb_driver WHERE nik_driver='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/driver/index.php'>";
?>