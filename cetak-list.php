<?php
require('fpdf186/fpdf.php');
include 'config.php';

$sqlSiswa = "SELECT * FROM siswa";
$querySiswa = mysqli_query($conn, $sqlSiswa);

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Daftar Siswa', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 10, 'No', 1);
$pdf->Cell(50, 10, 'Nama', 1);
$pdf->Cell(60, 10, 'Alamat', 1);
$pdf->Cell(30, 10, 'Jenis Kelamin', 1);
$pdf->Cell(40, 10, 'Agama', 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 12);
$noSiswa = 1;
while ($siswa = mysqli_fetch_array($querySiswa)) {
    $pdf->Cell(10, 10, $noSiswa++, 1);
    $pdf->Cell(50, 10, $siswa['nama'], 1);
    $pdf->Cell(60, 10, $siswa['alamat'], 1);
    $pdf->Cell(30, 10, ucfirst($siswa['jenis_kelamin']), 1);
    $pdf->Cell(40, 10, $siswa['agama'], 1);
    $pdf->Ln();
}

$pdf->Output();
?>
