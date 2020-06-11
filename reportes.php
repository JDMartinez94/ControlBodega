<?php
session_start();
$acceso = $_SESSION["user"]["id_rol"];
include("PHP/formulas.php");
include ("PHP/DAOreportes.php");

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
				<div style="width:90%; height:90%; margin:auto; background-color: white; padding: 10px">
					<div style="width:90%; height:90%; margin:auto; padding: 10px; text-align: center">
                                            <button type="button" class="btn btn-dark" name="herrDef">Herramientas defectuosas</button>
						<button type="button" class="btn btn-warning">Herramientas nuevas</button>
						<button type="button" class="btn btn-dark">Herramientas en uso</button>
						<button type="button" class="btn btn-warning">Herramientas disponibles</button>
						<hr>
						<form action="" method="POST">
						<input type="text" name="idEmpleado" id="idEmpleado">
						<input type="submit" class="btn btn-dark" value="Herramientas prestadas por persona" name="repPrest">
						<br><br>
						<input type="text" name="categoriaHerr" id="categoriaHerr">						
						<input type="submit" class="btn btn-warning" value="Herramientas según categoría" name="herrCat">
						</form>
						<hr>
						<button type="button" class="btn btn-success">historial general de préstamos</button>
					</div>
				</div>
			</div>

<?php
if (isset($_REQUEST["herrDef"])){
    $dao->defectuosas();
}



?>


	</body>
</html>
