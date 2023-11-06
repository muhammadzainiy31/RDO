<?php
if (isset($_GET['no_telpon'])) {
    $userkey = '557c1b512b1c';
    $passkey = '0684f494398eb65b58b781dc';
    //$url = 'https://console.zenziva.net/reguler/api/sendsms/';
    $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
    $curlHandle = curl_init();
    curl_setopt($curlHandle, CURLOPT_URL, $url);
    curl_setopt($curlHandle, CURLOPT_HEADER, 0);
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
    curl_setopt($curlHandle, CURLOPT_POST, 1);

    include "../koneksi.php";

    $telepon = $_GET['no_telpon'];
    $nama_cust = $_GET['nama_cust'];
    $flag = $_GET['flag'];

    $templateQuery = "SELECT kalimat FROM template_zenziva WHERE flag = '$flag'";
    $templateResult = mysqli_query($conn, $templateQuery);
    $templateRow = mysqli_fetch_assoc($templateResult);
    $message = 'Hai ' . $nama_cust . ', ' . $templateRow['kalimat'];

    // Kirim
    curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
        'userkey' => $userkey,
        'passkey' => $passkey,
        'to' => $telepon,
        'message' => $message
    ));

    $results = json_decode(curl_exec($curlHandle), true);

    // Tutup koneksi database
    //mysqli_close($koneksi);
    curl_close($curlHandle);

    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/user/index.php'>";
}
