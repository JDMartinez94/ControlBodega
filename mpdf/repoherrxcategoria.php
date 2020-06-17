<?php
include "mpdf/mpdf.php";
include("../PHP/credenciales.php");
function selectTabla(){
	$con= new mysqli(SERVIDOR,USUARIO,CONTRA,BD) or die ("Error al conectar");  
    //verificar en caso de error
    $sql ="Select 'h.codigo_herramienta', 'h.fecha_ingreso', 'h.nombre_herramienta', 'c.nombre_categoria', 'u.status_uso', 'p.status_prestamo', 'cd.condicion' from herramienta h join categoria c on 'c.id_categoria' = 'h.id_categoria' join status_uso u on 'u.id_status_uso' = 'h.id_status_uso' join status_prestamo p on 'p.id_status_prestamo' = 'h.id_status_prestamo' join condicion cd on 'cd.id_condicion' = 'h.id_condicion' where 'c.nombre_categoria' like 'p_nombre_categoria';";
    $res = $con->query($sql);
	$tabla .="";
	$tabla .= "<table>
            <tr>
            <th>Codigo de herramienta</th>
            <th>Fecha de Ingreso</th>
            <th>Nombre de herramienta</th>
            <th>categoria</th>
            <th>Estatus de Uso</th>
            <th>Estatus de Prestamo</th>
            <th>Condicion de Herramienta</th>
            </tr>
          ";
    while($fila =$res->fetch_assoc()){
        $tabla .= "<tr>
        <td>".$fila['h.codigo_herramienta']."</td>
        <td>".$fila['h.fecha_ingreso']."</td>
        <td>".$fila['h.nombre_herramienta']."</td>
        <td>".$fila['c.nombre_categoria']."</td>
        <td>".$fila['u.status_uso']."</td>
        <td>".$fila['p.status_prestamo']."</td>
        <td>".$fila['cd.condicion']."</td>
        <tr>";
    }
	$tabla .= "</table>";
	return $tabla;
}

$html = "<img src='img/inventool.png' width='200px'><hr><p align ='center'><font face='Black Ops One'>REPORTE <BR>HERRAMIENTAS POR CATEGORIA</font><br></p>";
$html .= "<hr>";
$html .= selectTabla();
$pdf= new mPDF('c');
$pdf->WriteHTML($html);
$pdf->Output();
exit;

?>


