<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $ambilData = mysqli_query($conn, "DELETE FROM tb_admin WHERE id='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/admin/index.php'>";
