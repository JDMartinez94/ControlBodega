<?php
include "herramienta.php";
include "credenciales.php";

class DAOcondicion{
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
    
    public function estadoHerramienta($obj,$codigo_herramienta){
        $estado = new herramienta();
        $estado = $obj;
        $sql = "call actualizarHerramienta(".$estado->getId_condicion().",".$codigo_herramienta.");";
        $this->conectar();
        if ($this->con->query($sql)){
            echo "<script>swal({title:'Exito',text:'El estado de la herramienta fue actualizado',icon:'success', closeOnConfirm: false}).then(function(){window.location = 'herrDanadas.php'})</script>";
        }else{
            echo "<script>swal({title:'Error',text:'El estado de la herramienta no se pudo actualizar',icon:'error', closeOnConfirm: false}).then(function(){window.location = 'herrDanadas.php'})</script>";
        }
        $this->desconectar();
    }
    
    public function getHerramienta($codigo_herramienta){
                $sql="select
                    herr.codigo_herramienta,
                    herr.nombre_herramienta,
                    cat.nombre_categoria,
                    cond.condicion

                    from herramienta herr
                    join categoria cat on herr.id_categoria = cat.id_categoria
                    join condicion cond on herr.id_condicion = cond.id_condicion
                    where codigo_herramienta = ".$codigo_herramienta.";";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        $tabla="<br><div style=' margin: auto; width: 90%;  background-color: white; border-radius: 20px; padding: 5px '>"
                . "<h3 style=' text-align: center'>Detalles del registro</h3>"
                . "<table class='table'>"
                ."<thead class='thead-dark'>";
        $tabla .="<tr>"
                    . "<th>Codigo Herramienta</th>"
                    . "<th>Nombre</th>"
                    . "<th>Categoria</th>"
                    . "<th>Condicion Anterior</th>"
                . "</tr></thead><tbody>";
        while ($fila = mysqli_fetch_assoc($res)){
        $tabla .="<tr>"
                ."<td>".$fila["codigo_herramienta"]."</td>"
                ."<td>".$fila["nombre_herramienta"]."</td>"
                ."<td>".$fila["nombre_categoria"]."</td>"
                ."<td>".$fila["condicion"]."</td>"
                ."</tr>";
        }
        $tabla .="</tbody></table> </div>";
        $res->close();
        return $tabla;
        
    }

}

?>