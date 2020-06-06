<?php

    class status_prestamo
    {
        private $id_status_prestamo;
        private $status_prestamo; 
        
        public function __construct() {
            ;
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


    }

?>
