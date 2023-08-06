<?php
// Ambil data ID Surat dari parameter URL
if (isset($_GET['id_surat'])) {
    $id_surat = $_GET['id_surat'];


    include '../koneksi.php';

    // Query untuk mendapatkan informasi pembelian berdasarkan ID Surat
    $query_pembelian = "SELECT tb_pembelian.*, tb_customer.nama_cust, tb_pembelian.kode_brg, tb_pembelian.qty
                        FROM tb_pembelian
                        JOIN tb_surat ON tb_pembelian.id_surat = tb_surat.id_surat
                        JOIN tb_customer ON tb_surat.id_cust = tb_customer.id_cust
                        WHERE tb_pembelian.id_surat = " . $id_surat;

    $result_pembelian = mysqli_query($conn, $query_pembelian);

    // Mulai mencetak
    header("Content-Type: application/pdf");
    header("Content-Disposition: inline; filename=informasi_pembelian.pdf");

    require('fpdf.php'); // Pastikan Anda mengganti 'fpdf.php' dengan path yang sesuai

    class PDF extends FPDF
    {
        function Header()
        {
            // Judul header
            $this->SetFont('Arial', 'B', 16);
            $this->Cell(0, 10, 'Informasi Pembelian', 0, 1, 'C');
            $this->Ln(10);
        }

        function Footer()
        {
            // Tampilkan nomor halaman di bagian bawah
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, 'Halaman ' . $this->PageNo(), 0, 0, 'C');
        }
    }

    // Buat objek PDF
    $pdf = new PDF();
    $pdf->AddPage();

    if (mysqli_num_rows($result_pembelian) > 0) {
        while ($pembelian = mysqli_fetch_assoc($result_pembelian)) {
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 10, 'ID Pembelian: ' . $pembelian['id_pembelian'], 0, 1);
            $pdf->Cell(0, 10, 'ID Surat: ' . $pembelian['id_surat'], 0, 1);
            $pdf->Cell(0, 10, 'Nama Customer: ' . $pembelian['nama_cust'], 0, 1);
            $pdf->Cell(0, 10, 'ID Barang: ' . $pembelian['kode_brg'], 0, 1);
            $pdf->Cell(0, 10, 'Jumlah: ' . $pembelian['qty'], 0, 1);
            $pdf->Ln(10);
        }
    } else {
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Data pembelian tidak tersedia.', 0, 1);
    }

    $pdf->Output();
    mysqli_close($conn);
} else {
    echo "ID Surat tidak diberikan.";
}
?>
