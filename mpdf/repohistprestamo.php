<?php
include "mpdf/mpdf.php";
include("../PHP/credenciales.php");
function selectTabla(){
	$con= new mysqli(SERVIDOR,USUARIO,CONTRA,BD) or die ("Error al conectar");  
    //verificar en caso de error
    $sql ="select r.id_registro, r.fecha_registro, tr.tipo_registro, r.codigo_herramienta, h.nombre_herramienta, r.id_empleado, e.nombre_empleado, r.id_usuario, u.nombre_usuario from registro r join tipo_registro tr on tr.id_tipo_registro = r.id_tipo_registro
        join herramienta h on h.codigo_herramienta = r.codigo_herramienta join empleado e on e.id_empleado = r.id_empleado join usuario u on   u.id_usuario = r.id_usuario where r.id_tipo_registro = 1;";
    $res = $con->query($sql);
	$tabla="";
	$tabla .= "<table>
            <tr>
            <th>ID Registro</th>
            <th>Fecha de registro</th>
            <th>Tipo de registro</th>
            <th>Codigo de herramienta</th>
            <th>Nombre de la herramienta</th>
            <th>ID empleado prestamista</th>
            <th>Nombre de Empleado prestamista</th>
            <th>ID Usuario que registro</th>
            <th>Usuario que registro</th>
            </tr>
          ";
    while($fila =$res->fetch_assoc()){
        $tabla .= "<tr>
        <td>".$fila['id_registro']."</td>
        <td>".$fila['fecha_registro']."</td>
        <td>".$fila['tipo_registro']."</td>
        <td>".$fila['codigo_herramienta']."</td>
        <td>".$fila['nombre_herramienta']."</td>
        <td>".$fila['id_empleado']."</td>
        <td>".$fila['nombre_empleado']."</td>
        <td>".$fila['id_usuario']."</td>
        <td>".$fila['nombre_usuario']."</td>
         <tr>";
    }
	$tabla .= "</table>";
	return $tabla;
}

$html = "<img src='img/inventool.png' width='200px'><hr><p align ='center'><font face='Black Ops One'>REPORTE <BR> HISTORIAL DE PRESTAMOS</font><br></p>";
$html .= "<hr>";
$html .= selectTabla();
$pdf= new mPDF('c');
$pdf->WriteHTML($html);
$pdf->Output();
exit;

?>