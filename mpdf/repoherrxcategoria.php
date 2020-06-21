<?php
	include 'plantilla4.php';
	require 'conexion.php';
	
	$query = "Select 'h.codigo_herramienta', 'h.fecha_ingreso', 'h.nombre_herramienta', 'c.nombre_categoria', 'u.status_uso', 'p.status_prestamo', 'cd.condicion' from herramienta h join categoria c on 'c.id_categoria' = 'h.id_categoria' join status_uso u on 'u.id_status_uso' = 'h.id_status_uso' join status_prestamo p on 'p.id_status_prestamo' = 'h.id_status_prestamo' join condicion cd on 'cd.id_condicion' = 'h.id_condicion' where 'c.nombre_categoria' like 'p_nombre_categoria';";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF('L','mm','letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(40,6,'Codigo de la herramienta',1,0,'',1);
	$pdf->Cell(35,6,'Fecha de Ingreso',1,0,'',1);
	$pdf->Cell(41,6,'Nombre de la Herramienta',1,0,'',1);
	$pdf->Cell(47,6,'categoria',1,0,'',1);
	$pdf->Cell(25,6,'Estado de uso',1,0,'',1);
	$pdf->Cell(35,6,'Estado de prestamo',1,0,'',1);
	$pdf->Cell(25,6,'Condicion',1,0,'',1);
	$pdf->ln();

	$pdf->SetFont('Arial','',9);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(40,6,utf8_decode($row['h.codigo_herramienta']),1,0,'',0);
		$pdf->Cell(35,6,$row['h.fecha_ingreso'],1,0,'',0);
		$pdf->Cell(41,6,utf8_decode($row['h.nombre_herramienta']),1,0,'',0);
		$pdf->Cell(47,6,utf8_decode($row['c.nombre_categoria']),1,0,'',0);
		$pdf->Cell(25,6,utf8_decode($row['u.status_uso']),1,0,'',0);
		$pdf->Cell(35,6,utf8_decode($row['p.status_prestamo']),1,0,'',0);
		$pdf->Cell(25,6,utf8_decode($row['cd.condicion']),1,0,'',0);
		$pdf->ln();

	}
	$pdf->Output();
?>