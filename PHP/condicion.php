<?php

    class condicion
    {
        private $id_condicion; 
        private $condicion; 
        
        public function __construct() {
            ;
        }
        
        function getId_condicion() {
            return $this->id_condicion;
        }

        function getCondicion() {
            return $this->condicion;
        }

        function setId_condicion($id_condicion) {
            $this->id_condicion = $id_condicion;
        }

        function setCondicion($condicion) {
            $this->condicion = $condicion;
        }


    }

?>

