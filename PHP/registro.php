<?php

    include 'herramienta.php';
    include 'tipo_registro.php';
    include 'usuario.php';
    
    class registro
    {
        private $id_registro; 
        private $fecha_registro; 
        
        public function __construct() {
            ;
        }
        
        function getId_registro() {
            return $this->id_registro;
        }

        function getFecha_registro() {
            return $this->fecha_registro;
        }

        function setId_registro($id_registro) {
            $this->id_registro = $id_registro;
        }

        function setFecha_registro($fecha_registro) {
            $this->fecha_registro = $fecha_registro;
        }


    }

?>

