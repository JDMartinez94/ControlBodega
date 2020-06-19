<?php

    class usuario
    {
        private $id_usuario; 
        private $nombre_usuario; 
        private $contrasena; 
        private $id_empleado;
        private $id_rol; 
        
        public function __construct() {
            ;
        }
        
        function getId_usuario() {
            return $this->id_usuario;
        }

        function getNombre_usuario() {
            return $this->nombre_usuario;
        }

        function getContrasena() {
            return $this->contrasena;
        }

        function setId_usuario($id_usuario) {
            $this->id_usuario = $id_usuario;
        }

        function setNombre_usuario($nombre_usuario) {
            $this->nombre_usuario = $nombre_usuario;
        }

        function setContrasena($contrasena) {
            $this->contrasena = $contrasena;
        }
        function getId_empleado() {
            return $this->id_empleado;
        }

        function setId_empleado($id_empleado) {
            $this->id_empleado = $id_empleado;
        }
        function getId_rol() {
            return $this->id_rol;
        }
        
        function setId_rol($id_rol) {
            $this->id_rol = $id_rol;
        }



        
    }

?>
