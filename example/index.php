<?php
use Proner\PhpPimaco\Pimaco;
use Proner\PhpPimaco\Tag;

require_once "../vendor/autoload.php";

$tag = new Tag();
$tag->p("TAG");
//$tag->p("TAG 1")->setSize(4)->b();
//$tag->p("TAG 1.1")->setSize(4)->br();
//$tag->p("TAG 1.2")->setSize(4)->align('right');

$tag2 = new Tag();
$tag2->p("");
//$tag2->p("TAG 2");

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
//dd($tag8);


$pimaco = new Pimaco('6182');
$pimaco->addTag($tag);
dd($pimaco->getTags()[0]->toArray());
echo "<pre>";
var_dump($pimaco->getTags()[0]->toArray());
echo "</pre>";
exit();
$pimaco->addTag($tag2);
$pimaco->addTag($tag3);
$pimaco->addTag($tag4);
$pimaco->addTag($tag5);
$pimaco->addTag($tag6);
$pimaco->addTag($tag7);
$pimaco->addTag($tag8);
//dd($pimaco);
$pimaco->render();
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

$mpdf=new mPDF('utf-8', array(215.9,279.4),24,null,$marginLeft,$marginRight,$marginTop);

//$mpdf->SetColumns(2);
//$mpdf->WriteHTML("<p>Some text</p>");
//$mpdf->AddColumn();
//$mpdf->WriteHTML("<p>next column</p>");
//
//$mpdf->SetColumns(1);
//$mpdf->WriteHTML("<p>Some text</p>");
//$mpdf->AddColumn();
//$mpdf->WriteHTML("<p>next column</p>");

$mpdf->WriteHTML("<div>a<br>b</div>");

//$mpdf->WriteHTML("<columns column-count='2' vAlign='J' column-gap='2'>");
//$mpdf->WriteHTML("<p>Some text</p>");
//$mpdf->WriteHTML("<p>column break</p>");
//$mpdf->WriteHTML("<p>next column</p>");
$mpdf->Output();