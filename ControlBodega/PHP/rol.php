<?php

    class rol
    {
        private $id_rol; 
        private $rol; 
        
        public function __construct() {
            ;
        }
        
        function getId_rol() {
            return $this->id_rol;
        }

        function getRol() {
            return $this->rol;
        }

        function setId_rol($id_rol) {
            $this->id_rol = $id_rol;
        }

        function setRol($rol) {
            $this->rol = $rol;
        }


    }

?>