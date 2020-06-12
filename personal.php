<?php
session_start();
$acceso = $_SESSION["user"]["id_rol"];
include("PHP/formulas.php");
include("PHP/DAOempleado.php");
include("PHP/DAOusuario.php");
$daoEmpleado = new DAOempleado();
$empleado = new empleado();
$daoUsuario = new DAOusuario();
$usuario = new usuario();
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
		<title>Personal</title>
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
		<?php
		if(isset($_REQUEST["empleado"])){
			$empleado->setNombre_empleado($_REQUEST["nomEmp"]);
			$empleado->setDireccion($_REQUEST["dir"]);
			$empleado->setTelefono($_REQUEST["tel"]);
			$daoEmpleado->insertar($empleado);
			echo $daoEmpleado->getEmpleado();
		}
		?>
    <div style="width:90%; margin: auto; background-color: white; padding: 15px; display: grid; grid-template-columns: 50% 50%; grid-template-rows: 1fr">
        <div style=" align-self: center; justify-self: center;width:90%">	
        <form method="POST" action="#">
                    <h5> Registro de empleado nuevo</h5><br>
			<div class="form-group">
				<label for="nomEmp">Nombre del nuevo empleado</label>
				<input type="text" class="form-control" name="nomEmp">
			</div>
			<div class="form-group">
				<label for="dir">Direccion del empleado</label>
				<input type="text" class="form-control" name="dir">
			</div>
			<div class="form-group">
				<label for="tel">Telefono</label>
				<input type="text" class="form-control" name="tel">
			</div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="empleado">Crear registro</button>
		</form>
        </div>

        <div style=" align-self: center; justify-self: center;width:90%">
                <form method="POST" action="#">
                <h5>Crear un usuario</h5><br>
			<div class="form-group">
				<label for="nuevoUser">Nombre de usuario asignado</label>
				<input type="text" class="form-control" name="nuevoUser">
			</div>
			<div class="form-group">
				<label for="empID">ID del empleado</label>
				<input type="text" class="form-control" name="empID">
			</div>
			<div class="form-group">
				<label for="contraInic">Contraseña inicial</label>
				<input type="text" class="form-control" name="contraInic" value="contra2020" readonly>
			</div>
			<div class="form-group">
			<label for="nivelAccess">Nivel de acceso del empleado</label>
                        <select class="form-control" name="rol">
			<option>Seleccione una opcion</option>
                        <option value="1">Admin</option>
                        <option value="2">Regular</option>			
			</select>
                        </div>
			<br>
                        <button type="submit" class="btn btn-primary" name="usuario">Crear registro</button>
                </form>	
        </div>        
    </div>                                    
                    
</div>
<?php
if(isset($_REQUEST["usuario"])){
    $usuario->setNombre_usuario($_REQUEST["nuevoUser"]);
    $usuario->setId_empleado($_REQUEST["empID"]);
    $usuario->setContrasena($_REQUEST["contraInic"]);
    $usuario->setId_rol($_REQUEST["rol"]);
    $daoUsuario->insertar($usuario);
}
?>            
            
</body>
</html>
