<?php

// ambil library dan koneksi
require_once 'database/koneksi.php';
require_once 'library_fpdf/fpdf.php';
require_once 'functions/func.php';

// Setting awal
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// untuk header
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'DATA KAS PT TIDAK INDAH',0,0,'C');

// table head
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(10,9,'No',1,0,'C');
$pdf->Cell(50,9,'Hari',1,0,'C');
$pdf->Cell(75,9,"Uang",1,0,'C');
$pdf->Cell(55,9,"Tanggal",1,0,'C');

// setting data dalam table
$pdf->Cell(10,9,'',0,1);
$pdf->SetFont('Times', '', 11);

// Ambil Data
$query = "SELECT * FROM kas ORDER BY tanggal DESC";
$dataKas = mysqli_query($conn, $query);
$no = 1;

// Mulai Looping Data
foreach($dataKas as $data){
    $pdf->Cell(10,8,$no++,1,0,'C');
    $pdf->Cell(50,8,$data['hari'],1,0);
    $pdf->Cell(75,8,rupiah($data['uang']),1,0);
    $pdf->Cell(55,8,$data['tanggal'],1,1);
}

// Hasil convert ke pdf
$pdf->Output();