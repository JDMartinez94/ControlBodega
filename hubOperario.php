<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="style.css" />
		<title>Welcome to InvenTools Control</title>

		<link rel="stylesheet" href="sweetalert/sweetalert2.css">
		<script src="sweetalert/sweetalert2.js"></script>
	</head>
	<body class="hub">
	<div id="icono">
			<a href="index.php?estado=cerrado">
			<img src="media/Inventool.png" alt="Icono de Inventools Control" id="icono"
			/></a>
		</div>

    <!--<div id="icono">
			<img
				src="media/Inventool.png"
				alt="Icono de Inventools Control"
				id="icono"
			/> hice el boton Inventools un cierre de sesion  -->



		<div id="menuHub">
			<div id="contenedorHub">
				<div id="prestamoOpe">
					<a href="prestamo.php">
						<img src="media/prestamo.png" alt="Icono de prestamo" /><br />
						Prestamo
					</a>
				</div>

				<div id="devolucionOpe">
					<a href="devolucion.php">
						<img
							src="media/devolucion.png"
							alt="Icono de devolucion de herramientas"
						/><br />
						Devolucion
					</a>
				</div>

				<div id="nuevasOpe">
					<a href="nuevasHerr.php">
						<img
							src="media/nuevaherr.png"
							alt="Icono de nuevas herramientas"
						/><br />
						Nuevas Herramientas
					</a>
				</div>

				<div id="danadaOpe">
					<a href="herrDanadas.php">
						<img
							src="media/herrdanada.png"
							alt="Icono de herramientas dañadas"
						/><br />
						Herramientas dañadas
					</a>
				</div>
			</div>
		</div>

		<?php
			if($_SESSION["user"]["id_rol"]==2)
			{
				$username = $_SESSION["user"]["nombre"];
				echo "<script>swal({title:'Exito', text:'Bienvenido(a): '+ '$username', type:'success'});</script>";
			}
			else
			{
				$username = $_SESSION["user"]["nombre"];
				echo "<script>swal({title:'Exito', text:'Se ha iniciado sesión de forma incorrecta, por favor intente de nuevo.', type:'error'}).then(function(){window.location = 'index.php'});</script>";
				//header("location:index.php");
			}
        ?> 
	</body>
</html>
