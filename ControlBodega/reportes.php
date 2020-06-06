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
		<title>Reportes</title>
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
			<div style="width:90%; height:90%; margin:auto; margin-top: 2%; background-color: white; padding: 10px;">
			<button type="button" class="btn btn-warning">Herramientas según categoría</button>
			<button type="button" class="btn btn-dark">Herramientas defectuosas</button>
			<button type="button" class="btn btn-warning">Herramientas nuevas</button>
			<button type="button" class="btn btn-dark">Herramientas en uso</button>
			<button type="button" class="btn btn-warning">Herramientas disponibles</button>
			<button type="button" class="btn btn-dark">Herramientas prestadas por persona</button>
			<button type="button" class="btn btn-success">historial general de préstamos</button>
<br>
<hr>
			
				<form>
					<div class="form-row align-items-center">
					<div class="col-auto">
					<label for="start">Obtener datos desde</label>
					<input type="date" class="form-control" id="start">				
					</div>
					<div class="col-auto">
					<label for="end">Hasta</label>
					<input type="date" class="form-control" id="end">
					</div>
					</div>
				</form>
			
		</div>		
		</div>
	</body>
</html>