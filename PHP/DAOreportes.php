<?php


class reportes {
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

    public function defectuosas(){
        $sql="select * from herramienta where id_condicion = 2;";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        $tabla="<table class='table'>"
                ."<thead class='thead-dark'>";
        $tabla .="<tr>"
                    . "<th>Codigo de la herramienta</th>"
                    . "<th>Fecha de ingreso</th>"
                    . "<th>Nombre de la herramienta</th>"
                    . "<th>ID Categoria</th>"
                    . "<th>ID estado de uso</th>"
                    . "<th>ID estado de prestamo</th>"
                    . "<th>ID de condicion</th>"
                    . "<th>Seleccionar</th>"
                . "</tr></thead><tbody>";
        while ($fila = mysqli_fetch_assoc($res)){
        $tabla .="<tr>"
                ."<td>".$fila["codigo_herramienta"]."</td>"
                ."<td>".$fila["fecha_ingreso"]."</td>"
                ."<td>".$fila["nombre_herramienta"]."</td>"
                ."<td>".$fila["id_categoria"]."</td>"
                ."<td>".$fila["id_status_uso"]."</td>"
                ."<td>".$fila["id_status_prestamo"]."</td>"
                ."<td>".$fila["id_condicion"]."</td>"
                ."<td><button type='button' class='btn btn-warning'>Seleccionar</button></td>"
                ."</tr>";
        }
        $tabla .="</tbody></table></div>";
        $res->close();
        return $tabla;
    }


}


?>