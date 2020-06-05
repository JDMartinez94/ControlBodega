<?php
include("credenciales.php");
include("empleado.php");

class DAOempleado {
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
    
    public function getEmpleado(){
        $sql="select * from empleado order by id_empleado desc limit 1;";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        $tabla="<table class='table'>"
                ."<thead class='thead-dark'>";
        $tabla .="<tr>"
                    . "<th>Codigo de Empleado</th>"
                    . "<th>Nombre</th>"
                    . "<th>Direccion</th>"
                    . "<th>Telefono</th>"
                . "</tr></thead><tbody>";
        while ($fila = mysqli_fetch_assoc($res)){
        $tabla .="<tr>"
                ."<td>".$fila["id_empleado"]."</td>"
                ."<td>".$fila["nombre_empleado"]."</td>"
                ."<td>".$fila["direccion"]."</td>"
                ."<td>".$fila["telefono"]."</td>"
                ."</tr>";
        }
        $tabla .="</tbody></table>";
        $res->close();
        return $tabla;
    }
    
    public function insertar($emp){
        $emp = new empleado();        
        $sql="insert into empleado (nombre_empleado,direccion,telefono) values ('".$emp->getNombre_empleado()."','".$emp->getDireccion()."','".$emp->getTelefono()."');";
        $this->conectar();
        if ($this->con->query($sql)){
            echo "<script>swal({title: 'Exito',text: 'El registro fue exitoso',icon: 'success'})</script>";
        }else{
            echo "<script>swal({title: 'Error',text: 'Algo salio mal, el registro no se hizo',icon: 'error'})</script>";
        }
        $this->desconectar();
        
    }
    
    public function eliminar($id_empleado){        
        $sql="delete from empleado where id_empleado=$$id_empleado";
        $this->conectar();
        if ($this->con->query($sql)){
            echo "<script>swal({title: 'Exito',text: 'El registro fue eliminado',icon: 'success'})</script>";
        }else{
            echo "<script>swal({title: 'Error',text: 'Algo salio mal, el registro no se elimino',icon: 'error'})</script>";
        }
        $this->desconectar();
    }
    
    public function cambiar($emp,$id_empleado){
        $emp = new empleado();   
        $sql = 
        "UPDATE empleado SET
        nombre_empleado = ".$emp->getNombre_empleado().",
        direccion = ".$emp->getDireccion().",
        telefono = ".$emp->getTelefono().",
        WHERE id_empleado = ".$id_empleado.";";
        
        $this->conectar();
        if ($this->con->query($sql)){
            echo "<script>swal({title:'Exito',text:'El registro fue modificado exitosamente',icon:'success'})</script>";
        }else{
            echo "<script>swal({title:'Error',text:'El registro no fue modificado',icon:'error'})</script>";
        }
        $this->desconectar();        
    }
        
}

$obj = new DAOempleado();
echo $obj->getEmpleado();