<?php
include("credenciales.php");
include("herramienta.php");

class DAOherramienta {
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
        $herr = new herramienta();
        $herr = $obj;
        $sql="insert into herramienta (fecha_ingreso,nombre_herramienta,id_categoria,id_status_uso,id_status_prestamo,id_condicion)"
        ."values('".$obj->getFecha_ingreso()."','".$obj->getNombre_herramienta()."',".$obj->getId_categoria().",".$obj->getId_status_uso().",".$obj->getId_status_prestamo().",".$obj->getId_condicion().");";
        $this->conectar();
        if ($this->con->query($sql)){
            echo "<script>swal({title: 'Exito',text: 'El registro fue exitoso',icon: 'success'})</script>";
        }else{
            echo "<script>swal({title: 'Error',text: 'Algo salio mal, el registro no se hizo',icon: 'error'})</script>";
        }
        $this->desconectar();
    }
    public function eliminar($codigo_herramienta){        
        $sql="delete from herramienta where codigo_herramienta=$codigo_herramienta";
        $this->conectar();
        if ($this->con->query($sql)){
            echo "<script>swal({title: 'Exito',text: 'El registro fue eliminado',icon: 'success'})</script>";
        }else{
            echo "<script>swal({title: 'Error',text: 'Algo salio mal, el registro no se elimino',icon: 'error'})</script>";
        }
        $this->desconectar();
    }
    public function cambiar($obj,$codigo_herramienta){
        $herr = new herramienta();
        $obj = $herr;
        $sql = 
        "UPDATE platillos SET         
        fecha_ingreso = '".$obj->getFecha_ingreso()."',
        nombre_herramienta = '".$obj->getNombre_herramienta()."',
        id_categoria = ".$obj->getId_categoria().",
        id_status_uso = ".$obj->getId_status_uso().",
        id_status_prestamo = ".$obj->getId_status_prestamo().",
        id_condicion = ".$obj->getId_condicion().",
        WHERE codigo = ".$codigo_herramienta.";";
        
        $this->conectar();
        if ($this->con->query($sql)){
            echo "<script>swal({title:'Exito',text:'El registro fue modificado exitosamente',icon:'success'})</script>";
        }else{
            echo "<script>swal({title:'Error',text:'El registro no fue modificado',icon:'error'})</script>";
        }
        $this->desconectar();        
    }
}

?>