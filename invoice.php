<?php
//Variables - we are using the name="" attribute from the <input> tags
$vcustomername = $_POST['customername'];
$vaddress1 = $_POST['address1'];
$vaddress2 = $_POST['address2'];
$vproduct = $_POST['product'];
$vprice = $_POST['price'];
$vquantity = $_POST['quantity'];
$vmrp = $_POST['mrp'];
$vdiscount = $_POST['discount'];
$vtotal = $_POST['total'];

//call the FPDF library
require('fpdf17/fpdf.php');

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm','A4');
//add new page
$pdf->AddPage();
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5,'Natura Hills',0,0);
$pdf->Cell(59 ,5,'Invoice',0,1);//end of line

$pdf->Cell(189 ,5,'',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'2nd floor Golwala apartment,',0,0);
$pdf->Cell(25 ,5,'Invoice no',0,0);
$pdf->Cell(34 ,5,'1234567',0,1);//end of line

$pdf->Cell(130 ,5,'Nehru road,Santacruz East',0,0);
$pdf->Cell(25 ,5,'Date',0,0);
$pdf->Cell(34 ,5,date("d/m/Y"),0,1);//end of line


$pdf->Cell(130 ,5,'Mumbai,India',0,0);
$pdf->Cell(25 ,5,'Time',0,0);
$pdf->Cell(34 ,5,date("h:i:sa"),0,1);//end of line

$pdf->Cell(130 ,5,'Phone +917977470361',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$vcustomername,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$vaddress1,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$vaddress2,0,1);

// $pdf->Cell(10 ,5,'',0,0);
// $pdf->Cell(90 ,5,'pravin phone',0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','',12);

$pdf->Cell(39,7,'Product',1,0);
$pdf->Cell(30 ,7,'price',1,0);
$pdf->Cell(30 ,7,'quantity',1,0);
$pdf->Cell(30 ,7,'mrp',1,0);
$pdf->Cell(30 ,7,'discount',1,0);
$pdf->Cell(30 ,7,'Total',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(39,7,$vproduct,1,0);
$pdf->Cell(30 ,7,$vprice,1,0,'R');
$pdf->Cell(30 ,7,$vquantity,1,0,'R');
$pdf->Cell(30 ,7,$vmrp,1,0,'R');
$pdf->Cell(30 ,7,$vdiscount,1,0,'R');
$pdf->Cell(30 ,7,$vtotal,1,1,'R');
//end of line

$pdf->Cell(189 ,5,'',0,1);//end of line

//summary
$pdf->Cell(129 ,7,'',0,0);
$pdf->Cell(30 ,7,'Subtotal',0,0);
$pdf->Cell(30 ,7,$vtotal,0,1,'R');//end of line

// $pdf->Cell(130 ,5,'',0,0);
// $pdf->Cell(25 ,5,'Taxable',0,0);
// $pdf->Cell(30 ,5,'0',1,1,'R');//end of line

// $pdf->Cell(130 ,5,'',0,0);
// $pdf->Cell(25 ,5,'Tax Rate',0,0);
// $pdf->Cell(30 ,5,'10%',1,1,'R');//end of line

// $pdf->Cell(130 ,5,'',0,0);
// $pdf->Cell(25 ,5,'Total Due',0,0);
// $pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line

//output the result
$pdf->Output();
?>