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
        $tabla="<div style='margin: auto; width: 80%; background-color: white'>"
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
                    . "<th>Seleccionar</th>"
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
                ."<td><button type='button' class='btn btn-info'>Seleccionar</button></td>"
                ."</tr>";
        }
        $tabla .="</tbody></table></div>";
        $res->close();
        return $tabla;
    }


}


?>