<?php 
require_once('../_fpdf/fpdf.php');


$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

for($i=1;$i<=10;$i++)
{
    $pdf->Cell(0,10,'hello world'.$i,1,1,'C');
    //$pdf -> ln(10);
}

$pdf->Output();

?>