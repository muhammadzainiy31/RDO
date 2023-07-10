<?php
    include "../koneksi.php";
    $id = $_GET['id'];
    $ambilData = mysqli_query($conn, "DELETE FROM riwayat_servis WHERE id='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/lap_riw_servis_mobil/index.php'>";
?>