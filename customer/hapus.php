<?php
    include "../koneksi.php";
    $id = $_GET['id_cust'];
    $ambilData = mysqli_query($conn, "DELETE FROM tb_customer WHERE id_cust='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/customer/index.php'>";
