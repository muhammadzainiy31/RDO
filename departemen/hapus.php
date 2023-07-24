<?php
    include "../koneksi.php";
    $id= $_GET['id_dep'];
    $ambilData = mysqli_query($conn, "DELETE FROM tb_departemen WHERE id_dep='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/departemen/index.php'>";
