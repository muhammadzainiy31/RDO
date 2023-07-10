<?php
    include "koneksi.php";
    $id = $_GET['surat_id'];
    $ambilData = mysqli_query($conn, "DELETE FROM tb_report WHERE surat_id='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/user/index.php'>";
?>