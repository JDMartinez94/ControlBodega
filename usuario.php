<?php

    include 'empleado.php';
    include 'rol.php';

    class usuario
    {
        private $id_usuario; 
        private $nombre_usuario; 
        private $contrasena; 
        
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


        
    }

?>
