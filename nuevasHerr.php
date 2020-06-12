<?php
session_start();
$acceso = $_SESSION["user"]["id_rol"];
include("PHP/formulas.php");
include("PHP/DAOherramienta.php");
$dao = new DAOherramienta();
$herramienta = new herramienta();

date_default_timezone_set('America/El_Salvador');

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
		<div style="width:90%; margin:auto; background-color: white; padding: 30px;">
                    <form method="POST" action="#">
			<div class="form-group">
				<label for="nombreHerr">Nombre de la nueva herramienta</label>
				<input type="text" class="form-control" name="nombreHerr">
			</div>
			<label for="nivelAccess">Categoria de la herramienta</label>
			<select class="form-control" name="categoria">
			<option>Seleccione una opcion</option>
			<option value="1">Construcción</option>
			<option value="2">Agrícola</option>
			<option value="3">Corte</option>
			<option value="4">Jardinería</option>
			<option value="5">Electrónica</option>
			<option value="6">Carpintería</option>
			<option value="7">Cantería</option>
			<option value="8">Manual</option>
			<option value="9">Portátil</option>
			</select>
                        
                         <input type="hidden" name="estadoprestamo" value="1">
                         <input type="hidden" name="condicion" value="1">
						 <input type="hidden" name="statusUso" value="1">                       
<br>
			<!--<label for="nivelAccess">Estado de la herramienta</label>
                        <select class="form-control" name="estado">
			<option>Seleccione una opcion</option>
                        <option value="1">Nueva</option>
                        <option value="2">Usada</option>
			</select>-->

			<br>
                        <button type="submit" class="btn btn-primary" name="registro" value="submit">Crear registro</button>
			</form>		
		</div>
                    
<?php
if(isset($_REQUEST["registro"])){
        
    $herramienta->setFecha_ingreso(date("Y-m-d H:i:s"));
    $herramienta->setNombre_herramienta($_REQUEST["nombreHerr"]);
    $herramienta->setId_categoria($_REQUEST["categoria"]);
    $herramienta->setId_status_uso($_REQUEST["statusUso"]);
    $herramienta->setId_status_prestamo($_REQUEST["estadoprestamo"]);
    $herramienta->setId_condicion($_REQUEST["condicion"]);
    $dao->insertar($herramienta);
}
?>
                    
</body>
</html>
