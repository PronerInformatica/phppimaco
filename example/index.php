<?php
use Proner\PhpPimaco\Pimaco;
use Proner\PhpPimaco\Tag;

require_once "../vendor/autoload.php";

$tag = new Tag();
$tag->p("TAG 1");
$tag->p("TAG 1.1");

$tag2 = new Tag();
$tag2->p("TAG 2");

$tag3 = new Tag();
$tag3->p("TAG 3");

$tag4 = new Tag();
$tag4->p("TAG 4");

$tag5 = new Tag();
$tag5->p("TAG 5");

$tag6 = new Tag();
$tag6->p("TAG 6");

$tag7 = new Tag();
$tag7->p("TAG 7");

$tag8 = new Tag();
$tag8->p("TAG 8");

$tag9 = new Tag();
$tag9->p("TAG 9");

$tag10 = new Tag();
$tag10->p("TAG 10");

$tag11 = new Tag();
$tag11->p("TAG 11");

$tag12 = new Tag();
$tag12->p("TAG 12");

$tag13 = new Tag();
$tag13->p("TAG 13");

$tag14 = new Tag();
$tag14->p("TAG 14");


$pimaco = new Pimaco('6182');
$pimaco->addTag($tag);
//$pimaco->addTag($tag2);
//$pimaco->addTag($tag3);
//$pimaco->addTag($tag4);
//$pimaco->addTag($tag5);
//$pimaco->addTag($tag6);
//$pimaco->addTag($tag7);
//$pimaco->addTag($tag8);
//$pimaco->addTag($tag9);
//$pimaco->addTag($tag10);
//$pimaco->addTag($tag11);
//$pimaco->addTag($tag12);
//$pimaco->addTag($tag13);
//$pimaco->addTag($tag14);
//$html = $pimaco->render();
//dd($html);
$pimaco->output();
exit();

//$pdf = new FPDF('P','mm',array('215.9','279.4'));
//$pdf->SetTopMargin(21.2);
//$pdf->SetLeftMargin(4);
//$pdf->SetRightMargin(4);
//$pdf->AddPage();
//
//$pdf->SetFont('Arial','B',16);
//$pdf->Cell(101.6,33.9,"Hello World! \r\n Diogo",1);
//$pdf->MultiCell(101.6,33.9,"Hello World! \n dIOGO",1);
//$pdf->Ln();
//
//$pdf->Output();

$marginLeft = 4.0;
$marginRight = 4.0;
$marginTop = 21.2;

//$mpdf=new mPDF('utf-8', array(215.9,279.4),12,0,$marginLeft,$marginRight,$marginTop,0,0,0);
//$mpdf->SetColumns(2);
//$mpdf->WriteHTML("<p style='width:101.6mm;height: 20.9mm; border: 1px solid #000;margin: 0mm;padding: 0mm;'>aa</p>");
//$mpdf->WriteHTML("<p style='width:101.6mm;height: 20.9mm; border: 1px solid #000;margin: 0mm;padding: 0mm;'>aa</p>");
//$mpdf->WriteHTML("<p style='width:101.6mm;height: 20.9mm; border: 1px solid #000;margin: 0mm;padding: 0mm;'>aa</p>");
//$mpdf->WriteHTML("<p style='width:101.6mm;height: 20.9mm; border: 1px solid #000;margin: 0mm;padding: 0mm;'>aa</p>");
//$mpdf->WriteHTML("<p style='width:101.6mm;height: 20.9mm; border: 1px solid #000;margin: 0mm;padding: 0mm;'>aa</p>");
//$mpdf->WriteHTML("<p style='width:101.6mm;height: 20.9mm; border: 1px solid #000;margin: 0mm;padding: 0mm;'>aa</p>");
//$mpdf->WriteHTML("<p style='width:101.6mm;height: 20.9mm; border: 1px solid #000;margin: 0mm;padding: 0mm;'>aa</p>");
//$mpdf->WriteHTML("<p style='width:101.6mm;height: 20.9mm; border: 1px solid #000;margin: 0mm;padding: 0mm;'>aa</p>");
//$mpdf->WriteHTML("<p style='width:101.6mm;height: 20.9mm; border: 1px solid #000;margin: 0mm;padding: 0mm;'>aa</p>");
//$mpdf->WriteHTML("<p style='width:101.6mm;height: 20.9mm; border: 1px solid #000;margin: 0mm;padding: 0mm;'>aa</p>");
//$mpdf->WriteHTML("<p style='width:101.6mm;height: 20.9mm; border: 1px solid #000;margin: 0mm;padding: 0mm;'>aa</p>");
//$mpdf->WriteHTML("<p style='width:101.6mm;height: 20.9mm; border: 1px solid #000;margin: 0mm;padding: 0mm;'>aa</p>");
//$mpdf->WriteHTML("<p style='width:101.6mm;height: 20.9mm; border: 1px solid #000;margin: 0mm;padding: 0mm;'>aa</p>");
//$mpdf->WriteHTML("<p style='width:101.6mm;height: 20.9mm; border: 1px solid #000;margin: 0mm;padding: 0mm;'>aa</p>");
//$mpdf->Output();
//exit();

$mpdf=new mPDF('utf-8',array(215.9,279.4),12,0,$marginLeft,$marginRight,$marginTop,0,0,0);
//$mpdf=new mPDF('utf-8','A4',12,0,$marginLeft,$marginRight,21.2,0,0,0);
$mpdf->WriteHTML("table{border-spacing: 5mm 0mm; padding: 0; margin: 0;}",1);
$mpdf->WriteHTML("tr{padding: 0; margin: 0;}",1);
$mpdf->WriteHTML("td{padding: 0; margin: 0; border: 1px solid #000; width:101.6mm; height: 20.9mm;}",1);

