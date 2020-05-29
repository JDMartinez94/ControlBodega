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
				<img
					src="media/Inventool.png"
					alt="Icono de Inventools Control"
					id="icono"
				/>
			</div>
			<div id="menu">
				<div id="opcion">
					<img
						src="media/prestamo.png"
						alt="prestamo"
						width="70px"
						height="70px"
						id="prestamo"
					/>
				</div>

				<div id="opcion">
					<img
						src="media/devolucion.png"
						alt="prestamo"
						width="70px"
						height="70px"
					/>
				</div>

				<div id="opcion">
					<img
						src="media/reportes.png"
						alt="prestamo"
						width="70px"
						height="70px"
					/>
				</div>

				<div id="activo">
					<img
						src="media/nuevopers.png"
						alt="prestamo"
						width="70px"
						height="70px"
					/>
				</div>

				<div id="opcion">
					<img
						src="media/nuevaherr.png"
						alt="prestamo"
						width="70px"
						height="70px"
					/>
				</div>

				<div id="opcion">
					<img
						src="media/herrdanada.png"
						alt="prestamo"
						width="70px"
						height="70px"
					/>
				</div>
			</div>
		</div>
		<div id="modal">
		<div style="width:20%; margin:auto; margin-top: 3.5%; background-color: white; padding: 10px;">
		<form>			
			<div class="form-group">
				<label for="nomEmp">Nombre del nuevo empleado</label>
				<input type="text" class="form-control" id="nomEmp">
			</div>
			<div class="form-group">
				<label for="dir">Direccion del empleado</label>
				<input type="text" class="form-control" id="dir">
			</div>
			<div class="form-group">
				<label for="tel">Telefono</label>
				<input type="text" class="form-control" id="tel">
			</div>
			<hr>
			<div class="form-group">
				<label for="nuevoUser">Nombre de usuario asignado</label>
				<input type="text" class="form-control" id="nuevoUser">
			</div>
			<div class="form-group">
				<label for="contraInic">Contraseña inicial</label>
				<input type="text" class="form-control" id="contraInic" value="contra2020" readonly>
			</div>
			<label for="nivelAccess">Nivel de acceso del empleado</label>
			<select class="form-control">
			<option>Seleccione una opcion</option>
			<option>Admin</option>
			<option>Regular</option>			
			</select>
			<br>
			<button type="submit" class="btn btn-primary">Crear registro</button>
			</form>
			</div>
		</div>
	</body>
</html>
