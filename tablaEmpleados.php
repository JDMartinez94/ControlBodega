<?php
session_start();
$acceso = $_SESSION["user"]["id_rol"];
include("PHP/formulas.php");
include("PHP/DAOreportes.php");
$reporte = new DAOreportes();
$daoEmp = new DAOempleado();
$empleado = new empleado();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>        
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <title>Modificar registros de empelados</title>
<script>
function cargarEmpleado(id, nombre, direc, tel){
    document.tablaEmpleado.idEmp.value=id;
    document.tablaEmpleado.nombreEmp.value=nombre;
    document.tablaEmpleado.dir.value=direc;
    document.tablaEmpleado.tel.value=tel;
}
</script>

</head>
<body>       
<div style=" width: 90%; height: 90%; margin: auto; padding: 10px; text-align: center">
<br>
<div style=" margin: auto; width: fit-content; text-align: right">
<form action="#" method="POST" name="tablaEmpleado">
<label for="idEmp">ID empleado</label>
<input type="text" name="idEmp" id="idEmp" />
<br>
<label for="nombreEmp">Nombre del empleado</label>
<input type="text" name="nombreEmp" id="nombreEmp" />
<br>
<label for="dir">Direccion</label>
<input type="text" name="dir" id="dir" />
<br>
<label for="tel">Telefono</label>
<input type="text" name="tel" id="tel" />
</div>
<br>
<input type="submit" class="btn btn-secondary" value="Modificar" name="modificarEmp"/>
<input type="submit" class="btn btn-danger" value="Eliminar" name="eliminarEmp"/>
</form>
<br>
<?php
if(isset($_REQUEST["eliminarEmp"])){
    $id_empleado = $_REQUEST["idEmp"];
    $daoEmp->eliminar($id_empleado);
    echo $reporte->personal();
}elseif (isset($_REQUEST["modificarEmp"])){
    $empleado->setNombre_empleado($_REQUEST["nombreEmp"]);
    $empleado->setDireccion($_REQUEST["dir"]);
    $empleado->setTelefono($_REQUEST["tel"]);
    $id_empleado = $_REQUEST["idEmp"];
    $daoEmp->cambiar($empleado, $id_empleado);
    echo $reporte->personal();
}else{
 echo $reporte->personal();
}
?>
</div>
</body>
</html>