<?php
include("usuario.php");
include("credenciales.php");

class DAOusuario {
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

    
    public function insertar($obj){
        $user = new usuario();
        $user = $obj;
        $sql="insert into usuario (nombre_usuario,contrasena,id_empleado,id_rol) values ('".$obj->getNombre_usuario()."','".$obj->getContrasena()."',".$obj->getId_empleado().",".$obj->getId_rol().");";
        $this->conectar();
        if ($this->con->query($sql)){
            echo "<script>swal({title: 'Exito',text: 'El registro fue exitoso',icon: 'success'})</script>";
            
        }else{
            echo "<script>swal({title: 'Error',text: 'Algo salio mal, el registro no se hizo',icon: 'error'})</script>";
        }
        $this->desconectar();
        
    }
    
    public function eliminar($id_usuario){        
        $sql="delete from usuario where id_empleado=$id_usuario";
        $this->conectar();
        if ($this->con->query($sql)){
            echo "<script>swal({title: 'Exito',text: 'El registro fue eliminado',icon: 'success'})</script>";
        }else{
            echo "<script>swal({title: 'Error',text: 'Algo salio mal, el registro no se elimino',icon: 'error'})</script>";
        }
        $this->desconectar();
    }
    
    public function cambiar($user,$id_usuario){
        $user = new usuario();   
        $sql = 
        "UPDATE usuario SET
        nombre_usuario = ".$obj->getNombre_usuario().",
        contrasena = ".$obj->getContrasena().",
        id_empleado = ".$obj->getId_empleado().",
        id_rol = ".$obj->getId_rol().",
        WHERE id_empleado = ".$id_usuario.";";
        
        $this->conectar();
        if ($this->con->query($sql)){
            echo "<script>swal({title:'Exito',text:'El registro fue modificado exitosamente',icon:'success'})</script>";
        }else{
            echo "<script>swal({title:'Error',text:'El registro no fue modificado',icon:'error'})</script>";
        }
        $this->desconectar();        
    }
        
}