$mpdf->WriteHTML("<table><tr><td>aa</td><td>aa</td></tr></table>");
$mpdf->WriteHTML("<table><tr><td>aa</td><td>aa</td></tr></table>");
$mpdf->WriteHTML("<table><tr><td>aa</td><td>aa</td></tr></table>");
$mpdf->WriteHTML("<table><tr><td>aa</td><td>aa</td></tr></table>");
$mpdf->WriteHTML("<table><tr><td>aa</td><td>aa</td></tr></table>");
$mpdf->WriteHTML("<table><tr><td>aa</td><td>aa</td></tr></table>");
$mpdf->WriteHTML("<table><tr><td>aa</td><td>aa</td></tr></table>");
$mpdf->WriteHTML("<table><tr><td>aa</td><td>aa</td></tr></table>");
$mpdf->WriteHTML("<table><tr><td>aa</td><td>aa</td></tr></table>");
$mpdf->WriteHTML("<table><tr><td>aa</td><td>aa</td></tr></table>");
$mpdf->WriteHTML("<table><tr><td>aa</td><td>aa</td></tr></table>");
$mpdf->WriteHTML("<table><tr><td>aa</td><td>aa</td></tr></table>");
$mpdf->WriteHTML("<table><tr><td>aa</td><td>aa</td></tr></table>");
//$mpdf->Output();
//exit();

$mpdf=new mPDF('utf-8', array(215.9,279.4),12,0,$marginLeft,$marginRight,$marginTop,0,0,0);
//$mpdf = new mPDF();
//$mpdf->SetColumns(2,'J',0);
$mpdf->WriteHTML(".row{float:left; border: 1px solid blue;}",1);
$mpdf->WriteHTML(".tag1{width: 48%; float:left; padding: 0pt; margin: 0pt; border: 1px solid black;}",1);
$mpdf->WriteHTML(".tag2{width: 48%; float:right; padding: 0pt; margin: 0pt; border: 1px solid black;}",1);

$mpdf->WriteHTML("<div style='float:left; width:100px; height:100px; border: 1px solid black;'>Rp</div><div style='width:100px; height:100px; float:right; border: 1px solid black;'>100</div>");
$mpdf->WriteHTML("<div style='float:left; width:100px; height:100px; border: 1px solid black;'>Rp</div><div style='width:100px; height:100px; float:right; border: 1px solid black;'>100</div>");
$mpdf->WriteHTML("<div style='float:left; width:100px; height:100px; border: 1px solid black;'>Rp</div><div style='width:100px; height:100px; float:right; border: 1px solid black;'>100</div>");
$mpdf->WriteHTML("<div style='float:left; width:100px; height:100px; border: 1px solid black;'>Rp</div><div style='width:100px; height:100px; float:right; border: 1px solid black;'>100</div>");
$mpdf->WriteHTML("<div style='float:left; width:100px; height:100px; border: 1px solid black;'>Rp</div><div style='width:100px; height:100px; float:right; border: 1px solid black;'>100</div>");
$mpdf->WriteHTML("<div style='float:left; width:100px; height:100px; border: 1px solid black;'>Rp</div><div style='width:100px; height:100px; float:right; border: 1px solid black;'>100</div>");
$mpdf->WriteHTML("<div style='float:left; width:100px; height:100px; border: 1px solid black;'>Rp</div><div style='width:100px; height:100px; float:right; border: 1px solid black;'>100</div>");
$mpdf->WriteHTML("<div style='float:left; width:100px; height:100px; border: 1px solid black;'>Rp</div><div style='width:100px; height:100px; float:right; border: 1px solid black;'>100</div>");
$mpdf->WriteHTML("<div style='float:left; width:100px; height:100px; border: 1px solid black;'>Rp</div><div style='width:100px; height:100px; float:right; border: 1px solid black;'>100</div>");
$mpdf->WriteHTML("<div style='float:left; width:100px; height:100px; border: 1px solid black;'>Rp</div><div style='width:100px; height:100px; float:right; border: 1px solid black;'>100</div>");
//$mpdf->WriteHTML("<div style='float:right; border: 1px solid black;'>100</div>");
//$mpdf->WriteHTML("<table>");
//$mpdf->WriteHTML("<tr>");
//$mpdf->WriteHTML("</tr>");
//$mpdf->WriteHTML("</table>");
$mpdf->Output();
exit();



//$mpdf->WriteHTML(".tag{height: 20.9mm; border: 1px solid #000; padding: 0; margin: 0;}",1);
//$mpdf->WriteHTML("<tag class='tag'>aa</tag>");
//$mpdf->WriteHTML("<tag class='tag'>aa</tag>");

//$mpdf->WriteHTML("<p>next column</p>");
//
//$mpdf->SetColumns(1);
//$mpdf->WriteHTML("<p>Some text</p>");
//$mpdf->AddColumn();
//$mpdf->WriteHTML("<p>next column</p>");
//$mpdf->WriteHTML("<columns column-count='2' vAlign='J' column-gap='2'>");
//$mpdf->WriteHTML("<p>Some text</p>");
//$mpdf->WriteHTML("<p>column break</p>");
//$mpdf->WriteHTML("<p>next column</p>");
$mpdf->Output();