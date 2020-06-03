<?php
include("credenciales.php");
include("herramienta.php");
include("categoria.php");
include("status_uso.php");
include("status_prestamo.php");
include("condicion.php");

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
            
        }
    }

}


?>