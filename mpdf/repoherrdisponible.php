<?php
include "mpdf/mpdf.php";

function selectTabla(){
	$con = new mysqli("localhost","root","","inventools");
    //verificar en caso de error
    $sql ="select h.codigo_herramienta, h.fecha_ingreso, h.nombre_herramienta, c.nombre_categoria, u.status_uso, p.status_prestamo, cd.condicion from herramienta h join categoria c on c.id_categoria = h.id_categoria
join status_uso u on u.id_status_uso = h.id_status_uso join status_prestamo p on p.id_status_prestamo = h.id_status_prestamo join condicion cd on cd.id_condicion = h.id_condicion where h.id_status_prestamo = 1 and h.id_condicion = 1";
    $res = $con->query($sql);
	$tabla="";
	$tabla .= "<table>
            <tr>
            <th>Codigo de la herramienta</th>
            <th>Fecha de ingreso</th>
            <th>Nombre de la herramienta</th>
            <th>Categoria</th>
            <th>Estado de uso</th>
            <th>Estado de prestamo</th>
            <th>Condicion</th>
            </tr>
          ";
    while($fila =$res->fetch_assoc()){
        $tabla .= "<tr>
        <td>".$fila['codigo_herramienta']."</td>
        <td>".$fila['fecha_ingreso']."</td>
        <td>".$fila['nombre_herramienta']."</td>
        <td>".$fila['nombre_categoria']."</td>
        <td>".$fila['status_uso']."</td>
        <td>".$fila['status_prestamo']."</td>
        <td>".$fila['condicion']."</td>
         <tr>";
    }
	$tabla .= "</table>";
	return $tabla;
}
$html = "<img src='img/inventool.png' width='200px'><hr><p align ='center'><font face='Black Ops One'>REPORTE <BR> HERRAMIENTAS DISPONIBLES</font><br></p>";
$html .= "<hr>";
$html .= selectTabla();
$pdf= new mPDF('c');
$pdf->WriteHTML($html);
$pdf->Output();
exit;

?>