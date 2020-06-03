<?php
include "mpdf/mpdf.php";

function selectTabla(){
	$con = new mysqli("localhost","root","","inventools");
    //verificar en caso de error
    $sql ="select * from usuario";
	$res = $con->query($sql);
	$tabla="";
	$tabla .= "<table>
            <tr>
            <th>id_usuario</th>
            <th>nombre_usuario</th>
            <th>contrasena</th>
            <th>id_empleado</th>
            <th>id_rol</th>
            </tr>
          ";
    while($fila =$res->fetch_assoc()){
        $tabla .= "<tr>
        <td>".$fila['id_usuario']."</td>
        <td>".$fila['nombre_usuario']."</td>
        <td>".$fila['contrasena']."</td>
        <td>".$fila['id_empleado']."</td>
        <td>".$fila['id_rol']."</td>
         <tr>";
    }
	$tabla .= "</table>";
	return $tabla;
}

$html = selectTabla();
$pdf= new mPDF('c');
$pdf->WriteHTML($html);
$pdf->Output();
exit;

?>