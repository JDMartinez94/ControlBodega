<?php

    class empleado
    {
        private $id_empleado;
        private $nombre_empleado; 
        private $direccion; 
        private $telefono; 
        
        public function __construct() {
            ;
        }
        
        function getId_empleado() {
            return $this->id_empleado;
        }

        function getNombre_empleado() {
            return $this->nombre_empleado;
        }

        function getDireccion() {
            return $this->direccion;
        }

        function getTelefono() {
            return $this->telefono;
        }

        function setId_empleado($id_empleado) {
            $this->id_empleado = $id_empleado;
        }

        function setNombre_empleado($nombre_empleado) {
            $this->nombre_empleado = $nombre_empleado;
        }

        function setDireccion($direccion) {
            $this->direccion = $direccion;
        }

        function setTelefono($telefono) {
            $this->telefono = $telefono;
        }


    }

?>