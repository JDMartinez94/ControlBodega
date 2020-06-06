<?php

    class categoria
    {
        private $id_categoria;
        private $nombre_categoria; 
        
        public function __construct() {
            ;
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
 
    }

?>

