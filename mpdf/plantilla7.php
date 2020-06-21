<?php
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('images/logo.png', 10, 10, 50 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(200,50, 'Reporte de nuevas heramietnas',0,0,'C');
			$this->Ln(50);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>