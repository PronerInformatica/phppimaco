<?php
use Proner\PhpPimaco\Printer;

require_once "../vendor/autoload.php";

$printer = new Printer('6182');

$printer->addTag('aaaaa')->setStyle('I')->setSize(20);
$printer->addTag('bbbbb')->setStyle('I')->setSize(10);
//echo "<pre>";
//var_dump($printer);
//echo "</pre>";
$printer->render();
exit();

$pdf = new FPDF('P','mm',array('215.9','279.4'));
$pdf->SetTopMargin(21.2);
$pdf->SetLeftMargin(4);
$pdf->SetRightMargin(4);
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(101.6,33.9,'Hello World!',1);
$pdf->Cell(101.6,33.9,'Hello World!',1);
$pdf->Ln();
$pdf->SetFont('Times','B',16);
$pdf->Cell(101.6,33.9,'Hello World!',1);
$pdf->Cell(101.6,33.9,'Hello World!',1);
$pdf->Ln();
$pdf->Cell(101.6,33.9,'Hello World!',1);
$pdf->Cell(101.6,33.9,'Hello World!',1);
$pdf->Ln();
$pdf->Cell(101.6,33.9,'Hello World!',1);
$pdf->Cell(101.6,33.9,'Hello World!',1);
$pdf->Ln();
$pdf->Cell(101.6,33.9,'Hello World!',1);
$pdf->Cell(101.6,33.9,'Hello World!',1);
$pdf->Ln();
$pdf->Cell(101.6,33.9,'Hello World!',1);
$pdf->Cell(101.6,33.9,'Hello World!',1);
$pdf->Ln();
$pdf->Cell(101.6,33.9,'Hello World!',1);
$pdf->Cell(101.6,33.9,'Hello World!',1);
$pdf->Ln();
$pdf->Output();