<?php

require('fpdf.php');

// $pdf = new FPDF('P','mm','A4');
$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

// $pdf->Cell(40,10,'Hello World!');
// $pdf->Cell(60,10,'Powered by FPDF.',0,1,'C');
// Insert a logo in the top-left corner at 300 dpi
$pdf->Image('./template.jpg', 0, 0, 297, 210);
// $pdf->Cell(80);
$pdf->SetXY(0, 100);
// $pdf->Cell(0,0,'Hello World!');
$pdf->SetFont('Arial','B',20);
$pdf->Cell(297, 10,'YOBER MARCIAL LOPEZ URBANO', 0, 0,'C');
$pdf->AddPage();

$pdf->Cell(40,10,'Hello World!');
// Insert a dynamic image from a URL
// $pdf->Image('http://chart.googleapis.com/chart?cht=p3&chd=t:60,40&chs=250x100&chl=Hello|World', 0, 0, 0, 0, 'PNG');
$pdf->Output();






