<?php
include("credenciales.php");
include("herramienta.php");

class DAOherramienta{
    private $con;

    public function __construct(){
    }
    public function conectar(){
        try{
        $this->con= new mysqli(SERVIDOR, USUARIO, CONTRA, DB);
        }catch (Exception $exc){
            echo $exc->getTraceAsString();
        }
    }
    public function desconectar(){
        $this->con->close();
    }
    public function insertar($herr,$cat,$uso,$prest,$cond){
        $herr= new herramienta();
        $cat = new categoria();
        $uso = new status_uso();
        $prest = new status_prestamo();
        $cond = new condicion();        
        $sql="insert into herramienta values('".$herr->getFecha_ingreso()."','".$herr->getNombre_herramienta()."',".$cat->getId_categoria().",".$uso->getId_status_uso().",1,1)";
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
    public function cambiar($herr,$cat,$uso,$prest,$cond,$codigo_herramienta){
        $herr= new herramienta();
        $cat = new categoria();
        $uso = new status_uso();
        $prest = new status_prestamo();
        $cond = new condicion();                
        $sql = 
        "UPDATE platillos SET         
        fecha_ingreso = '".$herr->getFecha_ingreso()."',
        nombre_herramienta = '".$herr->getNombre_herramienta()."',
        id_categoria = ".$cat->getId_categoria().",
        id_status_uso = ".$uso->getId_status_uso().",
        id_status_prestamo = ".$prest->getId_status_prestamo().",
        id_condicion = ".$cond->getId_condicion().",
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