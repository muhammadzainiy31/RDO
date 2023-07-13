<?php
// Informasi surat terima barang
$namaPelanggan = "John Doe";
$alamat = "Jl. Contoh No. 123, Kota Contoh";
$noTeleponDriver = "081234567890";
$armada = "Truk";

// Simulasikan data barang yang telah diterima
$barang = [
    [
        'nama' => 'Buku',
        'harga' => 10000,
        'jumlah' => 2
    ],
    [
        'nama' => 'Pensil',
        'harga' => 2000,
        'jumlah' => 5
    ],
    [
        'nama' => 'Pulpen',
        'harga' => 3000,
        'jumlah' => 3
    ]
];

// Menghitung total harga
$totalHarga = 0;

// Menampilkan informasi surat terima barang
echo '<h2>Surat Terima Barang</h2>';
echo '<p>Nama Pelanggan: ' . $namaPelanggan . '</p>';
echo '<p>Alamat: ' . $alamat . '</p>';
echo '<p>Nomor Telepon Driver: ' . $noTeleponDriver . '</p>';
echo '<p>Armada: ' . $armada . '</p>';

// Menampilkan detail barang
echo '<h3>Detail Barang</h3>';
echo '<table>';
echo '<tr>';
echo '<th>Nama Barang</th>';
echo '<th>Harga</th>';
echo '<th>Jumlah</th>';
echo '<th>Subtotal</th>';
echo '</tr>';

foreach ($barang as $item) {
    $subtotal = $item['harga'] * $item['jumlah'];
    $totalHarga += $subtotal;

    echo '<tr>';
    echo '<td>' . $item['nama'] . '</td>';
    echo '<td>' . $item['harga'] . '</td>';
    echo '<td>' . $item['jumlah'] . '</td>';
    echo '<td>' . $subtotal . '</td>';
    echo '</tr>';
}

echo '</table>';

// Menampilkan total harga
echo '<h3>Total Harga: ' . $totalHarga . '</h3>';
?>
