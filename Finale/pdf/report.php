
<?php

require('pdf/fpdf.php');

$conn=mysqli_connect('localhost','root','');
mysqli_select_db($conn,'testspogo1');


class PDF extends FPDF {
	function Header(){
		$this->SetFont('Arial','B',15);
		
		//dummy cell to put logo
		//$this->Cell(12,0,'',0,0);
		//is equivalent to:
		 $this->Cell(68);
		
		//put logo
		$this->Image('logo.jpeg',10,06,30);
		
		$this->Cell(68,20,'SPOGO STOCK REPORT',1,0,'C');
		
		//dummy cell to give line spacing
		//$this->Cell(0,6,'',0,1);
		//is equivalent to:
		$this->Ln(28);
		
		$this->SetFont('Arial','B','11');
		
		$this->SetFillColor(180,180,255);
		$this->SetDrawColor(180,180,255);
		$this->Cell(18,5,'Eq_ID',1,0,'',true);
		$this->Cell(90,5,'Equipment_Names',1,0,'',true);
		$this->Cell(10,5,'STK',1,0,'',true);
		$this->Cell(10,5,'CID',1,1,'',true);
		
		
	}
	function Footer(){
		
		
		
		//Go to 1.5 cm from bottom
		$this->SetY(1);
				
		$this->SetFont('Arial','',12);
		
		//width = 0 means the cell is extended up to the right margin
		$this->Cell(0,10,'Page '.$this->PageNo()." / {pages}",0,0,'C');
	}
}


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new PDF('P','mm','A4'); //use new class

//define new alias for total page numbers
$pdf->AliasNbPages('{pages}');

$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();



$pdf->SetFont('Arial','',10);
$pdf->SetDrawColor(180,180,255);

$query=mysqli_query($conn,"select * from tblequipments");
while($data=mysqli_fetch_array($query)){
	$pdf->Cell(18,5,$data['Eid'],1,0);
	$pdf->Cell(90,5,$data['Ename'],1,0);
	$pdf->Cell(10,5,$data['stock'],1,0);
	$pdf->Cell(10,5,$data['Cid'],1,1);
	
}



$pdf->SetFont('Arial','B',11);


$pdf->Cell(188, 8, 'REPORT DOWNLOAD DATE: ' .date("d/m/Y") , 1 ,0);


function Footer(){
	$this->Cell(188,1,'','T',1,'',true);
	$this->cell("D", date("d/m/Y").".pdf");
	
}

	
$pdf->Output();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Stock Report </title>
</head>

<body>
</body>
</html>