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
	</head>
	<body class="hub">
	   <div id="icono">
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
				<div id="prestamo">
					<a href="prestamo.php">
						<img src="media/prestamo.png" alt="Icono de prestamo" /><br />
						Prestamo
					</a>
				</div>

				<div id="reportes">
					<a href="reportes.php">
						<img src="media/reportes.png" alt="Icono de reportes" /><br />
						Reportes
					</a>
				</div>

				<div id="personal">
					<a href="personal.php">
						<img
							src="media/nuevopers.png"
							alt="Icono de nuevo personal"
						/><br />
						Personal Nuevo
					</a>
				</div>

				<div id="devolucion">
					<a href="devolucion.php">
						<img
							src="media/devolucion.png"
							alt="Icono de devolucion de herramientas"
						/><br />
						Devolucion
					</a>
				</div>

				<div id="nuevas">
					<a href="nuevasHerr.php">
						<img
							src="media/nuevaherr.png"
							alt="Icono de nuevas herramientas"
						/><br />
						Nuevas Herramientas
					</a>
				</div>

				<div id="danada">
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
	</body>
</html>
