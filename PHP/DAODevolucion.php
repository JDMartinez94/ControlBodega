<?php
include ("registro.php");
include ("credenciales.php");

class DAODevolucion{
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
    
    public function registrar($obj){
        $devo = new registro();
        $devo = $obj;
        $sql = "call InsertarNuevaDevolucion('".$devo->getFecha_registro()."',".$devo->getId_tipo_registro().",".$devo->getCodigo_herramienta().",".$devo->getId_empleado().",".$devo->getId_usuario().");";
        $this->conectar();
        $this->con->query($sql);
        //$this->setFetchMode(CON::FETCH_ASSOC);
        if ($this->con->affected_rows>1){
            echo "<script>swal({title: 'Exito',text: 'El registro se realizo con exito',icon: 'success', closeOnConfirm: false}).then(function(){window.location = 'devolucion.php'})</script>";
            
        }else{
            echo "<script>swal({title: 'Error',text: 'Algo salio mal, no se pudo realizar el registro',icon: 'error', closeOnConfirm: false}).then(function(){window.location = 'devolucion.php'})</script>";
        }
        $this->desconectar();
    }
    
    public function getRegistro($id){
        $sql="select 
            reg.fecha_registro,
            herr.nombre_herramienta,
            emp.nombre_empleado,
            usuario.nombre_usuario
            from registro reg
            join empleado emp on reg.id_empleado = emp.id_empleado
            join usuario usuario on reg.id_usuario = usuario.id_usuario
            join herramienta herr on reg.codigo_herramienta = herr.codigo_herramienta
            where reg.codigo_herramienta = ".$id."
            order by reg.fecha_registro desc limit 1;";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        $tabla="<br><div style=' margin: auto; width: 90%;  background-color: white; border-radius: 20px; padding: 5px '>"
        . "<h3 style=' text-align: center'>Registro mas reciente de la herramienta ID: ".$id."</h3>"
        . "<table class='table'>"
                ."<thead class='thead-dark'>";
        $tabla .="<tr>"
                    . "<th>Fecha de registro</th>"
                    . "<th>Herramienta</th>"
                    . "<th>Empleado que presto</th>"
                    . "<th>Registrado por</th>"
                . "</tr></thead><tbody>";
        while ($fila = mysqli_fetch_assoc($res)){
        $tabla .="<tr>"
                ."<td>".$fila["fecha_registro"]."</td>"
                ."<td>".$fila["nombre_herramienta"]."</td>"
                ."<td>".$fila["nombre_empleado"]."</td>"
                ."<td>".$fila["nombre_usuario"]."</td>"
                ."</tr>";
        }
        $tabla .="</tbody></table> </div>";
        $res->close();
        return $tabla;
        
    }
    
    
    
}