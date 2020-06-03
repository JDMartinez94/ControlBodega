<?php
session_start();
$acceso = $_SESSION["user"]["id_rol"];
include("PHP/formulas.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />		
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">		
		<link rel="stylesheet" href="styleOpciones.css">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<title>Herramientas Dañadas</title>
	</head>
	<body>
    <div id="header">
	    <div id="icono">
			<a href="index.php?estado=cerrado">
			<img src="media/Inventool.png" alt="Icono de Inventools Control" id="icono"
			/></a>
		</div>
			<div id="menu">
				<?php
				menu($acceso);
				?>
			</div>
		</div>

		<div id="modal">			
		<div style="width:90%; margin:auto; margin-top: 12%; background-color: white; padding: 10px;">
		<form>
			<div class="form-group">
				<label for="codigoHerr">Codigo de la herramienta</label>
				<input type="text" class="form-control" id="codigoHerr">
			</div>
			<div class="form-group">
				<label for="fechaDano">Fecha de reporte de daño</label>
				<input type="date" class="form-control" id="fechaDano">				
			</div>			
			<br>
			<button type="submit" class="btn btn-primary">Crear registro</button>
			</form>		
		</div>
		</div>
	</body>
</html>
