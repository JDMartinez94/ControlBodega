<?php
session_start();
$acceso = $_SESSION["user"]["id_rol"];
include("PHP/formulas.php");
include("PHP/DAOPrestamo.php");
$dao = new DAOPrestamo();
$prestamo = new registro();

date_default_timezone_set('America/El_Salvador');


$id = $_SESSION["user"]["id_usuario"];

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
		<title>Prestamos</title>
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
			<div style="width:90%; margin:auto; background-color: white; padding: 15px;">
			<form>
				<div class="form-group">
					<label for="tipoTransac">Tipo de transaccion</label>
									<input class="form-control" type="text" placeholder="Prestamo" readonly name="transac">
				</div>
				<div class="form-group">
					<label for="codigoHerr">Codigo de la herramienta</label>
					<input type="text" class="form-control" name="codigoHerr">
				</div>
				<div class="form-group">
					<label for="idEmp">Codigo del empleado prestamista</label>
					<input type="text" class="form-control" name="idEmp">
				</div>
				<br>
							<button type="submit" class="btn btn-primary" name="crearReg">Crear registro</button>
				</form>
				</div>
				<?php
				if(isset($_REQUEST["crearReg"])){
					$id_herr = $_REQUEST["codigoHerr"];
					$prestamo->setFecha_registro(date("Y-m-d H:i:s"));
					$prestamo->setId_tipo_registro("1");
					$prestamo->setCodigo_herramienta($id_herr);
					$prestamo->setId_empleado($_REQUEST["idEmp"]);
					$prestamo->setId_usuario($id);
					$dao->registrar($prestamo);	
					echo $dao->getRegistro($id_herr);
				}
				?>
		</div>



</body>
</html>
