<?php
session_start();
$acceso = $_SESSION["user"]["id_rol"];
include("PHP/formulas.php");
include("PHP/DAOreportes.php");
$reporte = new DAOreportes();
$empleado = new DAOempleado();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
        <link rel="stylesheet" href="styleOpciones.css" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <title>Reportes</title>
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
		<div id="header">
			<div id="icono">
				<a href="index.php?estado=cerrado">
				<img src="media/Inventool.png" alt="Icono de Inventools Control" id="icono"/></a>
			</div>
			<div id="menu">
				<?php
				menu($acceso);
				?>
			</div>
        </div>        
            <div id="modal">
            <div style=" width: 90%; height: 90%; margin: auto; background-color: white; padding: 10px;">
                <div style="width: 90%; height: 90%; margin: auto; padding: 10px; text-align: center;">
                    <form action="#" method="POST">
                        <input type="submit" class="btn btn-dark" value="Herramientas defectuosas" name="herrDef">
                        <input type="submit" class="btn btn-warning" value="Herramientas nuevas" name="herrNuev">
                        <input type="submit" class="btn btn-dark" value="Herramientas en uso" name="herrUso">
                        <input type="submit" class="btn btn-warning" value="Herramientas disponibles" name="herrDisp">
                            <hr />
                            <input type="text" name="txtnomEmpleado" id="txtnomEmpleado" placeholder="Nombre de Empleado" />
                            <input type="submit" class="btn btn-dark" value="Prestamos por Empleado" name="repPrest"/>
                            <br /><br />
                            <input type="text" name="txtnomCategoria" id="txtnomCategoria" placeholder="Nombre de Categoría"  />
                            <input type="submit" class="btn btn-warning" value="Herramientas por categoría" name="herrCat"/>					
                <hr />
                <input type="submit" class="btn btn-success" value="Historial general de préstamos" name="histGeneral"/>
                <input type="submit" class="btn btn-success" value="Historial general de devoluciones" name="histGeneral2"/>
                </form>
                <hr />
                <a onclick="window.open('tablaHerramientas.php','_blank','location=yes,height=570,width=1300,scrollbars=yes,status=yes');" ><button class="btn btn-primary">Modificar herramientas</button></a>
                <a onclick="window.open('tablaEmpleados.php','_blank','location=yes,height=570,width=1300,scrollbars=yes,status=yes');" ><button class="btn btn-primary">  Modificar personal  </button></a>
                </div>                
            </div>
        </div>
            <?php
                if(isset($_REQUEST["herrDef"])){
                    $titulo = "Herramientas defectuosas";
                    $filtro = "h.id_condicion = 2";
                    $imprep = "<a href=mpdf/repoherrdefect.php target='_blank'><button type='button' class='btn btn-info' name='herrdefecto'" ;
                    echo $reporte->reportesHerr($filtro,$titulo,$imprep);
                }
                if(isset($_REQUEST["herrNuev"])){
                    $titulo = "Herramientas nuevas";
                    $filtro = "h.id_status_uso = 1";
                    $imprep = "<a href=mpdf/reponuevaherr.php target='_blank'><button type='button' class='btn btn-info' name='herrdefecto'" ;
                    echo $reporte->reportesHerr($filtro,$titulo,$imprep);
                }
                if(isset($_REQUEST["herrUso"])){
                    $titulo = "Herramientas en uso";
                    $filtro = "h.id_status_prestamo = 2";
                    $imprep = "<a href=mpdf/repoherrenuso.php target='_blank'><button type='button' class='btn btn-info' name='herrdefecto'";
                    echo $reporte->reportesHerr($filtro,$titulo,$imprep);
                }
                if(isset($_REQUEST["herrDisp"])){
                    $titulo = "Herramientas disponibles";
                    $filtro = "h.id_status_prestamo = 1 and h.id_condicion = 1";
                    $imprep = "<a href=mpdf/repoherrdisponible.php target='_blank'><button type='button' class='btn btn-info' name='herrdefecto'";                
                    echo $reporte->reportesHerr($filtro,$titulo,$imprep);
                }
                if(isset($_REQUEST["histGeneral"])){
                    echo $reporte->historial();
                } 
                if(isset($_REQUEST["histGeneral2"])){
                    echo $reporte->historialdev();
                }                
                ?>
    
<?php
if(isset($_REQUEST["herramientas"])){
    echo $reporte->herramientas();
}
if(isset($_REQUEST["repPrest"])){
    $nomEmpleado = $_REQUEST["txtnomEmpleado"];
    echo $reporte->presxEmpleado($nomEmpleado);
}
if(isset($_REQUEST["herrCat"])){
    $nomCategoria = $_REQUEST["txtnomCategoria"];
    echo $reporte->herrXCategoria($nomCategoria);
}
?>
</body>
</html>
