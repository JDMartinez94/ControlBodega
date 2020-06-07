<?php
    
    
    class herramienta
    {
        private $codigo_herramienta; 
        private $fecha_ingreso; 
        private $nombre_herramienta; 
        private $id_categoria;
        private $nombre_categoria; 
        private $id_status_uso;
        private $status_uso;
        private $id_status_prestamo;
        private $status_prestamo; 
        private $id_condicion; 
        private $condicion; 
        
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

        function getId_categoria() {
            return $this->id_categoria;
        }

        function getNombre_categoria() {
            return $this->nombre_categoria;
        }

        function setId_categoria($id_categoria) {
            $this->id_categoria = $id_categoria;
        }

        function setNombre_categoria($nombre_categoria) {
            $this->nombre_categoria = $nombre_categoria;
        }

        function getId_status_uso() {
            return $this->id_status_uso;
        }

        function getStatus_uso() {
            return $this->status_uso;
        }

        function setId_status_uso($id_status_uso) {
            $this->id_status_uso = $id_status_uso;
        }

        function setStatus_uso($status_uso) {
            $this->status_uso = $status_uso;
        }
        
        function getId_status_prestamo() {
            return $this->id_status_prestamo;
        }

        function getStatus_prestamo() {
            return $this->status_prestamo;
        }

        function setId_status_prestamo($id_status_prestamo) {
            $this->id_status_prestamo = $id_status_prestamo;
        }

        function setStatus_prestamo($status_prestamo) {
            $this->status_prestamo = $status_prestamo;
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