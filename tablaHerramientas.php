<?php
session_start();
$acceso = $_SESSION["user"]["id_rol"];
include ("PHP/DAOreportes.php");
include ("PHP/DAOherramienta.php");
$reporte = new DAOreportes();
$daoHerr = new DAOherramienta();
$herramienta = new herramienta();

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>        
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <title>Modificar registros de Herramientas</title>
<script>
function cargarHerramienta(id, fecha, herramienta, Categoria, estado, prestamo, condicion){
    document.tablaHerramienta.idherramienta.value=id;
    document.tablaHerramienta.fecha.value=fecha;
    document.tablaHerramienta.nombreHerr.value=herramienta;
    document.tablaHerramienta.idCat.value=Categoria;
    document.tablaHerramienta.idEsta.value=estado;
    document.tablaHerramienta.idPrest.value=prestamo;
    document.tablaHerramienta.idCond.value=condicion;
}
</script>

</head>
<body>       
<div style=" width: 90%; height: 90%; margin: auto; padding: 10px; text-align: center">
<br>
<div style=" margin: auto; width: fit-content; text-align: right">
<form action="" method="POST" name="tablaHerramienta">
<label for="idherramienta">Codigo herramienta</label>
<input type="text" name="idherramienta" id="idherramienta" />
<br>
<label for="fecha">Fecha de ingreso</label>
<input type="text" name="fecha" id="fecha" />
<br>
<label for="nombreHerr">Nombre de herramienta</label>
<input type="text" name="nombreHerr" id="nombreHerr" />
<br>
<label for="idCat">ID Categoria</label>
<input type="text" name="idCat" id="idCat" />
<br>
<label for="idEsta">ID estado de uso</label>
<input type="text" name="idEsta" id="idEsta" />
<br>
<label for="idPrest">ID estado de prestamo</label>
<input type="text" name="idPrest" id="idPrest" />
<br>
<label for="idCond">ID condicion</label>
<input type="text" name="idCond" id="idCond" />
</div>
<br>
<input type="submit" class="btn btn-secondary" value="Modificar" name="modificarHerr"/>
<input type="submit" class="btn btn-danger" value="Eliminar" name="eliminarHerr"/>
</form>
<br>
<?php
if(isset($_REQUEST["eliminarHerr"])){
    $codigo_herramienta = $_REQUEST["idherramienta"];
    $daoHerr->eliminar($codigo_herramienta);
    echo $reporte->herramientas();
}elseif (isset($_REQUEST["modificarHerr"])){
    $herramienta->setFecha_ingreso($_REQUEST["fecha"]);
    $herramienta->setNombre_herramienta($_REQUEST["nombreHerr"]);
    $herramienta->setId_categoria($_REQUEST["idCat"]);
    $herramienta->setId_status_uso($_REQUEST["idEsta"]);
    $herramienta->setId_status_prestamo($_REQUEST["idPrest"]);
    $herramienta->setId_condicion($_REQUEST["idCond"]);
    $codigo_herramienta = $_REQUEST["idherramienta"];
    $daoHerr->cambiar($herramienta, $codigo_herramienta);
    echo $reporte->herramientas();
}else{
 echo $reporte->herramientas();
}
?>
</div>
</body>
</html>