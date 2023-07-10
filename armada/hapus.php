<?php
    include "../koneksi.php";
    $id = $_GET['no_plat'];
    $ambilData = mysqli_query($conn, "DELETE FROM tb_armada WHERE no_plat='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/armada/index.php'>";
?>