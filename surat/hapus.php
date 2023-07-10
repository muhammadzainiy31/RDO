<?php
    include "../koneksi.php";
    $id = $_GET['id_surat'];
    $ambilData = mysqli_query($conn, "DELETE FROM tb_surat WHERE id_surat='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/surat/index.php'>";
?>