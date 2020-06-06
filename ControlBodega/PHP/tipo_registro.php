<?php

    class tipo_registro
    {
        private $id_tipo_registro; 
        private $tipo_registro; 
        
        public function __construct() {
            ;
        }
        
        function getId_tipo_registro() {
            return $this->id_tipo_registro;
        }

        function getTipo_registro() {
            return $this->tipo_registro;
        }

        function setId_tipo_registro($id_tipo_registro) {
            $this->id_tipo_registro = $id_tipo_registro;
        }

        function setTipo_registro($tipo_registro) {
            $this->tipo_registro = $tipo_registro;
        }


    }

?>
