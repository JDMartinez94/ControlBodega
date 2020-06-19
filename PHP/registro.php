<?php
    
    class registro
    {
        private $id_registro;
        private $fecha_registro;
        private $codigo_herramienta;
        private $id_tipo_registro;
        private $id_usuario;
        private $id_empleado;
        
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

        function getCodigo_herramienta() {
            return $this->codigo_herramienta;
        }

        function setCodigo_herramienta($codigo_herramienta) {
            $this->codigo_herramienta = $codigo_herramienta;
        }

        function getId_tipo_registro() {
            return $this->id_tipo_registro;
        }

        function setId_tipo_registro($id_tipo_registro) {
            $this->id_tipo_registro = $id_tipo_registro;
        }

        function getId_usuario() {
            return $this->id_usuario;
        }

        function setId_usuario($id_usuario) {
            $this->id_usuario = $id_usuario;
        }

        function getId_empleado() {
            return $this->id_empleado;
        }

        function setId_empleado($id_empleado) {
            $this->id_empleado = $id_empleado;
        }

    }

?>

