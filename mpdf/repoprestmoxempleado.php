<?php
	include 'plantilla8.php';
	require 'conexion.php';
	
	$query = "select r.id_registro, r.fecha_registro, tp.tipo_registro, h.nombre_herramienta, e.nombre_empleado, u.nombre_usuario
    from registro r join tipo_registro tp on tp.id_tipo_registro = r.id_tipo_registro join herramienta h on h.codigo_herramienta = r.codigo_herramienta join empleado e on e.id_empleado = r.id_empleado join usuario u on u.id_usuario = r.id_usuario
    where r.id_tipo_registro = 1;";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF('L','mm','letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(40,6,'ID Registro',1,0,'',1);
	$pdf->Cell(35,6,'Fecha de Registro',1,0,'',1);
	$pdf->Cell(41,6,'Tipo de Registro',1,0,'',1);
	$pdf->Cell(47,6,'Nombre de la Herramienta',1,0,'',1);
	$pdf->Cell(45,6,'Nombre de Empleado',1,0,'',1);
	$pdf->Cell(35,6,'Nombre de Usuario',1,0,'',1);
	$pdf->ln();

	$pdf->SetFont('Arial','',9);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(40,6,utf8_decode($row['id_registro']),1,0,'',0);
		$pdf->Cell(35,6,$row['fecha_registro'],1,0,'',0);
		$pdf->Cell(41,6,utf8_decode($row['tipo_registro']),1,0,'',0);
		$pdf->Cell(47,6,utf8_decode($row['nombre_herramienta']),1,0,'',0);
		$pdf->Cell(45,6,utf8_decode($row['nombre_empleado']),1,0,'',0);
		$pdf->Cell(35,6,utf8_decode($row['nombre_usuario']),1,0,'',0);
		$pdf->ln();

	}
	$pdf->Output();
?>