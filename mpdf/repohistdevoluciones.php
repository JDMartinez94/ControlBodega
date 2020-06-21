<?php
	include 'plantilla5.php';
	require 'conexion.php';
	
	$query = "select r.id_registro, r.fecha_registro, tr.tipo_registro, r.codigo_herramienta, h.nombre_herramienta, r.id_empleado, e.nombre_empleado, r.id_usuario, u.nombre_usuario from registro r join tipo_registro tr on tr.id_tipo_registro = r.id_tipo_registro join herramienta h on h.codigo_herramienta = r.codigo_herramienta join empleado e on e.id_empleado = r.id_empleado join usuario u on u.id_usuario = r.id_usuario where r.id_tipo_registro = 2;";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF('L','mm','legal');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(20,6,'ID Registro',1,0,'',1);
	$pdf->Cell(35,6,'Fecha de registro',1,0,'',1);
	$pdf->Cell(30,6,'Tipo de registro',1,0,'',1);
	$pdf->Cell(40,6,'Codigo de herramienta',1,0,'',1);
	$pdf->Cell(40,6,'Nombre de la heramienta',1,0,'',1);
	$pdf->Cell(40,6,'ID empleado prestamista',1,0,'',1);
	$pdf->Cell(50,6,'Nombre Empleado Prestamista',1,0,'',1);
	$pdf->Cell(40,6,'ID Usuario que registra',1,0,'',1);
	$pdf->Cell(35,6,'Usuario que registro',1,0,'',1);
	$pdf->ln();

	$pdf->SetFont('Arial','',9);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(20,6,utf8_decode($row['id_registro']),1,0,'',0);
		$pdf->Cell(35,6,$row['fecha_registro'],1,0,'',0);
		$pdf->Cell(30,6,utf8_decode($row['tipo_registro']),1,0,'',0);
		$pdf->Cell(40,6,utf8_decode($row['codigo_herramienta']),1,0,'',0);
		$pdf->Cell(40,6,utf8_decode($row['nombre_herramienta']),1,0,'',0);
		$pdf->Cell(40,6,utf8_decode($row['id_empleado']),1,0,'',0);
		$pdf->Cell(50,6,utf8_decode($row['nombre_empleado']),1,0,'',0);
		$pdf->Cell(40,6,utf8_decode($row['id_usuario']),1,0,'',0);
		$pdf->Cell(35,6,utf8_decode($row['nombre_usuario']),1,0,'',0);
		$pdf->ln();

	}
	$pdf->Output();
?>