<?php
    
    include 'categoria.php';
    include 'status_uso.php';
    include 'status_prestamo.php';
    include 'condicion.php'; 
    
    class herramienta
    {
        private $codigo_herramienta; 
        private $fecha_ingreso; 
        private $nombre_herramienta; 
        
        public function __construct() {
            ;
        }
        
        function getCodigo_herramienta() {
            return $this->codigo_herramienta;
        }

        function getFecha_ingreso() {
            return $this->fecha_ingreso;
        }

        function getNombre_herramienta() {
            return $this->nombre_herramienta;
        }

        function setCodigo_herramienta($codigo_herramienta) {
            $this->codigo_herramienta = $codigo_herramienta;
        }

        function setFecha_ingreso($fecha_ingreso) {
            $this->fecha_ingreso = $fecha_ingreso;
        }

        function setNombre_herramienta($nombre_herramienta) {
            $this->nombre_herramienta = $nombre_herramienta;
        }


    }
    

?>