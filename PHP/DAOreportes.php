<?php
include("credenciales.php");

class DAOreportes{
    private $con;
    
    public function conectar(){
        try{
        $this->con= new mysqli(SERVIDOR,USUARIO,CONTRA,BD) or die ("Error al conectar");    
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }        
    }
    
    public function desconectar(){
    $this->con->close();
    }

    public function reportesHerr($filtro,$titulo){
        $sql="select h.codigo_herramienta, h.fecha_ingreso, h.nombre_herramienta, c.nombre_categoria, u.status_uso, p.status_prestamo, cd.condicion from herramienta h join categoria c on c.id_categoria = h.id_categoria join status_uso u on u.id_status_uso = h.id_status_uso join status_prestamo p on p.id_status_prestamo = h.id_status_prestamo join condicion cd on cd.id_condicion = h.id_condicion where $filtro ";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        $tabla="<br><div style='margin: auto; width: 90%; background-color: white; padding: 15px'>"
                . "<h3 style=' text-align: center'>".$titulo."</h3>"
                . "<table class='table'>"
                ."<thead class='thead-dark'>";
        $tabla .="<tr>"
                    . "<th>Codigo de la herramienta</th>"
                    . "<th>Fecha de ingreso</th>"
                    . "<th>Nombre de la herramienta</th>"
                    . "<th>Categoria</th>"
                    . "<th>Estado de uso</th>"
                    . "<th>Estado de prestamo</th>"
                    . "<th>Condicion</th>"
                . "</tr></thead><tbody>";
        while ($fila = mysqli_fetch_assoc($res)){
        $tabla .="<tr>"
                ."<td>".$fila["codigo_herramienta"]."</td>"
                ."<td>".$fila["fecha_ingreso"]."</td>"
                ."<td>".$fila["nombre_herramienta"]."</td>"
                ."<td>".$fila["nombre_categoria"]."</td>"
                ."<td>".$fila["status_uso"]."</td>"
                ."<td>".$fila["status_prestamo"]."</td>"
                ."<td>".$fila["condicion"]."</td>"
                ."</tr>";
        }
        $tabla .="</tbody></table>"
        ."<center><button type='button' class='btn btn-info' name='imprimir'>Imprimir reporte</button></center></div>";
        $res->close();
        return $tabla;
    }

    public function historial(){
        $sql="select r.id_registro, r.fecha_registro, tr.tipo_registro, r.codigo_herramienta, h.nombre_herramienta, r.id_empleado, e.nombre_empleado, r.id_usuario, u.nombre_usuario from registro r join tipo_registro tr on tr.id_tipo_registro = r.id_tipo_registro join herramienta h on h.codigo_herramienta = r.codigo_herramienta join empleado e on e.id_empleado = r.id_empleado join usuario u on u.id_usuario = r.id_usuario where r.id_tipo_registro = 1;";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        $tabla="<br><div style='margin: auto; width: 90%; background-color: white; padding: 15px'>"
                ."<h3 style=' text-align: center'>Historial general de prestamos</h3>"
                ."<table class='table'>"
                ."<thead class='thead-dark'>";
        $tabla .="<tr>"
                    . "<th>ID Registro</th>"
                    . "<th>Fecha de registro</th>"
                    . "<th>Tipo de registro</th>"
                    . "<th>Codigo de herramienta</th>"
                    . "<th>Nombre de la herramienta</th>"
                    . "<th>ID empleado prestamista</th>"
                    . "<th>Nombre de empleado prestamista</th>"
                    . "<th>ID Usuario que registro</th>"
                    . "<th>Usuario que registro</th>"
                . "</tr></thead><tbody>";
        while ($fila = mysqli_fetch_assoc($res)){
        $tabla .="<tr>"
                ."<td>".$fila["id_registro"]."</td>"
                ."<td>".$fila["fecha_registro"]."</td>"
                ."<td>".$fila["tipo_registro"]."</td>"
                ."<td>".$fila["codigo_herramienta"]."</td>"
                ."<td>".$fila["nombre_herramienta"]."</td>"
                ."<td>".$fila["id_empleado"]."</td>"
                ."<td>".$fila["nombre_empleado"]."</td>"
                ."<td>".$fila["id_usuario"]."</td>"
                ."<td>".$fila["nombre_usuario"]."</td>"
                ."</tr>";
        }
        $tabla .="</tbody></table>"
        ."<center><button type='button' class='btn btn-info' name='imprimir'>Imprimir reporte</button></center></div>";
        $res->close();
        return $tabla;
    }


}


?>