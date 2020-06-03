<?php
include("PHP/credenciales.php");
include("PHP/herramienta.php");

class DAOherramienta{
    private $con;

    public function __construct(){

    }
    public function conectar(){
        $this->con= new mysqli(SERVIDOR, USUARIO, CONTRA, DB);
    }
    public function desconectar(){
        $this->con->close();
    }
    public function insertar($obj){
        $herr= new herramienta();
        $herr = $obj;
        $sql="insert into herramienta values("..", "..", "..", "..", "..", 1, 1)";
    }

}


?>