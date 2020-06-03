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
		<title>Nuevas herramientas</title>
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
		<div style="width:90%; margin:auto; margin-top: 9%; background-color: white; padding: 10px;">
		<form>
			<div class="form-group">
				<label for="fechaIngreso">Fecha de ingreso</label>
				<input type="date" class="form-control" id="fechaIngreso">				
			</div>
			<div class="form-group">
				<label for="nombreHerr">Nombre de la nueva herramienta</label>
				<input type="text" class="form-control" id="nomEnombreHerrmp">
			</div>
			<label for="nivelAccess">Categoria de la herramienta</label>
			<select class="form-control">
			<option>Seleccione una opcion</option>
			<option>Construcción</option>
			<option>Agrícola</option>
			<option>Corte</option>
			<option>Jardinería</option>
			<option>Electrónica</option>
			<option>Carpintería</option>
			<option>Cantería</option>
			<option>Manual</option>
			<option>Portátil</option>
			</select>
<br>
			<label for="nivelAccess">Estado de la herramienta</label>
			<select class="form-control">
			<option>Seleccione una opcion</option>
			<option>Nueva</option>
			<option>Usada</option>
			</select>

			<br>
			<button type="submit" class="btn btn-primary">Crear registro</button>
			</form>		
		</div>
	</body>
</html>
