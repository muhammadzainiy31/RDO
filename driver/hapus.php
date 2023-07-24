<?php
    include "../koneksi.php";
    $id = $_GET['nik'];
    $ambilData = mysqli_query($conn, "DELETE FROM tb_driver WHERE nik='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/driver/index.php'>";
